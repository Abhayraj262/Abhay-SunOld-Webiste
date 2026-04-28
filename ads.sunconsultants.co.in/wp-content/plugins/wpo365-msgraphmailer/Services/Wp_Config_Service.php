<?php

namespace Wpo\Services;

use Error;
use WP_Error;
use \Wpo\Core\Domain_Helpers;
use Wpo\Core\Extensions_Helpers;
use \Wpo\Core\Url_Helpers;
use \Wpo\Core\WordPress_Helpers;
use \Wpo\Core\Wpmu_Helpers;
use \Wpo\Services\Authentication_Service;
use \Wpo\Services\Log_Service;
use \Wpo\Services\Options_Service;
use \Wpo\Services\Request_Service;

// Prevent public access to this script
defined('ABSPATH') or die();

if (!class_exists('\Wpo\Services\Wp_Config_Service')) {

    class Wp_Config_Service
    {
        /**
         * Simple helper to override some options with values found in wp-config.php. See
         * https://docs.wpo365.com/article/172-use-wp-config-php-to-override-some-config-options.
         * 
         * @since   27.0 (previously in Options_Service)
         * 
         * @param   mixed     $options
         * 
         * @return  void 
         */
        public static function apply_overrides(&$options)
        {
            if (!is_array($options)) {
                return;
            }

            $request_service = Request_Service::get_instance();
            $request = $request_service->get_request($GLOBALS['WPO_CONFIG']['request_id']);
            $wpo_overrides = $request->get_item('wpo_overrides');

            if (false === $wpo_overrides) {

                if (false === ($wpo_overrides = Wp_Config_Service::get_options_overrides())) {
                    $wpo_overrides = array();
                }

                $request->set_item('wpo_overrides', $wpo_overrides);
            }

            if (empty($wpo_overrides)) {
                return;
            }

            foreach ($wpo_overrides as $key => $value) {
                $options[$key] = $value;
            }
        }

        /**
         * Will set up wpo_aad in request-cache.
         * 
         * @param array $options 
         * @param boolean $use_wp_config
         * 
         * @return void 
         */
        public static function ensure_aad_options(&$options)
        {
            $request_service = Request_Service::get_instance();
            $request = $request_service->get_request($GLOBALS['WPO_CONFIG']['request_id']);

            if (false !== $request->get_item('wpo_aad')) {
                return;
            }

            // Do not continue if the global options have not yet been cached

            if (empty($options)) {
                Log_Service::write_log('WARN', sprintf('%s -> An attempt to initialize AAD options was made before the global options have been loaded', __METHOD__));
                Authentication_Service::goodbye(Error_Service::CHECK_LOG);
                exit();
            }

            // Closure to initialize the AAD options from the global options
            $default_aad_options = function () use ($options) {
                $aad_options = Wp_Config_Service::get_aad_option_keys();
                $wpo_aad = array();
                array_map(function ($key) use ($options, &$wpo_aad) {
                    $wpo_aad[$key] = Wp_Config_Service::get_string_option($key, $options);
                }, $aad_options);
                return $wpo_aad;
            };

            // 1. Check if multiple IdPs have been configured

            $wpo_idps = self::get_multiple_idps();

            if (false !== $wpo_idps) {

                // Closure to filter the default IdP

                $get_default_idp = function () use ($wpo_idps) {
                    $filtered_idps = array_filter($wpo_idps, function ($idp) {
                        return !empty($idp['default']) && true === $idp['default'];
                    });

                    $filtered_idps = array_values($filtered_idps); // re-index from 0

                    if (sizeof($filtered_idps) == 1) {
                        return $filtered_idps[0];
                    } else {
                        return array();
                        Log_Service::write_log('ERROR', sprintf('%s -> Could not find a default IdP', __METHOD__));
                    }
                };

                // 1.a Scenario -> mailAuthorize

                if ($request->get_item('mode') == 'mailAuthorize') {
                    $wpo_aad = $get_default_idp();
                }

                // 1.b Scenario -> Start authentication (get by id posted)

                else if (!empty($idp_id = $request->get_item('idp_id'))) {
                    $filtered_idps = array_filter($wpo_idps, function ($idp) use ($idp_id) {
                        return !empty($idp['id']) && strcasecmp($idp['id'], $idp_id) === 0;
                    });

                    $filtered_idps = array_values($filtered_idps); // re-index from 0

                    if (sizeof($filtered_idps) == 1) {
                        $wpo_aad = $filtered_idps[0];
                    } else {
                        $wpo_aad = array();
                        Log_Service::write_log('ERROR', sprintf('%s -> Could not find IdP by IdP ID', __METHOD__));
                    }
                }

                // 1.c Scenario -> Check user meta for IdP identifier (get by Id)

                else {
                    // - Test user-sync query
                    $skip = isset($_REQUEST['action']) && $_REQUEST['action'] == 'wpo365_test_sync_query';

                    // - Start user-sync manually
                    $skip = $skip | false !== WordPress_Helpers::stripos($GLOBALS['WPO_CONFIG']['url_info']['request_uri'], '/wp-json/wpo365/v1/sync/start');

                    // - Application-only request for MS GRAPH
                    if (wp_is_json_request() && false !== WordPress_Helpers::stripos($GLOBALS['WPO_CONFIG']['url_info']['request_uri'], '/wp-json/wpo365/v1/')) {
                        $body = file_get_contents('php://input');

                        if (!empty($body)) {
                            $body_parsed = json_decode($body, true);
                            $skip = $skip | (isset($body_parsed['application']) && true === $body_parsed['application']);
                        }
                    }

                    if (empty($skip) && 0 !== ($wp_usr_id = \get_current_user_id())) {
                        $idp_id = $request->get_item('idp_id');

                        if (empty($idp_id)) {
                            $idp_id = get_user_meta($wp_usr_id, 'wpo365_idp_id', true);
                        }

                        if (!empty($idp_id)) {
                            $filtered_idps = array_filter($wpo_idps, function ($idp) use ($idp_id) {
                                return strcasecmp($idp_id, $idp['id']) === 0;
                            });

                            $filtered_idps = array_values($filtered_idps); // re-index from 0

                            if (sizeof($filtered_idps) == 1) {
                                $wpo_aad = $filtered_idps[0];
                                $request->set_item('idp_id', $wpo_aad['id']);
                            }
                        }
                    }

                    if (!isset($wpo_aad)) {
                        $wpo_aad = $get_default_idp();
                    }
                }

                if (isset($wpo_aad['type'])) {
                    $options['use_saml'] = $wpo_aad['type'] == 'saml';
                    ksort($options);
                }

                $request->set_item('wpo_aad', $wpo_aad);
                return;
            }

            // 2. Check if single IdP has been configured

            if (!isset($wpo_aad)) {
                $wpo_aad = self::get_single_idp();

                // -> Backward compatibility for options that are were previously not defined in wp-config.php

                if (!empty($wpo_aad)) {
                    $aad_options = self::get_aad_option_keys();

                    foreach ($aad_options as $key) {

                        if (!isset($wpo_aad[$key])) {
                            $wpo_aad[$key] = Wp_Config_Service::get_string_option($key, $options);
                        }
                    }

                    if (Wp_Config_Service::get_boolean_option('use_saml', $options) || (isset($wpo_aad['type']) && $wpo_aad['type'] == 'saml')) {
                        $options['use_saml'] = true;
                        ksort($options);
                    }

                    $request->set_item('wpo_aad', $wpo_aad);
                    return;
                }

                // <-
            }

            // 3. From default options

            if (empty($wpo_aad)) {
                $wpo_aad = $default_aad_options();
            }

            $request->set_item('wpo_aad', $wpo_aad);
        }

        /**
         * Will set up wpo_mail in request-cache.
         * 
         * @param array $options 
         * @param boolean $use_wp_config
         * 
         * @return void 
         */
        public static function ensure_mail_options($options)
        {
            if (!self::get_boolean_option('use_graph_mailer', $options)) {
                return;
            }

            $request_service = Request_Service::get_instance();
            $request = $request_service->get_request($GLOBALS['WPO_CONFIG']['request_id']);

            if (false !== $request->get_item('wpo_mail')) {
                return;
            }

            // Do not continue if the global options have not yet been cached

            if (empty($options)) {
                Log_Service::write_log('WARN', sprintf('%s -> An attempt to initialize MAIL options was made before the global options have been loaded', __METHOD__));
                Authentication_Service::goodbye(Error_Service::CHECK_LOG);
                exit();
            }

            // Closure to initialize the Mail options from the global options
            $default_mail_options = function () use ($options) {
                $mail_options = Wp_Config_Service::get_mail_option_keys();
                $wpo_mail = array();
                array_map(function ($key) use ($options, &$wpo_mail) {
                    $wpo_mail[$key] = Wp_Config_Service::get_string_option($key, $options);
                }, $mail_options);
                return $wpo_mail;
            };

            // 1. Mail Options from WPO_IDPS_x (default)

            $wpo_idps = self::get_multiple_idps();

            if (!empty($wpo_idps)) {
                $filtered_idps = array_filter($wpo_idps, function ($idp) {
                    return !empty($idp['default']) && true === $idp['default'];
                });

                $filtered_idps = array_values($filtered_idps); // re-index from 0

                if (sizeof($filtered_idps) == 1) {
                    $mail_options = self::get_mail_option_keys();
                    $wpo_mail = array();

                    foreach ($mail_options as $key) {
                        $wpo_mail[$key] = Wp_Config_Service::get_string_option($key, $filtered_idps[0]);
                    }

                    $request->set_item('wpo_mail', $wpo_mail);
                    return;
                }
            }

            // 2. Options from WPO_AAD_x

            $wpo_aad = self::get_single_idp();

            if (!empty($wpo_aad)) {
                $mail_options = self::get_mail_option_keys();
                $wpo_mail = array();

                foreach ($mail_options as $key) {
                    $wpo_mail[$key] = Wp_Config_Service::get_string_option($key, $wpo_aad);
                }

                $request->set_item('wpo_mail', $wpo_mail);
                return;
            }

            // 3. From default options because WPO_AAD_x is not configured

            $wpo_mail = $default_mail_options();
            $request->set_item('wpo_mail', $wpo_mail);
        }

        /**
         * An array of IdPs from WP-Config.php or false if not found.
         * 
         * @return array|bool 
         */
        public static function get_multiple_idps()
        {
            if (empty(Extensions_Helpers::get_active_extensions())) {
                return false;
            }

            $blog_id = Wpmu_Helpers::get_options_blog_id();
            $wpo_config_multi_constant_name = 'WPO_IDPS_' . $blog_id;
            return defined($wpo_config_multi_constant_name) && is_array(constant($wpo_config_multi_constant_name))
                ? constant($wpo_config_multi_constant_name)
                : false;
        }

        /**
         * An IdP from WP-Config.php or false if not found.
         * 
         * @return array|bool 
         */
        public static function get_single_idp()
        {
            if (empty(Extensions_Helpers::get_active_extensions())) {
                return false;
            }

            $blog_id = Wpmu_Helpers::get_options_blog_id();
            $wpo_config_constant_name = 'WPO_AAD_' . $blog_id;
            return defined($wpo_config_constant_name) && is_array(constant($wpo_config_constant_name))
                ? constant($wpo_config_constant_name)
                : false;
        }

        /**
         * Options overrides from WP-Config.php or false if not found.
         * 
         * @return array|bool 
         */
        public static function get_options_overrides()
        {
            if (empty(Extensions_Helpers::get_active_extensions())) {
                return false;
            }

            $blog_id = Wpmu_Helpers::get_options_blog_id();
            $wpo_config_constant_name = 'WPO_OVERRIDES_' . $blog_id;
            return defined($wpo_config_constant_name) && is_array(constant($wpo_config_constant_name))
                ? constant($wpo_config_constant_name)
                : false;
        }

        /**
         * Export the options as a parseable string that can be used in wp-config.php.
         * 
         * @return string|WP_Error 
         */
        public static function get_parseable_options($aad_options_only)
        {
            if (isset($GLOBALS['WPO_CONFIG']['options'])) {
                $aad_options = self::get_aad_option_keys();
                $mail_options = self::get_mail_option_keys();

                $keys_to_remove = array(
                    'configurations',
                    'name',
                    'user_sync_jobs',
                );

                if ($aad_options_only) {
                    $parseable_options = array();

                    foreach ($aad_options as $aad_option) {
                        $parseable_options[$aad_option] = Options_Service::get_aad_option($aad_option);
                    }

                    foreach ($mail_options as $mail_option) {
                        $parseable_options[$mail_option] = Options_Service::get_mail_option($mail_option);
                    }

                    if (Options_Service::get_global_boolean_var('use_saml')) {
                        $parseable_options['type'] = 'saml';
                    } else if (Options_Service::get_global_boolean_var('use_b2c')) {
                        $parseable_options['type'] = 'b2c';
                    } else if (Options_Service::get_global_boolean_var('use_ciam')) {
                        $parseable_options['type'] = 'ciam';
                    } else {
                        $parseable_options['type'] = 'oidc';
                    }

                    // Add some placeholders

                    if (!empty($parseable_options['redirect_url']) || !empty($parseable_options['saml_sp_acs_url'])) {
                        $wpo_idps = self::get_multiple_idps();

                        if (!empty($wpo_idps)) {
                            array_map(function ($idp) use (&$parseable_options) {

                                if (!empty($idp['tenant_id']) && !empty($parseable_options['tenant_id']) && $idp['tenant_id'] == $parseable_options['tenant_id']) {

                                    if ((!empty($idp['redirect_url']) && !empty($parseable_options['redirect_url']) && $idp['redirect_url'] == $parseable_options['redirect_url'])
                                        || (!empty($idp['saml_sp_acs_url']) && !empty($parseable_options['saml_sp_acs_url']) && $idp['saml_sp_acs_url'] == $parseable_options['saml_sp_acs_url'])
                                    ) {

                                        if (!empty($idp['id'])) {
                                            $parseable_options['id'] = $idp['id'];
                                        }

                                        if (!empty($idp['title'])) {
                                            $parseable_options['title'] = $idp['title'];
                                        }

                                        if (!empty($idp['default'])) {
                                            $parseable_options['default'] = $idp['default'];
                                        }
                                    }
                                }
                            }, $wpo_idps);
                        }
                    }

                    if (empty($parseable_options['id'])) {
                        $parseable_options['id'] = uniqid();
                    }

                    if (empty($parseable_options['title'])) {
                        $parseable_options['title'] = sprintf('Title for IdP %s', $parseable_options['id']);
                    }

                    if (!isset($parseable_options['default'])) {
                        $parseable_options['default'] = false;
                    }
                } else {
                    $parseable_options = array_filter($GLOBALS['WPO_CONFIG']['options'], function ($idp, $key) use ($keys_to_remove, $aad_options, $mail_options) {
                        return !in_array($key, $keys_to_remove) && !in_array($key, $aad_options) && !in_array($key, $mail_options);
                    }, ARRAY_FILTER_USE_BOTH);
                }

                ksort($parseable_options);

                if (!empty($parseable_options)) {
                    return base64_encode(var_export($parseable_options, true));
                }
            }

            $error = sprintf('%s -> Failed to export parseable options', __METHOD__);
            Log_Service::write_log('WARN', $error);
            return new WP_Error('VarExportException', $error);
        }

        /**
         * Helper to return all options that can be retrieved using get_aad_option()
         * 
         * @since 27.0
         * 
         * @return string[] 
         */
        public static function get_aad_option_keys()
        {
            return array(
                'tenant_id',
                'redirect_url',
                'application_id',
                'application_secret',
                'app_only_application_id',
                'app_only_application_secret',
                'redirect_on_login_secret',
                'saml_base_url',
                'saml_sp_entity_id',
                'saml_sp_acs_url',
                'saml_sp_acs_binding',
                'saml_sp_sls_url',
                'saml_sp_sls_binding',
                'saml_idp_entity_id',
                'saml_idp_meta_data_url',
                'saml_idp_ssos_url',
                'saml_idp_ssos_binding',
                'saml_idp_sls_url',
                'saml_idp_sls_binding',
                'saml_x509_cert',
                'wp_rest_aad_application_id_uri',
            );
        }

        /**
         * Helper to return all options that can be retrieved using get_aad_option()
         * 
         * @since 27.0
         * 
         * @return string[] 
         */
        public static function get_mail_option_keys()
        {
            return array(
                'mail_tenant_id',
                'mail_application_id',
                'mail_application_secret',
                'mail_redirect_url',
            );
        }

        /**
         * Hooks into the wp_authenticate hook and dynamically redirects the user that 
         * is attempting to sign in, to an IdP that is configured to handle the domain 
         * portion of user_login as entered by the user.
         * 
         * @param mixed $user_login 
         * @param mixed $user_password 
         * @return void 
         * @throws Error 
         */
        public static function dynamically_redirect_to_idp($user_login, $user_password)
        {
            Log_Service::write_log('DEBUG', '##### -> ' . __METHOD__);

            // Bail out early if WPO365 is not configured

            if (!Options_Service::is_wpo365_configured()) {
                return;
            }

            // Bail out early if the administrator has not configured multiple IdPs

            if (empty($wpo_idps = self::get_multiple_idps())) {
                return;
            }

            $user_login_domain = Domain_Helpers::get_smtp_domain_from_email_address($user_login);

            // Bail out early if the user didn't enter an email formatted user_login

            if (empty($user_login_domain)) {
                return;
            }

            $filtered_idps = array_filter($wpo_idps, function ($idp) use ($user_login_domain) {
                return !empty($idp['id']) && !empty($idp['domains']) && in_array($user_login_domain, $idp['domains']);
            });

            $filtered_idps = array_values($filtered_idps); // re-index from 0

            if (sizeof($filtered_idps) != 1) {
                Log_Service::write_log('WARN', sprintf('%s -> Attempt to dynamically redirect user with user_login %s to IdP failed because no IdP has been configured for the domain', __METHOD__, $user_login));
                return;
            }

            // Re-ensure AAD options with the selected IDP instead

            $request_service = Request_Service::get_instance();
            $request = $request_service->get_request($GLOBALS['WPO_CONFIG']['request_id']);
            $request->set_item('idp_id', $filtered_idps[0]['id']);
            $request->remove_item('wpo_aad');
            Wp_Config_Service::ensure_aad_options($GLOBALS['WPO_CONFIG']['options']);

            if (Options_Service::get_global_boolean_var('use_saml')) {
                $redirect_to = !empty($_POST['redirect_to'])
                    ? esc_url_raw($_POST['redirect_to'])
                    : null;

                $params = array('login_hint' => $user_login);
                \Wpo\Services\Saml2_Service::initiate_request($redirect_to, $params);
                exit();
            } else {
                if (Options_Service::get_global_boolean_var('use_b2c') &&  \class_exists('\Wpo\Services\Id_Token_Service_B2c')) {
                    $authUrl = \Wpo\Services\Id_Token_Service_B2c::get_openidconnect_url($user_login);
                } else if (Options_Service::get_global_boolean_var('use_ciam')) {
                    $authUrl = \Wpo\Services\Id_Token_Service_Ciam::get_openidconnect_url($user_login);
                } else {
                    $authUrl = Id_Token_Service::get_openidconnect_url($user_login);
                }
            }

            Url_Helpers::force_redirect($authUrl);
            exit();
        }

        /**
         * Get a global string option from the global options cache.
         * 
         * @param string $option_name 
         * @return string 
         */
        private static function get_string_option($option_name, $options)
        {
            if (isset($options[$option_name])) {
                return is_string($options[$option_name]) ? WordPress_Helpers::trim($options[$option_name]) : '';
            }

            return '';
        }

        /**
         * Get a global boolean option from the global options cache.
         * 
         * @param string $option_name 
         * @return boolean 
         */
        private static function get_boolean_option($option_name, $options)
        {

            if (isset($options[$option_name])) {
                return filter_var($options[$option_name], FILTER_VALIDATE_BOOLEAN);
            }

            return false;
        }
    }
}

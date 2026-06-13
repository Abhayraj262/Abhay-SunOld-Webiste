<?php
/**
 * Auto-restore Google Ads landing pages once if they are missing.
 * Loaded on every request until pages exist and the flag is set.
 */

declare(strict_types=1);

if (!defined('ABSPATH')) {
    exit;
}

add_action('init', 'sc_restore_google_ads_pages_once', 1);

function sc_restore_google_ads_pages_once(): void
{
    if (get_option('sc_google_ads_pages_restored') === '1') {
        return;
    }

    $targetHome = 'https://sunconsultants.co.in/google-ads';
    if (defined('WP_HOME') && WP_HOME !== '') {
        $targetHome = untrailingslashit(WP_HOME);
    }

    update_option('home', $targetHome);
    update_option('siteurl', $targetHome);

    $pages = [
        [
            'slug'     => 'bis-certification-consultants',
            'title'    => 'bis certification consultants',
            'template' => 'template/bis-certification-page.php',
        ],
        [
            'slug'     => 'cdsco-registration-consultants',
            'title'    => 'cdsco registration consultants',
            'template' => 'template/template-front-page.php',
        ],
        [
            'slug'     => 'lmpc-certification-consultants',
            'title'    => 'lmpc certification',
            'template' => 'template/lmpc-template-page.php',
        ],
        [
            'slug'     => 'epr-certification',
            'title'    => 'plastic waste management',
            'template' => 'template/pwm-template-page.php',
        ],
    ];

    $allOk = true;

    foreach ($pages as $pageDef) {
        $slug = $pageDef['slug'];
        $existing = get_page_by_path($slug, OBJECT, 'page');

        if (!$existing) {
            global $wpdb;
            $trashed = $wpdb->get_row(
                $wpdb->prepare(
                    "SELECT ID, post_status FROM {$wpdb->posts}
                     WHERE post_type = 'page' AND post_name = %s
                     ORDER BY ID DESC LIMIT 1",
                    $slug
                )
            );

            if ($trashed && $trashed->post_status === 'trash') {
                wp_untrash_post((int) $trashed->ID);
                wp_update_post([
                    'ID'          => (int) $trashed->ID,
                    'post_status' => 'publish',
                    'post_title'  => $pageDef['title'],
                ]);
                $pageId = (int) $trashed->ID;
            } else {
                $pageId = wp_insert_post([
                    'post_title'   => $pageDef['title'],
                    'post_name'    => $slug,
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                    'post_content' => '',
                ], true);

                if (is_wp_error($pageId)) {
                    $allOk = false;
                    continue;
                }
            }
        } else {
            $pageId = (int) $existing->ID;
            if ($existing->post_status !== 'publish') {
                wp_update_post([
                    'ID'          => $pageId,
                    'post_status' => 'publish',
                    'post_title'  => $pageDef['title'],
                ]);
            }
        }

        update_post_meta($pageId, '_wp_page_template', $pageDef['template']);
    }

    flush_rewrite_rules(true);
    update_option('sc_google_ads_pages_restored', $allOk ? '1' : '0');
}

<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'i9284781_wp2' );

/** Database username */
define( 'DB_USER', 'i9284781_wp2' );

/** Database password */
define( 'DB_PASSWORD', 'L.nv72pMTd3TZulj5R603' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'QDMac8Rwivp1FvwLDS4cW58k0OH88bg6SsCzE9KrqWee2khdOGEx1KO0ZeqUhBMD');
define('SECURE_AUTH_KEY',  'eTBRL4YKyR8sBZl2lFvFRX0tqMP3HlhD3wCwkCgsDeT9hcuHVf0x2Ps1tiyuvt1W');
define('LOGGED_IN_KEY',    '4erTFquuZf5rT5xFkgBVreydX7JywOzEhM8URzMBqMwDlAAj87pt0tRVBfF9zzEa');
define('NONCE_KEY',        '5JEujEPXR8hJiYo9ngPJSwgfZSAZjhz1OjK31zfPcaHv4i1G0uOFr4ZDWeIgOnTy');
define('AUTH_SALT',        'wSUnKBiUUWbnBmyQmes2yoVLQOidXVEYMgn4fn874x2y6IerhLMI3IdS2QxHQDRM');
define('SECURE_AUTH_SALT', 'YDGuLbV66CyeLbW18qHRtFiT3x4zCLvZlEUasx9XqEspOfSWBaxtmKTxvdSoELZY');
define('LOGGED_IN_SALT',   'j7HhlpE87eD0TAuYJMVaJxLDWhVUp3XI3Wb6JmO0HWaHPqwO8nv4rbxB9ovKiLIh');
define('NONCE_SALT',       'yUQAcVRJyYirmN9ovis1QJBnsf9nHXOxAEmjrn5TjeYmrItRtVqaeUvxcfxNj3Tu');

/**
 * Other customizations.
 */
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

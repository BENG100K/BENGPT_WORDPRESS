<?php
//Begin Really Simple Security session cookie settings
@ini_set('session.cookie_httponly', true);
@ini_set('session.cookie_secure', true);
@ini_set('session.use_only_cookies', true);
//END Really Simple Security cookie settings
//Begin Really Simple Security key
define('RSSSL_KEY', 't86VW4ZgqnvPCW5Swu4ZLOWTO5gDPwYZweitGzNjnpyRGxruG8pTNeRPula9cVQX');
//END Really Simple Security key

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'i10298702_tr9z1' );

/** Database username */
define( 'DB_USER', 'i10298702_tr9z1' );

/** Database password */
define( 'DB_PASSWORD', 'W.bOnMVAXgjIdY68lQK70' );

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
define('AUTH_KEY',         'BCSxrSqzKKEvw1kJ1BU7TPYPlwPjYyb6ebjP16Pf89zIXtHehWAElsWkWOjBauzb');
define('SECURE_AUTH_KEY',  'm0rVQmP7ZoVFQSqeEyZMgDPucIO4wjjTRPT0QOaYKYxiFNTusUbfLXjduUsg2FXl');
define('LOGGED_IN_KEY',    'RHpiIhumDECU9FBWRqQ44mTtNwnA4H9IeV5GUHgQapdmMbE8iYEMdA3mm4AyQsKM');
define('NONCE_KEY',        '8HWlX6kexUpa4yfJzqCpjM3DyDnQvOJUemukqbsxruiCNC7yFph5E6AnlwrBAJfp');
define('AUTH_SALT',        'bpFncMglYcCLar7vPhfnV6J0GZTfGWqpitJM7myyiFodJDLsU3JvIgRlIprGb9V5');
define('SECURE_AUTH_SALT', 'RUwIZnJEkh8y6kWIK9encrr4BtuNHN5e3v7As0IbdEeBNvmitASBwVkGme9oO74R');
define('LOGGED_IN_SALT',   'qa9IWQNnNzhMkwyznd5RZJXGRjZLka7cEyuqtRb5TiGE5BkIgiwDNt95infjqJ2L');
define('NONCE_SALT',       'mhM71Ax7YA5hPJKb0AP0erfiqcqcXU5IRrFM82GRQfEAtl8GFaMytPmcieJ7feq9');

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
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wawl_';

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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

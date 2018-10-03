<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'esqapcom_wp974');

/** MySQL database username */
define('DB_USER', 'esqapcom_wp974');

/** MySQL database password */
define('DB_PASSWORD', '.]U99TSZ1p');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'xbqxiei7otvth9grbwajqywikxo0fclych7l7kijuxtnnm0o2cgaxcwmctnzssm3');
define('SECURE_AUTH_KEY',  'aqm9dnir6epeydzhocqedgyak1xidpdnjbpfr17p0e2ebhqqpjs7u4eze31ocorb');
define('LOGGED_IN_KEY',    '85c5jno1mxxy7vcrxss0jci6copepufwvv7nzxb4ovif5fexi4dcu9y8pqfp0ein');
define('NONCE_KEY',        '84m64y8clu8drtfwjry081xflacnqd4kzs6xwgb0glw3adqseopxquesnicxyu55');
define('AUTH_SALT',        '5fozbihj6anqilp0q2lu294qqx5bbsuwj8gbohtzvvz4rxfjymcp8leqgurdtqe6');
define('SECURE_AUTH_SALT', 'pmzvj1fbrwdoec82fevyrjzqdps6abyisashulcf0fo7t3cpttwqasxwvcowk86b');
define('LOGGED_IN_SALT',   'q0lkepkegsexxrrolqzsnnw4yjoygtqag7xbsrtqmifoq3qmk66j7rjm5pbwtz0c');
define('NONCE_SALT',       'loavchazeya3sszh5vvb7l4iphoelcau3vyyez71ah5wretjzpzbhbsyrbok3hnl');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wplwjz_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

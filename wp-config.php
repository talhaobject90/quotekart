<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */


if(strpos($_SERVER['SERVER_NAME'],'localhost') !== false || strpos($_SERVER['SERVER_NAME'],'192.168.0.104') !== false){


define('DB_NAME', 'demo');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'localhost');
}


else{
define('DB_NAME', 'demo');

/** MySQL database username */
define('DB_USER', 'admin83Gwx1F');

/** MySQL database password */
define('DB_PASSWORD', '_LyqlB47rYKl');

/** MySQL hostname */
define('DB_HOST', '127.12.12.130:3306 ');
}



/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         '5[<;-5MSm(-pr=wq&n}-P`lz;70%j0c9<tCo4T^kp!M,XJZ+-UgZIA~VO{CoUhis');
define('SECURE_AUTH_KEY',  'vR:gnbkE:Df`##)u$}M~ 7+d*-4=s^=sK/lJ|1*.:L+g$XK|a/05k{hN-LJ+BzP$');
define('LOGGED_IN_KEY',    ';^P8]I{}rpWpp^QX`XaiDj++@4#,kC@e-(=Q2W+B<~GssGU<rx`mlm`GHVPJKYd-');
define('NONCE_KEY',        'k+^2f1yX6#3vI_I%3F~dnZbBX!f&j:daH]}kc]|cwlAY*~rXeoFYZ7e$r#1|+ceH');
define('AUTH_SALT',        'v4Y:h?#{-WPc=|i%6c+=E22hqPc145-lE0J;mxjQj+lp5wYzw(-)F/M B^6PFcI3');
define('SECURE_AUTH_SALT', ']4+vp8wg,XCRFcQ8!y$HTxPYsB+80d@9;+=8wphfi,R9nXGqm;j02QZ*p-1iFi*1');
define('LOGGED_IN_SALT',   'CT{9@/Kde}| ,#kHcDJv3f?^BOakG]xp-d2#GD/8eRgC*ZXS>`e{o3s:-m@SZ/c1');
define('NONCE_SALT',       'z7k:q}^(]R5g%G/Z]aG/{ve@W#o7oD|4:.d@]PSz6p3d/x_~S&~>MF:[Li^un04N');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

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
define('DB_NAME', 'staging_game');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '.eWoxqmATCJv-p6X7#`o]n`4@9*bg10V|iUqoQ+h]gmjoh>W^zV{u&^`lVc/k s~');
define('SECURE_AUTH_KEY',  'XyDC(;^wErfkdfMI{P0e@Y{S*,:];;*!~%%Flxnh<0]#@>llbt;zMwQ@08Bm2XtH');
define('LOGGED_IN_KEY',    '?^jkU; k^#ot:xD6yXwZ;(tfgf+?fDF8ileB<GHJ8*OWG4/o5!<Zg{>5RDqLM .|');
define('NONCE_KEY',        'bkP,C ])VI~S5F#kp2+UP+a#gv_o+#uLCXH(rc:)!J)/i-S,M~+.Rtx)7GUM-o72');
define('AUTH_SALT',        'hYUbDl^gc.4vrv1y|V+L|CX%~d0kf6EXtt3n.hfmw-N7.R<,E4&)|=_k3GU^zQ^b');
define('SECURE_AUTH_SALT', ')7g;_{Yo?<Sa~ZA]daF91`]qRi+1TAK~TT7xc+;TZhc^v8x(8J=?,WuYrW|rSLi4');
define('LOGGED_IN_SALT',   'A8@Ob>oi}~+T:`[d=BUTm*+.Jzd$phw|WRmjew,Wx%X>Cqu#3|#<sDo5P7y$Psh@');
define('NONCE_SALT',       '`coVH:WTJ-z1{SYFPvL{cjY)v,E}[o*zo_9s9Lq-b6-HI7Z&Uajr?%hbm-]}nkTX');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
if ( ! defined( 'WPCF7_LOAD_JS' ) ) {
	define( 'WPCF7_LOAD_JS', true );
}

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

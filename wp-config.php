<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'thelinks_wordpress');

/** MySQL database username */
define('DB_USER', 'thelinks_admin');

/** MySQL database password */
define('DB_PASSWORD', 'mf[X+7o*(gCk6');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '}yo8>6#uy[~#%$~L9|MD:;y.JXUcIcQlHi6_&>^~2il||Z}+.DK6XXe-fW+N+*xh');
define('SECURE_AUTH_KEY',  '%SR>ltv4D!B[(m$6xV9qiL@*+K|@p//vw($frLfK:_{^c(qiY&1qpxx(O2^{)]27');
define('LOGGED_IN_KEY',    '>F76`S2z|~Q3~N;C!P:]hy ez99N#YAFBMK%kIQcLf,dM`qh[/BW:[X9VyCrn:I9');
define('NONCE_KEY',        'q*(I,vRfIe]>XIt`!E!ii,9}OM7LBip/0^ae]m@%a))>Et-C7UaGp5}9f3oh>{+?');
define('AUTH_SALT',        'bxSB,oLhtt{])q-@ab3=oq#d5B|R][=1GC3_d_R5ch/nPv>&Z$b3c{.rFcmTNGvT');
define('SECURE_AUTH_SALT', 'Qb^%-~J$7HJbV1@R>Y2|nV%M2M-(^htA-@l|T.o;wrLZ~lH4.O_Z8?$-|em>ZdlC');
define('LOGGED_IN_SALT',   ':b@V8ZQPc+D}4Y4ays5Zc%2HM&r/OO;k3|qd@k&sD+hIh#aR3k$-wpanmH+pZsoI');
define('NONCE_SALT',       '<1-$|C]O}HOO`}P`Xj~q,8MN/~BM|,Rjr>A`n&w|t5P<Zf^rEZ!}%m9(#seOQ{b5');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

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

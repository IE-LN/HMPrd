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
define('DB_NAME', 'holly_madison');

/** MySQL database username */
define('DB_USER', 'holly_madison');

/** MySQL database password */
define('DB_PASSWORD', 'holly_madison');

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
define('AUTH_KEY',         ',9H wfS]SF#0 x_R}|I[ZY?|BGOaU50]U:+L*iwO|,.|x1c`#NOc(u<M]t+8w6&{');
define('SECURE_AUTH_KEY',  'y(3-tlk|)3u)#>3iM-Q#I#FBma*zXD.blPq-g99e$|dKmUDNWXNr0QQiI}ozKZR=');
define('LOGGED_IN_KEY',    'Gn>:6[$aIHD-hyKsHKes[?QagG^tPW):6qE)?af9baEc+<rs4@9=<SQD|/Uw&/^e');
define('NONCE_KEY',        'qTO6De~K+YI|,Ieu*SsB3#qKRDLX{=$-u->|^|:a9.%u(Q|@&ZR$t4{75MQ#XMVa');
define('AUTH_SALT',        'eW)AJu4FreYB:!t)5+i}HA7J-C:[OnHz1XyFUoI+3beYOh9}~_VF P%iGEYS-+rr');
define('SECURE_AUTH_SALT', 'cDCO`+W>R* *}<1pJ.^kVEQAHFXkyQQ(]K_jw/Xv,IGu^Vu*ec:E*$dxp>uLZg^U');
define('LOGGED_IN_SALT',   'Z4H!_X6}BBO;b>5vh;hDmZLnb=.tgh]+<eR+#+|q!i`Cyx53}o>O`l--<lWY{3dc');
define('NONCE_SALT',       'E~bTl{^Atq$+m-hY_nl YMX`|`V%k^}3f2WluwchQ_1Kj/<-u173wA6s ke+>4;i');

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

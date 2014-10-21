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

define('WP_CACHE', true); //Added by WP-Cache Manager
define( 'WPCACHEHOME', '/home/natpol3/sprlaw.dreamhosters.com/content/wp-content/plugins/wp-super-cache/' ); //Added by WP-Cache Manager

// These setting enable the site to work in different envs
if ($_SERVER['HTTP_HOST'] == 'local.sprlaw.com') {
	define('WP_ENV', 'local');
} elseif ($_SERVER['HTTP_HOST'] == 'stage.sprlaw.com') {
	define('WP_ENV', 'stage');
} else {
	define('WP_ENV', 'prod');
}

if ( WP_ENV == 'local' ) {
	define('DB_NAME', 'sprlaw_dreamhosters_com_2');
	define('DB_USER', 'root');
	define('DB_PASSWORD', 'root');
	define('DB_HOST', 'localhost');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
	define('DOMAIN_CURRENT_SITE', 'local.cbsinteractive.com');
	define( 'WP_DEBUG', true );
} elseif ( WP_ENV == 'stage' ) {
	## Currently not set
} elseif ( WP_ENV == 'prod' ) {
	define('DB_NAME', 'sprlaw_dreamhosters_com_2');
	define('DB_USER', 'd4g65atp');
	define('DB_PASSWORD', 'MYfn23U8');
	define('DB_HOST', 'mysql-1.sprlaw.dreamhosters.com');
	define('DB_CHARSET', 'utf8');
	define('DB_COLLATE', '');
	define( 'WP_DEBUG', false );
	define('DOMAIN_CURRENT_SITE', 'www.cbsinteractive.com');
}

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', ';u/^/9Qr^mSXlLi(b)MgHLo+Odr!2t#X6GkyLZ*V`z6Qzy&uWOkW|Y4fub6+GWP6');
define('SECURE_AUTH_KEY', 'IAP(pFQx1?ke&w%BFIT@2hiT#!*zkb4jXRRofPPbnX(l$vgA#+d#A5c91y+K1_(G');
define('LOGGED_IN_KEY', 'j71xtIKA_PC3/c"7CT0df5/LLUOW54mD3/733~VtrX6x:|2^#F%W4P88_z6/~+cc');
define('NONCE_KEY', 'Ojhn43wvE&8KNpPlIT5OXC+!c@5kq(/1Dddv/$wgKbOL*zlWUYH"JM&?"2$/:CgT');
define('AUTH_SALT', 'Q%LN1VdJI^)Wo#Ccw!^m(cCM(LWYeEu|`WQFs)tgbvS/Af#O|x/wqQVPIiSIkZ`&');
define('SECURE_AUTH_SALT', 'ZrY:vUXzdDYFFE5JavhO0^~c+9pAoD#A7r)Tv*znVBe:A2Air5Is"AnZ(*c:P5AB');
define('LOGGED_IN_SALT', '*rEff1:lvV1e"?L^|#6K":D0Vmmu)qsPXfD8xUW@_gw9mrT2hEhL_x#*EN*o0ryb');
define('NONCE_SALT', '^+`fbY83GW2m++4)U*`m9Ex:d_`4ly~J47lPXlByQA(B00D~^%+bgZ3f`qNev5g*');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_d8gz4i_';

/**
 * Limits total Post Revisions saved per Post/Page.
 * Change or comment this line out if you would like to increase or remove the limit.
 */
define('WP_POST_REVISIONS', 10);

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

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH'))
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');


<?php

//Begin Really Simple SSL Load balancing fix
if ((isset($_ENV["HTTPS"]) && ("on" == $_ENV["HTTPS"]))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "1") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_SSL"]) && (strpos($_SERVER["HTTP_X_FORWARDED_SSL"], "on") !== false))
|| (isset($_SERVER["HTTP_CF_VISITOR"]) && (strpos($_SERVER["HTTP_CF_VISITOR"], "https") !== false))
|| (isset($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_CLOUDFRONT_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_FORWARDED_PROTO"]) && (strpos($_SERVER["HTTP_X_FORWARDED_PROTO"], "https") !== false))
|| (isset($_SERVER["HTTP_X_PROTO"]) && (strpos($_SERVER["HTTP_X_PROTO"], "SSL") !== false))
) {
$_SERVER["HTTPS"] = "on";
}
//END Really Simple SSL
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
// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'borisk1594135682' );
/** MySQL database username */
define( 'DB_USER', 'borisk1594135682' );
/** MySQL database password */
define( 'DB_PASSWORD', 'sYSz7IC1' );
/** MySQL hostname */
define( 'DB_HOST', 'localhost:3310' );
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );
/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '<funX%j*HBz?+6Wn&2+;A8qSRw@h;v}H0~K(r^:fU-Hrl,6*NGd7`,f3|)6qCLd]');
define('SECURE_AUTH_KEY',  '/+~v_#lN^GEF8i`FC-|K4|gCQ?a/KglQ43|2]63{eB&)+x)NCxn_LmY4}/#1(%lZ');
define('LOGGED_IN_KEY',    'jaS?@VoOT_F=dx+Tts=W&v@mG*aPI(L~DQ1@/K|YD5[n1fu,FsXN>46jkMJ1P7M0');
define('NONCE_KEY',        'a$t`Oe^k,jRL^|qIlV1a 39umzKB2a,xX>dJB96`BF@=0WvyRe<<JYayM@emCx|d');
define('AUTH_SALT',        '<a2rC+P7+Y$?%*xXT?pN`kPaK}:Vy8GV;`[*G@CDv;MA992y&-.t/+`H(h!t}Kmz');
define('SECURE_AUTH_SALT', 'I`3A}7ko`YI4}ulVLFZ2rG9uO|G,sN:cON)xgJKtPv:4Ub8K.MEsI)+{mDx;WqKu');
define('LOGGED_IN_SALT',   'K,-zB:&/cPl4=.%?}5|IP[Pb+4R9~~$KupJQXi|w}|qP^G}|ZF_?h@SM|>U?*wos');
define('NONCE_SALT',       '[H<W:soN+99f/:~[8gXT:[/RbcM~!8Mg/ *B+@2$e A7USX!).M6k_|I{K-6E+5A');
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
/* That's all, stop editing! Happy blogging. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

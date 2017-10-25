<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

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
define('DB_NAME', 'aviannea_new');

/** MySQL database username */
define('DB_USER', 'aviannea_mage');

/** MySQL database password */
define('DB_PASSWORD', 'T4rAflZetaB3U');

/** MySQL hostname */
define('DB_HOST', 'aviannea-db01.cdgdjpajbtw8.us-east-1.rds.amazonaws.com');

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
define('AUTH_KEY',         'H:_ +U:eI :-d&Is?yHsrJ1#+|ploWj=n9>Ef:r-xx+S/@UPM*WmD`rr|xQ-N9KR');
define('SECURE_AUTH_KEY',  'Z|/fukk)|*dU,RW *vDDIL[Vy5zJ~xAq-=I Z}3]I`N?X,>4<Jh;v$R)nBUnlS+%');
define('LOGGED_IN_KEY',    '^8DJM=zZI!:L#hhF~INgHv%v&A7}x>.U/o[-Hm$eD}#>fT7hp3:C6-$iwy]Z9W/c');
define('NONCE_KEY',        ')^DK`PWq_j`5|eCAA^E,g`9&]:P|Pv=&8w;u.SnjTREWAj4sF,9{f?i(Zg*$p28J');
define('AUTH_SALT',        '+fw;p>Dz,f3FM9`eNO(!DjNP3O;GX+@DuB!;|FQ3lQO-R+@L>{Gs4K1mEF&H HTg');
define('SECURE_AUTH_SALT', 'AK7<}j4NbTu~W.]3#&hzc-j|EVyF:xXD2-o~x(!:hsC!Z|,KcI~q=V !zK@~ lK_');
define('LOGGED_IN_SALT',   '+S@%/wv*3 G.Esn@WD_ZDg?kCcg8A3-HnL!Dx!~(7[w.D2=L<D=~80B++;QnZ:8L');
define('NONCE_SALT',       'W9,Eb,d93-*T(XcrA`zW4k;sRDj(1+D*:Wjf%mdbH`+.?PD4j9<D#ngzKuR@k4Ht');

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

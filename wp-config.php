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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'wpuser' );

/** Database password */
define( 'DB_PASSWORD', 'wppass' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '1]r6,V/9~S}pTFo!}#TS@rf2<hci_<h+Dq1K!dBCT$/zDdi_WY:P8V794|_tDktc' );
define( 'SECURE_AUTH_KEY',  'P1))z?Or?QY/jzftOJCfY:$zln~x7D4;J~zP6O6J7=SX Y4R8dChwA!LN0&NsQq!' );
define( 'LOGGED_IN_KEY',    'yxk$QLJ=g23iOSl.pPGPonU$klUeuoR94 02Jt3*1,w6W&@@@x_odr6]SsAWxBJD' );
define( 'NONCE_KEY',        '):_jfFKy|+|/_}*v.NkGVF~mFY96%KtkDDFOW[F*k.i)cT84>->KRZD#mqwxX~U_' );
define( 'AUTH_SALT',        '[s5vBSNO#(3Yzbuf{];2tQ4@)grx{,?.wd4kv7,BjnQS*.159D6eV|a=VRwwr~J%' );
define( 'SECURE_AUTH_SALT', '[|r>IY1A<nN5P6qmKuFTtr#~D-mPQ$pBs0W,0#2R~v(NLYU`5sOLq$SqO|S|D?-Z' );
define( 'LOGGED_IN_SALT',   '@R>x<d>wDEv6o(!EUx5(eL,E&|%|j9VU783dVK:*[JI$nH;T|(ZCnQNf2$O}zyt2' );
define( 'NONCE_SALT',       ':s$oHZv[ZZSJ4|9]sqY9:.b)Am7^,qb;Z1/0/`g,@+&z(_Qlu$V;fJ9q+S8H/EE[' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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

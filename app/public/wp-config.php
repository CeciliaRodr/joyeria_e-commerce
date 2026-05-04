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
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',          'n >FLN<q.I=){JWgC]*QS=Nu$e-/<?:#vU3k!Gd^m$Oj !,*SAb8rYup1!PlL3CB' );
define( 'SECURE_AUTH_KEY',   'hr*)j~Fj{*dWze1?7FsJ*h=|R^]IAw}Fu5X)bO}3B>:X[s(iER{dv$R3CUH[C?x5' );
define( 'LOGGED_IN_KEY',     '9q`Jb<9jDSID=v?!34[ XE87<KGsVXj}bv-X~$@`O9;J`O2W~:TmYGLS]2Gbay?$' );
define( 'NONCE_KEY',         '>N~KlF;<:7|2s@(j9q-eoYYKZ9`nrbE+r/39)28$0GeO@$/SpeBXgPIA_-P=|vX,' );
define( 'AUTH_SALT',         '%3 Lm#8Al 9yWBn?[vx}%N1ri=9tXsn`,wU/TUfZ4yOynnAARB%! x?^TYNL/wi3' );
define( 'SECURE_AUTH_SALT',  'k a_|.E:ZlYXUHXdj)8kLjv@xk$EJvK+8|$`8+F{_@1i*$$Vlpxd/u0.4T4Dc(.Z' );
define( 'LOGGED_IN_SALT',    'S,Hy=+lWR!bf=@c..@r`AEPm9l-g5e:B,v5L@2i|t^y^96X1J.,p+l>MV%&{Cr:I' );
define( 'NONCE_SALT',        ': #h+So}r,,aWX#+$[=A::E/CEU7ZkJ[W59Czx:OG3{sKM&+!el*pS4on_#w=Ui4' );
define( 'WP_CACHE_KEY_SALT', '$Y.,KHJ}yJ(_(0q&L>_lF1C2wwAx`o9upX2em@kSU`2_$e=e|B#!INDZZq;4EN4N' );


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



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
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

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
define( 'AUTH_KEY',          '%|<D#A&2+vA4Ga%f25n0Owq+H~rW6Uu6xxM;:(i,&-Upb8M07,nXO],?9@ZyG1 8' );
define( 'SECURE_AUTH_KEY',   '*=5wg(V%(7.;GbOZ5q*H{U-O<N&Dp0e)bkE]op4uOh+e[@+7!^YpV$_BjEXM.KdR' );
define( 'LOGGED_IN_KEY',     '#]^7miQPskx$Cux$IEFnBCX;{Ij,8sIlIKu5z#M.Pc*6<q1X[[ZSvH^6)LI*Yq:R' );
define( 'NONCE_KEY',         'KPPc>(sU~Wi;_6wM%x8#3?fu?2F.w&YAC#K56lKhJ+6 l$uDpiIf?Z^TW:wtby!k' );
define( 'AUTH_SALT',         'Rfl0YwgPPvl2W}<+}UV]u[ w 8pVbn2iN(1p01l}(*Z Z8GzQ82=6Dg]oW1:9K9.' );
define( 'SECURE_AUTH_SALT',  'sWCfrQxej?<0LA!ck(4n~N2^a|2)vq8=n P|q~4csk,(:YC[^H1M02/sg@jU4XdL' );
define( 'LOGGED_IN_SALT',    '_YHA:$Lq?m}Uy^X,H=(K`>&fK8-4oYiBB?x0lA<5vv2rXSJ:cGazMU?h+^DB1S(b' );
define( 'NONCE_SALT',        'Lx.iiky{aAhSfa7NOf|h2,YU]|/s Mh/jtnk%A ?!N?GQNDc$yq*)#dQ%XYf<u*A' );
define( 'WP_CACHE_KEY_SALT', 'l`.jXf.5s}Aa7V^}vG8%<JEeuPf,l@i-WtnQu*GrZ&~dx)O+2}8D+tD~=0pobY;y' );


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

<?php
/**
 * The base configuration for WordPress
 */

// ** Database settings ** //
define( 'DB_NAME', 'local' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'root' );
define( 'DB_HOST', 'localhost' );
define( 'DB_CHARSET', 'utf8' );
define( 'DB_COLLATE', '' );

define( 'AUTH_KEY',          '%|<D#A&2+vA4Ga%f25n0Owq+H~rW6Uu6xxM;:(i,&-Upb8M07,nXO],?9@ZyG1 8' );
define( 'SECURE_AUTH_KEY',   '*=5wg(V%(7.;GbOZ5q*H{U-O<N&Dp0e)bkE]op4uOh+e[@+7!^YpV$_BjEXM.KdR' );
define( 'LOGGED_IN_KEY',     '#]^7miQPskx$Cux$IEFnBCX;{Ij,8sIlIKu5z#M.Pc*6<q1X[[ZSvH^6)LI*Yq:R' );
define( 'NONCE_KEY',         'KPPc>(sU~Wi;_6wM%x8#3?fu?2F.w&YAC#K56lKhJ+6 l$uDpiIf?Z^TW:wtby!k' );
define( 'AUTH_SALT',         'Rfl0YwgPPvl2W}<+}UV]u[ w 8pVbn2iN(1p01l}(*Z Z8GzQ82=6Dg]oW1:9K9.' );
define( 'SECURE_AUTH_SALT',  'sWCfrQxej?<0LA!ck(4n~N2^a|2)vq8=n P|q~4csk,(:YC[^H1M02/sg@jU4XdL' );
define( 'LOGGED_IN_SALT',    '_YHA:$Lq?m}Uy^X,H=(K`>&fK8-4oYiBB?x0lA<5vv2rXSJ:cGazMU?h+^DB1S(b' );
define( 'NONCE_SALT',        'Lx.iiky{aAhSfa7NOf|h2,YU]|/s Mh/jtnk%A ?!N?GQNDc$yq*)#dQ%XYf<u*A' );
define( 'WP_CACHE_KEY_SALT', 'l`.jXf.5s}Aa7V^}vG8%<JEeuPf,l@i-WtnQu*GrZ&~dx)O+2}8D+tD~=0pobY;y' );

$table_prefix = 'wp_';

/* Add any custom values between this line and the "stop editing" line. */

define( 'FS_METHOD', 'direct' );

if ( ! defined( 'WP_DEBUG' ) ) {
    define( 'WP_DEBUG', false );
}

define( 'WP_ENVIRONMENT_TYPE', 'local' );

/* That's all, stop editing! Happy publishing. */

if ( ! defined( 'ABSPATH' ) ) {
    define( 'ABSPATH', __DIR__ . '/' );
}

require_once ABSPATH . 'wp-settings.php';
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
define( 'DB_NAME', 'wordpressdb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '!bF2S=vtGp}00#R.Mqh{Ht.:7}f_X-{(QfpOssb:stZ5EqY6lB#!Wl9w&C)2c8#3' );
define( 'SECURE_AUTH_KEY',  '3!V/Fvcr|; M-C6Ax]M<LL4b$:@7p96lKWZJMJ+^O:t@%vl,teUOgK50DJc1nC93' );
define( 'LOGGED_IN_KEY',    'f2gOwm6>*oarv|)3uo8=oKE#:?9]1bkfrX#Mhck#l3$6WlW|J66vX1S,}jH(XcvU' );
define( 'NONCE_KEY',        'WrnhruEH=yKV@S+}ev:Kxz,yG?#JWBh(R}yt#B A}i_<avdjc(]qV*HbU7e=wB6[' );
define( 'AUTH_SALT',        '>RTbg3.!7yXG}ODsLN=n6~yjEoFF}6M5>1v(}e[1Wh2%KG0YP4wVJOV$nC]RYjKe' );
define( 'SECURE_AUTH_SALT', '81TEA$FMGe8A,<Qy,2CQ$c/v{i*~[U$/2y1W4MgJu,T?<;VSC-&h]rfIXA*[dy!=' );
define( 'LOGGED_IN_SALT',   '^/VPcRXA.P}~_^j1s_gtL|OtJ3o;-[J+~IyIH!? j_JDv 2FeXr>(4b(z](}HnE}' );
define( 'NONCE_SALT',       '_8u#Q|Pklq9:O=gSAoO[Y<b(q./p!z09-y6;v0;vq^,DqNE|8a^7XiOB){2[kghL' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );

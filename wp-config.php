<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp_dev' );

/** Database username */
define( 'DB_USER', 'wp_user' );

/** Database password */
define( 'DB_PASSWORD', 'password' );

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
define( 'AUTH_KEY',         ']x~89Eki|Q_!h_ec=3UH+hv&FDB.Yr>kl<b-8ScJ^i/5L1&@tLHM- d,~aVYBH4P' );
define( 'SECURE_AUTH_KEY',  'n I#xnBaWK,(Cs8UPK=!3~C<ThpV.aKo7-W*t8l/1El{C>5;$e;HLK1V/r0c$`@m' );
define( 'LOGGED_IN_KEY',    '7CArHEo/#.iT{>&HZa5@p8%|wHs(ULQ9?8)bYLV3?0w@PiT?X_PMJ>76Ye&@<^*M' );
define( 'NONCE_KEY',        '5NbC.j~GhVz9kH0f4ln{lc9;gBZ!1zLw=2%[--PI]:NqW-9]iEei@p)Yk8M5Sl #' );
define( 'AUTH_SALT',        ']]-j0no7]Z[l#:LJP,8+L90{N7*(~G%>PX*U&_GcG=]<lq-/1a!2.6p6gUQ7&ZKR' );
define( 'SECURE_AUTH_SALT', 'qYU~_1Gn2ys]*}R_>[{Ngdh3wMfw*?,`,fxx~W^<.JnYe].rkk$!9p]H`HXbp7-2' );
define( 'LOGGED_IN_SALT',   '(Fkjb}x%DX;Ci zypTkLX}r;!a_]#G&Z7j2W#vN Wlv:=q;m.99/>n0~D6W7W_X*' );
define( 'NONCE_SALT',       '$Oa-Et?ZBe^mp_ `}J67Z$%{z4JqU8t$:9tuH^WyRb;!T`*cvIf(g=G=q=*W=9XL' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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

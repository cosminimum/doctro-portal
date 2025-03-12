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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'defaultdb' );

/** Database username */
define( 'DB_USER', 'doadmin' );

/** Database password */
define( 'DB_PASSWORD', 'AVNS_SK0hXOTQ7UNYaWmFpu9' );

/** Database hostname */
define( 'DB_HOST', 'dbaas-db-9849882-do-user-6931473-0.l.db.ondigitalocean.com:25060' );

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
define( 'AUTH_KEY',         'y@vA?pfRZ[(kXv>k,Q^=qqSdqBJoS%]hKHi,,a?W~W]6|CHV*J[H:C4[T]E!0!i2' );
define( 'SECURE_AUTH_KEY',  'd.(<b@Ij-lm)]_ABJ-)(@w8a;_6%LsI> x9t+Yq0uta[+BFEm7nw6ClQozLRwvXy' );
define( 'LOGGED_IN_KEY',    '/7gnj2Fz[&[,b}UhBS~H<%oeL1dG}u/K0HuhREC;m*JvU(m0OQ;hh`>8|~%%OKzf' );
define( 'NONCE_KEY',        '#x9G/2w|ysCt}.)/]LAjY4)otQgD}b=ztD~T*^bTzONli|_`a$D_-|RTZznx4~[$' );
define( 'AUTH_SALT',        'q|*;BO4(rhru^2Qn19<3nPJXsld1U4r)fJfV}03;HL$6=Uk.gguJ><*to5<;:#_x' );
define( 'SECURE_AUTH_SALT', 'fI{v +$Sv1 0yy6axnGc aOSOFrf9~Z%(&#OK5!o3b=@x{x,#_#@b[b$?)p|[{Ft' );
define( 'LOGGED_IN_SALT',   'MU<H_mjhBC-JYd7E%LFRQ>V})I*2KU^SW,?lH~ D=!~oyW99:wX#P.g+fO@yKmI{' );
define( 'NONCE_SALT',       '+Nk!/gD%& yxY*p*p1,K5;g&25b_Qc ~`DAe11e2R~Z@ECe6_6]U6#M_T9DN?|EQ' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
/** Connect to MySQL cluster over SSL **/
define( 'MYSQL_CLIENT_FLAGS', MYSQLI_CLIENT_SSL );

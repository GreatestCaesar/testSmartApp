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
define( 'DB_NAME', 'smartApp_test' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '1234' );

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
define( 'AUTH_KEY',         '}&7Lng3Zf.UR&:lf=wu{wp4q1p7V Q{Duyz7/I2^=Ky2(X7@G?N~6Lz+e=Xm?,WM' );
define( 'SECURE_AUTH_KEY',  '2Ye= k1[X!pojFJabPe!SBE:nx;^$,=RK/m]b%9Z^yN)h8hv_dl%BWr5xTb djBM' );
define( 'LOGGED_IN_KEY',    '{wSMOo-lh~ph,H4a vil/_/t5+eIg!M>kigRf}u,<u=j&%thH!Iz6pMlD^vxBdF-' );
define( 'NONCE_KEY',        'TV#|U@7m%6h~Bw$+e!tT+5$Fga/,2SE|DchsMvW2U~h^+X_6O1dR/vH=9;]j&u.5' );
define( 'AUTH_SALT',        ',gCE27]=gwT:elf5Eh[^u$l1*6LzR[J6v;vO?ziTbV;cr&&B_p8Vns&iyN;?9#n^' );
define( 'SECURE_AUTH_SALT', 'eOL95_3gB0nX3m5:e-b>;?/v>V+S@p-jjR_&# o:*;jVq/>LSf9U# uX_cNvxgJV' );
define( 'LOGGED_IN_SALT',   'Dz;ZD,jR4=]h*;oHkkI)WOnQQPV2_l <p^zT}s]5r|!wLC0G>*_e2wm?],%d!&+f' );
define( 'NONCE_SALT',       'EO>NC0h7WJ+QtoM3YIY5ny$({CVL/9}<eu*xbyJwYt&O+?62FjDGSL%No?AT(ph?' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'smartApp_';

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

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
define( 'DB_NAME', 'plugin' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         'Zl?<*A!9NRbxn;t>P~3U$>AxfRgX`MY2nPJc~T:sj[bks9u<rjn2VE[=mL+MAhO;' );
define( 'SECURE_AUTH_KEY',  'PK-n0Q81i A:B_(EngCDVXZ>_tbn;?:n;Ku%+c)Jih[O%G6jCq:1be1Al {SAL9C' );
define( 'LOGGED_IN_KEY',    ';yp^/]b^GUR5<~kob$Su`r{&5P@Nuk)DI2NHj/&Y#puTB0*)FQ%9@grkR3z,0:U=' );
define( 'NONCE_KEY',        'q@K5@9-f&s/=f^KZ;98rOb4JfD}/l:_k_`}K/::0E1$ ZuNVoAhV/<z/>yhFt;}Q' );
define( 'AUTH_SALT',        'j6,KcVy<oi=8osp72TZ237(p.]A2KaVGiRh^2j-Op40pGp_+uXWxo+f Bn_<Fz+M' );
define( 'SECURE_AUTH_SALT', '+Y|q)xY7jI_jU7$|=97ztz2&>,,J][|ON?#QD(#^Ea*b&jZaLG&urR)q(oi=MA7e' );
define( 'LOGGED_IN_SALT',   'aAzUMd%b`Goi$eb<`&gJbHUle.]eRx!P:,aG=@v`zy.;; ,CoF)Pr>ulk-%Z-GsL' );
define( 'NONCE_SALT',       'W:v_@K5#,SSBW>xX1rOmpJaK9_t.qmd,Gh~tbUv:cohxn]2Y6iklNU7Fz9<GBi=(' );

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

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
define( 'DB_NAME', 'arabiacode' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('DISALLOW_FILE_EDIT', true);

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
define('AUTH_KEY',         'mmmh-EpzQD{P[fs#rU_f*b+5Latstjxq4]S(z-D2[i#F_%tRI}kAmp8g_oi1:as|');
define('SECURE_AUTH_KEY',  'SRhK6*CK,WCqdB&T9.||g=Ru[;g[>U(G-l?Ft`88JN19/oqLdJ|t<QwT[.xk?{( ');
define('LOGGED_IN_KEY',    'deufk7-Ev9`a!-|G$g?AYMyuF}`xbCF{,.9h*yJz}IODN86l%kj}vcb.]]omu`CV');
define('NONCE_KEY',        ' <%5 )f+>/Bqp$I5>4PFZK_Whq,J2eu9aEn:,E lDZT|5RopTeMq;vM81p&Qbyc!');
define('AUTH_SALT',        'vqcs&NQ[ !f#j(OJI8,WBLBGmvIE2 R&9#r$`]axlHVN)S;4&{~RlIrq:<jIj/Fa');
define('SECURE_AUTH_SALT', '/|vD~5r`y[~U&*R%OW:qGZ$IlB<*bg`I+PJ+xJG%Z2m:d aD*?!%d aB+m9KN-w.');
define('LOGGED_IN_SALT',   'emTx6914B-al>/{Y[^9!^+pJ<lkR]fXG.E`hV(qpohlj%0`;~~!U$W-Ry&#7.}6+');
define('NONCE_SALT',       'mq!+9v_SJHE<spMxV4fG/Lu|k88pg(7>9Uv48&rhAmn|f[$pKganm6]K$bp$%sb<');

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'ac_';

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
define('WP_DEBUG', false);
define('WP_DEBUG_LOG', false);   // writes to /wp-content/debug.log
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

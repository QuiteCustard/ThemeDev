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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', "awt" );

/** MySQL database username */
define( 'DB_USER', "root" );

/** MySQL database password */
define( 'DB_PASSWORD', "" );

/** MySQL hostname */
define( 'DB_HOST', "localhost" );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '+_Gw28W*P7k31M/bIrp@:DSSAJ]gnZcyeY5-A2%2O-6p4d%K;*|00692[_W1[433');
define('SECURE_AUTH_KEY', 'v_4JivmokVn92t+WS37u5F7F2&gD1774Pu[]]CQ3]17+N)H6[g2z6uGGx12+IDd;');
define('LOGGED_IN_KEY', 'ZKx3a04gT_D;aAIXl8!@7w5!4IV10K__!kI7sOQuaVOVK#:JV50Vp8r@w%N%g[9:');
define('NONCE_KEY', '*Tzb[)/o#)B!!bB;2(4+B!080k/&8~uGT99k]#7W3U0;![Hw7i48PJNsrP+)7T2L');
define('AUTH_SALT', '8j7pm_cJv*]9y5ui#Ck0R3P0;BC7x@3;L36N4p-@sHt5*D5@SJ;QE52J5v5/_7gK');
define('SECURE_AUTH_SALT', 'n!yt@#HAE0X!x[_[bS3+:07fO27lT79[lvu@Jf&lW3hQwhREfUMXe5h|8t3p3vKD');
define('LOGGED_IN_SALT', '+m8x8y12c6:JA:XT!Kr0XE*|4(M7pu%bV51f~b537JrRX%%uF*:l;eCN*;PJ85Q8');
define('NONCE_SALT', '2VYWr)]Ia3SY+Cy80tVgdO3NgrH-hIiVk)zL0[t)/tbPI6@2cOT81i!px(iAM/(L');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'PO01PO_';


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

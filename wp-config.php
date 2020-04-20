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
define( 'DB_NAME', 'cartoon' );

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
define( 'AUTH_KEY',         'BQE[S-gk,G{(DX`!>zvv^uB$fVu[V/Oe,{s9kC|)ilxu`8(:6Ba7pzJgoRzI*Q&A' );
define( 'SECURE_AUTH_KEY',  'qehJ^f:GSdU1#dwhV%wK,D/,xp&W[g7fM=G!3ac;@h`v>::mC+;?,&Ua?S%V&F-V' );
define( 'LOGGED_IN_KEY',    '@9)4a,)-SY#]0P6*i]FVfEwyRx:+PrV&>1-G-!YpJ-tSv^9;BBnDC_*nL 3)blR~' );
define( 'NONCE_KEY',        ';Pie@o,]8tkbhgyut:mo,?X*~.ohXm8)/?!$ozb$32^ryI_dm:`6;Jk-pOIaLQy#' );
define( 'AUTH_SALT',        'JV2}N;YWj|Xc~J ef4R4k*MMy1}(9qaVO7NKS1pIU}R9C|h/%gQi4)f3)cETR Vk' );
define( 'SECURE_AUTH_SALT', 'K~H$v+rg3A(!6u[YIp3F,kw[5kn&AN=u)rMf2Z:5  VECa,O:Ov;MML5Y^{tdKCa' );
define( 'LOGGED_IN_SALT',   'A7D3[Y|tcTQ_k$Dw#PO7l.:Gh8c0;:s V~}i,Ra^e#fc59$R!]e+8r(zI0uOZNJ5' );
define( 'NONCE_SALT',       'Vf0[Q38k/JGpwo4y<Z]=|t%;E8Y4oB]h8LI4{}8fylZwe%acY}SUS]j>NYNbE$(b' );

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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

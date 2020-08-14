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
define( 'DB_NAME', 'flix' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         '8B}~Q.(0mj}a/8RS8mcw<#~=QJ&=nN(KqST-sGIt78b1~3D);WB!;59g8xjtd>NE' );
define( 'SECURE_AUTH_KEY',  '.4Du48#Y,E4$ni7$3K]n|{SQ.!~uE:?s{+c$#0iM(FPkq8b7ENRER.(%$6a/UH@1' );
define( 'LOGGED_IN_KEY',    'Pn}JJiu^,|4x[lrN>$bQpA#>[jYqLtP8P5Hv .%%g=^@Av|/u. <vbz7/!MPd,dc' );
define( 'NONCE_KEY',        '|ki2iU18s`vY|?[XHBny:3pn+2|!O8pNeh !A`EV1OffM`>{VjRY7wv<OmIhKb7_' );
define( 'AUTH_SALT',        'wO2z+</Qygxm@yRejRt$BYJFbCfO5]vy+_5b{Ag8!39!G>$0J5H37Hs&qB$G$(?@' );
define( 'SECURE_AUTH_SALT', 'jHPz&})j>10nsOR}Q2O0^n?,YH.7/;Y~W-k{w%<646Lt6u4VDW?#R;>Nhd:)7n2 ' );
define( 'LOGGED_IN_SALT',   '>WL2DF:@h32yjmd_4F4=.wR;&sHX{RUCgd3nQSZq)Z{4JhW&#@aPMlwcU| Tm[sS' );
define( 'NONCE_SALT',       'eRLD=ciay)E9Y.Dx%tkH|2mLNw~HR3@C?A=4:DJ*{`)#k2 }8s6.Y6?UFyfLmpoP' );

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

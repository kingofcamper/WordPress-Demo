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
define( 'DB_NAME', 'wordpress' );

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
define( 'AUTH_KEY',         'k}N>E#V7@8+#S;?2;>[f=3_}C%(q) t;4d<re9(_-sUBM|jHz(yv+kTH8DUZbe@o' );
define( 'SECURE_AUTH_KEY',  '=BMflTs]^hJaBpDS&32!DTwD:liiEpAr=#2som){YlwmRzK:@N4JIMbOoZ4e8Xi4' );
define( 'LOGGED_IN_KEY',    'c`^^I//S)d(Qzsma;rl7B;G:emU`Zrj]D5qaaUa9#8S!Tcq>WatBtT0El=}azw~i' );
define( 'NONCE_KEY',        ']q8{JS@c^O)S0R#b]YLb#XoKxRZw7-7)I^t-PEEhYvZZ_f|y0]9YbVc}[|nL[ 1?' );
define( 'AUTH_SALT',        's(StV^1YO#={+TCBppY%e/G*5BQ]/4YttCv{5Z2lwSjY?Uh-c*Q3{MXW/5uh$ijy' );
define( 'SECURE_AUTH_SALT', 'kx=!ZE-z0/I<Xiaxk:A?}/a#A@SM@S+.)8*c{}.Ae#O*#5Bhc#&^+W)~Y]cf6Om&' );
define( 'LOGGED_IN_SALT',   '.oZI7%n?jKnZ}s0zh n>C@tTjh1!0$W;v9 v=x|Dm_AE_#Djg&TDp[a28l`:Ec)R' );
define( 'NONCE_SALT',       'ERS[/w9Gz;S{5DUD$8s-oB=B}nj|y!0EP2.MWc?pyv9KLV7R_GN9%Dns=jn)uH66' );

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

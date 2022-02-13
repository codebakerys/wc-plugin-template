<?php

namespace WPP;

// Define names
define( 'WPP_PLUGIN_NAME', 'Payment setup plugin for Woocommerce' );
define( 'WPP_PLUGIN_SLUG', 'wc-payment-plugin' );
define( 'WPP_BASE_FILE', WPP_PLUGIN_SLUG . '/' . 'wc-payment-plugin.php' );
define( 'WPP_PLUGIN_NAMESPACE', 'WPP' );
define( 'WPP_PLUGIN_PREFIX', 'WPP' );

// Define paths
define( 'WPP_PLUGIN_PATH', WP_PLUGIN_DIR . '/'. WPP_PLUGIN_SLUG );
define( 'WPP_PLUGIN_IMAGES',  plugins_url() . '/' . WPP_PLUGIN_SLUG . '/resources/images' ) ;
define( 'WPP_PLUGIN_DIST', plugins_url() . '/' . WPP_PLUGIN_SLUG . '/dist');

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'add_action' ) ) exit;

require 'Helpers/Hooks.php';
<?php

namespace WCPT;

// Define names
define( 'WCPT_PLUGIN_NAME', 'Payment setup plugin for Woocommerce' );
define( 'WCPT_PLUGIN_SLUG', 'wc-plugin-template' );
define( 'WCPT_BASE_FILE', WCPT_PLUGIN_SLUG . '/' . 'wc-plugin-template.php' );
define( 'WCPT_PLUGIN_NAMESPACE', 'WCPT' );
define( 'WCPT_PLUGIN_PREFIX', 'wcpt' );

// Define paths
define( 'WCPT_PLUGIN_PATH', WP_PLUGIN_DIR . '/'. WCPT_PLUGIN_SLUG );
define( 'WCPT_PLUGIN_IMAGES',  plugins_url() . '/' . WCPT_PLUGIN_SLUG . '/resources/images' ) ;
define( 'WCPT_PLUGIN_DIST', plugins_url() . '/' . WCPT_PLUGIN_SLUG . '/dist');

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'add_action' ) ) exit;

require 'Helpers/Hooks.php';
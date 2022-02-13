<?php

namespace WPP\Helpers;

/**
 * Name: Hooks
 * Call the actions and filter
 * @package Helpers
 * @since 1.0.0
 */

add_action( 'init', [
    'WPP\Helpers\Functions',
    'initialize'
] );

add_action( 'init', [
    'WPP\Helpers\Functions',
    'enqueue_theme_scripts'
] );

add_action( 'admin_init', [
    'WPP\Helpers\Functions',
    'enqueue_admin_scripts'
] );

add_action( 'woocommerce_init', [
    'WPP\Helpers\Functions',
    'woo_init'
] );

add_action( 'init', [
    'WPP\Helpers\Functions',
    'handle_actions'
] );

add_filter( 'plugin_action_links', [
    'WPP\Helpers\Functions',
    'settings_link'
], 10, 2 );

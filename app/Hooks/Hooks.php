<?php

namespace WCPT\Hooks;

use WCPT\Hooks\Functions;

/**
 * Name: Hooks
 * Call the actions and filter
 * @package Hooks
 * @since 1.0.0
 */

add_action( 'init', [
    Functions::class,
    'initialize'
] );

add_action( 'activated_plugin', [
    Functions::class,
    'activate'
] );

add_action( 'admin_init', [
    Functions::class,
    'enqueue_admin'
] );

add_action( 'woocommerce_init', [
    Functions::class,
    'woocommerce'
] );

add_filter( 'plugin_action_links', [
    Functions::class,
    'settings_link'
], 10, 2 );

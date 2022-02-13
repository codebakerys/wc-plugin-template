<?php

namespace WPP\Helpers;
use WPP\Controllers\Woocommerce;

/**
 * Name: Functions
 * Handle hooks/filters functions
 * @package Helpers
 * @since 1.0.0
 */
class Functions
{
    /**
     * Load admin scripts and styles
     * @since 1.0.0
     * @return void
     */
    public static function enqueue_admin_scripts() 
    {
        wp_enqueue_script( 'admin', WPP_PLUGIN_DIST . '/admin.js');
        wp_enqueue_style( 'admin', WPP_PLUGIN_DIST . '/admin.css');

        ## libs
        wp_enqueue_style( 'fontawesome', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css' );
    }

    /**
     * Load theme scripts and styles
     * @since 1.0.0
     * @return void
     */
    public static function enqueue_theme_scripts() 
    {
        if ( ! is_admin() ) {
            wp_enqueue_script( 'theme', WPP_PLUGIN_DIST . '/theme.js');
            wp_enqueue_style( 'theme', WPP_PLUGIN_DIST . '/theme.css');
        }
    }

    /**
     * Load plugin text domain
     * @since 1.0.0
     * @return void
     */
    public static function initialize()
    {
        load_plugin_textdomain( WPP_PLUGIN_SLUG , false );
    }

    /**
     * Init Woocommerce classes
     * @since 1.0.0
     * @return Woocommerce
     */
    public static function woo_init()
    {
        return new Woocommerce;
    }

    /**
     * Create extra link on plugins page
     * @since 1.0.0
     * @param array $arr
     * @param string $name
     * @return array
     */
    public static function settings_link( $arr, $name ){

        if( $name === WPP_BASE_FILE ) {

            $label = sprintf( '<a href="admin.php?page=wc-settings&tab=checkout&section=wc-payment-plugin" id="deactivate-wc-payment-plugin" aria-label="%s">%s</a>',
                __( 'Payment setup plugin for Woocommerce', WPP_PLUGIN_SLUG ),
                __( 'Payment Settings', WPP_PLUGIN_SLUG )
            );

            $arr['settings'] = $label;
        }

        return $arr;
    }

    /**
     * handle plugins actions
     * @since 1.0.0
     * @return void
     */
    public static function handle_actions()
    {
        $action_name = WPP_PLUGIN_PREFIX . '_action';
        $vars = isset( $_REQUEST[ $action_name ] ) ? (array) $_REQUEST : array();

        if ( is_array( $vars ) && isset( $vars[ $action_name ] ) ) {
            $controller = Utils::parse_controller( $vars[ $action_name ] );

            new $controller( $vars );
        }
    }
}
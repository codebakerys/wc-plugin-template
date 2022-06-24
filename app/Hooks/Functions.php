<?php

namespace WCPT\Hooks;
use WCPT\Controllers\Woocommerce;
use WCPT\Helpers\Config;
use WCPT\Helpers\Uninstall;
use WPT\Model\Database\Bootstrap;

/**
 * Name: Functions
 * Handle hooks/filters functions
 * @package Hooks
 * @since 1.0.0
 */
class Functions
{
    /**
     * Load admin scripts and styles
     * @since 1.0.0
     * @return void
     */
    public static function enqueue_admin() 
    {
        wp_enqueue_script( 'admin', Config::__dist( '/admin.js' ) );
        wp_enqueue_style( 'admin', Config::__dist( 'admin.css' ) );
        wp_enqueue_style( 'fontawesome', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css' );
    }

    /**
     * Load theme scripts and styles
     * @since 1.0.0
     * @return void
     */
    public static function enqueue_theme() 
    {
        if ( ! is_admin() ) {
            wp_enqueue_script( 'theme', Config::__dist( 'theme.js' ) );
            wp_enqueue_style( 'theme', Config::__dist( 'theme.css' ) );
        }

        wp_enqueue_script( 'global', Config::__dist( 'global.js' ) );
    }

    /**
     * Load plugin text domain
     * @since 1.0.0
     * @return void
     */
    public static function initialize()
    {
        load_plugin_textdomain( WCPT_PLUGIN_SLUG , false );
        self::enqueue_theme();
    }

    /**
     * Init Woocommerce classes
     * @since 1.0.0
     * @return Woocommerce
     */
    public static function woocommerce()
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

        if( $name === WCPT_BASE_FILE ) {

            $label = sprintf( '<a href="admin.php?page=wc-settings&tab=checkout&section=wc-plugin-template" id="deactivate-wc-plugin-template" aria-label="%s">%s</a>',
                __( 'Payment setup plugin for Woocommerce', 'wc-plugin-template' ),
                __( 'Payment Settings', 'wc-plugin-template' )
            );

            $arr['settings'] = $label;
        }

        return $arr;
    }

    /**
     * Activate plugin
     * @since 1.0.0
     * @return void|bool
     */
    public static function activate( $plugin )
    {
        if ( Config::__base() === $plugin ) {
            new Bootstrap;
        }
    }

    /**
     * Desactive the plugin
     * @since 1.0.0
     * @return void
     */
    public static function desactive() {
        new Uninstall;
    }
}
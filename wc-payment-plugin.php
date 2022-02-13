<?php
/**
 * Plugin Name: Payment setup plugin for Woocommerce
 * Plugin URI:  https://github.com/aguiarrdev/wc-payment-plugin
 * Version:     1.0.0
 * Description: Payment setup plugin for Woocommerce
 * Author:      Matheus Aguiar
 * Author URI:  https://github.com/aguiarrdev/wc-payment-plugin
 *
 * @link    https://github.com/aguiarrdev/wc-payment-plugin
 * @since   1.0.0
 * @package WPP
 */

require __DIR__ . '/vendor/autoload.php';
if ( version_compare( phpversion(), '5.6' ) < 0  ) {
	
	wp_die( sprintf( "%s <p>%s</p>",
			__( "The ". WPP_PLUGIN_NAME ." isn't compatible to your PHP version. ", WPP_PLUGIN_SLUG ),
			__( "The PHP version has to be a less 5.7!", WPP_PLUGIN_SLUG )
		),
		WPP_PLUGIN_NAME . ' -- Error',
		[ 'back_link' => true ]
	);
}

require_once __DIR__ . '/app/index.php';
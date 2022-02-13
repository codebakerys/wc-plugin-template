<?php

namespace WPP\Controllers\Gateways;

use WC_Payment_Gateway;
use WPP\Controllers\Render\Checkout;
use WPP\Controllers\Webhooks;
use WPP\Controllers\Gateways\InterfaceGateways;

/**
 * Name: Billet
 * Structure the billet payment method
 * @package Controllers\Gateways
 * @since 1.0.0
 */
class Gateway extends WC_Payment_Gateway implements InterfaceGateways
{

    public function __construct() {
        
        $this->id                 = "wc-payment-plugin";
        // $this->icon               = ## Image path 
        $this->has_fields         = false;
        $this->method_title       = __( "Gateway Example", WPP_PLUGIN_SLUG );
        $this->method_description = __( "Payment gateway example", WPP_PLUGIN_SLUG );

        $this->supports = [
            "products"
        ];

        $this->init_form_fields();
        $this->init_settings();

        $this->title       = $this->get_option( "title" );
        $this->description = $this->get_option( "description" );
        $this->enabled     = $this->get_option( "enabled" );
        $this->testmode    = "yes" === $this->get_option( "testmode" );
        $this->secret_key  = $this->testmode ? $this->get_option( "test_secret_key" ) : $this->get_option( "secret_key" );

        add_action( 'woocommerce_thankyou_' . $this->id, [ $this, 'caos_thank_you_page' ]);

        if ( is_admin() ) {
            add_action( 'woocommerce_update_options_payment_gateways_' . $this->id, [ $this, 'process_admin_options' ] );
        }

        new Webhooks( $this->id, get_class( $this ) );
    }

    /**
     * Create/Edit billet gateway options
     * @since 1.0.0
     * @return void
     */
    public function init_form_fields()
    {

        $this->form_fields = [
            "enabled" => [
                "title"       => __( "Enable", WPP_PLUGIN_SLUG ),
                "label"       => __( "Enable Gateway", WPP_PLUGIN_SLUG ),
                "type"        => "checkbox",
                "description" => __( "Check this option to activate the payment method", WPP_PLUGIN_SLUG ),
                "default"     => "no",
                "desc_tip"    => true
            ],

            "title" => [
                "title"       => __( "Title", WPP_PLUGIN_SLUG ),
                "type"        => "text",
                "description" => __( "This controls the title which the user sees during checkout.", WPP_PLUGIN_SLUG ),
                "default"     => __( "Payment setup plugin for Woocommerce", WPP_PLUGIN_SLUG ),
                "desc_tip"    => true
            ],

            "description" => [
                "title"       => __( "Description", WPP_PLUGIN_SLUG ),
                "type"        => "textarea",
                "description" => __( "This controls the description which the user sees during checkout.", WPP_PLUGIN_SLUG ),
                "default"     => __( "Payment setup plugin for Woocommerce", WPP_PLUGIN_SLUG ),
                "desc_tip"    => true
            ],

            "consumer_key" => [
                "title"       => __( "Consumer Key", WPP_PLUGIN_SLUG ),
                "type"        => "password",
                "description" => __( "Enter your account's consumer key", WPP_PLUGIN_SLUG )
            ],

            "secret_key" => [
                "title"       => __( "Secret Key", WPP_PLUGIN_SLUG ),
                "type"        => "password",
                "description" => __( "Enter your account's secret key", WPP_PLUGIN_SLUG )
            ],

            "testmode" => [
                "title"       => __( "Test mode", WPP_PLUGIN_SLUG ),
                "label"       => __( "Enable Test Mode", WPP_PLUGIN_SLUG ),
                "type"        => "checkbox",
                "description" => __( "Place the payment gateway in test mode using test API keys.", WPP_PLUGIN_SLUG ),
                "default"     => "yes",
                "desc_tip"    => true
            ],

            "test_consumer_key" => [
                "title"       => __( "Test Consumer Key", WPP_PLUGIN_SLUG ),
                "type"        => "text",
                "description" => __( "Enter your account's test secret key", WPP_PLUGIN_SLUG )
            ],

            "test_secret_key" => [
                "title"       => __( "Test Secret Key", WPP_PLUGIN_SLUG ),
                "type"        => "password",
                "description" => __( "Enter your account's test consumer key", WPP_PLUGIN_SLUG )
            ],

            "enable_log" => [
                "title"       => "Logs",
                "label"       => __( "Enable Woocommerce Logs for gateway.", WPP_PLUGIN_SLUG ),
                "type"        => "checkbox",
                "description" => sprintf(
                    "%s<a href='admin.php?page=wc-status&tab=logs'>Woocommerce->Status->Logs</a>",
                    __( "To View the logs click the link: ", WPP_PLUGIN_SLUG ),
                )
            ]
        ];
        
    }

    /**
     * Render the payment fields
     * @since 1.0.0
     * @return void
     */
    public function payment_fields()
    {

        if ( $this->description ) {

            if ( $this->testmode ) {

                $this->description .= __( " Test mode activate! In this mode transactions are not real.", WPP_PLUGIN_SLUG );
                $this->description  = trim( $this->description );
            }
            
            echo wpautop( wp_kses_post( $this->description ) );
        }

        new Checkout;
    }

    /**
     * Validate the payment fields
     * @since 1.0.0
     * @return boolean
     */
    public function validate_fields()
    {
        ## Validade fields
        return true;
    }

    /**
     * Handle gateway process payment
     * @since 1.0.0
     * @param int $wc_order_id
     * @return void
     */
    public function process_payment( $wc_order_id )
    {
        global $woocommerce;
        $wc_order = wc_get_order( $wc_order_id );
    }
}
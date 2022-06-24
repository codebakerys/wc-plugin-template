<?php

namespace WCPT\Controllers;

use WC_Logger;

/**
 * Name: Logs
 * Woocommerce logs
 * @package Controllers
 * @since 1.0.0
 */
class Logs
{
    private $wc;

    public function __construct()
    {
      $this->wc = new WC_Logger();
    }

    /**
     * Create order error messages
     * @since 1.0.0
     * @param string $title 
     * @param string $var
     * @return void
     */
    public function create_order_error( $title, $var )
    {
      $prefix = WCPT_PLUGIN_SLUG . "-create-order-error-";
		  $this->wc->add( $prefix, "{$title} : ".print_r( $var, true ) );
    }

    /**
     * Get order error messages
     * @since 1.0.0
     * @param string $title 
     * @param string $var
     * @return void
     */
    public function get_order_error( $title, $var )
    {
      $prefix = WCPT_PLUGIN_SLUG . "-get-order-error-";
		  $this->wc->add( $prefix, "{$title} : ".print_r( $var, true ) );
    }

    /**
     * Cancel order error messages
     * @since 1.0.0
     * @param string $title 
     * @param string $var
     * @return void
     */
    public function cancel_order_error( $title, $var )
    {
      $prefix = WCPT_PLUGIN_SLUG . "-canel-order-error-";
		  $this->wc->add( $prefix, "{$title} : ".print_r( $var, true ) );
    }

    /**
     * Create order success messages
     * @since 1.0.0
     * @param string $title 
     * @param string $var
     * @return void
     */
    public function create_order_success( $title, $var )
    {
      $prefix = WCPT_PLUGIN_SLUG . "-create-order-success-";
		  $this->wc->add( $prefix, "{$title} : ".print_r( $var, true ) );
    }

    /**
     * Get order success messages
     * @since 1.0.0
     * @param string $title 
     * @param string $var
     * @return void
     */
    public function get_order_success( $title, $var )
    {
      $prefix = WCPT_PLUGIN_SLUG . "-get-order-success-";
		  $this->wc->add( $prefix, "{$title} : ".print_r( $var, true ) );
    }

    /**
     * Cancel order success messages
     * @since 1.0.0
     * @param string $title 
     * @param string $var
     * @return void
     */
    public function cancel_order_success( $title, $var )
    {
      $prefix = WCPT_PLUGIN_SLUG . "-cancel-order-success-";
		  $this->wc->add( $prefix, "{$title} : ".print_r( $var, true ) );
    }

    /**
     * Webhook notice success messages
     * @since 1.0.0
     * @param string $title 
     * @param string $var
     * @return void
     */
    public function webhook_notice_success( $title, $var )
    {
      $prefix = WCPT_PLUGIN_SLUG . "-webhook-notice-success-";
		  $this->wc->add( $prefix, "{$title} : ".print_r( $var, true ) );
    }

    /**
     * Webhook notice error messages
     * @since 1.0.0
     * @param string $title 
     * @param string $var
     * @return void
     */
    public function webhook_notice_error( $title, $var )
    {
      $prefix = WCPT_PLUGIN_SLUG . "-webhook-notice-error-";
		  $this->wc->add( $prefix, "{$title} : ".print_r( $var, true ) );
    }

}
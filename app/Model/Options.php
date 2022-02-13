<?php

namespace WPP\Model;

/**
 * Name: Options
 * @package Model
 * @since 1.0.0
 */
class Options
{
    private $prefix;

    public function __construct()
    {
        $this->prefix = WPP_PLUGIN_SLUG;
    }

    /**
     * Update option
     * @since 1.0.0
     * @param string $opt
     * @param mixed $value
     * @return array|bool
     */
    public function update( $opt, $value )
    {
        $option = $this->prefix . $opt;

        $result = update_option( $option, $value );
        return $result;
    }

    /**
     * Get option
     * @since 1.0.0
     * @param string $opt
     * @param mixed $value
     * @return array|bool
     */
    public function get( $opt )
    {
        $option = $this->prefix . $opt;
        $result = get_option( $option );
        
        return $result;
    }


    /**
     * Create option
     * @since 1.0.0
     * @param string $opt
     * @param mixed $value
     * @return array|bool
     */
    public function create( $opt, $value )
    {
        $option = $this->prefix . $opt;

        $result = add_option( $option, $value );
        return $result;
    }

    /**
     * Get gateway options
     * @since 1.0.0
     * @param bool|string $field
     * @return mixed
     */
    public function get_gateway_option( $field = false )
    {
        $woo_opt = get_option( 'woocommerce_wc-plugin-payment_settings' );

        if ( $field ) {
            if ( is_array( $woo_opt ) && isset( $woo_opt[$field] ) ) {
                $woo_opt = $woo_opt[$field];

            } else {
                $woo_opt = "";
            }
        }
        
        return $woo_opt;
    }
}
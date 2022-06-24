<?php

namespace WCPT\Controllers\Render;

use WCPT\Controllers\Render;

/**
 * Name: Render Checkout
 * Checkout fields
 * @package Controller\Render
 * @since 1.0.0
 */
class Checkout extends Render
{
    public function __construct()
    {
        echo $this->render( 'templates/checkout/checkout.php',[] );
    }
}
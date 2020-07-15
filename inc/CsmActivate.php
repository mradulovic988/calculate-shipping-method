<?php
/**
 * Plugin activation
 *
 * @link              https://www.fixrunner.com
 * @since             1.0.0
 * @package           CsmActivate
 */

class CsmActivate {

    protected $productNumberChecker = 1; // Declare number of product

    public function __construct() {
        if ( !is_admin() ) {
            add_action( 'wp_loaded', [ $this, 'trigger' ] ); // Loading trigger()
        }
    }

    /**
     *
     * Method for triggering enqueue script if is product in the
     * cart bigger then 1
     *
     * @var $productsCount - Returning number of products in cart
     *
     */
    public function trigger() {
        $productsCount = WC()->cart->get_cart_contents_count();

        if ( $productsCount > $this->productNumberChecker ) {
            add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
        }
    }

    /**
     *
     * Method for loading javascript file
     * which will cound all shipping method in one
     * in total on the cart, checkout, and have endpoint 'order-received'
     *
     */
    public function enqueue() {
        if ( is_cart() || is_checkout() || is_wc_endpoint_url( 'order-received' ) ) {

            wp_enqueue_script(
                'main_js',
                plugin_dir_url( __FILE__ ) . '../assets/main.js',
                [
                    'jquery'
                ],
                '1.3',
                true
            );
        }
    }
}
$active = new CsmActivate();
<?php
/**
 * @snippet Notice with $$$ remaining to Free Shipping @ WooCommerce Cart
 * @how-to Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode https://businessbloomer.com/?p=442
 * @author Rodolfo Melogli
 * @testedwith WooCommerce 3.4.2
 */

add_action( 'woocommerce_before_cart', 'bbloomer_free_shipping_cart_notice_zones' );

function bbloomer_free_shipping_cart_notice_zones() {

    global $woocommerce;

// Get Free Shipping Methods for Rest of the World Zone & populate array $min_amounts

    $default_zone = new WC_Shipping_Zone(0);
    $default_methods = $default_zone->get_shipping_methods();

    foreach( $default_methods as $key => $value ) {
        if ( $value->id === "free_shipping" ) {
            if ( $value->min_amount > 0 ) $min_amounts[] = $value->min_amount;
        }
    }

// Get Free Shipping Methods for all other ZONES & populate array $min_amounts

    $delivery_zones = WC_Shipping_Zones::get_zones();

    foreach ( $delivery_zones as $key => $delivery_zone ) {
        foreach ( $delivery_zone['shipping_methods'] as $key => $value ) {
            if ( $value->id === "free_shipping" ) {
                if ( $value->min_amount > 0 ) $min_amounts[] = $value->min_amount;
            }
        }
    }

// Find lowest min_amount

    if ( is_array($min_amounts) ) {

        $min_amount = min($min_amounts);

// Get Cart Subtotal inc. Tax excl. Shipping

        $current = WC()->cart->subtotal;

// If Subtotal < Min Amount Echo Notice
// and add "Continue Shopping" button

        if ( $current < $min_amount ) {
            $added_text = esc_html__('Get free shipping if you order ', 'woocommerce' ) . wc_price( $min_amount - $current ) . esc_html__(' more!', 'woocommerce' );
            $return_to = apply_filters( 'woocommerce_continue_shopping_redirect', wc_get_raw_referer() ? wp_validate_redirect( wc_get_raw_referer(), false ) : wc_get_page_permalink( 'shop' ) );
            $notice = sprintf( '<a href="%s" class="button wc-forward">%s</a> %s', esc_url( $return_to ), esc_html__( 'Continue Shopping', 'woocommerce' ), $added_text );
            wc_print_notice( $notice, 'notice' );
        }

    }

}
?>
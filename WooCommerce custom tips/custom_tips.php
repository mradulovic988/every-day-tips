<?php
/**
 * Adding rsd in wpforms
 *
 * @param array $currencies
 * @return array
 */
function wp_add_currencies( $currencies ) {

	$currencies['RSD'] = array(
		'name'                => __( 'Serbian Dinar', 'wpforms' ),
		'symbol'              => 'RSD',
		'symbol_pos'          => 'right',
		'thousands_separator' => ',',
		'decimal_separator'   => '.',
		'decimals'            => 2
	);
	return $currencies;
}
add_filter( 'wpforms_currencies', 'wp_add_currencies' );


//disable buy now
add_filter( 'woocommerce_is_purchasable', false );


//disable whishlist button
add_filter('yith_wcwl_positions', false);


// disable sku
add_filter( 'wc_product_sku_enabled', false );


//removing prices
add_filter( 'woocommerce_variable_sale_price_html',false );
add_filter( 'woocommerce_variable_price_html', false);
add_filter( 'woocommerce_get_price_html', false);


// adding new tab
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {
	
	// Adds the new tab
	
	$tabs['test_tab'] = array(
		'title' 	=> __( 'Video', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_product_tab_content'
	);

	return $tabs;

}

/*
function woo_new_product_tab_content() {

	// The new tab content

	echo '<h2>New Product Tab</h2>';
	echo '<p>Here\'s your new product tab.</p>';
	
}
*/


// adding second tab
add_filter( 'woocommerce_product_tabs', 'woo_new_tab' );
function woo_new_tab( $new ) {
	
	// Adds the new tab
	
	$new['new_tab'] = array(
		'title' 	=> __( 'Slike', 'woocommerce' ),
		'priority' 	=> 50,
		'callback' 	=> 'woo_new_tab_content'
	);

	return $new;

}


// changing name for specific tab
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'Opis' );		// Rename the description tab

	return $tabs;

}

/* Put inquiry form on specific products */
<?php if (is_product() && !has_term( 'miniature-chair', 'product_cat' ) AND !has_term ('miniature-chair-logos', 'product_cat')) {
	echo do_shortcode( '[sg_popup id="2553"]<button class="alt button" type="button">INQUIRY</button>[/sg_popup]' );
} ?> 


?>
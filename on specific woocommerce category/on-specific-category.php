<?php if ( is_product() && has_term( 'miniature-chair', 'product_cat') || has_term('miniature-chair-logos', 'product_cat')) { ?>
	<a onclick="splite_loader();" class="button alt">CONTACT US TO PLACE ORDER</a>
<?php } else { ?>
	<button type="submit" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>
<?php } ?>
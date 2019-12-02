<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

do_action( 'woocommerce_before_checkout_form', $checkout );

// If checkout registration is disabled and not logged in, the user cannot checkout.
if ( ! $checkout->is_registration_enabled() && $checkout->is_registration_required() && ! is_user_logged_in() ) {
	echo esc_html( apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) ) );
	return;
}

?>

<!-- =================================================
     ============== Order Process ====================
     ============================================= -->
<ul class="order-process">
    <a href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>">
			<li id="one">1. Cart</li>
		</a>

		<a>
			<li id="two" class="active">2. Customer</li>
		</a>

    <a>
			<li id="three" class="off">3. Shipping</li>
		</a>

		<a>
			<li id="four" class="off">4. Payment</li>
		</a>
</ul>
<!-- =================================================
     ========== END Order Process ====================
     ============================================= -->

<div class="container">
	<div class="row">
		<div class="col-md-6 left_checkout_row">
			<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

				<?php if ( $checkout->get_checkout_fields() ) : ?>

					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>
					<div id="first_step">
						<div class="col2-set" id="customer_details">
							<div class="col-1">
								<?php do_action( 'woocommerce_checkout_billing' ); ?>
							</div>

							<div class="col-2">
								<?php do_action( 'woocommerce_checkout_shipping' ); ?>
							</div>
						</div>

						<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>

					<?php endif; ?>
					
					<?php do_action( 'woocommerce_checkout_before_order_review_heading' ); ?>
					
					<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'woocommerce' ); ?></h3>
					
					<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>

					<a class="return_to_cart" href="<?php echo get_permalink( wc_get_page_id( 'cart' ) ); ?>">&lsaquo; Return to card</a>
					<button type="button" onclick="proceedToShipping()" class="button alt">Proceed to shipping</button>
				</div>
				<div id="order_review" class="woocommerce-checkout-review-order">
					<?php do_action( 'woocommerce_checkout_order_review' ); ?>
				</div>

				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

			</form>
		</div>
		<div class="col-md-4 right_checkout_row">
			<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
				<div class="cart-wrapper sm-touch-scroll">

					<?php do_action( 'woocommerce_before_cart_table' ); ?>

					<table class="shop_table shop_table_responsive cart woocommerce-cart-form__contents" cellspacing="0">
						<thead>
							<tr>
								<th class="product-name" colspan="2"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
								<th class="product-price"><?php esc_html_e( 'Price', 'woocommerce' ); ?></th>
								<th class="product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
								<th class="product-subtotal"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
							</tr>
						</thead>
						<tbody>
							<?php do_action( 'woocommerce_before_cart_contents' ); ?>

							<?php
							foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
								$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
								$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

								if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
									$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
									?>
									<tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">

										<td class="product-thumbnail">
										<?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo $thumbnail; // PHPCS: XSS ok.
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
										}
										?>
										</td>

										<td class="product-name" data-title="<?php esc_attr_e( 'Product', 'woocommerce' ); ?>">
										<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;' );
										} else {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'woocommerce' ) . '</p>', $product_id ) );
										}

										// Mobile price.
										?>
											<div class="show-for-small mobile-product-price">
												<span class="mobile-product-price__qty"><?php echo $cart_item['quantity']; ?> x </span>
												<?php
													echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
												?>
											</div>
										</td>

										<td class="product-price" data-title="<?php esc_attr_e( 'Price', 'woocommerce' ); ?>">
											<?php
												echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
											?>
										</td>

										<td class="product-quantity" data-title="<?php esc_attr_e( 'Quantity', 'woocommerce' ); ?>">
										<?php
										if ( $_product->is_sold_individually() ) {
											$product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
										} else {
											$product_quantity = woocommerce_quantity_input( array(
												'input_name'   => "cart[{$cart_item_key}][qty]",
												'input_value'  => $cart_item['quantity'],
												'max_value'    => $_product->get_max_purchase_quantity(),
												'min_value'    => '0',
												'product_name' => $_product->get_name(),
											), $_product, false );
										}

										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
										?>
										</td>

										<td class="product-subtotal" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>">
											<?php
												echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
											?>
										</td>
									</tr>
									<?php
								}
							}
							?>

							<?php do_action( 'woocommerce_cart_contents' ); ?>

							<tr>
								
							</tr>

							<?php do_action( 'woocommerce_after_cart_contents' ); ?>
						</tbody>
					</table>
					<?php do_action( 'woocommerce_after_cart_table' ); ?>
				</div>
				</form>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>

<script type="text/javascript">

/**
 * Adding and removing class on 
 * the multistep checkout
 *
 * @return void
 */
function proceedToShipping() {
  document.getElementById("order_review").style.display = "block";
	document.getElementById("first_step").style.display = "none";

	var three = document.getElementById("three");
  three.classList.add("active");

	var three = document.getElementById("three");
  three.classList.remove("off");

	window.scrollTo({ top: 0, behavior: 'smooth' });

	var two = document.getElementById("two");
  two.classList.remove("active");
}

function backFromShipping() {
	document.getElementById("order_review").style.display = "none";
	document.getElementById("first_step").style.display = "block";

	window.scrollTo({ top: 0, behavior: 'smooth' });
}
</script>
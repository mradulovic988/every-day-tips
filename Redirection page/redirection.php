<?php
/**
 * Checking if is cart page and then
 * if the cart empty create redirection
 */
if (is_page($page = '15')) {
    if (WC()->cart->get_cart_contents_count() == 0) {
        $url = "https://www.google.com";
        header("Location: " . $url);
        die();
    } else if (wc_get_page_id('shop') > 0) { ?>
        <p class="return-to-shop">
            <a class="button wc-backward"
               href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">
                <?php esc_html_e('Return to shop', 'woocommerce'); ?>
            </a>
        </p>
    <?php }
}
?>
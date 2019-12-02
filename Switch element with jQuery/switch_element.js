/**
 * Move element on single product page
 * on mobile devices
 */
jQuery(document).ready(function($) { 
    if ($(window).width() <= 480) { // Max size 480px
        jQuery("h1.product_title.entry-title").insertBefore(".product-gallery.large-6.col");
        jQuery("h2.lead_title").insertAfter("h1.product_title.entry-title");
        jQuery("h2.title_desc").insertAfter("h2.lead_title");
        jQuery("span.stamped-product-reviews-badge").insertAfter("h2.title_desc");
        jQuery(".woocommerce-product-details__short-description").insertAfter("div#4icons");
    }
});
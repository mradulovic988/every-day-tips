<?php
/**
 * Downloads
 *
 * Shows downloads on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/downloads.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.2.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<?php $downloads     = WC()->customer->get_downloadable_products();
$has_downloads = (bool) $downloads;

do_action( 'woocommerce_before_account_downloads', $has_downloads ); ?>




<?php
/**
 *
 * @return [type] [description]
 * Calling custom global function for a listing product which specific user bought
 * 
 */
function your_Product () {
	$title = "<h1 class='title-product-cart'>Your Productsss</h1>";
	echo $title . '<br>' . do_shortcode( '[my_products]' );
}

//your_Product();

?>
<?php if ( $has_downloads ) : ?>


	<?php do_action( 'woocommerce_before_available_downloads' ); ?>


<section class="woocommerce-order-downloads">

<table class="woocommerce-table woocommerce-table--order-downloads shop_table shop_table_responsive order_details">
<thead>
<tr>
<th class="download-product"><span class="nobr">Image</span></th>
<th class="download-product"><span class="nobr">Product</span></th>
<th class="download-remaining"><span class="nobr">Downloads remaining</span></th>
<th class="download-expires"><span class="nobr">Expires</span></th>
<th class="download-file"><span class="nobr">Download</span></th>
</tr>
</thead>

<tbody>
<?php foreach($downloads as $item){
	 ?>
<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $item["product_id"] ), 'single-post-thumbnail' ); ?>
<tr>
<td class="download-product" data-title="Product" style="width:18%;">
<?php 
if($image!="")
{?>
<img src="<?php  echo $image[0]; ?>" data-id="<?php echo $loop->post->ID; ?>">
<?php
}
 ?>
</td>
<td class="download-product" data-title="Product" style="width:20%;">
<?php if($item["product_url"]=="")
{
	echo $item["product_name"];
}
else
{?>
<a href="<?php echo $item["product_url"]; ?>"><?php echo $item["product_name"]; ?></a>	
<?php
}
?>				</td>
<td class="download-remaining" data-title="Downloads remaining" style="width:10%;">
∞	
<?php echo $item["downloads_remaining"]; ?>				</td>
<td class="download-expires" data-title="Expires" style="width:10%">
<?php if($item["access_expires"]=="")
{
	echo "Never";
	}
	else
	{
echo $item["access_expires"]; 
	}
?>				</td>
<td class="download-file" data-title="Download" style="width:40%">
<a href="<?php echo $item["file"]["file"]; ?>" class="woocommerce-MyAccount-downloads-file kays-btn button alt"><?php echo $item["file"]["name"]; ?></a>					</td>
</tr>
<?php
}
?>
</tbody></table>
</section>


<?php //echo "<pre>"; print_r($downloads); ?>
	<?php //do_action( 'woocommerce_available_downloads', $downloads ); ?>

	<?php do_action( 'woocommerce_after_available_downloads' ); ?>

<?php else : ?>
<?php echo "bb"; ?>
	<div class="woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="btn btn-outline-primary" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php esc_html_e( 'Go Shop', 'understrap' ) ?>
		</a>
		<?php esc_html_e( 'No downloads available yet.', 'understrap' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_downloads', $has_downloads ); ?>

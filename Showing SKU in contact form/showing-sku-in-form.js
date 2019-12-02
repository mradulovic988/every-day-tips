jQuery(document).ready(function($){
	/* Thank you message */
	if ( sessionStorage.getItem('sentMessage') === "true" ) {
            alert( "Thank you for your message. It has been sent." );
            sessionStorage.setItem('sentMessage',false);
           
      }
      /* End Thank you message */

      /* Pull the text from position which we want */
    var sku = $('div.product_meta > span.sku_wrapper > span').text();
    $('#wpcf7-f2417-o1 > form > p:nth-child(5) > label > span > input').val(sku);
}); 

/* Putting text from position which we choose to field in the Contact Form 7 - Look on p:nth-child(5) in this case */
jQuery("body").on('DOMSubtreeModified', "div.product_meta > span.sku_wrapper > span", function() {
    var sku = jQuery('div.product_meta > span.sku_wrapper > span').text();
    jQuery('#wpcf7-f2417-o1 > form > p:nth-child(5) > label > span > input').val(sku);
});

jQuery("body").on('DOMSubtreeModified', ".wpcf7-response-output.wpcf7-display-none.wpcf7-mail-sent-ok", function() {
	 var response = jQuery('#wpcf7-f2417-o1 > form > div.wpcf7-response-output.wpcf7-display-none.wpcf7-mail-sent-ok').text();
	 if(response === "Thank you for your message. It has been sent."){
	 	 jQuery('#splite_curtain').hide();
	 	 jQuery('#splite_popup_box').hide();
	 	 sessionStorage.setItem('sentMessage',true);  
         window.location.reload();
	 }
});
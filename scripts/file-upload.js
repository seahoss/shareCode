// JavaScript Document
jQuery(document).ready(function() {
 
jQuery('.gmm_upload_button_small').live('click', function() {
	//alert();
	var myClass = '.'+event.target.id;  //this line gets the clicked element's id (from meta_portfolio_images.php)
	window.send_to_editor = function(html) {
	fileurl = jQuery(html).attr('href');
 	jQuery(myClass).val(fileurl); //tells the text field with a certain style class to take this url as input
 	tb_remove();
	}
 tb_show('', 'media-upload.php?post_id=1&amp;type=image&amp;TB_iframe=true').focus();
 return false;
});
 
jQuery('.gmm_upload_button_full_size').live('click', function() {
	var myClass2 = '.'+event.target.id;
	window.send_to_editor = function(html) {
	fileurl = jQuery(html).attr('href');
 	jQuery(myClass2).val(fileurl);
 	tb_remove();
	}
 tb_show('', 'media-upload.php?post_id=1&amp;type=image&amp;TB_iframe=true').focus();
 return false;
});

});
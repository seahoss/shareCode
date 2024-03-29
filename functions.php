<?php 


// include css to help style our custom meta boxes
if (is_admin()) { wp_enqueue_style('custom_meta_css', get_bloginfo('stylesheet_directory') . '/custom_metaboxes/metabox_css.css'); 
					wp_enqueue_script('jquery-ui-sortable');
					wp_enqueue_script('jquery-ui-core');
					}


//REGISTER ALL CUSTOM POST TYPES

add_action('init', 'gmm_register_custom_post_types');
 
function gmm_register_custom_post_types() {
 
	$labels = array(
		'name' => _x('Portfolios', 'post type general name'),
		'singular_name' => _x('Portfolio', 'post type singular name'),
		'add_new' => _x('Add New', 'gmm_portfolio'),
		'add_new_item' => __('Add New Portfolio'),
		'edit_item' => __('Edit Portfolio'),
		'new_item' => __('New Portfolio'),
		'view_item' => __('View Portfolio'),
		'search_items' => __('Search Portfolio'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => 5,
		'supports' => array('title','excerpt','thumbnail', 'revisions', 'editor')
	  ); 
 
register_post_type( 'gmm_portfolio' , $args );

//register_taxonomy("gmm_article_type", array('gmm_newsletter_post'), array('hierarchical' => true, 'label' => 'Article Types', 'singular_label' => 'Article Type', 'rewrite' => true));
}

// include the class in your theme or plugin
include_once 'wpalchemy/MetaBox.php';

//ADD META BOX FOR DATA ENTRY OF TEAMS

$custom_metabox_schedule = new WPAlchemy_MetaBox(array
(
	'id' => '_image_upload',
	'title' => 'Upload Portfolio Images',
	'template' => STYLESHEETPATH.'/custom_metaboxes/meta_portfolio_images.php',
	'types' => array('gmm_portfolio'),
	'context' => 'normal',
	'priority' => 'high',
	'autosave' => TRUE,
	'prefix' => '_gmm_thumbnail' // defaults to NULL
));

//THE FOLLOWING ARE NEEDED FOR THE UPLOAD WHITEPAPER SCRIPT TO WORK
function gmm_upload_scripts() {
wp_enqueue_script('media-upload');
wp_enqueue_script('thickbox');
wp_register_script('my-upload', get_bloginfo('template_url') . '/scripts/file-upload.js', array('jquery','media-upload','thickbox'));
wp_enqueue_script('my-upload');
}
function gmm_upload_styles() {
wp_enqueue_style('thickbox');
}
add_action('admin_print_scripts', 'gmm_upload_scripts');
add_action('admin_print_styles', 'gmm_upload_styles');

?>
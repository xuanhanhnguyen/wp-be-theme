<?php
/*
	Plugin Name: Blog customer
	Plugin URI: http://
	Description:
	Version: 1.2
	Author: xuanhanh.dev
	Text Domain: blog-customer
*/

/* UPDATE
  register_activation_hook is not called when a plugin is updated
  so we need to use the following function
*/

add_action( 'init', 'register_ocean_blog_customer' );
function register_ocean_blog_customer() {

	$labels = array(
		'name'               => __( 'Tất cả ý kiến', 'blog-customer' ),
		'singular_name'      => __( 'blog-customer', 'blog-customer' ),
		'add_new'            => __( 'Thêm ý kiến', 'blog-customer' ),
		'add_new_item'       => __( 'Thêm ý kiến khách hàng', 'blog-customer' ),
		'edit_item'          => __( 'Sửa ý kiến khách hàng', 'blog-customer' ),
		'new_item'           => __( 'Thêm ý kiến khách hàng', 'blog-customer' ),
		'all_items'          => __( 'Tất cả ý kiến', 'blog-customer' ),
		'view_item'          => __( 'Xem', 'blog-customer' ),
		'search_items'       => __( 'Tìm kiếm', 'blog-customer' ),
		'not_found'          => __( 'Không có ý kiến nào', 'blog-customer' ),
		'not_found_in_trash' => __( 'Không có trong thùng rác', 'blog-customer' ),
		'parent_item_colon'  => __( 'Parent profile:', 'blog-customer' ),
		'menu_name'          => __( 'Ý kiến khách hàng', 'blog-customer' ),
	);

	$args = array(
		'labels'              => $labels,
		'hierarchical'        => false,
//		'description'         => __( 'List profile', 'blog-customer' ),
		'supports'            => array( 'title', 'thumbnail', 'excerpt' ),
//         'taxonomies' => array('categories', 'tags'),
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => null,
		'menu_icon'           => 'dashicons-buddicons-buddypress-logo',
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'publicly_queryable'  => true,
		'exclude_from_search' => false,
		'has_archive'         => true,
		'query_var'           => true,
		'can_export'          => true,
//		'rewrite' => array('slug' => __('profile', 'blog-customer')),
		'capability_type'     => 'post'
	);

	register_post_type( 'blog-customer', $args );
}

add_action( 'admin_head', 'my_custom_table_blog_customer' );

function my_custom_table_blog_customer() {
	if ( get_post_type() == 'blog-customer' ) { ?>
        <style>
            #featured_image {
                width: 40px;
            }
        </style>
		<?php
	}
}

// Add to admin_init function
add_filter( 'manage_edit-blog-customer_columns', 'add_new_blog_customer_columns' );
function add_new_blog_customer_columns( $profile_columns ) {
	$new_columns['cb']             = '<input type="checkbox" />';
	$new_columns['featured_image'] = 'Avatar';
	$new_columns['title']          = _x( 'Name', 'blog-customer' );
	$new_columns['description']    = _x( 'Description', 'blog-customer' );
	$new_columns['date']           = _x( 'Date', 'blog-customer' );

	return $new_columns;
}

/**
 * get featured image function
 */
function blog_customer_featured_image( $post_ID ) {
	$post_thumbnail_id = get_post_thumbnail_id( $post_ID );
	if ( $post_thumbnail_id ) {
		$post_thumbnail_img = wp_get_attachment_image_src( $post_thumbnail_id, 'thumbnail' );

		return $post_thumbnail_img[0];
	}
}

/**
 * show featured image in column
 */
function blog_customer_columns_content( $column_name, $post_ID ) {
	if ( $column_name == 'featured_image' ) {
		$post_featured_image = blog_customer_featured_image( $post_ID );
		if ( $post_featured_image ) {
			echo '<img width="40" height="40" src="' . $post_featured_image . '" />';
		}
//		else{
//			echo '<img width="40" height="40" src="' . get_template_directory_uri() . '/assets/images/avatar-profile.png' . '" />';
//		}
	} elseif ( $column_name == 'description' ) {
		the_excerpt();
	}
}

add_action( 'manage_blog-customer_posts_custom_column', 'blog_customer_columns_content', 10, 2 );

?>
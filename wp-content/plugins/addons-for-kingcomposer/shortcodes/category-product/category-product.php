<?php
/**
 * Created by PhpStorm.
 * User: xuanhanh-pc
 * Date: 28-Mar-21
 * Time: 22:19
 */

add_action( 'init', 'aks_category_product_shortcode_init', 99 );

function aks_category_product_shortcode_init() {

	global $kc;
	$kc->add_map(
		array(
			'aks_category_product' => array(
				'name'        => 'Category product',
				'description' => __( 'Category product shortcode', 'kingcomposer' ),
				'icon'        => 'akc_before_after_icon',
				'css_box'     => true,
				'category'    => 'My KingComposer',
				'params'      => array(
					array(
						'type'        => 'text',
						'label'       => __( 'Title', 'kingcomposer' ),
						'name'        => 'wp_title',
						'description' => __( 'Enter title box', 'kingcomposer' ),
						'admin_label' => true
					),
					array(
						'name'        => 'wp_short_des',
						'label'       => 'Short description',
						'type'        => 'textarea',
						'description' => 'Enter short description box',
					),
					array(
						'type'        => 'text',
						'label'       => __( 'Class name', 'kingcomposer' ),
						'name'        => 'wp_class',
						'description' => __( 'Add class to box', 'kingcomposer' )
					)

				)
			)
		)
	);
}


// Register Before After Shortcode
function aks_category_product_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'wp_title'     => '',
		'wp_short_des' => '',
		'wp_class'     => '',

	), $atts ) );

	$taxonomy     = 'product_cat';
	$orderby      = 'name';
	$show_count   = 0;      // 1 for yes, 0 for no
	$pad_counts   = 0;      // 1 for yes, 0 for no
	$hierarchical = 1;      // 1 for yes, 0 for no
	$title        = '';
	$empty        = 0;

	$args                   = array(
		'taxonomy'     => $taxonomy,
		'orderby'      => $orderby,
		'show_count'   => $show_count,
		'pad_counts'   => $pad_counts,
		'hierarchical' => $hierarchical,
		'title_li'     => $title,
		'hide_empty'   => $empty
	);
	$all_categories_product = get_categories( $args );

	?>
    <!--category product-->
    <section class="category-product <?php echo $wp_class; ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <div class="title">
                        <h2><?php echo $wp_title; ?></h2>
                    </div>
                    <div class="text">
                        <p><?php echo $wp_short_des; ?></p>
                    </div>
                </div>
            </div>

            <div class="row">
				<?php foreach ( $all_categories_product as $cat ) : ?>
                    <div class="col-md-4">
                        <a href="<?php echo get_term_link( $cat->slug, 'product_cat' ) ?>">
                            <div class="category mb-2">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="category-img">
                                            <img src="<?php echo wp_get_attachment_url( get_term_meta( $cat->term_id, 'thumbnail_id', true ) ) ?>"
                                                 alt="">
                                        </div>
                                    </div>
                                    <div class="col-8 pl-0 m-auto">
                                        <div class="category-title">
                                            <h4 class="mb-0"><?php echo $cat->name; ?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
				<?php endforeach; ?>

                <!--                <div class="col-md-4">-->
                <!--                    <a href="">-->
                <!--                        <div class="category mb-2">-->
                <!--                            <div class="row">-->
                <!--                                <div class="col-4">-->
                <!--                                    <div class="category-img">-->
                <!--                                        <img src="http://localhost/wordpress/wp-content/uploads/2021/03/Screenshot-1.png"-->
                <!--                                             alt="">-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                                <div class="col-8 pl-0 m-auto">-->
                <!--                                    <div class="category-title">-->
                <!--                                        <h4 class="mb-0">Danh mục sản phẩm</h4>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                </div>-->
                <!---->
                <!--                <div class="col-md-4">-->
                <!--                    <a href="">-->
                <!--                        <div class="category mb-2">-->
                <!--                            <div class="row">-->
                <!--                                <div class="col-4">-->
                <!--                                    <div class="category-img">-->
                <!--                                        <img src="http://localhost/wordpress/wp-content/uploads/2021/03/Screenshot-1.png"-->
                <!--                                             alt="">-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                                <div class="col-8 pl-0 m-auto">-->
                <!--                                    <div class="category-title">-->
                <!--                                        <h4 class="mb-0">Danh mục sản phẩm</h4>-->
                <!--                                    </div>-->
                <!--                                </div>-->
                <!--                            </div>-->
                <!--                        </div>-->
                <!--                    </a>-->
                <!--                </div>-->
            </div>
        </div>
    </section>
    <!--end category product-->
	<?php

	return '';
}


add_shortcode( 'aks_category_product', 'aks_category_product_shortcode' );

<?php
/**
 * Created by PhpStorm.
 * User: xuanhanh-pc
 * Date: 28-Mar-21
 * Time: 22:19
 */

add_action( 'init', 'aks_blog_customer_shortcode_init', 99 );

function aks_blog_customer_shortcode_init() {

	global $kc;
	$kc->add_map(
		array(
			'aks_blog_customer' => array(
				'name'        => 'Blog customer',
				'description' => __( 'Show slider comments of customer shortcode', 'kingcomposer' ),
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
function akc_blog_customer_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'wp_title'     => '',
		'wp_short_des' => '',
		'wp_class'     => '',

	), $atts ) );

	$wpb_blog_customer = new WP_Query( array(
		'post_type'      => 'blog-customer',
		'post_status'    => 'publish',
		'posts_per_page' => - 1
	) );

	?>
    <!--box customer-->
    <section class="blog-customer <?php echo $wp_class; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 text-md-center text-lg-left">
                    <div class="blog-customer-title">
                        <h2><?php echo $wp_title; ?></h2>
                    </div>
                    <div class="blog-customer-text">
                        <p><?php echo $wp_short_des; ?></p>
                    </div>
                </div>
                <div class="col-lg-8">
                    <section id="blog-customer" class="blog-customer-list owl-carousel owl-theme">
						<?php if ( $wpb_blog_customer->have_posts() ) : ?>
							<?php while ( $wpb_blog_customer->have_posts() ) : $wpb_blog_customer->the_post(); ?>
                                <div class="customer">
                                    <div class="customer-comment">
										<?php the_excerpt(); ?>
                                    </div>
                                    <div class="d-flex align-content-center">
                                        <div class="customer-avatar rounded-circle overflow-hidden"
                                             style="width:65px;height:65px;">
											<?php the_post_thumbnail( 'thumbnail' ); ?>
                                        </div>
                                        <div class="customer-name ml-2 mt-auto mb-auto">
                                            <h5 class="mb-0"><?php the_title(); ?></h5>
                                        </div>
                                    </div>
                                </div>
							<?php endwhile; endif; ?>
                    </section>
                </div>
            </div>
        </div>
    </section>
    <!--end box customer-->
	<?php

	return '';
}


add_shortcode( 'aks_blog_customer', 'akc_blog_customer_shortcode' );

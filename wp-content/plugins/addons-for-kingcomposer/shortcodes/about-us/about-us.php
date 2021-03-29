<?php
/**
 * Created by PhpStorm.
 * User: xuanhanh-pc
 * Date: 28-Mar-21
 * Time: 22:19
 */

add_action( 'init', 'aks_about_us_shortcode_init', 99 );

function aks_about_us_shortcode_init() {

	global $kc;
	$kc->add_map(
		array(
			'aks_about_us' => array(
				'name'        => 'About us',
				'description' => __( 'About us shortcode', 'kingcomposer' ),
				'icon'        => 'akc_before_after_icon',
				'css_box'     => true,
				'category'    => 'My KingComposer',
				'params'      => array(
					array(
						'name'        => 'about_image',
						'label'       => 'Image',
						'type'        => 'attach_image',
						"description" => __( "Insert image in about us", "kingcomposer" ),
						"admin_label" => true,
					),
					array(
						'type'        => 'text',
						'label'       => __( 'Title', 'kingcomposer' ),
						'name'        => 'about_title',
						'description' => __( 'Enter title about us', 'kingcomposer' ),
					),
					array(
						'name'        => 'about_content',
						'label'       => 'Content',
						'type'        => 'editor',
						'description' => 'Enter content about us',
					),
					array(
						'name'        => 'about_type',
						'label'       => 'About type',
						'type'        => 'select',
						'options'     => array(
							'right' => 'Text right',
							'left'  => 'Text left',
						),
					),
					array(
						'type'        => 'text',
						'label'       => __( 'Class name', 'kingcomposer' ),
						'name'        => 'about_class',
						'description' => __( 'Add class to section about us', 'kingcomposer' )
					)

				)
			)
		)
	);
}


// Register Before After Shortcode
function akc_about_us_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'about_type'    => '',
		'about_image'   => '',
		'about_title'   => '',
		'about_content' => '',
		'about_class'   => '',

	), $atts ) );


	$about_image = wp_get_attachment_image_src( $about_image, 'full' );

	?>
    <!--box about-->
    <section class="about about-<?php echo $about_type; ?> <?php echo $about_class; ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 about-column-1">
                    <div class="about-img">
                        <img src="<?php echo $about_image[0] ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6 about-column-2">
                    <div class="about-title">
                        <h2 class="text-center"><?php echo $about_title; ?></h2>
                    </div>
                    <div class="about-content">
						<?php echo $about_content; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--end box about-->
	<?php

	return '';
}


add_shortcode( 'aks_about_us', 'akc_about_us_shortcode' );

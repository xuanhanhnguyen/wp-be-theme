<?php
/**
 * Created by PhpStorm.
 * User: xuanhanh-pc
 * Date: 28-Mar-21
 * Time: 22:19
 */

add_action( 'init', 'aks_contact_shortcode_init', 99 );

function aks_contact_shortcode_init() {

	$forms = get_posts( array(
			'post_type'   => 'wpcf7_contact_form',
			'numberposts' => - 1
		)
	);

	$options = array(
		'' => '---chọn---'
	);

	foreach ( $forms as $form ) {
		$options[ $form->ID ] = $form->post_title;
	}

	global $kc;
	$kc->add_map(
		array(
			'aks_contact' => array(
				'name'        => 'Contact',
				'description' => __( 'Contact shortcode', 'kingcomposer' ),
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
						'name'        => 'wp_content',
						'label'       => 'Content',
						'type'        => 'editor',
						'description' => 'Enter content box',
					),
					array(
						'type'        => 'text',
						'label'       => __( 'Address', 'kingcomposer' ),
						'name'        => 'wp_address',
						'description' => __( 'Enter Address box', 'kingcomposer' ),
					),
					array(
						'type'        => 'text',
						'label'       => __( 'Email', 'kingcomposer' ),
						'name'        => 'wp_email',
						'description' => __( 'Enter email box', 'kingcomposer' ),
					),
					array(
						'type'        => 'text',
						'label'       => __( 'Phone', 'kingcomposer' ),
						'name'        => 'wp_phone',
						'description' => __( 'Enter phone box', 'kingcomposer' ),
					),
					array(
						'type'        => 'text',
						'label'       => __( 'Fax', 'kingcomposer' ),
						'name'        => 'wp_fax',
						'description' => __( 'Enter fax box', 'kingcomposer' ),
					),
					array(
						'type'        => 'select',
						'label'       => __( 'Form contact', 'kingcomposer' ),
						'name'        => 'wp_contact_form',
						'description' => __( 'Choose form contact box', 'kingcomposer' ),
						'options'     => $options
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
function aks_contact_shortcode( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'wp_title'        => '',
		'wp_content'      => '',
		'wp_contact_form' => '',
		'wp_class'        => '',
		'wp_address'      => '',
		'wp_phone'        => '',
		'wp_email'        => '',
		'wp_fax'          => '',

	), $atts ) );

	?>
    <!--contact-->
    <section class="contact <?php echo $wp_class; ?>">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-title">
                        <h2><?php echo $wp_title; ?></h2>
                    </div>
                    <div class="contact-text">
						<?php echo $wp_content; ?>
                    </div>
                    <div>
                        <ul>
                            <li>Địa chỉ: <?php echo $wp_address; ?></li>
                            <li>Số điện thoại: <?php echo $wp_phone; ?></li>
                            <li>Email: <?php echo $wp_email; ?></li>
                            <li>Fax: <?php echo $wp_fax; ?></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
					<?php if ( $wp_contact_form != '' )
						echo do_shortcode( '[contact-form-7 id="' . $wp_contact_form . '"]' ) ?>
                </div>
            </div>
        </div>
    </section>
    <!--end contact-->
	<?php

	return '';
}


add_shortcode( 'aks_contact', 'aks_contact_shortcode' );

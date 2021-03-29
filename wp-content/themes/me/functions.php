<?php

function me_theme_support() {
	/*Enable support for Post Thumbnails on posts and pages.*/
	add_theme_support( 'post-thumbnails' );
	add_image_size('post-thumbnail', 405, 224, true);
	add_image_size('post-single', 800, 445, true);
	add_image_size('image-slider', 1200, 774, true);

	add_theme_support(
		'custom-logo',
		array(
//			'height'      => $logo_height,
//			'width'       => $logo_width,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_theme_support( 'title-tag' );

	// Add support for full and wide align images.
	add_theme_support( 'align-wide' );
}

add_action( 'after_setup_theme', 'me_theme_support' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function me_menus() {

	$locations = array(
		'primary' => __( 'Main menu', 'me' )
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'me_menus' );
/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 *
 * @return string
 */
function me_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'me_get_custom_logo' );

/**
 * Register widget areas.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function me_sidebar_registration() {

	// Arguments used in all register_sidebar() calls.
	$shared_args = array(
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
		'before_widget' => '<div class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></div>',
	);

	// Footer
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Footer', 'me' ),
				'id'          => 'footer',
				'description' => __( 'Widgets in this area will be displayed in the first column in the footer.', 'me' ),
			)
		)
	);

	// Sidebar
	register_sidebar(
		array_merge(
			$shared_args,
			array(
				'name'        => __( 'Sidebar', 'me' ),
				'id'          => 'sidebar',
				'description' => __( 'Widgets in this area will be displayed in the second column in the footer.', 'me' ),
			)
		)
	);

}

add_action( 'widgets_init', 'me_sidebar_registration' );
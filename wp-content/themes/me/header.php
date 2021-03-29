<!doctype html>
<html lang="en">
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Css-->
    <link rel="stylesheet"
          href="<?php echo get_stylesheet_directory_uri() . '/assets/vendor/bootstrap-4.6.0-dist/css/bootstrap.css' ?>">
    <link rel="stylesheet" id="google-fonts-css"
          href="//fonts.googleapis.com/css?family=Roboto%3A300%2C300i%2C400%2C400i%2C500%2C500i%7CQuicksand%3A400%2C500%2C600&amp;ver=5.3.2"
          type="text/css" media="all">
    <link rel="stylesheet"
          href="<?php echo get_stylesheet_directory_uri() . '/assets/vendor/font-awesome/css/font-awesome.min.css' ?>"/>
    <link rel="stylesheet"
          href="<?php echo get_stylesheet_directory_uri() . '/assets/vendor/owl-carousel/assets/owl.carousel.css' ?>"/>
    <link rel="stylesheet"
          href="<?php echo get_stylesheet_directory_uri() . '/assets/vendor/owl-carousel/assets/owl.theme.default.min.css' ?>"/>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/assets/css/style.css' ?>">
	<?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri() . '/style.css' ?>">

</head>
<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<div class="wrapper">
    <div class="site-wrapper">
        <!--header-->
        <header>
            <nav class="navbar navbar-expand-lg menu py-0 container">
                <div class="logo">
					<?php echo get_custom_logo(); ?>
                </div>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#menu-primary" aria-controls="menu-primary"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="toggler-icon"></span>
                </button>

				<?php if ( has_nav_menu( 'primary' ) ) : ?>
                    <div class="collapse navbar-collapse" id="menu-primary">
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'primary',
								'menu_class'     => 'navbar-nav',
								'container'      => '',
								'echo'           => true,
								'items_wrap'     => '<ul id="%1$s" class="%2$s navbar-nav ml-auto">%3$s</ul>',
							)
						);
						?>
                    </div>
				<?php endif; ?>
            </nav>
        </header>
        <!--end header-->
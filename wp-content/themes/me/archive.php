<?php
/**
 * Created by PhpStorm.
 * User: xuanhanh-pc
 * Date: 28-Mar-21
 * Time: 21:29
 */

get_header();
?>
    <!--main-->
    <main>
        <nav aria-label="breadcrumb" class="bg-light">
            <ol class="breadcrumb bg-light container">
                <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Trang chủ</a></li>
                <li class="breadcrumb-item active d-md-block d-none" aria-current="page"><?php the_category(); ?></li>
            </ol>
        </nav>

        <section class="blog-post">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2 text-center">
                        <div class="title">
                            <h2><?php the_category(); ?></h2>
                        </div>
                        <div class="text">
							<?php echo category_description(); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
						<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'template-parts/content', get_post_format() ); ?>
						<?php endwhile; ?>
						<?php else : ?>
							<?php get_template_part( 'content', 'none' ); ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
<?php
get_footer();
<?php
/**
 * Created by PhpStorm.
 * User: xuanhanh-pc
 * Date: 28-Mar-21
 * Time: 10:00
 */

get_header();
?>
    <!--main-->
    <main>
		<?php if ( has_category() ): ?>
            <nav aria-label="breadcrumb" class="bg-light">
                <ol class="breadcrumb bg-light container">
                    <li class="breadcrumb-item"><a href="<?php echo home_url(); ?>">Trang chủ</a></li>
                    <li class="breadcrumb-item">
                        <a href="<?php echo get_category_link( get_the_category()[0]->term_id ); ?> "><?php echo get_the_category()[0]->name; ?></a>
                    </li>
                    <li class="breadcrumb-item active d-md-block d-none" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </nav>
		<?php endif; ?>

        <div class="container" style="padding-top: 60px; padding-bottom: 60px">
            <div class="row">
                <div class="col-md-12">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'template-parts/content', 'single' ); ?>
                        <!--						--><?php //comments_template(); ?>
					<?php endwhile; ?>
					<?php else : ?>
						<?php get_template_part( 'template-parts/content', 'none' ); ?>
					<?php endif; ?>
                </div>
            </div>
        </div>
    </main>
<?php
get_footer();
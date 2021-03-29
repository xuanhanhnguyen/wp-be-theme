<?php
/**
 * Created by PhpStorm.
 * User: xuanhanh-pc
 * Date: 28-Mar-21
 * Time: 09:59
 */
get_header();
?>
    <!--main-->
    <main>
		<?php if ( have_posts() ):while ( have_posts() ):the_post(); ?>
			<?php the_content(); ?>
		<?php endwhile; ?>
		<?php endif; ?>
    </main>
<?php
get_footer();

<article id="post-<?php the_ID(); ?>" class="post" <?php post_class( 'item' ); ?>>
    <div class="post-img">
        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail' ); ?></a>
    </div>

    <div class="post-title title-format">
        <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
            <h3><?php the_title() ?></h3>
        </a>
    </div>

    <div class="post-meta">
        <small>
            <i class="fa fa-calendar">
                <em><?php echo get_the_date(); ?></em>
            </i>
        </small>
    </div>
    <div class="post-description text-format">
		<?php the_excerpt(); ?>
    </div>
    <div class="text-center">
        <a class="read-more" href="<?php the_permalink(); ?>">
            Xem thêm <i class="fa fa-caret-right"></i>
        </a>
    </div>
</article>
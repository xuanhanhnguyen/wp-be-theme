<article class="post post-single">
    <div class="post-img">
        <a href="<?php the_permalink(); ?>"> <?php the_post_thumbnail( 'post-single' ); ?></a>
    </div>

    <div class="post-title title-format">
        <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
            <h1><?php the_title() ?></h1>
        </a>
    </div>

    <div class="post-meta">
        <small>
            <i class="fa fa-calendar">
                <em> <?php echo get_the_date(); ?></em>
            </i>
        </small>
    </div>
    <div class="post-description text-justify">
		<?php the_content(); ?>
    </div>
</article>
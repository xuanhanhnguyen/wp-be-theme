<?php
/**
 * Created by PhpStorm.
 * User: xuanhanh-pc
 * Date: 28-Mar-21
 * Time: 10:12
 */

//paginate
if ( $GLOBALS['wp_query']->max_num_pages > 1 ): ?>
    <nav class="pagination d-flex justify-content-between" role="navigation">
		<?php if ( get_previous_posts_link() ): ?>
            <div class="prev"><?php previous_posts_link( __( "<< Trước", "Fgc" ) ); ?></div>
		<?php else: ?>
            <div class="prev"><< Trước</div>
		<?php endif; ?>
		<?php if ( get_next_post_link() ): ?>
            <div class="next"><?php next_posts_link( __( "Tiếp >>", "Fgc" ) ); ?></div>
		<?php else: ?>
            <div class="next">Tiếp >></div>
		<?php endif; ?>
    </nav>
<?php endif; ?>
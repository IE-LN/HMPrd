<?php
global $ice_img, $ifunc, $size; //, $post, $wp_query;
$args = array(
	'numberposts' => 5
);
$posts = get_posts($args);
?>
<div class="results-section-list-wrap">
<h3>No matching results, try some of these links</h3>
	<ul class="results-section-list">
		<?php foreach( $posts as $post ) : ?>
			<li class="results-list-item">
				<article id="post-<?php $post->ID ?>" <?php post_class('news-item'); ?>>
					<header>
						<a class="news-image-link" href="<?php get_permalink($post->ID) ?>"  title="View <?php esc_attr(get_the_title()) ?>"><span class="key-hole kht80x60"><?php 
							$ifunc(apply_filters('ice-get-thumbnail-id', 0, $post->ID), $size, $ice_img ? 'gallery-image' : false)
						?></span></a>
						<div class="news-result-info">
							<div class="news-categories entry-categories grey"><?php the_category(', ') ?></div>
							<h2 class="gallery-title blackmaroon"><a href="<?php get_permalink() ?>" title="View <?php esc_attr(get_the_title()) ?>"><?php the_title() ?></a></h2>
							<div class="post-meta">
								<span class="blue bold comment-count"><?php
									comments_popup_link(' Leave a Comment &raquo;', '1 Comment &raquo;', '% Comments &raquo;');
								?></span>
								<span class="post-date"><?php get_the_date() ?></span>
							</div>
						</div>
						<div class="clear"></div>
					</header>
				</article><!-- end post-<?php $post->ID ?> -->
			</li>
		<?php endforeach; ?>
	</ul>
</div>

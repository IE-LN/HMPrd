<?php
/*
Template Name: Photos
*/

global $use_sub_nav, $extra_body, $post, $wp_query, $search_term, $tag_term, $use_sidebar;
$extra_body = 'photos-page';
$use_sub_nav = 'photos-sub-menu';
$use_sidebar = 'photos-hub-sidebar';


// call the header using the original query and post, since it may depend on those being the page itself
get_header();

// store orig query and post for later restoration, so that we can manipulate it for the content of the page
$old_query = clone $GLOBALS['wp_query'];
$old_post = is_object($GLOBALS['post']) ? clone $GLOBALS['post'] : null;

// figure out the cateogry if applicable
$displaying = 'most recent galleries';
$cat = get_category_by_slug($post->post_name);


// get $_GET tag value
$tag = get_query_var('tag');

// apply tag to tag_term if it doens't exist
if(empty($tag_term)) $tag_term = $tag;
//var_dump($tag);

$page = isset($wp_query->query_vars['paged']) && intval($wp_query->query_vars['paged']) > 1 ? intval($wp_query->query_vars['paged']) : 0;
$per_page = 15;

// image function vars
//$ice_img = function_exists('ice_get_attachment_image');
$ifunc = 'wp_get_attachment_image';//$ice_img ? 'ice_get_attachment_image' : 'wp_get_attachment_image';

$args = array(
	'post_status' => 'publish',
	//'post_type' => apply_filters('ice-gallery-post-type', 'gallery'),
	'post_type' => 'gallery',
	'posts_per_page' => $per_page,
	'paged' => $page,
);
if (is_object($cat) && !is_wp_error($cat) && isset($cat->slug)) {
	$args['category_name'] = $cat->slug;
	$displaying = 'galleries filed in '.$cat->name;
}
if (!empty($tag_term)) {
	$args['tag_slug__in'] = array($tag_term);
	$displaying = 'results for <span class="search-term">'.$tag_term.'</span>';
} elseif (!empty($search_term)) {
	$args['s'] = $search_term;
	$displaying = 'results for <span class="search-term">'.$search_term.'</span>';
}

$page_tags = wp_get_object_terms($post->ID, 'post_tag');
//var_dump($page_tags);

if (is_object($page_tags)) {
	$tag_ids = array();
	foreach ($page_tags as $page_tag) $tag_ids[] = $page_tag->term_id;
	$args['tag__in'] = $tag_ids;
}
//var_dump('args:', $args);

query_posts($args);

global $wp_query;
$term_link = '/photos/';
if (!empty($cat) and $cat->slug !== 'photos') {
	$term_link .= $cat->slug . '/';
} 
$pagination_out = its_pagination(array( 'per_page' => $per_page, 'base' => get_bloginfo('url') . $term_link.'%_%', 'greyed' => true, 'type' => 'list')); 

$total = $wp_query->found_posts;
//var_dump($total);
$page = ($page) ? $page : 1;
$start = $total > 0 ? (($page-1) * $per_page) + 1 : 0;
$start = ($start > 0) ? $start : 1;
$end = $total > (($page) * $per_page) ? (($page) * $per_page) : $total;

$size = array(180, 135);
?>
<div class="displaying-line-wrapper">
	<div class="displaying-line">
		<div class="right displaying-numbers"><?php echo number_format($start) ?> - <?php echo number_format($end) ?> of <?php echo number_format($total) ?> total results</div>
		<div class="left displaying-desc">Displaying <?php echo $displaying ?></div>
		<div class="clear"></div>
	</div>
</div>
<div id="content-column">
	<div id="content" role="main">
		<div class="grid three-column">
			<?php $ind = 0; ?>
			<?php if (have_posts()): ?>
				<?php while (have_posts()): the_post(); ?>
					<?php if ($ind % 3 == 0): ?><div class="grid-row"><?php endif; ?>
					<div class="grid-item column gallery-item">
						<div class="grid-item-inner">
							<article id="post-<?php $post->ID ?>" <?php post_class(); ?>>
								<header>
									<a href="<?php the_permalink() ?>"  title="View <?php esc_attr(get_the_title()) ?>"><span class="key-hole kht180x135"><?php 
										$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), $size);
										$url = $thumb[0];
										//$ifunc(apply_filters('ice-get-thumbnail-id', 0, $post->ID), $size, $ice_img ? 'gallery-image' : false)
									?><img src="<?php echo $url ?>" /></span></a>
									<div class="gallery-categories entry-categories grey"><?php the_category(', ') ?></div>
									<h2 class="gallery-title blackmaroon"><a href="<?php the_permalink() ?>" title="View <?php esc_attr(get_the_title()) ?>"><?php the_title() ?></a></h2>
									<div class="gallery-photos-count bold">
										<a href="<?php get_permalink($post->ID) ?>" title="View <?php esc_attr(get_the_title()) ?>"><?php 
											sprintf('%d Photos &raquo;', apply_filters('ice-gallery-image-count', 0, $post->ID))
										?></a>
									</div>
								</header>
							</article><!-- end post-<?php $post->ID ?> -->
						</div>
					</div>
					<?php if ($ind % 3 == 2 || $wp_query->current_post + 1 == $wp_query->post_count): ?></div><?php endif; ?>
					<?php $ind++; ?>
				<?php endwhile; ?>
			<?php else: ?>
				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'bm-its-core' ); ?></h1>
					</header>
					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'bm-its-core' ); ?></p>
						<?php get_search_form(); ?>
					</div>
				</article>
			<?php endif; ?>
			<div class="clear"></div>
		</div>
		<div class="clear"></div>
	</div>
	<div class="pagination-bottom"><?php echo $pagination_out ?></div>
</div>

<?php
// before starting any sidebar or footer, we need to restore the original query just in case a widget relies on it being the page
$GLOBALS['wp_query'] = $old_query;
$GLOBALS['post'] = $old_post;

// call the sidebar with the restored query and post
get_sidebar();
?>
<?php get_footer() ?>

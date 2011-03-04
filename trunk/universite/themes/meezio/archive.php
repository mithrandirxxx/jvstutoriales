<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

/* Retrieve options set by admin */
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) {
		$$value['id'] = $value['std']; 
	} else { 
		$$value['id'] = get_settings( $value['id'] ); 
	}
}

get_header();
?>
<div id="wrapper">
	<div id="content" class="narrowcolumn container" role="main">
	  <div id="posts" class="grid_540">

		<?php if (have_posts()) : ?>

		<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
		<!-- <div class="blog_navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			<div class="clear"></div>
		</div> -->

		<?php while (have_posts()) : the_post(); ?>
		<div <?php post_class() ?>>
				<h1 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
				<p><?php the_time('F jS, Y') ?><?php the_tags('Tags: ', ', ', '<br />'); ?> | <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php the_author_posts_link(); ?> | <?php comments_popup_link('0 comments', '1 comment', '% comments'); ?></p>

				<div class="entry">
					<?php the_content("&raquo; Read more") ?>
				</div>
		</div>
		<div class="post_divider"></div>

		<?php endwhile; ?>

		<div class="blog_navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; Older Entries') ?></div>
			<div class="alignright"><?php previous_posts_link('Newer Entries &raquo;') ?></div>
			<div class="clear"></div>
		</div>
	<?php else :

		if ( is_category() ) { // If this is a category archive
			printf("<h2 class='center'>Sorry, but there aren't any posts in the %s category yet.</h2>", single_cat_title('',false));
		} else if ( is_date() ) { // If this is a date archive
			echo("<h2>Sorry, but there aren't any posts with this date.</h2>");
		} else if ( is_author() ) { // If this is a category archive
			$userdata = get_userdatabylogin(get_query_var('author_name'));
			printf("<h2 class='center'>Sorry, but there aren't any posts by %s yet.</h2>", $userdata->display_name);
		} else {
			echo("<h2 class='center'>No posts found.</h2>");
		}
		get_search_form();
	endif;
?>

	</div> <!-- posts -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
	</div> <!-- content -->
	</div> <!-- wrapper -->


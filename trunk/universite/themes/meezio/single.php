<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header();
?>
<div id="wrapper">
	<div id="content" class="narrowcolumn container" role="main">
	<div id="posts" class="grid_540">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<h1><?php the_title(); ?></h1>
			<p><?php the_time('F jS, Y') ?><?php the_tags('Tags: ', ', ', '<br />'); ?> | <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php the_author_posts_link(); ?> | <?php comments_popup_link('0 comments', '1 comment', '% comments'); ?></p>

			<div class="entry">
				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>

				<?php wp_link_pages(array('before' => '<p><strong>Pages:</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
				<?php the_tags( '<p>Tags: ', ', ', '</p>'); ?>
			</div>
		<div class="blog_navigation">
			<div class="alignleft"><?php previous_post_link('%link', '&laquo; Previous', TRUE) ?></div>
			<div class="alignright"><?php next_post_link('%link', 'Next &raquo;', TRUE) ?></div>
			<div class="clear"></div>
		</div> 
		</div>

	<?php comments_template(); ?>

	<?php endwhile; else: ?>

		<p>Sorry, no posts matched your criteria.</p>

<?php endif; ?>

	</div> <!-- posts -->
	<?php get_sidebar(); ?>
	<?php get_footer(); ?>
	</div> <!-- content -->
	</div> <!-- wrapper -->



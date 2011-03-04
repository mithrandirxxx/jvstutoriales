<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

get_header(); ?>

	<div id="content" class="narrowcolumn" role="main">

	<?php if (have_posts()) : ?>

		<h2 class="pagetitle">Search Results</h2>

		<div class="blog_navigation">
			<div class="alignleft"><?php next_posts_link('%link', 'Older Entries', TRUE) ?></div>
			<div class="alignright"><?php previous_posts_link('%link', 'Newer Entries', TRUE) ?></div>
			<div class="clear"></div>
		</div>


		<?php while (have_posts()) : the_post(); ?>

			<div <?php post_class() ?>>
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('l, F jS, Y') ?></small>

				<p class="postmetadata"><?php the_tags('Tags: ', ', ', '<br />'); ?> Posted in <?php the_category(', ') ?> | <?php edit_post_link('Edit', '', ' | '); ?>  <?php comments_popup_link('0 comments &#187;', '1 comment &#187;', '% comments &#187;'); ?></p>
			</div>

		<?php endwhile; ?>

		<div class="blog_navigation">
			<div class="alignleft"><?php next_posts_link('%link', 'Older Entries', TRUE) ?></div>
			<div class="alignright"><?php previous_posts_link('%link', 'Newer Entries', TRUE) ?></div>
			<div class="clear"></div>
		</div>

	<?php else : ?>

		<h2 class="center">No posts found. Try a different search?</h2>
		<?php get_search_form(); ?>

	<?php endif; ?>

	</div>

<?php get_footer(); ?>

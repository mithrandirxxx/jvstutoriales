<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
if (isset($_GET['ajax'])): ?>

    <h2 style="color: #6b9c2b; padding: 10px 10px 0"><?php echo $post->post_title; ?></h2>
    <?php query_posts(array('post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_item')); ?>
    <?php $index = 1; ?>
    <div id="ajax-subpages" style="width: 750px; height: 295px; padding: 10px 10px 10px 0; overflow: hidden; position: relative; margin-left: 10px">
        <div class="subpages-area" style="width: 3900px; height: 300px; overflow: hidden">
            <?php if ( have_posts () ) : while ( have_posts() ) : the_post(); ?>
            <div id="<?php echo $index ?>" class="subpage-single" style="width: 750px; height: 300px; float: left; margin-right: 20px; position: relative">
                <?php the_content(); ?>
                <div class="navigation-subpage" style="clear: both; width: 750px; position: absolute; bottom: 0">
                    <?php if ($index - 1 != 0): ?>
                    <h1 id="prev_subpage" class="previous" style="margin-bottom: 0"><a href="#<?php echo $index - 1; ?>"></a></h1>
                    <?php endif; ?>
                    <?php if ($index != $wp_query->post_count): ?>
                    <h1 id="next_subpage" class="next" style="margin-bottom: 0"><a href="#<?php echo $index + 1; ?>"></a></h1>
                    <?php endif; ?>
                </div>
            </div>
            <?php $index++; ?>
            <?php endwhile; ?>
            <?php else: ?>
                <p><?php _e('No pages to display'); ?></p>
            <?php endif; ?>
        </div>

    </div>

        <div class="clear"></div>
    <script type="text/javascript">
        $(function(){
            $('#ajax-subpages').scrollTo($('#1'), 2000, {axis: 'x'});

            $('#next_subpage a, #prev_subpage a').live('click', function(e){
                e.preventDefault();

                var hash = $(this).attr('href');
                var $toElement = $(hash);
                $('#ajax-subpages').scrollTo($toElement, 2000, {axis: 'x'});
            });
        });
    </script>
<?php
else:

/* Retrieve options set by admin */
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) {
		$$value['id'] = $value['std'];
	} else {
		$$value['id'] = get_settings( $value['id'] );
	}
}

get_header(); ?>

<div id="wrapper">
	<div id="mask">
		<?php $pages = get_pages(array('sort_column' => 'menu_order', 'sort_order' => 'asc')); ?>

		<?php
		$cnt = 1;
		foreach($pages as $page) {
                $parent = get_page($page->post_parent);
                if ($parent->post_parent == 0):
			$post_keys = get_post_custom_values('section_id', $page->ID);
		?>
			<div class="<?php echo $page->post_name; ?> item <?php if(($mzo_transition == 'horizontal_vertical' && $cnt%2 == 0) || ($mzo_transition == 'horizontal')) { echo 'fl';} ?>" id="<?php echo $cnt; ?>">
			  <div class="content">
				

					<ul class="container">
						<li class='grid_820' style="width: 908px; ">
                                                    <img src="<?php echo get_first_image($parent); ?>" title="<?php echo $parent->post_title; ?>" alt="<?php echo $parent->post_title; ?>" />
                            <h2><?php echo $page->post_title; ?></h2>
                            <?php $content = wpautop($page->post_content); ?>
				 <?php echo do_shortcode($content); ?>
						</li>
						<li class="clear"></li>
					</ul>
				<div class="navigation" style="margin-top: 10px">


                                    <h1 id="prev" class="previous"><a class="prev_page change_section panel" href="#<?php echo $cnt - 1; ?>"></a></h1>

                                    <h1 id="next" class="next"><a class="next_page change_section panel" href="#<?php echo $cnt + 1; ?>"></a></h1>


                                </div> <!-- navigation -->
			  </div> <!-- content -->
			</div> <!-- item -->
                        <?php $cnt++; ?>
                        <?php endif; ?>
		<?php
		}
		?>
	</div>	<!-- mask -->
</div> <!-- wrapper -->
<script type="text/javascript">
    $(function(){
        $('#wrapper').scrollTo($('.<?php echo $name; ?>'), 1, {axis: 'x'});
    });
</script>
<?php get_footer(); ?>
<?php endif; ?>

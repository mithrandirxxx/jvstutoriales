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

get_header(); ?>

<div id="wrapper">
	<div id="mask">
		<?php $pages = get_pages(array('sort_column' => 'menu_order', 'sort_order' => 'asc')); ?>

		<?php
		$cnt = 0;
		foreach($pages as $page) {
                $parent = get_page($page->post_parent);
                if ($parent->post_parent == 0):
			$post_keys = get_post_custom_values('section_id', $page->ID);
		?>
			<div class="item <?php if(($mzo_transition == 'horizontal_vertical' && $cnt%2 == 0) || ($mzo_transition == 'horizontal')) { echo 'fl';} ?>" id="<?php echo $page->post_name; ?>">
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


                                    <h1 id="prev" class="previous"><a class="prev_page change_section" href="#"></a></h1>

                                    <h1 id="next" class="next"><a class="next_page change_section" href="#"></a></h1>


                                </div> <!-- navigation -->
			  </div> <!-- content -->
			</div> <!-- item -->
                        <?php endif; ?>
		<?php
			$cnt++;
		}
		?>
	</div>	<!-- mask -->
</div> <!-- wrapper -->
<script type="text/javascript">
    $(function(){
        $('#wrapper').scrollTo($('#<?php echo $name; ?>'), 1, {axis: 'x'});
    });
</script>
<?php get_footer(); ?>

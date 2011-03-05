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
	
		<?php $pages = get_posts(array('numberposts' => 6, 'post_type' => 'page', 'post_parent' => 4, 'orderby' => 'menu_order', 'order' => 'ASC')); ?>

		<?php $cnt = 0; ?>
			
                          
                            
					<div class="container" style="overflow: hidden; height: 530px;">
                                            <div class="content" style="width: 2100px; height: 530px;">
                                            <?php 
                                            foreach($pages as $page) {
                                                $post_keys = get_post_custom_values('section_id', $page->ID);
                                                $page_content = get_page($page->ID);?>
						<div id="<?php echo $page->post_name; ?>" class='grid_330' style="height: 530px; background: url('<?php bloginfo('template_url'); ?>/images/background/bg_<?php echo $cnt + 1; ?>.png') bottom center no-repeat;">
                                                <?php
                                                        echo do_shortcode($page_content->post_content);
                                                ?>
						</div>
                                                <?php
                                                    $cnt++;
                                            }
                                            ?>
						<div class="clear"></div>
                                            </div>

                                        </div> <!-- container -->
                                        <div class="navigation">
	
				
                                            <h1 id="prev_index" class="previous"><a href="#"></a></h1>
							
                                            <h1 id="next_index" class="next"><a href="#"></a></h1>
							

                                        </div> <!-- navigation -->
		
		
	
</div> <!-- wrapper -->

<?php get_footer(); ?>

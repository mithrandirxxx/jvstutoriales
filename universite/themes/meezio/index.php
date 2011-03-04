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
	
		<?php $pages = get_posts(array('numberposts' => 5, 'post_type' => 'page', 'post_parent' => 4, 'order' => 'ASC')); ?>

		<?php $cnt = 0; ?>
			
                          
                            
					<div class="container" style="overflow: auto;">
                                            <div class="content" style="width: 1750px">
                                            <?php 
                                            foreach($pages as $page) {
                                                $post_keys = get_post_custom_values('section_id', $page->ID);
                                                $page_content = get_page($page->ID);?>
						<div id="<?php echo $page->post_name; ?>" class='grid_330'>
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
				<div class="navigation">
					<?php
						/*if($cnt > 0) {
							echo '<h1 class="previous"><a class="prev_page change_section panel" title="'. get_menu_item_ID($post_key[$cnt-1]) .'" href="#'.$post_key[$cnt-1].'"></a></h1>';
							if($cnt < count($pages)-1) {
								echo '<h1 class="next"><a class="next_page change_section panel" title="'. get_menu_item_ID($post_key[$cnt+1]) .'" href="#'.$post_key[$cnt+1].'"></a></h1>';
							} else {
								if($mzo_blog_category != "") {
									echo '<h1 class="next"><a class="next_page change_section panel" title="'. get_menu_item_ID($post_key[$cnt+1]) .'" href="?cat='.$mzo_blog_category.'"></a></h1>';
								}
							}
						} else {
							echo '<h1 class="next"><a class="next_page change_section panel" title="'. get_menu_item_ID($post_key[$cnt+1]) .'" href="#'.$post_key[$cnt+1].'"></a></h1>';
						}*/
					?>
				</div> <!-- navigation -->
			  </div> <!-- container -->
		
		
	
</div> <!-- wrapper -->

<?php get_footer(); ?>

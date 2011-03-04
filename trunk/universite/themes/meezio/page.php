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
		<?php $pages = list_all_pages(); ?>

		<?php 
		//Get first and last page ID
		$cnt = 0;
		foreach($pages as $page) {
			$post_keys = get_post_custom_values('section_id', $page->ID);
			$post_key[$cnt] = $post_keys[0];
			$cnt++;
		}
		?>
		
		<?php
		$cnt = 0;
		foreach($pages as $page) {
			$post_keys = get_post_custom_values('section_id', $page->ID);
		?>
			<div class="item <?php if(($mzo_transition == 'horizontal_vertical' && $cnt%2 == 0) || ($mzo_transition == 'horizontal')) { echo 'fl';} ?>" id="<?php echo $post_keys[0]; ?>">
			  <div class="content">
				<?php 
					$page_content = get_page($page->ID); 
				?>
					<ul class="container">
						<li class='grid_820'>
				<?php
					echo do_shortcode($page_content->post_content);
				?>
						</li>
						<li class="clear"></li>
					</ul>
				<div class="navigation">
					<?php 
						if($cnt > 0) {
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
						}
					?>
				</div> <!-- navigation -->
			  </div> <!-- content -->
			</div> <!-- item -->
	
		<?php 
			$cnt++;
		}
		?>
	</div>	<!-- mask -->
</div> <!-- wrapper -->

<?php get_footer(); ?>

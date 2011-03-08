<?php
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
    get_header(); ?>
    
    <div id="wrapper">


        <div <?php post_class('container'); ?> style="height: 500px">
            <div class="inner-pages" style="width: 21000px; height: 500px">
                <?php $name = $post->post_name; ?>
                    <?php $pages = get_pages(array('sort_column' => 'menu_order', 'sort_order' => 'asc')); ?>
                    <?php foreach ($pages as $page): ?>
                    <?php $parent = get_page($page->post_parent); ?>
                        <?php if ($parent->post_parent == 0): ?>
                        <div id="<?php echo $page->post_name; ?>" class="single-page" style="width: 903px; height: 500px; position: relative; float: left; padding: 0 10px;">
                            <img src="<?php echo get_first_image($parent); ?>" title="<?php echo $parent->post_title; ?>" alt="<?php echo $parent->post_title; ?>" />
                            <h2><?php echo $page->post_title; ?></h2>
                            <?php $content = wpautop($page->post_content); ?>
                            <?php echo do_shortcode($content); ?>
                            <div class="navigation" style="clear: both; width: 863px; position: absolute; bottom: 0; padding: 0 20px">


                                <h1 id="prev" class="previous"><a href="#"></a></h1>

                                <h1 id="next" class="next"><a href="#"></a></h1>


                            </div> <!-- navigation -->
                        </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <div class="clear"></div>
            </div>
          </div> <!-- container -->

          
    </div> <!-- wrapper -->
    <script type="text/javascript">
        $(function(){
            $('.container').scrollTo($('#<?php echo $name; ?>'), 1, {axis: 'x'});
        });
    </script>
    <?php get_footer(); ?>
<?php endif; ?>

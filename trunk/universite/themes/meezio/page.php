<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
if (isset($_GET['ajax'])): ?>

    <h2 style="color: #6b9c2b; padding: 10px 10px 0"><?php echo $post->post_title; ?></h2>
    <?php query_posts(array('post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_item')); ?>
    <?php $index = 0; ?>
    <div id="ajax-subpages" style="width: 750px; height: 295px; padding: 10px 10px 10px 0; overflow: hidden; position: relative; margin-left: 10px">
        <div class="subpages-area" style="width: 3750px; height: 300px; overflow: hidden">
            <?php if ( have_posts () ) : while ( have_posts() ) : the_post(); ?>
            <div id="<?php echo $index ?>" class="subpage-single" style="width: 750px; height: 300px; float: left; margin-right: 20px; position: relative">
                <?php the_content(); ?>
                <div class="navigation-subpage" style="clear: both; width: 750px; position: absolute; bottom: 0">
                    <?php if ($index - 1 >= 0): ?>
                    <h1 id="prev_subpage" class="previous" style="margin-bottom: 0"><a href="#<?php echo $index - 1; ?>"></a></h1>
                    <?php endif; ?>
                    <?php if ($index != sizeof($posts) || sizeof($posts) != 1): ?>
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


        <div <?php post_class('container'); ?>>
                <?php if ( have_posts () ) : ?>

                    <?php if (is_child(0)) : ?>

                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php the_content(); ?>
                        <?php endwhile; ?>

                    <?php else: ?>

                        <?php while ( have_posts() ) : the_post(); ?>
                        <?php $parent_page = get_page($post->post_parent);?>
                        <img src="<?php echo get_first_image($parent_page); ?>" title="<?php echo $parent_page->post_title; ?>" alt="<?php echo $parent_page->post_title; ?>" />
                        <h2><?php the_title(); ?></h2>
                        <?php the_content(); ?>
                        <?php endwhile; ?>

                    <?php endif; ?>

                    <div class="clear"></div>

                <?php endif; ?>
          </div> <!-- container -->


    </div> <!-- wrapper -->

    <?php get_footer(); ?>
<?php endif; ?>

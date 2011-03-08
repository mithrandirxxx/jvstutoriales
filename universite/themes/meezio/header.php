<?php
/*error_reporting(E_ALL);*/
/**
 * @package WordPress
 * @subpackage Default_Theme
 */
?>
<?php 
/* Retrieve options set by admin */
global $options;
foreach ($options as $value) {
	if (get_settings( $value['id'] ) === FALSE) {
		$$value['id'] = $value['std']; 
	} else { 
		$$value['id'] = get_settings( $value['id'] ); 
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout_<?php echo $mzo_transition; ?>.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/colors/<?php echo $mzo_color_scheme; ?>.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/jscrollpane.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/scroller.css" type="text/css" media="screen" />
<?php if($mzo_isBlog == true) { ?>
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/blog.css" type="text/css" media="screen" />
<?php } ?>
<?php if($mzo_page_alignement == 'left') { ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout_left.css" type="text/css" media="screen" />
<?php } ?>

<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ($mzo_cufon == 'yes') { ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/cufon-yui.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/Delicious_500.font.js"></script>
<script type="text/javascript">
	Cufon.replace('h1, h2');
</script>
<?php } ?>

<!--[if IE 6]>
<script src="<?php bloginfo('template_url'); ?>/js/DD_belatedPNG.js"></script>
<script>
  DD_belatedPNG.fix('*');
</script>
<![endif]-->


<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.tabs.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.scroller.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.mousewheel.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.em.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jScrollPane.js"></script>

<?php if (is_home() || is_front_page()): ?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/menu.js"></script>
<script type="text/javascript">
    $(function(){
        $('.navigation-top').find('#prev_index').mouseover(function(){
            $(this).addClass('previous');
        });
        $('.navigation-top').find('#prev_index').mouseout(function(){
            $(this).removeClass('previous');
        });

        $('.navigation-top').find('#next_index').mouseover(function(){
            $(this).addClass('next');
        });
        $('.navigation-top').find('#next_index').mouseout(function(){
            $(this).removeClass('next');
        });
        
        $('.container').scrollTo($('#ambition'), 2000, {axis: 'x'});
        
        $('#menu li a').not('#menu li ul li a').click(function(e){
            e.preventDefault();
            var hash = $(this).attr('href');
            var $toElement = $(hash);

            $('.container').scrollTo($toElement, 2000, {axis: 'x'});

        });

        $('#next_index a').live('click', function(e){
            e.preventDefault();
            $('.container').scrollTo('+=350px', 2000, {axis: 'x'});
        });

        $('#prev_index a').live('click', function(e){
            e.preventDefault();
            $('.container').scrollTo('-=350px', 2000, {axis: 'x'});
        });
    });
</script>
<?php else:  ?>
<script type="text/javascript">
    $(function(){
        $('.container').jScrollPane();

        $('#next a').live('click', function(e){
            e.preventDefault();
            $('#wrapper').scrollTo('+=1680px', 2000, {axis: 'x'});
        });

        $('#prev a').live('click', function(e){
            e.preventDefault();
            $('#wrapper').scrollTo('-=1680px', 2000, {axis: 'x'});
        });
    });
</script>
<?php endif; ?>
<script type="text/javascript">
    $(function(){
        $('#menu ul').prev('a').addClass('submenu');
    });
</script>

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>

<?php wp_head(); ?>
</head>
<body style="background: url('<?php bloginfo('template_url'); ?>/images/background/<?php echo $mzo_background_image; ?>.jpg') repeat;">

<div id="page" <?php if($mzo_page_alignement == 'centered') {echo 'style="margin: 0 auto;"';} ?>>

<div id="header">
    <div id="header_box">
        <?php if (is_home() || is_front_page()): ?>
        
                <?php
                if(function_exists('wp_nav_menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'home-menu',
                        'depth' => 2,
                        'menu_id' => 'menu',
                        'menu_class' => '',
                        'container' => ''
                )); }
                ?>
        <div class="navigation-top" style="clear: both; padding: 0 50px; position: absolute; top: 325px; width: 820px">
            <h1 id="prev_index" style="float: left; width: 100px; height: 80px"><a style="float: left; width: 100px; height: 80px" href="#"></a></h1>
            <h1 id="next_index" style="float: right; width: 100px; height: 80px"><a style="float: right; width: 100px; height: 80px" href="#"></a></h1>
        </div> <!-- navigation -->

        <?php else: ?>

                <?php
                if(function_exists('wp_nav_menu')) {
                    wp_nav_menu(array(
                        'theme_location' => 'inner-menu',
                        'depth' => 2,
                        'menu_id' => 'menu',
                        'menu_class' => '',
                        'container' => ''
                )); }
                ?>

        <?php endif; ?>

    </div>
</div>

<?php
$themename = "Meezio Theme";
$shortname = "mzo";

$options = array (

	array(	"type" => "open"),
	
	array(	"name" => "Theme color",
			"desc" => "Choose a color scheme for your theme",
			"id" => $shortname."_color_scheme",
			"std" => "",
			"type" => "select",
			"options" => array("blue", "brown", "green", "orange", "pink", "purple", "red", "salmon", "yellow"),
			),
			
	array(	"name" => "Background image",
			"desc" => "Choose a a background image for your theme",
			"id" => $shortname."_background_image",
			"std" => "",
			"type" => "select",
			"options" => array("pattern1", "pattern2", "pattern3", "pattern4", "pattern5"),
			),
			
	array(	"name" => "Logo image",
			"desc" => "Enter the path to your logo image (base path is wp-content/themes/meezio/).",
			"id" => $shortname."_logo_image",
			"std" => "wp-content/themes/meezio/images/logo.png",
			"type" => "text"),
	
	array(	"name" => "Logo image width",
			"desc" => "Enter the logo image width in pixels.",
			"id" => $shortname."_logo_image_width",
			"std" => "222",
			"type" => "text"),
	
	array(	"name" => "Logo image height",
			"desc" => "Enter the logo image height in pixels.",
			"id" => $shortname."_logo_image_height",
			"std" => "95",
			"type" => "text"),
	
	array(	"name" => "Page transition style",
			"desc" => "Choose the page transition style for your theme",
			"id" => $shortname."_transition",
			"std" => "",
			"type" => "select",
			"options" => array("horizontal", "vertical", "horizontal_vertical"),
			),
			
	array(	"name" => "Page alignement",
			"desc" => "Choose the page alignement for your theme",
			"id" => $shortname."_page_alignement",
			"std" => "",
			"type" => "select",
			"options" => array("centered", "left"),
			),
			
	array(	"name" => "Custom font for H1 and H2 headers",
			"desc" => "Specify whether you'd like to use a special font for the H1 and H2 headings",
			"id" => $shortname."_cufon",
			"std" => "",
			"type" => "select",
			"options" => array("yes", "no"),
			),
			
	array(	"name" => "Footer text",
			"desc" => "Footer text",
			"id" => $shortname."_footer_text",
			"std" => "This is the &copy; copyright info. Your company name.",
			"type" => "text"),
	
	array(	"name" => "Blog category",
			"desc" => "Blog category to open after the last page has been reached. Leave empty if not used.",
			"id" => $shortname."_blog_category",
			"std" => "",
			"type" => "text"),
	
	
	array(	"type" => "close")
	
);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {
    
        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=functions.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=functions.php&reset=true");
            die;

        }
    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> settings</h2>

<form method="post">



<?php foreach ($options as $value) { 
    
	switch ( $value['type'] ) {
	
		case "open":
		?>
        <table width="100%" border="0" style="background-color:#f9f9f9; padding:5px;">
		
        
        
		<?php break;
		
		case "close":
		?>
		
        </table><br />
        
        
		<?php break;
		
		case "title":
		?>
		<table width="100%" border="0" style="background-color:#dceefc; padding:5px 10px;"><tr>
        	<td colspan="2"><h3 style="font-family:Georgia,'Times New Roman',Times,serif;"><?php echo $value['name']; ?></h3></td>
        </tr>
                
        
		<?php break;

		case 'text':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><input style="width:400px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" /></td>
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #ececec;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'textarea':
		?>
        
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><textarea name="<?php echo $value['id']; ?>" style="width:400px; height:200px;" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?></textarea></td>
            
        </tr>

        <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
        </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #ececec;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php 
		break;
		
		case 'select':
		?>
        <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
            <td width="80%"><select style="width:240px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select></td>
       </tr>
                
       <tr>
            <td><small><?php echo $value['desc']; ?></small></td>
       </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #ececec;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>

		<?php
        break;
            
		case "checkbox":
		?>
            <tr>
            <td width="20%" rowspan="2" valign="middle"><strong><?php echo $value['name']; ?></strong></td>
                <td width="80%"><? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?>
                        <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                        </td>
            </tr>
                        
            <tr>
                <td><small><?php echo $value['desc']; ?></small></td>
           </tr><tr><td colspan="2" style="margin-bottom:5px;border-bottom:1px solid #ececec;">&nbsp;</td></tr><tr><td colspan="2">&nbsp;</td></tr>
            
        <?php 		break;
	
 
} 
}
?>

<!--</table>-->

<p class="submit">
<input name="save" type="submit" value="Save changes" />    
<input type="hidden" name="action" value="save" />
</p>
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>

<?php
}

add_action('admin_menu', 'mytheme_add_admin'); ?>
<?php
if ( function_exists('register_sidebar') )
	register_sidebar(array(
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget' => '</li>',
        'before_title' => '',
        'after_title' => '',
    ));

?>
<?php
function list_all_pages() {
	global $wpdb;
	$query = "
					SELECT post_content, ID, menu_order 
					FROM wp_posts
					WHERE post_status = 'publish'
					AND post_type = 'page'
					ORDER BY menu_order ASC
				";

	$p = $wpdb->get_results($query);
	return $p;
}
?>
<?php 
function get_menu_item_ID($menu_item) {
	global $wpdb;
	$query = "
					SELECT id, parent 
					FROM wp_menuitems
					WHERE value = '#$menu_item'
					LIMIT 1
				";
	$result = $wpdb->get_results($query);
	
	if($result[0]->parent != 0) {
		return $result[0]->parent;
	} else {
		return $result[0]->id;
	}
	
}
?>
<?php
function pageURL() {
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $pageURL;
}
?>
<?php
add_filter('mce_buttons_2', 'mcekit_editor_buttons');
function mcekit_editor_buttons($buttons) {

	array_unshift($buttons, 'styleselect');

	return $buttons;
}
?>
<?php
add_filter('tiny_mce_before_init', 'mcekit_editor_settings');
function mcekit_editor_settings($settings) {

	if ( !empty($settings['theme_advanced_styles']) )
		$settings['theme_advanced_styles'] .= ';';
	else
		$settings['theme_advanced_styles'] = '';

	/**
	 * The format for this setting is "Name to display=class-name;".
	 * More info: http://wiki.moxiecode.com/index.php/TinyMCE:Configuration/theme_advanced_styles
	 *
	 * To be able to translate the class names they can be set in a PHP array (to keep them readable)
	 * and then converted to TinyMCE's format. You will need to replace 'tinymce-kit' with your theme's textdomain.
	 */
	$classes = array(
		__('260px grid', 'tinymce-kit') => 'grid_260',
		__('540px grid', 'tinymce-kit') => 'grid_540',
		__('Fancybox image', 'tinymce-kit') => 'fancybox',
		__('Thumbnail', 'tinymce-kit') => 'thumb',
		__('Clear float', 'tinymce-kit') => 'clear',
	);

	$class_settings = '';
	foreach ( $classes as $name => $value ) {
		$class_settings .= "{$name}={$value};";
	}

	$settings['theme_advanced_styles'] .= trim($class_settings, '; ');

	return $settings;
}

/**
 * Custom functions
 */

/* Disable the Admin Bar. */
add_filter( 'show_admin_bar', '__return_false' );

/* Remove the Admin Bar preference in user profile */
remove_action( 'personal_options', '_admin_bar_preferences' );
/**
 * Add menu
 */
function register_menu() {
    register_nav_menus( array(
        'home-menu' => __( 'Home Menu' ),
        'inner-menu' => __( 'Inner Menu' )
    ) );
}
add_action( 'after_setup_theme', 'register_menu' );
/**
 * Check child pages
 */
function is_child($pageID) {
    global $post;
    if( is_page() && ($post->post_parent==$pageID) ) {
           return true;
    } else {
           return false;
    }
}
/**
 * Get first image of post/page
 */
function get_first_image($post) {
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];

    if(empty($first_img)){
        return false;
    }
    return $first_img;
}
/**
 * Get Subpages
 */
function get_child_pages(){
    global $post;
    $output = '';
    
    $query = new WP_Query(array('post_parent' => $post->ID, 'post_type' => 'page', 'order' => 'ASC', 'orderby' => 'menu_order', 'posts_per_page' => -1));
    
    if ( $query->have_posts () ) {
        $cnt = 0;
         while ( $query->have_posts() ) : $query->the_post();
            if ($cnt == 6) {
                $style = 'style="margin-left:0"';
            } elseif ($cnt == 2) {
                $style = 'style="margin-left:0; clear: both"';
            } else {
                $style = '';
            }
            
            $output .= '<div class="child-page-link" ' . $style . ' id="child-page-' . get_the_ID() . '"><a class="fancybox" href="' . get_the_guid() . '&ajax=true">' . get_the_title() . '</a></div>';
            $cnt++; $style = '';
        endwhile;
        
        return '<div id="child-pages">' . $output . '</div>';
    } else {
        return false;
    }
}
/**
 * Subpages shortcode
 */
add_shortcode('subpages-links', 'get_child_pages');
/**
 * Add image map
 */
function add_image_map($atts, $content = null){

    extract(shortcode_atts(array(
        "href1" => '#',
        "href2" => '#',
        "href3" => '#',
        "href4" => '#',
        "href5" => '#'
    ), $atts));
    
    $links .= '<div id="parcours-map">';
    $links .= '<a class="first" href="' . $href1 . '"></a>';
    $links .= '<a class="second" href="' . $href2 . '"></a>';
    $links .= '<a class="third" href="' . $href3 . '"></a>';
    $links .= '<a class="fourth" href="' . $href4 . '"></a>';
    $links .= '<a class="fifth" href="' . $href5 . '"></a>';
    $links .= '</div>';
    
    return $links;
}
/**
 * Subpages shortcode
 */
add_shortcode('parcours-unique', 'add_image_map');
/**
 * Add sidebar
 */
register_sidebar(array(
    'name'          => 'Sidebar 2',
    'description'   => '',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
    'before_widget' => '<div class="widget">',
    'after_widget'  => '</div>',
));
?>
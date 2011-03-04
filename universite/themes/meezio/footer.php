<?php
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

</div>

<div id="footer" role="contentinfo">
    <div id="footer_box">
        <?php if ($mzo_footer_text): ?>
        <p><?php echo $mzo_footer_text; ?></p>
        <?php endif; ?>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>

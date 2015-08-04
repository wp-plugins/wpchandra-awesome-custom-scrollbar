<?php 
/*
Plugin Name: Awesome Custom Scrollbar
Plugin URI: http://www.wpchandra.com/ 
Description: Awesome Custom Scrollbar is a jQuery custom scrollbar for your wordpress website. This plugin will enable awesome custom scrollbar. You can change scrollbar color, border radius, scroll speed, width, hide delay & other settings.
Author: Chandrakesh Kumar 
Version: 2.0   
Author URI: http://www.wpchandra.com/  
*/     
function wpchandra_custom_scrollbar_admin_menu() {  
	add_options_page('WPChandra Custom Scrollbar', 'WPChandra Custom Scrollbar', 'manage_options', 'wpchandra-scrollbar-settings', 'wpchandra_scrollbar_settings');
	add_action( 'admin_init', 'wpchandra_custom_scrollbar_register_settings' );
}
function wpchandra_custom_scrollbar_register_settings() { //register settings
    register_setting( 'wpchandra-custom-scrollbar-settings', 'wpchandra_custom_scrollbar_show');
	register_setting( 'wpchandra-custom-scrollbar-settings', 'wpchandra_custom_scrollbar_width');
	register_setting( 'wpchandra-custom-scrollbar-settings', 'wpchandra_custom_scrollbar_bgcolor' );
	register_setting( 'wpchandra-custom-scrollbar-settings', 'wpchandra_custom_scrollbar_border_color' );
	register_setting( 'wpchandra-custom-scrollbar-settings', 'wpchandra_custom_scrollbar_border_radius' );
	register_setting( 'wpchandra-custom-scrollbar-settings', 'wpchandra_custom_scrollbar_speed' );
	register_setting( 'wpchandra-custom-scrollbar-settings', 'wpchandra_custom_scrollbar_opacity' );
	register_setting( 'wpchandra-custom-scrollbar-settings', 'wpchandra_custom_scrollbar_autohide' );
	register_setting( 'wpchandra-custom-scrollbar-settings', 'wpchandra_custom_scrollbar_hidecursordelay' );
}
function wpchandra_custom_scrollbar_activate() { //add default setting values on activation
    add_option( 'wpchandra_custom_scrollbar_show', 'show', '', 'yes' );
	add_option( 'wpchandra_custom_scrollbar_width', '8px', '', 'yes' );
	add_option( 'wpchandra_custom_scrollbar_bgcolor', '#d6d6d6', '', 'yes' );
	add_option( 'wpchandra_custom_scrollbar_border_color', '#000000', '', 'yes' );
	add_option( 'wpchandra_custom_scrollbar_border_radius', '0px', '', 'yes' );
	add_option( 'wpchandra_custom_scrollbar_speed', '100', '', 'yes' );
	add_option( 'wpchandra_custom_scrollbar_opacity', '1', '', 'yes' );
	add_option( 'wpchandra_custom_scrollbar_autohide', 'false', '', 'yes' );
	add_option( 'wpchandra_custom_scrollbar_hidecursordelay', '400', '', 'yes' );
}
function wpchandra_custom_scrollbar_deactivate() { //delete setting and values on deactivation
    delete_option( 'wpchandra_custom_scrollbar_show');
	delete_option( 'wpchandra_custom_scrollbar_width');
	delete_option( 'wpchandra_custom_scrollbar_border_radius');
	delete_option( 'wpchandra_custom_scrollbar_bgcolor');
	delete_option( 'wpchandra_custom_scrollbar_border_color');
	delete_option( 'wpchandra_custom_scrollbar_speed' );
	delete_option( 'wpchandra_custom_scrollbar_opacity' );
	delete_option( 'wpchandra_custom_scrollbar_autohide' );
	delete_option( 'wpchandra_custom_scrollbar_hidecursordelay' );
}
 /* Add scripts to head */
function wpchandra_custom_scrollbar_scripts() { 
	wp_enqueue_script('jquery');
    wp_register_script( 'script', plugins_url('js/jquery.nicescroll.min.js', __FILE__) );
    wp_enqueue_script( 'script', array('jquery') );
}
function wpchandra_add_color_picker( $hook_suffix ) { //add colorpicker to options page
	wp_enqueue_script( 'wp-color-picker' );
	wp_enqueue_script( 'wp-color-picker-scripts', plugins_url( 'js/scripts.js', __FILE__ ), array( 'jquery', 'wp-color-picker' ), false, true );
	wp_enqueue_style( 'wp-color-picker' );
}
function wpchandra_scrollbar_settings(){ //add settings page
?>
	<div class="wrap">
	<h2>WPChandra Custom Scrollbar Options</h2>
	<p class="description">The wpchandra awesome custom scrollbar plugin provides you to customize scrollbar for your website. you need to somthing, like <a href="https://profiles.wordpress.org/wp-chandra/#content-plugins" target="_blank">WPChandra Awesome Custom Scrollbar</a>.</p>
	<h3>Display Settings</h3>
	<form method="post" action="options.php">
		<?php settings_fields('wpchandra-custom-scrollbar-settings'); ?>
		<?php do_settings_sections('wpchandra-custom-scrollbar-settings'); ?>
		<table class="form-table">
		<tr>
			<th scope="row"><label for="wpchandra_custom_scrollbar_show">Show</label></th>
			<td>:</td>
			<td><fieldset><label title="Show"><input type="radio" name="wpchandra_custom_scrollbar_show" value="show" <?php
		if ('show' == get_option('wpchandra_custom_scrollbar_show'))
			echo 'checked="checked"';
		?>>Show</label><br /><label title="Hide"><input type="radio" name="wpchandra_custom_scrollbar_show" value="hide" <?php
		if ('hide' == get_option('wpchandra_custom_scrollbar_show'))
			echo 'checked="checked"';
		?>>Hide</label><br /></fieldset>
				<p class="description">Change to enable or desable custom scrollbar!</p>
			</td>
		</tr>
		<tr>
			<th scope="row"><label for="wpchandra_custom_scrollbar_width">Scrollbar Width</label></th>
			<td>:</td>
			<td>
				<input type="text" name="wpchandra_custom_scrollbar_width"  id="wpchandra_custom_scrollbar_width" value="<?php echo get_option('wpchandra_custom_scrollbar_width'); ?>" />
				<p class="description">Cursor width in pixel, default is 8px (you can write "8px" too)</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="wpchandra_custom_scrollbar_border_radius">Scrollbar Radius</label></th>
			<td>:</td>
			<td>
				<input type="text" name="wpchandra_custom_scrollbar_border_radius"  id="wpchandra_custom_scrollbar_border_radius" value="<?php echo get_option('wpchandra_custom_scrollbar_border_radius'); ?>" />
				<p class="description">Border radius in pixel for cursor, default is "0px"</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="wpchandra_custom_scrollbar_bgcolor">Background Color</label></th>
			<td>:</td>
			<td>
				<input type="text" name="wpchandra_custom_scrollbar_bgcolor"  id="wpchandra_custom_scrollbar_bgcolor" value="<?php echo stripslashes(get_option('wpchandra_custom_scrollbar_bgcolor')); ?>"  />
				<p class="description">Change your scrollbar background color. Default color is #1e73be</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="wpchandra_custom_scrollbar_border_color">Border Color</label></th>
			<td>:</td>
			<td>
				<input type="text" name="wpchandra_custom_scrollbar_border_color"  id="wpchandra_custom_scrollbar_border_color" value="<?php echo stripslashes(get_option('wpchandra_custom_scrollbar_border_color')); ?>" />
				<p class="description">Change your scrollbar border color. Default color is #81d742</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="wpchandra_custom_scrollbar_speed">Scroll Speed</label></th>
			<td>:</td>
			<td>
				<input type="text" name="wpchandra_custom_scrollbar_speed"  id="wpchandra_custom_scrollbar_speed" value="<?php echo get_option('wpchandra_custom_scrollbar_speed'); ?>" />
				<p class="description">Change scrolling speed, default value is 100</p>
			</td>
		</tr>
		
	    <tr>
			<th scope="row"><label for="wpchandra_custom_scrollbar_opacity">Scrollbar Opacity</label></th>
			<td>:</td>
			<td>
				<input type="text" name="wpchandra_custom_scrollbar_opacity"  id="wpchandra_custom_scrollbar_opacity" value="<?php echo get_option('wpchandra_custom_scrollbar_opacity'); ?>" />
				<p class="description">Change opacity very cursor is active (scrollabar "visible" state), range from 1 to 0, default is 1 (full opacity)</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="wpchandra_custom_scrollbar_autohide">Autohide</label></th>
			<td>:</td>
			<td><fieldset><label title="enable"><input type="radio" name="wpchandra_custom_scrollbar_autohide" value="true" <?php
		if ('true' == get_option('wpchandra_custom_scrollbar_autohide'))
			echo 'checked="checked"';
		?>>Enable</label><br /><label title="disable"><input type="radio" name="wpchandra_custom_scrollbar_autohide" value="false" <?php
		if ('false' == get_option('wpchandra_custom_scrollbar_autohide'))
			echo 'checked="checked"';
		?>>Disable</label><br /></fieldset>
				<p class="description"> Hide the scrollbar works, default value is true</p>
			</td>
		</tr>
		
		<tr>
			<th scope="row"><label for="wpchandra_custom_scrollbar_hidecursordelay">Hide Cursor Delay</label></th>
			<td>:</td>
			<td>
				<input type="text" name="wpchandra_custom_scrollbar_hidecursordelay"  id="wpchandra_custom_scrollbar_hidecursordelay" value="<?php echo get_option('wpchandra_custom_scrollbar_hidecursordelay'); ?>" />
				<p class="description">Set the delay in microseconds to fading out scrollbars (default:400)</p>
			</td>
		</tr>
		
		<tr valign="top" align="left">
		<td colspan="2"><?php submit_button(); ?></td>
		</tr>
		</table>
	</form>
	
	
	</div>
	
	<?php
}
?>
<?php
function wpchandra_custom_scrollbar_add_scripts_to_head() { ?>
	
<?php if(get_option('wpchandra_custom_scrollbar_show')=="show"){ ?>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		var nice = $("html").niceScroll({
			cursorcolor: "<?php echo get_option('wpchandra_custom_scrollbar_border_color'); ?>",
			cursorwidth: "<?php echo get_option('wpchandra_custom_scrollbar_width'); ?>",
			cursorborder:"none",
			cursorborderradius:"<?php echo get_option('wpchandra_custom_scrollbar_border_radius'); ?>",
			background:"<?php echo get_option('wpchandra_custom_scrollbar_bgcolor'); ?>",
			scrollspeed :"<?php echo get_option('wpchandra_custom_scrollbar_speed'); ?>",
			autohidemode :<?php echo get_option('wpchandra_custom_scrollbar_autohide'); ?>,
			cursoropacitymax:<?php echo get_option('wpchandra_custom_scrollbar_opacity'); ?>,
			bouncescroll: true,
			smoothscroll: true
		});
	});
</script>

<?php
}}
function wpchandra_custom_scrollbar_links( $links ) {
   $links[] = '<a href="'. get_admin_url(null, 'options-general.php?page=wpchandra-scrollbar-settings') .'">Settings</a>';
   $links[] = '<a href="http://www.wpchandra.com/wp-plugins" target="_blank">More Plugins</a>';
   return $links;
}
register_activation_hook( __FILE__, 'wpchandra_custom_scrollbar_activate' ); //register activation hook
register_deactivation_hook( __FILE__, 'wpchandra_custom_scrollbar_deactivate' ); //register deactivation hook
add_action('admin_menu', 'wpchandra_custom_scrollbar_admin_menu'); //add settings admin menu
add_action('wp_enqueue_scripts', 'wpchandra_custom_scrollbar_scripts'); //add wpchandra custom scrollbar scripts 
add_action( 'admin_enqueue_scripts', 'wpchandra_add_color_picker' );//add color picker js to admin
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'wpchandra_custom_scrollbar_links' );
add_action('wp_head', 'wpchandra_custom_scrollbar_add_scripts_to_head');//add scripts to head

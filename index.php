<?php
/*
Plugin Name: CaliCoTek Floating Social Slider
Plugin URI: http://calicotek.com/calicotek-wp/
Description: (New - Under Development Beta)This Plugin Adds A Floating Social Like/Follow Slider to The Sides Top or Bottom of ony Wordpress Website. Includes Facebook, Twitter, Google Plus and Email.
Version: 1.5.2
Author: modmanmatt
Author URI: http://calicotek.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/
// For debugging purposes
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
//define('WP-DEBUG', true);

// Version Definition should be same as above
define('WPFIRESELLER_VERSION', '1.5.2' );

/* Version check */
global $wp_version;
$exit_msg=__('calicotek Social Slider Plugin requires WordPress version 3.0 or higher; please update first.', 'cct_social_slider');
if (version_compare($wp_version,"3.0","<"))
{
	exit ($exit_msg);
}
 
// this wil add the action trigger to your wp site using the wp_head Trigger
  add_action('wp_head', 'insert_css_code');
  add_action('wp_head', 'insert_social_slider_code');

// This inserts the code for the css style and slider images code from style.css
  function insert_css_code() {
    include( 'style.css' );	
  }

// This inserts the code for the Social Slider Scripts code
  function insert_social_slider_code() {
	include( 'fss-code.php' );	
  }
// Set-up Action and Filter Hooks
register_activation_hook(__FILE__, 'cct_social_slider_add_defaults');  // add action hook defaults to database
register_uninstall_hook(__FILE__, 'cct_social_slider_delete_plugin_options');  // clean and delete old plugin options if option to complete remove is used
add_action('admin_init', 'cct_social_slider_init' );
add_action('admin_menu', 'cct_social_slider_add_options_page'); // Register options Page
add_filter( 'plugin_action_links', 'cct_social_slider_plugin_action_links', 10, 2 ); // adds setting link to plugin installer page

// Delete options table entries ONLY when plugin deactivated AND deleted
function cct_social_slider_delete_plugin_options() {
	delete_option('cct_social_slider_options');
}

// Define default option settings
function cct_social_slider_add_defaults() {
	$tmp = get_option('cct_social_slider_options');
	if(($tmp['chk_default_options_db']=='1')||(!is_array($tmp))) {
		delete_option('cct_social_slider_options'); // so we don't have to reset all the 'off' checkboxes too! (don't think this is needed but leave for now)
		$arr = array(
			'version' => 'WPFIRESELLER_VERSION;',
		    'linkedin' => 'your-account',
		    'pinterest' => 'your-account',
			'twitter' => 'http://twitter/yourpage',
            'google' => 'http://google.com/yourpage',
            'email' => 'admin@mysite.com',
			'drp_select_box' => 'right',
			'chk_default_options_db' => ''
		);
		update_option('cct_social_slider_options', $arr);
	}
}



// Init plugin options to white list our options
function cct_social_slider_init(){
	register_setting( 'cct_social_slider_plugin_options', 'cct_social_slider_options', 'cct_social_slider_validate_options' );
	load_plugin_textdomain( 'cct_social_slider' );
}

	if(!load_plugin_textdomain('cct_social_slider','/wp-content/languages/'))
		load_plugin_textdomain('cct_social_slider', false, basename( dirname( __FILE__ ) ) . '/languages' );

// Add menu page
function cct_social_slider_add_options_page() {
	add_options_page('CCT Social Slider Widget Settings', 'CCT Social Slider', 'manage_options', __FILE__, 'cct_social_slider_render_form');
}

// Sart Plugin Options Page
// Render the Plugin options form
function cct_social_slider_render_form() {
$options = get_option('cct_social_slider_options');
?>
    
    <div class="wrap"><!-- Display Plugin Icon, Header, and Description -->
<table style="width:100%; background-color:DDDDDD;"><tr>
<td><div class="icon32" id="icon-options-general"></div><h2><?php _e('CaliCoTek Floating Social Slider Plugin Settings', 'cct_social_slider'); ?> </h2></td>
<!-- Start Donation Plugin Info Heml -->
  <table class="table_settings_page" style="width:100%; background-color:DDDDDD;"><tr><td Align="center"><!-- End Donation Plugin Info Heml --><div class="notifications"> <b><i>Tip: </i></b><?php _e('Please add your social media accounts below and activate wich sliders you would like to appear in the front end of your site.', 'cct_social_slider'); ?></div><!-- Beginning of the Plugin Options Form -->
		<form method="post" action="options.php"><?php settings_fields('cct_social_slider_plugin_options'); ?><?php $options = get_option('cct_social_slider_options'); ?>
<!-- Table Structure Containing Form Controls -->
	<!-- Each Plugin Option Defined on a New Table Row --><table class="table_settings_page" style="width:100%;">
		  <tr>		  
			<th scope="row"><?php _e('FaceBook', 'cct_social_slider'); ?></th>
			<td width="15px">on/off</td>
		  <td><input type="text" size="30" name="cct_social_slider_options[facebook]" value="<?php echo $options['facebook']; ?>" />
			<span style="color:#666666;margin-left:2px;"><?php _e('Add Your Facebook Account Examp: https://facebook.com/yourpagename', 'cct_social_slider'); ?></span></td>
		  </tr>
		  
		  <tr>
			<th scope="row"><?php _e('Linkedin', 'cct_social_slider'); ?></th>
		  <td width="15px">on/off</td>
		    <td><input type="text" size="30" name="cct_social_slider_options[linkedin]" value="<?php echo $options['linkedin']; ?>" />
			<span style="color:#666666;margin-left:2px;"><?php _e('Add Your Twitter Account Examp: twittername', 'cct_social_slider'); ?></span>
		  (New)
			  </td>
		  </tr>
		  
		  <tr>
			<th scope="row"><?php _e('Pinterest', 'cct_social_slider'); ?></th>
		  <td width="15px">on/off</td>
		    <td><input type="text" size="30" name="cct_social_slider_options[pinterest]" value="<?php echo $options['pinterest']; ?>" />
			<span style="color:#666666;margin-left:2px;"><?php _e('Add Your Twitter Account Examp: twittername', 'cct_social_slider'); ?></span>
		  <img src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/beta.png" height="30px" width="30px"title="This Setting is uder Development" align="center" />(feature coming soon)
			  </td>
		  </tr>
		  
		  <tr>
			<th scope="row"><?php _e('Twitter', 'cct_social_slider'); ?></th>
		  <td width="15px">on/off</td>
		    <td><input type="text" size="30" name="cct_social_slider_options[twitter]" value="<?php echo $options['twitter']; ?>" />
			<span style="color:#666666;margin-left:2px;"><?php _e('Add Your Twitter Account Examp: twittername', 'cct_social_slider'); ?></span>
		  <img src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/beta.png" height="30px" width="30px"title="This Setting is uder Development" align="center" />Twitter Broke, working to fix, off for now.
			  </td>
		  </tr>
		  
		  <tr>
			<th scope="row"><?php _e('Email NewsLetter', 'cct_social_slider'); ?></th>
		  <td width="15px">on/off</td>
            <td><input type="text" size="30" name="cct_social_slider_options[email_newsletter]" value="<?php echo $options['email_newsletter']; ?>" />
		    <span style="color:#666666;margin-left:2px;"><?php _e('Add Your Email Newsletter Settings : Beta :', 'cct_social_slider'); ?></span>
			<img src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/beta.png" height="30px" width="30px"title="This Setting is uder Development" align="center" />
			</td>
		</tr>
		  <tr>
			<th scope="row"><?php _e('Email Us', 'cct_social_slider'); ?></th>
		  <td width="15px">on/off</td>
            <td><input type="text" size="30" name="cct_social_slider_options[email]" value="<?php echo $options['email']; ?>" />
		    <span style="color:#666666;margin-left:2px;"><?php _e('Add Your Email Account : Beta :', 'cct_social_slider'); ?></span>
			<img src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/beta.png" height="30px" width="30px"title="This Setting is uder Development" align="center" />
			</td>
		</tr>
		  <tr>
		    <th scope="row"><?php _e('Google Plus', 'cct_social_slider'); ?></th>
			<td width="15px">on/off</td>
            <td><span style="color:#666666;margin-left:2px;"><?php _e('Adds Google Plus Button Slider nothing to configure just turn on or off', 'cct_social_slider'); ?></span></td>
		  </tr>
		
		  <!-- Select Drop-Down Control -->
				<tr>
					<th scope="row"><?php _e('Screen Position', 'cct_social_slider'); ?></th>
					<td width="15px">on/off</td>
				  <td>
						<select name='cct_social_slider_options[drp_select_box]'>
							<!--<option value='top' <?php selected('top', $options['drp_select_box']); ?>>Top</option>-->
							<option value='left' <?php selected('left', $options['drp_select_box']); ?>>Left</option>
							<option value='right' <?php selected('right', $options['drp_select_box']); ?>>Right</option>
							<!--<option value='bottom' <?php selected('bottom', $options['drp_select_box']); ?>>Bottom</option>-->
						</select>
						<span style="color:#666666;margin-left:2px;"><?php _e('Choose what side of the screen you would like your floating social slider', 'cct_social_slider'); ?></span>
					</td>
				</tr>
				<tr valign="top" style="border-top:#dddddd 1px solid;">
					<th scope="row"><?php _e('Database Options', 'cct_social_slider'); ?></th>
					<td width="15px">on/off</td>
				  <td>
						<label><input name="cct_social_slider_options[chk_default_options_db]" type="checkbox" value="1" <?php if (isset($options['chk_default_options_db'])) { checked('1', $options['chk_default_options_db']); } ?> /> <?php _e('Restore defaults upon plugin deactivation/reactivation', 'cct_social_slider'); ?></label>
					  <span style="color:#666666;margin-left:2px;"><?php _e('Only check this if you want to reset plugin settings upon Plugin reactivation', 'cct_social_slider'); ?></span>
					</td>
				</tr>
			</table>
            
			<p class="submit">
			   <input type="hidden" size="30" name="cct_social_slider_options[version]" value="<?php echo $options['version']; ?>" />
			<input type="submit" class="button-primary" value="<?php _e('Save Settings', 'cct_social_slider') ?>" />
			</p>
				</form>
                
			  </td>
              
              <td align=center width="225px">
				<a href="http://calicotek.com/"><img src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/cctlogo.png" height="30px" width="150px" title="Go to CaliCoTek.Com" align="center" /></a>
				<h2>Floating Social Slider<br/>
				Version: <?php echo WPFIRESELLER_VERSION; ?> </h2>
				Developed by: ModManMatt <br />
			  <img src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/paypal.jpg" height="40px" width="120px"title="Go to MyEbay Standard Selling Manager in New Window TAB" align="center" />
			    Like this Plugin? Please <a href="http://calicotek.com/donate">Donate!</a>
				Help its Creator Create more great plugins and Updates<hr />Need Help?... <a href="http://calicotek.com/">Try here</a>
			 
				<hr/>
				<div align=left>For Other Great Plugins Recommended by CaliCoTek Check These Out.
			  <ul>
				<li><img src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/cct_icon.png" height="25px" width="25px" title="Go to Calicotek Members Dashboard plugin wp page in New Window TAB" align="center" />
			      <a href="http://wordpress.org/plugins/calicotek-members-dashboard/">Calicotek Members Dashboard</a></li>
				<li><img src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/icon-ebay.png" height="25px" width="25px" title="Go toCalicotek Ebay Dashboard Tools plugin wp page in New Window TAB" align="center" />
			      <a href="http://wordpress.org/plugins/calicotek-ebay-dashboard-tools/">Calicotek Ebay Dashboard Tools</a></li>
				<li><img src="<?php echo plugins_url(); ?>/calicotek-floating-social-slider/images/auction-hammer-icon.png" height="25px" width="25px" title="Go to WP-Lister's Plugin Page" align="center" />
			      <a href="http://wordpress.org/plugins/wp-lister-for-ebay/">WP-Lister For Ebay</a></li>
			  </ul>
				  </div>
				  </td>
			  </tr>
		  </table>
 <!-- End Plugin Options Page -->


<?php
}

// Sanitize and validate input. Accepts an array, return a sanitized array.
function cct_social_slider_validate_options($input) {
	// strip html from textboxes
	$input['widget_title'] =  wp_filter_nohtml_kses($input['widget_title']); // Sanitize input (strip html tags, and escape characters)
	$input['feed_url'] =  wp_filter_nohtml_kses($input['feed_url']); // Sanitize input (strip html tags, and escape characters)
	return $input;
}

// Display a Settings link on the main Plugins page
function cct_social_slider_plugin_action_links($links, $file) {

	if ( $file == plugin_basename( __FILE__ ) ) {
	    // the anchor tag and href to the URL we want. For a "Settings" link, this needs to be the url of your settings page
       	$cct_social_slider_links = '<a href="'.get_admin_url().'options-general.php?page=calicotek-floating-social-slider/index.php">'.__('Settings', 'cct_social_slider').'</a>';
		// make the 'Settings' link appear first
		array_unshift( $links, $cct_social_slider_links );
	}

	return $links;
}


// Adds stylesheet
add_action( 'admin_print_styles', 'cct_social_slider_load_custom_admin_css' );


// The load CSS function
function cct_social_slider_load_custom_admin_css() {
	wp_enqueue_style( 'cct_social_slider_custom_admin_css', plugins_url( '/style.css', __FILE__ ) );
}

?>
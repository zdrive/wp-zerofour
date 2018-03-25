<?php

add_action( 'admin_init', 'wp04_theme_options_init' );
add_action( 'admin_menu', 'wp04_theme_options_add_page' );

/**
 * Prep the necessary scripts for image uploads.
 *
 * @since WP-ZeroFour 1.0
 */

error_reporting(E_ALL); ini_set('display_errors', 1);

require_once(ABSPATH . 'wp-admin/includes/screen.php');

function wp04_options_enqueue_scripts() {
//	if ( 'appearance_page_wp04_theme_options' == get_current_screen() -> id ) :
		wp_enqueue_script('media-upload');
		wp_enqueue_script('thickbox');
		wp_enqueue_style('thickbox');
//	endif;
}
add_action( 'admin_enqueue_scripts', 'wp04_options_enqueue_scripts' );

/**
 * Init plugin options to white list our options
 */
function wp04_theme_options_init(){
	register_setting( 'wp04_options', 'wp04_theme_options', 'wp04_theme_options_validate' );
}

/**
 * Load up the menu page
 */
function wp04_theme_options_add_page() {
	add_theme_page( 'WP-ZeroFour Options', 'WP-ZeroFour Options', 'manage_options', 'wp04_theme_options', 'wp04_theme_options_do_page' );
}

/**
 * Create tab navigation for settings
 *
 * @since WP-ZeroFour 1.0
 */
function wp04_admin_tabs( $current = 'general' ) {
	$tabs = array( 'general' => 'General',  'homepage' => 'Home Settings',  'homeheadings' => 'Home Image Headings', 'media' => 'Media Section', '404page' => '404 Page', 'contact' => 'Contact' );
	echo '<div id="icon-themes" class="icon32"><br></div>';
	echo '<h2 class="nav-tab-wrapper">';
	foreach( $tabs as $tab => $name ){
		$class = ( $tab == $current ) ? ' nav-tab-active' : '';
		echo "<a class='nav-tab$class' href='?page=wp04_theme_options&tab=$tab'>$name</a>";
	}
	echo '</h2>';
}

/**
 * Create the options page
 */
function wp04_theme_options_do_page() {
	if ( ! isset( $_REQUEST['settings-updated'] ) )
		$_REQUEST['settings-updated'] = false;

	$savedOptions = "&nbsp;";
	if ( false !== $_REQUEST['settings-updated'] ){ $savedOptions .= "Options saved";}
	
	$aryHeadingIconNames = array(
		""=>"-None-", 
		"fa-user"=>"User", 
		"fa-cog"=>"Cog", 
		"fa-bar-chart-o"=>"Chart", 
		"fa-check-circle"=>"Checkmark", 
		"fa-info-circle"=>"Info", 
		"fa-play-circle-o"=>"Play Button", 
		"fa-plus-square"=>"Plus Sign", 
		"fa-minus-square"=>"Minus Sign", 
		"fa-question-circle"=>"Question Mark", 
		"fa-exclamation-triangle"=>"Exclamation", 
		"custom"=>"Custom Field"
	);

	$dispGeneral = "none";
	$dispHomePage = "none";
	$dispHomeHeadingsPage = "none";
	$dispMediaSection = "none";
	$disp404Section = "none";
	$dispContact = "none";
	
	if ( isset ( $_GET['tab'] ) ) 
		$tab = $_GET['tab']; 
	else 
		$tab = 'general'; 

	switch ( $tab ) :
		case 'general' : 
			$dispGeneral = "block";
			break; 
		case 'homepage' : 
			$dispHomePage = "block";
			break; 
		case 'homeheadings' : 
			$dispHomeHeadingsPage = "block";
			break; 
		case 'media' : 
			$dispMediaSection = "block";
			break; 
		case '404page' : 
			$disp404Section = "block";
			break; 
		case 'contact' : 
			$dispContact = "block";
			break; 
	endswitch; 

	$options = get_option( 'wp04_theme_options' );

	$DemoMode = $options['demo_mode'];
	$DemoModeCheckedTrue = $DemoModeCheckedFalse = "";
	if ($DemoMode != "false"){$DemoMode = "true";}
	if ($DemoMode == "true"){$DemoModeCheckedTrue = " checked";} else {$DemoModeCheckedFalse = " checked";}

	$TrackingMethod = $options['gaTrackingMethod'];
	$TrackingMethodCheckedGtag = $TrackingMethodCheckedAnalytics = "";
	if ($TrackingMethod != "analytics"){$TrackingMethod = "gtag";}
	if ($TrackingMethod == "gtag"){$TrackingMethodCheckedGtag = " checked";} else {$TrackingMethodCheckedAnalytics = " checked";}
	?>
	<div class="wrap">
		<?php 
			screen_icon(); 
			echo "<h2>" . __( 'WP-ZeroFour Theme Settings', 'wpzerofour' ) 
			. "<span class='updated fade'><strong>" 
			. _e( $savedOptions, 'wpzerofour' ) . "</strong></span></h2>"; 

		 	wp04_admin_tabs($tab) 
		 ?>

		<form method="post" action="options.php" enctype="multipart/form-data">
			<?php settings_fields( 'wp04_options' ); ?>

		<div id = "dispGeneral"  style="display: <?= $dispGeneral;?>">	
			<h3 class="title"><?php _e( 'Layout Options', 'wpzerofour' ); ?></h3>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><?php _e( 'Demo Mode', 'wpzerofour' ); ?></th>
						<td>
							<label class="description" for="wp04_theme_options[demo_mode]-true">True&nbsp;</label><input type="radio"<?php echo $DemoModeCheckedTrue; ?> id="wp04_theme_options[demo_mode]-true" name="wp04_theme_options[demo_mode]" value="true" />
							&nbsp;&nbsp;<label class="description" for="wp04_theme_options[demo_mode]-false">False&nbsp;</label><input type="radio"<?php echo $DemoModeCheckedFalse; ?> id="wp04_theme_options[demo_mode]-false" name="wp04_theme_options[demo_mode]" value="false" />
							<span class="description"><?php _e('(Demo Mode uses sample content to fill in the empty areas of your site)', 'wpzerofour' ); ?></span>
						</td>
					</tr>
				</tbody>
			</table>

			<h3 class="title"><?php _e( 'Analytics and Tracking', 'wpzerofour' ); ?></h3>

			<table class="form-table" style="width:auto;">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[gaID]"><?php _e( 'Google Analytics Profile ID', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[gaID]" class="regular-text" type="text" name="wp04_theme_options[gaID]" value="<?php esc_attr_e( $options['gaID'] ); ?>" placeholder="e.g. UA-12345678-1" /></td>
					</tr>
					<tr>
						<th scope="row"><?php _e( 'Google Analytics Tracking', 'wpzerofour' ); ?></th>
						<td>
							<label class="description" for="wp04_theme_options[gaTrackingMethod]-gtag">Global Site Tag (gtag.js)&nbsp;</label><input type="radio"<?php echo $TrackingMethodCheckedGtag; ?> id="wp04_theme_options[gaTrackingMethod]-gtag" name="wp04_theme_options[gaTrackingMethod]" value="gtag" />
							&nbsp;&nbsp;<label class="description" for="wp04_theme_options[gaTrackingMethod]-analytics">Analytics.js&nbsp;</label><input type="radio"<?php echo $TrackingMethodCheckedAnalytics; ?> id="wp04_theme_options[gaTrackingMethod]-analytics" name="wp04_theme_options[gaTrackingMethod]" value="analytics" />
							<!-- <span class="description"><?php // _e('Demo Mode fills your site with sample content, and tells you how to update it.', 'wpzerofour' ); ?></span> -->
						</td>
					</tr>

					<tr><td colspan="2"><hr></td></tr>

					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[tracking_head]"><?php _e( 'Other Tracking (Header)', 'wpzerofour' ); ?></label></th>
						<td><textarea id="wp04_theme_options[tracking_head]" class="regular-text" cols="30" rows="8" name="wp04_theme_options[tracking_head]"><?php echo esc_textarea( $options['tracking_head'] ); ?></textarea></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[tracking]"><?php _e( 'Other Tracking (Footer)', 'wpzerofour' ); ?></label></th>
						<td><textarea id="wp04_theme_options[tracking]" class="regular-text" cols="30" rows="8" name="wp04_theme_options[tracking]"><?php echo esc_textarea( $options['tracking'] ); ?></textarea></td>
					</tr>

				</tbody>
			</table>

		</div>  <!-- END div id = "dispGeneral" -->	

		<div id = "dispHomePage"  style="display: <?= $dispHomePage;?>">	

			<h3 class="title"><?php _e( 'Centerpiece Settings', 'wpzerofour' ); ?></h3>

			<table class="form-table" style="width:auto;">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[centerpiece_headline]"><?php _e( 'Main Headline', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[centerpiece_headline]" class="regular-text" type="text" name="wp04_theme_options[centerpiece_headline]" value="<?php esc_attr_e( $options['centerpiece_headline'] ); ?>" placeholder="(e.g., ZeroFour: A Free Responsive Site Template...)" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[centerpiece_subheading]"><?php _e( 'Subheading', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[centerpiece_subheading]" class="regular-text" type="text" name="wp04_theme_options[centerpiece_subheading]" value="<?php esc_attr_e( $options['centerpiece_subheading'] ); ?>" placeholder="(e.g., Does This Statement Make You Want to Click...)" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[centerpiece_button_label]"><?php _e( 'Button Label', 'wpzerofour' ); ?></label></th>
						<td>
							<input id="wp04_theme_options[centerpiece_button_label]" class="regular-text" type="text" name="wp04_theme_options[centerpiece_button_label]" value="<?php esc_attr_e( $options['centerpiece_button_label'] ); ?>" placeholder="(e.g., Yes it Does)" />
							<span class="description"><?php _e('Leave blank to exclude button.', 'wpzerofour' ); ?></span>
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[centerpiece_button_link]"><?php _e( 'Button Link', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[centerpiece_button_link]" class="regular-text" type="text" name="wp04_theme_options[centerpiece_button_link]" value="<?php echo esc_url( $options['centerpiece_button_link'] ); ?>" /></td>
					</tr>

					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[centerpiece_button_type]"><?php echo _e( 'Button Type', 'wpzerofour' ); ?></label></th>
						<td>
							<select id="wp04_theme_options[centerpiece_button_type]" name="wp04_theme_options[centerpiece_button_type]">
								<option value="primary"<?php if( $options['centerpiece_button_type'] == 'primary' ) : ?> selected<?php endif; ?>>Primary</option>
								<option value="secondary"<?php if( $options['centerpiece_button_type'] == 'secondary' ) : ?> selected<?php endif; ?>>Secondary</option>
							</select>
<!-- 						</td>
					</tr>

					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[centerpiece_button_icon]"><?php // echo _e( 'Button Icon', 'wpzerofour' ); ?></label></th>
						<td>
 -->
							<span style="padding-left: 6%; font-weight: 600;"><label class="description" for="wp04_theme_options[centerpiece_button_icon]"><?php echo _e( 'Button Icon', 'wpzerofour' ); ?></label></span>
 							<select id="wp04_theme_options[centerpiece_button_icon]" name="wp04_theme_options[centerpiece_button_icon]">
								<option value="">-<?php echo _e( 'None', 'wpzerofour' ); ?>-</option>

								<option value="check"<?php if( $options['centerpiece_button_icon'] == 'check' ) : ?> selected<?php endif; ?>>Checkmark</option>
								<option value="info"<?php if( $options['centerpiece_button_icon'] == 'info' ) : ?> selected<?php endif; ?>>Info</option>
								<option value="play"<?php if( $options['centerpiece_button_icon'] == 'play' ) : ?> selected<?php endif; ?>>Play Button</option>
								<option value="plus"<?php if( $options['centerpiece_button_icon'] == 'plus' ) : ?> selected<?php endif; ?>>Plus Sign</option>
								<option value="minus"<?php if( $options['centerpiece_button_icon'] == 'minus' ) : ?> selected<?php endif; ?>>Minus Sign</option>
								<option value="times"<?php if( $options['centerpiece_button_icon'] == 'times' ) : ?> selected<?php endif; ?>>Times Sign</option>
								<option value="question"<?php if( $options['centerpiece_button_icon'] == 'question' ) : ?> selected<?php endif; ?>>Question Mark</option>
								<option value="exclamation"<?php if( $options['centerpiece_button_icon'] == 'exclamation' ) : ?> selected<?php endif; ?>>Exclamation</option>
							</select>
						</td>
					</tr>
				</tbody>
			</table>

			<h3 class="title"><?php _e( 'Major Headings', 'wpzerofour' ); ?></h3>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[major_heading]"><?php _e( 'Major Heading', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[major_heading]" class="regular-text" type="text" name="wp04_theme_options[major_heading]" value="<?php esc_attr_e( $options['major_heading'] ); ?>" placeholder="(e.g., This is an important heading)" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[major_subheading]"><?php _e( 'Major Subheading', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[major_subheading]" class="regular-text" type="text" name="wp04_theme_options[major_subheading]" value="<?php esc_attr_e( $options['major_subheading'] ); ?>"  placeholder="(e.g., And this is where we talk about...)"/></td>
					</tr>
				</tbody>
			</table>
		</div>  <!-- END div id = "dispHomePage" -->	

		<div id = "dispHomeHeadingsPage"  style="display: <?= $dispHomeHeadingsPage;?>">	

			<h3 class="title"><?php _e( 'Image Heading Settings', 'wpzerofour' ); ?></h3>
			<p><span class="description"><?php _e('Appears near the top of the home page, and includes three images with headings and subtitles.', 'wpzerofour' ); ?></span></p>
			<table class="form-table" style="width:auto;">
				<tbody>
<!-- Heading 1 -->
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_photo-1]"><?php _e( 'Heading Image 1', 'wpzerofour' ); ?></label></th>
						<td>
							<input id="wp04_theme_options[image_heading_photo-1]" style="width: 15em;" type="text" name="wp04_theme_options[image_heading_photo-1]" value="<?php echo esc_url( $options['image_heading_photo-1'] ); ?>" placeholder="(Ideal proportion is 16x9)" /> 
							<span class="HideMobi" style="padding-left: 4%"></span><input id="upload_heading_image-1" type="button" class="button upload_image_button" value="<?php _e( 'Upload Image 1', 'wpzerofour' ); ?>" />
						</td>
					</tr>
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_title-1]"><?php _e( 'Heading Title 1', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[image_heading_title-1]" class="regular-text" type="text" name="wp04_theme_options[image_heading_title-1]" value="<?php esc_attr_e( $options['image_heading_title-1'] ); ?>" placeholder="(e.g., Here's a Heading)" /></td>
					</tr>
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_subtitle-1]"><?php _e( 'Heading Subtitle 1', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[image_heading_subtitle-1]" class="regular-text" type="text" name="wp04_theme_options[image_heading_subtitle-1]" value="<?php esc_attr_e( $options['image_heading_subtitle-1'] ); ?>"  placeholder="(e.g., And a Subtitle)"/></td>
					</tr>
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_icon-1]"><?php echo _e( 'Heading 1 Icon', 'wpzerofour' ); ?></label></th>
						<td>
 							<select id="wp04_theme_options[image_heading_icon-1]" name="wp04_theme_options[image_heading_icon-1]">

<?php foreach ($aryHeadingIconNames as $optVal => $optText) { ?>
								<option value="<?php echo $optVal; ?>"<?php if( $options['image_heading_icon-1'] == $optVal){?> selected<?php } ?>><?php echo _e( $optText, 'wpzerofour' ); ?></option>

<?php } ?>
							</select>
							<span style="padding-left: 2%;"><label class="description" for="wp04_theme_options[image_heading_icon_custom-1]"><?php echo _e( 'Custom', 'wpzerofour' ); ?></label></span><input id="wp04_theme_options[image_heading_icon_custom-1]" class="short-text" type="text" name="wp04_theme_options[image_heading_icon_custom-1]" value="<?php esc_attr_e( $options['image_heading_icon_custom-1'] ); ?>"  placeholder="(Font Awesome icon)"/>
							<br /><span class="description">Icon names: <a href="https://fontawesome.com/v4.7.0/cheatsheet/">https://fontawesome.com/v4.7.0/cheatsheet/</a></span>
						</td>
					</tr>

<!-- Heading 2 -->
					<tr><td colspan="2"><hr></td></tr>
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_photo-2]"><?php _e( 'Heading Image 2', 'wpzerofour' ); ?></label></th>
						<td>
							<input id="wp04_theme_options[image_heading_photo-2]" style="width: 15em;" type="text" name="wp04_theme_options[image_heading_photo-2]" value="<?php echo esc_url( $options['image_heading_photo-2'] ); ?>" placeholder="(Ideal proportion is 16x9)" /> 
							<span class="HideMobi" style="padding-left: 4%"></span><input id="upload_heading_image-2" type="button" class="button" value="<?php _e( 'Upload Image 2', 'wpzerofour' ); ?>" />
						</td>
					</tr>
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_title-2]"><?php _e( 'Heading Title 2', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[image_heading_title-2]" class="regular-text" type="text" name="wp04_theme_options[image_heading_title-2]" value="<?php esc_attr_e( $options['image_heading_title-2'] ); ?>" placeholder="(e.g., Also a Heading)" /></td>
					</tr>
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_subtitle-2]"><?php _e( 'Heading Subtitle 2', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[image_heading_subtitle-2]" class="regular-text" type="text" name="wp04_theme_options[image_heading_subtitle-2]" value="<?php esc_attr_e( $options['image_heading_subtitle-2'] ); ?>"  placeholder="(e.g., And Another Subtitle)"/></td>
					</tr>
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_icon-2]"><?php echo _e( 'Heading 2 Icon', 'wpzerofour' ); ?></label></th>
						<td>
 							<select id="wp04_theme_options[image_heading_icon-2]" name="wp04_theme_options[image_heading_icon-2]">

<?php foreach ($aryHeadingIconNames as $optVal => $optText) { ?>
								<option value="<?php echo $optVal; ?>"<?php if( $options['image_heading_icon-2'] == $optVal){?> selected<?php } ?>><?php echo _e( $optText, 'wpzerofour' ); ?></option>
<?php } ?>
							</select>
							<span style="padding-left: 2%;"><label class="description" for="wp04_theme_options[image_heading_icon_custom-2]"><?php echo _e( 'Custom', 'wpzerofour' ); ?></label></span><input id="wp04_theme_options[image_heading_icon_custom-2]" class="short-text" type="text" name="wp04_theme_options[image_heading_icon_custom-2]" value="<?php esc_attr_e( $options['image_heading_icon_custom-2'] ); ?>"  placeholder="(Font Awesome icon)"/>
							<br /><span class="description">Icon names: <a href="https://fontawesome.com/v4.7.0/cheatsheet/">https://fontawesome.com/v4.7.0/cheatsheet/</a></span>
						</td>
					</tr>

<!-- Heading 3 -->
					<tr><td colspan="2"><hr></td></tr>
					<tr>
						<th style="padding-left: 1%;" scope="row"><label class="description" for="wp04_theme_options[image_heading_photo-3]"><?php _e( 'Heading Image 3', 'wpzerofour' ); ?></label></th>
						<td>
							<input id="wp04_theme_options[image_heading_photo-3]" style="width: 15em;" type="text" name="wp04_theme_options[image_heading_photo-3]" value="<?php echo esc_url( $options['image_heading_photo-3'] ); ?>" placeholder="(Ideal proportion is 16x9)" /> 
							<span class="HideMobi" style="padding-left: 4%"></span><input id="upload_heading_image-3" type="button" class="button" value="<?php _e( 'Upload Image 3', 'wpzerofour' ); ?>" />
						</td>
					</tr>
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_title-3]"><?php _e( 'Heading Title 3', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[image_heading_title-3]" class="regular-text" type="text" name="wp04_theme_options[image_heading_title-3]" value="<?php esc_attr_e( $options['image_heading_title-3'] ); ?>" placeholder="(e.g., Another Heading)" /></td>
					</tr>
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_subtitle-3]"><?php _e( 'Heading Subtitle 3', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[image_heading_subtitle-3]" class="regular-text" type="text" name="wp04_theme_options[image_heading_subtitle-3]" value="<?php esc_attr_e( $options['image_heading_subtitle-3'] ); ?>"  placeholder="(e.g., And Yes, a Subtitle)"/></td>
					</tr>
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_icon-3]"><?php echo _e( 'Heading 1 Icon', 'wpzerofour' ); ?></label></th>
						<td>
 							<select id="wp04_theme_options[image_heading_icon-3]" name="wp04_theme_options[image_heading_icon-3]">

<?php foreach ($aryHeadingIconNames as $optVal => $optText) { ?>
								<option value="<?php echo $optVal; ?>"<?php if( $options['image_heading_icon-3'] == $optVal){?> selected<?php } ?>><?php echo _e( $optText, 'wpzerofour' ); ?></option>
<?php } ?>
							</select>
							<span style="padding-left: 2%;"><label class="description" for="wp04_theme_options[image_heading_icon_custom-3]"><?php echo _e( 'Custom', 'wpzerofour' ); ?></label></span><input id="wp04_theme_options[image_heading_icon_custom-3]" class="short-text" type="text" name="wp04_theme_options[image_heading_icon_custom-3]" value="<?php esc_attr_e( $options['image_heading_icon_custom-3'] ); ?>"  placeholder="(Font Awesome icon)"/>
							<br /><span class="description">Icon names: <a href="https://fontawesome.com/v4.7.0/cheatsheet/">https://fontawesome.com/v4.7.0/cheatsheet/</a></span>
						</td>
					</tr>

					<tr><td colspan="2"><hr></td></tr>
					<tr>
						<th style="padding-left: 1%" scope="row"><label class="description" for="wp04_theme_options[image_heading_text_below]"><?php _e( 'Text Below Images', 'wpzerofour' ); ?></label></th>
						<td><textarea id="wp04_theme_options[image_heading_text_below]" class="regular-text" cols="1" rows="8" name="wp04_theme_options[image_heading_text_below]"><?php esc_attr_e( $options['image_heading_text_below'] ); ?></textarea></td>
					</tr>

				</tbody>
			</table>

		</div>  <!-- END div id = "dispHomeHeadingsPage" -->	

		<div id = "dispMediaSection"  style="display: <?= $dispMediaSection;?>">	

			<h3 class="title"><?php _e( 'Site Media', 'wpzerofour' ); ?></h3>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[site_logo]"><?php _e( 'Site Logo Image', 'wpzerofour' ); ?></label></th>
						<td>
							<input id="wp04_theme_options[site_logo]" class="regular-text" type="text" name="wp04_theme_options[site_logo]" value="<?php echo esc_url( $options['site_logo'] ); ?>" /> 
							<input id="upload_site_logo_img_button" type="button" class="button" value="<?php _e( 'Upload Logo', 'wpzerofour' ); ?>" />
							<span class="description"><?php _e('Ideal size is about 250x50 px.', 'wpzerofour' ); ?></span>
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[header_img]"><?php _e( 'Header Background Image', 'wpzerofour' ); ?></label></th>
						<td>
							<input id="wp04_theme_options[header_img]" class="regular-text" type="text" name="wp04_theme_options[header_img]" value="<?php echo esc_url( $options['header_img'] ); ?>" /> 
							<input id="upload_header_img_button" type="button" class="button" value="<?php _e( 'Upload Image', 'wpzerofour' ); ?>" />
							<span class="description"><?php _e('Ideal size is 1400x651.', 'wpzerofour' ); ?></span>
						</td>
					</tr>
				</tbody>
			</table>
		</div>  <!-- END div id = "dispMediaSection" -->	
<?php
	$Builtin404Image = $options['error404_use_PBimage'];
	$Builtin404ImageCheckedTrue = $Builtin404ImageCheckedFalse = "";
	if ($Builtin404Image != "false"){$Builtin404Image = "true";}
	if ($Builtin404Image == "true"){$Builtin404ImageCheckedTrue = " checked";} else {$Builtin404ImageCheckedFalse = " checked";}
?>
		<div id = "disp404Section"  style="display: <?= $disp404Section;?>">	
			<h3 class="title"><?php _e( 'Error 404 Page (404.php) Options', 'wpzerofour' ); ?></h3>

			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[error404_heading]"><?php _e( 'Error 404 Heading', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[error404_heading]" class="regular-text" type="text" name="wp04_theme_options[error404_heading]" value="<?php esc_attr_e( $options['error404_heading'] ); ?>" placeholder="(e.g., Page Not Found)" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[error404_subheading]"><?php _e( 'Error 404 Subheading', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[error404_subheading]" class="regular-text" type="text" name="wp04_theme_options[error404_subheading]" value="<?php esc_attr_e( $options['error404_subheading'] ); ?>" placeholder="(e.g., Error 404)" /></td>
					</tr>
					<tr>
						<th scope="row"><?php _e( 'Use Built-in Image', 'wpzerofour' ); ?></th>
						<td>
							<label class="description" for="wp04_theme_options[error404_use_PBimage]-true">True&nbsp;</label><input type="radio"<?php echo $Builtin404ImageCheckedTrue; ?> id="wp04_theme_options[error404_use_PBimage]-true" name="wp04_theme_options[error404_use_PBimage]" value="true" />
							&nbsp;&nbsp;<label class="description" for="wp04_theme_options[error404_use_PBimage]-false">False&nbsp;</label><input type="radio"<?php echo $Builtin404ImageCheckedFalse; ?> id="wp04_theme_options[error404_use_PBimage]-false" name="wp04_theme_options[error404_use_PBimage]" value="false" />
							<span class="description"><?php _e('Use a built-in Error 404 image, even if Demo Mode is off. Image below overrides this setting.', 'wpzerofour' ); ?></span>
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[error404_image]"><?php _e( 'Error 404 Page Image', 'wpzerofour' ); ?></label></th>
						<td>
							<input id="wp04_theme_options[error404_image]" class="regular-text" type="text" name="wp04_theme_options[error404_image]" value="<?php echo esc_url( $options['error404_image'] ); ?>" placeholder="(This setting overrides the built-in image)" /> 
							<input id="upload_site_error404_img_button" type="button" class="button" value="<?php _e( 'Upload Logo', 'wpzerofour' ); ?>" />
							<span class="description"><?php _e('Ideal size is about 1200 px wide', 'wpzerofour' ); ?></span>
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[error404_content]"><?php _e( 'Error 404 Content', 'wpzerofour' ); ?></label></th>
						<td><textarea placeholder='(e.g., &lt;p style="text-align:center;">Error 404 &mdash; Page Not Found&lt;/p>)' id="wp04_theme_options[error404_content]" class="large-text" cols="1" rows="8" name="wp04_theme_options[error404_content]"><?php esc_attr_e( $options['error404_content'] ); ?></textarea></td>
					</tr>

				</tbody>
			</table>
		</div>  <!-- END div id = "disp404Section" -->	

		<style> .regular-text32{width: 99%;} </style> <!-- Gotta Do What You Gotta Do -->

		<div id = "dispContact"  style="display: <?= $dispContact;?>">	
			<h3 class="title">Contact Information</h3>
			
			<table class="form-table">
				<tbody>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[email]"><?php _e( 'Email', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[email-label]" class="regular-text32" type="text" name="wp04_theme_options[email-label]" value="<?php esc_attr_e( $options['email-label'] ); ?>" placeholder="(Type label here to show email, e.g., Email)" /></td>
						<td><input id="wp04_theme_options[email-disp]" class="regular-text32" type="text" name="wp04_theme_options[email-disp]" value="<?php esc_attr_e( $options['email-disp'] ); ?>" placeholder="(Displayed address. Blank uses actual address.)" /></td>
						<td><input id="wp04_theme_options[email]" class="regular-text32" type="text" name="wp04_theme_options[email]" value="<?php esc_attr_e( $options['email'] ); ?>" placeholder="(Email address here will be linked)" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[url]"><?php _e( 'URL', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[url-label]" class="regular-text32" type="text" name="wp04_theme_options[url-label]" value="<?php echo esc_attr_e( $options['url-label'] ); ?>" placeholder="(Type label here to show URL, e.g., WWW)" /></td>
						<td><input id="wp04_theme_options[url-disp]" class="regular-text32" type="text" name="wp04_theme_options[url-disp]" value="<?php echo esc_attr_e( $options['url-disp'] ); ?>" placeholder="(Displayed URL. Blank uses actual URL.)" /></td>
						<td><input id="wp04_theme_options[url]" class="regular-text32" type="text" name="wp04_theme_options[url]" value="<?php echo esc_attr_e( $options['url'] ); ?>" placeholder="(URL here will be linked)" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[phone]"><?php _e( 'Phone', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[phone-label]" class="regular-text32" type="text" name="wp04_theme_options[phone-label]" value="<?php echo esc_textarea( $options['phone-label'] ); ?>" placeholder="(Type phone number label here, e.g., Phone)" /></td>
						<td><input id="wp04_theme_options[phone-disp]" class="regular-text32" type="text" name="wp04_theme_options[phone-disp]" value="<?php echo esc_textarea( $options['phone-disp'] ); ?>" placeholder="(Displayed phone. Blank hides phone field.)" /></td>
						<td><input id="wp04_theme_options[phone]" class="regular-text32" type="text" name="wp04_theme_options[phone]" value="<?php echo esc_textarea( $options['phone'] ); ?>" placeholder="(Number here will be linked)" /></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[address]"><?php _e( 'Address', 'wpzerofour' ); ?></label></th>
						<td colspan="3"><textarea id="wp04_theme_options[address]" class="large-text" cols="3" rows="8" name="wp04_theme_options[address]"><?php esc_attr_e( $options['address'] ); ?></textarea></td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[social-link-1-label]"><?php _e( 'Social Link 1', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[social-link-1-label]" class="regular-text-32" type="text" name="wp04_theme_options[social-link-1-label]" value="<?php esc_attr_e( $options['social-link-1-label'] ); ?>" placeholder="<?php _e( 'link label (e.g., Twitter)', 'wpzerofour' ); ?>" /></td>
						<td><input id="wp04_theme_options[social-link-1-name]" class="regular-text-32" type="text" name="wp04_theme_options[social-link-1-name]" value="<?php esc_attr_e( $options['social-link-1-name'] ); ?>" placeholder="<?php _e( 'link name (e.g., @example)', 'wpzerofour' ); ?>" /></td>
						<td><input id="wp04_theme_options[social-link-1-href]" class="regular-text-32" type="text" name="wp04_theme_options[social-link-1-href]" value="<?php esc_attr_e( $options['social-link-1-href'] ); ?>" placeholder="<?php _e( 'link url (e.g., https://twitter.com/example)', 'wpzerofour' ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[social-link-2-label]"><?php _e( 'Social Link 2', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[social-link-2-label]" class="regular-text-32" type="text" name="wp04_theme_options[social-link-2-label]" value="<?php esc_attr_e( $options['social-link-2-label'] ); ?>" placeholder="<?php _e( 'link label', 'wpzerofour' ); ?>" /></td>
						<td><input id="wp04_theme_options[social-link-2-name]" class="regular-text-32" type="text" name="wp04_theme_options[social-link-2-name]" value="<?php esc_attr_e( $options['social-link-2-name'] ); ?>" placeholder="<?php _e( 'link name', 'wpzerofour' ); ?>" /></td>
						<td><input id="wp04_theme_options[social-link-2-href]" class="regular-text-32" type="text" name="wp04_theme_options[social-link-2-href]" value="<?php esc_attr_e( $options['social-link-2-href'] ); ?>" placeholder="<?php _e( 'link url', 'wpzerofour' ); ?>" />
						</td>
					</tr>
					<tr>
						<th scope="row"><label class="description" for="wp04_theme_options[social-link-1-label]"><?php _e( 'Social Link 3', 'wpzerofour' ); ?></label></th>
						<td><input id="wp04_theme_options[social-link-3-label]" class="regular-text-32" type="text" name="wp04_theme_options[social-link-3-label]" value="<?php esc_attr_e( $options['social-link-3-label'] ); ?>" placeholder="<?php _e( 'link label', 'wpzerofour' ); ?>" /></td>
						<td><input id="wp04_theme_options[social-link-3-name]" class="regular-text-32" type="text" name="wp04_theme_options[social-link-3-name]" value="<?php esc_attr_e( $options['social-link-3-name'] ); ?>" placeholder="<?php _e( 'link name', 'wpzerofour' ); ?>" /></td>
						<td><input id="wp04_theme_options[social-link-3-href]" class="regular-text-32" type="text" name="wp04_theme_options[social-link-3-href]" value="<?php esc_attr_e( $options['social-link-3-href'] ); ?>" placeholder="<?php _e( 'link url', 'wpzerofour' ); ?>" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>  <!-- END div id = "dispContact" -->	
			<p class="submit">
				<input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'wpzerofour' ); ?>" />
			</p>
		</form>
	<?php
}

/**
 * Sanitize and validate input. Accepts an array, return a sanitized array.
 */
function wp04_theme_options_validate( $input ) {
//// 2018-03-13 
//// Commented these lines of code. They  caused warnings when PHP errors are not hidden
//// It seems this section is supposed to validate, but was not implemented
//// It is sample code from here:
////	https://gist.github.com/smonteverdi/2183715#file-theme-options-php


////	global $select_options, $radio_options;

////	// Our checkbox value is either 0 or 1
////	if ( ! isset( $input['option1'] ) )
////		$input['option1'] = null;
////	$input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

////	// Say our text option must be safe text with no HTML tags
////	$input['sometext'] = wp_filter_nohtml_kses( $input['sometext'] );

////	// Our select option must actually be in our array of select options
////	if ( ! array_key_exists( $input['selectinput'], $select_options ) )
////		$input['selectinput'] = null;

////	// Our radio option must actually be in our array of radio options
////	if ( ! isset( $input['radioinput'] ) )
////		$input['radioinput'] = null;
////	if ( ! array_key_exists( $input['radioinput'], $radio_options ) )
////		$input['radioinput'] = null;

////	// Say our textarea option must be safe text with the allowed tags for posts
////	$input['sometextarea'] = wp_filter_post_kses( $input['sometextarea'] );

	return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
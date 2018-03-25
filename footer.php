<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */

// error_reporting(E_ALL); ini_set('display_errors', 1);

$wp04_theme_options = get_option( 'wp04_theme_options' );

$wp04_contact_email = trim($wp04_theme_options['email']);
$wp04_contact_phoneNumber = preg_replace('/[^0-9]/', '', trim($wp04_theme_options['phone']));
$wp04_contact_address = trim($wp04_theme_options['address']);
$wp04_contact_socialLabel1 = trim($wp04_theme_options['social-link-1-label']);
$wp04_contact_socialLabel2 = trim($wp04_theme_options['social-link-2-label']);
$wp04_contact_socialLabel3 = trim($wp04_theme_options['social-link-3-label']);
$wp04_contact_socialHREF1 = trim($wp04_theme_options['social-link-1-href']);
$wp04_contact_socialHREF2 = trim($wp04_theme_options['social-link-2-href']);
$wp04_contact_socialHREF3 = trim($wp04_theme_options['social-link-3-href']);

// new fields
$wp04_contact_socialName1 = trim($wp04_theme_options['social-link-1-name']);
$wp04_contact_socialName2 = trim($wp04_theme_options['social-link-2-name']);
$wp04_contact_socialName3 = trim($wp04_theme_options['social-link-3-name']);
$wp04_contact_url = trim($wp04_theme_options['url']);

$wp04_contact_urlLabel = ($wp04_theme_options['url-label']);
$wp04_contact_urlDisplay = trim($wp04_theme_options['url-disp']);
	if ($wp04_contact_urlDisplay == "") {$wp04_contact_urlDisplay = $wp04_contact_url;}
$wp04_contact_emailLabel = ($wp04_theme_options['email-label']);
$wp04_contact_emailDisplay = trim($wp04_theme_options['email-disp']);
	if ($wp04_contact_emailDisplay == "") {$wp04_contact_emailDisplay = $wp04_contact_email;}
$wp04_contact_phoneLabel = ($wp04_theme_options['phone-label']);
$wp04_contact_phoneDisplay = trim($wp04_theme_options['phone-disp']);
	if ($wp04_contact_phoneDisplay == "") {$wp04_contact_phoneDisplay = $wp04_contact_phoneNumber;}

// $wp04_contact_addressLabel = trim($wp04_theme_options['address-label']);
$wp04_contact_addressLabel = "Address";
// This field not in WP ZeroFour Settings

// DEMO MODE BEGIN
$wp04_demo_mode = $wp04_theme_options['demo_mode'];

if (trim(strtolower($wp04_demo_mode)) != "false"){

	if (trim($wp04_contact_emailLabel) == ""){$wp04_contact_emailLabel = "Email";}
	if (trim($wp04_contact_email) == ""){$wp04_contact_email = "info@example.com";}
	if (trim($wp04_contact_emailDisplay) == ""){$wp04_contact_emailDisplay = "info@example.com";}

	if (trim($wp04_contact_phoneLabel) == ""){$wp04_contact_phoneLabel = "Phone";}
	if (trim($wp04_contact_phoneNumber) == ""){$wp04_contact_phoneNumber = "+18880004444";}
	if (trim($wp04_contact_phoneDisplay) == ""){$wp04_contact_phoneDisplay = "(888) Zero-Four";}

	if (trim($wp04_contact_addressLabel) == ""){$wp04_contact_addressLabel = "Address";}
	if (trim($wp04_contact_address) == ""){$wp04_contact_address = "Example Company, Inc<br />1234 Sample Street <br />Anytown, USA  12345";}

	if (trim($wp04_contact_socialLabel1) == ""){$wp04_contact_socialLabel1 = "Twitter";}
	if (trim($wp04_contact_socialName1) == ""){$wp04_contact_socialName1 = "@example";}
	if (trim($wp04_contact_socialHREF1) == ""){$wp04_contact_socialHREF1 = "https://twitter.com/example";}

	if (trim($wp04_contact_socialLabel2) == ""){$wp04_contact_socialLabel2 = "Facebook";}
	if (trim($wp04_contact_socialName2) == ""){$wp04_contact_socialName2 = "facebook.com/example";}
	if (trim($wp04_contact_socialHREF2) == ""){$wp04_contact_socialHREF2 = "https://facebook.com/example";}

	if (trim($wp04_contact_socialLabel3) == ""){$wp04_contact_socialLabel3 = "LinkedIn";}
	if (trim($wp04_contact_socialName3) == ""){$wp04_contact_socialName3 = "Example Co";}
	if (trim($wp04_contact_socialHREF3) == ""){$wp04_contact_socialHREF3 = "https://linkedin.com/in/example";}

	if (trim($wp04_contact_urlLabel) == ""){$wp04_contact_urlLabel = "WWW";}
	if (trim($wp04_contact_url) == ""){$wp04_contact_url = "http://www.example.com/";}
	if (trim($wp04_contact_urlDisplay) == ""){$wp04_contact_urlDisplay = "example.com";}

} // END if ($wp04_demo_mode)
// DEMO MODE END

?>

			<div id="footer-wrapper">
				<footer id="footer" class="container">

					<div class="row">
						<div class="3u">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : 
							dynamic_sidebar( 'footer-1' ); 

// DEMO MODE BEGIN
						elseif (trim(strtolower($wp04_demo_mode)) != "false") :
						 ?>
							<section id="custom_html-2" class="widget_text widget widget_custom_html">
								<h2 class="widget-title">Sidebar: Footer 1</h2>
								<div class="textwidget custom-html-widget"><ul class="divided">
									<li><a target="_blank" href="http://www.west-la.info/">WP-ZeroFour Demo Site</a></li>
									<li><a target="_blank" href="https://github.com/zdrive/wp-zerofour">WP-ZeroFour Project</a></li>
									<li><a target="_blank" href="https://html5up.net/zerofour">ZeroFour Template</a></li>
									<li><a target="_blank" href="https://github.com/thequicksilver">github/thequicksilver</a></li>
									<li><a target="_blank" href="https://github.com/zdrive">github/zdrive</a></li>
									<li><a target="_blank" href="http://www.zdcs.com/">Z-Drive Computer Service</a></li>
									<li><a target="_blank" href="https://unsplash.com/">Unsplash (photos)</a></li>
									<li><a target="_blank" href="https://www.freepik.com/">Freepik (photos)</a></li>
									<li><a target="_blank" href="https://cooltext.com/">CoolText (logos)</a></li>
									<li><a target="_blank" href="https://www.google.com/">The Google</a></li>
									</ul>
								</div>
							</section>
						<?php 
// DEMO MODE END
						endif; ?>
						</div>  <!-- .3u -->

						<div class="3u">
						<?php if ( is_active_sidebar( 'footer-2' ) ) : 
							dynamic_sidebar( 'footer-2' ); 
						
// DEMO MODE BEGIN
						elseif (trim(strtolower($wp04_demo_mode)) != "false") :
							?>
							<section id="custom_html-3" class="widget_text widget widget_custom_html">
								<h2 class="widget-title">Photo Contributors</h2>
								<div class="textwidget custom-html-widget">
									<ul class="divided">
										<li><a target="_blank" href="https://unsplash.com/photos/LMlVa3QDEXs">Aaron Burden</a></li>
										<li><a target="_blank" href="https://unsplash.com/photos/Ic0q_M542Is">Joe Pascavage</a></li>
										<li><a target="_blank" href="https://unsplash.com/photos/eWFFLU2-Sik">Marten Bjork</a></li>
										<li><a target="_blank" href="https://unsplash.com/photos/Oanp6vpk3A8">Matt Lamers</a></li>
									</ul>
								</div>
							</section>
							<section id="custom_html-4" class="widget_text widget widget_custom_html">
								<h2 class="widget-title">Photo Contributors</h2>
								<div class="textwidget custom-html-widget">
									<ul class="divided">
										<li><a target="_blank" href="https://unsplash.com/photos/JdNixbsLwS8">David Clode</a></li>
										<li><a target="_blank" href="https://unsplash.com/photos/1gK3iHigzzM">Tyler Nix</a></li>
										<li><a target="_blank" href="https://unsplash.com/photos/RovMihRLRes">Philip Brown</a></li>
										<li><a target="_blank" href="https://unsplash.com/photos/B4cbBUCtSdg">Scott Webb</a></li>
									</ul>
								</div>
							</section>
							<?php
// DEMO MODE END
						endif; ?>
						</div>  <!-- .3u -->

						<div class="6u">
						<?php if ( is_active_sidebar( 'footer-3' ) ) : 
							dynamic_sidebar( 'footer-3' ); 

// DEMO MODE BEGIN
						elseif (trim(strtolower($wp04_demo_mode)) != "false") :
							?>

							<section id="custom_html-5" class="widget_text widget widget_custom_html">
								<h2 class="widget-title">What's This About?</h2>
								<div class="textwidget custom-html-widget">
									<p>Welcome to WP-ZeroFour. Produced by <a href="http://www.zdcs.com/">Z-Drive Computer Service</a>.	Original Design by <a href="http://html5up.net">HTML5 UP</a>, converted to WordPress by <a href="http://github.com/thequicksilver/wp-zerofour">thequicksilver</a> and <a href="http://github.com/zdrive/wp-zerofour">zdrive</a>.<br>
									This text has been inserted by Demo Mode. Use the Widgets section of WP Admin to change the text here by dragging a widget or custom HTML into Sidebar 3. Change the panels to the left by modifying Footer 1 and Footer 2. After you drag content into a footer, the demo text will disappear. 
									</p>
									<a href="https://github.com/zdrive/wp-zerofour" class="button alt icon fa fa-arrow-circle-right">Learn More</a>
								</div>
							</section>
							<?php
// DEMO MODE END
						endif; ?>
							<!-- Contact -->
								<section>
									<h2>Get in touch</h2>
									<div>
										<div class="row">
											<div class="6u">
												<dl class="contact">
												<?php if ($wp04_contact_socialLabel1 != ""): ?>
													<dt><?php echo $wp04_contact_socialLabel1; ?></dt>
													<dd><a target="_blank" href="<?php echo $wp04_contact_socialHREF1; ?>"><?php echo $wp04_contact_socialName1; ?></a></dd>
												<?php endif; 
												if ($wp04_contact_socialLabel2 != ""): ?>
													<dt><?php echo $wp04_contact_socialLabel2; ?></dt>
													<dd><a target="_blank" href="<?php echo $wp04_contact_socialHREF2; ?>"><?php echo $wp04_contact_socialName2; ?></a></dd>
												<?php endif; 
												if ($wp04_contact_socialLabel3 != ""): ?>
													<dt><?php echo $wp04_contact_socialLabel3; ?></dt>
													<dd><a target="_blank" href="<?php echo $wp04_contact_socialHREF3; ?>"><?php echo $wp04_contact_socialName3; ?></a></dd>
												<?php endif; 
												if ($wp04_contact_urlLabel != ""): ?>
													<dt><?php echo $wp04_contact_urlLabel; ?></dt>
													<dd><?php if ($wp04_contact_url != ""): ?><a target="_blank" href="<?php echo $wp04_contact_url; ?>"><?php endif; ?><?php echo $wp04_contact_urlDisplay; ?></a></dd>
												<?php endif; 
												if ($wp04_contact_emailLabel != ""): ?>
													<dt><?php echo $wp04_contact_emailLabel; ?></dt>
													<dd><?php if ($wp04_contact_email != ""): ?><a href="mailto:<?php echo $wp04_contact_email; ?>"><?php endif;  ?><?php echo $wp04_contact_emailDisplay; ?></a></dd>
												<?php endif; ?>
												</dl>
											</div>
											<div class="6u">
												<dl class="contact">
												<?php if ($wp04_contact_address != ""): ?>
													<dt><?php echo $wp04_contact_addressLabel; ?></dt>
													<dd>
														<?php echo $wp04_contact_address; ?>
													</dd>
												<?php endif; 
												if ($wp04_contact_phoneDisplay != ""): ?>
													<dt><?php echo $wp04_contact_phoneLabel; ?></dt>
													<dd><?php if ($wp04_contact_phoneNumber != ""): ?><a href="tel:<?php echo $wp04_contact_phoneNumber; ?>"><?php endif; echo $wp04_contact_phoneDisplay; ?></a></dd>
												<?php endif;  ?>
												</dl>
											</div>
										</div>
									</div>
								</section>
						
						</div>  <!-- .6u -->
					</div>  <!-- .row -->

					<div class="row">
						<div class="12u">
							<div id="copyright">
								&copy; <?php bloginfo( 'name' ); ?>. All rights reserved
							</div>  <!-- #copyright -->
						</div>  <!-- .12u -->
					</div>  <!-- .row -->
				</footer>
			</div>  <!-- #footer-wrapper -->
<?php
wp_footer();

$gaID = $TrackingMethod = "";
$TrackingMethod = $wp04_theme_options['gaTrackingMethod'];
// $gaID = get_option( 'gaID' );
if($TrackingMethod == "analytics") {
	$gaID = $wp04_theme_options['gaID'];
	// if( isset( $gaID ) ) :
	if( !empty( $gaID ) ) :
	?>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  // ga('create', '<?php echo $gaID; ?>', '<?php // echo $_SERVER['SERVER_NAME']; ?>');
	  ga('create', '<?php echo $gaID; ?>', '<?php echo $_SERVER['HTTP_HOST']; ?>');
	  ga('send', 'pageview');
	</script>

	<?php endif; // END if( !empty( $gaID )
} // END if($TrackingMethod == "analytics")

$trackingCode = $wp04_theme_options['tracking'];
if( !empty( $trackingCode ) ) {
	echo $trackingCode . "\n";
}
?>
	</body>
</html>
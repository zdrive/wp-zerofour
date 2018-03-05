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

$wp04_demo_mode = true; 

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

// $wp04_contact_ = trim($wp04_theme_options['']);

if ($wp04_demo_mode){

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
//	if (trim(X) == ""){X = "";}
} // END if ($wp04_demo_mode)


?>

			<div id="footer-wrapper">
				<footer id="footer" class="container">

				
					<div class="row">
						<div class="3u">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : 
							dynamic_sidebar( 'footer-1' ); 
						endif; ?>
						</div>  <!-- .3u -->

						<div class="3u">
						<?php if ( is_active_sidebar( 'footer-2' ) ) : 
							dynamic_sidebar( 'footer-2' ); 
						endif; ?>
						</div>  <!-- .3u -->

						<div class="6u">
						<?php if ( is_active_sidebar( 'footer-3' ) ) : 
							dynamic_sidebar( 'footer-3' ); 
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
$gaID = get_option( 'gaID' );
if( isset( $gaID ) ) :
?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', '<?php echo $gaID; ?>', '<?php echo $_SERVER['SERVER_NAME']; ?>');
  ga('send', 'pageview');

</script>
<?php endif; ?>			

<?php wp_footer(); ?>
	</body>
</html>
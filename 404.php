<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */

	// global $wp04_theme_options;
	$wp04_theme_options = get_option( 'wp04_theme_options' );
	$error404_image = $wp04_theme_options[ 'error404_image' ];
	$error404_heading = $wp04_theme_options[ 'error404_heading' ];
	$error404_subheading = $wp04_theme_options[ 'error404_subheading' ];
	$error404_content = $wp04_theme_options[ 'error404_content' ];
	// $error404_ = $wp04_theme_options[ 'error404_' ];

$wp04_demo_mode = true; 

if ($wp04_demo_mode){
	if (trim($error404_image) == ""){$error404_image = "/wp-content/themes/wp-zerofour-master/images/stock/404-error-warning-sign_1200x600.jpg";}
	if (trim($error404_heading) == ""){$error404_heading = "Page Not Found";}
	if (trim($error404_subheading) == ""){$error404_subheading = "Error 404";}
	if (trim($error404_content) == ""){$error404_content = '<p style="text-align:center;">Error 404 &mdash; Page Not Found</p>';}
} // END if ($wp04_demo_mode)

get_header(); ?>
				<div class="main-wrapper-style2">
					<div class="inner">
						<div class="container">
							<div class="row">
								<div class="12u skel-cell-important">
									<div id="content" style="text-align:center;">
										<header class="page-header">
											<h2><?php echo $error404_heading; ?></h2>
											<p style="text-align:center; width: 100%; margin: auto;"><span class="image featured"><img src="<?php echo $error404_image; ?>" alt="<?php echo $error404_heading; ?> <?php echo $error404_subheading; ?>" /></span>
											<h3><?php echo $error404_subheading; ?></h3></p>
											<?php echo $error404_content; ?>
										</header>
									</div>  <!-- #content -->
								</div>  <!-- .12u.skel-cell-important -->
							</div>  <!-- .row -->
						</div>  <!-- .container -->
					</div>  <!-- .inner -->
				</div>  <!-- .main-wrapper-style2 -->
			</div><!-- .main-wrapper -->

<?php get_footer(); ?>

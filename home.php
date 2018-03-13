<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */

// error_reporting(E_ALL); ini_set('display_errors', 1);

$wp04_theme_options = get_option( 'wp04_theme_options' );
$wp04_major_heading = $wp04_theme_options['major_heading'];
$wp04_major_subheading = $wp04_theme_options['major_subheading'];

$wp04_image_heading_photo_1 = $wp04_theme_options['image_heading_photo-1'];
$wp04_image_heading_title_1 = $wp04_theme_options['image_heading_title-1'];
$wp04_image_heading_subtitle_1 = $wp04_theme_options['image_heading_subtitle-1'];
$wp04_image_heading_icon_1 = $wp04_theme_options['image_heading_icon-1'];
$wp04_image_heading_icon_custom_1 = $wp04_theme_options['image_heading_icon_custom-1'];
	if(strlen($wp04_image_heading_icon_custom_1) > 2) {
		$wp04_image_heading_icon_1 = $wp04_image_heading_icon_custom_1;
	}

$wp04_image_heading_photo_2 = $wp04_theme_options['image_heading_photo-2'];
$wp04_image_heading_title_2 = $wp04_theme_options['image_heading_title-2'];
$wp04_image_heading_subtitle_2 = $wp04_theme_options['image_heading_subtitle-2'];
$wp04_image_heading_icon_2 = $wp04_theme_options['image_heading_icon-2'];
$wp04_image_heading_icon_custom_2 = $wp04_theme_options['image_heading_icon_custom-2'];
	if(strlen($wp04_image_heading_icon_custom_1) > 2) {
		$wp04_image_heading_icon_1 = $wp04_image_heading_icon_custom_1;
	}

$wp04_image_heading_photo_3 = $wp04_theme_options['image_heading_photo-3'];
$wp04_image_heading_title_3 = $wp04_theme_options['image_heading_title-3'];
$wp04_image_heading_subtitle_3 = $wp04_theme_options['image_heading_subtitle-3'];
$wp04_image_heading_icon_3 = $wp04_theme_options['image_heading_icon-3'];
$wp04_image_heading_icon_custom_3 = $wp04_theme_options['image_heading_icon_custom-3'];
	if(strlen($wp04_image_heading_icon_custom_1) > 2) {
		$wp04_image_heading_icon_1 = $wp04_image_heading_icon_custom_1;
	}

 $wp04_image_heading_text_below = $wp04_theme_options['image_heading_text_below'];
// $wp04_ = $wp04_theme_options[''];

// DEMO MODE BEGIN
$wp04_demo_mode = $wp04_theme_options['demo_mode'];

if (trim(strtolower($wp04_demo_mode)) != "false"){
	if (empty($wp04_major_heading)){$wp04_major_heading = "This is an important heading";}
	if (empty($wp04_major_subheading)){$wp04_major_subheading = "And this is where we talk about why we're <strong>pretty awesome</strong>";}

	if (empty($wp04_image_heading_photo_1)){$wp04_image_heading_photo_1 = get_template_directory_uri() . "/images/stock/pic01.jpg";}
	if (empty($wp04_image_heading_title_1)){$wp04_image_heading_title_1 = "Here's a Heading";}
	if (empty($wp04_image_heading_subtitle_1)){$wp04_image_heading_subtitle_1 = "And a subtitle";}
	if (empty($wp04_image_heading_icon_1)){$wp04_image_heading_icon_1 = " fa-user";}
	if (empty($wp04_image_heading_icon_custom_1)){$wp04_image_heading_icon_custom_1 = "";}

	if (empty($wp04_image_heading_photo_2)){$wp04_image_heading_photo_2 = get_template_directory_uri() . "/images/stock/pic02.jpg";}
	if (empty($wp04_image_heading_title_2)){$wp04_image_heading_title_2 = "Also a Heading";}
	if (empty($wp04_image_heading_subtitle_2)){$wp04_image_heading_subtitle_2 = "And Another subtitle";}
	if (empty($wp04_image_heading_icon_2)){$wp04_image_heading_icon_2 = " fa-cog";}
	if (empty($wp04_image_heading_icon_custom_2)){$wp04_image_heading_icon_custom_2 = "";}

	if (empty($wp04_image_heading_photo_3)){$wp04_image_heading_photo_3 = get_template_directory_uri() . "/images/stock/pic03.jpg";}
	if (empty($wp04_image_heading_title_3)){$wp04_image_heading_title_3 = "Another Heading";}
	if (empty($wp04_image_heading_subtitle_3)){$wp04_image_heading_subtitle_3 = "And yes, a subtitle";}
	if (empty($wp04_image_heading_icon_3)){$wp04_image_heading_icon_3 = " fa-bar-chart-o";}
	if (empty($wp04_image_heading_icon_custom_3)){$wp04_image_heading_icon_custom_3 = "";}

	if (empty($wp04_image_heading_text_below)){$wp04_image_heading_text_below = 'This is a demonstration of the <span style="white-space: nowrap;">WP-ZeroFour</span> WordPress template, which is based on a design by HTML5UP. You can download the template and use it for free. To get the template, just visit the project\'s main page at GitHub (see link below) and download a ZIP file that you can upload to WordPress as a theme. To change this text, update the <span style="white-space: nowrap;">WP-ZeroFour</span> Options page in WP Admin. Installation Instructions are in the ReadMe file. Download the template here: <span style="white-space: nowrap;"><a href="https://github.com/zdrive/wp-zerofour-v1_1" target="_blank">https://github.com/zdrive/wp-zerofour-v1_1</a></span>';}

} // END if ($wp04_demo_mode)
// DEMO MODE END

get_header(); ?>
				<div class="main-wrapper-style1">
					<div class="inner">
				
						<!-- Feature 1 -->
							<section class="container box-feature1">
								<div class="row">
									<div class="12u">
										<header class="first major">
											<h2><?php echo $wp04_major_heading; ?></h2>
											<span class="byline"><?php echo $wp04_major_subheading; ?></span>
										</header>
									</div>
								</div>
								<div class="row">
									<div class="4u">
										<section>
											<span class="image image-full"><img src="<?php echo $wp04_image_heading_photo_1; ?>" alt="" /></span>
											<header class="second fa <?= $wp04_image_heading_icon_1; ?>">
												<h3><?= $wp04_image_heading_title_1; ?></h3>
												<span class="byline"><?= $wp04_image_heading_subtitle_1; ?></span>
											</header>
										</section>
									</div>
									<div class="4u">
										<section>
											<span class="image image-full"><img src="<?php echo $wp04_image_heading_photo_2; ?>" alt="" /></span>
											<header class="second fa <?= $wp04_image_heading_icon_2; ?>">
												<h3><?= $wp04_image_heading_title_2; ?></h3>
												<span class="byline"><?= $wp04_image_heading_subtitle_2; ?></span>
											</header>
										</section>
									</div>
									<div class="4u">
										<section>
											<span class="image image-full"><img src="<?php echo $wp04_image_heading_photo_3; ?>" alt="" /></span>
											<header class="second fa <?= $wp04_image_heading_icon_3; ?>">
												<h3><?= $wp04_image_heading_title_3 ?></h3>
												<span class="byline"><?= $wp04_image_heading_subtitle_3; ?></span>
											</header>
										</section>
									</div>
								</div>
								<div class="row">
									<div class="12u">
										<p><?= $wp04_image_heading_text_below ?></p>
									</div>
								</div>
							</section>

					</div> <!-- class="inner" -->
				</div> <!-- class="main-wrapper-style1" -->
					
<?php 
get_template_part( 'loop', 'featured-pages' );
get_template_part( 'loop', 'recent-posts' ); 
?>
			</div> <!-- .main-wrapper -->

<?php get_footer(); ?>
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

$wp04_demo_mode = true;

 $wp04_theme_options = get_option( 'wp04_theme_options' );
 $wp04_major_heading = $wp04_theme_options['major_heading'];
 $wp04_major_subheading = $wp04_theme_options['major_subheading'];
if ($wp04_demo_mode){
	if (empty($wp04_major_heading)){$wp04_major_heading = "This is an important heading";}
	if (empty($wp04_major_subheading)){$wp04_major_subheading = "And this is where we talk about why we're <strong>pretty awesome</strong>";}
} // END if ($wp04_demo_mode)

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
											<span class="image image-full"><img src="<?php echo get_template_directory_uri(); ?>/images/stock/pic01.jpg" alt="" /></span>
											<header class="second fa fa-user">
												<h3>Here's a Heading</h3>
												<span class="byline">And a subtitle</span>
											</header>
										</section>
									</div>
									<div class="4u">
										<section>
											<span class="image image-full"><img src="<?php echo get_template_directory_uri(); ?>/images/stock/pic02.jpg" alt="" /></span>
											<header class="second fa fa-cog">
												<h3>Also a Heading</h3>
												<span class="byline">And Another subtitle</span>
											</header>
										</section>
									</div>
									<div class="4u">
										<section>
											<span class="image image-full"><img src="<?php echo get_template_directory_uri(); ?>/images/stock/pic03.jpg" alt="" /></span>
											<header class="second fa fa-bar-chart-o">
												<h3>Another Heading</h3>
												<span class="byline">And yes, a subtitle</span>
											</header>
										</section>
									</div>
								</div>
								<div class="row">
									<div class="12u">
										<p>This text and the three headings above are hard-coded into home.php. Bummer, right? Oh well... pulling the content from WordPress is on the list of things to do. Meanwhile, to edit this area, open 'home.php' with a text editor and upload the updated file to your web server. You can change the Font Awesome icons in the heading class. The headings are H3 elements and the subtitles are called bylines. The images are stored in the 'images/stock' folder as pic01.jpg, pic02.jpg, and pic03.jpg. </p>
									</div>
								</div>
							</section>

					</div>
				</div>
<?php 
get_template_part( 'loop', 'featured-pages' );
get_template_part( 'loop', 'recent-posts' ); 
?>
			</div>

<?php get_footer(); ?>
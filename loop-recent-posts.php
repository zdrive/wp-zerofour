<?php
/**
 * The template used for showing 4 recent blog posts in the template section after the main content and on the homepage.
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */

// error_reporting(E_ALL); ini_set('display_errors', 1);

// Set up and pull the main post to feature. Looped later, as it's shown second, but we need to know the ID to exclude it in the next loop
$args1 = array(
	'posts_per_page'      => 1,
	// 'post__not_in'		  => array(1, 2),
	'post__in'            => get_option( 'sticky_posts' ),
	'ignore_sticky_posts' => 1
);
$spotlight_query = new WP_Query( $args1 );
$spotlight_query->the_post();
$spotlight_id    = get_the_ID();

// Get the rest of our posts for display
$args2 = array(
	'posts_per_page' => 3,
	'post__not_in'   => array(1, $spotlight_id)
);
$recent_query = new WP_Query( $args2 ); 

$TheID[0] = $TheID[1] = $TheID[2] = $TheID_S = "";
$numPost = 0;
if ( $recent_query->have_posts() ) :
	while ( $recent_query->have_posts() ) :
		$recent_query->the_post();
		$TheID[$numPost] = get_the_ID();
		$ThePermalink[$numPost] = get_the_permalink();
		$TheDate[$numPost] = get_the_date();
		$TheTitle[$numPost] = get_the_title();
		$TheExcerpt[$numPost] = get_the_excerpt();

		if ( has_post_thumbnail() ) :
			$TheThumbnail[$numPost] = get_the_post_thumbnail($TheID[$numPost], 'blog-thumb' );
		endif;

		$numPost++;

	endwhile;

endif;  // END if ( $recent_query->have_posts() )
	wp_reset_postdata();

	$featuredString = false;
	if (intval($spotlight_id) > 2) {$featured_post = get_post( $spotlight_id );}

	if ( isset( $featured_post ) ) :
		setup_postdata( $featured_post );
		// Change the string key used based on if the featured post is sticky or not
		$featuredString = ( is_sticky($spotlight_id) ? 'Spotlight' : 'Latest Post' );

		$TheID_S = get_the_ID();
//		$PostClass_S = get_post_class();
		$PostClass_S = ' class="sticky"';
		$ThePermalink_S = get_the_permalink();
		$TheTitle_S = get_the_title();
		$TheAuthorLink_S = get_the_author_link();
		if ( has_post_thumbnail() ) :
			$TheThumbnail_S = get_the_post_thumbnail($TheID_S, 'featured-thumb' );
		else:
			$TheThumbnail_S = "";
		endif;
		$TheExcerpt_S = get_the_excerpt();
	
		wp_reset_postdata();
	endif; // END if ( isset( $featured_post ) )

// endif;  // END if ( $recent_query->have_posts() )

// DEMO MODE
$wp04_demo_mode = true; 

if ($wp04_demo_mode){
	$demoTitle[0] = "Repairing a Hyperspace Window";
	$demoTitle[1] = "Adventuring with a Knee Injury";
	$demoTitle[2] = "Preparing for Y2K38";

	$demoExcerpt = "This is a placeholder post that was generated for demonstration purposes. To replace this text with real content, go into WP Admin and add a new post, including title, text and featured image. You can turn Demo Mode off or on in the General tab of the WP-ZeroFour Theme Settings page.";

	$demoThumbnail[0] = "pic04.jpg";
	$demoThumbnail[1] = "pic05.jpg";
	$demoThumbnail[2] = "pic06.jpg";

	$picStart = '<img width="180" height="167" src="' . get_template_directory_uri() . '/images/stock/';
	$picEnd = '" class="attachment-blog-thumb size-blog-thumb wp-post-image" alt="">';

	$numDemo = 0;
	while ($numDemo <= 2) {
		if (trim($TheID[$numDemo]) == "") {
			$TheID[$numDemo] = "10" . $numDemo;
			$ThePermalink[$numDemo] = "#";
			$TheDate[$numDemo] = date("M j, o", strtotime("Today - " . $numDemo*3 . " days")); 
			$TheTitle[$numDemo] = $demoTitle[$numDemo];
			$TheExcerpt[$numDemo] = $demoExcerpt;
			$TheThumbnail[$numDemo] = $picStart . $demoThumbnail[$numDemo] . $picEnd; 


			$numPost++;
		} // END if (trim($TheID[$numDemo]) == "")
		$numDemo++;
	} // END while ($numDemo <= 2)

	if (trim($TheID_S) == "") {
		$featuredString = "Spotlight";
		$TheID_S = "201";
		$PostClass_S = "box-spotlight";
		$ThePermalink_S = "#";
		$TheTitle_S = "Neural Implants - The Pros and Cons (Mostly Cons)";
		$TheAuthorLink_S = "Author Somebody";
		$TheExcerpt_S = 'The Spotlight area will display a "sticky" post. To make the post appear here, edit the Visibility section and check the box that says "Stick this post to the front page." ' . $demoExcerpt;
		$TheThumbnail_S = $picStart . "pic07.jpg" . $picEnd;
	} // END if (trim($TheID_S) == "")


} // END if ($wp04_demo_mode)

?>

<div class="main-wrapper-style3">
	<div class="inner">
		<div class="container">
			<div class="row">
				<div class="8u">
					<section class="box-article-list">
						<h2 class="fa fa-file-text-o"><?php _e( 'Recent Posts', 'wpzerofour' ); ?></h2>
<?php 
if ($numPost > 0) :
	$numDisplay = 0;
	while ($numDisplay < $numPost) :
?>
						<article id="post-<?php echo $TheID[$numDisplay]; ?>" class="box-excerpt">
<?php
		if (strlen(trim($TheThumbnail[$numDisplay])) > 0) : ?>
							<a href="<?php echo $ThePermalink[$numDisplay]; ?>" class="image image-left"><?php echo $TheThumbnail[$numDisplay]; ?></a>
<?php 	endif; ?>
							<div>
								<header>
									<span class="date"><?php  echo $TheDate[$numDisplay]; ?></span>
									<h3><a href="<?php echo $ThePermalink[$numDisplay]; ?>"><?php echo $TheTitle[$numDisplay]; ?></a></h3>
								</header>
								<?php echo $TheExcerpt[$numDisplay]; ?>
							</div>
						</article>  <!-- #post-<?php echo $TheID[$numDisplay]; ?>.box-excerpt -->
<?php 
		$numDisplay++;
	endwhile;
else :  // if ($numPost > 0)
?>
						<article class="box-excerpt">
							<div><?php _e( 'No posts yet...', 'wpzerofour' ); ?></div>
						</article> 
<?php
endif; // END if ($numPost > 0)
?>
					</section>  <!-- .box-article-list -->
				</div>  <!-- .8u -->
				
<?php if ( $featuredString ) : ?>
				<div class="4u">
					<section class="box-spotlight">
						<h2 class="fa fa-file-text-o"><?php _e( $featuredString, 'wpzerofour' ); ?></h2>
						<article id="post-<?php echo $TheID_S; ?>" <?php echo $PostClass_S; ?>>
<?php if (strlen(trim($TheThumbnail_S)) > 0) : ?>
							<a href="<?php echo $ThePermalink_S; ?>" class="image image-full"><?php echo $TheThumbnail_S; ?></a>
<?php endif; ?>
							<header>
								<h3><a href="<?php echo $ThePermalink_S; ?>"><?php echo $TheTitle_S; ?></a></h3>
								<span class="byline">by <?php echo $TheAuthorLink_S; ?></span>
							</header>
							<?php echo $TheExcerpt_S; ?>
							<footer>
								<a href="<?php echo $ThePermalink_S; ?>" class="button alt fa fa-file-o"><?php _e( 'Continue Reading', 'wpzerofour' ); ?></a>
							</footer>
						</article>  <!-- #post-<?php echo $TheID_S; ?> -->
					</section>  <!-- .box-spotlight -->
				</div>  <!-- .4u -->
<?php endif; // END if ( $featuredString ) ?>
			</div>  <!-- .row -->
		</div>  <!-- .container -->
	</div>  <!-- .inner -->
</div>  <!-- #main-wrapper-style3 -->
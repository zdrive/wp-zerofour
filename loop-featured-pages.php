<?php
/**
 * The template used for showing 2 featured subsections based on page content on the homepage.
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */

// error_reporting(E_ALL); ini_set('display_errors', 1);

global $post;

$args = array(
	'meta_key'    => '_home_button_show',
	'meta_value'  => 'true',
	'numberposts' => 2,
	'orderby'     => 'meta_value_num',
	'post_type'   => 'page'
);
$featured_pages = get_posts( $args );
?>
<div class="main-wrapper-style2">
	<div class="inner">
		<section class="container box-feature2">
			<div class="row">
<?php 

$i=0;

foreach( $featured_pages as $post ) :

	setup_postdata( $post );
//	$button_label[$i]	= get_post_meta( get_the_ID(), '_home_button_label', true ) ?: __( 'Learn More', 'wpzerofour' );
	$button_label[$i]	= get_post_meta( get_the_ID(), '_home_button_label', true ) ? get_post_meta( get_the_ID(), '_home_button_label', true ) : __( 'Learn More', 'wpzerofour' );
    $button_icon[$i]	= get_post_meta( get_the_ID(), '_home_button_icon' , true );
    $button_type[$i]	= get_post_meta( get_the_ID(), '_home_button_type' , true );
    $subheading[$i]		= get_post_meta( get_the_ID(), '_subheading' , true );

    $theTitle[$i]		= get_the_title();
    $theExcerpt[$i]		= get_the_excerpt();
    $thePermalink[$i]	= get_the_permalink();
	
	if( !empty( $button_icon[$i] ) ) :
		$button_class[$i] = ' fa fa-' . $button_icon[$i] . '-circle';
		// $button_class = ' fa fa-' . $button_icon;
	endif;
	if( !empty( $button_type[$i] ) && $button_type[$i] == 'secondary' ) :
		$button_class[$i] = ' alt'. $button_class[$i];
	endif;

	$i++;

endforeach;

wp_reset_postdata();

if ($i < 2) {
	$button_label[1]	= "Wait, What?";
    $button_icon[1]		= "question";
    $button_type[1]		= "secondary";
    $button_class[1] 	= " alt fa fa-question-circle";
    $subheading[1]		= "And is as Unimportant as the Other One";
    $theTitle[1]		= "This is Also a Subheading";
    $theExcerpt[1]		= "This demo text appears when you have not yet set up the subheadings. Make a Page with title and content, then use the WP-ZeroFour Options panel on the right side to enable the control, choose icon settings and other options.";
    $thePermalink[1]	= "#";
} // END if ($i < 2)

if ($i < 1) {
	$button_label[0]	= "Let's Do This";
    $button_icon[0]		= "play";
    $button_type[0]		= "primary";
    $button_class[0] 	= " fa fa-play-circle";
    $subheading[0]		= "It's Important But Clearly Not *That* Important";
    $theTitle[0]		= "And This is a Subheading";
    $theExcerpt[0]		= "This demo text appears when you have not yet set up the subheadings. Make a Page with title and content, then use the WP-ZeroFour Options panel on the right side to enable the control, choose icon settings and other options.";
    $thePermalink[0]	= "#";
} // END if ($i < 1)

$x = 0;
while ($x < 2){
?>
				<div class="6u">
					<section>
						<header class="major">
							<h2><?php echo $theTitle[$x]; ?></h2>
<?php if( !empty( $subheading[$x] ) ) : ?>
							<span class="byline"><?php echo $subheading[$x]; ?></span>
<?php endif; ?>
						</header>  <!-- .major -->
						<p><?php echo $theExcerpt[$x]; ?></p>
						<footer>
							<a href="<?php echo $thePermalink[$x]; ?>" class="button medium<?php echo $button_class[$x]; ?>"><?php echo $button_label[$x]; ?></a>
						</footer>
					</section>
				</div>  <!-- .6u -->
<?php
$x++;
} // END while ($x = 0, $x < $i, $x++)
// endforeach;
// wp_reset_postdata();
?>				
			</div>  <!-- .row -->
		</section>  <!-- .container.box-featured2 -->
	</div>  <!-- .inner -->
</div>  <!-- .main-wrapper-style2 -->
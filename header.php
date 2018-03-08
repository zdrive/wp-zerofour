<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main-wrapper">
 *
 * @package WordPress
 * @subpackage WP-ZeroFour
 * @since WP-ZeroFour 1.0
 */
 
$wp04_demo_mode = true;

 $wp04_theme_options = get_option( 'wp04_theme_options' );
 $wp04_custom_header = $wp04_theme_options['header_img'];
 $wp04_custom_sitelogo = $wp04_theme_options['site_logo'];
 $SiteLogo = get_bloginfo( 'name' );
 
if( is_home() ) {
	$centerpiece_headline     = $wp04_theme_options[ 'centerpiece_headline' ];
	$centerpiece_subheading   = $wp04_theme_options[ 'centerpiece_subheading' ];
	$centerpiece_button_label = $wp04_theme_options[ 'centerpiece_button_label' ];
	$centerpiece_button_link  = $wp04_theme_options[ 'centerpiece_button_link' ];
	$centerpiece_button_type  = $wp04_theme_options[ 'centerpiece_button_type' ];
	$centerpiece_button_icon  = $wp04_theme_options[ 'centerpiece_button_icon' ];
} // END if( is_home()

if ($wp04_demo_mode){
	if (empty($wp04_custom_header)){$wp04_custom_header = get_template_directory_uri() . "/images/stock/banner_1600x450-demo.jpg";}
	if (empty($wp04_custom_sitelogo)){$wp04_custom_sitelogo = get_template_directory_uri() . "/images/stock/WP-ZeroFour-CoolText_250x45.gif";}
	if( is_home() ) {
		if (empty($centerpiece_headline)){$centerpiece_headline = '<strong>ZeroFour:</strong> A free responsive site template <br>built on HTML5 and CSS3 by <a href="http://html5up.net">HTML5 UP</a>';}
		if (empty($centerpiece_subheading)){$centerpiece_subheading = "Does This Statement Make You Want to Click the Big Shiny Button?";}
		if (trim($centerpiece_button_label) == ""){$centerpiece_button_label = "Yes It Does";}
		if (trim($centerpiece_button_link) == ""){$centerpiece_button_link = "#";}
		if (trim($centerpiece_button_type) == ""){$centerpiece_button_type ="primary";}
		if (trim($centerpiece_button_icon) == ""){$centerpiece_button_icon ="check";}
	} // END if( is_home()
} // END if ($wp04_demo_mode)

if ($wp04_custom_sitelogo != ""){
	$SiteLogo = "<img src='" . $wp04_custom_sitelogo . "' alt='" . get_bloginfo( 'name' ) . "' />";
}


?><!DOCTYPE HTML>
<!--
	ZeroFour 2.5 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html <?php language_attributes(); ?>>
<head>
	<!-- <title><?php // wp_title( '|', true, 'right' ); ?></title> -->
<title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo( 'description' ); ?>">
	<meta name="keywords" content="">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,700,800" rel="stylesheet" type="text/css">
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.dropotron.min.js"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/js/config.js"></script>
	<!-- script src="<?php // echo get_template_directory_uri(); ?>/js/skel.min.js"></script>
	<script src="<?php // echo get_template_directory_uri(); ?>/js/skel-panels.min.js"></script>
	<noscript -->
		<link rel="stylesheet" media="screen and (min-width: 960px)" href="<?php echo get_template_directory_uri(); ?>/css/skel-noscript.css">
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
		<link rel="stylesheet" media="(min-width: 481px)" href="<?php echo get_template_directory_uri(); ?>/css/style-desktop.css">
		<link rel="stylesheet" media="(min-width: 481px) and (max-width: 1000px)" href="<?php echo get_template_directory_uri(); ?>/css/style-1000px.css">
		<link rel="stylesheet" media="(max-width: 480px)" href="<?php echo get_template_directory_uri(); ?>/css/style-mobile.css">
	<!-- /noscript -->
	<!--[if lte IE 9]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie9.css"><![endif]-->
	<!--[if lte IE 8]><script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie8.css" /><![endif]-->
	<!--[if lte IE 7]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie7.css"><![endif]-->
<?php if( !empty( $wp04_custom_header ) ) : ?>
	<style>#header-wrapper{background-image:url('<?php echo $wp04_custom_header; ?>');}</style>
<?php 
endif;

wp_head(); 
?>
</head>
	<body <?php if( is_home() ) : body_class('homepage'); else: body_class(); endif; ?>>

		<!-- Header Wrapper -->
			<div id="header-wrapper">
				<div class="container">
					<div class="row">
						<div class="12u">

								<header id="header">
									<div class="inner">
									
											<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" id="logo"><?php echo $SiteLogo; ?></a></h1>
										
											<nav id="nav">

											<?php 
											wp_nav_menu( array( 'theme_location' => 'Top Nav' ) ); ?>
											</nav>  <!-- #nav -->
									</div>  <!-- .inner -->
								</header>  <!-- #header -->

<?php 
if( is_home() ) : ?>
								<div id="banner">
									<?php if( !empty( $centerpiece_headline ) ) : ?>
									<h2><?php echo $centerpiece_headline; ?></h2>
									<?php 
									endif; 
									if( !empty( $centerpiece_subheading ) ) :
									?>
										<p><?php echo $centerpiece_subheading; ?></p>
									<?php 
									endif; 
									if( !empty( $centerpiece_button_label ) ) :
										if( !empty( $centerpiece_button_icon ) ) :
											$centerpiece_button_class = ' fa fa-' . $centerpiece_button_icon . '-circle';
										endif;
										if( !empty( $centerpiece_button_type ) && $centerpiece_button_type == 'secondary' ) :
											$centerpiece_button_class = ' alt'. $centerpiece_button_class;
										endif;
									?>
									<a href="<?php echo $centerpiece_button_link; ?>" class="button big<?php echo $centerpiece_button_class; ?>"><?php echo $centerpiece_button_label; ?></a>
									<?php endif; ?>
								</div> <!-- id="banner" -->
<?php endif; // END if( is_home() ) ?>
						</div> <!-- class="12u" -->
					</div> <!-- class="row" -->
				</div> <!-- class="container" -->
			</div> <!-- id="header-wrapper" -->
		
		<!-- Main Wrapper -->
			<div id="main-wrapper">
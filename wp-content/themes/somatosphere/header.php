<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html <?php language_attributes(); ?> class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->

<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="chrome=1">

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'themename' ), max( $paged, $page ) );

	?></title>
	<meta name="description" content="">
	<meta name="author" content="">
	<!--  Mobile Viewport Fix -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<!-- Place favicon.ico and apple-touch-icon.png in the images folder -->
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png"><!--60X60-->
	
	<link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); echo '?' . filemtime( get_stylesheet_directory() . '/style.css'); ?>" type="text/css" />
<!--    <link rel="stylesheet" href="<?php bloginfo('url'); ?>/wp-content/plugins/jetpack/modules/sharedaddy/sharing.css" type="text/css" />-->

	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
	
	<?php wp_head(); ?>
	</head>
	
	<body <?php body_class('tile'); ?>>
	<div id="men">
		<div id="line">
			<div id="white">
	<div id="page" class="hfeed">
		<header id="branding" role="banner">
				<hgroup>
					<h1 id="site-title"><span><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></span></h1>
					<h2 id="site-description"><span id="subhead"><?php bloginfo( 'description' ); ?></span></h2>
					<h3 id="subsubhead">
						<?php $head_query = new WP_Query('posts_per_page=1&page_id=1923');  ?>
						<?php while($head_query->have_posts()) : $head_query->the_post(); ?>
						<?php echo get_the_content(); ?> 
						<?php edit_post_link('Edit'); ?>
						<?php endwhile; ?>
						<?php wp_reset_query(); ?>	
					</h3>
				</hgroup>
				
				<nav id="utility" role="navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'utility' ) ); ?>
				</nav><!-- #utility -->
	
				<nav id="access" role="navigation">
					<div id="backtile">
					<div id="backimg">
<!--					<h1 class="section-heading"><?php _e( 'Main menu', 'themename' ); ?></h1>-->
					<div class="skip-link visuallyhidden"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'themename' ); ?>"><?php _e( 'Skip to content', 'themename' ); ?></a></div>
					<?php get_sidebar('fixed'); ?>
					
					</div>
					</div>
				</nav><!-- #access -->
		</header><!-- #branding -->
	
	
		<div id="main">
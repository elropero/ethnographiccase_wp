<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>



<?php 
$pid = 1;
$pid1 = 1;
global $query_string;
global $wp_query;
?>

		<div id="primary">
			<div id="content">
				<header class="sphere-header">
					<div class="aboveline">
						<h1 class="sphere-title">
							<a href="http://somatosphere.net/randomsphere">Virosphere</a>	
						</h1>
						<h2 class="sphere-subtitle">
							HIV, Science, and the Social
						</h2>
						<div class="sphere-tagline">A collaborative forum for critical enquiry on HIV/AIDS and global health: experiment, ethics, and practice</div>
						<div class="sphere-back"></div>
					</div>
					<div class="belowline">
						<?php wp_nav_menu( array( 'theme_location' => 'virosphere' ) ); ?>
					</div>
				</header>
<?php if (is_paged()) { ?>
				<?php get_template_part( 'loop', 'index' ); ?>
			
<?php } else { ?>
			
				<div id="frontbig">
<?php $sticky = get_option( 'sticky_posts' );
if ( $sticky[0] ) {
$args = array_merge( $wp_query->query, array(
	'posts_per_page' => 1,
	'post__in'  => $sticky,
	'ignore_sticky_posts' => 1
	)
);
query_posts( $args );
//$catquery = new WP_Query( $args );
} else {

?>


					<?php query_posts( $query_string . '&posts_per_page=1'); } ?>
					<?php // $catquery = new WP_Query('posts_per_page=1&cat=11'); ?>
					<?php $my_count = 0 ?>
					<?php include 'sphereloop.php' ?>
					<?php $pid1 = $pid; ?>
				</div>
				<div id="frontsmall">
					<div class="frontsmall left">
						<?php query_posts( $query_string . '&offset=1&posts_per_page=6' ); ?>
						<?php $my_count = 0 ?>
						<?php include 'sphereloop.php' ?>
					</div>
					<div class="frontsmall right">
						<?php query_posts( $query_string . '&offset=1&posts_per_page=6' ); ?>
						<?php $my_count = 1 ?>
						<?php include 'sphereloop.php' ?>
					</div>
				</div>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav class="nav-below" role="article">
		<h1 class="section-heading"><?php _e( 'Post navigation', 'themename' ); ?></h1>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'themename' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?></div>
	</nav><!-- #nav-below -->
<?php endif; ?>
<?php } ?>


			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
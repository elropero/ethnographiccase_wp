<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); 
$pid = 1;
$pid1 = 1;
?>

		<div id="primary">
			<div id="content">
<?php if (is_paged()) { ?>
				<?php get_template_part( 'loop', 'index' ); ?>
			
<?php } else { ?>
			
				<div id="frontbig">
<?php $sticky = get_option( 'sticky_posts' );
if ( $sticky[0] ) {
$args = array(
	'posts_per_page' => 1,
	'post__in'  => $sticky,
	'post_status' => 'publish',
	'ignore_sticky_posts' => 1
);
$catquery = new WP_Query( $args );
} else {
?>


					<?php $catquery = new WP_Query('posts_per_page=1&cat=1,276'); } ?>
					<?php // $catquery = new WP_Query('posts_per_page=1&cat=11'); ?>
					<?php $my_count = 0 ?>
					<?php include 'frontloop.php' ?>
					<?php $pid1 = $pid; ?>
				</div>
				<div id="frontsmall">
					<div class="frontsmall left">
						<?php $catquery = new WP_Query( array( 'post__not_in' => array( $pid1 ), 'posts_per_page' => '6', 'cat' => '-252' ) ); ?>
						<?php $my_count = 0 ?>
						<?php include 'frontloop.php' ?>
					</div>
					<div class="frontsmall right">
						<?php $catquery = new WP_Query( array( 'post__not_in' => array( $pid1 ), 'posts_per_page' => '6', 'cat' => '-252' ) ); ?>
						<?php $my_count = 1 ?>
						<?php include 'frontloop.php' ?>
					</div>
				</div>
<?php if (  $wp_query->max_num_pages > 1 ) : ?>
	<nav class="nav-below" role="navigation">
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
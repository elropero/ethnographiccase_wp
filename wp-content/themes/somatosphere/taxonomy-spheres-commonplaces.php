<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>




		<div id="primary" class="test">
			<div id="content">
				<?php commonplaces_header(); ?>
<div id="commontiles">
	<div id="commonhead"></div>
	<div id="commonfoot"></div>
<?php global $query_string; // required
query_posts($query_string.'&post_status=any&order=ASC&posts_per_page=-1'); 
$n = 0; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php $n++; ?>
	
<div class="live-tile"<?php if($n % 2 == 0) { ?> data-direction="horizontal"<?php } ?>>
        <div style="background-color:White;"><?php 
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
          the_post_thumbnail('medium');
        } else { ?>
        	<img src="<?php echo get_template_directory_uri(); ?>/img/grey_tile.jpg" alt="" />
        <?php }
        ?></div>
		<div style="background-color:Orange;"><h1>
		<?php 
		if(get_field('short_title')) {
			$thetitle = get_field('short_title');
		} else {
			$thetitle = get_the_title();
		}
		?>
		<?php
		if ( get_post_status ( ) == 'publish' ) { ?>
			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php echo $thetitle; ?></a>
		<?php } else { 
				echo $thetitle;
		} ?>
		</h1><span class="author"><i>by</i> <?php if(function_exists('coauthors_posts_links'))
		    coauthors_posts_links();
		else
		    the_author_posts_link(); ?></span></div>
    </div>
    <?php endwhile; ?>
    <?php // wp_reset_query(); ?>
    <div class="clearfix"></div>
</div>
	
<?php /* if (is_paged()) { ?>
				<?php get_template_part( 'loop', 'index' ); ?>
			
<?php } else { ?>
<?php 
$pid = 1;
$pid1 = 1;
global $query_string;
global $wp_query;
?>
								<?php include 'sphereloop.php' ?>
<?php /* 		
				<div id="frontbig">
<?php $sticky = get_option( 'sticky_posts' );
if ( $sticky[0] ) {
$args = array_merge( $wp_query->query, array(
	'posts_per_page' => 1,
	'post__in'  => $sticky,
	'ignore_sticky_posts' => 1,
	'post_type' => 'post'
	)
);
query_posts( $args );
//$catquery = new WP_Query( $args );
} else {

?>


					<?php query_posts( $query_string . '&posts_per_page=1&post_type=post&cat=1,276,295'); } ?>
					<?php // $catquery = new WP_Query('posts_per_page=1&cat=11'); ?>
					<?php $my_count = 0 ?>
					<?php include 'sphereloop.php' ?>
					<?php $pid1 = $pid; ?>
				</div>
				<div id="frontsmall">
					<?php $args = array_merge( $wp_query->query, array(
						'posts_per_page' => 6,
						'cat' => '-252',
						'post__not_in'  => array($pid1),
						'post_type' => 'post',
						'paged' => $paged
						)
					); ?>
					<div class="frontsmall left">
						<?php query_posts( $args ); ?>
						<?php $my_count = 0 ?>
						<?php include 'sphereloop.php' ?>
					</div>
					<div class="frontsmall right">
						<?php query_posts( $args ); ?>
						<?php $my_count = 1 ?>
						<?php include 'sphereloop.php' ?>
					</div>
				</div>
*/ ?>

	<?php if (  $wp_query->max_num_pages > 1 ) : ?>
		<nav class="nav-below" role="navigation">
			<h1 class="section-heading"><?php _e( 'Post navigation', 'themename' ); ?></h1>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'themename' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?></div>
		</nav><!-- #nav-below -->
	<?php endif; ?>
	<?php // } ?>


			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar('commonplaces'); ?>
<?php get_footer(); ?>
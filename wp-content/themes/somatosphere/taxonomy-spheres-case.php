<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>


<!-- START -->


<style type="text/css">
    body {
        font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; 
        font-weight: 300;
    }
    .cases-container {
        width: 693px;
        position:absolute;
        right: 230px;
        top: 221px;
    }
    .logo {
        margin-left: 0;
    }

    .case {
        width: 693px;
    }
    .case-1 {
        height: 413px;
        margin-bottom: -91px;
        /*margin-top: -10px;*/
    }
    .case-2 {
        height: 365px;
        margin-bottom: -73px;
    }
    .case-3 {
        height: 326px;
        margin-bottom: -72px;
    }
    div[class*="bg-case-"] {
        background-size: cover;
        width: 693px;
        height: 100%;
    }
    div[class*="bg-case-"]:hover {
        background-image: none;
        background-color: black;
        cursor: pointer;
    }
    .bg-case-1 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/books.jpg");
        -webkit-clip-path: url("#clip-svg-path1");
        clip-path: url("#clip-svg-path1");
        -webkit-clip-path: polygon(0% 23%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 100%);
        clip-path: polygon(0% 23%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 100%);
    }

    .case-bottom {
        background-color: #999;
        height: 90px;
        margin-left: 2px;
        width: 693px;
        
        -webkit-clip-path: url("#clip-svg-path-bottom");
        clip-path: url("#clip-svg-path-bottom");
        -webkit-clip-path: polygon(15% -13%, 0% 0%, 100% 0%, 88% 100%, 0% 100%, 0% 98%);
        -clip-path: polygon(15% -13%, 0% 0%, 100% 0%, 88% 100%, 0% 100%, 0% 98%);
    }
    .spine {
        position: absolute;
        background-color: #eee;
        width: 6px;
        height: 326px;
        left: 94px;
        z-index: 1;
    }
    .case-title {
        z-index: 1;
        color: white;
        position: relative;
        top: 40px;
        left: 120px;
        margin: 0;
        float: left;
        max-width: 70%;
    }
    .case-description {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/bottom.png");
        background-repeat: no-repeat;
        height: 342px;
        margin-top: 300px;
        line-height: 1.6;
    }
    .case-description .case-title {

    }


    .bracket-container {
        position: absolute;
        height: 100%;
        width: 60px;
        left: 300px;
        margin-top: -57px;
        overflow:hidden;
    }
    .bracket {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/bracket-tall.png");
        background-repeat: no-repeat;
        height: 5000px;
        width: 100px;
    }
    #white {
      background: url("<?php echo get_template_directory_uri(); ?>/img/case_back.png") repeat-y 0 0
  }
  #primary {
   margin-left: 18px;
   margin-top: 130px;
}

</style>



<div id="primary" class="test">

    <?php ethnographiccase_header(); ?>

    <div class="cases-container">

    <?php global $query_string; // required
        query_posts($query_string.'&post_status=any&order=ASC&posts_per_page=-1'); 
        $n = 0; 
    ?>

    <?php while ( have_posts() ) : the_post(); ?>
    <?php $n++; ?>

    <?php 
        if(get_field('short_title')) {
            $thetitle = get_field('short_title');
        } else {
            $thetitle = get_the_title();
        }
    ?>

    <?php
        if ( get_post_status ( ) == 'publish' ) { 
    ?>
        <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
    <?php } else { ?>
        <a href="#">
    <?php } ?>
    
            <div class="case case-<?php echo $n ?> grid effect-6">
                <div class="case-title">
                <?php echo $thetitle; ?>
            </div>

            <div class="bg-case-1">
                <div class="spine"></div>
            </div>
        </a>
    <?php endwhile; ?>

    <div class="case-bottom">
    </div>

    <div class="bracket-container">
        <div class="bracket">
        </div>
    </div>

    <div class="case case-description">
        <p class="case-title" style="color:black">
            Over the next year we will bring you a series of “ethnographic cases.” To pay homage to the traditional ethnographic monograph, the pieces will be collected in an expanding bookCASE. The virtual-format of this bookCase makes evident that today’s monograph can be a very different thing than the monograph of ethnographies' past. Clicking the cases may link to straight-forward text, but you may also find yourself amidst audio or video files, photographs, artwork, and more.      
        </p>
    </div>
</div> <!-- /cases-container -->




<!-- SVG clip paths -->
<svg height=0 width=0>
  <defs>
    <clipPath id="clip-svg-path1" clipPathUnits="objectBoundingBox">
      <polygon points="0 0.23, 0.14 0, 1 0, 1 0.78, 0.14 0.78, 0 1" />
  </clipPath>
  <clipPath id="clip-svg-path-bottom" clipPathUnits="objectBoundingBox">
      <polygon points="0.15 -0.13 0 0, 1 0, 0.88 1, 0 1, 0 0.98" />
  </clipPath>
</defs>   
</svg> 


<div id="content"> <!-- NOTE: This gives the content bg -->


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
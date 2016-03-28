<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>


<!-- START -->


<style type="text/css">

    @font-face {
        font-family: 'absarasans-boldregular';
        src: url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-bold-webfont.eot');
        src: url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-bold-webfont.eot?#iefix') format('embedded-opentype'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-bold-webfont.woff2') format('woff2'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-bold-webfont.woff') format('woff'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-bold-webfont.ttf') format('truetype'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-bold-webfont.svg#absarasans-boldregular') format('svg');
        font-weight: normal;
        font-style: normal;
    }
    @font-face {
        font-family: 'absarasans-regularregular';
        src: url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-regular-webfont.eot');
        src: url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-regular-webfont.eot?#iefix') format('embedded-opentype'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-regular-webfont.woff2') format('woff2'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-regular-webfont.woff') format('woff'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-regular-webfont.ttf') format('truetype'),
        url('<?php echo get_template_directory_uri(); ?>/fonts/absarasans-regular-webfont.svg#absarasans-regularregular') format('svg');
        font-weight: normal;
        font-style: normal;

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

    div[class*="container-case-"] {
        height: 400px;
        margin-bottom: -86px;
    }

    div.container-case-1 {
        margin-bottom: -88px;
    }

    div[class*="bg-case-"] {
        /*background-size: cover;*/
        width: 693px;
        height: 100%;
    }
    [class*="bg-case-"]:hover {
        background-image: none;
        cursor: pointer;
        background-color: black;
    }

    .bg-case-3:hover, .bg-case-6:hover, .bg-case-10:hover, .bg-case-13:hover, .bg-case-15:hover, .bg-case-18:hover, .bg-case-20:hover, .bg-case-23:hover {
        /* use linear gradient so we can offset bg */
        background: -webkit-linear-gradient(left, #000, #000) no-repeat 46px; /*Safari 5.1-6*/
        background: -o-linear-gradient(left,#000,#000) no-repeat 46px; /*Opera 11.1-12*/
        background: -moz-linear-gradient(left,#000,#000) no-repeat 46px; /*Fx 3.6-15*/
        background: linear-gradient(to left, #000, #000) no-repeat 46px; /*Standard*/
    }

    .bg-case-1:hover, .bg-case-4:hover, .bg-case-8:hover, .bg-case-11:hover, .bg-case-14:hover, .bg-case-17:hover, .bg-case-21:hover {
        /* use linear gradient so we can offset bg */
        background: -webkit-linear-gradient(left, #000, #000) no-repeat 18px; /*Safari 5.1-6*/
        background: -o-linear-gradient(left,#000,#000) no-repeat 18px; /*Opera 11.1-12*/
        background: -moz-linear-gradient(left,#000,#000) no-repeat 18px; /*Fx 3.6-15*/
        background: linear-gradient(to left, #000, #000) no-repeat 18px; /*Standard*/
    }

    .bg-case-2, .bg-case-5, .bg-case-7, .bg-case-9, .bg-case-12, .bg-case-16, .bg-case-19, .bg-case-22 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_mud.jpg");        
        -webkit-clip-path: url("#clip-svg-path2");
        clip-path: url("#clip-svg-path2");
        -webkit-clip-path: polygon(0% 21%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 99%);
        clip-path: polygon(0% 21%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 99%);
    }

    .bg-case-3, .bg-case-6, .bg-case-10, .bg-case-13, .bg-case-15, .bg-case-18, .bg-case-20, .bg-case-23 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_eye.jpg");
        background-position: 46px -60px;
        background-repeat: no-repeat;
        -webkit-clip-path: url("#clip-svg-path3");
        clip-path: url("#clip-svg-path3");
        -webkit-clip-path: polygon(0% 21%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 99%);
        clip-path: polygon(0% 21%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 99%);
    }


    .bg-case-1, .bg-case-4, .bg-case-8, .bg-case-11, .bg-case-14, .bg-case-17, .bg-case-21 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_birch.jpg");
        background-position: 18px -60px;
        background-repeat: no-repeat;
        -webkit-clip-path: url("#clip-svg-path4");
        clip-path: url("#clip-svg-path4");
        -webkit-clip-path:  polygon(0% 21%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 99%);
        clip-path:          polygon(0% 21%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 99%);
    }
    
    .bg-case-1 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_books.jpg");
    }
    .bg-case-2 {
        background-size: 100%;
    }

    .bg-case-5 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_spectrum.jpg");        
    }

    .bg-case-6 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_paralysis.jpg");        
    }

    .bg-case-7 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_humvee.png");        
    }

    .bg-case-8 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_map.jpg");        
    }

    .bg-case-9 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_court.jpg");        
    }
    .bg-case-10 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_roots.jpg");
    }
    .bg-case-11 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_sperm.jpg");
    }
    .bg-case-12 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_bare.png");
    }
    .bg-case-13 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_sense.jpg");
    }
    .bg-case-14 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_swamp.jpg");
        background-position-y: -60px;
    }
    .bg-case-15 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_family.jpg");
        background-size: cover;
    }
    .bg-case-16 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_polygraphic.jpg");
        background-size: 100%;
    }
    .bg-case-17 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_river.jpg");
    }
    .bg-case-18 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_cake.png");
        background-size: cover;
    }
    .bg-case-19 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_beach.jpg");
        background-size: cover;   
    }
    .bg-case-20 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_legal.jpg");
        background-size: 100% 105%;
    }
    .bg-case-21 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_shed.jpg");        
        background-size: 100% 110%;
    }
    .bg-case-22 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_bricks.jpg");        
        background-size: 100% 110%;
    }
    .bg-case-23 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_balloons.jpg");
        background-size: 100% 110%;
    }

    .case-bottom {
        background-color: #999;
        height: 68px;
        margin-left: 0px;
        width: 693px;
        -webkit-clip-path: polygon(0% 122%, 14% 0%, 100% 0%, 89% 100%, 14% 100%, 0% 100%);
        -clip-path: polygon(0% 122%, 14% 0%, 100% 0%, 89% 100%, 14% 100%, 0% 100%);
        -webkit-clip-path: url("#clip-svg-path-bottom");
        clip-path: url("#clip-svg-path-bottom");
        opacity: 0;
    }
    .spine {
        position: absolute;
        background-color: #eee;
        width: 1px;
        height: 326px;
        left: 95px;
        z-index: 1;
    }

    .content-container {
        position: relative;
        z-index: 0;
        height: 100%;
    }

    .case-title {
        font-family: "absarasans-boldregular", myriad-pro, "Myriad Pro", sans-serif;
        font-size: 36px;
        line-height: 44px;
        z-index: 1;
        color: white;
        position: relative;
        top: 30px;
        left: 120px;
        margin: 0;
        float: left;
        max-width: 80%;
        pointer-events: none;
    }
    .case-author {
        font-family: "absarasans-regularregular", myriad-pro, "Myriad Pro", sans-serif;
        font-size: 20px;
        line-height: 28px;
        z-index: 1;
        color: white;
        position: absolute;
        left: 120px;
        bottom: 100px;
        margin: 0;
        float: left;
        max-width: 70%;
        pointer-events: none;
    }

    .case-description {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_bottom.png");
        background-repeat: no-repeat;
        height: 342px;
        margin-top: 300px;
        line-height: 1.6;
    }
    .case-description .case-title {
        font-family: "absarasans-regularregular", myriad-pro, "Myriad Pro", sans-serif;
        font-size: 16px;
        line-height: 24px;
        top: 64px;
    }

    .bracket-container {
        position: absolute;
        width: 60px;
        left: 300px;
        margin-top: -57px;
        overflow:hidden;
    }
    .bracket {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_bracket_tall.png");
        background-repeat: no-repeat;
        height: 920px;
        width: 100px;
    }
    #white {
      background: url("<?php echo get_template_directory_uri(); ?>/img/case_back.png") repeat-y 0 0;
      height: 1500px;
  }
  #primary {
    margin-left: 18px;
    margin-top: 130px;
    }

</style>



<div id="primary">

    <?php ethnographiccase_index_header(); ?>

    <div class="cases-container">

    <?php global $query_string; // required
        query_posts($query_string.'&post_status=publish&order=DESC&posts_per_page=-1'); 
        $n = $wp_query->post_count + 1; //count down 
    ?>

    <?php while ( have_posts() ) : the_post(); ?>
    <?php $n--; ?>

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
    
            <div class="case container-case-<?php echo $n ?>">
                <div class="content-container">
                    <div class="case-title"><?php echo $thetitle; ?></div>
                    <div class="case-author">by <?php coauthors() ?></div>
                    <div class="bg-case-<?php echo $n?>">
                        <div class="spine"></div>
                    </div>
                </div>
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
            To pay homage to the traditional ethnographic monograph, the pieces will be collected in an expanding bookCASE. The virtual format of this bookCASE makes evident that changes are underway in the practice of ethnography. Clicking the cases may link to straight-forward text, but you may also find yourself amidst audio or video files, photographs, artwork, and more.
        </p>
    </div>
</div> <!-- /cases-container -->




<!-- SVG clip paths -->
<svg height=0 width=0>
  <defs>
    <clipPath id="clip-svg-path2" clipPathUnits="objectBoundingBox">
      <polygon points="0 0.21, 0.14 0, 1 0, 1 0.78, 0.14 0.78, 0 .99" />
    </clipPath>
    <clipPath id="clip-svg-path3" clipPathUnits="objectBoundingBox">
      <polygon points="0 0.21, 0.14 0, 1 0, 1 0.78, 0.14 0.78, 0 .99" />
    </clipPath>
    <clipPath id="clip-svg-path4" clipPathUnits="objectBoundingBox">
      <polygon points="0 0.21, 0.14 0, 1 0, 1 0.78, 0.14 0.78, 0 .99" />
    </clipPath>
    <clipPath id="clip-svg-path4" clipPathUnits="objectBoundingBox">
      <polygon points="0 0.21, 0.14 0, 1 0, 1 0.78, 0.14 0.78, 0 .99" />
    </clipPath>
    <clipPath id="clip-svg-path-bottom" clipPathUnits="objectBoundingBox">
      <polygon points="0 1.22, 0.14 0, 1 0, .89 1, 0.14 1, 0 1" />
    </clipPath>

    (0% 122%, 14% 0%, 100% 0%, 89% 100%, 14% 100%, 0% 100%);
  </defs>   
</svg> 


    <div id="content"> <!-- NOTE: This gives the content bg -->

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

<?php get_sidebar('ethnographiccase'); ?>
<?php get_footer(); ?>
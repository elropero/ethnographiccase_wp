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
    .case-1 {
        height: 413px;
        margin-bottom: -89px;
        /*margin-top: -10px;*/
    }
    .case-2 {
        height: 365px;
        margin-bottom: -78px;
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
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_books.jpg");
        -webkit-clip-path: url("#clip-svg-path1");
        clip-path: url("#clip-svg-path1");
        -webkit-clip-path: polygon(0% 23%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 100%);
        clip-path: polygon(0% 23%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 100%);
    }
    .bg-case-2 {
        background-image: url("<?php echo get_template_directory_uri(); ?>/img/case_mud.jpg");
        
        -webkit-clip-path: polygon(5% 16%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 5% 96%);
        /*
        -webkit-clip-path: url("#clip-svg-path2");
        clip-path: url("#clip-svg-path2");
        -webkit-clip-path: polygon(0% 23%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 100%);
        clip-path: polygon(0% 23%, 14% 0%, 100% 0%, 100% 78%, 14% 78%, 0% 100%);
        */
    }


    .case-bottom {
        background-color: #999;
        height: 66px;
        margin-left: 35px;
        width: 657px;

        -webkit-clip-path: polygon(15% -58%, 0% 0%, 100% 0%, 88% 100%, 0% 100%, 0% 98%);
/*
        -webkit-clip-path: url("#clip-svg-path-bottom");
        clip-path: url("#clip-svg-path-bottom");
        -clip-path: polygon(15% -13%, 0% 0%, 100% 0%, 88% 100%, 0% 100%, 0% 98%);
        */
    }
    .spine {
        position: absolute;
        background-color: #eee;
        width: 1px;
        height: 326px;
        left: 94px;
        z-index: 1;
    }
    .case-title {
        font-family: "absarasans-boldregular", myriad-pro, "Myriad Pro", sans-serif;
        font-size: 36px;
        line-height: 44px;
        z-index: 1;
        color: white;
        position: relative;
        top: 40px;
        left: 120px;
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
    
            <div class="case case-<?php echo $n ?>">
                <div class="case-title"><?php echo $thetitle; ?></div>

                <div class="bg-case-<?php echo $n?>">
                    <div class="spine"></div>
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
    <clipPath id="clip-svg-path1" clipPathUnits="objectBoundingBox">
      <polygon points="0 0.23, 0.14 0, 1 0, 1 0.78, 0.14 0.78, 0 1" />
  </clipPath>
  <clipPath id="clip-svg-path-bottom" clipPathUnits="objectBoundingBox">
      <polygon points="0.15 -0.13 0 0, 1 0, 0.88 1, 0 1, 0 0.98" />
  </clipPath>
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
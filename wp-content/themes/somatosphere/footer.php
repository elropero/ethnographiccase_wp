<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>

	</div><!-- #main  -->
	<footer id="colophon" role="contentinfo">
			<div id="designedby">
				<h1 id="site-titleftr"><a href="#white">Somatosphere</a></h1>
				<a href="http://maartenottens.com"><span class="mmott"></span>design by Maarten Ottens</a>
				<!-- small>&copy Copyright <?php echo date('Y') . " " . esc_attr( get_bloginfo( 'name', 'display' ) ); ?> <a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'themename' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s.', 'themename' ), 'WordPress' ); ?></a></small -->
				<?php // wp_nav_menu( array( 'theme_location' => 'footer' ) ); 
				?>
			</div>
	</footer><!-- #colophon -->
</div><!-- #page -->
<div class="clearfix"></div>
</div></div></div>
<!-- Grab Google CDN's jQuery. Fall back to local if necessary -->

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script>!window.jQuery && document.write(unescape('%3Cscript src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.9.0.min.js"%3E%3C/script%3E'))</script>
<?php if (is_tax('spheres','commonplaces')) { ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/MetroJs.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/MetroJs.css" type="text/css" />
<script type="text/javascript">
    $(document).ready(function () {
        $(".live-tile,.flip-list").liveTile({
        	playOnHover:true,
        	repeatCount: 0,
        	delay: 0,
        	startNow:false 
        });
    });
</script>
<?php } ?>
<script type="text/javascript">
		/* <![CDATA[ */
		$(document).ready(function(){
			// 'static' variables
			
		//	var wht = $(window).height(); // window height
			var sht = $('#access').height(); // access navigation height
			var secht = $('#secondary').height(); // access navigation height
			var hht = $('#branding').height() - sht +20; // header height
		//	var snht = $('#mw-panel').height(); // navigation height
		//	var hht = 275; // header height - 5px
		//	var fht = 265; // footer height
		//	var cht = $('#content').height(); // body height
		//	$('#toc').addClass('mid');
		//	$('#mw-panel').addClass('mid2');
	//		$('h1.symposium-title').append(cht);
	/*			if (snht > cht) {
					$('#content').height(snht);
					cnt = snht;
				}
			
	*/
			$(window).scroll(function () {
			// dynamic variables
			
				st = $(window).scrollTop(); // distance scrolled up
				
				if (st > hht) { // if the navigation is smaller than the window
					bpy = st - 10;
					$('#access').addClass('fixed');
					$('#secondary').css('margin-top',sht);
					$('#backimg').css('background-position','-989px -'+bpy+'px');
	//					$('#toc').css({'position':'absolute','bottom':'20px'});
				} else {
					$('#access').removeClass('fixed');
					$('#secondary').css('margin-top','0');
				}
				if (st > (hht+secht+34)) {
					toph = sht;
					$('#designedby').css('position','fixed');
					$('#designedby').css('top',sht);
				} else {
					$('#designedby').css('position','relative');
					$('#designedby').css('top',0);
				}
			});
/*		if (wht > snht) { // if the navigation is smaller than the window
			if (st > hht) { // if scrolled up more than header
//	$('h1.symposium-title').append(wht);
			//	$('#toc').css({'position':'fixed','top':'20px','bottom':''});
				if ((cht - st - 140) < snht) { // body height - scroll top - footer height < navigation
				//	$('h1.symposium-title').append(wht);
				//	$('h1.symposium-title').append(cht + hht - st);
					$('#mw-panel').addClass('bottom2').removeClass('top').removeClass('mid2');
//					$('#toc').css({'position':'absolute','bottom':'20px'});
				} else {
					$('#mw-panel').addClass('top').removeClass('bottom2').removeClass('mid2');
				}
			} else {
				$('#mw-panel').addClass('mid2').removeClass('bottom2').removeClass('top');
//				$('#toc').css({'position':'absolute','top':'-40px'});
			}
		}
			
			
			*/
  // autoNumeric also requires brackets to be escaped
			$('.single .comments-link a, footer #site-title a').bind('click',function(event){
				event.preventDefault();
			//	var $anchor = jq($(this).attr('href'));
				var url = $(this).attr('href'), idx = url.indexOf("#")
				var $anchor = idx != -1 ? url.substring(idx) : "";
			//	$('h1.entry-title').append($anchor);
		//		$('.tocsection-2').empty().append($anchor);
				/*	$('html, body').stop().animate({
						scrollTop: $($anchor.attr('href')).offset().top
					}, 1500,'easeInOutExpo');
					if you don't want to use the easing effects: */
				$('html, body').stop().animate({
					scrollTop: $($anchor).offset().top - 10
				//	scrollTop: $('#CESUN_2012\\:_Interactive_and_Dynamic').offset().top
				}, 1000);
			
			}); 
			
			
		//	$('#mw-panel').css('position','absolute');
		});
		/* ]]> */
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33394465-1']);
  _gaq.push(['_trackPageview']);

<?php if ( 
	(pa_in_taxonomy('spheres', 'transcriptions') && is_single() )
	||
	(is_tax_sub_archive('transcriptions'))
	
	) { ?>
  // Second tracker 
  _gaq.push(['secondTracker._setAccount','UA-33394465-2']); 
  _gaq.push(['secondTracker._trackPageview']);

<?php } ?>
  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
<!--
<?php
if (is_category()) {
	echo $_SERVER['REQUEST_URI'];
}
?>
-->
<?php wp_footer(); ?>
<!--<script src="<?php bloginfo('url'); ?>/wp-content/plugins/jetpack/modules/sharedaddy/sharing.js"></script>-->

<?php 
// Masonry
if ( ! function_exists( 'slug_masonry_init' )) :
function slug_masonry_init() { ?>
<script>
    //set the container that Masonry will be inside of in a var
    var container = document.querySelector('#masonry-loop');
    //create empty var msnry
    var msnry;
    // initialize Masonry after all images have loaded
    imagesLoaded( container, function() {
        msnry = new Masonry( container, {
            itemSelector: '.masonry-entry'
        });
    });
</script>
<?php }
//add to wp_footer
add_action( 'wp_footer', 'slug_masonry_init' );
endif; // ! slug_masonry_init exists
// End Masonry
?>


</body>
</html>
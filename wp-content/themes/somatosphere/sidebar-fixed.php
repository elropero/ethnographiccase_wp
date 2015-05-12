<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>
		<div id="sidebar" class="widget-area">
			<?php if ( ! dynamic_sidebar( 'Fixed' ) ) : ?>

				<aside id="search" class="widget widget_search" role="complementary">
					<?php get_search_form(); ?>
				</aside>

				<aside id="archives" class="widget" role="complementary">
					<h2 class="widget-title"><?php _e( 'Archives', 'themename' ); ?></h2>
					<ul>
						<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
					</ul>
				</aside>

				<aside id="meta" class="widget" role="complementary">
					<h2 class="widget-title"><?php _e( 'Meta', 'themename' ); ?></h2>
					<ul>
						<?php wp_register(); ?>
						<aside role="complementary"><?php wp_loginout(); ?></aside>
						<?php wp_meta(); ?>
					</ul>
				</aside>

			<?php endif; // end sidebar widget area ?>
		</div><!-- #secondary .widget-area -->
		<ul id="followsomatosphere" class="follownosotros">
			<li class="followus">Follow us:</li>
			<li class="rss icon"><a href="http://feeds.feedburner.com/Somatosphere"><span class="icon"></span>rss</a><span class="followup">Follow us via our rss feed</span></li>
			<li class="email icon"><a href="http://feedburner.google.com/fb/a/mailverify?uri=Somatosphere"><span class="icon"></span>email list</a><span class="followup">Sign up for our email list</span></li>
			<li class="twitter icon"><a href="http://twitter.com/somatosphere"><span class="icon"></span>twitter</a><span class="followup">Follow us on Twitter</span></li>
			<li class="facebook icon"><a href="https://www.facebook.com/Somatosphere"><span class="icon"></span>facebook</a><span class="followup">Follow us on Facebook</span></li>
		</ul>
		<ul id="followtranscriptions" class="follownosotros">
			<li class="followus">Follow us:</li>
			<li class="rss icon"><a href="http://feeds.feedburner.com/transcriptionsforum "><span class="icon"></span>rss</a><span class="followup">Follow us via our rss feed</span></li>
			<li class="email icon"><a href="http://feedburner.google.com/fb/a/mailverify?uri=transcriptionsforum"><span class="icon"></span>email list</a><span class="followup">Sign up for our email list</span></li>
			<li class="twitter icon"><a href="https://twitter.com/Transcriptions2"><span class="icon"></span>twitter</a><span class="followup">Follow us on Twitter</span></li>
			<li class="facebook icon"><a href="http://apps.facebook.com/blognetworks/blog/transcriptions/"><span class="icon"></span>facebook</a><span class="followup">Follow us via Facebook</span></li>
		</ul>
<ul id="followcommonplaces" class="follownosotros">
			<li class="followus">Follow us:</li>
			<li class="rss icon"><a href="http://feeds.feedburner.com/Somatosphere"><span class="icon"></span>rss</a><span class="followup">Follow us via our rss feed</span></li>
			<li class="email icon"><a href="http://feedburner.google.com/fb/a/mailverify?uri=Somatosphere"><span class="icon"></span>email list</a><span class="followup">Sign up for our email list</span></li>
			<li class="twitter icon"><a href="http://twitter.com/somatosphere"><span class="icon"></span>twitter</a><span class="followup">Follow us on Twitter</span></li>
			<li class="facebook icon"><a href="https://www.facebook.com/Somatosphere"><span class="icon"></span>facebook</a><span class="followup">Follow us on Facebook</span></li>
		</ul>
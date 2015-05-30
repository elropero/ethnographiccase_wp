<?php
/**
 * @package WordPress
 * @subpackage themename
 */
?>
		<div id="secondary" class="widget-area">
			
			<?php if ( ! dynamic_sidebar( 'ethnographiccase' ) ) : ?>

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
			<aside id="license">License: <a rel="license" href="http://creativecommons.org/licenses/by-nc-sa/3.0/"><img alt="This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License" title="This work is licensed under a Creative Commons Attribution-NonCommercial-ShareAlike 3.0 Unported License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-sa/3.0/80x15.png" /></a></aside>
			<aside id="loginout"><?php wp_loginout(); ?><?php wp_register(' / ', ''); ?></aside>

		</div><!-- #secondary .widget-area -->
<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
		<div id="primary">
			<div id="content">
<h1>here there hi hello</h1>

				<?php get_template_part( 'loop', 'index' ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
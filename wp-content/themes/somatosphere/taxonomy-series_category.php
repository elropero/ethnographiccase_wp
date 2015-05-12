<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>
		<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); ?>
		<section id="primary" role="region">
			<div id="content">

				<?php the_post(); ?>
				<?php if ($term->parent == 477) { $thesphere = 'transcriptions'; transcription_header(); } else { $thesphere = ''; } ?>

				<header class="page-header">
					<h1 class="page-title">
						Series: <?php echo $term->name; ?>
					</h1>
				</header>

				<?php rewind_posts(); ?>

				<?php get_template_part( 'loop', 'archive' ); ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar($thesphere); ?>
<?php get_footer(); ?>
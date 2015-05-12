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

					<?php transcription_header(); ?>
				
				<?php rewind_posts(); ?>

				<header class="page-header">
					<h1 class="page-title"><?php
						$catid = get_query_var('cat');
						$title = single_cat_title( '', false );
						$titles = array(
							'Books' => 'On the Shelves',
							'Announcements' => 'Announcements',
							'In the Journals' => 'In the Journals',
							'Lectures' => 'Dialogues',
							'Features' => 'Emerging Issues',
							'Teaching Resources' => 'Learning',
							'Web Roundups' => 'Broadsheets'
							
						);
						printf( __( 'Category Archives: %s', 'themename' ), '<span>' . $titles[$title] . '</span><span class="caticon cat-' . $catid . '"></span>' ); ?></h1>

					<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
				</header>

				<?php get_template_part( 'loop', 'archive' ); ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php // get a specific sphere specific sidebar ?>
<?php get_sidebar('transcriptions'); ?>
<?php get_footer(); ?>
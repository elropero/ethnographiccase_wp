<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>

		<section id="primary" role="region">
			<div id="content">

				<header class="page-header">
					<h1 class="page-title"><?php
						$catid = get_query_var('cat');
						printf( __( 'Category Archives: %s', 'themename' ), '<span>' . single_cat_title( '', false ) . '</span><span class="caticon cat-' . $catid . '"></span>' );
					?></h1>

					<?php $categorydesc = category_description(); if ( ! empty( $categorydesc ) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
				</header>

				<?php get_template_part( 'loop', 'category' ); ?>

			</div><!-- #content -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
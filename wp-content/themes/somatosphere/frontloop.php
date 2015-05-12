<?php /* Start the Loop */ ?>
<?php while ( $catquery->have_posts() ) : 
$catquery->the_post(); $pid = get_the_ID(); 
$my_count++;
if(( $my_count % 2 ) == 0) { } else { 
?>
	<article id="post-<?php echo $pid ?>" <?php post_class(); ?> role="article">
		<header class="entry-header">
			<span class="cats">
			<?php 
			foreach((get_the_category()) as $category) { 
			    echo '<a href="' . get_category_link($category->cat_ID) . '" title="' . $category->cat_name . '" class="caticon cat-' . $category->cat_ID . '">' . $category->cat_name . '</a>'; 
			} 
			?>
			</span>
			<div class="publishdate">
				<?php
					printf( __( '<a href="%1$s" rel="bookmark"><time class="entry-date" datetime="%2$s">%3$s</time></a>', 'themename' ),
						get_permalink(),
						get_the_date( 'c' ),
						get_the_date()
					);
				?>
			</div><!-- .entry-meta -->
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'themename' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<div class="the-author">
				By 
				<?php if(function_exists('coauthors_posts_links'))
				    coauthors_posts_links();
				else
				    the_author_posts_link(); ?>
			</div><!-- .entry-meta -->
			<?php if(get_the_terms( $post->ID, 'series_category')) { ?>
			<div class="series">
				<?php the_terms( $post->ID, 'series_category', 'This article is part of the series: ', ', ', ' ' ); ?>
			</div>
			<?php } ?>
			
		</header><!-- .entry-header -->

		<?php if ( is_feed() ) : // Only display Excerpts for archives & search ?>
		<div class="entry-summary">
			<?php the_content(); ?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_excerpt(); ?>
			<?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'themename' ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<span class="readmore"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">Read More</a></span>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'themename' ), __( '1 Comment', 'themename' ), __( '% Comments', 'themename' ) ); ?></span>
			<?php
				$tag_list = get_the_tag_list( '', ', ' );
				if ( '' != $tag_list ) {
					$utility_text = __( '<span class="tags"><span class="tagged"></span><span class="taggy">%1$s</span></span>', 'themename' );
				} else {
					$utility_text = __( '', 'themename' );
				}
				printf(
					$utility_text,
					$tag_list
				);
			?>
			
			<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
	</article><!-- #post-<?php the_ID(); ?> -->

	<?php comments_template( '', true ); 
	} ?>

<?php endwhile; ?>
<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php wp_reset_query(); ?>
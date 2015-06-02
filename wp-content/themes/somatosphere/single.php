<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>

		<div id="primary">
			<div id="content">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				<?php if (has_term('transcriptions','spheres') ) 
					{ $thesphere = 'transcriptions'; transcription_header(); } else if (has_term('commonplaces','spheres') ) 
					{ $thesphere = 'commonplaces'; commonplaces_header(); } else if (has_term('ethnographiccase','spheres') ) 
					{ $thesphere = 'ethnographiccase'; ethnographiccase_header(); } else 
					{ $thesphere = ''; echo $thesphere; } ?>
				
				<nav id="nav-above"  role="navigation">
					<h1 class="section-heading"><?php _e( 'Post navigation', 'themename' ); ?></h1>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themename' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themename' ) . '</span>' ); ?></div>
				</nav><!-- #nav-above -->

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">						
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
						</div>
						<?php if(get_the_terms( $post->ID, 'series_category')) { ?>
						<div class="series">
							<?php the_terms( $post->ID, 'series_category', 'This article is part of the series: ', ', ', ' ' ); ?>
						</div>
						<?php } ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php 
						if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it. ?>
						<div class="centeralign">
						<?php the_post_thumbnail('full'); ?>
						</div>
						<?php } ?><?php the_content(); ?>
						<?php echo outputCitations(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
					</div><!-- .entry-content -->
					<div id=""></div>
					<footer class="entry-meta">
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
				
				<?php // sim_by_mix(); ?>
				
				<nav id="nav-below" role="navigation">
					<h1 class="section-heading"><?php _e( 'Post navigation', 'themename' ); ?></h1>
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'themename' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'themename' ) . '</span>' ); ?></div>
				</nav><!-- #nav-below -->

				<?php comments_template( '', true ); ?>

			<div id="leftfunctions">
				<ul>
				<?php // $shortenedurl = file_get_contents('http://tinyurl.com/api-create.php?url=' . urlencode(get_permalink())); ?>
				<?php /* $shortenedurl = get_permalink(); ?>
					<li class="tweet"><!-- a href="http://www.twitter.com/home?status=<?php echo str_replace(' ', '+', the_title_attribute('echo=0')); echo '+' . $shortenedurl; ?>" title="Share <?php the_title_attribute(); ?> on Twitter" =-->
					<a href="#" onClick="MyWindow=window.open('http://www.twitter.com/home?status=<?php echo str_replace(' ', '+', the_title_attribute('echo=0')); echo '+' . $shortenedurl; ?>','MyWindow','toolbar=no,location=yes,directories=no,status=no,menubar=yes,scrollbars=no,resizable=yes,width=600,height=300'); return false;" title="Share <?php the_title_attribute(); ?> on Twitter"><span class="icon"></span>tweet this</a><span class="takeaction">Tweet this Article</span></li>
					<li class="mail"><a href="mailto:type%20email%20address%20here?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20<?php bloginfo('name'); ?>&body=<?php the_title('','',true); ?>%2D%20%20%28%20<?php the_permalink(); ?>%20%29" title="Email to a friend/colleague" target="_blank"><span class="icon"></span>email this</a><span class="takeaction">Email this Article</span></li>
					*/ ?>
					<li class="print"><a href="javascript:window.print()"><span class="icon"></span>print this</a><span class="takeaction">Print this Article</span></li>
					<li class="pdf"><a class="wptopdf" target="_blank" href="<?php the_permalink(); ?>?format=pdf" title="Download this Article as PDF"><span class="icon"></span>download as pdf</a><span class="takeaction">Download this Article as PDF</span></li>
				</ul>
			</div>
			<?php endwhile; // end of the loop. ?>
			</div><!-- #content -->
		</div><!-- #primary -->
	<?php get_sidebar($thesphere); ?>
<?php get_footer(); ?>
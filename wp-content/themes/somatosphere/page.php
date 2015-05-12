<?php
/**
 * @package WordPress
 * @subpackage themename
 */

get_header(); ?>

		<div id="primary">
			<div id="content">

				<?php the_post(); ?>
				<?php if (has_term('transcriptions','spheres') ) { $thesphere = 'transcriptions'; transcription_header(); } else { $thesphere = ''; echo $thesphere; } ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> role="article">
					<header class="entry-header">
						<h1 class="entry-title"><?php the_title(); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'themename' ), 'after' => '</div>' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'themename' ), '<span class="edit-link">', '</span>' ); ?>
						<?php if (is_page(1301)) { ?>
						<ul class="subnav">
						  <?php wp_list_pages('title_li=&child_of='.$post->ID); ?>
						</ul>
						<?php } ?>
						<?php if (is_page(1554)) { ?>
						<ul class="guests">
							<?php
							
							// Get the authors from the database ordered by user nicename
								global $wpdb;
								$query = "SELECT user_id, meta_value FROM $wpdb->usermeta WHERE meta_key = 'last_name' ORDER BY meta_value";
								$author_ids = $wpdb->get_results($query);
						//	print_r($author_ids);
							// Loop through each author
								foreach($author_ids as $author) {
								// Get user data
									$curauth = get_userdata($author->user_id);
								// If user level is above 0 or login name is "admin", display profile
									if($curauth->user_level < 2 ) { ?>
							<li>
								<strong><a href="<?php echo get_author_posts_url($curauth->ID); ?>"><?php echo $curauth->first_name . " " . $curauth->last_name; ?></a></strong>
								<?php if ($curauth->user_description) { ?>, <?php echo($curauth->user_description); } ?>
							</li>
							<?php	}
								}
							?>
						</ul>
						<?php } ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->

				<?php // comments_template( '', true ); ?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar($thesphere); ?>
<?php get_footer(); ?>
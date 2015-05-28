<?php
/**
 * @package WordPress
 * @subpackage themename
 */

/**
 * Make theme available for translation
 * Translations can be filed in the /languages/ directory
 */
load_theme_textdomain( 'themename', TEMPLATEPATH . '/languages' );

$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable( $locale_file ) )
	require_once( $locale_file );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * Remove code from the <head>
 */
//remove_action('wp_head', 'rsd_link'); // Might be necessary if you or other people on this site use remote editors.
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
//remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
//remove_action('wp_head', 'index_rel_link'); // Displays relations link for site index
//remove_action('wp_head', 'wlwmanifest_link'); // Might be necessary if you or other people on this site use Windows Live Writer.
//remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
//remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
//remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_filter( 'the_content', 'capital_P_dangit' ); // Get outta my Wordpress codez dangit!
remove_filter( 'the_title', 'capital_P_dangit' );
remove_filter( 'comment_text', 'capital_P_dangit' );
// Hide the version of WordPress you're running from source and RSS feed // Want to JUST remove it from the source? Try: remove_action('wp_head', 'wp_generator');
/*function hcwp_remove_version() {return '';}
add_filter('the_generator', 'hcwp_remove_version');*/
// This function removes the comment inline css
/*function twentyten_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'twentyten_remove_recent_comments_style' );*/

/**
 * Remove meta boxes from Post and Page Screens
 */
function customize_meta_boxes() {
   /* These remove meta boxes from POSTS */
  //remove_post_type_support("post","excerpt"); //Remove Excerpt Support
  //remove_post_type_support("post","author"); //Remove Author Support
  //remove_post_type_support("post","revisions"); //Remove Revision Support
  //remove_post_type_support("post","comments"); //Remove Comments Support
  //remove_post_type_support("post","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("post","editor"); //Remove Editor Support
  //remove_post_type_support("post","custom-fields"); //Remove custom-fields Support
  //remove_post_type_support("post","title"); //Remove Title Support

  
  /* These remove meta boxes from PAGES */
  //remove_post_type_support("page","revisions"); //Remove Revision Support
  //remove_post_type_support("page","comments"); //Remove Comments Support
  //remove_post_type_support("page","author"); //Remove Author Support
  //remove_post_type_support("page","trackbacks"); //Remove trackbacks Support
  //remove_post_type_support("page","custom-fields"); //Remove custom-fields Support
  
}
add_action('admin_init','customize_meta_boxes');

/**
 * This theme uses wp_nav_menus() for the header menu, utility menu and footer menu.
 */
register_nav_menus( array(
	'primary' => __( 'Primary Menu', 'themename' ),
	'footer' => __( 'Footer Menu', 'themename' ),
	'utility' => __( 'Utility Menu', 'themename' ),
	'transcriptionsmenu' => __( 'Transcriptions Menu', 'themename' ),
	'transcriptionscats' => __( 'Transcriptions Categories', 'themename' ),
	'transcriptionsseries' => __( 'Transcriptions Series', 'themename' ),
	'commonplacesmenu' => __( 'Commonplaces Menu', 'themename' ),
	'commonplacescats' => __( 'Commonplaces Categories', 'themename' ),
	'commonplacesseries' => __( 'Commonplaces Series', 'themename' ),
	'ethnographiccasemenu' => __( 'The Ethnographic Case Menu', 'themename' ),
	'ethnographiccasecats' => __( 'The Ethnographic Case Categories', 'themename' ),
	'ethnographiccaseseries' => __( 'The Ethnographic Case Series', 'themename' )
) );

/** 
 * Add default posts and comments RSS feed links to head
 */
add_theme_support( 'automatic-feed-links' );

/**
 * This theme uses post thumbnails
 */
add_theme_support( 'post-thumbnails' );

/**
 *	This theme supports editor styles
 */

add_editor_style("/css/layout-style.css");

/**
 * Disable the admin bar in 3.1
 */
//show_admin_bar( false );

/**
 * This enables post formats. If you use this, make sure to delete any that you aren't going to use.
 */
//add_theme_support( 'post-formats', array( 'aside', 'audio', 'image', 'video', 'gallery', 'chat', 'link', 'quote', 'status' ) );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function handcraftedwp_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Fixed', 'themename' ),
		'id' => 'fixed',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array (
		'name' => __( 'Sidebar', 'themename' ),
		'id' => 'sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array (
		'name' => __( 'Transcriptions', 'themename' ),
		'id' => 'transcriptions',
		'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array (
		'name' => __( 'Commonplaces', 'themename' ),
		'id' => 'commonplaces',
		'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array (
		'name' => __( 'The Ethnographic Case', 'themename' ),
		'id' => 'ethnographiccase',
		'before_widget' => '<aside id="%1$s" class="widget %2$s" role="complementary">',
		'after_widget' => "</aside>",
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
}
add_action( 'init', 'handcraftedwp_widgets_init' );

/*
 * Remove senseless dashboard widgets for non-admins. (Un)Comment or delete as you wish.
 */
function remove_dashboard_widgets() {
	global $wp_meta_boxes;

	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']); // Plugins widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']); // WordPress Blog widget
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']); // Other WordPress News widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']); // Right Now widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']); // Quick Press widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']); // Incoming Links widget
	//unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']); // Recent Drafts widget
	//unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']); // Recent Comments widget
}

/**
 *	Hide Menu Items
 */
function themename_configure_menu_page(){
	
	//remove_menu_page("link-manager.php"); //Hide Links
	//remove_menu_page("edit-comments.php"); //Hide Comments
	//remove_menu_page("tools.php"); //Hide Tools

}

if (!current_user_can('manage_options')) {
	add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );
	add_action("admin_menu","themename_configure_menu_page"); //While we're add it, let's configure the menu options as well
} 




?>
<?php 

function improved_trim_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text, '<p><img>');
                $excerpt_length = 60;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, '[...]');
                        $text = implode(' ', $words);
                }
        }
        return $text;
}
// remove_filter('get_the_excerpt', 'wp_trim_excerpt');
// add_filter('get_the_excerpt', 'improved_trim_excerpt');

// asynchronous google analytics: mathiasbynens.be/notes/async-analytics-snippet
//	 change the UA-XXXXX-X to be your site's ID
/* add_action('wp_footer', 'async_google_analytics');
function async_google_analytics() { ?>
	<script>
	var _gaq = [['_setAccount', 'UA-33394465-1'], ['_trackPageview']];
		(function(d, t) {
			var g = d.createElement(t),
				s = d.getElementsByTagName(t)[0];
			g.async = true;
			g.src = ('https:' == location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			s.parentNode.insertBefore(g, s);
		})(document, 'script');
	</script>
<?php } */

/* Conditional Tag to check if its a term or any of its children
*
* @param $terms - (string/array) list of term ids
*
* @param $taxonomy - (string) the taxonomy name of which the holds the terms. 
*/
function is_tax_sub_archive($term){
	$the_uri = $_SERVER['REQUEST_URI'];
	if (strpos($the_uri,$term)) {
            return true;
    }
    return false;
}

add_action( 'init', 'writer_init' );
function writer_init() {
/*	$writers = array(
	    'name' => _x( 'Writers', 'taxonomy general name' ),
	    'singular_name' => _x( 'Writer', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Search Writers' ),
	    'popular_items' => __( 'Popular Writers' ),
	    'all_items' => __( 'All Writers' ),
	    'parent_item' => null,
	    'parent_item_colon' => null,
	    'edit_item' => __( 'Edit Writer' ), 
	    'update_item' => __( 'Update Writer' ),
	    'add_new_item' => __( 'Add New Writer' ),
	    'new_item_name' => __( 'New Writer Name' ),
	    'separate_items_with_commas' => __( 'Separate Writers with commas' ),
	    'add_or_remove_items' => __( 'Add or remove Writers' ),
	    'choose_from_most_used' => __( 'Choose from the most used Writers' ),
	    'menu_name' => __( 'Writers' ),
	  );	// create a new taxonomy
	register_taxonomy(
		'writer',
		'page',
		array(
		    'hierarchical' => false,
			'labels' => $writers,
			'show_ui' => true,
			    'query_var' => true,
		//	'sort' => true,
		//	'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 'writer' )
		)
	); */
	$seriescat = array(
	    'name' => _x( 'Series', 'taxonomy general name' ),
	    'singular_name' => _x( 'Series', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Search Series' ),
	    'popular_items' => __( 'Popular Series' ),
	    'all_items' => __( 'All Series' ),
	    'parent_item' => null,
	    'parent_item_colon' => null,
	    'edit_item' => __( 'Edit Series' ), 
	    'update_item' => __( 'Update Series' ),
	    'add_new_item' => __( 'Add New Series' ),
	    'new_item_name' => __( 'New Series Name' ),
	    'menu_name' => __( 'Series' ),
	);	// create a new taxonomy
	register_taxonomy(
		'series_category',
		'post',
		array(
		    'hierarchical' => true,
			'labels' => $seriescat,
			'show_ui' => true,
			'query_var' => true,
		//	'sort' => true,
		//	'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 'series' )
		)
	);

	$sphere = array(
	    'name' => _x( 'Sphere', 'taxonomy general name' ),
	    'singular_name' => _x( 'Sphere', 'taxonomy singular name' ),
	    'search_items' =>  __( 'Spheres' ),
	    'popular_items' => __( 'Popular Spheres' ),
	    'all_items' => __( 'All Spheres' ),
	    'parent_item' => null,
	    'parent_item_colon' => null,
	    'edit_item' => __( 'Edit Spheres' ), 
	    'update_item' => __( 'Update Spheres' ),
	    'add_new_item' => __( 'Add New Sphere' ),
	    'new_item_name' => __( 'New Sphere Name' ),
	    'menu_name' => __( 'Spheres' ),
	);	// create a new taxonomy
	register_taxonomy(
		'spheres',
		array('post','page'),
		array(
		    'hierarchical' => true,
			'labels' => $sphere,
			'show_ui' => true,
			'query_var' => true,
		//	'sort' => true,
		//	'args' => array( 'orderby' => 'term_order' ),
			'rewrite' => array( 'slug' => 's' )
		)
);

}

//function tax_name_class($classes) {
//	global $post;
//	foreach((get_the_terms($post->ID, 'spheres')) as $term)
//		$classes[] = $term->name;
//	return $classes;
//}
//add_filter('post_class', 'category_id_class');
//add_filter('body_class', 'category_id_class');

//add_filter('body_class','my_class_names');
//function my_class_names($classes) {
//global $wp_query;
//$sphere = $wp_query->query_vars['spheres'];
// foreach($spheres as $sphere)
//		$classes[] = 'term-'.$sphere;
//	return $classes;	// add 'class-name' to the $classes array
//	$classes[] = 'class-name';
//	 return the $classes array
//	return $classes;
//}

add_action('admin_init', 'flush_rewrite_rules');
add_action('generate_rewrite_rules', 'sphere_rewrite_rules');

function sphere_rewrite_rules( $wp_rewrite )
{
	$new_rules = array(
		's/transcriptions/page/(.+)' => 'index.php?spheres=transcriptions&paged=' .$wp_rewrite->preg_index(1),
		's/(.+)/(.+)' => 'index.php?spheres=' . $wp_rewrite->preg_index(1) . '&category_name=' .$wp_rewrite->preg_index(2),
		'transcriptions/page/(.+)' => 'index.php?spheres=transcriptions&paged=' .$wp_rewrite->preg_index(1),
		'transcriptions/(.+)' => 'index.php?spheres=transcriptions&category_name=' .$wp_rewrite->preg_index(1),
		'transcriptions' => 'index.php?spheres=transcriptions',
		'c/commonplaces/page/(.+)' => 'index.php?spheres=commonplaces&paged=' .$wp_rewrite->preg_index(1),
		'c/(.+)/(.+)' => 'index.php?spheres=' . $wp_rewrite->preg_index(1) . '&category_name=' .$wp_rewrite->preg_index(2),
		'commonplaces/page/(.+)' => 'index.php?spheres=commonplaces&paged=' .$wp_rewrite->preg_index(1),
		'commonplaces/(.+)' => 'index.php?spheres=commonplaces&category_name=' .$wp_rewrite->preg_index(1),
		'commonplaces' => 'index.php?spheres=commonplaces',
		's/ethnographiccase/page/(.+)' => 'index.php?spheres=ethnographiccase&paged=' .$wp_rewrite->preg_index(1),
		//'s/(.+)/(.+)' => 'index.php?spheres=' . $wp_rewrite->preg_index(1) . '&category_name=' .$wp_rewrite->preg_index(2),
		'ethnographiccase/page/(.+)' => 'index.php?spheres=ethnographiccase&paged=' .$wp_rewrite->preg_index(1),
		'ethnographiccase/(.+)' => 'index.php?spheres=ethnographiccase&category_name=' .$wp_rewrite->preg_index(1),
		'ethnographiccase' => 'index.php?spheres=ethnographiccase'
	);
	$wp_rewrite->rules = $new_rules + $wp_rewrite->rules;
}

function get_custom_post_type_template($template) {
	global $wp_query;
	$cat_name = $wp_query->query_vars['category_name'];
	if ( !isset($wp_query->query_vars['spheres'] ) || ($cat_name =='') )
		return $template;
	$sphere = $wp_query->query_vars['spheres'];
	$template = dirname( __FILE__ ) . '/taxonomy-spheres-category.php';
//	add_filter('body_class', 'category_id_class');
	return $template;
}
add_filter( "taxonomy_template", "get_custom_post_type_template" ) ;


function term_id_class($classes) {
	global $post, $post_id, $wp_query;
	$terms = get_the_terms( $post->ID, 'spheres' );
	$term1 = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
//	print_r($terms);
	if ( (is_single() || is_page()) && $terms && ! is_wp_error( $terms ) ) {
		foreach($terms as $term) {
			$classes[] = 'sphere-'.$term->slug;
			$classes[] = 'sphere-'.$term->term_id;
	//		$classes[] = 'category-'.$term->category_parent;
//			print_r($classes);
		}
	} else if (is_tax('spheres','Transcriptions')) {
		$classes[] = 'sphere-transcriptions';
		$classes[] = 'sphere-test';
	} else if (is_tax('spheres','Commonplaces')) {
		$classes[] = 'sphere-commonplaces';
		$classes[] = 'sphere-test';
	}
    else if (is_tax('spheres','The Ethnographic Case')) {
		$classes[] = 'sphere-ethnographiccase';
		$classes[] = 'sphere-test';
	}
    else if ($term1->parent == 477) {
		$classes[] = 'sphere-transcriptions';
		$classes[] = 'sphere-test2';
	} else {
		$classes[] = 'sphere-'.$wp_query->query_vars['spheres'];
		
	}
	return $classes;
}
// add_filter('post_class', 'term_id_class');
 add_filter('body_class', 'term_id_class');

/**
* Conditional function to check if post belongs to term in a custom taxonomy.
*
* @param    tax        string                taxonomy to which the term belons
* @param    term    int|string|array    attributes of shortcode
* @param    _post    int                    post id to be checked
* @return             BOOL                True if term is matched, false otherwise
*/
function create_somatospherefeed() {
load_template( TEMPLATEPATH . '/feed/somatosphere-feed.php'); // You'll create a your-custom-feed.php file in your theme's directory
}
add_action('do_feed_somatospherefeed', 'create_somatospherefeed', 10, 1);

function create_transcriptionsfeed() {
load_template( TEMPLATEPATH . '/feed/transcriptions-feed.php'); // You'll create a your-custom-feed.php file in your theme's directory
}
add_action('do_feed_transcriptionsfeed', 'create_transcriptionsfeed', 10, 1);

function create_commonplacesfeed() {
load_template( TEMPLATEPATH . '/feed/commonplaces-feed.php'); // You'll create a your-custom-feed.php file in your theme's directory
}
add_action('do_feed_commonplacesfeed', 'create_commonplacesfeed', 10, 1);

function create_ethnographiccasefeed() {
load_template( TEMPLATEPATH . '/feed/ethnographiccase-feed.php'); // You'll create a your-custom-feed.php file in your theme's directory
}
add_action('do_feed_ethnographiccasefeed', 'create_ethnographiccasefeed', 10, 1);


function pa_in_taxonomy($tax, $term, $_post = NULL) {
	// if neither tax nor term are specified, return false
	if ( !$tax || !$term ) { return FALSE; }
	// if post parameter is given, get it, otherwise use $GLOBALS to get post
		if ( $_post ) {
		$_post = get_post( $_post );
	} else {
		$_post =& $GLOBALS['post'];
	}
	// if no post return false
	if ( !$_post ) { return FALSE; }
	// check whether post matches term belongin to tax
	$return = is_object_in_term( $_post->ID, $tax, $term );
	// if error returned, then return false
	if ( is_wp_error( $return ) ) { return FALSE; }
	return $return;
}

function transcription_header() {
?>
<header class="sphere-header">
	<div class="aboveline">
		<h1 class="sphere-title">
			<a href="http://somatosphere.net/transcriptions">Transcriptions</a>	
		</h1>
		<h2 class="sphere-subtitle">
			HIV, Science, and the Social
		</h2>
		<div class="sphere-back"></div>
	</div>
	<div class="belowline">
		<div class="sphere-tagline">A collaborative forum for critical enquiry on HIV/AIDS and global health: experiment, ethics, and practice</div>
		<?php // wp_nav_menu( array( 'theme_location' => 'virosphere' ) ); ?>
	</div>
</header>
<?php
}
function commonplaces_header() {
?>
<header class="sphere-header">
	<div class="aboveline">
		<h1 class="sphere-title">
			<a href="http://somatosphere.net/commonplaces">Commonplaces</a>	
		</h1>
		<h2 class="sphere-subtitle">
			<?php echo term_description(758,'spheres') ?>
		</h2>
		<div class="sphere-back"></div>
	</div>
<!--	<div class="belowline">
		<div class="sphere-tagline">Some Info</div>
		<?php // wp_nav_menu( array( 'theme_location' => 'virosphere' ) ); ?>
	</div>-->
</header>
<?php
}

function ethnographiccase_header() {
?>
<header class="sphere-header">	
	<a href="http://somatosphere.net/ethnographiccase"><img class="logo" src="<?php echo get_template_directory_uri(); ?>/img/logo.png"></a>
</header>
<?php
}

// Q: how to interecpt categories on sphere, perhaps make custom widget that add sphere in url before category and/or tag


// $template = dirname( __FILE__ ) . '/custom-'.$post_type.'.php';


 /*
 * A default custom post type. DELETE from here to the end if you don't want any custom post types
 */
/*add_action('init', 'create_boilertemplate_cpt');
function create_boilertemplate_cpt() 
{
  $labels = array(
    'name' => _x('HandcraftedWPTemplate CPT', 'post type general name'),
    'singular_name' => _x('HandcraftedWPTemplate CPT Item', 'post type singular name'),
    'add_new' => _x('Add New', 'handcraftedwptemplate_robot'),
    'add_new_item' => __('Add New Item'),
    'edit_item' => __('Edit Item'),
    'new_item' => __('New Item'),
    'view_item' => __('View Item'),
    'search_items' => __('Search Items'),
    'not_found' =>  __('No items found'),
    'not_found_in_trash' => __('No items found in Trash'), 
    'parent_item_colon' => ''
  );
  $args = array(
    'labels' => $labels,
    'public' => true,
    'show_ui' => true, 
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'page',
    'hierarchical' => false,
    'menu_position' => 20,
    'supports' => array('title','editor')
  ); 
  register_post_type('handcraftedwptemplate_robot',$args);
}*/
/*
 * This is for a custom icon with a colored hover state for your custom post types. You can download the custom icons here 
 http://randyjensenonline.com/thoughts/wordpress-custom-post-type-fugue-icons/
 */
/*add_action( 'admin_head', 'cpt_icons' );
function cpt_icons() {
    ?>
    <style type="text/css" media="screen">
        #menu-posts-handcraftedwptemplaterobot .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/robot.png) no-repeat 6px -17px !important;
        }
		#menu-posts-handcraftedwptemplaterobot:hover .wp-menu-image, #menu-posts-handcraftedwptemplaterobot.wp-has-current-submenu .wp-menu-image {
            background-position:6px 7px!important;
        }
    </style>
<?php }*/
function wp_titlerss($content) {
global $wp_query;
$content = $content." by ".get_the_author_meta('user_firstname')." ".get_the_author_meta('user_lastname');
return $content;
}

add_filter('the_title_rss', 'wp_titlerss');


add_action( 'wp_head', 'feedburner' );
function feedburner() { ?>
<link rel="alternate" type="application/rss+xml" title="Somatosphere &raquo; Feed" href="http://feeds.feedburner.com/Somatosphere" />
<?php }
add_action( 'wp_head', 'typekit' );
function typekit() { ?>
<script type="text/javascript" src="http://use.typekit.com/qxz3koa.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
<?php } ?>
<?php
class mmo_widget_popularTranscriptions extends WP_Widget {

	function mmo_widget_popularTranscriptions() {
		parent::WP_Widget(false, 'Popular Transcriptions');
	}

	function widget($args, $instance) {
		$args['title'] = $instance['title'];
		mmo_popularPosts($args);
	}

	function update($new_instance, $old_instance) {
		return $new_instance;
	}

	function form($instance) {
		$title = esc_attr($instance['title']);
?>
		<p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?> <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
<?php
	}

}
register_widget('mmo_widget_popularTranscriptions');
function mmo_popularPosts($args = array(), $displayComments = FALSE, $interval = '') {

	global $wpdb;

	$postCount = 5;

	$request = "SELECT *
		FROM $wpdb->posts
		LEFT JOIN $wpdb->term_relationships ON($wpdb->posts.ID =
		$wpdb->term_relationships.object_id)
		LEFT JOIN $wpdb->term_taxonomy
		ON($wpdb->term_relationships.term_taxonomy_id =
		$wpdb->term_taxonomy.term_taxonomy_id)
		LEFT JOIN $wpdb->terms ON($wpdb->term_taxonomy.term_id =
		$wpdb->terms.term_id)
		WHERE ";

	if ($interval != '') {
		$request .= 'post_date>DATE_SUB(NOW(), ' . $interval . ') ';
	}

	$request .= "post_status='publish'
			AND comment_count > 0
			AND $wpdb->term_taxonomy.taxonomy = 'spheres'
			AND $wpdb->terms.term_id = 469
		ORDER BY comment_count DESC LIMIT 0, " . $postCount;

	$posts = $wpdb->get_results($request);

	if (count($posts) >= 1) {

		if (!isset($args['title'])) {
			$args['title'] = 'Popular Posts';
		}

		foreach ($posts as $post) {
			wp_cache_add($post->ID, $post, 'posts');
			$popularPosts[] = array(
				'title' => stripslashes($post->post_title),
				'url' => get_permalink($post->ID),
				'comment_count' => $post->comment_count,
			);
		}

		echo $args['before_widget'] . $args['before_title'] . $args['title'] . $args['after_title'];
?>

		<ul>
<?php
		foreach ($popularPosts as $post) {
?>
			<li>
				<a href="<?php echo $post['url'];?>"><?php echo $post['title']; ?></a>
<?php
			if ($displayComments) {
?>
			(<?php echo $post['comment_count'] . ' ' . __('comments', mmo_THEMENAME); ?>)
<?php
			}
?>
			</li>
<?php
		}
?>
		</ul>

<?php
		echo $args['after_widget'];
	}
}
?>
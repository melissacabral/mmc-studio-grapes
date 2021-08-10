<?php
//activate sleeping features

// 				$name, $width, $height, $crop
add_image_size( 'wide-banner', 1200, 400, true );

add_theme_support('post-thumbnails');

add_theme_support('custom-background');

add_theme_support( 'automatic-feed-links' );

//custom header arguments
$args = array(
 	'width'     => 2500,
    'height'    => 600,
);
add_theme_support('custom-header', $args);

//custom logo
$args = array(
    'height'      => 150,
    'width'       => 150,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' ),
);
add_theme_support('custom-logo', $args);

add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script' ) );

//make seo-friendly <title>s for every screen
add_theme_support( 'title-tag' );

/**
 * Load all styles and scripts
 */
function mmc_scripts(){
	//style.css
	wp_enqueue_style('theme_style', get_stylesheet_uri());
	
	//improve comment replies (thiss script is built-in)
	if( is_singular() AND comments_open() AND get_option('thread_comments') ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mmc_scripts' );

/**
 * Filter Hook example - change the excerpt length
 */
function mmc_ex_length(){
	return 20; //words
}
add_filter( 'excerpt_length', 'mmc_ex_length' );

/**
 * Change [...] to read more button
 */
add_filter('excerpt_more', 'mmc_readmore');
function mmc_readmore($more){
	return '&hellip; <a href="' . get_permalink() . '" class="button readmore">Read More</a>';
}



/* example of using simply show hooks */
//add_action( 'loop_start', 'mmc_breadcrumb', 1 );
function mmc_breadcrumb(){
	if( ! is_front_page() ){
		echo '<b>these are not actually breadcrumbs</b>';
	}
}



/**
 * Activate any menu areas we need
 */
add_action('init', 'mmc_menu_areas');
function mmc_menu_areas(){
	register_nav_menus( array(
		'main_menu' => 'Main Navigation',
		'footer_menu' => 'Footer Menu',
	) );
}

/**
 * Display pagination on any template
 * detects mobile devices and shows simplified next/previous pagination
 */
function mmc_pagination(){
	echo '<div class="pagination">';
	if( is_singular() ){
		//singular next/prev post
		previous_post_link('%link', '&larr; Previously: %title');
		next_post_link('%link', 'Next: %title &rarr;');

	}elseif( wp_is_mobile() ){
		//archive next/prev
		previous_posts_link();
		next_posts_link();

	}else{
		//numbered pagination for desktop
		the_posts_pagination();
	}
	echo '</div>';
}


/**
 * Register any needed widget areas (dynamic sidebars)
 * 1. Register them here
 * 2. Display them in place (sidebar.php? footer? wherever?)
 * 3. Go to appearance > widgets and add blocks
 */
add_action('widgets_init', 'mmc_widget_areas');
function mmc_widget_areas(){
	register_sidebar(array(
		'name' 			=> 'Blog Sidebar',
		'id'			=> 'blog-sidebar',
		'description' 	=> 'These blocks will appear next to all archives and posts',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
	));	

	register_sidebar(array(
		'name' 			=> 'Page Sidebar',
		'id'			=> 'page-sidebar',
		'description' 	=> 'These blocks will appear Next to 2-column pages',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
	));	

	register_sidebar(array(
		'name' 			=> 'Footer Area',
		'id'			=> 'footer-area',
		'description' 	=> 'These blocks will appear at the bottom of everything',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
	));	
}
/**
 * Fix the default comment count so it excludes pingbacks and trackbacks
 */
add_filter( 'get_comments_number', 'mmc_comment_count' );
function mmc_comment_count(){
	//post_id
	global $id;
	$comments = get_approved_comments( $id );
	$count = 0;
	foreach( $comments as $comment ){
		//if it's a real comment, count it
		if( $comment->comment_type == 'comment' ){
			$count ++;
		}
	}
	return $count;
}

/**
 * Count the number of pingbacks and trackbacks on any post
 */
function mmc_pings_count(){
	global $id;
	$comments = get_approved_comments( $id );
	$count = 0;
	foreach( $comments as $comment ){
		//if it's not a real comment, count it
		if( $comment->comment_type != 'comment' ){
			$count ++;
		}
	}
	return $count;
}

/**
 * Remove the "website" field from the comment form
 * @source https://www.wpbeginner.com/plugins/how-to-remove-website-url-field-from-wordpress-comment-form/
 */
add_filter('comment_form_default_fields', 'mmc_unset_url_field');
function mmc_unset_url_field($fields){
    if(isset($fields['url']))
       unset($fields['url']);
       return $fields;
}

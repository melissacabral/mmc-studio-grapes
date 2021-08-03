<?php
//activate sleeping features

add_theme_support( 'custom-background' );

// featured images on posts
add_theme_support( 'post-thumbnails' );

//SEO friendly titles. you should remove the static <title> from your header
add_theme_support('title-tag');

$args = array(
	'width' 		=> 300,
	'height' 		=> 300,
	'flex-width' 	=> true,
	'flex-height' 	=> true,
);
add_theme_support('custom-logo', $args);

add_theme_support('html5', array('gallery', 'search-form', 'comment-list', 
	'comment-form', 'caption', 'style', 'script'));

//do this if you have a blog
add_theme_support('custom-feed-links');

/*
Filter usage example
 */
//change the length of the_excerpt
function mmc_ex_length(){
	return 20; //words
}
add_filter('excerpt_length', 'mmc_ex_length');

//change the [...]
function mmc_readmore(){
	return '&hellip; <a href="' . get_permalink() . '" class="button">Read More</a>';
}
add_filter( 'excerpt_more', 'mmc_readmore' );

// Action Example
function mmc_action_demo(){
	echo 'Hello World';
}
//add_action('wp_footer', 'mmc_action_demo');

// Action Example
function mmc_crumbs(){
	echo 'This could be breadcrumbs';
}
add_action('loop_start', 'mmc_crumbs');


//just an example
function bananabread(){
	echo 'Why is it so delicious';
}


/*
Navigation Menus
1. Register them here
2. Display them in place (header.php?)
3. Go to appearance > menus and click buttons
*/
add_action('init', 'mmc_menu_setup');
function mmc_menu_setup(){
	register_nav_menus(array(
		'main_nav' 		=> 'Main Navigation',
		'footer_menu'	=> 'Footer Menu',
	));
}


/*
Pagination function
*/
//add_action( 'loop_start', 'mmc_pagination' );
add_action( 'loop_end', 'mmc_pagination' );
function mmc_pagination(){
	?>
	<section class="pagination">
		<?php 
		//single vs archive pagination
		if( is_singular() ){
			//single
			previous_post_link('%link', '&larr; Previously: %title');
			next_post_link('%link', 'Next: %title &rarr;');
		}elseif( ! is_singular() AND wp_is_mobile() ){
			//archive
			previous_posts_link('&larr; Previous'); 
			next_posts_link('Next &rarr;'); 
		}else{
			//desktop - do the numbered pagination
			the_posts_pagination();
		}
		?>
	</section>
	<?php 
}

/*
Widget Areas
AKA Dynamic Sidebars
1. Register them here
2. Display them in place (sidebar.php? footer? wherever?)
3. Go to appearance > widgets and add blocks
*/
add_action('widgets_init', 'mmc_widget_areas');
function mmc_widget_areas(){
	register_sidebar(array(
		'name' 			=> 'Blog Sidebar',
		'id'			=> 'blog_sidebar',
		'description' 	=> 'These blocks will appear next to all archives and posts',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
	));	

	register_sidebar(array(
		'name' 			=> 'Page Sidebar',
		'id'			=> 'page_sidebar',
		'description' 	=> 'These blocks will appear Next to 2-column pages',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
	));	

	register_sidebar(array(
		'name' 			=> 'Footer Area',
		'id'			=> 'footer_area',
		'description' 	=> 'These blocks will appear at the bottom of everything',
		'before_widget'	=> '<div id="%1$s" class="widget %2$s">',
		'after_widget'	=> '</div>',
	));	
}

//no close php
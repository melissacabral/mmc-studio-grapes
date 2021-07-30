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

//no close php
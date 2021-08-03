<!DOCTYPE html>
<html>
<head>
	<?php wp_head(); //HOOK. Required for plugins and the admin bar ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body <?php body_class(); ?>>
	<?php wp_body_open(); //HOOK. Required for plugins and the admin bar ?>
	<div class="site">
		<header class="header">
			<div class="header-bar">
				THIS HEADER IS GONNA BE GIANT
				<?php the_custom_logo(); ?>

				<h1 class="site-title">
					<a href="<?php echo home_url('/'); ?>">
						<?php bloginfo('name'); ?>
					</a>
				</h1>
				<h2><?php bloginfo('description'); ?></h2>
				
				<?php 
				//Step 2 of Menus: display the menu area (see functions.php)
				wp_nav_menu( array(
					'theme_location' 	=> 'main_nav', //registered in functions
					'container'			=> 'nav', //div, nav, or blank
					'container_class'	=> 'main-navigation', //<nav class="">
					'fallback_cb'		=> false, //no default behavior
				) ); ?>


				<?php  
				//Melissa's social icons plugin
				if( function_exists('mmc_social_icons') ){
					mmc_social_icons();
				} 
				?>

				<?php get_search_form(); //default search form or searchform.php ?>

			</div>
		</header>
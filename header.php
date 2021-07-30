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
				<?php the_custom_logo(); ?>

				<h1 class="site-title">
					<a href="<?php echo home_url('/'); ?>">
						<?php bloginfo('name'); ?>
					</a>
				</h1>
				<h2><?php bloginfo('description'); ?></h2>
				<nav>
					<ul class="menu">
						<?php
						//TODO: temporary until we learn how to make menus
						 wp_list_pages( array( 
						 	'title_li' => '',
						  ) ); ?>
					</ul>
				</nav>

				<?php get_search_form(); //default search form or searchform.php ?>

			</div>
		</header>
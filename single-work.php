<?php get_header(); //requires header.php ?>
		<main class="content">

			<?php //The Loop
			if( have_posts() ){	
				while( have_posts() ){	
					the_post();
			?>

			<article <?php post_class('clearfix'); ?> >
				<div class="cover-image">
					<?php the_post_thumbnail('wide-banner'); ?>

					<h2 class="entry-title">
						<?php the_title(); ?>
					</h2>
				</div>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				
			</article>
			<!-- end .post -->
			<?php 
				} //end while
				mmc_pagination();
			}else{ ?>
				<h2>No Posts to show</h2>
			<?php } //end of The Loop ?>			
		</main>
		<!-- end .content -->
		
<?php get_footer();  //require footer.php ?>
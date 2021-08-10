<?php get_header(); //requires header.php ?>
		<main class="content">
			<section class="page-title">
				<h1>My Work</h1>
			</section>
			<?php //The Loop
			if( have_posts() ){	
				while( have_posts() ){	
					the_post();
			?>

			<article <?php post_class('clearfix'); ?> >
				<div class="cover-image">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('wide-banner'); ?>

						<h2 class="entry-title">
							<?php the_title(); ?>
						</h2>
					</a>
				</div>
				<div class="entry-content">
					<?php the_excerpt(); ?>
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
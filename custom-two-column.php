<?php 
/*
Template Name: Two Columns
*/

get_header(); //requires header.php ?>
		<main class="content">

			<?php //The Loop
			if( have_posts() ){	
				while( have_posts() ){	
					the_post();
			?>

			<article <?php post_class('clearfix'); ?> >
				<?php the_post_thumbnail('wide-featured'); ?>

				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
				<div class="entry-content">
					<?php 
					//conditional tag example
					if( is_singular() ){
						the_content();
						//for 'paged' posts
						wp_link_pages( array(
							'before' => '<div class="paged-post-nav">Keep reading this post:<br>',
							'after' => '</div>',
							'next_or_number' => 'next,'
						) );
					}else{
						//not a single post or page (archive)
						the_excerpt();
					} ?>
				</div>
				
			</article>
			<!-- end .post -->			

			<?php 
				} //end while
		
			}else{ ?>

				<h2>No Posts to show</h2>

			<?php } //end of The Loop ?>
			
		</main>
		<!-- end .content -->
	
<?php get_sidebar('page');  //require sidebar-page.php ?>
<?php get_footer();  //require footer.php ?>
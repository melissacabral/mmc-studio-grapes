<?php 
/*
Template Name: Special Campaign
*/

//require header.php
get_header(); 
?>
		<main class="content">
			<?php 
			//The Loop begins
			if( have_posts() ){ 
				while( have_posts() ){
					the_post(); ?>
			<article <?php post_class(); ?>>
				<h2 class="entry-title">
					<a href="<?php the_permalink(); ?>">
						<?php the_title(); ?>
					</a>
				</h2>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
				
			</article>
			<!-- end .post -->
			<?php 
				} //end while
			}else{
				echo 'Sorry, no posts to show';
			} ?>
			
		</main>
		<!-- end .content -->

		

<?php get_sidebar(); ?>
<?php get_footer(); ?>
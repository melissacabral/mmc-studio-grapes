<?php 
//require header-home.php
get_header('home'); 
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
					<?php wp_link_pages(array(
						'before' => '<div class="post-pagination">Keep Reading: ',
						'after'	=> '</div>',
						'next_or_number'	=> 'next',
					)); ?>
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

		

<?php get_footer(); ?>
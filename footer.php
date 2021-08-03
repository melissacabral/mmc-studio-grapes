		<footer class="footer">
			<?php 
			//footer menu - this was registered in functions.php
			wp_nav_menu(array(
				'theme_location' 	=> 'footer_menu',
				'fallback_cb' 		=> false,
			)); ?>

			<?php 
			//widget area registered in functions.php
			dynamic_sidebar('footer_area'); 
			?>
		</footer>
	</div> <!-- end .site from header-->
<?php wp_footer(); //HOOK. required for plugins and the admin bar ?>
</body>
</html>
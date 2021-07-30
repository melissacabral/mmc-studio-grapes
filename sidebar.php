<aside class="sidebar">
			<section id="categories" class="widget">
				<h3 class="widget-title"> Categories </h3>
				<ul>
					<?php wp_list_categories( array(
						'title_li' 		=> '',
						'show_count'	=> true,
						'order'         => 'DESC',
        				'orderby'       => 'count',
        				'number' 		=> 20,
					) ); ?>
				</ul>
			</section>
			<section id="archives" class="widget">
				<h3 class="widget-title"> Archives </h3>
				<ul>
					<?php wp_get_archives( array(
						'type' 				=> 'yearly',
						'show_post_count' 	=> true,
					) ); ?>
				</ul>
			</section>
			<section id="tags" class="widget">
				<h3 class="widget-title"> Tags </h3>
				<?php wp_tag_cloud( array(
					'format' 	=> 'list',
					'orderby'	=> 'count',
					'order'		=> 'DESC',
					'smallest'	=> 1,
					'largest'	=> 1,
					'unit'		=> 'em',
					'number'	=> 15,
					'show_count'=> true,
				) ); ?>
			</section>
			<section id="meta" class="widget">
				<h3 class="widget-title"> Meta </h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout( home_url() ); ?></li>
				</ul>

				<?php 
				if( ! is_user_logged_in() ){
					wp_login_form();
				}
				?>
			</section>
		</aside>
		<!-- end .sidebar -->
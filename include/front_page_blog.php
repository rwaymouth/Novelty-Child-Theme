<?php 		


    		 $args = array(
						'post_type' => 'post',
						'posts_per_page' => 30
						

					);
    		 $wp_query = new WP_Query( $args );

			if ($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
			    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post-wrapper'); ?>>
			    	<?php if (get_post_format()) {
						get_template_part( 'include/' . get_post_format() );
					} else {
						get_template_part( 'include/blog' );
					}?>


			    </article>

			<?php endwhile; endif; ?>


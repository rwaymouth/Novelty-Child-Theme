<?php get_header();  

$layout = $smof_data['blog_single_sidebar'];

if ($layout == 'left') { $clas = 'span9 alignright'; $s_sidebar = 'alignleft'; }
if ($layout == 'right') { $clas = 'span9 alignleft'; $s_sidebar = 'alignright'; }
if ($layout == 'without') { $clas = 'without-single'; }

if ($smof_data['single_blog_bread'] == 1 ) dimox_breadcrumbs(); ?>

<div id="content">
    <div class="container">
    	<div class="blog-block mb80">

			<?php if ($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
			    <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post-wrapper'); ?>>
			    	<?php if (get_post_format()) {
						get_template_part( 'include/' . get_post_format() );
					} else {
						get_template_part( 'include/standart' );
					}?>
			    </article>
			<?php endwhile; endif; ?>

			<?php bmd_pagination(); ?>

        	<?php if ($layout != 'without') get_sidebar(); ?>
        	
        <?php if ($layout != 'without') echo '</div>'; ?>

		</div>
    </div><!-- end div.container -->    
</div><!-- end div#content-->

<?php get_footer();  ?>
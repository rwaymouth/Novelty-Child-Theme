<?php global $attachment, $smof_data, $excerpt2, $read2, $read_icon2, $col_width, $show_cat2, $show_date2, $show_comm2, $blog_style2;
$featured = get_post_meta( $post->ID, '_p_featured', true );
?>

<div class="portfolio-content">

	<?php
			echo '<div class="portfolio-header"><h1>'.get_the_title().'</h1>';

        //wp_nav_menu( array('theme_location' => 'portfolio') );

			echo "<a clas="portfolio-nav" href='../'><button>
			Back
			</buton></a>
			</div>"
;
			the_content();

?>

</div><!-- end div .portfolio-content -->


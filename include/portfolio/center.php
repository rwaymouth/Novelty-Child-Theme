<?php
global $smof_data, $attachment;

$att_arg = array(
				'post_type'      => 'attachment',
				'numberposts'    => -1,
				'post_status'    => null,
				'post_parent'    => $post->ID,
				'post_mime_type' => 'image',
				'orderby'        => 'menu_order ID'
			);
$attachments = get_posts($att_arg);


if ($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();

	$project_type = get_post_meta($post->ID, '_bmd_project_type', true);

?>

<div class="portfolio-content">

	<?php
			echo '<div class="portfolio-header clearfix"><h1>'.get_the_title().'</h1>
        <a class="portfolio-nav" href="../"><button>
			Back
			</buton></a>
			</div>';

		$portflio_single_link = '';
	if ($smof_data['portflio_single_link'] == 1){
		/*echo '<div class="portfolio-single-link">';
		previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'bmd' ) . ' Previous</span>' );
		echo '<span class="spacer"></span>';
		next_post_link( '%link', 'Next <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'bmd' ) . '</span>' );
		echo '</div></div>';*/
		$portflio_single_link = "mt26";
	}
			the_content();

?>

</div><!-- end div .portfolio-content -->

<?php endwhile; endif; ?>
<?php wp_reset_postdata(); ?>

<?php

    /*
        Template Name: Portfolio Page
    */

?>

<?php 
/*
this is shaping up more to be the front page of the BLOG section...
*/
global $post, $smof_data, $offset;
     

get_header(); 


$bread = get_post_meta( $post->ID, '_page_bread', true );
$class = get_post_meta( $post->ID, '_page_sidebar', true );
$full_width_slider = get_post_meta( $post->ID, '_page_rev_slider', true );

if ( $class ) {
    if ( $class == 'left' ) { $clas = 'span9 alignright'; }
    if ( $class == 'right' ) { $clas = 'span9 alignleft'; }
    if ( $class == 'without' ) { $clas = 'without'; }
} else {
    $clas = 'without';
}

if ($full_width_slider) {
    echo '<div class="full-slider">';
    echo do_shortcode($full_width_slider);
    echo '</div>';
}

if ($bread == 'Yes') { dimox_breadcrumbs(); } 

?>

<div id="content">
    <div class="container">
            <div id="content-area" class="<?php if (isset($clas)) echo $clas ?> front-page-blog">
                <?php get_template_part( 'include/portfolio_full' );
            ?>
            </div><!-- end div#content-area -->

            <?php if ( $class != 'without' && $class != '' ) { get_sidebar(); }  ?>
        
        <?php if ( $class != 'without' && $class != '' ) echo '</div>'; ?>

    </div><!-- end div.container -->    
</div><!-- end div#content-->

<?php get_footer(); ?>   
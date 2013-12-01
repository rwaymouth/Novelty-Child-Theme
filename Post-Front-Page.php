<?php

    /*
        Template Name: Blog Front Page
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
                <?php if ( $class != 'without' && $class != '' ) echo '<div class="row">'; ?>

            <div id="content-area" class="<?php if (isset($clas)) echo $clas ?> masonry ">

                <?php get_template_part( 'include/front_page_blog' );
            ?>
            </div><!-- end div#content-area -->

            <?php if ( $class != 'without' && $class != '' ) { get_sidebar(); }  ?>

        <?php if ( $class != 'without' && $class != '' ) echo '</div>'; ?>
        <?php dynamic_sidebar('blog_footer'); ?>

    </div><!-- end div.container -->
</div><!-- end div#content-->

<script>
jQuery( document ).ready(function() {

  var container = document.querySelector('.masonry');
  var msnry = new Masonry( container, {
    itemSelector: '.blog-post-wrapper',
    columnWidth: 60,
    transitionDuration: '1s'
  });
  var mason_posts = msnry.getItemElements();
  console.log(mason_posts);
  msnry.layout();
  msnry.reloadItems();
//msnry.destroy();


});
</script>

<?php get_footer(); ?>
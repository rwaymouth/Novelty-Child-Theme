<?php

define('CHILD_PATH', get_stylesheet_directory_uri());
define('CHILD_SERVER_PATH', get_stylesheet_directory_uri());


/*ENQUEUE SCRIPTS*/

            wp_deregister_script( 'masonry' );
            wp_register_script( 'masonry', CHILD_PATH . '/js/masonry.pkgd.js', array( 'jquery' ), '', true );
            wp_enqueue_script( 'masonry' );

            wp_deregister_script( 'classie' );
            wp_register_script( 'classie', CHILD_PATH . '/js/classie.js', array( 'jquery' ), '', true );
            wp_enqueue_script( 'classie' );

            wp_deregister_script( 'equalize' );
            wp_register_script( 'equalize', CHILD_PATH . '/js/equalize.js', array( 'jquery' ), '', true );
            wp_enqueue_script( 'equalize' );


/* Royal Slide Custom Themes */

add_filter('new_royalslider_skins', 'new_royalslider_add_custom_skin', 10, 2);
function new_royalslider_add_custom_skin($skins) {
      $skins['Transparent'] = array(
           'label' => 'Transparent',
           'path' => get_stylesheet_directory_uri() . '/slider-themes/transparent/rs-transparent.css'  // get_stylesheet_directory_uri returns path to your theme folder
      );
      return $skins;
}

/*
adding footer menu, second nav to child theme
*/
 register_nav_menus( array(
 'portfolio' => __( 'Portfolio Menu', 'Novelty-Child-Theme' )
 ) );

add_shortcode('wp_caption', 'fixed_img_caption_shortcode');
add_shortcode('caption', 'fixed_img_caption_shortcode');
function fixed_img_caption_shortcode($attr, $content = null) {
  if ( ! isset( $attr['caption'] ) ) {
    if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
      $content = $matches[1];
      $attr['caption'] = trim( $matches[2] );
    }
  }
  $output = apply_filters('img_caption_shortcode', '', $attr, $content);
  if ( $output != '' )
    return $output;
  extract(shortcode_atts(array(
    'id'  => '',
    'align' => 'alignnone',
    'width' => '',
    'caption' => ''
  ), $attr));
  if ( 1 > (int) $width || empty($caption) )
    return $content;
  if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
 return '<div ' . $id . 'class="wp-caption ' . esc_attr($align) . '" >' . do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
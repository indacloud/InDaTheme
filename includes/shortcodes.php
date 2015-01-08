<?php

// Add Shortcode
function idt_row( $atts , $content = null ) {
  return '<div class="row">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'row', 'idt_row' );

function idt_col( $atts , $content = null ) {
  $class = "";
  foreach ($atts as $key => $value) {
    $class .= ' col-'.str_replace('_', '-', $key).'-'.$value;
  }
  return '<div class="'.$class.'">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'col', 'idt_col' );

function idt_visible( $atts , $content = null ) {
  $class = "";
  foreach ($atts as $key => $value) {
    $class .= ' visible-'.str_replace('_', '-', $key).'-'.$value;
  }
  return '<div class="'.$class.'">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'visible', 'idt_visible' );

function idt_hidden( $atts , $content = null ) {
  $class = "";
  foreach ($atts as $key => $value) {
    $class .= ' hidden-'.str_replace('_', '-', $key);
  }
  return '<div class="'.$class.'">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'hidden', 'idt_hidden' );

function idt_style( $atts , $content = null ) {
  $style = "";
  foreach ($atts as $key => $value) {
    $style .= str_replace('_', '-', $key).':'.str_replace('_', '-', $value).';';
  }
  return '<div style="'.$style.'">'.do_shortcode( $content ).'</div>';
}
add_shortcode( 'style', 'idt_style' );


remove_filter( 'the_content', 'wpautop' );
add_filter( 'the_content', 'wpautop' , 99);
add_filter( 'the_content', 'shortcode_unautop',100 );

?>
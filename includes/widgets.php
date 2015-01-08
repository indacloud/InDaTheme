<?php

class idt_social_widget extends WP_Widget {

  /**
   * Sets up the widgets name etc
   */
  public function __construct() {
    parent::__construct(
      'idt_social_widget', // Base ID
      __( 'Social widget', 'idt' ), // Name
      array( 'description' => __( 'Display social media icons', 'idt' ), ) // Args
    );
  }

  /**
   * Outputs the content of the widget
   *
   * @param array $args
   * @param array $instance
   */
  public function widget( $args, $instance ) {
    echo $args['before_widget'];
    echo '<div class="idt-social-widget-content row">';
    echo '<div class="col col-md-8">';
    echo '<div class="idt-social-widget-title">';
    if ( ! empty( $instance['title'] ) )
      echo apply_filters( 'widget_title', $instance['title'] );
    echo '</div>';
    echo '<div class="idt-social-widget-text">';
    if( ! empty( $instance['text'] ))
      echo $instance['text'];
    echo '</div>';
    echo '</div>';
    echo '<div class="col col-md-4">';
    echo '<ul class="idt-social-widget-social">';
    foreach (get_social_links() as $key => $link) {
      echo "<li class='social-item'>";
      echo "<a href='$link->url' title='$link->title' target='_blank'><i class='fa $link->icon_square'></i></a>";
      echo "</li>";
    }
    echo '</ul>';
    echo '</div>';
    echo '</div>';

    echo $args['after_widget'];
  }

  /**
   * Outputs the options form on admin
   *
   * @param array $instance The widget options
   */
  public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : __( 'New title', 'idt' );
    $text = ! empty( $instance['text'] ) ? $instance['text'] : '';
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'idt' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
    </p>
    <p>
      <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e( 'Text:', 'idt' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'text' ); ?>" name="<?php echo $this->get_field_name( 'text' ); ?>" type="text" value="<?php echo esc_attr( $text ); ?>">
    </p>
  <?php
  }

  /**
   * Processing widget options on save
   *
   * @param array $new_instance The new options
   * @param array $old_instance The previous options
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    $instance['text'] = ( ! empty( $new_instance['text'] ) ) ? strip_tags( $new_instance['text'] ) : '';

    return $instance;
  }
}

add_action( 'widgets_init', function(){
     register_widget( 'idt_social_widget' );
});

// sidebar
$args_social = array(
  'name'          => __('Social widgets', 'idt'),
  'id'            => "home-social-widgets",
  'description'   => '',
  'class'         => 'home-social-widgets',
  'before_widget' => '<div id="%1$s" class="widget %2$s">',
  'after_widget'  => "</div>\n",
  'before_title'  => '',
  'after_title'   => '',
);
register_sidebar( $args_social );

 ?>
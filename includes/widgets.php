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


function get_social_links(){

  $links = [];
  if(strlen($mod = get_theme_mod('facebook_link'))>0)
    $links['facebook_link']  = (object) array(
      'url'   => $mod,
      'icon'  => 'fa-facebook',
      'icon_square'  => 'fa-facebook-square',
      'title' => __('Like us on Facebook', 'idt'),
    );
  if(strlen($mod = get_theme_mod('twitter_link'))>0)
    $links['twitter_link']   = (object) array(
      'url'   => $mod,
      'icon'  => 'fa-twitter',
      'icon_square'  => 'fa-twitter-square',
      'title' => __('Follow us on Twitter', 'idt'),
    );
  if(strlen($mod = get_theme_mod('instagram_link'))>0)
    $links['instagram_link'] = (object) array(
      'url'   => $mod,
      'icon'  => 'fa-instagram',
      'icon_square'  => 'fa-instagram',
      'title' => __('Our Instagram page', 'idt'),
    );
  if(strlen($mod = get_theme_mod('pinterest_link'))>0)
    $links['pinterest_link'] = (object) array(
      'url'   => $mod,
      'icon'  => 'fa-pinterest',
      'icon_square'  => 'fa-pinterest-square',
      'title' => __('We are on pinterest', 'idt'),
    );
  if(strlen($mod = get_theme_mod('linkedin_link'))>0)
    $links['linkedin_link']  = (object) array(
      'url'   => $mod,
      'icon'  => 'fa-linkedin',
      'icon_square'  => 'fa-linkedin-square',
      'title' => __('On LinkedIn', 'idt'),
    );
  if(strlen($mod = get_theme_mod('google_plus_link'))>0)
    $links['google_plus_link']  = (object) array(
      'url'   => $mod,
      'icon'  => 'fa-google-plus',
      'icon_square'  => 'fa-google-plus-square',
      'title' => __('On Google+', 'idt'),
    );

  return $links;
}


 ?>
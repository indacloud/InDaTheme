<?php
function idt_theme_customizer( $wp_customize ) {

  // settings
  $wp_customize->add_setting( 'facebook_link' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );
  $wp_customize->add_setting( 'twitter_link' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );
  $wp_customize->add_setting( 'instagram_link' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );
  $wp_customize->add_setting( 'pinterest_link' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );
  $wp_customize->add_setting( 'linkedin_link' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );
  $wp_customize->add_setting( 'google_plus_link' , array(
    'default'     => '',
    'transport'   => 'refresh',
    )
  );

  // sections
  $wp_customize->add_section( 'social' , array(
    'title'      => __( 'Social', 'idt' ),
    'priority'   => 30,
    )
  );

  // controls
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook_link', array(
    'label'        => __( 'Facebook page link', 'idt' ),
    'section'    => 'social',
    'settings'   => 'facebook_link',
    'type'       => 'text'
    )
    )
  );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter_link', array(
    'label'        => __( 'Twitter account link', 'idt' ),
    'section'    => 'social',
    'settings'   => 'twitter_link',
    'type'       => 'text'
    )
    )
  );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram_link', array(
    'label'        => __( 'Instagram link', 'idt' ),
    'section'    => 'social',
    'settings'   => 'instagram_link',
    'type'       => 'text'
    )
    )
  );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pinterest_link', array(
    'label'        => __( 'Pinterest board link', 'idt' ),
    'section'    => 'social',
    'settings'   => 'pinterest_link',
    'type'       => 'text'
    )
    )
  );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin_link', array(
    'label'        => __( 'LinkedIn profile link', 'idt' ),
    'section'    => 'social',
    'settings'   => 'linkedin_link',
    'type'       => 'text'
    )
    )
  );
  $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'google_plus_link', array(
    'label'        => __( 'Google+ profile link', 'idt' ),
    'section'    => 'social',
    'settings'   => 'google_plus_link',
    'type'       => 'text'
    )
    )
  );

}
add_action( 'customize_register', 'idt_theme_customizer' );

?>
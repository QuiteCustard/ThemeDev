<?php

// Add scripts and stylesheets
function load_stylesheets() {
    wp_enqueue_style( 'style', get_stylesheet_uri() ); 
}
add_action( 'wp_enqueue_scripts', 'load_stylesheets' );

function samsTheme_setup() {
    // Add <title> tag support
    add_theme_support( 'title-tag' );  

    // Add custom-logo support
    add_theme_support( 'custom-logo' );

     // Add menu support

    register_nav_menus( array(
        'header'   => 'Header Menu',
        'footer'   => 'Footer menu',
    ) );
    

}
add_action( 'after_setup_theme', 'samsTheme_setup');

function samsTheme_register_sidebars() {
    // First footer widget
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Section One', 'samsTheme' ),
        'id'            => 'footer-section-one',
        'description'   => esc_html__( 'Widgets added here would appear inside the first section of the footer', 'samsTheme' ),
        'before_widget' => '<aside>',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    // Second footer widget
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Section Two', 'samsTheme' ),
        'id'            => 'footer-section-two',
        'description'   => esc_html__( 'Widgets added here would appear inside the second section of the footer', 'samsTheme' ),
        'before_widget' => '<aside>',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));  

     // Second footer widget
     register_sidebar( array(
        'name'          => esc_html__( 'Footer Section Three', 'samsTheme' ),
        'id'            => 'footer-section-three',
        'description'   => esc_html__( 'Widgets added here would appear inside the third section of the footer', 'samsTheme' ),
        'before_widget' => '<aside>',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));  
     // Second footer widget
     register_sidebar( array(
        'name'          => esc_html__( 'Footer Section four', 'samsTheme' ),
        'id'            => 'footer-section-four',
        'description'   => esc_html__( 'Widgets added here would appear inside the fourth section of the footer', 'samsTheme' ),
        'before_widget' => '<aside>',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));  
}
    add_action( 'widgets_init', 'samsTheme_register_sidebars' );	

require_once( get_stylesheet_directory() . '/includes/customizer.php' );
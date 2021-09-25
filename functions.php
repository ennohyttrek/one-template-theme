<?php

function zerolab_stylesheets() {
    wp_enqueue_style( 'style', get_stylesheet_uri()); 
    wp_enqueue_style( 'inter-font', get_template_directory_uri() . '/fonts/inter/font-style.css' );
    wp_enqueue_style( 'playfair-font', get_template_directory_uri() . '/fonts/playfair/font-style.css' );
}
add_action( 'wp_enqueue_scripts', 'zerolab_stylesheets' );

function zerolab_scripts() {
    wp_enqueue_script( 'custom-scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'zerolab_scripts' );


//This function is necessary to create menus in WP and to prepare to embed the menus in templates
function register_my_menus() {
  register_nav_menus(
    array(
        'main-menu' => __( 'Main Menu, shortcode [main-menu]' ),
        'mobile-menu' => __( 'Mobile Menu, shortcode [mobile-menu]' ),
        'secondary-menu' => __( 'Secondary Menu, shortcode [secondary-menu]' ),
        'extra-menu' => __( 'Extra Menu, shortcode [extra-menu]' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

//Shortcode Main Menu [main-menu]
function main_menu_shortcode() {

    return wp_nav_menu( array( 
        'theme_location' => 'main-menu',
        'container' => 'nav',
        'container_class'   => "main-nav",
        'container_id'      => "main-nav",
        'echo' => false ) );

}
add_shortcode('main-menu', 'main_menu_shortcode');

//Shortcode Mobile Menu [mobile-menu]
function mobile_menu_shortcode() {

    return wp_nav_menu( array( 
        'theme_location' => 'mobile-menu',
        'container' => 'nav',
        'container_class'   => "mobile-nav",
        'container_id'      => "mobile-nav",
        'echo' => false ) );

}
add_shortcode('mobile-menu', 'mobile_menu_shortcode');

//Shortcode Secondary Menu [secondary-menu]
function secondary_menu_shortcode() {

    return wp_nav_menu( array( 
        'theme_location' => 'secondary-menu',
        'container' => 'nav',
        'container_class'   => "secondary-nav",
        'container_id'      => "secondary-nav",
        'echo' => false ) );

}
add_shortcode('secondary-menu', 'secondary_menu_shortcode');

//Shortcode extra Menu [extra-menu]
function extra_menu_shortcode() {

    return wp_nav_menu( array( 
        'theme_location' => 'extra-menu',
        'container' => 'nav',
        'container_class'   => "extra-nav",
        'container_id'      => "extra-nav",
        'echo' => false ) );

}
add_shortcode('extra-menu', 'extra_menu_shortcode');


add_theme_support( 'post-thumbnails' );

?>

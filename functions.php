<?php

function zerolab_stylesheets() {
    wp_enqueue_style( 'style', get_stylesheet_uri()); 
    wp_enqueue_style( 'inter-font', get_template_directory_uri() . '/fonts/inter/font-style.css' );
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
        'header-menu' => __( 'Haupt Navigation' ),
        'mobile-menu' => __( 'Responsive Menu' ),
        'footer-menu' => __( 'Secondary Menu' ),
        'added-menu' => __( 'Added Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

//Shortcode Main Menu [main-menu]
function main_menu_shortcode() {

    return wp_nav_menu( array( 
        'theme_location' => 'added-menu',
        'container' => 'nav',
        'container_class'   => "added-nav",
        'container_id'      => "added-nav",
        'echo' => false ) );

}
add_shortcode('added-menu', 'main_menu_shortcode');

add_theme_support( 'post-thumbnails' );

?>

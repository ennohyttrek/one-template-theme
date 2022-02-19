<?php

function zerolab_stylesheets() {
    wp_enqueue_style( 'style', get_stylesheet_uri()); 
    wp_enqueue_style( 'inter-font', get_template_directory_uri() . '/fonts/inter/font-style.css' );
    wp_enqueue_style( 'playfair-font', get_template_directory_uri() . '/fonts/playfair/font-style.css' );
        wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/fonts/fontawesome/css/all.css' );
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
        'main-menu-de' => __( 'Main Menu DE, shortcode [main-menu-de]' ),
        'main-menu-en' => __( 'Main Menu EN, shortcode [main-menu-en]' ),        
        'mobile-menu-de' => __( 'Mobile Menu DE, shortcode [mobile-menu-de]' ),
        'mobile-menu-en' => __( 'Mobile Menu EN, shortcode [mobile-menu-en]' ),
        'secondary-menu-de' => __( 'Secondary Menu DE, shortcode [secondary-menu-de]' ),
        'secondary-menu-en' => __( 'Secondary Menu EN, shortcode [secondary-menu-en]' ),
        'extra-menu' => __( 'Extra Menu, shortcode [extra-menu]' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

//Shortcode Main Menu DE [main-menu-de]
function main_menu_de_shortcode() {

    return wp_nav_menu( array( 
        'theme_location' => 'main-menu-de',
        'container' => 'nav',
        'container_class'   => "main-nav",
        'container_id'      => "main-nav",
        'echo' => false ) );

}
add_shortcode('main-menu-de', 'main_menu_de_shortcode');

//Shortcode Main Menu EN [main-menu-en]
function main_menu_en_shortcode() {

    return wp_nav_menu( array( 
        'theme_location' => 'main-menu-en',
        'container' => 'nav',
        'container_class'   => "main-nav",
        'container_id'      => "main-nav",
        'echo' => false ) );

}
add_shortcode('main-menu-en', 'main_menu_en_shortcode');

//Shortcode Mobile Menu DE [mobile-menu-de]
function mobile_menu_de_shortcode() {

    return wp_nav_menu( array( 
        'theme_location' => 'mobile-menu-de',
        'container' => 'nav',
        'container_class'   => "mobile-nav",
        'container_id'      => "mobile-nav",
        'echo' => false ) );

}
add_shortcode('mobile-menu-de', 'mobile_menu_de_shortcode');

//Shortcode Mobile Menu EN [mobile-menu-de]
function mobile_menu_en_shortcode() {

    return wp_nav_menu( array( 
        'theme_location' => 'mobile-menu-en',
        'container' => 'nav',
        'container_class'   => "mobile-nav",
        'container_id'      => "mobile-nav",
        'echo' => false ) );

}
add_shortcode('mobile-menu-en', 'mobile_menu_en_shortcode');

//Shortcode Secondary Menu [secondary-menu]
function secondary_menu_de_shortcode() {

    return wp_nav_menu( array( 
        'theme_location' => 'secondary-menu-de',
        'container' => 'nav',
        'container_class'   => "secondary-nav",
        'container_id'      => "secondary-nav",
        'echo' => false ) );

}
add_shortcode('secondary-menu-de', 'secondary_menu_de_shortcode');

//Shortcode Secondary Menu [secondary-menu]
function secondary_menu_en_shortcode() {

    return wp_nav_menu( array( 
        'theme_location' => 'secondary-menu-en',
        'container' => 'nav',
        'container_class'   => "secondary-nav",
        'container_id'      => "secondary-nav",
        'echo' => false ) );

}
add_shortcode('secondary-menu-en', 'secondary_menu_en_shortcode');

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


/**
 * Reusable Blocks accessible in backend
 * @link https://www.billerickson.net/reusable-blocks-accessible-in-wordpress-admin-area
 *
 */
function be_reusable_blocks_admin_menu() {
    add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
}
add_action( 'admin_menu', 'be_reusable_blocks_admin_menu' );


//Remove SVGs in footer
add_action('wp_footer',function() {
        global $wp_filter;

        if(empty($wp_filter['wp_footer'][10])) return;

        foreach($wp_filter['wp_footer'][10] as $hook) {
                if(!is_object($hook['function']) || get_class($hook['function']) !== 'Closure') continue;

                $static=(new ReflectionFunction($hook['function']))->getStaticVariables();

                if(empty($static['svg'])) continue;

                if(!str_starts_with($static['svg'],'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 0 0" ')) continue;

                remove_action('wp_footer',$hook['function'],10);
        }
},9);


?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title><?php bloginfo('title'); ?></title>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>
    <!--
    <nav id="main-nav" class="main-nav">
    <?php wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); ?>
    </nav>



-->    
        <h2>Template: index.php</h2>
    <div class="wrapper content-wrapper">
        <!--Loop starts-->
<?php 
if ( have_posts() ) : 
    while ( have_posts() ) : the_post(); 
        ?>
        <figure>
        <?php the_post_thumbnail(); ?>
            </figure>
        
        <?php
        the_content();
    endwhile; 
endif; 
?>
        <!--Loop ends-->
    </div>

</body>

<footer>

    <?php wp_footer() ?>
</footer>
    
        <nav id="mobile-nav" class="mobile-nav">
    <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu' ) ); ?>
    </nav>

</html>

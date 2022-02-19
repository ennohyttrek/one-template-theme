<?php
/*
Template Name: EHy Test Custom Fields
Template Post Type: post, page
*/
?>


<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title><?php bloginfo('title'); ?></title>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>

    <div id="outer-wrapper" class="outer-wrapper ehy-color-b">

        <div id="burger-icon" class="burger-icon">
            <a href="#mobile-nav-wrapper">
                <span>
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
            </a>
        </div>




        <div class="main-nav-wrapper">
            <nav id="main-nav" class="main-nav main-nav-de">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu-de' ) ); ?>
            </nav>
        </div>


        <section id="main-content" class="main-content">

            <!--Standard Loop starts-->
            <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); 
                    the_content();
                endwhile; 
            endif; 
            ?>
            <!--Standard Loop ends-->

            <h3> <?php the_meta() ?> </h3>
            <hr>
            <?php
            
                ?>
            <hr>

        </section>
        <!--#main-content-->

    </div>
    <!--#outer-wrapper-->


    <footer id="main-footer" class="main-footer">
        <div class="secondary-nav-wrapper">
            <nav id="secondary-nav" class="secondary-nav secondary-nav-de">
                <?php wp_nav_menu( array( 'theme_location' => 'secondary-menu-de' ) ); ?>
            </nav>
        </div>

    </footer>

    <div id="mobile-nav-wrapper" class="mobile-nav-wrapper">
        <nav id="mobile-nav" class="mobile-nav mobile-nav-de">
            <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu-de' ) ); ?>
        </nav>
    </div>
    <?php wp_footer() ?>
</body>

</html>

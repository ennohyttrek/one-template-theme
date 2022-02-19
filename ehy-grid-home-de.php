<?php
/*
Template Name: EHy Grid Home DE
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


        <header id="main-header" class="main-header" style="background-color:<?php the_field('background-color'); ?>">
           <div id="main-header-container" class="main-header-container">

            </div>
        </header>

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



            <div class="ehy-grid-wrapper">
                <!--Custom Loop 1 -->

                <?php 
                
                $args = array( 
                    'category_name' => 'front-featured', 
                    'posts_per_page' => -1
                );
                
             $custom_query = new WP_Query($args); 
                
                
                while($custom_query->have_posts()) : $custom_query->the_post(); ?>

                <article class="ehy-grid-article featured">
                    <figure><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                        </a></figure>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <p>Zum Projekt ></p>
                    </a>
                </article>

                <?php endwhile; 

               wp_reset_postdata(); // reset the query 
                

                

                $args = array( 
                    'category_name' => 'front-secondary', 
                    'posts_per_page' => -1
                );
                
             $custom_query = new WP_Query($args); 
                
 
                
                while($custom_query->have_posts()) : $custom_query->the_post(); ?>

                <article class="ehy-grid-article featured">
                    <figure><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail( 'thumbnail' ); ?>
                        </a></figure>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <p>Zum Projekt ></p>
                    </a>
                </article>

                <?php endwhile; ?>


            </div>
            <!--.ehy-grid-wrapper-->

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

<?php
/*
Template Name: EHy Home
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

        <div class="main-nav-container">
            <nav id="main-nav" class="main-nav">
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
                
             $custom_query = new WP_Query('category_name=front-featured'); 
                
                while($custom_query->have_posts()) : $custom_query->the_post(); ?>

                <article class="ehy-grid-article featured">
                    <figure><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                            <?php the_post_thumbnail(); ?>
                        </a></figure>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                        <p>Zum Projekt ></p>
                    </a>
                </article>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); // reset the query ?>

                <!--Custom Loop 2 -->
                <?php $custom_query = new WP_Query('category_name=front-secondary'); // only Front Secondary
while($custom_query->have_posts()) : $custom_query->the_post(); ?>

                <article class="ehy-grid-article secondary">
                    <figure><?php the_post_thumbnail(); ?></figure>
                    <h3><?php the_title(); ?></h3>
                </article>

                <?php endwhile; ?>

            </div>
            <!--.ehy-grid-wrapper-->

        </section>
        <!--#main-content-->

    </div>
    <!--#outer-wrapper-->
    <?php wp_footer() ?>

    <footer id="main-footer" class="main-footer">


    </footer>

</body>



</html>

<?php
/*
Template Name: EHy Grid
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

    <div id="outer-wrapper" class="outer-wrapper <?php the_field('farbschema'); ?>">

        <?php 
        $my_menu_lang = get_field('menu-language'); 
        ?>

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
            <?php if( get_field('header-image') ): ?>
               <figure class="header-image">
                <img src="<?php the_field('header-image'); ?>" />
                </figure>
            <?php endif; ?>
        </header>

        <div class="main-nav-wrapper">
            <?php get_template_part( 'nav' , $my_menu_lang ); ?>
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
                
                $my_loop_1 = get_field('loop-1');
                $my_loop_1_value = $my_loop_1->slug;
                $args = array( 
                    'category_name' => $my_loop_1_value, 
                    'posts_per_page' => -1
                );
                
             $custom_query = new WP_Query($args); 
                
                if($my_loop_1_value != "empty") {
                
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
                };

               wp_reset_postdata(); // reset the query 
                

                
                $my_loop_2 = get_field('loop-2');
                $my_loop_2_value = $my_loop_2->slug;
                $args = array( 
                    'category_name' => $my_loop_2_value, 
                    'posts_per_page' => -1
                );
                
             $custom_query = new WP_Query($args); 
                
                if($my_loop_1_value != "empty") {
                
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
                 };
                ?>


            </div>
            <!--.ehy-grid-wrapper-->

        </section>
        <!--#main-content-->

    </div>
    <!--#outer-wrapper-->
    <?php wp_footer() ?>

    <footer id="main-footer" class="main-footer">
        <div class="secondary-nav-wrapper">
            <?php get_template_part( 'nav' , $my_menu_lang+2 ); ?>
        </div>

    </footer>

    <div id="mobile-nav-wrapper" class="mobile-nav-wrapper">
        <?php get_template_part( 'nav' , $my_menu_lang+4 ); ?>
    </div>

</body>



</html>

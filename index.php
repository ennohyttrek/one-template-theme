<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title><?php bloginfo('title'); ?></title>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>

    <div class="wrapper main-wrapper">
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

       <!--Include comment template-->
        <?php
        // If comments are open or we have at least one comment, load up the comment template.
         if ( comments_open() || get_comments_number() ) :
             comments_template();
         endif;
        ?>

    </div>

</body>

<footer>

    <?php wp_footer() ?>
</footer>

</html>

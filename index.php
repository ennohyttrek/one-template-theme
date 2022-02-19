<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title><?php bloginfo('title'); ?></title>
    <?php wp_head() ?>
</head>

<body <?php body_class(); ?>>


        <!--Loop starts-->
        <?php 
        if ( have_posts() ) : 
            while ( have_posts() ) : the_post(); 
                the_content();
            endwhile; 
        endif; 
        ?>
        <!--Loop ends-->


</body>

<footer>

    <?php wp_footer() ?>
</footer>

</html>

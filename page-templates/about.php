<?php
/*
Template Name: About
*/
get_header(); ?>
<?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <?php svef_partial("library/svef-partials/component-hero"); ?>

    <?php svef_partial("library/svef-partials/component-boardmembers"); ?>


	</article>
<?php endwhile; ?>
<?php get_footer();

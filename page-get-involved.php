<?php
/**
 * The template for displaying all pages.
 * Template Name: Get Involved
 * This is the template that displays the landing page.
 *
 * @package oleville
 */

get_header(); ?>

    <div class="main">
        <?php while ( have_posts() ) : the_post(); ?>
                <?php get_template_part( 'content', 'page' ); ?>
            <?php endwhile; // end of the loop. ?>
    </div>


<?php get_footer(); ?>

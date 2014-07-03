<?php
/*
Template Name: Nieuws
*/
?>

<?php get_header(); ?>

<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $query = new WP_Query(
        array(
            'category_name'  => 'nieuws',
            'posts_per_page' => 3,
            'paged'          => $paged
        )
    );
?>

<div class="news">

    <?php if ( $query->have_posts() ) : ?>
        <?php while ( $query->have_posts() ) : $query->the_post(); ?>

            <article class="news-item">
                <?php the_title('<h2 class="news-item-title">', '</h2>'); ?>

                <div class="news-item-meta"><?php the_date(); ?></div>

                <div class="news-item-thumbnail">
                    <img src="http://lorempixel.com/580/580/food/580x580" width="100%" />
                </div>

                <div class="news-item-content">
                    <?php the_excerpt(); ?>
                </div>
            </article>

        <?php endwhile; ?>
    <?php endif; ?>

</div>

<?php
    /* Restore original Post Data
     * NB: Because we are using new WP_Query we aren't stomping on the
     * original $wp_query and it does not need to be reset.
    */
    wp_reset_postdata();
?>

<?php get_footer(); ?>
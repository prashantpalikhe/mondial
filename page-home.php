<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        	<div id="homeCarousel" class="carousel slide">
				<ol class="carousel-indicators">
					<li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#homeCarousel" data-slide-to="1"></li>
					<li data-target="#homeCarousel" data-slide-to="2"></li>
				</ol>

				<!-- Carousel items -->
				<div class="carousel-inner">
					<div class="active item"><img src="http://placehold.it/580x295" width="100%"></div>
					<div class="item"><img src="http://placehold.it/580x295" width="100%"></div>
					<div class="item"><img src="http://placehold.it/580x295" width="100%"></div>
				</div>

				<!-- Carousel nav -->
				<a class="carousel-control left" href="#homeCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#homeCarousel" data-slide="next">&rsaquo;</a>
			</div>

            <?php the_content(); ?>

        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>

<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

    <div id="menuAccordion" class="menu accordion">

        <?php $first = true; ?>

        <?php while(have_posts()) : the_post(); ?>


            <div class="accordion-group menu-item">
                <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#menuAccordion" href="#collapse<?php echo get_the_ID(); ?>">
                        <img src="http://lorempixel.com/24/24/food/" alt="" />
                        <?php the_title(); ?>
                    </a>
                </div>
                <div id="collapse<?php echo get_the_ID(); ?>" class="accordion-body collapse <?php if ($first) echo 'in'; ?>">
                    <div class="accordion-inner">
                        <div class="menu-item-image">
                            <?php 
                                $detector = new Mobile_Detect();
                                if ($detector->isMobile()) {
                                    ?>

                                    <img src="http://lorempixel.com/580/580/food/580x580" alt="" width="100%" />

                                    <?php
                                } else {
                                    ?>
                                    
                                    <a href="#modal<?php echo get_the_ID(); ?>" data-toggle="modal" role="button">
                                        <img src="http://lorempixel.com/580/580/food/580x580" alt="" width="100%" />
                                    </a>

                                    <div class="modal hide" id="modal<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-header">
                                            <?php the_title(); ?>
                                        </div>

                                        <div class="modal-body">
                                            <img src="http://lorempixel.com/600/400/food/600x400" alt="" width="100%" />
                                        </div>
                                    </div>

                                    <?php
                                }
                            ?>                            
                        </div>
                        <div class="menu-item-content">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse orci erat, commodo id condimentum at, ultrices at nunc. Aliquam ultricies ligula id arcu eleifend viverra.</div>
                    </div>
                </div>
            </div>

        <?php $first = false; ?>
        <?php endwhile; ?>

    </div>

    <a class="btn right" href="http://www.thuisbezorgd.nl/petit-mondial">Bestellen</a>

<?php endif; ?>

<?php get_footer(); ?>
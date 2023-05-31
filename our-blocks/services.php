<!-- Services Placeholder Front Page-->

<!-- This code displays the section title -->
<div>
    <h2 class="headline headline--small-plus t-center animated slideInUp">Our Services</h2>
</div>

<!-- This code queries for and displays the services post type -->
<div class="full-width-split group">
    <div class="full-width-split__one">
        <div class="homepage-services-layout">
            <?php
            $homepageServices = new WP_Query(
                array(
                    'posts_per_page' => 4,
                    'post_type' => 'services',
                    'orderby' => 'title',
                    'order' => 'ASC'
                )
            );

            while ($homepageServices->have_posts()) {
                $homepageServices->the_post(); ?>

                <!-- This code displays the details of each service post -->
                <div class="event-summary__content my-custom-placeholder animated slideInUp">
                    <div class=" service-cards">
                        <?php the_post_thumbnail('serviceIcon'); ?>
                    </div>
                    <h5 class="event-summary__title headline headline--tiny" style="text-align: center;"><a
                            href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h5>

                    <!-- This code displays a button to view all services -->
                    <p>
                        <?php echo wp_trim_words(get_the_content(), 16); ?><a href="<?php the_permalink(); ?>"
                            class="nu gray">
                            Read more</a>
                    </p>
                </div>
            <?php }

            ?>
        </div>
    </div>
</div>

<p class="t-center no-margin my-custom-placeholder animated slideInUp"><a
        href="<?php echo get_post_type_archive_link('services') ?>" class="btn btn--light-blue">View
        All
        Services</a></p>


<!-- This code displays a horizontal line -->
<hr>
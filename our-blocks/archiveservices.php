<!-- All Serices Page -->

<?php

// Display the page banner with title and subtitle
pageBanner(
    array(
        'title' => 'All Services',
        'subtitle' => 'We Fix Computers and Teach Tech: Hardware, Software, and DIY Builds'
    )
);
?>

<!-- Display the section heading for all services -->
<div>
    <h2 class="headline headline--small-plus t-center my-custom-placeholder animated slideInUp"
        data-animation-delay="500">All Our Services</h2>
</div>

<div class=" full-width-split group">
    <div class="full-width-split__one">
        <div class="homepage-services-layout">
            <?php

            // Query all services, ordered by title, and without pagination
            $args = array(
                'post_type' => 'services',
                'orderby' => 'title',
                'order' => 'ASC',
                'posts_per_page' => -1
            );
            $query = new WP_Query($args);

            // Loop through all services and display them as cards
            while ($query->have_posts()) {
                $query->the_post();
                ?>

                <div class="event-summary__content my-custom-placeholder animated slideInUp" data-animation-delay="500">
                    <div class="service-cards">

                        <!-- Display the service icon thumbnail -->
                        <?php the_post_thumbnail('serviceIcon'); ?>
                    </div>
                    <h5 class="event-summary__title headline headline--tiny" style="text-align: center;"><a
                            href="<?php the_permalink(); ?>">

                            <!-- Display the service title as a link to its page -->
                            <?php the_title(); ?>
                        </a>
                    </h5>
                    <p>

                        <!-- Display an excerpt of the service content -->
                        <?php echo wp_trim_words(get_the_content(), 16); ?><a href="<?php the_permalink(); ?>"
                            class="nu gray">
                            Read more</a>
                    </p>
                </div>

            <?php }

            // Display pagination links and reset post data
            echo paginate_links();
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>
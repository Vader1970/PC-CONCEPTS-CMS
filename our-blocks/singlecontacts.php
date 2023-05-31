<?php

// Loop through each post
while (have_posts()) {

    // Set up the current post as the post being iterated
    the_post();

    // Display the page banner
    pageBanner(); ?>


    <!-- Create a container for the content -->
    <div class="container container--narrow page-section my-custom-placeholder animated fadeInLeft"
        data-animation-delay="1000">

        <!-- Create a metabox that links back to the "Contacts" page and display the current page's title -->
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('contacts'); ?>"><i
                        class="fa fa-home" aria-hidden="true"></i> Contact Us
                </a> <span class="metabox__main">
                    <?php the_title(); ?>
                </span>
            </p>
        </div>

        <!-- Display the page's content -->
        <div class="generic-content">
            <?php the_content(); ?>
        </div>

        <?php

        // Get the map location for the current post
        $mapLocation = get_field('map_location');
        ?>

        <!-- Display the map using the Advanced Custom Fields plugin -->
        <div class="acf-map">
            <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
                <h3>
                    <?php the_title(); ?>
                </h3>
                <?php echo $mapLocation['address']; ?>
            </div>
        </div>

        <?php

        // Get all programs related to the current post
        $relatedPrograms = new WP_Query(
            array(
                'posts_per_page' => -1,
                'post_type' => 'program',
                'orderby' => 'title',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'related_location',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                    )
                )
            )
        );

        // If there are related programs, display them in a list
        if ($relatedPrograms->have_posts()) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium">Programs Available At This Location</h2>';

            echo '<ul class="min-list link-list">';
            while ($relatedPrograms->have_posts()) {

                // Set up the current post as the post being iterated
                $relatedPrograms->the_post(); ?>
                <li>

                    <!-- Display a link to the program's page -->
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </li>
            <?php }
            echo '</ul>';
        }

        // Reset the post data for the related programs loop
        wp_reset_postdata();
        ?>
    </div>

<?php }
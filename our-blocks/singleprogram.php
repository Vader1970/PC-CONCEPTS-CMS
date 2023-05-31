<?php

while (have_posts()) {
    the_post();

    // Display the page banner
    pageBanner();
    ?>

    <!-- Display a metabox with a link to the program archive and the current program title -->
    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i
                        class="fa fa-home" aria-hidden="true"></i> All Programs</a> <span class="metabox__main">
                    <?php the_title(); ?>
                </span></p>
        </div>

        <!-- Display the main body content -->
        <div class="generic-content my-custom-placeholder animated zoomIn">
            <?php the_field('main_body_content'); ?>
        </div>

        <?php

        // Query related tutors
        $relatedTutors = new WP_Query(
            array(
                'posts_per_page' => -1,
                'post_type' => 'tutor',
                'orderby' => 'title',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'related_programs',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                    )
                )
            )
        );

        // Display related tutors if available
        if ($relatedTutors->have_posts()) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium my-custom-placeholder animated fadeInRight">' . get_the_title() . ' Tutors</h2>';


            echo '<ul class="tutor-cards my-custom-placeholder animated zoomIn">';
            while ($relatedTutors->have_posts()) {
                $relatedTutors->the_post(); ?>
                <li class="tutor-card__list-item">
                    <a class="tutor-card" href="<?php the_permalink(); ?>">
                        <img class="tutor-card__image" src="<?php the_post_thumbnail_url('tutorLandscape') ?>">
                        <span class="tutor-card__name">
                            <?php the_title(); ?>
                        </span>
                    </a>
                </li>
            <?php }
            echo '</ul>';
        }

        // Reset the post data
        wp_reset_postdata();

        // Query upcoming workshops related to the current program
        $today = date('Ymd');
        $homepageWorkshops = new WP_Query(
            array(
                'posts_per_page' => -1,
                'post_type' => 'workshops',
                'meta_key' => 'event_date',
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                    ),
                    array(
                        'key' => 'related_programs',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                    )
                )
            )
        );

        // Display upcoming workshops if available
        if ($homepageWorkshops->have_posts()) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium my-custom-placeholder animated fadeInLeft">Upcoming ' . get_the_title() . ' Workshops</h2>';

            // Loop through upcoming workshops
            while ($homepageWorkshops->have_posts()) {
                $homepageWorkshops->the_post();

                // Use template part to display workshop content
                get_template_part('template-parts/content-workshop');
            }
        }

        // Reset post data
        wp_reset_postdata();

        // Get related locations
        $relatedLocations = get_field('related_location');

        // Display related locations if available
        if ($relatedLocations) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium my-custom-placeholder animated slideInDown">' . get_the_title() . ' is Available At These Location:</h2>';

            // Loop through related locations and display as links
            echo '<ul class="min-list link-list my-custom-placeholder animated slideInDown">';
            foreach ($relatedLocations as $location) {
                ?>
                <li><a href="<?php echo get_the_permalink($location); ?>"><?php echo get_the_title($location) ?></a></li>
                <?php
            }
            echo '</ul>';

        }

        ?>

    </div>

<?php }
<?php

// Loop through all the posts
while (have_posts()) {

    // Get the current post
    the_post();

    // Display the page banner
    pageBanner();
    ?>

    </div>

    <div class="container container--narrow page-section">

        <div class="generic-content">
            <div class="row group">

                <!-- Display the tutor's portrait -->
                <div class="one-third my-custom-placeholder animated fadeInLeft">
                    <?php the_post_thumbnail('tutorPortrait'); ?>
                </div>

                <!-- Display the tutor's content -->
                <div class="two-thirds">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>

        <?php

        // Get the related programs
        $relatedPrograms = get_field('related_programs');

        // Check if there are related programs and display them
        if ($relatedPrograms) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium my-custom-placeholder animated fadeInUp">Subject(s) Taught</h2>';
            echo '<ul class="link-list min-list my-custom-placeholder animated fadeInUp">';

            // Loop through the related programs
            foreach ($relatedPrograms as $program) { ?>
                <li><a href="<?php echo get_the_permalink($program); ?>">
                        <?php echo get_the_title($program); ?>
                    </a></li>
                <?php
            }
            echo '</ul>';
        }


        ?>

    </div>

<?php }
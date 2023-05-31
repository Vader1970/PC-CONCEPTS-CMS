<!-- Single Workshop Page -->

<?php

// Start the loop to display the single post
while (have_posts()) {
    the_post();

    // Display the page banner
    pageBanner();
    ?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('workshops'); ?>"><i
                        class="fa fa-home" aria-hidden="true"></i> Workshops Home
                </a> <span class="metabox__main">
                    <?php the_title(); ?>
                </span>
            </p>
        </div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>

        <!-- Get the related programs and display them -->
        <?php
        $relatedPrograms = get_field('related_programs');

        if ($relatedPrograms) {
            echo '<hr class="section-break">';
            echo '<h2 class="headline headline--medium my-custom-placeholder animated zoomIn">Related Program(s)</h2>';
            echo '<ul class="link-list min-list my-custom-placeholder animated zoomIn">';
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

    <?php

    // End the loop
}
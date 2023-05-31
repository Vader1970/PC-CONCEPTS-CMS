<!-- Single Service Page -->

<?php

// Loop through all the available posts
while (have_posts()) {
    the_post();

    // Display the banner for the current page
    pageBanner(); ?>

    <div class="container container--narrow page-section">
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>

                <!-- Add a link to the Services archive page -->
                <a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('services'); ?>"><i
                        class="fa fa-home" aria-hidden="true"></i> Services Home
                </a>

                <!-- Display the current page's title -->
                <span class="metabox__main">
                    <?php the_title(); ?>
                </span>
            </p>
        </div>
        <div>

            <h2 class="headline headline--small-plus t-center" style="margin-bottom: 0px;">
                <?php the_title(); ?>
            </h2>
            <div class="service-cards">
                <?php the_post_thumbnail('serviceIcon'); ?>
            </div>

        </div>

        <div class="generic-content">
            <?php the_content(); ?>
        </div>

    </div>

<?php }
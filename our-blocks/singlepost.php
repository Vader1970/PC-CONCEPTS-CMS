<!-- Blog Single Page -->

<?php

// Loop through all the posts
while (have_posts()) {

    // Set up the current post
    the_post();

    // Display the page banner
    pageBanner(); ?>

    <!-- Container for the post content -->
    <div class="container container--narrow page-section my-custom-placeholder">

        <!-- Metabox with post information -->
        <div class="metabox metabox--position-up metabox--with-home-link">
            <p>

                <!-- Link to the blog home page -->
                <a class="metabox__blog-home-link" href="<?php echo esc_url(site_url('/blog')); ?>"><i class="fa fa-home"
                        aria-hidden="true"></i> Blog Home

                    <!-- Post information -->
                </a> <span class="metabox__main">
                    Posted by
                    <?php the_author_posts_link(); ?> on
                    <?php the_time('j.n.y'); ?> in
                    <?php echo get_the_category_list(', '); ?>
                </span>
            </p>
        </div>

        <!-- The content of the post -->
        <div class="generic-content">
            <?php the_content(); ?>
        </div>

    </div>

<?php }
<!-- A section with the heading "Our Blogs" -->
<div>
    <h2 class="headline headline--small-plus t-center animated zoomIn">Our Blogs</h2>
</div>

<!-- A section with four blog posts -->
<div class="full-width-split group animated zoomIn">
    <div class="full-width-split__one">
        <div class="homepage-services-layout">
            <?php

            // Query for 4 latest blog posts
            $homepagePosts = new WP_Query(
                array(
                    'posts_per_page' => 4
                )
            );

            // Loop through each post and display its information
            while ($homepagePosts->have_posts()) {
                $homepagePosts->the_post(); ?>
                <div class="event-summary">

                    <!-- Date of the blog post -->
                    <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                        <span class="event-summary__month">
                            <?php the_time('M'); ?>
                        </span>
                        <span class="event-summary__day">
                            <?php the_time('d'); ?>
                        </span>
                    </a>
                    <div class="event-summary__content my-custom-placeholder animated zoomIn">

                        <!-- Title of the blog post -->
                        <h5 class=" event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h5>

                        <!-- Excerpt of the blog post -->
                        <p>
                            <?php if (has_excerpt()) {
                                echo get_the_excerpt();
                            } else {
                                echo wp_trim_words(get_the_content(), 16);
                            }
                            ?><a href="<?php the_permalink(); ?>" class="nu gray"> Read more</a>
                        </p>
                    </div>
                </div>
            <?php }
            wp_reset_postdata();
            ?>
        </div>
    </div>
</div>

<!-- A button to view all blog posts -->
<div>
    <p class="t-center no-margin my-custom-placeholder animated slideInUp"><a href="<?php echo site_url('/blog'); ?>"
            class="btn btn--yellow">View All Blog
            Posts</a></p>
</div>

<!-- A horizontal rule to separate the section -->
<hr>
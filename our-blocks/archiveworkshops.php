<!-- All Workshops Page -->

<?php

// Display page banner with title and subtitle
pageBanner(
    array(
        'title' => 'All Workshops',
        'subtitle' => 'Keep an eye out for upcoming workshops.'
    )
); ?>

<div>
    <!-- Display section heading -->
    <h2 class="headline headline--small-plus t-center my-custom-placeholder animated zoomIn">
        All Our Workshops</h2>
</div>

<!-- Display full width split group -->
< <div class=" full-width-split group animated zoomIn">
    <div class="full-width-split__one">
        <!-- Display workshops layout -->
        <div class="homepage-services-layout">

            <?php

            // Loop through all posts of type "workshops"
            while (have_posts()) {
                the_post();

                // Get template part for displaying workshop content
                get_template_part('template-parts/content-workshop');
            }

            // Display pagination links
            echo paginate_links();
            ?>

            <hr class="section-break">


            <!-- Display link to past workshops archive page -->
            <p>Looking for a recap of past workshops? <a href="<?php echo site_url('/past-workshops') ?>">Check out
                    our past
                    workshops
                    archive</a>.</P>
        </div>
    </div>
    </div>
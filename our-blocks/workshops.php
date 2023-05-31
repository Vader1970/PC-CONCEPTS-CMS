<!-- Workshops Placeholder Front Page -->

<!--Displays section heading-->
<div>
    <h2 class="headline headline--small-plus t-center animated zoomIn">Our Upcoming
        Workshops</h2>
</div>

<!--Displays upcoming workshops in a grid layout-->
<div class="full-width-split group animated zoomIn">
    <div class="full-width-split__one">
        <div class="homepage-services-layout">
            <?php

            // Queries for workshops that have not yet occurred, orders them by date, and limits to 4 posts
            $today = date('Ymd');
            $homepageWorkshops = new WP_Query(
                array(
                    'posts_per_page' => 4,
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
                        )
                    )
                )
            );

            // Displays each workshop in a specific format
            while ($homepageWorkshops->have_posts()) {
                $homepageWorkshops->the_post();
                get_template_part('template-parts/content', 'workshop');
            }
            ?>
        </div>
    </div>
</div>

<!--Displays a button to view all workshops-->
<p class="t-center no-margin my-custom-placeholder animated slideInUp"><a
        href="<?php echo get_post_type_archive_link('workshops') ?>" class="btn btn--blue">View
        All
        Workshops</a></p>

<!--Displays a horizontal rule-->
<hr>
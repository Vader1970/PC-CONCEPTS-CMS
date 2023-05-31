<?php

// Output a banner with the title "Past Workshops" and the subtitle "A recap of our past workshops."
pageBanner(
    array(
        'title' => 'Past Workshops',
        'subtitle' => 'A recap of our past workshops.'
    )
);
?>

<div class="container container--narrow page-section">
    <?php

    // Get all past workshops ordered by event date in ascending order
    $today = date('Ymd');
    $pastWorkshops = new WP_Query(
        array(
            'paged' => get_query_var('paged', 1),
            'post_type' => 'workshops',
            'meta_key' => 'event_date',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '<',
                    'value' => $today,
                    'type' => 'numeric'
                )
            )
        )
    );

    // Loop through all past workshops and display their content
    while ($pastWorkshops->have_posts()) {
        $pastWorkshops->the_post();
        get_template_part('template-parts/content-workshop');
    }

    // Output pagination links for the past workshops
    echo paginate_links(
        array(
            'total' => $pastWorkshops->max_num_pages
        )
    );
    ?>
</div>
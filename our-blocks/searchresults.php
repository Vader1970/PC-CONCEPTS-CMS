<?php

// Display the page banner with the search results title and subtitle
pageBanner(
    array(
        'title' => 'Search Results',
        'subtitle' => 'You searched for &ldquo;' . esc_html(get_search_query(false)) . '&rdquo;'
    )
);
?>

<div class="container container--narrow page-section">
    <?php
    if (have_posts()) {

        // Loop through the search results and display each post's content
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', get_post_type());
        }

        // Display pagination links
        echo paginate_links();
    } else {
        // Display a message if no search results are found
        echo '<h2 class="headline headline--small-plus">No results match that search.</h2>';
    }

    // Display the search form
    get_search_form();

    ?>

</div>
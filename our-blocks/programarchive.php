<?php

// Displays the page banner with the given title and subtitle
pageBanner(
    array(
        'title' => 'All Programs',
        'subtitle' => 'There is something for everyone. Have a look around.'
    )
);
?>

<!-- Main content section -->
<div class="container container--narrow page-section my-custom-placeholder animated zoomIn">

    <!-- Unordered list of program links -->
    <ul class="link-list min-list">

        <?php

        // Loop through each program post and display a link to it
        while (have_posts()) {
            the_post(); ?>
            <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
        <?php }

        // Display pagination links for program posts
        echo paginate_links();
        ?>
    </ul>



</div>
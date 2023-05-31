<?php

// Displays a page banner with a title and subtitle
pageBanner(
    array(
        'title' => 'Contact Us',
        'subtitle' => 'Click on map locators to find our locations'
    )
);
?>

<div class="container container--narrow page-section my-custom-placeholder animated zoomIn">

    <div class="acf-map">

        <?php
        // Loop through the posts and display a marker for each post's map location
        while (have_posts()) {
            the_post();
            $mapLocation = get_field('map_location')
                ?>
            <div class="marker" data-lat="<?php echo $mapLocation['lat'] ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
                <h3>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h3>
                <?php echo $mapLocation['address']; ?>
            </div>
        <?php } ?>
    </div>
</div>
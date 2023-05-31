<?php

// Display the page banner with the given title and subtitle
pageBanner(
    array(
        'title' => 'Welcome to our blog!',
        'subtitle' => 'Keep up with our latest news.'
    )
);
?>

<div class="container container--narrow page-section">
    <?php

    // Loop through each post and display its title, author, date, category, excerpt, and a "Continue reading" button
    while (have_posts()) {
        the_post(); ?>
        <div class="post-item animated zoomIn">
            <h2 class="headline headline--medium headline--post-title my-custom-placeholder"><a
                    href=" <?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <div class="metabox my-custom-placeholder">
                <p>Posted by
                    <?php the_author_posts_link(); ?> on
                    <?php the_time('j.n.y'); ?> in
                    <?php echo get_the_category_list(', '); ?>
                </p>
            </div>

            <div class="generic-content my-custom-placeholder">
                <?php the_excerpt(); ?>
                <p class="my-custom-placeholder"><a class="btn btn--blue" href=" <?php the_permalink(); ?>">Continue reading
                        &raquo;</a></p>
            </div>
        </div>
    <?php }

    // Display pagination links at the bottom of the page
    echo paginate_links();
    ?>
</div>
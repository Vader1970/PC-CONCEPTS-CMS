<?php

// Display the page banner with the archive title and description
pageBanner(
    array(
        'title' => get_the_archive_title(),
        'subtitle' => get_the_archive_description()
    )
);
?>

<div class="container container--narrow page-section">
    <?php

    // Loop through the posts in the archive
    while (have_posts()) {
        the_post(); ?>
        <div class="post-item">

            <!-- Display the post title with a link to the full post -->
            <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

            <div class="metabox">
                <!-- Display the post author, date, and categories -->
                <p>Posted by
                    <?php the_author_posts_link(); ?> on
                    <?php the_time('n.j.y'); ?> in
                    <?php echo get_the_category_list(', '); ?>
                </p>
            </div>

            <div class="generic-content">

                <!-- Display the post excerpt and a link to the full post -->
                <?php the_excerpt(); ?>
                <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Continue reading &raquo;</a></p>
            </div>

        </div>
    <?php }

    // Display pagination links if there are more posts than the current page can display
    echo paginate_links();
    ?>
</div>
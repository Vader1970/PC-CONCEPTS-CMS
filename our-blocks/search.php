<?php

while (have_posts()) {
    the_post();

    // Display the banner for the current page/post
    pageBanner();
    ?>

    <div class="container container--narrow page-section">

        <?php

        // Get the ID of the parent page (if there is one)
        $theParent = wp_get_post_parent_id(get_the_ID());

        // If the current page has a parent, display a link to the parent page
        if ($theParent) { ?>
            <div class="metabox metabox--position-up metabox--with-home-link">

                <!-- Link back to the parent page -->
                <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home"
                            aria-hidden="true"></i> Back to
                        <?php echo get_the_title($theParent); ?>

                        <!-- Display the current page title -->
                    </a> <span class="metabox__main">
                        <?php the_title(); ?>
                    </span></p>
            </div>
        <?php }
        ?>

        <?php

        // Get an array of all child pages for the current page
        $testArray = get_pages(
            array(
                'child_of' => get_the_ID()
            )
        );

        // If the current page has a parent or child pages, display a list of links to those pages
        if ($theParent or $testArray) { ?>
            <div class="page-links">

                <!-- Display the parent page title as the section heading -->
                <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
                <ul class="min-list">
                    <?php

                    // If the current page has a parent, set $findChildrenOf to the parent ID; otherwise, set it to the current page ID
                    if ($theParent) {
                        $findChildrenOf = $theParent;
                    } else {
                        $findChildrenOf = get_the_ID();
                    }

                    // Display a list of child pages (if any)
                    wp_list_pages(
                        array(
                            'title_li' => NULL,
                            'child_of' => $findChildrenOf,
                            'sort_column' => 'menu_order'
                        )
                    );
                    ?>
                </ul>
            </div>
        <?php } ?>

        <div class="generic-content">

            <!-- Display a search form -->
            <form class="search-form" method="get" action="<?php echo esc_url(site_url('/')); ?>">
                <label class="headline headline--medium" for="s">Perform a New Search:</label>
                <div class="search-form-row">
                    <input placeholder="What are you looking for?" class="s" id="s" type="search" name="s">
                    <input class="search-submit" type="submit" value="Search">
                </div>
            </form>
        </div>
    </div>

<?php }
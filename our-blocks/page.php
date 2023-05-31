<?php

// Loop through each post
while (have_posts()) {

    // Set up the current post
    the_post();

    // Output the page banner
    pageBanner();
    ?>



    <div class="container container--narrow page-section my-custom-placeholder animated fadeInLeft">

        <?php

        // Get the ID of the current post's parent
        $theParent = wp_get_post_parent_id(get_the_ID());

        // If the post has a parent, output a metabox with a link to the parent
        if ($theParent) { ?>
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p><a class=" metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home"
                            aria-hidden="true"></i> Back to
                        <?php echo get_the_title($theParent); ?>
                    </a> <span class="metabox__main">
                        <?php the_title(); ?>
                    </span></p>
            </div>
        <?php }
        ?>



        <?php

        // Get an array of child pages of the current post
        $testArray = get_pages(
            array(
                'child_of' => get_the_ID()
            )
        );

        if ($theParent or $testArray) { ?>
            <div class="page-links">
                <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent); ?>"><?php echo get_the_title($theParent); ?></a></h2>
                <ul class="min-list">
                    <?php

                    // If the current post has a parent, find its children. Otherwise, find the current post's children.
                    if ($theParent) {
                        $findChildrenOf = $theParent;
                    } else {
                        $findChildrenOf = get_the_ID();
                    }

                    // Output a list of child pages
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
            <?php the_content(); ?>
        </div>

    </div>

<?php }
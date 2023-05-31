<!-- This is a container for a single post item -->
<div class="post-item">

    <!-- This is the title of the post, which is linked to the post's individual page -->
    <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <!-- This is the excerpt of the post, which is a short summary -->
    <div class="generic-content">
        <?php the_excerpt(); ?>

        <!-- This is a button that links to the post's individual page -->
        <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">View locations &raquo;</a></p>
    </div>

</div>
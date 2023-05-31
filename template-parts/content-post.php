<!-- This is a container for a single post item -->
<div class="post-item">

    <!-- This is the title of the post, which is linked to the post's individual page -->
    <h2 class="headline headline--medium headline--post-title"><a href=" <?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

    <!-- This is a metabox that displays information about the post's author, date, and category -->
    <div class="metabox">
        <p>Posted by

            <!-- This is a link to the post's author archive page -->
            <?php the_author_posts_link(); ?> on

            <!-- This displays the date the post was published -->
            <?php the_time('j.n.y'); ?> in

            <!-- This displays a comma-separated list of the post's categories -->
            <?php echo get_the_category_list(', '); ?>
        </p>
    </div>

    <!-- This is the excerpt of the post, which is a short summary -->
    <div class="generic-content">
        <?php the_excerpt(); ?>

        <!-- This is a button that links to the post's individual page -->
        <p><a class="btn btn--blue" href=" <?php the_permalink(); ?>">Continue reading &raquo;</a></p>
    </div>
</div>
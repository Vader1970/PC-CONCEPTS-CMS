<!-- This is a container for an event summary -->
<div class="event-summary">

    <!-- This is the date of the event -->
    <a class="event-summary__date t-center" href="#"></a>

    <!-- This is the content of the event summary -->
    <div class="event-summary__content my-custom-placeholder animated fadeInUp">

        <!-- This is the title of the event, which is linked to the event's individual page -->
        <h5 class=" event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <p>

            <!-- This displays either the excerpt or a truncated version of the event's content -->
            <?php if (has_excerpt()) {
                echo get_the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 16);

                // This is a link to the event's individual page
            } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
        </p>
    </div>
</div>
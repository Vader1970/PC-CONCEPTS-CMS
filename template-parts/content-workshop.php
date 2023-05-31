<!-- This is a container for an event summary with a date and content -->
<div class="event-summary">

    <!-- This is the date section of the event summary, displaying the month and day of the event -->
    <a class="event-summary__date t-center" href="#">
        <span class="event-summary__month">
            <?php
            $eventDate = new DateTime(get_field('event_date'));
            echo $eventDate->format('M')
                ?>
        </span>
        <span class="event-summary__day">
            <?php echo $eventDate->format('d') ?>
        </span>
    </a>

    <!-- This is the content section of the event summary, displaying the title and excerpt of the event -->
    <div class="event-summary__content my-custom-placeholder animated zoomIn">
        <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
        <p>
            <?php if (has_excerpt()) {
                echo get_the_excerpt();
            } else {
                echo wp_trim_words(get_the_content(), 16);
            } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a>
        </p>
    </div>
</div>
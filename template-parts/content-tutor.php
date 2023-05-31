<!-- This is a container for a post item -->
<div class="post-item>
    <li class=" tutor-card__list-item">

    <!-- This is a link to the individual tutor card's page -->
    <a class="tutor-card" href="<?php the_permalink(); ?>">

        <!-- This is the tutor card's image, which is the featured image of the post -->
        <img class="tutor-card__image" src="<?php the_post_thumbnail_url('tutorLandscape') ?>">

        <!-- This is the name of the tutor -->
        <span class="tutor-card__name">
            <?php the_title(); ?>
        </span>
    </a>
    </li>
</div>
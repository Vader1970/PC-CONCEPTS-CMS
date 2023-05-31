<?php

// Set a default image URL if none is provided
if (!isset($attributes['imgURL'])) {
    $attributes['imgURL'] = get_theme_file_uri('/images/keyboard-hero.jpg');
}

?>

<div class="page-banner">

    <!-- Display the background image using the provided or default URL -->
    <div class="page-banner__bg-image" style="background-image: url('<?php echo $attributes['imgURL'] ?>')"></div>

    <!-- Display the content inside a white container with centered text -->
    <div class="page-banner__content container t-center c-white">
        <?php echo $content; ?>
    </div>
</div>
<?php


// Check if a theme image is set in the attributes
if ($attributes['themeimage']) {

    // If so, set the 'imgURL' attribute to the URL of the theme image
    $attributes['imgURL'] = get_theme_file_uri('/images/' . $attributes['themeimage']);
}

// If 'imgURL' attribute is still not set, set it to the URL of a default image
if (!$attributes['imgURL']) {
    $attributes['imgURL'] = get_theme_file_uri('/images/keyboard-hero.jpg');
}

?>

<!-- Display a slider slide with background image set to 'imgURL' -->
<div class="hero-slider__slide" style="background-image: url('<?php echo $attributes['imgURL'] ?>')">
    <div class="hero-slider__interior container">
        <div class="hero-slider__overlay t-center">
            <?php echo $content; ?>
        </div>
    </div>
</div>
<!-- This div contains the hero slider with a custom class and animations -->
<div class="hero-slider my-custom-placeholder animated fadeInUp">

    <!-- This div contains the track for the slider with a custom class -->
    <div data-glide-el="track" class="glide__track">

        <!-- This div contains the slides for the slider -->
        <div class="glide__slides">

            <!-- This php statement outputs the content of the slider -->
            <?php echo $content; ?>
        </div>

        <!-- This div contains the navigation bullets for the slider with a custom class -->
        <div class="slider__bullets glide__bullets" data-glide-el="controls[nav]">
        </div>
    </div>
</div>
<?php

// require search-route.php file
require get_theme_file_path('/inc/search-route.php');
function pcconcepts_custom_rest()
{
    // define custom rest field
    register_rest_field(
        // target post type
        'post',
        // field name
        'authorName',
        array(
            'get_callback' => function () {
                return get_the_author();
            }
        )
    );
}

// add custom rest field
add_action('rest_api_init', 'pcconcepts_custom_rest');

// define pageBanner function
function pageBanner($args = NULL)
{
    // set default values for function arguments
    if (!isset($args['title'])) {
        $args['title'] = get_the_title();
    }

    if (!isset($args['subtitle'])) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }

    if (!isset($args['photo'])) {
        // set default banner image
        if (get_field('page_banner_background_image') and !is_archive() and !is_home()) {
            $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/keyboard-hero.jpg');
        }
    }

    // output page banner HTML
    ?>
    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);">
        </div>
        <div class="page-banner__content container container--narrow">

            <h1 class="page-banner__title">
                <?php echo $args['title'] ?>
            </h1>
            <div class="page-banner__intro">
                <p>
                    <?php echo $args['subtitle']; ?>
                </p>
            </div>
        </div>
    </div>
<?php }

// enqueue necessary scripts and styles
function pc_concepts_files()
{
    // enqueue Google Maps API
    wp_enqueue_script('googleMap', '//maps.googleapis.com/maps/api/js?key=, NULL, '1.0', true);

    // enqueue main JavaScript file
    wp_enqueue_script('main-pc-concepts-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);

    // enqueue Google Fonts
    wp_enqueue_style('Roboto_Google_Font', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');

    // enqueue Font Awesome icons
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

    // enqueue main styles and additional styles
    wp_enqueue_style('pc_concepts_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('pc_concepts_extra_styles', get_theme_file_uri('/build/index.css'));

    // localize main JavaScript file with root URL for later use
    wp_localize_script(
        'main-pc-concepts-js',
        'pcconceptsData',
        array(
            'root_url' => get_site_url()
        )
    );

}

// Add custom scripts and file
add_action('wp_enqueue_scripts', 'pc_concepts_files');

// add necessary theme features
function pc_concepts_features()
{
    // enable dynamic title tags
    add_theme_support('title-tag');

    // enable featured images
    add_theme_support('post-thumbnails');

    // add custom image sizes
    add_image_size('tutorLandscape', 300, 300, true);
    add_image_size('tutorPortrait', 480, 650, true); // Name, width, height, crop
    add_image_size('serviceIcon', 48, 48, true);
    add_image_size('serviceIcon', 48, 48, true);
    add_image_size('pageBanner', 1500, 350, true);

    // Add theme support for editor styles
    add_theme_support('editor-styles');

    // Google fonts
    add_editor_style(array('https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i', 'build/style-index.css', 'build/index.css'));
}

// Add custom features
add_action('after_setup_theme', 'pc_concepts_features');

// Adjust queries
function pc_concepts_adjust_queries($query)
{
    // Modify query for post type 'contacts'
    if (!is_admin() and is_post_type_archive('contacts') and is_main_query()) {
        $query->set('posts_per_page', -1);
    }

    // Modify query for post type 'program'
    if (!is_admin() and is_post_type_archive('program') and is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('posts_per_page', -1);
    }

    // Modify query for post type 'workshops'
    if (!is_admin() and is_post_type_archive('workshops') and $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set(
            'meta_query',
            array(
                array(
                    'key' => 'event_date',
                    'compare' => '>=',
                    'value' => $today,
                    'type' => 'numeric'
                )
            )
        );
    }

}

// Add action to adjust queries
add_action('pre_get_posts', 'pc_concepts_adjust_queries');

// Set API key for Google Maps
function pcconceptMapKey($api)
{
    $api['key'] = 'AIzaSyABcbC2p5eGsmXmebTSFq77PvbmOG0e9-Q';
    return $api;
}

// Add filter to set API key for Google Maps
add_filter('acf/fields/google_map/api', 'pcconceptMapKey');

// Placeholder block class
class PlaceholderBlock
{
    function __construct($name)
    {
        $this->name = $name;
        add_action('init', [$this, 'onInit']);
    }

    function ourRenderCallback($attributes, $content)
    {
        ob_start();
        require get_theme_file_path("/our-blocks/{$this->name}.php");
        return ob_get_clean();
    }

    function onInit()
    {
        // Register script
        wp_register_script($this->name, get_stylesheet_directory_uri() . "/our-blocks/{$this->name}.js", array('wp-blocks', 'wp-editor'));

        // Register block type
        register_block_type(
            "ourblocktheme/{$this->name}",
            array(
                'editor_script' => $this->name,
                'render_callback' => [$this, 'ourRenderCallback']
            )
        );
    }
}

// Create new placeholder blocks
new PlaceholderBlock("blogs");
new PlaceholderBlock("workshops");
new PlaceholderBlock("services");
new PlaceholderBlock("header");
new PlaceholderBlock("footer");
new PlaceholderBlock("singlepost");
new PlaceholderBlock("page");
new PlaceholderBlock("blogindex");
new PlaceholderBlock("programarchive");
new PlaceholderBlock("singleprogram");
new PlaceholderBlock("singletutor");
new PlaceholderBlock("archivecontacts");
new PlaceholderBlock("archiveworkshops");
new PlaceholderBlock("archiveservices");
new PlaceholderBlock("archive");
new PlaceholderBlock("pastworkshops");
new PlaceholderBlock("search");
new PlaceholderBlock("searchresults");
new PlaceholderBlock("singlecontacts");
new PlaceholderBlock("singleworkshops");
new PlaceholderBlock("singleservices");


/**
 * Class to register custom blocks in WordPress.
 */
class JSXBlock
{

    // Constructor function to set up the block.
    // @param string $name Name of the block.
    // @param function $renderCallback Callback function to render the block.
    // @param array $data Optional data to pass to the block.

    function __construct($name, $renderCallback = null, $data = null)
    {
        $this->name = $name;
        $this->data = $data;
        $this->renderCallback = $renderCallback;

        // Register the block on WordPress init hook.
        add_action('init', [$this, 'onInit']);
    }

    // Callback function to render the block.
    // @param array $attributes Block attributes.
    // @param string $content Block content.
    // @return string Rendered HTML output of the block.
    function ourRenderCallback($attributes, $content)
    {
        ob_start();
        require get_theme_file_path("/our-blocks/{$this->name}.php");
        return ob_get_clean();
    }

    //  Function to register the block on WordPress.
    function onInit()
    {
        // Register the block script on WordPress.
        wp_register_script($this->name, get_stylesheet_directory_uri() . "/build/{$this->name}.js", array('wp-blocks', 'wp-editor'));

        // Localize the script if there is data to pass.
        if ($this->data) {
            wp_localize_script($this->name, $this->name, $this->data);
        }

        $ourArgs = array(
            'editor_script' => $this->name
        );

        // Set the render callback if it exists.
        if ($this->renderCallback) {
            $ourArgs['render_callback'] = [$this, 'ourRenderCallback'];
        }

        // Register the block type on WordPress.
        register_block_type("ourblocktheme/{$this->name}", $ourArgs);
    }
}

// Instantiate new blocks.
new JSXBlock('banner', true, ['fallbackimage' => get_theme_file_uri('/images/keyboard-hero.jpg')]);
new JSXBlock('genericheading');
new JSXBlock('genericbutton');
new JSXBlock('slideshow', true);
new JSXBlock('slide', true);

// Exclude node modules from export for deploying live site
add_filter('ai1wm_exclude_content_from_export', 'ignoreCertainFiles');

function ignoreCertainFiles($exclude_filters)
{
    $exclude_filters[] = 'themes/pc-concepts-block-theme/node_modules';
    return $exclude_filters;
}

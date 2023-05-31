<?php

function pc_concepts_post_types()
{

    // Contact Us Post Type
    register_post_type(
        'contacts',
        array(
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'excerpt'),
            'rewrite' => array('slug' => 'contact-us'),
            'has_archive' => true,
            'public' => true,
            'labels' => array(
                'name' => 'Contact Us',
                'add_new_item' => 'Add New Contact',
                'edit_item' => 'Edit Contact',
                'all_items' => 'All Contacts',
                'singular_name' => 'Contact'
            ),
            'menu_icon' => 'dashicons-location-alt'
        )
    );

    // Services Post Type
    register_post_type(
        'services',
        array(
            'has_archive' => true,
            'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
            'public' => true,
            'show_in_rest' => true,
            'labels' => array(
                'name' => 'Services',
                'add_new_item' => 'Add New Service',
                'edit_item' => 'Edit Service',
                'all_items' => 'All Services',
                'singular_name' => 'Service'
            ),
            'menu_icon' => 'dashicons-laptop',
            // Specify a custom menu icon (e.g., generic admin icon)
        )
    );

    // Workshop Post Type
    register_post_type(
        'workshops',
        array(
            'capability_type' => 'workshops',
            'map_meta_cap' => true,
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'excerpt'),
            'rewrite' => array('slug' => 'workshops'),
            'has_archive' => true,
            'public' => true,
            'labels' => array(
                'name' => 'Workshops',
                'add_new_item' => 'Add New Workshop',
                'edit_item' => 'Edit Workshop',
                'all_items' => 'All Workshops',
                'singular_name' => 'Workshop'
            ),
            'menu_icon' => 'dashicons-calendar'
        )
    );

    // Program Post Type
    register_post_type(
        'program',
        array(
            'show_in_rest' => true,
            'supports' => array('title'),
            'rewrite' => array('slug' => 'programs'),
            'has_archive' => true,
            'public' => true,
            'labels' => array(
                'name' => 'Programs',
                'add_new_item' => 'Add New Program',
                'edit_item' => 'Edit Program',
                'all_items' => 'All Programs',
                'singular_name' => 'Program'
            ),
            'menu_icon' => 'dashicons-awards'
        )
    );

    // Tutor Post Type
    register_post_type(
        'tutor',
        array(
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
            'public' => true,
            'labels' => array(
                'name' => 'Tutors',
                'add_new_item' => 'Add New Tutor',
                'edit_item' => 'Edit Tutor',
                'all_items' => 'All Tutors',
                'singular_name' => 'Tutor'
            ),
            'menu_icon' => 'dashicons-welcome-learn-more'
        )
    );

    // Homepage Slide post type
    register_post_type(
        "slide",
        array(
            "supports" => array("title"),
            "public" => true,
            "labels" => array(
                "name" => "Slideshow",
                "add_new_item" => "Add new Slide",
                "edit_item" => "Edit Slide",
                "all_items" => "All Slides",
                "singular_name" => "Slide"
            ),
            "menu_icon" => "dashicons-slides",
        )
    );
}

add_action('init', 'pc_concepts_post_types');
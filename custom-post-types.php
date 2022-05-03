<?php
add_action( 'init', 'custom_post_type_itineraries', 0 ); 
add_action( 'init', 'custom_post_type_safari_types', 0 );
add_action( 'init', 'custom_post_type_lodges', 0 );



// ====== Safari Types
function custom_post_type_safari_types() {

    $labels = array(
        'name'                => _x( 'Experiences', 'Post Type General Name'),
        'singular_name'       => _x( 'Experience',  'Post Type Singular Name'),
        'menu_name'           => __( 'Experiences'),
        'parent_item_colon'   => __( 'Experiences'),
        'all_items'           => __( 'All Experiences'),
        'view_item'           => __( 'View Experiences'),
        'add_new_item'        => __( 'Add New Experience'),
        'add_new'             => __( 'Add Experience' ),
        'edit_item'           => __( 'Edit Experience' ),
        'update_item'         => __( 'Update Experience' ),
        'search_items'        => __( 'Search Experience' ),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );

    $args = array(
        'label'               => __( 'Experiences' ),
        'description'         => __( 'Experiences'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'thumbnail', 'excerpt', 'page-attributes','editor' ),
        'menu_icon'           => 'dashicons-admin-site',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );

    register_post_type( 'safari_types', $args );
}

// ====== Lodges
function custom_post_type_itineraries() {

    $labels = array(
        'name'                => _x( 'Itineraries', 'Post Type General Name'),
        'singular_name'       => _x( 'Itinerary',  'Post Type Singular Name'),
        'menu_name'           => __( 'Itineraries'),
        'parent_item_colon'   => __( 'Itineraries'),
        'all_items'           => __( 'All Itineraries'),
        'view_item'           => __( 'View Itineraries'),
        'add_new_item'        => __( 'Add New Itinerary'),
        'add_new'             => __( 'Add Itinerary' ),
        'edit_item'           => __( 'Edit Itinerary' ),
        'update_item'         => __( 'Update Itinerary' ),
        'search_items'        => __( 'Search Itineraries' ),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );

    $args = array(
        'label'               => __( 'Itineraries' ),
        'description'         => __( 'Itineraries'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'thumbnail', 'page-attributes','editor' ),
        'menu_icon'           => 'dashicons-randomize',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );

    register_post_type( 'itineraries', $args );
}


// ====== Lodges
function custom_post_type_lodges() {

    $labels = array(
        'name'                => _x( 'Lodges', 'Post Type General Name'),
        'singular_name'       => _x( 'Lodge',  'Post Type Singular Name'),
        'menu_name'           => __( 'Lodges'),
        'parent_item_colon'   => __( 'Lodges'),
        'all_items'           => __( 'All Lodges'),
        'view_item'           => __( 'View Lodges'),
        'add_new_item'        => __( 'Add New Lodges'),
        'add_new'             => __( 'Add Lodge' ),
        'edit_item'           => __( 'Edit Lodge' ),
        'update_item'         => __( 'Update Lodge' ),
        'search_items'        => __( 'Search Lodges' ),
        'not_found'           => __( 'Not Found'),
        'not_found_in_trash'  => __( 'Not found in Trash')
    );

    $args = array(
        'label'               => __( 'Lodge' ),
        'description'         => __( 'Lodge'),
        'labels'              => $labels,
        'supports'            => array( 'title', 'taxonomies', 'thumbnail', 'page-attributes','editor' ),
        'menu_icon'           => 'dashicons-admin-multisite',
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page'
    );

    register_post_type( 'lodges', $args );
}
// ====== Type Filter
function taxonomy_destinations() {

    $labels = array(
        'name'              => _x( 'Destinations', 'taxonomy general name' ),
        'singular_name'     => _x( 'Destination', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Destinations'   ),
        'all_items'         => __( 'All Destinations'     ),
        'parent_item'       => __( 'Parent Destination'   ),
        'parent_item_colon' => __( 'Parent Destination:'  ),
        'edit_item'         => __( 'Edit Destination'     ),
        'update_item'       => __( 'Update Destination'   ),
        'add_new_item'      => __( 'Add New Destination'  ),
        'new_item_name'     => __( 'New Destination' ),
        'menu_name'         => __( 'Destinations'         )
    );

    register_taxonomy( 'destinations', array( 'itineraries', 'safari_types', 'lodges' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'destinations', 'hierarchical' => true )
    ));
}
add_action( 'init', 'taxonomy_destinations', 0 );
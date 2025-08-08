<?php
function create_jag_course_post_type() {
    $labels = array(
        'name'                  => _x( 'Courses', 'post type general name', 'ranestarter' ),
        'singular_name'         => _x( 'Course', 'post type singular name', 'ranestarter' ),
        'menu_name'             => _x( 'Courses', 'admin menu', 'ranestarter' ),
        'name_admin_bar'        => _x( 'Course', 'add new on admin bar', 'ranestarter' ),
        'add_new'               => _x( 'Add New', 'course', 'ranestarter' ),
        'add_new_item'          => __( 'Add New Course', 'ranestarter' ),
        'new_item'              => __( 'New Course', 'ranestarter' ),
        'edit_item'             => __( 'Edit Course', 'ranestarter' ),
        'view_item'             => __( 'View Course', 'ranestarter' ),
        'all_items'             => __( 'All Courses', 'ranestarter' ),
        'search_items'          => __( 'Search Courses', 'ranestarter' ),
        'parent_item_colon'     => __( 'Parent Courses:', 'ranestarter' ),
        'not_found'             => __( 'No courses found.', 'ranestarter' ),
        'not_found_in_trash'    => __( 'No courses found in Trash.', 'ranestarter' ),
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => '/course', 'with_front' => false ),
        'capability_type'    => 'post',
        'has_archive'        => 'courses',
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-welcome-learn-more',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    );

    register_post_type( 'jag-course', $args );
}
add_action( 'init', 'create_jag_course_post_type', 0 );

function create_jag_course_category_taxonomy() {
    $labels = array(
        'name'              => _x( 'Course Categories', 'taxonomy general name', 'ranestarter' ),
        'singular_name'     => _x( 'Course Category', 'taxonomy singular name', 'ranestarter' ),
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'courses', 'with_front' => false ),
    );

    register_taxonomy( 'jag-course-category', array( 'jag-course' ), $args );
}
// add_action( 'init', 'create_jag_course_category_taxonomy', 0 );

function jag_course_post_link( $post_link, $post ) {
    if ( 'jag-course' === $post->post_type && 'publish' === $post->post_status ) {
        return home_url( user_trailingslashit( $post->post_name ) );
    }
    return $post_link;
}

add_filter( 'post_type_link', 'jag_course_post_link', 10, 2 );
function jag_course_rewrite_rules($query_vars) {
    if (!is_admin() && empty($query_vars['post_type']) && isset($query_vars['name'])) {
        $slug = $query_vars['name'];

        // Check if a service with this slug exists
        $service_query = new WP_Query(array(
            'post_type' => 'jag-course',
            'name'      => $slug,
            'posts_per_page' => 1,
        ));

        if ($service_query->have_posts()) {
            $query_vars['post_type'] = 'jag-course';
        }
    }
    return $query_vars;
}
add_filter('request', 'jag_course_rewrite_rules');

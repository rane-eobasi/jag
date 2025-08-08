<?php
/**
 * Generic banner for internals.
 * Feel free to amend or change this file as needed, or add a different banner file entirely.
 * 
 * This banner uses the featured image for the page plus the page title.
 */

// Get the featured image URL for the banner
$image_url = '';
$banner_title = '';
$description = '';

if( get_the_ID() ) {
    $image_url = get_the_post_thumbnail_url( get_the_ID(), 'main-banner' );
}

$type_meta = [
    'acs-service' => [
        'title' => get_field( 'product_archive_title', 'option' ) ?? 'Our Services',
        'description' => get_field( 'service_archive_description', 'option' ),
        'image_key' => 'product_archive_image',
    ],
];


// Determine the banner title based on the context
if ( is_post_type_archive( array_keys( $type_meta ) ) ) {
    // Get the current post type
    $post_type = get_post_type();

    // Use the title from $type_meta for the current post type
    $banner_title = $type_meta[ $post_type ]['title'];

    // Optionally, override the banner image if a custom field is set
    $custom_image = get_field( $type_meta[ $post_type ]['image_key'], 'option' );
    if ( $custom_image ) {
        $image_url = $custom_image['url'] ?? '';
    }

    $description = $type_meta[ $post_type ]['description'];
} elseif ( is_archive() ) {
    // For taxonomy archives (e.g., categories, tags, custom taxonomies)
    $banner_title = single_term_title( '', false );
} elseif ( is_home() ) {
    // For the blog home page
    $banner_title = get_the_title( get_option( 'page_for_posts', true ) );
} elseif ( is_singular() ) {
    // For single posts, pages, or custom post types
    $banner_title = get_the_title();
} else {
    // Fallback for other cases (e.g., search results, 404 pages)
    $banner_title = get_the_archive_title();
}

?>
<section class="relative min-h-64 md:min-h-96 bg-cover bg-center flex items-center justify-center text-white py-16" style="background-image: url( <?php echo esc_url( $image_url ); ?> );">
  <div class="absolute inset-0 bg-gradient-to-b from-gray-50 via-primary/15 to-secondary/5"></div>
    <div class="rane-container relative z-10 pt-16 lg:pt-[150px]">
        <div class="flex">
            <div class="w-full sm:w-2/3 px-4">
                <h1 class="rane-heading rane-heading--hero">
                    <?php echo $banner_title; ?>
                </h1>
                <?php if ( $description ) : ?>
                    <div class="main-banner__description text-lg md:text-xl mt-4">
                        <?php echo $description; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

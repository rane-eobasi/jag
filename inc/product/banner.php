<?php
/**
 * Banner Section Template
 *
 * This template displays a banner section with a title, description, image, and optional call-to-action button.
 * It retrieves data from custom fields (ACF) or falls back to default values.
 *
 * Data Sources:
 * - `title`: Retrieved from the `title` field, `archive_heading` field (options), or the post title.
 * - `description`: Retrieved from the `description` field, `archive_description` field (options), or the post excerpt.
 * - `image`: Retrieved from the `thumbnail` field, `archive_image` field (options), or the featured image of the posts page.
 * - `button_text` and `button_link`: Retrieved from `cta_button_text` and `cta_button_link` fields, or their archive equivalents in options.
 *
 * Example Output:
 * - Displays a banner with a title, description, image, and a button (if available).
 *
 * @package rane_starter
 */

// Initialize variables
$image_url = '';

if( get_the_ID() ) {
    $image_url = get_the_post_thumbnail_url( get_the_ID(), 'main-banner' );
}
$title = '';
$description = '';
$image_list = [];
$button_text = '';
$button_link = '';

$post_title = get_the_title(); // Get the current post title
$title = get_field( 'page_heading' ) ?: get_field( 'single_heading', 'options' ) ?? $post_title;
$description = get_field( 'page_description' ) ?: get_field( 'single_description', 'options' ) ?? get_the_excerpt();
$button_text = get_field( 'cta_button_text' ) ?: get_field( 'single_cta_button_text', 'options' );
$button_link = get_field( 'cta_button_link' ) ?: get_field( 'single_cta_button_link', 'options' );
$image_list = get_field( 'rptr_images' ) ?: get_field( 'rptr_archive_images', 'options' );

?>

<section class="relative min-h-64 md:min-h-96 bg-cover bg-center flex items-center justify-center py-16" style="background-image: url( <?php echo esc_url( $image_url ); ?> );">
    <div class="absolute inset-0 bg-gradient-to-b from-gray-50 via-primary/15 to-secondary/5"></div>
    <div class="rane-container relative z-10 pt-16 lg:pt-[150px]">
        <div class="product-banner flex flex-col lg:flex-row items-center justify-between gap-6">
            <!-- Banner Content -->
            <div class="banner__content lg:w-1/2">
                <?php if ( $title ) : ?>
                    <h1 class="banner__title rane-heading rane-heading--section">
                        <?php echo $title; ?>
                    </h1>
                <?php endif; ?>

                <?php if ( $description ) : ?>
                    <div class="banner__description text-lg leading-relaxed mb-6 rane-regular"><?php echo $description; ?></div>
                <?php endif; ?>

                <?php if ( $button_text && $button_link ) : ?>
                    <a href="<?php echo esc_url( $button_link ); ?>" class="rane-button rane-button--hero">
                        <?php echo esc_html( $button_text ); ?>
                    </a>
                <?php endif; ?>
            </div>

            <!-- Banner Image -->
            <div class="banner__image lg:w-1/2 mt-8 lg:mt-0">
                <?php if ( $image_list ) : ?>
                    <?php get_template_part('inc/partials/college', null, ['images' => $image_list]) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
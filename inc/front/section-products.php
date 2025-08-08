<?php
/**
 * Services Section
 *
 * @package Rane_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Retrieve ACF fields
$services_title = get_field('services_title', 7);
$products = get_field('products', 7) ?? [];

if ( $products ) :
?>
    <section class="services bg-white py-16 lg:py-24">
        <div class="rane-container">
            <div class="text-center mb-8">
                <?php if ( $services_title ) : ?>
                    <h2 class="rane-heading rane-heading--section"><?php echo esc_html($services_title); ?></h2>
                <?php endif; ?>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-3 xl:grid-cols-3 items-stretch gap-8">
                <?php foreach ( $products as $product ) : 
                    $product_image = $product['image'] ?? [];
                    $product_title = $product['title'] ?? '';
                    $product_description = $product['description'] ?? '';
                    $button = $product['button'] ?? [];
                ?>
                    <div class="service-item flex flex-col justify-between items-center gap-4 text-center">
                        <?php if ( ! empty( $product_image['url'] ) ) : ?>
                            <img src="<?php echo esc_url($product_image['url']); ?>" alt="<?php echo esc_attr($product_image['alt']); ?>" class="w-full h-[248px] object-cover">
                        <?php endif; ?>
                        <h3 class="text-xl font-semibold"><?php echo esc_html($product_title); ?></h3>
                        <p class="text-gray-600"><?php echo esc_html($product_description); ?></p>
                        <?php if ( ! empty( $button['link'] ) && ! empty( $button['label'] ) ) : ?>
                            <a href="<?php echo esc_url($button['link']); ?>" class="rane-button rane-button--primary">
                                <?php echo esc_html($button['label']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php 
endif;

// Reset post data
wp_reset_postdata();
?>
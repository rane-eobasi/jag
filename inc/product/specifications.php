<?php
/**
 * Single Product Specifications
 * 
 * @package Rane
 * @since 1.0.0
 */

$single_demo_content = get_field('demo_content') ?? [];
$demo_content = $single_demo_content['content'] ?? '';
$demo_image = $single_demo_content['image'] ?? null;

if( !empty($demo_content) ): ?>
    <section class="service-process bg-[#F5F5F7] py-16">
        <div class="rane-container">
            <div class="product-specifications__row flex flex-col md:flex-row items-center justify-between gap-8 lg:gap-16">
                <div class="product-process__image md:w-1/2">
                    <?php if ( $demo_image ): ?>
                        <img src="<?php echo esc_url($demo_image['url'] ?? ''); ?>" alt="<?php echo esc_attr($demo_image['alt'] ?? ''); ?>" class="w-full h-auto rounded-lg shadow-lg">
                    <?php endif; ?>
                </div>
                <div class="service-process__content md:w-1/2">
                    <?php if ( $demo_content ): ?>
                        <div class="service-process__content-text rane-regular text-gray-700 leading-relaxed">
                            <?php echo wp_kses_post($demo_content); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
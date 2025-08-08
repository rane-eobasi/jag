<?php
    $featured_product = get_field('featured_product');
    $rptr_images = $featured_product['rptr_images'] ?? [];
    $title = $featured_product['title'] ?? '';
    $description = $featured_product['description'] ?? '';
    $button = $featured_product['button'] ?? [];
?>
<div class="bg-white pt-8">
    <div class="rane-container">
        <div class="flex flex-col sm:flex-row gap-8">
            <div class="w-full sm:w-1/3 flex flex-col justify-center">
                <h2 class="rane-heading rane-heading--section"><?php echo esc_html($title); ?></h2>
                <p class="max-w-[342px] text-lg text-gray-700 mb-6"><?php echo wp_kses_post($description); ?></p>
                <div>
                    <?php if (!empty($button['link']) && !empty($button['label'])): ?>
                        <a href="<?php echo esc_url($button['link']); ?>" class="rane-button">
                            <?php echo esc_html($button['label']); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="w-full sm:w-2/3 grid grid-cols-1 sm:grid-cols-2 gap-4">
                <?php foreach ($rptr_images as $image): ?>
                    <div class="h-[390px]">
                        <?php if (!empty($image['image']['url'])): ?>
                            <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr($image['image']['alt'] ?? ''); ?>" class="w-full h-full object-contain">
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
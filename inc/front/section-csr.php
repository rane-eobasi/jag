<?php
    $csr_image = get_field('csr_image');
?>

<div class="bg-white py-16 lg:py-32 relative min-h-[404px] overflow-hidden">
    <div class="rane-container ">
        <div class="flex flex-wrap items-center lg:flex-nowrap gap-8">
            <div class="w-full lg:w-1/2 lg:mb-0">
                <?php if( $csr_title = get_field('csr_title')): ?>
                    <h2 class="rane-heading rane-heading--section">
                        <?php echo $csr_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if( $csr_description = get_field('csr_description')): ?>
                    <div class="lg:max-w-[578px] mb-4">
                        <?php echo $csr_description; ?>
                    </div>
                <?php endif; ?>

                <?php if( get_field('csr_button_text')): ?>
                    <a href="<?php echo esc_url(get_field('csr_button_link')); ?>" class="rane-button">
                        <?php echo esc_html(get_field('csr_button_text')); ?>
                    </a>
                <?php endif; ?>
            </div>
            <div class="w-full lg:w-1/2">
                <div class="relative lg:absolute inset-y-0 lg:top-0 lg:-right-10 w-full lg:w-1/2 lg:h-full">
                    <?php if( $csr_image && !empty($csr_image['url'])): ?>
                        <img src="<?php echo esc_url($csr_image['url']); ?>" alt="<?php echo esc_attr($csr_image['alt'] ?? ''); ?>" class="w-full h-auto lg:h-full object-cover">
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

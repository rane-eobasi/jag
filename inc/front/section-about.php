<?php
    $about_image = get_field('about_image');
?>

<div class="bg-white py-16 lg:py-32 relative min-h-[404px]">
    <div class="rane-container ">
        <div class="flex flex-wrap items-center lg:flex-nowrap gap-8">
            <div class="w-full lg:w-1/2">
                <div class="relative lg:absolute inset-0 lg:top-0 lg:-left-10 w-full lg:w-1/2 lg:h-full lg:overflow-hidden">
                    <?php if( $about_image && !empty($about_image['url'])): ?>
                        <img src="<?php echo esc_url($about_image['url']); ?>" alt="<?php echo esc_attr($about_image['alt'] ?? ''); ?>" class="w-full h-auto lg:h-full object-cover">
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="w-full lg:w-1/2 lg:mb-0">
                <?php if( $about_title = get_field('about_title')): ?>
                    <h2 class="rane-heading rane-heading--section">
                        <?php echo $about_title; ?>
                    </h2>
                <?php endif; ?>

                <?php if( $about_summary = get_field('about_summary')): ?>
                    <div class="lg:max-w-[578px] mb-4">
                        <?php echo $about_summary; ?>
                    </div>
                <?php endif; ?>

                <?php if( get_field('about_button_text')): ?>
                    <a href="<?php echo esc_url(get_field('about_button_link')); ?>" class="rane-button">
                        <?php echo esc_html(get_field('about_button_text')); ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

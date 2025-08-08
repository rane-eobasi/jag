
<?php if (have_rows('rptr_products')): ?>
    <section class="pt-12">
    <div class="rane-container">
            <div class="flex flex-wrap items-stretch justify-center -mx-4">
                <?php while (have_rows('rptr_products')): the_row(); 
                    $icon_data = get_sub_field('icon') ?? [];
                    $title = get_sub_field('title');
                    $description = get_sub_field('content');
                    $file = get_sub_field('file') ?? [];
                    $file_url = $file['url'] ?? '';

                    switch($icon_data['type'] ?? '') {
                        case 'media_library':
                            $icon = $icon_data['value'] ?? [];
                            break;
                        default:
                            $icon = $icon_data['value'] ?? '';
                    }
                ?>
                    <div class="product-item w-full sm:w-1/2 lg:w-1/3 px-4 bg-white overflow-hidden flex flex-col h-full">
                        <?php if ($icon['url'] ?? null): ?>
                            <div class="product-image h-48 overflow-hidden">
                                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" class="w-full h-full object-contain">
                            </div>
                        <?php endif; ?>
                        <div class="flex-grow flex flex-col justify-between">
                            <div class="p-6">
                                <?php if ($title): ?>
                                    <h3 class="text-lg font-semibold text-gray-800 mb-2"><?php echo esc_html($title); ?></h3>
                                <?php endif; ?>
                                <?php if ($description): ?>
                                    <p class="text-gray-600"><?php echo esc_html($description); ?></p>
                                <?php endif; ?>
                            </div>

                            <?php if ($file_url): ?>
                                <div class="p-6">
                                    <a href="<?php echo esc_url($file_url); ?>" class="rane-button" target="_blank" rel="noopener noreferrer">
                                        <?php echo esc_html__('View Brochure', 'rane-starter'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
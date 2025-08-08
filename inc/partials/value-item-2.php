
<?php
    $icon = get_sub_field('icon');
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $content = get_sub_field('content');
    $wow_delay = 1;
?>

<div class="group perspective cursor-pointer wow zoomIn" data-wow-delay="0.<?php echo $wow_delay; ?>s">
    <?php $wow_delay += 2; ?>
    <div class="relative preserve-3d w-full h-full rounded-lg shadow-lg overflow-hidden transition-transform duration-500 group-hover:rotate-y-180">
        <!-- Front Side -->
        <div class="bg-primary flex flex-col items-center justify-center gap-8 p-4">
            <h3 class="inline-block text-xl text-white font-bold border-b border-secondary mb-4"><?php echo $title; ?></h3>
            <?php if ($icon): ?>
                <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" class="w-16 h-16 mx-auto mb-4">
            <?php endif; ?>
            <p class="text-center text-gray-100"><?php echo $description; ?></p>
        </div>
        <!-- Back Side -->
        <div class="absolute inset-0 rotate-y-180 flex items-center justify-center bg-secondary text-white p-4">
            <p class="text-center"><?php echo $content; ?></p>
        </div>
    </div>
</div>
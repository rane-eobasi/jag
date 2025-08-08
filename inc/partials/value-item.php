<?php
    $icon = get_sub_field('icon');
    $title = get_sub_field('title');
    $description = get_sub_field('description');
    $content = get_sub_field('content');
    $wow_delay = $args['wow_delay'] ?? 1;

    $content_text_class = match (true) {
        strlen($content) > 350 => 'text-sm',
        strlen($content) < 150 => 'text-lg',
        default => 'text-base'
    };
?>

<article
    class="relative group [perspective:1000px] cursor-pointer wow zoomIn"
    data-wow-delay="0.<?php echo $wow_delay; ?>s"
    tabindex="0"
    role="button"
    aria-pressed="false"
    aria-label="More about <?php echo $title; ?>"
    onclick="this.classList.toggle('flipped'); this.setAttribute('aria-pressed', this.classList.contains('flipped'))"
    onkeydown="if(event.key === 'Enter' || event.key === ' ') { this.click(); event.preventDefault(); }"
>
    <!-- Flipping Card Wrapper -->
    <div class="relative w-full h-64 transition-transform duration-700 [transform-style:preserve-3d] group-hover:[transform:rotateY(180deg)] flipped:[transform:rotateY(180deg)] z-10">

        <!-- Front Face -->
        <div class="absolute inset-0 rounded-2xl backface-hidden flex items-center justify-center">
            <div class="relative w-full h-full rounded-2xl bg-primary shadow-xl">
                <div class="absolute top-2 left-2 w-full h-full bg-secondary rounded-2xl -z-10"></div>
                <div class="flex flex-col items-center justify-center gap-8 h-full px-4 text-primary-hover">
                    <h3 class="text-xl text-white font-bold border-b border-secondary"><?php echo $title; ?></h3>
                    <?php if ($icon): ?>
                        <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" class="w-16 h-16 mx-auto mb-4">
                    <?php endif; ?>
                    <p class="text-center text-gray-100"><?php echo $description; ?></p>
                </div>
            </div>
        </div>

        <!-- Back Face -->
        <div class="absolute inset-0 rounded-2xl backface-hidden rotate-y-180 flex items-center justify-center">
            <div class="relative w-full h-full p-4 rounded-2xl bg-secondary shadow-xl">
                <div class="absolute top-2 left-2 w-full h-full bg-primary rounded-2xl -z-10"></div>
                <div class="flex items-center justify-center h-full <?php echo $content_text_class; ?> text-gray-800 text-center overflow-y-auto">
                    <?php if (!empty($content)) : ?>
                        <?php echo $content; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>
</article>

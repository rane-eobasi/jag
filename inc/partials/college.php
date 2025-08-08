<?php
$images = $args['images'] ?? [];
$direction = $args['direction'] ?? 'row';
$direction_class = $direction === 'col' ? 'flex-col-reverse' : '';

if ($images):
    $image_count = count($images);
?>
    <div class="flex <?php echo $direction_class; ?> items-stretch gap-4 h-[300px] md:h-[400px] lg:h-[500px]">
        <?php if ($image_count === 1): ?>
            <!-- Single Image -->
            <div class="w-full h-full overflow-hidden rounded-2xl shadow-md bg-gray-100">
                <img src="<?php echo esc_url($images[0]['image']['url']); ?>" alt="<?php echo esc_attr($images[0]['image']['title']); ?>" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
            </div>

        <?php elseif ($image_count === 2): ?>
            <!-- Two Images -->
            <?php foreach ($images as $image): ?>
                <div class="w-1/2 h-full overflow-hidden rounded-2xl shadow-md bg-gray-100">
                    <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr($image['image']['title']); ?>" class="w-full h-full object-contain transition-transform duration-500 hover:scale-105">
                </div>
            <?php endforeach; ?>

        <?php elseif ($image_count === 3): ?>
            <!-- Three Images -->
            <div class="w-1/2 h-full overflow-hidden rounded-2xl shadow-md bg-gray-100">
                <img src="<?php echo esc_url($images[0]['image']['url']); ?>" alt="<?php echo esc_attr($images[0]['image']['title']); ?>" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
            </div>
            <div class="w-1/2 h-full flex flex-col gap-2">
                <?php foreach (array_slice($images, 1, 2) as $image): ?>
                    <div class="flex-1 overflow-hidden rounded-2xl shadow-md bg-gray-100">
                        <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr($image['image']['title']); ?>" class="w-full h-full object-cover transition-transform duration-500 hover:scale-105">
                    </div>
                <?php endforeach; ?>
            </div>

        <?php elseif ($image_count === 4): ?>
            <!-- Four Images (2x2 Grid) -->
            <div class="w-full h-full grid grid-cols-2 grid-rows-2 gap-2">
                <?php foreach ($images as $image): ?>
                    <div class="overflow-hidden rounded-2xl shadow-md bg-gray-100">
                        <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr($image['image']['title']); ?>" class="w-full h-full object-contain transition-transform duration-500 hover:scale-105">
                    </div>
                <?php endforeach; ?>
            </div>

        <?php elseif ($image_count === 5): ?>
            <!-- Five Images (1 big + 4 small in grid) -->
            <div class="w-1/2 h-full overflow-hidden rounded-2xl shadow-md bg-gray-100">
                <img src="<?php echo esc_url($images[0]['image']['url']); ?>" alt="<?php echo esc_attr($images[0]['image']['title']); ?>" class="w-full h-full object-contain transition-transform duration-500 hover:scale-105">
            </div>
            <div class="w-1/2 h-full grid grid-cols-2 grid-rows-2 gap-2">
                <?php foreach (array_slice($images, 1, 4) as $image): ?>
                    <div class="overflow-hidden rounded-2xl shadow-md bg-gray-100">
                        <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr($image['image']['title']); ?>" class="w-full h-full object-contain transition-transform duration-500 hover:scale-105">
                    </div>
                <?php endforeach; ?>
            </div>

        <?php elseif ($image_count === 6): ?>
            <!-- Six Images (3x2 Grid) -->
            <div class="w-full h-full grid grid-cols-3 grid-rows-2 gap-2">
                <?php foreach ($images as $image): ?>
                    <div class="overflow-hidden rounded-2xl shadow-md bg-gray-100">
                        <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr($image['image']['title']); ?>" class="w-full h-full object-contain transition-transform duration-500 hover:scale-105">
                    </div>
                <?php endforeach; ?>
            </div>

        <?php else: ?>
            <!-- More than 6 Images: fallback to scrollable gallery or truncate -->
            <div class="w-full h-full flex overflow-x-auto gap-4">
                <?php foreach ($images as $image): ?>
                    <div class="min-w-[200px] h-full overflow-hidden rounded-2xl shadow-md bg-gray-100 flex-shrink-0">
                        <img src="<?php echo esc_url($image['image']['url']); ?>" alt="<?php echo esc_attr($image['image']['title']); ?>" class="w-full h-full object-contain transition-transform duration-500 hover:scale-105">
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>

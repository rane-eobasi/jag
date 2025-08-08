<?php
/**
 * Section: Who We Are - About Page
 */

$heading = get_field('who_heading');
$content = get_field('who_content');
$image = get_field('who_image');
?>

<section class="py-16">
  <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 items-center gap-10">
    
    <?php if ($image): ?>
      <div>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="rounded-lg shadow-md max-w-full h-auto">
      </div>
    <?php endif; ?>

    <div>
      <?php if ($heading): ?>
        <h2 class="rane-heading rane-heading--section">
          <?php echo $heading; ?>
        </h2>
      <?php endif; ?>

      <?php if ($content): ?>
        <div class="text-gray-700 text-lg leading-relaxed prose max-w-none space-y-4">
          <?php echo wp_kses_post($content); ?>
        </div>
      <?php endif; ?>
    </div>
    
  </div>
</section>

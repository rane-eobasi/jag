<?php
/**
 * Section: Privacy - About Page
 */

$heading = get_field('privacy_heading');
$content = get_field('privacy_content');
$image = get_field('privacy_image');
?>

<section class="bg-gray-50 py-16">
  <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 items-center gap-10">
    
    <div>
      <?php if ($heading): ?>
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
          <?php echo esc_html($heading); ?>
        </h2>
      <?php endif; ?>

      <?php if ($content): ?>
        <div class="text-lg text-gray-700 leading-relaxed prose max-w-none">
          <?php echo wp_kses_post($content); ?>
        </div>
      <?php endif; ?>
    </div>

    <?php if ($image): ?>
      <div>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" class="rounded-lg shadow-md max-w-full h-auto" />
      </div>
    <?php endif; ?>

  </div>
</section>

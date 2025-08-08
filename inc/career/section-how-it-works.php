<?php
/**
 * Section: How It Works - About Page
 */

$heading = get_field('how_heading') ?? 'How It Works';
$steps = get_field('rptr_process', 'options');
?>

<section class="bg-white py-16">
  <div class="container mx-auto px-4">
    
    <?php if ($heading): ?>
      <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-12">
        <?php echo esc_html($heading); ?>
      </h2>
    <?php endif; ?>

    <?php if ($steps): ?>
      <div class="grid gap-8 md:grid-cols-3">
        <?php foreach ($steps as $index => $step): ?>
          <div class="bg-gray-50 p-6 rounded-xl shadow hover:shadow-lg transition duration-300 text-center flex flex-col items-center">
            
            <?php if (!empty($step['image'])): ?>
              <img src="<?php echo esc_url($step['image']['url']); ?>" alt="<?php echo esc_attr($step['image']['alt']); ?>" class="w-16 h-16 mb-4" />
            <?php endif; ?>

            <?php if (!empty($step['title'])): ?>
              <h3 class="text-xl font-semibold text-gray-800 mb-2">
                <?php echo $step['title']; ?>
              </h3>
            <?php endif; ?>

            <?php if (!empty($step['content'])): ?>
              <p class="text-gray-600 text-base leading-relaxed">
                <?php echo $step['content']; ?>
              </p>
            <?php endif; ?>

          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

  </div>
</section>

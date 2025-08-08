<?php
/**
 * Section: Why Choose Us - About Page (Glassy Design)
 */

$heading = get_field('why_heading');
$content = get_field('why_content');
?>

<section class="py-20">
  <div class="rane-container text-center">

    <?php if ($heading): ?>
      <h2 class="rane-heading rane-heading--section mb-6 text-primary">
        <?php echo esc_html($heading); ?>
      </h2>
    <?php endif; ?>

    <?php if ($content): ?>
      <div class="text-lg text-gray-700 leading-relaxed prose mx-auto max-w-3xl mb-12">
        <?php echo wp_kses_post($content); ?>
      </div>
    <?php endif; ?>

    <?php if (have_rows('rptr_benefits', 'options')): ?>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 text-left">
        <?php while (have_rows('rptr_benefits', 'options')): the_row(); 
          $icon = get_sub_field('icon');
          $title = get_sub_field('title');
          $desc = get_sub_field('description');
        ?>
          <div class="bg-white/30 backdrop-blur-md border border-white/40 rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-1 hover:scale-[1.02]">
            <?php if ($icon['type'] === 'fa'): ?>
              <div class="text-4xl text-primary mb-4">
                <i class="<?php echo esc_attr($icon['fa_class'] ?? ''); ?>"></i>
              </div>
            <?php endif; ?>

            <?php if ($title): ?>
              <h3 class="text-xl font-semibold text-blue-800 mb-2"><?php echo $title; ?></h3>
            <?php endif; ?>

            <?php if ($desc): ?>
              <p class="text-gray-800"><?php echo $desc; ?></p>
            <?php endif; ?>
          </div>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>

  </div>
</section>

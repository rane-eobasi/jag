<?php
/**
 * Hero Section - About Page (Background Image, Full Height)
 */

$heading = get_field('hero_heading');
$subheading = get_field('hero_subheading');
$image = get_field('hero_image');
$wow_delay = 0.1;

$buttons = $args['buttons'] ?? [];
?>

<?php if ($image): ?>
  <section class="relative w-full h-auto lg:h-screen py-32 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-gray-50 via-primary/15 to-secondary/5"></div>

    <div class="rane-container relative flex items-center justify-start z-10 h-full">
      <div class="flex flex-col md:flex-row items-center gap-10">
        <!-- Left: Text Content -->
        <div class="md:w-1/2">
          <?php if ($heading): ?>
            <h1 class="rane-heading rane-heading--hero mb-4 wow fadeInUp" data-wow-delay="<?php echo $wow_delay; ?>s" ><?php echo esc_html($heading); ?></h1>
          <?php endif; ?>

          <?php if ($subheading): ?>
            <p class="text-lg md:text-xl leading-relaxed wow fadeInUp" data-wow-delay="<?php echo $wow_delay; ?>s"><?php echo esc_html($subheading); ?></p>
          <?php endif; ?>
          <?php if ($buttons): ?>
            <div class="flex flex-wrap gap-4 mt-8">
              <?php foreach ($buttons as $button): ?>
                <a href="<?php echo esc_url($button['url']); ?>" class="rane-button wow fadeInUp" data-wow-delay="<?php echo $wow_delay; ?>s" target="<?php echo esc_attr($button['target'] ?? '_self'); ?>">
                  <?php echo esc_html($button['text']); ?>
                </a>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>
        </div>
        <!-- Right: Image -->
        <div class="md:w-1/2">
          <div class="wow fadeInRight" data-wow-delay="<?php echo $wow_delay; ?>s">
            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" class="w-full h-auto">
          </div> 
      </div>
    </div>
  </section>
<?php endif; ?>

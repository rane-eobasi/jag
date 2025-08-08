<?php
/**
 * Section: Why Choose Us - About Page
 */

$heading = get_field('why_heading');
$reasons = get_field('rptr_benefits'); // Repeater field
?>

<?php if ($heading || $reasons): ?>
  <section class="bg-gray-100 py-16">
    <div class="container mx-auto px-4">
      <?php if ($heading): ?>
        <h2 class="rane-heading rane-heading--section text-center mb-12">
          <?php echo esc_html($heading); ?>
        </h2>
      <?php endif; ?>

      <?php if ($reasons): ?>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <?php foreach ($reasons as $reason): ?>
            <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition duration-300">
              <?php if (!empty($reason['icon'])): ?>
                <img src="<?php echo esc_url($reason['icon']['url']); ?>" alt="<?php echo esc_attr($reason['icon']['alt']); ?>" class="w-12 h-12 mb-4" />
              <?php endif; ?>

              <?php if (!empty($reason['title'])): ?>
                <h3 class="text-xl font-semibold text-gray-800 mb-2">
                  <?php echo esc_html($reason['title']); ?>
                </h3>
              <?php endif; ?>

              <?php if (!empty($reason['description'])): ?>
                <p class="text-gray-600 text-base leading-relaxed">
                  <?php echo esc_html($reason['description']); ?>
                </p>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </section>
<?php endif; ?>

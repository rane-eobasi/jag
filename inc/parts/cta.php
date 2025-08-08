<?php
/**
 * Section: CTA - About Page
 */

$heading = get_field('cta_heading', 'option');
$subheading = get_field('cta_subtext', 'option');
$button_text = get_field('cta_button_text', 'option');
$button_link = get_field('cta_button_link', 'option');
?>

<?php if ($heading || $subheading): ?>
  <!-- Call to Action Section -->
  <section class="py-16 text-secondary">
      <div class="rane-container text-center">
          <?php if ($heading): ?>
            <h2 class="text-3xl md:text-4xl font-extrabold mb-6">
              <?php echo $heading; ?>
            </h2>
          <?php endif; ?>

          <?php if ($subheading): ?>
            <p class="text-lg md:text-xl mb-8">
              <?php echo $subheading; ?>
            </p>
          <?php endif; ?>

          <?php if ($button_text && $button_link): ?>
            <a href="<?php echo esc_url($button_link); ?>" class="rane-button rane-button--hero">
              <?php echo esc_html($button_text); ?>
            </a>
          <?php endif; ?>
      </div>
  </section>
<?php endif; ?>

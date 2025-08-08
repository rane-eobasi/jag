<?php
/**
 * FAQ Section - Get Sick Cert Page
 */

// Fetch FAQs using ACF repeater field (or use a custom post type if needed)
$faqs = get_field('rptr_faqs', 'option'); // ACF Repeater Field
?>

<?php if ($faqs): ?>
  <div class="space-y-4">
    <?php foreach ($faqs as $faq): ?>
      <div class="faq-item bg-white p-6 rounded-lg shadow-md border border-gray-100">
        <button class="faq-question w-full text-left text-xl font-medium text-gray-800 flex justify-between items-center focus:outline-none cursor-pointer">
          <span><?php echo esc_html($faq['question']); ?></span>
          <span class="text-2xl transform rotate-0 transition-transform duration-200 faq-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path></svg>
          </span>
        </button>
        <div class="faq-answer max-h-0 overflow-hidden transition-all duration-500 ease-in-out">
          <p class="mt-4 text-gray-600 leading-relaxed"><?php echo esc_html($faq['answer']); ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<script>
  // Toggle FAQ Answer visibility with smooth expand/collapse effect
  document.addEventListener('DOMContentLoaded', () => {
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
      const button = item.querySelector('.faq-question');
      const answer = item.querySelector('.faq-answer');
      const icon = item.querySelector('.faq-icon');

      button.addEventListener('click', () => {
        const isOpen = answer.style.maxHeight && answer.style.maxHeight !== '0px';

        // Close all other FAQs
        faqItems.forEach(i => {
          const otherAnswer = i.querySelector('.faq-answer');
          const otherIcon = i.querySelector('.faq-icon');
          if (otherAnswer !== answer) {
            otherAnswer.style.maxHeight = '0';
            otherIcon.classList.remove('rotate-180');
          }
        });

        // Toggle the current FAQ
        if (isOpen) {
          answer.style.maxHeight = '0';
          icon.classList.remove('rotate-180');
        } else {
          answer.style.maxHeight = answer.scrollHeight + 'px';
          icon.classList.add('rotate-180');
        }
      });
    });
  });
</script>

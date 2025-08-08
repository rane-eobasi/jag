<div class="bg-white py-16 relative">
    <div class="rane-container">
        <div class="flex flex-wrap lg:flex-nowrap gap-8">
            <!-- FAQ Image -->
            <div class="w-full lg:w-1/2 mb-6 lg:mb-0">
                <div class="relative lg:absolute inset-y-0 left-0 w-full lg:w-1/2 py-0 lg:py-16 pr-0 lg:pr-8">
                    <img src="<?php rane_text_media('faqs_featured_image', 'url'); ?>" alt="FAQ" class="w-full h-full object-cover rounded-lg lg:rounded-l-none shadow-lg" />
                </div>
            </div>

            <!-- FAQ Content -->
            <div class="w-full lg:w-1/2">
                <h2 class="rane-heading rane-heading--section">Frequently Asked Questions</h2>
                <?php if (have_rows('rptr_faqs', 'options')) : ?>
                    <div class="space-y-4 mb-6">
                        <?php 
                        $faq_count = 0; // Counter to limit FAQs
                        while (have_rows('rptr_faqs', 'options')) : the_row(); 
                            if ($faq_count >= 4) break; // Stop after 4 FAQs
                            $question = get_sub_field('question');
                            $answer = get_sub_field('answer');
                            $faq_count++;
                        ?>
                            <div class="faq-item border border-gray-300 rounded-lg overflow-hidden">
                                <!-- Question -->
                                <h3 class="faq-question w-full text-left px-4 py-3 bg-white font-semibold text-lg flex justify-between items-center cursor-pointer">
                                    <?php echo esc_html($question); ?>
                                    <span class="faq-icon transform transition-transform duration-300">+</span>
                                </h3>
                                <!-- Answer -->
                                <div class="faq-answer max-h-0 overflow-hidden transition-all duration-300 ease-in-out">
                                    <div class="px-4 py-3 bg-gray-100">
                                        <?php echo wp_kses_post($answer); ?>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                <a href="/faqs/" class="rane-button">
                    View All FAQs
                </a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            const answer = item.querySelector('.faq-answer');
            const icon = item.querySelector('.faq-icon');

            // Set initial styles for smooth transitions
            answer.style.maxHeight = '0';
            answer.style.overflow = 'hidden';
            answer.style.transition = 'max-height 0.3s ease';

            question.addEventListener('click', () => {
                const isOpen = answer.style.maxHeight !== '0px';

                // Close all other FAQ items
                faqItems.forEach(i => {
                    const otherAnswer = i.querySelector('.faq-answer');
                    const otherIcon = i.querySelector('.faq-icon');
                    otherAnswer.style.maxHeight = '0';
                    otherIcon.textContent = '+';
                    otherIcon.classList.remove('rotate-180');
                });

                // Toggle the current FAQ item
                if (!isOpen) {
                    answer.style.maxHeight = answer.scrollHeight + 'px'; // Expand to full height
                    icon.textContent = '-';
                    icon.classList.add('rotate-180');
                } else {
                    answer.style.maxHeight = '0'; // Collapse
                    icon.textContent = '+';
                    icon.classList.remove('rotate-180');
                }
            });
        });
    });
</script>
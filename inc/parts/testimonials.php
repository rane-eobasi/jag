<?php
$testimonials_section_title = get_field('testimonials_section_title', 'option');
$testimonials_section_description = get_field('testimonials_section_description', 'option');

if( have_rows('rptr_testimonials', 'option')):
?>
    <section class="testimonials-section">
        <div class="rane-container lg:max-w-2xl">
            <div class="text-center mb-4">
                <h2 class="rane-heading rane-heading--section"><?php echo esc_html($testimonials_section_title); ?></h2>
                <p class="text-lg"><?php echo esc_html($testimonials_section_description); ?></p>
            </div>
            <div class="testimonials-slider !space-y-4">
                <?php while( have_rows('rptr_testimonials', 'option')): the_row(); ?>
                    <?php
                        $title = get_sub_field('title');
                        $content = get_sub_field('content');
                        $word_count = 50;
                        $words = str_word_count(strip_tags($content));
                        $truncated = $words > $word_count;
                        $content_trimmed = wp_trim_words($content, $word_count, '...');
                        $modal_id = uniqid('testimonial_');
                    ?>
                    <div class="!flex flex-col items-center gap-4">
                        <div class="flex items-center gap-2 mb-2">
                            <?php for( $x = 1; $x <=5; $x++ ): ?>
                                <svg width="27" height="25" viewBox="0 0 27 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M26.7105 10.3666L19.6266 15.4905L22.3929 23.6579L22.3914 23.6594C22.4966 23.96 22.3899 24.291 22.1262 24.4774C21.8669 24.6696 21.5098 24.674 21.2461 24.4875L13.9636 19.4827L6.68279 24.4875C6.55537 24.5757 6.40572 24.6234 6.25013 24.6248C6.0101 24.6219 5.78487 24.5078 5.64263 24.317C5.50188 24.1276 5.46187 23.8834 5.53595 23.6594L8.30226 15.4876L1.21992 10.3668C0.968033 10.1746 0.868774 9.84649 0.969515 9.55021C1.07175 9.25392 1.35477 9.05157 1.67626 9.04581H10.4936L13.2525 0.879906C13.3533 0.579281 13.6407 0.376953 13.9652 0.376953C14.2897 0.376953 14.5771 0.579297 14.6779 0.879906L17.4442 9.04581H26.2631C26.5817 9.05448 26.8617 9.25682 26.961 9.55311C27.0617 9.8494 26.961 10.1746 26.7106 10.3668L26.7105 10.3666Z" fill="#0064B0"/>
                                </svg>
                            <?php endfor; ?>
                        </div>
                        <div class="flex flex-col justify-between items-center gap-4">
                            <div class="text-center px-14">
                                <?php echo $content_trimmed; ?>
                                <?php if ($truncated): ?>
                                    <button class="read-more text-black font-medium hover:underline cursor-pointer" data-content="<?php echo esc_attr($content); ?>" data-title="<?php echo esc_attr($title); ?>">
                                        Read More
                                    </button>
                                <?php endif; ?>
                            </div>
                            <h3 class="text-center"><?php echo $title; ?></h3>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

<!-- Floatbox Modal -->
<div id="testimonial-modal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
        <button id="close-modal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-800 text-4xl cursor-pointer">
            &times;
        </button>
        <h3 id="modal-title" class="text-lg font-semibold text-gray-800 mb-4"></h3>
        <div>
            <span class="icon text-white text-4xl">
                <svg width="30" height="16" viewBox="0 0 30 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M6.63333 10.6667C2.96667 10.6667 0 8.26667 0 5.33333C0 2.4 3 0 6.66667 0C10.3333 0 13.3333 2.4 13.3333 5.33333C13.3333 11.2267 7.36667 16 0 16C0 16 4.36666 14.6933 6.63333 10.6667ZM16.6667 5.33333C16.6667 2.4 19.6667 0 23.3333 0C27 0 30 2.4 30 5.33333C30 11.2267 24.0333 16 16.6667 16C16.6667 16 21.0333 14.6933 23.3 10.6667C19.6333 10.6667 16.6667 8.26667 16.6667 5.33333Z" fill="#FFFFFE"/>
                </svg>
            </span>
            <p id="modal-content" class="text-gray-700"></p>
        </div>
    </div>
</div>

<script>
    jQuery(document).ready(function ($) {
        // Initialize Slick Slider
        $('.testimonials-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 3000,
            dots: false,
            arrows: true,
            prevArrow: `<button class="cursor-pointer !absolute left-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full shadow text-primary hover:text-primary flex items-center justify-center border border-gray-300">
                <i class="fas fa-arrow-left"></i>
            </button>`,
            nextArrow: `<button class="cursor-pointer !absolute right-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full shadow text-primary hover:text-primary flex items-center justify-center border border-gray-300">
                <i class="fas fa-arrow-right"></i>
            </button>`,
        });

        // Open Modal
        $('.read-more').on('click', function () {
            const content = $(this).data('content');
            const title = $(this).data('title');
            $('#modal-title').text(title);
            $('#modal-content').text(content);
            $('#testimonial-modal').removeClass('hidden').addClass('flex');
        });

        // Close Modal
        $('#close-modal').on('click', function () {
            $('#testimonial-modal').addClass('hidden').removeClass('flex');
        });

        // Close Modal on Background Click
        $('#testimonial-modal').on('click', function (e) {
            if ($(e.target).is('#testimonial-modal')) {
                $(this).addClass('hidden').removeClass('flex');
            }
        });
    });
</script>
<?php endif; ?>
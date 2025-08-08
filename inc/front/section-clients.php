<?php
$accreditations_section_title = get_field('accreditations_section_title', 7);
$accreditations_section_description = get_field('accreditations_section_description', 7);

if( have_rows('rptr_awards', 'option')):
?>
    <section class="services bg-white py-12 lg:py-24">
        <div class="rane-container">
            <div class="flex flex-col sm:flex-row gap-8">
                <div class="w-full sm:w-1/2">
                    <div class="mb-8">
                        <h2 class="rane-heading rane-heading--section"><?php echo esc_html($accreditations_section_title); ?></h2>
                    </div>
                    <p class="text-lg"><?php echo esc_html($accreditations_section_description); ?></p>
                </div>
                <div class="w-full sm:w-1/2 flex justify-end">
                    <div class="max-w-[380px] grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4">
                        <?php while( have_rows('rptr_awards', 'option')): the_row(); ?>
                            <?php
                                $image = get_sub_field('image');
                                if ($image):
                            ?>
                                <div class="award-slide relative !h-24 !flex items-center justify-center px-2 overflow-hidden">
                                    <img class="w-full max-h-full object-contain" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </div>
                            <?php endif; ?>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>
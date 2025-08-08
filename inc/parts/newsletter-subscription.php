<?php
$newsletter_section_title = get_field('newsletter_section_title', 'option');
$newsletter_description = get_field('newsletter_description', 'option');
$newsletter_background_image = get_field('newsletter_background_image', 'option');
?>
<section class="newsletter relative bg-cover bg-center py-16 lg:py-24" style="background-image: url('<?php echo esc_url($newsletter_background_image['url']); ?>');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    <div class="rane-container relative text-white">
        <div class="flex flex-wrap items-center justify-between lg:flex-nowrap gap-8 text-center lg:text-left">
            <div class="w-full lg:w-1/3">
                <?php if( $newsletter_section_title ): ?>
                    <h2 class="rane-heading rane-heading--section text-white font-bold">
                        <?php echo $newsletter_section_title; ?>
                    </h2>
                <?php endif; ?>
                <?php if( $newsletter_description ): ?>
                    <p class="text-lg text-white">
                        <?php echo esc_html($newsletter_description); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="w-full lg:w-2/3">
                <div class="flex justify-center lg:justify-end items-center lg:items-end">
                    <div class="newsletter-form-cont">
                        <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 4 ) ); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
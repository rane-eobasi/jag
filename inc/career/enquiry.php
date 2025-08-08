<?php
    $title = get_field('job_application_form_title') ?? "Recruitment Enquiry";
    $description = get_field('job_application_form_description') ?? "We understand that starting a new career is a big step. If you'd like to speak with someone from our recruitment team or ask a few questions before applying, please complete the short enquiry form below.";
?>

<section class="product-enquiry relative py-16 bg-gray-50">
    <div class="absolute top-0 right-0 hidden lg:block h-full w-full lg:w-1/2 bg-primary"></div>
    <div class="rane-container relative">
        <div class="product-enquiry__row flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="product-enquiry__content w-full md:w-1/2">
                <?php if( $title ): ?>
                    <h2 class="product-enquiry__title rane-heading rane-heading--section"><?php echo esc_html($title); ?></h2>
                <?php endif; ?>
                <?php if( $description ): ?>
                    <p class="text-lg text-gray-600 leading-relaxed"><?php echo esc_html($description); ?></p>
                <?php endif; ?>
            </div>
            <div class="product-enquiry__form p-6 w-full md:w-1/2 bg-primary lg:bg-transparent">
                <h3 class="text-2xl font-bold text-white mb-4">Recruitment Form</h3>
                <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 2 ) ); ?>
            </div>
        </div>
    </div>
</section>
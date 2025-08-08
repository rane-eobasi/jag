<section class="py-12 lg:py-16 relative">
    <div class="rane-container ">
        <div class="flex flex-col md:flex-row justify-between gap-8">
            <div class="w-full lg:w-1/3 xl:w-1/4 lg:mb-0">
                <h2 class="rane-heading rane-heading--section">
                    <?php rane_text_media('multi_enquiry_title'); ?>
                </h2>

                <div class="lg:max-w-[578px] mb-4">
                    <?php rane_text_media('multi_enquiry_desc'); ?>
                </div>
            </div>
            <div class="w-full lg:w-2/3">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <?php get_template_part('inc/parts/enquiry-cmp') ?>
                </div>
            </div>
        </div>
    </div>
</section>

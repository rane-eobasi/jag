<?php
    $post_title = get_the_title(); // Get the current post title
    $product_enquiry_form_title = get_field('product_enquiry_form_title', 'option');
    $product_enquiry_form_description = get_field('product_enquiry_form_description', 'option');

    // Replace {$singleProduct} with the post title
    $title = str_replace( '{$singleProduct}', $post_title, $product_enquiry_form_title );
    $description = str_replace( '{$singleProduct}', $post_title, $product_enquiry_form_description );
?>

<section class="product-enquiry relative py-16 bg-gray-50">
    <div class="absolute top-0 right-0 hidden lg:block h-full w-full md:w-1/2 max-w-5xl bg-gradient-to-bl from-primary to-secondary/60"></div>
    <div class="rane-container relative">
        <div class="product-enquiry__row flex flex-col md:flex-row items-center justify-between gap-8">
            <div class="product-enquiry__content w-full md:w-1/3">
                <h2 class="product-enquiry__title rane-heading rane-heading--section">
                    <?php rane_text_media('multi_enquiry_title'); ?>
                </h2>
                <p class="text-lg text-gray-600 leading-relaxed">
                    <?php rane_text_media('multi_enquiry_desc'); ?>
                </p>
            </div>
            <div class="p-8 w-full md:w-2/3 bg-white rounded-lg shadow-xl shadow-secondary/80">
                <?php get_template_part('inc/parts/enquiry-cmp') ?>
            </div>
        </div>
    </div>
</section>
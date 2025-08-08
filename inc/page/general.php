<?php
    get_header();

    // Load the page content
    // This will include the content of the page template
    // and any custom fields or sections defined in the page editor
    // You can customize this part to include specific sections or templates
    // based on your needs
    // For example, you can load a specific template part for the page
    // get_template_part('inc/page/content', 'page');

    $page_heading = get_field('page_heading');
    $page_description = get_field('page_description');
?>

<section class="bg-gradient-to-b from-blue-50 to-white py-16">
    <div class="rane-container">
        <!-- Page Header -->
        <?php if( $page_heading || $page_description ): ?>
            <div class="text-center mb-12">
                <?php if( $page_heading ): ?>
                    <h1 class="text-4xl md:text-5xl font-extrabold text-sky-800">
                        <?php echo $page_heading; ?>
                    </h1>
                <?php endif; ?>

                <?php if( $page_description ): ?>
                    <div class="text-lg md:text-xl text-gray-600 mt-4 max-w-3xl mx-auto">
                        <?php echo wp_kses_post($page_description); ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <!-- Content Section -->
        <div class="rane-inner-cont bg-white p-8 md:p-12 rounded-3xl shadow-xl border border-gray-200">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="entry-content text-gray-700 leading-relaxed">
                        <?php the_content(); ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_template_part('inc/parts/cta'); ?>
<?php get_footer(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('relative'); ?>>
    <div class="absolute inset-0 h-[400px] bg-primary">
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="absolute inset-0">
                <?php the_post_thumbnail( 'full', array( 'class' => 'w-full h-full object-cover' ) ); ?>
            </div>
        <?php endif; ?>
        <div class="absolute inset-0 bg-gradient-to-r from-primary to-transparent"></div>
    </div>
    <div class="rane-container pt-[200px] pb-20">
        <div class="bg-white shadow-xl p-6 lg:p-12 relative z-10 min-h-[400px]">
            <header class="entry-header mb-4">
                <h1 class="entry-title rane-heading rane-heading--hero" itemprop="headline">
                    <?php the_title(); ?>
                </h1>
                <time datetime="<?php echo get_the_date( 'c' ); ?>" itemprop="datePublished" class="text-sm text-gray-700"><?php echo get_the_date(); ?></time>
            </header>

            <div class="entry-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</article>

<?php get_template_part( 'inc/parts/latest-news' ); ?>

<section class="bg-gray-50 py-16">
    <div class="container mx-auto px-4">
        <h2 class="rane-heading text-center mb-12">
            Frequently Asked Questions
        </h2>
        <?php get_template_part( 'inc/parts/faqs' ); ?>
    </div>
</section>

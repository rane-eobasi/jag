<main id="primary" class="site-main entry-section py-12">
    <div class="rane-container">
        <?php if ( have_posts() ) :  ?>
            <div class="product-entries grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part( 'inc/partials/post-card' ); ?>
                <?php endwhile; ?>
            </div>

            <!-- Pagination -->
            <div class="pagination mt-8">
                <?php 
                echo paginate_links( array(
                    'mid_size'  => 2,
                    'prev_text' => __('« Previous', 'textdomain'),
                    'next_text' => __('Next »', 'textdomain'),
                ) ); 
                ?>
            </div>

        <?php else : ?>
            <?php get_template_part( 'template-parts/content', 'none' ); ?>
        <?php endif; ?>
    </div>
</main>
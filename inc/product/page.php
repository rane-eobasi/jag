<main id="primary" class="site-main">
    <?php if ( have_posts() ) :  ?>
        <div class="product-entries row">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php if ( is_archive() ) : ?>
                        <div class="product-entry col-3">
                            <?php get_template_part( 'inc/product/loop-item' ); ?>
                        </div>
                <?php else: ?>
                    <?php get_template_part( 'inc/product/single' ); ?>
                <?php endif; ?>
            <?php endwhile; ?>
            <?php the_posts_navigation(); ?>
        </div>
    <?php else : ?>
        <?php get_template_part( 'template-parts/content', 'none' ); ?>
    <?php endif; ?>
</main>
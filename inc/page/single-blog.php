<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'inc/partials/post-content' ); ?>
    <?php endwhile; ?>
<?php endif; ?>
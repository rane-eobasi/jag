<?php
// Query the latest 3 blog posts
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
);
$query = new WP_Query($args);

if ($query->have_posts()): ?>
    <section class="latest-news bg-gray-100 py-16 lg:py-24">
        <div class="rane-container">
            <div class="text-center mb-8">
                <h2 class="rane-heading rane-heading--section">Latest News</h2>
                <p class="text-lg">Stay updated with our latest news and updates.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 items-stretch gap-8">
                <?php while ($query->have_posts()): $query->the_post(); ?>
                    <?php get_template_part('inc/partials/post-card'); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; wp_reset_postdata(); ?>
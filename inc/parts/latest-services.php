<?php
// Get the current post ID if on a single acs-service page
$current_post_id = is_singular('acs-service') ? get_the_ID() : 0;

// Query the latest 3 acs-service posts
$args = array(
    'post_type' => 'acs-service',
    'posts_per_page' => 3,
    'post__not_in' => $current_post_id ? array($current_post_id) : array(), // Exclude current post ID if applicable
    'orderby' => 'date',
    'order' => 'DESC',
);

$query = new WP_Query($args);

if ($query->have_posts()): ?>
    <section class="latest-services bg-gray-100 py-16 lg:py-24">
        <div class="rane-container">
            <div class="text-center mb-8">
                <h2 class="rane-heading rane-heading--section">More Services</h2>
                <p class="text-lg">Explore our services and offerings.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php while ($query->have_posts()): $query->the_post(); ?>
                    <?php get_template_part( 'inc/partials/post-card' ); ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; wp_reset_postdata(); ?>
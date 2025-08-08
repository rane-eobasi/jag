<?php
get_header();

// Get all categories for the dropdown
$categories = get_categories();
$current_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : '';
?>

<section class="blogs bg-gray-100 py-16 lg:py-24">
    <div class="rane-container">
        <div class="text-center mb-8">
            <h2 class="rane-heading rane-heading--section">Our Blog</h2>
            <p class="text-lg">Explore our latest posts and updates.</p>
        </div>

        <!-- Category Filter -->
        <form method="get" class="mb-8 flex justify-center">
            <select name="category" class="border border-gray-300 rounded-lg p-2 text-gray-700" onchange="this.form.submit()">
                <option value="">All Categories</option>
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo esc_attr($category->slug); ?>" <?php selected($current_category, $category->slug); ?>>
                        <?php echo esc_html($category->name); ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>

        <!-- Posts Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php if ( have_posts() ) : ?>
                <?php  while ( have_posts() ) : the_post(); ?>
                    <?php get_template_part('inc/partials/post-card'); ?>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="text-center text-gray-600">No posts found in this category.</p>
            <?php endif; ?>
        </div>

        <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <?php
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => $paged,
                'prev_text' => '&laquo; Previous',
                'next_text' => 'Next &raquo;',
                'type' => 'list',
                'class' => 'pagination',
            ));
            ?>
        </div>
    </div>
</section>
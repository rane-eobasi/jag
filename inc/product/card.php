<div class="product-card product-entry card-entry group bg-white rounded-lg shadow-lg overflow-hidden flex flex-col h-full transition-transform duration-300 hover:shadow-xl">
    <div class="card-entry__cover relative overflow-hidden">
        <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="block">
                <div class="transform scale-110 group-hover:scale-100 transition-transform duration-500 ease-out">
                    <?php the_post_thumbnail('large', array('class' => 'post-image w-full h-auto')); ?>
                </div>
            </a>
        <?php endif; ?>
    </div>
    <div class="card-entry__content flex flex-col flex-grow p-6">
        <h2 class="card-entry__title text-xl font-semibold mb-4 text-gray-800 group-hover:text-blue-500 transition-colors duration-300">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <div class="card-entry__excerpt text-gray-600 mb-4">
            <?php 
                // Shorten the content to 20 words if no excerpt is provided
                $excerpt = get_the_excerpt() ?: wp_trim_words(get_the_content(), 20, '...');
                echo esc_html($excerpt); 
            ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="mt-auto inline-block bg-blue-500 text-white text-sm font-medium px-4 py-2 rounded hover:bg-blue-600 transition">
            Read More
        </a>
    </div>
</div>
<div class="news-card group bg-white shadow-lg rounded-lg overflow-hidden transition-transform duration-500 hover:shadow-xl hover:-translate-y-2 flex flex-col">
    <a href="<?php the_permalink(); ?>" class="block relative h-48 overflow-hidden shrink-0">
        <?php if (has_post_thumbnail()): ?>
            <img class="w-full h-full object-cover transition-transform duration-500 scale-110 group-hover:scale-100" src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
    </a>
    <div class="p-6 flex flex-col flex-grow">
        <div class="flex-grow">
            <h2 class="mb-4">
                <a href="<?php the_permalink(); ?>" class="text-xl font-semibold !no-underline"><?php the_title(); ?></a>
            </h2>
            <p class="text-gray-600">
                <?php 
                    // Always limit words
                    $excerpt = wp_trim_words(get_the_excerpt() ?: get_the_content(), 20, '...');
                    echo esc_html($excerpt); 
                ?>
            </p>
        </div>
        <a href="<?php the_permalink(); ?>" class="flex items-center font-semibold !no-underline gap-4 mt-4">
            Read More
            <span class="icon text-secondary">
                <i class="fa fa-arrow-right"></i>
            </span>
        </a>
    </div>
</div>

<?php if( have_rows( 'rptr_values', 'options' )): ?>
    <div class="absolute bottom-0 left-0 w-full bg-white/20">
        <div class="rane-container">
            <ul class="flex flex-wrap flex-col md:flex-row justify-center items-center space-y-2 lg:space-y-0 py-4 lg:py-0">
                <?php while( have_rows( 'rptr_values', 'options' )): the_row(); ?>
                    <li class="flex items-center gap-4 lg:p-4 text-gray-brand text-center text-xl font-semibold">
                        <?php echo get_sub_field('title'); ?>
                        <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.99902 1.59448C7.74612 2.70969 8.99508 4.62649 10.1387 6.64917C10.8363 7.88311 11.4896 9.1472 11.9678 10.2859C12.453 11.4414 12.7305 12.4082 12.7305 13.0691C12.7303 16.2285 10.1595 18.7994 7 18.7996C3.8404 18.7996 1.26872 16.2288 1.26855 13.0691C1.26855 12.4084 1.54606 11.4414 2.03125 10.2859C2.5094 9.14725 3.1637 7.88314 3.86133 6.64917C5.00464 4.62692 6.25193 2.7097 6.99902 1.59448ZM11.2275 12.2429C10.7719 12.2429 10.4026 12.6115 10.4023 13.0671C10.4023 14.8838 8.96934 16.3741 7.1748 16.4656L7 16.4695C6.57261 16.4695 6.22087 16.7945 6.17871 17.2107L6.1748 17.2947L6.17871 17.3796C6.22107 17.7957 6.57276 18.1199 7 18.1199C9.78612 18.1197 12.0518 15.8542 12.0518 13.0671C12.0515 12.64 11.7275 12.2891 11.3115 12.2468L11.2275 12.2429Z" stroke="black"/>
                        </svg>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
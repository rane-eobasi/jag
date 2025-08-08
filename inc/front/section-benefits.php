<?php if( have_rows( 'rptr_benefits', 'options' )): ?>
    <div class="bg-[#F2F2F2] py-12">
        <div class="rane-container">
            <div class="text-center mb-8">
                <h2 class="rane-heading rane-heading--section">Benefits</h2>
            </div>
            <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
                <?php while( have_rows( 'rptr_benefits', 'options' )): the_row(); ?>
                    <li class="flex items-center gap-4 lg:p-4 text-gray-brand font-semibold">
                        <svg width="14" height="20" viewBox="0 0 14 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.99972 0.699951C5.77785 2.48662 0.768555 9.99995 0.768555 13.0688C0.768555 16.5048 3.56389 19.3 6.99972 19.3C10.4356 19.3 13.2309 16.5046 13.2309 13.0688C13.2309 9.99912 8.22155 2.48678 6.99972 0.699951ZM6.99972 17.62C6.82004 17.62 6.67472 17.4746 6.67472 17.295C6.67472 17.1153 6.82003 16.97 6.99972 16.97C9.15139 16.97 10.9021 15.2191 10.9021 13.0676C10.9021 12.8879 11.0474 12.7426 11.2271 12.7426C11.4067 12.7426 11.5521 12.8879 11.5521 13.0676C11.5521 15.5786 9.50989 17.62 6.99972 17.62Z" fill="#0064B0" fill-opacity="0.32"/>
                        </svg>
                        <?php echo get_sub_field('title'); ?>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>
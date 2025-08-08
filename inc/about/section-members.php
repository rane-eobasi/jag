<section class="py-12">
    <div class="rane-container">
        <?php if( have_rows('rptr_members', 'option') ): $wow_delay = 0;?>
            <div class="text-center mb-12">
                <h2 class="rane-heading rane-heading--section">Meet The Team</h2>
                <p class="text-lg leading-relaxed max-w-3xl mx-auto">
                    At AquaAid Northern Ireland, our dedicated team, led by Daniel and the Coffology crew, is committed to delivering exceptional water solutions with a personal touch. Meet the people who make it all possible.
                </p>
            </div>
            <div class="team-slider slick-slider grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 px-10 lg:px-14">
                <?php while( have_rows('rptr_members', 'option') ): the_row(); 
                $image = get_sub_field('image');
                $name = get_sub_field('name');
                $position = get_sub_field('position');
                $description = get_sub_field('description');
                ?>
                <div class="team-member flex flex-col px-2 wow zoomIn" data-wow-delay="0.<?php echo $wow_delay+2; ?>s">
                    <div class="bg-secondary relative -mb-[10%] w-24 h-24 mx-auto shadow-lg rounded-full overflow-hidden">
                        <?php if( $image ): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($name); ?>" class="w-full h-full object-cover">
                        <?php endif; ?>
                    </div>
                    <div class="bg-white shadow-lg rounded-lg flex flex-col items-center text-center px-6 pb-6 pt-16">
                        <h3 class="text-lg font-semibold text-gray-800 uppercase"><?php echo esc_html($name); ?></h3>
                        <p class="text-sm text-gray-500 uppercase mb-4"><?php echo esc_html($position); ?></p>
                        <p class="text-sm text-gray-600 line-clamp-3 mb-4">
                            <?php echo esc_html($description); ?>
                        </p>
                        <button class="show-member flex items-center font-semibold !no-underline gap-4 mt-4 cursor-pointer" 
                            data-name="<?php echo esc_html($name); ?>" 
                            data-position="<?php echo esc_html($position); ?>" 
                            data-description="<?php echo esc_html($description); ?>" 
                            data-image="<?php echo esc_url($image['url']); ?>">
                            Read More
                            <span class="icon text-secondary">
                                <i class="fa fa-arrow-right"></i>
                            </span>
                        </button>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>

            <!-- Single Modal -->
            <div id="team-modal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
                <div class="bg-white rounded-lg shadow-lg max-w-lg w-full p-6 relative">
                    <button class="absolute top-4 right-4 text-3xl text-gray-500 hover:text-gray-700 cursor-pointer" id="modal-close">
                        &times;
                    </button>
                    <div class="text-center">
                        <div class="w-24 h-24 rounded-full overflow-hidden mx-auto mb-4">
                            <img id="modal-image" src="" alt="" class="w-full h-full object-cover">
                        </div>
                        <h3 id="modal-name" class="text-lg font-semibold text-gray-800 uppercase"></h3>
                        <p id="modal-position" class="text-sm text-gray-500 uppercase mb-4"></p>
                        <p id="modal-description" class="text-sm text-gray-600"></p>
                    </div>
                </div>
            </div>

            <script>
                jQuery(document).ready(function($) {
                    const slider = $('.team-slider');
                    const modal = $('#team-modal');
                    const modalImage = $('#modal-image');
                    const modalName = $('#modal-name');
                    const modalPosition = $('#modal-position');
                    const modalDescription = $('#modal-description');
                    const modalClose = $('#modal-close');

                    // Initialize the slider
                    slider.slick({
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        arrows: true,
                        dots: false,
                        infinite: true,
                        prevArrow: `<button class="cursor-pointer !absolute left-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full shadow text-primary hover:text-primary flex items-center justify-center border border-gray-300">
                            <i class="fas fa-arrow-left"></i>
                        </button>`,
                        nextArrow: `<button class="cursor-pointer !absolute right-0 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full shadow text-primary hover:text-primary flex items-center justify-center border border-gray-300">
                            <i class="fas fa-arrow-right"></i>
                        </button>`,
                        responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2,
                                }
                            },
                            {
                                breakpoint: 768,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2,
                                }
                            },
                            {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1,
                                }
                            }
                        ]
                    });

                    // Handle button click to open modal
                    slider.on('click', '.show-member', function() {
                        const button = $(this);
                        const name = button.data('name');
                        const position = button.data('position');
                        const description = button.data('description');
                        const image = button.data('image');

                        // Populate modal content
                        modalName.text(name);
                        modalPosition.text(position);
                        modalDescription.text(description);
                        modalImage.attr('src', image).attr('alt', name);

                        // Show modal
                        modal.removeClass('hidden');
                    });

                    // Close modal
                    modalClose.on('click', function() {
                        modal.addClass('hidden');
                    });

                    // Close modal when clicking outside the modal content
                    modal.on('click', function(e) {
                        if ($(e.target).is(modal)) {
                            modal.addClass('hidden');
                        }
                    });
                });
            </script>
        <?php endif; ?>
    </div>
</section>
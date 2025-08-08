<?php
$company_name_opt = trim(get_field('company_name_opt', 'options') ?? '');

if (have_rows('rptr_company_address', 'options')): ?>
    <div class="tabs-container">
        <!-- Tabs Navigation -->
        <ul class="tabs-nav flex space-x-4 border-b border-gray-300 mb-6">
            <?php $tab_index = 0; ?>
            <?php while (have_rows('rptr_company_address', 'options')): the_row(); ?>
                <li class="tab-item cursor-pointer px-4 py-2 text-gray-600 hover:text-primary transition border-b-2 border-transparent hover:border-primary <?php echo $tab_index === 0 ? 'active' : ''; ?>" data-tab="tab-<?php echo $tab_index; ?>">
                    <?php echo esc_html(get_sub_field('title')); ?>
                </li>
                <?php $tab_index++; ?>
            <?php endwhile; ?>
        </ul>

        <!-- Tabs Content -->
        <div class="tabs-content space-y-6">
            <?php $tab_index = 0; ?>
            <?php while (have_rows('rptr_company_address', 'options')): the_row(); ?>
                <div class="tab-pane <?php echo $tab_index === 0 ? 'block' : 'hidden'; ?>" id="tab-<?php echo $tab_index; ?>">
                    <?php 
                        $title = trim(get_sub_field('title') ?? '');
                    ?>
                    <div class="space-y-6">
                        <!-- Address -->
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0 w-12 h-12 bg-blue-100 text-primary rounded-full flex items-center justify-center">
                                <span class="dashicons dashicons-location-alt text-2xl"></span>
                            </div>
                            <div>
                                <div class="font-semibold text-gray-800 text-lg">
                                    <?php echo "{$company_name_opt}, {$title}"; ?>
                                </div>
                                <div class="text-gray-600 leading-relaxed">
                                    <?php echo get_sub_field('address'); ?>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <?php if ($company_email = get_sub_field('email') ?? null): ?>
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 text-primary rounded-full flex items-center justify-center">
                                    <span class="dashicons dashicons-email text-2xl"></span>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-800 text-lg">
                                        <a href="mailto:<?php echo esc_html($company_email); ?>" class="text-primary hover:text-blue-800 transition">
                                            <?php echo esc_html($company_email); ?>
                                        </a>
                                    </div>
                                    <p class="text-gray-600 text-sm">We typically respond within 24 hours.</p>
                                </div>
                            </div>
                        <?php endif; ?>

                        <!-- Telephone -->
                        <?php if ($company_tel = get_sub_field('telephone') ?? null): ?>
                            <div class="flex items-start space-x-4">
                                <div class="flex-shrink-0 w-12 h-12 bg-blue-100 text-primary rounded-full flex items-center justify-center">
                                    <span class="dashicons dashicons-phone text-2xl"></span>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-800 text-lg">
                                        <a href="tel:<?php echo esc_html($company_tel); ?>" class="text-primary hover:text-blue-800 transition">
                                            <?php echo esc_html($company_tel); ?>
                                        </a>
                                    </div>
                                    <p class="text-gray-600 text-sm">Available Monday to Friday, 9 AM - 5 PM.</p>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php $tab_index++; ?>
            <?php endwhile; ?>
        </div>
    </div>
    <script>
        jQuery(document).ready(function ($) {
            $('.tabs-nav .tab-item').on('click', function () {
                const tabId = $(this).data('tab');

                // Remove active class from all tabs
                $('.tabs-nav .tab-item').removeClass('active border-primary text-primary').addClass('border-transparent');
                $(this).addClass('active border-primary text-primary').removeClass('border-transparent');

                // Hide all tab panes
                $('.tabs-content .tab-pane').addClass('hidden').removeClass('block');

                // Show the selected tab pane
                $('#' + tabId).removeClass('hidden').addClass('block');
            });
        });
    </script>
<?php endif; ?>
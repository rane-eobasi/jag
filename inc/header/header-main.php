<?php
/**
 * Main Header Section
 */

// Vars
$company_logo_opt = get_field( 'company_logo_opt', 'option' );
$company_logo_opt_url = $company_logo_opt[ 'url' ];
$company_name_opt = get_field( 'company_name_opt', 'option' );

$cta_topbar_txt_opt = get_field( 'cta_topbar_txt_opt', 'options' );
$cta_topbar_link_opt = get_field( 'cta_topbar_link_opt', 'options' );

// Nav
$nav_args = array(
    'menu'              => 'Main Navigation',
    'container_id'      => 'primary-menu',
    'container_class'   => 'hidden lg:block p-4 lg:p-0 bg-gray-100 lg:bg-transparent',
    'menu_class'        => 'main-browse-nav lg:flex lg:-mx-4 space-y-4 lg:space-y-0 lg:space-x-4',
    'li_class_0'        => 'lg:mx-4 relative group',
    'submenu_class'     => 'absolute min-w-[300px] left-0 mt-0 origin-top-left transition-all duration-300 ease-out bg-white shadow-lg z-50 hidden lg:group-hover:block',
    'link_class_0'      => 'text-gray-800 hover:text-gray-900 font-semibold transition',
    'link_class_1'      => 'block px-4 py-2 hover:bg-gray-100 transition',
    'fallback_cb'       => false,
);
?>
<header class="main-header">
    <div class="rane-container py-1">
        <div class="relative lg:flex lg:justify-between lg:items-center">
            <div class="flex justify-between items-center">
                <div>
                    <a href="<?php echo get_bloginfo( 'url' ); ?>" class="home-link !no-underline flex-col">
                        <img src="<?php echo $company_logo_opt_url; ?>" alt="<?php echo $company_name_opt; ?>" class="home-link__logo">
                    </a>
                </div>

                <div class="block lg:hidden">
                    <a href="#" aria-label="Toggle navigation" id="primary-menu-toggle">
                        <svg viewBox="0 0 20 20" class="inline-block w-6 h-6" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g stroke="none" stroke-width="1" class="text-primary" fill="currentColor" fill-rule="evenodd">
                                <g id="icon-shape">
                                    <path d="M0,3 L20,3 L20,5 L0,5 L0,3 Z M0,9 L20,9 L20,11 L0,11 L0,9 Z M0,15 L20,15 L20,17 L0,17 L0,15 Z"
                                        id="Combined-Shape"></path>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="lg:flex lg:space-x-12 items-center">
                <?php wp_nav_menu($nav_args); ?>
            </div>
            <div class="hidden lg:block">
                <a href="<?php echo esc_url( $cta_topbar_link_opt ); ?>" class="rane-button rane-button--hero">
                    <?php echo esc_html( $cta_topbar_txt_opt ); ?>
                </a>
            </div>
        </div>
    </div>
</header>
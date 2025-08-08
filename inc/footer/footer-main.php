
<?php
/**
 * Main footer section
 */

// Vars
$ftr_opts_logo = (get_field('company_logo_ftr_opt','options')) ? get_field('company_logo_ftr_opt','options') : get_field('company_logo_opt','options');
$ftr_opts_logo_url = $ftr_opts_logo[ 'url' ];
$site_name = get_field( 'company_name_opt', 'options' );

$ftr_opts_address = get_field( 'company_addr_opt', 'options' );
$ftr_opts_tel = get_field( 'company_tel_opt', 'options' );
$ftr_opts_email = get_field( 'company_email_opt', 'options' );

$ftr_opts_facebook = get_field( 'facebook_link_opt', 'options' );
$ftr_opts_twit = get_field( 'twitter_link_opt', 'options' );
$ftr_opts_insta = get_field( 'instagram_link_opt', 'options' );
$ftr_opts_linkedin = get_field( 'linkedin_link_opt', 'options' );

// Footer Navs
$important_links = array(
	"menu" => "Products Links", // The menu to show
	"container" => false, // remove wrapping container
	"menu_class" => "footer-browse-nav space-y-2 text-md" // set class of UL
);

$useful_links = array(
	"menu" => "Quick Links", // The menu to show
	"container" => false, // remove wrapping container
	"menu_class" => "footer-browse-nav space-y-2 text-md",
    "li_class" => "no-underline",
);
?>
<div class="bg-white py-12">
    <div class="rane-container grid grid-cols-1 md:grid-cols-5 gap-8 text-gray-brand">
        <!-- Logo Section -->
        <div class="col-span-1">
            <?php if ( $ftr_opts_logo_url ) : ?>
                <img src="<?php echo esc_url( $ftr_opts_logo_url ); ?>" alt="<?php echo esc_attr( $site_name ); ?>" class="mb-4">
            <?php endif; ?>
        </div>

        <!-- Useful Links -->
        <div class="col-span-1">
            <h3 class="text-xl font-semibold mb-4">Products & Services</h3>
            <?php wp_nav_menu($important_links); ?>
        </div>

        <!-- Important Links -->
        <div class="col-span-1">
            <h3 class="text-xl font-semibold mb-4">Quick Links</h3>
            <?php wp_nav_menu($useful_links); ?>
        </div>

        <!-- Get in Touch -->
        <div class="col-span-1">
            <h3 class="text-xl font-semibold mb-4">Location</h3>
            <p class="text-md mb-2"><?php echo $ftr_opts_address; ?></p>
        </div>

        <!-- More (Phone and Email) -->
        <div class="col-span-1">
            <p class="text-md mb-2 flex items-center">
                <span class="dashicons dashicons-phone mr-2"></span>
                <a href="tel:<?php echo esc_attr( $ftr_opts_tel ); ?>" class="!no-underline"><?php echo esc_html( $ftr_opts_tel ); ?></a>
            </p>
            <p class="text-md flex items-center">
                <span class="dashicons dashicons-email mr-2"></span>
                <a href="mailto:<?php echo esc_attr( $ftr_opts_email ); ?>" class="!no-underline"><?php echo esc_html( $ftr_opts_email ); ?></a>
            </p>
        </div>
    </div>
</div>
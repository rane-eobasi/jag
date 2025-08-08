<?php
/**
 * Top Header Section
 */

// Vars
$ftr_opts_tel = get_field( 'company_tel_opt', 'options' );
$ftr_opts_email = get_field( 'company_email_opt', 'options' );

?>

<div class="hidden md:block bg-secondary py-2">
    <div class="rane-container">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4 text-gray-800">
                <div class="text-md flex items-center space-x-2">
                    <!-- <span class="dashicons dashicons-phone"></span>
                    <a href="tel:<?php echo esc_attr( $ftr_opts_tel ); ?>" class="!no-underline"><?php echo esc_html( $ftr_opts_tel ); ?></a> -->
                </div>
                <div class="text-md flex items-center space-x-2">
                    <span class="dashicons dashicons-email"></span>
                    <a href="mailto:<?php echo esc_attr( $ftr_opts_email ); ?>" class="!no-underline"><?php echo esc_html( $ftr_opts_email ); ?></a>
                </div>
            </div>
            <?php get_template_part( 'inc/parts/social-links' ); ?>
        </div>
    </div>
</div>
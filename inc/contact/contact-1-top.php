<?php
/**
 * Main contact page - top section (Modern and Elegant Design for Health Institution)
 */

// Company Details
$company_name_opt 	= get_field( 'company_name_opt', 'options' );
$company_addr_opt 	= get_field( 'company_addr_opt', 'options' );
$company_email_opt 	= get_field( 'company_email_opt', 'options' );
$company_tel_opt 	= get_field( 'company_tel_opt', 'options' );

// Social Media Links
$social_links = [
    'facebook'  => [ 'url' => get_field( 'facebook_link_opt', 'options' ), 'icon' => 'dashicons-facebook-alt' ],
    'twitter'   => [ 'url' => get_field( 'twitter_link_opt', 'options' ), 'icon' => 'dashicons-twitter' ],
    'instagram' => [ 'url' => get_field( 'instagram_link_opt', 'options' ), 'icon' => 'dashicons-instagram' ],
    'linkedin'  => [ 'url' => get_field( 'linkedin_link_opt', 'options' ), 'icon' => 'dashicons-linkedin' ],
];
?>

<section class="py-20 bg-gradient-to-b from-secondary/5 to-white">
  <div class="container mx-auto px-6 lg:px-12">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 items-center">

      <!-- Contact Form Section -->
      <div class="bg-white p-10 rounded-3xl shadow-xl border border-gray-200">
        <h2 class="rane-heading rane-heading--widget text-primary">Get in Touch</h2>
        <p class="text-lg text-gray-600 mb-8">We’re here to help. Fill out the form below, and we’ll get back to you as soon as possible.</p>
        <?php echo FrmFormsController::get_form_shortcode( array( 'id' => 1 ) ); ?>
      </div>

      <!-- Contact Information Section -->
      <div class="space-y-10">
        <h2 class="rane-heading">Contact Information</h2>
        <p class="text-lg text-gray-600">Feel free to reach out to us via email, phone, or visit our office. We’re always happy to assist you.</p>

        <?php get_template_part( 'inc/contact/contact-info' ); ?>

        <!-- Social Media Links -->
        <div class="flex space-x-4 mt-8">
          <?php foreach ( $social_links as $key => $social ): ?>
            <?php if ( ! empty( $social['url'] ) ): ?>
              <a href="<?php echo esc_url( $social['url'] ); ?>" target="_blank" class="w-10 h-10 bg-blue-100 text-primary rounded-full flex items-center justify-center hover:bg-blue-200 transition !no-underline">
                <span class="dashicons <?php echo esc_attr( $social['icon'] ); ?>"></span>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>

    </div><!-- .grid -->
  </div><!-- .container -->
</section>
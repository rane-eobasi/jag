<?php
/**
 * Enquiry Component
 *
 * @package Rane_Starter
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$contents = [
	'business' => [
		'label'   => 'For Business',
		'title'   => 'Enquiries For Business',
		'content' => 'For business enquiries, please contact us directly via email or phone. We are here to assist you with your business needs.',
		'form_id' => 2,
	],
	'home' => [
		'label'   => 'For Home',
		'title'   => 'Enquiries For Home',
		'content' => 'For home enquiries, please reach out to us through our contact form or give us a call. We look forward to helping you.',
		'form_id' => 3,
	],
];
?>

<div class="tabs-container">
	<!-- Dynamic Tab Header -->
	<h2 id="tab-header" class="text-2xl font-bold mb-4">
		<?php echo esc_html( reset( $contents )['title'] ); ?>
	</h2>

	<!-- Tab Menu -->
	<div class="tabs flex items-center rounded-2xl mb-4 overflow-hidden">
		<?php foreach ( $contents as $tab_key => $tab_content ) : ?>
			<button class="tab-button w-1/2 px-4 py-2 bg-gradient-to-l from-gray-400 to-gray-200 text-white font-bold cursor-pointer transition-colors duration-300"
				data-tab="<?php echo esc_attr( $tab_key ); ?>"
				data-title="<?php echo esc_attr( $tab_content['title'] ); ?>">
				<?php echo esc_html( $tab_content['label'] ); ?>
			</button>
		<?php endforeach; ?>
	</div>

	<!-- Tab Contents -->
	<div class="tab-contents">
		<?php foreach ( $contents as $tab_key => $tab_content ) : ?>
			<div class="tab-content hidden" id="tab-<?php echo esc_attr( $tab_key ); ?>">
				<p class="mb-4"><?php echo esc_html( $tab_content['content'] ); ?></p>
				<?php echo do_shortcode( '[formidable id=' . esc_attr( $tab_content['form_id'] ) . ']' ); ?>
			</div>
		<?php endforeach; ?>
	</div>
</div>

<script>
	jQuery(document).ready(function ($) {
		$('.tab-button').on('click', function () {
			const tabId = $(this).data('tab');
			const title = $(this).data('title');

			// Update header title
			$('#tab-header').text(title);

			// Update active tab
			$('.tab-button').removeClass('from-primary to-secondary shadow-lg shadow-secondary/35');
			$('.tab-content').addClass('hidden');

			$(this).addClass('from-primary to-secondary shadow-lg shadow-secondary/35');
			$('#tab-' + tabId).removeClass('hidden');
		});

		// Trigger the first tab by default
		$('.tab-button:first').trigger('click');
	});
</script>

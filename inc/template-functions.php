<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package rane_digital
 */

// Include the custom post type and taxonomy functions
require_once get_template_directory() . '/inc/jag-course-functions.php';

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function rane_digital_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'rane_digital_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function rane_digital_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'rane_digital_pingback_header' );


/**
 * ACF Options Page
 */
add_action('acf/init', function () {
    if (function_exists('acf_add_options_page')) {
        acf_add_options_page(array(
            'page_title'    => 'Theme General Settings',
            'menu_title'    => 'Theme Settings',
            'menu_slug'     => 'theme-general-settings',
            'capability'    => 'edit_posts',
            'position'      => 1,
            'redirect'      => false,
        ));

        acf_add_options_sub_page(array(
            'page_title'    => 'Company Details',
            'menu_title'    => 'Company Details',
            'parent_slug'   => 'theme-general-settings',
        ));

       /*  acf_add_options_sub_page(array(
            'page_title'    => 'Text & Blocks',
            'menu_title'    => 'Text & Blocks',
            'parent_slug'   => 'theme-general-settings',
        )); */
    }
}, 1);

/**
 * Images Sizes 
 * Add here as needed
 */
add_image_size( 'main-banner', 1920, 500, true );
add_image_size( "builder-img", 400, 400, true );

/* Add GA4 javascript code as close to 
the opening <head> tag as possible
=====================================================*/
function ga4_tracking_code(){

	$ga4_tracking_id = get_field('ga4_tracking_id', 'options');	
	if($ga4_tracking_id) { ?> 

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $ga4_tracking_id; ?>"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', '<?php echo $ga4_tracking_id; ?>');
	</script>
<?php }
}
add_action( 'wp_head', 'ga4_tracking_code', 10 );


/* Add Facebook Pixel code to the head if there is an ID
=====================================================*/
function add_facebook_pixel() {

	$fb_pixel_id = get_field('fb_pixel_id', 'options');

	if($fb_pixel_id) {
    ?>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '<?php echo $fb_pixel_id; ?>'); // Insert your pixel ID here.
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=<?php echo $fb_pixel_id; ?>&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
    <?php
    }
}
add_action('wp_head', 'add_facebook_pixel');

/**
 * Autoload PHP files from a specified directory.
 *
 * This function scans a given directory for PHP files with an optional suffix
 * and automatically includes them. It is useful for loading multiple files,
 * such as theme components, custom post types, or functions.
 *
 * @param string      $path   The relative path from the theme's root directory.
 * @param string|null $suffix Optional. A filename suffix to filter files (without the ".php" extension).
 *                            If provided, only files matching "*.$suffix.php" will be loaded.
 *
 * @return void
 */
function rane_autoload_dir_files($path, $suffix = null)
{
    $dir = get_stylesheet_directory() . '/' . trim($path, '/');
    $suffix = $suffix ? '.' . ltrim($suffix, '.') : '';

    // Ensure the directory exists before proceeding.
    if (!is_dir($dir)) {
        return;
    }

    // Get all PHP files matching the optional suffix.
    $files = glob("{$dir}/*{$suffix}.php");

    // Stop if no files are found.
    if (empty($files)) {
        return;
    }

    // Require each file found in the directory.
    foreach ($files as $file) {
        require_once $file;
    }
}

/**
 * Dynamically register shortcodes from a specified directory.
 *
 * This function scans a given directory within the active theme for PHP files and
 * registers each file as a shortcode in WordPress.
 *
 * @param string $path   The relative path from the theme directory where shortcode files are stored.
 * @param string|null $suffix Optional suffix to filter files (e.g., '.custom' for '*.custom.php').
 */
function rane_add_dynamic_shortcodes($path, $suffix = null) {
    // Get the absolute directory path
    $dir = get_stylesheet_directory() . '/' . trim($path, '/');
    $suffix = $suffix ? '.' . ltrim($suffix, '.') : '';

    // Ensure the directory exists
    if (!is_dir($dir)) {
        return;
    }

    // Fetch all PHP files matching the suffix pattern
    $files = glob("{$dir}/*{$suffix}.php");

    if (empty($files)) {
        return;
    }

    // Register each PHP file as a shortcode
    foreach ($files as $file) {
        // Extract the shortcode name from the file name
        $shortcode_name = basename($file, '.php');

        // Ensure the shortcode name is valid
        if (!preg_match('/^[a-zA-Z0-9_-]+$/', $shortcode_name)) {
            continue; // Skip invalid shortcode names
        }

        // Register the shortcode
        add_shortcode($shortcode_name, function ($attr, $content = null) use ($file) {
            // Start output buffering
            ob_start();

            // Pass the attributes as global variables or use set_query_vars if needed
            set_query_var('attr', $attr);
            set_query_var('shortcode_content', $content);

            // Include the PHP file
            require($file);

            // Return the content generated by the included PHP file
            return ob_get_clean();
        });
    }
}

/* Add shortcodes
=================*/
add_action('after_setup_theme', function() {
    rane_add_dynamic_shortcodes('inc/shortcodes'); // Registers shortcodes from the 'shortcodes' directory
});

/**
 * Convert an associative array into HTML tag attributes.
 *
 * @param array $attributes Associative array of attributes (key => value).
 * @return string HTML attributes as a string.
 */
function rane_array_to_attributes($attributes) {
    if (!is_array($attributes) || empty($attributes)) {
        return '';
    }

    $html_attributes = [];

    foreach ($attributes as $key => $value) {
        // Ensure the key is valid and the value is not null
        if (!empty($key) && $value !== null) {
            $html_attributes[] = sprintf('%s="%s"', esc_attr($key), esc_attr($value));
        }
    }

    return implode(' ', $html_attributes);
}

function rane_text_media(string $key, ?string $field = 'text', $default = '') {
    echo rane_get_text_media($key, $field, $default);
}

function rane_get_text_media(string $key, ?string $field = 'text', $default = '') {
    static $cached_repeater = null;
    if (is_null($cached_repeater)) {
        $cached_repeater = get_field('rptr_text', 'options') ?? [];
    }

    foreach ($cached_repeater as $entry) {
        if (($entry['key'] ?? null) !== $key) {
            continue;
        }

        $type  = $entry['type'] ?? null;
        $value = $entry['value'] ?? null;

        if (!$type || !$value) {
            return $default;
        }

        if ($type === 'text') {
            return $field === null || $field === 'text'
                ? ($value['text'] ?? $default)
                : $default;
        }

        if ($type === 'image') {
            $image = $value['image'] ?? null;
            if (!$image) {
                return $default;
            }

            return $field === null ? $image : ($image[$field] ?? $default);
        }

        // Other types can be added here
        return $default;
    }

    return $default;
}
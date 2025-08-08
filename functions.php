<?php

/**
 * Theme setup.
 */
function tailpress_setup() {
	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'tailpress' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	add_theme_support( 'responsive-embeds' );

	// add_theme_support( 'editor-styles' );
	// add_editor_style( 'css/editor-style.css' );
}

add_action( 'after_setup_theme', 'tailpress_setup' );

function rane_get_tailpress_asset_info( $asset, $isDev = true ) {
    $theme = wp_get_theme();
    $asset_path = get_stylesheet_directory() . '/' . $asset; // Use file system path for filemtime
    $asset_url = tailpress_asset( $asset ); // Use URL for enqueuing assets

    if ( $isDev && file_exists( $asset_path ) ) {
        $asset_version = date( 'ymd-Gis', filemtime( $asset_path ) );
    } else {
        $asset_version = $theme->get( 'Version' );
    }

    return array(
        'path'    => $asset_url, // Use URL for enqueuing
        'version' => $asset_version,
    );
}

/**
 * Enqueue theme assets.
 */
function tailpress_enqueue_scripts() {
	$custom_css = rane_get_tailpress_asset_info( 'css/custom.css' );
	$app_css = rane_get_tailpress_asset_info( 'css/app.css' );
	$app_js = rane_get_tailpress_asset_info( 'js/app.js' );

	// Google Font (swap our URL to suit - (https://fonts.google.com/)
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', false );

	wp_enqueue_style( 'slick-css', get_stylesheet_directory_uri() . '/vendor/slick/slick.css');				// Slick Slider CSS
	wp_enqueue_style( 'slick-theme-css', get_stylesheet_directory_uri() . '/vendor/slick/slick-theme.css');	// Slick Slider Theme CSS
	wp_enqueue_style( 'fontawesome-style', get_stylesheet_directory_uri() . '/vendor/fontawesome/css/all.min.css');	// Font Awesome CSS
	wp_enqueue_style( 'animate-style', get_stylesheet_directory_uri() . '/css/animate.css');				// Load animate css
	// Theme styles
	wp_enqueue_style( 'tailpress', $app_css['path'], array(), $app_css['version'] );
	wp_enqueue_style( 'tailpress-custom', $custom_css['path'], array(), $custom_css['version'] );

	 // Load Dashicons on the front-end
    if (is_singular() || is_home() || is_page()) {
        wp_enqueue_style('dashicons');
    }

	// Scripts
	wp_enqueue_script( 'wow-script', get_stylesheet_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '', true );	// Wow
	wp_enqueue_script( 'slick-script', get_stylesheet_directory_uri() . '/vendor/slick/slick.min.js', array( 'wow-script' ), '', true );	// Slick Slider JS
	wp_enqueue_script( 'site-script', get_stylesheet_directory_uri() . '/js/functions.js', array( 'slick-script' ), '', true  );		// Custom JS File
	wp_enqueue_script( 'tailpress', $app_js['path'], array(), $app_js['version'] );
}

add_action( 'wp_enqueue_scripts', 'tailpress_enqueue_scripts' );

/**
 * Get asset path.
 *
 * @param string  $path Path to asset.
 *
 * @return string
 */
function tailpress_asset( $path ) {
	if ( wp_get_environment_type() === 'production' ) {
		return get_stylesheet_directory_uri() . '/' . $path;
	}

	return add_query_arg( 'time', time(),  get_stylesheet_directory_uri() . '/' . $path );
}

/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_$depth"} ) ) {
		$classes[] = $args->{"li_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'tailpress_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The current item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function tailpress_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_$depth"} ) ) {
		$classes[] = $args->{"submenu_class_$depth"};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'tailpress_nav_menu_add_submenu_class', 10, 3 );

/**
* Adds custom classes to <a> tags in wp_nav_menu().
*
* @param array    $atts  HTML attributes for the <a> element.
* @param WP_Post  $item  Menu item.
* @param stdClass $args  Menu arguments.
* @param int      $depth Depth of the item.
*
* @return array Modified attributes.
*/
function tailpress_nav_menu_add_link_class( $atts, $item, $args, $depth ) {
   if ( isset( $args->link_class ) ) {
	   $atts['class'] = isset( $atts['class'] ) ? $atts['class'] . ' ' . $args->link_class : $args->link_class;
   }

   if ( isset( $args->{"link_class_$depth"} ) ) {
	   $atts['class'] = isset( $atts['class'] ) ? $atts['class'] . ' ' . $args->{"link_class_$depth"} : $args->{"link_class_$depth"};
   }

   return $atts;
}
add_filter( 'nav_menu_link_attributes', 'tailpress_nav_menu_add_link_class', 10, 4 );


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}


/* ============================================================ */
/* Custom Start...
/* ============================================================ */

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');

/**
 * Code to add the custom login css file to the theme
 * https://codex.wordpress.org/Customizing_the_Login_Form
 * - file is "/login/custom-login-styles.css" 
 */
function my_custom_login() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('stylesheet_directory') . '/login/custom-login-styles.css" />';
}
add_action('login_head', 'my_custom_login');

function my_login_logo_url() {
    return get_home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );


/**
 * Load an admin stylesheet
 */
function my_custom_admin_styles() {
    wp_enqueue_style( 'admin-styles', get_stylesheet_directory_uri() . '/admin-style.css' );
}
add_action( 'admin_enqueue_scripts', 'my_custom_admin_styles' );

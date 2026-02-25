<?php
if (!function_exists('gav_setup')) :
	function gav_setup()
	{
		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support('automatic-feed-links');
		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support('post-thumbnails');
		// Remove Guttemberg editor
		add_filter('use_block_editor_for_post', '__return_false');
		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus(array(
			'primary'   => __('Primary Menu', 'gav'),
			'footer'   => __('Footer Menu', 'gav')
		));
		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support('post-formats', array('aside', 'gallery', 'quote', 'image', 'video'));
	}
endif; // gav_setup
add_action('after_setup_theme', 'gav_setup');

// Custom logo
function gav_custom_logo_setup()
{
	$defaults = array(
		'height'               => 100,
		'width'                => 400,
		'flex-height'          => true,
		'flex-width'           => true,
		'header-text'          => array('site-title', 'site-description'),
		'unlink-homepage-logo' => true,
	);

	add_theme_support('custom-logo', $defaults);
}
add_action('after_setup_theme', 'gav_custom_logo_setup');

// Remove comments
add_action('admin_init', function () {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url());
		exit;
	}

	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
	foreach (get_post_types() as $post_type) {
		if (post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
});
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);
add_action('admin_menu', function () {
	remove_menu_page('edit-comments.php');
});
add_action('init', function () {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
});

// Remove the content editor from ALL pages
add_action('admin_head', 'remove_content_editor');
function remove_content_editor()
{
	remove_post_type_support('page', 'editor');
}

// Rimuove la pagina singola degli articoli pubblici reindirizzando (o mostra 404 se preferisci)
add_action('template_redirect', function () {
	// Non intervenire nell'admin, nelle richieste di feed o nelle anteprime
	if (is_admin() || is_preview()) {
		return;
	}

	// Verifica se siamo su un singolo post (post type 'post')
	if (is_singular('post')) {
		// Opzione A (attiva): reindirizza alla homepage con 301
		wp_redirect(home_url(), 301);
		exit;

		// Opzione B (alternativa): mostra un 404 (decommentare per usare)
		// global $wp_query;
		// $wp_query->set_404();
		// status_header(404);
		// nocache_headers();
		// include( get_query_template( '404' ) );
		// exit;
	}
});

// Rimuove il permalink dall'editor classico dei post (nasconde la UI del permalink)
add_filter('get_sample_permalink_html', function ($html, $post_id, $new_title, $new_slug, $post) {
	// Applichiamo solo nell'admin per i post standard
	if (is_admin() && isset($post->post_type) && 'post' === $post->post_type) {
		return ''; // ritorna stringa vuota: nessun HTML del permalink mostrato
	}

	return $html;
}, 10, 5);

// Funzione per caricare Swiper.js e il relativo CSS
function enqueue_swiper_assets()
{
	wp_enqueue_style('swiper-css', 'https://unpkg.com/swiper/swiper-bundle.min.css');

	wp_enqueue_script('swiper-js', 'https://unpkg.com/swiper/swiper-bundle.min.js', array(), null, true);

	wp_enqueue_script('custom-swiper-init', get_template_directory_uri() . '/assets/js/swiper.js', array('swiper-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_swiper_assets');


// Style and script
function add_theme_scripts()
{
	wp_enqueue_style('style', get_stylesheet_uri());

	wp_enqueue_script('scripts', get_template_directory_uri() . '/scripts.js', array('jquery'), 1.1, true);
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');

// ACF Option 
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(array(
		'page_title'    => 'Opzioni Tema',
		'menu_title'    => 'Opzioni',
		'menu_slug'     => 'option-settings',
		'capability'    => 'edit_posts',
		'redirect'      => false
	));
}

// Default: seleziona tutti gli enti nel campo Post Object "selettore_enti"
add_filter('acf/load_value/name=selettore_enti', function ($value, $post_id, $field) {
	// Se il campo ha già un valore salvato, non sovrascrivere
	if (!empty($value)) {
		return $value;
	}

	// Recupera tutti i post del CPT 'enti'
	$enti = get_posts(array(
		'post_type'      => 'enti',
		'posts_per_page' => -1,
		'fields'         => 'ids',
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
	));

	return !empty($enti) ? $enti : $value;
}, 10, 3);

// Functions Parts
require get_template_directory() . '/functions-parts/cpt-collaborazioni.php';
require get_template_directory() . '/functions-parts/cpt-enti.php';
require get_template_directory() . '/functions-parts/cpt-giornalino.php';
require get_template_directory() . '/functions-parts/cpt-progetti.php';
require get_template_directory() . '/functions-parts/cpt-servizi.php';

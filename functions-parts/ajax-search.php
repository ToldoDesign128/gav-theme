<?php
// ── Live Search AJAX ──

/**
 * Redirect native WP search (?s=) to the custom search page (/ricerca/?q=)
 */
function gav_redirect_native_search()
{
    if (is_search() && !is_admin()) {
        $search_page = get_page_by_path('ricerca');
        if ($search_page) {
            $term = get_search_query();
            $url  = get_permalink($search_page->ID);
            if ($term) {
                $url = add_query_arg('q', urlencode($term), $url);
            }
            wp_redirect($url, 301);
            exit;
        }
    }
}
add_action('template_redirect', 'gav_redirect_native_search');

/**
 * Enqueue live-search script on the Search page template
 */
function gav_live_search_scripts()
{
    if (is_page_template('search.php')) {
        wp_enqueue_script(
            'gav-live-search',
            get_template_directory_uri() . '/assets/js/live-search.js',
            array('jquery'),
            '1.1',
            true
        );
        wp_localize_script('gav-live-search', 'gavSearch', array(
            'ajax_url'  => admin_url('admin-ajax.php'),
            'nonce'     => wp_create_nonce('gav_live_search'),
            'page_url'  => get_permalink(),
        ));
    }
}
add_action('wp_enqueue_scripts', 'gav_live_search_scripts');

/**
 * AJAX callback: returns matching posts as JSON
 */
function gav_live_search_callback()
{
    check_ajax_referer('gav_live_search', 'nonce');

    $term = isset($_GET['term']) ? sanitize_text_field($_GET['term']) : '';
    if (strlen($term) < 2) {
        wp_send_json_success(array());
    }

    $results = array();

    $query = new WP_Query(array(
        's'              => $term,
        'posts_per_page' => 6,
        'post_type'      => array('page', 'post', 'servizi', 'progetti', 'collaborazioni', 'giornalino'),
        'post_status'    => 'publish',
    ));

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();

            $post_type_obj = get_post_type_object(get_post_type());
            $type_label = '';
            $result_url = get_permalink();

            if (get_post_type() === 'post') {
                // News: link alla pagina generale News
                $news_page_id = get_option('page_for_posts');
                $result_url = $news_page_id ? get_permalink($news_page_id) : home_url('/news');
                $type_label = 'News';
            } elseif (get_post_type() === 'page') {
                $parent_id = wp_get_post_parent_id(get_the_ID());
                $type_label = $parent_id ? get_the_title($parent_id) : get_the_title();
            } else {
                $type_label = $post_type_obj ? $post_type_obj->labels->singular_name : '';
            }

            $excerpt = has_excerpt()
                ? get_the_excerpt()
                : wp_strip_all_tags(get_the_content());
            $excerpt = wp_trim_words($excerpt, 15, '...');

            $results[] = array(
                'title'   => get_the_title(),
                'url'     => $result_url,
                'excerpt' => $excerpt,
                'type'    => $type_label,
            );
        }
        wp_reset_postdata();
    }

    wp_send_json_success($results);
}
add_action('wp_ajax_gav_live_search', 'gav_live_search_callback');
add_action('wp_ajax_nopriv_gav_live_search', 'gav_live_search_callback');

<?php
/*
  *
  * Template Name: Search
  *
  */
get_header(); ?>

<body <?php body_class('theme-fucsia'); ?>>

  <?php get_template_part('template-parts/header-block'); ?>

  <?php $search_query = isset($_GET['q']) ? sanitize_text_field($_GET['q']) : ''; ?>

  <main class="page-search">

    <!-- Search Section -->
    <section class="search-section container">
      <h1 class="search-section__title">Cosa stai cercando?</h1>

      <div class="search-section__bar-wrapper">
        <form role="search" method="get" class="search-section__form" action="<?php echo esc_url(get_permalink()); ?>">
          <span class="search-section__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          </span>
          <input
            type="search"
            class="search-section__input"
            id="searchInput"
            name="q"
            placeholder="Cerca su <?php echo esc_attr(str_replace(array('https://', 'http://'), '', get_site_url())); ?>"
            value="<?php echo esc_attr($search_query); ?>"
            autocomplete="off"
          />
        </form>
      </div>

      <!-- Box link rapidi + suggerimenti (sempre visibile, staccato dalla barra) -->
      <div class="search-section__box" id="searchBox">
        <!-- Quick links (ACF) -->
        <div class="search-section__quick-links" id="quickLinks">
          <?php if (have_rows('repeater_suggerimenti_search')) : ?>
            <span class="search-section__dropdown-label">Link rapidi</span>
            <ul>
              <?php while (have_rows('repeater_suggerimenti_search')) : the_row();
                $link = get_sub_field('link');
                if ($link) : ?>
                  <li>
                    <a href="<?php echo esc_url($link['url']); ?>" <?php echo !empty($link['target']) ? 'target="' . esc_attr($link['target']) . '"' : ''; ?>>
                      <span class="arrow">&rarr;</span>
                      <?php echo esc_html($link['title']); ?>
                    </a>
                  </li>
                <?php endif;
              endwhile; ?>
            </ul>
          <?php endif; ?>
        </div>

        <!-- Live suggestions -->
        <div class="search-section__suggestions" id="searchSuggestions" style="display:none;">
          <span class="search-section__dropdown-label">Ricerche suggerite</span>
          <ul id="suggestionsList"></ul>
        </div>
      </div>
    </section>

    <!-- Results Section -->
    <?php if ($search_query) :
      $paged = isset($_GET['pag']) ? max(1, intval($_GET['pag'])) : 1;
      $search_args = array(
        's'              => $search_query,
        'posts_per_page' => 10,
        'paged'          => $paged,
        'post_type'      => array('page', 'post', 'servizi', 'progetti', 'collaborazioni', 'giornalino'),
        'post_status'    => 'publish',
      );
      $search_results = new WP_Query($search_args);
    ?>
      <section class="search-results container">

        <p class="search-results__count">
          <?php echo $search_results->found_posts; ?> risultat<?php echo $search_results->found_posts == 1 ? 'o' : 'i'; ?> per &ldquo;<?php echo esc_html($search_query); ?>&rdquo;
        </p>

        <?php if ($search_results->have_posts()) : ?>
          <div class="search-results__list">
            <?php while ($search_results->have_posts()) : $search_results->the_post();
              $post_type_obj = get_post_type_object(get_post_type());
              $type_label = '';
              $card_url = get_permalink();

              if (get_post_type() === 'post') {
                // News: link alla pagina generale News
                $news_page_id = get_option('page_for_posts');
                $card_url = $news_page_id ? get_permalink($news_page_id) : home_url('/news');
                $type_label = 'News';
              } elseif (get_post_type() === 'page') {
                $parent_id = wp_get_post_parent_id(get_the_ID());
                $type_label = $parent_id ? get_the_title($parent_id) : get_the_title();
              } else {
                $type_label = $post_type_obj ? $post_type_obj->labels->singular_name : '';
              }
            ?>
              <a href="<?php echo esc_url($card_url); ?>" class="search-results__card">
                <div class="search-results__card__content">
                  <h2 class="search-results__card__title"><?php the_title(); ?></h2>
                  <?php
                  $excerpt_text = has_excerpt() ? get_the_excerpt() : wp_strip_all_tags(get_the_content());
                  if ($excerpt_text) : ?>
                    <p class="search-results__card__excerpt">
                      <?php echo wp_trim_words($excerpt_text, 25, '...'); ?>
                    </p>
                  <?php endif; ?>
                </div>
                <?php if ($type_label) : ?>
                  <span class="search-results__card__tag"><?php echo esc_html($type_label); ?></span>
                <?php endif; ?>
              </a>
            <?php endwhile; ?>
          </div>

          <?php
          $total_pages = $search_results->max_num_pages;
          if ($total_pages > 1) : ?>
            <div class="search-results__pagination">
              <?php for ($i = 1; $i <= $total_pages; $i++) :
                $page_url = add_query_arg(array('q' => urlencode($search_query), 'pag' => $i), get_permalink());
              ?>
                <a href="<?php echo esc_url($page_url); ?>" class="page-numbers <?php echo ($i === $paged) ? 'current' : ''; ?>">
                  <?php echo $i; ?>
                </a>
              <?php endfor; ?>
            </div>
          <?php endif; ?>

        <?php else : ?>
          <p class="search-results__no-results">Nessun risultato trovato per &ldquo;<?php echo esc_html($search_query); ?>&rdquo;</p>
        <?php endif;
        wp_reset_postdata(); ?>
      </section>
    <?php endif; ?>

  </main>

  <?php get_template_part('template-parts/footer-block'); ?>

  <?php get_footer(); ?>
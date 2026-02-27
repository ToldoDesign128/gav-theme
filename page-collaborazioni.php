<?php
/*
  *
  * Template Name: Collaborazioni
  *
  */
get_header(); ?>

<body <?php body_class('theme-viola'); ?>>

  <?php get_template_part('template-parts/header-block'); ?>

  <main class="collaborazioni">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <section class="collaborazioni-block container">
      <?php
      $titolo_collaborazioni = get_field('titolo_collaborazioni');

      if ($titolo_collaborazioni) : ?>
        <h1 class="collaborazioni-block__title">
          <?php echo esc_html($titolo_collaborazioni); ?>
        </h1>
      <?php endif; ?>

      <div class="collaborazioni-block__loop">
        <?php /* collaborazioni Loop */

        $collaborazioni_loop = new WP_Query(array(
          'post_type'     => 'collaborazioni',
          'posts_per_page' => -1,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
        )); ?>

        <?php if ($collaborazioni_loop->have_posts()) : while ($collaborazioni_loop->have_posts()) : $collaborazioni_loop->the_post(); ?>

            <?php
            $radio_value = get_field('selettore_colore_collaborazioni');
            // Normalizza il valore: minuscolo multibyte, spazi -> trattini, poi sanitizza
            $radio_slug = '';
            if ($radio_value) {
              $radio_slug = mb_strtolower($radio_value, 'UTF-8');
              $radio_slug = preg_replace('/\s+/', '-', $radio_slug);
              $radio_slug = sanitize_html_class($radio_slug);
            }
            ?>

            <article class="collaborazioni-block__loop__item <?php echo $radio_slug ? ' ' . esc_attr($radio_slug) : ''; ?>">
              <a href="<?php the_permalink(); ?>" class="collaborazioni-block__loop__item__link">
                <div class="collaborazioni-block__loop__item__link__image">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                  <?php endif; ?>
                </div>
                <p class="collaborazioni-block__loop__item__link__title"><?php the_title(); ?></p>
              </a>
            </article>

        <?php endwhile;
        endif; ?>
      </div>
    </section>

    <?php get_template_part('template-parts/enti-block'); ?>

  </main>

  <?php get_template_part('template-parts/footer-block'); ?>

  <?php get_footer(); ?>
<?php
/*
  *
  * Template Name: Servizi
  *
  */
get_header(); ?>

<body <?php body_class('theme-fucsia'); ?>>

  <?php get_template_part('template-parts/header-block'); ?>

  <main class="servizi">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <section class="servizi-block container">
      <?php
      $titolo_servizi = get_field('titolo_servizi');
      $testo_servizi = get_field('testo_servizi');

      if ($titolo_servizi) : ?>
        <h1 class="servizi-block__title">
          <?php echo esc_html($titolo_servizi); ?>
        </h1>
      <?php endif; ?>
      <?php if ($testo_servizi) : ?>
        <div class="servizi-block__text">
          <?php echo wp_kses_post($testo_servizi); ?>
        </div>
      <?php endif; ?>

      <div class="servizi-block__loop">
        <?php /* Servizi Loop */

        $servizi_loop = new WP_Query(array(
          'post_type'     => 'servizi',
          'posts_per_page' => -1,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
        )); ?>

        <?php if ($servizi_loop->have_posts()) : while ($servizi_loop->have_posts()) : $servizi_loop->the_post(); ?>

            <?php
            $radio_value = get_field('selettore_colore_servizi');
            // Normalizza il valore: minuscolo multibyte, spazi -> trattini, poi sanitizza
            $radio_slug = '';
            if ($radio_value) {
              $radio_slug = mb_strtolower($radio_value, 'UTF-8');
              $radio_slug = preg_replace('/\s+/', '-', $radio_slug);
              $radio_slug = sanitize_html_class($radio_slug);
            }
            ?>

            <article class="servizi-block__loop__item <?php echo $radio_slug ? ' ' . esc_attr($radio_slug) : ''; ?>">
              <a href="<?php the_permalink(); ?>" class="servizi-block__loop__item__link">
                <div class="servizi-block__loop__item__link__image">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                  <?php endif; ?>
                </div>
                <p class="servizi-block__loop__item__link__title"><?php the_title(); ?></p>
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
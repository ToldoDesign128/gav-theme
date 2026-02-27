<?php
/*
  *
  * Template Name: Progetti
  *
  */
get_header(); ?>

<body <?php body_class('theme-verde'); ?>>

  <?php get_template_part('template-parts/header-block'); ?>

  <main class="progetti">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <section class="progetti-block container">
      <?php
      $titolo_progetti = get_field('titolo_progetti');

      if ($titolo_progetti) : ?>
        <h1 class="progetti-block__title">
          <?php echo esc_html($titolo_progetti); ?>
        </h1>
      <?php endif; ?>

      <div class="progetti-block__loop">
        <?php /* progetti Loop */

        $progetti_loop = new WP_Query(array(
          'post_type'     => 'progetti',
          'posts_per_page' => -1,
          'orderby'        => 'menu_order',
          'order'          => 'ASC',
        )); ?>

        <?php if ($progetti_loop->have_posts()) : while ($progetti_loop->have_posts()) : $progetti_loop->the_post(); ?>

            <?php
            $radio_value = get_field('selettore_colore_progetti');
            // Normalizza il valore: minuscolo multibyte, spazi -> trattini, poi sanitizza
            $radio_slug = '';
            if ($radio_value) {
              $radio_slug = mb_strtolower($radio_value, 'UTF-8');
              $radio_slug = preg_replace('/\s+/', '-', $radio_slug);
              $radio_slug = sanitize_html_class($radio_slug);
            }
            ?>

            <article class="progetti-block__loop__item <?php echo $radio_slug ? ' ' . esc_attr($radio_slug) : ''; ?>">
              <a href="<?php the_permalink(); ?>" class="progetti-block__loop__item__link">
                <div class="progetti-block__loop__item__link__image">
                  <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large'); ?>
                  <?php endif; ?>
                </div>
                <p class="progetti-block__loop__item__link__title"><?php the_title(); ?></p>
              </a>
            </article>

        <?php endwhile;
        endif;
        wp_reset_postdata(); ?>
      </div>
    </section>

    <section class="network-block container ">
      <div class="network-block__wrap">
        <div class="network-block__wrap__intro">
          <?php
          $title_network = get_field('titolo_network_progetti');
          if ($title_network) : ?>
            <h2 class="network-block__wrap__intro__title"><?php echo esc_html($title_network); ?></h2>
          <?php endif; ?>
        </div>

        <?php
        if (have_rows('repeater_network_progetti')): ?>

          <div class="network-block__wrap__repeater swiperCollaborazioni">
            <ul class="swiper-wrapper">

              <?php
              while (have_rows('repeater_network_progetti')) : the_row();
                $link_rep_network = get_sub_field('link');
                $image_rep_network = get_sub_field('logo');

                if ($link_rep_network) {
                  $link_rep_network_url = $link_rep_network['url'];
                  $link_rep_network_title = $link_rep_network['title'];
                  $link_rep_network_target = $link_rep_network['target'] ? $link_rep_network['target'] : '_self';
                }; ?>

                <li class="network-item swiper-slide">

                  <?php if ($link_rep_network) : ?>
                    <a href="<?php echo esc_url($link_rep_network_url); ?>" target="<?php echo esc_attr($link_rep_network_target); ?>" class="collab-item__link">
                      <?php if ($image_rep_network) : ?>
                        <img src="<?php echo esc_url($image_rep_network['url']); ?>" alt="<?php echo esc_attr($image_rep_network['alt']); ?>">
                      <?php endif; ?>
                    </a>
                  <?php elseif ($image_rep_network) : ?>
                    <img src="<?php echo esc_url($image_rep_network['url']); ?>" alt="<?php echo esc_attr($image_rep_network['alt']); ?>">
                  <?php endif; ?>

                </li>


              <?php
              endwhile; ?>

            </ul>

            <div class="swiper-button-prev"></div>

            <div class="swiper-button-next"></div>

            <div class="swiper-pagination"></div>

          </div>

        <?php
        endif; ?>
      </div>
    </section>

  </main>

  <?php get_template_part('template-parts/footer-block'); ?>

  <?php get_footer(); ?>
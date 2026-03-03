<?php
/*
  *
  * Template Name: Contatti
  *
  */
get_header(); ?>

<body <?php body_class('theme-giallo'); ?>>

  <?php get_template_part('template-parts/header-block'); ?>

  <main class="contatti">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <section class="hero-contatti container">
      <?php
      $title = get_field('titolo_contatti');
      if ($title) : ?>
        <h1 class="hero-contatti__title">
          <?php echo esc_html($title); ?>
        </h1>
      <?php endif; ?>

      <?php
      if (have_rows('repeater_contatti')): ?>
        <div class="hero-contatti__links">

          <?php
          while (have_rows('repeater_contatti')) : the_row();
            $icon = get_sub_field('icona');
            $link = get_sub_field('link');
            $link_2 = get_sub_field('link_2'); ?>

            <div class="hero-contatti__links__item">

              <?php if ($icon) :
                echo file_get_contents($icon['url']);
              endif; ?>

              <div class="hero-contatti__links__item__text">

                <?php if ($link) : ?>
                  <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>">
                    <?php echo esc_html($link['title']); ?>
                  </a>
                <?php endif; ?>

                <?php if ($link_2) : ?>
                  <a href="<?php echo esc_url($link_2['url']); ?>" target="<?php echo esc_attr($link_2['target'] ? $link_2['target'] : '_self'); ?>">
                    <?php echo esc_html($link_2['title']); ?>
                  </a>
                <?php endif; ?>

              </div>

            </div>

          <?php
          endwhile; ?>

        </div>
      <?php
      endif; ?>

    </section>

    <section class="maps-block container">
      <div class="maps-block__info">
        <?php
        $map_title = get_field('titolo_mappa_contatti');
        if ($map_title) : ?>
          <h2 class="maps-block__info__title">
            <?php echo esc_html($map_title); ?>
          </h2>
        <?php endif; ?>
      </div>
      <div class="maps-block__content">
        <?php
        $map_embed = get_field('mappa_contatti');
        if ($map_embed) {
          echo strip_tags($map_embed, '<iframe>');
        }; ?>
      </div>
    </section>

    <section class="social-contatti">
      <div class="social-contatti__wrap container">
        <?php
        $title_social = get_field('titolo_social_contatti');
        if ($title_social) : ?>
          <h3 class="social-contatti__wrap__title">
            <?php echo esc_html($title_social); ?>
          </h3>
        <?php endif; ?>

        <?php
        if (have_rows('repeater_social_footer', 'option')) : ?>
          <div class="social-contatti__wrap__social">
            <?php
            while (have_rows('repeater_social_footer', 'option')) : the_row();
              $icon_social = get_sub_field('icona_social');
              $link_social = get_sub_field('link_social');

              if ($link_social) {
                $link_url = $link_social['url'];
                $link_target = $link_social['target'] ? $link_social['target'] : '_self';
              }; ?>

              <a href="<?php echo esc_url($link_url); ?>" class="social-contatti__wrap__social__item" target="<?php echo esc_attr($link_target); ?>">
                <?php echo file_get_contents($icon_social['url']); ?>
              </a>
            <?php
            endwhile; ?>
          </div>
        <?php
        endif; ?>

      </div>
    </section>

    <?php get_template_part('template-parts/enti-block'); ?>

  </main>

  <?php get_template_part('template-parts/footer-block'); ?>

  <?php get_footer(); ?>
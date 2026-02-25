<?php
/*
  *
  * Template Name: About
  *
  */
get_header(); ?>

<body <?php body_class('theme-verde'); ?>>

  <?php get_template_part('template-parts/header-block'); ?>

  <main class="about">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <section class="hero container">
      <?php
      $titolo_hero = get_field('titolo_hero_about');
      $testo_hero = get_field('testo_hero_about');
      $cta_hero = get_field('pulsante_hero_about');
      $img_hero = get_field('image_hero_about'); ?>

      <div class="hero__wrap">
        <div class="hero__wrap__content">
          <?php if ($titolo_hero) : ?>
            <h1 class="hero__wrap__content__title">
              <?php echo esc_html($titolo_hero); ?>
            </h1>
          <?php endif; ?>

          <?php if ($testo_hero) : ?>
            <div class="hero__wrap__content__text">
              <?php echo $testo_hero; ?>
            </div>
          <?php endif; ?>

          <?php if ($cta_hero) : ?>
            <a href="<?php echo esc_url($cta_hero['url']); ?>" class="hero__wrap__content__cta primary-btn">
              <?php echo esc_html($cta_hero['title']); ?>
            </a>
          <?php endif; ?>

        </div>

        <?php if ($img_hero) : ?>
          <div class="hero__wrap__image">
            <span></span>
            <img src="<?php echo esc_url($img_hero['url']); ?>" alt="<?php echo esc_attr($img_hero['alt']); ?>">
            <span></span>
          </div>
        <?php endif; ?>

      </div>

    </section>

    <section class="valori container">
      <?php
      $titolo_valori = get_field('titolo_valori_about');
      $testo_valori = get_field('testo_valori_about'); ?>

      <div class="valori__wrap">

        <div class="valori__wrap__intro">
          <?php if ($titolo_valori) : ?>
            <h2 class="valori__wrap__intro__title">
              <?php echo esc_html($titolo_valori); ?>
            </h2>
          <?php endif; ?>

          <?php if ($testo_valori) : ?>
            <div class="valori__wrap__intro__text">
              <?php echo $testo_valori; ?>
            </div>
          <?php endif; ?>
        </div>

        <?php
        if (have_rows('repeater_valori_about')): ?>

          <div class="valori__wrap__repeater">
            <?php
            while (have_rows('repeater_valori_about')) : the_row();
              $title_value = get_sub_field('titolo');
              $text_value = get_sub_field('testo');
              $image_value = get_sub_field('image'); ?>

              <div class="valori__wrap__repeater__item">
                <?php if ($image_value) : ?>
                  <img src="<?php echo esc_url($image_value['url']); ?>" alt="<?php echo esc_attr($image_value['alt']); ?>">
                <?php endif; ?>

                <div class="valori__wrap__repeater__item__content">
                  <?php if ($title_value) : ?>
                    <p class="valori__wrap__repeater__item__content__title">
                      <?php echo esc_html($title_value); ?>
                    </p>
                  <?php endif; ?>

                  <?php if ($text_value) : ?>
                    <div class="valori__wrap__repeater__item__content__text">
                      <?php echo $text_value; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

            <?php endwhile; ?>
          </div>

        <?php
        endif; ?>


      </div>

    </section>

    <section class="mission">
      <div class="mission__wrap container">
        <?php
        $titolo_mission = get_field('titolo_mission_about');
        $testo_mission = get_field('testo_mission_about'); ?>

        <?php if ($titolo_mission) : ?>
          <h2 class="mission__wrap__title">
            <?php echo esc_html($titolo_mission); ?>
          </h2>
        <?php endif; ?>

        <?php if ($testo_mission) : ?>
          <div class="mission__wrap__text">
            <?php echo $testo_mission; ?>
          </div>
        <?php endif; ?>

      </div>
    </section>

    <section class="principi container">
      <?php
      $titolo_principi = get_field('titolo_principi_about');
      $testo_principi = get_field('testo_principi_about'); ?>

      <div class="principi__wrap">

        <div class="principi__wrap__intro">
          <?php if ($titolo_principi) : ?>
            <h3 class="principi__wrap__intro__title">
              <?php echo esc_html($titolo_principi); ?>
            </h3>
          <?php endif; ?>

          <?php if ($testo_principi) : ?>
            <div class="principi__wrap__intro__text">
              <?php echo $testo_principi; ?>
            </div>
          <?php endif; ?>
        </div>

        <?php
        if (have_rows('repeater_principi_about')): ?>

          <div class="principi__wrap__repeater">
            <?php
            while (have_rows('repeater_principi_about')) : the_row();
              $title_principi = get_sub_field('titolo');
              $text_principi = get_sub_field('text'); ?>

              <div class="principi__wrap__repeater__item">
                <div class="principi__wrap__repeater__item__content">
                  <?php if ($title_principi) : ?>
                    <p class="principi__wrap__repeater__item__content__title">
                      <?php echo esc_html($title_principi); ?>
                    </p>
                  <?php endif; ?>

                  <?php if ($text_principi) : ?>
                    <div class="principi__wrap__repeater__item__content__text">
                      <?php echo $text_principi; ?>
                    </div>
                  <?php endif; ?>
                </div>
              </div>

            <?php endwhile; ?>
          </div>

        <?php
        endif; ?>
      </div>
    </section>

    <section class="obiettivi">
      <?php
      $titolo_obiettivi = get_field('titolo_obietitvi_about');
      $testo_obiettivi = get_field('testo_obietitvi_about'); ?>

      <div class="obiettivi__wrap container">

        <div class="obiettivi__wrap__intro">
          <?php if ($titolo_obiettivi) : ?>
            <h3 class="obiettivi__wrap__intro__title">
              <?php echo esc_html($titolo_obiettivi); ?>
            </h3>
          <?php endif; ?>

          <?php if ($testo_obiettivi) : ?>
            <div class="obiettivi__wrap__intro__text">
              <?php echo $testo_obiettivi; ?>
            </div>
          <?php endif; ?>
        </div>

        <?php
        if (have_rows('repeater_obietitvi_about')): ?>

          <div class="obiettivi__wrap__repeater">
            <?php
            while (have_rows('repeater_obietitvi_about')) : the_row();
              $text_obiettivi = get_sub_field('text'); ?>

              <div class="obiettivi__wrap__repeater__item">

                <?php if ($text_obiettivi) : ?>
                  <div class="obiettivi__wrap__repeater__item__text">
                    <?php echo $text_obiettivi; ?>
                  </div>
                <?php endif; ?>
              </div>

            <?php endwhile; ?>
          </div>

        <?php
        endif; ?>
      </div>
    </section>

    <section class="storia container">
      <div class="storia__wrap">
        <h4 class="storia__wrap__title">
          <?php
          $storia_title = get_field('titolo_storia_about');
          if ($storia_title) {
            echo esc_html($storia_title);
          }; ?>
        </h4>
        <?php
        if (have_rows('repeater_video_about')): ?>

          <div class="gallery swiperStoria">
            <div class="swiper-wrapper">

              <?php // Loop immagini
              while (have_rows('repeater_video_about')) : the_row();
                $gallery_img = get_sub_field('image');
                if (!empty($gallery_img) && is_array($gallery_img) && !empty($gallery_img['url'])) : ?>
                  <div class="gallery__item swiper-slide">
                    <img src="<?php echo esc_url($gallery_img['url']); ?>" alt="<?php echo esc_attr($gallery_img['alt'] ?? ''); ?>">
                  </div>
                <?php endif;
              endwhile;

              // Reset del cursore del repeater per il secondo loop
              reset_rows();

              // Loop video
              while (have_rows('repeater_video_about')) : the_row();
                $gallery_video = get_sub_field('video');
                if (!empty($gallery_video) && strlen(trim($gallery_video)) > 0) :
                  $embed_url = '';
                  if (preg_match('/(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/embed\/)([a-zA-Z0-9_-]+)/', $gallery_video, $matches)) {
                    $embed_url = 'https://www.youtube.com/embed/' . $matches[1];
                  } elseif (preg_match('/vimeo\.com\/(\d+)/', $gallery_video, $matches)) {
                    $embed_url = 'https://player.vimeo.com/video/' . $matches[1];
                  }
                ?>
                  <div class="gallery__item swiper-slide">
                    <?php if ($embed_url) : ?>
                      <div class="gallery__item__video">
                        <iframe src="<?php echo esc_url($embed_url); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                      </div>
                    <?php else : ?>
                      <video controls>
                        <source src="<?php echo esc_url($gallery_video); ?>" type="video/mp4">
                      </video>
                    <?php endif; ?>
                  </div>
              <?php endif;
              endwhile; ?>

            </div>

            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-pagination"></div>
          </div>

        <?php
        endif; ?>
      </div>
    </section>

    <section class="logo container">
      <div class="logo__wrap">
        <?php
        $titolo_logo = get_field('titolo_logo_about');
        $testo_logo = get_field('testo_logo_about'); ?>

        <div class="logo__wrap__intro">
          <?php if ($titolo_logo) : ?>
            <h5 class="logo__wrap__intro__title">
              <?php echo esc_html($titolo_logo); ?>
            </h5>
          <?php endif; ?>

          <?php if ($testo_logo) : ?>
            <div class="logo__wrap__intro__text">
              <?php echo $testo_logo; ?>
            </div>
          <?php endif; ?>
        </div>

        <div class="logo__wrap__content">
          <?php
          $logo_img = get_field('logo_about');
          $logo_content = get_field('elenco_logo_about'); ?>

          <?php if ($logo_img) : ?>
            <div class="logo__wrap__content__image">
              <img src="<?php echo esc_url($logo_img['url']); ?>" alt="<?php echo esc_attr($logo_img['alt']); ?>">
            </div>
          <?php endif; ?>
          <?php if ($logo_content) : ?>
            <div class="logo__wrap__content__text">
              <?php echo $logo_content; ?>
            </div>
          <?php endif; ?>

        </div>
      </div>

    </section>

    <section class="parte-block">
      <div class="parte-block__wrap container">
        <div class="parte-block__wrap__intro">
          <?php
          $title_parte = get_field('titolo_siamo_about');
          if ($title_parte) : ?>
            <p class="parte-block__wrap__intro__title"><?php echo esc_html($title_parte); ?></p>
          <?php endif; ?>
        </div>

        <?php
        if (have_rows('repeater_siamo_about')): ?>

          <div class="parte-block__wrap__repeater swiperCollaborazioni">
            <ul class="swiper-wrapper">

              <?php
              while (have_rows('repeater_siamo_about')) : the_row();
                $link_rep_parte = get_sub_field('link');
                $image_rep_parte = get_sub_field('image');

                if ($link_rep_parte) {
                  $link_rep_parte_url = $link_rep_parte['url'];
                  $link_rep_parte_title = $link_rep_parte['title'];
                  $link_rep_parte_target = $link_rep_parte['target'] ? $link_rep_parte['target'] : '_self';
                }; ?>

                <li class="parte-item swiper-slide">

                  <?php if ($link_rep_parte) : ?>
                    <a href="<?php echo esc_url($link_rep_parte_url); ?>" target="<?php echo esc_attr($link_rep_parte_target); ?>" class="collab-item__link">
                      <?php if ($image_rep_parte) : ?>
                        <img src="<?php echo esc_url($image_rep_parte['url']); ?>" alt="<?php echo esc_attr($image_rep_parte['alt']); ?>">
                      <?php endif; ?>
                    </a>
                  <?php elseif ($image_rep_parte) : ?>
                    <img src="<?php echo esc_url($image_rep_parte['url']); ?>" alt="<?php echo esc_attr($image_rep_parte['alt']); ?>">
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

    <section class="soci">
      <?php
      $titolo_soci = get_field('titolo_cooperativa_about');
      $titolo_soci_2 = get_field('titolo_soci_about');
      $testo_soci = get_field('testo_cooperativa_about'); ?>

      <div class="soci__wrap container">

        <div class="soci__wrap__intro">
          <?php if ($titolo_soci) : ?>
            <h6 class="soci__wrap__intro__title">
              <?php echo esc_html($titolo_soci); ?>
            </h6>
          <?php endif; ?>

          <?php if ($testo_soci) : ?>
            <div class="soci__wrap__intro__text">
              <?php echo $testo_soci; ?>
            </div>
          <?php endif; ?>

          <?php if ($titolo_soci_2) : ?>
            <p class="soci__wrap__intro__title-2">
              <?php echo esc_html($titolo_soci_2); ?>
            </p>
          <?php endif; ?>
        </div>

        <?php
        if (have_rows('repeater_soci_about')): ?>

          <div class="soci__wrap__repeater">
            <?php
            while (have_rows('repeater_soci_about')) : the_row();
              $title_soci = get_sub_field('titolo');
              $text_soci = get_sub_field('testo'); ?>

              <div class="soci__wrap__repeater__item">
                <?php if ($title_soci) : ?>
                  <p class="soci__wrap__repeater__item__title">
                    <?php echo esc_html($title_soci); ?>
                  </p>
                <?php endif;
                if ($text_soci) : ?>
                  <div class="soci__wrap__repeater__item__text">
                    <?php echo $text_soci; ?>
                  </div>
                <?php endif; ?>
              </div>

            <?php endwhile; ?>
          </div>

        <?php
        endif; ?>
      </div>
    </section>

    <section class="grafici">
      <?php
      $titolo_grafici = get_field('titolo_soci_2_about');
      $colors = ['#fdc553', '#3d6b4f', '#7390dd'];
      ?>

      <div class="grafici__wrap container">

        <?php if ($titolo_grafici) : ?>
          <h3 class="grafici__wrap__title">
            <?php echo esc_html($titolo_grafici); ?>
          </h3>
        <?php endif; ?>

        <?php if (have_rows('repeater_grafici_about')): ?>
          <div class="grafici__wrap__cards">
            <?php
            $i = 0;
            while (have_rows('repeater_grafici_about')) : the_row();
              $percentuale = get_sub_field('n_percentuale');
              $n_soci = get_sub_field('n_soci');
              $testo = get_sub_field('testo_soci');
              $color = $colors[$i % count($colors)];
              $circumference = 2 * 3.14159265 * 54;
              $offset = $circumference - ($circumference * intval($percentuale) / 100);
            ?>

              <div class="grafici__wrap__cards__item">
                <div class="grafici__wrap__cards__item__chart">
                  <svg viewBox="0 0 120 120" class="donut-chart" data-percent="<?php echo esc_attr($percentuale); ?>">
                    <circle class="donut-track" cx="60" cy="60" r="54" fill="none" stroke="#e8e8e8" stroke-width="12" />
                    <circle class="donut-fill" cx="60" cy="60" r="54" fill="none" stroke="<?php echo esc_attr($color); ?>" stroke-width="12" stroke-linecap="round" stroke-dasharray="<?php echo $circumference; ?>" stroke-dashoffset="<?php echo $circumference; ?>" data-target-offset="<?php echo $offset; ?>" transform="rotate(-90 60 60)" />
                  </svg>
                  <span class="grafici__wrap__cards__item__chart__percent" style="color: <?php echo esc_attr($color); ?>">
                    <?php echo esc_html($percentuale); ?>%
                  </span>
                </div>

                <?php if ($testo) : ?>
                  <p class="grafici__wrap__cards__item__label">
                    <?php echo esc_html($testo); ?>
                  </p>
                <?php endif; ?>

                <?php if ($n_soci) : ?>
                  <p class="grafici__wrap__cards__item__number" style="color: <?php echo esc_attr($color); ?>">
                    <?php echo esc_html($n_soci); ?>
                  </p>
                <?php endif; ?>
              </div>

            <?php
              $i++;
            endwhile; ?>
          </div>
        <?php endif; ?>

      </div>
    </section>

    <section class="governance container">
      <div class="governance__wrap">
        <?php
        $title_gov = get_field('titolo_governance_about');
        $img_gov = get_field('image_governance_about');
        $title_cons = get_field('titolo_consiglio_about');
        $text_cons = get_field('testo_consiglio_about');
        $title_cons_2 = get_field('titolo_consiglio_about_2');
        $text_cons_2 = get_field('testo_consiglio_about_2');
        ?>
        <div class="governance__wrap__intro">
          <?php if ($title_gov) : ?>
            <p class="governance__wrap__intro__title">
              <?php echo esc_html($title_gov); ?>
            </p>
          <?php endif; ?>
          <?php if ($img_gov) : ?>
            <div class="governance__wrap__intro__image">
              <img src="<?php echo esc_url($img_gov['url']); ?>" alt="<?php echo esc_attr($img_gov['alt']); ?>">
            </div>
          <?php endif; ?>
        </div>
        <div class="governance__wrap__content">
          <div class="governance__wrap__content__col">
            <?php if ($title_cons) : ?>
              <p class="governance__wrap__content__col__title">
                <?php echo esc_html($title_cons); ?>
              </p>
            <?php endif; ?>
            <?php if ($text_cons) : ?>
              <div class="governance__wrap__content__col__text">
                <?php echo $text_cons; ?>
              </div>
            <?php endif; ?>
          </div>

          <div class="governance__wrap__content__col">
            <?php if ($title_cons_2) : ?>
              <p class="governance__wrap__content__col__title">
                <?php echo esc_html($title_cons_2); ?>
              </p>
            <?php endif; ?>
            <?php if ($text_cons_2) : ?>
              <div class="governance__wrap__content__col__text">
                <?php echo $text_cons_2; ?>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>

    </section>

    <section class="leader">
      <div class="leader__wrap container">

        <div class="leader__wrap__intro">

          <?php
          $titolo_leader = get_field('titolo_leadershep_about');
          if ($titolo_leader) : ?>
            <p class="leader__wrap__intro__title">
              <?php echo esc_html($titolo_leader); ?>
            </p>
          <?php endif; ?>

        </div>

        <?php
        if (have_rows('repeater_leadership_about')): ?>

          <div class="leader__wrap__cards">

            <?php
            while (have_rows('repeater_leadership_about')) : the_row();
              $img_leader = get_sub_field('image');
              $nome_e_cognome = get_sub_field('nome_e_cognome');
              $ruolo = get_sub_field('ruolo'); ?>

              <div class="leader__wrap__cards__item">
                <?php if ($img_leader) : ?>
                  <div class="leader__wrap__cards__item__image">
                    <img src="<?php echo esc_url($img_leader['url']); ?>" alt="<?php echo esc_attr($img_leader['alt']); ?>">
                  </div>
                <?php endif; ?>

                <div class="leader__wrap__cards__item__content">
                  <?php if ($nome_e_cognome) : ?>
                    <p class="leader__wrap__cards__item__content__name">
                      <?php echo esc_html($nome_e_cognome); ?>
                    </p>
                  <?php endif; ?>

                  <?php if ($ruolo) : ?>
                    <p class="leader__wrap__cards__item__content__role">
                      <?php echo esc_html($ruolo); ?>
                    </p>
                  <?php endif; ?>
                </div>
              </div>

            <?php
            endwhile; ?>

          </div>

        <?php
        endif; ?>


      </div>

    </section>

    <section class="scaricabili container">
      <div class="scaricabili__wrap">

        <div class="scaricabili__wrap__intro">
          <?php
          $titolo_scaricabili = get_field('titolo_scaricabili_about');
          if ($titolo_scaricabili) : ?>
            <p class="scaricabili__wrap__intro__title">
              <?php echo esc_html($titolo_scaricabili); ?>
            </p>
          <?php endif; ?>
        </div>

        <?php
        if (have_rows('repeater_scaricabili_about')): ?>

          <div class="scaricabili__wrap__repeater">
            <?php
            while (have_rows('repeater_scaricabili_about')) : the_row();
              $file_scaricabile = get_sub_field('file');
              $testo_file = get_sub_field('testo_file'); ?>

              <div class="scaricabili__wrap__repeater__item">
                <?php if ($file_scaricabile && $testo_file) :
                  $file_ext = strtoupper(pathinfo($file_scaricabile['filename'], PATHINFO_EXTENSION));
                  $file_size = size_format($file_scaricabile['filesize'], 0);
                ?>
                  <a href="<?php echo esc_url($file_scaricabile['url']); ?>" class="scaricabili__wrap__repeater__item__link" download>
                    
                    <svg width="48" height="48" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path d="M16 36H32V32H16V36ZM16 28H32V24H16V28ZM12 44C10.9 44 9.95833 43.6083 9.175 42.825C8.39167 42.0417 8 41.1 8 40V8C8 6.9 8.39167 5.95833 9.175 5.175C9.95833 4.39167 10.9 4 12 4H28L40 16V40C40 41.1 39.6083 42.0417 38.825 42.825C38.0417 43.6083 37.1 44 36 44H12ZM26 18V8H12V40H36V18H26Z" fill="black" />
                    </svg>

                    <span class="scaricabili__wrap__repeater__item__link__info">
                      <span class="scaricabili__wrap__repeater__item__link__info__title"><?php echo esc_html($testo_file); ?></span>
                      <span class="scaricabili__wrap__repeater__item__link__info__meta"><?php echo esc_html($file_ext . ' | ' . $file_size); ?></span>
                    </span>
                  </a>
                <?php endif; ?>
              </div>

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
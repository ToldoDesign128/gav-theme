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

  </main>

  <?php get_template_part('template-parts/footer-block'); ?>

  <?php get_footer(); ?>
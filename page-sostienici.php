<?php
/*
  *
  * Template Name: Sostienici
  *
  */
get_header(); ?>

<body <?php body_class('theme-blue '); ?>>

  <?php get_template_part('template-parts/header-block'); ?>

  <main class="sostienici">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <?php get_template_part('template-parts/background'); ?>

    <section class="hero container position">
      <?php
      $titolo_hero = get_field('titolo_hero_sostienici');
      $testo_hero = get_field('testo_hero_sostienici');
      $img_hero = get_field('img_hero_sostienici'); ?>

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

    <section class="mille position">
      <div class="mille__wrap container">
        <?php $title_mille = get_field('titolo_5x1000_sostienici'); ?>
        <?php if ($title_mille) : ?>
          <h2 class="mille__wrap__title">
            <?php echo esc_html($title_mille); ?>
          </h2>
        <?php endif; ?>

        <?php if (have_rows('repeater_step_sostienici')) :
          $steps = [];
          while (have_rows('repeater_step_sostienici')) : the_row();
            $steps[] = get_sub_field('testo_step');
          endwhile;
          $total = count($steps);
        ?>

          <!-- Stepper indicator -->
          <div class="mille__wrap__stepper">
            <?php for ($i = 0; $i < $total; $i++) : ?>
              <div class="mille__wrap__stepper__step">
                <span class="mille__wrap__stepper__step__number"><?php echo $i + 1; ?></span>
              </div>
              <?php if ($i < $total - 1) : ?>
                <div class="mille__wrap__stepper__line"></div>
              <?php endif; ?>
            <?php endfor; ?>
          </div>

          <!-- Step cards -->
          <div class="mille__wrap__cards">
            <?php foreach ($steps as $index => $step_text) : ?>
              <div class="mille__wrap__cards__card">
                <span class="mille__wrap__cards__card__number"><?php echo $index + 1; ?></span>
                <div class="mille__wrap__cards__card__text">
                  <?php echo $step_text; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

        <?php endif; ?>

      </div>
    </section>

    <section class="donazioni position">
      <div class="donazioni__wrap container">
        <?php
        $title_donazioni = get_field('titolo_donazioni_sostienici');
        $text_donazioni = get_field('testo_donazioni_sostienici');
        $iban_donazioni = get_field('iban_sostienici'); ?>

        <?php if ($title_donazioni) : ?>
          <h3 class="donazioni__wrap__title">
            <?php echo esc_html($title_donazioni); ?>
          </h3>
        <?php endif; ?>

        <?php if ($text_donazioni) : ?>
          <div class="donazioni__wrap__text">
            <?php echo $text_donazioni; ?>
          </div>
        <?php endif; ?>

        <?php if ($iban_donazioni) : ?>
          <div class="donazioni__wrap__iban">
            <?php echo $iban_donazioni; ?>
          </div>
        <?php endif; ?>
      </div>
    </section>

    <section class="sponsorizzazioni container position">
      <?php
      $title_sponsor = get_field('titolo_sponsorizzazioni_sostienici');
      $text_sponsor = get_field('testo_sponsorizzazioni_sostienici'); ?>

      <?php if ($title_sponsor) : ?>
        <h4 class="sponsorizzazioni__title">
          <?php echo esc_html($title_sponsor); ?>
        </h4>
      <?php endif;
      if ($text_sponsor) : ?>
        <div class="sponsorizzazioni__text">
          <?php echo $text_sponsor; ?>
        </div>
      <?php endif; ?>

    </section>

    <section class="scarica position">
      <div class="scarica__wrap container">

        <?php if (have_rows('repeater_scaricabili')) : ?>
          <div class="scarica__wrap__items">
            <?php while (have_rows('repeater_scaricabili')) : the_row(); ?>

              <?php if (have_rows('repeater_file')) : ?>
                <div class="scarica__wrap__items__group">
                  <select class="scarica__wrap__items__group__select" onchange="this.dataset.selectedFile = this.value">
                    <?php while (have_rows('repeater_file')) : the_row();
                      $title = get_sub_field('titolo');
                      $file = get_sub_field('file');
                    ?>
                      <option value="<?php echo esc_url($file['url']); ?>">
                        <?php echo esc_html($title); ?>
                      </option>
                    <?php endwhile; ?>
                  </select>
                  <button class="scarica__wrap__items__group__btn" onclick="var sel = this.previousElementSibling; var a = document.createElement('a'); a.href = sel.value; a.download = ''; document.body.appendChild(a); a.click(); document.body.removeChild(a);">Scarica</button>
                </div>
              <?php endif; ?>

            <?php endwhile; ?>
          </div>
        <?php endif; ?>

        <div class="scarica__wrap__cta">
          <?php
          $scarica_link = get_field('link_contributi');

          if ($scarica_link):
            $scarica_url = $scarica_link['url'];
            $scarica_title = $scarica_link['title'];
            $scarica_target = $scarica_link['target'] ? $scarica_link['target'] : '_self';
          ?>

            <a href="<?php echo esc_url($scarica_url); ?>" target="<?php echo esc_attr($scarica_target); ?>" class="scarica__wrap__cta__link">
              <?php echo esc_html($scarica_title); ?>
            </a>

          <?php endif; ?>
        </div>
      </div>
    </section>

    <?php get_template_part('template-parts/enti-block'); ?>

  </main>

  <?php get_template_part('template-parts/footer-block'); ?>

  <?php get_footer(); ?>
<?php
/*
  *
  * Template Name: Documenti
  *
  */
get_header(); ?>

<body <?php body_class('theme-blue'); ?>>

  <?php get_template_part('template-parts/header-block'); ?>

  <main class="documenti">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <?php get_template_part('template-parts/background'); ?>

    <section class="documenti__content container position">
      <?php
      $title = get_field('titolo_documenti');
      if ($title) : ?>
        <h1 class="documenti__content__title">
          <?php echo esc_html($title); ?>
        </h1>
      <?php endif; ?>

      <?php
      if (have_rows('repeater_documenti')): ?>

        <div class="documenti__content__list">

          <?php
          while (have_rows('repeater_documenti')) : the_row();
            $selettore = get_sub_field('selettore');
          ?>

            <?php if ($selettore === 'singolo') :
              $titolo_documento = get_sub_field('titolo_documento');
              $file_singolo = get_sub_field('file_singolo');
            ?>

              <div class="documenti__content__list__item">
                <span class="documenti__content__list__item__title">
                  <?php echo esc_html($titolo_documento); ?>
                </span>
                <?php if ($file_singolo) : ?>
                  <a href="<?php echo esc_url($file_singolo['url']); ?>" download class="documenti__content__list__item__btn">
                    Scarica
                  </a>
                <?php endif; ?>
              </div>

            <?php elseif ($selettore === 'multiplo') :
              $titolo_documento = get_sub_field('titolo_documento');
            ?>

              <div class="documenti__content__list__item documenti__content__list__item--multiplo">
                <?php if (have_rows('repeater_file')) : ?>
                  <select class="documenti__content__list__item__select js-doc-select">
                    <?php while (have_rows('repeater_file')) : the_row();
                      $titolo_file = get_sub_field('titolo');
                      $file = get_sub_field('file');
                    ?>
                      <?php if ($file) : ?>
                        <option value="<?php echo esc_url($file['url']); ?>">
                          <?php echo esc_html($titolo_file); ?>
                        </option>
                      <?php endif; ?>
                    <?php endwhile; ?>
                  </select>
                <?php endif; ?>
                <a href="#" download class="documenti__content__list__item__btn js-doc-download">
                  Scarica
                </a>
              </div>

            <?php endif; ?>

          <?php
          endwhile; ?>

        </div>

      <?php
      endif; ?>

    </section>

    <?php get_template_part('template-parts/enti-block'); ?>

  </main>

  <?php get_template_part('template-parts/footer-block'); ?>

  <?php get_footer(); ?>
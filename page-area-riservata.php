<?php
/*
  *
  * Template Name: Area Riservata
  *
  */
get_header(); ?>

<body <?php body_class('theme-fucsia'); ?>>

  <?php get_template_part('template-parts/header-block'); ?>

  <main class="area-riservata">

    <?php get_template_part('template-parts/breadcrumbs'); ?>

    <section class="area-hero container">
      <div class="area-hero__block">
        <?php
        $logo = get_field('logo_area');
        if ($logo) : ?>
          <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>">
        <?php endif; ?>

        <?php
        $title = get_field('titolo_area');
        if ($title) : ?>
          <h1 class="area-hero__block__title">
            <?php echo esc_html($title); ?>
          </h1>
        <?php endif; ?>
      </div>

      <?php
      if (have_rows('repeater_link_area')): ?>
        <div class="area-hero__links">

          <?php
          while (have_rows('repeater_link_area')) : the_row();
            $link = get_sub_field('link');
            $logo = get_sub_field('logo');
          ?>

            <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>" class="area-hero__links__items">
              <?php
              echo wp_get_attachment_image($logo, 'full');
              ?>
            </a>

          <?php endwhile; ?>
        </div>

      <?php endif; ?>
    </section>

    <section class="scarica">
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
      </div>
    </section>

    <?php get_template_part('template-parts/enti-block'); ?>

  </main>

  <?php get_template_part('template-parts/footer-block'); ?>

  <?php get_footer(); ?>
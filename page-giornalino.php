<?php
/*
  *
  * Template Name: Giornalino
  *
  */
get_header(); ?>

<body <?php body_class('theme-giallo'); ?>>

  <?php get_template_part('template-parts/header-block'); ?>

  <main class="giornalino">

    <!-- Breadcrumbs -->
    <nav class="breadcrumbs container">
      <ul>
        <li><a href="<?php echo esc_url(home_url()); ?>">Home</a></li>
        <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('progetti'))); ?>">Progetti</a></li>
        <li><?php the_title(); ?></li>
      </ul>
    </nav>

    <section class="hero container">
      <?php
      $title_giornalino = get_field('titolo_giornalino');
      $text_giornalino = get_field('testo_giornalino'); ?>

      <div class="hero__wrap">
        <?php if ($title_giornalino) : ?>
          <h1 class="hero__wrap__title">
            <?php echo esc_html($title_giornalino); ?>
          </h1>
        <?php endif; ?>

        <?php if ($text_giornalino) : ?>
          <div class="hero__wrap__text">
            <?php echo $text_giornalino; ?>
          </div>
        <?php endif; ?>

        <div class="hero__wrap__links">

          <?php
          $link_edizioni = get_field('link_edizioni_giornalino');

          if ($link_edizioni) {
            $link_edizioni_url = $link_edizioni['url'];
            $link_edizioni_title = $link_edizioni['title'];
            $link_edizioni_target = $link_edizioni['target'] ? $link_edizioni['target'] : '_self';
          };

          if ($link_edizioni) : ?>
            <a href="<?php echo esc_url($link_edizioni_url); ?>" target="<?php echo esc_attr($link_edizioni_target); ?>" class="hero__wrap__button primary-btn">
              <?php echo esc_html($link_edizioni_title); ?>
            </a>
          <?php endif; ?>

          <?php
          $title_scaricabile = get_field('titolo_scaricabile_giornalino');
          $scaricabile = get_field('scaricabile_giornalino');

          if ($scaricabile): ?>
            <a href="<?php echo $scaricabile['url']; ?>" class="hero__wrap__button secondary-btn">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect width="24" height="24" stroke="#0A0A0A" />
                <path d="M18 15V18H6V15H4V18C4 19.1 4.9 20 6 20H18C19.1 20 20 19.1 20 18V15H18ZM17 11L15.59 9.59L13 12.17V4H11V12.17L8.41 9.59L7 11L12 16L17 11Z" fill="#FCFCFC" />
              </svg>

              <?php echo esc_html($title_scaricabile); ?>
            </a>
          <?php endif; ?>

        </div>




    </section>



    <section class="placeholder">
    </section>
    <section class="placeholder">
    </section>

    <section class="slider container">
      <div class="slider__wrap">
        <?php
        if (have_rows('gallery_giornalino')): ?>

          <div class="gallery swiperStoria">
            <div class="swiper-wrapper">

              <?php // Loop immagini
              while (have_rows('gallery_giornalino')) : the_row();
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
              while (have_rows('gallery_giornalino')) : the_row();
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

    <section class="network-block container ">
      <div class="network-block__wrap">
        <div class="network-block__wrap__intro">
          <?php
          $title_network = get_field('titolo_network_giornalino');
          if ($title_network) : ?>
            <h4 class="network-block__wrap__intro__title"><?php echo esc_html($title_network); ?></h4>
          <?php endif; ?>
        </div>

        <?php
        if (have_rows('repeater_network_giornalino')): ?>

          <div class="network-block__wrap__repeater swiperCollaborazioni">
            <ul class="swiper-wrapper">

              <?php
              while (have_rows('repeater_network_giornalino')) : the_row();
                $link_rep_network = get_sub_field('link');
                $image_rep_network = get_sub_field('image');

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
<?php
/*
  *
  * Template Name: Edizioni
  *
  */
get_header(); ?>

<body <?php body_class('theme-giallo'); ?>>

    <?php get_template_part('template-parts/header-block'); ?>

    <main class="edizioni">

        <!-- Breadcrumbs -->
        <nav class="breadcrumbs container">
            <ul>
                <li><a href="<?php echo esc_url(home_url()); ?>">Home</a></li>
                <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('progetti'))); ?>">Progetti</a></li>
                <li><a href="<?php echo esc_url(get_permalink(get_page_by_path('giornalino'))); ?>">Giornalino</a></li>
                <li><?php the_title(); ?></li>
            </ul>
        </nav>

        <section class="edizioni__hero container">
            <div class="edizioni__hero__wrap">
                <?php
                $titolo_hero = get_field('titolo_giornalino');
                $subtitle_hero = get_field('sottotitolo_edizioni');
                if ($titolo_hero) : ?>
                    <h1 class="edizioni__hero__wrap__title"><?php echo esc_html($titolo_hero); ?></h1>
                <?php endif; ?>
                <?php if ($subtitle_hero) : ?>
                    <p class="edizioni__hero__wrap__subtitle"><?php echo esc_html($subtitle_hero); ?></p>
                <?php endif; ?>

                <?php if (have_rows('ultima_edizione')) :
                    while (have_rows('ultima_edizione')) : the_row();
                        $file = get_sub_field('file');
                        $image = get_sub_field('image');
                        $data = get_sub_field('data'); ?>

                        <a href="<?php echo $file['url']; ?>" class="edizioni__hero__wrap__post">
                            <?php if ($image = get_sub_field('image')) : ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            <?php endif; ?>
                            <span class="edizioni__hero__wrap__post__title">
                                <?php echo esc_html($data); ?>
                                <span class="icon">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18.0005 15V18H6.00049V15H4.00049V18C4.00049 19.1 4.90049 20 6.00049 20H18.0005C19.1005 20 20.0005 19.1 20.0005 18V15H18.0005ZM17.0005 11L15.5905 9.59L13.0005 12.17V4H11.0005V12.17L8.41049 9.59L7.00049 11L12.0005 16L17.0005 11Z" fill="#0A0A0A" />
                                    </svg>
                                </span>
                            </span>
                        </a>

                <?php endwhile;
                endif; ?>

            </div>
        </section>

        <section class="edizioni__precedenti">
            <div class="edizioni__precedenti__wrap container">
                <?php
                $titolo_precedenti = get_field('titolo_edizioni_precedenti');
                if ($titolo_precedenti) : ?>
                    <h2 class="edizioni__precedenti__wrap__title"><?php echo esc_html($titolo_precedenti); ?></h2>
                <?php endif; ?>

                <?php if (have_rows('repeater_edizioni_precedenti')) : ?>
                    <div class="edizioni__precedenti__wrap__list">
                        <?php
                        while (have_rows('repeater_edizioni_precedenti')) : the_row();
                            $file_prec = get_sub_field('file');
                            $image_prec = get_sub_field('image');
                            $data_prec = get_sub_field('data'); ?>

                            <a href="<?php echo $file_prec['url']; ?>" class="edizioni__precedenti__wrap__list__post">
                                <?php if ($image_prec) : ?>
                                    <img src="<?php echo esc_url($image_prec['url']); ?>" alt="<?php echo esc_attr($image_prec['alt']); ?>">
                                <?php endif; ?>
                                <span class="edizioni__precedenti__wrap__list__post__title">
                                    <?php echo esc_html($data_prec); ?>
                                    <span class="icon">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M18.0005 15V18H6.00049V15H4.00049V18C4.00049 19.1 4.90049 20 6.00049 20H18.0005C19.1005 20 20.0005 19.1 20.0005 18V15H18.0005ZM17.0005 11L15.5905 9.59L13.0005 12.17V4H11.0005V12.17L8.41049 9.59L7.00049 11L12.0005 16L17.0005 11Z" fill="#0A0A0A" />
                                        </svg>
                                    </span>
                                </span>
                            </a>

                        <?php endwhile; ?>
                    </div>
                <?php
                endif; ?>
            </div>
        </section>

        <section class="slider container">
            <div class="slider__wrap">
                <?php
                if (have_rows('gallery_edizioni')): ?>

                    <div class="gallery swiperStoria">
                        <div class="swiper-wrapper">

                            <?php // Loop immagini
                            while (have_rows('gallery_edizioni')) : the_row();
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
                            while (have_rows('gallery_edizioni')) : the_row();
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
                    $title_network = get_field('titolo_network_edizioni');
                    if ($title_network) : ?>
                        <h4 class="network-block__wrap__intro__title"><?php echo esc_html($title_network); ?></h4>
                    <?php endif; ?>
                </div>

                <?php
                if (have_rows('repeater_network_edizioni')): ?>

                    <div class="network-block__wrap__repeater swiperCollaborazioni">
                        <ul class="swiper-wrapper">

                            <?php
                            while (have_rows('repeater_network_edizioni')) : the_row();
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
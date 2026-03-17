<?php

// Check value exists.
if (have_rows('builder_servizi')): ?>

    <section class="builder-servizi">

        <?php
        while (have_rows('builder_servizi')) : the_row();

            // Case: Hero.
            if (get_row_layout() == 'hero'):
                $titolo_hero = get_sub_field('titolo_hero');
                $testo_hero = get_sub_field('testo_hero');
                $image_hero = get_sub_field('image_hero'); ?>

                <div class="hero container">

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

                        <?php if ($image_hero) : ?>
                            <div class="hero__wrap__image">
                                <span></span>
                                <img src="<?php echo esc_url($image_hero['url']); ?>" alt="<?php echo esc_attr($image_hero['alt']); ?>">
                                <span></span>
                            </div>
                        <?php endif; ?>

                    </div>

                </div>

            <?php
            // Case: Text Block.
            elseif (get_row_layout() == 'text_block'):
                $titolo_txt_block = get_sub_field('titolo_txt_block');
                $text_txt_block = get_sub_field('text_txt_block'); ?>

                <div class="text-block container">
                    <div class="text-block__wrap">
                        <div class="text-block__wrap__main">
                            <?php if ($titolo_txt_block) : ?>
                                <h2 class="text-block__wrap__main__title">
                                    <?php echo esc_html($titolo_txt_block); ?>
                                </h2>
                            <?php endif; ?>
                            <?php if ($text_txt_block) : ?>
                                <div class="text-block__wrap__main__text">
                                    <?php echo $text_txt_block; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <?php if (have_rows('repeater_info')) : ?>
                            <div class="text-block__wrap__info">
                                <?php while (have_rows('repeater_info')) : the_row();
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text'); ?>

                                    <div class="text-block__wrap__info__item">
                                        <?php if ($title) : ?>
                                            <p class="text-block__wrap__info__item__title">
                                                <?php echo esc_html($title); ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if ($text) : ?>
                                            <div class="text-block__wrap__info__item__text">
                                                <?php echo $text; ?>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

            <?php
            // Case: Card.
            elseif (get_row_layout() == 'card'):
                $title_card = get_sub_field('title_card'); ?>

                <div class="cards">
                    <div class="cards__wrap container">

                        <?php
                        if ($title_card) : ?>
                            <p class="cards__wrap__title"><?php echo esc_html($title_card); ?></p>
                        <?php endif; ?>


                        <?php
                        if (have_rows('repeater_card')): ?>

                            <div class="cards__wrap__list-mobile swiperObiettivi">
                                <div class="swiper-wrapper">

                                    <?php
                                    while (have_rows('repeater_card')) : the_row();
                                        $text = get_sub_field('text'); ?>

                                        <div class="cards__wrap__list__item swiper-slide">
                                            <span class="icon">
                                                <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4084 20.4972L6.12251 15.2113L4.32251 16.9986L11.4084 24.0845L26.6197 8.87326L24.8324 7.08594L11.4084 20.4972Z" fill="#0A0A0A" />
                                                </svg>
                                            </span>
                                            <?php echo $text; ?>
                                        </div>

                                    <?php
                                    endwhile; ?>
                                </div>

                            </div>
                        <?php
                        endif; ?>

                        <?php
                        if (have_rows('repeater_card')): ?>
                            <div class="cards__wrap__list-desktop">
                                <?php
                                while (have_rows('repeater_card')) : the_row();
                                    $text = get_sub_field('text'); ?>

                                    <div class="cards__wrap__list__item ">
                                        <span class="icon">
                                            <svg width="31" height="31" viewBox="0 0 31 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11.4084 20.4972L6.12251 15.2113L4.32251 16.9986L11.4084 24.0845L26.6197 8.87326L24.8324 7.08594L11.4084 20.4972Z" fill="#0A0A0A" />
                                            </svg>
                                        </span>
                                        <?php echo $text; ?>
                                    </div>

                                <?php
                                endwhile; ?>
                            </div>
                        <?php
                        endif; ?>

                    </div>
                </div>
            <?php
            // Case: Appartamenti.
            elseif (get_row_layout() == 'appartamenti'):
                $title_appartamenti = get_sub_field('titolo_appartamenti'); ?>

                <div class="appartamenti">
                    <div class="appartamenti__wrap container">

                        <?php
                        if ($title_appartamenti) : ?>
                            <p class="appartamenti__wrap__title"><?php echo esc_html($title_appartamenti); ?></p>
                        <?php endif; ?>

                        <?php if (have_rows('repeater_appartamenti')): ?>
                            <div class="appartamenti__wrap__list">
                                <?php while (have_rows('repeater_appartamenti')) : the_row();
                                    $image = get_sub_field('image');
                                    $adress = get_sub_field('indirizzo');
                                    $text = get_sub_field('text'); ?>

                                    <div class="appartamenti__wrap__list__item">
                                        <?php if ($image) : ?>
                                            <div class="appartamenti__wrap__list__item__image">
                                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                            </div>
                                        <?php endif; ?>

                                        <div class="appartamenti__wrap__list__item__content">
                                            <?php if ($adress) : ?>
                                                <p class="appartamenti__wrap__list__item__content__adress">
                                                    <?php echo esc_html($adress); ?>
                                                </p>
                                            <?php endif; ?>
                                            <?php if ($text) : ?>
                                                <div class="appartamenti__wrap__list__item__content__text">
                                                    <?php echo $text; ?>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

            <?php
            // Case: Gallery.
            elseif (get_row_layout() == 'gallery'): ?>

                <section class="slider container">
                    <div class="slider__wrap">
                        <?php
                        if (have_rows('repeater_gallery')): ?>

                            <div class="gallery swiperStoria">
                                <div class="swiper-wrapper">

                                    <?php
                                    while (have_rows('repeater_gallery')) : the_row();
                                        $gallery_img = get_sub_field('image');
                                        $gallery_video = get_sub_field('video');

                                        // Immagine
                                        if (!empty($gallery_img) && is_array($gallery_img) && !empty($gallery_img['url'])) : ?>
                                            <div class="gallery__item swiper-slide">
                                                <img src="<?php echo esc_url($gallery_img['url']); ?>" alt="<?php echo esc_attr($gallery_img['alt'] ?? ''); ?>">
                                            </div>
                                        <?php endif;

                                        // Video
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

        <?php
            endif;
        endwhile; ?>

    </section>

<?php
endif; ?>
<?php

// Check value exists.
if (have_rows('builder_progetti')): ?>

    <section class="builder-progetti position">

        <?php
        while (have_rows('builder_progetti')) : the_row();

            // Case: Text Block.
            if (get_row_layout() == 'text_block'):
                $titolo_txt_block = get_sub_field('titolo_text_block');
                $text_txt_block = get_sub_field('testo_text_block'); ?>

                <div class="text-block container">
                    <div class="text-block__wrap">
                        <?php if ($titolo_txt_block) : ?>
                            <h2 class="text-block__wrap__title">
                                <?php echo esc_html($titolo_txt_block); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($text_txt_block) : ?>
                            <div class="text-block__wrap__text">
                                <?php echo $text_txt_block; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

            <?php
            // Case: Text + Image.
            elseif (get_row_layout() == 'text_img_block'): ?>

                <div class="txt-img-block">
                    <div class="txt-img-block__wrap container">
                        <?php
                        $orientamento = get_sub_field('selettore_orientamento');
                        $titolo = get_sub_field('titolo_txt_img');
                        $testo = get_sub_field('testo_txt_img');
                        $image = get_sub_field('image_txt_img');
                        $pulsante = get_sub_field('pulsante_txt_img');

                        if ($pulsante) {
                            $pulsante_url = $pulsante['url'];
                            $pulsante_title = $pulsante['title'];
                            $pulsante_target = $pulsante['target'] ? $pulsante['target'] : '_self';
                        }; ?>

                        <?php if ($orientamento == 'Img + Txt') : ?>

                            <div class="txt-img-block__wrap__item">
                                <?php if ($image) : ?>
                                    <div class="txt-img-block__wrap__item__img">
                                        <span></span>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                        <span></span>
                                    </div>
                                <?php endif; ?>

                                <div class="txt-img-block__wrap__item__content">
                                    <?php if ($titolo) : ?>
                                        <h3 class="txt-img-block__wrap__item__content__title"><?php echo esc_html($titolo); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($testo) : ?>
                                        <div class="txt-img-block__wrap__item__content__text">
                                            <?php echo $testo; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($pulsante) : ?>
                                        <a class="txt-img-block__wrap__item__btn primary-btn" href="<?php echo esc_url($pulsante_url); ?>" target="<?php echo esc_attr($pulsante_target); ?>">
                                            <?php echo esc_html($pulsante_title); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>

                        <?php elseif ($orientamento == 'Txt + Img') : ?>

                            <div class="txt-img-block__wrap__item">
                                <div class="txt-img-block__wrap__item__content">
                                    <?php if ($titolo) : ?>
                                        <h3 class="txt-img-block__wrap__item__content__title"><?php echo esc_html($titolo); ?></h3>
                                    <?php endif; ?>
                                    <?php if ($testo) : ?>
                                        <div class="txt-img-block__wrap__item__content__text">
                                            <?php echo $testo; ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if ($pulsante) : ?>
                                        <a class="txt-img-block__wrap__item__btn primary-btn" href="<?php echo esc_url($pulsante_url); ?>" target="<?php echo esc_attr($pulsante_target); ?>">
                                            <?php echo esc_html($pulsante_title); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>

                                <?php if ($image) : ?>
                                    <div class="txt-img-block__wrap__item__img">
                                        <span></span>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                                        <span></span>
                                    </div>
                                <?php endif; ?>
                            </div>

                        <?php endif ?>

                    </div>
                </div>

            <?php
            // Case: Card.
            elseif (get_row_layout() == 'card_block'):
                $title_card = get_sub_field('titolo_card');
                $text_card = get_sub_field('testo_card'); ?>

                <div class="cards">
                    <div class="cards__wrap container">

                        <?php
                        if ($title_card) : ?>
                            <p class="cards__wrap__title">
                                <?php echo esc_html($title_card); ?>
                            </p>
                        <?php endif; ?>

                        <?php
                        if ($text_card) : ?>
                            <div class="cards__wrap__text">
                                <?php echo $text_card; ?>
                            </div>
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

                                    <div class="cards__wrap__list__item">
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
            // Case: Card 2 Block.
            elseif (get_row_layout() == 'card_2_block'):
                $title_card_2 = get_sub_field('titolo_card_bg');
                $testo_card_2 = get_sub_field('testo_card_bg'); ?>

                <div class="card-s">
                    <div class="card-s__wrap container">

                        <?php
                        if ($title_card_2) : ?>
                            <p class="card-s__wrap__title"><?php echo esc_html($title_card_2); ?></p>
                        <?php endif; ?>
                        <?php
                        if ($testo_card_2) : ?>
                            <div class="card-s__wrap__text">
                                <?php echo $testo_card_2; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (have_rows('repeater_card_bg')): ?>
                            <div class="card-s__wrap__list">
                                <?php while (have_rows('repeater_card_bg')) : the_row();
                                    $text = get_sub_field('text'); ?>

                                    <div class="card-s__wrap__list__item">
                                        <?php if ($text) : ?>
                                            <div class="card-s__wrap__list__item__text">
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
            // Case: Gallery.
            elseif (get_row_layout() == 'gallery_block'): ?>

                <div class="slider container">
                    <div class="slider__wrap">

                        <?php
                        $titolo_gallery = get_sub_field('titolo_gallery');
                        if ($titolo_gallery) : ?>
                            <p class="slider__wrap__title">
                                <?php echo esc_html($titolo_gallery); ?>
                            </p>
                        <?php endif; ?>

                        <?php
                        if (have_rows('slider_gallery_progetti')): ?>

                            <div class="gallery swiperStoria">
                                <div class="swiper-wrapper">

                                    <?php
                                    while (have_rows('slider_gallery_progetti')) : the_row();
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
                </div>

            <?php
            // Case: Network.
            elseif (get_row_layout() == 'network_block'): ?>

                <div class="network-block">
                    <div class="network-block__wrap container">
                        <div class="network-block__wrap__intro">
                            <?php
                            $title_network = get_sub_field('titolo_network');
                            if ($title_network) : ?>
                                <h4 class="network-block__wrap__intro__title"><?php echo esc_html($title_network); ?></h4>
                            <?php endif; ?>
                        </div>

                        <?php
                        if (have_rows('repeater_network')): ?>

                            <div class="network-block__wrap__repeater swiperCollaborazioni">
                                <ul class="swiper-wrapper">

                                    <?php
                                    while (have_rows('repeater_network')) : the_row();
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
                </div>

        <?php
            endif;
        endwhile; ?>

    </section>

<?php
endif; ?>
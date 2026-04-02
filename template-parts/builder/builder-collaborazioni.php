<?php

// Check value exists.
if (have_rows('builder_collaborazioni_collab')): ?>

    <section class="builder-collaborazioni position">

        <?php
        while (have_rows('builder_collaborazioni_collab')) : the_row();

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
            // Case: Card BG Block.
            elseif (get_row_layout() == 'card_bg_block'):
                $title_card_2 = get_sub_field('titolo_card_bg');
                $testo_card_2 = get_sub_field('testo_card_bg'); ?>

                <div class="card-bg">
                    <div class="card-bg__wrap container">

                        <?php
                        if ($title_card_2) : ?>
                            <p class="card-bg__wrap__title">
                                <?php echo esc_html($title_card_2); ?>
                            </p>
                        <?php endif; ?>

                        <?php
                        if ($testo_card_2) : ?>
                            <div class="card-bg__wrap__text">
                                <?php echo $testo_card_2; ?>
                            </div>
                        <?php endif; ?>

                        <?php
                        if (have_rows('repeater_card_bg')): ?>

                            <div class="card-bg__wrap__list-mobile swiperObiettivi">
                                <div class="swiper-wrapper">

                                    <?php
                                    while (have_rows('repeater_card_bg')) : the_row();
                                        $text = get_sub_field('text'); ?>

                                        <div class="card-bg__wrap__list__item swiper-slide">
                                            <?php echo $text; ?>
                                        </div>

                                    <?php
                                    endwhile; ?>
                                </div>

                            </div>
                        <?php
                        endif; ?>

                        <?php
                        if (have_rows('repeater_card_bg')): ?>
                            <div class="card-bg__wrap__list-desktop">
                                <?php
                                while (have_rows('repeater_card_bg')) : the_row();
                                    $text = get_sub_field('text'); ?>

                                    <div class="card-bg__wrap__list__item">
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
            // Case: Step.
            elseif (get_row_layout() == 'step_block'):
                $title_step = get_sub_field('titolo_step');
                $testo_step = get_sub_field('testo_step'); ?>

                <div class="step-block">
                    <div class="step-block__wrap container">
                        <?php if ($title_step) : ?>
                            <h2 class="step-block__wrap__title">
                                <?php echo esc_html($title_step); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($testo_step) : ?>
                            <div class="step-block__wrap__text">
                                <?php echo $testo_step; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (have_rows('repeater_step')) :
                            $steps = [];
                            while (have_rows('repeater_step')) : the_row();
                                $steps[] = [
                                    'titolo' => get_sub_field('titolo'),
                                    'text'   => get_sub_field('text'),
                                    'link'   => get_sub_field('link'),
                                ];
                            endwhile;
                            $total = count($steps);
                        ?>

                            <!-- Stepper indicator -->
                            <div class="step-block__wrap__stepper">
                                <?php for ($i = 0; $i < $total; $i++) : ?>
                                    <div class="step-block__wrap__stepper__step">
                                        <span class="step-block__wrap__stepper__step__number"><?php echo $i + 1; ?></span>
                                    </div>
                                <?php endfor; ?>
                            </div>

                            <!-- Step cards -->
                            <div class="step-block__wrap__cards">
                                <?php foreach ($steps as $index => $step) : ?>
                                    <div class="step-block__wrap__cards__card">
                                        <span class="step-block__wrap__cards__card__number"><?php echo $index + 1; ?></span>

                                        <?php if ($step['titolo']) : ?>
                                            <p class="step-block__wrap__cards__card__title">
                                                <?php echo esc_html($step['titolo']); ?>
                                            </p>
                                        <?php endif; ?>

                                        <?php if ($step['text']) : ?>
                                            <div class="step-block__wrap__cards__card__text">
                                                <?php echo $step['text']; ?>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($step['link']) :
                                            $link_url = $step['link']['url'];
                                            $link_title = $step['link']['title'];
                                            $link_target = $step['link']['target'] ? $step['link']['target'] : '_self';
                                        ?>
                                            <a class="step-block__wrap__cards__card__link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                                <?php echo esc_html($link_title); ?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        <?php endif; ?>
                    </div>
                </div>

            <?php
            // Case: Testimonianze Block.
            elseif (get_row_layout() == 'testimonianze_block'):
                $title_testimonianze = get_sub_field('titolo_testimonianze');
                $testo_testimonianze = get_sub_field('testo_testimonianze'); ?>

                <div class="testimonianze-block">
                    <div class="testimonianze-block__wrap container">
                        <?php
                        if ($title_testimonianze) : ?>
                            <h2 class="testimonianze-block__wrap__title">
                                <?php echo esc_html($title_testimonianze); ?>
                            </h2>
                        <?php endif; ?>
                        <?php if ($testo_testimonianze) : ?>
                            <div class="testimonianze-block__wrap__text">
                                <?php echo $testo_testimonianze; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (have_rows('repeater_testimonianze')): ?>
                            <div class="testimonianze-block__wrap__list swiperTestimonianze">
                                <div class="swiper-wrapper">
                                    <?php while (have_rows('repeater_testimonianze')) : the_row();
                                        $text = get_sub_field('text');
                                        $nome = get_sub_field('nome'); ?>
                                        <div class="testimonianze-block__wrap__list__item swiper-slide">
                                            <div class="testimonianze-block__wrap__list__item__text">
                                                <?php echo $text; ?>
                                            </div>
                                            <p class="testimonianze-block__wrap__list__item__nome">
                                                <?php echo esc_html($nome); ?>
                                            </p>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>

            <?php
            // Case: Form Block.
            elseif (get_row_layout() == 'form_block'):
                $title_form = get_sub_field('titolo_form');
                $shortcode_form = get_sub_field('shortcode_form'); ?>

                <div class="form-block">
                    <div class="form-block__wrap container">

                    </div>
                </div>

            <?php
            // Case: CTA Block
            elseif (get_row_layout() == 'cta_block'):
                $title_cta = get_sub_field('titolo_cta');
                $testo_cta = get_sub_field('testo_cta');
                $link_cta = get_sub_field('link_cta');

                if ($link_cta) {
                    $link_cta_url = $link_cta['url'];
                    $link_cta_title = $link_cta['title'];
                    $link_cta_target = $link_cta['target'] ? $link_cta['target'] : '_self';
                }; ?>

                <div class="cta-block">
                    <div class="cta-block__wrap container">

                    </div>
                </div>

            <?php
            // Case: Image.
            elseif (get_row_layout() == 'image_block'):
                $title_img = get_sub_field('titolo_img');
                $selettore_img = get_sub_field('selettore_img');
                $image_img = get_sub_field('image_img');
                $video_img = get_sub_field('video_img'); ?>

                <div class="image-block">
                    <div class="image-block__wrap container">

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
                        if (have_rows('slider_gallery')): ?>

                            <div class="gallery swiperStoria">
                                <div class="swiper-wrapper">

                                    <?php
                                    while (have_rows('slider_gallery')) : the_row();
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
            endif;
        endwhile; ?>

    </section>

<?php
endif; ?>
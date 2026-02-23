<?php
get_header(); ?>

<body <?php body_class('theme-blue'); ?>>

    <?php get_template_part('template-parts/header-block'); ?>

    <main class="front-page">

        <?php get_template_part('template-parts/breadcrumbs'); ?>

        <section class="hero container">
            <?php
            $titolo_hero = get_field('titolo_hero_home');
            $testo_hero = get_field('testo_hero_home');
            $cta_hero = get_field('pulsante_hero_home');
            $img_hero = get_field('image_hero_home'); ?>

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

        <section class="servizi-block container">
            <?php
            $titolo_servizi = get_field('titolo_servizi_home');

            if ($titolo_servizi) : ?>
                <h2 class="servizi-block__title">
                    <?php echo esc_html($titolo_servizi); ?>
                </h2>
            <?php endif; ?>

            <div class="servizi-block__loop">
                <?php /* Servizi Loop */

                $servizi_loop = new WP_Query(array(
                    'post_type'     => 'servizi',
                    'posts_per_page' => -1,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                )); ?>

                <?php if ($servizi_loop->have_posts()) : while ($servizi_loop->have_posts()) : $servizi_loop->the_post(); ?>

                        <?php
                        $radio_value = get_field('selettore_colore_servizi');
                        // Normalizza il valore: minuscolo multibyte, spazi -> trattini, poi sanitizza
                        $radio_slug = '';
                        if ($radio_value) {
                            $radio_slug = mb_strtolower($radio_value, 'UTF-8');
                            $radio_slug = preg_replace('/\s+/', '-', $radio_slug);
                            $radio_slug = sanitize_html_class($radio_slug);
                        }
                        ?>

                        <article class="servizi-block__loop__item <?php echo $radio_slug ? ' ' . esc_attr($radio_slug) : ''; ?>">
                            <a href="<?php the_permalink(); ?>" class="servizi-block__loop__item__link">
                                <div class="servizi-block__loop__item__link__image">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <?php the_post_thumbnail('large'); ?>
                                    <?php endif; ?>
                                </div>
                                <p class="servizi-block__loop__item__link__title"><?php the_title(); ?></p>
                            </a>
                        </article>

                <?php endwhile;
                endif; ?>
            </div>

        </section>

        <section class="progetti-block">
            <div class="progetti-block__wrap container">
                <div class="progetti-block__wrap__intro">
                    <?php
                    // Recupera l'ID della pagina usata come front page (se impostata), altrimenti usa il queried object
                    $front_id = get_option('page_on_front') ? (int) get_option('page_on_front') : get_queried_object_id();

                    // Recupera i field ACF passando l'ID della pagina frontale per essere sicuri di leggere i valori corretti
                    $titolo_progetti = get_field('titolo_progetti_home', $front_id);
                    $link_progetti = get_field('link_progetti_home', $front_id);

                    if ($link_progetti) {
                        $link_progetti_url = $link_progetti['url'];
                        $link_progetti_title = $link_progetti['title'];
                        $link_progetti_target = $link_progetti['target'] ? $link_progetti['target'] : '_self';
                    }
                    ?>

                    <span class="spacer">
                        <?php if ($link_progetti) : ?>
                            <a href="<?php echo esc_url($link_progetti_url); ?>" target="<?php echo esc_attr($link_progetti_target); ?>" class="progetti-block__wrap__intro__cta">
                                <?php echo esc_html($link_progetti_title); ?>
                            </a>
                        <?php endif; ?>
                    </span>

                    <?php if ($titolo_progetti) : ?>
                        <h3 class="progetti-block__wrap__intro__title">
                            <?php echo esc_html($titolo_progetti); ?>
                        </h3>
                    <?php endif; ?>

                    <?php if ($link_progetti) : ?>
                        <a href="<?php echo esc_url($link_progetti_url); ?>" target="<?php echo esc_attr($link_progetti_target); ?>" class="progetti-block__wrap__intro__cta">
                            <?php echo esc_html($link_progetti_title); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="progetti-block__wrap__slider swiperProgetti">
                    <ul class="swiper-wrapper">

                        <?php
                        // Mostra l'ultimo post del CPT 'giornalino' come primo slide, se esiste.
                        $giornalino_args = array(
                            'post_type' => 'giornalino',
                            'posts_per_page' => 1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                        );
                        $giornalino_q = new WP_Query($giornalino_args);
                        if ($giornalino_q->have_posts()) : while ($giornalino_q->have_posts()) : $giornalino_q->the_post(); ?>
                                <li class="swiper-slide progetti-item">
                                    <a href="<?php the_permalink(); ?>" class="progetti-item__link">
                                        <div class="progetti-item__link__image">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('large'); ?>
                                            <?php endif; ?>
                                        </div>
                                        <time class="progetti-item__link__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                        <p class="progetti-item__link__title"><?php the_title(); ?></p>
                                    </a>
                                </li>
                        <?php endwhile;
                            wp_reset_postdata();
                        endif; ?>

                        <?php /* Progetti Loop */

                        $progetti_loop = new WP_Query(array(
                            'post_type'     => 'progetti',
                            'posts_per_page' => -1,
                            'orderby'        => 'menu_order',
                            'order'          => 'ASC',
                        )); ?>

                        <?php if ($progetti_loop->have_posts()) : while ($progetti_loop->have_posts()) : $progetti_loop->the_post(); ?>

                                <li class="swiper-slide progetti-item">
                                    <a href="<?php the_permalink(); ?>" class="progetti-item__link">
                                        <div class="progetti-item__link__image">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium'); ?>
                                            <?php endif; ?>
                                        </div>
                                        <time class="progetti-item__link__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                        <p class="progetti-item__link__title"><?php the_title(); ?></p>
                                    </a>
                                </li>

                                <?php wp_reset_postdata(); ?>
                        <?php endwhile;
                        endif; ?>
                    </ul>

                    <div class="swiper-button-prev"></div>

                    <div class="swiper-button-next"></div>

                </div>
            </div>
        </section>

        <section class="collaborazioni-block container ">
            <div class="collaborazioni-block__wrap">
                <div class="collaborazioni-block__wrap__intro">
                    <?php
                    $title_collab = get_field('titolo_collaborazioni_home');
                    if ($title_collab) : ?>
                        <h4 class="collaborazioni-block__wrap__intro__title"><?php echo esc_html($title_collab); ?></h4>
                    <?php endif; ?>
                </div>

                <?php
                if (have_rows('repeater_collaboratori_home')): ?>

                    <div class="collaborazioni-block__wrap__repeater swiperCollaborazioni">
                        <ul class="swiper-wrapper">

                            <?php
                            while (have_rows('repeater_collaboratori_home')) : the_row();
                                $link_rep_collab = get_sub_field('link');
                                $image_rep_collab = get_sub_field('image');

                                if ($link_rep_collab) {
                                    $link_rep_collab_url = $link_rep_collab['url'];
                                    $link_rep_collab_title = $link_rep_collab['title'];
                                    $link_rep_collab_target = $link_rep_collab['target'] ? $link_rep_collab['target'] : '_self';
                                }; ?>

                                <li class="collab-item swiper-slide">

                                    <?php if ($link_rep_collab) : ?>
                                        <a href="<?php echo esc_url($link_rep_collab_url); ?>" target="<?php echo esc_attr($link_rep_collab_target); ?>" class="collab-item__link">
                                            <?php if ($image_rep_collab) : ?>
                                                <img src="<?php echo esc_url($image_rep_collab['url']); ?>" alt="<?php echo esc_attr($image_rep_collab['alt']); ?>">
                                            <?php endif; ?>
                                        </a>
                                    <?php elseif ($image_rep_collab) : ?>
                                        <img src="<?php echo esc_url($image_rep_collab['url']); ?>" alt="<?php echo esc_attr($image_rep_collab['alt']); ?>">
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

        <section class="news-block">
            <div class="news-block__wrap container">
                <div class="news-block__wrap__intro">
                    <?php
                    // Recupera l'ID della pagina usata come front page (se impostata), altrimenti usa il queried object
                    $front_id = get_option('page_on_front') ? (int) get_option('page_on_front') : get_queried_object_id();

                    // Recupera i field ACF passando l'ID della pagina frontale per essere sicuri di leggere i valori corretti
                    $titolo_news = get_field('titolo_news_home', $front_id);
                    $link_news = get_field('link_news_home', $front_id);

                    if ($link_news) {
                        $link_news_url = $link_news['url'];
                        $link_news_title = $link_news['title'];
                        $link_news_target = $link_news['target'] ? $link_news['target'] : '_self';
                    }
                    ?>

                    <span class="spacer">
                        <?php if ($link_news) : ?>
                            <a href="<?php echo esc_url($link_news_url); ?>" target="<?php echo esc_attr($link_news_target); ?>" class="news-block__wrap__intro__cta">
                                <?php echo esc_html($link_news_title); ?>
                            </a>
                        <?php endif; ?>
                    </span>

                    <?php if ($titolo_news) : ?>
                        <h5 class="news-block__wrap__intro__title">
                            <?php echo esc_html($titolo_news); ?>
                        </h5>
                    <?php endif; ?>

                    <?php if ($link_news) : ?>
                        <a href="<?php echo esc_url($link_news_url); ?>" target="<?php echo esc_attr($link_news_target); ?>" class="news-block__wrap__intro__cta">
                            <?php echo esc_html($link_news_title); ?>
                        </a>
                    <?php endif; ?>
                </div>
                <ul class="news-block__wrap__loop">
                    <?php /* Post Loop */

                    $post_loop = new WP_Query(array(
                        'post_type'     => 'post',
                        'posts_per_page' => 4,
                        'orderby'        => 'menu_order',
                        'order'          => 'ASC',
                    )); ?>

                    <?php if ($post_loop->have_posts()) : while ($post_loop->have_posts()) : $post_loop->the_post(); ?>
                            <li class="news-block__wrap__loop__item">
                                <a href="<?php the_permalink(); ?>" class="news-block__wrap__loop__item__link">
                                    <div class="news-block__wrap__loop__item__link__image">
                                        <?php the_post_thumbnail('large', array('class' => '', 'alt' => get_the_title())); ?>
                                    </div>
                                    <time class="news-block__wrap__loop__date" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time>
                                    <p><?php the_title(); ?></p>
                                </a>
                            </li>

                    <?php endwhile;
                        wp_reset_postdata();
                    endif; ?>

                </ul>
            </div>
        </section>

        <section class="valori container">
            <div class="valori__info">

                <?php
                $valori_title = get_field('titolo_professionalita_home');
                if ($valori_title) : ?>
                    <h6 class="valori__info__title">
                        <?php echo esc_html($valori_title); ?>
                    </h6>
                <?php endif; ?>

            </div>
            <?php
            if (have_rows('repeater_card_home')): ?>

                <div class="valori__slider swiperValori">
                    <ul class="swiper-wrapper">
                        <?php
                        while (have_rows('repeater_card_home')) : the_row();
                            $sub_value = get_sub_field('testo'); ?>

                            <div class="valori__slider__item swiper-slide">
                                <?php if ($sub_value) : ?>
                                    <p class="valori__slider__item__text">
                                        <?php echo esc_html($sub_value); ?>
                                    </p>
                                <?php endif; ?>
                            </div>

                        <?php endwhile; ?>
                    </ul>
                    <div class="navigation-wrapper">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>

            <?php
            endif; ?>
        </section>

        <section class="social">
            <div class="social__wrap container">
                <div class="social__wrap__intro">
                    <?php
                    $social_title = get_field('titolo_social_home');
                    if ($social_title) : ?>
                        <p class="social__wrap__intro__title">
                            <?php echo esc_html($social_title); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <?php
                if (have_rows('repeater_social_home')): ?>
                    <div class="social__wrap__links">
                        <?php
                        while (have_rows('repeater_social_home')) : the_row();
                            $img_social = get_sub_field('image');
                            $logo_social = get_sub_field('logo');
                            $link_social = get_sub_field('link_social');

                            if ($link_social) {
                                $link_social_url = $link_social['url'];
                                $link_social_title = $link_social['title'];
                                $link_social_target = $link_social['target'] ? $link_social['target'] : '_self';
                            }; ?>

                            <a class="social__wrap__links__item" href="<?php echo esc_url($link_social_url); ?>" target="<?php echo esc_attr($link_social_target); ?>">
                                <?php if ($img_social) : ?>
                                    <img src="<?php echo esc_url($img_social['url']); ?>" alt="<?php echo esc_attr($img_social['alt']); ?>">
                                <?php endif; ?>
                                <?php if ($logo_social) :
                                    echo file_get_contents($logo_social['url']);
                                endif; ?>
                            </a>

                        <?php
                        endwhile; ?>
                    </div>
                <?php
                endif; ?>
            </div>
        </section>

        <section class="maps-block container">
            <div class="maps-block__info">
                <?php
                $map_title = get_field('titolo_mappa_home');
                if ($map_title) : ?>
                    <p class="maps-block__info__title">
                        <?php echo esc_html($map_title); ?>
                    </p>
                <?php endif; ?>
            </div>
            <div class="maps-block__content">
                <?php
                $map_embed = get_field('mappa_home');
                if ($map_embed) {
                    echo strip_tags($map_embed, '<iframe>');
                }; ?>
            </div>
        </section>

        <section class="network-block container ">
            <div class="network-block__wrap">
                <div class="network-block__wrap__intro">
                    <?php
                    $title_network = get_field('titolo_network_home');
                    if ($title_network) : ?>
                        <h4 class="network-block__wrap__intro__title"><?php echo esc_html($title_network); ?></h4>
                    <?php endif; ?>
                </div>

                <?php
                if (have_rows('repeater_network_home')): ?>

                    <div class="network-block__wrap__repeater swiperCollaborazioni">
                        <ul class="swiper-wrapper">

                            <?php
                            while (have_rows('repeater_network_home')) : the_row();
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

        <section class="parte-block">
            <div class="parte-block__wrap container">
                <div class="parte-block__wrap__intro">
                    <?php
                    $title_parte = get_field('titolo_siamo_home');
                    if ($title_parte) : ?>
                        <p class="parte-block__wrap__intro__title"><?php echo esc_html($title_parte); ?></p>
                    <?php endif; ?>
                </div>

                <?php
                if (have_rows('repeater_siamo_home')): ?>

                    <div class="parte-block__wrap__repeater swiperCollaborazioni">
                        <ul class="swiper-wrapper">

                            <?php
                            while (have_rows('repeater_siamo_home')) : the_row();
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
    </main>

    <?php get_template_part('template-parts/footer-block'); ?>

    <?php get_footer(); ?>
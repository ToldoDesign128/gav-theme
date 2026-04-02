<?php
$page_id = get_queried_object();
get_header(); ?>

<body <?php body_class('theme-verde'); ?>>

    <?php get_template_part('template-parts/header-block'); ?>

    <main class="page-blog">

        <nav class="breadcrumbs container">
            <ul>
                <li>Home</li>
                <li>
                    <a href="<?php echo esc_url(home_url('/news')); ?>">
                        News
                    </a>
                </li>
            </ul>
        </nav>

        <?php get_template_part('template-parts/background'); ?>

        <section class="hero-blog container position">
            <?php
            $title_hero = get_field('titolo_news', $page_id);
            $text_hero = get_field('testo_news', $page_id); ?>

            <div class="hero-blog__wrap">
                <?php if ($title_hero) : ?>
                    <h1 class="hero-blog__wrap__title">
                        <?php echo esc_html($title_hero); ?>
                    </h1>
                <?php endif; ?>

                <?php if ($text_hero) : ?>
                    <p class="hero-blog__wrap__text">
                        <?php echo wp_kses_post($text_hero); ?>
                    </p>
                <?php endif; ?>

                <?php
                if (have_rows('repeater_link_news', $page_id)):
                ?>
                    <ul class="hero-blog__wrap__list">
                        <?php
                        while (have_rows('repeater_link_news', $page_id)) : the_row();
                            $link_social = get_sub_field('link');
                            $icon = get_sub_field('image');

                            if ($link_social) {
                                $link_url = $link_social['url'];
                                $link_target = $link_social['target'] ? $link_social['target'] : '_self';
                            }; ?>

                            <li class="hero-blog__wrap__list__item">
                                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                    <?php echo file_get_contents($icon['url']); ?>
                                </a>
                            </li>

                        <?php
                        endwhile; ?>
                    </ul>
                <?php
                endif; ?>

        </section>

        <section class="news position">
            <div class="news__wrap container">
                <?php
                $sticky_posts = get_option('sticky_posts');
                $news_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'post__in' => $sticky_posts,
                    'ignore_sticky_posts' => 1,
                ));

                if (!$news_query->have_posts()) {
                    $news_query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                    ));
                }
                ?>

                <?php if ($news_query->have_posts()) : ?>
                    <div class="swiper swiperNews">
                        <div class="swiper-wrapper">
                            <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                                <div class="swiper-slide">
                                    <article class="news__wrap__slide">
                                        <div class="news__wrap__slide__content">
                                            <div class="news__wrap__slide__content__date">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                                </svg>
                                                <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                                    <?php echo get_the_date('d/m/Y'); ?>
                                                </time>
                                            </div>
                                            <h3 class="news__wrap__slide__content__title">
                                                <?php the_title(); ?>
                                            </h3>
                                            <div class="news__wrap__slide__content__excerpt">
                                                <?php the_content(); ?>
                                            </div>
                                        </div>
                                        <?php if (has_post_thumbnail()) : ?>
                                            <div class="news__wrap__slide__image">
                                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" alt="<?php the_title_attribute(); ?>">
                                            </div>
                                        <?php endif; ?>
                                    </article>
                                </div>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>

                        <div class="swiper-button-prev swiperNews-prev"></div>
                        <div class="swiper-button-next swiperNews-next"></div>
                    </div>
                <?php endif; ?>

                <!-- All posts expandable -->
                <?php
                $all_posts_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => -1,
                    'orderby' => 'date',
                    'order' => 'DESC',
                ));
                ?>

                <?php if ($all_posts_query->have_posts()) : ?>
                    <div class="news__wrap__all">
                        <?php $post_index = 0; while ($all_posts_query->have_posts()) : $all_posts_query->the_post(); ?>
                            <article class="news__wrap__all__item <?php echo ($post_index % 2 !== 0) ? 'news__wrap__all__item--reverse' : ''; ?>">
                                <div class="news__wrap__all__item__content">
                                    <div class="news__wrap__all__item__content__date">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>">
                                            <?php echo get_the_date('d/m/Y'); ?>
                                        </time>
                                    </div>
                                    <h3 class="news__wrap__all__item__content__title">
                                        <?php the_title(); ?>
                                    </h3>
                                    <div class="news__wrap__all__item__content__excerpt">
                                        <?php echo wp_trim_words(get_the_content(), 50, '...'); ?>
                                    </div>
                                </div>
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="news__wrap__all__item__image">
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>" alt="<?php the_title_attribute(); ?>">
                                    </div>
                                <?php endif; ?>
                            </article>
                        <?php $post_index++; endwhile; wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>

                <div class="news__wrap__cta">
                    <button id="toggleAllNews" class="news__wrap__cta__link">
                        <span class="news__wrap__cta__link__more">Mostra di più</span>
                        <span class="news__wrap__cta__link__less">Mostra meno</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </button>
                </div>
            </div>
        </section>

        <section class="social position">
            <div class="social__wrap container">
                <div class="social__wrap__intro">
                    <?php
                    $social_title = get_field('titolo_social_news', $page_id);
                    if ($social_title) : ?>
                        <p class="social__wrap__intro__title">
                            <?php echo esc_html($social_title); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <?php
                if (have_rows('repeater_social_news', $page_id)): ?>
                    <div class="social__wrap__links">
                        <?php
                        while (have_rows('repeater_social_news', $page_id)) : the_row();
                            $img_social = get_sub_field('image');
                            $logo_social = get_sub_field('icona');
                            $link_social = get_sub_field('link');

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

        <?php get_template_part('template-parts/enti-block'); ?>

    </main>

    <?php get_template_part('template-parts/footer-block'); ?>

    <?php get_footer(); ?>
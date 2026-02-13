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

        <section class="placeholder">
        </section>

    </main>

    <?php get_template_part('template-parts/footer-block'); ?>

    <?php get_footer(); ?>
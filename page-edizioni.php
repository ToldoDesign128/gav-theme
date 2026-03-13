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

        <section class="placeholder">
        </section>
        <section class="placeholder">
        </section>

    </main>

    <?php get_template_part('template-parts/footer-block'); ?>

    <?php get_footer(); ?>
<?php
get_header();

$colore_progetto = get_field('selettore_colore_progetti');
$theme_class = $colore_progetto ? 'theme-' . sanitize_title($colore_progetto) : '';
?>

<body <?php body_class($theme_class); ?>>

    <?php get_template_part('template-parts/header-block'); ?>

    <main class="progetti-template">

        <?php get_template_part('template-parts/breadcrumbs'); ?>

        <?php get_template_part('template-parts/builder/builder-progetti'); ?>

    </main>

    <?php get_template_part('template-parts/footer-block'); ?>

    <?php get_footer(); ?>
<?php
get_header();

$colore_progetto = get_field('selettore_colore_collab');
$theme_class = $colore_progetto ? 'theme-' . sanitize_title($colore_progetto) : '';
?>

<body <?php body_class($theme_class); ?>>

    <?php get_template_part('template-parts/header-block'); ?>

    <main class="collaborazioni-template">

        <?php get_template_part('template-parts/breadcrumbs'); ?>

        <?php get_template_part('template-parts/background'); ?>

        <?php get_template_part('template-parts/builder/builder-collaborazioni'); ?>

        <?php get_template_part('template-parts/enti-block'); ?>

    </main>

    <?php get_template_part('template-parts/footer-block'); ?>

    <?php get_footer(); ?>
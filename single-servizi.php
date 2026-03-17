<?php
get_header();

$colore_servizio = get_field('selettore_colore_servizi');
$theme_class = $colore_servizio ? 'theme-' . sanitize_title($colore_servizio) : '';
?>

<body <?php body_class($theme_class); ?>>

    <?php get_template_part('template-parts/header-block'); ?>

    <main class="servizi-template">

        <?php get_template_part('template-parts/breadcrumbs'); ?>

        <?php get_template_part('template-parts/builder/builder-servizi'); ?>

    </main>

    <?php get_template_part('template-parts/footer-block'); ?>

    <?php get_footer(); ?>
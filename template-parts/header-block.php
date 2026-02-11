<!-- Header -->
<header class="header">
    <div class="header__wrap container">
        <?php
        $header_logo = get_field('logo_header', 'option');
        if ($header_logo) : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="header__wrap__logo">
                <?php
                echo wp_get_attachment_image($header_logo, 'full');
                ?>
            </a>
        <?php
        endif;
        ?>

        <nav class="header__wrap__nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'primary-menu',
                'fallback_cb' => false,
            ));
            ?>
        </nav>

        <?php
        $search = get_field('icona_cerca_header', 'option');
        if ($search) : ?>
            <a href="<?php echo get_home_url() . '?s='; ?>" class="header__wrap__search">
                <?php
                echo file_get_contents($search['url']);
                ?>
            </a>
        <?php
        endif;
        ?>

        <?php
        $cta_header = get_field('cta_header', 'option');
        if ($cta_header) : ?>
            <a href="<?php echo esc_url($cta_header['url']); ?>" class="header__wrap__cta primary-btn">
                <span><?php echo esc_html($cta_header['title']); ?></span>
            </a>
        <?php
        endif;
        ?>

        <button id="hamburgerBtn">
            <span></span>
            <span></span>
            <span></span>
        </button>
    </div>

    <div class="header__mobile container">
        <nav class="header__mobile__nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => false,
                'menu_class' => 'mobile-menu d-flex flex-column py-2',
                'fallback_cb' => false,
            ));
            ?>
        </nav>

        <?php
        $search = get_field('icona_cerca_header', 'option');
        if ($search) : ?>
            <a href="<?php echo get_home_url() . '?s='; ?>" class="header__mobile__search">
                <?php
                echo file_get_contents($search['url']);
                ?>
            </a>
        <?php
        endif;

        $cta_header = get_field('cta_header', 'option');
        if ($cta_header) : ?>
            <a href="<?php echo esc_url($cta_header['url']); ?>" class="header__mobile__cta primary-btn">
                <span><?php echo esc_html($cta_header['title']); ?></span>
            </a>
        <?php
        endif;
        ?>
    </div>
</header>
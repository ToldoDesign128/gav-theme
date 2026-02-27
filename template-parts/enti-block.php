<?php
$page_id = get_queried_object_id();

$attiva_blocco_enti = get_field('attiva_blocco_enti', $page_id);
if ($attiva_blocco_enti === 'Attivo') : ?>
    <section class="parte-block">
        <div class="parte-block__wrap container">
            <div class="parte-block__wrap__intro">
                <?php
                $title_parte = get_field('titolo_enti', 'option');
                if ($title_parte) : ?>
                    <p class="parte-block__wrap__intro__title"><?php echo esc_html($title_parte); ?></p>
                <?php endif; ?>
            </div>

            <?php
            $enti_selezionati = get_field('selettore_enti');
            if ($enti_selezionati): ?>

                <div class="parte-block__wrap__repeater swiperCollaborazioni">
                    <ul class="swiper-wrapper">

                        <?php foreach ($enti_selezionati as $ente) :
                            $ente_id = is_object($ente) ? $ente->ID : $ente;
                            $ente_title = get_the_title($ente_id);
                            $logo_ente = get_field('logo_ente', $ente_id);
                            $link_ente = get_field('link_ente', $ente_id);

                            if ($link_ente) {
                                $link_ente_url = $link_ente['url'];
                                $link_ente_target = $link_ente['target'] ? $link_ente['target'] : '_self';
                            }
                        ?>

                            <li class="parte-item swiper-slide">

                                <?php if ($link_ente) : ?>
                                    <a href="<?php echo esc_url($link_ente_url); ?>" target="<?php echo esc_attr($link_ente_target); ?>" class="parte-item__link">
                                        <?php if ($logo_ente) : ?>
                                            <img src="<?php echo esc_url($logo_ente['url']); ?>" alt="<?php echo esc_attr($logo_ente['alt']); ?>">
                                        <?php endif; ?>
                                    </a>
                                <?php elseif ($logo_ente) : ?>
                                    <img src="<?php echo esc_url($logo_ente['url']); ?>" alt="<?php echo esc_attr($logo_ente['alt']); ?>">
                                <?php endif; ?>

                            </li>

                        <?php endforeach; ?>

                    </ul>

                    <div class="swiper-button-prev"></div>

                    <div class="swiper-button-next"></div>

                    <div class="swiper-pagination"></div>

                </div>

            <?php
            endif; ?>
        </div>

    </section>
<?php endif; ?>
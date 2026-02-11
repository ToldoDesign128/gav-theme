 <!-- Footer -->
 <footer class="footer">
     <div class="footer__wrap container">
         <nav class="footer__wrap__sitemap">
             <?php
                wp_nav_menu(array(
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => 'footer-menu',
                    'fallback_cb' => false,
                ));
                ?>
         </nav>
         <div class="footer__wrap__adress">
             <?php
                $contatti  = get_field('contatti_footer', 'option');
                if ($contatti) {
                    echo $contatti;
                }; ?>
         </div>
         <div class="footer__wrap__form">

             <?php
                $title_form = get_field('titolo_form_footer', 'option'); ?>

             <h2 class="footer__wrap__form__title">
                 <?php
                    if ($title_form) {
                        echo $title_form;
                    }; ?>
             </h2>

             <?php
                $shortcode  = get_field('shortcode_form_footer', 'option');
                if ($shortcode) {
                    echo do_shortcode($shortcode);
                }; ?>

         </div>
     </div>

     <div class="footer__credits container">
         <div class="footer__credits__social">
             <?php
                if (have_rows('repeater_social_footer', 'option')) :
                    while (have_rows('repeater_social_footer', 'option')) : the_row();
                        $icon_social = get_sub_field('icona_social');
                        $link_social = get_sub_field('link_social');

                        if ($link_social) {
                            $link_url = $link_social['url'];
                            $link_target = $link_social['target'] ? $link_social['target'] : '_self';
                        }; ?>

                     <a href="<?php echo esc_url($link_url); ?>" class="footer__credits__social__item" target="<?php echo esc_attr($link_target); ?>">
                         <?php echo file_get_contents($icon_social['url']); ?>
                     </a>
             <?php
                    endwhile;
                endif; ?>

         </div>
         <div class="footer__credits__info">
             <div class="footer__credits__info__links">
                 <?php
                    if (have_rows('repeater_link_footer', 'option')) :
                        while (have_rows('repeater_link_footer', 'option')) : the_row();
                            $link_credits = get_sub_field('link');

                            if ($link_credits) {
                                $link_url = $link_credits['url'];
                                $link_target = $link_credits['target'] ? $link_credits['target'] : '_self';
                            }; ?>

                         <a href="<?php echo esc_url($link_url); ?>" class="footer__credits__info__links__item" target="<?php echo esc_attr($link_target); ?>">
                             <?php echo esc_html($link_credits['title']); ?>
                         </a>
                 <?php
                        endwhile;
                    endif; ?>
             </div>
             <div class="footer__credits__info__copyright">
                 <?php
                    $copyright = get_field('copyright_footer', 'option');
                    if ($copyright) :  ?>
                     <span><?php echo esc_html($copyright); ?></span>
                 <?php endif; ?>
             </div>
         </div>
         <div class="footer__credits__social spacer">
             <?php
                if (have_rows('repeater_social_footer', 'option')) :
                    while (have_rows('repeater_social_footer', 'option')) : the_row();
                        $icon_social = get_sub_field('icona_social');
                        $link_social = get_sub_field('link_social');

                        if ($link_social) {
                            $link_url = $link_social['url'];
                            $link_target = $link_social['target'] ? $link_social['target'] : '_self';
                        }; ?>

                     <a href="<?php echo esc_url($link_url); ?>" class="footer__credits__social__item" target="<?php echo esc_attr($link_target); ?>">
                         <?php echo file_get_contents($icon_social['url']); ?>
                     </a>
             <?php
                    endwhile;
                endif; ?>

         </div>
     </div>
 </footer>
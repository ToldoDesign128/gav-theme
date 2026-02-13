<!-- Breadcrumbs -->
<nav class="breadcrumbs container">
    <ul>
        <?php // Always show Home once: plain text on the front page, link elsewhere ?>
        <?php if ( is_front_page() ) : ?>
            <li>Home</li>
        <?php else : ?>
            <li><a href="<?php echo esc_url( home_url() ); ?>">Home</a></li>
        <?php endif; ?>

        <?php if (is_category() || is_single()) : ?>

            <?php if (is_single()) : ?>
                <?php
                $post_type = get_post_type();

                // Custom post type: show link to archive (prefer page title if archive page exists) then title
                if ( $post_type && $post_type !== 'post' ) :
                    $post_type_obj = get_post_type_object( $post_type );
                    $archive_link = function_exists( 'get_post_type_archive_link' ) ? get_post_type_archive_link( $post_type ) : '';

                    // Try to find a Page that corresponds to the archive path so we can use its title
                    $archive_page = null;
                    if ( $archive_link ) {
                        $path = trim( parse_url( $archive_link, PHP_URL_PATH ), '/' );
                        if ( $path ) {
                            $archive_page = get_page_by_path( $path );
                        }
                    }

                    if ( $archive_page ) :
                        $archive_title = get_the_title( $archive_page );
                        $archive_permalink = get_permalink( $archive_page ); ?>
                        <li><a href="<?php echo esc_url( $archive_permalink ); ?>"><?php echo esc_html( $archive_title ); ?></a></li>
                    <?php elseif ( $archive_link ) :
                        $label = ( isset( $post_type_obj->labels->singular_name ) && $post_type_obj->labels->singular_name ) ? $post_type_obj->labels->singular_name : $post_type; ?>
                        <li><a href="<?php echo esc_url( $archive_link ); ?>"><?php echo esc_html( $label ); ?></a></li>
                    <?php else :
                        $label = ( isset( $post_type_obj->labels->singular_name ) && $post_type_obj->labels->singular_name ) ? $post_type_obj->labels->singular_name : $post_type; ?>
                        <li><?php echo esc_html( $label ); ?></li>
                    <?php endif; ?>

                    <li><?php echo esc_html( get_the_title() ); ?></li>

                <?php else : // Standard post type 'post' 
                ?>
                    <li><?php the_category(' '); ?></li>
                    <li><?php the_title(); ?></li>
                <?php endif; ?>

            <?php else : // is_category() archive 
            ?>
                <li><?php echo esc_html(single_cat_title('', false)); ?></li>
            <?php endif; ?>

        <?php elseif (is_page() && ! is_front_page()) : ?>
            <li><?php the_title(); ?></li>
        <?php endif; ?>

    </ul>
</nav>
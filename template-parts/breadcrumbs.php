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

                // Custom post type: find the page that uses the corresponding page template
                if ( $post_type && $post_type !== 'post' ) :
                    $post_type_obj = get_post_type_object( $post_type );

                    // Look for a page with the template "page-{post_type}.php"
                    $template_name = 'page-' . $post_type . '.php';
                    $parent_pages = get_pages( array(
                        'meta_key'   => '_wp_page_template',
                        'meta_value' => $template_name,
                        'number'     => 1,
                    ) );

                    if ( ! empty( $parent_pages ) ) :
                        $parent_page = $parent_pages[0]; ?>
                        <li><a href="<?php echo esc_url( get_permalink( $parent_page ) ); ?>"><?php echo esc_html( get_the_title( $parent_page ) ); ?></a></li>
                    <?php else :
                        // Fallback: show the CPT label without link
                        $label = ( isset( $post_type_obj->labels->name ) && $post_type_obj->labels->name ) ? $post_type_obj->labels->name : $post_type; ?>
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
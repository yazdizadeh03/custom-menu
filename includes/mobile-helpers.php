<?php
/**
 * Mobile-only render helpers (loaded only by templates/menu-mobile.php).
 * Nothing here is used by, or changes, the desktop menu.
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!function_exists('cmb_m_chevron')) {
    /** Small left-pointing chevron used at the end of every row. */
    function cmb_m_chevron()
    {
        return '<span class="amb-m-item__chev" aria-hidden="true"><svg width="20" height="20"><use href="#icon-left"></use></svg></span>';
    }
}

if (!function_exists('cmb_m_nav_item')) {
    /** Row that opens another panel (no page load). */
    function cmb_m_nav_item($target, $label)
    {
        printf(
            '<li><button type="button" class="amb-m-item" data-amb-target="%1$s"><span class="amb-m-item__label"><span class="amb-m-item__dot" aria-hidden="true"></span>%2$s</span>%3$s</button></li>',
            esc_attr($target),
            esc_html($label),
            cmb_m_chevron()
        );
    }
}

if (!function_exists('cmb_m_link_item')) {
    /** Row that is a normal link. */
    function cmb_m_link_item($href, $label, $blank = false, $modifier = '')
    {
        printf(
            '<li><a class="amb-m-item%1$s" href="%2$s"%3$s><span class="amb-m-item__label"><span class="amb-m-item__dot" aria-hidden="true"></span>%4$s</span>%5$s</a></li>',
            $modifier ? ' ' . esc_attr($modifier) : '',
            esc_url($href),
            $blank ? ' target="_blank" rel="noopener"' : '',
            esc_html($label),
            cmb_m_chevron()
        );
    }
}

if (!function_exists('cmb_m_post_logo')) {
    /** Resolve the small logo of a broker / platform post. */
    function cmb_m_post_logo($post_id)
    {
        $key  = get_post_type($post_id) === 'brokers' ? 'brokers-logosmall' : 'icon-exchange';
        $logo = get_post_meta($post_id, $key, true);

        if (is_numeric($logo)) {
            $logo = wp_get_attachment_image_url((int) $logo, 'thumbnail') ?: wp_get_attachment_image_url((int) $logo, 'full');
        }

        return $logo ? $logo : '';
    }
}

if (!function_exists('cmb_m_logo_list')) {
    /**
     * Render a list of posts (logo + title) from one or more queries.
     * Featured posts come first; duplicates are skipped.
     *
     * @param array[] $queries    List of WP_Query args (use cmb_query_args()).
     * @param string  $title_meta Meta key holding the short title ('' = post title).
     */
    function cmb_m_logo_list(array $queries, $title_meta = '')
    {
        $seen = [];

        foreach ($queries as $args) {
            if ($seen) {
                $args['post__not_in'] = $seen;
            }
            $args['no_found_rows'] = true;

            $query = new WP_Query($args);

            while ($query->have_posts()) :
                $query->the_post();
                $id     = get_the_ID();
                $seen[] = $id;
                $title  = $title_meta ? get_post_meta($id, $title_meta, true) : '';
                if (!$title) {
                    $title = get_the_title();
                }
                $logo = cmb_m_post_logo($id);
                ?>
                <li>
                    <a class="amb-m-item" href="<?php the_permalink(); ?>">
                        <span class="amb-m-item__label">
                            <?php if ($logo) : ?>
                                <span class="amb-m-item__logo"><img src="<?php echo esc_url($logo); ?>" alt="" width="24" height="24" loading="lazy" decoding="async"></span>
                            <?php else : ?>
                                <span class="amb-m-item__dot" aria-hidden="true"></span>
                            <?php endif; ?>
                            <?php echo esc_html($title); ?>
                        </span>
                        <?php echo cmb_m_chevron(); ?>
                    </a>
                </li>
                <?php
            endwhile;

            wp_reset_postdata();
        }
    }
}


if (!function_exists('cmb_m_fa_digits')) {
    /** Convert latin digits to Persian digits. */
    function cmb_m_fa_digits($n)
    {
        return strtr((string) $n, [
            '0'=>'۰','1'=>'۱','2'=>'۲','3'=>'۳','4'=>'۴',
            '5'=>'۵','6'=>'۶','7'=>'۷','8'=>'۸','9'=>'۹',
        ]);
    }
}

if (!function_exists('cmb_m_logo_group')) {
    /**
     * One sub-section: heading + count badge + logo rows.
     * Returns the IDs rendered (to exclude them from the next group).
     */
    function cmb_m_logo_group(array $args, $title_meta, $heading, $unit, array $exclude = [])
    {
        if ($exclude) {
            $args['post__not_in'] = $exclude;
        }
        $args['no_found_rows'] = true;

        $query = new WP_Query($args);
        $ids   = [];

        if (!$query->have_posts()) {
            wp_reset_postdata();
            return $ids;
        }

        printf(
            '<div class="amb-m-sub"><span class="amb-m-sub__title">%1$s</span><span class="amb-m-sub__count">%2$s %3$s</span></div><ul class="amb-m-list">',
            esc_html($heading),
            esc_html(cmb_m_fa_digits($query->post_count)),
            esc_html($unit)
        );

        while ($query->have_posts()) :
            $query->the_post();
            $id    = get_the_ID();
            $ids[] = $id;

            $title = $title_meta ? get_post_meta($id, $title_meta, true) : '';
            if (!$title) {
                $title = get_the_title();
            }
            if (get_post_type($id) === 'brokers') {
                $title = preg_replace('/^\s*بروکر\s+/u', '', $title);
            }

            $logo = cmb_m_post_logo($id);
            ?>
            <li>
                <a class="amb-m-item" href="<?php the_permalink(); ?>">
                    <span class="amb-m-item__label">
                        <?php if ($logo) : ?>
                            <span class="amb-m-item__logo"><img src="<?php echo esc_url($logo); ?>" alt="" width="24" height="24" loading="lazy" decoding="async"></span>
                        <?php else : ?>
                            <span class="amb-m-item__dot" aria-hidden="true"></span>
                        <?php endif; ?>
                        <?php echo esc_html($title); ?>
                    </span>
                    <?php echo cmb_m_chevron(); ?>
                </a>
            </li>
            <?php
        endwhile;

        echo '</ul>';
        wp_reset_postdata();

        return $ids;
    }
}

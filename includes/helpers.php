<?php
if (!defined('ABSPATH')) {
    exit;
}

/**
 * "Verified" badge shown on featured cards.
 *
 * Each call uses a unique clipPath id so the same badge can appear many
 * times on one page without producing duplicate (invalid) HTML ids.
 *
 * @return string SVG markup.
 */

function cmb_render_card_grid(array $query_args, array $opts = [])
{
    $opts = wp_parse_args($opts, [
        'show_tick'   => false,
        'title_class' => '',
        'title_meta'  => 'title',
    ]);

    $query = new WP_Query($query_args);

    if (!$query->have_posts()) {
        wp_reset_postdata();
        return;
    }

    while ($query->have_posts()) :
        $query->the_post();
        if (get_post_type() === 'brokers') {
        
            $logo = get_post_meta(get_the_ID(), 'brokers-logosmall', true);
        
            if (is_numeric($logo)) {
                $image = wp_get_attachment_image_url((int) $logo, 'full');
            } else {
                $image = $logo;
            }
        
        } else {
            $logo = get_post_meta(get_the_ID(), 'icon-exchange', true);
        
            if (is_numeric($logo)) {
                $image = wp_get_attachment_image_url((int) $logo, 'full');
            } else {
                $image = $logo;
            }
        }
        $title = get_post_meta(get_the_ID(), $opts['title_meta'], true);
        ?>
        <a class="cart-item" href="<?php the_permalink(); ?>">
            <div class="image-logo-sec">
                <img src="<?php echo esc_url($image); ?>" alt="<?php the_title_attribute(); ?>">
            </div>
            <p<?php echo $opts['title_class'] ? ' class="' . esc_attr($opts['title_class']) . '"' : ''; ?>><?php echo esc_html($title); ?></p>
        </a>
        <?php
    endwhile;

    wp_reset_postdata();
}

function cmb_render_content_cards(array $query_args, array $opts = [])
{
    $opts = wp_parse_args($opts, [
        'title_meta' => '',
        'item_class' => 'content-cart',
        'link_class' => 'contentcart-link',
        'svg_size'   => 14,
    ]);

    $query = new WP_Query($query_args);

    if (!$query->have_posts()) {
        wp_reset_postdata();
        return;
    }

    while ($query->have_posts()) :
        $query->the_post();
        $title = $opts['title_meta'] ? get_post_meta(get_the_ID(), $opts['title_meta'], true) : get_the_title();
        ?>
        <a class="cart-item <?php echo esc_attr($opts['item_class']);?> <?php echo esc_attr($opts['link_class']); ?>" href="<?php the_permalink(); ?>" target="_blank">
            <p><?php echo esc_html($title); ?></p>
        </a>
        <?php
    endwhile;

    wp_reset_postdata();
}

function cmb_query_args($post_type, $count, array $tax = [], array $extra = [])
{
    $args = [
        'post_type'      => $post_type,
        'posts_per_page' => $count,
        'post_status'    => 'publish',
        'ignore_sticky_posts' => true,
    ];

    if (count($tax) === 2) {
        $args['tax_query'] = [[
            'taxonomy' => $tax[0],
            'field'    => 'slug',
            'terms'    => $tax[1],
        ]];
    }

    return array_merge($args, $extra);
}

function cmb_render_post_links($post_type, $count = 5, array $extra = [])
{
    $query_args = cmb_query_args(
        $post_type,
        $count,
        [],
        array_merge([
            'orderby' => 'date',
            'order'   => 'DESC',
        ], $extra)
    );

    $query = new WP_Query($query_args);

    if (!$query->have_posts()) {
        wp_reset_postdata();
        return;
    }

    while ($query->have_posts()) :
        $query->the_post();
        ?>
        <a class="cart-item-link" href="<?php the_permalink(); ?>" target="_blank">
            <?php the_title(); ?>
        </a>
        <?php
    endwhile;

    wp_reset_postdata();
}

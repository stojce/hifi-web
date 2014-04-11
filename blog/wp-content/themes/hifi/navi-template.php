
<nav class="wp-prev-next">
    <?php if (get_query_var('paged') < $wp_query->max_num_pages && $wp_query->max_num_pages > 1) { ?>
        <span>&laquo; <?php next_posts_link('Older posts') ?></span>
    <?php } ?>
    <?php if (get_query_var('paged') > 1) { ?>
        <span><?php previous_posts_link('Newer posts '); ?> &raquo;</span>
    <?php } ?>
</nav>
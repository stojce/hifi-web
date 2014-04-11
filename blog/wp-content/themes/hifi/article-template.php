
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
    <header>
        <a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>">
            <?php the_post_thumbnail( 'wpbs-featured' ); ?>
        </a>
        <div class="page-header">
            <h1 class="h2">
                <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            </h1>
        </div>
    </header> <!-- end article header -->

    <section class="post_content clearfix <?php if (is_single()) echo 'single';?>">

        <p class="meta">
            <span class="author-icon author_<?php the_author_meta('nickname'); ?>"> </span>
            by <?php the_author_posts_link(); ?>
            on <time datetime="<?php echo the_time('Y-m-j'); ?>" pubdate><?php the_date('l, F j, Y'); ?></time>
            /
            <?php
            $comments_count = get_comments_number();
            $comments = 'No comments';
            if (comments_open()) {

                if ($comments_count == 1) {
                    $comments = '1 comment';
                } else if ($comments_count> 0) {
                    $comments = $comments_count . ' comments';
                }
            }
            echo "<a class='meta-comments-link' href='", get_comments_link(), "'>", $comments, "</a>";

            ?>
        </p>

        <p class="content-divider"></p>
        <?php the_content(); ?>
        <div class="content-divider"></div>
        <footer>
            <div class="post-footer-links">
                <?php echo "<a class='post-footer-comments' href='", get_comments_link(), "'>", $comments, "</a>"; ?>
                <a class="post-footer-tweet" target="_blank"
                   href="https://twitter.com/intent/tweet?text=<?php the_title_attribute(); ?>&url=<?php the_permalink(); ?>"
                   title="Share it on Twitter" target="_blank">
                    <i class="icon-twitter"></i>Tweet
                </a>
            </div>

            <?php
            if (is_single()) {
                comments_template('',true);
            }
            ?>

            <p class="content-divider"></p>

            <?php the_author_image(); ?>

            <div class="author-details author-bio">
                <h4>Author</h4>
                <div class="author-name"><?php echo get_the_author_meta('display_name'); ?></div>
                <?php echo get_the_author_meta('description'); ?>
            </div>

            <div class="author-details author-bio">
                <h4>More by <?php echo get_the_author_meta('first_name');?></h4>
                <?php echo get_related_author_posts();?>
            </div>

        </footer>
    </section> <!-- end article section -->

</article> <!-- end article -->
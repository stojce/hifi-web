<footer class="related-articles">
    <p class='footer-title'>Peruse some other posts:</p>

    <?php foreach ($posts as $post): ?>

        <article>
            <div class="vertical-fading"></div>
            <header>
                <a class="article-link" href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
                    <span class="artile-meta">
                        by <span class="author-name"><?php echo get_the_author_meta('display_name', $post->post_author); ?></span>
                    </span>
            </header>
            <section>
                <?php echo $post->post_content; ?>
            </section>
        </article>

    <?php endforeach; ?>

</footer>

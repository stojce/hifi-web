<?php get_header(); ?>

<div id="content" class="clearfix row-fluid">

    <div id="main" class="clearfix" role="main">

        <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    include 'article-template.php';
                }

                include "navi-template.php";

             } else { ?>

            <article id="post-not-found">
                <header>
                    <h1><?php _e("Not Found", "bonestheme"); ?></h1>
                </header>
                <section class="post_content">
                    <p><?php _e("Sorry, but the requested resource was not found on this site.", "bonestheme"); ?></p>
                </section>
                <footer>
                </footer>
            </article>

        <?php } ?>
    </div> <!-- end #main -->

    <?php
        $posts = get_random_posts(2);
        include 'related-articles.php';
    ?>

    <?php get_sidebar(); // sidebar 1 ?>

</div> <!-- end #content -->

<?php get_footer(); ?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix row-fluid">
			
				<div id="main" class="clearfix" role="main">
				
					<div class="page-header"><h1 class="archive_title h2">
						<span><?php _e("Posts by:", "bonestheme"); ?></span>
						<?php 
							// If google profile field is filled out on author profile, link the author's page to their google+ profile page
							$curauth = (get_query_var('author_name')) ? get_user_by('slug', get_query_var('author_name')) : get_userdata(get_query_var('author'));
							$google_profile = get_the_author_meta( 'google_profile', $curauth->ID );
							if ( $google_profile ) {
								echo '<a href="' . esc_url( $google_profile ) . '" rel="me">' . $curauth->display_name . '</a>'; 
						?>
						<?php 
							} else {
								echo get_the_author_meta('display_name', $curauth->ID);
							}
						?>
					</h1></div>


                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            include 'article-template.php';
                        }

                        include "navi-template.php";
                    }
                    ?>
			
				</div> <!-- end #main -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>
<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package construction
 */

get_header();
?>
<div class="ak-container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php
            while ( have_posts() ) : the_post();?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <div class="entry-content">
                        <?php
                        if ( is_single() ) :
                            the_content();
                        else:
                            echo apply_filters('the_content' , wp_kses_post(wp_trim_words(get_the_content(),70,'...')));
                            ?>
                            <?php
                        endif;
                        ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->
            <?php
            endwhile; // End of the loop.
            ?>

        </main><!-- #main -->
    </div><!-- #primary -->


</div> 
<?php
get_footer();
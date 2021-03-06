<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package construction
 */

get_header(); 
do_action('construction_header_banner');?>
<div class="ak-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <section class="error-404 not-found">            
                <div class="page-content">
                    <div class="error-404-img"></div>
                    
                    <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'construction' ); ?></p>
                    
                    <div class="404_search">
                        <?php echo get_search_form(); ?>
                    </div>
                
                </div><!-- .page-content -->
            </section><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->
    <?php get_sidebar(); ?>
</div>
<?php
get_footer();

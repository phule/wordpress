<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package construction
 */

get_header();
$construction_feature_category = get_theme_mod('construction_feature_cat');
$construction_feature_cats = get_the_category( get_the_ID() );
foreach($construction_feature_cats as $construction_feature_cat){
    $construction_feature_class = '';
    if($construction_feature_category == $construction_feature_cat->slug){
        $construction_feature_class = 'feature-cat-post';
    }
}
do_action('construction_header_banner');?>
    <div class="ak-container">
    	<div id="primary" class="content-area <?php echo esc_attr($construction_feature_class); ?>">
    		<main id="main" class="site-main" role="main">
    
    		<?php
    		while ( have_posts() ) : the_post();
    
    			get_template_part( 'template-parts/content', get_post_format() );
    
    			the_post_navigation();
    
    			// If comments are open or we have at least one comment, load up the comment template.
    			if ( comments_open() || get_comments_number() ) :
    				comments_template();
    			endif;
    
    		endwhile; // End of the loop.
    		?>
    
    		</main><!-- #main -->
    	</div><!-- #primary -->
    
<?php
get_sidebar();
?> </div> <?php
get_footer();

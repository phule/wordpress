<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package construction
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
        $construction_post_image = wp_get_attachment_image_src(get_post_thumbnail_id(),'construction-single-page');
        if($construction_post_image){
            ?><img src="<?php echo esc_url($construction_post_image[0]) ?>" alt="<?php the_title_attribute()?>" title="<?php the_title_attribute()?>" /><?php
        }
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<div class="comment-author-date">
                <span class="post-author"><?php  echo esc_url(the_author_posts_link()); ?> </span>
                
                <span class="post-date"><i class="fa fa-clock-o" aria-hidden="true"></i><?php echo esc_attr(get_the_date('d M Y')); ?></span>
                
                <span class="post-comment"><a href="<?php comments_link(); ?>"><i class="fa fa-comment-o" aria-hidden="true"></i><?php echo get_comments_number(); _e(' comment','construction'); ?></a></span>
            </div>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
        if ( is_single() ) :
			the_content();
        else:
            echo apply_filters('the_content' , wp_kses_post(wp_trim_words(get_the_content(),70,'...')));
            ?>
                <a class="read-more" href="<?php the_permalink() ?>"><?php _e('Read More','construction'); ?><i class="fa fa-angle-right " aria-hidden="true"></i></a>
            <?php
        endif;
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'construction' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->

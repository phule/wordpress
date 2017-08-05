<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package construction
 */

get_header(); ?>
<div id="content" class="site-content">
    <section id="siteBody" class="site-body">
        <?php
        if(is_home()):
        ?>
        <section id="banner" class="banner"></section>
        <div id="bannerBG" class="banner-bg" data-src="<?php echo get_stylesheet_directory_uri(); ?>">
            <video loop muted autoplay poster="<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/banner/Hong_Kong.jpg">
                <source src="<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/banner/Hong_Kong.mp4" type="video/mp4">
            </video>
        </div>
        
        <section id="aboutSection" class="about">
            <div class="t-container">
                <h4>ABOUT US</h4>
                <div class="h2">We’ve been around since 2014.<br />We are a global team of passionate consultants and developers<br />who deliver result driven digital solutions.</div>
                <div class="socials-section">
                    <ul class="t-nav socials-nav">
                        <li class="facebook"><a target="_blank" title="FACEBOOK" href="#">FACEBOOK</a></li>
                        <li class="twitter"><a target="_blank" title="TWITTER" href="#">TWITTER</a></li>
                        <li class="google-plus"><a target="_blank" title="GOOGLE +" href="#">GOOGLE +</a></li>
                        <li class="youtube"><a target="_blank" title="YOUTUBE" href="#">YOUTUBE</a></li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="partnerSection" class="partner">
            <div class="t-container">
                <H4>WE WORK WITH</H4>
                <div id="partnerOwl" class="owl-carousel owl-theme">
                    <div class="item"><a title="" href="#" target="_blank" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/ogre.png);"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/ogre.png" /></a></div>
                    <div class="item"><a title="" href="#" target="_blank" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/unreal.png);"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/unreal.png" /></a></div>
                    <div class="item"><a title="" href="#" target="_blank" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/starling.png);"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/starling.png" /></a></div>
                    <div class="item"><a title="" href="#" target="_blank" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/unity.png);"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/unity.png" /></a></div>
                    <div class="item"><a title="" href="#" target="_blank" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/html5.png);"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/html5.png" /></a></div>
                    <div class="item"><a title="" href="#" target="_blank" style="background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/cocos20x.png);"><img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/content/images/upload/partners/cocos20x.png" /></a></div>
                </div>
            </div>
        </section>

        <section id="missionSection" class="mission">
            <div class="t-container">
                <div class="h2">Our mission is to deliver amazing results by<br />unlocking opportunities for our clients and our employees<br />simultaneously</div>
            </div>
        </section>
        <section id="contactSection" class="contact">
            <?php
            echo do_shortcode(apply_filters("the_content", "[contact-form-7 id='4' title='Contact form']"));
            ?>
        </section>
        <?php
        else :?>
        <section id="gamesSection" class="games">
            <div class="t-container">
                <div class="ak-container">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main" role="main">

                        <?php
                        if ( have_posts() ) :

                            if ( is_home() && ! is_front_page() ) : ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>

                            <?php
                            endif;

                            /* Start the Loop */
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the Post-Format-specific template for the content.
                                 * If you want to override this in a child theme, then include a file
                                 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                 */
                                get_template_part( 'template-parts/content', get_post_format() );

                            endwhile;

                            the_posts_pagination();

                        else :

                            get_template_part( 'template-parts/content', 'none' );

                        endif; ?>

                        </main><!-- #main -->
                    </div><!-- #primary -->
                </div>
            </div>
        </section>
        <?php
        endif ;?>
        	
    </section>
<?php
//get_sidebar();
get_footer();

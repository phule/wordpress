<?php
$construction_facebook_link = get_theme_mod('construction_facebook_link');
$construction_twitter_link = get_theme_mod('construction_twitter_link');
$construction_youtube_link = get_theme_mod('construction_youtube_link');
$construction_instagram_link = get_theme_mod('construction_instagram_link');
$construction_googleplus_link = get_theme_mod('construction_googleplus_link');
$construction_footer_text = get_theme_mod('construction_footer_text');
?>
    <div id="siteFooter" class="site-footer">
        <?php 
        if(is_home()):
            echo do_shortcode(apply_filters("the_content", "[show_menu menu='footer-menu']"));
        endif;
        ?>
        <?php if(is_active_sidebar('construction-footer-1') || is_active_sidebar('construction-footer-2') || is_active_sidebar('construction-footer-3')){ ?>
        <div class="bottom-footer wow fadeInUp">
            <div class="ak-container">
                <div class="bottom-footer-wrapper clearfix">
                    <?php if(is_active_sidebar('construction-footer-1')){
                        ?>
                            <div class="footer-1">
                                <?php dynamic_sidebar('construction-footer-1'); ?>
                            </div>
                        <?php
                    } ?>
                    <?php if(is_active_sidebar('construction-footer-2')){
                        ?>
                            <div class="footer-2">
                                <?php dynamic_sidebar('construction-footer-2'); ?>
                            </div>
                        <?php
                    } ?>
                    <?php if(is_active_sidebar('construction-footer-3')){
                        ?>
                            <div class="footer-3">
                                <?php dynamic_sidebar('construction-footer-3'); ?>
                            </div>
                        <?php
                    } ?>
                </div>
            </div>
        </div>
        <?php } ?>
        <footer>
            <div class="t-container">
                <a class="logo" title="" href="./">
                    <img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/content/images/ui/master/footer/logo.png" class="img-normal" />
                    <img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/content/images/ui/master/footer/logo@3x.png" class="img-retina" />
                </a>
                <nav>
                    <ul class="t-nav policy-nav">
                        <li class="copy"><?php if(isset($construction_footer_text)) { echo $construction_footer_text;}?></li>
                        <li class="privacy"><a title="" href="">Privacy</a></li>
                        <li class="legal"><a title="" href="">Legal</a></li>
                    </ul>
                    <ul class="t-nav socials-nav">
                        <li class="facebook"><a target="_blank" title="Facebook" href="<?php if(isset($construction_facebook_link)) { echo $construction_facebook_link;}?>"></a></li>
                        <li class="twitter"><a target="_blank" title="Twitter" href="<?php if(isset($construction_twitter_link)) { echo $construction_twitter_link;}?>"></a></li>
                        <li class="instagram"><a target="_blank" title="Instagram" href="<?php if(isset($construction_instagram_link)) { echo $construction_instagram_link;}?>"></a></li>
                        <li class="youtube"><a target="_blank" title="Youtube" href="<?php if(isset($construction_youtube_link)) { echo $construction_youtube_link;}?>"></a></li>
                        <li class="google-plus"><a target="_blank" title="google +" href="<?php if(isset($construction_googleplus_link)) { echo $construction_googleplus_link;}?>"></a></li>
                    </ul>
                </nav>
            </div>
        </footer>
    </div>
</div>

<div id="lightbox" class="lightbox"></div>
<div id="loading" class="loading">
    <div class="loader">Loading...</div>
</div>
<!--<script src='https://www.google.com/recaptcha/api.js'></script>-->
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
<?php wp_footer(); ?>
</body>
</html>


    <div id="siteFooter" class="site-footer">
        <header>
            <div class="t-container">
                <ul class="t-nav">
                    <li class="products">
                        <dl>
                            <dt>Products</dt>
                            <dd class="games"><a title="Games" href="#">Games</a></dd>
                            <dd class="teoEngine"><a title="TeoEngine" href="#">TeoEngine</a></dd>
                        </dl>
                    </li>
                    <li id="developerSection" class="developers">
                        <dl>
                            <dt>Developers</dt>
                            <dd class="developer-center"><a title="Developer Center" href="#">Developer Center</a></dd>
                            <dd class="docs"><a title="Docs" href="#">Docs</a></dd>
                            <dd class="download"><a title="Download" href="#">Download</a></dd>
                            <dd class="tools"><a title="Tools" href="#">Tools</a></dd>
                        </dl>
                    </li>
                    <li class="team">
                        <dl>
                            <dt>Team</dt>
                            <dd class="blog"><a title="Blog" href="#">Blog</a></dd>
                            <dd class="careers"><a title="Careers" href="#">Careers</a></dd>
                            <dd class="news"><a title="News" href="#">News</a></dd>
                            <dd class="research"><a title="Research" href="#">Research</a></dd>
                        </dl>
                    </li>
                    <li id="communitySection" class="community">
                        <dl>
                            <dt>Community</dt>
                            <dd class="support"><a title="Support" href="#">Support</a></dd>
                            <dd class="forums"><a title="Forums" href="#">Forums</a></dd>
                            <dd class="order-history"><a title="Order History" href="#">Order History</a></dd>
                        </dl>
                    </li>
                </ul>
            </div>
        </header>
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
                        <li class="copy">@copy 2016 teointeractive</li>
                        <li class="privacy"><a title="" href="">Privacy</a></li>
                        <li class="legal"><a title="" href="">Legal</a></li>
                    </ul>
                    <ul class="t-nav socials-nav">
                        <li class="facebook"><a target="_blank" title="Facebook" href="#"></a></li>
                        <li class="twitter"><a target="_blank" title="Twitter" href="#"></a></li>
                        <li class="instagram"><a target="_blank" title="Instagram" href="#"></a></li>
                        <li class="youtube"><a target="_blank" title="Youtube" href="#"></a></li>
                        <li class="google-plus"><a target="_blank" title="google +" href="#"></a></li>
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

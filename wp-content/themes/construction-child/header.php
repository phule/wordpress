<?php
$construction_post_lists = get_posts(array('posts_per_page' => -1));
/**
 * The header for our theme.
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package construction
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title>TEOINTERACTIVE</title>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />-->
<meta http-equiv="x-ua-compatible" content="IE=edge">
<meta name="viewport" content="user-scalable=no, width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="author" content="" />
<meta name="description" content="2" />
<meta name="keywords" content="3" />
<!-- http://www.favicon-generator.org/ -->
<link rel="apple-touch-icon" sizes="57x57" href="<?php echo get_template_directory_uri();?>/content/favicon/apple-icon-57x57.png?v7" />
<link rel="apple-touch-icon" sizes="60x60" href="<?php echo get_template_directory_uri();?>/content/favicon/apple-icon-60x60.png?v7" />
<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_template_directory_uri();?>/content/favicon/apple-icon-72x72.png?v7" />
<link rel="apple-touch-icon" sizes="76x76" href="<?php echo get_template_directory_uri();?>/content/favicon/apple-icon-76x76.png?v7" />
<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_template_directory_uri();?>/content/favicon/apple-icon-114x114.png?v7" />
<link rel="apple-touch-icon" sizes="120x120" href="<?php echo get_template_directory_uri();?>/content/favicon/apple-icon-120x120.png?v7" />
<link rel="apple-touch-icon" sizes="144x144" href="<?php echo get_template_directory_uri();?>/content/favicon/apple-icon-144x144.png?v7" />
<link rel="apple-touch-icon" sizes="152x152" href="<?php echo get_template_directory_uri();?>/content/favicon/apple-icon-152x152.png?v7" />
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri();?>/content/favicon/apple-icon-180x180.png?v7" />
<link rel="icon" type="image/png" sizes="192x192" href="<?php echo get_template_directory_uri();?>/content/favicon/android-icon-192x192.png?v7" />
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri();?>/content/favicon/favicon-32x32.png?v7" />
<link rel="icon" type="image/png" sizes="96x96" href="<?php echo get_template_directory_uri();?>/content/favicon/favicon-96x96.png?v7" />
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri();?>/content/favicon/favicon-16x16.png?v7" />
<link rel="manifest" href="<?php echo get_template_directory_uri();?>/content/favicon/manifest.json" />
<meta name="msapplication-TileColor" content="transparent" />
<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri();?>/content/favicon/ms-icon-144x144.png?v7" />
<meta name="theme-color" content="transparent" />
<meta name="msapplication-config" content="<?php echo get_template_directory_uri();?>/content/favicon/browserconfig.xml" />

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,300italic,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,900italic,900,700italic,700,400italic,300italic,300,100italic,100' rel='stylesheet' type='text/css'>
<?php wp_head(); ?>
</head>
<body>
    <input type="hidden" id="ajax-url" url="<?php echo admin_url('admin-ajax.php'); ?>" />
    <div id="sidebar" class="sidebar">
        <?php wp_nav_menu(
            array(
                "items_wrap" => '<dl id="%1$s" class="%2$s"><dt><a class="logo" title="" href="/"></a></dt>%3$s</dl>',
                "container"         => "nav",
                "container_class"   => "container",
                "container_id"      => "nav",
                "fallback_cb"       => false,
                "menu_class"        => "t-nav main-nav",
                "theme_location"    => "primary",
                "walker"            => new Customer_Walker_Nav_Menu(),
            )
        );?>
        <!--<nav>
            <dl>
                <dt><a class="logo" title="" href="./"></a></dt>
                <dd id="sAbout"><a title="ABOUT" href="index.html#aboutSection"><span class="icon-nav icon-upcoming"></span>ABOUT</a></dd>
                <dd id="sGame"><a title="GAMES" href="games.html"><span class="icon-nav icon-reminder"></span>GAMES</a></dd>
                <dd id="sTeoengine"><a title="TEOENGINE" href="index.html#developerSection"><span class="icon-nav icon-contacts"></span>TEOENGINE</a></dd>
                <dd id="sCommunity"><a title="COMMUNITY" href="index.html#communitySection">COMMUNITY</a></dd>
                <dd id="sContact"><a title="CONTACT" href="index.html#contactSection"><span class="icon-nav icon-settings"></span>CONTACT</a></dd>
                <dd id=""><a title="SIGN IN" href="#">SIGN IN</a></dd>
            </dl>
        </nav>-->
    </div>

    <div class="site-page home-page">
        <header id="siteHeader" class="site-header">
            <section class="fixed">
                <div class="t-container">
                    <button id="hambeger" type="button" class="hambeger">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="logo" title="" href="./"></a>
                    <?php wp_nav_menu( array( "container" => "",'theme_location' => 'primary','menu_class'=>"t-nav main-nav", 'menu_id' => 'primary-menu' ) ); ?>
                    <!--<ul class="t-nav main-nav">
                        <li id="navAbout" class="about"><a title="ABOUT" href="index.html#aboutSection">ABOUT</a></li>
                        <li id="navGames" class="games"><a title="GAMES" href="games.html">GAMES</a></li>
                        <li id="navTeoengine" class="teoengine"><a title="TEOENGINE" href="index.html#developerSection">TEOENGINE</a></li>
                        <li id="navCommunity" class="community"><a title="COMMUNITY" href="index.html#communitySection">COMMUNITY</a></li>
                        <li id="navContact" class="contact"><a title="CONTACT" href="index.html#contactSection">CONTACT</a></li>
                        <li id="navSignIn" class="sign-in"><a title="SIGN IN" href="#">SIGN IN</a></li>
                    </ul>-->
                </div>
            </section>
        </header>

        

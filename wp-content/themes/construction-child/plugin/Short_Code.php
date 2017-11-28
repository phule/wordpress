<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function get_list_by_category($args) {
	//$args = array('category' => 'value1', 'number' => 'value2')
    $menu = wp_get_nav_menu_object($args['menu']);
    $menu_items = wp_get_nav_menu_items($menu->term_id);
    $keyVal = 0;
    $keyTitle = "";
    $arr = array();
    
    $return = '<header><div class="t-container"><ul class="t-nav">';
    if(is_array($menu_items)){
        foreach($menu_items as $key => $value){
            if($value->menu_item_parent == 0){
                $keyVal = $value->ID;
                $keyTitle = $value->title;
            }
            if($keyVal == $value->menu_item_parent){
                $arr[$keyTitle][] =  $value;
            }
        }
        
        foreach($arr as $key=>$val){
            $name_parent = strtolower($key);
            $return .= '<li id="'.$name_parent.'Section" class="'.$key.'"><dl><dt>'.$key.'</dt>';
            $url = !empty($item->url) ? $item->url : "#";
            foreach($val as $item){
                $return .= '<dd class="'.$item->title.'"><a title="'.$item->title.'" href="'.$url.'">'.$item->title.'</a></dd>';
            }
            $return .=' </dl></li>';
        }
    }
    $return .= '</ul></div></header>';

    // return the result
    return $return;
}
add_shortcode('show_menu', 'get_list_by_category');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function get_our_games($args) {
    $custom_qs = new WP_Query(array(
        'post_type' => 'game',
        'nopaging'               => false,
        'posts_per_page'         => '4',
        'order'                  => 'ASC',
        'orderby'                => 'name',
        'meta_key'	=> 'show_home_page',
        'meta_value'=>'1'
        
        ));
    if ($custom_qs->have_posts()) {?>
    <section id="gamesSection" class="games">
        <div class="t-container">
            <h4>OUR GAMES</h4>
            <ul class="list">
        <?php
        while ($custom_qs->have_posts()) {
            $custom_qs->the_post();
            $fields = get_field_objects();
            if( $fields ){?>
                <li>
                <?php
                $image = $release = "";
                $platform=[];
                foreach( $fields as $field_name => $field ){
                    if($field_name=="image"){
                        $image = $field['value'];
                    }
                    if($field_name == "name"){
                        $name = $field['value'];
                    }
                    if($field_name == "category_game"){
                        $category_game = $field['value'];
                    }
                    
                    if($field_name == "genre"){
                        $genre = $field['value'];
                    }
                    if($field_name == "release_"){
                        $date = strtotime($field['value']);
                        $release = date('d-m-Y', $date);
                    }
                    if($field_name == "platform"){
                        $platform = $field['value'];
                    }
                }?>
                <span class="frame" style="background-image: url(<?php echo $image;?>);">
                    <a title="" href="<?php the_permalink(); ?>">
                        <img alt="<?php echo $name;?>" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/games/default.png" />
                    </a>
                </span>
                    <h5><a title="" href="<?php the_permalink(); ?>"><?php echo $name;?></a></h5>
                    <dl class="platform">
                        <dt>Platform :</dt>
                        <?php
                        foreach($platform as $key=>$val){
                            if($val == "ios"){
                        ?>
                        <dd class="ios">
                            <img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/ios.png" />
                            <img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/ios@3x.png" />
                        </dd>
                            <?php
                            }elseif($val == "window"){
                            ?>
                        <dd class="win">
                            <img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/win.png" />
                            <img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/win@3x.png" />
                        </dd>
                            <?php
                            }elseif($val == "android"){
                            ?>
                        <dd class="android">
                            <img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/android.png" />
                            <img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/android@3x.png" />
                        </dd>
                        <?php
                            }elseif($val == "blackberry"){
                            ?>
                        <dd class="blackberry">
                            <img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/blackberry.png" />
                            <img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/blackberry@3x.png" />
                        </dd>
                        <?php
                            }elseif($val == "xbox"){
                            ?>
                        <dd class="blackberry">
                            <img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/xbox.png" />
                            <img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/xbox.png" />
                        </dd>
                        <?php
                            }elseif($val == "playstation"){
                            ?>
                        <dd class="blackberry">
                            <img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/playstation.png" />
                            <img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/playstation.png" />
                        </dd>
                        <?php
                            }
                        }?>
                    </dl>
                    <?php
                    if(!empty($release)){
                    ?>
                    <dl class="release">
                        <dt>Release :</dt>
                        <dd><?php echo $release;?></dd>  
                    </dl>
                    <?php
                    }?>
                </li>
                
            <?php
            }
        }?>
                <li class="clear four"></li>
            </ul>
        </div>
    </section>
    <?php
    }
    wp_reset_postdata();
}
    
add_shortcode('get_our_games', 'get_our_games');

function getYouTubeId($url) {
    if (!(strpos($url, 'v=') !== false)) return false;
    $parse = explode('v=', $url);
    $code = $parse[1];
    if (strlen($code) < 11) return false;
    $code = substr($code, 0, 11);
    return $code;
}
function get_list_media($args) {
	//$args = array('category' => 'value1', 'number' => 'value2')
    // parent loop
    $arr = [];
    if( have_rows('media_video') ){
        while( have_rows('media_video') ){
            the_row();
            $image_title = get_sub_field('title');
            $image_path = get_sub_field('video_path');
            if(!empty($image_path)){
                $youtube_id = getYouTubeId($image_path); 
                if(!empty($youtube_id)){
                    $tmp = [];
                    $tmp['type'] = 'video';
                    $tmp['path'] = 'http://img.youtube.com/vi/'.$youtube_id.'/mqdefault.jpg';
                    $arr[] = $tmp;
                }
            }
        }

    }
    if( have_rows('media_image') ){
        while( have_rows('media_image') ){
            the_row();
            $image_title = get_sub_field('title');
            $image_path = get_sub_field('image_path');
            if(!empty($image_path)){
                $tmp = [];
                $tmp['type'] = 'photo';
                $tmp['path'] = $image_path['url'];
                $arr[] = $tmp;
            }
            
        }

    }
    
    $return = '<section id="mediaSection" class="media">';
    $return .= '<div class="t-container">';
    $return .= '<h4>MEDIA</h4>';
    $return .= '<ul class="list">';
    $image_default = get_template_directory_uri()."/content/images/ui/pages/games/default.png";
    foreach($arr as $key=>$item){
        $return .='<li data-index="'.$key.'" class="'.$item['type'].'">'
            . '<span class="frame" style="background-image: url('.$item['path'].');">'
            . '<a title="" href="#"><img alt="" src="'.$image_default.'" /></a>'
            . '</span></li>';
    }
    $return .= '</ul>';
    $return .= '</div>';
	$return .= '</section>';
    $return .= '</section>';
    return $return;
}
add_shortcode('get_list_media', 'get_list_media');

function get_footer_media($args) {
	//$args = array('category' => 'value1', 'number' => 'value2')
    // parent loop
    $construction_facebook_link = get_theme_mod('construction_facebook_link');
    $construction_twitter_link = get_theme_mod('construction_twitter_link');
    $construction_youtube_link = get_theme_mod('construction_youtube_link');
    $construction_instagram_link = get_theme_mod('construction_instagram_link');
    $construction_googleplus_link = get_theme_mod('construction_googleplus_link');
    $construction_footer_text = get_theme_mod('construction_footer_text');
    $arr = [];
    if( have_rows('media_video') ){
        while( have_rows('media_video') ){
            the_row();
            $image_title = get_sub_field('title');
            $image_path = get_sub_field('video_path');
            if(!empty($image_path)){
                $youtube_id = getYouTubeId($image_path); 
                if(!empty($youtube_id)){
                    $tmp = [];
                    $tmp['type'] = 'video';
                    $tmp['path'] = 'http://img.youtube.com/vi/'.$youtube_id.'/mqdefault.jpg';
                    $tmp['video'] = $image_path;
                    $arr[] = $tmp;
                }
            }
        }

    }
    if( have_rows('media_image') ){
        while( have_rows('media_image') ){
            the_row();
            $image_title = get_sub_field('title');
            $image_path = get_sub_field('image_path');
            if(!empty($image_path)){
                $tmp = [];
                $tmp['type'] = 'photo';
                $tmp['path'] = $image_path['url'];
                $arr[] = $tmp;
            }
            
        }

    }
    $image_default = get_template_directory_uri()."/content/images/ui/pages/games/default.png";
    $return='<div id="mediaShadowbox" class="shadowbox">';
    $return.='<section>';
    $return.='<div class="sliders">';
    $return.='<button class="close"></button>';
    $return.='<div class="default">';
    $return.='<img id="shadowboxDefault" alt="" src="'.$arr[0]['path'].'" />';
    $return.='</div>';
    $return.='<div id="shadowboxOwl" class="owl-carousel owl-theme">';
    foreach($arr as $item){
        if($item['type']=='photo'){
            $return.='<div class="item"><a href="#" style="background-image: url('.$item['path'].');"><img alt="" src="'.$image_default.'" /></a></div>';
        }
        if($item['type']=='video'){
            $return.='<div class="item-video"><a class="owl-video" href="'.$item['video'].'"></a></div>';
        }
    }
    $return.='</div>';
    $return.='</div>';
    $return.='<ul class="t-nav socials-nav">';
    $return.='<li class="facebook"><a target="_blank" title="Facebook" href="'.$construction_facebook_link.'"></a></li>';
    $return.='<li class="twitter"><a target="_blank" title="Twitter" href="'.$construction_twitter_link.'"></a></li>';
    $return.='<li class="instagram"><a target="_blank" title="Instagram" href="'.$construction_instagram_link.'"></a></li>';
    $return.='<li class="youtube"><a target="_blank" title="Youtube" href="'.$construction_youtube_link.'"></a></li>';
    $return.='<li class="google-plus"><a target="_blank" title="google +" href="'.$construction_googleplus_link.'"></a></li>';
    $return.='</ul>';
    $return.='</section>';
    $return.='</div>';
    return $return;
}
add_shortcode('get_footer_media', 'get_footer_media');
?>

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
        'order'                  => 'DESC',
        'orderby'                => 'ID',));
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
                <span class="frame"><a title="" href="details.html"><img alt="<?php echo $name;?>" src="<?php echo $image;?>" /></a></span>
                    <h5><a title="" href="details.html"><?php echo $name;?></a></h5>
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
?>

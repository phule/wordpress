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
            $return .= '<li class="'.$key.'"><dl><dt>'.$key.'</dt>';
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

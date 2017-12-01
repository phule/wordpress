<?php
/* Template Name: Games page */ 

get_header();
?>
<?php
$temp = $wp_query; 
$wp_query = null; 
$wp_query = new WP_Query(); 
$wp_query->query(['showposts'=>10,
    'post_type'=>'game',
    'order'=> 'ASC',
    'orderby'=> 'name',
    'paged'=>$paged]); 
$count_results = $wp_query->post_count?>
<section class="games">
    <div class="t-container">
        <h4>GAMES</h4>

        <ul class="search">
            <li class="category"><input type="text" placeholder="Category : All" class="input" /></li>
            <li class="platform"><input type="text" placeholder="Platform : All" class="input" /></li>
            <li class="genre"><input type="text" placeholder="Genre : All" class="input" /></li>
            <li class="keyword"><input type="text" placeholder="Keyword" class="input" /></li>
        </ul>

        <ul class="sort">
            <li class="result">Result: <?php echo $count_results; ?></li>
            <li class="by">Sort by: <a title="" href="#">Name</a> | <a title="" href="#">A-Z</a></li>
        </ul>

        <ul class="list">
<?php
while ($wp_query->have_posts()) { 
    $wp_query->the_post();
    $fields = get_field_objects();
    
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
        if($field_name == "platform_adroid"){
            $platform = $field['value'];
        }
        if($field_name == "platform_black_berry"){
            $platform = $field['value'];
        }
        if($field_name == "platform_play_station"){
            $platform = $field['value'];
        }
        if($field_name == "platform_ios"){
            $platform = $field['value'];
        }
        if($field_name == "platform_window"){
            $platform = $field['value'];
        }
        if($field_name == "platform_xbox"){
            $platform_xbox = $field['value'];
        }
    }           
?>
    <li>
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
                <a href="<?php echo $platform_ios;?>"><img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/ios.png" /></a>
                <a href="<?php echo $platform_ios;?>"><img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/ios@3x.png" /></a>
            </dd>
                <?php
                }elseif($val == "window"){
                ?>
            <dd class="win">
                <a href="<?php echo $platform_window;?>"><img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/win.png" /></a>
                <a href="<?php echo $platform_window;?>"><img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/win@3x.png" /></a>
            </dd>
                <?php
                }elseif($val == "android"){
                ?>
            <dd class="android">
                <a href="<?php echo $platform_adroid;?>"><img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/android.png" /></a>
                <a href="<?php echo $platform_adroid;?>"><img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/android@3x.png" /></a>
            </dd>
            <?php
                }elseif($val == "blackberry"){
                ?>
            <dd class="blackberry">
                <a href="<?php echo $platform_black_berry;?>"><img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/blackberry.png" /></a>
                <a href="<?php echo $platform_black_berry;?>"><img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/blackberry@3x.png" /></a>
            </dd>
            <?php
                }elseif($val == "xbox"){
                ?>
            <dd class="xbox">
                <a href="<?php echo $platform_xbox;?>"><img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/xbox.png" /></a>
                <a href="<?php echo $platform_xbox;?>"><img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/xbox.png" /></a>
            </dd>
            <?php
                }elseif($val == "playstation"){
                ?>
            <dd class="playstation">
                <a href="<?php echo $platform_play_station;?>"><img class="img-normal" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/playstation.png" /></a>
                <a href="<?php echo $platform_play_station;?>"><img class="img-retina" alt="" src="<?php echo get_template_directory_uri()?>/content/images/ui/pages/home/games/platform/playstation.png" /></a>
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
}?>
        </ul>
        <footer>
            <!--<input type="button" value="Next" class="button" />-->
            <?php previous_posts_link('Back') ?>
            <?php next_posts_link('Next') ?>
        </footer>

    </div>
</section>
<?php 
$wp_query = null; 
$wp_query = $temp;  // Reset
get_footer();
?>

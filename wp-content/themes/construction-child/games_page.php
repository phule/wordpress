<?php
/* Template Name: Games page */ 

get_header();
?>
<?php
$temp = $wp_query; 
$wp_query = null; 
$wp_query = new WP_Query(); 
$wp_query->query(['showposts'=>20,
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

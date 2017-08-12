<?php
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
<section id="siteBody" class="site-body">
    <section id="infoSection" class="info">
		<div class="t-container">
			<h4>OUR GAMES / <?php echo $name; ?></h4>
			<section>
				<div class="col photo"><img alt="<?php echo $name; ?>" src="<?php echo $image;?>" /></div>
				<div class="col details">
					<h5><a title="<?php echo $name; ?>" href="#"><?php echo $name; ?></a></h5>
					<dl>
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
                    }
                    the_content();
                    ?>
					
				</div>
			</section>
		</div>
	</section>

    <?php
    echo do_shortcode(apply_filters("the_content", "[get_list_media]"));
    ?>
</section>


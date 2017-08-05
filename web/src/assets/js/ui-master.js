function sidebar(hambeger, sidebar){
    var $html = $('html');
    var $hambeger = $(hambeger);
    var $sidebar =  $(sidebar);
    var sidebarOpen = $html.hasClass('sidebar-open');

    $hambeger.on('click', function(){
        if(!sidebarOpen){
            //if(!isMobile.any()){
                //var scrollW = getWindowWidth() - $(window).width();
                //$('.site-header .fixed').css({'right': scrollW});
            //}
            $html.addClass('sidebar-open');
            sidebarOpen = true;
        }
    });

    $sidebar.on('click', function(e){
        var sidebarID = e.target.id;
        if(sidebarID === "sidebar" && sidebarOpen){
            if(!isMobile.any()){
                $('.site-header .fixed').css({'right': ''});
            }
            $html.removeClass('sidebar-open');
            sidebarOpen = false;
        }
    });

    $sidebar.find('a').on('click', function(e){
        e.preventDefault();
        if(sidebarOpen){
            if(!isMobile.any()){
                $('.site-header .fixed').css({'right': ''});
            }
            $html.removeClass('sidebar-open');
            sidebarOpen = false;
        }
        var target = this.hash,
            $target = $(target);

        if(target.length){
            if($target.length){
                var top  = $target.offset().top - $('#siteHeader').height();
                $("html, body").animate({ scrollTop: top }, 1000);
            }else{
                var $this = $(this);
                window.location.href = $this.attr('href');                 
            }
        }else{
            var $this = $(this);
            window.location.href = $this.attr('href'); 
        }
    });

    monitorResize(function(){
        if(sidebarOpen){
            if(!isMobile.any() && !isView.mobile()){
                $('.site-header .fixed').css({'right': ''});
            }
            $html.removeClass('sidebar-open');
            sidebarOpen = false;
        }
    });
}

function resizingHeader() {
    $(window).on('scroll', function(e){
        var distanceY = window.pageYOffset || document.documentElement.scrollTop,
            shrinkOn = 87,
            $header = $('#siteHeader');
        if (distanceY > shrinkOn) {
            $header.addClass("smaller");
        } else {
            if ($header.hasClass("smaller")) {
               $header.removeClass("smaller");
            }
        }
    });
}

function scrollPageLoad(){
    if ($(window.location.hash).length > 1) {
        $("html, body").animate({scrollTop: $(window.location.hash).offset().top}, 1000);
    }else{
        var target = location.hash,        
            $target = $(target);
        if(target.length){
            if($target.length){
                var top  = $target.offset().top - $('#siteHeader').height();
                $("html, body").animate({ scrollTop: top }, 1000);
            }
        }else{
            $("html, body").animate({scrollTop: 0});  
        }      
    }
}

window.onload = scrollPageLoad;

$(document).ready(function(){
    sidebar('#hambeger', '#sidebar')

    resizingHeader();    
      
    $('#siteHeader a').bind('click',function (e) {
        e.preventDefault();
        var target = this.hash,
            $target = $(target);

        if(target.length){
            if($target.length){
                var top  = $target.offset().top - $('#siteHeader').height();
                $("html, body").animate({ scrollTop: top }, 1000);
            }else{
                var $this = $(this);
                window.location.href = $this.attr('href');                 
            }
        }else{
            var $this = $(this);
            window.location.href = $this.attr('href'); 
        }
    });
});
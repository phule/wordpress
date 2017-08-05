var isMobile = {
    Android: function () {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function () {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function () {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function () {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function () {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

function getWindowWidth(){
    return window.innerWidth
        || document.documentElement.clientWidth
        || document.body.clientWidth;
}

function getWindowHeight(){
    return window.innerHeight
        || document.documentElement.clientHeight
        || document.body.clientHeight;
}

var isView = {
    mobile: function(){
        var sw = getWindowWidth();
        if (sw < 768) {
            return true;
        };
        return false;
    },
    tablet: function(){
        var sw = getWindowWidth();
        if (sw < 992 && sw > 767) {
            return true;
        };
        return false;
    },
    desktop: function(){
        var sw = getWindowWidth();
        if (sw > 991) {
            return true;
        };
        return false;
    }
};

function monitorResize (callbackfnc){
    callbackfnc.sw = getWindowWidth();
    var $window = $(window);
    $window.on('resize', function(){
        var nw = getWindowWidth();
        if(nw !== callbackfnc.sw){
            callbackfnc.sw = nw;
            callbackfnc();
        }
    });
};

$(document).ready(function(){
    //monitorResize(function(){
        //alert('asassss');
    //});
});
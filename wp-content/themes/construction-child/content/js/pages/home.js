'use strict';
(function($, window, document, undefined) {
    function bannerBG() {
        var $banner = $('#banner');
        var $bannerBG = $('#bannerBG');
        var siteHeader = $('#siteHeader').height();
        var banner = getWindowHeight() - siteHeader;
        $banner.css({ 'height': banner });
        if (isMobile.any() && isView.mobile()) {
            $bannerBG.css({ 'height': getWindowHeight() });
        }
        var url_src = $('#bannerBG').data('src');
        url_src +='/content/images/upload/banner/Hong_Kong.jpg';
        $bannerBG.fadeIn(3000, function () {
            $bannerBG.css({ 'background-image': 'url('+url_src+')' });
        });
    }

    window.onload = function () {
        bannerBG();
    };

    $(document).ready(function () {

        monitorResize(function () {
            bannerBG();
        });

        $('#partnerOwl').owlCarousel({
            loop: false,
            margin: 0,
            nav: true,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 3
                },
                1199: {
                    items: 5
                }
            }
        });
    });
})(window.jQuery, window, document);
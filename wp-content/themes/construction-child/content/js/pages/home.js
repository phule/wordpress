'use strict';
(function($, window, document, undefined) {
    function bannerBG() {
        var $banner = $('#banner');
        var $bannerBG = $('#bannerBG');
        var src_path = $('#bannerBG').data('src');
        var siteHeader = $('#siteHeader').height();
        var banner = getWindowHeight() - siteHeader;
        $banner.css({ 'height': banner });
        if (isMobile.any() && isView.mobile()) {
            $bannerBG.css({ 'height': getWindowHeight() });
        }
        $bannerBG.fadeIn(3000, function () {
            $bannerBG.css({ 'background-image': 'url('+src_path+')' });
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
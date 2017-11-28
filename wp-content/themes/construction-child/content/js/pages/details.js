'use strict';
(function($, window, document, undefined) {
    function shadowboxOwl(name) {
        var $section = $('.' + name);
        var $imgDefault = $('#' + name + 'Default');
        var $bannerItem = $section.find('div[class*="item"]');
        $bannerItem.css({ 'height': $imgDefault.height() });

        var paddingTop = $imgDefault.height() > $(window).height() ? 15 : ($(window).height() - $imgDefault.height()) / 2;
        $section.find('section').css({ 'padding-top': paddingTop });

        var $owl = $('#' + name + 'Owl');
        $owl.owlCarousel({
            items: 1,
            merge: true,
            loop: true,
            margin: 10,
            video: true,
            lazyLoad: true,
            center: true,
            nav: true
        });

        monitorResize(function () {
            $bannerItem.css({ 'height': $imgDefault.height() });

            var paddingTop = $imgDefault.height() > $(window).height() ? 15 : ($(window).height() - $imgDefault.height()) / 2;
            $section.find('section').css({ 'padding-top': paddingTop });
        });
    }

    function shadowbox(section, shadowbox) {
        var $section = $(section);
        var $shadowbox = $(shadowbox);
        var shadowboxOpen = $shadowbox.hasClass('open');

        $section.find('.list li').on('click', function () {
            if (!shadowboxOpen) {
                $shadowbox.addClass('opening');
                shadowboxOwl('shadowbox');
                setTimeout(function () {
                    $shadowbox.removeClass('opening').addClass('open');
                    shadowboxOpen = true;
                }, 300);
            }
        });

        $shadowbox.find('.close').on('click', function () {
            if (shadowboxOpen) {
                $shadowbox.removeClass('open');
                shadowboxOpen = false;
                $(document).find('.owl-next').click();
                $(document).find('.owl-prev').click();
            }
        });
    }

    $(document).ready(function () {
        shadowbox('#mediaSection', '#mediaShadowbox');
    });
})(window.jQuery, window, document);
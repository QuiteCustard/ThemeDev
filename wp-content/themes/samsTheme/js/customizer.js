(function ($) {
    // Sections
    // Shows a live preview of changing the body colour of the theme
    wp.customize('samsTheme_radio_control_background', function (colour) {
        colour.bind(function (updated_colour) {
            $('body').css('background-color', updated_colour);
        });
    });

    // Shows a live preview of changing the header colour of the theme
    wp.customize('samsTheme_colour_header', function (colour) {
        colour.bind(function (updated_colour) {
            $('.header').css('background-color', updated_colour);
        });
    });
    
    // Shows a live preview of changing the header colour of the theme
    wp.customize('samsTheme_colour_footer', function (colour) {
        colour.bind(function (updated_colour) {
            $('.footer').css('background-color', updated_colour);
        });
    });

    // Typography
    // Shows a live preview of changing the text colour of the theme
    wp.customize('samsTheme_colour_text', function (colour) {
        colour.bind(function (updated_colour) {
            $('body').css('color', updated_colour);
            
        });
    });

    // Shows a live preview of changing the heading colour of the theme
    wp.customize('samsTheme_colour_heading', function (colour) {
        colour.bind(function (updated_colour) {
            $('h2').css('color', updated_colour);
            $('h3').css('color', updated_colour);
        });
    });

    // Shows a live preview of changing the link colour of the theme
    wp.customize('samsTheme_colour_link', function (colour) {
        colour.bind(function (updated_colour) {
            $('a').css('color', updated_colour);
        });
    });

    // Shows a live preview of changing the link hover colour of the theme
    wp.customize('samsTheme_colour_hover', function (colour) {
        colour.bind(function (updated_colour) {
            $('a:hover').css('color', updated_colour);
        });
    });

    // Shows a live preview of changing the header border colour of the theme
    wp.customize('samsTheme_colour_border', function (colour) {
        colour.bind(function (updated_colour) {
            $('.header').css('border-bottom', "1px solid" + updated_colour);
        });
    });

    // Layout
    // Shows a live preview of the header stickyness or not
    wp.customize('samsTheme_header_position', function (layout) {
        layout.bind(function (updated_layout) {
            if (updated_layout == 'default') {
                $('.header').removeClass('sticky');
            } else {
                $('.header').addClass('sticky');
            }
        });
    });

    // Shows a live preview of the header layout
    wp.customize('samsTheme_layout_header', function (layout) {
        layout.bind(function (updated_layout) {
            if (updated_layout == 'default') {
                $('.main-nav').removeClass('centered');
            } else {
                $('.main-nav').addClass('centered');
            }
        });
    });

    // Shows a live preview of the footer layout
    wp.customize('samsTheme_layout_footer', function (layout) {
        layout.bind(function (updated_layout) {
            if (updated_layout == 'default') {
                $('.widgets').removeClass('centered');
            } else {
                $('.widgets').addClass('centered');
            }
        });
    });

    // Shows a live preview of the body width
    wp.customize('samsTheme_body_width', function (layout) {
        layout.bind(function (updated_layout) {
            if (updated_layout == 'default') {
                $('.actual-content').removeClass('full-width');
            } else {
                $('.actual-content').addClass('full-width');
            }
        });
    });


})(jQuery);
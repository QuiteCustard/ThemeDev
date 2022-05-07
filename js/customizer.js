(function ($) {
    // Sections
    // Shows a live preview of changing the body colour of the theme
    wp.customize('samsTheme_radio_control_background', function (colour) {
        colour.bind(function (updated_colour) {
            $('body').css('background-color', updated_colour);
        });
    });

    // Shows a live preview of changing the header colour of the theme
    wp.customize('samsTheme_primary_colour', function (colour) {
        colour.bind(function (updated_colour) {
            $('#form-container').css('background-color', updated_colour);
        });
    });

    // Shows a live preview of changing the header colour of the theme
    wp.customize('samsTheme_header_colour', function (colour) {
        colour.bind(function (updated_colour) {
            $('.header').css('background-color', updated_colour);
        });
    });

    // Shows a live preview of changing the header colour of the theme
    wp.customize('samsTheme_footer_colour', function (colour) {
        colour.bind(function (updated_colour) {
            $('.footer').css('background-color', updated_colour);
        });
    });

    // Typography
    // Shows a live preview of changing the text colour of the theme
    wp.customize('samsTheme_text_colour', function (colour) {
        colour.bind(function (updated_colour) {
            $('body').css('color', updated_colour);

        });
    });

    // Shows a live preview of changing the heading colour of the theme
    wp.customize('samsTheme_heading_colour', function (colour) {
        colour.bind(function (updated_colour) {
            $('h1').css('color', updated_colour);
            $('h2').css('color', updated_colour);
            $('h3').css('color', updated_colour);
            $('h4').css('color', updated_colour);
            $('h5').css('color', updated_colour);
            $('h6').css('color', updated_colour);
        });
    });

    // Shows a live preview of changing the link colour of the theme
    wp.customize('samsTheme_link_colour', function (colour) {
        colour.bind(function (updated_colour) {
            $('a').css('color', updated_colour);
        });
    });

    // Shows a live preview of changing the link hover colour of the theme
    wp.customize('samsTheme_hover_colour', function (colour) {
        colour.bind(function (updated_colour) {
            $('a:hover').css('color', updated_colour);
        });
    });

    // Shows a live preview of changing the header border colour of the theme
    wp.customize('samsTheme_border_colour', function (colour) {
        colour.bind(function (updated_colour) {
            $('.header').css('border-bottom', "1px solid" + updated_colour);
        });
    });

    // Shows a live preview of changing the width of the logo
    wp.customize('samsTheme_logo_width', function (width) {
        width.bind(function (updated_width) {
            $('.logo').css('width', updated_width);
        });
    });

    // Shows a live preview of changing the height of the logo
    wp.customize('samsTheme_logo_height', function (height) {
        height.bind(function (updated_height) {
            $('.logo').css('height', updated_height);
        });
    });
    
    // Shows a live preview of changing the border radius of the logo
    wp.customize('samsTheme_border_radius', function (radius) {
        radius.bind(function (updated_radius) {
            $('.logo').css('border-radius', updated_radius);
        });
    });

    // Shows a live preview of changing the padding of the logo
    wp.customize('samsTheme_logo_padding', function (padding) {
        padding.bind(function (updated_padding) {
            $('.site-home').css('padding', updated_padding);
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
    wp.customize('samsTheme_header_layout', function (layout) {
        layout.bind(function (updated_layout) {
            if (updated_layout == 'default') {
                $('.main-nav').removeClass('centered');
            } else {
                $('.main-nav').addClass('centered');
            }
        });
    });

    wp.customize('samsTheme_header_width', function (layout) {
        layout.bind(function (updated_layout) {
            if (updated_layout != 'full-width') {
                $('.main-nav').removeClass('full-width');
            } else {
                $('.main-nav').addClass('full-width');
            }
        });
    });

    // Shows a live preview of the footer layout
    wp.customize('samsTheme_footer_layout', function (layout) {
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
            if (updated_layout != 'full-width') {
                $('.actual-content').removeClass('full-width');
            } else {
                $('.actual-content').addClass('full-width');
            }
        });
    });


})(jQuery);
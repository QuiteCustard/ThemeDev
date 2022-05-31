<?php
add_action('customize_register', 'samsTheme_customize_register');

function samsTheme_customize_register($wp_customize)
{
    // Custom controls
    // Custom control to display separator
    class separator_control extends WP_Customize_Control
    {
        public function render_content()
        {
        ?>
            <div class="separator" style="width:100%; height:1px; background-color: #d6d6d7;"></div>
        <?php
        }
    }

    // Theme options panel
    $wp_customize->add_panel('samsTheme_options', array(
        'title' => __('Theme Options', 'samsTheme') ,
        'description' => __('Theme Modifications') ,
    ));

    // Style section in theme option panel
    $wp_customize->add_section('samsTheme_style_options', array(
        'title' => __('Styles', 'samsTheme'),
        'priority' => 1,
        'panel' => 'samsTheme_options',
    ));

    // Add setting for radio buttons (colour vs image for body background)
    $wp_customize->add_setting('samsTheme_background', array(
        'default' => 'colour',
    ));

    // Add control for radio buttons (colour vs image for body)
    $wp_customize->add_control('samsTheme_background', array(
        'label' => __('Body colour or image?', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_background',
        'type' => 'radio',
        'choices' => array(
            'colour' => __('Colour', 'samsTheme'),
            'image' => __('Image', 'samsTheme'),
        ),
    ));

    // Add colour setting for body background
    $wp_customize->add_setting('samsTheme_background_colour', array(
        'default' => 'ffffff',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
    ));

    // Add hidden control that displays on body background being set to colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_background_colour', array(
        'label' => __('Body colour', 'samsTheme'),
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_background_colour',
        'active_callback' => 'background_option',
    )));

    // Add image setting for body background
    $wp_customize->add_setting('samsTheme_background_image', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add hidden control that displays on body background being set to image
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'samsTheme_background_image', array(
        'label' => __('Image selector', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_background_image',
        'active_callback' => 'background_option',
    )));

    // Set which control to display
    function background_option($control)
    {
        $radio_setting = $control->manager->get_setting('samsTheme_background')->value();
        $control_id = $control->id;

        if ($control_id == 'samsTheme_background_colour' && $radio_setting == 'colour')
        {
            return true;
        }
         else if ($control_id == 'samsTheme_background_image' && $radio_setting == 'image')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Add colour setting for primary colour
    $wp_customize->add_setting('samsTheme_primary_colour', array(
        'default' => 'f78da7',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add hidden control that displays on body background being set to colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_primary_colour', array(
        'label' => __('Primary colour', 'samsTheme'),
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_primary_colour',
    )));

    // Separator
    // Add a setting for separator
    $wp_customize->add_setting('samsTheme_separator', array(
        'sanitize_callback' => 'samsTheme_sanitize',
    ));

    // Add a control for separator
    $wp_customize->add_control(new separator_control($wp_customize, 'samsTheme_separator', array(
        'section' => 'samsTheme_style_options',
    )));

    // Add a new setting for header colour
    $wp_customize->add_setting('samsTheme_header_colour', array(
        'default' => 'ffffff',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for header colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_header_colour', array(
        'label' => __('Header Colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_header_colour',
    )));

     // Add setting for radio buttons (check if want header border)
     $wp_customize->add_setting('samsTheme_border', array(
        'default' => 'no-border',
    ));

    // Add control for radio buttons for header border
    $wp_customize->add_control('samsTheme_border', array(
        'label' => __('Would you like a header border?'),
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_border',
        'type' => 'radio',
        'choices' => array(
            'no-border' => __('No border', 'samsTheme'),
            'bordered' => __('Border', 'samsTheme'),
        ),
    ));

    // Add custom value setting
    $wp_customize->add_setting('samsTheme_border_colour', array(
        'default' => 'd6d6d6',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add hidden control that displays on custom border option being selected
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_border_colour', array(
        'label' => __('Border colour', 'samsTheme'),
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_border_colour',
        'active_callback' => 'border_choice',
    )));

    // Set whether to show control
    function border_choice($control)
    {
        $radio_setting = $control->manager->get_setting('samsTheme_border')->value();
        $control_id = $control->id;

        if ($control_id == 'samsTheme_border_colour' && $radio_setting == 'bordered')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    // Add a setting for logo width
    $wp_customize->add_setting('samsTheme_logo_width', array(
        'default' => '50px',
        'transport' => 'postMessage',
    ));

    // Add a control for logo width
    $wp_customize->add_control('samsTheme_logo_width', array(
        'label' => __('Logo width','samsTheme'),
        'section' => 'samsTheme_style_options',
        'description' => __('This will decide the width for the logo', 'samsTheme'),
        'type' => 'select',
        'choices' => array(
            '50px' => 'Default (50px)',
            '100px' =>'100px',
            '150px' => '150px',
        ),
    ));

    // Add a setting for logo height
    $wp_customize->add_setting('samsTheme_logo_height', array(
        'default' => '50px',
        'transport' => 'postMessage',
    ));

    // Add a control for logo height
    $wp_customize->add_control('samsTheme_logo_height', array(
        'label' => __('Logo height','samsTheme'),
        'section' => 'samsTheme_style_options',
        'description' => __('This will decide the height for the logo', 'samsTheme'),
        'type' => 'select',
        'choices' => array(
            '50px' => 'Default (50px)',
            '100px' => '100px',
            '150px' => '150px',
        ),
    ));

    // Add a setting for logo border radius
    $wp_customize->add_setting('samsTheme_border_radius', array(
        'default' => '0px',
        'transport' => 'postMessage',
    ));

    // Add a control for logo border radius
    $wp_customize->add_control('samsTheme_border_radius', array(
        'label' => __('Border radius for logo','samsTheme'),
        'section' => 'samsTheme_style_options',
        'description' => __('This will decide the border radius for the logo', 'samsTheme'),
        'type' => 'select',
        'choices' => array(
            '0px' => '0px',
            '5px' =>'5px',
            '100%' => '100%',
        ),
    ));

    // Add a setting for logo padding
    $wp_customize->add_setting('samsTheme_logo_padding', array(
        'default' => '0px',
        'transport' => 'postMessage',
    ));

    // Add a control for logo padding
    $wp_customize->add_control('samsTheme_logo_padding', array(
        'label' => __('Padding for logo','samsTheme'),
        'section' => 'samsTheme_style_options',
        'description' => __('This will decide the padding for the logo', 'samsTheme'),
        'type' => 'select',
        'choices' => array(
            '0px' => '0px',
            '5px' =>'5px',
            '25px' => '25px',
        ),
    ));

    // Separator
    // Add a setting for separator
    $wp_customize->add_setting('samsTheme_separator_two', array(
        'sanitize_callback' => 'samsTheme_sanitize',
    ));

    // Add a control for separator
    $wp_customize->add_control(new separator_control($wp_customize, 'samsTheme_separator_two', array(
        'section' => 'samsTheme_style_options',
    )));

    // Add a new setting for footer colour
    $wp_customize->add_setting('samsTheme_footer_colour', array(
        'default' => 'ffffff',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for footer colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_footer_colour', array(
        'label' => __('Footer Colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_footer_colour',
    )));

    // Separator
    // Add a setting for separator
    $wp_customize->add_setting('samsTheme_separator_three', array(
        'sanitize_callback' => 'samsTheme_sanitize',
    ));

    // Add a control for separator
    $wp_customize->add_control(new separator_control($wp_customize, 'samsTheme_separator_three', array(
        'section' => 'samsTheme_style_options',
    )));

    // Typography colours
    // Add a new setting for text colour
    $wp_customize->add_setting('samsTheme_text_colour', array(
        'default' => '000000',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for text colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_text_colour', array(
        'label' => __('Text Colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_text_colour',
    )));

    // Add a new setting for heading colour
    $wp_customize->add_setting('samsTheme_heading_colour', array(
        'default' => '000000',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for heading colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_heading_colour', array(
        'label' => __('H1 - H6 Colours', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_heading_colour',
    )));

    // Add a new setting for link colour
    $wp_customize->add_setting('samsTheme_link_colour', array(
        'default' => '22AEB8',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for link colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_link_colour', array(
        'label' => __('Link Colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_link_colour',
    )));

    // Add a new setting for menu link colour
    $wp_customize->add_setting('samsTheme_menu_link_colour', array(
        'default' => '22AEB8',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for menu link colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_menu_link_colour', array(
        'label' => __('Menu Link Colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_menu_link_colour',
    )));

    // Add a new setting for link hover colour
    $wp_customize->add_setting('samsTheme_hover_colour', array(
        'default' => '1D868D',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
    ));

    // Add a control for link hover colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_hover_colour', array(
        'label' => __('Hover Colour', 'samsTheme'),
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_hover_colour',
    )));

    // Layout section in theme options panel
    $wp_customize->add_section('samsTheme_layout_options', array(
        'title' => __('Layout', 'samsTheme'),
        'panel' => 'samsTheme_options',
    ));

    // Setting for header being sticky or not
    $wp_customize->add_setting('samsTheme_header_position', array(
        'default' => 'default',
        'transport' => 'postMessage',
    ));

    // Control for header being sticky or not
    $wp_customize->add_control('samsTheme_header_position', array(
        'label' => __('Position for header','samsTheme'),
        'type' => 'select',
        'section' => 'samsTheme_layout_options',
        'description' => __('This will decide whether the header is sticky','samsTheme'),
        'choices' => array(
            'default' => __('Default', 'samsTheme'),
            'sticky' => __('Sticky', 'samsTheme'),
        ) ,
    ));

    // Setting for header width
    $wp_customize->add_setting('samsTheme_header_width', array(
        'type' => 'option',
        'default' => 'full-width',
        'transport' => 'postMessage',
    ));

    // Control for header width
    $wp_customize->add_control('samsTheme_header_width', array(
        'type' => 'select',
        'section' => 'samsTheme_layout_options',
        'label' => __('Header width', 'samsTheme'),
        'description' => __('This will decide the width of the header', 'samsTheme'),
        'choices' => array(
            'boxed' => __('Boxed (1500px)', 'samsTheme'),
            'full-width' => __('Full Width', 'samsTheme'),
        ),
    ));

    // Separator
    $wp_customize->add_setting('samsTheme_separator_five', array(
        'sanitize_callback' => 'samsTheme_sanitize',
    ));

    $wp_customize->add_control(new separator_control($wp_customize, 'samsTheme_separator_five', array(
        'section' => 'samsTheme_layout_options',
    )));

    // Setting for footer layout
    $wp_customize->add_setting('samsTheme_footer_layout', array(
        'type' => 'option',
        'default' => 'default',
        'transport' => 'postMessage',
    ));

    // Control for footer layout
    $wp_customize->add_control('samsTheme_footer_layout', array(
        'label' => __('Layout for the footer', 'samsTheme'),
        'section' => 'samsTheme_layout_options',
        'type' => 'select',
        'description' => __('This will decide the layout of the footer', 'samsTheme'),
        'choices' => array(
            'default' => __('Not centered', 'samsTheme'),
            'centered' => __('Centered', 'samsTheme'),
        ) ,
    ));

    // Separator
    $wp_customize->add_setting('samsTheme_separator_six', array(
        'sanitize_callback' => 'samsTheme_sanitize',
    ));

    $wp_customize->add_control(new separator_control($wp_customize, 'samsTheme_separator_six', array(
        'section' => 'samsTheme_layout_options',
    )));

    // Setting for body width
    $wp_customize->add_setting('samsTheme_body_width', array(
        'type' => 'option',
        'default' => 'boxed',
        'transport' => 'postMessage',
    ));

    // Control for body width
    $wp_customize->add_control('samsTheme_body_width', array(
        'type' => 'select',
        'section' => 'samsTheme_layout_options',
        'label' => __('Body width', 'samsTheme'),
        'description' => __('This will decide the width of the body', 'samsTheme'),
        'choices' => array(
            'boxed' => __('Boxed (1500px)', 'samsTheme'),
            'full-width' => __('Full width', 'samsTheme'),
        ),
    ));
}

// Allow live customization
function samsTheme_customize_live_preview()
{
    wp_enqueue_script('samsTheme-customize-js', get_stylesheet_directory_uri() . '/js/customizer.js', array(
        'jquery',
        'customize-preview'
    ) , '', true);
}
add_action('customize_preview_init', 'samsTheme_customize_live_preview');

// Generate Internal CSS from the values Customize Panel Settings
function samsTheme_customization_css_colours()
{
    // Get Options from the Customize Panel
    $body_colour = get_option('samsTheme_body_colour');
    $primary_colour = get_option('samsTheme_primary_colour');
    $header_colour = get_option('samsTheme_header_colour');
    $footer_colour = get_option('samsTheme_footer_colour');
    $text_colour = get_option('samsTheme_text_colour');
    $heading_colour = get_option('samsTheme_heading_colour');
    $link_colour = get_option('samsTheme_link_colour');
    $menu_link_colour = get_option('samsTheme_menu_link_colour');
    $hover_colour = get_option('samsTheme_hover_colour');

    if (get_theme_mod('samsTheme_background') == 'colour') {
        $body_colour = get_theme_mod('samsTheme_background_colour');
        $body_img = 'none';
    }
    else {
        $body_img = get_theme_mod('samsTheme_background_image');
        $body_colour = 'fffff';
    }

    if (get_theme_mod('samsTheme_border') == 'no-border') {
        $border_colour = 'none';
    }
    else {
        $border_colour = '1px solid  #' . get_option('samsTheme_border_colour');
    }

    $logo_width = get_theme_mod('samsTheme_logo_width');
    $logo_height = get_theme_mod('samsTheme_logo_height');
    $border_radius = get_theme_mod('samsTheme_border_radius');
    $logo_padding = get_theme_mod('samsTheme_logo_padding');
?>

<style>
    :root {
        --body-colour:#<?php echo $body_colour; ?>;
        --body-img:<?php echo 'url(' . $body_img . ')'; ?>;
        --primary:#<?php echo $primary_colour; ?>;
        --header:#<?php echo $header_colour; ?>;
        --footer:#<?php echo $footer_colour; ?>;
        --text:#<?php echo $text_colour; ?>;
        --heading:#<?php echo $heading_colour; ?>;
        --link:#<?php echo $link_colour; ?>;
        --menu-link:#<?php echo $menu_link_colour; ?>;
        --hover:#<?php echo $hover_colour; ?>;
        --border-colour:<?php echo $border_colour; ?>;
        --border-radius:<?php echo $border_radius; ?>;
        --logo-padding:<?php echo $logo_padding; ?>;
        --width:<?php echo $logo_width;?>;
        --height:<?php echo $logo_height;?>
    }
</style>

<?php
}
add_action('wp_head', 'samsTheme_customization_css_colours');

// Layout functions
// Sticky header filter
function samsTheme_sticky_header($header)
{
    $header = get_theme_mod('samsTheme_header_position');
    return $header;
}
add_filter('samsTheme_sticky_header_css', 'samsTheme_sticky_header');

// Header centered or not filter
function samsTheme_header_layout($header)
{
    $header = get_option('samsTheme_header_layout');
    return $header;
}
add_filter('samsTheme_header_layout_css', 'samsTheme_header_layout');

// Header width filter
function samsTheme_header_width($header)
{
    $header = get_option('samsTheme_header_width');
    return $header;
}
add_filter('samsTheme_header_width_css', 'samsTheme_header_width');

// Footer centered or not filter
function samsTheme_footer_layout($footer)
{
    $footer = get_option('samsTheme_footer_layout');
    return $footer;
}
add_filter('samsTheme_footer_layout_css', 'samsTheme_footer_layout');

// Body width filter
function samsTheme_body_width($body_width)
{
    $body_width = get_option('samsTheme_body_width');
    return $body_width;
}
add_filter('samsTheme_body_width_css', 'samsTheme_body_width');
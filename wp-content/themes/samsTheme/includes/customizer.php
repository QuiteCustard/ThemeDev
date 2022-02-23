<?php
// Custom classes
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
        'description' => __('Theme Modifications', 'samsTheme') ,
    ));

    // Style section in theme option panel
    // Layout colours
    $wp_customize->add_section('samsTheme_style_options', array(
        'title' => __('Styles', 'samsTheme') ,
        'priority' => 1,
        'panel' => 'samsTheme_options',
    ));

    // Add setting for radio buttons (colour vs image for body)
    $wp_customize->add_setting('samsTheme_radio_control_background', array(
        'default' => 'default',
    ));

    // Add control for radio buttons (colour vs image for body)
    $wp_customize->add_control('samsTheme_radio_control_background', array(
        'label' => esc_html__('Body colour or image?', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_radio_control_background',
        'type' => 'radio',
        'choices' => array(
            'default' => 'Colour',
            'custom' => 'Image',
        ) ,
    ));

    // Add colour setting for background
    $wp_customize->add_setting('samsTheme_background_colour_option', array(
        'default' => 'ffffff',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
    ));

    // Add hidden control that displays on colour background being selected
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_background_colour_option', array(
        'label' => esc_html__('Body colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_background_colour_option',
        'active_callback' => 'background_option',
    )));

    // Add image setting for background
    $wp_customize->add_setting('samsTheme_background_image_option', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add hidden control that displays on image background being selected
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'samsTheme_background_image_option', array(
        'label' => esc_html__('Image selector', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_background_image_option',
        'active_callback' => 'background_option',
    )));

    function background_option($control)
    {
        $radio_setting = $control->manager->get_setting('samsTheme_radio_control_background')->value();
        $control_id = $control->id;

        if ($control_id == 'samsTheme_background_colour_option' && $radio_setting == 'default')
        {
            return true;
        }
         else if ($control_id == 'samsTheme_background_image_option' && $radio_setting == 'custom')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    // Separator
    $wp_customize->add_setting('samsTheme_separator', array(
        'sanitize_callback' => 'samsTheme_sanitize',
    ));

    $wp_customize->add_control(new separator_control($wp_customize, 'samsTheme_separator', array(
        'section' => 'samsTheme_style_options',
    )));

    // Add a new setting for header colour
    $wp_customize->add_setting('samsTheme_colour_header', array(
        'default' => 'ffffff',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for header colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_colour_header', array(
        'label' => esc_html__('Header Colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_colour_header',
    )));

     // Add setting for radio buttons (check if want header border)
     $wp_customize->add_setting('samsTheme_radio_control', array(
        'default' => 'default',
    ));

    // Add control for radio buttons for header border
    $wp_customize->add_control('samsTheme_radio_control', array(
        'label' => esc_html__('Would you like a header border?', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_radio_control',
        'type' => 'radio',
        'choices' => array(
            'default' => 'No border',
            'custom' => 'Border',
        ) ,
    ));

    // Add custom value setting
    $wp_customize->add_setting('samsTheme_custom_option', array(
        'default' => 'd6d6d6',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
    ));

    // Add hidden control that displays on custom border option being selected
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_custom_option', array(
        'label' => esc_html__('Border colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_custom_option',
        'active_callback' => 'choice_callback',
    )));

    function choice_callback($control)
    {
        $radio_setting = $control->manager->get_setting('samsTheme_radio_control')->value();
        $control_id = $control->id;

        if ($control_id == 'samsTheme_custom_option' && $radio_setting == 'custom')
        {
            return true;
        }
         else if ($control_id == 'samsTheme_default_option' && $radio_setting == 'default')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

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
    $wp_customize->add_setting('samsTheme_colour_footer', array(
        'default' => 'ffffff',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for footer colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_colour_footer', array(
        'label' => esc_html__('Footer Colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_colour_footer',
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
    $wp_customize->add_setting('samsTheme_colour_text', array(
        'default' => '000000',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for text colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_colour_text', array(
        'label' => esc_html__('Text Colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_colour_text',
    )));

    // Add a new setting for heading colour
    $wp_customize->add_setting('samsTheme_colour_heading', array(
        'default' => '000000',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for heading colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_colour_heading', array(
        'label' => esc_html__('H1 - H6 Colours', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_colour_heading',
    )));

    // Add a new setting for link colour
    $wp_customize->add_setting('samsTheme_colour_link', array(
        'default' => '22AEB8',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for link colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_colour_link', array(
        'label' => esc_html__('Link Colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_colour_link',
    )));

    // Add a new setting for link hover colour
    $wp_customize->add_setting('samsTheme_colour_hover', array(
        'default' => '1D868D',
        'type' => 'option',
        'sanitize_callback' => 'sanitize_hex_color_no_hash',
        'sanitize_js_callback' => 'maybe_hash_hex_color',
        'transport' => 'postMessage',
    ));

    // Add a control for link hover colour
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'samsTheme_colour_hover', array(
        'label' => esc_html__('Hover Colour', 'samsTheme') ,
        'section' => 'samsTheme_style_options',
        'settings' => 'samsTheme_colour_hover',
    )));

    // Layout section in theme option panel
    $wp_customize->add_section('samsTheme_layout_options', array(
        'title' => __('Layout', 'samsTheme') ,
        'priority' => 1,
        'panel' => 'samsTheme_options',
    ));

    // Setting for header being sticky or not
    $wp_customize->add_setting('samsTheme_header_position', array(
        'type' => 'option',
        'default' => 'default',
        'transport' => 'postMessage',
    ));

    // Control for header being sticky or not
    $wp_customize->add_control('samsTheme_header_position', array(
        'type' => 'select',
        'section' => 'samsTheme_layout_options',
        'label' => 'Position for header',
        'description' => 'This will decide whether the header is sticky',
        'choices' => array(
            'default' => __('Default') ,
            'sticky' => __('Sticky') ,
        ) ,
    ));

    // Setting for header layout
    $wp_customize->add_setting('samsTheme_layout_header', array(
        'type' => 'option',
        'default' => 'default',
        'transport' => 'postMessage',
    ));

    // Control for header layout
    $wp_customize->add_control('samsTheme_layout_header', array(
        'type' => 'select',
        'section' => 'samsTheme_layout_options',
        'label' => 'Layout for the header',
        'description' => 'This will decide the layout of the header',
        'choices' => array(
            'default' => __('Default') ,
            'centered' => __('Centered') ,
        ) ,
    ));
    // Separator
    $wp_customize->add_setting('samsTheme_separator_four', array(
        'sanitize_callback' => 'samsTheme_sanitize',
    ));

    $wp_customize->add_control(new separator_control($wp_customize, 'samsTheme_separator_four', array(
        'section' => 'samsTheme_layout_options',
    )));
    // Setting for footer layout
    $wp_customize->add_setting('samsTheme_layout_footer', array(
        'type' => 'option',
        'default' => 'default',
        'transport' => 'postMessage',
    ));

    // Control for footer layout
    $wp_customize->add_control('samsTheme_layout_footer', array(
        'type' => 'select',
        'section' => 'samsTheme_layout_options',
        'label' => 'Layout for the footer',
        'description' => 'This will decide the layout of the footer',
        'choices' => array(
            'default' => __('Default') ,
            'centered' => __('Centered') ,
        ) ,
    ));

    // Separator
    $wp_customize->add_setting('samsTheme_separator_four', array(
        'sanitize_callback' => 'samsTheme_sanitize',
    ));

    $wp_customize->add_control(new separator_control($wp_customize, 'samsTheme_separator_four', array(
        'section' => 'samsTheme_layout_options',
    )));

    // Setting for body with
    $wp_customize->add_setting('samsTheme_layout_body', array(
        'type' => 'option',
        'default' => 'default',
        'transport' => 'postMessage',
    ));

    // Control for body width
    $wp_customize->add_control('samsTheme_layout_body', array(
        'type' => 'select',
        'section' => 'samsTheme_layout_options',
        'label' => 'Body width',
        'description' => 'This will decide the width of the body',
        'choices' => array(
            'default' => __('Boxed (1500px)') ,
            'full-width' => __('Full Width') ,
        ) ,
    ));
}

// Registers the Theme Customizer Preview with WordPress.
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
    //Get Options from the Customize Panel
    $body_colour = get_option('samsTheme_colour_body');
    $header_colour = get_option('samsTheme_colour_header');
    $footer_colour = get_option('samsTheme_colour_footer');
    $text_colour = get_option('samsTheme_colour_text');
    $heading_colour = get_option('samsTheme_colour_heading');
    $link_colour = get_option('samsTheme_colour_link');
    $hover_colour = get_option('samsTheme_colour_hover');

    if (get_theme_mod('samsTheme_radio_control_background') == 'default') {
        $body_colour = get_theme_mod('samsTheme_background_colour_option');
        $body_img = 'none';
    }
    else {
        $body_img = get_theme_mod('samsTheme_background_image_option');
        $body_colour = '#fffff';
    }


    if (get_theme_mod('samsTheme_radio_control') == 'default') {
        $border_colour = 'none';
    }
    else {
        $border_colour = '1px solid  #' . get_theme_mod('samsTheme_custom_option');
    }
?>

<style>
    :root {
        --body-colour:#<?php echo $body_colour; ?>;
        --body-img:<?php echo 'url(' . $body_img . ')'; ?>;
        --header:#<?php echo $header_colour; ?>;
        --footer:#<?php echo $footer_colour; ?>;
        --text:#<?php echo $text_colour; ?>;
        --heading:#<?php echo $heading_colour; ?>;
        --link:#<?php echo $link_colour; ?>;
        --hover:#<?php echo $hover_colour; ?>;
        --border:<?php echo $border_colour; ?>
    }
</style>

<?php
}
add_action('wp_head', 'samsTheme_customization_css_colours');

// Layout functions
function samsTheme_header_layout($header)
{
    $header = get_option('samsTheme_layout_header');
    return $header;
}
add_filter('samsTheme_header_layout_css', 'samsTheme_header_layout');

function samsTheme_footer_layout($footer)
{
    $footer = get_option('samsTheme_layout_footer');
    return $footer;
}
add_filter('samsTheme_footer_layout_css', 'samsTheme_footer_layout');

function samsTheme_body_width($body_width)
{
    $body_width = get_option('samsTheme_layout_body');
    return $body_width;
}
add_filter('samsTheme_body_layout_css', 'samsTheme_body_width');

function samsTheme_header_sticky($header)
{
    $header = get_option('samsTheme_header_position');
    return $header;
}
add_filter('samsTheme_header_sticky_css', 'samsTheme_header_sticky');


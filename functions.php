<?php

// Add scripts and stylesheets
function load_stylesheets() {
    wp_enqueue_style( 'style', get_stylesheet_uri() ); 
}
add_action( 'wp_enqueue_scripts', 'load_stylesheets' );

function samsTheme_setup() {
    // Add <title> tag support
    add_theme_support( 'title-tag' );  

    // Add custom-logo support
    add_theme_support( 'custom-logo' );

     // Add menu support

    register_nav_menus( array(
        'header'   => 'Header Menu',
        'footer'   => 'Footer menu',
    ) );

}
add_action( 'after_setup_theme', 'samsTheme_setup');

function samsTheme_register_sidebars() {
    // First footer widget
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Section One', 'samsTheme' ),
        'id'            => 'footer-section-one',
        'description'   => esc_html__( 'Widgets added here would appear inside the first section of the footer', 'samsTheme' ),
        'before_widget' => '<aside>',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));

    // Second footer widget
    register_sidebar( array(
        'name'          => esc_html__( 'Footer Section Two', 'samsTheme' ),
        'id'            => 'footer-section-two',
        'description'   => esc_html__( 'Widgets added here would appear inside the second section of the footer', 'samsTheme' ),
        'before_widget' => '<aside>',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));  

     // Second footer widget
     register_sidebar( array(
        'name'          => esc_html__( 'Footer Section Three', 'samsTheme' ),
        'id'            => 'footer-section-three',
        'description'   => esc_html__( 'Widgets added here would appear inside the third section of the footer', 'samsTheme' ),
        'before_widget' => '<aside>',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));  
     // Second footer widget
     register_sidebar( array(
        'name'          => esc_html__( 'Footer Section four', 'samsTheme' ),
        'id'            => 'footer-section-four',
        'description'   => esc_html__( 'Widgets added here would appear inside the fourth section of the footer', 'samsTheme' ),
        'before_widget' => '<aside>',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ));  
}
    add_action( 'widgets_init', 'samsTheme_register_sidebars' );	

require_once( get_stylesheet_directory() . '/includes/customizer.php' );


function convertNumberToWord($num = false)
{
    if(! $num) {
        return false;
    }
    $num = (int) $num;

    switch ($num) {
        case 1:
            return "one";
            break;
        case 2:
            return "two";
            break;
        case 3:
            return "three";
            break;
        case 4:
            return "four";
            break;
        case 5:
            return "five";
            break;
        case 6:
            return "six";
            break;
        case 7:
            return "seven";
            break;
        case 8:
            return "eight";
            break;
        case 9:
            return "nine";
            break;
        default:
        return false;
        break;
    }
}

function getPropInfo() {
    $args = array (
        'post_type' => 'page',
        'posts_per_page' => -1,
        'meta_query' => array(
            array(
                'key' => '_wp_page_template',
                'value' => 'templates/details_template.php',
            )
        )
    );
    $the_pages = new WP_Query($args);
 //  echo "<pre>";print_r($the_pages);
    ?>
    
    <?php if ( $the_pages->have_posts() ) : ?>
       <div class="property-cards">
        <?php while ( $the_pages->have_posts() ) : ?>
            <?php $the_pages->the_post(); ?>
            <a class="card" style="background-image:url(<?php $image = get_field("property_image"); echo $image['url'] ?>)" href="<?php the_guid(); ?>">
                <p class="short-desc"><?= the_field('short_description'); ?></p>
                <h2><?= the_title(); ?></h2>
        </a>
        <?php endwhile; ?>
        </div>
    <?php endif;
}
?>
<?php

function samsTheme_navScript() {
    wp_enqueue_script('samsTheme-nav', get_stylesheet_directory_uri() . '/js/nav.js', 
    array (
        'jquery',
    ), '', true);
}
add_action('wp_enqueue_scripts', 'samsTheme_navScript');



/*
function samsTheme_customize_live_preview()
{
    wp_enqueue_script('samsTheme-customize-js', get_stylesheet_directory_uri() . '/js/customizer.js', array(
        'jquery',
        'customize-preview'
    ) , '', true);
}
add_action('customize_preview_init', 'samsTheme_customize_live_preview');

*/
?>

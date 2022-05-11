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

function getIcons() {

    echo "<div class='icons'>";
    $icons = get_field("icons");

    if ($icons) {
        if ($icons['floors'] == "Single story") {
            echo "<div class='icon-wrapper single-story'><i class='fa-solid fa-house'></i><span>Single story</span></div>";
        }
        else if ($icons['floors'] == "Multi story"){
            echo "<div class='icon-wrapper multi-story'><i class='fa-solid fa-building'></i><span>Multi story</span></div>";
        }

        if ($icons['beach'] == 1) {
            echo "<div class='icon-wrapper beach'><i class='fa-solid fa-umbrella-beach'></i><span>Beach</span></div>";
        }

        if ($icons['disability_friendly'] == 1) {
            echo "<div class='icon-wrapper disability'><i class='fa-solid fa-heart-crack'></i><span>Disabililty friendly</span></div>";
        }

        if ($icons['family_friendly'] == 1) {
            echo "<div class='icon-wrapper family'><i class='fa-solid fa-user-group'></i><span>Family friendly</span></div>";
        }

        if ($icons['dog_friendly'] == 1) {
            echo "<div class='icon-wrapper dog'><i class='fa-solid fa-dog'></i><span>Dog friendly</span></div>";
        }

        if ($icons['parking'] == 1) {
            echo "<div class='icon-wrapper parking'><i class='fa-solid fa-car'></i><span>Parking</span></div>";
        }

        if ($icons['pool'] == 1) {
            echo "<div class='icon-wrapper pool'><i class='fa-solid fa-person-swimming'></i><span>Pool</span></div>";
        }

        if ($icons['garden'] == 1) {
            echo "<div class='icon-wrapper garden'><i class='fa-brands fa-pagelines'></i><span>Garden</span></div>";
        }
    }
        
    echo "</div>";
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

    return $the_pages = new WP_Query($args);
}

function propertyCards() {
    $the_pages = getPropInfo();
    ?>
    <?php if ( $the_pages->have_posts() ) : ?>
       <div class="property-cards">
        <?php while ( $the_pages->have_posts() ) : ?>
            <?php $the_pages->the_post(); ?>
            <a class="card" style="background-image:url(<?php $image = get_field("property_image"); echo $image['url'] ?>)" href="<?php the_guid(); ?>">
				<div class="icons-wrapper">
				<?php getIcons(); ?>
				</div>
                <p class="short-desc"><?= the_field('short_description'); ?></p>
                <h2><?= the_title(); ?></h2>
        </a>
        <?php endwhile; ?>
        </div>
    <?php endif;
}
?>

<?php
function samsTheme_customScripts() {
    wp_enqueue_script('samsTheme-nav', get_stylesheet_directory_uri() . '/js/nav.js', array ('jquery',), '', true);
  }   
  add_action( 'wp_enqueue_scripts', 'samsTheme_customScripts' );
?>
<?php


function install_plugins_notice(){
    global $pagenow;
    if ( $pagenow == 'index.php' ) {
		if(! in_array('advanced-custom-fields/acf.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
			         echo '<div class="notice notice-warning is-dismissible">
             <p>Advanced Custom Fields must be installed for this theme to work currently.</p>
         </div>';
		}
    }
}
add_action('admin_notices', 'install_plugins_notice');

?>
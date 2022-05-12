<?php

// Add scripts and stylesheets
function load_stylesheets() {
    wp_enqueue_style('style', get_stylesheet_uri()); 
}
add_action('wp_enqueue_scripts', 'load_stylesheets');

function samsTheme_setup() {
    // Add <title> tag support
    add_theme_support('title-tag');  

    // Add custom-logo support
    add_theme_support('custom-logo');

    // Add menu support
    register_nav_menus(array(
        'header'   => 'Header Menu',
        'footer'   => 'Footer menu',
    ));
}
add_action('after_setup_theme', 'samsTheme_setup');

function samsTheme_register_sidebars() {
    // First footer widget
    register_sidebar(array (
        'name' => esc_html__('Footer Section One', 'samsTheme'),
        'id' => 'footer-section-one',
        'description' => esc_html__('Widgets added here would appear inside the first section of the footer', 'samsTheme'),
        'before_widget' => '<aside>',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

    // Second footer widget
    register_sidebar(array (
        'name' => esc_html__('Footer Section Two', 'samsTheme'),
        'id' => 'footer-section-two',
        'description' => esc_html__('Widgets added here would appear inside the second section of the footer', 'samsTheme'),
        'before_widget' => '<aside>',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));  

     // Third footer widget
     register_sidebar(array (
        'name' => esc_html__('Footer Section Three', 'samsTheme'),
        'id' => 'footer-section-three',
        'description' => esc_html__('Widgets added here would appear inside the third section of the footer', 'samsTheme'),
        'before_widget' => '<aside>',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title'  => '</h4>',
    ));  
     // Fourth footer widget
     register_sidebar(array (
        'name' => esc_html__('Footer Section four', 'samsTheme'),
        'id' => 'footer-section-four',
        'description' => esc_html__('Widgets added here would appear inside the fourth section of the footer', 'samsTheme'),
        'before_widget' => '<aside>',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));  
}
    add_action('widgets_init', 'samsTheme_register_sidebars');	

require_once (get_stylesheet_directory() . '/includes/customizer.php');

function convertNumberToWord($num = false) {
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
    }
}

// Get info about property (looks for all posts using a template)
function getPropInfo($pageID) {
    $args = array (
        'post_type' => 'page',
        'posts_per_page' => -1,
        'post__not_in' => array ($pageID), // Hide current property from list at end (Other properties list)
        'meta_query' => array (
            array (
                'key' => '_wp_page_template',
                'value' => 'templates/details_template.php'    
            )
        )
    );

    $posts = get_posts($args);
    $newArr = [];

    if ($posts) {
      foreach ($posts as $post) {
        $newArr[$post->ID] = $post->post_title;
      }
    }
        
    return $newArr;
}

function bookingForm() {
?>
    <h2 class="heading"><?= get_field('heading'); ?></h2>
    <form class="booking-form">
                <label>
                    Arrival Date:
                    <input type="date"> 
                </label>
                <label>
                    Depature date:
                    <input type="date">
                </label>
                <label>
                    How many people?
                    <select>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>4+</option>
                    </select>
                </label>
                <label>
                    Where would you like to stay?
                    <select>
                    <?php populateSelect($pageID); ?>
                    </select>
                </label>
                <button class="button">Search</button>
            </form>
            <?php
}

function getIcons($id) {
    echo "<div class='icons'>";
    $icons = get_field("icons", $id);

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

function propertyCards($pageID) {
    $the_pages = getPropInfo($pageID);
 
     if ($the_pages) { ?>
        <div class="property-cards">
         <?php
         foreach ($the_pages as $id => $title) {
           $image = get_field("property_image", $id);
           ?>
            <a class="card" style="background-image:url(<?= $image['url'] ?>)" href="<?= get_permalink($id) ?>">
                 <div class="icons-wrapper">
                 <?php getIcons($id); ?>
                 </div>
                 <p class="short-desc"><?= the_field('short_description', $id); ?></p>
                 <h2><?= $title; ?> - <?= the_field("location", $id)?></h2>
         </a>
         <?php } ?>
         </div>
     <?php }
}

function getPropertyGallery($pageID) {

    $gallery = get_field('gallery');

    if ($gallery) {
        $count = count($gallery);
        //echo "<pre>";print_r($gallery); 
        ?>

        <div class="gallery-grid"> 
        <?php

        for ($i = 0; $i < $count; $i++) {
            $img_num = "image_" . convertNumberToWord($i+1);

            if (!isset($gallery[$img_num]['url']) || empty($gallery[$img_num]['url'])) {
                continue;
            }

            $img_url = $gallery[$img_num]['url'];
            $img_alt = $gallery[$img_num]['alt'];
    
            echo "<a href='$img_url'><img src='$img_url' alt='$img_alt'></a>";
        }
        ?>
        </div>
        <?php
    }
}

function getAllPropertiesGallery() {
    $the_pages = getPropInfo($pageID);

    if ($the_pages) { ?>
        <div class="gallery-grid">
        <?php
        foreach ($the_pages as $id => $title) {
            $gallery = get_field('gallery', $id);
            $count = count($gallery);

            for ($i = 0; $i < $count; $i++) {
                $img_num = "image_" . convertNumberToWord($i+1);

                if (!isset($gallery[$img_num]['url']) || empty($gallery[$img_num]['url'])) {
                    continue;
                }

                $img_url = $gallery[$img_num]['url'];
                $img_alt = $gallery[$img_num]['alt'];
        
                echo "<a href='$img_url'><img src='$img_url' alt='$img_alt'></a>";
            }
        }
        ?>
        </div>
    <?php
    }
}

function populateSelect($pageID) {
    $the_pages = getPropInfo($pageID);

    if ($the_pages) {
      foreach ($the_pages as $id => $title) {
        echo '<option value="'.$id.'">'.$title.'</option>';
      }
    }
}

function samsTheme_customScripts() {
    wp_enqueue_script('samsTheme-nav', get_stylesheet_directory_uri() . '/js/nav.js', array ('jquery',), '', true);
}   
add_action( 'wp_enqueue_scripts', 'samsTheme_customScripts' );

function samsTheme_InstallPluginsNotices() {
    global $pagenow;

    if ( $pagenow == 'index.php' ) {
		if(! in_array('advanced-custom-fields/acf.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
		    echo 
            '<div class="notice notice-warning is-dismissible">
            <p>Advanced Custom Fields must be installed for this theme to work correctly.</p>
            </div>';
		}

        if(! in_array('site-reviews/site-reviews.php', apply_filters('active_plugins', get_option('active_plugins')))){ 
            echo 
            '<div class="notice notice-warning is-dismissible">
            <p>Site reviews must be installed for this theme to work correctly.</p>
            </div>';
}
    }
}
add_action('admin_notices', 'samsTheme_InstallPluginsNotices');

// Login page customize
function samsTheme_Login() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?= esc_url( wp_get_attachment_url( get_theme_mod( 'custom_logo' )));?>);
            height: 220px;
            width: 75%;
            background-size: cover;
            background-repeat: no-repeat;
            text-align: center;
            background-position: center;
            border-radius:5px;
        }

        body.login {
            background:white;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'samsTheme_Login');

function samsTheme_logoURL() {
    return home_url();
}
add_filter( 'login_headerurl', 'samsTheme_logoURL' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo get_bloginfo( 'description' ); ?>">
    <meta name="author" content="">
<?php wp_head();?>
</head>
<body class>
  <header class="header <?php echo apply_filters('samsTheme_sticky_header_css', 'default');?>">

<nav class="main-nav <?php echo apply_filters('samsTheme_header_layout_css', 'default'), ' ', apply_filters('samsTheme_header_width_css', 'full-width');?>">
<?php if( has_custom_logo() ):
    // Get Custom Logo URL
    $custom_logo_id = get_theme_mod( 'custom_logo' );
    $custom_logo_data = wp_get_attachment_image_src( $custom_logo_id , 'full' );
    $custom_logo_url = $custom_logo_data[0];
?>
  <a class="site-home" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" rel="home">
    <img class="logo" src="<?php echo esc_url( $custom_logo_url ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>"/>
  </a>
<?php else: ?>
<a href="" class="site-name"><?php bloginfo( 'name' ); ?></a>
<?php endif; ?>
<?php
    wp_nav_menu( array(
        'theme_location'  => 'header',
    ) );
?>
</nav>
    </header>
<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
    <meta name="author" content="Sam Edwards">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400;700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css">
    <?php wp_head();?>
</head>
<body>
  <header class="header <?php echo apply_filters('samsTheme_sticky_header_css', 'default'); ?>">
    <nav role="primary-navigation" class="main-nav <?php echo apply_filters('samsTheme_header_layout_css', 'default'), ' ', apply_filters('samsTheme_header_width_css', 'full-width'); ?>">
    <?php if (has_custom_logo()):
        // Get Custom Logo URL
        $custom_logo_id = get_theme_mod('custom_logo');
        $custom_logo_data = wp_get_attachment_image_src($custom_logo_id , 'full');
        $custom_logo_url = $custom_logo_data[0];
    ?>
      <a class="site-home" href="<?php echo esc_url(home_url( '/' )); ?>" title="<?php echo esc_attr(get_bloginfo('name') ); ?>" rel="home">
        <img class="logo" src="<?php echo esc_url($custom_logo_url); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>"/>
      </a>
    <?php else: ?>
      <a href="" class="site-name"><?php bloginfo('name'); ?></a>
    <?php endif; ?>
    <button class="menu-button">Menu<i class="fa-solid fa-bars"></i></button>
    </nav>
    <nav class="side-nav">
      <div class="aside"></div>
      <div class="inner-wrapper">
      <button class="menu-button nav-closer">Close<i class="fa-solid fa-x"></i></button>
      <?php
      wp_nav_menu(array (
          'theme_location' => 'header',
      ));
    ?>
      </div>
    </nav>
  </header>
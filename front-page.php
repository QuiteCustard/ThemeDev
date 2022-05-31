<?php
get_header();
while (have_posts()): ?>
<?php the_post(); ?>

<div class="actual-content <?php echo apply_filters('samsTheme_body_width_css', 'default'); ?>">
<?php $image = get_field('background_image'); ?>
    <div class="full header-img" style="background-image:url(<?php echo $image['url']; ?>);">
        <h1 class="main-heading"><?php echo get_bloginfo('name'); ?></h1>
        <div class="form-container">
            <h2 class="heading"><?= the_field("heading"); ?></h2>
            <?php echo do_shortcode('[contact-form-7 id="16" title="Booking form"]'); ?>
        </div>
    </div>
    <div class="boxed properties">
        <h2>Our properties</h2>
        <?php $pageID=""; propertyCards($pageID); ?>
    </div>
    <div class="boxed home-gallery">
        <h2>Gallery</h2>
        <?php getAllPropertiesGallery(); ?>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
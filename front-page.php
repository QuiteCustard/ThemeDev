<?php
get_header();
while( have_posts() ): ?>
<?php the_post(); ?>
<?php $buttonText = get_field('button_text'); ?>

<div class="actual-content <?php echo apply_filters('samsTheme_body_width_css', 'default');?>">
<?php $image = get_field('home_header_image'); ?>
    <div class="full home-header" style="background-image:url(<?php echo $image['url']; ?>">
        <h1 class="home-h1"><?php echo get_bloginfo('name'); ?></h1>
        <div id="form-container">
            <h2><?= get_field('heading') ?></h2>
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
                <button class="button"><?= $buttonText ?></button>
            </form>
        </div>
    </div>
    <div class="boxed properties">
        <h2>Our properties</h2>
        <?= propertyCards($pageID); ?>
    </div>
    <div class="boxed gallery">
        <h2>Our properties</h2>
        <?= galleryItems($pageID); ?>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
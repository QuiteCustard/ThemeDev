<?php
get_header();
while( have_posts() ): ?>
<?php the_post(); ?>
<div class="actual-content <?php echo apply_filters( 'samsTheme_body_width_css', 'default' );?>">
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
                  
                </select>
            </label>
            <button class="button disabled"><?php echo get_field('button_text'); ?></button>
        </form>
    </div>
        <?php $image = get_field('home_header_image'); ?>
        <img class="full" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
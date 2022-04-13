<?php
get_header();
while( have_posts() ): ?>
    <?php the_post(); ?>
    <div class="actual-content <?php echo apply_filters( 'samsTheme_body_width_css', 'default' );?>">
        <?php the_content(); ?>
    </div>
<?php endwhile; ?>
 
 <?php get_footer(); ?>

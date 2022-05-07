<?php /* Template Name: Property template */ ?>
<?php
get_header();
?>
<?php while( have_posts() ): ?>
    <?php the_post(); ?>
    <div class="content-container boxed">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="actual-content">
            <div class="grid">
            <p>
                <?php echo get_field('description'); ?>
            </p>
            <?php $image = get_field('property_image'); ?>
            <img class="img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            <div class="cta">
                <h3>Interested?</h3>
                <p>If you'd like more information on <?php the_title();?>, get in touch here:</p>
                <button class="button">Hi</button>
            </div>
            <?php echo get_field('sleeps'); ?>
        </div>
    </div>
</div>
<?php endwhile; ?> 
<?php get_footer(); ?>
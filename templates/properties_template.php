<?php /* Template Name: Properties template */ ?>
<?php
get_header();
?>

<?php while( have_posts() ): ?>
    <?php the_post(); ?>
    <div class="content-container boxed">
        <h1 class="page-title"><?php the_title(); ?></h1>
      <?php getPropInfo(); ?>
    </div>
</div>
<?php endwhile; ?> 
<?php get_footer(); ?>
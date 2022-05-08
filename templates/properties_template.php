<?php /* Template Name: Properties template */ ?>
<?php 

$args = array(
    'post_type' => 'page',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key' => '_wp_page_template',
            'value' => 'templates/details_template.php' // Template file name
        )
    )
);
$the_pages = new WP_Query($args);

//echo "<pre>";print_r($the_pages->posts);
?>


<?php
get_header();
?>
<?php while( have_posts() ): ?>
    <?php the_post(); ?>
    <div class="content-container boxed">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <?php echo get_field("sleeps"); ?>
    </div>
</div>
<?php endwhile; ?> 
<?php get_footer(); ?>
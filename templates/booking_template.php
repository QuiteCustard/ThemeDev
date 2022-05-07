<?php /* Template Name: Booking template */ ?>
<?php
get_header();
?>
<?php while( have_posts() ): ?>

    <div class="content-container">
        <h1 class="page-title"><?php the_title(); ?></h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 actual-content">
                    <?php the_content(); ?>
                </div>
                <div class="col-sm-4">
                    <div class="featured-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?> 
<?php get_footer(); ?>
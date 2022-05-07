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
                <div class="info">
                    <p class="desc">
                        <?php echo get_field('description'); ?>
                    </p>
                    <div class="icons">
                        <i class="fa-solid fa-dog"></i>
                        <i class="fa-solid fa-car"></i>
                        <i class="fa-solid fa-umbrella-beach"></i>
                        <i class="fa-solid fa-heart-crack"></i>
                        <i class="fa-solid fa-house"></i>
                        <i class="fa-solid fa-building"></i>
                        <i class="fa-solid fa-user-group"></i>
                        <i class="fa-solid fa-people-roof"></i>
                        <i class="fa-solid fa-person-swimming"></i>
                        <i class="fa-brands fa-pagelines"></i>
                    </div>
                </div>
            <?php $image = get_field('property_image'); ?>
            <img class="img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            <div class="cta">
                <h3>Interested?</h3>
                <p>If you'd like more information on <?php the_title();?>, get in touch here:</p>
                <button class="button">Hi</button>
            </div>
            <div class="details">
                <h2>Basic information</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Heading</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Location:</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Sleeping space:</td>
                            <td><?php echo get_field('sleeps'); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="gallery"></div>
        </div>
    </div>
</div>
<?php endwhile; ?> 
<?php get_footer(); ?>
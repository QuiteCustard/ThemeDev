<?php /* Template Name: Details template */ ?>
<?php
get_header();
?>
<?php while( have_posts() ): ?>
    <?php the_post(); ?>
    <?php $pageID = $post->ID; ?>
    <div class="content-container boxed">
        <div class="actual-content">
            <div class="grid-container">
            <h1 class="page-title"><?php the_title(); ?></h1>
                    <div class="info">
                        <p class="desc">
                            <?php echo get_field('description'); ?>
                        </p>
                    <?php getIcons($id); ?>
                    </div>
                    <?php $image = get_field('property_image'); ?>
                    <a href="<?= $image['url'] ?>" class="img"><img src="<?= $image['url']; ?>" alt="<?=$image['alt']; ?>"></a>
                    <div class="cta">
                        <h3>Interested?</h3>
                        <p>If you'd like more information on <?php the_title();?>, get in touch here:</p>
                        <button class="button">Hi</button>
                    </div>
                    <div class="details">
                        <h2>Basic information</h2>
                        <table>
                            <tbody>
                                <tr>
                                    <td>Location:</td>
                                    <td><?= get_field("location");?></td>
                                </tr>
                                <tr>
                                    <td>How many people can sleep here:</td>
                                    <td>
                                        <?= $sleep = get_field("sleeps") . ' '; if($sleep > 1){echo 'people';}else{echo 'person';}?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Other information:</td>
                                    <td>
                                        <ul>
                                    <?php
                                    $icons = get_field("icons");
                                    if ($icons) {
                                    if ($icons['floors'] == "Single story") {
                                        echo "<li>Single story</li>";
                                    }
                                    else if ($icons['floors'] == "Multi story"){
                                        echo "<li>Multi story</li>";
                                    }

                                    if ($icons['beach'] == 1) {
                                    echo "<li>Close to a beach</li>";
                                    }

                                    if ($icons['disability_friendly'] == 1) {
                                        echo "<li>Disability friendly</li>";
                                    }

                                    if ($icons['family_friendly'] == 1) {
                                        echo "<li>Family friendly</li>";
                                    }

                                    if ($icons['dog_friendly'] == 1) {
                                        echo "<li>Pet friendly</li>";
                                    }

                                    if ($icons['parking'] == 1) {
                                    echo "<li>Has parking</li>";
                                    }

                                    if ($icons['pool'] == 1) {
                                    echo "<li>Has a pool</li>";
                                    }


                                    if ($icons['garden'] == 1) {
                                        echo "<li>Has a garden</li>";
                                    }
                                }?>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="gallery">
                        <h2>Gallery</h2>
                        <?php getPropertyGallery($pageID); ?>
                    </div>
                    <div class="reviews">
                        <h2>Reviews</h2>
                        <?php echo do_shortcode('[site_reviews assigned_posts=""]'); echo do_shortcode('[site_reviews_form assigned_posts=""]'); ?>
                    </div>
                    <div class="other-properties">
                        <h2>Other properties</h2>
                        <?php propertyCards($pageID); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endwhile; ?> 
<?php get_footer(); ?>
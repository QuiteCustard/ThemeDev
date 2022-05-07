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
                    </tbody>
                </table>
            </div>
            <div class="gallery">
            <h2>Gallery</h2>
            <div class="gallery-grid">
            <?php
                $gallery = get_field('gallery');
                if ($gallery) {
                    // Get amount of gallery items
                    $count = count($gallery);

                    for ($i = 0; $i < $count; $i++) {
                        $img_num = "image_" . convertNumberToWord($i+1);
                        $img_url = $gallery[$img_num]['url'];
                        $img_alt = $gallery[$img_num]['alt'];

                        echo "<img src='$img_url' alt='$img_alt'>";
                    } 
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?> 
<?php get_footer(); ?>
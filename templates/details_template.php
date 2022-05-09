<?php /* Template Name: Details template */ ?>
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
                        <?php $icons = get_field("icons");
                        if ($icons) {
                            if ($icons['floors'] == "Single story") {
                                echo "<div class='icon-wrapper single-story'><i class='fa-solid fa-house'></i><span>Single story</span></div>";
                            }
                            else if ($icons['floors'] == "Multi story"){
                                echo "<div class='icon-wrapper multi-story'><i class='fa-solid fa-building'></i><span>Multi story</span></div>";
                            }

                            if ($icons['beach'] == 1) {
                               echo "<div class='icon-wrapper beach'><i class='fa-solid fa-umbrella-beach'></i><span>Beach</span></div>";
                            }

                            if ($icons['disability_friendly'] == 1) {
                                echo "<div class='icon-wrapper disability'><i class='fa-solid fa-heart-crack'></i><span'>Disabililty friendly</span></div>";
                            }

                            if ($icons['family_friendly'] == 1) {
                                echo "<div class='icon-wrapper family'><i class='fa-solid fa-user-group'></i><span>Family friendly</span></div>";
                            }

                            if ($icons['dog_friendly'] == 1) {
                                echo "<div class='icon-wrapper dog'><i class='fa-solid fa-dog'></i><span>Dog friendly</span></div>";
                            }

                            if ($icons['parking'] == 1) {
                               echo "<div class='icon-wrapper parking'><i class='fa-solid fa-car'></i><span>Parking</span></div>";
                            }

                            if ($icons['pool'] == 1) {
                               echo "<div class='icon-wrapper pool'><i class='fa-solid fa-person-swimming'></i><span>Pool</span></div>";
                            }

                            if ($icons['garden'] == 1) {
                                echo "<div class='icon-wrapper garden'><i class='fa-brands fa-pagelines'></i><span>Garden</span></div>";
                            }
                        }
                        ?>    
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
                        <tr>
                            <td>Other information:</td>
                            <td>
                                <ul>
                            <?php
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
            <div class="gallery-grid">
            <?php
               $gallery = get_field('gallery');

               if ($gallery) {
                 // Get amount of gallery items
                 $count = count($gallery);
               
                 for ($i = 0; $i < $count; $i++) {
                   $img_num = "image_" . convertNumberToWord($i+1);
                   if (!isset($gallery[$img_num]['url']) || empty($gallery[$img_num]['url'])) {
                       continue;
                   }
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
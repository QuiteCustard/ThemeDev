<?php /* Template Name: Contact template */ ?>
<?php
get_header();
while( have_posts() ): ?>
<?php the_post(); ?>

<div class="actual-content <?php echo apply_filters('samsTheme_body_width_css', 'default');?>">
<?php $image = get_field('background_image'); ?>
    <div class="full header-img" style="background-image:url(<?php echo $image['url']; ?>">
        <div class="contact-details">
            <h2 class="main-heading">Contact us here:</h2>
            <p class="address"><?= get_field("first_line_address"); ?>, <?php $second = get_field("second_line_of_address"); if ($second) { echo $second . ", ";} ?><?= get_field("city_town"); ?>, <?= get_field("postcode_zipcode"); ?>, <?= get_field("country");?></p>
            <a class="number" href="tel:<?= get_field("number"); ?>"><?= get_field("number"); ?></a>
            <a class="email" href="mailto:<?= get_field("email"); ?>"><?= get_field("email"); ?></a>
        </div>
        <div class="form-container">
            <h2 class="heading"><?= get_field('heading'); ?></h2>
            <form class="content-form">
                <label>Name:
                    <input type="text" placeholder="Your name..." required>
                    </label>
                    <label>Email:
                    <input type="email" placeholder="Your email..." required>
                    </label>
                    <label>Subject:
                    <input type="text" placeholder="Subject..." required>
                    </label>
                    <label>Message:
                    <textarea placeholder="Your message..." required></textarea>
                    </label>
                        <input class="button" type="submit" value="<?= get_field('button_text'); ?>">
            </form>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php get_footer(); ?>
<footer id="site-footer" class="footer">
    <div class="widgets <?php echo apply_filters('samsTheme_footer_layout_css', 'default'); ?>">
            <?php if (is_active_sidebar('footer-section-one')) : ?>
                <div class="footer-section-one">
                    <?php dynamic_sidebar('footer-section-one'); ?>
                </div>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer-section-two')) : ?>
                <div class="footer-section-two">
                    <?php dynamic_sidebar('footer-section-two'); ?>
                </div>
            <?php endif; ?>
            <?php if (is_active_sidebar('footer-section-three')) : ?>
                <div class="footer-section-three">
                    <?php dynamic_sidebar('footer-section-three'); ?>
                </div>
            <?php endif; ?>
            <?php if (is_active_sidebar( 'footer-section-four')) : ?>
                <div class="footer-section-four">
                    <?php dynamic_sidebar('footer-section-four'); ?>
                </div>
            <?php endif; ?>
            </div>
            <div class="copyright"><p>	&copy; <?php echo $site_title = get_bloginfo('name'), " ", date("Y"); ?></p></div>
        </footer><!-- End of Footer -->
        <?php wp_footer(); ?>
    </body>
</html>
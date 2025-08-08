<?php if($content = get_field( 'cta_text', 'option' )): ?>
<div class="footer-top-bar py-4 bg-primary">
    <div class="rane-container">
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-12">
            <div class="text-xl text-white font-bold"><?php echo $content; ?></div>

            <a href="<?php echo esc_url(get_field( 'cta_button_link', 'option' )); ?>" class="rane-button">
                <?php echo esc_html( get_field( 'cta_button_text', 'option' )); ?>
            </a>
        </div>
    </div>
</div>
<?php endif; ?>
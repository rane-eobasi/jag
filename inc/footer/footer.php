<div class="bg-white">
    <?php get_template_part( 'inc/footer/footer-cta' ); ?>
    <?php get_template_part( 'inc/footer/footer-main' ); ?>
    <?php get_template_part( 'inc/footer/footer-bottom' ); ?>
</div>

<script>
    jQuery(document).ready(function($) {
        $(window).on('scroll', function() {
            if ($(this).scrollTop() > 50) {
                $('body').addClass('scrolling');
            } else {
                $('body').removeClass('scrolling');
            }
        });
    });
</script>
<?php
/**
 * The front page slider
 */

$wow_delay = 0.2;

if( have_rows( 'rptr_slides' )): 
    $count = 0; // Initialize count
    $total_slides = count(get_field('rptr_slides')); // Get total number of slides
?>
<div class="fp-slideshow" id="slideshow">
    <?php while( have_rows( 'rptr_slides' )): the_row();

        // Vars
        $slide = get_sub_field( 'slide' );		
        $slide_url = $slide[ 'url' ];
        $title_text = get_sub_field( 'title_text' );
        $main_text = get_sub_field( 'main_text' );
        $button_text = get_sub_field( 'button_text' );
        $button_link = get_sub_field( 'button_link' );		

    ?>
    <!-- repeated code -->
    <div class="fp-slideshow__slide">
        <div class="relative h-auto lg:min-h-screen py-32 flex flex-col items-center justify-center bg-center bg-no-repeat bg-cover" style="background-image: url(<?php echo $slide_url; ?>);">
            <!-- Overlay -->
            <div class="absolute inset-0 bg-gradient-to-r from-primary to-primary/30"></div>

            <!-- Slide Content -->
            <div class="fp-slideshow__content rane-container relative z-10 text-white">
                <div class="w-full lg:w-1/2">
                    <?php if( $count === 0 && $title_text ): // First record as h1 ?>
                        <h1 class="fp-slideshow__title rane-heading rane-heading--hero font-black leading-tight mb-4 wow fadeInUp" data-wow-delay="<?php echo $wow_delay; ?>s">
                            <?php echo $title_text; ?>
                        </h1>
                    <?php elseif( $title_text ): // Subsequent records as h2 ?>
                        <h2 class="fp-slideshow__title rane-heading rane-heading--hero font-black leading-tight mb-4 wow fadeInUp" data-wow-delay="<?php echo $wow_delay; ?>s">
                            <?php echo $title_text; ?>
                        </h2>
                    <?php endif; ?>

                    <?php if( $main_text ): ?>
                        <p class="fp-slideshow__text text-lg sm:text-2xl lg:text-2xl font-bold mb-6 wow fadeInUp" data-wow-delay="<?php echo $wow_delay; ?>s">
                            <?php echo $main_text; ?>					
                        </p>
                    <?php endif; ?>

                    <?php if( $button_text && $button_link ): ?>
                        <a href="<?php echo esc_url( $button_link ); ?>" class="rane-button rane-button--hero wow fadeInUp" data-wow-delay="<?php echo $wow_delay; ?>s">
                            <?php echo esc_html( $button_text ); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>		
        </div>
    </div>
    <?php $wow_delay += 0.2; $count++; endwhile; ?>
</div>
<?php endif; ?>

<script type="text/javascript">
jQuery.noConflict();
(function( $ ) {
    $(function() {
        
        /* ======================================== */  
        /* Init Slick Slider
        /* ======================================== */

        $('.fp-slideshow').slick({
            dots: false,
            arrows: false,
            infinite: true,
            speed: 500,
            fade: true,
            cssEase: 'linear',
            autoplay: true,
            autoplaySpeed: 4000
        });
        
    });
})(jQuery);
</script>
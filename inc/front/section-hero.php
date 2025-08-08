<?php
    $hero_content = get_field( 'hero_content' );
    $image = $hero_content['image'] ?? [];
    $title = $hero_content['title'] ?? '';
    $content = $hero_content['content'] ?? '';
    $buttons = $hero_content['buttons'] ?? [];
?>

<section class="bg-white bg-no-repeat w-full relative min-h-[622px] flex flex-col justify-end items-center" style="background-image: url('<?php rane_text_media('front_hero_bg', 'url'); ?>'); background-size: 100% 100%; background-position: center bottom;">
    <div class="rane-container pt-32 lg:pt-[260px]">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
            <div class="">
                <h1 class="rane-heading rane-heading--hero mb-4">
                    <?php echo $title ; ?>
                </h1>
                <div class="text-lg md:text-xl text-gray-700 mb-6">
                    <?php echo wp_kses_post( $content ); ?>
                </div>
                <div class="flex flex-col sm:flex-row gap-4 mb-4">
                    <?php foreach ( $buttons as $button ): ?>
                        <a href="<?php echo esc_url( $button['link'] ); ?>" class="rane-button">
                            <?php echo esc_html( $button['label'] ); ?>
                        </a>
                    <?php endforeach; ?>
                </div>
                <?= do_shortcode('[trustpilot]'); ?>
            </div>
            <div class="flex lg:justify-end">
                <?php if( $image_url =  $image['url'] ): ?>
                    <img src="<?php echo esc_url($image_url ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" class="w-full lg:w-[267px] h-auto object-cover">
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php get_template_part( 'inc/parts/features' ); ?>
</section>

<?php
$values_section_title = get_field('values_section_title', 7);
$values_section_description = get_field('values_section_description', 7);
$wow_delay = 1;

if( have_rows('rptr_values', 'option')):
?>
    <section class="services py-16 lg:py-24">
        <div class="rane-container">
            <div class="text-center mb-8">
                <h2 class="rane-heading rane-heading--section"><?php echo esc_html($values_section_title); ?></h2>
                <p class="text-lg"><?php echo esc_html($values_section_description); ?></p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-3 items-stretch gap-8">
                <?php while( have_rows('rptr_values', 'option')): the_row(); ?>
                    <?php get_template_part( 'inc/partials/value-item', null, [
                        'wow_delay' => $wow_delay
                    ] ); $wow_delay += 2; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
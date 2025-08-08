<?php get_template_part('inc/parts/hero', null, ['buttons' => [
    [
        'text' => 'AquaAid for Business',
        'url' => '/aquaaid-for-business/',
    ],
    [
        'text' => 'AquaAid for Home',
        'url' => '/aquaaid-for-home/',
    ],
]]); ?>
<section class="bg-gradient-to-tr from-gray-50 to-secondary/5">
    <?php get_template_part('inc/about/section', 'who-we-are'); ?>
    <?php get_template_part('inc/about/section', 'why'); ?>
</section>
<?php get_template_part( 'inc/front/section', 'testimonials' ); ?>
<section class="bg-gradient-to-b from-white to-gray-100 ">
    <?php get_template_part( 'inc/about/section', 'members' ); ?>
    <?php get_template_part( 'inc/front/section', 'enquiry' ); ?>
</section>
<?php get_template_part( 'inc/front/section', 'clients' ); ?>

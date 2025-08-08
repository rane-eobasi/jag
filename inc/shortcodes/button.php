<?php
// Retrieve the 'attr' variable passed through the shortcode
$atts = get_query_var('attr', []); 

// Set defaults for the attributes
$label = esc_html($atts['label'] ?? '');
$url = $atts['url'] ?? '';
$type = $atts['type'] ?? 'primary';
$class =  "rane-button rane-button--{$type}" . esc_attr($atts['class'] ?? '');
$icon_class = $atts['icon_class'] ?? '';

?>
<a href="<?php echo $url; ?>" class="<?php echo $class; ?>">
    <?php echo $label; ?>
    <?php if ($icon): ?>
        <span class="icon">
            <i class="fa <?php echo esc_attr($icon_class); ?>"></i>
        </span>
    <?php endif; ?>
</a>
<?php

$social_links = [
    'facebook' => get_field( 'facebook_link_opt', 'options' ),
    'twitter' => get_field( 'twitter_link_opt', 'options' ),
    'instagram' => get_field( 'instagram_link_opt', 'options' ),
    'linkedin' => get_field( 'linkedin_link_opt', 'options' ),
];
?>
<ul class="flex items-center space-x-4">
    <?php foreach ( $social_links as $platform => $link ): ?>
        <?php if ( $link ): ?>
            <li class="social-icons__item">
                <a href="<?php echo esc_url( $link ); ?>" class="social-icons__link" target="_blank" rel="noopener noreferrer">
                    <i class="fa-brands fa-<?php echo esc_attr( $platform ); ?>"></i>
                    <span class="screen-reader-text">
                        Follow on <?php echo ucfirst( esc_html( $platform ) ); ?>
                    </span>
                </a>
            </li>
        <?php endif; ?>
    <?php endforeach; ?>
</ul>
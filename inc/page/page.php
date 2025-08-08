<?php
/**
 * A simple default page builder for all pages.
 * This can be used with most pages on a site including
 * legal pages and generic content pages
 */

if( have_rows('rane_page_builder') ): ?>
<section class="section page-wrap">
    <?php while ( have_rows('rane_page_builder') ) : the_row();

        // Determine layout type
        switch (get_row_layout()):
 
            // Text & Image Columns
            case 'text_col_image_col':            
                get_template_part( 'inc/page/text-col-image-col' );
                break; 

            // Text Column Only
            case 'text_only':
                get_template_part( 'inc/page/text-only' );
                break; 

        endswitch;
    endwhile; ?>
</section>
<?php endif; ?>
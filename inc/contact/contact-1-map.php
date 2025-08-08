<?php
/**
 * Map code to output full width map
 */

the_field( 'opt_google_maps_embed_code', 'options' );

$map_code = get_field( 'opt_google_maps_embed_code', 'options' );
echo $map_code;
?>
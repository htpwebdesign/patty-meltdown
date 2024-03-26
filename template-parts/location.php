<?php	
    if( have_rows('locations_map') ): ?>
        <div class="acf-map" data-zoom="16">
            <?php while ( have_rows('locations_map') ) : the_row();?>
                <?php $location = get_sub_field('map'); ?>
                
                <div class="marker" data-lat="<?php echo esc_attr($location['lat']); ?>" 
                                    data-lng="<?php echo esc_attr($location['lng']); ?>">
                    <p><?php the_sub_field('title')?></p>
                    <p><?php echo esc_html($location['address'])?></p>
                </div>
        <?php endwhile; ?>
        </div>
    <?php endif; ?>
			 
<section class="contact-locations">

    <?php
    if (function_exists('get_field')) {
        if (have_rows('contact_locations', 23)) :
            while (have_rows('contact_locations', 23)) : the_row();
                // Output your repeater field values here
                echo "<article>";
                echo "<h3>";
                the_sub_field('location_name', 23);
                echo "</h3>";
                echo "<p>";
                the_sub_field('location_address', 23);
                echo "</p>";
                echo "<p>";
                the_sub_field('location_hours', 23);
                echo "</p>";
                echo "<p>";
                the_sub_field('location_phone', 23);
                echo "</p>";

                echo "</article>";

            endwhile;

        else :
        // No rows found
        endif;
    }
    ?>
</section>

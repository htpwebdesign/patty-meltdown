<?php

?>

<section class="map">
    <?php
    if (function_exists('get_field') && get_field('contact_map')) {
        the_field('contact_map');
    } else {
        echo '<p>Map not available.</p>';
    }
    ?>
</section>

<section class="contact-locations">

    <?php
    if (have_rows('contact_locations')) :
        while (have_rows('contact_locations')) : the_row();
            // Output your repeater field values here

            echo "<p>";
            the_sub_field('location_name');
            echo "</p>";
            echo "<p>";
            the_sub_field('location_address');
            echo "</p>";
            echo "<p>";
            the_sub_field('location_hours');
            echo "</p>";
            echo "<p>";
            the_sub_field('location_phone');
            echo "</p>";

        endwhile;
    else :
    // No rows found
    endif;
    ?>
</section>
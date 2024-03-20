<?php

?>

<section class="map">
    <?php
    if (function_exists('get_field') && get_field('contact_map', 23)) {
        the_field('contact_map', 23);
    } else {
        echo '<p>Map not available.</p>';
    }
    ?>
</section>

<section class="contact-locations">

    <?php
    if (function_exists('get_field')) {
        if (have_rows('contact_locations', 23)) :
            while (have_rows('contact_locations', 23)) : the_row();
                // Output your repeater field values here
                echo "<article>";
                echo "<h2>";
                the_sub_field('location_name', 23);
                echo "</h2>";
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
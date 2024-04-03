<?php
$args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => 3,
    'orderby' => 'rand'
);

$query = new WP_Query($args);

if ($query->have_posts()) {
    echo "<div class='testimonials'>";
    while ($query->have_posts()) {
        $query->the_post();
        the_content();
    }
    wp_reset_postdata();
    echo "</div>";
}

<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Patty_Meltdown
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php

    $carousel_items = get_field('carousel');
    if ($carousel_items) : ?>
        <ul>
            <?php foreach ($carousel_items as $post) :

                setup_postdata($post); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail'); // Display the post thumbnail with 'thumbnail' size 
                        ?>
                    </a>
                    <div>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
    <?php endif; ?>

    <h2>Featured Menu Items</h2>

    <?php

    $featured_items = get_field('featured_menu_items');
    if ($featured_items) : ?>
        <ul>
            <?php foreach ($featured_items as $post) :

                setup_postdata($post); ?>
                <li>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail'); // Display the post thumbnail with 'thumbnail' size 
                        ?>
                    </a>
                    <div>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
        // Reset the global post object so that the rest of the page works correctly.
        wp_reset_postdata(); ?>
    <?php endif; ?>



    <h2>Testimonials</h2>
    <?php
    get_template_part("template-parts/testimonial-randomizer");
    ?>



    <h2>Gift Card</h2>
    <?php
    if (function_exists('get_field')) {
        if (get_field('gift_card_text_blurb')) {

            echo "<p>";
            the_field('gift_card_text_blurb');
            echo "</p>";
        }
    }

    get_template_part("template-parts/gift-card");
    ?>

    <h2>Instagram</h2>
    <?php
    echo do_shortcode("[instagram-feed feed=1]");
    ?>

    <h2>Contact</h2>

    <section class="contact-locations">

        <?php
        get_template_part("template-parts/location")
        ?>
    </section>

</main><!-- #main -->

<?php
get_footer();

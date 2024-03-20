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


    <section>
        <?php

        while (have_posts()) :
            the_post();


            if (function_exists('get_field')) {
                $carousel_items = get_field('carousel');
                if ($carousel_items) : ?>
                    <nav class="featured-carousel-item">
                        <?php foreach ($carousel_items as $post) :

                            setup_postdata($post); ?>
                            <article>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('thumbnail'); // Display the post thumbnail with 'thumbnail' size 
                                    ?>
                                </a>
                                <div>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </div>
                            </article>
                        <?php endforeach; ?>
                    </nav>
                    <?php

                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
            <?php endif;
            }
            ?>
    </section>



    <section>
        <h2>Featured Menu Items</h2>

        <?php
            if (function_exists('get_field')) {
                $featured_items = get_field('featured_menu_items');
                if ($featured_items) : ?>
                <nav>
                    <?php foreach ($featured_items as $post) :

                        setup_postdata($post); ?>
                        <article class="featured-menu-item">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('thumbnail'); // Display the post thumbnail with 'thumbnail' size 
                                ?>
                            </a>
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </article>
                    <?php endforeach; ?>
                </nav>
                <?php
                    // Reset the global post object so that the rest of the page works correctly.
                    wp_reset_postdata(); ?>
        <?php endif;
            }
        ?>
    </section>

    <section>
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
    </section>

    <section>
        <h2>Instagram</h2>
        <?php
            echo do_shortcode("[instagram-feed feed=1]");
        ?>
    </section>



    <section class="contact-locations">
        <h2>Contact</h2>

        <?php
            get_template_part("template-parts/location")
        ?>
    </section>

<?php
        endwhile
?>
</main><!-- #main -->

<?php
get_footer();

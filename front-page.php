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
        <header class="page-header">
            <h1 class="page-title"><?php esc_html_e( 'Patty Meltdown', 'patty-meltdown' ); ?></h1>
        </header><!-- .page-header -->
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
        <?php
        if (function_exists('get_field')) {
                $featured_menu_heading = get_field('featured_menu_heading');
                if ($featured_menu_heading) {
                    echo "<h2>" . $featured_menu_heading . "</h2>";
                }
            }
        ?>

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
        <?php
        if (function_exists('get_field')) {
                $testimonials_heading = get_field('testimonials_heading');
                if ($testimonials_heading) {
                    echo "<h2>" . $testimonials_heading . "</h2>";
                }
            }
        ?>
    

        <?php
            get_template_part("template-parts/testimonial-randomizer");
        ?>

    </section>

    <section>
        <?php
        if (function_exists('get_field')) {
                $gift_card_heading = get_field('gift_card_heading');
                if ($gift_card_heading) {
                    echo "<h2>" . $gift_card_heading . "</h2>";
                }
            }
        ?>
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
        <?php
        if (function_exists('get_field')) {
                $instagram_heading = get_field('instagram_heading');
                if ($instagram_heading) {
                    echo "<h2>" . $instagram_heading . "</h2>";
                }
            }
        ?>
        <?php
            echo do_shortcode("[instagram-feed feed=1]");
        ?>
    </section>



    <section class="contact-locations">
        <?php
        if (function_exists('get_field')) {
                $contact_locations_heading = get_field('contact_locations_heading');
                if ($contact_locations_heading) {
                    echo "<h2>" . $contact_locations_heading . "</h2>";
                }
            }
        ?>

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

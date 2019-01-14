<?php
/**
 * The template for displaying Event single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @since 1.0.0
 */

get_header();
?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main">

			<?php

			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <header class="entry-header">
						<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
                    </header>

                    <div class="entry-content">

                        <?php
						// Find connected pages
						$connected = new WP_Query( array(
							'connected_type' => 'events_to_event_days',
							'connected_items' => get_queried_object(),
							'nopaging' => true,
						) );

						// Display connected Event days
						if ( $connected->have_posts() ) : ?>
                            <h2>Related event day:</h2>
                                <?php while ( $connected->have_posts() ) : $connected->the_post(); ?>
                                    <div class="event_day <?php echo 'event_day-' . get_the_ID(); ?>">
                                        <div class="event_day--thumbnail">
                                            <?php
                                            if ( $cover_photo = get_post_meta( get_the_ID(), 'cover_photo', true ) ) {
                                                echo wp_get_attachment_image( $cover_photo );
                                            }
                                            ?>
                                        </div>
                                        <h3><?php the_title(); ?></h3>
                                        <?php
                                            if ( $date = get_post_meta( get_the_ID(), 'date', true ) ) {
                                                echo '<p class="event_day--date">' . date("Y-m-d", strtotime($date)) . '</p>';
                                            }
                                        ?>
                                    </div>
                                <?php endwhile; ?>

							<?php
                            // Prevent weirdness
							wp_reset_postdata();

						endif;
                        ?>
                    </div><!-- .entry-content -->

                    </article><!-- #post-${ID} -->
                <?php

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_footer();
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Business
 */

get_header(); ?>

	
      <main>
        <section class="well1">
          <div class="container">
            <?php
            /* Оригинальный код WP со страницы page.php*/
			      while ( have_posts() ) : the_post();

				        get_template_part( 'template/content', 'page' );

				        // If comments are open or we have at least one comment, load up the comment template.
				        if ( comments_open() || get_comments_number() ) :
					      comments_template();
				        endif;

			      endwhile; // End of the loop.
			      ?>
          </div>
        </section>
      </main><!-- #main -->
	

<?php
/*
get_sidebar();
*/
get_footer();

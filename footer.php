<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Business
 */

?>

	</div><!-- #content -->

      <footer>
        <section>
          <div class="container">
            <div class="copyright">
              <?php if (ot_get_option('copyright_footer')) { ?>
                  <?php echo ot_get_option('copyright_footer'); ?></p>
              <?php } else { ?> 
              Все защищено
              <?php } ?> © <span id="copyright-year"></span>.
            </div>
          </div>
        </section>
      </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

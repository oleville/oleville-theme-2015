<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package oleville
 */
?>

	<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="content-wrapper">
       <div class="site-info"> 
			<img src="<?php bloginfo('template_directory'); echo '/img/footer.png'; ?>" width="368" height="60" alt="St. Olaf College's Student Government" />
      </div><!-- .site-info -->
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

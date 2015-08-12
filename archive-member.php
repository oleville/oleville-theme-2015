<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package oleville
 */
 
 
 get_header(); ?>

  	<div class="breadcrumb">
		<div class="content-wrapper">
			<?php if(function_exists('bcn_display')) bcn_display(); ?>
		</div>
	</div>
	<div id="primary" class="content-wrapper">
		<div class="page-header-wrapper">
			<div class="social-media">
			<?php if (get_theme_mod( 'facebook_textbox' )) { ?>
				<a href="<?php echo get_theme_mod( 'facebook_textbox' ) ?>" alt="Facebook">
					<img name="Oleville" src="<?php bloginfo('template_directory'); echo '/img/social/fb.png'; ?>" width="40" height="40" alt="" />
				</a>
			<?php } ?>
			<?php if (get_theme_mod( 'twitter_textbox' )) { ?>
				<a href="<?php echo get_theme_mod( 'twitter_textbox' ) ?>" alt="Twitter">
					<img name="Oleville" src="<?php bloginfo('template_directory'); echo '/img/social/tw.png'; ?>" width="49" height="40" alt="" />
				</a>
			<?php } ?>
			<?php if (get_theme_mod( 'instagram_textbox' )) { ?>
				<a href="<?php echo get_theme_mod( 'instagram_textbox' ) ?>" alt="Twitter">
					<img name="Oleville" src="<?php bloginfo('template_directory'); echo '/img/social/in.png'; ?>" width="40" height="40" alt="" />
				</a>
			<?php } ?>
			</div>
			<div class="page-header">
				Meet the <?php echo bloginfo('name'); ?> Members
			</div>
		</div>
		<div class="left-sidebar">
			<?php if ( has_nav_menu( 'internal-navigation' ) ) : ?>
				<div class="internal-navigation">
					<?php wp_nav_menu( array( 'theme_location' => 'internal-navigation') ); ?>
				</div><!-- .internal-navigation -->
			<?php endif; ?>
			<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
				<?php dynamic_sidebar( 'sidebar' ); ?>
			<?php endif; ?>
		</div>
		<div class="main-content">
			<div class="entry-content">
				<?php /* Start the Loop */ $first = $_GET['m'] ? $_GET['m'] : NULL; ?>
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						$slug = basename(get_permalink());
						if(!$first)
							$first = $slug;
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						include(locate_template('content-member-display.php'))
					?>

				<?php endwhile; ?>
	      
	      		<?php rewind_posts(); ?>
	      		<div class="others selector members">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
						$slug = basename(get_permalink());
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */

						include(locate_template('content-member-photo.php'))
					?>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>

<?php get_footer(); ?>
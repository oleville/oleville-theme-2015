<?php
/**
 * The template for displaying all pages.
 * 
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
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
				<?php the_title(); ?>
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
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
			<?php endwhile; // end of the loop. ?>
		</div>
	</div>
		
    

<?php get_footer(); ?>
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
			<div class="page-header">Available Positions</div>
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
        	<img class="aligncenter size-full wp-image-107" src="http://oleville.com/elections/wp-content/uploads/sites/18/2015/02/senate.jpg" alt="Senate" width="800" height="250">
            <h2>Represent Your Peers</h2>
        	<p>Being a part of Student Government Association is a great way to be involved on campus and be a voice for the student body. Through a variety of positions, YOU will have the ability to program fun events for Oles, be a part of important conversations and change our campus for the better. You can apply or vote for the Branch Coordinator positions in any one of SGA's ten branches or be a part of Senate as a Special Constituency Senator.</p>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'position-list' ); ?>
			<?php endwhile; // end of the loop. ?>
		</div>
	</div>

<?php get_footer(); ?>

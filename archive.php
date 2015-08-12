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
				<?php
						if ( is_category() ) :
							single_cat_title();

						elseif ( is_tag() ) :
							single_tag_title();

						elseif ( is_author() ) :
							printf( __( 'Author: %s', 'oleville' ), '<span class="vcard">' . get_the_author() . '</span>' );

						elseif ( is_day() ) :
							printf( __( 'Day: %s', 'oleville' ), '<span>' . get_the_date() . '</span>' );

						elseif ( is_month() ) :
							printf( __( 'Month: %s', 'oleville' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'oleville' ) ) . '</span>' );

						elseif ( is_year() ) :
							printf( __( 'Year: %s', 'oleville' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'oleville' ) ) . '</span>' );

						elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
							_e( 'Asides', 'oleville' );

						elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
							_e( 'Galleries', 'oleville' );

						elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
							_e( 'Images', 'oleville' );

						elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
							_e( 'Videos', 'oleville' );

						elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
							_e( 'Quotes', 'oleville' );

						elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
							_e( 'Links', 'oleville' );

						elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
							_e( 'Statuses', 'oleville' );

						elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
							_e( 'Audios', 'oleville' );

						elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
							_e( 'Chats', 'oleville' );

						else :
							_e( 'Archives', 'oleville' );

						endif;
					?>
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
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; // end of the loop. ?>
		</div>
	</div>

<?php get_footer(); ?>

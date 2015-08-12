<?php
/**
 * The template for displaying search results pages.
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
				<?php printf( __( 'Search Results for: %s', 'oleville' ), '<span>' . get_search_query() . '</span>' ); ?>
			</div>
		</div>
		<div class="branch-content">
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
				?>

			<?php endwhile; ?>

			<?php oleville_paging_nav(); ?>
		</div>
	</div>
		
    

<?php get_footer(); ?>


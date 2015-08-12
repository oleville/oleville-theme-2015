<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package oleville
 */

get_header(); ?>

<div class="branch-nav">
	<?php wp_nav_menu( array( 'theme_location' => 'branch-left', 'walker' => new branch_walker()) ); ?>
</div>

<div class="content-wrapper front clear">
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
			<header class="page-header">
				<h1 class="page-title">
					<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?>
				</h1>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( '<div class="taxonomy-description">%s</div>', $term_description );
					endif;
				?>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php
					/* Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'content', 'member' );
				?>

			<?php endwhile; ?>

			<?php oleville_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->
</div><!-- .content-wrapper -->

<div class="branch-nav right">
	<?php wp_nav_menu( array( 'theme_location' => 'branch-right', 'walker' => new branch_walker()) ); ?>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>

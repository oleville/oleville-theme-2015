<?php
/**
 * @package oleville
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('member-viewer clear'); ?>>

<?php if ( has_post_thumbnail() ) { // Check If post has post thumbnail. ?>
									<div class="thumbnail" title="<?php printf( esc_attr__( 'Permalink to %s', 'rpwe' ), the_title_attribute('echo=0' ) ); ?>" rel="bookmark">
										<?php the_post_thumbnail(array(300,250)); ?>
                    <div class="position"> <?php echo get_post_meta(get_the_ID(), 'position', TRUE); ?> </div>
									</div>
								<?php } // endif ?>
<?php if (  $subcommittee = get_post_meta(get_the_ID(), 'subcommittee', TRUE) ) { // Check If post has post subcommittee. ?>
									<div class="subcommitee">Subcommittee: <?php echo $subcommittee; ?> </div>
								<?php } // endif ?>
	<div class="member-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'oleville' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'oleville' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

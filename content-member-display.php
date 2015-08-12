<?php
/**
 * @package oleville
 */
?>

<article id="<?php echo $slug; ?>" <?php $classes = ($slug == $first) ? 'member-viewer clear' : 'member-viewer hidden clear'; post_class($classes); ?>>

<?php if ( has_post_thumbnail() ) { // Check If post has post thumbnail. ?>
									<div class="thumbnail" title="<?php printf( esc_attr__( 'Permalink to %s', 'rpwe' ), the_title_attribute('echo=0' ) ); ?>" rel="bookmark">
										<?php the_post_thumbnail(array(300,300)); ?>
                    <div class="position"> <?php echo get_post_meta(get_the_ID(), 'position', TRUE); ?> </div>
									</div>
								<?php } else { // endif ?>
									<div class="thumbnail" title="<?php printf( esc_attr__( 'Permalink to %s', 'rpwe' ), the_title_attribute('echo=0' ) ); ?>" rel="bookmark">
										<img src="http://www.oleville.com/wp-content/themes/oleville-live/img/placeholder.png" height="300" width="212" />
                    					<div class="position"> <?php echo get_post_meta(get_the_ID(), 'position', TRUE); ?> </div>
									</div>
								<?php } ?>
 	<?php echo '<h2 class="name">'. get_the_title() . ' \'' . get_post_meta(get_the_ID(), 'class', TRUE) . '</h1>'; ?>
<?php if (  $subcommittee = get_post_meta(get_the_ID(), 'subcommittee', TRUE) ) { // Check If post has post subcommittee. ?>
									<div class="subcommitee">Subcommittee: <?php echo $subcommittee; ?> </div>
								<?php } // endif ?>
                <?php if (  $major = get_post_meta(get_the_ID(), 'major', TRUE) ) { // Check If post has post subcommittee. ?>
									<div class="subcommitee">Major: <?php echo $major; ?> </div>
								<?php } // endif ?>
                <?php if (  $contact = get_post_meta(get_the_ID(), 'contact', TRUE) ) { // Check If post has post subcommittee. ?>
									<div class="subcommitee">Contact: <a href="mailto:<?php echo $contact; ?>"><?php echo $contact; ?></a></div>
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

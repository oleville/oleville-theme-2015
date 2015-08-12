<?php
/**
 * @package oleville
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if ( has_post_thumbnail() ) { // Check If post has post thumbnail. ?>
									<div class="thumbnail" title="<?php printf( esc_attr__( 'Permalink to %s', 'rpwe' ), the_title_attribute('echo=0' ) ); ?>" rel="bookmark">
										<?php the_post_thumbnail(array(300,250)); ?>
									</div>
								<?php } // endif ?>
	<div class="entry-content">
		 <?php if(get_post_meta($id, 'director1', TRUE)) { ?>
    <div class="program-directors">
    <h2 class="blue-header">Program Directors</h2>
    <?php $id = get_the_ID(); ?>
    <?php if(get_post_meta($id, 'director1', TRUE)) { ?>
    <p class="director-info"><?php echo get_post_meta($id, 'director1', TRUE); ?> (<a href="mailto:<?php echo get_post_meta($id, 'director1email', TRUE); ?>"><?php echo get_post_meta($id, 'director1email', TRUE); ?></a>)</p>
    <?php } ?>
    <?php if(get_post_meta($id, 'director2', TRUE)) { ?>
    <p class="director-info"><?php echo get_post_meta($id, 'director2', TRUE); ?> (<a href="mailto:<?php echo get_post_meta($id, 'director2email', TRUE); ?>"><?php echo get_post_meta($id, 'director2email', TRUE); ?></a>)</p>
    <?php } ?>
    <?php if(get_post_meta($id, 'director3', TRUE)) { ?>
    <p class="director-info"><?php echo get_post_meta($id, 'director3', TRUE); ?> (<a href="mailto:<?php echo get_post_meta($id, 'director3email', TRUE); ?>"><?php echo get_post_meta($id, 'director3email', TRUE); ?></a>)</p>
    <?php } ?>
    <?php if(get_post_meta($id, 'director4', TRUE)) { ?>
    <p class="director-info"><?php echo get_post_meta($id, 'director4', TRUE); ?> (<a href="mailto:<?php echo get_post_meta($id, 'director4email', TRUE); ?>"><?php echo get_post_meta($id, 'director4email', TRUE); ?></a>)</p>
    <?php } ?>
    </div>
    <?php } ?>
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

<?php
/**
 * @package oleville
 */
?>

<article id="<?php echo $slug; ?>" <?php $classes = ($slug == $first) ? 'member-viewer clear' : 'member-viewer hidden clear'; post_class($classes); ?>>
<div style=" float:left; width:56%;">
<?php if ( has_post_thumbnail() ) { // Check If post has post thumbnail. ?>
									<div class="thumbnail" title="<?php printf( esc_attr__( 'Permalink to %s', 'rpwe' ), the_title_attribute('echo=0' ) ); ?>" rel="bookmark">
										<?php the_post_thumbnail(array(250,250)); ?>
                    <div class="position"> <?php echo get_post_meta(get_the_ID(), 'position', TRUE); ?> </div>
									</div>
								<?php } // endif ?>
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
</div>
	<div style="width:44%; font-size: 13px; float:left; margin:0; padding: 10px; background-color: #D1F5EF" class="member-content">
  <h2> A Note from the Chair </h2>
		Hello, my name is Nick Stumo-Langer and I am the SGA Vice President and Student Senate chair for the 2014-2015 school year.  Senate is a place that student ideas and concerns can be brought and solved. We have representatives from all across campus sitting on Senate. Which means you have a specific senator that can help you bring the issues to Senate.
Our meetings are every Tuesday in the David E. Johnson Boardroom on the third floor of Buntrock Commons at 6:30pm, we can't wait to see you!
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'oleville' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

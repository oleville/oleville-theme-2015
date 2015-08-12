<?php
/**
 * @package oleville
 */
?>

<article id="post-<?php the_ID(); ?>" class="position">
	<h2 class="position">Position: 
	<?php echo get_the_title() ; ?>
    </h2>
    <div class="job-info">
    <h4>Job Info:</h4>
    <?php echo get_post_meta(get_the_ID(), 'description', TRUE); ?>
    </div>
    <div class="quote">
    <h3>Quote from the current <?php the_title(); ?>:</h3>
    <?php echo get_post_meta(get_the_ID(), 'quote1', TRUE); ?>
    </div>
    <div class="highlights">
    <h4>Highlights:</h4>
    <ul>
    <?php $highlights = preg_split('/\r\n|\r|\n/', get_post_meta(get_the_ID(), 'highlights', TRUE));
		foreach($highlights as $highlight) {
	?>
     	<li><?php echo $highlight; ?></li>
    <?php } ?>
    </ul>
    </div>
    <div class="quote">
    <h3>Quote from the current <?php the_title(); ?>:</h3>
    <?php echo get_post_meta(get_the_ID(), 'quote2', TRUE); ?>
    </div>
    
    <div class="apply-button-container"><a class="apply-button" href="/elections/apply">Apply Now</a></div>

		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'oleville' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->
	</article><!-- #post-## -->

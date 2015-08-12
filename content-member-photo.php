<?php
/**
 * @package oleville
 */
?>
<div class="container">
<article id="<?php echo $slug ?>-photo" <?php post_class('member-photo'); ?>>
<a href="#" data-target="<?php echo $slug ?>">
<?php if ( has_post_thumbnail() ) { // Check If post has post thumbnail. ?>
									<div class="thumbnail" title="<?php printf( esc_attr__( 'Permalink to %s', 'rpwe' ), the_title_attribute('echo=0' ) ); ?>" rel="bookmark">
										<?php the_post_thumbnail('thumbnail'); ?>
									</div>
								<?php } else { // endif ?>
									<div class="thumbnail" title="<?php printf( esc_attr__( 'Permalink to %s', 'rpwe' ), the_title_attribute('echo=0' ) ); ?>" rel="bookmark">
										<img src="http://www.oleville.com/wp-content/themes/oleville-live/img/placeholder_thumb.png" height="150" width="150" />
									</div>
                <?php } ?>
                <div class="overlay">
                <div class="title"><?php the_title(); ?></div>
                </div>
 </a>
</article><!-- #post-## -->
</div>
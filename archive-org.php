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
        <?php echo bloginfo('name'); ?> Organizations
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
      <?php  if ( have_posts() ) { ?>
        <div class="selector branch small">
        <table class="org-table">
        <tbody>
        <tr>
            <?php $i = 1; while ( have_posts() ) : the_post(); ?>
            
            <td>
            <div class="container">
              <a href="<?php the_permalink();?>">
              <?php if (has_post_thumbnail()) { ?>
              <?php the_post_thumbnail('selector-size'); ?>
              <?php } else { ?>
              <div class="placeholder branch-color">
              </div>
              <?php } ?>
              
              <div class="overlay">
               <p class="branch-name <?php echo strlen(get_post_meta(get_the_ID(), 'abbreviation', TRUE))  < 5 ? '' : 'reduced'; ?>"><?php echo get_post_meta(get_the_ID(), 'abbreviation', TRUE) ?></p>
               <p class="branch-desc"><?php the_title(); ?></p>
              </div>
              </a>
            </div></td>
            
            
            <?php if($i==3) { ?>
              </tr>
              <tr>
            <?php $i=0;} ?>
            
            <?php $i++;
            
            endwhile;
            wp_reset_postdata(); ?>
        </tr>
        </tbody>
        </table>
        </div>
        <?php } ?>
    </div>
  </div>
    
<?php get_footer(); ?>

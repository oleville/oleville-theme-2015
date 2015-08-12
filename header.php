<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package oleville
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
    <header id="masthead" class="site-header" role="banner">
        <div class="hotlink-container">
            <div class="content-wrapper">
          <?php if( function_exists('oleville_happening_now')) {
                //echo oleville_happening_now();
          } ?>
                <div class="search-bar">
                    <form role="search" method="get" class="search-form" action="http://oleville.com/results/">
                          <input type="search" class="search-field" placeholder="search..." value="" name="mssearch" >
                        <input title="Pages" type="hidden" name="msp" value="1" checked="checked">
                        <input title="All" type="hidden" name="mswhere" value="all" checked="checked">
                      </form>
                </div>
                <div class="hotlinks">
                    <ul>
                          <li>
                            <a href="https://moodle-2014-15.stolaf.edu/" title="Moodle" target="_new">Moodle</a>
                          </li>
                          <li>
                            <a href="http://www.stolaf.edu/sis/" title="SIS" target="_new">SIS</a>
                          </li>
                        <li>
                            <a href="http://gmail.stolaf.edu" title="Gmail" target="_new">Gmail</a>
                          </li>
                        <li>
                            <a href="http://wp.stolaf.edu/" title="St. Olaf College" target="_new">Olaf</a>
                        </li>
                          <li>
                            <a href="http://www.manitoumessenger.com/" title="The Manitou Messenger" target="_new">Mess</a>
                          </li>
                    </ul>
                </div>
            </div><!-- .content-wrapper -->
        </div><!-- .hotlink-container -->
        <div class="navigation-container">
            <div class="content-wrapper">
                <div class="logo">
                    <a href="http://www.oleville.com/" title="Oleville"><img name="Oleville" src="<?php bloginfo('template_directory'); echo '/img/logo.png'; ?>" width="183" height="41" alt="" /></a>
                </div>
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary') ); ?>
                </nav><!-- #site-navigation -->
            </div><!-- .content-wrapper -->
        </div><!-- .navigation-container -->
    </header><!-- #masthead -->
<!--
    <div class="announcement">
        <div class="content-wrapper"><a href="/elections">Visit Election Central for the Latest on the 2015 Spring Elections</a></div>
    </div>
-->

    <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'oleville' ); ?></a>

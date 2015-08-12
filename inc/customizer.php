<?php
/**
 * oleville Theme Customizer
 *
 * @package oleville
 * /
    /**
     * This will generate a line of CSS for use in header output. If the setting
     * ($mod_name) has no defined value, the CSS will not be output.
     * 
     * @uses get_theme_mod()
     * @param string $selector CSS selector
     * @param string $style The name of the CSS *property* to modify
     * @param string $mod_name The name of the 'theme_mod' option to fetch
     * @param string $prefix Optional. Anything that needs to be output before the CSS property
     * @param string $postfix Optional. Anything that needs to be output after the CSS property
     * @param bool $echo Optional. Whether to print directly to the page (default: true).
     * @return string Returns a single line of CSS with selectors and a property.
     * @since MyTheme 1.0
     */
     function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }
/**
    * This will output the custom WordPress settings to the live theme's WP head.
    * 
    * Used by hook: 'wp_head'
    * 
    * @see add_action('wp_head',$func)
    * @since MyTheme 1.0
    */
   function header_output() {
      ?>
      <!--Customizer CSS--> 
      <style type="text/css">
           <?php generate_css('body', 'background-color', 'background_color', '#'); ?> 
           <?php generate_css('.branch-color', 'background-color', 'branch_color', '', '!important'); ?>
		   <?php generate_css('.secondary-color', 'background-color', 'secondary_color', '', '!important'); ?>
		   <?php generate_css('.branch-color-text', 'color', 'branch_color', '', '!important'); ?>
		   <?php generate_css('.page-header-wrapper', 'background-image', 'header_img_upload', 'url(', ')'); ?> 
      </style> 
      <!--/Customizer CSS-->
      <?php
   }
// Output custom CSS to live site
add_action( 'wp_head' , 'header_output');

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function oleville_customize_register( $wp_customize ) {
	$wp_customize->add_section(
        'oleville_social_media',
        array(
            'title' => 'Social Media Settings',
            'description' => 'Customize your social media output.',
            'priority' => 35,
        )
    );
	
	$wp_customize->add_setting(
		'facebook_textbox',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_setting(
		'twitter_textbox',
		array(
			'default' => '',
		)
	);
	$wp_customize->add_setting(
		'instagram_textbox',
		array(
			'default' => '',
		)
	);
	
	$wp_customize->add_control(
		'facebook_textbox',
		array(
			'label' => 'Facebook URL',
			'section' => 'oleville_social_media',
			'type' => 'text',
		)
	);
	$wp_customize->add_control(
		'twitter_textbox',
		array(
			'label' => 'Twitter URL',
			'section' => 'oleville_social_media',
			'type' => 'text',
		)
	);
	$wp_customize->add_control(
		'instagram_textbox',
		array(
			'label' => 'Instagram URL',
			'section' => 'oleville_social_media',
			'type' => 'text',
		)
	);


	
	$wp_customize->add_setting( 'branch_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
		 array(
				'default' => '#353535', //Default setting/value to save
				'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
		 ) 
	);      
				
	//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
	$wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
		 $wp_customize, //Pass the $wp_customize object (required)
		 'oleville_branch_color', //Set a unique ID for the control
		 array(
				'label' => __( 'Branch Color', 'oleville' ), //Admin-visible name of the control
				'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				'settings' => 'branch_color', //Which setting to load and manipulate (serialized is okay)
				'priority' => 10, //Determines the order this control appears in for the specified section
		 ) 
	) );
	
	$wp_customize->add_setting( 'secondary_color', //No need to use a SERIALIZED name, as `theme_mod` settings already live under one db record
		 array(
				'default' => '#CCC', //Default setting/value to save
				'type' => 'theme_mod', //Is this an 'option' or a 'theme_mod'?
				'capability' => 'edit_theme_options', //Optional. Special permissions for accessing this setting.
				'transport' => 'postMessage', //What triggers a refresh of the setting? 'refresh' or 'postMessage' (instant)?
		 ) 
	);      
				
	//3. Finally, we define the control itself (which links a setting to a section and renders the HTML controls)...
	$wp_customize->add_control( new WP_Customize_Color_Control( //Instantiate the color control class
		 $wp_customize, //Pass the $wp_customize object (required)
		 'oleville_secondary_color', //Set a unique ID for the control
		 array(
				'label' => __( 'Branch Secondary Color', 'oleville' ), //Admin-visible name of the control
				'section' => 'colors', //ID of the section this control should render in (can be one of yours, or a WordPress default section)
				'settings' => 'secondary_color', //Which setting to load and manipulate (serialized is okay)
				'priority' => 10, //Determines the order this control appears in for the specified section
		 ) 
	) );
	$wp_customize->add_setting( 'header_img_upload' );
 
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'header_img_upload',
			array(
				'label' => 'Header Image Upload',
				'section' => 'colors',
				'settings' => 'header_img_upload'
			)
		)
	);
	
	//4. We can also change built-in settings by modifying properties. For instance, let's make some stuff use live preview JS...
	$wp_customize->get_setting( 'branch_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'secondary_color' )->transport = 'postMessage';
	$wp_customize->get_setting( 'header_img_upload' )->transport = 'postMessage';
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'oleville_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function oleville_customize_preview_js() {
	wp_enqueue_script( 'oleville_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'oleville_customize_preview_js' );

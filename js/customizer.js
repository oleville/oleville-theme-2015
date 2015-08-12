/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_img_upload ', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.page-header-wrapper' ).css( {
					'background-image': 'none',
				} );
			} else {
				$( '.page-header-wrapper' ).css( {
					'background-image': 'url(' + to + ')',
				} );
			}
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	// Branch color.
	wp.customize( 'branch_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.branch-color' ).css( {
				} );
				$( '.branch-color-text' ).css( {
				} );
			} else {
				$( '.branch-color' ).css( {
					'background-color': to + '!important',
				} );
				$( '.branch-color-text' ).css( {
					'color': to + '!important',
				} );
			}
		} );
	} );
	// Branch color.
	wp.customize( 'secondary_color', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.secondary-color' ).css( {
				} );
			} else {
				$( '.secondary-color' ).css( {
					'background-color': to + '!important',
				} );
			}
		} );
	} );
} )( jQuery );

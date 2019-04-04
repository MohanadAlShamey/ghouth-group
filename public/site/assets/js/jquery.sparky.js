/*!
 * Sparky
 * jQuery Style Sheet Switcher plugin
 * Author: Trillim Team
 * Author URI: https://www.trillim.co
 * Version: 1.0.0
 * Created: 12/05/2017
 *
 * Copyright (c) 2017 Trillim.
 */

( function ( $ ) {

  'use strict'; // Using strict mode

  $.fn.sparky = function () {
    $( this ).on( 'click', function () {
      var $this = $( this );
      var parent = $this.parent();

      // Show & Hide color palette
      parent.toggleClass( 'open' );

      // Change background of .sparky__color by it's appropriate file color
      $( '.sparky .sparky__color' ).each( function () {
        $( this ).css( {
          "background-color": $( this ).data( 'sparky-color' ),
        } );
      } );

      // Change Color
      $( '.sparky__color' ).on( 'click', function () {
        var $this = $( this );

        if ( $this.hasClass( 'active' ) ) {
          $( '.sparky .sparky__color' ).each( function () {
            $( this ).removeClass( 'active' );
            $( this ).css( {
              "background-color": $( this ).data( 'sparky-color' )
            } );
          } );
          $this.addClass( 'active' );
        } else {
          $this.addClass( 'active' );
          $( '.sparky .sparky__color' ).each( function () {
            $( this ).removeClass( 'active' );
          } );
        }
        if ( $( "#sparky-url" ).length > 0 ) {
          $( "#sparky-url" ).attr( 'href', $this.data( 'sparky-url' ) );
        } else {
          $( 'head' ).append( '<link id="sparky-url" rel="stylesheet" href="' + $this.data( 'sparky-url' ) + '" />' );
        }

      } );


    } );
  };

  // Initialize the Plugin
  $('.sparky__icon').sparky();

} )( jQuery )

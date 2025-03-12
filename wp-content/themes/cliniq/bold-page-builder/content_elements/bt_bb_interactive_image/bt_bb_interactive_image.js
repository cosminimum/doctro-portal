(function( $ ) {
	"use strict";
	$( document ).ready(function() {
		$( '.bt_bb_interactive_image_item_dot' ).on( "click", function() {
			$( '.bt_bb_interactive_image_item.on' ).not( $(this).parent() ).removeClass( 'on' );
			$( this ).parent().toggleClass( 'on' );
		});			
	});

})( jQuery );



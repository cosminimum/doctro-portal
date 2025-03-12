(function( $ ) {
	"use strict";

	$( document ).ready(function () {
		$( 'div.bt_bb_dropdown' ).each(function( index, item ){
			$(item).find( '.btDropdownSelect' ).fancySelect( { forceiOS: true } ).on( 'change.fs', function( e ) {
				var option = $(this).find( ':selected');			

				var btDropdownSelectTitle	= option.data( "title" );
				var btDropdownSelectImage	= option.data( "image" );
				var btDropdownSelectLink	= option.data( "link" );
				var btDropdownSelectTarget	= option.data( "target" );
				var btDropdownSelectUrlText = option.data( "final-url-text" );

				$(item).find( "#bt_bb_image_dropdown" ).attr( 'src', btDropdownSelectImage );
				$(item).find( "#bt_bb_image_dropdown" ).attr( 'alt', btDropdownSelectTitle );	

				$(item).find( "#bt_bb_button_dropdown" ).attr( 'href', btDropdownSelectLink );
				$(item).find( "#bt_bb_button_dropdown" ).attr( 'target', btDropdownSelectTarget );
				$(item).find( "#bt_bb_button_dropdown" ).attr( 'title', btDropdownSelectUrlText );
				$(item).find( "#bt_bb_button_dropdown .bt_bb_button_text" ).html(btDropdownSelectUrlText );							
			});
		});

	});

	$( window ).load(function() {	
		 
		 $( 'div.bt_bb_dropdown' ).each(function(index,item){
			$(item).find( "#bt_bb_image_dropdown" ).hide();
			var first_inner = $(item).find( '.btDropdownSelect option:first' );

			var btDropdownSelectTitle	= first_inner.data( "title" );
			var btDropdownSelectImage	= first_inner.data( "image" );
			var btDropdownSelectLink	= first_inner.data( "link" );
			var btDropdownSelectTarget	= first_inner.data( "target" );
			var btDropdownSelectUrlText = first_inner.data( "final-url-text" );

			$(item).find( "#bt_bb_image_dropdown" ).attr( 'src', btDropdownSelectImage);
			$(item).find( "#bt_bb_image_dropdown" ).attr( 'alt', btDropdownSelectTitle);

			$(item).find( "#bt_bb_button_dropdown" ).attr( 'href', btDropdownSelectLink);	
			$(item).find( "#bt_bb_button_dropdown" ).attr( 'target', btDropdownSelectTarget);
			$(item).find( "#bt_bb_button_dropdown" ).attr( 'title', btDropdownSelectUrlText);
			$(item).find( "#bt_bb_button_dropdown .bt_bb_button_text" ).html(btDropdownSelectUrlText);
			$(item).find( "#bt_bb_image_dropdown" ).show();				
		 });
	 });

})( jQuery );
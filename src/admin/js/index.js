import '../scss/styles.scss'

(function( $ ) {
	'use strict';

	$(document).on('ready', function() {
		wp.codeEditor.initialize($('[name="html"]'), htmlcs.editor_settings);
	})

})( jQuery );
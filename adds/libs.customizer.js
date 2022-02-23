
///https://www.usablewp.com/learn-wordpress/wordpress-customizer/using-active-callback-on-a-control/

alert("... _customize-refresher 15.3");
wp.customize.bind("ready", () => {

	wp.customize.control( 'button_open_random_post',  function (control) {
		var link = control.container.find( '.button' );
		link.on( 'click', function (ev) {
			var refresh = ev.target.dataset.urlshort;
			// window.open(refresh, '');
			wp.customize.previewer.previewUrl.set( refresh );
		});
	} );
	
});


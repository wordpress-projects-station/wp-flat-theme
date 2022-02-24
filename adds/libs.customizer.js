
///https://www.usablewp.com/learn-wordpress/wordpress-customizer/using-active-callback-on-a-control/

wp.customize.bind("ready", () => {


	wp.customize.control( 'button_open_random_page',  function (control) {
		var link = control.container.find( '.button' );
		link.on( 'click', function (ev) {
			var refresh = ev.target.dataset.url;
			wp.customize.previewer.previewUrl.set( refresh );
			// window.open(refresh, '');
		});
	});

	wp.customize.control( 'button_open_random_post',  function (control) {
		var link = control.container.find( '.button' );
		link.on( 'click', function (ev) {
			var refresh = ev.target.dataset.url;
			wp.customize.previewer.previewUrl.set( refresh );
		});
	});

	wp.customize.control( 'button_open_random_archive',  function (control) {
		var link = control.container.find( '.button' );
		link.on( 'click', function (ev) {
			var refresh = ev.target.dataset.url;
			wp.customize.previewer.previewUrl.set( refresh );
		});
	});
	
});


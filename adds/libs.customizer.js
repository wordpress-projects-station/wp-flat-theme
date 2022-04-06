
///https://www.usablewp.com/learn-wordpress/wordpress-customizer/using-active-callback-on-a-control/

wp.customize.bind("ready", () => {

	wp.customize.control( 'button_open_random_page',
	function (control) {

		control.container.find( '.button' ).on( 'click',
		function (ev) {
			let targetURL = ev.target.dataset.url;
			wp.customize.previewer.previewUrl.set( targetURL );
			// window.open(refresh, '');
		});

	});

	wp.customize.control( 'button_open_random_post',
	function (control) {

		control.container.find( '.button' ).on( 'click', 
		function (ev) {
			let targetURL = ev.target.dataset.url;
			wp.customize.previewer.previewUrl.set( targetURL );
		});

	});

	wp.customize.control( 'button_open_random_archive',
	function (control) {

		control.container.find( '.button' ).on( 'click', 
		function (ev) {
			let targetURL = ev.target.dataset.url;
			wp.customize.previewer.previewUrl.set( targetURL );
		});

	});
	
});


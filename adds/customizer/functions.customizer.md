## CUSTOMIZER

>In anycase, read official repository.

---

more info: https://developer.wordpress.org/themes/customize-api/<br>
more info: https://www.youtube.com/watch?v=o0eb_Cv0zVA

---

This is the expansion model implemented:

```

    //::
    //:: THE MODEL
    //::

    // ADD PANEL "Model Panel"

    $customizer->add_panel('options_panel',[
        'title'=>'Model Panel',
        'description'=> 'Collection of themes options',
        'priority'=> 10,
    ]);

    // "Model Panel" > "tab_1"

    $customizer->add_section('tab_1',[
        'panel'=>'options_panel',
        'priority'=>10,
        'title'=>'TAB 1',
    ]);

    // "Model Panel" > "tab_1" > ...

    $customizer->add_setting('demo_text_sets',[ 'default'=>'a' ]);
    $customizer->add_control('demo_text',[
        'section'=>'tab_1',
        'label'=>'Text',
        'type'=>'text',
        'settings'=>'demo_text_sets',
    ]);

    $customizer->add_setting('demo_checkbox_sets',[ 'default'=>'false' ]);
    $customizer->add_control('demo_check',[
        'section'=>'tab_1',
        'label'=>'Choose Y/N',
        'type'=>'checkbox',
        'settings'=>'demo_checkbox_sets',
    ]);

    $customizer->add_setting( 'demo_radio_sets', ['default' => 'blue']);
    $customizer->add_control( 'demo_radio', [
        'section' => 'tab_1',
        'label' => 'Radio Selection',
        'description' => 'This is a custom radio input.',
        'type' => 'radio',
        'choices' => [
            'red' => 'Red',
            'blue' => 'Blue',
            'green' => 'Green',
        ],
    ]);

    $customizer->add_setting( 'demo_select_sets', ['default' => 'blue']);
    $customizer->add_control( 'demo_select', [
        'section' => 'tab_1',
        'label' => 'Select Selection',
        'description' => 'This is a custom select input.',
        'type' => 'select',
        'choices' => [
            'red' => 'Red',
            'blue' => 'Blue',
            'green' => 'Green',
        ],
    ]);

```

system can be storicize options:


```

    $global mods;
    $mods->my_storicized_option = get_theme_mod( 'name_of_sets' ); //of model
    $mods->my_storicized_option = get_option('name_of_sets'); //if is direct of wp / woo

```

you can make different types of actions. For exemple, if you make in a libs.customizer.js a script for target a button, you can do refresh a page with specific url:

```

// more info on: https://www.usablewp.com/learn-wordpress/wordpress-customizer/using-active-callback-on-a-control/

wp.customize.bind("ready", () => {

	wp.customize.control( 'button_open_random_post',
	function (control) {

		control.container.find( '.button' ).on( 'click', 
		function (ev) {
			let targetURL = ev.target.dataset.url;
			wp.customize.previewer.previewUrl.set( targetURL );
		});

	});

});


```

### remember this:

In this theme, every name prefix of add_setting ( in the model have <b>demo</b>_text_sets, <b>demo</b>_checkbox_sets, <b>demo</b>_select_sets", ecc ) it's real page of looptype in libs.methods.php. In pratices the looper set the target of page in this way:

```
if( is_page('blog') ) {
    $folder = 'wordpress';
    $type = 'blog-home';
}
```

'blog-home' is really content of page "blog-home.php" and relative settings of that:

```
    $mods->my_storicized_option  = get_theme_mod( $looptype['type'].'_name_of_sets' ); 
    //  so get_theme_mod( 'blog-home_name_of_sets' )
```


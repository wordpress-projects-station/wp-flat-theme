Do you like this project? Good! Remember to encourage us in this: <b>click on the ★ above this page and follow</b>

---

# wp-flat-theme

### Legacy Theme boilerplate

STABLE BETA {under testing - work in progress}<br>
A custom easy theme from stratch

**Near to first release! Check back in a few days.**

This is a candidate release... Please wait.

-   Cassic Wp posts
-   Woocommerce shop
-   Multilang
-   Bootstrapped
-   Detailed Customizer
-   Ready to modding

Obviously, if you need a shop, you will need to install woocommerce. Once this is done, here is a collection of very useful resources, such as plugins and all the presets to be imported into the theme in this [file on megaupload](https://mega.nz/file/T6xVHDQR#A4YXsMIiZZ3tXa12ePLYKtoYUFZx8iz931P4cfZS0FM)

### Resources

Currently inside zip:<br><br>
01 - wp-flat-theme.rar _a version of theme. We strongly raccomended download from this repository, generally it isn't updated. In any case install the theme on first_<br><br>
02 - plugins.zip (more importers/exporters, lang system, other...)<br>
03 - uploads image (all demos).zip<br>
04 - Products demo.csv<br>
05 - WIDGETS (use text).wie<br>
06 - MEDIA CATEGORIES [eng] .xml<br>
07 - PAGES (multilang).xml<br>
07 - PAGES [ita].xml<br>
08 - SITE MENU  [multilang] (use plugin not wp import!).json<br>
08 - SITE MENU [eng] (use plugin not wp import!).json<br>
09 - DEMO POSTS [eng] .xml<br>
10 - ADMIN MENU EDIT.dat<br>
<br>

The order is not a fantasy, it's the import steps. Expecially if you use the multilang system (currently based on [sublanguages](https://it.wordpress.org/plugins/sublanguage/) or you will encounter several bugs.


Other resource:
- [bootswatch.com](https://bootswatch.com/)
- [startbootstrap.com](https://startbootstrap.com/?showPro=false&showAngular=false&showVue=false)
- [themewagon.com](https://themewagon.com/theme-price/free/)
- [colorlib.com](https://colorlib.com/wp/cat/bootstrap/)
- [dribbble.com](https://dribbble.com/tags/free_bootstrap_4_ui_kit)

<br>

### Folder scheme

An easy scheme for understand folder structure and components:

| path  | what  |
|----|----|
| wp-flat-theme                 | is main folder of theme.    | 
| ./adds/                       | little extra fot theme, exemple 404 images and the spinner. | 
| ./adds/bootstrap/             | contains all elements of function php for bootstrap. | 
| ./adds/customizer/            | contains all elements of function php for the customizer editor of wp. | 
| ./adds/methods/               | contains all methods of theme inside and outside function php. | 
| ./adds/socials/               | (provisory) contains social box theme extra. | 
| ./adds/woo/                   | contains all elements of function php for woocommerce. | 
| ./adds/wp/                    | contains all elements of function php for worpdress. | 
| ./elements/                   | contains all box, relative to repeated common contents, of theme (an exemple the bootstrap cards) | 
| ./woocommerce/                | It's the template override of woocommerce | 
| ./wordpress/                  | It's the template pages of wordpress via "loop_page_types()" in functions.methods.php |
| ./404.php                     | litterally the 404. | 
| ./header.php                  | the first classic part of wp model (from &lt;html&gt; to first sidebar). | 
| ./footer.php                  | the first classic part of wp model (from last sidebar to end of &lt;/html&gt;). | 
| ./index.php                   | the main page of wp model where is printed the contents. | 
| ./language.json               | the lang of theme for every themeplate traduction. | 
| ./style.extra.css             | style.extra.css it's real (and basic correction) style of theme. | 
| ./style.css                   | it's last override | 
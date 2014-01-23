#UNIC
##_s + unsemantic + sass + ♥

UNIC is a base theme for Wordpress for developers to build upon. It is my favorite way to theme for Wordpress from scratch. I started with Automattic's underscores base theme and combined it with the Unsemantic grid system. Then I reworked the default CSS to SASS and added some of my own additional stuff. I use it all the time. If you do as well, please let me know, I'd love to hear your feedback.

##Features & Notes


###Built on the Unsemantic Grid
IMHO, Undemantic is the most flexible and logical grid system there is. You can read the full syntax over at http://unsemantic.com.

The theme also includes a shortcode system to include grids in post content.

````
    [grid 33] A 33% width grid [/grid]
	[grid 33] A 33% width grid [/grid]
	[grid 33] A 33% width grid [/grid]
````

Simple as that!

###Smart SASS Structure & Variables
Easily modify theme wide settings in the style.sass master file.

````
//	Base Variables
	$grid-max-width	: 1200px;
	$base-font: sans-serif;
	$base-font-size: 12px;
	$header-font: $base-font;
	$vspacing: 1.5em;
````

###SASS Colors & Gradients
Set a few variables in the master file and cheangeup your color scheme.

````
$color-primary   : rgb(20,53,173);  //Type Base
$color-secondary : rgb(44,62,130);  //Type Headers
$color-tertiary  : rgb(7,29,112);   //Type Alternate / Links

$color-highlight  : rgb(72,103,214); //Alert/Highlight/Hover
$color-accent : rgb(72,103,214); //Design Accents

$color-bg-primary : rgb(255,255,255);
$color-bg-secondary : rgb(244,244,244);
````

###Cool SASS Mixins
Years of hunting and gathering the simplest and most efficient mixins. All defined in /scss/mixins/

````
    @mixin border-radius($radius:5px)
	@mixin button ($background-color: $color-highlight, $fontcolor: #ffffff, $border-radius: 5px)
	@mixin clearfix()
	@mixin gradient($startColor: $color-highlight, $endColor: saturate($color-highlight, 10%) ) 
	@mixin drop-shadow($color:rgba(0,0,0,0.2), $blur:0, $x:2px, $y:2px)
	@mixin transition($transition:all 0.2s)
	
````

###Easy Web Fonts
Using the bulletproof font syntax from Font Squirrel, we have an easy mixin for local webfonts.

````
    @mixin add-font-face($font-family, $font-folder, $font-filename, $font-weight : normal, $font-style :normal, $font-stretch : normal) { ... }
````

So we simply include a font file in the master style.scss

*@import "scss/fonts/opensans";*

```
@include add-font-face('Open Sans', 'scss/fonts/opensans', 'OpenSans-Regular-webfont', normal);
@include add-font-face('Open Sans', 'scss/fonts/opensans', 'OpenSans-Light-webfont', light);
@include add-font-face('Open Sans', 'scss/fonts/opensans', 'OpenSans-Bold-webfont', bold);

````

Alternatively, you can embed web fonts directly from an online provider:


*unic/scss/fonts/_droidsans.scss*
    
````	
	/* CSS from webfont provider. */
    @font-face {
	  font-family: 'Droid Sans';
	  font-style: normal;
	  font-weight: 400;
	  src: local('Droid Sans'), local('DroidSans'), url(http://themes.googleusercontent.com/static/fonts/droidsans/v3/s-BiyweUPV0v-yRb-cjciBsxEYwM7FgeyaSgU71cLG0.woff) format('woff');
	}
	@font-face {
	  font-family: 'Droid Sans';
	  font-style: normal;
	  font-weight: 700;
	  src: local('Droid Sans Bold'), local('DroidSans-Bold'), url(http://themes.googleusercontent.com/static/fonts/droidsans/v3/EFpQQyG9GqCrobXxL-KRMQFhaRv2pGgT5Kf0An0s4MM.woff) format('woff');
	}
````

Then simply add to the masterfile to include one or another font, and use as directed...


###Built in responsive menu system / functions
Uses a simple function which works like the standard WP menu function. By default the theme shows and hides the menus via Unsemantic responsive classes.

````
	<?php wp_nav_menu_select( array( 'theme_location' => 'primary' ) ); ?>
````


##Shortcodes Power
* Shortcodes work in text widgets
* WYSIWYG Editor shows an autogenerated dropdown of all registered shortcodes
* Supercool [grid n] shortcode

##Magnific Popup Included
The best and most powerful jQuery lightbox is integrated, with an editable SASS file.

<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package joshwaymanV4
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function joshwayman_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'joshwayman_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function joshwayman_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'joshwayman_pingback_header' );



// Generate Pretty Menu
function site_menu( $name = '', $depth = 1 ) {
	if( $name ) {
		$menu = wp_nav_menu( "container_class=menu&echo=0&menu=$name&depth=$depth" );
	} else {
		$menu = wp_nav_menu( "container_class=menu&echo=0&depth=$depth" );
	}

	/* Remove the wrapper and the poorly used title element */
	$menu = str_replace( '<div class="menu">', '', $menu );
	$menu = str_replace( '<ul>', '', $menu );
	$menu = str_replace( '</ul></div>', '', $menu );
	$menu = preg_replace( '/<ul id=\"(.*?)\" class=\"(.*?)\">/', '', $menu );
	$menu = preg_replace( '/title=\"(.*?)\"/', '', $menu );

	echo $menu;
}


// Disable auto-linking to full size images
update_option( 'image_default_link_type', 'none' );

// Adds a class of hfeed to non-singular pages.
function mr_body_classes( $classes ) {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'mr_body_classes' );

add_theme_support( 'post-thumbnails' );

// Image Sizes
set_post_thumbnail_size( 150, 150, true );
add_image_size( 'square', 1200, 1200, true );
add_image_size( 'tall', 600, 1200, true );
add_image_size( 'square-small', 600, 600, array('center', 'center') );
add_image_size( 'banner', 1440, 600, true );



function wpb_login_logo() { 

	$custom_logo_id = get_theme_mod( 'custom_logo' );
	$custom_logo_src = get_template_directory_uri() . '\/assets/jw-icon.png';
	//wp_get_attachment_image_src($custom_logo_id, 'full', false)[0];

	/*echo '<pre>';
	var_dump($custom_logo_src);
	echo '</pre>';*/
	?>
    <style type="text/css">
/* Poppins */
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

/* IBM Plex */
@import url('https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@100;200;300;400;500;600;700&display=swap');

:root {
	/* Type */
	--font-family-sans : 'Poppins', sans-serif;
	--font-family-mono : 'IBM Plex Mono', monospace;
	--base-font-size : 22px;
	--base-line-height : 1.75;
	--text-s3 : 0.422rem;
	--text-s2 : 0.563rem;
	--text-s1 : 0.75rem;
	--text-base : 1rem;
	--text-l1 : 1.333em;
	--text-l2 : 1.777em;
	--text-l3 : 2.369em;
	--text-l4 : 3.157em;
	--text-l5 : 4.209em;

	/* Fonts */
	--f-lightest : 200;
	--f-light : 300;
	--f-normal : 400;
	--f-bold : 700;
	--f-black : 900;

	/* Colours */
	--white : #FEFCFB;
	--green : #1282A2;
	--blue : #1254a2;
	--dark-blue : #001F54;
	--black-blue : #0A1128;
	--gray: #f4f4f4;
	--ok : #7ADFBB;
	--warning : #FDE74C;
	--danger : #AC3931;

	/* Default */
	--body-text-color: var(--black-blue);
	--body-bg-color: var(--white);

	/* Width */
	--max-width : 1280px;
	--max-width-content: 720px;
	--gutter: 3rem;

	/* Shadow */
	--shadow-subtle : 0px 0px 7px -4px rgba(0,0,0,0.5);

	/* Break points */
}
@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
}

        #login h1 a, .login h1 a {
            background-image: url('<?= $custom_logo_src ?>');
			height:100px;
			width:300px;
			background-size: contain;
			background-repeat: no-repeat;
			padding-bottom: 10px;
			
			transition: all 250ms;
        }
		body.login {
			background: rgb(15,59,84);
			background: linear-gradient(-45deg, var(--green), var(--blue), var(--dark-blue), var(--black-blue));
			background-size: 300% 300%;
			animation: gradient 20s ease infinite;
		}
		body.login p#nav { float: left; }
		body.login p#backtoblog { float: right; }
		
		body.login p#nav, body.login p#backtoblog {
			display: inline-block;
			padding: 0;
			
			margin-top: 24px;
		}
		body.login p#nav a, body.login p#backtoblog a {
			color: var(--white);
			border: solid 1px var(--white);
			border-radius: 0px;
			padding: 5px 10px;
			transition: all 250ms;
			
			
		}
		body.login h1 a:hover { opacity: 0.7; }
		body.login #backtoblog a:hover, body.login #nav a:hover {
			color: #EA9447;
			border-color: #EA9447;
			background-color: black;
		}
		
		body.login form {
			background-color: var(--body-bg-color);
			/*border: solid thin #ffffffc2;*/
			border: none;
			border-radius: 2px;
			padding-top: 30px;
			padding-bottom: 40px;
		}
		body.login form label { color: var(--body-text-color); }
		body.login form p:first-child > label, body.login form div.user-pass-wrap label {
			margin-bottom: 10px;
		}
		
		body.login form div.user-pass-wrap {
			/*margin-top: 15px;*/
		}
		body.login p.message {
			background-color: var(--body-bg-color);
			border-left: 4px solid #ffb30b;
			color: var(--body-text-color);
		}
		form#loginform {
			background-color: var(--gray);
			color: var(--body-text-color);
}

body.login form label {
    /* text-align: center; */
    /* width: 100%; */
    font-size: 16px;
	color: var(--body-text-color);
}

input#wp-submit {
			background: linear-gradient(-45deg, var(--dark-blue), var(--black-blue), var(--blue), var(--green));
			background-size: 300% 300%;
			animation: gradient 20s ease infinite;
    border-color: transparent;
    border-radius: 0px;
    width: 100%;
    font-size: 18px;
	color: var(--white);
	transition: all 300ms ease;
}

input#wp-submit:hover {
	filter: invert();
}

p.forgetmenot {
    width: 100%;
    text-align: center;
    padding-top: 10px;
    padding-bottom: 20px;
}

p.submit {
    width: 100%;
    overflow: auto;
    text-align: center;
    /* padding-top: 15px !important; */
}

input.input {border-radius: 0px;/* padding-left: 15px; */}

@media (prefers-color-scheme: dark) {
	:root {
		--body-text-color: var(--white);
		--body-bg-color: black;
		
		--gray: #1f1f1f;
	}
}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );
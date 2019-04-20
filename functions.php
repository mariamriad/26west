<?php
/**
 * 26west functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 26west
 */

if ( ! function_exists( 'twentysixwest_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function twentysixwest_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on 26west, use a find and replace
		 * to change 'twentysixwest' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'twentysixwest', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'twentysixwest' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'twentysixwest_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'twentysixwest_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentysixwest_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'twentysixwest_content_width', 640 );
}
add_action( 'after_setup_theme', 'twentysixwest_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentysixwest_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'twentysixwest' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'twentysixwest' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentysixwest_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function twentysixwest_scripts() {
	wp_enqueue_style( 'twentysixwest-style', get_stylesheet_uri() );

	wp_enqueue_script( 'twentysixwest-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'twentysixwest-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	// Google Fonts
	wp_enqueue_style('twentysixwest-googlefonts', 'https://fonts.googleapis.com/css?family=Karla:400,700|Oswald:400,700');

	// Font Awesome
	wp_enqueue_style('twentysixwest-fontawesome', 'https://use.fontawesome.com/releases/v5.8.1/css/all.css');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentysixwest_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// CUSTOM FUNCTIONS
/**
 * Load custom admin stylesheet.
 */
function load_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/admin-style.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

/**
 * Load custom site logo on login screen.
 */
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/site-login-logo.png);
						height:65px;
						width:320px;
						background-size: 320px 65px;
						background-repeat: no-repeat;
        		padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


/**
 * Link to to your site through logo on login screen.
 */
 function my_login_logo_one() {
 ?>
 <style type="text/css">
		 body.login div#login h1 a {
		 background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/26west-logo.svg);
		 margin-bottom: 0;
		 padding-bottom: 0;
		 }
 </style>
 <?php
 } add_action( 'login_enqueue_scripts', 'my_login_logo_one' );

/**
 * Load custom login stylesheet.
 */
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
    // wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/js/style-login.js' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

/**
 * Load custom login jQuery.
 */
add_action( 'login_enqueue_scripts', 'wpse_login_enqueue_scripts', 10 );
function wpse_login_enqueue_scripts() {
    wp_enqueue_script( 'style-login.js', get_template_directory_uri() . '/js/style-login.js', array( 'jquery' ), 1.0 );
}

/**
 * Remove shake on login stylesheet.
 */
function wpb_remove_loginshake() {
    remove_action('login_head', 'wp_shake_js', 12);
}
add_action('login_head', 'wpb_remove_loginshake');

$args = array(
    'echo' => false,
);

/**
 * SVG image support.
 */
function add_file_types_to_uploads($file_types){
    $new_filetypes = array();
    $new_filetypes['svg'] = 'image/svg+xml';
    $file_types = array_merge($file_types, $new_filetypes );
    return $file_types;
    }
add_action('upload_mimes', 'add_file_types_to_uploads');

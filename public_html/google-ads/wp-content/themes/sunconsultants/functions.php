<?php
/**
 * sunconsultants functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package sunconsultants
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function sunconsultants_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on sunconsultants, use a find and replace
		* to change 'sunconsultants' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'sunconsultants', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'sunconsultants' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'sunconsultants_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'sunconsultants_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sunconsultants_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'sunconsultants_content_width', 640 );
}
add_action( 'after_setup_theme', 'sunconsultants_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sunconsultants_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sunconsultants' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sunconsultants' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sunconsultants_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sunconsultants_scripts() {
	wp_enqueue_style( 'sunconsultants-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sunconsultants-style', 'rtl', 'replace' );

	wp_enqueue_script( 'sunconsultants-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sunconsultants_scripts' );

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

function custom_phone_validation($result,$tag){

    $type = $tag->type;
    $name = $tag->name;

    if($type == 'tel' || $type == 'tel*'){

        $phoneNumber = isset( $_POST[$name] ) ? trim( $_POST[$name] ) : '';

        $phoneNumber = preg_replace('/[() .+-]/', '', $phoneNumber);
            if ( strlen((string)$phoneNumber) < 6 || strlen((string)$phoneNumber) > 12 ) {
                $result->invalidate( $tag, 'Please enter a valid phone number.' );
            }
    }
    return $result;
	
}
add_filter('wpcf7_validate_tel','custom_phone_validation', 10, 2);
add_filter('wpcf7_validate_tel*', 'custom_phone_validation', 10, 2);

/* function custom_phone_validation($result,$tag){
   $type = $tag['type'];
   $name = $tag['name'];
   if($name == 'phone-number'){
   $phoneNumber = isset( $_POST['phone-number'] ) ? trim( $_POST['phone-number'] ) : '';
   if( strlen($phoneNumber) < 10 || strlen($phoneNumber) > 12){
       $result->invalidate( $tag, "Please enter a valid phone number." );
   }
  }
  return $result;
  } */
//add_filter('wpcf7_validate_tel','custom_phone_validation', 10, 2);
//add_filter('wpcf7_validate_tel*', 'custom_phone_validation', 10, 2);

// Add redirection after form submission
function cf7_footer_script() {
	?>
	<script>
		document.addEventListener( 'wpcf7mailsent', function( event ) {
			if ( '8' == event.detail.contactFormId ) {
				location = 'https://sunconsultants.co.in/lp/cdsco-thank-you/';
			}
			else if ( '22' == event.detail.contactFormId ) {
				location = 'https://sunconsultants.co.in/lp/bis-thank-you/';
			}
			else if ( '21' == event.detail.contactFormId ) {
				location = 'https://sunconsultants.co.in/lp/lmpc-thank-you/';
			}
			else if ( '23' == event.detail.contactFormId ) {
				location = 'https://sunconsultants.co.in/lp/pwm-thank-you/';
			}
		}, false );
	</script>
<?php
}
add_action( 'wp_footer', 'cf7_footer_script' );
<?php if ( !defined('ABSPATH') ) die();

define( 'FSCHILD_THEME_VERSION', '1.0' );
define( 'FSCHILD_THEME_DIR', get_stylesheet_directory() );
define( 'FSCHILD_THEME_URL', get_stylesheet_directory_uri() );

// $primary = get_theme_mod('primary_color', '#23252b');
// $secondary = get_theme_mod('primary_color', '#606060');
// $accent = get_theme_mod('primary_color', '#8def12');
// $bg = get_theme_mod('bg_color', '#f0f0f0');
// $text_color = get_theme_mod('text_color', '#182C34');

// I18n

load_theme_textdomain( 'fs_gallery', FSCHILD_THEME_DIR . '/languages' );


// Gutenberg editor styles

function fschild_block_editor_styles() {
    wp_enqueue_style( 
    	'fschild_block_editor_styles',
    	FSCHILD_THEME_URL .'/css/block-editor-child.css', 
    	array('fs_block_editor_styles'), 
    	FSCHILD_THEME_VERSION, 
    	'screen'
    );
}
add_action( 'enqueue_block_editor_assets', 'fschild_block_editor_styles' );

// Gutenberg allowed blocks

function fschild_allowed_blocks() {
	wp_enqueue_script(
		'byebyeblocks',
		FSCHILD_THEME_URL . '/js/byebyeblocks.js',
		array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ), 
		FS_THEME_VERSION
	);
}
add_action( 'enqueue_block_editor_assets', 'fschild_allowed_blocks' );

function fschild_setup() {
	
	// Blocks styles
	
	register_block_style(
	  'core/image',
		array(
		  'name'	=> 'noborder',
		  'label'	=> esc_attr__( 'No border', 'fs_gallery' ),
		)
	);
	register_block_style(
	  'core/image',
		array(
		  'name'	=> 'circle',
		  'label'	=> esc_attr__( 'Circle', 'fs_gallery' ),
		)
	);
	
	// global $primary;
	// global $secondary;
	// global $accent;
	// global $bg;
	// global $text_color;
	// 
	// add_theme_support( 'editor-font-sizes', array(
    // 	array(
    //     	'name' => __( 'Small', 'fs_gallery' ),
    //     	'size' => 14,
    //     	'slug' => 'small'
    // 	),
	// 	array(
    //     	'name' => __( 'Regular', 'fs_gallery' ),
    //     	'size' => 16,
    //     	'slug' => 'regular'
    // 	),
	// 	array(
    //     	'name' => __( 'Medium', 'fs_gallery' ),
    //     	'size' => 18,
    //     	'slug' => 'medium'
    // 	),
    // 	array(
    //     	'name' => __( 'Large', 'fs_gallery' ),
    //     	'size' => 22,
    //     'slug' => 'large'
    // 	),
	// ));
	// 
	// add_theme_support( 'disable-custom-font-sizes' );
	// 
	// 
	// add_theme_support( 'editor-color-palette', array(
	//     
	//  // Customizer colors
	//     
	// 	array(
	//         'name' => esc_html__( 'Primary color', 'fs_gallery' ),
	//         'slug' => 'primary',
	//         'color' => $primary,
	//     ),
	// 	array(
	//         'name' => esc_html__( 'Background color', 'fs_gallery' ),
	//         'slug' => 'bg',
	//         'color' => $bg,
	//     ),
	// 	array(
	//         'name' => esc_html__( 'White', 'fs_gallery' ),
	//         'slug' => 'white',
	//         'color' => '#FFFFFF',
	//     ),
	// 	array(
	//         'name' => esc_html__( 'Text color', 'fs_gallery' ),
	//         'slug' => 'text',
	//         'color' => $text_color,
	//     ),
	//     
	// ));
	// 
	// add_theme_support( 'disable-custom-colors' );
	// add_theme_support( 'editor-gradient-presets', [] );
	// add_theme_support( 'disable-custom-gradients', true );
	//
	// add_theme_support( 'editor-gradient-presets', array(
    //     array(
    //         'name'     => esc_attr__( 'Light blue to white', 'fs_gallery' ),
    //         'gradient' => 'linear-gradient(180deg, #E3F2F4 50%, #FFFFFF 100%)',
    //         'slug'     => 'light-blue'
    //     ),
    //     array(
    //         'name'     => esc_attr__( 'Dark blue to black', 'fs_gallery' ),
    //         'gradient' => 'linear-gradient(180deg, #264652 50%, #182C34 100%)',
    //         'slug'     => 'dark-blue',
    //     ),
    //     array(
    //         'name'     => esc_attr__( 'White and light blue', 'fs_gallery' ),
    //         'gradient' => 'linear-gradient(90deg, #FFFFFF 0%, #FFFFFF 50%, #E3F2F4 50%, #E3F2F4 100%)',
    //         'slug'     => 'white-blue',
    //     ),
    // ));
	
	
}
add_action( 'after_setup_theme', 'fschild_setup' );


//	Admin style and script

// add_action('admin_enqueue_scripts', 'fschild_admin_css', 11 );
// function fschild_admin_css() {
// 	wp_enqueue_style( 'child-admin-css', FSCHILD_THEME_URL . '/css/admin-child.css' );
// }

// Enqueue JS & CSS

function fschild_scripts_load() {
    if (!is_admin()) {
		
		// Parent's CSS
		
		wp_enqueue_style( 
			'parent-style', 
			FS_THEME_URL . '/style.css',
			array(),
			false,
			'screen'
		);
		
	}
}    
add_action( 'wp_enqueue_scripts', 'fschild_scripts_load' );


// Customizer

//require FSCHILD_THEME_DIR . '/inc/customizer.php';



// ------------------------
// ACF
// ------------------------


if( class_exists('acf') ) {

	// Custom blocks

	// $my_blocks = array_diff( scandir(FSCHILD_THEME_DIR . '/blocks'), array('..', '.', '.DS_Store') );
	// 
	// foreach( $my_blocks as $block ) {
	// 	include_once 'blocks/'. $block .'/'. $block .'.php';
	// 	include_once 'blocks/'. $block .'/'. $block .'-fields.php';
	// }
	
	// Front-End ACF Functions
	// 
	// add_filter('acf/settings/save_json', 'fs_acf_json_save_point');
	// function fs_acf_json_save_point( $path ) {
	//     
	//     $path = FSCHILD_THEME_DIR . '/inc/acf';
	//     
	//     return $path;
	// }
	// add_filter('acf/settings/load_json', 'fs_acf_json_load_point');
	// function fs_acf_json_load_point( $paths ) {
	//     
	//     unset($paths[0]);
	// 
	//     $paths[] = FSCHILD_THEME_DIR . '/inc/acf';
	//     
	//     return $paths;
	// }
		
	
	//	ACF Options page
		
	// if (function_exists('acf_add_options_page')) {
	//     
	// 	add_action( 'init', 'fs_acf_add_options_page' );
	// 	function fs_acf_add_options_page() {
	// 		
	// 		acf_add_options_page(array(
	// 			'page_title'	=> esc_html__( 'Site Options', 'fs_gallery' ),
	// 			'menu_title'	=> esc_html__( 'Site Options', 'fs_gallery' ),
	// 			'menu_slug'		=> 'options-site',
	// 			'capability'	=> 'edit_posts',
	// 			'icon_url'		=> 'dashicons-admin-network',
	// 			'redirect'		=> false,
	// 			'position'		=> 30
	// 		));
	// 		
	// 		$parent = acf_add_options_page(array(
	// 			'page_title'	=> esc_html__( 'Site Options', 'fs_gallery' ),
	// 			'menu_title'	=> esc_html__( 'Site Options', 'fs_gallery' ),
	// 			'menu_slug'		=> 'options-site',
	// 			'capability'	=> 'edit_posts',
	// 			'icon_url'		=> 'dashicons-admin-network',
	// 			'redirect'		=> 'options-site-partners',
	// 			'position'		=> 30
	// 		));
	// 		acf_add_options_sub_page(array(
	// 			'page_title' 	=> esc_html__( 'Partners', 'fs_gallery'),
	// 			'menu_title' 	=> esc_html__( 'Partners', 'fs_gallery'),
	// 			'parent_slug' 	=> $parent['menu_slug'],
	// 			'menu_slug'		=> 'options-site-partners'
	// 		));	
	// 		acf_add_options_sub_page(array(
	// 			'page_title' 	=> esc_html__( 'Program', 'fs_gallery'),
	// 			'menu_title' 	=> esc_html__( 'Program', 'fs_gallery'),
	// 			'parent_slug' 	=> $parent['menu_slug'],
	// 			'menu_slug'		=> 'options-site-program'
	// 		));
	// 		
	// 	}
	// }
	

}
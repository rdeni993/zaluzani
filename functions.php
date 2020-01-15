<?php 

/** Functions FILE */
/** This is File Where I can create */
/** all important functions for my Theme */

/** Register all CSS files */
function load_css()
{
    // Register Font
    wp_register_style('font', 'https://fonts.googleapis.com/css?family=Pacifico|Roboto:100&display=swap');
    
    // Load BootStrap
    wp_register_style('bootstrap.min', get_template_directory_uri() . '/css/bootstrap.min.css' );

    // Load Theme CSS
    wp_register_style('theme', get_template_directory_uri() . '/css/theme.css' );

    // Load Mobile Version
    wp_register_style('mobile', get_template_directory_uri() . '/css/mobile.css');

    // Load Bootstrap Nav
    wp_register_style('navbar', get_template_directory_uri() . '/css/bootstrap-navbar.css');

    // Load Bootstrap Nav Mobile
    wp_register_style('navbar.mobile', get_template_directory_uri() . '/css/bootstrap-navbar-mobile.css');

    // Enqueue All Css Scripts
    wp_enqueue_style('font');
    wp_enqueue_style('bootstrap.min');
    wp_enqueue_style('theme');
    wp_enqueue_style('mobile');
    wp_enqueue_style('navbar');
    wp_enqueue_style('navbar.mobile');

}

/** Register default version of jQueri */
function overwrite_jquery()
{
    // We need to deregister jquery script
    wp_deregister_script('jquery');

    // Register new script
    wp_register_script('jquery', get_template_directory_uri() . '/js/jquery-3.4.1.js' );

    // Enqueue JS
    wp_enqueue_script('jquery');

}

/** Register all Javascript files */
function load_js()
{
    // Load Bootstrap
      wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js' );

    // Load MyScript
    wp_register_script('theme-script', get_template_directory_uri() . '/js/theme-script.js' );


    // Enqueue All Js Scripts
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('theme-script');

}

/** Register Menus */
register_nav_menus([
    
    // FrontPageMenu
    'main_menu' => __('Front Menu', 'theme'),
    'docs_menu' => __('Document Menu', 'theme')

]);

/** Register Sidebar */
function init_my_widget()
{
    /** Main Sidebar */
    register_sidebar([
        'name' => "Main Sidebar",
        'id'   => 'sidebar-1',
        'class' => 'sidebar_widgets',
        'before_widget' => '<article class="text-justify roboto">',
        'after_widget' => '</article>',
        'before_title' => '<h1>',
        'after_title' => '</h1>'
    ]);

    /** Bottom left */
    register_sidebar([
        'name'  => 'Bottom Left Sidebar',
        'id'    => 'bottom_left_sidebar',
        'class' => 'sidebar-a',
        'before_widget' => '<article>',
        'after_widget' => '</article>',
        'before_title' => '<h1>',
        'after_title' => '</h1>'
    ]);

    /** Bottom Middle */
    register_sidebar([
        'name'  => 'Bottom Middle Sidebar',
        'id'    => 'bottom_middle_sidebar',
        'class' => 'sidebar-b',
        'before_widget' => '<article>',
        'after_widget' => '</article>',
        'before_title' => '<h1>',
        'after_title' => '</h1>'
    ]);

    /** Right Middle */
    register_sidebar([
        'name'  => 'Bottom Right Sidebar',
        'id'    => 'bottom_right_sidebar',
        'class' => 'sidebar-c',
        'before_widget' => '<article>',
        'after_widget' => '</article>',
        'before_title' => '<h1>',
        'after_title' => '</h1>'
    ]);

}

/** Register Bootstrap NavWalker */
function register_navwalker()
{
    require_once('bs4navwalker.php');
}

/** Display Just Last ten posts on homepage */
function display_ten_posts($query)
{
    if( is_home() ){ 
        $query->set( 'posts_per_page', 10 ); 
    }
    if( is_category() ){
        $query->set( 'posts_per_page', 100 );
    }
}

/** Add Action */
add_action('wp_enqueue_scripts', 'load_css'); // Load CSS
add_action('wp_enqueue_scripts', 'overwrite_jquery'); // Load jQuery
add_action('wp_enqueue_scripts', 'load_js'); //Load Javascript
add_action('widgets_init', 'init_my_widget'); // Init Widget
add_action('after_setup_theme', 'register_navwalker'); // Display Bootstrap navigation
add_action('pre_get_posts', 'display_ten_posts');// Display Just 10 posts on homepage

/** Add Theme Support */
add_theme_support('menus');
add_theme_support('post-thumbnails');
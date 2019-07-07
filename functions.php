<?php

/*Register nav menus*/
register_nav_menus( array(
    'mainmenu' => 'Main menu',
) );

if(function_exists('register_sidebars')){
    register_sidebar(array(
        'name' => 'sidebarwidgets',
        'id' => 'sidebarwidgets',
        'description' => 'Disse widgets vises i sidebaren',
        'before_title' => '<h2>',
        'after_title' => '</h2>'
    ));
}

/*Post thumbnails support*/
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1200, 800, true );

/*Længde på the_excerpt*/
function custom_excerpt_length( $length ) {
	return 15;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

/*Enqueuing of scripts, styles etc.*/
function wpstrapit_scripts() {
    
    /*Bootstrap CSS*/
    wp_enqueue_style( 'wpstrapit-bootstrapcss', get_template_directory_uri() .'/css/bootstrap.min.css' );
	
    
    /*Theme CSS*/
    wp_enqueue_style( 'wpstrapit-style', get_stylesheet_uri() );
    
    /*Bootstrap js*/
    wp_enqueue_script( 'wpstrapit-bootsrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '20141110', true );
	
}

add_action( 'wp_enqueue_scripts', 'wpstrapit_scripts' );

/*Custom walker, bootstrap nav*/
require get_template_directory() . '/wp_bootstrap_navwalker.php';

/**
 * Extend WordPress search to include custom fields
 *
 * http://adambalee.com
 */

/**
 * Join posts and postmeta tables
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_join
 */
function cf_search_join( $join ) {
    global $wpdb;

    if ( is_search() ) {    
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    
    return $join;
}
add_filter('posts_join', 'cf_search_join' );

/**
 * Modify the search query with posts_where
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_where
 */
function cf_search_where( $where ) {
    global $pagenow, $wpdb;
   
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }

    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );

/**
 * Prevent duplicates
 *
 * http://codex.wordpress.org/Plugin_API/Filter_Reference/posts_distinct
 */
function cf_search_distinct( $where ) {
    global $wpdb;

    if ( is_search() ) {
        return "DISTINCT";
    }

    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );


/* Muliggør styling af navigationselementer på index-siden */

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="btn btn-primary"';
}


?>
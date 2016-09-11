<?php
/*
Plugin Name: Team Members Plugin
Plugin URI: 
Description: Add a directory of team members to your website. 
Author: Chris Davies
Author URI:
Version: 1.0
Text Domain: team
*/

/*
|--------------------------------------------------------------------------
| BOOK POST TYPE - SETUP
|--------------------------------------------------------------------------
*/

function rnf_team_post_type()
{

	// SET UI LABELS FOR CPT
	$labels = array(
		'name'                => _x( 'Team Directory', 'Post Type General Name', 'books' ), // Apears at top of Post Screen
		'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'books' ),
		'menu_name'           => __( 'Team', 'books' ), // Appears on Admin Menu
		'all_items'           => __( 'All Team Members', 'books' ),
		'view_item'           => __( 'View Team Member', 'books' ),
		'add_new_item'        => __( 'Add New Team Member', 'books' ), // Apears at top of Post Screen
		'add_new'             => __( 'Add New Member', 'books' ), // Appears on Admin Menu
		'edit_item'           => __( 'Edit Team Member', 'books' ),
		'update_item'         => __( 'Update Team Member', 'books' ),
		'search_items'        => __( 'Search Team', 'books' ),
		'not_found'           => __( 'Not Found', 'books' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'books' ),
	);
	
	// SET OTHER OPTIONS FOR CPT	
	$args = array(
		'label'               => __( 'team', 'books' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail',), // Features this CPT supports in Post Editor
		'taxonomies'          => array( 'genres' ),	// You can associate this CPT with a taxonomy or custom taxonomy.
		'hierarchical'        => false, // A hierarchical CPT is like Pages and can have Parent and child items. A non-hierarchical CPT is like Posts.
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 20,
		'menu_icon'			  => 'dashicons-groups',
		'can_export'          => true,
		'has_archive'         => false,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite' => array( 'slug' => 'team' ),
	);
	
	// REGISTER THE CPT
	register_post_type( 'team', $args );

}

function rnf_team_rewrite_flush() {
    // First, we "add" the custom post type via the above written function.
    // Note: "add" is written with quotes, as CPTs don't get added to the DB,
    // They are only referenced in the post_type column with a post entry, 
    // when you add a post of this CPT.
    rnf_team_post_type();

    // ATTENTION: This is *only* done during plugin activation hook in this example!
    // You should *NEVER EVER* do this on every page load!!
    flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'rnf_team_rewrite_flush' );

add_action( 'init', 'rnf_team_post_type', 0 );

/*
|--------------------------------------------------------------------------
| PLUGIN FUNCTIONS
|--------------------------------------------------------------------------
*/

define( 'RNF_TEAM_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );

// BOOKS SHORTCODES

function rnf_team_directory_shortcode() {
    ob_start();
    include ( RNF_TEAM_PLUGIN_PATH . 'templates/directory.php');
    $content = ob_get_clean();
    return $content;
}

add_shortcode( 'team_directory', 'rnf_team_directory_shortcode' );

// CHANGE TEXT FOR 'ENTER TITLE HERE'

function rnf_change_title_text( $title )
{
     $screen = get_current_screen();
 
     if  ( 'team' == $screen->post_type ) {
          $title = 'Team Member Name';
     }
 
     return $title;
}
 
add_filter( 'enter_title_here', 'rnf_change_title_text' );

/*
|--------------------------------------------------------------------------
| META BOX - Book Options
|--------------------------------------------------------------------------
*/

?>
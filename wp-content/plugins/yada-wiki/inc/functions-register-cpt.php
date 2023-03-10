<?php
/***************************************
* Abort if called outside of WordPress
***************************************/
defined('ABSPATH') or die("Access Denied.");

if ( ! function_exists('register_yada_wiki') ) {

	/***************************************
	* Registers the wiki custom post type
	***************************************/
	function register_yada_wiki() {
		$slug = get_wiki_slug();
		$is_hierarchical = get_wiki_hierarchical(); 
		// if false this is the default
		$supports_array = array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'publicize', 'wpcom-markdown', 'custom-fields' );
		if ($is_hierarchical==true) {
			// if true show page attributes meta box
			$supports_array = array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'publicize', 'wpcom-markdown', 'custom-fields', 'page-attributes' );
		}

		$labels = array(
			'name'                => _x( 'Wiki Pages', 'Post Type General Name', 'yada_wiki_domain' ),
			'singular_name'       => _x( 'Wiki', 'Post Type Singular Name', 'yada_wiki_domain' ),
			'menu_name'           => __( 'Wiki Pages', 'yada_wiki_domain' ),
			'parent_item_colon'   => __( 'Parent:', 'yada_wiki_domain' ),
			'all_items'           => __( 'All Wiki Pages', 'yada_wiki_domain' ),
			'view_item'           => __( 'View', 'yada_wiki_domain' ),
			'add_new_item'        => __( 'Add New Wiki Page', 'yada_wiki_domain' ),
			'add_new'             => __( 'Add New', 'yada_wiki_domain' ),
			'edit_item'           => __( 'Edit', 'yada_wiki_domain' ),
			'update_item'         => __( 'Update', 'yada_wiki_domain' ),
			'search_items'        => __( 'Search Wiki', 'yada_wiki_domain' ),
			'not_found'           => __( 'Not found', 'yada_wiki_domain' ),
			'not_found_in_trash'  => __( 'Not found in trash', 'yada_wiki_domain' ),
		);
		$rewrite = array(
			'slug'                => $slug,
			'with_front'          => true,
			'pages'               => true,
			'feeds'               => true,
		);
		$args = array(
			'label'               => __( 'yada_wiki', 'yada_wiki_domain' ),
			'description'         => __( 'A wiki custom post type', 'yada_wiki_domain' ),
			'labels'              => $labels,
			'supports'            => $supports_array,
			'taxonomies'          => array( 'wiki_tags', 'wiki_cats' ),
			'hierarchical'        => $is_hierarchical,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'show_in_rest'		  => true,
			'menu_position'       => 20,
			'menu_icon'           => 'dashicons-lightbulb',
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
		);
		register_post_type( 'yada_wiki', $args );
	}
}
add_action( 'init', 'register_yada_wiki' ); 

if ( ! function_exists('register_yada_wiki_cats') ) {

	/***************************************
	* Registers the wiki taxonomy categories
	***************************************/
	function register_yada_wiki_cats() {
		
		$labels = array(
			'name'                       => _x( 'Wiki Categories', 'Taxonomy General Name', 'yada_wiki_domain' ),
			'singular_name'              => _x( 'Wiki Category', 'Taxonomy Singular Name', 'yada_wiki_domain' ),
			'menu_name'                  => __( 'Wiki Categories', 'yada_wiki_domain' ),
			'all_items'                  => __( 'All Wiki Categories', 'yada_wiki_domain' ),
			'parent_item'                => __( 'Parent Wiki Category', 'yada_wiki_domain' ),
			'parent_item_colon'          => __( 'Parent Wiki Category:', 'yada_wiki_domain' ),
			'new_item_name'              => __( 'New Wiki Category', 'yada_wiki_domain' ),
			'add_new_item'               => __( 'Add New Wiki Category', 'yada_wiki_domain' ),
			'edit_item'                  => __( 'Edit Wiki Category', 'yada_wiki_domain' ),
			'update_item'                => __( 'Update Wiki Category', 'yada_wiki_domain' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'yada_wiki_domain' ),
			'search_items'               => __( 'Search Wiki Categories', 'yada_wiki_domain' ),
			'add_or_remove_items'        => __( 'Add or remove Wiki Category', 'yada_wiki_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used Wiki Categories', 'yada_wiki_domain' ),
			'not_found'                  => __( 'Wiki Category Not Found', 'yada_wiki_domain' ), 
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'query_var'                  => true,
			'rewrite'                    => array( 'slug' => '' ),
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'wiki_cats', 'yada_wiki', $args );
	}
}
add_action( 'init', 'register_yada_wiki_cats' ); 

if ( ! function_exists('register_yada_wiki_tags') ) {

	/***************************************
	* Registers the wiki taxonomy tags
	***************************************/
	function register_yada_wiki_tags() {
		
		$labels = array(
			'name'                       => _x( 'Wiki Tags', 'Taxonomy General Name', 'yada_wiki_domain' ),
			'singular_name'              => _x( 'Wiki Tag', 'Taxonomy Singular Name', 'yada_wiki_domain' ),
			'menu_name'                  => __( 'Wiki Tags', 'yada_wiki_domain' ),
			'all_items'                  => __( 'All Wiki Tags', 'yada_wiki_domain' ),
			'parent_item'                => __( 'Parent Wiki Tag', 'yada_wiki_domain' ),
			'parent_item_colon'          => __( 'Parent Wiki Tag:', 'yada_wiki_domain' ),
			'new_item_name'              => __( 'New Wiki Tag', 'yada_wiki_domain' ),
			'add_new_item'               => __( 'Add New Wiki Tag', 'yada_wiki_domain' ),
			'edit_item'                  => __( 'Edit Wiki Tag', 'yada_wiki_domain' ),
			'update_item'                => __( 'Update Wiki Tag', 'yada_wiki_domain' ),
			'separate_items_with_commas' => __( 'Separate tags with commas', 'yada_wiki_domain' ),
			'search_items'               => __( 'Search Wiki Tags', 'yada_wiki_domain' ),
			'add_or_remove_items'        => __( 'Add or remove Wiki Tags', 'yada_wiki_domain' ),
			'choose_from_most_used'      => __( 'Choose from the most used Wiki Tags', 'yada_wiki_domain' ),
			'not_found'                  => __( 'Wiki Tag Not Found', 'yada_wiki_domain' ), 
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => false,
			'public'                     => true,
			'show_ui'                    => true,
			'query_var'                  => true,
			'rewrite'                    => array( 'slug' => '' ),
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'show_in_rest'               => true,
		);
		register_taxonomy( 'wiki_tags', 'yada_wiki', $args );
	}
}
add_action( 'init', 'register_yada_wiki_tags' ); 

if ( ! function_exists('get_wiki_slug') ) {
	function get_wiki_slug() {
		$options = get_option( 'yada_wiki_settings' );
		if ( isset($options['yada_wiki_textfield_wiki_slug_setting']) ) {
			$slug = $options['yada_wiki_textfield_wiki_slug_setting'];
			if ( ctype_alpha ($slug) ) {
				$slug = strtolower($slug);
			} else {
				$slug = 'wiki';
			}
		} else {
			$slug = 'wiki';
		}
		return $slug;
	}
}

if ( ! function_exists('get_wiki_hierarchical') ) {
	function get_wiki_hierarchical() {
		$is_hierarchical = false;
		$options = get_option( 'yada_wiki_settings' );
		if ( isset($options['yada_wiki_checkbox_wiki_hierarchical_setting']) ) {
			$is_hierarchical = $options['yada_wiki_checkbox_wiki_hierarchical_setting'];
			if ( $is_hierarchical != true ) {
				$is_hierarchical = false;
			} 
		}
		return $is_hierarchical;
	}
}

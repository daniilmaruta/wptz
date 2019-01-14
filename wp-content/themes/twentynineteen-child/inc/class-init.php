<?php
/**
 * Class WPTZ_Init
 * Theme setup and initialisation
 */
class WPTZ_Init {

	public function __construct() {

		/* @see register_post_type_event */
		add_action( 'init', [ $this, 'register_post_type_event' ] );

		/* @see register_post_type_event_day */
		add_action( 'init', [ $this, 'register_post_type_event_day' ] );

		/* @see enqueue_scripts */
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Register new custom post type Event
	 */
	function register_post_type_event() {

		/**
		 * Post Type: Event.
		 */

		$labels = array(
			'name'          => __( 'Events', 'understrap-child' ),
			'singular_name' => __( 'Event', 'understrap-child' ),
			'all_items'     => __( 'All Events', 'understrap-child' ),
			'add_new'       => __( 'Add New Event', 'understrap-child' ),
			'add_new_item'  => __( 'Add New Event', 'understrap-child' ),
			'edit_item'     => __( 'Edit Event', 'understrap-child' ),
			'new_item'      => __( 'New Event', 'understrap-child' ),
			'view_item'     => __( 'View Event', 'understrap-child' ),
			'view_items'    => __( 'View Event', 'understrap-child' ),
		);

		$args = array(
			'label'               => '',
			'labels'              => $labels,
			'description'         => '',
			'public'              => true,
			'publicly_queryable'  => true,
			'show_ui'             => true,
			'show_in_rest'        => false,
			'rest_base'           => '',
			'has_archive'         => false,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'exclude_from_search' => false,
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'hierarchical'        => false,
			'rewrite'             => array( 'slug' => 'event', 'with_front' => true ),
			'query_var'           => true,
			'menu_icon'           => 'dashicons-sticky',
			'supports'            => array( 'title', 'editor', ),
		);

		register_post_type( 'event', $args );
	}

	/**
	 * Register new custom post type Event day
	 */
	function register_post_type_event_day() {

		/**
		 * Post Type: Event day.
		 */

		$labels = array(
			'name'          => __( 'Event days', 'understrap-child' ),
			'singular_name' => __( 'Event day', 'understrap-child' ),
			'all_items'     => __( 'All Event days', 'understrap-child' ),
			'add_new'       => __( 'Add New Event day', 'understrap-child' ),
			'add_new_item'  => __( 'Add New Event day', 'understrap-child' ),
			'edit_item'     => __( 'Edit Event day', 'understrap-child' ),
			'new_item'      => __( 'New Event day', 'understrap-child' ),
			'view_item'     => __( 'View Event day', 'understrap-child' ),
			'view_items'    => __( 'View Event day', 'understrap-child' ),
		);

		$args = array(
			'label'               => '',
			'labels'              => $labels,
			'description'         => '',
			'public'              => false,
			'publicly_queryable'  => false,
			'show_ui'             => true,
			'show_in_rest'        => false,
			'rest_base'           => null,
			'has_archive'         => false,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'exclude_from_search' => true,
			'capability_type'     => 'post',
			'map_meta_cap'        => true,
			'hierarchical'        => false,
			'rewrite'             => false,
			'menu_icon'           => 'dashicons-clock',
			'supports'            => array( 'title', 'editor', 'thumbnail' ),
		);

		register_post_type( 'event_day', $args );
	}

	/**
	 * Add parent scripts
	 */
	function enqueue_scripts() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	}
}

new WPTZ_Init();
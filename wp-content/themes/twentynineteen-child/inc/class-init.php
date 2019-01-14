<?php
/**
 * Class WPTZ_Init
 * Theme setup and initialisation
 */
class WPTZ_Init {

	public function __construct() {

		/**
		 * Register new custom post type Event
		 * @see register_post_type_event
		 */
		add_action( 'init', [ $this, 'register_post_type_event' ] );

		/**
		 * Register new custom post type Event day
		 * @see register_post_type_event_day
		 */
		add_action( 'init', [ $this, 'register_post_type_event_day' ] );

		/**
		 * Add parent scripts
		 * @see enqueue_scripts
		 */
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );

		/**
		 * Add references between post types Event and Event day
		 * @see p2p_connection_types
		 */
		add_action( 'p2p_init', [ $this, 'p2p_connection_types' ] );
	}

	/**
	 * Register new custom post type Event
	 */
	function register_post_type_event() {

		/**
		 * Post Type: Event.
		 */

		$labels = array(
			'name'          => __( 'Events', 'twentynineteen-child' ),
			'singular_name' => __( 'Event', 'twentynineteen-child' ),
			'all_items'     => __( 'All Events', 'twentynineteen-child' ),
			'add_new'       => __( 'Add New Event', 'twentynineteen-child' ),
			'add_new_item'  => __( 'Add New Event', 'twentynineteen-child' ),
			'edit_item'     => __( 'Edit Event', 'twentynineteen-child' ),
			'new_item'      => __( 'New Event', 'twentynineteen-child' ),
			'view_item'     => __( 'View Event', 'twentynineteen-child' ),
			'view_items'    => __( 'View Event', 'twentynineteen-child' ),
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
			'name'          => __( 'Event days', 'twentynineteen-child' ),
			'singular_name' => __( 'Event day', 'twentynineteen-child' ),
			'all_items'     => __( 'All Event days', 'twentynineteen-child' ),
			'add_new'       => __( 'Add New Event day', 'twentynineteen-child' ),
			'add_new_item'  => __( 'Add New Event day', 'twentynineteen-child' ),
			'edit_item'     => __( 'Edit Event day', 'twentynineteen-child' ),
			'new_item'      => __( 'New Event day', 'twentynineteen-child' ),
			'view_item'     => __( 'View Event day', 'twentynineteen-child' ),
			'view_items'    => __( 'View Event day', 'twentynineteen-child' ),
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
			'supports'            => array( 'title', 'editor' ),
		);

		register_post_type( 'event_day', $args );
	}

	/**
	 * Add parent scripts
	 */
	function enqueue_scripts() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	}

	/**
	 * Add references between post types Event and Event day
	 */
	function p2p_connection_types() {
		p2p_register_connection_type( array(
			'name'		  => 'events_to_event_days',
			'from'		  => 'event',
			'to' 		  => 'event_day',
			'cardinality' => 'one-to-many',
		) );
	}
}

new WPTZ_Init();
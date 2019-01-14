<?php
/**
 * Class WPTZ_Init
 * Theme setup and initialisation
 */
class WPTZ_Init {

	public function __construct() {

		/* @see enqueue_scripts */
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
	}

	/**
	 * Add parent scripts
	 */
	function enqueue_scripts() {
		wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	}
}

new WPTZ_Init();
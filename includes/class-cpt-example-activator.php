<?php

/**
 * Fired during plugin activation
 *
 * @link       https://josuedanielbust.com
 * @since      1.0.0
 *
 * @package    CPT_Example
 * @subpackage CPT_Example/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    CPT_Example
 * @subpackage CPT_Example/includes
 * @author     Josue Bustamante <josue@bustamante.email>
 */
class CPT_Example_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
		// Flush rewrite rules to ensure our custom post types are registered.
		flush_rewrite_rules();
	}

}

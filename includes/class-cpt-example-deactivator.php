<?php

/**
 * Fired during plugin deactivation
 *
 * @link       https://josuedanielbust.com
 * @since      1.0.0
 *
 * @package    CPT_Example
 * @subpackage CPT_Example/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    CPT_Example
 * @subpackage CPT_Example/includes
 * @author     Josue Bustamante <josue@bustamante.email>
 */
class CPT_Example_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function deactivate() {
		// Flush rewrite rules to ensure our custom post types are removed.
		flush_rewrite_rules();
	}

}

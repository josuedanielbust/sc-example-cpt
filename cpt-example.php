<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://josuedanielbust.com
 * @since             1.0.0
 * @package           CPT_Example
 *
 * @wordpress-plugin
 * Plugin Name:       CPT Example
 * Plugin URI:        https://josuedanielbust.com/cpt_example/
 * Description:       CPT Example for Wordpress - Needs Google Maps API
 * Version:           1.0.0
 * Author:            Josue Bustamante
 * Author URI:        https://josuedanielbust.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cpt_example
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CPT_EXAMPLE_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cpt_example-activator.php
 */
function activate_cpt_example() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cpt-example-activator.php';
	CPT_Example_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cpt_example-deactivator.php
 */
function deactivate_cpt_example() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cpt-example-deactivator.php';
	CPT_Example_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cpt_example' );
register_deactivation_hook( __FILE__, 'deactivate_cpt_example' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cpt-example.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cpt_example() {

	$plugin = new CPT_Example();
	$plugin->run();

}
run_cpt_example();

<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://josuedanielbust.com
 * @since      1.0.0
 *
 * @package    CPT_Example
 * @subpackage CPT_Example/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    CPT_Example
 * @subpackage CPT_Example/public
 * @author     Josue Bustamante <josue@bustamante.email>
 */
class CPT_Example_Public {

  /**
   * The ID of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $cpt_example    The ID of this plugin.
   */
  private $cpt_example;

  /**
   * The version of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string    $version    The current version of this plugin.
   */
  private $version;

  /**
   * Initialize the class and set its properties.
   *
   * @since    1.0.0
   * @param      string    $cpt_example       The name of the plugin.
   * @param      string    $version    The version of this plugin.
   */
  public function __construct( $cpt_example, $version ) {
    $this->cpt_example = $cpt_example;
    $this->version = $version;
  }

  /**
   * Register the stylesheets for the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function enqueue_styles() {
    wp_enqueue_style( $this->cpt_example, plugin_dir_url( __FILE__ ) . 'css/cpt_example-public.css', array(), $this->version, 'all' );
  }

  /**
   * Register the JavaScript for the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function enqueue_scripts() {
    wp_enqueue_script( $this->cpt_example, plugin_dir_url( __FILE__ ) . 'js/cpt_example-public.js', array( 'jquery' ), $this->version, true );
  }
}

<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://josuedanielbust.com
 * @since      1.0.0
 *
 * @package    CPT_Example
 * @subpackage CPT_Example/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    CPT_Example
 * @subpackage CPT_Example/admin
 * @author     Josue Bustamante <josue@bustamante.email>
 */
class CPT_Example_Admin {

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
   * @param      string    $cpt_example       The name of this plugin.
   * @param      string    $version    The version of this plugin.
   */
  public function __construct( $cpt_example, $version ) {

    $this->cpt_example = $cpt_example;
    $this->version = $version;

  }

  /**
   * Register the stylesheets for the admin area.
   *
   * @since    1.0.0
   */
  public function enqueue_styles() {
    wp_enqueue_style( $this->cpt_example, plugin_dir_url( __FILE__ ) . 'css/cpt-example-admin.css', array(), $this->version, 'all' );
  }

  /**
   * Register the JavaScript for the admin area.
   *
   * @since    1.0.0
   */
  public function enqueue_scripts() {
    wp_enqueue_script( $this->cpt_example, plugin_dir_url( __FILE__ ) . 'js/cpt-example-admin.js', array( 'jquery' ), $this->version, false );
  }

  /**
   * Register Custom Post Type
   * 
   * @since      1.0.0
   */
  public function register_post_type_example() {
    register_post_type('example',
      array(
        'labels' => array(
          'name'                  =>  __( 'Examples' ),
          'singular_name'         =>  __( 'Example' ),
          'menu_name'             =>  __( 'CPT Example' ),
          'name_admin_bar'        =>  __( 'Examples'),
          'add_new'               =>  __( 'Add New', 'example' ),
          'add_new_item'          =>  __( 'Add new Example' ),
          'new_item'              =>  __( 'New example' ),
          'edit_item'             =>  __( 'Edit example' ),
          'view_item'             =>  __( 'View example' ),
          'all_items'             =>  __( 'All examples' ),
          'search_items'          =>  __( 'Search example' ),
          'parent_item_colon'     =>  __( 'Parent Example:' ),
          'not_found'             =>  __( 'No example found.' ),
          'not_found_in_trash'    =>  __( 'No example found in trash.' )
        ),
        'public'              =>  true,
        'show_in_rest'        =>  true,
        'hierarchical'        =>  true,
        'has_archive'         =>  true,
        'rewrite'             =>  true,
        'show_ui'             =>  true,
        'show_in_menu'        =>  true,
        'publicly_queryable'  =>  true,
        'rest_base'           =>  'example',
        'menu_icon'           =>  'dashicons-location-alt',
        'rewrite'             =>  array( 'slug' => 'example' ),
        'supports'            =>  array( 'title', 'thumbnail', 'editor', 'excerpt', 'custom-fields' ),
      )
    );
  }
  
  /**
   * Register Custom Post Type Categories
   * 
   * @since      1.0.0
   */
  public function register_post_type_example_categories() {
    register_taxonomy('example_category', 'example',
      array(
        'labels'            =>  array(
          'name' => _x( 'Categories', 'Categories' ),
          'singular_name' => _x( 'Category', 'CPT Category' ),
          'search_items' =>  __( 'Search Category' ),
          'popular_items' => __( 'Popular Categories' ),
          'all_items' => __( 'All Categories' ),
          'parent_item' => null,
          'parent_item_colon' => null,
          'edit_item' => __( 'Edit Category' ), 
          'update_item' => __( 'Update Category' ),
          'add_new_item' => __( 'Add New Category' ),
          'new_item_name' => __( 'New Category' ),
          'separate_items_with_commas' => __( 'Separate categories with commas' ),
          'add_or_remove_items' => __( 'Add or remove categories' ),
          'choose_from_most_used' => __( 'Choose from the most used categories' ),
          'menu_name' => __( 'Categories' ),
        ),
        'show_ui'           =>  true,
        'show_in_rest'      =>  true,
        'hierarchical'      =>  true,
        'query_var'         =>  true,
        'rewrite'           =>  array( 'slug' => 'example_category' ),
      )
    );
  }

  /**
   * Register Custom Post Type Metadata
   * 
   * @since      1.0.0
   */
  public function register_post_type_example_metadata() {
    register_post_meta( 'example', 'cpt_example_meta',
      array(
        'show_in_rest'  =>  true,
        'single'        =>  true,
        'type'          =>  'string',
      )
    );
  }

  /**
   * Register Metaboxes for Custom Post Type
   * 
   * @since      1.0.0
   */
  public function register_post_type_metaboxes() {
    add_meta_box( 'cpt_example_metadata', __('Example Meta'), array( $this, 'register_post_type_metaboxes_view' ), 'example', 'normal', 'high' );
  }

  /**
   * Register metaboxes view
   * 
   * @since      1.0.0
   */
  public function register_post_type_metaboxes_view() {
    global $post;
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/partials/cpt-example-admin-post-display.php';
  }

  /**
   * Save Metaboxes for Custom Post Type
   * 
   * @since      1.0.0
   */
  public function register_post_type_metaboxes_save() {
    global $post;
    
    $slug      =   'cpt_example_meta';
    if ( ! isset( $_POST[ $slug ] ) ) { return; }
    update_post_meta( $post->ID, $slug, sanitize_text_field( $_POST[ $slug ] ));
  }
}

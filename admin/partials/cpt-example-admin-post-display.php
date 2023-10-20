<?php
/**
 * Provide a custom metaboxes view for a custom post type for the plugin
 *
 *
 * @link       https://josuedanielbust.com
 * @since      1.0.0
 *
 * @package    CPT_Example
 * @subpackage CPT_Example/admin/partials
 */
?>

<?php
  $custom   =   get_post_custom( $post->ID );
  $slug     =   'cpt_example_meta';
  $name     =   'Example Meta';
  $value    =   isset( $custom[ $slug ] ) ? $custom[ $slug ][ 0 ] : '';
?>

<div class="cpt-metadata-groups">
  <div class="cpt-control-group">
    <label for="<?php echo $slug; ?>"><? echo $name; ?></label>
    <textarea name="<?php echo $slug; ?>" id="<?php echo $slug; ?>" cols="30" rows="10"><?php echo $value; ?></textarea>
  </div>
</div>
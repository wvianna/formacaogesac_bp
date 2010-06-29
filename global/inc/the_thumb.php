<?php
/*
Plugin Name: The Thumb
Plugin URI: http://xemele.cultura.gov.br/
Description: Returns the first image of a post
Version: 0.1
Author: Equipe Web MinC
Author URI: http://xemele.cultura.gov.br/
*/

function the_thumb($size = "medium", $add = "", $id = -1)
{
  global $wpdb, $post;
  
  if($id < 0) $id = $post->ID;
  
  $thumb = $wpdb->get_row("SELECT ID, post_title FROM {$wpdb->posts} WHERE post_parent = {$id} AND post_mime_type LIKE 'image%' ORDER BY menu_order");
  
  if(!empty($thumb))
  {
    $image = image_downsize($thumb->ID, $size);
    
    return "<img src='{$image[0]}' alt='{$thumb->post_title}' {$add} />";
  }
}
?>

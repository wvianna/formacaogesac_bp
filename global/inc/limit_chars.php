<?php
/*
Plugin Name: Limit Chars
Plugin URI: http://xemele.cultura.gov.br/
Description: Limit the quantity of characters
Version: 0.1
Author: Equipe Web MinC
Author URI: http://xemele.cultura.gov.br/
*/

function limit_chars($content, $length, $print = true)
{
  $content = strip_tags($content);
  
  if(strlen($content) > $length)
  {
    $content = substr($content, 0, $length);
    $content = substr($content, 0, strrpos($content, " "))."...";
  }
  
  if($print)
	  print $content;
	else
		return $content;
}
?>

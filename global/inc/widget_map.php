<?php
/*
Function Name: Widget Login
Plugin URI: http://xemele.cultura.gov.br/
Version: 0.1
Author: Marcos Maia Lopes
Author URI: http://xemele.cultura.gov.br/
*/

class widget_map extends WP_Widget
{	
	function widget_map()
	{
		$widget_args = array('classname' => 'widget_map', 'description' => __( 'Mapa') );
		parent::WP_Widget('mapa', __('Mapa'), $widget_args);
	}

	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Mapa' : $instance['title']);
		
		echo $before_widget
			 .$before_title
			 .$title
			 .$after_title;
			 ?>
             
             <h2>A rede no mapa</h2>
             <iframe src="<?php bloginfo('stylesheet_directory'); ?>/global/inc/map.php" frameborder="0"></iframe>
             <!--<a href="#" title="Ver mapa completo" class="submitDefault">Ver mapa completo &raquo;</a>-->
             
             <?php
		echo $after_widget;
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		if( $instance != $new_instance )
			$instance = $new_instance;
		
		return $instance;
	}

	function form($instance)
	{
	    $title = esc_attr( $instance['title'] );
	?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Título:</label>
				<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" maxlength="26" value="<?php echo $title; ?>" class="widefat" />
			</p>
        <?php
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("widget_map");'));

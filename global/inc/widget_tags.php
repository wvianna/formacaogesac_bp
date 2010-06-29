<?php
/*
Function Name: Widget Tag Cloud
Plugin URI: http://xemele.cultura.gov.br/
Version: 0.1
Author: Marcos Maia Lopes
Author URI: http://xemele.cultura.gov.br/
*/

class widget_tagcloud extends WP_Widget
{	
	function widget_tagcloud()
	{
		$widget_args = array('classname' => 'widget_tagcloud', 'description' => __( 'Nuvem de tags') );
		parent::WP_Widget('tagcloud', __('tagcloud'), $widget_args);
	}

	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Nuvem de tags' : $instance['title']);
		
		echo $before_widget;
		echo $before_title . $title . $after_title;
		
		wp_tag_cloud( 'smallest=1.2&largest=2.6&unit=em' );
		
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
add_action('widgets_init', create_function('', 'return register_widget("widget_tagcloud");'));
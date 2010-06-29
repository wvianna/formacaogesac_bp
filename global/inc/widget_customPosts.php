<?php
/*
Function Name: Widget Custom Posts
Plugin URI: http://xemele.cultura.gov.br/
Version: 0.1
Author: Marcos Maia Lopes
Author URI: http://xemele.cultura.gov.br/
*/

class widget_customPosts extends WP_Widget
{	
	function widget_customPosts()
	{
		$widget_args = array('classname' => 'widget_customPosts', 'description' => __( 'Custom posts') );
		parent::WP_Widget('Artigos', __('Artigos'), $widget_args);
	}

	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Artigos' : $instance['title']);
		$category = empty($instance['category']) ? 0 : $instance['category'];
		$paged = (get_query_var( 'paged' )) ? get_query_var( 'paged' ) : 1;

		include(TEMPLATEPATH . '/global/inc/widgets/customPosts.php');
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		if( $instance != $new_instance )
			$instance = $new_instance;
			$instance['category'] = (int) $instance['category'];
		
		return $instance;
	}

	function form($instance)
	{
	    $title = esc_attr( $instance['title'] );
		$category = esc_attr( $instance['category'] );
	?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Título:</label>
				<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" maxlength="26" value="<?php echo $title; ?>" class="widefat" />
			</p>
            <p>
				<label for="<?php echo $this->get_field_id('category'); ?>">Categoria:</label>
                <?php wp_dropdown_categories('class=widefat&show_count=1&hierarchical=1&name='. $this->get_field_name('category') .'&selected='. $instance['category']); ?>
            </p>
        <?php
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("widget_customPosts");'));

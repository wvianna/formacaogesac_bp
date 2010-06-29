<?php
/*
Function Name: Widget Comentários recentes
Plugin URI: http://xemele.cultura.gov.br/
Version: 0.1
Author: webdf, modificado por Marcos Maia Lopes
Author URI: http://xemele.cultura.gov.br/
*/

class widget_recentComments extends WP_Widget
{	
	function widget_recentComments()
	{
		$widget_args = array('classname' => 'widget_recentComments', 'description' => __( 'Mostra os comentários recentes') );
		parent::WP_Widget('recentComments', __('Comentários recentes'), $widget_args);
	}
	
	function widget($args, $instance)
	{
		global $wpdb;
		
		// Extraindo as variáveis dos widgets
		extract($args);
		
		$maxComments = ($instance['maxComments'] ? $instance['maxComments'] : 5);
		
		// Comentários
		$comments = $wpdb->get_results("
		  SELECT ID, post_title, comment_ID, comment_post_ID, comment_author, comment_content 
		  FROM {$wpdb->comments} 
		  INNER JOIN {$wpdb->posts} ON (ID = comment_post_ID) 
		  WHERE comment_approved = '1' AND comment_type = '' AND post_password = '' 
		  ORDER BY comment_ID DESC 
		  LIMIT {$maxComments}
		");
		
		$title = apply_filters('widget_title', ($instance['title'] ? $instance['title'] : 'Comentários recentes'));
		
		?>
		
		<?php if(!empty($comments)) :
		  print $before_widget;
			print $before_title . $title . $after_title; ?>
			<ul>
			  <?php foreach($comments as $comment) : ?>
				<li>
				     <p><strong><?php echo $comment->comment_author; ?></strong> em <a href="<?php echo get_permalink($comment->ID); ?>">"<?php echo $comment->post_title; ?>"</a></p>
					 <p class="comment_content"><?php limit_chars($comment->comment_content, 120); ?></p>
                     <div class="clear"></div>
				  </li>
			  <?php endforeach; ?>
			</ul>
		  <?php print $after_widget;
		endif;
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
		$maxComments = esc_attr( $instance['maxComments'] );
	?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Título:</label>
				<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" maxlength="26" value="<?php echo $title; ?>" class="widefat" />
			</p>
            <p>
				<label for="<?php echo $this->get_field_id('maxComments'); ?>">Número máximo de posts:</label>
				<select id="<?php echo $this->get_field_id('maxComments'); ?>" name="<?php echo $this->get_field_name('maxComments'); ?>">
				    <?php for($i=0; $i <= 10; $i++) : ?>
				        <option <?php if($maxComments == $i) echo 'selected="selected"'; ?> value="<?php if($i == 0) echo '1'; else echo $i; ?>"><?php if($i == 0) echo '1'; else echo $i; ?></option>
				    <?php endfor; ?>
				</select>
            </p>
    <?php
	}
}
// register widget
add_action('widgets_init', create_function('', 'return register_widget("widget_recentComments");'));

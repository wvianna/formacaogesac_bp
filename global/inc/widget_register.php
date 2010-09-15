<?php
/*
Function Name: Widget Register
Plugin URI: http://xemele.cultura.gov.br/
Version: 0.1
Author: Marcos Maia Lopes
Author URI: http://xemele.cultura.gov.br/
*/

class widget_register extends WP_Widget
{	
	function widget_register()
	{
		$widget_args = array('classname' => 'widget_register', 'description' => __( 'Registre-se') );
		parent::WP_Widget('Registre-se', __('Registre-se'), $widget_args);
	}

	function widget($args, $instance)
	{
		extract($args);
        
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Registre-se' : $instance['title']);
		
		if( !is_user_logged_in() ) :
		
		echo $before_widget
			 .$before_title
			 .$title
			 .$after_title;        
        ?>
        <form id="registerform" action="<?php bloginfo('url'); ?>/register/" method="post">
            <fieldset>
                <div class="formfield">
					<label for="field_1">Nome Completo:</label>
                    <div class="inputDefault"><input id="field_1" type="text" name="field_1" value="Meu nome" /></div>
                    
                    <label for="userLogin_">Nome do usuário:</label>
                    <div class="inputDefault"><input type="text" name="signup_username" id="userLogin_" value="usuário" /></div>
                    <div class="messageAlertLogin"><span>Somente letras minúsculas e números são permitidos</span></div>
                    
                    <label for="signup_email">E-mail:</label>
                    <div class="inputDefault"><input type="text" id="signup_email" name="signup_email" value="exemplo@exemplo.org" /></div>
                    
                    <label for="signup_password">Senha:</label>
                    <div class="inputDefault"><input type="password" id="signup_password" name="signup_password" value="senha" /></div>
                    
                    <button type="submit" name="wp-submit" class="userSubmit submitDefault" tabindex="40">Continuar &raquo;</button>
                </div>
            </fieldset>
        </form>
        <?php
		echo $after_widget;
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
	?>
			<p>
				<label for="<?php echo $this->get_field_id('title'); ?>">Título:</label>
				<input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" maxlength="26" value="<?php echo $title; ?>" class="widefat" />
			</p>
        <?php
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("widget_register");'));

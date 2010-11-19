<?php
/*
Function Name: Widget Login
Plugin URI: http://xemele.cultura.gov.br/
Version: 0.1
Author: Marcos Maia Lopes
Author URI: http://xemele.cultura.gov.br/
*/

class widget_login extends WP_Widget
{	
	function widget_login()
	{
		$widget_args = array('classname' => 'widget_login', 'description' => __( 'Login') );
		parent::WP_Widget('Entrar', __('Entrar'), $widget_args);
	}

	function widget($args, $instance)
	{
		extract($args);

		$title = apply_filters('widget_title', empty($instance['title']) ? 'Entrar' : $instance['title']);
        
	    if( !is_user_logged_in() ) :
		
		echo $before_widget
			 .$before_title
			 .$title
			 .$after_title;        
        ?>
        <form name="loginform" id="loginform" action="<?php bloginfo('url'); ?>/wp-login.php" method="post">
            <fieldset>
                <label for="userLogin" class="login">Entrar:</label>
                <div class="formfield">
                	<label for="userLogin" class="displayNone">Nome do usuário:</label>
                    <div class="login inputDefault"><input type="text" name="log" id="userLogin" value="Nome do usuário" /></div>
                	<label for="userPass" class="displayNone">Sua senha:</label>
                    <div class="pw inputDefault"><input type="password" name="pwd" class="userPass" id="userPass" value="Senha" /></div>
                    <div class="forever">
                    	<label for="rememberme" class="displayNone">Lembrar minha conta?</label>
                        <label><input name="rememberme" type="checkbox" id="rememberme" value="forever" /> Lembre-me</label>
                        <a href="<?php bloginfo('url'); ?>/wp-login.php?action=lostpassword" title="Esqueceu sua senha?" class="lostPassword">Esqueceu sua senha?</a>
                    </div>
                    
                    <button type="submit" name="wp-submit" class="userSubmit submitDefault" tabindex="40">Entrar</button>
                    <input type="hidden" name="redirect_to" value="<?php bloginfo('url'); ?>" />
                    <input type="hidden" name="testcookie" value="1" />
                </div>
            </fieldset>
        </form>
        <?php
		echo $after_widget;
		
		else :
		
		$title = apply_filters('widget_title', empty($instance['title']) ? 'Minha Conta' : $instance['title']);
		
		echo $before_widget
			 .$before_title
			 .$title
			 .$after_title;
			 
		global $bp;
		
		?>
        <div class="panel">
            <a href="<?php echo $bp->loggedin_user->domain; ?>friends" title="Perfil"><?php bp_loggedin_user_avatar( 'type=thumb&width=62&height=62' ) ?></a>
            <h3>Olá <strong><?php echo $bp->loggedin_user->fullname; ?></strong>.</h3>
            <div class="linksAdmin">
            	<a id="memberProfile" href="<?php echo $bp->loggedin_user->domain; ?>friends">Meu perfil</a> | <strong><a class="button logout" href="<?php echo wp_logout_url( bp_get_root_domain() ) ?>">Sair</a></strong>
            </div>
            <div class="msg">
            	<p>
            	<?php
					global $bp;
					$hmag_inbox_count = messages_get_unread_count();
					if ($hmag_inbox_count <= 0) echo 'Você não possui mensagem.';
					else echo 'Você possui '.$hmag_inbox_count.' <a href="'. $bp->loggedin_user->domain .'messages/" title="Minhas mensagens">mensagens</a>!';
				?>
                </p>
            </div>
        </div>
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
add_action('widgets_init', create_function('', 'return register_widget("widget_login");'));

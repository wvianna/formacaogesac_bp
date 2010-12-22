<?php
/*
Function Name: Widget O que acontece na rede
Plugin URI: http://www.formacaogesac.mc.gov.br
Description: Fluxo de atividades da rede social
Author: Equipe NSI - Instituto Federal Fluminense
Version: 1.0
Author URI: http://nsi.iff.edu.br/
*/

class widget_acontece_rede extends WP_Widget {

	function widget_acontece_rede()
	{
		$widget_args = array('classname' => 'widget_acontece_rede', 'description' => __( 'O que acontece na rede') );                
		$pagina_inicial = '<a href="'.site_url().'">O que acontece na rede</a>';
		
		parent::WP_Widget('widget_acontece_rede', $pagina_inicial, $widget_args);
	}
	
	function widget($args, $instance)
	{	global $wpdb;
		extract($args);
		$title = apply_filters('widget_title', empty($instance['title']) ? 'O que acontece na rede' : $instance['title']);
                $maxPages = empty($instance['maxPages']) ? 5 : $instance['maxPages'];    
                
                ?>
		<a class="feed" href="<?php bp_sitewide_activity_feed_link() ?>" title="RSS Feed">
			<?php _e( 'RSS', 'buddypress' ) ?>
		</a>
		<div class="activity">	
                   <?php do_action( 'bp_before_activity_loop' ) ?>	   
		   <?php if ( bp_has_activities('&user_id=0&per_page=8&scope=') ) : ?>
                      <?php if ( empty( $_POST['page'] ) ) : ?>
                      <ul id="blog-post-list" class="activity-list item-list">
                      <?php endif; ?>
		         <?php $resultado = $wpdb->get_results("SELECT *
								FROM wp_bp_activity
								where primary_link not like '%/portal/%'
								order by id desc", OBJECT); ?>	
			 <?php foreach($resultado as $result) : ?>
			    <?php while ( bp_activities() ) : bp_the_activity(); ?>
                               <?php do_action( 'bp_before_activity_entry' ) ?>
			       <?php if ($result->id == bp_get_activity_id()):?>
			          <li class="<?php bp_activity_css_class() ?>" id="activity-<?php bp_activity_id(); ?>">
				     <div class="activity-avatar">							
				        <a href="<?php bp_activity_user_link(); ?>">
					   <?php bp_activity_avatar( 'type=full&width=50&height=50' );?>		
					</a>
				     </div>
				     <div class="activity-content">
				        <div class="activity-header">
				           <?php bp_activity_action() ?>
				        </div>
					<?php if ( bp_activity_has_content() ) : ?>
				        <div class="activity-inner">
					   <?php echo $conteudo = (substr(bp_get_activity_content_body(), 0, 90));
                                           $ret = (substr(bp_get_activity_content_body(), 91));
                                           if ($ret <> ''):
						echo '...';
					   endif;?>
					   
				        </div>	
					<?php endif;?>
					<?php do_action( 'bp_activity_entry_content' ) ?>
					<?php if( is_user_logged_in() ) : ?>
					   <div class="activity-meta">
					      <?php if ( bp_activity_can_comment() ) : ?>
					         <a href="<?php bp_activity_comment_link() ?>" 
						    class="acomment-reply" 
                                                    id="acomment-comment-<?php bp_activity_id() ?>">

							<?php _e( 'Reply', 'buddypress' ) ?> 
							(<span><?php bp_activity_comment_count() ?></span>)

						 </a>
					      <?php endif; ?>

					      <?php if ( !bp_get_activity_is_favorite() ) : ?>
					         <a href="<?php bp_activity_favorite_link() ?>" 
                                                    class="fav" 
                                                    title="<?php _e( 'Mark as Favorite', 'buddypress' ) ?>">

                                                       <?php _e( 'Favorite', 'buddypress' ) ?>
                                                 </a>
					       <?php else : ?>
					          <a href="<?php bp_activity_unfavorite_link() ?>" 
                                                     class="unfav"
                                                     title="<?php _e( 'Remove Favorite', 'buddypress' ) ?>">
                     
                                                         <?php _e( 'Remove Favorite', 'buddypress' ) ?>
                                                  </a>
						<?php endif; ?>
                                                <?php do_action( 'bp_activity_entry_meta' ) ?>
					     </div>
					  <?php endif; ?>			
				     </div>
				     <?php if ( 'activity_comment' == bp_get_activity_type() ) : ?>
					<div class="activity-inreplyto">
					   <strong><?php _e( 'In reply to', 'buddypress' ) ?></strong> - 
						<?php bp_activity_parent_content() ?> &middot;
						<a href="<?php bp_activity_thread_permalink() ?>" 
						   class="view"
                                                   title="<?php _e( 'View Thread / Permalink', 'buddypress' ) ?>">

							<?php _e( 'View', 'buddypress' ) ?>
						</a>
					 </div>
				      <?php endif; ?>

                                      <?php do_action( 'bp_before_activity_entry_comments' ) ?>

				      <?php if ( bp_activity_can_comment() ) : ?>
                                         <div class="activity-comments">
					    <?php bp_activity_comments() ?>

			         	    <?php if ( is_user_logged_in() ) : ?>
						<form action="<?php bp_activity_comment_form_action() ?>" 
                                                      method="post"
                                                      id="ac-form-<?php bp_activity_id() ?>"
                                                      class="ac-form"<?php bp_activity_comment_form_nojs_display() ?>>
							
                                                         <div class="ac-reply-avatar">
                                                            <?php bp_loggedin_user_avatar( 'width=25&height=25' ) ?>
                                                         </div>
							 <div class="ac-reply-content">
							    <div class="ac-textarea">
								<textarea id="ac-input-<?php bp_activity_id() ?>" 
                                                                          rows="7"
                                                                          cols="7"
                                                                          class="ac-input" 
                                                                          name="ac_input_<?php bp_activity_id() ?>">
                                                                </textarea>
							    </div>
							    <input type="submit" 
                                                                   name="ac_form_submit" 
                                                                   class="submitDefault" 
                                                                   value="<?php _e( 'Post', 'buddypress' ) ?> &rarr;" />  
                                                            &nbsp;
                                                            <?php _e( 'or press esc to cancel.', 'buddypress' ) ?>
							    <input type="hidden" 
                                                                   name="comment_form_id"
                                                                   value="<?php bp_activity_id() ?>" />
							  </div>
							  <?php echo str_replace( 'id=', 'class=', wp_nonce_field( 'new_activity_comment', '_wpnonce_new_activity_comment', true, false ) ); ?>
						    </form>
						<?php endif; ?>
					     </div>
					  <?php endif; ?>

					  <?php do_action( 'bp_after_activity_entry_comments' ) ?>
					</li>

					<?php do_action( 'bp_after_activity_entry' ) ?>
			          
			       <?php endif?>
			    <?php endwhile;?>
			 <?php endforeach; ?>
			 <div class="read-more">
				<a href="<?php echo get_bloginfo('url').'/'.BP_ACTIVITY_SLUG; ?>">Leia Mais &raquo;</a>
			 </div>
		         <?php if ( empty( $_POST['page'] ) ) : ?>
				</ul>
			 <?php endif; ?>

			 <?php do_action( 'bp_after_activity_loop' ) ?>

			 <form action="" name="activity-loop-form" id="activity-loop-form" method="post">
				<?php wp_nonce_field( 'activity_filter', '_wpnonce_activity_filter' ) ?>
			 </form>
		   <?php endif; ?>
		</div>

		<?php	 
	        
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
	    	/*$title = esc_attr( $instance['title'] );
                		
                ?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Título:</label>
			<input type="text" 
                               id="<?php echo $this->get_field_id('title'); ?>" 
                               name="<?php echo $this->get_field_name('title'); ?>" 
                               maxlength="26" value="<?php echo $title; ?>" 
                               class="widefat" 
                        />
		</p>
                
            	
        	<?php*/
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("widget_acontece_rede");'));

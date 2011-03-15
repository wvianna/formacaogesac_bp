<?php get_header() ?>
    
  <div id="mainContent" class="container_11">
    <div id="content" class="grid_11">
    
    <script type="text/javascript">
			jQuery( 'div#content' ).hide();
		</script>
		
    <div id="pageContent" class="main">
		            <div class="activity no-ajax">
                <?php if ( bp_has_activities( 'display_comments=threaded&include=' . bp_current_action() ) ) : ?>

                    <ul id="activity-stream" class="activity-list item-list">
                    <?php while ( bp_activities() ) : bp_the_activity(); ?>

                        <?php do_action( 'bp_before_activity_entry' ) ?>

                        <li class="<?php bp_activity_css_class() ?>" id="activity-<?php bp_activity_id() ?>">
                            <div class="activity-avatar">
                                <a href="<?php bp_activity_user_link() ?>">
                                    <?php bp_activity_avatar( 'type=full&width=150&height=150' ) ?>
                                </a>
                            </div>

                            <div class="activity-content">
                                <span class="arrow"></span>
                                <div class="inner">
                                    <div class="activity-header">
                                        <?php bp_activity_action() ?>
                                    </div>

                                    <?php if ( bp_activity_has_content() ) : ?>
                                        <div class="activity-inner">
                                            <?php bp_activity_content_body() ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php do_action( 'bp_activity_entry_content' ) ?>

                                    <div class="activity-meta">
                                        <?php if ( is_user_logged_in() && bp_activity_can_comment() ) : ?>
                                            <a href="<?php bp_activity_comment_link() ?>" class="acomment-reply" id="acomment-comment-<?php bp_activity_id() ?>"><?php _e( 'Reply', 'buddypress' ) ?> (<span><?php bp_activity_comment_count() ?></span>)</a>
                                        <?php endif; ?>

                                        <?php if ( is_user_logged_in() ) : ?>
                                            <?php if ( !bp_get_activity_is_favorite() ) : ?>
                                                <a href="<?php bp_activity_favorite_link() ?>" class="fav" title="<?php _e( 'Mark as Favorite', 'buddypress' ) ?>"><?php _e( 'Favorite', 'buddypress' ) ?></a>
                                            <?php else : ?>
                                                <a href="<?php bp_activity_unfavorite_link() ?>" class="unfav" title="<?php _e( 'Remove Favorite', 'buddypress' ) ?>"><?php _e( 'Remove Favorite', 'buddypress' ) ?></a>
                                            <?php endif; ?>
                                        <?php endif;?>

                                        <?php do_action( 'bp_activity_entry_meta' ) ?>
                                    </div>
                                </div>
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

                  <?php endwhile; ?>
              </ul>
          <?php endif; ?>
       </div>
     </div>
   </div>

   <div class="clear"></div>
</div>
            
<?php get_footer() ?>

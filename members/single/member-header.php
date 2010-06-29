<?php do_action( 'bp_before_member_header' ) ?>

<div id="item-header-avatar">
	<a href="<?php bp_user_link() ?>">
		<?php bp_displayed_user_avatar( 'type=full' ) ?>
	</a>
</div><!-- #item-header-avatar -->

<div id="item-header-content">

    <?php if ( is_user_logged_in() && bp_is_my_profile() ) : ?>
    	<h2 class="postActivities">Postar uma atividade</h2>
        <?php locate_template( array( 'activity/post-form.php'), true ) ?>
		<?php if ( function_exists( 'bp_activity_latest_update' ) ) : if(bp_get_activity_latest_update(bp_displayed_user_id()) != '' ) { ?>
			<div id="latest-update-logged">
				<p><strong>Última atividade</strong>: <?php limit_chars(str_replace('Ver', '', bp_get_activity_latest_update( bp_displayed_user_id() )), 50) ?></p>
			</div>
		<?php } endif; ?>
    <?php else : ?>

	<h2 class="fn"><?php bp_displayed_user_fullname() ?> <a href="<?php bp_user_link() ?>">@<?php bp_displayed_user_username() ?></a></h2>
	<span class="activity"><?php bp_last_activity( bp_displayed_user_id() ) ?></span>
	<?php endif; ?>
    
	<?php do_action( 'bp_before_member_header_meta' ) ?>

	<div id="item-meta">
		<?php if ( function_exists( 'bp_activity_latest_update' ) && !bp_is_my_profile() && bp_get_activity_latest_update( bp_displayed_user_id() ) != '' ) : ?>
        	<div id="latest-update">
                <span class="arrow"></span>
                <div class="inner">
					<?php bp_activity_latest_update( bp_displayed_user_id() ) ?>
                </div>
            </div>
		<?php endif; ?>
	
		<div id="item-buttons">
			<?php if ( function_exists( 'bp_add_friend_button' ) ) : ?>
				<?php bp_add_friend_button() ?>
			<?php endif; ?>

			<?php if ( is_user_logged_in() && !bp_is_my_profile() && function_exists( 'bp_send_public_message_link' ) ) : ?>
				<div class="generic-button" id="post-mention">
					<a href="<?php bp_send_public_message_link() ?>" title="<?php _e( 'Mention this user in a new public message, this will send the user a notification to get their attention.', 'buddypress' ) ?>"><?php _e( 'Mention this User', 'buddypress' ) ?></a>
				</div>
			<?php endif; ?>

			<?php if ( is_user_logged_in() && !bp_is_my_profile() && function_exists( 'bp_send_private_message_link' ) ) : ?>
				<div class="generic-button" id="send-private-message">
					<a href="<?php bp_send_private_message_link() ?>" title="<?php _e( 'Send a private message to this user.', 'buddypress' ) ?>"><?php _e( 'Send Private Message', 'buddypress' ) ?></a>
				</div>
			<?php endif; ?>
		</div><!-- #item-buttons -->

		<?php
		 /***
		  * If you'd like to show specific profile fields here use:
		  * bp_profile_field_data( 'field=About Me' ); -- Pass the name of the field
		  */
		?>

		<?php do_action( 'bp_profile_header_meta' ) ?>

	</div><!-- #item-meta -->

</div><!-- #item-header-content -->

<?php do_action( 'bp_after_member_header' ) ?>

<?php do_action( 'template_notices' ) ?>
<?php do_action( 'bp_before_profile_loop_content' ) ?>

<?php if ( function_exists('xprofile_get_profile') ) : ?>

	<?php if ( bp_has_profile() ) : ?>

		<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

			<?php if ( bp_profile_group_has_fields() ) : ?>

				<?php do_action( 'bp_before_profile_field_content' ) ?>

				<div class="bp-widget <?php bp_the_profile_group_slug() ?>">
					<?php if ( 1 != bp_get_the_profile_group_id() ) : ?>
						<h4><?php bp_the_profile_group_name() ?></h4>
					<?php endif; ?>

					<ul class="profileFields">
						<?php while ( bp_profile_fields() ) : bp_the_profile_field(); ?>

							<?php 
								if ( bp_field_has_data() ) :
								
								if( bp_get_the_profile_field_name() == 'Sexo' ) continue;
								elseif( bp_get_the_profile_field_name() == 'CEP' ) continue;
								elseif( bp_get_the_profile_field_name() == 'Celular' ) continue;
								elseif( bp_get_the_profile_field_name() == 'Data de nascimento' ) continue;
								elseif( bp_get_the_profile_field_name() == 'Endereço' ) continue;
								elseif( bp_get_the_profile_field_name() == 'Telefone' ) continue;
							?>
								<li>

									<div class="label"><?php bp_the_profile_field_name() ?>:</div>

									<div class="data">
										<strong><?php bp_the_profile_field_value() ?></strong>
									</div>

								</li>
							<?php endif; ?>

							<?php do_action( 'bp_profile_field_item' ) ?>

						<?php endwhile; ?>
					</ul>
				</div>

				<?php do_action( 'bp_after_profile_field_content' ) ?>

			<?php endif; ?>

		<?php endwhile; ?>

		<?php do_action( 'bp_profile_field_buttons' ) ?>

	<?php endif; ?>

<?php else : ?>

	<?php /* Just load the standard WP profile information, if BP extended profiles are not loaded. */ ?>
	<?php bp_core_get_wp_profile() ?>

<?php endif; ?>

<?php do_action( 'bp_after_profile_loop_content' ) ?>

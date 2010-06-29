<?php do_action( 'bp_before_group_header' ) ?>

<div id="item-actions" class="mod">
	<?php if ( bp_group_is_visible() ) : ?>
		<h3>Dono do grupo</h3>
		<?php bp_group_list_admins() ?>
	<?php endif; ?>
</div><!-- #item-actions -->

<div id="item-header-avatar">
	<a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>">
		<?php bp_group_avatar() ?>
	</a>
</div><!-- #item-header-avatar -->

<div id="item-header-content">
	<h1><a href="<?php bp_group_permalink() ?>" title="<?php bp_group_name() ?>"><?php bp_group_name() ?></a></h1>
    <?php
		$groupType = bp_get_group_type();
		$groupTypeClass = preg_replace('/^[Gg]rupos? /', '', $groupType);
		$groupTypeClass = str_replace('público', 'publico', $groupTypeClass);
	?>
	<div class="highlight">
        <span class="<?php echo $groupTypeClass; ?>"></span>
        <?php bp_group_type() ?>
    </div>
    <span class="activity"><?php printf( __( 'active %s ago', 'buddypress' ), bp_get_group_last_active() ) ?></span>

	<?php do_action( 'bp_before_group_header_meta' ) ?>

	<div id="item-meta">
		<?php bp_group_description() ?>

		<?php bp_group_join_button() ?>

		<?php do_action( 'bp_group_header_meta' ) ?>
	</div>
</div><!-- #item-header-content -->

<?php do_action( 'bp_after_group_header' ) ?>

<?php do_action( 'template_notices' ) ?>

<div class="sidebar">
	<?php if(has_active_widgets('right-column-1')) : ?>
    <div class="right-column right-column-1 tabs">
		<?php tabbed_dynamic_sidebar('right-column-1'); ?>
    </div>
    <?php endif; ?>
	<?php if(has_active_widgets('right-column-2')) : ?>
    <div class="right-column right-column-2 tabs">
		<?php tabbed_dynamic_sidebar('right-column-2'); ?>
    </div>
    <?php endif; ?>
	<?php if(has_active_widgets('right-column-3')) : ?>
    <div class="right-column right-column-3 tabs">
		<?php tabbed_dynamic_sidebar('right-column-3'); ?>
    </div>
    <?php endif; ?>
</div>


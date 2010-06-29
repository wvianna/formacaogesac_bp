<?php get_header() ?>
    
    <div id="content" class="clear">
    
		<?php if(function_exists('dynamic_sidebar')) : ?>
		<div class="middle widgets">
		    <div class="main">
				<?php if(has_active_widgets('left-column')) : ?>
		        <div class="left-column-wrap">
	                <div class="left-column tabs">
		                <?php tabbed_dynamic_sidebar('left-column'); ?>
                	</div>
                </div>
                <?php endif; ?>
				<?php if(has_active_widgets('center-column')) : ?>
                <div class="center-column-wrap">
		            <div class="center-column tabs">
		                <?php tabbed_dynamic_sidebar('center-column'); ?>
		            </div>
                </div>
                <?php endif; ?>
				<?php if(has_active_widgets('left-center-column')) : ?>
		        <div class="left-center-column tabs">
		            <?php tabbed_dynamic_sidebar('left-center-column'); ?>
		        </div>
		        <?php endif; ?>
				<?php if(has_active_widgets('left-bottom-column')) : ?>
		        <div class="left-bottom-column tabs">
		            <?php tabbed_dynamic_sidebar('left-bottom-column'); ?>
		        </div>
				<?php endif; ?>
		    </div>
		    
            <?php locate_template( array( 'sidebar.php' ), true ) ?>
            <div class="clear"></div>
		</div>
		<?php endif; ?>

    </div>
            
<?php get_footer() ?>
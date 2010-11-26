<?php get_header (); ?>
<?php if(function_exists('dynamic_sidebar')) : ?>
  <div id="mainContent" class="container_11">
  <div id="content" class="grid_8 main" style="">
  
	<?php if(has_active_widgets('left-column')) : ?>
    <div class="grid_4 alpha">
    <div class="left-column tabs"><?php tabbed_dynamic_sidebar('left-column'); ?></div>
    </div>
     <?php endif; ?>
    <?php if(has_active_widgets('center-column')) : ?>
      <div class="grid_4 omega">
      <div class="center-column tabs"><?php tabbed_dynamic_sidebar('center-column'); ?></div>
      </div>
    <?php endif; ?>                    
    <div class="clear"></div>
    <?php if(has_active_widgets('left-center-column')) : ?>
    <div class="grid_8 alpha omega">
	<div class="left-center-column tabs"><?php tabbed_dynamic_sidebar('left-center-column'); ?></div>	        
    </div>
    <?php endif; ?>
    <?php if(has_active_widgets('left-bottom-column')) : ?>
    <div class="grid_8 alpha omega">
	<div class="left-bottom-column tabs"><?php tabbed_dynamic_sidebar('left-bottom-column'); ?></div>
    </div>
    <?php endif; ?>
  </div>
  <div id="right-column" class="grid_3">
    <?php locate_template( array( 'sidebar.php' ), true ) ?>
  </div>
  <div class="clear"></div>
  </div>
<?php endif; ?>
<?php get_footer (); ?>

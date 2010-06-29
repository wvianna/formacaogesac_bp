<?php get_header() ?>

	<div id="content">

		<div class="middle">
        	<div class="main">
            	<div class="marginRight20">
					<?php if ( bp_has_groups() ) : while ( bp_groups() ) : bp_the_group(); ?>
        
                    <?php do_action( 'bp_before_group_plugin_template' ) ?>
        
                    <div id="item-header">
                        <?php locate_template( array( 'groups/single/group-header.php' ), true ) ?>
                    </div>
        
                    <div id="item-nav">
                        <div class="item-list-tabs no-ajax" id="sub-nav">
                            <ul>
                                <?php bp_get_options_nav() ?>
        
                                <?php do_action( 'bp_group_plugin_options_nav' ) ?>
                            </ul>
                        </div>
                    </div>
        
                    <div id="item-body">
        
                        <?php do_action( 'bp_template_content' ) ?>
        
                    </div><!-- #item-body -->
        
                    <?php endwhile; endif; ?>
        
                    <?php do_action( 'bp_after_group_plugin_template' ) ?>
            	</div>
            </div><!-- .main -->
            
			<?php locate_template( array( 'sidebar.php' ), true ) ?>
		</div><!-- .middle -->
	</div><!-- #content -->

<?php get_footer() ?>

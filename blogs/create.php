<?php get_header() ?>
<?php do_action( 'bp_before_directory_groups_content' ) ?>

  <div id="mainContent" class="container_11">
    <div id="content" class="grid_8">
    
    <script type="text/javascript">
			jQuery( 'div#content' ).hide();
		</script>
    
    <div id="pageContent" class="main">
      <?php do_action( 'template_notices' ) ?>
            
                    <h1><?php _e( 'Create a Blog', 'buddypress' ) ?> &nbsp;<a class="button" href="<?php echo bp_get_root_domain() . '/' . BP_BLOGS_SLUG . '/' ?>">(<?php _e( 'Blogs Directory', 'buddypress' ) ?>)</a></h1>
            
                    <?php do_action( 'bp_before_create_blog_content' ) ?>
            
                    <?php if ( bp_blog_signup_enabled() ) : ?>
            
						<?php bp_show_blog_signup_form(); ?>   
            
                    <?php else: ?>
            
                        <div id="message" class="info">
                            <p><?php _e( 'Blog registration is currently disabled', 'buddypress' ); ?></p>
                        </div>
            
                    <?php endif; ?>
            
                    <?php do_action( 'bp_after_create_blog_content' ) ?>
    </div>
    </div>

   <div id="right-column" class="grid_3">
     <?php locate_template( array( 'sidebar.php' ), true ) ?>
   </div>
  <div class="clear"></div>
  </div>
  
  <?php do_action( 'bp_after_directory_groups_content' ) ?>
            
<?php get_footer() ?>


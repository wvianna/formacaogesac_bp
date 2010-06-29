<?php
/*
Function Name: Widget Blogs
Plugin URI: http://xemele.cultura.gov.br/
Version: 0.1
Author: Marcos Maia Lopes
Author URI: http://xemele.cultura.gov.br/
*/

class widget_blogs extends WP_Widget
{	
	function widget_blogs()
	{
		$widget_args = array('classname' => 'widget_blogs', 'description' => __( 'Blogs') );
		parent::WP_Widget('blogs', __('Blogs'), $widget_args);
	}

	function widget($args, $instance)
	{
	    extract($args);
	    $title = apply_filters('widget_title', empty($instance['title']) ? 'Blogs' : $instance['title']);
	?>
	    <?php echo $before_widget;
	          echo $before_title . $title . $after_title; ?>
		    <form action="" method="post" id="blogs-directory-form" class="dir-form">

			    <?php do_action( 'bp_before_directory_blogs_content' ) ?>

			    <div class="item-list-tabs">
				    <ul>
					    <li class="selected menulist" id="blogs-all"><a href="<?php bp_root_domain() ?>"><?php printf( __( 'All Blogs (%s)', 'buddypress' ), bp_get_total_blog_count() ) ?></a></li>

					    <?php if ( is_user_logged_in() && bp_get_total_blog_count_for_user( bp_loggedin_user_id() ) ) : ?>
						    <li class="menulist" id="blogs-personal">
                            	|
                                <a href="<?php echo bp_loggedin_user_domain() . BP_BLOGS_SLUG . '/my-blogs/' ?>"><?php printf( __( 'My Blogs (%s)', 'buddypress' ), bp_get_total_blog_count_for_user( bp_loggedin_user_id() ) ) ?></a>
                            </li>
					    <?php endif; ?>

					    <?php do_action( 'bp_blogs_directory_blog_types' ) ?>

					    <li id="blogs-order-select" class="last filter">
							<label for="blogs-order-s"><?php _e( 'Order By:', 'buddypress' ) ?></label>
                            <select id="blogs-order-s">
                                <option value="active"><?php _e( 'Last Active', 'buddypress' ) ?></option>
                                <option value="newest"><?php _e( 'Newest', 'buddypress' ) ?></option>
                                <option value="alphabetical"><?php _e( 'Alphabetical', 'buddypress' ) ?></option>
            
                                <?php do_action( 'bp_blogs_directory_order_options' ) ?>
                            </select>
					    </li>
				    </ul>
			    </div>
			    
                <div id="blogs-dir-list" class="blogs dir-list">
				    <?php locate_template( array( 'blogs/blogs-loop.php' ), true ) ?>
			    </div>

			    <?php do_action( 'bp_after_directory_blogs_content' ) ?>

			    <?php wp_nonce_field( 'directory_blogs', '_wpnonce-blogs-filter' ) ?>

		    </form>
	    <?php echo $after_widget;
	}

	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		if( $instance != $new_instance )
		{
			$instance = $new_instance;
		}
		
		return $instance;
	}

	function form($instance)
	{
        ?>
            <p><label for="<?php echo $this->get_field_id('title'); ?>">Título:</label></p>
            <p><input class="widefat" type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" /></p>
        <?php
	}
}

// register widget
add_action('widgets_init', create_function('', 'return register_widget("widget_blogs");'));

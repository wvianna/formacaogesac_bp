<?php get_header (); ?>
  <div id="mainContent" class="container_11">
    <div id="content" class="grid_8">
    <div id="pageContent" class="main">
<?php if( have_posts() ) : ?>
		<?php while( have_posts() ) : the_post() ?>
		<h1><?php the_title(); ?></h1> <?php edit_post_link('Editar', '', ' &raquo;'); ?>
                    
		<div class="author">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), '42' ); ?>
		publicado por <?php echo bp_core_get_userlink( $post->post_author ); ?>
		<span class="date">em <?php the_time("d \d\e F \d\e Y"); ?></span>
		</div>
                    
		<div class="postContent">
		<?php echo stripslashes(get_the_content()); ?>
		</div>
        
		<?php comments_template('/comments.php', true); ?>
		<?php endwhile; ?>
		<?php endif; ?>
    </div>
    </div>
    <div id="right-column" class="grid_3">
      <?php locate_template( array( 'sidebar.php' ), true ) ?>
    </div>
    <div class="clear"></div>
</div>
<?php get_footer (); ?>

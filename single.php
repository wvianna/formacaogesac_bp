<?php get_header() ?>
    
    <div id="content" class="clear">
    	<div class="middle">
            <div class="main">
            	<div class="marginRight20">
                <?php if( have_posts() ) : ?>
                    <?php while( have_posts() ) : the_post() ?>
                    <h1><?php the_title(); ?></h1> <?php edit_post_link('Editar', '', ' &raquo;'); ?>
                    
                    <div class="author">
                        <?php echo get_avatar( get_the_author_meta( 'user_email' ), '42' ); ?>
                        publicado por <?php echo bp_core_get_userlink( $post->post_author ); ?>
                        <span class="date">em <?php the_time("d \d\e F \d\e Y"); ?></span>
                    </div>
                    
                    <div class="postContent">
                        <?php the_content(); ?>
                    </div>
        
                    <?php comments_template('/comments.php', true); ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
            
			<?php locate_template( array( 'sidebar.php' ), true ) ?>
            <div class="clear"></div>
        </div>
    </div>
            
<?php get_footer() ?>

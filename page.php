<?php get_header() ?>
    
    <div id="content" class="clear">
    	<div class="middle">
            <div class="main">
            	<div class="marginRight20">
                <?php if( have_posts() ) : ?>
                    <?php while( have_posts() ) : the_post() ?>
                    <h1><?php the_title(); ?></h1>
                    
                    <div class="postContent">
                        <?php the_content(); ?>
                    </div>
                    <?php endwhile; ?>
                <?php endif; ?>
                </div>
            </div>
            
			<?php locate_template( array( 'sidebar.php' ), true ) ?>
            <div class="clear"></div>
        </div>
    </div>
            
<?php get_footer() ?>

<?php /* Template name: 1 coluna */ ?>

<?php get_header(); ?>

<div id="content" class="clear one-column">
	<div class="middle">
        <div class="main">
        	<div class="marginRight20">
                <h1><?php the_title(); ?></h1>
                
                <div class="postContent">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
       
        <div class="clear"></div>
    </div>
</div>	
	
<?php get_footer(); ?>
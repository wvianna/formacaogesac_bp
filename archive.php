<?php get_header (); ?>
  <div id="mainContent" class="container_11">
    <div id="content" class="grid_8">
    <div id="pageContent" class="main">
                      <?php $query = $wp_query; if( $query->have_posts() ) : ?>
					<?php if(is_category()) : ?>
                        <h1>Posts da categoria "<?php single_cat_title(); ?>"</h1>
                    <?php elseif(is_tag()) : ?>
                        <h1>Posts com a tag "<?php single_tag_title(); ?>"</h1>
                    <?php elseif(is_day()) : ?>
                        <h1>Posts de "<?php the_time('d, m, Y') ?>"</h1>
                    <?php elseif(is_month()) : ?>
                        <h1>Posts de "<?php the_time('F, Y') ?>"</h1>
                    <?php elseif(is_year()) : ?>
                        <h1>Posts de "<?php the_time('Y') ?>"</h1>
                    <?php elseif(is_author()) : ?>
                        <h1>Posts do autor "<?php the_author_link() ?>"</h1>
                    <?php endif; ?>

                    <div class="pagination">
                        <?php if( function_exists('wp_pagenavi') ) : ?>
                            <?php wp_pagenavi(); ?>
                        <?php endif; ?>
                        
						<div class="layoutControl">
							<p><span>Visualização:</span> <a href="#" class="one-column">Uma coluna</a> <a href="#" class="two-column">Duas colunas</a></p>
						</div>					
					</div>
                    
                    <ul class="posts two-columns">
                    <?php $i = 0; while( $query->have_posts() ) : $query->the_post(); $i++; $noMargin = $i % 2 == 0 ? ' noMargin' : ''; ?>
                        <li class="post<?php echo $noMargin; ?>">
                            <?php if(the_thumb("thumbnail", "") != '') echo '<a class="thumb" href="'. get_permalink() .'">'. the_thumb('thumbnail', 'width="63" height="65"') .'</a>'; else  echo '<a class="thumb" href="'. get_permalink() .'"><img src="'. get_bloginfo('template_directory') .'/global/img/graph/graph_labblog.jpg" alt="'. get_the_title() .'" /></a>'; ?>
                            <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                            <span class="date">em <?php the_time("d \d\e F \d\e Y"); ?></span>
                            <p><?php limit_chars(get_the_excerpt(), 230); ?></p>
                            <div class="clear"></div>
                        </li>
                    <?php endwhile; ?>
                    </ul>
                    <div class="pagination">
                        <?php if( function_exists('wp_pagenavi') ) : ?>
                            <?php wp_pagenavi(); ?>
                        <?php endif; ?>
					</div>
                <?php else : ?>
                	<h1>Nada encotrado.</h1>
                    <p>Tente outros termos!</p>
                <?php endif; ?>
    </div>
    </div>
    <div id="right-column" class="grid_3">
      <?php locate_template( array( 'sidebar.php' ), true ) ?>
    </div>
    <div class="clear"></div>
</div>
<?php get_footer (); ?>
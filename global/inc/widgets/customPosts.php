<?php
	$query = new WP_Query('cat='. $category .'&posts_per_page=4&paged='.$paged);
	if($query->have_posts()) :

	echo $before_widget;
	echo $before_title . $title . $after_title;
?>
    <ul id="labblog">
        <?php
        while($query->have_posts()) : $query->the_post();
        ?>
            <li>
                <?php if(the_thumb("thumbnail", "") != '') echo '<a class="thumb" href="'. get_permalink() .'">'. the_thumb("thumbnail", "") .'</a>'; else  echo '<a class="thumb" href="'. get_permalink() .'"><img src="'. get_bloginfo('template_directory') .'/global/img/graph/graph_labblog.jpg" alt="'. get_the_title() .'" /></a>'; ?>
                <span class="date"><?php the_time("d/m"); ?> as <?php the_time("H\hs"); ?></span>
                <h2><a href="<?php the_permalink(); ?>"><?php limit_chars(get_the_title(), 80); ?></a></h2>
                <div class="clear"></div>
            </li>
        <?php
        endwhile;
        ?>
    </ul>
    <?php
	if(get_next_posts_link() != '')
	{
		$links = get_next_posts_link();
		$links = strstr($links, 'http://');
		$linkspos = strpos($links, '"');
		$links = substr($links, 0, $linkspos);
		
		echo '<div class="load-more"><a href="'. $links .'" class="more">ver mais</a></div>';
    }
		
	echo $after_widget;

	endif;

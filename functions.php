<?php
/**
 * Copyright (c) 2009 Ministério da Cultura do Brasil
 *
 * Written by Marcos Lopes marcosmlopes01[at]gmail[dot]com in 18/04/2010
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the
 * Free Software Foundation, Inc.,
 * 59 Temple Place - Suite 330, Boston, MA 02111-1307, USA.
 *
 * Public License can be found at http://www.gnu.org/copyleft/gpl.html
 */
	// includes
	include_once(TEMPLATEPATH . '/bp/bp-functions.php');
	include_once(TEMPLATEPATH . '/global/inc/limit_chars.php');
	include_once(TEMPLATEPATH . '/global/inc/the_thumb.php');
	include_once(TEMPLATEPATH . '/global/inc/widget_destaque.php');
	include_once(TEMPLATEPATH . '/global/inc/widget_atividades.php');
	include_once(TEMPLATEPATH . '/global/inc/widget_atividades_members.php');
	include_once(TEMPLATEPATH . '/global/inc/widget_blogs.php');
	include_once(TEMPLATEPATH . '/global/inc/widget_customPosts.php');
	include_once(TEMPLATEPATH . '/global/inc/widget_login.php');
	include_once(TEMPLATEPATH . '/global/inc/widget_register.php');
	include_once(TEMPLATEPATH . '/global/inc/widget_map.php');
	include_once(TEMPLATEPATH . '/global/inc/widget_comentarios.php');
	include_once(TEMPLATEPATH . '/global/inc/widget_tags.php');
	include_once(TEMPLATEPATH . '/global/inc/tabbed_dynamic_sidebar.php');
    
	function fg_custom_profile_fields () {
                require_once('userprofile/termo.php');
  		require_once('userprofile/form.php');                
	}
	add_action ('bp_after_signup_profile_fields', 'fg_custom_profile_fields');

	
/*	function fg_validate_custom_profile_fields () {
  		global $bp;
  		//Verifica se o valor inserido no campo endereço é um número de um ponto válido//
  		if ($_POST['field_37']!='') {
    		$sql = 'select * from wp_gesac_ponto where gesac='.$_POST['field_37'].' order by estabelecimento';
    		$rs = mysql_query($sql);
    		if (mysql_fetch_array($rs)==0) {
      			$bp->signup->errors['field_37'] = 'Código Gesac inválido. Insira novamente.';
    		}
  		}
	}
	add_action ('bp_signup_validate', 'fg_validate_custom_profile_fields');
*/


    // Adiciona as funcionalidades do wordpress 3.0
    add_theme_support( 'nav-menus' );
    
    function header_menu() {
    ?>
        <ul class="nav">
            <li<?php if ( bp_is_page( 'home' ) && !is_page() ) : ?> class="current_page_item"<?php endif; ?>>
                <a href="<?php echo site_url() ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"><?php _e( 'Home', 'buddypress' ) ?></a>
            </li>
            <?php wp_list_pages( 'title_li=&exclude=1896,1919,1921' ); ?>
            <li><a href="<?php bloginfo('url'); ?>/blog/category/labblog/">Notícias</a></li>
            <li><a href="<?php bloginfo('url'); ?>/blog/2009/09/26/baixe-o-livro-culturadigital-br/">Download do livro</a></li>
        </ul>
    <?php
    }
    
    function footer_page_menu() {
    ?>
        <ul>                    
            <li<?php if ( bp_is_page( 'home' ) && !is_page() ) : ?> class="current_page_item"<?php endif; ?>>
                <a href="<?php echo site_url() ?>" title="<?php _e( 'Home', 'buddypress' ) ?>"><?php _e( 'Home', 'buddypress' ) ?></a>
            </li>
            <?php wp_list_pages( 'title_li=&depth=1&exclude=1896,1919,1921' ); ?>
            <li><a href="<?php bloginfo('url'); ?>/blog/2009/09/26/baixe-o-livro-culturadigital-br/">Download do livro</a></li>
            <li><a href="<?php bloginfo('url'); ?>/blog/category/labblog/">Notícias</a></li>
        </ul>
        
        <ul>
            <?php wp_list_pages( 'title_li=&depth=1&include=1896,1919,1921' ); ?>
        </ul>
    <?php
    }
    
    function footer_cat_menu() {
    ?>
        <ul>
            <?php wp_list_categories( 'title_li=&depth=1' ); ?>
        </ul>
    <?php
    }
    
    function footer_related_menu() {
    ?>
        <ul>
            <li><a href="http://www.cultura.gov.br/">Ministério da Cultura</a></li>
            <li><a href="http://www.funarte.gov.br/">Funarte</a></li>
            <li><a href="http://www.cinemateca.gov.br/">Cinemateca</a></li>
            <li><a href="http://www.museus.art.br/">Museus</a></li>
            <li><a href="http://portal.iphan.gov.br/">IPHAN</a></li>
        </ul>
    <?php
    }
    
    function footer_acessibility_menu() {
    ?>
        <ul>
            <li><a href="">Da Silva</a></li>
        </ul>
    <?php
    }
    
    function footer_links_menu() {
    ?>
        <ul>
            <li><a href="http://www.wordpress.org/">Wordpress.org</a></li>
            <li><a href="http://www.buddypress.org/">Buddypress</a></li>
            <li><a href="http://www.w3.org/">W3C</a></li>
        </ul>
    <?php
    }
    
    function add_my_menus() {
        if( function_exists('register_nav_menus') ) {
            register_nav_menus(
                array(
                    'header-nav' => 'Header navigation menu',
                    'footer-page' => 'Footer page menu',
                    'footer-page2' => 'Footer page 2 menu',
                    'footer-cat' => 'Footer categories menu',
                    'footer-related-sites' => 'Footer related sites menu',
                    'footer-acessibility' => 'Footer acessibility menu',
                    'footer-links' => 'Footer links menu'
                )
            );
        }
    }
    
    add_action('init', 'add_my_menus');
    
	
	function removeWidgetsJs()
	{
		//wp_deregister_script('jquery');
		wp_deregister_script('bp_core_widget_members-js');
		wp_deregister_script('groups_widget_groups_list-js');
		wp_deregister_style('wp-pagenavi');
	}
	
	add_action('init', 'removeWidgetsJs');
		
	// Registra os estilos do tema
	function my_theme_styles()
	{
		wp_enqueue_style('master', get_bloginfo('template_directory').'/global/css/master.css');
		
		if(bp_is_blog_page()) {
			if(is_page() || is_single() || is_archive() || is_search())
				wp_enqueue_style('single', get_bloginfo('template_directory').'/global/css/single.css');
		} else {				
			if(bp_is_directory() || bp_is_member())
				wp_enqueue_style('directory', get_bloginfo('template_directory').'/global/css/directory.css');
				
			if(bp_is_member())
				wp_enqueue_style('profile', get_bloginfo('template_directory').'/global/css/profile.css');
				
			if(bp_is_page( BP_GROUPS_SLUG ) || bp_is_group())
				wp_enqueue_style('groups', get_bloginfo('template_directory').'/global/css/groups.css');
				
			if(bp_is_register_page() || bp_is_activation_page())
				wp_enqueue_style('register', get_bloginfo('template_directory').'/global/css/register.css');
		}
	}
	
	add_action('bp_head', 'my_theme_styles');
	
	// Registra os scripts do tema
	function my_theme_scripts ()
	{
		wp_enqueue_script('jquery', '', '', '', true);
		wp_enqueue_script('jquery-ui-tabs', '', array('jquery'), '', true);
		wp_enqueue_script('global-functions', get_bloginfo('template_directory').'/global/js/global.js', array('jquery'), '', true);
	}
	
	add_action('wp_enqueue_scripts', 'my_theme_scripts');
	
	// Adciona opcão pesquisa em todos no buddypress
	function bp_custom_search_form_type_select() {
		// Eventually this won't be needed and a page will be built to integrate all search results.
		$selection_box = '<label for="search-which" class="displayNone">em</label>';
		$selection_box .= '<select name="search-which" id="search-which">';
	
		$selection_box .= '<option value="all">' . __( 'Todo o site', 'buddypress' ) . '</option>';

		if ( function_exists( 'xprofile_install' ) ) {
			$selection_box .= '<option value="members">' . __( 'Members', 'buddypress' ) . '</option>';
		}
	
		if ( function_exists( 'groups_install' ) ) {
			$selection_box .= '<option value="groups">' . __( 'Groups', 'buddypress' ) . '</option>';
		}
	
		if ( function_exists( 'bp_forums_setup' ) && !(int) $bp->site_options['bp-disable-forum-directory'] ) {
			$selection_box .= '<option value="forums">' . __( 'Forums', 'buddypress' ) . '</option>';
		}
	
		if ( function_exists( 'bp_blogs_install' ) && bp_core_is_multisite() ) {
			$selection_box .= '<option value="blogs">' . __( 'Blogs', 'buddypress' ) . '</option>';
		}
	
		$selection_box .= '</select>';
	
		return apply_filters( 'bp_search_form_type_select', $selection_box );
	}
	
	// Modifica a barra do admin
	function bp_my_admin_bar()
	{		
		global $bp, $wpdb, $current_blog, $doing_admin_bar;
		 
		$doing_admin_bar = true;
		 
		if ( (int) get_site_option( 'hide-loggedout-adminbar' ) && !is_user_logged_in() )
		return false;
		 
		echo '<div id="wp-admin-bar">'
			.'<div class="padder">'
			.'<div class="middle">'
			.'<h3>Painel rápido &raquo;</h3>';
		 
		echo '<ul class="main-nav">';
		 
		// **** Do bp-adminbar-menus Actions ********
		do_action( 'bp_adminbar_menus' );
		
		echo '<li id="bp-adminbar-accessibility-menu" class="align-right">'
		    .'<a href="#">Acessibilidade</a>'
			.'<ul class="random-list">'
			.'<li><a href="#" title="Mapa do Site">Mapa do site</a></li>'
			.'<li><a href="#" title="Manual do Site">Manual do site</a></li>'
			.'<li class="alt color"><a href="#" id="contrast" title="Mudar para o contraste padrão">Contraste padrão <span></span></a></li>'
			.'<li class="color"><a href="#" id="contrast1" title="Mudar para o contraste nivel 1">Contraste nivel 1 <span></span></a></li>'
			.'<li class="alt color"><a href="#" id="contrast2" title="Mudar para o contraste nivel 2">Contraste nivel 2 <span></span></a></li>'
			.'<li class="color"><a href="#" id="contrast3" title="Mudar para o contraste nivel 3">Contraste nivel 3 <span></span></a></li>'
			.'</ul>'
			.'</li>';
		 
		echo '</ul>'
			.'</div>'
			.'</div>'
			.'</div>';
	}	
	
	remove_action('wp_footer', 'bp_core_admin_bar', 8);
	add_action( 'wp_footer', 'bp_my_admin_bar', 8 );
	
	remove_action( 'bp_adminbar_menus', 'bp_adminbar_random_menu', 100 );
	
	// my_register_sidebar
	function my_register_sidebar($name)
	{
		register_sidebar(
			array(
				'name'			=> $name,
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'	=> '</div>',
				'before_title'	=> '<h2 class="widgettitle">',
				'after_title'	=> '</h2>'
			)
		);
	}
	
	// cadastrar sidebars
	if(function_exists('register_sidebar'))
	{
		my_register_sidebar('left-column');
		my_register_sidebar('center-column');
		my_register_sidebar('left-center-column');
		my_register_sidebar('left-bottom-column');
		my_register_sidebar('right-column-1');
		my_register_sidebar('right-column-2');
		my_register_sidebar('right-column-3');
                my_register_sidebar('right-column-4');
		my_register_sidebar('members-column-1');
		my_register_sidebar('members-column-2');
		my_register_sidebar('members-column-3');
	}

	// Adciona avatar padrao	
	if ( !function_exists('fb_addgravatar') ) {
		function fb_addgravatar( $avatar_defaults ) {
			$myavatar = get_bloginfo('template_directory') . '/global/img/graph/graph_avatar.jpg';
			$avatar_defaults[$myavatar] = 'Cdigital avatar';
	 
			return $avatar_defaults;
		}
	 
		add_filter( 'avatar_defaults', 'fb_addgravatar' );
	}
	
	// Separating pings from comments_number
	function comment_count( $count )
	{
        if (!is_admin())
		{
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
        } 
		else 
		{
			return $count;
        }
	}
	
	add_filter('get_comments_number', 'comment_count', 0);
	
	// Custom comment
	function mytheme_comment($comment, $args, $depth)
	{
		$GLOBALS['comment'] = $comment;
        
        if ( $depth == 1 ) : ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">	
            <div>
                <div class="authorComment">
                    <?php if(get_avatar($comment, $size='80') != '') echo get_avatar($comment, $size='80'); else echo '<img src="'. get_bloginfo('stylesheet_directory') .'/global/graph_content_fotoPerfil.jpg" alt="Sem avatar" width="80" height="80" />'; ?>
                    <p class="autor"><?php print get_comment_author_link() . ' <span>' . get_comment_date( 'j' ) . ' de ' . get_comment_date( 'F' ) . '</span>'; ?></p>
                </div>
            </div>
            <div class="comentario">
                <span class="seta"></span>
				<?php if ($comment->comment_approved == '0') : ?>
                    <p><?php _e('Your comment is awaiting moderation.') ?></p>
                <?php else: ?>
					<?php comment_text() ?>
                <?php endif; ?>
                <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Responder', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
            
        <?php else : ?>
        <li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
        	<div class="comment-reply">
				<?php if ($comment->comment_approved == '0') : ?>
                    <p><?php _e('Your comment is awaiting moderation.') ?></p>
                <?php else : ?>
                    <?php comment_text() ?>
                <?php endif; ?>
                <?php comment_reply_link(array_merge( $args, array('reply_text' => 'Responder', 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                <div class="autorResposta">
                    <p class="nomeData"><?php print get_comment_author_link() . ' <span>' . get_comment_date( 'j' ) . ' de ' . get_comment_date( 'F' ) . '</span>'; ?></p>
                    <?php if(get_avatar($comment, $size='40') != '') echo get_avatar($comment, $size='40'); else echo '<img src="'. get_bloginfo('stylesheet_directory') .'/global/graph_content_fotoPerfil.jpg" alt="Sem avatar" width="40" height="40" />'; ?>
                </div>
                <div class="clear"></div>
            </div>
        <?php endif;
	}

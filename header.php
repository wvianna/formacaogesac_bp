<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head>
        <title><?php bp_page_title() ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   		<?php do_action( 'bp_head' ) ?>
        <link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />
        <?php if ( function_exists( 'bp_sitewide_activity_feed_link' ) ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php _e('Site Wide Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_sitewide_activity_feed_link() ?>" />
		<?php endif; ?>
		<?php if ( function_exists( 'bp_member_activity_feed_link' ) && bp_is_member() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_displayed_user_fullname() ?> | <?php _e( 'Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_member_activity_feed_link() ?>" />
		<?php endif; ?>
		<?php if ( function_exists( 'bp_group_activity_feed_link' ) && bp_is_group() ) : ?>
			<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> | <?php bp_current_group_name() ?> | <?php _e( 'Group Activity RSS Feed', 'buddypress' ) ?>" href="<?php bp_group_activity_feed_link() ?>" />
		<?php endif; ?>
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts RSS Feed', 'buddypress' ) ?>" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e( 'Blog Posts Atom Feed', 'buddypress' ) ?>" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <!--[if IE]>
			<script type='text/javascript' src='http://getfirebug.com/releases/lite/1.2/firebug-lite-compressed.js'></script>
			<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/global/css/ie.css" />
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    
    <body <?php body_class() ?>>
        <div id="general">

<ul class="displayNone">
<li><a href="#navigation">Pular para o menu de navegação</a></li>
<li><a href="#content">Pular para o conteúdo</a></li>
<li><a href="#footer">Pular para o rodapé</a></li>
</ul>

	<div id="headerbr" style="display:none">
		<div class="mclogo"><img src="<?php bloginfo('template_url');?>/global/img/comunicacoes_logo.png" alt="Comunicações - Ministério das Comunicações" title="Comunicações - Ministério das Comunicações" class="comunicacoes" /></div>
		<div class="brasillogo"><img src="<?php bloginfo('template_url');?>/global/img/barraGovFed_logo.png" alt="Brasil.gov.br" /></div>
    </div>
	<div id="header">
	<div class="container_11">
    	<a href="<?php echo site_url() ?>" title="<?php bp_site_name() ?>" id="logo"><img src="<?php bloginfo('template_url');?>/global/img/logo.png" alt="<?php bloginfo('title')?>" /></a>
    	<div class="redessociais">
    	<a href="http://www.orkut.com.br/Main#Profile?uid=8356572360662989605"><img src="<?php bloginfo('template_url');?>/global/img/orkut.png" alt="Orkut" /></a>
    	<a href="http://www.facebook.com/pages/Brasilia-Brazil/Projeto-Formacao-Gesac/124820184242998?v=wall"><img src="<?php bloginfo('template_url');?>/global/img/facebook.png" alt="Facebook" /></a>
    	<a href="http://twitter.com/FormacaoGesac"><img src="<?php bloginfo('template_url');?>/global/img/twitter.png" alt="Twitter" /></a>
    	</div>
		<div id="top_right">	
                        <form action="<?php echo bp_search_form_action() ?>" method="post" id="search-form">
                            <input type="text" id="search-terms" class="inputDefault" name="search-terms" value="o que proucura?" />
                            <?php echo bp_custom_search_form_type_select() ?>
                            <input type="submit" name="search-submit" id="search-submit" class="submitDefault" value="buscar" />
                            <?php wp_nonce_field( 'bp_search_form' ) ?>
                        </form>
			<div id="acessibilidade">
				<a href="#"><img src="<?php bloginfo('template_url');?>/global/img/icon_a-mais.gif" alt="Aumentar letra" /></a>
				<a href="#"><img src="<?php bloginfo('template_url');?>/global/img/icon_a-menos.gif" alt="Diminuir letra" /></a>
			</div>
		</div>
  </div>
  </div>

    <div id="navigation">
    <div id="container_nav">
       <?php if( function_exists('wp_nav_menu') ) : ?>
                            <?php wp_nav_menu( array( 'menu_class' => 'nav', 'container' => '', 'fallback_cb' => 'header_menu', 'theme_location' => 'header-nav' ) ); ?>
                        <?php else : header_menu(); endif; ?>
                        
                        <ul class="bpNav">
                            <li<?php if ( bp_is_page( BP_MEMBERS_SLUG ) || bp_is_member() ) : ?> class="selected"<?php endif; ?>>
                                <a href="<?php echo site_url() ?>/<?php echo BP_MEMBERS_SLUG ?>/" title="<?php _e( 'Members', 'buddypress' ) ?>"><?php _e( 'Members', 'buddypress' ) ?></a>
                            </li>
				<?php if ( bp_is_active( 'blogs' ) && bp_core_is_multisite() ) : ?>
                                <li<?php if ( bp_is_page( BP_BLOGS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
                                    <a href="<?php echo site_url() ?>/<?php echo BP_BLOGS_SLUG ?>/" title="<?php _e( 'Blogs', 'buddypress' ) ?>"><?php _e( 'Blogs', 'buddypress' ) ?></a>
                                </li>
                                
                                <li<?php if ( bp_is_page( BP_GROUPS_SLUG ) || bp_is_group() ) : ?> class="selected"<?php endif; ?>>
                                    <a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/" title="<?php _e( 'Groups', 'buddypress' ) ?>"><?php _e( 'Groups', 'buddypress' ) ?></a>
                                </li>
            
                                <?php if ( bp_is_active( 'forums' ) && bp_is_active( 'groups' ) && ( function_exists( 'bp_forums_is_installed_correctly' ) && !(int) bp_get_option( 'bp-disable-forum-directory' ) ) && bp_forums_is_installed_correctly() ) : ?>
                                    <li<?php if ( bp_is_page( BP_FORUMS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
                                        <a href="<?php echo site_url() ?>/<?php echo BP_FORUMS_SLUG ?>/" title="<?php _e( 'Forums', 'buddypress' ) ?>"><?php _e( 'Forums', 'buddypress' ) ?></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                 
							<?php if ( bp_is_active( 'activity' ) ) : ?>
                                <li<?php if ( bp_is_page( BP_ACTIVITY_SLUG ) ) : ?> class="selected"<?php endif; ?>>
                                    <a href="<?php echo site_url() ?>/<?php echo BP_ACTIVITY_SLUG ?>/" title="<?php _e( 'Activity', 'buddypress' ) ?>">Últimos Posts</a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    </div>

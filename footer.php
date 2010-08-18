</div>

<!-- <div id="footer">
    <div class="navFooter">
    	<div class="middle">
            <div class="column-1">
                <h3>Páginas</h3>
                
                <?php if( function_exists('wp_nav_menu') ) : ?>
                    <?php wp_nav_menu( array( 'depth' => 1, 'menu_class' => '', 'container' => '', 'fallback_cb' => 'footer_page_menu', 'theme_location' => 'footer-page' ) ); ?>
                    <?php wp_nav_menu( array( 'depth' => 1, 'menu_class' => '', 'container' => '', 'fallback_cb' => '', 'theme_location' => 'footer-page2' ) ); ?>
                <?php else : footer_page_menu(); endif; ?>
            </div>
            
            <div class="column-2">
                <h3>Categorias</h3>
                
                <?php if( function_exists('wp_nav_menu') ) : ?>
                    <?php wp_nav_menu( array( 'depth' => 1, 'menu_class' => '', 'container' => '', 'fallback_cb' => 'footer_cat_menu', 'theme_location' => 'footer-cat' ) ); ?>
                <?php else : footer_cat_menu(); endif; ?>
            </div>
            
            <div class="column-3">
                <h3>Sites relacionados</h3>
                
                <?php if( function_exists('wp_nav_menu') ) : ?>
                    <?php wp_nav_menu( array( 'depth' => 1, 'menu_class' => '', 'container' => '', 'fallback_cb' => 'footer_related_menu', 'theme_location' => 'footer-related-sites' ) ); ?>                    
                <?php else : footer_related_menu(); endif; ?>
                
                <h3>Acessibilidade</h3>
                
                <?php if( function_exists('wp_nav_menu') ) : ?>
                    <?php wp_nav_menu( array( 'depth' => 1, 'menu_class' => '', 'container' => '', 'fallback_cb' => 'footer_acessibility_menu', 'theme_location' => 'footer-acessibility' ) ); ?>
                <?php else : footer_acessibility_menu(); endif; ?>
            </div>
            
            <div class="column-4">
                <h3>Links úteis</h3>
                
                <?php if( function_exists('wp_nav_menu') ) : ?>
                    <?php wp_nav_menu( array( 'depth' => 1, 'menu_class' => '', 'container' => '', 'fallback_cb' => 'footer_links_menu', 'theme_location' => 'footer-links' ) ); ?>
                <?php else : footer_links_menu(); endif; ?>
                
                <h3>A Rede</h3>
                
                <ul>
                    <li<?php if ( bp_is_page( BP_MEMBERS_SLUG ) || bp_is_member() ) : ?> class="selected"<?php endif; ?>>
                        <a href="<?php echo site_url() ?>/<?php echo BP_MEMBERS_SLUG ?>/" title="<?php _e( 'Members', 'buddypress' ) ?>"><?php _e( 'Members', 'buddypress' ) ?></a>
                    </li>
                
                    <?php if ( bp_is_active( 'activity' ) ) : ?>
                        <li<?php if ( bp_is_page( BP_ACTIVITY_SLUG ) ) : ?> class="selected"<?php endif; ?>>
                            <a href="<?php echo site_url() ?>/<?php echo BP_ACTIVITY_SLUG ?>/" title="<?php _e( 'Activity', 'buddypress' ) ?>">Fluxo de atividades</a>
                        </li>
                    <?php endif; ?>
                    
                    <?php if ( bp_is_active( 'groups' ) ) : ?>
                        <li<?php if ( bp_is_page( BP_GROUPS_SLUG ) || bp_is_group() ) : ?> class="selected"<?php endif; ?>>
                            <a href="<?php echo site_url() ?>/<?php echo BP_GROUPS_SLUG ?>/" title="<?php _e( 'Groups', 'buddypress' ) ?>"><?php _e( 'Groups', 'buddypress' ) ?></a>
                        </li>
    
                        <?php if ( bp_is_active( 'forums' ) && bp_is_active( 'groups' ) && ( function_exists( 'bp_forums_is_installed_correctly' ) && !(int) bp_get_option( 'bp-disable-forum-directory' ) ) && bp_forums_is_installed_correctly() ) : ?>
                            <li<?php if ( bp_is_page( BP_FORUMS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
                                <a href="<?php echo site_url() ?>/<?php echo BP_FORUMS_SLUG ?>/" title="<?php _e( 'Forums', 'buddypress' ) ?>"><?php _e( 'Forums', 'buddypress' ) ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endif; ?>
                    
                    <?php if ( bp_is_active( 'blogs' ) && bp_core_is_multisite() ) : ?>
                        <li<?php if ( bp_is_page( BP_BLOGS_SLUG ) ) : ?> class="selected"<?php endif; ?>>
                            <a href="<?php echo site_url() ?>/<?php echo BP_BLOGS_SLUG ?>/" title="<?php _e( 'Blogs', 'buddypress' ) ?>"><?php _e( 'Blogs', 'buddypress' ) ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div> -->
    
<!--    <div class="footer">
    	<div class="middle">
            <div class="left-column">
                <a href="<?php bloginfo('url'); ?>" title="Cultura Digital"><img src="<?php bloginfo('template_directory'); ?>/global/img/graph/graph_logo.png" alt="Logotipo do Cultura Digital" /></a>
                <p>Cultura Digital.br -  Alguns direitos reservados. &reg; 2009 - 2010</p>
            </div>
            
            <div class="right-column">
                <a href="http://www.dasilva.org.br/" title="Selo de Site Acessível Da Silva"><img src="<?php bloginfo('template_directory'); ?>/global/img/graph/graph_selo_acessobr92x47.gif" width="75" alt="Selo de Site Acessível Da Silva" /></a>
                <a href="http://www.cultura.gov.br/" title="Ministério da Cultura"><img src="<?php bloginfo('template_directory'); ?>/global/img/graph/graph_logo_minc.png" alt="Valid XHTML 1.0 Transitional" /></a>
                <a href="http://www.rnp.br/" title="Rede Nacional de Ensino e Pesquisa"><img src="<?php bloginfo('template_directory'); ?>/global/img/graph/graph_rnp.png" alt="Rede Nacional de Ensino e Pesquisa" /></a>
            </div>
        </div>
    </div>
    
    <ul class="displayNone">
        <li><a href="#content">Pular para o menu de navegação</a></li>
        <li><a href="#content">Pular para o conteúdo</a></li>
        <li><a href="#content">Pular para o footer</a></li>
    </ul>
</div> -->


<div id="footer">
    <div class="middle">
        <ul class="menu">
            <li><a href="#">Início</a></li>
            <li class=""><a href="http://culturadigital.br/faqs/" title="FAQs">FAQs</a></li>
            <li class=""><a href="http://culturadigital.br/termos-de-uso/" title="Termos de uso">Termos de uso</a></li>
            <li class=""><a href="http://culturadigital.br/quem-faz/" title="Quem Faz">Quem Faz</a></li>
        </ul>

        <p class="text"><a href="http://www.mc.gov.br/">Ministério das Comunicações</a> - Alguns direitos reservados.</p>
 
        <p class="links">
          <a href="http://www.w3.org/" title="www.w3.org">
            <img src="<?php bloginfo('template_url');?>/imgs/graph_w3c.png" alt="www.w3.org" />
          </a> 
          <a href="http://creativecommons.org/licenses/by-nc-sa/2.5/br/" title="www.creativecommons.org">
            <img src="<?php bloginfo('template_url');?>/imgs/graph_cc.png" alt="www.creativecommons.org" />
         </a>
         <a href="http://www.wordpress.org/" title="www.wordpress.org">
           <img src="<?php bloginfo('template_url');?>/imgs/graph_wp.png" alt="www.wordpress.org" />
         </a>
        </p>
        <div class="clear"></div>
    </div>
</div>



<a href="#top" id="top-link">Topo</a>
        
<?php do_action( 'bp_footer' ) ?>
<?php wp_footer(); ?>
<?php if ( is_singular() and comments_open() and (get_option('thread_comments') == 1) or is_page() and comments_open() and (get_option('thread_comments') == 1) ) wp_enqueue_script( 'comment-reply' ); ?>

<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
	try {
		_uacct = "UA-9810322-1";
		urchinTracker();
	} catch(err) {}
</script>

</body>
</html>

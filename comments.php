<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="nocomments">Esse post é protegido por senha. Entre com a senha para ver os comentários.</p>
	<?php
		return;
	}
?>

<div class="comentar comments">
	<?php if ( comments_open() ) : ?>
    <div id="respond">
	    <?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
	    <p>Você precisa estar <a href="<?php echo wp_login_url( get_permalink() ); ?>">logado</a> para postar um comentário.</p>
	    <?php else : ?>
		
        <div class="respondTit">
            <h3>Deixe seu comentário</h3>
        </div>
        <div class="authorComment">
        	<?php if(!empty($user_ID)){
            	global $bp; bp_loggedin_user_avatar( 'type=thumb&width=80&height=80' );
				?>
                Logado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>.
                <?php
				}
				else{ ?>
                <img class="fotoPerfil" src="<?php bloginfo("template_directory") ?>/global/img/graph/graph_content_fotoPerfil.jpg" alt="" width="80" height="80" />
                <p>Seu nome</p>
                <?php } ?>
        </div>
	    <span class="comentario"></span>
	    <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        	<?php if(!empty($user_ID)) : ?>
                <div class="inputDefault"><textarea cols="50" rows="10" name="comment" id="comment">Seu comentário...</textarea></div>
            <?php else : ?>
            	<ul>
                	<li><div class="inputDefault"><textarea cols="50" rows="10" name="comment" id="comment">Seu comentário...</textarea></div></li>
                    <li><div class="inputDefault"><input name="author" type="text" value="Seu nome" id="author" /></div></li>
                    <li><div class="inputDefault"><input name="email" id="email" type="text" value="Seu e-mail (não será divulgado)" /></div></li>
                    <li><div class="inputDefault"><input name="url" id="url" type="text" value="Seu website (opcional)" /></div></li>
                </ul>
            <?php endif; ?>
	        <button type="submit" name="submit" id="commentSubmit">Comentar</button>
			<?php do_action('comment_form', $post->ID); ?>
	        <?php comment_id_fields(); ?>
	    </form>
        <div id="cancel-comment-reply">
            <?php cancel_comment_reply_link( __('Cancel') ) ?>
        </div>
	    <?php endif; ?>
	</div>
	<?php endif; ?>

	<?php if ( have_comments() ) : ?>
		<h3 class="comentarios"><?php comments_number( 'Nenhum comentário','Comentários (1)','Comentários (%)' );?></h3>
		<ul class="comment-list comentarios">
		<?php wp_list_comments('type=comment&callback=mytheme_comment'); ?>
		</ul>
	<?php else : ?>
		<?php if ( comments_open() ) : ?>
		<?php else : ?>
			<p class="nocomments">Comments are closed.</p>
		<?php endif; ?>
	<?php endif; ?>
    <div class="clear"></div>
</div>

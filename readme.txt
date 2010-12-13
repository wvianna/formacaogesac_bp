mitar o número de carateres dos comentários
	
	Para limitar o número de caracteres dos comentários, na widget "O que acontece na rede", é necessário alterar o arquivo bp-activity-templatetags.php (plugins/buddypress/bp-activity).

	Substituir a linha "content .= '<div class="acomment-content">' . apply_filters( 'bp_get_activity_content', $comment->content ) . '</div>';" por:



				/*INICIO DA CUSTOMIZAÇÃO*/

				/*limitar numero de caracteres dos comentários*/
				/*$content .= '<div class="acomment-content">' . apply_filters( 'bp_get_activity_content', $comment->content ) . '</div>';*///codigo original
				
				$pagina_atual = '<br>'.'http://' . $_SERVER['SERVER_NAME'] . $_SERVER ['REQUEST_URI'];
				$pagina_inicial = '<br>' . site_url() . '/';
				$atividade = '<br>' . bp_get_activity_user_link() . 'activity/' . bp_get_activity_id() . '/';
				$pagina_usuario = (int)substr_count($pagina_atual, bp_get_activity_user_link());
				
				if ( is_user_logged_in()):
					
					if ($pagina_usuario <> 0):
						if ($pagina_atual == $atividade):
							$content .= '<div class="acomment-content">' . apply_filters( 'bp_get_activity_content', $comment->content ) . '</div>';
						else:
							$ret = (substr($comment->content, 51));
                                			if ($ret <> ''):
								$pts = '...';
							else:
								$pts = '';
							endif;
							$conteudo = (substr($comment->content, 0, 50)) . $pts;
							$content .= '<div class="acomment-content">' . apply_filters( 'bp_get_activity_content', $conteudo ) . '</div>';
						endif;
					else:
						if ($pagina_atual == $pagina_inicial):
							$ret = (substr($comment->content, 51));
                                			if ($ret <> ''):
								$pts = '...';
							else:
								$pts = '';
							endif;
							$conteudo = (substr($comment->content, 0, 50)) . $pts;
							$content .= '<div class="acomment-content">' . apply_filters( 'bp_get_activity_content', $conteudo ) . '</div>';
						else:
							$content .= '<div class="acomment-content">' . apply_filters( 'bp_get_activity_content', $comment->content ) . '</div>';
						endif;
					endif;

				else:
				
					if ($pagina_atual == $pagina_inicial):

						$ret = (substr($comment->content, 51));
                                		if ($ret <> ''):
							$pts = '...';
						else:
							$pts = '';
						endif;
						$conteudo = (substr($comment->content, 0, 50)) . $pts;
						$content .= '<div class="acomment-content">' . apply_filters( 'bp_get_activity_content', $conteudo ) . '</div>';

					else:
						$content .= '<div class="acomment-content">' . apply_filters( 'bp_get_activity_content', $comment->content ) . '</div>';

					endif;
				endif;
				/*FIM DA CUSTOMIZAÇÃO*/

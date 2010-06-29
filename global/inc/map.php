<?php include '../../../../../wp-blog-header.php'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
	<head>
		<!--<link type="text/css" href="<?php bloginfo('stylesheet_directory'); ?>/global/css/map.css" rel="stylesheet" media="screen" />-->
		<script type="text/javascript" src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAr8Ex0a8JdgIWrpZCiXV-6RS0vQwC41RQAC1GAJ9qQ-ExVVli_BSv6B-LnAI91nvgzt0ExM-waT43pg"></script>
		<script type="text/javascript">
			var map;
			var marker;
			var member;
			var geocoder;
			
			function pointMembers()
			{
				// Limpar o mapa
				map.clearOverlays();
				
				<?php
					global $wpdb, $user_ID;
					
					// Recuperar os membros
					$members = $wpdb->get_col("SELECT ID FROM {$wpdb->users} ORDER BY RAND() LIMIT 50");
					
					// Recuperar os membros online
					//$members = BP_Core_User::get_online_users(50);
					
					// Se o usuário estiver logado, mostrar ele no mapa também
					if(!empty($user_ID)) array_push($members, $user_ID);
					
					// Apontar no mapa a localização de cada membro
					foreach($members as $member) :
					
					// Apontar no mapa a localização de cada membro online
					//foreach($members['users'] as $omember) :
						//$member = $omember->user_id;
						
						$user_zip         = xprofile_get_field_data('Cep', $member);
						$user_city        = xprofile_get_field_data('Cidade', $member);
						$user_name        = xprofile_get_field_data('Nome Completo', $member);
						//$user_avatar      = bp_core_get_avatar($member, 1, 30, 30, true);
						$user_description = limit_chars(xprofile_get_field_data('Biografia', $member), 140, false);
						//$user_link        = 
						
						$user_description = str_replace(array("\r", "\n"), array("<br>", ""), $user_description);
						
						if(!empty($user_zip) || !empty($user_city)) :
							?>
								geocoder.getLatLng("<?php print "{$user_zip} {$user_city}"; ?>", function(point){
									if(point)
									{
										marker = new GMarker(point);
										member = '<?php echo bp_core_get_userlink( $member ); ?> </strong><br><?php print $user_description; ?>';
										marker.bindInfoWindowHtml(member, {maxWidth:250});
										<?php global $user_ID; ?>
										<?php if($member == $user_ID) : ?>map.openInfoWindowHtml(point, member, {maxWidth:250});<?php endif; ?>
										map.addOverlay(marker);
									}
								});
							<?php
						endif;
					endforeach;
				?>
			}
			
			function GLoad()
			{
				// Instanciar o mapa
				map = new GMap2(document.getElementById("map"));
				// Instanciar o localizador (para endereços, ceps, etc)
				geocoder = new GClientGeocoder();
				
				// Adicionar os controles padrão ao mapa
				map.setUIToDefault();
				// Centralizar o mapa no Brasil
				map.setCenter(new GLatLng(0, 0), 1);
				
				// Mostrar as coordenadas do mouse
				//GEvent.addListener(map, "click", function(overlay, point) { map.openInfoWindow(point, "Point: " + point); });
				
				// Carregar os membros
				pointMembers();
			}
		</script>
	</head>
	<body onload="GLoad()" onunload="GUnload()" style="margin:0px; padding:0px; font:12px Arial, Helvetica, sans-serif;">
		<div id="map" style="width:100%; height:200px; margin:0px;"></div>
	</body>
</html>

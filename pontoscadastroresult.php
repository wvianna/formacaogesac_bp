<?php
/** Loads the WordPress Environment and Template */
require('../../../wp-blog-header.php');
/** Sets up the WordPress Environment. */
require( dirname(__FILE__) . '../../../../wp-load.php' );
?>


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



  <div id="mainContent" class="container_11">
    <div id="content" class="grid_900">
    <div id="pageContent" class="main">


      <div id="conteudo">
<h1>Pontos atendidos</h1>
<?php

$uf = $_POST["estado"];
$sql = "select * from wp_gesac_ponto where uf = '$uf' order by municipio, estabelecimento;";
$rs = mysql_query($sql) or die ("Erro no acesso ao banco");


echo "<html>
      <head>
      <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
      </head>
      <body>
      Para o estado: \"$uf\" temos os seguintes códigos de pontos Gesac, ordenados por município e estabelecimento. Identifique o seu ponto Gesac, copie e cole o número do campo \"Cod Pto Gesac\" para o \"Código de Ponto Gesac\" na página de cadastro do usuário na rede social.     
     <table id=\"tabelaresultado\" cellspacing=\"0\" cellpadding=\"0\" border=\"1\" width=\"100%\" align=\"center\">
     <tr color=\"red\">
       <th>Cod Pto Gesac</th>
       <th>Município</th>
       <th>Estabelecimento</th>
       <th>Logradouro</th>
       <th>Número</th>
       <th>Bairro</th>
       <th>Complemento</th>
     </tr>";
$i=0;
while ($reg = mysql_fetch_assoc($rs)){
$id = $reg["gesac"];
$municipio = $reg["municipio"];
$estabelecimento = $reg["estabelecimento"];
$logradouro = $reg["logradouro"];
$numero = $reg["numero"];
$bairro = $reg["bairro"];
$complemento = $reg["complemento"];

if (($i % 2) == 0)
{
echo "<tr id=\"linha_com_cor\">
        <td>$id</td>
        <td>$municipio</td>
        <td>$estabelecimento</td>
        <td>$logradouro</td>
        <td>$numero</td>
        <td>$bairro</td>
        <td>$complemento</td>
      </tr>";
}
else
{
echo "<tr id=\"linha_sem_cor\">
        <td>$id</td>
        <td>$municipio</td>
        <td>$estabelecimento</td>
        <td>$logradouro</td>
        <td>$numero</td>
        <td>$bairro</td>
        <td>$complemento</td>
      </tr>";	
}
$i++;
}
    
echo "</table>
      </body></html>";
?>

                    
   </div>
    </div>
    </div>
    <div class="clear"></div>
</div>

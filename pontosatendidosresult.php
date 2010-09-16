<?php
/** Loads the WordPress Environment and Template */
require('../../../wp-blog-header.php');
/** Sets up the WordPress Environment. */
require( dirname(__FILE__) . '../../../../wp-load.php' );
?>
<?php get_header (); ?>
  <div id="mainContent" class="container_11">
    <div id="content" class="grid_8">
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
       <th>CEP</th>
       <th>E-mail</th>
       <th>Latitude</th>
       <th>Longitude</th>
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
$cep = $reg["cep"];
$email = $reg["email"];
$latitude = $reg["latitude"];
$longitude = $reg["longitude"];

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
        <td>$cep</td>
        <td>$email</td>
        <td>$latitude</td>
        <td>$longitude</td>
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
        <td>$cep</td>
        <td>$email</td>
        <td>$latitude</td>
        <td>$longitude</td>
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
    <div id="right-column" class="grid_3">
      <?php locate_template( array( 'sidebar.php' ), true ) ?>
    </div>
    <div class="clear"></div>
</div>
<?php get_footer (); ?>

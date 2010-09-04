<?php
/** Sets up the WordPress Environment. */
require( dirname(__FILE__) . '/wp-load.php' );

$uf = $_POST["estado"];
$sql = "select * from wp_pontogesac where uf = '$uf' order by municipio, estabelecimento;";
$rs = mysql_query($sql) or die ("Erro no acesso ao banco");


echo "<html>
      <head>
      <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
      </head>
      <body>
      Para o estado: \"$uf\" temos os seguintes códigos de pontos Gesac, ordenados por município e estabelecimento. Identifique o seu ponto Gesac, copie e cole o número do campo \"Cod Pto Gesac\" para o \"Código de Ponto Gesac\" na página de cadastro do usuário na rede social.     
     <table border=\"1\" align=\"center\">
     <tr color=\"red\">
       <td>Cod Pto Gesac</td>
       <td>Estabelecimento</td>
       <td>Município</td>
       <td>Logradouro</td>
     </tr>";
while ($reg = mysql_fetch_assoc($rs)){
$id = $reg["gesac"];
$descricao = $reg["estabelecimento"];
$municipio = $reg["municipio"];
$logradouro = $reg["logradouro"];

echo "<tr>
        <td>$id</td>
        <td>$descricao</td>
        <td>$municipio</td>
        <td>$logradouro</td>
        
      </tr>";
}
    
echo "</table>
      </body></html>";
?>

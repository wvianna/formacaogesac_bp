<?php
/** Loads the WordPress Environment and Template */
require('../../../wp-blog-header.php');
?>
<?php get_header (); ?>
  <div id="mainContent" class="container_11">
    <div id="content" class="grid_8">
    <div id="pageContent" class="main">

<h1>Pontos atendidos</h1>
<?php
echo'  
  <label>
    Estado
  </label>
  <form action="pontosatendidosresult.php" method="post">
   <select name="estado" id="estado">  
    <option value="">----</option>1
    <option value="AC">Acre</option>
    <option value="AL">Alagoas</option>
    <option value="AP">Amapá</option>
    <option value="AM">Amazonas</option>
    <option value="BA">Bahia</option>
    <option value="CE">Ceará</option>
    <option value="DF">Distrito Federal</option>
    <option value="ES">Espírito Santo</option>
    <option value="GO">Goiás</option>
    <option value="MA">Maranhão</option>
    <option value="MT">Mato Grosso</option>
    <option value="MS">Mato Grosso do Sul</option>
    <option value="MG">Minas Gerais</option>
    <option value="PA">Pará</option>
    <option value="PB">Paraíba</option>
    <option value="PR">Paraná</option>
    <option value="PE">Pernambuco</option>
    <option value="PI">Piauí</option>
    <option value="RJ">Rio de Janeiro</option>
    <option value="RN">Rio Grande do Norte</option>
    <option value="RS">Rio Grande do Sul</option>
    <option value="RO">Rondônia</option>
    <option value="RR">Roraima</option>
    <option value="SC">Santa Catarina</option>
    <option value="SP">São Paulo</option>
    <option value="SE">Sergipe</option>
    <option value="TO">Tocantins</option>
   </select>
   <INPUT type="submit" value="Enviar"> 
  </form>';
?>
                    
   
    </div>
    </div>
    <div id="right-column" class="grid_3">
      <?php locate_template( array( 'sidebar.php' ), true ) ?>
    </div>
    <div class="clear"></div>
</div>
<?php get_footer (); ?>

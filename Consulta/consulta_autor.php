<?php
  session_start();
  include('../conexao.php');
  
  if (isset($_POST['chamartable'])){
	
	 include('../cadastro/autor.php');  
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../estilo/estilo.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="author" content="Tomas Bagdanavicius, http://www.lwis.net/free-css-drop-down-menu/" />
<meta name="keywords" content=" css, dropdowns, dropdown menu, drop-down, menu, navigation, nav, horizontal, vertical left-to-right, vertical right-to-left, horizontal linear, horizontal upwards, cross browser, internet explorer, ie, firefox, safari, opera, browser, lwis" />
<meta name="description" content="Clean, standards-friendly, modular framework for dropdown menus" />

<!-- Informações referentes aao MENU 2 -->

<link rel="stylesheet" href="../menu2/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="../menu2/font-awesome/css/font-awesome-ie7.css" >
<script src="../menu2/js/menu.js" type="text/javascript"></script>
<!-- Fim-->
<title>Cadastro de Autores</title>
<style type="text/css">
body {
	background-repeat: repeat;
}
/* Sortable tables */
table.sortable thead {
	background-color:#eee;
	color:#666666;
	font-weight: bold;
	cursor: default;
}
</style>
<style type="text/css">
.row1 {
	background-color: ##B6B6B6;
	size:10xp;
}
.row2 {
	background-color: #FFF;
}
</style>
</head>
<body>
<div id="geral">
  <div id="corpo">
    <div id="topo">
      <div id="logo_mater"> </div>
      <a href="../index.php">
      <div id="logo"> </div>
      </a> </div>
    <div id="menu_biblioteca">
      <?php include_once('../menu2/menu.php'); ?>
    </div>
    <p>
    <h1 align="center">Consulta de Autores</h1>
    <p align="center">&nbsp;</p>
    <div id="listar_dados_table">
      <form id="form1" name="form1" method="post" action="" >
        <?php
  echo '<table width="100%" rules="rows" id="listar_table" align="center" border="1" cellpadding="5" cellspacing="0" class="sortable">';
  echo  ' <tr>';
  echo  ' <td width="20%" height="40px" align="left" bgcolor="#414192">&nbsp;</td>';
  echo  ' <td width="20%" height="40px" align="left" bgcolor="#414192">&nbsp;</td>';
  echo  ' <td width="20%" height="40px" align="right" bgcolor="#414192">';
  echo  '  <form id="form2" name="form2" method="post" action="">';
  echo  ' <input type="submit" name="chamartable" id="chamartable" value="+ Novo" width="100px"  />';
  echo  ' </form>';
	   
  echo  ' </td>';
  echo  ' </tr>';
  echo  ' </table>';
  
  
		echo '<table width="100%" rules="rows" id="listar_table" align="center" border="1" cellpadding="5" cellspacing="0" class="sortable">';
		echo '<thead><tr>';
	
		echo '<th width="20%" height="40px" align="left" bgcolor="#414192"><a href="#" class="nounderline"><FONT COLOR="FFFFFF">Código</a></th>';
		echo '<th width="60%" align="left" bgcolor="#414192"><a href="#" class="nounderline"><FONT COLOR="FFFFFF">Nome</a></th>';
		echo '<th width="20%" align="left" bgcolor="#414192"><a href="#" class="nounderline"><FONT COLOR="FFFFFF">Data</a></th>';
		echo '<th width="10%" align="left" bgcolor="#414192"><a href="#" class="nounderline"><FONT COLOR="FFFFFF">Excluir</a></th> ';
		echo '<th width="20%" align="left" bgcolor="#414192"><a href="#" class="nounderline"><FONT COLOR="FFFFFF">Editar</a></th>';

		echo '</tr></thead>';
		echo '<tbody>';

	 	    $sql = " SELECT aut_cd, aut_nome, aut_dt_cadastro FROM autor order by aut_nome  ";
			$resultado = mysql_query($sql) or die(mysql_error());
			$i = 0;
			while ($row = mysql_fetch_assoc($resultado)) {
				$data = date("d/m/Y", strtotime( $row['aut_dt_cadastro'])) ;
				$estilo = ((++$i % 2) == 0) ? 'row1' : 'row2';
				echo  "<tr class=\"{$estilo}\" >";
 				echo "<td><a  href=\"../cadastro/autor.php?aut_cd=" . $row['aut_cd'] . "\" class='nounderline'>" . $row['aut_cd'] . "</a></td>";
    			echo '<td>' . $row['aut_nome'] . '</td>';
				echo '<td>' .$data. '</td>';
				/*Excluir*/
				echo '<td> <a href=\biblioteca/cadastro/DAO_autor.php?aut_cd='. $row['aut_cd'] . '> <img src="../imagens/excluir2.png" width="32" height="32" alt="excluir"/></a>   </td>';
				/*Editar*/
				echo '<td> <a href=\biblioteca/cadastro/autor.php?aut_cd='. $row['aut_cd'] . '> <img src="../imagens/editar.png" width="32" height="32" alt="editar"/></a>   </td>';      
				
				
				
 			    echo '</tr>';//biblioteca/Consulta/consulta_autor.php=
		  }

			   echo '</tbody></table>';
		?>
      </form>
    </div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  </div>
  
  <!--  div id="rodape">Todos os direitos reservados. Faculdade de Ciência Tecnologia Mater Christi</div>--> 
</div>
</div>
</body>
</html>

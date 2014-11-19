<?php
  session_start();
  include('../conexao.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../estilo/estilo.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Tomas Bagdanavicius, http://www.lwis.net/free-css-drop-down-menu/" />
<meta name="keywords" content=" css, dropdowns, dropdown menu, drop-down, menu, navigation, nav, horizontal, vertical left-to-right, vertical right-to-left, horizontal linear, horizontal upwards, cross browser, internet explorer, ie, firefox, safari, opera, browser, lwis" />
<meta name="description" content="Clean, standards-friendly, modular framework for dropdown menus" />
<link href="../menu/css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../menu/css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../menu/css/dropdown/themes/nvidia.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
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

.row1{
background-color: ##B6B6B6;
size:10xp;
}

.row2{
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
      <?php include_once('../menu/nvidia.com.php'); ?>
    </div>
    <p>
    <h1 align="center">Consulta de Cursos</h1>
    <div id="listar_dados_table">
    <form id="form1" name="form1" method="post" action="" >
      
  <?php
		echo '<table width="100%" rules="rows" id="listar_table" align="center" border="1" cellpadding="5" cellspacing="0" class="sortable">';
		echo '<thead><tr>';
		echo '<th width="20%" height="40px" align="left" bgcolor="#414192"><a href="#" class="nounderline"><FONT COLOR="FFFFFF">Código</a></th>';
		echo '<th width="60%" align="left" bgcolor="#414192"><a href="#" class="nounderline"><FONT COLOR="FFFFFF">Nome</a></th>';
		echo '<th width="20%" align="left" bgcolor="#414192"><a href="#" class="nounderline"><FONT COLOR="FFFFFF">Data</a></th>';

		echo '</tr></thead>';
		echo '<tbody>';

	 	    $sql = " SELECT cur_cd, cur_nome, cur_dt_cadastro FROM curso  ";
			$resultado = mysql_query($sql) or die(mysql_error());
			$i = 0;
			while ($row = mysql_fetch_assoc($resultado)) {
				$data = date("d/m/Y", strtotime( $row['cur_dt_cadastro'])) ;
				$estilo = ((++$i % 2) == 0) ? 'row1' : 'row2';
				echo  "<tr class=\"{$estilo}\" >";
 				echo "<td><a  href=\"../curso.php?cur_cd=" . $row['cur_cd'] . "\" class='nounderline'>" . $row['cur_cd'] . "</a></td>";
    			echo '<td>' . $row['cur_nome'] . '</td>';
				echo '<td>' .$data. '</td>';
 			    echo '</tr>';
		  }

			   echo '</tbody></table>';
		?>
    </form>
    </div>
  </div>
<!--  div id="rodape">Todos os direitos reservados. Faculdade de Ciência Tecnologia Mater Christi</div>-->
  </div>
</div>
</body>
</html>
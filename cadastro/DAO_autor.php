<?php
  session_start();
  include('../conexao.php');

	if(!empty($_GET['aut_cd'])){
		$codigo = $_GET['aut_cd'];
				
		$sql = "DELETE FROM autor WHERE aut_cd = '".$codigo."' ";  
		$resultado = mysql_query($sql) or die ("Erro SQL =  ".mysql_error());
		echo "<script language='javascript'>location.href='../Consulta/consulta_autor.php';</script> ";
	}


?>
<?php
  session_start();
  include('../conexao.php');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="../estilo/estilo.css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="Equipe de Desenvolvimento Mater Christi" content="SIBMC - Sistema integrado Faculdade Mater Christi" />
<meta name="description" content="Clean, standards-friendly, modular framework for dropdown menus" />
<link href="../menu/css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../menu/css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="../menu/css/dropdown/themes/nvidia.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="./css/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
	<link href="./themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	<script src="./js/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="./js/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
    <script src="jquery.jtable.js" type="text/javascript"></script>
	
    
    <!-- Informações referentes aao MENU 2 -->
      	
     	<link rel="stylesheet" href="../menu2/style.css" type="text/css" media="screen">
    	<link rel="stylesheet" href="../menu2/font-awesome/css/font-awesome-ie7.css" >

    	<script src="../menu2/js/menu.js" type="text/javascript"></script> 
    <!-- Fim-->
<title>Cadastro de Autores</title>
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

    <p>
    <h1 align="center">Consulta de Autores</h1>
  
    
	<center><div id="estudanteTableContainer" style="width: 800px;"></div></center>
	<script type="text/javascript">
	
		$(document).ready(function () {
			var mensagem = "<?php echo date("Y-m-d");
			
			
			
			?>";
			$('#estudanteTableContainer').jtable({
				title: 'Consulta de Autores', // titulo da tabela na visualizacao
				actions: {
					listAction: 'estudanteDAO.php?action=list',
					createAction: 'estudanteDAO.php?action=create',
					updateAction: 'estudanteDAO.php?action=update',
					deleteAction: 'estudanteDAO.php?action=delete'
				},
				fields: {
					aut_cd: {
						key: true,
						create: false,
						edit: false,
						list: true,					
						width: '10%',
						title: 'Codigo'
					},				
					aut_nome: {
						title: 'Nome do Autor',
						width: '60%'
					},
					aut_dt_cadastro: {
						defaultValue : mensagem,
						title: 'Data de Cadastro',
						type: 'date',
                  		displayFormat: 'dd-mm-yy',
						
						width: '30%'
					}
					
				} 
			});

				$('#estudanteTableContainer').jtable('load');

		});

	</script>    
    
    </div>
 </div>
  <div id="rodape">Todos os direitos reservados. Faculdade de Ciência Tecnologia Mater Christi</div>	
</body>
</html>
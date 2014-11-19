<html>
  <head>
    <link href="./css/smoothness/jquery-ui-1.10.3.custom.css" rel="stylesheet" type="text/css" />
	<link href="./themes/lightcolor/blue/jtable.css" rel="stylesheet" type="text/css" />
	
	<script src="./js/jquery-1.9.1.js" type="text/javascript"></script>
    <script src="./js/jquery-ui-1.10.3.custom.js" type="text/javascript"></script>
    <script src="jquery.jtable.js" type="text/javascript"></script>
	
  </head>
  <body>
  <h2>
  <center>
  Cadastro de Autores
  </center>
  </h2>
	<center><div id="estudanteTableContainer" style="width: 1000px;"></div></center>
	<script type="text/javascript">
	
		$(document).ready(function () {
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
						/*key: true,
						create: false,
						edit: false,
						list: true,*/
						edit: false,	
						key: false,					
						width: '10%',
						title: 'Codigo'
					},
					aut_nome: {
						title: 'Nome do Autor',
						width: '60%'
					},
					aut_dt_cadastro: {
						title: 'Data de Cadastro',
						width: '30%'
					}
				}
			});

				$('#estudanteTableContainer').jtable('load');

		});

	</script>

 
  </body>
</html>

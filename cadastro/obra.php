<?php
  session_start();
  include('../conexao.php');
 
/*    $nome_autor   = "";
	$codigo       = ""; 
	$codigo_autor = "";
	$name = "";
 

    //Se for editiar o autor
	if(!empty($_GET['aut_cd'])){
		$codigo = $_GET['aut_cd'];
				
		$sql = "SELECT aut_nome FROM autor WHERE aut_cd = '".$codigo."' ";  
		$resultado = mysql_query($sql) or die ("Erro SQL =  ".mysql_errno());
		while($linha = mysql_fetch_object($resultado)){	
			$name  = $linha->aut_nome;			
		}		
        if (isset($_POST['cadastrar'])){
		    $name = $_POST['aut_nome'];			
			$result = mysql_query(" UPDATE autor SET aut_nome = '$name' WHERE aut_cd = 	'$codigo' ");
			if (!$result){
			    echo "Erro ao atualizar registro: ".mysql_error();
			    exit; 
		    }
		}
	}else{  
	  //Se for cadastrar um novo autor
   		 $nome_autor = "";
		 $name = "";
		 $resultado = mysql_query("SELECT MAX(aut_cd) + 1 AS next_register FROM autor");
		 $row = mysql_fetch_array($resultado);
	     $codigo = $row["next_register"]; 
		 if (empty($codigo))	
   			   $codigo = '0001';

		  if (isset($_POST['cadastrar'])){
			 $resultado = mysql_query("SELECT MAX(aut_cd) + 1 AS next_register FROM autor");
			 $row = mysql_fetch_array($resultado);
			 $codigo = $row["next_register"];
    	
			 $name = $_POST['aut_nome'];
			 $codigo = str_pad($codigo, 4, "0", STR_PAD_LEFT);
			 $timestamp = mktime(date("H")-4, date("i"), date("s"), date("m"), date("d"), date("Y"), 0);
			 $data = gmdate("Y/m/d H:i:s", $timestamp);

			if ($codigo=='0000')	
   			   $codigo = '0001';
			    
				$result = mysql_query(" INSERT INTO autor (aut_cd, aut_nome, aut_dt_cadastro) VALUES ('$codigo','$name','$data' )");
				if (!$result){
					 echo "Erro ao inserir registro: ".mysql_error();
					 exit; 
				}
			}
	}

	if (empty($codigo))	
	   $codigo = '0001';
	*/
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
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
<!-- Boot strap Latest compiled and minified CSS 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
<!-- Optional theme 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
<!-- Latest compiled and minified JavaScript 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
-->

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
      
      $(function (){
        $( "#dialog-form" ).dialog({
          autoOpen: false,
          height: 300,
          width: 650,
          modal: true,
          buttons: {
            "Consultar Autor": function() {
        //      salvar_cidade(); // assim que clicar em Criar, devo chamar a funcao para salvar o nome da cidade
              $( this ).dialog( "close" );
            },
            Cancel: function() {
              $( this ).dialog( "close" );
            }
          },
          close: function() {
            $('#cidade_box').val('');
          }
        });
      });
      
      
      
      function nova_cidade(){
       // if($('#estado').val()==''){
         // alert('Selecione o estado');
        //}else{
          $( "#dialog-form" ).dialog( "open" );
        //}
      }
      
      //function salvar_cidade(){
      /*  var cidade_box = $('#cidade_box').val();
        var estado = $('#estado').val();
        if(cidade_box!='' && estado!=''){
          var url = 'ajax_salvar_cidade.php?estado='+estado+'&cidade_box='+cidade_box;
          $.get(url, function() {
            buscar_cidades();
          });*/
        //}
        
      //}
    </script>
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
      <?php include_once('../menu/nvidia.com.php'); ?>
    </div>
    <p>
    <h1 align="center">Cadastro de Obras</h1>
    <div id="cadastro_centralizado">
    <form id="form1" name="form1" method="post" action="" >
      <table width="100%" border="0" align="center" id="tabela">
        <tr>
          <td width="14%">Código:</td>
          <td width="86%"><label for="aut_cd"></label>
          <input name="aut_cd" type="text" disabled="disabled" id="aut_cd" value="" readonly="readonly" ></input></td>
        </tr>
        <tr>
          <td>Autor:</td>
          <td><label for="obr_titulo">
            <input type="text" name="obr_autor" id="obr_autor" />
            <input type="button" name="consultar" id="consultar" onclick="nova_cidade()" value="Consultar" />
           </label></td>
        </tr>
        <tr>
          <td>Título:</td>
          <td><label for="obr_autor">
            <input name="obr_titulo" type="text" id="obr_titulo" size="60" maxlength="120" />
          </label></td>
        </tr>
        <tr>
          <td>Sub-Titulo:</td>
          <td><label for="obr_subtitulo"></label>
            <input type="text" name="obr_subtitulo" id="obr_subtitulo"  /></td>
			
        </tr>
        <tr>
          <td>Cullter:</td>
          <td><label for="obr_cutter"></label>
            <input type="text" name="obr_cutter" id="obr_cutter" /></td>
        </tr>
        <tr>
          <td>Edição:</td>
          <td><label for="obr_edicao"></label>
            <input type="text" name="obr_edicao" id="obr_edicao" /></td>
        </tr>
        <tr>
          <td>Editora:</td>
          <td><label for="obr_editora"></label>
            <input type="text" name="obr_editora" id="obr_editora" />
            <input type="submit" name="consultar2" id="consultar2" value="Consultar"   src="javascript:nova_cidade()" /></td>
        </tr>
        <tr>
          <td>Cidade:</td>
          <td><input type="text" name="obr_cidade" id="obr_cidade" />
            <input type="submit" name="consultar3" id="consultar3" value="Consultar" /></td>
        </tr>
        <tr>
          <td>Ano:</td>
          <td><input type="text" name="obr_ano" id="obr_ano" /></td>
        </tr>
        <tr>
          <td>Volume:</td>
          <td><input type="text" name="obr_volume" id="obr_volume" /></td>
        </tr>
        <tr>
          <td>Páginas</td>
          <td><input type="text" name="obr_pagina" id="obr_pagina" /></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="cadastrar" id="cadastrar" class="i2Style"  value="Salvar" /></td>
        </tr>
      </table>
    </form>
       
      <div id="load_cidades">
        <span><a href="javascript:nova_cidade()">Nova Cidade</a></span>
      </div>
    </form>

    <div id="dialog-form" title="Consultar Autor">
      <form>
        <fieldset>
          <div>
            <label for="aut_nome">Nome do Autor:</label>
            <input type="text" name="cidade_box" id="cidade_box" value="" class="text ui-widget-content ui-corner-all" />
          </div>
        </fieldset>
      </form>
      
      </div>
   <!-- coloca o codigo php-->
 
     
    </div>
  </div>
<!--  div id="rodape">Todos os direitos reservados. Faculdade de Ciência Tecnologia Mater Christi</div>-->
  </div>
</div>
</body>
</html>
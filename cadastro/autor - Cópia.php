<?php
  session_start();
  include('../conexao.php');
 
    $nome_autor   = "";
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
<script>
$(function() {
$( "#dialog" ).dialog();
$("#dialog").dialog( "option", "width", 680 );
position: ['buttom',200];

});
</script>
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
    <h1 align="center">Cadastro de Autores</h1>
    <div id="dialog" title="Cadastro de Autores">
   <!--  <div id="cadastro_centralizado"> -->
      <form id="form1" name="form1" method="post" action="" >
        <table width="60%" border="0" align="center" id="tabela">
          
            <td colspan="2"><!-- -->
              
              <div id="tabs">
                <table width="80%" border="0" cellspacing="5">
                  <tr>
                    <td>Código:</td>
                    <td><input name="aut_cd" type="text" disabled="disabled" id="aut_cd" value="<?php echo  str_pad($codigo, 4, "0", STR_PAD_LEFT); ?> " readonly="readonly" ></td>
                  </tr>
                  <?php  echo '</br>' ?>
                  <tr>
                    <td>Descrição:</td>
                    <td><input name="aut_nome" type="text" id="aut_nome" value="<?php echo $name?>" size="50" maxlength="60" /></td>
                  </tr>
                </table>
                <?php  echo '</br>' ?>
                <br>
                <ul>
                  <li><a href="#tabs-1">Telefone</a></li>
                  <li><a href="#tabs-2">Dados Pessoais</a></li>
                  <li><a href="#tabs-3">Serviço</a></li>
                </ul>
                <div id="tabs-1">
                  <table width="100%" border="0" cellspacing="5">
                    <tr>
                      <td><label for="textfield">Nome:</label></td>
                      <td><input name="textfield" type="text" id="textfield" size="60" /></td>
                    </tr>
                    <tr>
                      <td>Telefone: </td>
                      <td><input type="text" name="textfield2" id="textfield2" /></td>
                    </tr>
                  </table>
                  </p>
                </div>
                <div id="tabs-2">
                  <table width="100%" border="0" cellspacing="5">
                    <tr>
                      <td><label for="textfield">Cidade:</label></td>
                      <td><input name="textfield3" type="text" id="textfield" size="60" /></td>
                    </tr>
                    <tr>
                      <td>Bairro: </td>
                      <td><input type="text" name="textfield3" id="textfield3" /></td>
                    </tr>
                  </table>
                  <p>&nbsp;</p>
                </div>
                <div id="tabs-3">
                  <table width="100%" border="0" cellspacing="5">
                    <tr>
                      <td><label for="textfield">Código:</label></td>
                      <td><input name="textfield4" type="text" id="textfield" size="60" /></td>
                    </tr>
                    <tr>
                      <td>Serviço: </td>
                      <td><input type="text" name="textfield4" id="textfield4" /></td>
                    </tr>
                  </table>
                  <p>&nbsp;</p>
                </div>
              </div>
              
              <!-- Testee--></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="cadastrar" id="cadastrar" class="i2Style"  value="Salvar" /></td>
          </tr>
        </table>
      </form>
      <?php  
	  if (isset($_POST['cadastrar'])){
    	  if(!empty($_GET['aut_cd']))
	          echo "</br> <h2> Registro atualizado com sucesso!</h2>";
		  else 	 
			  echo "</br> <h2> Registro inserido com sucesso!</h2>"; 
	  }
	 ?>
    </div>
  </div>
  <!--  div id="rodape">Todos os direitos reservados. Faculdade de Ciência Tecnologia Mater Christi</div>--> 
 <!--</div>--> 
</div>
</div>
</body>
</html>
<?php
  session_start();
  include('../conexao.php');
 
    $name = "";
	$codigo = "";
	$editoras_nome = ""; 
	$editoras_rs = "";
	$editoras_endereco = "";
	$editoras_bairro = "";
	$editoras_cidade = "";
	$editoras_uf = "";
	$editoras_cep = "";
	$editoras_contato = "";
	$editoras_fone1 = "";
	$editoras_fone2 = "";
	$editoras_email = "";
	$editoras_dt_cadastro = "";
	$editoras_cd = "";
    //Se for editiar o autor
	if(!empty($_GET['editoras_cd'])){
		$codigo = $_GET['editoras_cd'];
				
		$sql = "SELECT editoras_nome FROM editoras WHERE editoras_cd = '".$codigo."' ";  
		$resultado = mysql_query($sql) or die ("Erro SQL =  ".mysql_errno());
		while($linha = mysql_fetch_object($resultado)){	
			$name  = $linha->editoras_nome;			
		}		
        if (isset($_POST['cadastrar'])){
		    
				$editoras_nome = $_POST['editoras_nome'];	
				$editoras_rs = $_POST['editoras_rs'];
				$editoras_endereco = $_POST['editoras_endereco'];
				$editoras_bairro = $_POST['editoras_bairro'];
				$editoras_cidade = $_POST['editoras_cidade'];
				$editoras_uf = $_POST['editoras_uf'];
				$editoras_cep = $_POST['editoras_cep'];
				$editoras_contato = $_POST['editoras_contato'];
				$editoras_fone1 = $_POST['editoras_fone1'];
				$editoras_fone2 = $_POST['editoras_fone2'];
				$editoras_email = $_POST['editoras_email'];
				
			
				
			$result = mysql_query(" UPDATE editoras SET editoras_name = '$name' WHERE editoras_cd = 	'$codigo' ");
			if (!$result){
			    echo "Erro ao atualizar registro: ".mysql_error();
			    exit; 
		    }
		}
	}else{  
	  //Se for cadastrar um novo autor
   		 $editoras_cd = "";
		 $editoras_nome = "";
		 $resultado = mysql_query("SELECT MAX(editoras_cd) + 1 AS next_register FROM editoras");
		 $row = mysql_fetch_array($resultado);
	     $codigo = $row["next_register"]; 
		 
	
	
	
		 
		 
		 if (empty($codigo))	
   			   $codigo = '001';

		  if (isset($_POST['cadastrar'])){
			 $resultado = mysql_query("SELECT MAX(editoras_cd) + 1 AS next_register FROM editoras");
			 $row = mysql_fetch_array($resultado);
			 $codigo = $row["next_register"];
    	
		
			 $editoras_nome = $_POST['editoras_nome'];		
			 $editoras_rs = $_POST['editoras_rs'];
			 $editoras_endereco = $_POST['editoras_endereco'];
			 $editoras_bairro = $_POST['editoras_bairro'];
			 $editoras_cidade = $_POST['editoras_cidade'];
			 $editoras_uf = $_POST['editoras_uf']; 
			 $editoras_cep = $_POST['editoras_cep'];
			 $editoras_contato = $_POST['editoras_contato'];
			 $editoras_fone1 = $_POST['editoras_fone1'];
			 $editoras_fone2 = $_POST['editoras_fone2'];
			 $editoras_email = $_POST['editoras_email'];
			 
		 
			 
			 
			 
			 $codigo = str_pad($codigo, 3, "0", STR_PAD_LEFT);
			 $timestamp = mktime(date("H")-4, date("i"), date("s"), date("m"), date("d"), date("Y"), 0);
			 $data = gmdate("Y/m/d H:i:s", $timestamp);

			if ($codigo=='000')	
   			   $codigo = '001';
			   
			   echo  $codigo."</br>";
			    
				//echo " INSERT INTO curso (cur_cd, cur_nome, cur_obs, cur_dt_cadastro) VALUES ('$codigo','$name','$obs','$data')";
				
				
				
				$result = mysql_query(" INSERT INTO editoras  ".
				                      " (editoras_cd, ".
									  " editoras_nome, ".
									  " editoras_rs,". 
									  " editoras_endereco,".
									  " editoras_bairro,".
									  " editoras_cidade,".
									  " editoras_uf,".
									  " editoras_cep,".
									  " editoras_contato,".
									  " editoras_fone1,".
									  " editoras_fone2,".
									  " editoras_email,".
									  " editoras_dt_cadastro)".
								      " VALUES ".		
									  " ('$codigo', ".
									  " '$editoras_nome', ".
									  " '$editoras_rs', ".
									  " '$editoras_endereco', ".
									  " '$editoras_bairro', ".
									  " '$editoras_cidade', ".
									  " '$editoras_uf', ".
									  " '$editoras_cep', ".
									  " '$editoras_contato', ".
									  " '$editoras_fone1', ".
									  " '$editoras_fone2', ".
									  " '$editoras_email', ".
									  " '$data')");
									  							   			 
				if (!$result){
					echo "</br>";	echo "</br>";
					 echo "Erro ao inserir registro: ".mysql_error();
					 exit; 
				} 
				
				$editoras_nome = ""; 
	$editoras_rs = "";
	$editoras_endereco = "";
	$editoras_bairro = "";
	$editoras_cidade = "";
	$editoras_uf = "";
	$editoras_cep = "";
	$editoras_contato = "";
	$editoras_fone1 = "";
	$editoras_fone2 = "";
	$editoras_email = "";
				
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
<script type="text/javascript" src="jquery-1.5.2.min.js"></script>
<script type="text/javascript" src="jquery.maskedinput-1.2.2.js"></script>
<script type="text/javascript" src="mascara.js"></script>
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
    <h1 align="center">Cadastro de Editoras </h1>
    <div id="cadastro_centralizado">
      <form id="form1" name="form1" method="post" action="" >
        <table width="60%" border="0" align="center" id="tabela">
          <tr>
            <td width="14%">Código:</td>
            <td width="86%"><label for="aut_cd"></label>
              <input name="editoras_cd" type="text" disabled="disabled" id="editoras_cd" value="<?php echo  str_pad($codigo, 3, "0", STR_PAD_LEFT); ?> " readonly="readonly" >
              </input></td>
          </tr>
          <tr>
            <td>Nome:</td>
            <td><label for="editoras_nome"></label>
              <input name="editoras_nome" type="text" id="editoras_nome" value="<?php echo $name?>" size="60" maxlength="120" /></td>
          </tr>
          <tr>
            <td>Razão Social:</td>
            <td><label for="editoras_rs"></label>
              <input name="editoras_rs" type="text" id="editoras_rs" value="<?php echo $editoras_rs?>" size="60" maxlength="120" /></td>
          </tr>
          <tr>
            <td>Endereço:</td>
            <td><label for="editoras_endereco"></label>
              <input name="editoras_endereco" type="text" id="editoras_endereco" value="<?php echo $editoras_endereco?>" size="60" maxlength="120" /></td>
          </tr>
          <tr>
            <td>Bairro:</td>
            <td><label for="editoras_bairro"></label>
              <input name="editoras_bairro" type="text" id="editoras_bairro" value="<?php echo $editoras_bairro?>" size="60" maxlength="120" /></td>
          </tr>
          <tr>
            <td>Cidade:</td>
            <td><label for="editoras_cidade"></label>
              <input name="editoras_cidade" type="text" id="editoras_cidade" value="<?php echo $editoras_cidade?>" size="60" maxlength="120" /></td>
          </tr>
          <tr>
            <td>UF:</td>
            <td><label for="editoras_uf"></label>
              <input name="editoras_uf" type="text" id="editoras_uf" value="<?php echo $editoras_uf?>" size="60" maxlength="120" /></td>
          </tr>
          <tr>
            <td>Cep:</td>
            <td><label for="editoras_cep"></label>
              <input name="editoras_cep" type="text" id="editoras_cep" value="<?php echo $editoras_cep?>" size="60" maxlength="120" /></td>
          </tr>
          <tr>
            <td>Contato:</td>
            <td><label for="editoras_contato"></label>
              <input name="editoras_contato" type="text" id="editoras_contato" value="<?php echo $editoras_contato?>" size="60" maxlength="120" /></td>
          </tr>
          <tr>
            <td>Fone1:</td>
            <td><label for="editoras_fone1"></label>
              <input name="editoras_fone1" type="text" id="editora_fone1" value="<?php echo $editoras_fone1?>" size="60" maxlength="120" /></td>
          </tr>
          <tr>
            <td>Fone2:</td>
            <td><label for="editoras_fone2"></label>
              <input name="editoras_fone2" type="text" id="editoras_fone2" value="<?php echo $editoras_fone2?>" size="60" maxlength="120" /></td>
          </tr>
          <tr>
            <td>E-Mail:</td>
            <td><label for="editoras_email"></label>
              <input name="editoras_email" type="text" id="editoras_email" value="<?php echo $editoras_email?>" size="60" maxlength="120" /></td>
          </tr>
          <tr>
          <tr>
            <td>&nbsp;</td>
            <td><input type="submit" name="cadastrar" id="cadastrar" class="i2Style"  value="Salvar" /></td>
          </tr>
        </table>
      </form>
      <?php  
	  if (isset($_POST['cadastrar'])){
    	  if(!empty($_GET['editoras_cd']))
	          echo "</br> <h2> Registro atualizado com sucesso!</h2>";
		  else 	 
			  echo "</br> <h2> Registro inserido com sucesso!</h2>"; 
	  }
	 ?>
    </div>
  </div>
  <!--  div id="rodape">Todos os direitos reservados. Faculdade de Ciência Tecnologia Mater Christi</div>--> 
</div>
</div>
</body>
</html>
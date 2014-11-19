<?php
  session_start();
  include('../conexao.php');
 
    $codigo   = "";
	$name       = ""; 
	$cur_obs = "";
	$cur_dt_cadastro = "";


    //Se for editiar o autor
	if(!empty($_GET['cur_cd'])){
		$codigo = $_GET['cur_cd'];
				
		$sql = "SELECT cur_nome,cur_cd FROM curso WHERE cur_cd = '".$codigo."' ";  
		$resultado = mysql_query($sql) or die ("Erro SQL =  ".mysql_errno());
		while($linha = mysql_fetch_object($resultado)){	
			$name  = $linha->cur_nome;			
		}		
        if (isset($_POST['cadastrar'])){
		    
			$name = $_POST['cur_nome'];		
			$obs = $_POST['cur_obs'];	//pega o valor que foi digitado no campo obs e atribui a variavel
			
				
			$result = mysql_query(" UPDATE curso SET cur_nome = '$name',cur_obs = '$obs' WHERE cur_cd = 	'$codigo' ");
			if (!$result){
			    echo "Erro ao atualizar registro: ".mysql_error();
			    exit; 
		    }
		}
	}else{  
	  //Se for cadastrar um novo autor
   		 $cur_cd = "";
		 $name = "";
		 $resultado = mysql_query("SELECT MAX(cur_cd) + 1 AS next_register FROM curso");
		 $row = mysql_fetch_array($resultado);
	     $codigo = $row["next_register"]; 
		 if (empty($codigo))	
   			   $codigo = '001';

		  if (isset($_POST['cadastrar'])){
			 $resultado = mysql_query("SELECT MAX(cur_cd) + 1 AS next_register FROM curso");
			 $row = mysql_fetch_array($resultado);
			 $codigo = $row["next_register"];
    	
		
			 $name = $_POST['cur_nome'];		
			 
			 
			 $obs = $_POST['cur_obs'];	
			 $codigo = str_pad($codigo, 3, "0", STR_PAD_LEFT);
			 $timestamp = mktime(date("H")-4, date("i"), date("s"), date("m"), date("d"), date("Y"), 0);
			 $data = gmdate("Y/m/d H:i:s", $timestamp);

			if ($codigo=='000')	
   			   $codigo = '001';
			   
			   echo  $codigo."</br>";
			    
				//echo " INSERT INTO curso (cur_cd, cur_nome, cur_obs, cur_dt_cadastro) VALUES ('$codigo','$name','$obs','$data')";
				
				
				
				$result = mysql_query(" INSERT INTO curso (cur_cd, cur_nome, cur_obs, cur_dt_cadastro) VALUES ('$codigo','$name','$obs','$data')");
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
    <h1 align="center">Cadastro de Editoras</h1>
    <div id="cadastro_centralizado">
    <form id="form1" name="form1" method="post" action="" >
      <table width="60%" border="0" align="center" id="tabela">
        <tr>
          <td width="14%">Código:</td>
          <td width="86%"><label for="aut_cd"></label>
          <input name="aut_cd" type="text" disabled="disabled" id="aut_cd" value="<?php echo  str_pad($codigo, 3, "0", STR_PAD_LEFT); ?> " readonly="readonly" ></input></td>
        </tr>
        <tr>
          <td>Descrição:</td>
          <td><label for="cur_nome"></label>
          <input name="cur_nome" type="text" id="cur_nome" value="<?php echo $name?>" size="60" maxlength="120" /></td>
        </tr>
        <tr>
          <td>Observação:</td>
          <td><label for="cur_obs"></label>
            <textarea name="cur_obs" id="cur_obs" cols="45" rows="5"></textarea></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="cadastrar" id="cadastrar" class="i2Style"  value="Salvar" /></td>
			
        </tr>
      </table>
    </form>
    <?php  
	  if (isset($_POST['cadastrar'])){
    	  if(!empty($_GET['cur_cd']))
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
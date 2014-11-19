<?php
   include "conexao.php";
  
   if (isset($_POST['enviar'])){   	 
			
	 if (empty($_POST['tf_matricula']))
		 $matricula = $_POST['tf_matricula'] = '';   
	 else		 	 
	  	$matricula = $_POST['tf_matricula'];
				
	 if (empty($_POST['tf_cpf']))
		 $cpf = $_POST['tf_cpf'] = '';   
	 else		 	 
	  	$cpf = $_POST['tf_cpf'];	
						
	 if (empty($_POST['tf_senha']))
		 $senha = $_POST['tf_senha'] = '';   
	 else		 	 
	  	$senha = $_POST['tf_senha'];	
				
     $sql = " SELECT usu_matricula, usu_senha, usu_nome FROM usuario WHERE usu_matricula = '$matricula' and usu_senha = '$senha' ";
   	 $resultado = mysql_query($sql) or die ("Erro .:" . mysql_error());  
	 if(mysql_num_rows($resultado) > 0){

    	 $_SESSION['tf_senha']     = $senha;
		 $_SESSION['tf_matricula'] = $matricula;
		 
		 echo("<script language = 'javascript'> location.href = 'index.php'; </script>"); 		
		 exit;
      } else{
		  echo("<script language = 'javascript'> alert('Mátriculla ou senha inválida!'); </script>");  
	  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" type="text/css" href="estilo/estilo.css">
<title>Login - Bibliote Mater Christi</title>
</head>
<body>
<div id="container">
<div id="topo_login"> </div>
<div id="caixa_login">
  <div id="caixa_login_interno">
    <div id="caixa_login_label">P&aacute;gina de Login</div>
    <form action="" method="post">
      <div class="input-div" id="input-usuario">
        <input type="text"  placeholder="Matrícula ou CPF" name="tf_matricula" />
      </div>
      <div class="input-div" id="input-senha">
        <input type="password"  placeholder="Senha" name="tf_senha"/>
      </div>
      <div class="input-divs" id="input-logar">
        <input type="submit" value="Entrar" name="enviar"/>
      </div>
    </form>
  </div>
</div>
</div>
</body>
</html>
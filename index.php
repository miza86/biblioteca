<?php
  session_start();
  include('conexao.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="estilo/estilo.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Tomas Bagdanavicius, http://www.lwis.net/free-css-drop-down-menu/" />
<meta name="keywords" content=" css, dropdowns, dropdown menu, drop-down, menu, navigation, nav, horizontal, vertical left-to-right, vertical right-to-left, horizontal linear, horizontal upwards, cross browser, internet explorer, ie, firefox, safari, opera, browser, lwis" />
<meta name="description" content="Clean, standards-friendly, modular framework for dropdown menus" />
<link href="menu/css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="menu/css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="menu/css/dropdown/themes/nvidia.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
<title>Bem Vindo ao Sistema</title>
</head>
<body>
	<div id="geral">
         <div id="corpo">   
             <div id="topo"> 
 				<div id="logo_mater">  </div>      
             <a href="index.php"> 
               <div id="logo"> </div>
             </a>
         </div>      
           <div id="menu_biblioteca">          
			      <?php include_once('menu/nvidia.com.php'); ?> 
          </div>
          
               <p><h1>Página principal do sistema</h1></div>
               

	</div>
</body>
</html>
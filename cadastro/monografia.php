<?php
    session_start();
    include('conexao.php');
  
  
    
  	 
    $name = "";
    $resultado = mysql_query("SELECT MAX(mon_cod) + 1 AS next_register FROM monografia");
    $row = mysql_fetch_array($resultado);
    $codigo = $row["next_register"]; 
    
    if (empty($codigo))	
        $codigo = '0001';

    if (isset($_POST['cadastrar'])) {
        $resultado = mysql_query("SELECT MAX(mon_cod) + 1 AS next_register FROM monografia");
        $row = mysql_fetch_array($resultado);
        $codigo = $row["next_register"];
    	
        $name = $_POST['mon_aut'];
        $codigo = str_pad($codigo, 4, "0", STR_PAD_LEFT);
        $categoria = $_POST['mon_categ'];
        $instituicao = $_POST['mon_instit'];
        $titulo = $_POST['mon_tit'];
        $subtitulo = $_POST['mon_sub'];
        $orientador = $_POST['mon_orien'];
        $cidade = $_POST['mon_cid'];
        $cutter = $_POST['mon_cutter'];
        $ano = $_POST['mon_ano'];
        $paginas = $_POST['mon_pag'];
        $cdrom = $_POST['mon_cdrom'];
        $informacoes = $_POST['mon_info'];
        $observacoes = $_POST['mon_obs'];
        $timestamp = mktime(date("H")-4, date("i"), date("s"), date("m"), date("d"), date("Y"), 0);
        $data = gmdate("Y/m/d H:i:s", $timestamp);

        if ($codigo=='0000')
            $codigo = '0001';
			    
        $result = mysql_query(" INSERT INTO monografia (mon_cod, mon_aut, mon_data, mon_categ, mon_instit, "
                . "mon_tit, mon_sub, mon_orien, mon_cid, mon_cutter, mon_ano, mon_pag, mon_cdrom, mon_info, mon_obs) "
                . "VALUES ('$codigo','$name','$data','$categoria','$instituicao','$titulo','$subtitulo',"
                . "'$orientador','$cidade','$cutter','$ano','$paginas','$cdrom','$informacoes','$observacoes')");
				
        if (!$result){
            echo "Erro ao inserir registro: ".mysql_error();
            exit; 
        }
    }
    if (empty($codigo))	
        $codigo = '0001'; 
   
  
    
  
?>  
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="estilo/estilo.css" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="Tomas Bagdanavicius, http://www.lwis.net/free-css-drop-down-menu/" />
<meta name="keywords" content=" css, dropdowns, dropdown menu, drop-down, menu, navigation, nav, horizontal, vertical left-to-right, vertical right-to-left, horizontal linear, horizontal upwards, cross browser, internet explorer, ie, firefox, safari, opera, browser, lwis" />
<meta name="description" content="Clean, standards-friendly, modular framework for dropdown menus" />
<link href="menu/css/helper.css" media="screen" rel="stylesheet" type="text/css" />
<link href="menu/css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
<link href="menu/css/dropdown/themes/nvidia.com/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />

<title>Cadastro de Monografias</title>
<head>
    <body>
        <div id="geral">
            <div id="corpo">
                <div id="topo">
                    <div id="logo_mater"></div>
                    <a href="index.php">
                        <div id="logo"></div>
                    </a>
                </div>
                <div id="menu_biblioteca">
                    <?php include_once('menu/nvidia.com.php'); ?>
                </div>
                <p><h1 align="center">Cadastro de Monografias</h1>
                <div id="cadastro_centralizado">
                    
                    
                    
                    
                    
                    <form id="form1" name="form1" method="post" action="" >
                        <table width="60%" border="0" align="center" id="tabela">
                            <tr>
                                <td width="14%">Código:</td>
                                <td width="86%"><label for="aut_cd"></label>
                                    <input name="mon_cod" type="text" disabled="disabled" id="mon_cod" value="<?php echo  str_pad($codigo, 4, "0", STR_PAD_LEFT); ?> " readonly="readonly" ></input>
                                </td>
                            </tr>
                            <tr>
                                <td>Autor:</td>
                                <td><label for="mon_aut"></label>
                                    <input name="mon_aut" type="text" id="mon_aut" value="<?php echo $name?>" size="60" maxlength="120" />
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Categoria:</td>
                                <td width="80%"><label for="mon_categ"></label>
                                    <select size="1" style="width: 200px;" name="mon_categ" type="text" id="mon_categ" maxlength="120"">
                                        <option selected value="selecione">Selecione</option>
                                        <option value="tecnologia">Tecnologia</option>
                                        <option value="direito">Direito</option>
                                    </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Institução:</td>
                                <td><label for="mon_instit"></label>
                                    <input name="mon_instit" type="text" id="mon_instit" value="" size="60" maxlength="120" />
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Título:</td>
                                <td><label for="mon_tit"></label>
                                    <input name="mon_tit" type="text" id="mon_tit" value="" size="80" maxlength="120" />
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Sub_titulo:</td>
                                <td><label for="mon_sub"></label>
                                    <input name="mon_sub" type="text" id="mon_sub" value="" size="80" maxlength="120" />
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Orientador:</td>
                                <td><label for="mon_orien"></label>
                                    <input name="mon_orien" type="text" id="mon_orien" value="" size="60" maxlength="120" />
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Cidade:</td>
                                <td><label for="mon_cid"></label>
                                    <input name="mon_cid" type="text" id="mon_cid" value="" size="30" maxlength="120" />
                                </td>
                            </tr>
                            <tr>
                                <td>Cutter:</td>
                                <td><label for="mon_cutter"></label>
                                    <input name="mon_cutter" type="text" id="mon_cutter" value="" size="50" maxlength="120" />
                                </td>
                            </tr>
                            <tr>
                                <td>Ano:</td>
                                <td><label for="mon_ano"></label>
                                    <input name="mon_ano" type="text" id="mon_ano" value="" size="10" maxlength="120" />
                                </td>
                            </tr>
                            <tr>
                                <td>Páginas:</td>
                                <td><label for="mon_pag"></label>
                                    <input name="mon_pag" type="text" id="mon_pag" value="" size="10" maxlength="120" />
                                </td>
                            </tr>
                            <tr>
                                <td>CD-Rom:</td>
                                <td><label for="mon_cdrom"></label>
                                    <input name="mon_cdrom" type="text" id="mon_cdrom" value="" size="20" maxlength="120" />
                                </td>
                            </tr>
                            
                            <tr>
                                <td>Informações Complementares:</td>
                                <td><label for="mon_info"></label>
                                    <textarea cols="50"rows="6" name="mon_info" type="text" id="mon_info" value=""></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Observações:</td>
                                <td><label for="mon_obs"></label>
                                    <textarea cols="50"rows="6" name="mon_obs" type="text" id="mon_obs" value=""></textarea>
                                </td>
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
                    
                    <?php  
                        if (isset($_POST['cadastrar'])){
                            if(!empty($_GET['mon_cod']))
                                echo "</br> <h2> Registro atualizado com sucesso!</h2>";
                        else 	 
                            echo "</br> <h2> Registro inserido com sucesso!</h2>"; 
                        }
                    ?>
                </div>

            </div>
        </div>
    </body>
</head>

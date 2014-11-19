<?php
include'./conection.php';
include '../conexao.php';

try
{
	$database = 'bd_biblioteca';
	
	if($_GET["action"] == "list")
	{
		//Get records from database
		//$result = conecta("select aut_cd, aut_nome, aut_dt_cadastro from autor", $database);
		$result = conecta("select  *  from autor order by aut_nome asc LIMIT 29", $database);
		
		//Add all records to an array
		$rows = array();
		while($row = mysql_fetch_array($result))
		{
		    $rows[] = $row;
		}

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Records'] = $rows;
		print json_encode($jTableResult);
	}
	
	else if($_GET["action"] == "create"){   	
	     $_POST["aut_dt_cadastro"] = date('Y-m-d', strtotime( $_POST["aut_dt_cadastro"]));
	
		$query="INSERT INTO autor(aut_nome, aut_dt_cadastro) VALUES(  '" . $_POST["aut_nome"] . "', '" . $_POST["aut_dt_cadastro"] . "')"; //query para inserir um estudante
		$result = conecta($query, $database);
		
		$result = conecta("SELECT * FROM autor WHERE aut_cd = LAST_INSERT_ID();", $database); //query para retornar uma lista de estudantes incluindo o ultimo inserido
		$row = mysql_fetch_array($result);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		$jTableResult['Record'] = $row;
		print json_encode($jTableResult);
	}
		else if($_GET["action"] == "update")
	{
		$query="UPDATE autor SET aut_nome = '" . $_POST["aut_nome"]. "' WHERE aut_cd = '" . $_POST["aut_cd"] . "'";
		$result = conecta($query, $database);

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}
		else if($_GET["action"] == "delete")
	{

				$result = conecta("DELETE FROM autor WHERE aut_cd = " . $_POST["aut_cd"] ,$database);
				

		//Return result to jTable
		$jTableResult = array();
		$jTableResult['Result'] = "OK";
		print json_encode($jTableResult);
	}

	

}
catch(Exception $ex)
{
    //Return error message
	$jTableResult = array();
	$jTableResult['Result'] = "ERROR";
	$jTableResult['Message'] = $ex->getMessage();
	echo "". $query;
	print json_encode($jTableResult);
}
?>

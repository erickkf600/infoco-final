<?php
  function conexao(){
  	$host = "localhost";
  	$banco = "infoco";
  	$utf8 = "utf8";
	$user = "root";
	$pwd = "";
	try {
	  $con = new PDO("mysql:host=".$host.";dbname=".$banco.";charset=".$utf8."", $user, $pwd);
	  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  return $con;	
	} catch (PDOException $e) {
		return 'ERRO:<br> ' . $e->getMessage();	
	}
  }
?>



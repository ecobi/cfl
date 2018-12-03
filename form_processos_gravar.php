<?php
include "../include/config.php";
session_start();
include "../include/functions.php";
session_checker();
?>
<?php
ini_set( 'default_charset', 'UTF-8' );
ini_set( 'mbstring.http_output', 'UTF-8' );
ini_set( 'mbstring.internal_encoding', 'UTF-8' )
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>CADASTRO</title>
		<script src="../js/sweetalert.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../css/sweetalert.css">
	</head>
</html>

<?php

//$cpf = $_POST['cpf'];
//$cpf = preg_replace("/\D+/", "", $_POST['cpf']);
//$nome = trim($_POST['nome']);
//$sobrenome = trim($_POST['sobrenome']);
//$email = trim($_POST['email']);
//$telefone = trim($_POST['telefone']);
//$telefone = preg_replace("@[()-]@", "", $_POST['telefone']);
//$cep = trim($_POST['cep']);
//$cep = preg_replace("@[-]@", "", $_POST['cep']);
//$rua = trim($_POST['rua']);
//$numero = trim($_POST['numero']);
//$complemento= trim($_POST['complemento']);
//$bairro= trim($_POST['bairro']);
//$cidade = trim($_POST['cidade']);
//$uf = trim($_POST['uf']);
//$info = trim($_POST['info']);
$nomev = trim($_SESSION['nome']);
echo $nomev;
$unidade= $_POST['unidade'];
echo $unidade;
$processo= trim(preg_replace("@[.-]@", "",$_POST['processo']));
//$processo= $_POST['processo'];
echo $processo;
$vara= $_POST['vara'];
echo $vara;echo "-";
$comarca= $_POST['comarca'];
$idcidade= $_POST['id_cidade'];
echo $comarca;
echo "-";
echo $idcidade;echo "-";
$cliente= $_POST['cliente'];
$cliente_id = $_POST['id_cliente'];
echo $cliente_id;
echo $cliente;
$reclamada= $_POST['reclamada'];
echo $reclamada;
$pasta= $_POST['pasta'];
echo $pasta;
$dataabertura= $_POST['now()'];
echo $dataabertura;
$status=$_POST['status'];
echo $status;
$obs= $_POST['obs'];
echo $obs;


				$sql = mysql_query("INSERT INTO processo (nr_processo, ds_unidade, nr_vara, ds_comarca, id_cliente, id_reclamada, nr_pasta, dt_cadastro, tp_status, ds_obs, ds_usuariocadastro) 
									VALUES('{$processo}', '{$unidade}', '{$vara}', '{$comarca}', '{$cliente}', '{$reclamada}', '{$pasta}', 'now()', '{$status}', '{$obs}', '{$nomev}')") 
									or die( mysql_error() );
            
			
   
?>
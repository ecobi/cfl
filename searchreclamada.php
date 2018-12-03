<?php

$dbHost = 'localhost';
$dbUsername = 'ecobi396_user';
$dbPassword = 'ecobi2016';
$dbName = 'ecobi396_cfl';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_POST['reclamada'];
//get matched data from skills table
$query = $db->query("SELECT * FROM usuarios WHERE nome LIKE '%".$searchTerm."%' ORDER BY nome ASC LIMIT 10");
while ($row = $query->fetch_assoc()) {
    
	$data[] = (array($row['nome'],$row['usuario_id']));
}
//return json data
echo json_encode($data);
?>
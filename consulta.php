<?php

$dbHost = 'localhost';
$dbUsername = 'ecobi396_user';
$dbPassword = 'ecobi2016';
$dbName = 'ecobi396_cfl';
//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);
//get search term
$searchTerm = $_POST['query'];
//get matched data from skills table
$query = $db->query("SELECT * FROM cidade WHERE ds_cidade LIKE '".$searchTerm."%' ORDER BY ds_cidade ASC LIMIT 10");
while ($row = $query->fetch_assoc()) {

//$data[] = (array($row['ds_cidade'],$row['id_cidade']));


    /* $data[] = $row['ds_cidade']; 
	$data[] = $row['id_cidade'];
	*/
	$data['id_cidade'] = $row['id_cidade'];
	$data['ds_cidade'] = $row['ds_cidade'];
	 
	
}
//return json data
echo json_encode($data);
?>
 
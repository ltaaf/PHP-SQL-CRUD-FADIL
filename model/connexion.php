<?php 
$password = "";
$user = "root";
$name_bd = "crud";

try {
	$bd = new PDO (
		'mysql:host=localhost;
		dbname='.$name_bd,
		$user,
		$password,
		array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
	);
} catch (Exception $e) {
	echo "Problème de connexion: ".$e->getMessage();
}
?>


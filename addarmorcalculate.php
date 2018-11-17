<?php
	$armorName = $_POST['armorName'];
	$armorType = $_POST['armorType'];
	$armorStatistic = $_POST['armorStatistic'];
	$armorValue = $_POST['armorValue'];
	$description = $_POST['description'];
		
	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1:49614;dbname=localdb;charset=utf8', 'azure', '6#vWHD_$');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
	
	$request = $bdd->prepare('INSERT INTO bankarmor(ArmorType, ArmorName, ArmorStats, ArmorValue, ArmorDescription) VALUES (:armorType, :armorName, :armorStatistic, :armorValue, :description)');
	$request->execute(array(
	'armorType' => $armorType,
	'armorName' => $armorName,
	'armorStatistic' => $armorStatistic,
	'armorValue' => $armorValue,
	'description'=> $description));
	
	header('Location: https://1801534php.azurewebsites.net/projectphp/additem.php');
	exit();
?>
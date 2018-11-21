<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: register.php");
    exit;
}

	$itemName = $_POST['itemName'];
	$description = $_POST['description'];
		
	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1:49614;dbname=localdb;charset=utf8', 'azure', '6#vWHD_$');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
	
	$request = $bdd->prepare('INSERT INTO bankitem(Item, ItemDescription) VALUES (:itemName, :description)');
	$request->execute(array(
	'itemName' => $itemName,
	'description'=> $description));
	
	header('Location: https://1801534php.azurewebsites.net/projectphp/additem.php');
	exit();
?>
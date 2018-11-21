<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: register.php");
    exit;
}

	$strength = $_POST['strength'];
	$dexterity = $_POST['dexterity'];
	$speed = $_POST['speed'];
	$constitution = $_POST['constitution'];
	$intelligence = $_POST['intelligence'];
	$charisma = $_POST['charisma'];
	
	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1:49614;dbname=localdb;charset=utf8', 'azure', '6#vWHD_$');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
	
	$request = $bdd->prepare('INSERT INTO statistics(Strength, Dexterity, Speed, Constitution, Intelligence, Charisma) VALUES (:strength, :dexterity, :speed, :constitution, :intelligence, :charisma)');
	$request->execute(array(
	'strength' => $strength,
	'dexterity' => $dexterity,
	'speed' => $speed,
	'constitution' => $constitution,
	'intelligence' => $intelligence,
	'charisma' => $charisma
	));
?>
<html>
<head>
    <head>
		&nbsp<title>Dungeons and Dragons Tool</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
</head>
<body>	
	<h2 class="ml-5">Dungeons and Dragons Toolkit <small class="text-muted" >Add Character</small></h2>
	<br>
	<div class='ml-3 mr-3'>
	<form action="weaponcalculate.php" method="post">
		<div class="col-sm-6">
			<label for="weaponName">Enter your weapons's name :</label>
			<input type="text" name ="weaponName" class="form-control" id="weaponNameID" placeholder="Name" required>
		</div>
		<br>	
		
		<div class="row ml-2 mr-2">
			<div class="col-sm-3">
				<label for="statisticValue">Enter your weapon's statistics :</label>
				<input type="number" name ="statisticValue" min="-100" max="100" class="form-control" id="statisticValueID" placeholder="Boost" required>
			</div>
			<div class="col-sm-3">
				<label for="weaponStatistic">Choose the armor's type :</label>
				<select class="form-control" type="text" name="weaponStatistic">
					<option value="Strength">Strength</option>
					<option value="Dexterity">Dexterity</option>
					<option value="Speed">Speed</option>
					<option value="Constitution">Constitution</option>
					<option value="Intelligence">Intelligence</option>
					<option value="Charisma">Charisma</option>
				</select>
			</div>
		</div>
		<br>
		
		<div class="col-sm-6">
			<label for="description">Enter your weapons's description (recommanded) :</label>
			<input type="text" name ="description" class="form-control" id="descriptionID" placeholder="Description">
		</div>
		<br>			
		<br>
		
		<input type="submit" value="Done" class="btn btn-outline-success ml-5">
  		<br>
		</div>
	</form>
</body>
</html>
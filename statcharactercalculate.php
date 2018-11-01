<?php
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
    <title>Dungeons and Dragons Tool</title>
</head>
<body>	
	<form action="weaponcalculate.php" method="post">
		Enter your weapons's name :<br>
		<input type="text" name="weaponName">
 		<br>
 		<br>		
  
		Enter your weapons's statistics :<br>
		<input type="number" name="statisticValue">
		<select type="text" name="weaponStatistic">
			<option value="strength">Strength</option>
			<option value="dexterity">Dexterity</option>
			<option value="speed">Speed</option>
			<option value="constitution">Constitution</option>
			<option value="intelligence">Intelligence</option>
			<option value="charisma">Charisma</option>
		</select>
		<br>
		<br>
					
		Enter a weapon's description :<br>
		<input type="text" name="description">
 		<br>
 		<br>
		
		<input type="submit" value="Done">
  		<br>
	</form>
</body>
</html>
<?php 
	$name = $_POST['name'];
	$race = $_POST['race'];
	$class1 = $_POST['class1'];
	$class2 = $_POST['class2'];
	$personalitytrait = $_POST['personalitytrait'];
	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1:49614;dbname=localdb;charset=utf8', 'azure', '6#vWHD_$');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
	
	$request = $bdd->prepare('INSERT INTO charactersheet(Name, Race, Class1, Class2, Personality) VALUES (:name, :race, :class1, :class2, :personalitytrait)');
	$request->execute(array(
	'name' => $name,
	'race' => $race,
	'class1' => $class1,
	'class2' => $class2,
	'personalitytrait' => $personalitytrait
	));
	
?>
<html>
<head>
    <title>Dungeons and Dragons Tool</title>
</head>
<body>	
	<form action="statcharactercalculate.php" method="post">
	Enter your character's strength :<br>
		<input type="number" name="strength">
 		<br>
 		<br>
  
  		Enter your character's dexterity :<br>
		<input type="number" name="dexterity">
 		<br>
 		<br>
		
		Enter your character's speed :<br>
		<input type="number" name="speed">
 		<br>
 		<br>
		
		Enter your character's constitution :<br>
		<input type="number" name="constitution">
 		<br>
 		<br>
		
		Enter your character's intelligence :<br>
		<input type="number" name="intelligence">
 		<br>
 		<br>
		
		Enter your character's charisma :<br>
		<input type="number" name="charisma">
 		<br>
 		<br>
		
		<input type="submit" value="Done">
  		<br>
	</form>
</body>
</html>
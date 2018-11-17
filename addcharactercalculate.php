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
    <head>
		&nbsp<title>Dungeons and Dragons Tool</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
</head>
<body>	
	<h2 class="ml-5">Dungeons and Dragons Toolkit <small class="text-muted" >Add Character</small></h2>
	<br>
	<div class='ml-3 mr-3'>
	<form action="statcharactercalculate.php" method="post">	
		<div class="col-sm-6">
			<label for="strength">Enter your character's strength :</label>
			<input type="number" name ="strength" class="form-control" id="strengthID" placeholder="Strength" required>
		</div>
		<br>
		<div class="col-sm-6">
			<label for="dexterity">Enter your character's dexterity :</label>
			<input type="number" name ="dexterity" class="form-control" id="dexterityID" placeholder="Dexterity" required>
		</div>
		<br>
		<div class="col-sm-6">
			<label for="speed">Enter your character's speed :</label>
			<input type="number" name ="speed" class="form-control" id="speedID" placeholder="Speed" required>
		</div>
		<br>
		<div class="col-sm-6">
			<label for="constitution">Enter your character's constitution :</label>
			<input type="number" name ="constitution" class="form-control" id="constitutionID" placeholder="Constitution" required>
		</div>
		<br>
		<div class="col-sm-6">
			<label for="intelligence">Enter your character's intelligence :</label>
			<input type="number" name ="intelligence" class="form-control" id="intelligenceID" placeholder="Intelligence" required>
		</div>
		<br>
		<div class="col-sm-6">
			<label for="charisma">Enter your character's charisma :</label>
			<input type="number" name ="charisma" class="form-control" id="charismaID" placeholder="Charisma" required>
		</div>
		<br>
		<br>
		
		<input type="submit" value="Done" class="btn btn-outline-success ml-5">
  		<br>
	</form>
	</div>
</body>
</html>
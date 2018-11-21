<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: register.php");
    exit;
}
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
	<form action="addcharactercalculate.php" method="post" class='mb-0'>
		<div class="col-sm-6">
			<label for="name">Enter your character's name :</label>
			<input type="text" name ="name" class="form-control" id="characterNameID" placeholder="Name" required>
		</div>
		<br>
		<div class="col-sm-6">
			<label for="race">Enter your character's race :</label>
			<input type="text" name ="race" class="form-control" id="characterRaceID" placeholder="Race" required>
		</div>
		<br>
		<div class="col-sm-6">
			<label for="class1">Enter your character's first class :</label>
			<input type="text" name ="class1" class="form-control" id="characterClass1ID" placeholder="First class" required>
		</div>
		<br>
		<div class="col-sm-6">
			<label for="class2">Enter your character's second class (optional) :</label>
			<input type="text" name ="class2" class="form-control" id="characterClass2ID" placeholder="Second class">
		</div>
		<br>
		<div class="col-sm-6">
			<label for="personalitytrait">Enter your character's main personality trait :</label>
			<input type="text" name ="personalitytrait" class="form-control" id="characterPersonalityID" placeholder="Personality" required>
		</div>
		<br>
  		
		<input type="submit" value="Done" class="btn btn-outline-success ml-5">
  		<br>
	</form>
	<br><br>
	<a href="menu.php" ><input type="submit" value="Back to the main menu" class="btn btn-outline-secondary ml-5"></a>
	<br><br>
	</div>
	
</body>
</html>
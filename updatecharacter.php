<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: register.php");
    exit;
}

	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1:49614;dbname=localdb;charset=utf8', 'azure', '6#vWHD_$');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
	
	$name = $_POST["name"];
	$id = $_POST["id"];
?>

<html>
<head>
    <head>
		&nbsp<title>Dungeons and Dragons Tool</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
</head>
<body>
	<h2 class="ml-5">Dungeons and Dragons Toolkit <small class="text-muted" >Upgrade Character</small></h2>
	<br>
	<form action="updatecharactercalculate.php" method="POST">
	<div class="row ml-5 mr-5">
		<div class="col-sm-4">
			<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
				Level Up
			</button>
			<div class="collapse" id="collapse1">
			<br>
			<div class="card card-body">
				<div class="mb-3">
					<label for="strength">Enter the strength boost :</label>
					<input type="number" name ="strength" min="0" max="10" class="form-control" id="strengthID" placeholder="Strength" value="0">
				</div>
				<div class="mb-3">
					<label for="dexterity">Enter the dexterity boost :</label>
					<input type="number" name ="dexterity" min="0" max="10" class="form-control" id="dexterityID" placeholder="Dexterity" value="0">
				</div>
				<div class="mb-3">
					<label for="speed">Enter the speed boost :</label>
					<input type="number" name ="speed" min="0" max="10" class="form-control" id="speedID" placeholder="Speed" value="0">
				</div>
				<div class="mb-3">
					<label for="constitution">Enter the constitution boost:</label>
					<input type="number" name ="constitution" min="0" max="10" class="form-control" id="constitutionID" placeholder="Constitution" value="0">
				</div>
				<div class="mb-3">
					<label for="intelligence">Enter the intelligence boost :</label>
					<input type="number" name ="intelligence" min="0" max="10" class="form-control" id="intelligenceID" placeholder="Intelligence" value="0">
				</div>
				<div class="mb-3">
					<label for="charisma">Enter the charisma boost :</label>
					<input type="number" name ="charisma" min="0" max="10" class="form-control" id="charismaID" placeholder="Charisma" value="0">
				</div>
			</div>
			</div>
		</div>
		
		<div class="col-sm-4">
			<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
				Status
			</button>
			<div class="collapse" id="collapse2">
			<br>
			<div class="card card-body">
				<div class="mb-3">
					<label for="status1">Enter your first status change :</label>
					<input type="text" name ="status1" class="form-control" id="status1ID" placeholder="Status" value="">
				</div>
				<div class="mb-3">
					<label for="status2">Enter your second status change :</label>
					<input type="text" name ="status2" class="form-control" id="status1ID" placeholder="Status" value="">
				</div>
				<div class="mb-3">
					<label for="status3">Enter your third status change :</label>
					<input type="text" name ="status3" class="form-control" id="status1ID" placeholder="Status" value="">
				</div>
			</div>
		</div>
		</div>
		
		<div class="col-sm-4">
			<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
				Money
			</button>
			<div class="collapse" id="collapse3">
			<br>
			<div class="card card-body">
				<div class="mb-3">
					<label for="money">Enter the change in your purse :</label>
					<input type="number" name ="money" min="-10000" max="10000" class="form-control" id="moneyID" placeholder="Money" value="">
				</div>
			</div>
		</div>
		</div>
		
	</div>	
	<br><br>
	
	<div class="row ml-5 mr-5">
	<div class="col-sm-4">
			<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
				Equiped Weapon
			</button>
			<div class="collapse" id="collapse4">
			<br>
			<div class="card card-body">
				<div class="mb-3">
					<label for="weaponName">Enter the weapon's name :</label>
					<input type="text" name ="weaponName" class="form-control" id="weaponNameID" placeholder="Name" value="">
				</div>
				<div class="mb-3">
					<label for="weaponStatistic">Choose the boosted statistics :</label>
					<select class="form-control" type="text" name="weaponStatistic">
						<option value="emptyWeaponStat">-</option>
						<option value="Strength">Strength</option>
						<option value="Dexterity">Dexterity</option>
						<option value="Speed">Speed</option>
						<option value="Intelligence">Intelligence</option>
						<option value="Constitution">Constitution</option>
						<option value="Charisma">Charisma</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="weaponStatisticValue">Enter the boost's value :</label>
					<input type="number" name ="weaponStatisticValue" min="0" class="form-control" id="statisticValueID" placeholder="Boost" value="">
				</div>
				<div class="mb-3">
					<label for="weaponDescription">Enter the weapon's description (recommanded) :</label>
					<input type="text" name ="weaponDescription" class="form-control" id="descriptionID" placeholder="Description" value="">
				</div>
			</div>
			</div>
	</div>
	
	<div class="col-sm-4">
			<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
				Equiped Armor
			</button>
			<div class="collapse" id="collapse5">
			<br>
			<div class="card card-body">
				<div class="mb-3">
					<label for="armorName">Enter the armor's name :</label>
					<input type="text" name ="armorName" class="form-control" id="armorNameID" placeholder="Name" value="">
				</div>
				<div class="mb-3">
					<label for="armorType">Choose the armor's type :</label>
					<select class="form-control" type="text" name="armorType">
						<option value="emptyArmorType">-</option>
						<option value="Head">Head</option>
						<option value="Chest">Chest</option>
						<option value="Gloves">Gloves</option>
						<option value="Legs">Legs</option>
						<option value="Boots">Boots</option>
						<option value="Necklace">Necklace</option>
						<option value="Earing">Earing</option>
						<option value="First ring">First ring</option>
						<option value="Second ring">Second ring</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="armorStatistic">Choose the boosted statistics :</label>
					<select class="form-control" type="text" name="armorStatistic">
						<option value="emptyArmorStat">-</option>
						<option value="Strength">Strength</option>
						<option value="Dexterity">Dexterity</option>
						<option value="Speed">Speed</option>
						<option value="Intelligence">Intelligence</option>
						<option value="Constitution">Constitution</option>
						<option value="Charisma">Charisma</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="armorValue">Enter the boost's value :</label>
					<input type="number" name ="armorValue" min="0" class="form-control" id="armorValueID" placeholder="Boost" value="">
				</div>
				<div class="mb-3">
					<label for="armorDescription">Enter the armor's description (optional) :</label>
					<input type="text" name ="armorDescription" class="form-control" id="descriptionID" placeholder="Description" value="">
				</div>
			</div>
		</div>
		</div>
		
		<div class="col-sm-4">
			<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse6" aria-expanded="false" aria-controls="collapse6">
				New Item
			</button>
			<div class="collapse" id="collapse6">
			<br>
			<div class="card card-body">
				<div class="mb-3">
					<label for="armorName">Enter the item's name :</label>
					<input type="text" name ="itemName" class="form-control" id="armorNameID" placeholder="Item">
				</div>
				<div class="mb-3">
					<label for="description">Enter the item's description :</label>
					<input type="text" name ="itemDescription" class="form-control" id="itemDescriptionID" placeholder="Description">
				</div>
			</div>
		</div>
		</div>
	
	</div>
	
	
	<br><br>
	<input type="hidden" value="<?php echo $name;?>" name="name"/>
	<input type="hidden" value="<?php echo $id;?>" name="id"/>
	<input type="submit" value="Update <?php echo $name;?>" class="btn btn-outline-success ml-5">
	</form>
	
	
	
	
	<br>
	<a href="seeteam.php" ><input type="submit" value="Back to the See Team menu" class="btn btn-outline-secondary ml-5"></a>
	<br><br>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
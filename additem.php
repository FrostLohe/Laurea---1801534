<html>
<head>
    <head>
		&nbsp<title>Dungeons and Dragons Tool</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
</head>
<body>
	<h2 class="ml-5">Dungeons and Dragons Toolkit <small class="text-muted" >Add Item</small></h2>
	<br>
	<div class="row ml-5 mr-5">
		<div class="col-sm-4">
			<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
				Weapon
			</button>
			<div class="collapse" id="collapse1">
			<br>
			<div class="card card-body">
				<form action="addweaponcalculate.php" method="post" class='mb-0'>
					<div class="mb-3">
						<label for="weaponName">Enter the weapon's name :</label>
						<input type="text" name ="weaponName" class="form-control" id="weaponNameID" placeholder="Name" required>
					</div>
					<div class="mb-3">
						<label for="weaponStatistic">Choose the boosted statistics :</label>
						<select class="form-control" type="text" name="weaponStatistic">
							<option value="Strength">Strength</option>
							<option value="Dexterity">Dexterity</option>
							<option value="Speed">Speed</option>
							<option value="Intelligence">Intelligence</option>
							<option value="Constitution">Constitution</option>
							<option value="Charisma">Charisma</option>
						</select>
					</div>
					<div class="mb-3">
						<label for="statisticValue">Enter the boost's value :</label>
						<input type="number" name ="statisticValue" min="0" class="form-control" id="statisticValueID" placeholder="Boost" required>
					</div>
					<div class="mb-3">
						<label for="description">Enter the weapon's description :</label>
						<input type="text" name ="description" class="form-control" id="descriptionID" placeholder="Description" required>
					</div>
					
					<input type="submit" value="Add Weapon" class="btn btn-success ml-5">
				</form>
			</div>
			</div>
		</div>
		
		<div class="col-sm-4">
			<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
				Armor
			</button>
			<div class="collapse" id="collapse2">
			<br>
			<div class="card card-body">
				<form action="addarmorcalculate.php" method="post" class='mb-0'>
					<div class="mb-3">
						<label for="armorName">Enter the armor's name :</label>
						<input type="text" name ="armorName" class="form-control" id="armorNameID" placeholder="Name" required>
					</div>
					<div class="mb-3">
						<label for="armorType">Choose the armor's type :</label>
						<select class="form-control" type="text" name="armorType">
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
						<input type="number" name ="armorValue" min="0" class="form-control" id="armorValueID" placeholder="Boost" required>
					</div>
					<div class="mb-3">
						<label for="description">Enter the armor's description :</label>
						<input type="text" name ="description" class="form-control" id="descriptionID" placeholder="Description" required>
					</div>
					
					<input type="submit" value="Add Armor" class="btn btn-success ml-5">
				</form>
			</div>
		</div>
		</div>
		
		<div class="col-sm-4">
			<button class="btn btn-info" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
				Item
			</button>
			<div class="collapse" id="collapse3">
			<br>
			<div class="card card-body">
				<form action="additemcalculate.php" method="post" class='mb-0'>
					<div class="mb-3">
						<label for="itemName">Enter the item's name :</label>
						<input type="text" name ="itemName" class="form-control" id="itemNameID" placeholder="Name" required>
					</div>
					<div class="mb-3">
						<label for="description">Enter the item's description :</label>
						<input type="text" name ="description" class="form-control" id="descriptionID" placeholder="Description" required>
					</div>					
					<input type="submit" value="Add Item" class="btn btn-success ml-5">
				</form>
			</div>
		</div>
		</div>
		
		
		
	</div>
	
	<br><br>
	<a href="menu.php" ><input type="submit" value="Back to the main menu" class="btn btn-outline-secondary ml-5"></a>
	<br><br>


	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
<html>
    <head>
		&nbsp<title>Dungeons and Dragons Tool</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> 
	</head>
	<body>
	<h2 class="ml-5">Dungeons and Dragons Toolkit <small class="text-muted" >See Team</small></h2><br>
	<?php
	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1:49614;dbname=localdb;charset=utf8', 'azure', '6#vWHD_$');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}

	$reponse = $bdd->query('SELECT ID, Name FROM charactersheet');
	while ($donnees = $reponse->fetch())
	{
		$temporaryID = $donnees['ID'];
		$temporaryName = $donnees['Name'];
		$reponse2 = $bdd->query("SELECT * FROM charactersheet WHERE ID = $temporaryID");
		$reponse3 = $bdd->query("SELECT * FROM statistics WHERE ID = $temporaryID");
		$reponse6 = $bdd->query("SELECT * FROM status WHERE ID = $temporaryID");
		$reponse7 = $bdd->query("SELECT * FROM weapon WHERE ID = $temporaryID");
		$donnees2 = $reponse2->fetch();
		$donnees3 = $reponse3->fetch();
		$donnees6 = $reponse6->fetch();
		$donnees7 = $reponse7->fetch();
		?>
		<div class="row ml-2 mr-2">
		<div class="col-sm-3">
		<h4 class="sub-header">Character <span class="badge badge-secondary"><?php echo $donnees2['Name']; ?></span></h4>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th scope="row" class="text-center">Name</th>
						<td class="text-center"><?php echo $donnees2['Name']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="text-center">Race</th>
						<td class="text-center"><?php echo $donnees2['Race']; ?></td>
					</tr>
					<tr>
						<th scope="row"class="text-center">First Class</th>
						<td class="text-center"><?php echo $donnees2['Class1']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="text-center">Second Class</th>
						<td class="text-center"><?php echo $donnees2['Class2']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="text-center">Personality</th>
						<td class="text-center"><?php echo $donnees2['Personality']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="text-center">Level</th>
						<td class="text-center"><?php echo $donnees2['Level']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-sm-3">
		<h4 class="sub-header">Statistics <span class="badge badge-secondary"><?php echo $donnees2['Name']; ?></h4>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th scope="row"  class="text-center">Strength</th>
						<td  class="text-center"><?php echo $donnees3['Strength']; ?></td>
					</tr>
					<tr>
						<th scope="row"  class="text-center">Dexterity</th>
						<td  class="text-center"><?php echo $donnees3['Dexterity']; ?></td>
					</tr>
					<tr>
						<th scope="row"  class="text-center">Speed</th>
						<td class="text-center"><?php echo $donnees3['Speed']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="text-center">Constitution</th>
						<td class="text-center"><?php echo $donnees3['Constitution']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="text-center">Intelligence</th>
						<td class="text-center"><?php echo $donnees3['Intelligence']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="text-center">Charisma</th>
						<td class="text-center"><?php echo $donnees3['Charisma']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="col-sm-3">
		<h4 class="sub-header">Status <span class="badge badge-secondary"><?php echo $donnees2['Name']; ?></h4>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th scope="row" class="text-center">Status (1)</th>
						<td class="text-center"><?php echo $donnees6['Status1']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="text-center">Status (2)</th>
						<td class="text-center"><?php echo $donnees6['Status2']; ?></td>
					</tr>
					<tr>
						<th scope="row"class="text-center">Status (3)</th>
						<td class="text-center"><?php echo $donnees6['Status3']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		
		<div class="col-sm-3">
		<h4 class="sub-header">Weapon <span class="badge badge-secondary"><?php echo $donnees2['Name']; ?></h4>
			<table class="table table-bordered">
				<tbody>
					<tr>
						<th scope="row" class="text-center">Name</th>
						<td class="text-center"><?php echo $donnees7['WeaponName']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="text-center">Boosted Statistics</th>
						<td class="text-center"><?php echo $donnees7['WeaponStatistic']; ?></td>
					</tr>
					<tr>
						<th scope="row"class="text-center">Bonus Value</th>
						<td class="text-center"><?php echo $donnees7['StatisticValue']; ?></td>
					</tr>
					<tr>
						<th scope="row" class="text-center">Description</th>
						<td class="text-center"><?php echo $donnees7['Description']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		</div><?php		
		$reponse2->closeCursor();
		$reponse3->closeCursor();
		$reponse6->closeCursor();
		$reponse7->closeCursor();
		
		$reponse4 = $bdd->query("SELECT * FROM armor WHERE ID = $temporaryID");
		$donnees4 = $reponse4->fetch();?>
		<div class="ml-3 mr-2">
		<h4 class="sub-header">Armor <span class="badge badge-secondary"><?php echo $donnees2['Name']; ?></h4>
			<table class="table table-bordered ml-2">
				<tbody>
					<tr>
						<th scope="col" class="text-center">Head</th>
						<th scope="col" class="text-center">Chest</th>
						<th scope="col" class="text-center">Gloves</th>
						<th scope="col" class="text-center">Legs</th>
						<th scope="col" class="text-center">Boots</th>
						<th scope="col" class="text-center">Necklace</th>
						<th scope="col" class="text-center">Earing</th>
						<th scope="col" class="text-center">First Ring</th>
						<th scope="col" class="text-center">Second Ring</th>
					</tr>
					<tr>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees4['HeadStat']." : +".$donnees4['HeadValue']." / Description : ".$donnees4['HeadDescription']; ?>"><?php echo $donnees4['Head']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees4['ChestStat']." : +".$donnees4['ChestValue']." / Description : ".$donnees4['ChestDescription']; ?>"><?php echo $donnees4['Chest']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees4['GlovesStat']." : +".$donnees4['GlovesValue']." / Description : ".$donnees4['GlovesDescription']; ?>"><?php echo $donnees4['Gloves']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees4['LegsStat']." : +".$donnees4['LegsValue']." / Description : ".$donnees4['LegsDescription']; ?>"><?php echo $donnees4['Legs']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees4['BootsStat']." : +".$donnees4['BootsValue']." / Description : ".$donnees4['BootsDescription']; ?>"><?php echo $donnees4['Boots']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees4['NecklaceStat']." : +".$donnees4['NecklaceValue']." / Description : ".$donnees4['NecklaceDescription']; ?>"><?php echo $donnees4['Necklace']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees4['EaringStat']." : +".$donnees4['Earingalue']." / Description : ".$donnees4['EaringDescription']; ?>"><?php echo $donnees4['Earing']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees4['Ring1Stat']." : +".$donnees4['Ring1Value']." / Description : ".$donnees4['Ring1Description']; ?>"><?php echo $donnees4['Ring1']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees4['Ring2Stat']." : +".$donnees4['Ring2Value']." / Description : ".$donnees4['Ring2Description']; ?>"><?php echo $donnees4['Ring2']; ?></a>
						</div></td>
					</tr>
				</tbody>
			</table>
			</div>
		<?php
		$reponse4->closeCursor();
		
		$reponse5 = $bdd->query("SELECT * FROM inventory WHERE ID = $temporaryID");
		$donnees5 = $reponse5->fetch();?>
		<div class="ml-3 mr-2">
		<h4 class="sub-header">Inventory <span class="badge badge-secondary"><?php echo $donnees2['Name']; ?></h4>
			<table class="table table-bordered ml-2">
				<tbody>
					<tr>
						<th scope="col" class="text-center">Money</th>
						<th scope="col" class="text-center">Item 1</th>
						<th scope="col" class="text-center">Item 2</th>
						<th scope="col" class="text-center">Item 3</th>
						<th scope="col" class="text-center">Item 4</th>
						<th scope="col" class="text-center">Item 5</th>
						<th scope="col" class="text-center">Item 6</th>
						<th scope="col" class="text-center">Item 7</th>
						<th scope="col" class="text-center">Item 8</th>
						<th scope="col" class="text-center">Item 9</th>
						<th scope="col" class="text-center">Item 10</th>
					</tr>
					<tr>
						<td  class="text-center"><?php echo $donnees5['Money']; ?></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees5['Item1Description'];?>"><?php echo $donnees5['Item1']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees5['Item2Description'];?>"><?php echo $donnees5['Item2']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees5['Item3Description'];?>"><?php echo $donnees5['Item3']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees5['Item4Description'];?>"><?php echo $donnees5['Item4']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees5['Item5Description'];?>"><?php echo $donnees5['Item5']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees5['Item6Description'];?>"><?php echo $donnees5['Item6']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees5['Item7Description'];?>"><?php echo $donnees5['Item7']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees5['Item8Description'];?>"><?php echo $donnees5['Item8']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees5['Item9Description'];?>"><?php echo $donnees5['Item9']; ?></a>
						</div></td>
						<td class="text-center"><div class="container">
						<a href="#" class="text-info" data-toggle="tooltip" data-placement="top" title="<?php echo $donnees5['Item10Description'];?>"><?php echo $donnees5['Item10']; ?></a>
						</div></td>
					</tr>
				</tbody>
			</table>
			</div>
		<?php
		$reponse5->closeCursor();

		
		?>
		<a href="updatecharacter.php" ><input type="submit" value="Upgrade <?php echo $temporaryName?>" class="btn btn-outline-warning ml-5"></a>
		<br><br><br>
		<?php
	}
	$reponse->closeCursor();
?>
	<a href="menu.php" ><input type="submit" value="Back to the main menu" class="btn btn-outline-secondary ml-5"></a>
	<br><br>	
	
	<script>
		$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
		});
	</script>
	</body>
</html>



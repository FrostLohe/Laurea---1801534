<html>
    <head>
		&nbsp<title>Dungeons and Dragons Tool</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
		
		</style>
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

	$reponse = $bdd->query('SELECT ID FROM charactersheet');
	while ($donnees = $reponse->fetch())
	{		
		$temporaryID = $donnees['ID'];
		$reponse2 = $bdd->query("SELECT * FROM charactersheet WHERE ID = $temporaryID");
		$reponse3 = $bdd->query("SELECT * FROM statistics WHERE ID = $temporaryID");
		$donnees2 = $reponse2->fetch();
		$donnees3 = $reponse3->fetch();
		?>
		<div class="row">
		<div class="col-sm-3">
		<h4 class="sub-header">Character</h4>
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
				</tbody>
			</table>
		</div>
		<div class="col-sm-3">
		<h4 class="sub-header">Statistics</h4>
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
		</div><?php		
		$reponse2->closeCursor();
		$reponse3->closeCursor();		
		?><br><br><?php
	}
	$reponse->closeCursor();
?>
	<br><br>
	<a href="updatecharacter.php" ><input type="submit" value="Update Character" class="btn btn-outline-warning ml-5"></a>
	<br><br><br>
	<a href="menu.php" ><input type="submit" value="Back to the main menu" class="btn btn-outline-secondary ml-5"></a>
	</body>
</html>
<html>
	<head>
		&nbsp<title>Dungeons and Dragons Tool</title>
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
	</head>
	
	<body>
		<h2 class='ml-5'>Dungeons and Dragons Toolkit <small class='text-muted' >Remove Character</small></h2>
		Select the character you want to remove :<br><br>
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
			$storagearrayID = array();
			$storagearrayName = array();
	
			while ($donnees = $reponse->fetch())
			{
				/*echo "<form action=' method='post'>";
				echo "<input type='checkbox' name='<?php echo $donnees['Name']; ?>' id='<?php echo $donnees['ID']; ?>'/>"
				echo "<label for='<?php echo $donnees['ID']; ?>'><?php echo $donnees['Name']; ?></label>"
				echo "</form>"
				echo "<br>"*/
				
				$storagearrayID[] = $donnees['ID'];
				$storagearrayName[] = $donnees['Name'];
			}
			
			echo "<form action='' method='post'>";
			foreach ($storagearrayName as $value){
				echo "<input type='checkbox' name=$value>";
				echo "$value <br>";
			}
			
			if(isset($_POST['verification']))
			{
				foreach ($storagearrayID as $value){
					//var_dump($_POST);
					if (isset($_POST[$value]))
					{
						echo $value;
					//$bdd->exec('DELETE FROM charactersheet WHERE Name=ezrty');
					//$bdd->exec('DELETE FROM armor WHERE ');
					//$bdd->exec('DELETE FROM charactersheet WHERE Name = $value');
					/*$bdd->exec('DELETE FROM inventory');
					$bdd->exec('DELETE FROM statistics');
					$bdd->exec('DELETE FROM status');
					$bdd->exec('DELETE FROM weapon');*/
					}
				}

				//header('Location: https://1801534php.azurewebsites.net/projectphp/menu.php');
				//exit();
			}
			else
			{
				?><br><br><?php
				echo 'You must check the checkbox below to confirm your choice.';
				?><br><br><?php
			}
			$reponse->closeCursor();
		echo "<input type='checkbox' name='verification' id='agree'/>";
		echo "<label for='agree'>Are you sure ?</label>";
		echo "<br><br>";
		echo "<input type='submit' value='Done' class='btn btn-outline-warning ml-5'>";
		echo "</form>";
		echo "<br><br>";
		echo "<a href='menu.php' ><input type='submit' value='Back to the main menu' class='btn btn-outline-secondary ml-5'></a>";
		?>
	</body>
</html>
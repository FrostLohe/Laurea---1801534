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
		&nbsp<title>Dungeons and Dragons Tool</title>
		<link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
	</head>
	
	<body>
		<h2 class='ml-5'>Dungeons and Dragons Toolkit <small class='text-muted' >Remove Character</small></h2>
		<br>
		<div class='ml-3'>
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
			$checkIfSomethingIsErased = false;
	
			while ($donnees = $reponse->fetch())
			{
				$storagearrayID[] = $donnees['ID'];
				$storagearrayName[] = $donnees['Name'];
			}
			$reponse->closeCursor();
			
			echo "<form action='' method='post' class='mb-0'>";
			echo "<p>Select the character you want to remove</p>";
			if(sizeof($storagearrayName) > 0)
			{
				foreach ($storagearrayName as $value)
				{
					echo "<div class='form-check ml-4'>";
						echo "<input type='checkbox' class='form-check-input' id='Check' name=$value>";
						echo "<label class='form-check-label' for='Check'>$value</label>";
					echo "</div>";
				}
			}
			else
			{
				echo "<br>";
				echo "<p style='color:#FF0000' class='ml-3'>No character to erase</p>";
			}
			
			echo "<br>";
			
			if(isset($_POST['verification']))
			{
				$token = 0;
				foreach ($storagearrayID as $value2)
				{
					$temporaryName = $storagearrayName[$token];
					++$token;
					if (isset($_POST[$temporaryName]))
					{
						$commande1 = $bdd->prepare('DELETE FROM armor WHERE ID =:id');
						$commande1->execute(array('id'=>$value2));
						$commande2 = $bdd->prepare('DELETE FROM charactersheet WHERE ID =:id');
						$commande2->execute(array('id'=>$value2));
						$commande3 = $bdd->prepare('DELETE FROM inventory WHERE ID =:id');
						$commande3->execute(array('id'=>$value2));
						$commande4 = $bdd->prepare('DELETE FROM statistics WHERE ID =:id');
						$commande4->execute(array('id'=>$value2));
						$commande5 = $bdd->prepare('DELETE FROM status WHERE ID =:id');
						$commande5->execute(array('id'=>$value2));
						$commande6 = $bdd->prepare('DELETE FROM weapon WHERE ID =:id');
						$commande6->execute(array('id'=>$value2));
						$checkIfSomethingIsErased = true;
					}
				}
				if($checkIfSomethingIsErased = true)
				{
					$checkIfSomethingIsErased = false;
					header("Refresh:0");
				}
			}
			else
			{
				echo 'You must check the checkbox below to confirm your choice.';
				?><br><br><?php
			}
			
			
		echo "<div class='form-check ml-4'>";
			echo "<input type='checkbox' name='verification' class='form-check-input' id='verification'>";
			echo "<label class='form-check-label' for='verification'>Are you sure ?</label>";
		echo "</div>";
		echo "<br><br>";
		echo "<input type='submit' value='Done' class='btn btn-outline-warning ml-5'>";
		echo "</form>";
		echo "<br><br>";
		echo "<a href='menu.php' ><input type='submit' value='Back to the main menu' class='btn btn-outline-secondary ml-5'></a>";
		?>
		</div>
	</body>
</html>
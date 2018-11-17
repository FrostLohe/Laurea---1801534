<?php
	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1:49614;dbname=localdb;charset=utf8', 'azure', '6#vWHD_$');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
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
	<h2 class="ml-5">Dungeons and Dragons Toolkit <small class="text-muted" >Reset</small></h2>
	<div class="ml-3">
	<?php
	if(isset($_POST['verification']))
	{
		$bdd->exec('DELETE FROM armor');
		$bdd->exec('DELETE FROM charactersheet');
		$bdd->exec('DELETE FROM inventory');
		$bdd->exec('DELETE FROM statistics');
		$bdd->exec('DELETE FROM status');
		$bdd->exec('DELETE FROM weapon');
		$bdd->exec('ALTER TABLE armor AUTO_INCREMENT = 1;');
		$bdd->exec('ALTER TABLE charactersheet AUTO_INCREMENT = 1;');
		$bdd->exec('ALTER TABLE inventory AUTO_INCREMENT = 1;');
		$bdd->exec('ALTER TABLE statistics AUTO_INCREMENT = 1;');
		$bdd->exec('ALTER TABLE status AUTO_INCREMENT = 1;');
		$bdd->exec('ALTER TABLE weapon AUTO_INCREMENT = 1;');

		header('Location: https://1801534php.azurewebsites.net/projectphp/menu.php');
		exit();
	}
	else
	{
		echo "<br><p>You must check the checkbox below to confirm your choice.</p>";
		?><br><?php
	}
	?>
	<form action="" method="post" class='mb-0'>
		<div class='form-check ml-4'>
			<input type='checkbox' name='verification' class='form-check-input' id='verification'>
			<label class='form-check-label' for='verification'>Are you sure ?</label>
		</div>
		<br><br>
		<input type="submit" value="Done" class="btn btn-outline-danger ml-5">
	</form>
	
	<br><br>
	<a href="menu.php" ><input type="submit" value="Back to the main menu" class="btn btn-outline-secondary ml-5"></a>
	</div>
</body>
</html>
<html>

	<head>
		<head>
		&nbsp<title>Dungeons and Dragons Tool</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	</head>

	<body>
		<h2 class="ml-5">Dungeons and Dragons Toolkit <small class="text-muted" >Dice Thrower</small></h2>
		
		<form action="" method="post">
			Enter the maximum value for your dice throw :<br>
			<input type="number" name="diceValue" value="<?php echo isset($_POST['diceValue']) ? $_POST['diceValue'] : '' ?>">
			<br><br>

			Enter how many dices you want to throw :<br>
			<input type="number" name="amountOfDices" value="<?php echo isset($_POST['amountOfDices']) ? $_POST['amountOfDices'] : '' ?>">
			<br><br>
			
			<input type="submit" value="Throw the dice" class="btn btn-outline-success ml-5">
		</form>

		
		<?php 
		$diceValue = $_POST['diceValue'];
		$amountOfDices = $_POST['amountOfDices'];
		for ($i = 0; $i < $amountOfDices; $i++ )
		{
			echo rand(1, $diceValue);
			?><br><?php
		}
		?>
		
		<br>
		<a href="menu.php" ><input type="submit" value="Back to the main menu" class="btn btn-outline-secondary ml-5"></a>

	</body>

</html>
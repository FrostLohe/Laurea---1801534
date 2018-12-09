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
		<style>
            dice
            {
                color: teal;
            }
        </style>
	</head>
	</head>

	<body>
		<h2 class="ml-5">Dungeons and Dragons Toolkit <small class="text-muted" >Dice Thrower</small></h2>
		<br>
		<form action="" method="post" class='ml-3 mr-2'>
			<div class="form-row">
				<div class="col-md-3 mb-3">
					<label for="diceValue">Enter the highest value for your dice throw :</label>
					<input type="number" name ="diceValue" min="1" value="<?php echo isset($_POST['diceValue']) ? $_POST['diceValue'] : '' ?>" class="form-control" id="chooseNumber" placeholder="Highest value" required>
				</div>
				<div class="col-md-3 mb-3">
					<label for="amountOfDices">Enter the amount of dices you want to throw</label>
					<input type="number" name="amountOfDices" min="1" max="100" value="<?php echo isset($_POST['amountOfDices']) ? $_POST['amountOfDices'] : '' ?>" class="form-control" id="amountOfDices" placeholder="Amount of Dices" required>
				</div>
			</div>
			<br>
			<input type="submit" value="Throw the dice" class="btn btn-outline-success ml-5">
		</form>

		
		<?php 
		$diceValue = $_POST['diceValue'];
		$amountOfDices = $_POST['amountOfDices'];
		?><br><?php
		//Basic random generator
		for ($i = 0; $i < $amountOfDices; $i++ )
		{
			?><dice class="ml-5"><?php echo rand(1, $diceValue); ?></dice>
			<br><br>
			<?php
		}
		?>
		
		<br>
		<a href="menu.php" ><input type="submit" value="Back to the main menu" class="btn btn-outline-secondary ml-5"></a>
		<br><br>

	</body>

</html>
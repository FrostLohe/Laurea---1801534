<!DOCTYPE html>
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
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
		<style>
            body
            {
                background-position:right bottom;
				background: white url(detd.png) no-repeat 80% 75%;
            }
        </style>
	</head>

	<body>
		<h2 class="ml-5">Dungeons and Dragons Toolkit <small class="text-muted" >Main Menu</small></h2>


		<div>
			<br><br>
			&nbsp;
			<a href="seeteam.php" ><input type="submit" value="See Team" class="btn btn-outline-info ml-5"></a>
			&nbsp;
			<a href="shop.php" ><input type="submit" value="Shop" class="btn btn-outline-info"></a>
			<br><br>
			&nbsp;
			<a href="addcharacter.php" ><input type="submit" value="Add Character" class="btn btn-outline-success ml-5"></a>
			&nbsp;
			<a href="additem.php" ><input type="submit" value="Add Item" class="btn btn-outline-success"></a>
			<br><br>
			&nbsp;
			<a href="removecharacter.php" ><input type="submit" value="Remove Character" class="btn btn-outline-warning ml-5"></a>
			&nbsp;
			<a href="manageshop.php" ><input type="submit" value="Manage Shop" class="btn btn-outline-warning"></a>
			<br><br>
			&nbsp;
			<a href="dicethrower.php" ><input type="submit" value="Dice Thrower" class="btn btn-outline-secondary ml-5"></a>
			<br><br><br><br>
			&nbsp;
			<a href="reset.php" ><input type="submit" value="Reset" class="btn btn-outline-danger ml-5"></a>
			<br><br>
			&nbsp;
			<a href="logout.php" ><input type="submit" value="Log Out" class="btn btn-outline-dark ml-5"></a>
		</div>
		
		
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	</body>

</html>

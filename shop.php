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
	<h2 class="ml-5">Dungeons and Dragons Toolkit <small class="text-muted" >Shop</small></h2>
	
	<br>
	<a href="menu.php" ><input type="submit" value="Back to the main menu" class="btn btn-outline-secondary ml-5"></a>
	<br><br>
</body>
</html>
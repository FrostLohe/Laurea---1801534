<?php
	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1:49614;dbname=localdb;charset=utf8', 'azure', '6#vWHD_$');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}

	$reponse = $bdd->query('SELECT * FROM charactersheet');
	while ($donnees = $reponse->fetch())
	{
		echo "Here is the character sheet of ".$donnees['Name']." :";
		echo '<br><br>';
		echo $donnees['Name']." ".$donnees['Race']." ".$donnees['Class1']." ".$donnees['Class2']." ".$donnees['Personality'];
		echo '<br><br>';
	}
	$reponse->closeCursor();
?>
<html>
<head>
    <title>Dungeons and Dragons Tool</title>
</head>
<body>
<br><br>
&nbsp;<a href="updatecharacter.php" ><input type="submit" value="Update Character"></a>
<br><br>
&nbsp;<a href="menu.php" ><input type="submit" value="Back to the main menu"></a>
</body>
</html>

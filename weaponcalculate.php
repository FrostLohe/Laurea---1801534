<?php
	$weaponName = $_POST['weaponName'];
	$weaponStatistic = $_POST['weaponStatistic'];
	$statisticValue = $_POST['statisticValue'];
	$description = $_POST['description'];
	$initializationText = '';
	$initializationNumber = 0;
		
	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1:49614;dbname=localdb;charset=utf8', 'azure', '6#vWHD_$');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
	
	$request = $bdd->prepare('INSERT INTO weapon(WeaponName, WeaponStatistic, StatisticValue, Description) VALUES (:weaponName, :weaponStatistic, :statisticValue, :description)');
	$request->execute(array(
	'weaponName' => $weaponName,
	'weaponStatistic' => $weaponStatistic,
	'statisticValue' => $statisticValue,
	'description'=> $description));
	
	$bdd->exec('INSERT INTO `armor`(`Head`, `HeadStat`, `HeadValue`, `HeadDescription`, `Chest`, `ChestStat`, `ChestValue`, `ChestDescription`, `Gloves`, `GlovesStat`, `GlovesValue`, `GlovesDescription`, `Legs`, `LegsStat`, `LegsValue`, `LegsDescription`, `Boots`, `BootsStat`, `BootsValue`, `BootsDescription`, `Necklace`, `NecklaceStat`, `NecklaceValue`, `NecklaceDescription`, `Earing`, `EaringStat`, `EaringValue`, `EaringDescription`, `Ring1`, `Ring1Stat`, `Ring1Value`, `Ring1Description`, `Ring2`, `Ring2Stat`, `Ring2Value`, `Ring2Description`) VALUES (\' \',\' \',0,\' \',\' \',\' \',0,\' \',\' \',\' \',0,\' \',\' \',\' \',0,\' \',\' \',\' \',0,\' \',\' \',\' \',0,\' \',\' \',\' \',0,\' \',\' \',\' \',0,\' \',\' \',\' \',0,\' \')');
	$bdd->exec('INSERT INTO inventory(Money, Item1, Item1Description, Item2, Item2Description, Item3, Item3Description, Item4, Item4Description, Item5, Item5Description, Item6, Item6Description, Item7, Item7Description, Item8, Item8Description, Item9, Item9Description, Item10, Item10Description) VALUES (0,\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\',\'\')');
	$bdd->exec('INSERT INTO status(Status1, Status2, Status3) VALUES (\'\',\'\',\'\')');
	
	header('Location: https://1801534php.azurewebsites.net/projectphp/menu.php');
	exit();

?>
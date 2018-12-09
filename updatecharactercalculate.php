<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: register.php");
    exit;
}

	try
	{
		$bdd = new PDO('mysql:host=127.0.0.1:49614;dbname=localdb;charset=utf8', 'azure', '6#vWHD_$');
	}
	catch(Exception $e)
	{
        die('Erreur : '.$e->getMessage());
	}
	
	$name = $_POST["name"];
	$id = $_POST["id"];
	$strength = $_POST["strength"];
	$dexterity = $_POST["dexterity"];
	$speed = $_POST["speed"];
	$constitution = $_POST["constitution"];
	$intelligence = $_POST["intelligence"];
	$charisma = $_POST["charisma"];
	$status1 = $_POST["status1"];
	$status2 = $_POST["status2"];
	$status3 = $_POST["status3"];
	$money = $_POST["money"];
	$weaponName = $_POST["weaponName"];
	$weaponStatistic = $_POST["weaponStatistic"];
	$weaponStatisticValue = $_POST["weaponStatisticValue"];
	$weaponDescription = $_POST["weaponDescription"];
	$armorName = $_POST["armorName"];
	$armorType = $_POST["armorType"];
	$armorStatistic = $_POST["armorStatistic"];
	$armorValue = $_POST["armorValue"];
	$armorDescription = $_POST["armorDescription"];
	$itemName = $_POST["itemName"];
	$itemDescription = $_POST["itemDescription"];
	
	//All those if statement are here to check if something as been modified in a way that is truly relevent
	if($strength != 0 || $dexterity != 0 || $speed != 0 || $constitution != 0 || $intelligence != 0 || $charisma != 0)
	{
		$reponse1 = $bdd->query("SELECT * FROM statistics WHERE ID = $id");
		$donnees1 = $reponse1->fetch();
	
		$strength += $donnees1['Strength'];
		$dexterity += $donnees1['Dexterity'];
		$speed += $donnees1['Speed'];
		$constitution += $donnees1['Constitution'];
		$intelligence += $donnees1['Intelligence'];
		$charisma += $donnees1['Charisma'];
	
		$reponse1->closeCursor();
	
		$request1 = $bdd->prepare('UPDATE statistics SET Strength = :strength, Dexterity = :dexterity, Speed = :speed, Constitution = :constitution, Intelligence = :intelligence, Charisma = :charisma WHERE statistics.ID = :id;');
		$request1->execute(array(
		'strength' => $strength,
		'dexterity' => $dexterity,
		'speed' => $speed,
		'constitution' => $constitution,
		'intelligence'=> $intelligence,
		'charisma' => $charisma,
		'id' => $id));
	}
	
	if($status1 != "" || $status2 != "" || $status3 != "")
	{
		$request2 = $bdd->prepare('UPDATE status SET Status1 = :status1, Status2 = :status2, Status3 = :status3 WHERE status.ID = :id;');
		$request2->execute(array(
		'status1' => $status1,
		'status2' => $status2,
		'status3' => $status3,
		'id' => $id));
	}
	
	if($money != 0)
	{
		$reponse2 = $bdd->query("SELECT Money FROM inventory WHERE ID = $id");
		$donnees2 = $reponse2->fetch();
		
		$money += $donnees2['Money'];
		
		$reponse2->closeCursor();
		
		$request3 = $bdd->prepare('UPDATE inventory SET Money = :money WHERE inventory.ID = :id;');
		$request3->execute(array(
		'money' => $money,
		'id' => $id));
	}
	
	if($weaponName != "" && $weaponStatistic != "emptyWeaponStat")
	{
		$request4 = $bdd->prepare('UPDATE weapon SET WeaponName = :weaponName, WeaponStatistic = :weaponStatistic, StatisticValue = :weaponStatisticValue, Description = :weaponDescription WHERE weapon.ID = :id;');
		$request4->execute(array(
		'weaponName' => $weaponName,
		'weaponStatistic' => $weaponStatistic,
		'weaponStatisticValue' => $weaponStatisticValue,
		'weaponDescription' => $weaponDescription,
		'id' => $id));
	}
	
	if($armorName != "" && $armorType != "emptyArmorType" && $armorStatistic != "emptyArmorStat")
	{
		if($armorType == 'Head')
		{
			$request5 = $bdd->prepare('UPDATE armor SET Head = :armorName, HeadStat = :armorStatistic, HeadValue = :armorValue, HeadDescription = :armorDescription WHERE armor.ID = :id;');
			$request5->execute(array(
			'armorName' => $armorName,
			'armorStatistic' => $armorStatistic,
			'armorValue' => $armorValue,
			'armorDescription' => $armorDescription,
			'id' => $id));
		}
		if($armorType == 'Chest')
		{
			$request5 = $bdd->prepare('UPDATE armor SET Chest = :armorName, ChestStat = :armorStatistic, ChestValue = :armorValue, ChestDescription = :armorDescription WHERE armor.ID = :id;');
			$request5->execute(array(
			'armorName' => $armorName,
			'armorStatistic' => $armorStatistic,
			'armorValue' => $armorValue,
			'armorDescription' => $armorDescription,
			'id' => $id));
		}
		if($armorType == 'Gloves')
		{
			$request5 = $bdd->prepare('UPDATE armor SET Gloves = :armorName, GlovesStat = :armorStatistic, GlovesValue = :armorValue, GlovesDescription = :armorDescription WHERE armor.ID = :id;');
			$request5->execute(array(
			'armorName' => $armorName,
			'armorStatistic' => $armorStatistic,
			'armorValue' => $armorValue,
			'armorDescription' => $armorDescription,
			'id' => $id));
		}
		if($armorType == 'Legs')
		{
			$request5 = $bdd->prepare('UPDATE armor SET Legs = :armorName, LegsStat = :armorStatistic, LegsValue = :armorValue, LegsDescription = :armorDescription WHERE armor.ID = :id;');
			$request5->execute(array(
			'armorName' => $armorName,
			'armorStatistic' => $armorStatistic,
			'armorValue' => $armorValue,
			'armorDescription' => $armorDescription,
			'id' => $id));
		}
		if($armorType == 'Boots')
		{
			$request5 = $bdd->prepare('UPDATE armor SET Boots = :armorName, BootsStat = :armorStatistic, BootsValue = :armorValue, BootsDescription = :armorDescription WHERE armor.ID = :id;');
			$request5->execute(array(
			'armorName' => $armorName,
			'armorStatistic' => $armorStatistic,
			'armorValue' => $armorValue,
			'armorDescription' => $armorDescription,
			'id' => $id));
		}
		if($armorType == 'Necklace')
		{
			$request5 = $bdd->prepare('UPDATE armor SET Necklace = :armorName, NecklaceStat = :armorStatistic, NecklaceValue = :armorValue, NecklaceDescription = :armorDescription WHERE armor.ID = :id;');
			$request5->execute(array(
			'armorName' => $armorName,
			'armorStatistic' => $armorStatistic,
			'armorValue' => $armorValue,
			'armorDescription' => $armorDescription,
			'id' => $id));
		}
		if($armorType == 'Earing')
		{
			$request5 = $bdd->prepare('UPDATE armor SET Earing = :armorName, EaringStat = :armorStatistic, EaringValue = :armorValue, EaringDescription = :armorDescription WHERE armor.ID = :id;');
			$request5->execute(array(
			'armorName' => $armorName,
			'armorStatistic' => $armorStatistic,
			'armorValue' => $armorValue,
			'armorDescription' => $armorDescription,
			'id' => $id));
		}
		if($armorType == 'Ring1')
		{
			$request5 = $bdd->prepare('UPDATE armor SET Ring1 = :armorName, Ring1Stat = :armorStatistic, Ring1Value = :armorValue, Ring1Description = :armorDescription WHERE armor.ID = :id;');
			$request5->execute(array(
			'armorName' => $armorName,
			'armorStatistic' => $armorStatistic,
			'armorValue' => $armorValue,
			'armorDescription' => $armorDescription,
			'id' => $id));
		}
		if($armorType == 'Ring2')
		{
			$request5 = $bdd->prepare('UPDATE armor SET Ring2 = :armorName, Ring2Stat = :armorStatistic, Ring2Value = :armorValue, Ring2Description = :armorDescription WHERE armor.ID = :id;');
			$request5->execute(array(
			'armorName' => $armorName,
			'armorStatistic' => $armorStatistic,
			'armorValue' => $armorValue,
			'armorDescription' => $armorDescription,
			'id' => $id));
		}
	}
	
	if($itemName != "")
	{		
		$reponse3 = $bdd->query("SELECT Item1, Item2,Item3, Item4, Item5, Item6, Item7, Item8, Item9,Item10 FROM inventory WHERE ID = $id");
		$donnees3= $reponse3->fetch();
		
		if($donnees3['Item1'] != "")
		{
			if($donnees3['Item2'] != "")
			{
				if($donnees3['Item3'] != "")
				{
					if($donnees3['Item4'] != "")
					{
						if($donnees3['Item5'] != "")
						{
							if($donnees3['Item6'] != "")
							{
								if($donnees3['Item7'] != "")
								{
									if($donnees3['Item8'] != "")
									{
										if($donnees3['Item9'] != "")
										{
											if($donnees3['Item10'] != "")
											{
												header('Location: https://1801534php.azurewebsites.net/projectphp/seeteam.php');
											}
											else{
											$request5 = $bdd->prepare('UPDATE inventory SET Item10 = :itemName, Item10Description = :itemDescription WHERE inventory.ID = :id;');
											$request5->execute(array(
											'itemName' => $itemName,
											'itemDescription' => $itemDescription,
											'id' => $id));}
										}
										else{
										$request5 = $bdd->prepare('UPDATE inventory SET Item9 = :itemName, Item9Description = :itemDescription WHERE inventory.ID = :id;');
										$request5->execute(array(
										'itemName' => $itemName,
										'itemDescription' => $itemDescription,
										'id' => $id));}
									}
									else{
									$request5 = $bdd->prepare('UPDATE inventory SET Item8 = :itemName, Item8escription = :itemDescription WHERE inventory.ID = :id;');
									$request5->execute(array(
									'itemName' => $itemName,
									'itemDescription' => $itemDescription,
									'id' => $id));}
								}
								else{
								$request5 = $bdd->prepare('UPDATE inventory SET Item7 = :itemName, Item7Description = :itemDescription WHERE inventory.ID = :id;');
								$request5->execute(array(
								'itemName' => $itemName,
								'itemDescription' => $itemDescription,
								'id' => $id));}
							}
							else{
							$request5 = $bdd->prepare('UPDATE inventory SET Item6 = :itemName, Item6Description = :itemDescription WHERE inventory.ID = :id;');
							$request5->execute(array(
							'itemName' => $itemName,
							'itemDescription' => $itemDescription,
							'id' => $id));}
						}
						else{
						$request5 = $bdd->prepare('UPDATE inventory SET Item5 = :itemName, Item5Description = :itemDescription WHERE inventory.ID = :id;');
						$request5->execute(array(
						'itemName' => $itemName,
						'itemDescription' => $itemDescription,
						'id' => $id));}
					}
					else{
					$request5 = $bdd->prepare('UPDATE inventory SET Item4 = :itemName, Item4Description = :itemDescription WHERE inventory.ID = :id;');
					$request5->execute(array(
					'itemName' => $itemName,
					'itemDescription' => $itemDescription,
					'id' => $id));}
				}
				else{
				$request5 = $bdd->prepare('UPDATE inventory SET Item3 = :itemName, Item3Description = :itemDescription WHERE inventory.ID = :id;');
				$request5->execute(array(
				'itemName' => $itemName,
				'itemDescription' => $itemDescription,
				'id' => $id));}
			}
			else{
			$request5 = $bdd->prepare('UPDATE inventory SET Item2 = :itemName, Item2Description = :itemDescription WHERE inventory.ID = :id;');
			$request5->execute(array(
			'itemName' => $itemName,
			'itemDescription' => $itemDescription,
			'id' => $id));}
		}
		else{
		$request5 = $bdd->prepare('UPDATE inventory SET Item1 = :itemName, Item1Description = :itemDescription WHERE inventory.ID = :id;');
		$request5->execute(array(
		'itemName' => $itemName,
		'itemDescription' => $itemDescription,
		'id' => $id));}
		
		$reponse3->closeCursor();
	}
	header('Location: https://1801534php.azurewebsites.net/projectphp/seeteam.php');
?>
<?php
function setclass($string)
{
	if(empty($string))
	{
		$string = 0;
	}
	elseif(ctype_digit($string))
	{
		$string = intval($string);
	}
	else
	{
		$string = 0;
	}
	return $string;
}
	
class shop {
	// LES OBJETS
	function item($iditem, $nombre, $character)
	{
		require("config.php");
		mysql_select_db($characters[1]['db']);
		mysql_query("INSERT INTO mail_external (receiver,subject,message,money,item,item_count) VALUES ('".$character."','Votre Achat','Merci de votre achat','0','".$iditem."','".$nombre."')");
	}
	
	// LES NIVEAUX
	function level($nbr, $character)
	{
		require("config.php");
		mysql_select_db($characters[1]['db']);
		$ch_req = mysql_query("SELECT * FROM characters WHERE guid='$character'");
		$ch_res = mysql_fetch_array($ch_req);
		$new_lvl = $ch_res['level'] + $nbr;
		//mysql_query("UPDATE `characters` SET `data` = CONCAT(CAST(SUBSTRING_INDEX(`data`, ' ', 53) AS CHAR), ' ', $new_lvl, CAST(SUBSTRING(`data`, -length(`data`) + length(CAST(SUBSTRING_INDEX(`data`, ' ', 54) AS CHAR))) AS CHAR)) WHERE `guid`='$character'");
		mysql_query("UPDATE characters SET level='$new_lvl' WHERE guid='$character'");
		
	}
	
	// LES PIECES D'OR
	function po($nbr, $character)
	{
		require("config.php");
		mysql_select_db($characters[1]['db']);
		mysql_query("INSERT INTO mail_external (receiver,subject,message,money,item,item_count) VALUES ('".$character."','Votre Achat','Merci de votre achat','".$nbr."','0','0')");
	}
	
	// LES POINT D'ARENES
	function pa($nbr, $character)
	{
		require("config.php");
		mysql_select_db($characters[1]['db']);
		$ch_req = mysql_query("SELECT * FROM characters WHERE guid='$character'");
		$ch_res = mysql_fetch_array($ch_req);
		$new_point = $ch_res['arenaPoins'] + $nbr;
		mysql_query("UPDATE characters SET arenaPoins='$new_point' WHERE guid='$character'");
	}
	
	// LES POINT D'HONNEUR
	function ph($nbr, $character)
	{
		require("config.php");
		mysql_select_db($characters[1]['db']);
		$ch_req = mysql_query("SELECT * FROM characters WHERE guid='$character'");
		$ch_res = mysql_fetch_array($ch_req);
		$new_point = $ch_res['totalHonorPoints'] + $nbr;
		mysql_query("UPDATE characters SET totalHonorPoints='$new_point' WHERE guid='$character'");
	}
	
}
?>
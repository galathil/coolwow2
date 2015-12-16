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
		mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
		mysql_select_db($characters[1]['db']) or die(mysql_error());
		$reponse4 = mysql_query("SELECT * FROM `characters` WHERE `guid`='$character'") or die("Erreur SQL");
		$donnees4 = mysql_fetch_array($reponse4,MYSQL_ASSOC);
		$character2 = $donnees4['name'];
		
		$telnet = @fsockopen($shell['host'], $shell['port'], $errno, $errstr, 3);
		if ($telnet)
		{
			fgets($telnet,1024);
			fputs($telnet, "USER ".$shell['user']."\n");
			sleep(1);
			fputs($telnet, "PASS ".$shell['password']."\n");
			sleep(1);
			fgets($telnet,1024);
			sleep(1);
			fputs($telnet, "send items $character2 \"Votre commande\" \"Merci pour votre achat\" $iditem:$nombre\n");
			fclose($telnet);
		}
	}
	
	// LES NIVEAUX
	function level($nbr, $character)
	{
		require("config.php");
		mysql_select_db($characters[1]['db']);
		$ch_req = mysql_query("SELECT * FROM characters WHERE guid='$character'");
		$ch_res = mysql_fetch_array($ch_req);
		$new_lvl = $ch_res['level'] + $nbr;
		mysql_query("UPDATE `characters` SET `data` = CONCAT(CAST(SUBSTRING_INDEX(`data`, ' ', ".CHAR_DATA_OFFSET_LEVEL.") AS CHAR), ' ', $new_lvl, CAST(SUBSTRING(`data`, -length(`data`) + length(CAST(SUBSTRING_INDEX(`data`, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1).") AS CHAR))) AS CHAR)) WHERE `guid`='$character'");
		mysql_query("UPDATE characters SET level='$new_lvl' WHERE guid='$character'");
	}
	
	// LES PIECES D'OR
	function po($nbr, $character)
	{
		require("config.php");
		mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
		mysql_select_db($characters[1]['db']) or die(mysql_error());
		$reponse4 = mysql_query("SELECT * FROM `characters` WHERE `guid`='$character'") or die("Erreur SQL");
		$donnees4 = mysql_fetch_array($reponse4,MYSQL_ASSOC);
		$character2 = $donnees4['name'];
		
		$telnet = @fsockopen($shell['host'], $shell['port'], $errno, $errstr, 3);
		if ($telnet)
		{
			fgets($telnet,1024);
			fputs($telnet, "USER ".$shell['user']."\n");
			sleep(1);
			fputs($telnet, "PASS ".$shell['password']."\n");
			sleep(1);
			fgets($telnet,1024);
			sleep(1);
			fputs($telnet, "send money $character2 \"votre commande\" \"Merci pour votre achat\" $nbr\n");
			fclose($telnet);
		}
	}
	
	// LES POINT D'ARENES
	function pa($nbr, $character)
	{
		require("config.php");
		mysql_select_db($characters[1]['db']);
		$ch_req = mysql_query("SELECT * FROM characters WHERE guid='$character'");
		$ch_res = mysql_fetch_array($ch_req);
		$level = explode(' ',$ch_res['data']);
		$new_pa = $level[CHAR_DATA_OFFSET_ARENA_POINTS] + $nbr;
		mysql_query("UPDATE `characters` SET `data` = CONCAT(CAST(SUBSTRING_INDEX(`data`, ' ', ".CHAR_DATA_OFFSET_ARENA_POINTS.") AS CHAR), ' ', $new_pa, CAST(SUBSTRING(`data`, -length(`data`) + length(CAST(SUBSTRING_INDEX(`data`, ' ', ".(CHAR_DATA_OFFSET_ARENA_POINTS+1).") AS CHAR))) AS CHAR)) WHERE `guid`='$character'");
	}
	
	// LES POINT D'HONNEUR
	function ph($nbr, $character)
	{
		require("config.php");
		mysql_select_db($characters[1]['db']);
		$ch_req = mysql_query("SELECT * FROM characters WHERE guid='$character'");
		$ch_res = mysql_fetch_array($ch_req);
		$level = explode(' ',$ch_res['data']);
		$new_ph = $level[CHAR_DATA_OFFSET_HONOR_POINTS] + $nbr;
		mysql_query("UPDATE `characters` SET `data` = CONCAT(CAST(SUBSTRING_INDEX(`data`, ' ', ".CHAR_DATA_OFFSET_HONOR_POINTS.") AS CHAR), ' ', $new_ph, CAST(SUBSTRING(`data`, -length(`data`) + length(CAST(SUBSTRING_INDEX(`data`, ' ', ".(CHAR_DATA_OFFSET_HONOR_POINTS+1).") AS CHAR))) AS CHAR)) WHERE `guid`='$character'");
	}
}
?>
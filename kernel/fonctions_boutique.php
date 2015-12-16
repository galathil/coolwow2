<?php
require_once("defines/$client.php");

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
		$itemid = rand(1, 600000);
		$db = $characters[1]['db'];
		mysql_select_db($characters[1]['db']);
		mysql_query("REPLACE INTO ".$db.".item_instance (guid,owner_guid,data) VALUES ('".$itemid."','".$character."','".$itemid." 1073741936 3 ".$iditem." 1065353216 0 ".$character." 0 ".$character." 0 0 0 0 0 ".$nombre." 0 4294967295 0 0 0 0 65 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0')");
		$req_mid = mysql_query('SELECT MAX(id) FROM mail');
		$res_mid = mysql_fetch_row($req_mid);
		$mid = $res_mid[0] + 1;
		$expire_time = time() + (30 * DAY);
		$time = time();
		$req_itid = mysql_query("SELECT MAX(id) FROM ".$db.".item_text");
		$res_itid = mysql_fetch_row($req_itid);
		$itext_id = $res_itid[0] + 1;
		mysql_query("INSERT INTO mail_items (mail_id,item_guid,item_template,receiver) VALUES ('".$mid."','".$itemid."','".$iditem."','".$character."')") or die(mysql_error());
		mysql_query("INSERT INTO mail (id,messageType,stationery,mailTemplateId,sender,receiver,subject,itemTextId,has_items,expire_time,deliver_time,money,cod,checked) 
		VALUES('".$mid."','0','61','0','".$character."','".$character."','Félicitation: Objet acheté Avec Succès','".$itext_id."','1','".$expire_time."','".$time."','0','0','0')") or die(mysql_error());
		mysql_query("INSERT INTO item_text (id,text) VALUES ('".$itext_id."','Félicitation pour votre achat,\r\n\r\nVoici l'objet que vous avez acheté dans la boutique,\r\n\r\nBon jeu sur notre Serveur')");
	}
	
	// LES NIVEAUX
	function level($nbr, $character)
	{
		require("config.php");
		mysql_select_db($characters[1]['db']);
		$ch_req = mysql_query("SELECT * FROM characters WHERE guid='$character'");
		$ch_res = mysql_fetch_array($ch_req);
		$new_lvl = $ch_res['level'] + $nbr;
		mysql_query("UPDATE characters SET level='$new_lvl' WHERE guid='$character'");
	}
	
	// LES PIECES D'OR
	function po($nbr, $character)
	{
		require("config.php");
		mysql_select_db($characters[1]['db']);
		$ch_req = mysql_query("SELECT * FROM characters WHERE guid='$character'");
		$ch_res = mysql_fetch_array($ch_req);
		$level = explode(' ',$ch_res['data']);
		$new_po = $level[CHAR_DATA_OFFSET_GOLD] + $nbr;
		mysql_query("UPDATE `characters` SET `data` = CONCAT(CAST(SUBSTRING_INDEX(`data`, ' ', ".CHAR_DATA_OFFSET_GOLD.") AS CHAR), ' ', $new_po, CAST(SUBSTRING(`data`, -length(`data`) + length(CAST(SUBSTRING_INDEX(`data`, ' ', ".(CHAR_DATA_OFFSET_GOLD+1).") AS CHAR))) AS CHAR)) WHERE `guid`='$character'");
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
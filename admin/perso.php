<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
$page_get = mysql_real_escape_string(htmlspecialchars($_GET['page'], ENT_QUOTES));
if(empty($page_get))
{
	$truc = 1;
}
elseif(!ctype_digit($page_get)) //verifi si il n'y a pas de lettre
{
	$truc = 1;
}
else
{
	$truc = $page_get;
}

mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_perso"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
		mysql_select_db($characters[1]['db']) or die(mysql_error());
		switch ($_GET['action'])
		{
			case "editer":
				require_once("../kernel/fonctions.php");
				require_once("../kernel/fonctions_armurerie.php");
				require_once("../kernel/defines/309.php");
				$id = Securite::bdd($_POST['id']);
				$id = Securite::bdd($_GET['id']);
				$reponse = mysql_query("SELECT guid,account,data,name,race,class,position_x,position_y,map,online,totaltime,position_z,zone	FROM `characters` WHERE `name`='$id' OR `guid`='$id' ") or die(mysql_error());
				$char = mysql_fetch_row($reponse);
				$char_data = explode(' ',$char[2]);
				echo "
				<center>
					<form method=\"get\" action=\"index.php?module=perso&action=editer_v\" name=\"form\">
						<input type=\"hidden\" name=\"action\" value=\"do_edit_char\" />
						<input type=\"hidden\" name=\"id\" value=\"$id\" />
						<table class=\"lined\">
							<tr>
				    <td colspan=\"8\"><font class=\"bold\"><input type=\"text\" name=\"name\" size=\"14\" maxlength=\"12\" value=\"$char[3]\" /> - ".get_player_race($char[4])." ".get_player_class($char[5])." lvl {$char_data[CHAR_DATA_OFFSET_LEVEL]}</font><br />$online</td>
</tr>
<tr>
				 <td colspan=\"8\">".get_map_name($char[9])." - ".get_zone_name($char[12])."</td>
</tr>
<tr>
				 <td colspan=\"8\">{$lang_char['guild']}: $guild_name | {$lang_char['rank']}: $guild_rank</td>
</tr>
<tr>
				 <td colspan=\"8\">{$lang_char['honor_points']}: <input type=\"text\" name=\"honor_points\" size=\"8\" maxlength=\"6\" value=\"{$char_data[CHAR_DATA_OFFSET_HONOR_POINTS]}\" />/
				 <input type=\"text\" name=\"arena_points\" size=\"8\" maxlength=\"6\" value=\"{$char_data[CHAR_DATA_OFFSET_ARENA_POINTS]}\" /> - {$lang_char['honor_kills']}: <input type=\"text\" name=\"total_kills\" size=\"8\" maxlength=\"6\" value=\"{$char_data[CHAR_DATA_OFFSET_HONOR_KILL]}\" /></td>
</tr>
				  <tr>
				    <td width=\"2%\"><input type=\"checkbox\" name=\"check[]\" value=\"a0\" /></td><td width=\"18%\">{$lang_item['head']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_HEAD]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_HEAD])."</a></td>
				    <td width=\"15%\">{$lang_item['health']}:</td><td width=\"15%\"><input type=\"text\" name=\"health\" size=\"10\" maxlength=\"6\" value=\"{$char_data[CHAR_DATA_OFFSET_HEALTH]}\" /></td>
				    <td width=\"15%\">{$lang_item['res_holy']}:</td><td width=\"15%\"><input type=\"text\" name=\"res_holy\" size=\"10\" maxlength=\"4\" value=\"{$char_data[CHAR_DATA_OFFSET_RES_HOLY]}\" /></td>
				    <td width=\"18%\">{$lang_item['gloves']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_GLOVES]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_GLOVES])."</a></td><td width=\"2%\"><input type=\"checkbox\" name=\"check[]\" value=\"a9\" /></td>
				  </tr>
				  <tr>
				    <td><input type=\"checkbox\" name=\"check[]\" value=\"a1\" /></td><td>{$lang_item['neck']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_NECK]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_NECK])."</a></td>
				    <td>{$lang_item['mana']}:</td><td><input type=\"text\" name=\"mana\" size=\"10\" maxlength=\"6\" value=\"{$char_data[CHAR_DATA_OFFSET_MANA]}\" /></td>
				    <td>{$lang_item['res_arcane']}:</td><td><input type=\"text\" name=\"res_arcane\" size=\"10\" maxlength=\"4\" value=\"{$char_data[CHAR_DATA_OFFSET_RES_ARCANE]}\" /></td>
				    <td>{$lang_item['belt']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_BELT]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_BELT])."</a></td> <td><input type=\"checkbox\" name=\"check[]\" value=\"a5\" /></td>
				  </tr>
				  <tr>
				    <td><input type=\"checkbox\" name=\"check[]\" value=\"a2\" /></td><td>{$lang_item['shoulder']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_SHOULDER]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_SHOULDER])."</a></td>
				    <td>{$lang_item['strength']}:</td><td><input type=\"text\" name=\"str\" size=\"10\" maxlength=\"4\" value=\"{$char_data[CHAR_DATA_OFFSET_STR]}\" /></td>
				    <td>{$lang_item['res_fire']}:</td><td><input type=\"text\" name=\"res_fire\" size=\"10\" maxlength=\"4\" value=\"{$char_data[CHAR_DATA_OFFSET_RES_FIRE]}\" /></td>
				    <td>{$lang_item['legs']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_LEGS]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_LEGS])."</a></td><td><input type=\"checkbox\" name=\"check[]\" value=\"a6\" /></td>
				  </tr>
				  <tr>
				    <td><input type=\"checkbox\" name=\"check[]\" value=\"a14\" /></td><td>{$lang_item['back']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_BACK]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_BACK])."</a></td>
				    <td>{$lang_item['agility']}:</td><td><input type=\"text\" name=\"agi\" size=\"10\" maxlength=\"4\" value=\"{$char_data[CHAR_DATA_OFFSET_AGI]}\" /></td>
				    <td>{$lang_item['res_nature']}:</td><td><input type=\"text\" name=\"res_nature\" size=\"10\" maxlength=\"4\" value=\"{$char_data[CHAR_DATA_OFFSET_RES_NATURE]}\" /></td>
				    <td>{$lang_item['feet']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_FEET]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_FEET])."</a></td><td><input type=\"checkbox\" name=\"check[]\" value=\"a7\" /></td>
				  </tr>
				  <tr>
				    <td><input type=\"checkbox\" name=\"check[]\" value=\"a4\" /></td><td>{$lang_item['chest']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_CHEST]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_CHEST])."</a></td>
				    <td>{$lang_item['stamina']}:</td><td><input type=\"text\" name=\"sta\" size=\"10\" maxlength=\"4\" value=\"{$char_data[CHAR_DATA_OFFSET_STA]}\" /></td>
				    <td>{$lang_item['res_frost']}:</td><td><input type=\"text\" name=\"res_frost\" size=\"10\" maxlength=\"4\" value=\"{$char_data[CHAR_DATA_OFFSET_RES_FROST]}\" /></td>
				    <td>{$lang_item['finger']} 1<br /><a href=\"$item_datasite{$char_data[380]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_FINGER1])."</a></td><td><input type=\"checkbox\" name=\"check[]\" value=\"a10\" /></td>
				  </tr>
				  <tr>
				    <td><input type=\"checkbox\" name=\"check[]\" value=\"a3\" /></td><td>{$lang_item['shirt']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_SHIRT]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_SHIRT])."</a></td>
				    <td>{$lang_item['intellect']}:</td><td><input type=\"text\" name=\"int\" size=\"10\" maxlength=\"4\" value=\"{$char_data[CHAR_DATA_OFFSET_INT]}\" /></td>
				    <td>{$lang_item['res_shadow']}:</td><td><input type=\"text\" name=\"res_shadow\" size=\"10\" maxlength=\"4\" value=\"{$char_data[CHAR_DATA_OFFSET_RES_SHADOW]}\" /></td>
				    <td>{$lang_item['finger']} 2<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_FINGER2]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_FINGER2])."</a></td><td><input type=\"checkbox\" name=\"check[]\" value=\"a11\" /></td>
				  </tr>
				  <tr>
				    <td><input type=\"checkbox\" name=\"check[]\" value=\"a18\" /></td><td>{$lang_item['tabard']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_TABARD]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_TABARD])."</a></td>
				    <td>{$lang_item['spirit']}:</td><td><input type=\"text\" name=\"spi\" size=\"10\" maxlength=\"4\" value=\"{$char_data[CHAR_DATA_OFFSET_SPI]}\" /></td>
				    <td>{$lang_char['exp']}:</td><td><input type=\"text\" name=\"exp\" size=\"10\" maxlength=\"8\" value=\"{$char_data[CHAR_DATA_OFFSET_EXP]}\" /></td>
				    <td>{$lang_item['trinket']} 1<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_TRINKET1]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_TRINKET1])."</a></td><td><input type=\"checkbox\" name=\"check[]\" value=\"a12\" /></td>
				  </tr>
				  <tr>
				    <td><input type=\"checkbox\" name=\"check[]\" value=\"a8\" /></td><td>{$lang_item['wrist']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_WRIST]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_WRIST])."</a></td>
				    <td>{$lang_item['armor']}:</td><td><input type=\"text\" name=\"armor\" size=\"10\" maxlength=\"6\" value=\"{$char_data[CHAR_DATA_OFFSET_ARMOR]}\" /></td>
				    <td>{$lang_char['melee_ap']}: <input type=\"text\" name=\"attack_power\" size=\"10\" maxlength=\"6\" value=\"{$char_data[CHAR_DATA_OFFSET_AP]}\" /></td><td>{$lang_char['ranged_ap']}: <input type=\"text\" name=\"range_attack_power\" size=\"10\" maxlength=\"6\" value=\"{$char_data[CHAR_DATA_OFFSET_RANGED_AP]}\" /></td>
				    <td>{$lang_item['trinket']} 2<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_TRINKET2]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_TRINKET2])."</a></td><td><input type=\"checkbox\" name=\"check[]\" value=\"a13\" /></td>
				  </tr>
				  <tr>
				    <td><input type=\"checkbox\" name=\"check[]\" value=\"a15\" /></td>
				    <td colspan=\"2\">{$lang_item['main_hand']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_MAIN_HAND]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_MAIN_HAND])."</a></td>
				    <td colspan=\"2\"><input type=\"checkbox\" name=\"check[]\" value=\"a16\" />&nbsp;{$lang_item['off_hand']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_OFF_HAND]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_OFF_HAND])."</a></td>
				    <td colspan=\"2\">{$lang_item['ranged']}<br /><a href=\"$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_RANGED]}\" target=\"_blank\">".get_item_name($char_data[CHAR_DATA_OFFSET_EQU_RANGED])."</a></td>
				    <td><input type=\"checkbox\" name=\"check[]\" value=\"a17\" /></td>
<tr>
<td colspan=\"8\">{$lang_char['block']} : <input type=\"text\" name=\"block\" size=\"5\" maxlength=\"3\" value=\"$block\" />% 
| {$lang_char['dodge']}: <input type=\"text\" name=\"dodge\" size=\"5\" maxlength=\"3\" value=\"$dodge\" />% 
| {$lang_char['parry']}: <input type=\"text\" name=\"parry\" size=\"5\" maxlength=\"3\" value=\"$parry\" />% 
| {$lang_char['crit']}: <input type=\"text\" name=\"crit\" size=\"5\" maxlength=\"3\" value=\"$crit\" />%
| {$lang_char['range_crit']}: <input type=\"text\" name=\"range_crit\" size=\"3\" maxlength=\"14\" value=\"$range_crit\" />%</td>
				 </tr>
				 <tr>
<td colspan=\"4\">{$lang_char['gold']}: <input type=\"text\" name=\"money\" size=\"10\" maxlength=\"8\" value=\"{$char_data[CHAR_DATA_OFFSET_GOLD]}\" /></td>
				  <td colspan=\"4\">{$lang_char['tot_paly_time']}: <input type=\"text\" name=\"tot_time\" size=\"8\" maxlength=\"14\" value=\"{$char[10]}\" /></td>
</tr>
<tr>
					<td colspan=\"5\">{$lang_char['location']}: 
					X:<input type=\"text\" name=\"x\" size=\"10\" maxlength=\"8\" value=\"{$char[6]}\" />
					Y:<input type=\"text\" name=\"y\" size=\"8\" maxlength=\"16\" value=\"{$char[7]}\" />
					Z:<input type=\"text\" name=\"z\" size=\"8\" maxlength=\"16\" value=\"{$char[11]}\" />
					Map:<input type=\"text\" name=\"map\" size=\"8\" maxlength=\"16\" value=\"{$char[8]}\" />
						</td>
						<td colspan=\"3\">{$lang_char['move_to']}:<input type=\"text\" name=\"tp_to\" size=\"24\" maxlength=\"64\" value=\"\" /></td>
					</tr>
				</table><br />
				<a href=\"index.php?module=perso&action=inventaire&id=$id\">Voir l'inventaire</a> - 
				<a href=\"index.php?module=perso&action=monnaie&id=$id\">Voir les Marques d'honneur</a> - 
				<a href=\"index.php?module=perso&action=quetes&id=$id\">Voir les quêtes</a> - 
				<a href=\"index.php?module=perso&action=talents&id=$id\">Voir les Talents</a> - 
				<a href=\"index.php?module=perso&action=skills&id=$id\">Voir les Compétences</a>
				";
			break;
			case "editer_v":
			break;
			case "quetes":
				$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				$retour = mysql_query("SELECT * FROM character_queststatus WHERE guid = $id AND ( status = 3 OR status = 1 ) ORDER BY status DESC");
				echo "<p class=\"title\">Les Quêtes</p><br />";
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th width=\"30\">ID</th>
								<th width=\"30\">Niveau</th>
								<th width=\"30\">Titre</th>
								<th width=\"30\">status</th>
							</tr>";
					while($donnees = mysql_fetch_assoc($retour))
					{
						$retour2 = mysql_query("SELECT QuestLevel,title FROM `".$mangos[1]['db']."`.`quest_template` LEFT JOIN `".$mangos[1]['db']."`.`locales_quest` ON `quest_template`.`entry` = `locales_quest`.`entry` WHERE `quest_template`.`entry` ='".$donnees['quest']."'");
						$donnees2 = mysql_fetch_array($retour2);
						echo "<tr><td align=\"center\">";
						echo "<a href=\"http://fr.wowhead.com/?quest=".$donnees['quest']."\">".$donnees['quest']."</a>";
						echo "</td><td align=\"center\">";
						echo "".$donnees2['QuestLevel']."";
						echo "</td><td align=\"center\">";
						echo "<a href=\"http://fr.wowhead.com/?quest=".$donnees['quest']."\">".$donnees2['title']."</a>";
						echo "</td><td align=\"center\">";
						echo "<img src=\"../images/aff_".$donnees['status'].".png\" width=\"14\" height=\"14\" />";
						echo "</td>";
						echo "</tr>";
					}
					echo "</table><br />";
			break;
			case "inventaire":
				require_once("../kernel/fonctions_armurerie.php");
				$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));

				mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password'])or die(mysql_error());
				mysql_select_db($characters[1]['db']) or die(mysql_error());

				$result = mysql_query("SELECT account FROM `characters` WHERE guid = $id LIMIT 1");

				if (mysql_num_rows($result))
				{
				  $owner_acc_id = mysql_result($result, 0, 'account');
				  mysql_connect($realmd['host'], $realmd['user'], $realmd['password']);
				  mysql_select_db($realmd['db']) or die(mysql_error());
				  $query = mysql_query("SELECT gmlevel,username FROM account WHERE id ='$owner_acc_id'");
				  $owner_gmlvl = mysql_result($query, 0, 'gmlevel');
				  $owner_name = mysql_result($query, 0, 'username');

				  mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']);
				  mysql_select_db($characters[1]['db']) or die(mysql_error());

				  $result = mysql_query("SELECT name,race,class,SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', ".(CHAR_DATA_OFFSET_GOLD+1)."), ' ', -1), SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1)."), ' ', -1), mid(lpad( hex( CAST(substring_index(substring_index(data,' ',".(CHAR_DATA_OFFSET_GENDER+1)."),' ',-1) as unsigned) ),8,'0'),4,1) as gender FROM `characters` WHERE guid = $id");

				  $char = mysql_fetch_row($result);

				  $result = mysql_query("SELECT ci.bag,ci.slot,ci.item,ci.item_template, SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', 15), ' ', -1) as stack_count FROM character_inventory ci INNER JOIN item_instance ii on ii.guid = ci.item WHERE ci.guid = $id ORDER BY ci.bag,ci.slot");
				  $bag = array(
					0=>array(),
					1=>array(),
					2=>array(),
					3=>array(),
					4=>array()
					);

				  $bank = array(
					0=>array(),
					1=>array(),
					2=>array(),
					3=>array(),
					4=>array(),
					5=>array(),
					6=>array(),
					7=>array()
					);

				  $bank_bag_id = array();
				  $bag_id = array();
				  $equiped_bag_id = array(0,0,0,0,0);
				  $equip_bnk_bag_id = array(0,0,0,0,0,0,0,0);

				  while ($slot = mysql_fetch_row($result))
				  {
					if ($slot[0] == 0 && $slot[1] > 18)
					{
					  if($slot[1] < 23) // SLOT 19 TO 22 (Bags)
					  {
						$bag_id[$slot[2]] = ($slot[1]-18);
								$equiped_bag_id[$slot[1]-18] = array($slot[3], mysql_result(mysql_query("SELECT ContainerSlots FROM `".$mangos[1]['db']."`.`item_template` WHERE entry ='{$slot[3]}'"), 0, 'ContainerSlots'), $slot[4]);
					  }
					  elseif($slot[1] < 39) // SLOT 23 TO 38 (BackPack)
					  {
						if(isset($bag[0][$slot[1]-23]))
						  $bag[0][$slot[1]-23][0]++;
								else $bag[0][$slot[1]-23] = array($slot[3],0,$slot[4]);
					  }
					  elseif($slot[1] < 67) // SLOT 39 TO 66 (Bank)
					  {
							  $bank[0][$slot[1]-39] = array($slot[3],0,$slot[4]);
					  }
					  elseif($slot[1] < 74) // SLOT 67 TO 73 (Bank Bags)
					  {
						$bank_bag_id[$slot[2]] = ($slot[1]-66);
						$equip_bnk_bag_id[$slot[1]-66] = array($slot[3], mysql_result(mysql_query("SELECT ContainerSlots FROM `".$mangos[1]['db']."`.`item_template` WHERE entry ='{$slot[3]}'"), 0, 'ContainerSlots'), $slot[4]);
					  }
					}
					else
					{
					  // Bags
					  if (isset($bag_id[$slot[0]]))
					  {
						if(isset($bag[$bag_id[$slot[0]]][$slot[1]]))
						  $bag[$bag_id[$slot[0]]][$slot[1]][1]++;
						else $bag[$bag_id[$slot[0]]][$slot[1]] = array($slot[3],0,$slot[4]);
					  }
					  // Bank Bags
					  elseif (isset($bank_bag_id[$slot[0]]))
					  {
						$bank[$bank_bag_id[$slot[0]]][$slot[1]] = array($slot[3],0,$slot[4]);
					  }
					}
				  }
				echo "<p class=\"title\">Inventaire du personnage $owner_name</p><br />";
				echo "<center>
				<div id=\"tab_content\">
				<table class=\"lined2\" style=\"width: 700px;\">
				  <tr>
				   <th>";

				  if($equiped_bag_id[1]){
					echo maketooltip("<img class=\"bag_icon\" src=\"".get_icon2($equiped_bag_id[1][0])."\" alt=\"\" />", "$item_datasite{$equiped_bag_id[1][0]}", get_item_tooltip2($equiped_bag_id[1][0]), "item_tooltip", "target=\"_blank\"");
					echo "SAC I<br /><font class=\"small\">({$equiped_bag_id[1][1]} {$lang_item['slots']})</font>";
				  }
				echo "</th><th>";
				  if($equiped_bag_id[2]){
					echo maketooltip("<img class=\"bag_icon\" src=\"".get_icon2($equiped_bag_id[2][0])."\" alt=\"\" />", "$item_datasite{$equiped_bag_id[2][0]}", get_item_tooltip2($equiped_bag_id[2][0]), "item_tooltip", "target=\"_blank\"");
					echo "SAC II<br /><font class=\"small\">({$equiped_bag_id[2][1]} {$lang_item['slots']})</font>";
				  }
				echo "</th><th>";
				  if($equiped_bag_id[3]){
					  echo maketooltip("<img class=\"bag_icon\" src=\"".get_icon2($equiped_bag_id[3][0])."\" alt=\"\" />", "$item_datasite{$equiped_bag_id[3][0]}", get_item_tooltip2($equiped_bag_id[3][0]), "item_tooltip", "target=\"_blank\"");
					  echo "SAC III<br /><font class=\"small\">({$equiped_bag_id[3][1]} {$lang_item['slots']})</font>";
					}
				echo "</th><th>";
				  if($equiped_bag_id[4]){
					  echo maketooltip("<img class=\"bag_icon\" src=\"".get_icon2($equiped_bag_id[4][0])."\" alt=\"\" />", "$item_datasite{$equiped_bag_id[4][0]}", get_item_tooltip2($equiped_bag_id[4][0]), "item_tooltip", "target=\"_blank\"");
					  echo "SAC IV<br /><font class=\"small\">({$equiped_bag_id[4][1]} {$lang_item['slots']})</font>";
					}
				echo "</th>
				  </tr>
				  <tr>";
				// adds equipped bag slots
				  for($t = 1; $t < count($bag); $t++){
					echo "<td class=\"bag\" valign=\"bottom\" align=\"center\">
					<div style=\"width:".(4*43)."px;height:".(ceil($equiped_bag_id[$t][1]/4)*41)."px;\">";

				  $dsp = $equiped_bag_id[$t][1]%4;
				  if ($dsp) echo "<div class=\"no_slot\" /></div>";
				  foreach ($bag[$t] as $pos => $item){
					echo "<div style=\"left:".(($pos+$dsp)%4*42)."px;top:".(floor(($pos+$dsp)/4)*41)."px;\">";
					echo maketooltip("<img src=\"".get_icon2($item[0])."\" alt=\"\" />".($item[1] ? ($item[1]+1) : ""), "$item_datasite{$item[0]}", get_item_tooltip2($item[0]), "item_tooltip", "target=\"_blank\"");
					$item[2] = $item[2] == 1 ? '' : $item[2];
					echo "<div style=\"width:25px;margin:-20px 0px 0px 18px;color: black; font-size:14px\">$item[2]</div><div style=\"width:25px;margin:-21px 0px 0px 17px;font-size:14px\">$item[2]</div></div>";
				  }
					echo "</td>";
				  }

				echo "</tr>
				  <tr>
					<th colspan=\"2\" align=\"left\">
					  <img class=\"bag_icon\" src=\"".get_icon2(3960)."\" alt=\"\" align=\"absmiddle\" style=\"margin-left:100px;\" />
					  <font style=\"margin-left:30px;\">Sac à dos</font>
					</th>
					<th colspan=\"2\">
					  Banque d'objets
					</th>
				  </tr>
				  <tr>
					<td colspan=\"2\" class=\"bag\" align=\"center\" height=\"220px\">
					<div style=\"width:".(4*43)."px;height:".(ceil(16/4)*41)."px;\">";
				// inventory items
					foreach ($bag[0] as $pos => $item){
					  echo "<div style=\"left:".($pos%4*42)."px;top:".(floor($pos/4)*41)."px;\">";
					  echo maketooltip("<img src=\"".get_icon2($item[0])."\" alt=\"\" />".($item[1] ? ($item[1]+1) : ""), "$item_datasite{$item[0]}", get_item_tooltip2($item[0]), "item_tooltip", "target=\"_blank\"");
					  $item[2] = $item[2] == 1 ? '' : $item[2];
					  echo "<div style=\"width:25px;margin:-20px 0px 0px 18px;color: black; font-size:14px\">$item[2]</div><div style=\"width:25px;margin:-21px 0px 0px 17px;font-size:14px\">$item[2]</div></div>";
					}

				  $money_gold = (int)($char[3]/10000);
				  $money_silver = (int)(($char[3]-$money_gold*10000)/100);
				  $money_cooper = (int)($char[3]-$money_gold*10000-$money_silver*100);

				echo "</div>
					  <div style=\"text-align:right;width:168px;background-image:none;background-color:#393936;padding:2px;\">
						<b>
						$money_gold <img src=\"../images/or.gif\" alt=\"\" align=\"absmiddle\" />
						$money_silver <img src=\"../images/argent.gif\" alt=\"\" align=\"absmiddle\" />
						$money_cooper <img src=\"../images/cuivre.gif\" alt=\"\" align=\"absmiddle\" />
						</b>
					  ";

				echo "</div>
					</td>
					<td colspan=\"2\" class=\"bank\" align=\"center\">
					<div style=\"width:".(7*43)."px;height:".(ceil(24/7)*41)."px;\">";
				// bank items
					foreach ($bank[0] as $pos => $item){
					  echo "<div style=\"left:".($pos%7*43)."px;top:".(floor($pos/7)*41)."px;\">";
					  echo maketooltip("<img src=\"".get_icon2($item[0])."\" class=\"inv_icon\" alt=\"\" />", "$item_datasite{$item[0]}", get_item_tooltip2($item[0]), "item_tooltip", "target=\"_blank\"");
					  $item[2] = $item[2] == 1 ? '' : $item[2];
					  echo "<div style=\"width:25px;margin:-20px 0px 0px 18px;color: black; font-size:14px\">$item[2]</div><div style=\"width:25px;margin:-21px 0px 0px 17px;font-size:14px\">$item[2]</div></div>";
					}

				echo "</div>
					</td>
				  </tr>
				  <tr>
					<th>";
				  if($equip_bnk_bag_id[1]){
					echo maketooltip("<img class=\"bag_icon\" src=\"".get_icon2($equip_bnk_bag_id[1][0])."\" alt=\"\" />", "$item_datasite{$equip_bnk_bag_id[1][0]}", get_item_tooltip2($equip_bnk_bag_id[1][0]), "item_tooltip", "target=\"_blank\"");
					echo "SAC I<br /><font class=\"small\">({$equip_bnk_bag_id[1][1]} {$lang_item['slots']})</font>";
				  }
				echo "</th><th>";
				  if($equip_bnk_bag_id[2]){
					echo maketooltip("<img class=\"bag_icon\" src=\"".get_icon2($equip_bnk_bag_id[2][0])."\" alt=\"\" />", "$item_datasite{$equip_bnk_bag_id[2][0]}", get_item_tooltip2($equip_bnk_bag_id[2][0]), "item_tooltip", "target=\"_blank\"");
					echo "SAC II<br /><font class=\"small\">({$equip_bnk_bag_id[2][1]} {$lang_item['slots']})</font>";
				  }
				echo "</th><th>";
				  if($equip_bnk_bag_id[3]){
					echo maketooltip("<img class=\"bag_icon\" src=\"".get_icon2($equip_bnk_bag_id[3][0])."\" alt=\"\" />", "$item_datasite{$equip_bnk_bag_id[3][0]}", get_item_tooltip2($equip_bnk_bag_id[3][0]), "item_tooltip", "target=\"_blank\"");
					echo "SAC III<br /><font class=\"small\">({$equip_bnk_bag_id[3][1]} {$lang_item['slots']})</font>";
				  }
				echo "</th><th>";
				  if($equip_bnk_bag_id[4]){
					echo maketooltip("<img class=\"bag_icon\" src=\"".get_icon2($equip_bnk_bag_id[4][0])."\" alt=\"\" />", "$item_datasite{$equip_bnk_bag_id[4][0]}", get_item_tooltip2($equip_bnk_bag_id[4][0]), "item_tooltip", "target=\"_blank\"");
					echo "SAC IV<br /><font class=\"small\">({$equip_bnk_bag_id[4][1]} {$lang_item['slots']})</font>";
				  }
				echo "</th>
				  </tr>
				  <tr>";

				  for($t=1; $t < count($bank); $t++){
				  if($t==5){
					echo "</tr>
					<tr>
					  <th>";
					if($equip_bnk_bag_id[5]){
					  echo maketooltip("<img class=\"bag_icon\" src=\"".get_icon2($equip_bnk_bag_id[5][0])."\" alt=\"\" />", "$item_datasite{$equip_bnk_bag_id[5][0]}", get_item_tooltip2($equip_bnk_bag_id[5][0]), "item_tooltip", "target=\"_blank\"");
					  echo "SAC V<br /><font class=\"small\">({$equip_bnk_bag_id[5][1]} {$lang_item['slots']})</font>";
					}
					echo "</th><th>";
					if($equip_bnk_bag_id[6]){
					  echo maketooltip("<img class=\"bag_icon\" src=\"".get_icon2($equip_bnk_bag_id[6][0])."\" alt=\"\" />", "$item_datasite{$equip_bnk_bag_id[6][0]}", get_item_tooltip2($equip_bnk_bag_id[6][0]), "item_tooltip", "target=\"_blank\"");
					  echo "SAC VI<br /><font class=\"small\">({$equip_bnk_bag_id[6][1]} {$lang_item['slots']})</font>";
					}
					echo "</th><th>";
					if($equip_bnk_bag_id[7]){
					  echo maketooltip("<img class=\"bag_icon\" src=\"".get_icon2($equip_bnk_bag_id[7][0])."\" alt=\"\" />", "$item_datasite{$equip_bnk_bag_id[7][0]}", get_item_tooltip2($equip_bnk_bag_id[7][0]), "item_tooltip", "target=\"_blank\"");
					  echo "SAC VII<br /><font class=\"small\">({$equip_bnk_bag_id[7][1]} {$lang_item['slots']})</font>";
					}
					echo "</th>
					  <th></th>
					</tr>
					<tr>";
				  }

				  echo "<td class=\"bank\" align=\"center\">
					<div style=\"width:".(4*43)."px;height:".(ceil($equip_bnk_bag_id[$t][1]/4)*41)."px;\">";

				  $dsp=$equip_bnk_bag_id[$t][1]%4;
				  if ($dsp) echo "<div class=\"no_slot\" /></div>";
				  foreach ($bank[$t] as $pos => $item){
					echo "<div style=\"left:".(($pos+$dsp)%4*43)."px;top:".(floor(($pos+$dsp)/4)*41)."px;\">";
					echo maketooltip("<img src=\"".get_icon2($item[0])."\" alt=\"\" />", "$item_datasite{$item[0]}", get_item_tooltip2($item[0]), "item_tooltip", "target=\"_blank\"");
					$item[2] = $item[2] == 1 ? '' : $item[2];
					echo "<div style=\"width:25px;margin:-20px 0px 0px 18px;color: black; font-size:14px\">$item[2]</div><div style=\"width:25px;margin:-21px 0px 0px 17px;font-size:14px\">$item[2]</div></div>";
					}
				  echo "</td>";
				  }

				echo "<td class=\"bank\"></td></tr>
					</table>
					</div></center>";
				} 
				else
				{
					echo "erreur";
				}
			break;
			case "monnaie":
			require_once("../kernel/fonctions_armurerie.php");
			$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
			mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password'])or die(mysql_error());
			mysql_select_db($characters[1]['db']) or die(mysql_error());

			$result = mysql_query("SELECT account FROM `characters` WHERE guid = $id LIMIT 1");

			if (mysql_num_rows($result))
			{
				$result = mysql_query("SELECT ci.bag,ci.slot,ci.item,ci.item_template, SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', 15), ' ', -1) as stack_count FROM character_inventory ci INNER JOIN item_instance ii on ii.guid = ci.item WHERE ci.guid = $id AND ci.item_template IN(20558,20559,20560,29024,29434,40752,40753,42425,43228,43589,45624) ORDER BY ci.bag,ci.slot");
				echo "<p class=\"title\">les Marque d'honneurs</p>";
				if(mysql_num_rows($result) <= 0)
				{
					echo "<p>Ce rang n'existe pas !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
				else
				{
					echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th width=\"30\">Objet</th>
								<th width=\"30\">Quantité</th>
							</tr>";
					while($donnees = mysql_fetch_assoc($result))
					{
						$id_item = $donnees['item_template'];
						echo "<tr><td align=\"center\">";
						echo "<a href=\"http://fr.wowhead.com/?item=".$id_item."\"><img src=\"".get_icon2($id_item)."\" /></a>";
						echo "</td><td align=\"center\">";
						echo $donnees['stack_count'];
						echo "</td>";
						echo "</tr>";
					}
					echo "</table><br />";
				}
			} 
			else
			{
				echo "erreur";
			}
			break;
			case "supprimer":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
				mysql_select_db($characters[1]['db']) or die(mysql_error());			
				$reponse = mysql_query("SELECT * FROM characters WHERE guid='$id'") or die(mysql_error());
				$donnees = mysql_fetch_array($reponse);
				echo "<p class=\"title\">Êtes-vous sûr de vouloir supprimer le personnage : ".$donnees['name']." ?</p>";
				echo "
				<form action=\"index.php?module=perso&action=supprimer_v\" method=\"post\">
					<input type=\"hidden\" name=\"id\" value='$id'>
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"submit\" name=\"del\" value=\"Oui\">
				</form>
				<p><a href='index.php?module=perso'>Retour</a></p>";
			break;
			case "supprimer_v":
				verify_xsrf_token();
				$id = mysql_real_escape_string($_POST['id']);
				mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
				mysql_select_db($characters[1]['db']) or die(mysql_error());
				
				if (isset($id)) // Si les variables existent
				{
					if ($id != NULL) // Si on a quelque chose à enregistrer
					{
						mysql_query("DELETE FROM `characters` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_archievement_progress` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_action` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_aura` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_declinedname` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_gifts` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_homebind` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_inventory` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_queststatus` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_queststatus_daily` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_reputation` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_social` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_spell` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_spell_cooldown` WHERE guid=".$id);
						mysql_query("DELETE FROM `character_ticket` WHERE guid=".$id);
						mysql_query("DELETE FROM `corpse` WHERE guid=".$id);
						mysql_query("DELETE FROM `group_membre` WHERE memberGuid=".$id);
						mysql_query("DELETE FROM `guild_membre` WHERE guid=".$id);
						mysql_query("DELETE FROM `item_instance` WHERE owner_guid=".$id);
						mysql_query("DELETE FROM `petition` WHERE ownerguid=".$id);
						mysql_query("DELETE FROM `petition_sign` WHERE ownerguid=".$id);
						
						$guids2 = array();
						$reponse2 = mysql_query("SELECT * FROM `character_pet` WHERE owner=".$id);
						while ($donnees2 = mysql_fetch_array($reponse2) )
						{
							$guids2[] = $donnees2['id'];
						}
						mysql_query("DELETE FROM `character_pet` WHERE owner=".$id);
						mysql_query("DELETE FROM `character_pet_declinedname` WHERE owner=".$id);
						foreach($guids2 as $value2)
						{
							mysql_query("DELETE FROM `pet_aura` WHERE guid=".$value2);
							mysql_query("DELETE FROM `pet_spell` WHERE guid=".$value2);
							mysql_query("DELETE FROM `pet_spell_cooldown` WHERE guid=".$value2);
						}
							
						$guids3 = array();
						$reponse3 = mysql_query("SELECT * FROM `mail` WHERE receiver=".$id);
						while ($donnees2 = mysql_fetch_array($reponse3) )
						{
							$guids3[] = $donnees3['id'];
						}
						mysql_query("DELETE FROM `mail` WHERE receiver=".$id);
						mysql_query("DELETE FROM `mail_item` WHERE receiver=".$id);
						foreach($guids3 as $value3)
						{
							mysql_query("DELETE FROM `item_text` WHERE id=".$value3);
						}
						echo "<p>Le personnage a été supprimer</p>";
						echo "<a href='index.php?module=perso'>Retour</a>";
					}
					else
					{
						echo "erreur";
						echo "<a href='index.php?module=perso'>Retour</a>";
					}
				}
				else
				{
					echo "erreur2";
					echo "<a href='index.php?module=perso'>Retour</a>";
				}
			break;
			case "resultat";
				verify_xsrf_token();
				$perso = mysql_real_escape_string($_POST['perso']);
				$by = mysql_real_escape_string($_POST['by']);
				$retour_messages = mysql_query("SELECT * FROM characters WHERE $by LIKE'%$perso%'");
				echo "<p class=\"title\">Gestion des personnages</p><br />";
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th width=\"30\"></th>
								<th width=\"30\"></th>
								<th width=\"80\">ID du perso</th>
								<th width=\"80\">ID du compte</th>
								<th>Nom</th>
								<th width=\"80\">Classe</th>
								<th width=\"80\">Race</th>
							</tr>";
					while($donnees = mysql_fetch_assoc($retour_messages))
					{
						$id = $donnees['guid'];
						$class = $donnees['class'];
						$race = $donnees['race'];
						$account = $donnees['account'];
						echo "<tr><td align=\"center\">";
						echo "<a href=\"index.php?module=perso&action=supprimer&id=$id\"><img src='../images/delete.gif' /></a>";
						echo "</td><td align=\"center\">";
						echo "<a href=\"index.php?module=perso&action=editer&id=$id\"><img src='../images/edit.png' /></a>";
						echo "</td><td align=\"center\">";
						echo $donnees['guid'];
						echo "</td><td align=\"center\">";
						echo "<a href=\"index.php?module=compte_jeu&action=editer&id=$account\">$account</a>";
						echo "</td><td align=\"center\">";
						echo $donnees['name'];
						echo "</td><td align=\"center\">";
						echo "<img src='../images/races/$race-0.gif' />";
						echo "</td><td align=\"center\">";
						echo "<img src='../images/classes/$class.gif' />";
						echo "</td>";
						echo "</tr>";
					}
					echo "</table><br />";
			break;
			case "talents":
				include("../kernel/talents.php");
				mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
				mysql_select_db($characters[1]['db']) or die(mysql_error());
				
				$name = Securite::bdd($_GET['id']);
				if(!is_numeric($name))
				{
					$req = mysql_query("SELECT * FROM characters WHERE name = '$name'");
					$rep = mysql_fetch_array($req);
					$id = Securite::bdd($rep['guid']);
				} 
				else
				{ 
					$id = $name;
				}
				$result = mysql_query("SELECT spell FROM character_spell WHERE guid = ".$id." AND active = '1'");
				
				if (empty($id))
				{
					echo "<p>Erreur : Aucun nom/id de personnage détecté !</p>";
					echo "<p><a href=\"javascript:history.go(-1)\">Retour</a></p>";
				}
				else
				{
					if (isset($id)) // Si les variables existent
					{
						$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM `character_spell` WHERE `guid`='$id'") or die(mysql_error());
						$donnees = mysql_fetch_array($reponse);
						$test = Securite::bdd($donnees['nombre']);
						if ($test == 0)
						{
							echo "<p>Il n'y a aucun personnage qui a ce nom ou cet ID !!!</p>";
							echo "<p><a href=\"javascript:history.go(-1)\">Retour</a></p>";
						}
						else
						{
							echo "<p class=\"title\">Les talents du personnage</p><br />";
							echo "<table class=\"lined\" style=\"width: 550px;\">
								<tr>
									<th>".Securite::bdd($lang_char['talent_id'])."</th>
									<th align=left>".Securite::bdd($lang_char['talent_name'])."</th>
								</tr>";
								if ($GMP) { $talent_sum = gmp_init(0); }
								while ($talent = mysql_fetch_row($result))
								{	
									if( get_talent_value(Securite::bdd($talent[0])) )
									{
										echo "<tr><td>".Securite::bdd($talent[0])."</td><td align=left>".get_talent_name(Securite::bdd($talent[0]))."</td>";
										echo "</tr>";
									}
								}
							echo "</table>";
							echo "<p><a href=\"javascript:history.go(-1)\">Retour</a></p>";
						}
					}
					else  //Si il y a rien à enregistrer
					{
						echo "<p>Erreur !!!</p>";
						echo "<p><a href=\"javascript:history.go(-1)\">Retour</a></p>";
					}
				}
			break;
			case "skills": //compétence
				mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
				mysql_select_db($characters[1]['db']) or die(mysql_error());
				$skill_rank_array = array(
				  75 => $lang_char['apprentice'],
				  150 => $lang_char['journeyman'],
				  225 => $lang_char['expert'],
				  300 => $lang_char['artisan'],
				  350 => $lang_char['master'],
				  375 => $lang_char['inherent'],
				  450 => $lang_char['inherent'],
				  460 => $lang_char['wise']
				);
				$id = Securite::bdd($_GET['id']) OR Securite::bdd($_POST['id']);
				$perso = $id;
				if (empty($id))
				{
					echo "<p>Erreur : Aucun nom/id de personnage détecté !</p>";
					echo "<p><a href=\"javascript:history.go(-1)\">Retour</a></p>";
				}
				else
				{
					if (isset($id)) // Si les variables existent
					{
						//test si iduser existe
						$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM `characters` WHERE `name`='$perso' OR `guid`='$perso'") or die(mysql_error());
						$donnees = mysql_fetch_array($reponse);
						$test = Securite::bdd($donnees['nombre']);
						if ($test == 0)
						{
							echo "<p>Il n'y a aucun personnage qui a ce nom ou cet ID !!!</p>";
							echo "<p><a href=\"javascript:history.go(-1)\">Retour</a></p>";
						}
						else
						{
							$id = Securite::bdd($_POST['id']);
							$id = Securite::bdd($_GET['id']);
							$reponse2 = query("SELECT data,name,race,class,CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1)."), ' ', -1) AS UNSIGNED) AS level FROM `characters` WHERE `name`='$id' OR `guid`='$id' ") or die(mysql_error());
							$donnees2 = mysql_fetch_array($reponse2,MYSQL_ASSOC);
							mysql_close();
							$data = explode(' ',$donnees2['data']);
							echo "<p class=\"title\">Les compétences du personnage</p><br />";
							echo "<div align=\"center\">";
							echo "<table class=\"lined\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">";
							echo "<tr><td width=\"50\">ID</td><td width=\"150\">Compétance</td><td width=\"150\">Valeur</td></tr>";
							for ($i = 1012; $i <= 1012+384 ; $i+=3)
							{
								$sa = $i+1;
								$truc = unpack("S", pack("L", $data[$sa]));
								$truc = round($truc[1],2);
								$id = ($data[$i]& 0x0000FFFF);
								$max = ($truc < 76 ? 75 : ($truc < 151 ? 150 : ($truc < 226 ? 225 : ($truc < 301 ? 300 : ($truc < 351 ? 350 : ($truc < 376 ? 375 : ($truc < 451 ? 450 : 460)))))));
								$bar = ($truc / $max) * 100;	
								if(!empty($skill[$id]))
								{
									echo "<tr>
										<td>".$id."</td>
										<td>".$skill[$id]."</td>
										<td>
											<div class=\"bar-container\">
												<img class=\"ieimg\" height=\"1\" src=\"http://eu.wowarmory.com/images/pixel.gif\" width=\"1\"><b style=\" width: $bar%\"></b><span>$truc / $max</span>
											</div>
										</td>
									</tr>";
								}
								else
								{
									echo "";
								}
							}
							echo "</table>";
							echo "</div>";
							echo "<p><a href=\"javascript:history.go(-1)\">Retour</a></p>";
						}
					}
					else  //Si il y a rien à enregistrer
					{
						echo "<p>Erreur !!!</p>";
						echo "<p><a href=\"javascript:history.go(-1)\">Retour</a></p>";
					}
				}
			break;
			default:
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				
				$ParPage = $Par_Page; //Nous allons afficher 5 messages par page.
				//Une connexion SQL doit être ouverte avant cette ligne...
				$retour_total=mysql_query('SELECT COUNT(*) AS total FROM characters'); //Nous récupérons le contenu de la requête dans $retour_total
				$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
				$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
				//Nous allons maintenant compter le nombre de pages.
				$nombreDePages=ceil($total/$ParPage);
				
				if(isset($truc)) // Si la variable $_GET['page'] existe...
				{
					$pageActuelle=intval($truc);
					if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
					{
						$pageActuelle=$nombreDePages;
					}
				}
				else // Sinon
				{
					$pageActuelle=1; // La page actuelle est la n°1    
				}
				$premiereEntree=($pageActuelle-1)*$ParPage; // On calcul la première entrée à lire
			
				$retour_messages = mysql_query('SELECT * FROM characters ORDER BY guid ASC LIMIT '.$premiereEntree.', '.$ParPage.'');
				echo "<p class=\"title\">Gestion des personnages</p><br />";
				echo "
				<form action=\"index.php?module=perso&action=resultat\" method=\"POST\">Rechercher 
					<select name=\"by\">
						<option value=\"guid\">par ID du personnage</option>
						<option value=\"account\">par ID du compte</option>
						<option selected value=\"name\">par Nom du personnage</option>
					</select>
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"text\" name=\"perso\">
					<input type=\"submit\" value=\"Rechercher\">
				</form><br />";
					//Aperçu
					echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th width=\"30\"></th>
								<th width=\"30\"></th>
								<th width=\"80\">ID du perso</th>
								<th width=\"80\">ID du compte</th>
								<th>Nom</th>
								<th width=\"80\">Classe</th>
								<th width=\"80\">Race</th>
							</tr>";
					while($donnees = mysql_fetch_assoc($retour_messages))
					{
						$id = $donnees['guid'];
						$class = $donnees['class'];
						$race = $donnees['race'];
						$account = $donnees['account'];
						echo "<tr><td align=\"center\">";
						echo "<a href=\"index.php?module=perso&action=supprimer&id=$id\"><img src='../images/delete.gif' /></a>";
						echo "</td><td align=\"center\">";
						echo "<a href=\"index.php?module=perso&action=editer&id=$id\"><img src='../images/edit.png' /></a>";
						echo "</td><td align=\"center\">";
						echo $donnees['guid'];
						echo "</td><td align=\"center\">";
						echo "<a href=\"index.php?module=compte_jeu&action=editer&id=$account\">$account</a>";
						echo "</td><td align=\"center\">";
						echo $donnees['name'];
						echo "</td><td align=\"center\">";
						echo "<img src='../images/races/$race-0.gif' />";
						echo "</td><td align=\"center\">";
						echo "<img src='../images/classes/$class.gif' />";
						echo "</td>";
						echo "</tr>";
					}
					echo "</table><br />";
					 
					$max_pg = ceil($total / $ParPage); //le nombre de page maximum...en partant de 1
					$page_test = $truc; //la page que je suis rendu actuellement dans l;'affichage
					$nb = 9; //le nombre de résultats pour l'affichage TOUJOUR UN NOMBRE IMPERE.
					$nbm = ( $nb - 1 ) / 2;
					if (empty($page_test))
					{
						$page = 1;
					}
					else
					{
						$page = $page_test;
					}
					if ($max_pg == 1)
					{
						echo "<p>Page 1 sur 1</p>";
					}
					else
					{
						echo "<p><font size=\"-1\">Pages ".$page." sur ".($max_pg)."</font><br />";
						if ($nb > $max_pg) // Si moin de page que le nombre de résultats pour l'affichage
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte_jeu&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							for($i = 1 ; $i < $max_pg+1 ; $i++)
							{
								if($i == $page)
								{
									echo ' <b><a>'.$i.'</a></b>';
								}
								else
								{
									echo ' <a href="index.php?module=compte_jeu&page='.$i.'">'.$i.'</a>';
								}
							}
							echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?module=compte_jeu&page='.($page+1).'">Suivante --></a></p>' : '';
						}
						elseif ($page <= $nbm) // les premieres pages
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte_jeu&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							for($i = 1 ; $i < $nb+1 ; $i++)
							{
								if($i == $page)
								{
									echo ' <b><a>'.$i.'</a></b>';
								}
								else
								{
									echo ' <a href="index.php?module=compte_jeu&page='.$i.'">'.$i.'</a>';
								}
							}
							echo " ...<a href=\"index.php?module=compte_jeu&page=".($max_pg)."\">".($max_pg)."</a>";
							echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?module=compte_jeu&page='.($page+1).'">Suivante --></a></p>' : '';
						}
						elseif ($page >= $max_pg - $nbm) // les dernieres pages
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte_jeu&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							echo '<a href="index.php?module=compte_jeu&page=1">1</a>... ';
							for($i = $max_pg-($nb-1) ; $i < $max_pg+1 ; $i++)
							{
								if($i == $page)
								{
									echo ' <b><a>'.$i.'</a></b>';
								}
								else
								{
									echo ' <a href="index.php?module=compte_jeu&page='.$i.'">'.$i.'</a>';
								}
							}
							echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?module=compte_jeu&page='.($page+1).'">Suivante --></a></p>' : '';
						}
						else // les autres pages
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte_jeu&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							echo '<a href="index.php?module=compte_jeu&page=1">1</a>... ';
							for($i = 1 ; $i < $nbm+1 ; $i++)
							{
								$i_page = $page - ($nbm+1) + $i;
								echo ' <a href="index.php?module=compte_jeu&page='.$i_page.'">'.$i_page.'</a>';
							}
							echo ' <b><a>'.$page.'</a></b>';
							for($i = 1 ; $i < $nbm+1 ; $i++)
							{
								$i_page = $page + $i;
								echo ' <a href="index.php?module=compte_jeu&page='.$i_page.'">'.$i_page.'</a>';
							}
							echo " ...<a href=\"index.php?module=compte_jeu&page=".($max_pg)."\">".($max_pg)."</a>";
							echo ($page != $max_pg-1 ) ? '&nbsp;&nbsp;<a href="index.php?module=compte_jeu&page='.($page+1).'">Suivante --></a></p>' : '';
						}
					}
			break;
		}
	}
	else
	{
		echo "<p>Ce module est désactivé, merci de voir avec l'administrateur !</p>";
		echo "<a href=\"../index.php\">Retour</a>";
	}
}
elseif(Securite::bdd($_SESSION['auth']) != "yes")
{ 
	header("location: ../index.php");
	exit();
}
elseif(Securite::bdd($_SESSION['gmlevel']) <= $rep['config_value2'])
{
	echo "<p>".Securite::bdd($_SESSION['username'])." vous n'êtes pas autorisé à accéder à cette partie !</p>";
	echo "<a href=\"../index.php\">Retour</a>";
}
else
{
	echo "<p>Erreur</p>";
	echo "<a href=\"../index.php\">Retour</a>";;
}	
?>
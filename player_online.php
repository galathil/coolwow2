<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
$royaume = royaume(Securite::get($_GET['royaume']));
include("kernel/id_tab.php");
echo "<p class=\"title\">$titre_connecter</p>";

mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
mysql_select_db($realmd['db']) or die(mysql_error());
$reponse = mysql_query("SELECT * FROM `realmlist`") or die(mysql_error());
mysql_close();

	while ($donnees = mysql_fetch_array($reponse,MYSQL_ASSOC))
	{
		mysql_connect($characters[$donnees['id']]['host'], $characters[$donnees['id']]['user'], $characters[$donnees['id']]['password']) or die(mysql_error());
		mysql_select_db($characters[$donnees['id']]['db']) or die(mysql_error());
		$reponse2 = mysql_query("SELECT COUNT(*) AS nombre FROM characters WHERE online= 1") or die(mysql_error());
		$donnees2 = mysql_fetch_array($reponse2);
		$online = $donnees2['nombre'];
		mysql_close();
		echo "<b><a href=\"index.php?module=connectes&royaume=".$donnees['id']."\">Il y a $online joueurs connectés sur :  ".$donnees['name']."</a></b><br>";
	}
	echo "<br />";

	mysql_connect($characters[$royaume]['host'], $characters[$royaume]['user'], $characters[$royaume]['password']) or die(mysql_error());
	mysql_select_db($characters[$royaume]['db']) or die(mysql_error());
	
	if($gm_visible_list == 1)
	{
		$reponse2 = mysql_query("SELECT c.guid,c.name,c.race,c.class,c.zone,c.map,c.gender,c.level,r.gmlevel,
		CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(c.data, ' ', ".(CHAR_DATA_OFFSET_ARENA_POINTS+1)."), ' ', -1) AS UNSIGNED) AS highest_rank,
		CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(c.data, ' ', ".(CHAR_DATA_OFFSET_GUILD_ID+1)."), ' ', -1) AS UNSIGNED) as GNAME
		FROM ".$characters[$royaume]['db'].".characters c LEFT OUTER JOIN ".$realmd['db'].".account r ON r.id=c.account
		WHERE c.online = 1");
	}
	else
	{
		$reponse2 = mysql_query("SELECT c.guid,c.name,c.race,c.class,c.zone,c.map,c.gender,c.level,r.gmlevel,
		CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(c.data, ' ', ".(CHAR_DATA_OFFSET_ARENA_POINTS+1)."), ' ', -1) AS UNSIGNED) AS highest_rank,
		CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(c.data, ' ', ".(CHAR_DATA_OFFSET_GUILD_ID+1)."), ' ', -1) AS UNSIGNED) as GNAME
		FROM ".$characters[$royaume]['db'].".characters c LEFT OUTER JOIN ".$realmd['db'].".account r ON r.id=c.account
		WHERE c.online = 1 AND r.gmlevel = 0");
	}
	echo "
	<table class=\"lined\" style=\"border-collapse: collapse\"; width=\"99%\" border=\"1\" cellpadding=\"3\" cellspacing=\"0\" align=\"center\" class=\"sortable\">
	<tr>
	<th width=\"120\">" . $lang_player['name'] . "</th>
	<th width=\"30\">" . $lang_player['race'] . "</th>
	<th width=\"30\">" . $lang_player['class'] . "</th>
	<th width=\"30\">" . $lang_player['level'] . "</th>
    <th width=\"30\">" . $lang_player['rank'] . "</th>
	<th width=\"30\">" . $lang_player['faction'] . "</th>
	<th width=\"200\">" . $lang_player['guilde'] . "</th>
	<th width=\"80\">" . $lang_player['map'] . "</th>
	<th width=\"250\">" . $lang_player['zone'] . "</th>
	</tr>";

	$reponse5 = mysql_query("SELECT COUNT(*) AS nombre FROM characters WHERE online= 1") or die(mysql_error());
	$donnees5 = mysql_fetch_array($reponse5);
	$test_online = $donnees5['nombre'];
	
	if ($test_online == 0)
	{
		echo "<tr><td colspan=\"9\">" . $lang_player['no_online'] . "</td></tr>";
	}
	else
	{
		while($char = mysql_fetch_array($reponse2))
		{
			mysql_connect($characters[$royaume]['host'], $characters[$royaume]['user'], $characters[$royaume]['password']) or die(mysql_error());
			mysql_select_db($characters[$royaume]['db']) or die(mysql_error());
			$reponse4 = mysql_query("SELECT name FROM guild WHERE guildid=".$char['GNAME'].";");
			$guild_name = mysql_fetch_row($reponse4);
			
			echo "
			<tr>
				<td align=\"center\"><a href=\"armurerie-select.php?perso=".$char['name']."\">".$char['name']."</a></td>
				<td align=\"center\"><img src='images/races/".$char['race']."-".$char['gender'].".gif' onmousemove='toolTip(\"".get_player_race($char['race'])."\",\"item_tooltip\")' onmouseout='toolTip()' /></td>
				<td align=\"center\"><img src='images/classes/".$char['class'].".gif' onmousemove='toolTip(\"".get_player_class($char['class'])."\",\"item_tooltip\")' onmouseout='toolTip()' /></td>
				<td align=\"center\">".$char['level']."</td>
				<td align=\"center\"><span onmouseover='toolTip(\"".$CHAR_RANK[$CHAR_RACE[$char['race']][1]][pvp_ranks($char['highest_rank'])]."\",\"item_tooltip\")' onmouseout='toolTip()' style='color: white;'><img src='images/ranks/rank".pvp_ranks($char['highest_rank'],$CHAR_RACE[$char['race']][1]).".gif'></span></td>
				<td align=\"center\"><span onmousemove='toolTip(\"".$CHAR_FACTION[$char['race']]."\",\"item_tooltip\")' onmouseout='toolTip()'>";
			side($char['race']);
			echo "</span></td>
				<td align=\"center\"><a href=\"index.php?module=guildes&action=membres&id=".$char['guid']."\">".$guild_name[0]."</a></td>
				<td align=\"center\">".get_map_name($char['map'])."</td>
				<td align=\"center\">".get_zone_name($char['zone'])."</td>
			</tr>";
		}
	}
   echo "</table><br />";
?>
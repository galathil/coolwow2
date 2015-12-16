<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

if($_SESSION['auth'] == "yes")
{	
	switch ($_GET['action'])
	{
		case "voir_equipe":
			mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
			mysql_select_db($characters[1]['db']) or die(mysql_error());
			
			$arenateam_id = Securite::get($_GET['id']);
			
			function count_days( $a, $b ) {
			$gd_a = getdate( $a );
			$gd_b = getdate( $b );
			$a_new = mktime( 12, 0, 0, $gd_a['mon'], $gd_a['mday'], $gd_a['year'] );
			$b_new = mktime( 12, 0, 0, $gd_b['mon'], $gd_b['mday'], $gd_b['year'] );
			return round( abs( $a_new - $b_new ) / 86400 );
			}
			
			$query = mysql_query("SELECT arenateamid, name FROM arena_team WHERE arenateamid = '$arenateam_id'");
			if(mysql_num_rows($query) <= 0)
			{
				echo "Cette équipe n'existe pas !";
			}
			else
			{
				$arenateam_data = mysql_fetch_row($query);
				$query = mysql_query("SELECT arenateamid, rating, games, wins, played, wins2, rank FROM arena_team_stats WHERE arenateamid = '$arenateam_id'");
				$arenateamstats_data = mysql_fetch_row($query);
				$members = mysql_query("
				SELECT DISTINCT arena_team_member.guid,characters.name,
				characters.name, SUBSTRING_INDEX(SUBSTRING_INDEX(characters.data, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1)."), ' ', -1) AS level,
				arena_team_member.played_week, arena_team_member.wons_week, arena_team_member.played_season, arena_team_member.wons_season
				FROM arena_team_member,characters
				LEFT JOIN arena_team_member k1 ON k1.guid = characters.guid
				WHERE arena_team_member.arenateamid = '$arenateam_id' AND arena_team_member.guid = characters.guid");

				@$total_members = mysql_num_rows($members);
				@$losses_week = $arenateamstats_data[4]-$arenateamstats_data[3];
				@$winperc_week = ($arenateamstats_data[4]/$arenateamstats_data[3]) * 100;
				@$losses_season = $arenateamstats_data[6]-$arenateamstats_data[5];
				@$winperc_season = ($arenateamstats_data[6]/$arenateamstats_data[5]) * 100;
				
				echo "
				<center>
				<p class=\"title\">{$lang_arenateam['arenateam']}</p><br />
				<table class=\"lined\" style=\"width: 910px;\">
					<tr class=\"bold\">
						<td colspan=\"11\">$arenateam_data[1]</td>
					</tr>
					<tr>
				         <td colspan=\"11\">{$lang_arenateam['tot_members']}: $total_members</td>
				    </tr>
					<tr>
						<td colspan=\"3\">{$lang_arenateam['this_week']}</td>
					    <td colspan=\"2\">{$lang_arenateam['games_played']} : $arenateamstats_data[3]</td>
					    <td colspan=\"2\">{$lang_arenateam['games_won']} : $arenateamstats_data[4]</td>
				        <td colspan=\"2\">{$lang_arenateam['games_lost']} : $losses_week</td>
				        <td colspan=\"2\">{$lang_arenateam['ratio']} : $winperc_week %</td>
				    </tr>
				    <tr>
						<td colspan=\"3\">{$lang_arenateam['this_season']}</td>
					    <td colspan=\"2\">{$lang_arenateam['games_played']} : $arenateamstats_data[5]</td>
					    <td colspan=\"2\">{$lang_arenateam['games_won']} : $arenateamstats_data[6]</td>
				        <td colspan=\"2\">{$lang_arenateam['games_lost']} : $losses_season</td>
				        <td colspan=\"2\">{$lang_arenateam['ratio']} : $winperc_season %</td>
				    </tr>
				  <tr>
				     <td colspan=\"11\">{$lang_arenateam['standings']} {$arenateamstats_data[7]} ( {$arenateamstats_data[2]})</td>
				  </tr>
				  <tr>
					<th width=\"21%\">{$lang_arenateam['name']}</th>
				    <th width=\"3%\">Race</th>
					<th width=\"3%\">Class</th>
					<th width=\"3%\">{$lang_arenateam['level']}</th>
					<th width=\"15%\">Last Login (Days)</th>
					<th width=\"3%\">Online</th>
					<th width=\"12%\">{$lang_arenateam['played_week']}</th>
					<th width=\"12%\">{$lang_arenateam['wons_week']}</th>
					<th width=\"12%\">{$lang_arenateam['played_season']}</th>
					<th width=\"12%\">{$lang_arenateam['wons_season']}</th>
				  </tr>";
				while ($member = mysql_fetch_row($members))
				{
					$query = mysql_query("SELECT `race`,`class`,`online`, `account`, `logout_time`, SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1)."), ' ', -1) AS level, mid(lpad( hex( CAST(substring_index(substring_index(data,' ',".(CHAR_DATA_OFFSET_SEX+1)."),' ',-1) as unsigned) ),8,'0'),4,1) as gender FROM `characters` WHERE `name` = '$member[1]';");
					$online = mysql_fetch_row($query);
					$accid = $online[3];
					$llogin = count_days($online[4], time());
					$level = $online[5];
				   		echo " <tr>
						<td>$member[1]</td>
						<td><img src='images/races/{$online[0]}-{$online[6]}.gif' onmousemove='toolTip(\"".get_player_race($online[0])."\",\"item_tooltip\")' onmouseout='toolTip()' /></td>
						<td><img src='images/classes/{$online[1]}.gif' onmousemove='toolTip(\"".get_player_class($online[1])."\",\"item_tooltip\")' onmouseout='toolTip()' /></td>
						<td>$level</td>
						<td>$llogin</td>
						<td>".(($online[2]) ? "<img src=\"images/online.gif\" alt=\"\" />" : "-")."</td>
						<td>$member[4]</td>
						<td>$member[5]</td>
						<td>$member[6]</td>
						<td>$member[7]</td>
					</tr>";
				}
				echo "</table><br />";
			}
			mysql_close();
		break;
		default:
			mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
			mysql_select_db($characters[1]['db']) or die(mysql_error());
			
			$query_1 = mysql_query("SELECT count(*) FROM arena_team");
			$all_record = mysql_result($query_1,0);
			$query = mysql_query(
			"SELECT arena_team.arenateamid AS atid,  arena_team.name AS atname, arena_team.captainguid AS lguid, arena_team.type AS attype,
			(SELECT name FROM `characters` WHERE guid = lguid) AS l_name,(SELECT COUNT(*) FROM  arena_team_member WHERE arenateamid = atid) AS tot_chars,
			rating AS atrating, games as atgames, wins as atwins
			FROM arena_team, arena_team_stats
			WHERE arena_team.arenateamid = arena_team_stats.arenateamid");
			
			$this_page = mysql_num_rows($query);
			echo "<center><table class=\"lined\">
		   <tr>
			<th width=\"5%\">{$lang_arenateam['id']}</th>
			<th width=\"22%\">{$lang_arenateam['arenateam_name']}</th>
			<th width=\"10%\">{$lang_arenateam['captain']}</th>
			<th width=\"7%\">{$lang_arenateam['type']}</th>
			<th width=\"7%\">{$lang_arenateam['members']}</th>
			<th width=\"7%\">{$lang_arenateam['arenateam_online']}</th>
			<th width=\"7%\">{$lang_arenateam['rating']}</th>
			<th width=\"7%\">{$lang_arenateam['games']}</th>
			<th width=\"7%\">{$lang_arenateam['wins']}</th>
			</tr>";
			
			if ($all_record < 1)
			{
				echo "<tr><td colspan=\"9\">Il n'y a aucun membre dans cette équipe !</td></tr>";
			}
			else
			{
				while ($data = mysql_fetch_row($query))
				{
					$gonline = mysql_query("SELECT count(*) AS GCNT  FROM `arena_team_member`, `characters`, `arena_team` WHERE arena_team.arenateamid = ".$data[0]." AND arena_team_member.arenateamid = arena_team.arenateamid AND arena_team_member.guid = characters.guid AND characters.online = 1;");
					$arenateam_online = mysql_result($gonline,"GCNT");

				   	echo "<tr>
						<td>$data[0]</td>
						<td><a href=\"index.php?module=equipes_arene&action=voir_equipe&id=$data[0]\">$data[1]</a></td>
						<td>$data[4]</td>
						<td>{$lang_arenateam[$data[3]]}</td>
						<td>$data[5]</td>
						<td>$arenateam_online</td>
						<td>$data[6]</td>
				 		<td>$data[7]</td>
				 		<td>$data[8]</td>
				    </tr>";
				}
			}
			echo "<tr><td colspan=\"9\" class=\"hidden\" align=\"right\">{$lang_arenateam['tot_teams']} : $all_record</td></tr>
		   </table></center>";
			mysql_close();
		break;
	}
}
else
{
	echo "<p>Page réservée aux membres !<br />";
	echo "connectez-vous ou inscrivez-vous !</p>";
	echo "<a href=\"index.php\">Retour</a>";
}
?>
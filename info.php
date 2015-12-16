<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

$icon_type = Array(
	0 => $lang_information['normal'],
	1 => $lang_information['pvp'],
	4 => $lang_information['normal'],
	6 => $lang_information['rp'],
	8 => $lang_information['rppvp']
);

echo "<div class=\"title\">$titre_info</div><br>";
echo "Processeur : ".$config_serveur['cpu']."<br />";
echo "Mémoire : ".$config_serveur['ram']."<br />";
echo "Connexion : ".$config_serveur['connexion']."<br /><br />";

setlocale(LC_TIME, "fr");
echo "$lang_information[time]</strong><br />".strftime('%H:%M:%S %d-%B-%Y').'<br />';

mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
mysql_select_db($realmd['db']) or die(mysql_error());
$reponse = mysql_query("SELECT uptime, starttime FROM `uptime` ORDER BY `uptime`.`starttime` DESC") or die(mysql_error());
$donnees = mysql_fetch_array($reponse);
$temps = $donnees['uptime'];
$day = floor($temps / 86400);
if($day > 0)
  $days = $day.'j';
else
  $days = '';
$hours = floor(($temps - ($day * 86400)) / 3600);
if($hours < 10)
  $hours = '0'.$hours;
$min = floor(($temps - (($hours * 3600) + ($day * 86400))) / 60);
if ($min < 10)
    $min = "0".$min;

$sec = $temps - ($day * 86400) - ($hours * 3600) - ($min * 60);
if ($sec < 10)
    $sec = "0".$sec;
echo "<br />$lang_information[server_online]<br />".$days.$hours.'h'.$min.'m'.$sec.'s<br /><br /><br />';

echo "<div class=\"title\">Les Records du Serveur</div>";
mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
mysql_select_db($realmd['db']) or die(mysql_error());
$reponse3 = mysql_query("SELECT * FROM `uptime` ORDER BY `uptime` DESC LIMIT 1") or die(mysql_error());
$donnees3 = mysql_fetch_array($reponse3);
$max_uptime = $donnees3['uptime'];
$reponse4 = mysql_query("SELECT * FROM `uptime` ORDER BY `maxplayers` DESC LIMIT 1") or die(mysql_error());
$donnees4 = mysql_fetch_array($reponse4);
$maxplayers = $donnees4['maxplayers'];

$day2 = floor($max_uptime / 86400);
if($day2 > 0)
  $days2 = $day2.'Jours';
else
  $days2 = '';
$hours2 = floor(($max_uptime - ($day2 * 86400)) / 3600);
if($hours2 < 10)
  $hours2 = '0'.$hours2;
$min2 = floor(($max_uptime - (($hours2 * 3600) + ($day2 * 86400))) / 60);
if ($min2 < 10)
    $min2 = "0".$min2;

$sec2 = $max_uptime - ($day2 * 86400) - ($hours2 * 3600) - ($min2 * 60);
if ($sec2 < 10)
    $sec2 = "0".$sec2;
echo "Temps max sans plantage: ".$days2.$hours2.'h'.$min2.'m'.$sec2.'s<br />';
echo "Nombre max de joueurs connecté en même temps: $maxplayers<br /><br />";

mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
mysql_select_db($realmd['db']) or die(mysql_error());
$reponse = mysql_query("SELECT * FROM `realmlist`") OR DIE(mysql_error());
mysql_close();

echo "<div class=\"title\">Liste des royaumes</div><br />";
?>
<div>
<table width="99%" border="1" cellpadding="2" cellspacing="0" align="center" class="sortable">
	<tr>
		<th class='rankingHeader' align='center' nowrap='nowrap' width=10%>ID</th>
		<th class='rankingHeader' align='center' nowrap='nowrap' width=10%>Statuts</th>
		<th class='rankingHeader' align='center' nowrap='nowrap' width=50%>Nom du Royaume</th>
		<th class='rankingHeader' align='center' nowrap='nowrap' width=10%>Type</th>
		<th class='rankingHeader' align='center' nowrap='nowrap' width=20%>Population</th>
	</tr>
	<?php
	while ($donnees = mysql_fetch_array($reponse,MYSQL_ASSOC))
	{
	mysql_connect($characters[$donnees['id']]['host'], $characters[$donnees['id']]['user'], $characters[$donnees['id']]['password']) or die(mysql_error());
	mysql_select_db($characters[$donnees['id']]['db']) or die(mysql_error());
	$reponse2 = mysql_query("SELECT COUNT(*) AS nombre FROM `characters`") or die(mysql_error());
	$donnees2 = mysql_fetch_array($reponse2);
	$pop = $donnees2['nombre'];
	mysql_close();
	
	echo "<tr><td align=\"center\">";
	echo $donnees['id'];
	echo "</td><td align=\"center\">";
	$fserv=@fsockopen($serveur[1]['host'],$donnees['port'],$errno,$errstr,1);
	if($fserv)
	{
		echo "<img src='images/online.gif' alt='' />";
	}
	else
	{
		echo "<img src='images/offline.gif' alt='' />";
	}
	echo "</td><td align=\"center\">";
		if($fserv)
	{
		echo "<b><a href=\"index.php?module=royaume&id=".$donnees['id']."\">".$donnees['name']."</a></b>";
	}
	else
	{
		echo "<b><a href=\"index.php?module=royaume&id=".$donnees['id']."\">".$donnees['name']."</a></b>";
	}
	echo "</td><td align=\"center\">";
	echo $icon_type[$donnees['icon']];
	echo "</td><td align=\"center\">";
	echo $pop;
	echo "</td></tr>";
}
?>
</table>
</div>
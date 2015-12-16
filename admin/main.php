<?php
//BDD Mangos
mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
mysql_select_db($realmd['db']) or die(mysql_error());

$reponse = mysql_query("SELECT uptime, starttime FROM `uptime` ORDER BY `uptime`.`starttime` DESC") or die("erreur1");
$reponse2 = mysql_query("SELECT * FROM `uptime` ORDER BY `uptime` DESC LIMIT 1") or die("erreur2");
$reponse3 = mysql_query("SELECT * FROM `uptime` ORDER BY `maxplayers` DESC LIMIT 1") or die("erreur3");

$donnees = mysql_fetch_array($reponse);
$donnees2 = mysql_fetch_array($reponse2);
$donnees3 = mysql_fetch_array($reponse3);

$max_uptime = $donnees2['uptime'];
$temps = $donnees3['uptime'];
$maxplayers = $donnees3['maxplayers'];


//BDD Characters
mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
mysql_select_db($characters[1]['db']) or die(mysql_error());
$reponse4 = mysql_query("SELECT COUNT(*) AS nombre FROM `characters` WHERE `online`='1'") or die("erreur4");
$reponse5 = mysql_query("SELECT COUNT(*) AS nombre FROM `characters`") or die("erreur5");
//$reponse6 = mysql_query("SELECT COUNT(*) AS nombre FROM `characters` WHERE `extra_flags`>='1' AND `online`='1'") or die("erreur1");
	
$donnees4 = mysql_fetch_array($reponse4);
$donnees5 = mysql_fetch_array($reponse5);
//$donnees6 = mysql_fetch_array($reponse6);

$perso = $donnees5['nombre'];
//BDD Realmd
mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
mysql_select_db($realmd['db']) or die(mysql_error());

$reponse7 = mysql_query("SELECT COUNT(*) AS royaume FROM `realmlist`") or die(mysql_error());
$reponse8 = mysql_query("SELECT * FROM `realmlist`") or die(mysql_error());
$reponse9 = mysql_query("SELECT COUNT(*) AS nombre FROM `account`") or die();
$reponse10 = mysql_query("SELECT COUNT(*) AS nombre FROM `account` WHERE `gmlevel`>='1'") or die();

$donnees7 = mysql_fetch_array($reponse7);	
$donnees9 = mysql_fetch_array($reponse9);
$donnees10 = mysql_fetch_array($reponse10);
	

$compte = $donnees9['nombre'];
$gm = $donnees10['nombre'];
$royaume = $donnees7['royaume'];
$gmon = "0";

$day = floor($temps / 86400);
if($day > 0)
  $days = $day.' jours ';
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

$day2 = floor($max_uptime / 86400);
if($day2 > 0)
  $days2 = $day2.' jours ';
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
	
echo "<p class=\"title\">$lang_stat[welcome_admin] ".Securite::bdd($_SESSION['username'])."</p><br />";
echo "<p class=\"title\">$lang_stat[chiffre] :</p><br />";
setlocale(LC_TIME, "fr");
echo "$lang_stat[server_time] : <b>".strftime('%H:%M:%S %d-%B-%Y').'</b><br />';
echo "$lang_stat[server_online] : <b>".$days.$hours.' h '.$min.' m</b><br />';
echo "$lang_stat[max_uptime] : <b>".$days2.$hours2.' h '.$min2.' m</b><br />';
echo "$lang_stat[max_player_online] : <b>$maxplayers</b><br />";
echo "<br />";
echo $lang_stat['total_player_online'];
echo "$lang_stat[nombre_royaume] : <b>$royaume</b><br /><br />";

while ($donnees8 = mysql_fetch_array($reponse8,MYSQL_ASSOC))
{
	mysql_connect($characters[$donnees8['id']]['host'], $characters[$donnees8['id']]['user'], $characters[$donnees8['id']]['password']) or die(mysql_error());
	mysql_select_db($characters[$donnees8['id']]['db']) or die(mysql_error());
	
	$reponse11 = mysql_query("SELECT COUNT(*) AS nombre FROM characters WHERE online= 1") or die(mysql_error());
	
	$donnees11 = mysql_fetch_array($reponse11);
	
	$online = $donnees11['nombre'];
	
	echo "$lang_stat[there_are] <b>$online</b> $lang_stat[player_in] :  <b>".$donnees8['name']."</b><br>";
}
echo "$lang_stat[there_are] <b>$gmon</b> $lang_stat[gm_online]<br />";
echo "$lang_stat[there_are_total] <b>$perso</b> $lang_stat[perso_in_royaume]<br />";
echo "$lang_stat[there_are_total] <b>$gm</b> $lang_stat[gm_in_royaume]<br />";
echo "<br />";

// NE PAS TOUCHER LES LIGNE QUI SUIT
$fp = fopen("http://coolwow.free.fr/version.php", 'r') or die('impossible de se connecter au serveur CoolWoW');
$test = fgets($fp, 1024);
$test2 = str_replace(' Finale', "", $test);
$vers = str_replace(' Finale', "", $version);

echo "Vous utilisez actuellement CoolWoW $version<br />";
if($vers >= $test2)
{
	echo "<b><font color='green'>Votre version est à jour !</font></b>";
}
else
{
	echo "<b><font color='red'>Votre version n'est pas à jour<br />";
	echo "CoolWoW $test est disponible !</font></b>";
}
?>
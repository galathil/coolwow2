<?php
session_start();
require_once("../kernel/config.php");
require_once("../lang/$language.php");
require_once("../kernel/fonctions.php");
$securite = "ok";
$adressip = Securite::bdd($_SERVER['REMOTE_ADDR']);
$datetime = date("Y-m-d H:i:s"); 

mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());

$retour = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM bansite WHERE ip_ban = '$adressip'") or die(mysql_error());
$donnees = mysql_fetch_array($retour);
$nb = Securite::bdd($donnees['nbre_entrees']);

if ($nb == 1)
{
	echo "Vous avez été banni de ce site !!!";
}
else
{
	mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
	mysql_select_db($coolwow['db']) or die(mysql_error());
	$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_administrateur"');
	$rep = mysql_fetch_array($req);
	if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
	{
		if($rep['config_value'] == 1)
		{
			mysql_query("INSERT INTO log_login (type_conn,id_account,ip,date,module) VALUES ('admin','".$_SESSION['id']."','".$adressip."','".$datetime."','".$_GET['module']."')");
			include("header.php");
			require("../themes/header_theme_admin.php");
			switch ($_GET['module'])
			{
				case 'news':
					@include 'news.php';
				break;
				case 'additem':
					include 'additem.php';
				break;
				case 'compte':
					@include 'compte.php';
				break;
				case 'compte_jeu':
					@include 'compte_jeu.php';
				break;
				case 'chatbox':
					@include 'chatbox.php';
				break;
				case 'ban':
					@include 'ban.php';
				break;
				case 'forums':
					@include 'forums.php';
				break;
				case 'groupes':
					@include 'groupes.php';
				break;
				case 'droits_forums':
					@include 'droits_forums.php';
				break;
				case 'bugs':
					@include 'bugs.php';
				break;
				case 'rangs':
					@include 'rangs.php';
				break;
				case 'boutique':
					include 'boutique.php';
				break;
				case 'avatars':
					@include 'avatars.php';
				break;
				case 'perso':
					include 'perso.php';
				break;
				case 'bank_guilde':
					include 'bank_guilde.php';
				break;
				case 'compte_active':
					include 'compte_active.php';
				break;
				case 'perso_move':
					include 'perso_move.php';
				break;
				case 'votes':
					include 'votes.php';
				break;
				case 'clean':
					include 'clean.php';
				break;
				case 'commandes':
					include 'commandes.php';
				break;
				case 'teleport':
					include 'teleport.php';
				break;
				case 'configuration':
					include 'configuration.php';
				break;
				case 'sondages':
					include 'sondages.php';
				break;
				case 'logs':
					include 'logs.php';
				break;
				case 'shell':
					include 'shell.php';
				break;
				default:
					include("main.php");
				break;
			}
		}
		else
		{
			include("header_simple.php");
			require("../themes/header_theme_admin.php");
			echo "<p>La partie d'administration est désactivé, merci de voir avec l'administrateur.</p>";
			echo "<a href=\"../index.php\">Retour</a>";
		}
	}
	elseif(Securite::bdd($_SESSION['auth']) != "yes")
	{
		header("location: ../login.php");
		exit();
	}
	elseif(Securite::bdd($_SESSION['gmlevel']) <= $gmlevel)
	{
		include("header_simple.php");
		require("../themes/header_theme_admin.php");
		echo "<p>".Securite::bdd($_SESSION['username'])." vous n'êtes pas autorisé à accéder à cette partie !</p>";
		echo "<a href=\"../index.php\">Retour</a>";
	}
	else
	{
		include("header_simple.php");
		require("../themes/header_theme_admin.php");
		echo "<p>Erreur<p>";
		echo "<a href=\"../index.php\">Retour</a>";
	}
}
require("../themes/footer_theme_admin.php");
require("footer.php");
?>
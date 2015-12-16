<?php
session_start();
if(file_exists("kernel/config.php") AND is_dir("install"))
{
	header("location: erreur.php?err=probleme_install");
	exit();
}
elseif(file_exists("kernel/config.php") AND !is_dir("install"))
{
	require_once("kernel/config.php");
	require_once("kernel/fonctions.php");
	if(empty($_SESSION['lang']) or !isset($_SESSION['lang']))
	{
		$lang_site = $language;
	}
	else
	{
		$lang_site = $_SESSION['lang'];
	}
	require_once("lang/$lang_site.php");
	$securite = "ok";
	login(0);
	if ($_GET['module'] == "map")
	{
		$bloc_left = 0;
		$bloc_right = 0;
		$largeur = "1040px";
	}
	elseif ($_GET['module'] == "forums")
	{
		$bloc_left = 0;
		$bloc_right = 0;
		$largeur = "80%";
	}
	else
	{
		if($bloc_left == 0 AND $bloc_right == 0)
		{
			$largeur = "70%";
		}
		else
		{
			$largeur = "90%";
		}
	}
	
	mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
	mysql_select_db($coolwow['db']) or die(mysql_error());
	$adressip = Securite::bdd($_SERVER['REMOTE_ADDR']);
	

	$retour = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM bansite WHERE ip_ban = '$adressip'") or die(mysql_error());
	$donnees = mysql_fetch_array($retour);
	$nb = Securite::bdd($donnees['nbre_entrees']);

	if ($nb == 1)
	{
		echo "Vous avez été banni de ce site !!!";
	}
	else
	{
		require("header.php");
		require("themes/header_theme.php");
		
					switch ($_GET['module'])
					{
						case 'armurerie':
							include("armurerie.php");
							break;
						case 'vente':
							include("vente.php");
							break;
						case 'gamers':
							include("gamers.php");
							break;
						case 'info':
							include("info.php");
							break;
						case 'compte':
							include("compte.php");
							break;
						case 'connectes':
							include("player_online.php");
							break;
						case 'honneur':
							include("honneur.php");
							break;
						case 'teamspeak':
							include("teamspeak.php");
							break;
						case 'guildes':
							include("guildes.php");
							break;
						case 'guildes_membres':
							include("guildes_membres.php");
							break;
						case 'deblocage':
							include("deblocage.php");
							break;
						case 'map':
							include("map.php");
							break;
						case 'contact':
							include("contact.php");
							break;
						case 'royaume':
							include("royaume.php");
							break;
						case 'chatbox':
							include("chatbox.php");
							break;
						case 'talents':
							include("talents.php");
							break;
						case 'bugs':
							include("bugs.php");
							break;
						case 'mon_compte':
							include("mon_compte.php");
							break;
						case 'ban':
							include("ban.php");
							break;
						case 'forums':
							include("forums.php");
							break;
						case 'profil':
							include("profil.php");
							break;
						case 'membres':
							include("membres.php");
							break;
						case 'groups':
							include("groups.php");
							break;
						case 'messagerie':
							include("messagerie.php");
							break;
						case 'vote':
							include("vote.php");
							break;
						case 'boutique':
							include("boutique.php");
							break;
						case 'boutique2':
							include("boutique2.php");
							break;
						case 'top_vote':
							include("top_vote.php");
							break;
						case 'equipes_arene':
							include("equipes_arene.php");
							break;
						case 'migration':
							include("migration.php");
							break;
						case 'atlas':
							include("atlas.php");
							break;
						case 'raid':
							include("raid.php");
							break;
						case 'sondages':
							include("sondages.php");
							break;
						case 'test':
							include("test.php");
							break;
						case 'session_test':
							include("session_test.php");
							break;
						case 'version':
							echo "<p class=\"title\">Ce site est motorisé par CoolWoW $version<br /><br /><a href=\"http://www.coolxp.fr\">Visité le site du créateur</a></p>".$_SESSION['id']."";
							break;
						default:
							include("news.php");
							break;
					}
		require("themes/footer_theme.php");
		require("footer.php");
	}
}
else
{
	if(file_exists("install/index.php"))
	{
		header("location: install/index.php");
		exit();
	}
	else
	{
		header("location: erreur.php?err=probleme_technique");
		exit();
		//echo "<p>Le site rencontre actuellement quelques problemes technique,<br />Merci de repasser plutard !!!</p>";
	}
}
?>
<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_configuration"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "forums":
				$config_name = array(
				"avatar_maxsize" => "Taille maximale de l'avatar:",
				"avatar_maxh" => "Hauteur maximale de l'avatar:",
				"avatar_maxl" => "Largeur maximale de l'avatar:",
				"sign_maxl" => "Taille maximale de la signature:",
				"auth_bbcode_sign" => "Autoriser le bbcode dans la signature:",
				"pseudo_maxsize" => "Taille maximale du pseudo:",
				"pseudo_minsize" => "Taille minimale du pseudo:",
				"topic_par_page" => "Nombre de topics par page:",
				"post_par_page" => "Nombre de posts par page:"
				);
				
				echo "<p class=\"title\">Configuration du forum</p>";
				echo "<form method=\"post\" action=\"index.php?module=forums&action=config_v\">";
				echo "<table>";
				$requete_config= mysql_query('SELECT config_name, config_value FROM forum_config') or die(mysql_error());
				while($data_config = mysql_fetch_array($requete_config))
				{
					echo "<tr>";
					echo "<td align=\"left\">".$config_name[$data_config['config_name']]."</td>";
					echo "<td align=\"left\"><input type=\"text\" name=\"".$data_config['config_name']."\" value=\"".$data_config['config_value']."\" size=\"6\"></td>"; 
					echo "</tr>";
				}
				echo "</table>
				<p><input type=\"submit\" value=\"Enregistrer\" /></p></form>";
			break;
			case "site":
				switch ($_GET['c'])
				{
					default:
						echo "<p class=\"title\">Configuration du site</p><br /><br />";
						echo "<a href=\"index.php?module=configuration&action=site&c=module_site\">Gérer les modules du site</a><br />";
						echo "<a href=\"index.php?module=configuration&action=site&c=module_admin\">Gérer les modules de l'administration</a><br />";
						echo "<a href=\"index.php?module=configuration&action=site&c=acces_admin\">Gérer les accès de l'administration</a><br />";
					break;
					case "module_site":
						$config_name = array(
						"module_player_online" => "Module Joueurs en ligne :",
						"module_map" => "Module Carte des Joueurs :",
						"module_armory" => "Module L'armurerie :",
						"module_auctionhouse" => "Module L'hôtel des ventes :",
						"module_gamer" => "Module Les persos du serveur :",
						"module_info" => "Module Information sur le serveur :",
						"module_honor" => "Module Les points d'honneur :",
						"module_arene" => "Module Les équipes d'arène :",
						"module_guilde" => "Module Les guildes du serveur :",
						"module_talent" => "Module Simulateur de talents :",
						"module_teamspeak" => "Module Notre serveur teamspeak :",
						"module_unblock" => "Module Débloquer un perso :",
						"module_bugs" => "Module Signaler un bug :",
						"module_atlas" => "Module Atlas intéractif :",
						"module_raid" => "Module Les Raids :",
						"module_boutique" => "Module La boutique :",
						"module_forum" => "Module Forums :",
						"module_chatbox" => "Module Tchatbox :",
						"module_contact" => "Module Contact :",
						"module_membres" => "Module Membres du site :",
						"module_top_vote" => "Module Top des votants :",
						"module_vote" => "Module Vote :",
						"module_compte" => "Module Création d'un compte :",
						"module_mon_compte" => "Module Mon compte :",
						"module_migration" => "Module Migrer vers Woltk :",
						"module_messagerie" => "Module Messages privés :",
						);
						
						echo "<p class=\"title\">Gérer les modules du site</p>
						1 = activé, 0 = désactivé<br />";
						echo "<form method=\"post\" action=\"index.php?module=configuration&action=site&c=module_site_v\">";
						echo "<table>";
						$requete_config= mysql_query('SELECT * FROM site_config') or die(mysql_error());
						while($data_config = mysql_fetch_array($requete_config))
						{
							echo "<tr>";
							echo "<td align=\"left\">".$config_name[$data_config['config_name']]."</td>";
							echo "<td align=\"left\"><input type=\"text\" name=\"".$data_config['config_name']."\" value=\"".$data_config['config_value']."\" size=\"6\"></td>";
							echo "</tr>";
						}
						echo "</table>
						<p><input type=\"submit\" value=\"Enregistrer\" /></p></form>";
					break;
					case "module_site_v":
						echo "<p class=\"title\">Gérer les modules du site</p>";
						$requete_config= mysql_query('SELECT config_name, config_value FROM site_config');
						while($data_config = mysql_fetch_assoc($requete_config))
						{
							if ($data_config['config_value'] != $_POST[$data_config['config_name']])
							{
								$valeur = mysql_real_escape_string(htmlspecialchars($_POST[$data_config['config_name']], ENT_QUOTES));
								mysql_query("UPDATE site_config SET config_value = '".$valeur."'
								WHERE config_name = '".$data_config['config_name']."'");
							}
						}
						echo'<p>Les nouvelles configurations ont été mises à jour !<br />Cliquez <a href="index.php?module=configuration&action=site">ici</a> pour revenir à l administration</p>';
					break;
					case "module_admin":
						$config_name = array(
						"module_adm_commandes" => "Module Liste des commandes :",
						"module_adm_teleport" => "Module Point de téléportation :",
						"module_adm_clean" => "Module Nettoyage BD :",
						"module_adm_perso_move" => "Module Déplacer un personnage :",
						"module_adm_compte_active" => "Module Compte attende d'activation :",
						"module_adm_news" => "Module Les news :",
						"module_adm_bugs" => "Module Les bugs:",
						"module_adm_compte" => "Module Les comptes :",
						"module_adm_chatbox" => "Module La tchatbox :",
						"module_adm_ban" => "Module Le bannissement :",
						"module_adm_avatars" => "Module Les avatars :",
						"module_adm_votes" => "Module Les points de vote :",
						"module_adm_dons" => "Module Les dons :",
						"module_adm_compte_jeu" => "Module Les comptes du jeu :",
						"module_adm_perso" => "Module Les personnages :",
						"module_adm_additem" => "Module Ajouter un objet:",
						"module_adm_bank_guilde" => "Module Les banques de guilde:",
						"module_adm_boutique" => "Module Gérer la boutique :",
						"module_adm_forums" => "Module Le forum :",
						"module_adm_forums_groupes" => "Module Les groupes du forum :",
						"module_adm_forums_droits" => "Module Les droits du forum :",
						"module_adm_forums_rank" => "Module Les rangs du forum :",
						"module_administrateur" => "Module Administration:",
						"module_adm_configuration" => "Module de Configuration:",
						"module_adm_sondages" => "Module de Sondage :",
						"module_adm_logs" => "Module des logs :",
						"module_adm_Shell" => "Module Shell :",
						);
						
						echo "<p class=\"title\">Gérer les états des modules de l'administration</p>
						1 = activé, 0 = désactivé<br />";
						echo "<form method=\"post\" action=\"index.php?module=configuration&action=site&c=module_admin_v\">";
						echo "<table>";
						$requete_config= mysql_query('SELECT * FROM site_config_admin') or die(mysql_error());
						while($data_config = mysql_fetch_array($requete_config))
						{
							echo "<tr>";
							echo "<td align=\"left\">".$config_name[$data_config['config_name']]."</td>";
							echo "<td align=\"left\"><input type=\"text\" name=\"".$data_config['config_name']."\" value=\"".$data_config['config_value']."\" size=\"6\"></td>";
							echo "</tr>";
						}
						echo "</table>
						<p><input type=\"submit\" value=\"Enregistrer\" /></p></form>";
					break;
					case "module_admin_v":
						echo "<p class=\"title\">Gérer les modules de l'administration</p>";
						$requete_config= mysql_query('SELECT config_name, config_value FROM site_config_admin');
						while($data_config = mysql_fetch_assoc($requete_config))
						{
							if ($data_config['config_value'] != $_POST[$data_config['config_name']])
							{
								$valeur = mysql_real_escape_string(htmlspecialchars($_POST[$data_config['config_name']], ENT_QUOTES));
								mysql_query("UPDATE site_config_admin SET config_value = '".$valeur."'
								WHERE config_name = '".$data_config['config_name']."'");
							}
						}
						echo'<p>Les nouvelles configurations ont été mises à jour !<br />Cliquez <a href="index.php?module=configuration&action=site">ici</a> pour revenir à l administration</p>';
					break;
					case "acces_admin":
					$config_name = array(
						"module_adm_commandes" => "Module Liste des commandes :",
						"module_adm_teleport" => "Module Point de téléportation :",
						"module_adm_clean" => "Module Nettoyage BD :",
						"module_adm_perso_move" => "Module Déplacer un personnage :",
						"module_adm_compte_active" => "Module Compte attende d'activation :",
						"module_adm_news" => "Module Les news :",
						"module_adm_bugs" => "Module Les bugs:",
						"module_adm_compte" => "Module Les comptes :",
						"module_adm_chatbox" => "Module La tchatbox :",
						"module_adm_ban" => "Module Le bannissement :",
						"module_adm_avatars" => "Module Les avatars :",
						"module_adm_votes" => "Module Les points de vote :",
						"module_adm_dons" => "Module Les dons :",
						"module_adm_compte_jeu" => "Module Les comptes du jeu :",
						"module_adm_perso" => "Module Les personnages :",
						"module_adm_additem" => "Module Ajouter un objet:",
						"module_adm_bank_guilde" => "Module Les banques de guilde:",
						"module_adm_boutique" => "Module Gérer la boutique :",
						"module_adm_forums" => "Module Le forum :",
						"module_adm_forums_groupes" => "Module Les groupes du forum :",
						"module_adm_forums_droits" => "Module Les droits du forum :",
						"module_adm_forums_rank" => "Module Les rangs du forum :",
						"module_administrateur" => "Module Administration:",
						"module_adm_configuration" => "Module de Configuration:",
						"module_adm_sondages" => "Module de Sondage :",
						"module_adm_logs" => "Module des logs :",
						"module_adm_shell" => "Module Shell :",
						);
						
						echo "<p class=\"title\">Gérer les accès des modules de l'administration</p>";
						echo "<form method=\"post\" action=\"index.php?module=configuration&action=site&c=acces_admin_v\">";
						echo "<table>";
						$requete_config= mysql_query('SELECT * FROM site_config_admin') or die(mysql_error());
						while($data_config = mysql_fetch_array($requete_config))
						{
							echo "<tr>";
							echo "<td align=\"left\">".$config_name[$data_config['config_name']]."</td>";
							echo "<td align=\"left\"><input type=\"text\" name=\"".$data_config['config_name']."\" value=\"".$data_config['config_value2']."\" size=\"6\"></td>";
							echo "</tr>";
						}
						echo "</table>
						<p><input type=\"submit\" value=\"Enregistrer\" /></p></form>";
					break;
					case "acces_admin_v":
						echo "<p class=\"title\">Gérer les modules de l'administration</p>";
						$requete_config= mysql_query('SELECT config_name, config_value FROM site_config_admin');
						while($data_config = mysql_fetch_assoc($requete_config))
						{
							if ($data_config['config_value2'] != $_POST[$data_config['config_name']])
							{
								$valeur = mysql_real_escape_string(htmlspecialchars($_POST[$data_config['config_name']], ENT_QUOTES));
								mysql_query("UPDATE site_config_admin SET config_value2 = '".$valeur."'
								WHERE config_name = '".$data_config['config_name']."'");
							}
						}
						echo'<p>Les nouvelles configurations ont été mises à jour !<br />Cliquez <a href="index.php?module=configuration&action=site">ici</a> pour revenir à l administration</p>';
					break;
				}
			break;
			default:
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
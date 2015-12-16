<?php
$min_version = '5.5.0'; // min version supported

// error_reporting(E_ALL & ~E_NOTICE);
// $version = "3.0 Finale";
// $date = "28/11/2009";

function cryptme($nbr)
{
	$str = "";
	$chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYabcdefghijklmnpqrstuvwxy0123456789";
	srand((double)microtime()*1000000);
	for($i=0; $i<$nbr; $i++) 
	{
		$str .= $chaine[rand()%strlen($chaine)];
	}
	return $str;
}


require_once 'vues/head.php';

switch ($_GET['etape'])
{
	// Welcome page
	default:
		require_once 'vues/step_0.php';
	break;

	// Checking php compatibility
	case "1":
		$b_min_version = version_compare(PHP_VERSION, $min_version) >= 0 ? true : false;
		$b_register_globals_disabled = ini_get('register_globals')==false || (ini_get('register_globals')==true && ini_get('register_globals')!='1') ? true : false;
		$b_lib_gd = extension_loaded('gd') || extension_loaded('gd2') ? true : false;
		$b_rewrite_module = in_array('mod_rewrite', apache_get_modules()) ? true : false;
		require_once 'vues/step_1.php';
	break;
	case "2":
		echo "
		<p class=\"title\">Etape 2 : Configuration</p>
		<br />
		<p>Avant toute chose, nous allons commencer par la configuration.</p>
		<form action=\"index.php?etape=3\" method=\"post\">
		<h2>Configuration de l'émulateur</h2>
			<fieldset>
				<legend align=top>Configurationde des bases de données</legend>
				<h3>Base de données realmlist</h3>
					<table>
						<tr>
							<td>Adresse de la base de données :</td>
							<td><input type=\"text\" name=\"realmd_host\" value=\"localhost:3306\"></td>
						</tr>
						<tr>
							<td>Utilisateur de la base de données  :</td>
							<td><input type=\"text\" name=\"realmd_user\" value=\"root\"></td>
						</tr>
						<tr>
							<td>Mot de passe de la base de données :</td>
							<td><input type=\"text\" name=\"realmd_password\" value=\"\"></td>
						</tr>
						<tr>
							<td>Nom de la base de données :</td>
							<td><input type=\"text\" name=\"realmd_db\" value=\"realmd\"></td>
						</tr>
					</table>
				<br />
				<h3>Base de données mangos</h3>
				<table>
					<tr>
						<td>Adresse de la base de données :</td>
						<td><input type=\"text\" name=\"mangos_host\" value=\"localhost:3306\"></td>
					</tr>
					<tr>
						<td>Utilisateur de la base de données  :</td>
						<td><input type=\"text\" name=\"mangos_user\" value=\"root\"></td>
					</tr>
					<tr>
						<td>Mot de passe de la base de données :</td>
						<td><input type=\"text\" name=\"mangos_password\" value=\"\"></td>
					</tr>
					<tr>
						<td>Nom de la base de données :</td>
						<td><input type=\"text\" name=\"mangos_db\" value=\"mangos\"></td>
					</tr>
				</table>
				<br />
				<h3>Base de données characters</h3>
				<table>
					<tr>
						<td>Adresse de la base de données :</td>
						<td><input type=\"text\" name=\"characters_host\" value=\"localhost:3306\"></td>
					</tr>
					<tr>
						<td>Utilisateur de la base de données  :</td>
						<td><input type=\"text\" name=\"characters_user\" value=\"root\"></td>
					</tr>
					<tr>
						<td>Mot de passe de la base de données :</td>
						<td><input type=\"text\" name=\"characters_password\" value=\"\"></td>
					</tr>
					<tr>
						<td>Nom de la base de données :</td>
						<td><input type=\"text\" name=\"characters_db\" value=\"characters\"></td>
					</tr>
				</table>
				<br />
				<h3>Base de données Coolwow (le site)</h3>
				<table>
					<tr>
						<td>Adresse de la base de données :</td>
						<td><input type=\"text\" name=\"coolwow_host\" value=\"localhost:3306\"></td>
					</tr>
					<tr>
						<td>Utilisateur de la base de données  :</td>
						<td><input type=\"text\" name=\"coolwow_user\" value=\"root\"></td>
					</tr>
					<tr>
						<td>Mot de passe de la base de données :</td>
						<td><input type=\"text\" name=\"coolwow_password\" value=\"\"></td>
					</tr>
					<tr>
						<td>Nom de la base de données :</td>
						<td><input type=\"text\" name=\"coolwow_db\" value=\"coolwow\"></td>
					</tr>
				</table>
			</fieldset>
			<br />
			<fieldset>
				<legend align=top>Informations sur le serveur</legend>
				<table>
					<tr>
						<td>Version du client ?</td>
						<td>
							<select name=\"client\">
								<option value=\"330\" selected=\"selected\">3.3.0 ou 3.3.2</option>
								<option value=\"322\">3.2.2 ou 3.2.2</option>
								<option value=\"313\">313</option>
								<option value=\"309\">309</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Adresse IP externe du serveur : </td>
						<td><input type=\"text\" name=\"serveur_host\" value=\"85.10.10.10\" /></td>
					</tr>
					<tr>
						<td>Port du serveur de jeux: </td>
						<td><input type=\"text\" name=\"serveur_port\" value=\"8085\" /></td>
					</tr>
					<tr>
						<td>Port du serveur d'authentification (realmd): </td>
						<td><input type=\"text\" name=\"serveur_login_port\" value=\"3724\" /></td>
					</tr>
					<tr>
						<td>Realmlist du serveur (juste l'adresse): </td>
						<td><input type=\"text\" name=\"realmlist\" /></td>
					</tr>
					<tr>
						<td>Core du serveur : </td>
						<td><input type=\"text\" name=\"serveur_core\" value=\"Mangos xxxx\" /></td>
					</tr>
					<tr>
						<td>Core du serveur : </td>
						<td><input type=\"text\" name=\"serveur_db\" value=\"UDB 0.1x.x rev 350\" /></td>
					</tr>
					<tr>
						<td>Scripts du serveur : </td>
						<td><input type=\"text\" name=\"serveur_scripts\" value=\"SD2-xxx\" /></td>
					</tr>
					<tr>
						<td>CPU du serveur : </td>
						<td><input type=\"text\" name=\"serveur_cpu\" value=\"Intel\" /></td>
					</tr>
					<tr>
						<td>RAM du serveur : </td>
						<td><input type=\"text\" name=\"serveur_ram\" value=\"512 Mo\" /></td>
					</tr>
					<tr>
						<td>Connexion du serveur : </td>
						<td><input type=\"text\" name=\"serveur_connexion\" value=\"100 Mbits/s\" /></td>
					</tr>
				</table>
			</fieldset>
			<br />
			<fieldset>
				<legend align=top>Configurationde de la console</legend>
				<table>
					<tr>
						<td>Adresse IP du serveur : </td>
						<td><input type=\"text\" name=\"shell_host\" value=\"127.0.0.1\" /></td>
					</tr>
					<tr>
						<td>Port de la console : </td>
						<td><input type=\"text\" name=\"shell_port\" value=\"3443\" /></td>
					</tr>
					<tr>
						<td>Compte console : </td>
						<td><input type=\"text\" name=\"shell_user\" value=\"\" /></td>
					</tr>
					<tr>
						<td>Mots de passe de console : </td>
						<td><input type=\"text\" name=\"shell_password\" value=\"\" /></td>
					</tr>
				</table>
			</fieldset>
			<br />
			<h2>Configurationde du site :</h2>
			<fieldset>
				<legend align=top>Le site</legend>
				<table>
					<tr>
						<td>Clé de sécurité du site:</td>
						<td><input type=\"text\" name=\"security_key\" value=\"".cryptme(20)."\"> Je conseille 20 caractères, chiffres et lettres minimum</td>
					</tr>
					<tr>
						<td>Nom du serveur : </td>
						<td><input type=\"text\" name=\"serveur_name\" value=\"Nom du serveur\" /></td>
					</tr>
					<tr>
						<td>Nom du site : </td>
						<td><input type=\"text\" name=\"site_name\" value=\"Nom du site\" /></td>
					</tr>
					<tr>
						<td>Message de bienvenue :</td>
						<td><input type=\"text\" name=\"welcome_message\" value=\"Bienvenue sur ...\" /></td>
					</tr>
					<tr>
						<td>Nombre de news par page :</td>
						<td><input type=\"text\" name=\"news_par_page\" value=\"10\" /></td>
					</tr>
					<tr>
						<td>Nombre d'éléments par page :</td>
						<td><input type=\"text\" name=\"par_page\" value=\"50\" /></td>
					</tr>
					<tr>
						<td>Nombre de message dans la chatbox :</td>
						<td><input type=\"text\" name=\"chatbox_message\" value=\"100\"/></td>
					</tr>
					<tr>
						<td>Voulez vous activer le system de vote ?</td>
						<td>
							<select name=\"vote_active\">
								<option value=\"1\" selected=\"selected\">Oui</option>
								<option value=\"0\" >Non</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Email de l'administrateur :</td>
						<td><input type=\"text\" name=\"mail_admin\" value=\"\"/></td>
					</tr>
					<tr>
						<td>Email de contact :</td>
						<td><input type=\"text\" name=\"mail_contact\" value=\"\"/></td>
					</tr>
					<tr>
						<td>Niveau requis pour l'Administration :</td>
						<td><input type=\"text\" name=\"admin_gmlevel\" value=\"3\"/></td>
					</tr>
				</table>
			</fieldset>
			<br />
			<fieldset>
				<legend align=top>Le forum</legend>
				<table>
					<tr>
						<td>Utiliser le forum du site ?</td>
						<td>
							<select name=\"forum_actif\">
								<option value=\"oui\" selected=\"selected\">Oui</option>
								<option value=\"non\" >Non</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Lien vers le forum externe (si non): </td>
						<td><input type=\"text\" name=\"forum_lien\" value=\"http://\" /></td>
					</tr>
					<tr>
						<td>Nombre de message par page : </td>
						<td><input type=\"text\" name=\"forum_page\" value=\"15\" /></td>
					</tr>
				</table>
			</fieldset>
			<br />
			<fieldset>
				<legend align=top>Autres</legend>
				<table>
					<tr>
						<td>Nombre de compte par mail :</td>
						<td><input type=\"text\" name=\"compte_par_mail\" value=\"1\"/></td>
					</tr>
					<tr>
						<td>Adresse smpt :</td>
						<td><input type=\"text\" name=\"smtp_host\" /></td>
					</tr>
					<tr>
						<td>Nom du compte smtp :</td>
						<td><input type=\"text\" name=\"smtp_user\" /></td>
					</tr>
					<tr>
						<td>Mot de passe smtp :</td>
						<td><input type=\"text\" name=\"smtp_password\" /></td>
					</tr>
				</table>
				<br />
				<table>
					<tr>
						<td>Adresse du serveur teamspeak :</td>
						<td><input type=\"text\" name=\"teamspeak_host\" /></td>
					</tr>
					<tr>
						<td>Port du serveur teamspeak :</td>
						<td><input type=\"text\" name=\"teamspeak_port\" value=\"64\" /></td>
					</tr>
					<tr>
						<td>Temps d'actualisation teamspeak :</td>
						<td><input type=\"text\" name=\"teamspeak_actu\" value=\"30\" /></td>
					</tr>
				</table>
			</fieldset>
		<br />
		<center><input type=\"submit\" name=\"etape_2\" value=\"Suivant\"></center>
		</form></p>";
	break;
	case "3":
		$fichier = fopen('../kernel/config.php', 'w+');
$config = '<?php
error_reporting(E_ALL & ~E_NOTICE);
/*
* Nom du projet: CoolWoW
* Version: 3.0
* Date: '.$date.'
* Author: CiRvEnT
* Copyright: CiRvEnT
*/
 
$version = "' . $version . '";

### CONFIGURATION DES BASE DE DONNEES ######################################################################################################
$realmd = Array(
	\'host\' => "'.$_POST['realmd_host'].'",	//SQL server IP:port this realmd located on
	\'user\' => "'.$_POST['realmd_user'].'",			//SQL server login this realmd located on
	\'password\' => "'.$_POST['realmd_password'].'",			//SQL server pass this realmd located on
	\'db\' => "'.$_POST['realmd_db'].'",		//realmd DB name
	\'encoding\' => "utf8" 		//SQL connection encoding
);

$mangos = Array(
	1 => array(		//position in array must represent realmd ID
			\'id\' => 1,					//Realm ID
			\'host\' => "'.$_POST['mangos_host'].'",	//SQL server IP:port this DB located on
			\'user\' => "'.$_POST['mangos_user'].'",			//SQL server login this DB located on
			\'password\' => "'.$_POST['mangos_password'].'",			//SQL server pass this DB located on
			\'db\' => "'.$_POST['mangos_db'].'",			//World Database name
			\'encoding\' => "utf8" 		//SQL connection encoding
			),
);	

$characters = Array(
	1 => array(		//position in array must represent realmd ID
			\'id\' => 1,					//Realm ID
			\'host\' => "'.$_POST['characters_host'].'",	//SQL server IP:port this DB located on
			\'user\' => "'.$_POST['characters_user'].'",			//SQL server login this DB located on
			\'password\' => "'.$_POST['characters_password'].'",			//SQL server pass this DB located on
			\'db\' => "'.$_POST['characters_db'].'",			//World Database name
			\'encoding\' => "utf8" 		//SQL connection encoding
			),
);

$coolwow = Array(
	\'host\' => "'.$_POST['coolwow_host'].'",	//SQL server IP:port this realmd located on
	\'user\' => "'.$_POST['coolwow_user'].'",			//SQL server login this realmd located on
	\'password\' => "'.$_POST['coolwow_password'].'",			//SQL server pass this realmd located on
	\'db\' => "'.$_POST['coolwow_db'].'",			//realmd DB name
	\'encoding\' => "utf8" 		//SQL connection encoding
);
### INFORMATION SUR LE SERVEUR ######################################################################################################
$serveur = Array(	//if more than one realm used, even if they are on same system new subarray MUST be added.
	1 => array(		//position in array must represent realmd ID, same as in $mangos_db
			\'host\' => "'.$_POST['serveur_host'].'",		//Game Server IP - Must be external address
			\'port\' => "'.$_POST['serveur_port'].'",		//Game Server port
			\'login_port\' => "'.$_POST['serveur_login_port'].'",		//Login Server port
			\'term_type\' => "SSH",		//Terminal type - ("SSH"/"Telnet")
			\'term_port\' => 22,				//Terminal port
			\'core\' => "'.$_POST['serveur_core'].'", //Mangos rev. used
			\'bdd\' => "'.$_POST['serveur_db'].'",
			\'scripts\' => "'.$_POST['serveur_scripts'].'",
			),
);

$config_serveur = Array(
	\'cpu\' => "'.$_POST['serveur_cpu'].'",
	\'ram\' => "'.$_POST['serveur_ram'].'",
	\'connexion\' => "'.$_POST['serveur_connexion'].'",
);

$shell = Array(
	\'host\' => "'.$_POST['shell_host'].'",	//Adresse du serveur
	\'port\' => "'.$_POST['shell_port'].'",			//Port utiliser par la console
	\'user\' => "'.$_POST['shell_user'].'",		//Compte MJ/ADIM du jeu
	\'password\' => "'.$_POST['shell_password'].'"		//Mot de passe du compte
);

$security_key = "'.$_POST['security_key'].'";  //20 caracteres minimun, chiffres et lettres
$language = "french"; //Langage
$site_encoding = "UTF-8"; 	//default encoding

$template_icons = "gris"; //couleur des icones lorsque il n\'y a pas d\'equipement ("marron" ou "gris)"
$server_path = "http://monsite/index.php";
$server_name = "'.$_POST['serveur_name'].'";	//nom du site
$realmlist = "'.$_POST['realmlist'].'"; //realmlist du serveur
$version_jeu = "Serveur Woltk 3.2.2a"; //version du jeu dans le bloc d\'info

$client = '.$_POST['client'].'; // Version du client
$level_max = 80; // Niveau Max de Personnage

### CONFIGURATION DU THEME #######################################################################################################
$theme = "1"; //Numero du thème
$Par_Page = '.$_POST['par_page'].';
$News_Par_Page = '.$_POST['news_par_page'].'; //nombre de News par page.

$bloc_left = 1; // 1 = afficher le bloc de gauche, 0= cacher
$bloc_right = 1; // 1 = afficher le bloc de droit, 0= cacher

## CONFIGURATION DES DROITS D\'ACCES AU PARTIE ADMIN #######################################################################################
$gm_visible_list = 0; // Afficher le MJ dans la liste des joueurs en ligne (0= non, 1=oui)
$gm_visible_map = 0; // Afficher le MJ sur la map (0= non, 1=oui)

## OPTION DU FORUM ##############################################################################################################
$forum_actif = "'.$_POST['forum_actif'].'"; // mettre non pour utiliser un forum externe
$forum_lien = "'.$_POST['forum_lien'].'";	//adresse du forum ex: "http://mangos.serveur.free.fr/modules.php?name=Forums"
$message_par_page = '.$_POST['forum_page'].'; //Nombre de message par page
$gmlevel = '.$_POST['admin_gmlevel'].'; //niveau du joueur pour accéder a la partia admin.

## CREATION DE COMPTES ###########################################################################################################
$compte_mail = '.$_POST['compte_par_mail'].'; //nombre de compte autoriser par adresse mail.
$valide_compte = 1; // validation de compte par mail

## CONFIGURATION MAIL ###########################################################################################################
$admin_mail = "'.$_POST['mail_admin'].'";	//mail used for bug reports and other user contact
$from_mail = "'.$_POST['mail_contact'].'"; 	//all emails will be sent from this email
$reply_mail = "'.$_POST['mail_contact'].'";
$abus_mail = "abuse@mail.com"; //important pour l\'envoi des mail.
$type_envoi = "smtp"; //choix entre "stmp" ou "mail" (pout utiliser la fonction mail.
//smtp server config
$smtp_cfg = array(
			\'host\' => "'.$_POST['smtp_host'].'",	//smtp server
			\'port\' => 25,				//port
			\'user\' => "'.$_POST['smtp_user'].'",				//username - use only if auth. required
			\'password\' => "'.$_POST['smtp_password'].'",				//pass
			);

## CONFIGURATTION MAP ############################################################################################################
$maps_for_points = "0,1,530,571,609";
$realm_name = $server_name; //NE PAS TOUCHER
$lang = \'en\';
$show_gm_online = 0; //afficher le MG sur 
$add_gm_suffix = 0; //afficher MG a coter du nom
$show_status = 0; //NE PAS TOUCHER
$time_to_show_uptime = 10000; //NE PAS TOUCHER
$time_to_show_maxonline = 10000; //NE PAS TOUCHER
$server = $serveur[1][\'host\']; //NE PAS TOUCHER
$port = $serveur[1][\'port\']; //NE PAS TOUCHER
$time= "120"; //Temps d\'actualisation
$show_time="1"; //Afficher le compteur

// 2.4.3 :
// UNIT_FIELD_LEVEL   = 34
// UNIT_FIELD_BYTES_0 = 36
// PLAYER_FLAGS       = 236
// 3.0.3 :
$UNIT_FIELD_BYTES_0 = 22;
$UNIT_FIELD_LEVEL   = 53;
$PLAYER_FLAGS   = 150;

## CONFIGURATION DE LA CHATBOX ######################################################################################################
$nb_max_message = '.$_POST['chatbox_message'].'; //Maximum de message enregistré
$actu_chat = 60; //Temp d\'actualisation ( 60 = 1 minute)

## CONFIGURATION DE LA FENETRE DE VOTE #################################################################################################
$vote_active = '.$_POST['vote_active'].'; //activation de la fenetre de vote (1= activé, 0=désactivé).
$nb_point_par_vote = 1; // Nombre de point par vote

$logo_vote = "images/logo_vote.gif"; //chemin vers votre logo
$texte_vote = "Soutenez nous en votant pour le serveur $server_name ! Agrandissons notre communauté, et défions les instances ensemble !";

$lien_vote = "http://www.rpg-paradize.com/page_vote-xxxx"; // lien du site de vote.
$lien_texte_vote = "Top-wow.fr des serveurs privés wow";

$lien_vote2 = "http://www.root-top.com/topsite/major/in.php?ID=xxx"; // lien du site de vote.
$lien_texte_vote2 = "Root-top 50 des serveur privés WoW";

$lien_vote3 = "http://www.root-top.com/topsite/major/in.php?ID=xxx"; // lien du site de vote.
$lien_texte_vote3 = "Root-top 25 des serveur privés WoW";

## CONFIGURATION DE TEAMSPEAK #######################################################################################################
$serveraddress = "'.$_POST['teamspeak_host'].'";
$serverudpport = "'.$_POST['teamspeak_port'].'"; //port par défaut
$autorefresh_time = "'.$_POST['teamspeak_actu'].'"; //temps t\'actualisation en seconde.

//---- External Links ----
$item_datasite = "http://fr.wowhead.com/?item=";
$quest_datasite = "http://fr.wowhead.com/?quest=";
$creature_datasite = "http://fr.wowhead.com/?npc=";
$spell_datasite = "http://fr.wowhead.com/?spell=";
$skill_datasite = "http://fr.wowhead.com/?spells=";
$talent_datasite = "http://fr.wowhead.com/?spell=";
$go_datasite = "http://fr.wowhead.com/?object=";
$get_icons_from_web = true; //wherever to get icons from the web in case they are missing in /img/INV dir.

//Titre des pages
$titre = "Bienvenue sur '.$_POST['site_name'].'";
$welcome_message = "'.$_POST['welcome_message'].'";	//message de bienvenue
$titre_connecter = "Joueur en ligne sur '.$_POST['site_name'].'";
$titre_honor = "Honneur des personnages";
$titre_armurerie = "Bienvenue dans l\'armurerie de '.$_POST['site_name'].'";
$titre_map = "Carte des joueurs en ligne";
$titre_info = "Informations sur $server_name";
$titre_info_royaume = "Informations sur le royaume";
$titre_crea_compte = "Création d\'un compte";
$title_auctionhouse = "Objets en vente";
$titre_perso = "Tous les personnages du serveur";
$titre_skill = "Talents des personnages (Bêta)";
$titre_guilde = "Les Guildes du serveur";
$titre_guilde_members = "Membres de la guilde";
$titre_chatbox = "Bienvenue sur la ChatBox";
?>';
		fwrite($fichier, $config);
		fclose($fichier);
		echo "
		<h3>Etape 3 : Création de la base de données du site</h3>
		<p>Le fichier de configuration à été mis à jour.</p>
		<p>En cliquant sur le bouton suivant, vous allez créer la base de données et sa structure !</p>
		<p><form method=\"post\" action=\"index.php?etape=4\"><center><input type=\"submit\" name=\"etape_2\" value=\"Suivant\"></form></p>";
	break;
	case "4":
		require("../kernel/config.php");
		mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
		mysql_query('CREATE DATABASE IF NOT EXISTS '.$coolwow['db'].' DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci');
		mysql_select_db("".$coolwow['db']."") or die(mysql_error());
		set_time_limit(0);
 	
		function importeSQL($url){
			$file = file_get_contents($url);
			if($file === false)
			{
				die('Fichier erroné : '.$url);
			}
			$requetes = explode(';', $file);
			foreach($requetes as $requete)
			{
				mysql_query($requete.';');
			}
		}
		importeSQL("schemas/structure.sql");
		importeSQL("schemas/data.sql");
		
		echo "
		<h3>Etape 4 : Verification de Sécurité</h3>
		<p>l'installateur va verifier que les comptes par défaut(ADMINISTRATOR,GAMEMASTER,MODERATOR)<br />
		ne sont pas présent dans votre base de données realmd, de qui serait dangereux pour la sercurité de votre serveur.<br />
		Pour continuer cliquer sur \"Suivant\"</p>
		<p><form method=\"post\" action=\"index.php?etape=5\"><center><input type=\"submit\" name=\"etape_2\" value=\"Suivant\"></form></p>";
	break;
	case "5":
		require("../kernel/config.php");
		mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
		mysql_select_db($realmd['db']) or die(mysql_error());
		$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM account WHERE username='ADMINISTRATOR' OR username='GAMEMASTER' OR username='MODERATOR'") or die(mysql_error());
		$donnees = mysql_fetch_array($reponse);
		
		echo "<h3>Etape 6 : Résultat</h3>";
		if($donnees['nombre'] != 0)
		{
			echo "
			<p>L'installateur a trouvé au moins un des 3 comptes.</br>
			Pour les supprimer cliquer sur \"Supprimer\",<br />
			pour le/les conserver cliquer sur \"Igniorer.\"</p>
			<p>
			<form method=\"post\" action=\"index.php?etape=6\"><center><input type=\"submit\" name=\"etape_3\" value=\"Supprimer\"></center></form>
			<form method=\"post\" action=\"index.php?etape=7\"><center><input type=\"submit\" name=\"etape_3\" value=\"Igniorer\"></center></form>
			</p>";
		}
		else
		{
			echo "
			<p>L'installateur n'a trouvé aucun des 3 comptes.</br>
			Pour passer à l'étape suivante cliquer sur \"Suivant\".</br>
			<form method=\"post\" action=\"index.php?etape=7\"><center><input type=\"submit\" name=\"etape_3\" value=\"Suivant\"></center></form>
			</p>";
		}
	break;
	case "6":
		require("../kernel/config.php");
		mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
		mysql_select_db($realmd['db']) or die(mysql_error());
		
		mysql_query("DELETE FROM account WHERE username='ADMINISTRATOR'")or die(mysql_error());
		mysql_query("DELETE FROM account WHERE username='GAMEMASTER'")or die(mysql_error());
		mysql_query("DELETE FROM account WHERE username='MODERATOR'")or die(mysql_error());
		
		echo "
		<h3>Résultat de la suppression</h3>
		<p>Le/Les comptes ont bien étaient supprimé,<br />
		Cliquer sur \"Suivant\" pour continuer</p>
		<p><form method=\"post\" action=\"index.php?etape=7\"><center><input type=\"submit\" name=\"etape_3\" value=\"Suivant\"></center></form></p>";
	break;
	case "7":
		echo "
		<h3>Etape 7 : Creation d'un compte Administrateur</h3>
		<form method=\"post\" action=\"index.php?etape=8\">
			<table>
				<tr>
					<td>Nom du compte :</td>
					<td><input type=\"text\" name=\"username\" /></td>
				</tr>
				<tr>
					<td>Mot de passe :</td>
					<td><input type=\"text\" name=\"password\" /></td>
				</tr>
			</table>
			<p><center><input type=\"submit\" name=\"etape_3\" value=\"Suivant\"></center>
		</form></p>";
	break;
	case "8":
		require("../kernel/config.php");
		$username = $_POST['username'];
		$password = $_POST['password'];
		if (empty($username) OR empty($password))
		{
			echo "<p>Un des champs est resté vide !!!</p>";
			echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";			
		}
		else
		{
			//verifie si le username existe déjà
			mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
			mysql_select_db($realmd['db']) or die(mysql_error());
			$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM account WHERE username='$username'") or die(mysql_error());
			$donnees = mysql_fetch_array($reponse);
			mysql_close();
			$test = $donnees['nombre'];
			if ($test == 0)
			{
				mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
				mysql_select_db($realmd['db']) or die(mysql_error());
				mysql_query("INSERT INTO account (username, sha_pass_hash, gmlevel, expansion) VALUES ('$username',SHA1(CONCAT(UPPER('$username'),':',UPPER('$password'))),'3','2')") or die(mysql_error());
				mysql_close();
				echo "
				<h3>Etape 8 : Validation de la création d'un compte Administrateur</h3>
				<p>Le compte a bien été créé.<br />
				Pour finaliser l'installation cliquer sur \"Suivant\"</p>
				<p><form method=\"post\" action=\"index.php?etape=9\"><center><input type=\"submit\" name=\"etape_3\" value=\"Suivant\"></center></form></p>";
			}
			else
			{
				echo "Erreur: ce nom utilisateur existe déjà !!!";
				echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
			}
		}
	break;
	case "9":
		echo "
		<h3>Etape 9 : Suppression de l'utilitaire d'installation</h3>
		<p>En cliquant sur le bouton suivant, vous allez supprimer cet installateur, cette étape est nécessaire par soucis de sécurité. L'installateur n'est pas utile pour le site.<br />
		Vous serez redirigé sur l'index du site.</p>
		<p>Merci d'avoir choisi CoolWoW, créé par CiRvENt.</p>
		<p><form method=\"post\" action=\"index.php?etape=10\"><center><input type=\"submit\" name=\"etape_3\" value=\"Terminer\"></center></form></p>";
	break;
	case "10":
		unlink('index.php');
		unlink('schemas/structure.sql');
		unlink('schemas/data.sql');
		rmdir('schemas/');
		rmdir('./');
		?>
		<script language="JavaScript" type="text/JavaScript">
		window.location='../index.php';
		</script>
		<?php
	break;
}
require_once 'vues/foot.php';

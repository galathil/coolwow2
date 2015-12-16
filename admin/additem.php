<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_additem"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
		mysql_select_db($characters[1]['db']) or die(mysql_error());
		switch ($_GET['action'])
		{
			case "ajouter":
				require_once("../kernel/fonctions_armurerie.php");
				//iditem = l'id de l'objet a ajouter.
				$character = Securite::bdd($_POST['character']);
				$iditem = Securite::bdd($_POST['iditem']);
				$nombre = Securite::bdd($_POST['nombre']);
				
				$reponse = mysql_query("SELECT name FROM `characters` WHERE `guid`='$character' OR `name`='$character'") or die(mysql_error());
				$donnees = mysql_fetch_array($reponse,MYSQL_ASSOC);
				$name = Securite::html($donnees['name']);
				
				echo "<h3>Êtes-vous sûr de vouloir rajouter dans l'inventaire du personnage : $name</h3>";
				echo "<h3>L'objet ";
				echo "<a href=\"http://fr.wowhead.com/?item=".$iditem."\"><img src=\"".get_icon2($iditem)."\" /></a>";
				echo "</h3>
					<p>
						<form action=\"index.php?module=additem&action=add\" method=\"POST\">
							<input type=\"hidden\" name=\"character\" value=\"$character\">
							<input type=\"hidden\" name=\"iditem\" value=\"$iditem\">
							<input type=\"hidden\" name=\"nombre\" value=\"$nombre\">
							<input type=\"submit\" value=\"Oui je suis sûr !!!\">
						</form>
					</p>";	
			break;
			case "add":
				$db = $characters[1]['db'];
				$character = Securite::bdd($_POST['character']);
				$iditem = Securite::bdd($_POST['iditem']);
				$nombre = Securite::bdd($_POST['nombre']);
				$itemid = rand(1, 600000);

				mysql_query("INSERT INTO ".$db.".item_instance (guid,owner_guid,data) VALUES ('".$itemid."','".$character."','".$itemid." 1073741936 3 ".$iditem." 1065353216 0 ".$character." 0 ".$character." 0 0 0 0 0 ".$nombre." 0 0 0 0 0 0 1 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0')");

				mysql_query("REPLACE INTO ".$db.".character_inventory (guid, bag, slot, item, item_template) VALUES ('".$character."', '0', '23', '".$itemid."', '".$iditem."')");
				
				echo "Objet bien ajouté !!!";
			break;
			default:
					echo "
					<h1>Ajouter un objet</h1>
					<h5>Merci de vous assurez que l'espace en haut à gauche du sac de départ soit bien vide avant d'allez plus loin !!!</h5>
					<p>
						<form action=\"index.php?module=additem&action=ajouter\" method=\"POST\">
							<table border=\"0\">
								<tr>
									<td>ID du personnage:</td>
									<td><input type=\"text\" name=\"character\" size=\"50\" maxsize=\"50\"></td>
								</tr>
								<tr>
								<td>ID de l'objet à ajouter:</td>
									<td><input type=\"text\" name=\"iditem\" size=\"50\" maxsize=\"50\"></td>
								</tr>
								<td>Quantitée de l'objet:</td>
									<td><input type=\"text\" name=\"nombre\" value=\"1\" size=\"50\" maxsize=\"50\"></td>
								</tr>
							</table><br>
							<input type=\"submit\" value=\"Ajouter\">
						</form>
					</p>
					<p><a href=\"index.php?module=\">Retour</a></p>
					";
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
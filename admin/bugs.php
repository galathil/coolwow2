<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_bugs"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "editer":
				$id = Securite::bdd($_GET['id']);
				if(!empty($id)) // Si les variables existent
				{
					$sql="SELECT * FROM bugreport WHERE id_bug=$id";
					$resultat=mysql_query($sql) or die ("Erreur requette SQL");
					
					if(mysql_num_rows($resultat) <= 0)
					{
						echo "<p>Ce bug n'existe pas !</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
					else
					{
						$info=mysql_fetch_array($resultat);
						echo "
						<p class=\"title\">Gestion des bugs</p>
						<p><form action=\"index.php?module=bugs&action=editer_v\" method=\"POST\">
						<div  align=\"left\" class=\"news\"><form name=\"poste\" action=\"index.php?module=news&action=post\" method=\"POST\">
							<fieldset><legend>ID du bug:</legend>
								<input readonly type=\"text\" size=\"10\" name=\"id_bug\" value=\"".$info["id_bug"]."\" />
							</fieldset>
							<fieldset><legend>Auteur:</legend>
								<input readonly type=\"text\" name=\"auteur\" value=\"".$info["auteur_bug"]."\" size=\"50\" maxsize=\"100\">
							</fieldset>
							<fieldset><legend>Type du bug:</legend>
								<select name=\"type_bug\">
									<option value=\"Personnage\">Personnage</option>
									<option value=\"Quête\">Quête</option>
									<option value=\"Guilde\">Guilde</option>
									<option value=\"PNJ\">PNJ</option>
									<option value=\"Le site\">Le site</option>
									<option value=\"Le forums\">Le forums</option>
									<option value=\"Autres\">Autres</option>
									<option selected value=\"".$info["type_bug"]."\">".$info["type_bug"]."</option>
								</select>
							</fieldset>
							<fieldset><legend>Statut du bug:</legend>
								<select name=\"statut_bug\">
									<option value=\"En attente\">En attente</option>
									<option value=\"En cour\">En cour</option>
									<option value=\"Réglé\">Réglé</option>
									<option value=\"Buggué\">Buggué</option>
									<option selected value=\"".$info["statut_bug"]."\">".$info["statut_bug"]."</option>
								</select>
							</fieldset>
							<fieldset>
								<legend>Description du bug:</legend>
								<textarea name=\"description_bug\" rows=\"5\" cols=\"100%\">".$info["description_bug"]."</textarea>
							</fieldset>
							<fieldset>
								<legend>Commentaire MJ:</legend>
								<textarea name=\"commentaire\" rows=\"5\" cols=\"100%\">".$info["commentaire"]."</textarea>
							</fieldset>
							<br />
							<input type=\"submit\" value=\"Enregistrer\" />
						</form></div>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur d'accès</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "editer_v":
				$id_bug = Securite::bdd($_POST['id_bug']);
				$type_bug = Securite::bdd($_POST['type_bug']);
				$description_bug = Securite::bdd($_POST['description_bug']);
				$statut_bug = Securite::bdd($_POST['statut_bug']);
				$commentaire = Securite::bdd($_POST['commentaire']);
				$mg = $_SESSION['username'];
				$date = time();
				
				$sql="SELECT id_bug FROM bugreport WHERE id_bug=$id_bug";
				$resultat=mysql_query($sql) or die ("Erreur requette SQL");
					
				if(mysql_num_rows($resultat) <= 0)
				{
					echo "<p>Erreur !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
				else
				{
					if(!empty($description_bug)) // Si les variables existent
					{
						if(!empty($commentaire))
						{
							mysql_query("UPDATE bugreport SET type_bug='$type_bug', description_bug='$description_bug', statut_bug='$statut_bug', mg_bug='$mg', commentaire='$commentaire', reponse_bug='Oui' WHERE id_bug=$id_bug") or die(mysql_error());
							
							echo "<p>Les modification sur le bug a bien été engristré !</p>";
							echo "<a href='javascript:history.go(-2)'>Retour</a>";
						}
						else
						{
							echo "<p>Aucun commentaire de rentrés  !!!</p>";
							echo "<a href='javascript:history.go(-1)'>Retour</a>";
						}
					}
					else
					{
						echo "<p>La description ne peux pas restée vide !!!</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
			break;
			case "supprimer":
				$id_bug = Securite::bdd($_GET['id']);
				
				if(!empty($id_bug))
				{
					$sql="SELECT id_bug FROM bugreport WHERE id_bug='$id_bug'";
					$resultat=mysql_query($sql) or die (mysql_error());
					
					if(mysql_num_rows($resultat) <= 0)
					{
						echo "<p>Erreur: ce bug n'existe pas !</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
					else
					{
						echo "<p>Etes-vous sûr de vouloir supprimer ce bug ?</p>
						<form action=\"index.php?module=bugs&action=supprimer_v\" method=\"POST\">
							<input type=\"hidden\" name=\"id_bug\" value='$id_bug'><br />
							<input type=\"submit\" name=\"del\" value=\"Oui\">
						</form>";
					}
				}
				else
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "supprimer_v":
				$id_bug = Securite::bdd($_POST['id_bug']);
				
				if(!empty($id_bug))
				{
					$sql="SELECT id_bug FROM bugreport WHERE id_bug='$id_bug'";
					$resultat=mysql_query($sql) or die (mysql_error());
					
					if(mysql_num_rows($resultat) <= 0)
					{
						echo "<p>Erreur: ce bug n'existe pas !</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
					else
					{
						mysql_query("DELETE FROM bugreport WHERE id_bug=".$id_bug."") or die(mysql_error());
						echo "<p>Le bug a été supprimé !</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
				}
				else
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			default:
				$sql="SELECT * FROM bugreport ORDER BY id_bug ASC";
				$resultat=mysql_query($sql) or die (mysql_error());
				
				echo "
					<p class=\"title\">Liste de bugs connus</p>	
					<br />
					<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
						<tr>
							<th width=\"20\"></th>
							<th width=\"20\"></th>
							<th width=\"30\">id</th>
							<th width=\"80\">type</th>
							<th>Description</th>
							<th width=\"100\">Joueur</th>
							<th width=\"100\">Statut</th>
							<th width=\"80\">Attribué à</th>
							<th width=\"80\">Date du bug</th>
							<th width=\"80\">Déjà signaler</th>
						</tr>";
					if(mysql_num_rows($resultat) <= 0)
					{
						echo "<tr><td colspan=\"8\">Aucuns bugs signalés !!!</td></tr>";
					}
					else
					{
						while($ligne=mysql_fetch_array($resultat))
						{
							extract($ligne);
							$date = date('d-m-Y H:i:s', $date_bug);
							echo "<tr>
								<td><a href='index.php?module=bugs&action=supprimer&id=$id_bug'><img src='../images/delete.gif' /></a></td>
								<td><a href='index.php?module=bugs&action=editer&id=$id_bug'><img src='../images/edit.png' /></a></td>
								<td class='milieu'>$id_bug</td>
								<td class='milieu'>$type_bug</td>
								<td><a href=\"../index.php?module=bugs&action=info_bug&id=$id_bug\">$description_bug</a></td>
								<td>$auteur_bug</td>
								<td>$statut_bug</td>
								<td>$mg_bug</td>
								<td>$date</td>
								<td>$nb_signaler fois</td></tr>";
						}
					}
					echo "</table><br />";
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
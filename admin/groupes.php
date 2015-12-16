<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_forums_groupes"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "creer_groupe":
		        echo "<p class=\"title\">Création d'un groupe</p>";
		        echo'<form method="post" action="index.php?module=groupes&action=creer_groupe_v">';
		        echo'<table>
				<tr>
					<td>Nom du groupe:</td>
					<td><input type="text" name="group_nom" /></td>
				</tr>
				<tr>
			        <td>Description :</td>
					<td><textarea cols=45 rows=4 name="group_description"></textarea></td>
		        </tr>
				<tr>
					<td>Niveau des droits :</t>
					<td>
						<select name="group_droit">
					        <option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>
					</td>
				</tr>
				</table>
		        <input type="submit" value="Envoyer"></form>';
			break;
			case "creer_groupe_v":
				$group_nom = Securite::bdd($_POST['group_nom']);
				$group_description = Securite::bdd($_POST['group_description']);
				$group_droit = Securite::bdd($_POST['group_droit']);
				if(!empty($group_nom)) // Si les variables existent
				{
					mysql_query("INSERT INTO forum_groups (group_nom, group_description, group_droit) VALUES ('$group_nom','$group_description','$group_droit')") or die(mysql_error());
					echo'<p>Le groupe a été créé !</p>';
					echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Merci d'entrer un nom pour le nouveau groupe !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "modifier_groupe":
				$group_id = Securite::bdd($_GET['id']);
				
				$sql="SELECT * FROM forum_groups WHERE group_id=".$group_id."";
				$resultat=mysql_query($sql) or die ("Erreur requette SQL");
				$info=mysql_fetch_array($resultat);
				
		        echo "<p class=\"title\">Modifier un groupe</p>";
		        echo'<form method="post" action="index.php?module=groupes&action=modifier_groupe_v">
				<input type="hidden" name="group_id" value='.$group_id.'>';
		        echo '<table>
				<tr>
					<td>Nom du groupe:</td>
					<td><input type="text" name="group_nom" value='.Securite::html($info["group_nom"]).'></td>
				</tr>
				<tr>
			        <td>Description :</td>
					<td><textarea cols=45 rows=4 name="group_description">'.Securite::html_edit($info["group_description"]).'</textarea></td>
		        </tr>
				<tr>
					<td>Niveau des droits :</t>
					<td>
						<select name="group_droit">
					        <option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option SELECTED value="'.Securite::html($info["group_droit"]).'">'.Securite::html($info["group_droit"]).'</option>
						</select>
					</td>
				</tr>
				</table>
		        <input type="submit" value="Envoyer"></form>';
			break;
			case "modifier_groupe_v":
				$group_id = Securite::bdd($_POST['group_id']);
				$group_nom = Securite::bdd($_POST['group_nom']);
				$group_description = Securite::bdd($_POST['group_description']);
				$group_droit = Securite::bdd($_POST['group_droit']);
				if(!empty($group_nom)) // Si les variables existent
				{
					mysql_query("UPDATE forum_groups SET group_nom='$group_nom',group_description='$group_description',group_droit='$group_droit' WHERE group_id='$group_id'") or die(mysql_error());
					echo'<p>Le groupe a été modifié !</p>';
					echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Merci d'entrer un nom pour le nouveau groupe !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "supprimer_groupe":
				$group_id = Securite::bdd($_GET['id']);
				if (isset($group_id)) // Si les variables existent
				{
					if ($group_id != NULL) // Si on a quelque chose à enregistrer
					{
						echo "<p>Etes-vous sûr de vouloir supprimer ce groupe ?</p>";
						echo "<form action=\"index.php?module=groupes&action=supprimer_groupe_v\" method=\"POST\">
						<input type=\"hidden\" name=\"group_id\" value='$group_id'><br />
						<input type=\"submit\" name=\"del\" value=\"Oui\">
						</form>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur d'accès !!!</p>";
					echo "<a href='index.php?module=groupes'>Retour</a>";
				}
			break;
			case "supprimer_groupe_v":
				$group_id = Securite::bdd($_POST['group_id']);
				if (isset($group_id)) // Si les variables existent
				{
					if ($group_id != NULL) // Si on a quelque chose à enregistrer
					{
						mysql_query("DELETE FROM forum_groups WHERE group_id=".$group_id."") or die(mysql_error());
						// On se déconnecte de MySQL
						echo "<p>Le groupe a été supprimé !</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR!!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "membres_groupe":
				$group_id = Securite::bdd($_GET['id']);
				
				$sql="SELECT * FROM membres_groups 
				LEFT JOIN membres ON membres.id=membres_groups.membre_id
				WHERE group_id=".$group_id."";
				$resultat=mysql_query($sql) or die ("Erreur requette SQL");
				
				echo "<p class=\"title\">Administration des groupes</p><br />";
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th class='milieu' width=\"30\"><a href='index.php?module=groupes&action=ajouter_membre&gid=$group_id'><img src='../images/add.png' /></a></th>
								<th width=\"30\">id</th>
								<th>Nom du membre</th>
							</tr>";
							
					if (mysql_num_rows($resultat) < 1)
					{
						echo "<tr><td colspan=\"3\">Il n'y a pas de membres dans ce groupe !</tr></td>";
					}
					else
					{
						while($donnees = mysql_fetch_array($resultat))
						{
							$membre_id = Securite::html($donnees['membre_id']);
							echo "<tr><td align=\"center\">";
							echo "<a href=\"index.php?module=groupes&action=supprimer_membre&gid=$group_id&mid=$membre_id\"><img src='../images/delete.gif' /></a>";
							echo "</td><td align=\"center\">";
							echo $membre_id;
							echo "</td><td align=\"center\">";
							echo Securite::html($donnees['account_name']);
							echo "</td>";
							echo "</tr>";
						}
					}
					echo "</table><br />";
			break;
			case "ajouter_membre";
				$group_id = Securite::bdd($_GET['gid']);
				echo "<p class=\"title\">Ajouter un membre à ce groupe</p><br />";
		        echo'<form method="post" action="index.php?module=groupes&action=ajouter_membre_v">
				<input type="hidden" name="group_id" value='.$group_id.'>
				<table>
					<tr>
						<td>Nom du compte:</td>
						<td><input type="text" name="pseudo"></td>
					</tr>
				</table>
				<br />
		        <input type="submit" value="Ajouter"></form>';
			break;
			case "ajouter_membre_v";
				$group_id = Securite::bdd($_POST['group_id']);
				$membre_pseudo = Securite::bdd($_POST['pseudo']);
				
				$test = mysql_query("SELECT * FROM membres WHERE account_name = '".$membre_pseudo."'")or die(mysql_error());
				$donnees = mysql_fetch_array($test);
				if(mysql_num_rows($test) < 1)
				{
					echo "<p>Ce membre n'existe pas !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
				else
				{
					if(!empty($membre_pseudo)) // Si les variables existent
					{
						$membre_id = Securite::html($donnees['id']);
						mysql_query("INSERT INTO membres_groups (group_id, membre_id) VALUES ('$group_id','$membre_id')") or die(mysql_error());
						echo'<p>Le membre à été ajouter au groupe !</p>';
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else  //Si les variables n'existent pas
					{
						echo "<p>Merci d'entrer un nom de membre !</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
			break;
			case "supprimer_membre";
				$membre_id = Securite::bdd($_GET['mid']);
				$group_id = Securite::bdd($_GET['gid']);
				if (isset($membre_id)) // Si les variables existent
				{
					if ($membre_id != NULL) // Si on a quelque chose à enregistrer
					{
						echo "<p>Etes-vous sûr de vouloir supprimer le membre ".$membre_id." du groupe ?</p>";
						echo "<form action=\"index.php?module=groupes&action=supprimer_membre_v\" method=\"POST\">
						<input type=\"hidden\" name=\"membre_id\" value='$membre_id' />
						<input type=\"hidden\" name=\"group_id\" value='$group_id' />
						<input type=\"submit\" name=\"del\" value=\"Oui\">
						</form>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur d'accès !!!</p>";
					echo "<a href='index.php?module=groupes'>Retour</a>";
				}
			break;
			case "supprimer_membre_v";
				$membre_id = Securite::bdd($_POST['membre_id']);
				$group_id = Securite::bdd($_POST['group_id']);
				if (isset($membre_id)) // Si les variables existent
				{
					if ($membre_id != NULL) // Si on a quelque chose à enregistrer
					{
						mysql_query("DELETE FROM membres_groups WHERE membre_id=".$membre_id." AND group_id=".$group_id."") or die(mysql_error());
						// On se déconnecte de MySQL
						echo "<p>Le membre a été supprimé !</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR!!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			default:
				$retour= mysql_query('SELECT * FROM forum_groups ORDER BY group_id');
				echo "<p class=\"title\">Administration des groupes</p><br />";
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th class='milieu' width=\"30\"><a href='index.php?module=groupes&action=creer_groupe'><img src='../images/add.png' /></a></th>
								<th width=\"30\"></th>
								<th width=\"30\">id</th>
								<th>Nom du groupe</th>
								<th>Description du groupe</th>
								<th>Droits du groupe</th>
							</tr>";
					while($donnees = mysql_fetch_assoc($retour))
					{
						$id = Securite::html($donnees['group_id']);
						$nom_groupe = Securite::html($donnees['group_nom']);
						echo "<tr><td align=\"center\">";
						echo "<a href=\"index.php?module=groupes&action=supprimer_groupe&id=$id\"><img src='../images/delete.gif' /></a>";
						echo "</td><td align=\"center\">";
						echo "<a href=\"index.php?module=groupes&action=modifier_groupe&id=$id\"><img src='../images/edit.png' /></a>";
						echo "</td><td align=\"center\">";
						echo Securite::html($donnees['group_id']);
						echo "</td><td align=\"center\">";
						echo "<a href=\"index.php?module=groupes&action=membres_groupe&id=$id\">".$nom_groupe."</a>";
						echo "</td><td align=\"center\">";
						echo Securite::html($donnees['group_description']);
						echo "</td><td align=\"center\">";
						echo Securite::html($donnees['group_droit']);
						echo "</td>";
						echo "</tr>";
					}
					echo "<tr><td class='milieu'><a href='index.php?module=groupes&action=creer_groupe'><img src='../images/add.png' /></a></td>
					<td></td><td></td><td></td><td></td></tr>";
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
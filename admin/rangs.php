<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_forums_rank"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "membres_rangs":
				$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				if(ctype_digit($id))
				{
					$sql="SELECT * FROM forum_ranks WHERE rank_id='$id' ORDER BY rank_id ASC";
					$resultat=mysql_query($sql) or die (mysql_error());
					
					if(mysql_num_rows($resultat) <= 0)
					{
						echo "<p>Ce rang n'existe pas !</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
					else
					{
						if($id == 1)
						{
							$sql2="SELECT * FROM membres WHERE membre_rank='$id'";
							$resultat2=mysql_query($sql2) or die (mysql_error());
							echo "
							<p class=\"title\">Membres du rang</p>
							<br />
							<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
								<tr>
									<th width=\"30\">id du membre</th>
									<th width=\"80\">Nom du membre</th>
								</tr>";
								if(mysql_num_rows($resultat2) <= 0)
								{
									echo "<tr><td colspan=\"2\">Aucuns membre dans ce rang !!!</td></tr>";
								}
								else
								{
									while($ligne=mysql_fetch_array($resultat2))
									{
										extract($ligne);
										echo "<tr>
											<td class='milieu'>$id</td>
											<td class='milieu'>$account_name</a></td></tr>";
									}
								}
							echo "</table><br />";
							echo "<p>Les membres de ce rang, ont le rang le plus faible.</p>";
						}
						else
						{
							$sql2="SELECT * FROM membres WHERE membre_rank='$id'";
							$resultat2=mysql_query($sql2) or die (mysql_error());
							echo "
							<p class=\"title\">Membres du rang</p>
							<br />
							<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
								<tr>
									<th width=\"20\"><a href='index.php?module=rangs&action=ajouter_membre&rid=$id'><img src='../images/add.png' /></a></th>
									<th width=\"30\">id du membre</th>
									<th width=\"80\">Nom du membre</th>
								</tr>";
								if(mysql_num_rows($resultat2) <= 0)
								{
									echo "<tr><td colspan=\"8\">Aucuns membre dans ce rang !!!</td></tr>";
								}
								else
								{
									while($ligne=mysql_fetch_array($resultat2))
									{
										extract($ligne);
										echo "<tr>
											<td><a href='index.php?module=rangs&action=supprimer_membre&id=$id'><img src='../images/delete.gif' /></a></td>
											<td class='milieu'>$id</td>
											<td class='milieu'>$account_name</a></td></tr>";
									}
								}
							echo "</table><br />";
						}
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "ajouter_membre":
				$rid = mysql_real_escape_string(htmlspecialchars($_GET['rid'], ENT_QUOTES));
				if(ctype_digit($rid))
				{
					echo "<p class=\"title\">Ajouter un membre</p>";
			        echo "<form method=\"post\" action=\"index.php?module=rangs&action=ajouter_membre_v\">";
			        echo '<table>
					<tr>
						<td>Séléctionné le membre à ajouter </t>
						<td>
							<select name="membre_id">';
								$SQL = "SELECT id,account_name FROM membres
								WHERE membre_rank != $rid";
								$result = mysql_query($SQL) or die(mysql_error());
								while ($val = mysql_fetch_array($result))
								{
									echo "<option value=\"".$val["id"]."\">".$val["account_name"]."</option>";
								}
							echo '</select>
						</td>
					</tr>
					</table>
					<input type="hidden" name="rid" value='.$rid.'>
			        <input type="submit" value="Ajouter"></form>';
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "ajouter_membre_v":
				$rid = mysql_real_escape_string(htmlspecialchars($_POST['rid'], ENT_QUOTES));
				$membre_id = mysql_real_escape_string(htmlspecialchars($_POST['membre_id'], ENT_QUOTES));
				if(!empty($rid) AND !empty($membre_id))
				{
					mysql_query("UPDATE membres SET membre_rank='$rid' WHERE id='$membre_id'") or die(mysql_error());
					echo "<p>Le membre a été ajouté !</p>";
					echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
				else
				{
					echo "<p>Erreur !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "supprimer_membre":
				$membre_id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				if(ctype_digit($membre_id))
				{
					if (isset($membre_id)) // Si les variables existent
					{
						if ($membre_id != NULL) // Si on a quelque chose à enregistrer
						{
							echo "<p>Etes-vous sûr de vouloir supprimer ce rang à ce membre ?</p>";
							echo "<form action=\"index.php?module=rangs&action=supprimer_membre_v\" method=\"POST\">
							<input type=\"hidden\" name=\"membre_id\" value='$membre_id'><br />
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
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "supprimer_membre_v":
				$membre_id = mysql_real_escape_string(htmlspecialchars($_POST['membre_id'], ENT_QUOTES));
				if(ctype_digit($membre_id))
				{
					if (isset($membre_id)) // Si les variables existent
					{
						if ($membre_id != NULL) // Si on a quelque chose à enregistrer
						{
							mysql_query("UPDATE membres SET membre_rank='1' WHERE id='$membre_id'") or die(mysql_error());
							echo "<p>Le membre a été supprimé du rang !</p>";
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
						echo "<p>Erreur d'accès !!!</p>";
						echo "<a href='index.php?module=groupes'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "ajouter":
				echo "<p class=\"title\">Création d'un rang</p>";
		        echo'<form method="post" action="index.php?module=rangs&action=ajouter_v">';
		        echo'<table>
					<tr>
						<td>Nom du rang :</td>
						<td><input type="text" name="rank_nom" /></td>
					</tr>
					<tr>
						<td>Rang spécial :</t>
						<td>
							<select name="rank_special">
						        <option selected value="0">NON</option>
								<option value="1">OUI</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>Images du rang :</td>
						<td>Pour bientôt</td>
					</tr>
				</table>
		        <input type="submit" value="créer"></form>';
			break;
			case "ajouter_v":
				$rank_nom = mysql_real_escape_string(htmlspecialchars($_POST['rank_nom'], ENT_QUOTES));
				$rank_special = mysql_real_escape_string(htmlspecialchars($_POST['rank_special'], ENT_QUOTES));
				if(!empty($rank_nom)) // Si les variables existent
				{
					mysql_query("INSERT INTO forum_ranks (rank_nom, rank_special) VALUES ('$rank_nom','$rank_special')") or die(mysql_error());
					echo'<p>Le rang a été créé !</p>';
					echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Merci d'entrer un nom pour le nouveau rang !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "editer":
				$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				if(ctype_digit($id))
				{
					$sql="SELECT * FROM forum_ranks WHERE rank_id=".$id."";
					$resultat=mysql_query($sql) or die ("Erreur requette SQL");
					$info=mysql_fetch_array($resultat);
					
			        echo "<p class=\"title\">Editer un rang</p>";
			        echo'<form method="post" action="index.php?module=rangs&action=editer_v">
					<input type="hidden" name="rank_id" value='.$id.'>';
			        echo '<table>
						<tr>
							<td>Nom du rang:</td>
							<td><input type="text" name="rank_nom" value='.$info["rank_nom"].'></td>
						</tr>
						<tr>
							<td>Rang spécial :</t>
							<td>
								<select name="rank_special">
							        <option value="0">NON</option>
									<option value="1">OUI</option>
									<option SELECTED value="'.$info["rank_special"].'">'.$info["rank_special"].'</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Images du rang :</td>
							<td>Pour bientôt</td>
						</tr>
					</table>
			        <input type="submit" value="Modifier"></form>';
				}
				else
				{
					echo "<p>Erreur d'accès</p>";
					echo "<p><a href='index.php'>Retour</a></p>";
				}
			break;
			case "editer_v":
				$id = mysql_real_escape_string(htmlspecialchars($_POST['rank_id'], ENT_QUOTES));
				$rank_nom = mysql_real_escape_string(htmlspecialchars($_POST['rank_nom'], ENT_QUOTES));
				$rank_special = mysql_real_escape_string(htmlspecialchars($_POST['rank_special'], ENT_QUOTES));
				if(ctype_digit($id))
				{
					if(!empty($rank_nom)) // Si les variables existent
					{
						mysql_query("UPDATE forum_ranks SET rank_nom='".$rank_nom."',rank_special='".$rank_special."' WHERE rank_id='".$id."'") or die(mysql_error());
						echo'<p>Le rang a été modifié !</p>';
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else  //Si les variables n'existent pas
					{
						echo "<p>Merci d'entrer un nom pour le nouveau rang !</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else
				{
					echo "<p>Erreur d'accès</p>";
					echo "<p><a href='index.php'>Retour</a></p>";
				}
			break;
			case "supprimer":
				$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				if(ctype_digit($id))
				{
					if (isset($id)) // Si les variables existent
					{
						if ($id != NULL) // Si on a quelque chose à enregistrer
						{
							echo "<p>Etes-vous sûr de vouloir supprimer ce rang ?</p>";
							echo "<form action=\"index.php?module=rangs&action=supprimer_v\" method=\"POST\">
							<input type=\"hidden\" name=\"rank_id\" value='$id'><br />
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
				}
				else
				{
					echo "<p>Erreur d'accès</p>";
					echo "<p><a href='index.php'>Retour</a></p>";
				}
			break;
			case "supprimer_v":
				$id = mysql_real_escape_string(htmlspecialchars($_POST['rank_id'], ENT_QUOTES));
				if(ctype_digit($id))
				{
					if (isset($id)) // Si les variables existent
					{
						if ($id != NULL) // Si on a quelque chose à enregistrer
						{
							mysql_query("DELETE FROM forum_ranks WHERE rank_id=".$id."") or die(mysql_error());
							// On se déconnecte de MySQL
							echo "<p>Le rang a été supprimé !</p>";
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
				}
				else
				{
					echo "<p>Erreur d'accès</p>";
					echo "<p><a href='index.php'>Retour</a></p>";
				}
			break;
			default:
				$sql="SELECT * FROM forum_ranks 
				ORDER BY rank_id ASC";
				$resultat=mysql_query($sql) or die (mysql_error());
				
				echo "
				<p class=\"title\">Gestion des rangs</p>
				<br />
					<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
						<tr>
							<th width=\"20\"><a href='index.php?module=rangs&action=ajouter'><img src='../images/add.png' /></a></th>
							<th width=\"20\"></th>
							<th width=\"30\">id</th>
							<th width=\"80\">Nom du rang</th>
							<th width=\"100\">Type du rang</th>
							<th width=\"80\">Images</th>
						</tr>";
					if(mysql_num_rows($resultat) <= 0)
					{
						echo "<tr><td colspan=\"8\">Aucuns bugs signialés !!!</td></tr>";
					}
					else
					{
						while($ligne=mysql_fetch_array($resultat))
						{
							extract($ligne);
							echo "<tr>
								<td><a href='index.php?module=rangs&action=supprimer&id=$rank_id'><img src='../images/delete.gif' /></a></td>
								<td><a href='index.php?module=rangs&action=editer&id=$rank_id'><img src='../images/edit.png' /></a></td>
								<td class='milieu'>$rank_id</td>
								<td class='milieu'><a href='index.php?module=rangs&action=membres_rangs&id=$rank_id'>$rank_nom</a></td>
								<td>$rank_special</td>
								<td>$rank_image</td>
							</tr>";
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
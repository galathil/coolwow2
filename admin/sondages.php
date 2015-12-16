<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_sondages"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "ajouter":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				echo "<p class=\"title\">Création d'un Sondage</p><br />
				<form name=\"poste\" action=\"index.php?module=sondages&action=ajouter_v\" method=\"POST\">
					<table>
						<tr>
							<td>Titre :</td>
							<td><input type=\"text\" name=\"titre\" size=\"150\" maxsize=\"255\"></td>
						</tr>
						<tr>
							<td>Question :</td>
							<td><input type=\"text\" name=\"question\" size=\"150\" maxsize=\"255\"></td>
						</tr>
						<tr>
							<td>Choix 1 :</td>
							<td><input type=\"text\" name=\"choix1\" size=\"150\" maxsize=\"255\"></td>
						</tr>
						<tr>
							<td>Choix 2 :</td>
							<td><input type=\"text\" name=\"choix2\" size=\"150\" maxsize=\"255\"></td>
						</tr>
						<tr>
							<td>Choix 3 :</td>
							<td><input type=\"text\" name=\"choix3\" size=\"150\" maxsize=\"255\" value=\"n/a\"></td>
						</tr>
						<tr>
							<td>Choix 4 :</td>
							<td><input type=\"text\" name=\"choix4\" size=\"150\" maxsize=\"255\" value=\"n/a\"></td>
						</tr>
						<tr>
							<td>Choix 5 :</td>
							<td><input type=\"text\" name=\"choix5\" size=\"150\" maxsize=\"255\" value=\"n/a\"></td>
						</tr>
						<tr>
							<td>Choix 6 :</td>
							<td><input type=\"text\" name=\"choix6\" size=\"150\" maxsize=\"255\" value=\"n/a\"></td>
						</tr>
						<tr>
							<td>Choix 7 :</td>
							<td><input type=\"text\" name=\"choix7\" size=\"150\" maxsize=\"255\" value=\"n/a\"></td>
						</tr>
						<tr>
							<td>Choix 8 :</td>
							<td><input type=\"text\" name=\"choix8\" size=\"150\" maxsize=\"255\" value=\"n/a\"></td>
						</tr>
						<tr>
							<td>Choix 9 :</td>
							<td><input type=\"text\" name=\"choix9\" size=\"150\" maxsize=\"255\" value=\"n/a\"></td>
						</tr>
						<tr>
							<td>Choix 10 :</td>
							<td><input type=\"text\" name=\"choix10\" size=\"150\" maxsize=\"255\" value=\"n/a\"></td>
						</tr>
					</table>
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<br /><input type=\"submit\" value=\"Créer le sondage\" />
				</form>";
			break;
			case "ajouter_v":
				verify_xsrf_token();
				$titre = mysql_real_escape_string(htmlspecialchars($_POST['titre'], ENT_QUOTES));
				$question = mysql_real_escape_string(htmlspecialchars($_POST['question'], ENT_QUOTES));
				$choix1 = mysql_real_escape_string(htmlspecialchars($_POST['choix1'], ENT_QUOTES));+
				$choix2 = mysql_real_escape_string(htmlspecialchars($_POST['choix2'], ENT_QUOTES));
				$choix3 = mysql_real_escape_string(htmlspecialchars($_POST['choix3'], ENT_QUOTES));
				$choix4 = mysql_real_escape_string(htmlspecialchars($_POST['choix4'], ENT_QUOTES));
				$choix5 = mysql_real_escape_string(htmlspecialchars($_POST['choix5'], ENT_QUOTES));
				$choix6 = mysql_real_escape_string(htmlspecialchars($_POST['choix6'], ENT_QUOTES));
				$choix7 = mysql_real_escape_string(htmlspecialchars($_POST['choix7'], ENT_QUOTES));
				$choix8 = mysql_real_escape_string(htmlspecialchars($_POST['choix8'], ENT_QUOTES));
				$choix9 = mysql_real_escape_string(htmlspecialchars($_POST['choix9'], ENT_QUOTES));
				$choix10 = mysql_real_escape_string(htmlspecialchars($_POST['choix10'], ENT_QUOTES));
				$date = date("Y-m-d H:i:s");
				if(!empty($titre) AND !empty($question) AND !empty($choix1) AND !empty($choix2))
				{
					mysql_query("INSERT INTO sondages (title_sondage, question_sondage, date_sondage, etat_sondage, option1, option2, option3, option4, option5, option6, option7, option8, option9, option10) VALUES ('$titre','$question','$date','Ouvert','$choix1','$choix2','$choix3','$choix4','$choix5','$choix6','$choix7','$choix8','$choix9','$choix10')") or die(mysql_error());
					echo "<p>Le sondage a bien été créé !</p>";
					echo "<a href='index.php'>Retour</a>";
				}
				else
				{
					echo "<p>Merci de remplire tous les champs !</p>";
					echo "<a href=\"index.php\">Retour</a>";
				}
			break;
			case "supprimer":
				$id = Securite::bdd($_GET['id']);
				if(!empty($id) or !empty($id))
				{
					$retour = mysql_query("SELECT * FROM sondages WHERE id_sondage = $id");
					if (mysql_num_rows($retour) <= 0)
					{
						echo "
						<p>Il n'y a aucun Sondage qui a cet ID !!!</p>
						<p><a href=\"index.php?module=sondages\">Retour</a></p>";
					}
					else
					{
						echo "<p class=\"title\"><center><h3>Ete-vous sur de vouloir supprimer le sondage qui à ID: $id ?</h3></center></p>
						<center><form action=\"index.php?module=sondages&action=supprimer_v\" method=\"POST\">
						<input type=\"hidden\" name=\"id\" value='$id'>
						<input type=\"submit\" value=\"Oui\"><br /><br />
						<a href='index.php?module=sondages'>Retour</a></form></center>";
					}
				}
				else
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href=\"index.php\">Retour</a>";
				}
			break;
			case "supprimer_v":
				$id = mysql_real_escape_string(htmlspecialchars($_POST['id'], ENT_QUOTES));
				if (isset($id)) // Si les variables existent
				{
					if ($id != NULL) // Si on a quelque chose à enregistrer
					{
						mysql_query("DELETE FROM sondages WHERE id_sondage='$id'");
						mysql_query("DELETE FROM sondages_votant WHERE id_sondage='$id'");
						echo "<p><center><h3>Le sondage a bien été supprimé !</h3><br><a href='index.php?module=sondages'>Retour</a></center></p>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p><center><h3>Erreur !!!</center></h3></b></p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p><center><h3>ERREUR!!!</center></h3></b></p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "modifier":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$id = Securite::bdd($_GET['id']);
				if(!empty($id) or !empty($id))
				{
					$retour = mysql_query("SELECT * FROM sondages WHERE id_sondage = $id");
					if (mysql_num_rows($retour) <= 0)
					{
						echo "
						<p>Il n'y a aucun Sondage qui a cet ID !!!</p>
						<p><a href=\"index.php?module=sondages\">Retour</a></p>";
					}
					else
					{
						
						$donnees = mysql_fetch_assoc($retour);
						if($donnees['total_vote'] == 0 )
						{
							echo "<p class=\"title\">Modification d'un Sondage</p><br />
							<form name=\"poste\" action=\"index.php?module=sondages&action=modifier_v\" method=\"POST\">
								<table>
									<tr>
										<td>ID :</td>
										<td align=\"left\"><input readonly type=\"text\" name=\"id\" value=\"".$donnees['id_sondage']."\" size=\"\"></td>
									</tr>
									<tr>
										<td>Date :</td>
										<td><input readonly type=\"text\" name=\"date\" value=\"".$donnees['date_sondage']."\" size=\"150\"></td>
									</tr>
									<tr>
										<td>Etat :</td>
										<td align=\"left\"><select name=\"etat\">
											<option SELECT value=\"".$donnees['etat_sondage']."\">".$donnees['etat_sondage']."</option>
											<option value=\"Ouvert\">Ouvert</option>
											<option value=\"Fermer\">Fermer</option>
										</select></td>
									</tr>
									<tr>
										<td>Titre :</td>
										<td><input type=\"text\" name=\"titre\" value=\"".$donnees['title_sondage']."\" size=\"150\" maxsize=\"255\"></td>
									</tr>
									<tr>
										<td>Question :</td>
										<td><input type=\"text\" name=\"question\" value=\"".$donnees['question_sondage']."\" size=\"150\" maxsize=\"255\"></td>
									</tr>
									<tr>
										<td>Choix 1 :</td>
										<td><input type=\"text\" name=\"option1\" value=\"".$donnees['option1']."\" size=\"150\" maxsize=\"255\"></td>
									</tr>
									<tr>
										<td>Choix 2 :</td>
										<td><input type=\"text\" name=\"option2\" value=\"".$donnees['option2']."\" size=\"150\" maxsize=\"255\"></td>
									</tr>
									<tr>
										<td>Choix 3 :</td>
										<td><input type=\"text\" name=\"option3\" size=\"150\" value=\"".$donnees['option3']."\" maxsize=\"255\"></td>
									</tr>
									<tr>
										<td>Choix 4 :</td>
										<td><input type=\"text\" name=\"option4\" size=\"150\" value=\"".$donnees['option4']."\" maxsize=\"255\"></td>
									</tr>
									<tr>
										<td>Choix 5 :</td>
										<td><input type=\"text\" name=\"option5\" size=\"150\" value=\"".$donnees['option5']."\" maxsize=\"255\"></td>
									</tr>
									<tr>
										<td>Choix 6 :</td>
										<td><input type=\"text\" name=\"option6\" size=\"150\" maxsize=\"255\" value=\"".$donnees['option6']."\"></td>
									</tr>
									<tr>
										<td>Choix 7 :</td>
										<td><input type=\"text\" name=\"option7\" size=\"150\" maxsize=\"255\"  value=\"".$donnees['option7']."\"></td>
									</tr>
									<tr>
										<td>Choix 8 :</td>
										<td><input type=\"text\" name=\"option8\" size=\"150\" maxsize=\"255\" value=\"".$donnees['option8']."\"></td>
									</tr>
									<tr>
										<td>Choix 9 :</td>
										<td><input type=\"text\" name=\"option9\" size=\"150\" maxsize=\"255\" value=\"".$donnees['option9']."\"></td>
									</tr>
									<tr>
										<td>Choix 10 :</td>
										<td><input type=\"text\" name=\"option10\" size=\"150\" maxsize=\"255\" value=\"".$donnees['option10']."\"></td>
									</tr>
								</table>
								<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
								<br /><input type=\"submit\" value=\"Modifier le sondage\" />
							</form>";
						}
						else
						{
							echo "
							<p>Impossible de modifier ce Sondage car il y a déjà eux des votes !!!</p>
							<p>Vous pouvez quant même modifier l'etat du sondage.</p>
							<form name=\"poste\" action=\"index.php?module=sondages&action=modifier_v2\" method=\"POST\">
								<table>
									<tr>
										<td>Etat :</td>
										<td><select name=\"etat\">
											<option SELECT value=\"".$donnees['etat_sondage']."\">".$donnees['etat_sondage']."</option>
											<option value=\"Ouvert\">Ouvert</option>
											<option value=\"Fermer\">Fermer</option>
										</select></td>
									</tr>
								</table>
								<input type=\"hidden\" name=\"id\" value=\"".$donnees['id_sondage']."\" />
								<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
								<br /><input type=\"submit\" value=\"Modifier le sondage\" />
							</form>
							<p><a href=\"index.php?module=sondages\">Retour</a></p>";
						}
					}
				}
				else
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href=\"index.php\">Retour</a>";
				}
			break;
			case "modifier_v":
				verify_xsrf_token();
				$id = Securite::bdd($_POST['id']);
				$etat = Securite::bdd($_POST['etat']);
				$titre = Securite::bdd($_POST['titre']);
				$question = Securite::bdd($_POST['question']);
				$option1 = Securite::bdd($_POST['option1']);
				$option2 = Securite::bdd($_POST['option2']);
				$option3 = Securite::bdd($_POST['option3']);
				$option4 = Securite::bdd($_POST['option4']);
				$option5 = Securite::bdd($_POST['option5']);
				$option6 = Securite::bdd($_POST['option8']);
				$option7 = Securite::bdd($_POST['option7']);
				$option8 = Securite::bdd($_POST['option8']);
				$option9 = Securite::bdd($_POST['option9']);
				$option10 = Securite::bdd($_POST['option10']);
				if(!empty($id) or isset($id))
				{
					$retour = mysql_query("SELECT * FROM sondages WHERE id_sondage = $id");
					if (mysql_num_rows($retour) <= 0)
					{
						echo "
						<p>Il n'y a aucun Sondage qui a cet ID !!!</p>
						<p><a href=\"index.php?module=sondages\">Retour</a></p>";
					}
					else
					{
						mysql_query("UPDATE sondages SET title_sondage='$titre', question_sondage='$question', etat_sondage='$etat', option1='$option1', option2='$option2', option3='$option3', option4='$option4', option5='$option5', option6='$option6', option7='$option7', option8='$option8', option9='$option9', option10='$option10' WHERE id_sondage='$id'");
						echo "Le sondage à bien été modifié.<br /><br />";
						echo "<a href='index.php'>Retour</a>";
					}
				}
				else
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href=\"index.php\">Retour</a>";
				}
			break;
			case "modifier_v2":
				$id = Securite::bdd($_POST['id']);
				$etat = Securite::bdd($_POST['etat']);
				if(!empty($id) or isset($id))
				{
					$retour = mysql_query("SELECT * FROM sondages WHERE id_sondage = $id");
					if (mysql_num_rows($retour) <= 0)
					{
						echo "
						<p>Il n'y a aucun Sondage qui a cet ID !!!</p>
						<p><a href=\"index.php?module=sondages\">Retour</a></p>";
					}
					else
					{
						mysql_query("UPDATE sondages SET etat_sondage='$etat' WHERE id_sondage='$id'");
						echo "Le sondage à bien été modifié.<br /><br />";
						echo "<a href='index.php'>Retour</a>";
					}
				}
				else
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href=\"index.php\">Retour</a>";
				}
			break;
			case "votant":
				$id = Securite::bdd($_GET['id']);
				if(!empty($id) or !empty($id))
				{
					$retour = mysql_query("SELECT pseudo FROM sondages_votant s INNER JOIN membres m ON  s.membre_id = m.id WHERE s.id_sondage = ".$id."");
					
					if (mysql_num_rows($retour) <= 0)
					{
						echo "
						<p>Il n'y a aucun Sondage qui a cet ID !!!</p>
						<p><a href=\"index.php?module=sondages\">Retour</a></p>";
					}
					else
					{
						echo "<p class=\"title\">Les votants du sondages</p><br />";
						while($donnees = mysql_fetch_assoc($retour))
						{
							echo "".$donnees['pseudo']."<br />";
						}
					}
				}
				else
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href=\"index.php\">Retour</a>";
				}
			break;
			case "bloc_sondage":
				verify_xsrf_token();
				$id = mysql_real_escape_string(htmlspecialchars($_POST['id']));
				if(!empty($id) or !empty($id))
				{
					mysql_query("UPDATE site_config SET config_value = '".$id."' WHERE config_name = 'bloc_sondages'") or die(mysql_error());
					echo "Le sondage du bloc à été modifié.<br />";
					echo "<br /><a href='index.php'>Accueil</a>";
				}
				else
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href=\"index.php\">Retour</a>";
				}
			break;
			default:
				$retour = mysql_query("SELECT * FROM sondages");
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				echo "<p class=\"title\">Les Sondages</p><br />
				<form action=\"index.php?module=sondages&action=bloc_sondage\" method=\"POST\">
					Afficher le sondage <select name=\"id\">";
						$SQL = "SELECT id_sondage,title_sondage FROM sondages ORDER BY id_sondage DESC";
						$result = mysql_query($SQL) or die("Erreur SQL");
						while ($val = mysql_fetch_array($result))
						{
							echo "<OPTION VALUE='".Securite::bdd($val["id_sondage"])."'>".Securite::bdd($val["title_sondage"])."</option>";
						}
					echo "</select>
					dans le bloc de sondage
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"submit\" value=\"Valider\">
				</form><br />";
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th><a href='index.php?module=sondages&action=ajouter'><img src='../images/add.png' /></a></th>
								<th></th>
								<th>ID</th>
								<th>Etat</th>
								<th>Date</th>
								<th>Titre</th>
								<th>Question</th>
								<th>Votant</th>
							</tr>";
				if (mysql_num_rows($retour) <= 0)
				{
					echo "<tr><td colspan=\"9\">Aucun Sondages !!!</td></tr>";
				}
				else
				{
					while($donnees = mysql_fetch_assoc($retour))
					{
						echo"<tr><td align=\"center\">";
						echo "<a href='index.php?module=sondages&action=supprimer&id=".$donnees['id_sondage']."'><img src='../images/delete.gif' /></a>";
						echo"</td><td align=\"center\">";
						echo "<a href='index.php?module=sondages&action=modifier&id=".$donnees['id_sondage']."'><img src=\"../images/edit.png\" /></a>";
						echo"</td><td align=\"center\">";
						echo $donnees['id_sondage'];
						echo"</td><td align=\"center\">";
						echo $donnees['etat_sondage'];
						echo"</td><td align=\"center\">";
						echo $donnees['date_sondage'];
						echo"</td><td align=\"center\">";
						echo $donnees['title_sondage'];
						echo"</td><td align=\"center\">";
						echo $donnees['question_sondage'];
						echo"</td><td align=\"center\">";
						echo "<a href='index.php?module=sondages&action=votant&id=".$donnees['id_sondage']."'>Voir</a>";
						echo"</td>";
						echo"</tr>";
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
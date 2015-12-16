<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config WHERE config_name = "module_sondages"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes")
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "voter":
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
						if($donnees['etat_sondage'] == "Ouvert")
						{
							$membre_id = Securite::bdd($_SESSION['id']);
							$retour2 = mysql_query("SELECT * FROM sondages_votant WHERE id_sondage = '$id' AND membre_id = '$membre_id'") or die (mysql_error());
							$donnees2 = mysql_fetch_array($retour2);
							
							if(mysql_num_rows($retour2) == 0)
							{
								mysql_data_seek($retour,0);
								$donnees = mysql_fetch_assoc($retour);
								echo "<p class=\"title\">Sondages</p><br />";
								echo "".$donnees['title_sondage']."<br />";
								echo "".$donnees['question_sondage']."<br /><br />";
								echo "<form method=\"post\" action=\"index.php?module=sondages&action=voter_v\">";
								mysql_data_seek($retour,0);
								while($donnees3 = mysql_fetch_array($retour))
								{
									for($i=1;$i<10;$i++) 
									{
										if($donnees3['option'.$i.''] == "n/a")
										{
											echo "";
										}
										else
										{
											echo "<input type=\"radio\" name=\"vote\" value=\"".$i."\"> ".$i." - ".$donnees3['option'.$i.'']."<br />";
										}
									}
								}
								echo "<br />
								<input type=\"hidden\" name=\"id\" value=\"".$id."\" />
								<input type=\"submit\" value=\"Voter\" /></p></form>";
							}
							else
							{
								mysql_data_seek($retour,0);
								$donnees = mysql_fetch_assoc($retour);
								echo "<p class=\"title\">Sondages</p><br />";
								echo "Vous avez déjà voter pour ce sondage !<br /><br />";
								echo "".$donnees['title_sondage']."<br />";
								echo "".$donnees['question_sondage']."<br /><br />";
								mysql_data_seek($retour,0);
								while($donnees2 = mysql_fetch_array($retour))
								{
									for($i=1;$i<10;$i++) 
									{
										if($donnees2['option'.$i.''] == "n/a")
										{
											echo "";
										}
										else
										{
											echo "".$i." - ".$donnees2['option'.$i.'']."<br />";
										}
									}
								}
								echo "<br /><a href=\"index.php\">Retour</a>";
							}
						}
						else
						{
							mysql_data_seek($retour,0);
							$donnees = mysql_fetch_assoc($retour);
							echo "<p class=\"title\">Sondages</p><br />";
							echo "Ce sondage est terminé !<br /><br />";
							echo "".$donnees['title_sondage']."<br />";
							echo "".$donnees['question_sondage']."<br /><br />";
							mysql_data_seek($retour,0);
							while($donnees2 = mysql_fetch_array($retour))
							{
								for($i=1;$i<10;$i++) 
								{
									if($donnees2['option'.$i.''] == "n/a")
									{
										echo "";
									}
									else
									{
										echo "".$i." - ".$donnees2['option'.$i.'']."<br />";
									}
								}
							}
							echo "<br /><a href=\"index.php\">Retour</a>";
						}
					}
				}
				else
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href=\"index.php\">Retour</a>";
				}
			break;
			case "voter_v":
				$id = Securite::bdd($_POST['id']);
				$vote_temp = Securite::bdd($_POST['vote']);
				if(!empty($id) or !empty($vote_temp))
				{
					$vote = "nb_vote".$vote_temp."";
					echo "<p class=\"title\">Sondage</p>";
					mysql_query("UPDATE sondages SET ".$vote." = ".$vote." + 1, total_vote = total_vote + 1 WHERE id_sondage = ".$id."") or die(mysql_error());
					mysql_query("INSERT INTO sondages_votant (id_sondage, membre_id) VALUES ('".$id."','".$_SESSION['id']."') ") or die(mysql_error());
					echo'<p>Merci pour votre vote<br /><a href="index.php">Accueil</a>';
				}
				else
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href=\"index.php\">Retour</a>";
				}
			break;
			case "resultat":
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
							
						echo "<p class=\"title\">Résultats du sondage en cours</p><br />";
						echo "".$donnees['question_sondage']."<br /><br />";
						mysql_data_seek($retour,0);
						while($donnees2 = mysql_fetch_array($retour))
						{
							for($i=1;$i<10;$i++) 
							{
								if($donnees2['option'.$i.''] == "n/a")
								{
									echo "";
								}
								else
								{
									$total = $donnees2['total_vote'];
									$nb_vote = $donnees2['nb_vote'.$i.''];
									$pourcent = round(100*$nb_vote/$total, 2);
									
									echo "".$i." - ".$donnees2['option'.$i.'']." - ".$pourcent."%<br />";
								}
							}
						}
						echo "<br /><a href=\"index.php\">Retour</a>";
					}
				}
				else
				{
					echo "<p>Erreur de lien !</p>";
					echo "<a href=\"index.php\">Retour</a>";
				}
			break;
			default:
				$retour = mysql_query("SELECT * FROM sondages");
				
				echo "<p class=\"title\">Les Sondages</p><br />";
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th>Etat</th>
								<th>Titre</th>
								<th>Question</th>
								<th></th>
							</tr>";
				if (mysql_num_rows($retour) <= 0)
				{
					echo "<tr><td colspan=\"4\">Aucuns Sondages !</td></tr>";
				}
				else
				{
					while($donnees = mysql_fetch_assoc($retour))
					{
						echo "<tr><td align=\"center\">";
						echo $donnees['etat_sondage'];
						echo "</td><td align=\"center\">";
						echo "<a href=\"index.php?module=sondages&action=voter&id=".$donnees['id_sondage']."\">".$donnees['title_sondage']."</a>";
						echo "</td><td align=\"center\">";
						echo $donnees['question_sondage'];
						echo "</td><td align=\"center\">";
						echo "<a href=\"index.php?module=sondages&action=resultat&id=".$donnees['id_sondage']."\">Résultats</a> - ".$donnees['total_vote']." votes";
						echo "</td>";
						echo "</tr>";
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
else
{
	echo "<p>Page réservée aux membres !<br />";
	echo "connectez-vous ou inscrivez-vous !</p>";
	echo "<a href=\"../index.php\">Retour</a>";
}
?>
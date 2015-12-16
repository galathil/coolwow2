<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_shell"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "valide":
				$type = mysql_real_escape_string($_POST['type']);
				$titre_message = mysql_real_escape_string($_POST['titre_message']);
				$core_message = mysql_real_escape_string($_POST['core_message']);
				$dest = mysql_real_escape_string($_POST['dest']);
				$value = mysql_real_escape_string($_POST['value']);
				$quantite = mysql_real_escape_string($_POST['quantite']);
				if($type == "money")
				{
					if (ctype_digit($value))
					{
						mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
						mysql_select_db($characters[1]['db']) or die(mysql_error());
						$sql = mysql_query("SELECT count(*) as count, guid, name from characters where name = '".$dest."'");
						$result = mysql_fetch_array($sql);
						mysql_close();
						if ($result['count'] == 1)
						{
							$telnet = @fsockopen($shell['host'], $shell['port'], $errno, $errstr, 3);
							if ($telnet)
							{
								fgets($telnet,1024);
								fputs($telnet, "USER ".$shell['user']."\n");
								sleep(1);
								fputs($telnet, "PASS ".$shell['password']."\n");
								sleep(1);
								fgets($telnet,1024);
								sleep(1);
								fputs($telnet, "send money $dest \"$titre_message\" \"$core_message\" $value\n");
								fclose($telnet);
								echo '<p>'.$value.' pièces de cuivres ont étées ajoutées au personnage '.$result['name'].' de guid '.$result['guid'].'</p>';
								echo "<a href=\"index.php?module=shell&action=envoi\">Retour</a>";
							}
							else 
							{
								echo '<p>Erreur</p>';
							}
						}
						else 
						{
							echo '<p>Joueur introuvable</p><br >';
						}
					}
					else 
					{
						echo '<p>Veuillez entrer un nombre</p>';
					}
				}
				elseif($type == "item")
				{
					mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
					mysql_select_db($characters[1]['db']) or die(mysql_error());
					$sql = mysql_query("SELECT count(*) as count, guid, name from characters where name = '".$dest."'");
					$result = mysql_fetch_array($sql);
					mysql_close();
					if ($result['count'] == 1)
					{
						$telnet = @fsockopen($shell['host'], $shell['port'], $errno, $errstr, 3);
						if ($telnet)
						{
							fgets($telnet,1024);
							fputs($telnet, "USER ".$shell['user']."\n");
							sleep(1);
							fputs($telnet, "PASS ".$shell['password']."\n");
							sleep(1);
							fgets($telnet,1024);
							sleep(1);
							fputs($telnet, "send items $dest \"$titre_message\" \"$core_message\" $value:$quantite\n");
							fclose($telnet);
							echo '<p>L\'objet '.$value.' a été envoyé au personnage '.$result['name'].'.</p>';
							echo "<a href=\"index.php?module=shell&action=envoi\">Retour</a>";
						}
						else 
						{
							echo '<p>Erreur</p>';
						}
					}
					else 
					{
						echo '<p>Joueur introuvable</p><br >';
					}
				}
				elseif($type = "mail")
				{
					mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
					mysql_select_db($characters[1]['db']) or die(mysql_error());
					$sql = mysql_query("SELECT count(*) as count, guid, name from characters where name = '".$dest."'");
					$result = mysql_fetch_array($sql);
					mysql_close();
					if ($result['count'] == 1)
					{
						$telnet = @fsockopen($shell['host'], $shell['port'], $errno, $errstr, 3);
						if ($telnet)
						{
							fgets($telnet,1024);
							fputs($telnet, "USER ".$shell['user']."\n");
							sleep(1);
							fputs($telnet, "PASS ".$shell['password']."\n");
							sleep(1);
							fgets($telnet,1024);
							sleep(1);
							fputs($telnet, "send mail $dest \"$titre_message\" \"$core_message\"\n");
							fclose($telnet);
							echo '<p>Le message à été envoyé au personnage '.$result['name'].'</p>';
							echo "<a href=\"index.php?module=shell&action=envoi\">Retour</a>";
						}
						else 
						{
							echo '<p>Erreur</p>';
						}
					}
					else 
					{
						echo '<p>Joueur introuvable</p><br >';
					}
				}
				else
				{
					mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
					mysql_select_db($characters[1]['db']) or die(mysql_error());
					$sql = mysql_query("SELECT count(*) as count, guid, name from characters where name = '".$dest."'");
					$result = mysql_fetch_array($sql);
					mysql_close();
					if ($result['count'] == 1)
					{
						$telnet = @fsockopen($shell['host'], $shell['port'], $errno, $errstr, 3);
						if ($telnet)
						{
							fgets($telnet,1024);
							fputs($telnet, "USER ".$shell['user']."\n");
							sleep(1);
							fputs($telnet, "PASS ".$shell['password']."\n");
							sleep(1);
							fgets($telnet,1024);
							sleep(1);
							fputs($telnet, "send message $dest \"$core_message\"\n");
							fclose($telnet);
							echo '<p>Le message à été envoyé au personnage '.$result['name'].' de guid '.$result['guid'].'</p>';
							echo "<a href=\"index.php?module=shell&action=envoi\">Retour</a>";
						}
						else 
						{
							echo '<p>Erreur</p>';
						}
					}
					else 
					{
						echo '<p>Joueur introuvable</p><br >';
					}
				}
			break;
			case "envoi":
				echo "
				<form method=\"post\" action=\"index.php?module=shell&action=valide\">
					<table>
						<tr>
							<td>Type : </td>
							<td>
								<select name=\"type\" onchange=\"changer(this.value);\">
									<option value=\"item\">Envoyer un objet</option>
									<option value=\"mail\">Envoyer un courrier</option>
									<option value=\"message\">Envoyer un message</option>
									<option value=\"money\">Envoyer de l'or</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Destinataire : </td>
							<td><input type=\"text\" name=\"dest\"></td>
						</tr>
						<tr>
							<td>Titre message: </td>
							<td><input type=\"text\" name=\"titre_message\"></td>
						</tr>
						<tr>
							<td>Texte du message : </td>
							<td><input type=\"text\" name=\"core_message\"></td>
						</tr>
						<tr>
							<td>valeur : </td>
							<td><input type=\"text\" name=\"value\"></td>
						</tr>
					</table>
					<table id=\"item\">
						<tr>
							<td>Quantité : </td>
							<td><input type=\"text\" value=\"1\" name=\"quantite\"></td>
						</tr>
					</table>
					<input type=\"submit\" value=\"Envoyer\">
				</form></p>";
			break;
			case "annonce":
				echo "
				<p class=\"title\">Faire une annonce</p>
				<p><form method=\"post\" action=\"index.php?module=shell&action=annonce_v\">
					Annonce : <input type=\"text\" name=\"announce\"><br />
					<center><input type=\"submit\" name=\"ok\" value=\"Envoyer\"></center>
				</form></p>";
			break;
			case "annonce_v":
				$ann = $_POST['announce'];
				$send = shell('announce '.$ann);
				if ($send)
				{
					echo "<p>Le message ".$ann." à été diffusé sur le server.</p>";
				}
				else
				{
					echo "<p>Erreur lors de l'envoie</p>";
				}
			break;
			case "reboot":
				echo "
				<p class=\"title\">Redémarrer le processus Mangos</p>
				<p>Tapez le temps restant en secondes avant le rédémarrage. Tapez cancel pour annuler le redemarrage</p>
				<p><form method=\"post\" action=\"index.php?module=shell&action=reboot_v\">
					Temps : <input type=\"text\" name=\"time\"><br />
					<center><input type=\"submit\" name=\"ok\" value=\"Envoyer\"></center>
				</form></p>";
			break;
			case "reboot_v":
				if (isset($_POST['ok']))
				{
					$time = $_POST['time'];
					if (ctype_digit($time))
					{
						$ret = shell("server restart $time");
						if ($ret)
						{
							echo "<p>Le server sera redemarré dans ".$time." secondes.</p>";
						}
					}
					elseif ($time == "cancel")
					{
						$ret = shell("server restart cancel");
						if ($ret)
						{
							echo "<p>Le redemarrage du server est annulé.</p>";
						}
					}
					else
					{
						echo "<p>Veuillez entrer une valeur correcte.</p>";
					}
				}
				else
				{
					echo "Erreur";
				}
			break;
			case "stop":
				echo "
				<p class=\"title\">Arrêter le processus Mangos</p>
				<p>Tapez le temps restant en secondes avant l'arrêt. Tapez cancel pour annuler l'arrêt ou exit ou arrêter le server immédiatement.</p>
				<p><form method=\"post\" action=\"index.php?module=shell&action=stop_v\">
					Temps : <input type=\"text\" name=\"time\"><br />
					<center><input type=\"submit\" name=\"ok\" value=\"Envoyer\"></center>
				</form></p>";
			break;
			case "stop_v":
				if (isset($_POST['ok']))
				{
					$time = $_POST['time'];
					if (ctype_digit($time))
					{
						$ret = shell('server shutdown '.$time);
						if ($ret)
						{
							echo '<p>Le server sera arrêté dans '.$time.' secondes.</p>';
						}
					}
					elseif ($time == "cancel")
					{
						$ret = shell('server shutdown cancel');
						if ($ret)
						{
							echo '<p>L\'arrêt du server est annulé.</p>';
						}
						$telnet = @fsockopen($shell['host'], $shell['port'], $errno, $errstr, 3);
					}
					elseif ($time == "exit")
					{
						$ret = shell('server exit');
						if ($ret)
						{
							echo '<p>Server arrêté.</p>';
						}
					}
					else 
					{
						echo '<p>Veuillez entrer une valeur correcte.</p>';
					}
				}
				else
				{
					echo "Erreur";
				}
			break;
			case "teleport":
				echo "
				<p class=\"title\">Téléporter un joueur</p>
				<p><form method=\"post\" action=\"index.php?module=shell&action=teleport_v\">
					Nom du personnage : <input type=\"text\" name=\"char\"><br />
					Lieu de téléportation : <input type=\"text\" name=\"tele\">
					<center><input type=\"submit\" name=\"ok\" value=\"Téléporter\"></center>
				</form></p>";
			break;
			case "teleport_v":
				if (isset($_POST['ok']))
				{
					require("../kernel/config.php");
					mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
					mysql_select_db($characters[1]['db']) or die(mysql_error());
					$char = mysql_real_escape_string($_POST['char']);
					$tele = mysql_real_escape_string($_POST['tele']);
					$sql = mysql_query('SELECT count(*) as count, guid, name from characters where name = "'.$char.'"');
					$result = mysql_fetch_array($sql);
					mysql_free_result($sql);
					if ($result['count'] == 1)
					{
						mysql_select_db($mangos[1]['db']) or die(mysql_error());
						$sql = mysql_query('SELECT count(*) as count, name from game_tele where name = "'.$tele.'"');
						$result1 = mysql_fetch_array($sql);
						mysql_free_result($sql);
						mysql_close();
						if ($result1['count'] ==1)
						{
							$ret = shell("tele name ".$char." ".$tele);
							if ($ret)
							{
								echo '<p>Joueur '.$result['name'].' de guid '.$result['guid'].' téléporté à '.$tele.'</p>';
							}
						}
						else echo '<p>Emplacement de téléportation introuvable</p>';
					}
					else echo '<p>Joueur introuvable</p>';
				}
				else
				{
					echo "Erreur";
				}
			break;
			case "motd":
				echo "
				<p class=\"title\">Modifier le MOTD</p>
				<p><form method=\"post\" action=\"index.php?module=shell&action=motd_v\">
					Nouveau message du jour : <input type=\"text\" name=\"motd\"><br />
					<p>Attention : Eviter les accents</p>
					<center><input type=\"submit\" name=\"ok\" value=\"Envoyer\"></center>
				</form></p>";
			break;
			case "motd_v":
				$motd = $_POST['motd'];
				$send = shell('server set motd '.$motd);
				if ($send)
				{
					echo "<p>Le message du jour à été redéfini en ".$motd.".</p>";
				}
				else
				{
					echo "<p>Erreur lors de l'envoie</p>";
				}
			break;
			case "ticket":
				echo "
				<p class=\"title\">Voir un ticket</p>
				<p>Remplir un des deux champs</p>
				<p><form method=\"post\" action=\"index.php?module=shell&action=ticket_v\">
					Nom ou ID du personnage : <input type=\"text\" name=\"char\"><br />
					ID du ticket : <input type=\"text\" name=\"ticket\">
					<center><input type=\"submit\" name=\"ok\" value=\"Voir\"></center>
				</form></p>";
			break;
			case "ticket_v":
				if (isset($_POST['ok']))
				{
					require("../kernel/config.php");
					mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
					$char = mysql_real_escape_string($_POST['char']);
					$ticket = mysql_real_escape_string($_POST['ticket']);
					if (!empty($char))
					{
						if (ctype_digit($char))
						{
							mysql_select_db($characters[1]['db']) or die(mysql_error());
							$sql = mysql_query('SELECT count(*) as count from characters where guid = "'.$char.'"') or die(mysql_error());
							$result = mysql_fetch_array($sql);
							mysql_free_result($sql);
							if ($result['count'] == 1)
							{
								$sql = mysql_query('SELECT guid, account, name from characters where guid = "'.$char.'"') or die(mysql_error());
								$result_select= mysql_fetch_array($sql);
								mysql_free_result($sql);
								mysql_select_db($realmd['db']) or die(mysql_error());
								
								$char_name = $result_select['name'];
								$char_guid = $result_select['guid'];
								
								$telnet = @fsockopen($shell['host'], $shell['port'], $errno, $errstr, 3);
								if ($telnet)
								{
									fgets($telnet,1024);
									fputs($telnet, "USER ".$shell['user']."\n");
									sleep(1);
									fputs($telnet, "PASS ".$shell['password']."\n");
									sleep(1);
									fputs($telnet, "ticket $char_name\n");
									$retour = fread($telnet, 1024);
									$accent_bug = array('mangos>', 'Ã¨', 'Ã', 'à©', 'à¹', 'à´', 'à®', 'à¢');
									$accent_correct = array('', 'è', 'à', 'é', 'ù', 'ô', 'î', 'â');
									$retour = str_replace($accent_bug, $accent_correct, $retour);					
									echo '<p>'.$retour.'</p>';
									fclose($telnet);
								}
								else 
								{
									echo '<p>Erreur</p>';
								}
							}
							else
							{
								echo '<p>Personnage introuvable</p>';
							}			
						}
						if (is_string($char))
						{
							mysql_select_db($characters[1]['db']) or die(mysql_error());
							$sql = mysql_query('SELECT count(*) as count from characters where name = "'.$char.'"') or die(mysql_error());
							$result = mysql_fetch_array($sql);
							mysql_free_result($sql);
							if ($result['count'] == 1)
							{
								$sql = mysql_query('SELECT guid, account, name from characters where name = "'.$char.'"') or die(mysql_error());
								$result_select= mysql_fetch_array($sql);
								mysql_free_result($sql);
								mysql_select_db($realmd['db']) or die(mysql_error());
								
								$char_name = $result_select['name'];
								$char_guid = $result_select['guid'];
								
								$telnet = @fsockopen($shell['host'], $shell['port'], $errno, $errstr, 3);
								if ($telnet)
								{
									fgets($telnet,1024);
									fputs($telnet, "USER ".$shell['user']."\n");
									sleep(1);
									fputs($telnet, "PASS ".$shell['password']."\n");
									sleep(1);
									fputs($telnet, "ticket $char_name\n");
									$retour = fread($telnet, 1024);
									$accent_bug = array('mangos>', 'Ã¨', 'Ã', 'à©', 'à¹', 'à´', 'à®', 'à¢');
									$accent_correct = array('', 'è', 'à', 'é', 'ù', 'ô', 'î', 'â');
									$retour = str_replace($accent_bug, $accent_correct, $retour);					
									echo '<p>'.$retour.'</p>';
									fclose($telnet);
								}
								else 
								{
									echo '<p>Erreur</p>';
								}
							}
							else
							{
								echo '<p>Personnage introuvable</p>';
							}			
						}
					}
					elseif (!empty($ticket))
					{
						if (ctype_digit($ticket))
						{
							$telnet = @fsockopen($shell['host'], $shell['port'], $errno, $errstr, 3);
							if ($telnet)
							{
								fgets($telnet,1024);
								fputs($telnet, "USER ".$shell['user']."\n");
								sleep(1);
								fputs($telnet, "PASS ".$shell['password']."\n");
								sleep(1);
								fputs($telnet, "ticket $ticket\n");
								$retour = fread($telnet, 1024);
								$accent_bug = array('mangos>', 'Ã¨', 'Ã', 'à©', 'à¹', 'à´', 'à®', 'à¢');
								$accent_correct = array('', 'è', 'à', 'é', 'ù', 'ô', 'î', 'â');
								$retour = str_replace($accent_bug, $accent_correct, $retour);					
								echo '<p>'.$retour.'</p>';
								fclose($telnet);
							}
							else 
							{
								echo '<p>Erreur</p>';
							}
						}
						else 
						{
							echo '<p>Veuillez entrer un nombre</p>';
						}
					}
					else
					{
						echo '<p>Veuillez remplir un des deux champs</p>';
						mysql_close();
					}
				}
				else
				{
					echo "Erreur";
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
<script type="text/javascript" language="JavaScript">
function changer(o)
{
  document.getElementById('item').style.display = (o == 'item' ? "block" : "none");
  document.getElementById('mail').style.display = (o == 'mail' ? "block" : "none");
  document.getElementById('message').style.display = (o == 'message' ? "block" : "none");
  document.getElementById('money').style.display = (o == 'money' ? "block" : "none");
}
</script>
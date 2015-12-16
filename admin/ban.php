<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_ban"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "compte_add":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				echo "
				<p class=\"title\">Bannir un compte</p>
				<form action=\"index.php?module=ban&action=compte_addv\" method=\"POST\">
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<table>
						<tr>
							<td></td>
							<td align=\"left\">Nom du compte :</td>
							<td align=\"left\"><SELECT NAME=\"account\">";
								mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
								mysql_select_db($realmd['db']) or die(mysql_error());
								$SQL = "SELECT * FROM account ORDER BY username ASC";
								$result = mysql_query($SQL) or die("Erreur SQL");
								while ($val = mysql_fetch_array($result))
								{
									echo "<OPTION VALUE='".$val[id]."'>".$val[username]."</option>";
								}
							echo "</SELECT></td>
						</tr>
						<tr>	
							<td><input name=\"ou\" type=\"checkbox\" value=\"1\"></td>
							<td align=\"left\">Ou ID :</td>
							<td align=\"left\"><input type=\"text\" name=\"id\" size=\"5\" maxsize=\"50\"></td>
						</tr>
						<tr>	
							<td></td>
							<td align=\"left\">Raison :</td>
							<td align=\"left\"><input type=\"text\" name=\"banreason\" size=\"50\" maxsize=\"255\"></td>
						</tr>
						<tr>
							<td></td>
							<td align=\"left\">Durée du Ban :</td>
							<td align=\"left\">
								<SELECT NAME=\"unbandate\">
									<option SELECTED value=\"0\">A vie</option>
									<option value=\"86400\">1 jour</option>
									<option value=\"604800\">7 jours</option>
									<option value=\"1209600\">14 jours</option>
									<option value=\"1814400\">21 jours</option>
									<option value=\"2592000\">1 Mois</option>
								</SELECT>
							</td>
						</tr>
					</table><br />
					<a href='javascript:history.go(-1)'>Retour</a>  <input type=\"submit\" value=\"Bannir\">
				</form>";
			break;
			case "compte_addv":
				verify_xsrf_token();
				$account = Securite::bdd($_POST['account']);
				$bannedby = Securite::bdd($_SESSION['username']);
				$banreason = Securite::bdd($_POST['banreason']);
				$bandate =time();
				$ou = Securite::bdd($_POST['ou']);
				$id = Securite::bdd($_POST['id']);
				$unban = Securite::bdd($_POST['unbandate']);
				if ($unban == 0){$unbandate = time();} else {$unbandate = time() + $unban;}
				if ($ou == 1){$idt = $id;} else {$idt = $account;}
				mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
				mysql_select_db($realmd['db']) or die(mysql_error());
				$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM account WHERE id='$idt'") or die(mysql_error());
				$donnees = mysql_fetch_array($reponse);
				$test = Securite::bdd($donnees['nombre']);
				if ($test == 0)
				{
					echo "<p>Aucuns comptes n'a cet ID !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
				else
				{
					mysql_query("INSERT INTO account_banned (id,bandate,unbandate,bannedby,banreason,active) VALUES ('$idt','$bandate','$unbandate','$bannedby','$banreason','1')") or die(mysql_error());
					echo "<p>Le compte $idt a bien été bannis par : $bannedby<br>pour la raison : $banreason!</p>";
					echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
			break;
			case "compte_del":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$id = Securite::bdd($_GET['id']);
				echo "<p class=\"title\">Ete-vous sur de vouloir supprimer le compte $id ?</p>";
				echo "<form action=\"index.php?module=ban&action=compte_delv\" method=\"POST\">
				<input type=\"hidden\" name=\"id\" value='$id'><input type=\"submit\" name=\"del\" value=\"Oui\">
				<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
				</form>";
				echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
			break;
			case "compte_delv":
				verify_xsrf_token();
				$id = Securite::bdd($_POST['id']);
				if (isset($id)) // Si les variables existent
				{
					if ($id != NULL) // Si on a quelque chose à enregistrer
					{
						mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
						mysql_select_db($realmd['db']) or die(mysql_error());
						mysql_query("DELETE FROM account_banned WHERE id='$id'") or die("Erreur de suppression");
						// On se déconnecte de MySQL
						echo "<p>Le Ban a été supprimé !</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</b></p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR!!!</b></p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "ip_add":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				echo "
				<p class=\"title\">Bannir une adresse IP</p>
				<form action=\"index.php?module=ban&action=ip_addv\" method=\"POST\">
				<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<table>
						<tr>
							<td align=\"left\">Adresse IP :</td>
							<td align=\"left\"><input type=\"text\" name=\"1\" size=\"3\" maxsize=\"3\">.<input type=\"text\" name=\"2\" size=\"3\" maxsize=\"3\">.<input type=\"text\" name=\"3\" size=\"3\" maxsize=\"3\">.<input type=\"text\" name=\"4\" size=\"3\" maxsize=\"3\"></td>
						</tr>
						<tr>	
							<td align=\"left\">Raison :</td>
							<td align=\"left\"><input type=\"text\" name=\"banreason\" size=\"50\" maxsize=\"255\"></td>
						</tr>
						<tr>
							<td align=\"left\">Durée du Ban :</td>
							<td align=\"left\">
								<SELECT NAME=\"unbandate\">
									<option SELECTED value=\"0\">A vie</option>
									<option value=\"86400\">1 jour</option>
									<option value=\"604800\">7 jours</option>
									<option value=\"1209600\">14 jours</option>
									<option value=\"1814400\">21 jours</option>
									<option value=\"2592000\">1 Mois</option>
								</SELECT>
							</td>
						</tr>
					</table><br />
					<a href='javascript:history.go(-1)'>Retour</a>  <input type=\"submit\" value=\"Bannir\">
				</form>";
			break;
			case "ip_addv":
				verify_xsrf_token();
				$un = Securite::bdd($_POST['1']);
				$deux = Securite::bdd($_POST['2']);
				$trois = Securite::bdd($_POST['3']);
				$quatre = Securite::bdd($_POST['4']);
				$t1 = is_numeric($un);
				$t2 = is_numeric($deux);
				$t3 = is_numeric($trois);
				$t4 = is_numeric($quatre);
				$ip = "$un.$deux.$trois.$quatre";
				$bannedby = $_SESSION['username'];
				$banreason = Securite::bdd($_POST['banreason']);
				$bandate =time();
				$unban = Securite::bdd($_POST['unbandate']);
				if ($unban == 0)
				{
					$unbandate = time();
				}
				else
				{
					$unbandate = time() + $unban;
				}
				if ($t1 == NULL or $t2 == NULL or $t3 == NULL or $t4 == NULL)
				{
					echo "$bandate<br />$unbandate";
					echo "<p>Erreur : un des champs est vide ou n'est pas un chiffre !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
				else
				{
					mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
					mysql_select_db($realmd['db']) or die(mysql_error());
					mysql_query("INSERT INTO ip_banned (ip,bandate,unbandate,bannedby,banreason) VALUES ('$ip','$bandate','$unbandate','$bannedby','$banreason')") or die(mysql_error());
					echo "<p>L'adresse IP $ip a bien été bannis par : $bannedby<br>pour la raison : $banreason!</p>";
					echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
			break;
			case "ip_del":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$ip = Securite::bdd($_GET['ip']);
				echo "<p class=\"title\">Ete-vous sur de vouloir supprimer le Ban pour adresse $ip ?</p>";
				echo "<form action=\"index.php?module=ban&action=ip_delv\" method=\"POST\">
				<input type=\"hidden\" name=\"ip\" value='$ip'><input type=\"submit\" name=\"del\" value=\"Oui\">
				<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
				</form>";
				echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
			break;
			case "ip_delv":
				verify_xsrf_token();
				$ip = Securite::bdd($_POST['ip']);
				if (isset($ip)) // Si les variables existent
				{
					if ($ip != NULL) // Si on a quelque chose à enregistrer
					{
						mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
						mysql_select_db($realmd['db']) or die(mysql_error());
						mysql_query("DELETE FROM ip_banned WHERE ip='$ip'") or die("Erreur de suppression");
						// On se déconnecte de MySQL
						echo "<p>Le Ban a été supprimé !</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</b></p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR!!!</b></p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "site_add":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				echo "
				<p class=\"title\">Bannir une adresse IP du site</p>
				<form action=\"index.php?module=ban&action=site_addv\" method=\"POST\">
				<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<table>
						<tr>
							<td align=\"left\">Adresse IP :</td>
							<td align=\"left\"><input type=\"text\" name=\"1\" size=\"3\" maxsize=\"3\">.<input type=\"text\" name=\"2\" size=\"3\" maxsize=\"3\">.<input type=\"text\" name=\"3\" size=\"3\" maxsize=\"3\">.<input type=\"text\" name=\"4\" size=\"3\" maxsize=\"3\"></td>
						</tr>
						<tr>	
							<td align=\"left\">Raison :</td>
							<td align=\"left\"><input type=\"text\" name=\"banreason\" size=\"50\" maxsize=\"255\"></td>
						</tr>
						<tr>
							<td align=\"left\">Durée du Ban :</td>
							<td align=\"left\">
								<SELECT NAME=\"unbandate\">
									<option SELECTED value=\"0\">A vie</option>
									<option value=\"86400\">1 jour</option>
									<option value=\"604800\">7 jours</option>
									<option value=\"1209600\">14 jours</option>
									<option value=\"1814400\">21 jours</option>
									<option value=\"2592000\">1 Mois</option>
								</SELECT>
							</td>
						</tr>
					</table><br />
					<a href='javascript:history.go(-1)'>Retour</a>  <input type=\"submit\" value=\"Bannir\">
				</form>";
			break;
			case "site_addv":
				verify_xsrf_token();
				$un = Securite::bdd($_POST['1']);
				$deux = Securite::bdd($_POST['2']);
				$trois = Securite::bdd($_POST['3']);
				$quatre = Securite::bdd($_POST['4']);
				$t1 = is_numeric($un);
				$t2 = is_numeric($deux);
				$t3 = is_numeric($trois);
				$t4 = is_numeric($quatre);
				$ip = "$un.$deux.$trois.$quatre";
				$bannedby = $_SESSION['username'];
				$banreason = Securite::bdd($_POST['banreason']);
				$bandate =time();
				$unban = Securite::bdd($_POST['unbandate']);
				if ($unban == 0)
				{
					$unbandate = time();
				}
				else
				{
					$unbandate = time() + $unban;
				}
				if ($t1 == NULL or $t2 == NULL or $t3 == NULL or $t4 == NULL)
				{
					echo "$bandate<br />$unbandate";
					echo "<p>Erreur : un des champs est vide ou n'est pas un chiffre !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
				else
				{
					mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
					mysql_select_db($coolwow['db']) or die(mysql_error());
					mysql_query("INSERT INTO bansite (ip_ban,date_debut_ban,date_fin_ban,par_ban,raison_ban) VALUES ('$ip','$bandate','$unbandate','$bannedby','$banreason')") or die(mysql_error());
					echo "<p>L'adresse IP $ip a bien été bannis par : $bannedby<br>pour la raison : $banreason!</p>";
					echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
			break;
			case "site_del":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$ip = Securite::bdd($_GET['ip']);
				echo "<p class=\"title\">Ete-vous sur de vouloir supprimer le Ban pour adresse $ip ?</p>";
				echo "<form action=\"index.php?module=ban&action=site_delv\" method=\"POST\">
				<input type=\"hidden\" name=\"ip\" value='$ip'><input type=\"submit\" name=\"del\" value=\"Oui\">
				<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
				</form>";
				echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
			break;
			case "site_delv":
				verify_xsrf_token();
				$ip = Securite::bdd($_POST['ip']);
				if (isset($ip)) // Si les variables existent
				{
					if ($ip != NULL) // Si on a quelque chose à enregistrer
					{
						mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
						mysql_select_db($coolwow['db']) or die(mysql_error());
						mysql_query("DELETE FROM bansite WHERE ip_ban='$ip'") or die(mysql_error());
						// On se déconnecte de MySQL
						echo "<p>Le Ban a été supprimé !</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</b></p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR!!!</b></p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			default:
				echo "<p class=\"title\">Gestion des Bannissements</p>";
				
				// PARTIE COMPTES
				mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
				mysql_select_db($realmd['db']) or die(mysql_error());
				$retour_total=mysql_query('SELECT COUNT(*) AS total FROM account_banned'); //Nous récupérons le contenu de la requête dans $retour_total
				$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
				$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
				$retour_messages = mysql_query('SELECT * FROM account_banned ORDER BY id ASC');
				
				echo "<p class=\"title\">Compte Bannis</p>";
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
							<th><a href='index.php?module=ban&action=compte_add'><img src='../images/add.png' /></a></th>
							<th>id du compte</th>
							<th>Date du Ban</th>
							<th>Fin du Ban</th>
							<th>Bannis par</th>
							<th>Raison</th>
							</tr>";
				if ($total == 0)
				{
					echo "<tr><td colspan=\"9\">Aucuns comptes bannis !!!</td></tr>";
				}
				else
				{
					while($donnees = mysql_fetch_assoc($retour_messages))
					{
						$id = $donnees['id'];
						echo"<tr><td align=\"center\">";
						echo"<a href=\"index.php?module=ban&action=compte_del&id=$id\"><img src='../images/delete.gif' /></a>";
						echo"</td><td align=\"center\">";
						echo $donnees['id'];
						echo"</td><td align=\"center\">";
						echo"".date('d/m/Y G:i', $donnees['bandate'])."";
						echo"</td><td align=\"center\">";
						if ($donnees['bandate'] == $donnees['unbandate']){echo "Jamais";}else{echo"".date('d/m/Y G:i', $donnees['unbandate'])."";}
						echo"</td><td align=\"center\">";
						echo $donnees['bannedby'];
						echo"</td><td align=\"center\">";
						if (empty($donnees['banreason'])){echo "Aucune raison";}else{echo $donnees['banreason'];}
						echo"</td>";
						echo"</tr>";
					}
				}
				echo "<tr><td class='milieu'><a href='index.php?module=ban&action=compte_add'><img src='../images/add.png' /></a></td><td></td><td></td><td></td><td></td><td></td></tr>";
				echo "</table><br />";
				
				// PARTIE ADRESSE IP
				$retour_total2=mysql_query('SELECT COUNT(*) AS total2 FROM ip_banned'); //Nous récupérons le contenu de la requête dans $retour_total
				$donnees_total2=mysql_fetch_assoc($retour_total2); //On range retour sous la forme d'un tableau.
				$total2=$donnees_total2['total2']; //On récupère le total pour le placer dans la variable $total.
				$retour_messages2 = mysql_query('SELECT * FROM ip_banned ORDER BY ip ASC');
				
				echo "<p class=\"title\">Adresses IP Bannis</p>";
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
							<th><a href='index.php?module=ban&action=ip_add'><img src='../images/add.png' /></a></th>
							<th>IP</th>
							<th>Date du Ban</th>
							<th>Fin du Ban</th>
							<th>Bannis par</th>
							<th>Raison</th>
							</tr>";
				if ($total2 == 0)
				{
					echo "<tr><td colspan=\"9\">Aucunes Adresse IP bannis !!!</td></tr>";
				}
				else
				{
					while($donnees2 = mysql_fetch_assoc($retour_messages2))
					{
						$ip = $donnees2['ip'];
						echo"<tr><td align=\"center\">";
						echo"<a href=\"index.php?module=ban&action=ip_del&ip=$ip\"><img src='../images/delete.gif' /></a>";
						echo"</td><td align=\"center\">";
						echo $donnees2['ip'];
						echo"</td><td align=\"center\">";
						if ($donnees2['bandate'] == 0){echo "Inconnu";}else{echo"".date('d/m/Y G:i', $donnees2['bandate'])."";}
						echo"</td><td align=\"center\">";
						if ($donnees2['bandate'] == $donnees2['unbandate']){echo "Jamais";}else{echo"".date('d/m/Y G:i', $donnees2['unbandate'])."";}
						echo"</td><td align=\"center\">";
						echo $donnees2['bannedby'];
						echo"</td><td align=\"center\">";
						if (empty($donnees2['banreason'])){echo "Aucune raison";}else{echo $donnees2['banreason'];}
						echo"</td>";
						echo"</tr>";
					}
				}
				echo "<tr><td class='milieu'><a href='index.php?module=ban&action=ip_add'><img src='../images/add.png' /></a></td><td></td><td></td><td></td><td></td><td></td></tr>";
				echo "</table><br />";
				
				// PARTIE SITE
				mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
				mysql_select_db($coolwow['db']) or die(mysql_error());
				$retour_total3=mysql_query("SELECT COUNT(*) AS total3 FROM bansite"); //Nous récupérons le contenu de la requête dans $retour_total
				$donnees_total3=mysql_fetch_assoc($retour_total3); //On range retour sous la forme d'un tableau.
				$total3=$donnees_total3['total3']; //On récupère le total pour le placer dans la variable $total.
				$retour_messages3 = mysql_query('SELECT * FROM bansite');
				
				echo "<p class=\"title\">Les Bannis du Site</p>";
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
							<th><a href='index.php?module=ban&action=site_add'><img src='../images/add.png' /></a></th>
							<th>IP</th>
							<th>Date du Ban</th>
							<th>Fin du Ban</th>
							<th>Bannis par</th>
							<th>Raison</th>
							</tr>";
				if ($total3 == 0)
				{
					echo "<tr><td colspan=\"9\">Aucunes Adresse IP bannis !!!</td></tr>";
				}
				else
				{
					while($donnees3 = mysql_fetch_assoc($retour_messages3))
					{
						$ip = $donnees3['ip_ban'];
						echo"<tr><td align=\"center\">";
						echo"<a href=\"index.php?module=ban&action=site_del&ip=$ip\"><img src='../images/delete.gif' /></a>";
						echo"</td><td align=\"center\">";
						echo $donnees3['ip_ban'];
						echo"</td><td align=\"center\">";
						if ($donnees3['date_debut_ban'] == 0){echo "Inconnu";}else{echo"".date('d/m/Y G:i', $donnees3['date_debut_ban'])."";}
						echo"</td><td align=\"center\">";
						if ($donnees3['date_debut_ban'] == $donnees3['date_fin_ban']){echo "Jamais";}else{echo"".date('d/m/Y G:i', $donnees3['date_fin_ban'])."";}
						echo"</td><td align=\"center\">";
						echo $donnees3['par_ban'];
						echo"</td><td align=\"center\">";
						if (empty($donnees3['raison_ban'])){echo "Aucune raison";}else{echo $donnees3['raison_ban'];}
						echo"</td>";
						echo"</tr>";
					}
				}
				echo "<tr><td class='milieu'><a href='index.php?module=ban&action=site_add'><img src='../images/add.png' /></a></td><td></td><td></td><td></td><td></td><td></td></tr>";
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
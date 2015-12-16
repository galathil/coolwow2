<?php
session_start();
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

$membre_id = Securite::bdd($_SESSION['id']);

if ($_SESSION['auth'] != "yes")
{
	echo "Merci de vous connectez pour modifier vos informations !<br/>";
	echo "<a href='login.php'>Cliquez ici pour vous connectez</a><br/>";
	echo "<a href='javascript:history.go(-1)'>Retour</a>";
}
else
{
	$post = Securite::bdd($_SESSION['username']);
	mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
	mysql_select_db($realmd['db']) or die(mysql_error());

	switch ($_GET['action'])
	{
	    case "modifier_v":
			verify_xsrf_token();
			$new_pass = mysql_real_escape_string($_POST['new_pass']);
			$conf_pass = mysql_real_escape_string($_POST['new_pass2']);
			$mail = Securite::bdd($_POST['mail']);
			$expansion = Securite::bdd($_POST['expansion']);
			if($new_pass == "******" AND $conf_pass == "******")
			{
				if (!eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-_.]?[0-9a-z])*\\.[a-z]{2,4}$",$mail))
				{
					echo "L'adresse e-mail n'est pas correcte !!!";
					echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
				}
				else
				{
					//tester si adresse mail existe
					mysql_query("UPDATE account SET email='$mail',expansion='$expansion' WHERE id='$membre_id'") or die(mysql_error());
					echo "<p>L'adresse mail à bien été modifiée</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			}
			elseif($new_pass == "******" OR $conf_pass == "******")
			{
				echo "Merci de mettre deux mot de passe identique.";
				echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
			}
			else
			{
				if (isset($new_pass) and ($conf_pass)) // Si les variables existent
				{
					if ($new_pass == $conf_pass)
					{
						if (!eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-_.]?[0-9a-z])*\\.[a-z]{2,4}$",$mail))
						{
							echo "L'adresse e-mail n'est pas correcte !!!";
							echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
						}
						else
						{
							mysql_query("UPDATE account SET sha_pass_hash=SHA1(CONCAT(UPPER('$post'),':',UPPER('$new_pass'))),email='$mail',expansion='$expansion' WHERE id='$membre_id'") or die(mysql_error());
							echo "Le mot de passe a bien été modifié";
						}
					}
					else
					{
						echo "Le mot de passe et la confirmation ne sont pas identique !";
						echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else
				{
					echo "le mot de passe est obligatoire !";
					echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
				}
			}
		break;
		case "modifier":
			generate_xsrf_token();
			$token = Securite::bdd($_SESSION['token_xsrf']);
			
			$post = Securite::bdd($_SESSION['username']);
			$sql="SELECT * FROM account WHERE username='$post'";
			$resultat=mysql_query($sql) or die ("Erreur requette SQL");
			$info=mysql_fetch_array($resultat);
			$id = $info["id"];
			echo "<p class=\"title\">Edition du compte $post</p>
			<p>
				<form action=\"index.php?module=mon_compte&action=modifier_v\" method=\"POST\">
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<table border=\"0\">
						<tr>
							<td align=\"left\">ID:</td>
							<td align=\"left\">".Securite::bdd($info["id"])."</td>
						</tr>
						<tr>
							<td align=\"left\">Nom du compte:</td>
							<td align=\"left\">".Securite::bdd($info["username"])."</td>
						</tr>
						<tr>
							<td align=\"left\">Mot de passe:</td>
							<td align=\"left\"><input type=\"text\" name=\"new_pass\" value=\"******\" size=\"50\" maxsize=\"40\"></td>
						</tr>
						<tr>
							<td align=\"left\">Confirmer le mot de passe:</td>
							<td align=\"left\"><input type=\"text\" name=\"new_pass2\" value=\"******\" size=\"50\" maxsize=\"40\"></td>
						</tr>
						<tr>
							<td align=\"left\">Adresse E-mail:</td>
							<td align=\"left\"><input type=\"text\" name=\"mail\" value=\"".Securite::bdd($info["email"])."\" size=\"50\" maxsize=\"50\"></td>
						</tr>
						<tr>
							<td align=\"left\">Extension:</td>
							<td align=\"left\">
								<select name=\"expansion\">";
								if ($info["expansion"] == 0){ echo "<OPTION select VALUE='0'>World of Warcraft</option>";}
								elseif($info["expansion"] == 1){ echo "<OPTION select VALUE='1'>Burning Crusade</option>";}
								else{ echo "<OPTION select VALUE='2'>Wrath of the Lich King</option>";}
								echo "
									<option value=\"0\">World of Warcraft</option>
									<option value=\"1\">Burning Crusade</option>
									<option value=\"2\">Wrath of the Lich King</option>
								</select>
							</td>
						</tr>
					</table>
					<br />
					<table>
						<tr>
							<td align=\"left\"><a href='index.php?module=compte_jeu'>Retour</a>  <input type=\"submit\" value=\"Modifier\"></td>
						</tr>
					</table>
				</form>
			</p>";
		break;
		case "info":
			$post = Securite::bdd($_SESSION['username']);
			$sql="SELECT * FROM account WHERE username='$post'";
			$resultat=mysql_query($sql) or die ("Erreur requette SQL");
			$info=mysql_fetch_array($resultat);
			$id = $info["id"];
			echo "<p class=\"title\">Information sur le compte $post</p><br />
			<p>
					<table border=\"0\">
						<tr>
							<td align=\"left\">ID:</td>
							<td align=\"left\">".Securite::bdd($info["id"])."</td>
						</tr>
						<tr>
							<td align=\"left\">Nom du compte:</td>
							<td align=\"left\">".Securite::bdd($info["username"])."</td>
						</tr>
						<tr>
							<td align=\"left\">Adresse E-mail:</td>
							<td align=\"left\">".Securite::bdd($info["email"])."</td>
						</tr>
						<tr>
							<td align=\"left\">Date d'inscription:</td>
							<td align=\"left\">".Securite::bdd($info["joindate"])."</td>
						</tr>
						<tr>
							<td align=\"left\">Bannis:</td>
							<td align=\"left\">";
								//if ($ban == 0)
								//{ 
								//	echo "Non bannis";
								//}
								//else
								//{ 
								//	echo "Bannis <br />le: ".date('d-m-Y G:i', Securite::bdd($val["bandate"]))."<br />jusqu'au: ".date('d-m-Y G:i', Securite::bdd($val["bandate"]))."<br />par ".Securite::bdd($val["bannedby"])."";
								//}
							echo "</td>
						</tr>
						<tr>
							<td align=\"left\">Dernière IP:</td>
							<td align=\"left\">".Securite::bdd($info["last_ip"])."</td>
						</tr>
						<tr>
							<td align=\"left\">Niveau de compte:</td>
							<td align=\"left\">";
								if ($info["gmlevel"] == 0){ echo "0 - Joueur";}
								elseif($info["gmlevel"] == 1){ echo "1 - Modérateur";}
								elseif($info["gmlevel"] == 2){ echo "2 - Maitre du jeu";}
								elseif($info["gmlevel"] == 3){ echo "3 - Traqueur de Bugs";}
								elseif($info["gmlevel"] == 4){ echo "4 - Administrateur";}
								else{ echo "5 - Opérateur Système";}
							echo "</td>
						</tr>
						<tr>
							<td align=\"left\">Connexions échouées:</td>
							<td align=\"left\">".Securite::bdd($info["failed_logins"])."</td>
						</tr>
						<tr>
							<td align=\"left\">Bloqué:</td>
							<td align=\"left\">";
								if ($info["locked"] == 0){ echo "Non bloqué";}else{ echo "Bloqué";}
							echo "</td>
						</tr>
						<tr>
							<td align=\"left\">Dernière connexion:</td>
							<td align=\"left\">".$info["last_login"]."</td>
						</tr>
						<tr>
							<td align=\"left\">En ligne:</td>";
							$onlinet = mysql_query("SELECT * FROM account WHERE id = $id") or die(mysql_error());
							$online = mysql_fetch_array($onlinet,MYSQL_ASSOC);
							if ($online['online'] == 1){$ol="OUI";}
							else{$ol="NON";}
							echo "<td align=\"left\">$ol</td>
						</tr>";
						$nbt = mysql_query("SELECT SUM(numchars) AS total FROM realmcharacters WHERE acctid = '$id'") or die(mysql_error());
						$nbtot = mysql_fetch_array($nbt,MYSQL_ASSOC);
							
						mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
						mysql_select_db($characters[1]['db']) or die(mysql_error());
						$nbr = mysql_query("SELECT count(*) AS totalr FROM `characters` WHERE account = $id") or die(mysql_error());
						$nbtotr = mysql_fetch_array($nbr,MYSQL_ASSOC);
							
						echo "<tr>
							<td align=\"left\">Nombre total de personnages:</td>
							<td align=\"left\">$nbtot[total]</td>
						</tr>
						<tr>
							<td align=\"left\">Personnages dans ce royaume:</td>
							<td align=\"left\">$nbtotr[totalr]</td>
						</tr>
						<tr>
							<td align=\"left\">Extension:</td>
							<td align=\"left\">";
							if ($info[expansion] == 0){ echo "World of Warcraft";}
								elseif($info[expansion] == 1){ echo "Burning Crusade";}
								else{ echo "Wrath of the Lich King";}
							echo "</td>
						</tr>
					</table>
					<br />
					<p class=\"title\">Liste des personnages :</p><p>";
					mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
					mysql_select_db($characters[1]['db']) or die(mysql_error());
					$test = mysql_query("SELECT * FROM characters WHERE account=$id ORDER BY name ") or die(mysql_error());
					while ($donnees = mysql_fetch_array($test,MYSQL_ASSOC) )
					{
						$perso = Securite::bdd($donnees['name']);
						$level = explode(' ',$donnees['data']);
						$niveau = $level[53];
						$race = Securite::bdd($donnees['race']);
						$class = Securite::bdd($donnees['class']);
						echo "<a href=\"../armurerie-select.php?perso=$perso\">$perso - ";
						nomrace($race);
						echo " ";
						nomclass($class);
						echo " | lvl $niveau</a><br />";
					}
					echo "</p><br />
					<table>
						<tr>
							<td align=\"left\"><a href='javascript:history.go(-1)'>Retour</a></td>
						</tr>
					</table>
			</p>";
		break;
		default:
			mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
			mysql_select_db($coolwow['db']) or die(mysql_error());
			$test = mysql_query("SELECT nb_point_vote FROM membres WHERE id = ".$membre_id."") or die(mysql_error());
			$donnees = mysql_fetch_array($test,MYSQL_ASSOC);
			
			echo "<p class=\"title\">Gestion du compte $post</p><br />";
			echo "Vous avez actuellement ".Securite::html($donnees['nb_point_vote'])." points de vote.<br />
			<br />
			Votre compte :<br />
			<a href='index.php?module=mon_compte&action=info'>Information sur le compte</a><br />
			<a href='index.php?module=mon_compte&action=modifier'>Modifier le compte</a><br /><br />
			Votre profil :<br />
			<a href='index.php?module=profil&id=".$membre_id."'>Voir son profil</a><br />
			<a href='index.php?module=profil&action=modifier&id=".$membre_id."'>Modifier son profil</a><br /><br />";
			echo "<p><a href='index.php'>Retour</a></p>";
		break;
	}
}
?>
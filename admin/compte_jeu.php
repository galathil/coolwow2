<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());

$page_get = mysql_real_escape_string(htmlspecialchars($_GET['page'], ENT_QUOTES));
if(empty($page_get))
{
	$truc = 1;
}
elseif(!ctype_digit($page_get)) //verifi si il n'y a pas de lettre
{
	$truc = 1;
}
else
{
	$truc = $page_get;
}
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_compte_jeu"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
		mysql_select_db($realmd['db']) or die(mysql_error());
		switch ($_GET['action'])
		{
			case "ajouter":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				echo "<p class=\"title\">Créer un compte</p>
						<p>
						<form action=\"index.php?module=compte_jeu&action=add\" method=\"POST\">
							<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
							<table border=\"0\">
								<tr>
									<td align=\"left\">Nom du compte:</td>
									<td align=\"left\"><input type=\"text\" name=\"username\" size=\"50\" maxsize=\"50\"></td>
								</tr>
								<tr>
									<td align=\"left\">Mot de passe:</td>
									<td align=\"left\"><input type=\"text\" name=\"password\" size=\"50\" maxsize=\"50\"></td>
								</tr>
								<tr>
									<td align=\"left\">Confirmer:</td>
									<td align=\"left\"><input type=\"text\" name=\"conf_pass\" size=\"50\" maxsize=\"50\"></td>
								</tr>
								<tr>
									<td align=\"left\">Adresse E-mail</td>
									<td align=\"left\"><input type=\"text\" name=\"email\" size=\"50\" maxsize=\"50\"></td>
								</tr>
								<tr>
									<td align=\"left\">Niveau de compte:</td>
									<td align=\"left\">
										<SELECT NAME=\"gmlevel\">
											<option SELECTED value=\"0\">0 - Joueur</option>
											<option value=\"1\">1 - Modérateur</option>
											<option value=\"2\">2 - Maitre du jeu</option>
											<option value=\"3\">3 - Traqueur de Bugs</option>
											<option value=\"4\">4 - Administrateur</option>
											<option value=\"5\">5 - Opérateur Système</option>
										</SELECT>
									</td>
								</tr>
								<tr>
									<td align=\"left\">Bloqué</td>
									<td align=\"left\">
										<SELECT NAME=\"locked\">
											<option SELECTED value=\"0\">Non Bloqué</option>
											<option value=\"1\">Bloqué</option>
										</SELECT>
									</td>
								</tr>
							</table>
							<br />
							<table>
								<tr>
									<td align=\"left\"><a href='javascript:history.go(-1)'>Retour</a>  <input type=\"submit\" value=\"créer\"></td>
								</tr>
							</table>
						</form>
					</p>";
			break;
			case "add":
				verify_xsrf_token();
				$username = mysql_real_escape_string(htmlspecialchars($_POST['username']));
				$password = mysql_real_escape_string(htmlspecialchars($_POST['password']));
				$conf_pass = mysql_real_escape_string(htmlspecialchars($_POST['conf_pass']));
				$email = mysql_real_escape_string(htmlspecialchars($_POST['email']));
				$gmlevel = mysql_real_escape_string($_POST['gmlevel']);
				$locked = mysql_real_escape_string($_POST['locked']);
				$date = date("Y-m-d G:i:s");
				
				//verifie si le username existe déjà
				mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
				mysql_select_db($realmd['db']) or die(mysql_error());
				$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM account WHERE username='$username'") or die(mysql_error());
				$donnees = mysql_fetch_array($reponse);
				mysql_close();
				$test = $donnees['nombre'];
				if ($test == 0)
				{
					//verifie si l email existe déjà
					mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
					mysql_select_db($realmd['db']) or die(mysql_error());
					$reponse2 = mysql_query("SELECT COUNT(*) AS nombre FROM account WHERE email='$email'") or die(mysql_error());
					$donnees2 = mysql_fetch_array($reponse2);
					mysql_close();
					$test2 = $donnees2['nombre'];
					if ($test2 >= $compte_mail)
					{	
						echo "Vous avez atteint le nombre maximal de compte par adresse email.<br />";
						echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
					}
					else
					{
						if (isset($password) and ($conf_pass)) // Si les variables existent
						{
							if ($password == $conf_pass)
							{
								if (!eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-_.]?[0-9a-z])*\\.[a-z]{2,4}$",$email))
								{
									echo "L'adresse e-mail n'est pas correcte !!!";
									echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
								}
								else
								{
									mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
									mysql_select_db($realmd['db']) or die(mysql_error());
									mysql_query("INSERT INTO account (username, sha_pass_hash,gmlevel, email, joindate, locked, tbc) VALUES ('$username',SHA1(CONCAT(UPPER('$username'),':',UPPER('$password'))),'$gmlevel','$email','$date','$locked','2')") or die(mysql_error());
									mysql_close();
									echo "
									<p class=\"titre\">Votre compte a bien été créé !</p>
									Récapitulatif:<br />
									Utilisateur: $username<br />
									Mot de passe: $password<br />
									Adresse email: $email<br />";
									echo "<br /><a href='javascript:history.go(-2)'>Retour</a>";
								}
							}
							else
							{
								echo "Le mot de passe et la confirmation de sont pas identique !";
								echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
							}
						}
						else
						{
							echo "le mot de passe est obligatoire !";
							echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
						}
					}		
				}
				else
				{
					echo "Ce nom utilisateur existe déjà !!!";
					echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "supprimer":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				
				mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
				mysql_select_db($realmd['db']) or die(mysql_error());
				$reponse = mysql_query("SELECT * FROM account WHERE id='$id'") or die(mysql_error());
				$donnees = mysql_fetch_array($reponse);
				
				mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
				mysql_select_db($characters[1]['db']) or die(mysql_error());
				$reponse2 = mysql_query("SELECT count(*) AS nb_perso FROM characters WHERE account='$id'") or die(mysql_error());
				$donnees2 = mysql_fetch_array($reponse2);
				$nb_perso = $donnees2['nb_perso'];
				
				$username = $donnees['username'];
				echo "<p class=\"title\">Êtes-vous sûr de vouloir supprimer le compte $username<br /> avec le(s) $nb_perso personnage(s) associé(s) ?</p>";
				echo "<form action=\"index.php?module=compte_jeu&action=del\" method=\"POST\">
					<input type=\"hidden\" name=\"id\" value='$id'>
					<input type=\"hidden\" name=\"nb_perso\" value='$nb_perso'>
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"submit\" name=\"del\" value=\"Oui\">
				</form>";
				echo "<a href='javascript:history.go(-1)'>Retour</a>";
			break;
			case "del":
				verify_xsrf_token();
				$id = mysql_real_escape_string(htmlspecialchars($_POST['id'], ENT_QUOTES));
				$nb_perso = mysql_real_escape_string(htmlspecialchars($_POST['nb_perso'], ENT_QUOTES));
				if(isset($id)) // Si les variables existent
				{
					if($id != NULL) // Si on a quelque chose à enregistrer
					{
						if($nb_perso == 0)
						{
							mysql_query("DELETE FROM account WHERE id='$id'") or die("Erreur de suppression");
							mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
							mysql_select_db($coolwow['db']) or die(mysql_error());
							mysql_query("DELETE FROM membres WHERE id='$id'") or die(mysql_error());
							echo "<p>Le compte a été supprimé !</p>";
							echo "<a href='javascript:history.go(-2)'>Retour</a>";
						}
						else
						{
							mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
							mysql_select_db($realmd['db']) or die(mysql_error());
							mysql_query('DELETE FROM `account` WHERE id='.$id);
							mysql_query('DELETE FROM `account_banned` WHERE id='.$id); //new
							mysql_query('DELETE FROM `realcharacters` WHERE acctid='.$id);
							
							mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
							mysql_select_db($characters[1]['db']) or die(mysql_error());
							mysql_query('DELETE FROM `account_data` WHERE account='.$id);
							mysql_query('DELETE FROM `character_tutorial` WHERE account='.$id);
							$guids = array();
							$reponse = mysql_query("SELECT * FROM `characters` WHERE account=".$id);
							while ($donnees = mysql_fetch_array($reponse) )
							{
								$guids[] = $donnees['guid'];
							}
							mysql_query("DELETE FROM `characters` WHERE account=".$id);
							foreach($guids as $value)
							{
								mysql_query("DELETE FROM `character_archievement` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_archievement_progress` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_action` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_aura` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_declinedname` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_gifts` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_homebind` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_inventory` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_queststatus` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_queststatus_daily` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_reputation` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_social` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_spell` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_spell_cooldown` WHERE guid=".$value);
								mysql_query("DELETE FROM `character_ticket` WHERE guid=".$value);
								mysql_query("DELETE FROM `corpse` WHERE guid=".$value);
								mysql_query("DELETE FROM `group_membre` WHERE memberGuid=".$value);
								mysql_query("DELETE FROM `guild_membre` WHERE guid=".$value);
								mysql_query("DELETE FROM `item_instance` WHERE owner_guid=".$value);
								mysql_query("DELETE FROM `petition` WHERE ownerguid=".$value);
								mysql_query("DELETE FROM `petition_sign` WHERE ownerguid=".$value);
								
								$guids2 = array();
								$reponse2 = mysql_query("SELECT * FROM `character_pet` WHERE owner=".$value);
								while ($donnees2 = mysql_fetch_array($reponse2) )
								{
									$guids2[] = $donnees2['id'];
								}
								mysql_query("DELETE FROM `character_pet` WHERE owner=".$value);
								mysql_query("DELETE FROM `character_pet_declinedname` WHERE owner=".$value);
								foreach($guids2 as $value2)
								{
									mysql_query("DELETE FROM `pet_aura` WHERE guid=".$value2);
									mysql_query("DELETE FROM `pet_spell` WHERE guid=".$value2);
									mysql_query("DELETE FROM `pet_spell_cooldown` WHERE guid=".$value2);
								}
								
								$guids3 = array();
								$reponse3 = mysql_query("SELECT * FROM `mail` WHERE receiver=".$value);
								while ($donnees2 = mysql_fetch_array($reponse3) )
								{
									$guids3[] = $donnees3['id'];
								}
								mysql_query("DELETE FROM `mail` WHERE receiver=".$value);
								mysql_query("DELETE FROM `mail_item` WHERE receiver=".$value);
								foreach($guids3 as $value3)
								{
									mysql_query("DELETE FROM `item_text` WHERE id=".$value3);

								}
							}
							mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
							mysql_select_db($coolwow['db']) or die(mysql_error());
							mysql_query("DELETE FROM membres WHERE id='$id'") or die(mysql_error());
							
							echo "<p>Le compte a été supprimé avec tout les personnages !</p>";
							echo "<a href='javascript:history.go(-2)'>Retour</a>";
						}
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
			case "editer":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				
					$post = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
					$sql="SELECT * FROM account WHERE id='$post'";
					$resultat=mysql_query($sql) or die ("Erreur requette SQL");
					$info=mysql_fetch_array($resultat);
						echo "<p class=\"title\">Editer le compte</p>
						<p>
						<form action=\"index.php?module=compte_jeu&action=modi\" method=\"POST\">
							<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
							<table border=\"0\">
								<tr>
									<td align=\"left\">ID:</td>
									<td align=\"left\"><input readonly type=\"text\" name=\"id\" value=\"".$info["id"]." \"size=\"6\"></td>
								</tr>
								<tr>
									<td align=\"left\">Nom du compte:</td>
									<td align=\"left\"><input type=\"text\" name=\"username\" value=\"".$info["username"]."\" size=\"50\" maxsize=\"50\"></td>
								</tr>
								<tr>
									<td align=\"left\">Mot de passe:</td>
									<td align=\"left\"><input type=\"text\" name=\"new_pass\" value=\"******\" size=\"50\" maxsize=\"40\"></td>
								</tr>
								<tr>
									<td align=\"left\">Adresse E-mail:</td>
									<td align=\"left\"><input type=\"text\" name=\"mail\" value=\"".$info["email"]."\" size=\"50\" maxsize=\"50\"></td>
								</tr>
								<tr>
									<td align=\"left\">Date d'inscription:</td>
									<td align=\"left\">".$info["joindate"]."</td>
								</tr>
								<tr>
									<td align=\"left\">Bannis:</td>
									<td align=\"left\">
										<SELECT NAME=\"banned\">
											<option value=\"0\">Bannis</option>
											<option value=\"1\">Non bannis</option>";
											$SQLt = "SELECT count(*) AS ban FROM account_banned WHERE id='$post'";
											$resultt = mysql_query($SQLt) or die("Erreur SQL");
											$valt = mysql_fetch_array($resultt);
											$ban = $valt['ban'];
											$SQL = "SELECT * FROM account_banned WHERE id='$post'";
											$result = mysql_query($SQL) or die("Erreur SQL");
											$val = mysql_fetch_array($result);
											echo "<OPTION SELECTED VALUE='$ban'>";
											if ($ban == 0)
											{ 
												echo "Non bannis</option></SELECT>";
											}
											else
											{ 
												echo "Bannis </option></SELECT><br />le: ".date('d-m-Y G:i', $val["bandate"])."<br />jusqu'au: ".date('d-m-Y G:i', $val["bandate"])."<br />par ".$val["bannedby"]."";
											}
									echo "</td>
								</tr>
								<tr>
									<td align=\"left\">Dernière IP:</td>
									<td align=\"left\">".$info["last_ip"]."</td>
								</tr>
								<tr>
									<td align=\"left\">Niveau de compte:</td>
									<td align=\"left\">
										<SELECT NAME=\"gmlevel\">
											<option SELECTED value=\"0\">0 - Joueur</option>
											<option value=\"1\">1 - Modérateur</option>
											<option value=\"2\">2 - Maitre du jeu</option>
											<option value=\"3\">3 - Traqueur de Bugs</option>
											<option value=\"4\">4 - Administrateur</option>
											<option value=\"5\">5 - Opérateur Système</option>";
											$SQLt = "SELECT * FROM account WHERE id='$post'";
											$resultt = mysql_query($SQLt) or die("Erreur SQL");
											$valt = mysql_fetch_array($resultt);
											echo "<OPTION SELECTED VALUE='".$valt["gmlevel"]."'>";
											if ($valt["gmlevel"] == 0){ echo "0 - Joueur";}
											elseif($valt["gmlevel"] == 1){ echo "1 - Modérateur";}
											elseif($valt["gmlevel"] == 2){ echo "2 - Maitre du jeu";}
											elseif($valt["gmlevel"] == 3){ echo "3 - Traqueur de Bugs";}
											elseif($valt["gmlevel"] == 4){ echo "4 - Administrateur";}
											else{ echo "5 - Opérateur Système";}
											echo "</option>
										</SELECT>
									</td>
								</tr>
								<tr>
									<td align=\"left\">Connexions échouées:</td>
									<td align=\"left\"><input type=\"text\" name=\"failedlog\" value=\"".$info["failed_logins"]."\" size=\"6\"></td>
								</tr>
								<tr>
									<td align=\"left\">Bloqué:</td>
									<td align=\"left\">
										<SELECT NAME=\"locked\">
											<option value=\"0\">Non bloqué</option>
											<option value=\"1\">Bloqué</option>";
											$SQLt = "SELECT * FROM account WHERE id='$post'";
											$resultt = mysql_query($SQLt) or die("Erreur SQL");
											$valt = mysql_fetch_array($resultt);
											echo "<OPTION SELECTED VALUE='".$valt["locked"]."'>";
											if ($valt["locked"] == 0){ echo "Non bloqué";}else{ echo "Bloqué";}
											echo "</option>
										</SELECT>
									</td>
								</tr>
								<tr>
									<td align=\"left\">Dernière connexion:</td>
									<td align=\"left\">".$info["last_login"]."</td>
								</tr>
								<tr>
									<td align=\"left\">En ligne:</td>";
									$onlinet = mysql_query("SELECT * FROM account WHERE id = $post") or die(mysql_error());
									$online = mysql_fetch_array($onlinet,MYSQL_ASSOC);
									if ($online['online'] == 1){$ol="OUI";}
									else{$ol="NON";}
									echo "<td align=\"left\">$ol</td>
								</tr>
								<tr>
									<td align=\"left\">Extension:</td>
									<td align=\"left\">
										<select name=\"expansion\">";
										if ($info["expansion"] == 0){ echo "<OPTION select value='0'>World of Warcraft</option>";}
										elseif($info["expansion"] == 1){ echo "<OPTION select value='1'>Burning Crusade</option>";}
										else{ echo "<OPTION select value='2'>Wrath of the Lich King</option>";}
										echo "
											<option value=\"0\">World of Warcraft</option>
											<option value=\"1\">Burning Crusade</option>
											<option value=\"2\">Wrath of the Lich King</option>
										</select>
									</td>
								</tr>";
								$nbt = mysql_query("SELECT SUM(numchars) AS total FROM realmcharacters WHERE acctid = '$post'") or die(mysql_error());
								$nbtot = mysql_fetch_array($nbt,MYSQL_ASSOC);
								
								mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
								mysql_select_db($characters[1]['db']) or die(mysql_error());
								$nbr = mysql_query("SELECT count(*) AS totalr FROM `characters` WHERE account = $post") or die(mysql_error());
								$nbtotr = mysql_fetch_array($nbr,MYSQL_ASSOC);
								
								echo "<tr>
									<td align=\"left\">Nombre total de personnages:</td>
									<td align=\"left\">$nbtot[total]</td>
								</tr>
								<tr>
									<td align=\"left\">Personnages dans ce royaume:</td>
									<td align=\"left\">$nbtotr[totalr]</td>
								</tr>
							</table>
							<p>Liste des personnages :<br />";
							mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
							mysql_select_db($characters[1]['db']) or die(mysql_error());
							$test = mysql_query("SELECT * FROM characters WHERE account=$post ORDER BY name ") or die(mysql_error());
							while ($donnees = mysql_fetch_array($test,MYSQL_ASSOC) )
							{
								$perso = $donnees['name'];
								$level = explode(' ',$donnees['data']);
								$niveau = $level[53];
								$race = $donnees['race'];
								$class = $donnees['class'];
								echo "<a href=\"../armurerie-select.php?perso=$perso\">$perso - ";
								nomrace($race);
								echo " ";
								nomclass($class);
								echo " | lvl $niveau</a><br />";
							}
							echo "</p><br /><table>
								<tr>
									<td align=\"left\"><a href='javascript:history.go(-1)'>Retour</a>  <input type=\"submit\" value=\"Modifier\"></td>
								</tr>
							</table>
						</form>
					</p>";
			break;
			case "modi":
				verify_xsrf_token();
				$id = mysql_real_escape_string($_POST['id']);
				$username = trim(htmlspecialchars($_POST['username']));
				$password = mysql_real_escape_string($_POST['new_pass']);
				$mail = mysql_real_escape_string($_POST['mail']);
				$banned = mysql_real_escape_string($_POST['banned']);
				$gmlevel = mysql_real_escape_string($_POST['gmlevel']);
				$failedlog = mysql_real_escape_string($_POST['failedlog']);
				$locked = mysql_real_escape_string($_POST['locked']);
				$expansion = mysql_real_escape_string($_POST['expansion']);
				
				//si sha_pass_hash = 1 donc username et newpass sont se actuellement.
				$sql2 = "SELECT * FROM account WHERE username='$username' AND sha_pass_hash=SHA1(CONCAT(UPPER('$username'),':',UPPER('$password')))";
				$reponse2 = mysql_query($sql2) or die (mysql_error());
				$sha_pass_hash = mysql_num_rows($reponse2);
				
				if ($password == "******" OR $password == "" OR $sha_pass_hash == 1)
				{
					// NE MODIFIE PAS LE MDP
					$requete = "UPDATE account SET username='$username',gmlevel='$gmlevel',email='$mail',failed_logins='$failedlog',locked='$locked',expansion='$expansion' WHERE id='$id'";
					$msg = "Les informations du compte ont bien été modifiées !";
				}
				else
				{
					// MODIFIE LE MDP
					$requete = "UPDATE account SET username='$username',sha_pass_hash=SHA1(CONCAT(UPPER('$username'),':',UPPER('$password'))),gmlevel='$gmlevel',email='$mail',failed_logins='$failedlog',locked='$locked',expansion='$expansion' WHERE id='$id'";
					$msg = "Le mot de passe ainsi que les informations du compte ont bien été modifiées !";
				}
				if (!eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-_.]?[0-9a-z])*\\.[a-z]{2,4}$",$mail))
				{
					echo "L'adresse e-mail n'est pas correcte !!!";
					echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
				}
				else
				{
					if (!is_numeric($failedlog))
					{
						echo "Le nombre de connexions échouées doit etre composé de chiffre uniquement !";
						echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
					}
					else
					{
						mysql_query($requete) or die(mysql_error());
						echo $msg;
						echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
			break;
			case "resultat";
				verify_xsrf_token();
				$perso = mysql_real_escape_string($_POST['perso']);
				$by = mysql_real_escape_string($_POST['by']);
				$requete = mysql_query("SELECT * FROM account WHERE $by LIKE'%$perso%'");
				echo "<p class=\"title\">Resultat de la recherche</p><br />";
				
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th class='milieu' width=\"30\"></th>
								<th width=\"30\"></th>
								<th width=\"30\">id</th>
								<th>Compte</th>
								<th>E-mail</th>
								<th>Inscrit le</th>
								<th>dernier ip</th>
								<th>dernier connexion</th>
							</tr>";
					while($donnees = mysql_fetch_assoc($requete))
					{
						$id = $donnees['id'];
						echo"<tr><td align=\"center\">";
						echo"<a href=\"index.php?module=compte_jeu&action=supprimer&id=$id\"><img src='../images/delete.gif' /></a>";
						echo"</td><td align=\"center\">";
						echo"<a href=\"index.php?module=compte_jeu&action=editer&id=$id\"><img src='../images/edit.png' /></a>";
						echo"</td><td align=\"center\">";
						echo $donnees['id'];
						echo"</td><td align=\"center\">";
						echo $donnees['username'];
						echo"</td><td align=\"center\">";
						echo $donnees['email'];
						echo"</td><td align=\"center\">";
						echo $donnees['joindate'];
						echo"</td><td align=\"center\">";
						echo $donnees['last_ip'];
						echo"</td><td align=\"center\">";
						echo $donnees['last_login'];
						echo"</td>";
						echo"</tr>";
					}
					echo "</table>";
			break;
			default:
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				
				$ParPage = $Par_Page; //Nous allons afficher 5 messages par page.
				//Une connexion SQL doit être ouverte avant cette ligne...
				$retour_total=mysql_query('SELECT COUNT(*) AS total FROM account'); //Nous récupérons le contenu de la requête dans $retour_total
				$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
				$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
				//Nous allons maintenant compter le nombre de pages.
				$nombreDePages=ceil($total/$ParPage);
				
				if(isset($truc)) // Si la variable $_GET['page'] existe...
				{
					$pageActuelle=intval($truc);
					if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
					{
						$pageActuelle=$nombreDePages;
					}
				}
				else // Sinon
				{
					$pageActuelle=1; // La page actuelle est la n°1    
				}
				$premiereEntree=($pageActuelle-1)*$ParPage; // On calcul la première entrée à lire
			
				$retour_messages = mysql_query('SELECT * FROM account ORDER BY id ASC LIMIT '.$premiereEntree.', '.$ParPage.'');
				echo "<p class=\"title\">Gestion des comptes</p><br />";
				echo "
				<form action=\"index.php?module=compte_jeu&action=resultat\" method=\"POST\">Rechercher 
					<select name=\"by\">
						<option value=\"id\">par ID</option>
						<option selected value=\"username\">par Nom du compte</option>
						<option value=\"gmlevel\">par Niveau MJ</option>
						<option value=\"email\">par Email</option>
						<option value=\"jointdate\">par Date d'inscription</option>
						<option value=\"last_ip\">par Adresse IP</option>
						<option value=\"last_login\">par Dernière connexion</option>
					</select>
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"text\" name=\"perso\"><input type=\"submit\" value=\"Rechercher\">
				</form><br />";
					//Aperçu
					echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th class='milieu' width=\"30\"><a href='index.php?module=compte_jeu&action=ajouter'><img src='../images/add.png' /></a></th>
								<th width=\"30\"></th>
								<th width=\"30\">ID</th>
								<th>Compte</th>
								<th>E-mail</th>
								<th>Inscrit le</th>
								<th>Dernier IP</th>
								<th>Dernier connexion</th>
							</tr>";
					while($donnees = mysql_fetch_assoc($retour_messages))
					{
						$id = $donnees['id'];
						echo"<tr><td align=\"center\">";
						echo"<a href=\"index.php?module=compte_jeu&action=supprimer&id=$id\"><img src='../images/delete.gif' /></a>";
						echo"</td><td align=\"center\">";
						echo"<a href=\"index.php?module=compte_jeu&action=editer&id=$id\"><img src='../images/edit.png' /></a>";
						echo"</td><td align=\"center\">";
						echo $donnees['id'];
						echo"</td><td align=\"center\">";
						echo $donnees['username'];
						echo"</td><td align=\"center\">";
						echo $donnees['email'];
						echo"</td><td align=\"center\">";
						echo $donnees['joindate'];
						echo"</td><td align=\"center\">";
						echo $donnees['last_ip'];
						echo"</td><td align=\"center\">";
						echo $donnees['last_login'];
						echo"</td>";
						echo"</tr>";
					}
					echo "<tr><td class='milieu'><a href='index.php?module=compte_jeu&action=ajouter'><img src='../images/add.png' /></a></td>
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
					echo "</table>";
					 
					$max_pg = ceil($total / $ParPage); //le nombre de page maximum...en partant de 1
					$page_test = $truc; //la page que je suis rendu actuellement dans l;'affichage
					$nb = 9; //le nombre de résultats pour l'affichage TOUJOUR UN NOMBRE IMPERE.
					$nbm = ( $nb - 1 ) / 2;
					if (empty($page_test))
					{
						$page = 1;
					}
					else
					{
						$page = $page_test;
					}
					if ($max_pg == 1)
					{
						echo "<p>Page 1 sur 1</p>";
					}
					else
					{
						echo "<p><font size=\"-1\">Pages ".$page." sur ".($max_pg)."</font><br />";
						if ($nb > $max_pg) // Si moin de page que le nombre de résultats pour l'affichage
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte_jeu&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							for($i = 1 ; $i < $max_pg+1 ; $i++)
							{
								if($i == $page)
								{
									echo ' <b><a>'.$i.'</a></b>';
								}
								else
								{
									echo ' <a href="index.php?module=compte_jeu&page='.$i.'">'.$i.'</a>';
								}
							}
							echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?module=compte_jeu&page='.($page+1).'">Suivante --></a></p>' : '';
						}
						elseif ($page <= $nbm) // les premieres pages
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte_jeu&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							for($i = 1 ; $i < $nb+1 ; $i++)
							{
								if($i == $page)
								{
									echo ' <b><a>'.$i.'</a></b>';
								}
								else
								{
									echo ' <a href="index.php?module=compte_jeu&page='.$i.'">'.$i.'</a>';
								}
							}
							echo " ...<a href=\"index.php?module=compte_jeu&page=".($max_pg)."\">".($max_pg)."</a>";
							echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?module=compte_jeu&page='.($page+1).'">Suivante --></a></p>' : '';
						}
						elseif ($page >= $max_pg - $nbm) // les dernieres pages
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte_jeu&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							echo '<a href="index.php?module=compte_jeu&page=1">1</a>... ';
							for($i = $max_pg-($nb-1) ; $i < $max_pg+1 ; $i++)
							{
								if($i == $page)
								{
									echo ' <b><a>'.$i.'</a></b>';
								}
								else
								{
									echo ' <a href="index.php?module=compte_jeu&page='.$i.'">'.$i.'</a>';
								}
							}
							echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?module=compte_jeu&page='.($page+1).'">Suivante --></a></p>' : '';
						}
						else // les autres pages
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte_jeu&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							echo '<a href="index.php?module=compte_jeu&page=1">1</a>... ';
							for($i = 1 ; $i < $nbm+1 ; $i++)
							{
								$i_page = $page - ($nbm+1) + $i;
								echo ' <a href="index.php?module=compte_jeu&page='.$i_page.'">'.$i_page.'</a>';
							}
							echo ' <b><a>'.$page.'</a></b>';
							for($i = 1 ; $i < $nbm+1 ; $i++)
							{
								$i_page = $page + $i;
								echo ' <a href="index.php?module=compte_jeu&page='.$i_page.'">'.$i_page.'</a>';
							}
							echo " ...<a href=\"index.php?module=compte_jeu&page=".($max_pg)."\">".($max_pg)."</a>";
							echo ($page != $max_pg-1 ) ? '&nbsp;&nbsp;<a href="index.php?module=compte_jeu&page='.($page+1).'">Suivante --></a></p>' : '';
						}
					}
			break;
		}
	}
	else
	{
		echo "<p>Vous n'êtes pas autorisé à accédez à cette partie de l'administration !</p>";
	}
}
elseif($_SESSION['auth'] != "yes")
{ header("location: ../index.php");
	exit();
}
elseif($_SESSION['gmlevel'] <= $gmlevel)
{
	echo "".$_SESSION['username']." vous n'ete pas autoriser a accédez a cette partie !";
	echo "<br /><a href=\"../index.php\">Retour</a>";
}
else
{
	echo "Erreur";
	echo "<br /><a href=\"../index.php\">Retour</a>";
}	
?>
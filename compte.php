<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
echo "<script language=\"JavaScript\" src=\"scripts/compte.js\"></script>";
$date = date("Y-m-d"); 
switch ($_GET['action'])
{
	case "creation":
		verify_xsrf_token();
		$username = Securite::bdd($_POST['username']);
		$password = Securite::bdd($_POST['password']);
		$confirme = Securite::bdd($_POST['confirme']);
		$email = Securite::bdd($_POST['email']);
		$security_code = Securite::bdd($_POST['security_code']);
		$validation = Securite::bdd($_POST['validation']);
		$get_security_code = Securite::bdd($_SESSION['security_code']);
		
		if(!preg_match('`^([[:alnum:]]+)$`', $username))
		{
			echo "Le nom du compte n'est pas bon !<br />
			Seul les caractères alphanumérique et chiffre sont autorisés !<br />";
			echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
		}
		else
		{
			if(IsSet($security_code) AND !Empty($security_code))
			{
				if(($get_security_code == $security_code) && (!empty($get_security_code)) )
				{
					if($validation == "oui")
					{
						if (empty($username) OR empty($password) OR empty($confirme) OR empty($email))
						{
							echo "<p>Un des champs est resté vide !!!</p>";
							echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";			
						}
						else
						{
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
								if ($test2 != $compte_mail)
								{
									// Verifie l'adresse mail.
									if (!eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-_.]?[0-9a-z])*\\.[a-z]{2,4}$",$email))
									{
										echo "L'adresse e-mail n'est pas correcte !!!";
										echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
									}
									else
									{
										//verifie si les deux mot de passe sont identique
										$username2 = strtoupper($username); 
										if ($password == $confirme)
										{
											if($valide_compte == 0)
											{
												mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
												mysql_select_db($realmd['db']) or die(mysql_error());
												mysql_query("INSERT INTO account (username, sha_pass_hash, email, expansion) VALUES ('$username2',SHA1(CONCAT(UPPER('$username2'),':',UPPER('$password'))),'$email','2')") or die(mysql_error());
												mysql_close();
												mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
												mysql_select_db($coolwow['db']) or die(mysql_error());
												$reponse3 = mysql_query("SELECT * FROM log_register WHERE date='$date'");
												if (mysql_num_rows($reponse3) <= 0)
												{
													mysql_query("INSERT INTO log_register (date,nb_register,nb_activation) VALUES ('$date','1','0')") or die(mysql_error());
												}
												else
												{
													mysql_query("UPDATE log_register SET nb_register = nb_register + 1 WHERE date ='$date'") or die(mysql_error());
												}
												mysql_close();
												echo "
												<p class=\"titre\">Votre compte a bien été créé !</p>
												Récapitulatif:<br />
												Utilisateur: $username2<br />
												Mot de passe: $password<br />
												Adresse email: $email<br />";
											}
											else
											{
												require_once("kernel/mailer/class.phpmailer.php");
												require_once("kernel/mailer/class.smtp.php");
												$chaine = cryptme(12);
												mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
												mysql_select_db($realmd['db']) or die(mysql_error());
												mysql_query("INSERT INTO account (username, sha_pass_hash, sessionkey, email, locked, expansion) VALUES ('$username2',SHA1(CONCAT(UPPER('$username2'),':',UPPER('$password'))),'$chaine','$email','1','2')") or die(mysql_error());
												mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
												mysql_select_db($coolwow['db']) or die(mysql_error());
												$reponse3 = mysql_query("SELECT * FROM log_register WHERE date='$date'");
												if (mysql_num_rows($reponse3) <= 0)
												{
													mysql_query("INSERT INTO log_register (date,nb_register,nb_activation) VALUES ('$date','1','0')") or die(mysql_error());
												}
												else
												{
													mysql_query("UPDATE log_register SET nb_register = nb_register + 1 WHERE date ='$date'") or die(mysql_error());
												}
												mysql_close();
												$sujet = "Votre inscription sur ".$server_path.", ".$username2."";
												$message="Félicitations, vous êtes inscrit sur ".$server_name."\n";
												$message.="\n";
												$message.="Vous êtes priés de conserver cet e-mail dans vos archives. Les informations concernant votre compte:\n";
												$message.="\n";
												$message.="Vous avez choisi :\n";
												$message.="Nom de compte : ".$username2."\n";
												$message.="Mot de passe du compte: ".$password."\n";
												$message.="\n";
												$message.="Ce compte est valable pour le jeu ainsi que pour le site !\n";
												$message.="\n";
												$message.="Pour valider définitivement votre inscription, nous vous demandons de la confirmer on cliquant sur le lien suivant: ".$server_path."/index.php?module=compte&action=activation&key=".$chaine."&pseudo=".$username2."\n";
												$message.="\n";
												$message.="Vous avez 48 heures pour activer votre compte après il sera supprimé !\n";
												$message.="\n";
												$message.="Veuillez ne pas oublier votre mot de passe étant donné qu'il est crypté dans notre base de données et que nous ne pourrons pas le retrouver pour vous. Toutefois, si vous oubliez votre mot de passe, vous pourrez en demander un nouveau qui sera activé de la même manière que ce compte.\n";
												$message.="\n";
												$message.="Merci de vous être enregistré.\n";
												$message.="\n";
												$message.="Bon jeu sur ".$server_name.".\n";
												$message.="Le Staff.\n";
												$mail = new PHPMailer();
												$mail->IsSMTP();
												$mail->SMTPAuth = true;
												$mail->CharSet = "UTF-8";
												$mail->Priority = 1;
												$mail->Host = $smtp_cfg['host'];
												$mail->Port = $smtp_cfg['port'];
												$mail->Username= $smtp_cfg['user'];
												$mail->Password= $smtp_cfg['password'];
												$mail->From=$admin_mail;
												$mail->FromName=$admin_mail;
												$mail->AddAddress($email,$email);
												$mail->AddReplyTo($reply_mail);
												$mail->Subject=$sujet;
												$mail->Body=$message;
												$mail->WordWrap = 100;
												if(!$mail->Send())
												{
												   echo "Erreur lors de l'envoi du mail,<br />Merci de contacter les MJ ou Administrateur à cette adresse: $admin_mail<br />Toute fois votre compte est bien créer mais en attent d'activation.<br />
												   <br /><a href='index.php'>Accueil</a>";
												}
												else
												{
													echo "Merci pour votre enregistrement<br />
													Vous allez recevoir un mail d'activation dans les minutes qui suivent<br />
													Merci de cliquer sur le lien qu'il contient.<br />
													Vous avez 48 heures pour activé votre compte, après il sera supprimé !<br />
													Toute fois vous pouvez vous connectez sur le site.<br />
													Si vous ne receviez pas le mail, merci de nous contacter via MP.<br />
													A bientôt<br />
													<br /><a href='index.php'>Accueil</a>";
												}
												$mail->SmtpClose();
												unset($mail);
											}
										}
										else
										{
											echo "Les deux mot de passe ne sont pas identiques !!!<br />";
											echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
										}
									}
								}
								else
								{
									echo "Vous avez atteint le nombre maximal de compte par adresse email.<br />";
									echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
								}
								
							}
							else
							{
								echo "Erreur: ce nom utilisateur existe déjà !!!";
								echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
							}
						}
					}
					else
					{
						echo "Si tu n'acceptes pas nos règles, tu peux aller faire un tour là:<br /><br />
						<a href=\"https://signup.wow-europe.com/menu.html?locale=fr_FR\">https://signup.wow-europe.com/menu.html?locale=fr_FR</a>";
					}
				}
				else
				{
					echo "Le code de sécuritée n'est pas bon !";
					echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
				}
			}
			else
			{
				echo "Vous devez remplir le champ du code de sécuritée !";
				echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
			}
		}
	break;
	case "activation":
		$key = Securite::bdd($_GET['key']);
		$pseudo = Securite::bdd($_GET['pseudo']);
		if (empty($key) OR empty($pseudo) OR !isset($key) OR !isset($pseudo))
		{
			echo "Erreur";
		}
		else
		{
			mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
			mysql_select_db($realmd['db']) or die(mysql_error());
			$reponse = mysql_query("SELECT *,DATE(joindate) AS date FROM account WHERE username = '".$pseudo."'") or die(mysql_error());
			if(mysql_num_rows($reponse) > 0)
			{
				//mysql_data_seek($reponse,0);
				$donnees = mysql_fetch_array($reponse);
				if($donnees['locked'] == 1)
				{
					if($donnees['sessionkey'] == $key)
					{
						$date2 = $donnees['date'];
						mysql_query("UPDATE account SET sessionkey = '', locked = 0 WHERE username = '".$pseudo."'") or die(mysql_error());
						mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
						mysql_select_db($coolwow['db']) or die(mysql_error());
						mysql_query("UPDATE log_register SET nb_activation = nb_activation + 1 WHERE date ='$date2'") or die(mysql_error());
						echo "Votre compte est désormé activé !<br />";
						echo "Merci de nous avoir rejoind et bon jeu.<br />";
						echo "<br /><a href='index.php'>Accueil</a>";
					}
					else
					{
						echo "La clé d'activation n'est pas bonne !";
					}
				}
				else
				{
					echo "Ce compte est déja activé !";
				}
			}
			else
			{
				echo "Le login n'existe pas !";
			}
		}
	break;
	default:
		generate_xsrf_token();
		$token = Securite::bdd($_SESSION['token_xsrf']);
		echo "
		<p class=\"title\">$titre_crea_compte</p>";
		if($valide_compte == 1)
		{
			echo "<p>Attention Validation du compte par Email</p>";
		}
		else
		{
			echo "";
		}
		echo "<p>Tous les champs sont obligatoires.</p>
		<form action=\"index.php?module=compte&action=creation\" method=\"POST\">
			<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
			<table>
				<tr>
					<td>$lang_create_account[username]</td>
					<td><input type=\"text\" name=\"username\" size=\"40\" onkeyup=\"verifPseudo(this.value)\" /><div id=\"pseudobox\"></div></td>
					
				</tr>
				<tr>
					<td>$lang_create_account[password]</td>
					<td><input type=\"password\" name=\"password\" size=\"40\" onkeyup=\"evalPwd(this.value);\" />
					</td>
				<tr>
					<td>Niveau de sécurité:</td>
					<td><div id=\"sm\"><ul><li id=\"weak\" class=\"nrm\">Faible</li><li id=\"medium\" class=\"nrm\">Moyen</li><li id=\"strong\" class=\"nrm\">Fort</li></ul></div></td>
				</tr>
				</tr>
				<tr>
					<td>$lang_create_account[passwordconf]</td>
					<td><input type=\"password\" name=\"confirme\" size=\"40\"></td>
				</tr>
				<tr>
					<td>$lang_create_account[email]</td>
					<td><input type=\"text\" name=\"email\" size=\"40\"></td>
				</tr>
				<tr>
					<td>Code de sécurité :</td>
					<td><img src=\"captcha/CaptchaSecurityImages.php\" alt=\"Code de vérification\" /></td>
				</tr>
				<tr>
					<td>Recopier le code</td>
					<td><input type=\"text\" id=\"security_code\" name=\"security_code\" size=\"40\"></td>
				</tr>
			</table>
			<br />
			<div id=\"shoutbox\">
				<div id=\"shoutbox_content\">";
				include("kernel/regles.txt");
				echo "</div>
			</div>
			<br />
			<INPUT TYPE=\"radio\" NAME=\"validation\" VALUE=\"oui\">J'accepte
			<INPUT TYPE=\"radio\" NAME=\"validation\" VALUE=\"non\">Je refuse
			<br /><br />
			<input type=\"submit\" name=\"submit\" value=\"Valider l'inscription\"></center>
		</form>";
	break;
}
?>
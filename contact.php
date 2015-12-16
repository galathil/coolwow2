<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

switch ($_GET['action'])
{
	case "envoi":
		verify_xsrf_token();
		$nom = Securite::html($_POST['nom']);
		$email = Securite::html($_POST['email']);
		$sujet = Securite::html($_POST['sujet']);
		$message = Securite::html($_POST['message']);
		$security_code = Securite::bdd($_POST['security_code']);
		$validation = Securite::bdd($_POST['validation']);
		$get_security_code = Securite::bdd($_SESSION['security_code']);
		
		if(IsSet($security_code) AND !Empty($security_code))
		{
			if(($get_security_code == $security_code) && (!empty($get_security_code)) )
			{
				if (empty($nom))
				{
					echo "<p>Merci d'entrer un nom/pseudo.</p>";
					echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";			
				}
				else
				{
					if (empty($_POST['email']))
					{
						echo "<p>Merci d'entrer une adresse e-mail valide.</p>";
						echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
					}
					else
					{
						if (!eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-_.]?[0-9a-z])*\\.[a-z]{2,4}$",$email))
						{
							echo "L'adresse e-mail n'est pas correcte !!!";
							echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
						}
						else
						{
							if (empty($sujet))
							{
								echo "<p>Merci d'entrer un sujet.</p>";	
								echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
							}
							else
							{
								if (empty($message))
								{
									echo "<p>Merci d'entrer un message.</p>";
									echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
								}
								else
								{
									if (ereg("[]%~#`$&|}{^[><]",$message))
									{ 
										echo "Certains caractères utilisés sont interdits";
										echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
									}
									else
									{
										$provenance=Securite::html($_SERVER['HTTP_REFERER']);	
										$adressip=Securite::html($_SERVER['REMOTE_ADDR']);
										$navigateur=Securite::html($_SERVER['HTTP_USER_AGENT']);
										$message2="Provenance : $provenance\n";
										$message2.="Adresse IP : $adressip\n";
										$message2.="Navigateur : $navigateur\n";
										$message2.="Nom : $nom\n";
										$message2.="E-mail : $email\n";
										$message2.="Sujet : $sujet\n";
										$message2.="Message : $message\n";
										
										require("kernel/mailer/class.phpmailer.php");
										require("kernel/config.php");
										if ($type_envoi == "smtp")
										{
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
											$mail->AddAddress($reply_mail,$reply_mail);
											$mail->AddReplyTo($email);
											$mail->Subject=$sujet;
											$mail->Body=$message2;
											$mail->WordWrap = 100;
											if(!$mail->Send())
											{
											   echo "Erreur: votre message n'a pu être envoyé.<br />";
											   echo "Mailer Error: " . $mail->ErrorInfo;
											   echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
											}
											else
											{
												echo "Votre message a bien été envoyé au webmastre du site. Nous vous remercions.";
												echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
											}
											$mail->SmtpClose();
											unset($mail);
											unset($_SESSION['security_code']);
										}
										elseif ($type_envoi == "mail")
										{
											if (mail($from_mail,$sujet,$message2,"From: $email"))
											{
											   echo "Votre message a bien été envoyé au webmastre du site. Nous vous remercions.<br />";
											   echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
											}
											else
											{
												echo "Erreur: votre message n'a pu être envoyé.";
												echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
											}
										}
										elseif ($type_envoi != "mail" or $type_envoi != "smtp")
										{
											echo "Erreur, merci de verifier la configuration du fichier config.php !";
											echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
										}
									}
								}
							}
						}
					}
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
	break;
	default:
		generate_xsrf_token();
		$token = Securite::bdd($_SESSION['token_xsrf']);
		echo "
		<p class=\"title\">Forumulaire de contact</p>
		<p>Tous commentaires et suggestions sur ce site sont les bienvenus et très important pour nous. Merci!</p>
		<form action=\"index.php?module=contact&action=envoi\" method=\"POST\">
		<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
			<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
				<tr> 
					<td width=\"25%\">Votre Nom :</td>
					<td width=\"80%\" align=\"left\">
					<input type=\"text\" name=\"nom\" size=\"50\" />
					</td>
				</tr>
				<tr> 
					<td width=\"25%\">Votre e-mail :</td>
					<td width=\"80%\" align=\"left\">
					<input type=\"text\" name=\"email\" size=\"50\" />
					</td>
				</tr>
				<tr> 
					<td width=\"25%\">Sujet :</td>
					<td width=\"80%\" align=\"left\">
					<input type=\"text\" name=\"sujet\" size=\"50\" />
					</td>
				</tr>
				<tr> 
					<td width=\"25%\" valign=\"top\">Message :</td>
					<td width=\"80%\">
						<textarea name=\"message\" alt=\"Message\" rows=\"10\" cols=\"50\" wrap=\"virtual\"></textarea>
					</td>
				</tr>
				<tr>
					<td width=\"25%\">Code de sécuritée :</td>
					<td width=\"80%\"><img src=\"captcha/CaptchaSecurityImages.php\" alt=\"Code de vérification\" /></td>
				</tr>
				<tr>
					<td width=\"25%\">Recopier le code</td>
					<td width=\"80%\"><input id=\"security_code\" name=\"security_code\" type=\"text\" /></td>
				</tr>
				<tr> 
					<td width=\"25%\">&nbsp;</td>
					<td width=\"80%\"><center><input type=\"submit\" name=\"Submit\" value=\"Envoyer\" alt=\"Envoi\" /></td>
				</tr>
			</table>
		</form>";
	break;
}
?>
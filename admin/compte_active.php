<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_compte_active"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
		mysql_select_db($realmd['db']) or die(mysql_error());
		switch ($_GET['action'])
		{
			case "activer":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$key = Securite::bdd($_GET['key']);
				$pseudo = Securite::bdd($_GET['pseudo']);
				if (empty($key) OR empty($pseudo) OR !isset($key) OR !isset($pseudo))
				{
					echo "Erreur";
				}
				else
				{
					echo "Etes-vous sûr de vouloir activer le compte ".$pseudo." ?
					<form action=\"index.php?module=compte_active&action=activer_v\" method=\"POST\">
						<input type=\"hidden\" name=\"key\" value=\"$key\">
						<input type=\"hidden\" name=\"pseudo\" value=\"$pseudo\">
						<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
						<input type=\"submit\" value=\"Activer\">
					</form>";
				}
			break;
			case "activer_v":
				verify_xsrf_token();
				$key = Securite::bdd($_POST['key']);
				$pseudo = Securite::bdd($_POST['pseudo']);
				if (empty($key) OR empty($pseudo) OR !isset($key) OR !isset($pseudo))
				{
					echo "Erreur";
				}
				else
				{
					mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
					mysql_select_db($realmd['db']) or die(mysql_error());
					$reponse = mysql_query("SELECT * FROM account WHERE username = '".$pseudo."'") or die(mysql_error());
					if(mysql_num_rows($reponse) > 0)
					{
						//mysql_data_seek($reponse,0);
						$donnees = mysql_fetch_array($reponse);
						if($donnees['locked'] == 1)
						{
							if($donnees['sessionkey'] == $key)
							{
								mysql_query("UPDATE account SET sessionkey = '', locked = 0 WHERE username = '".$pseudo."'") or die(mysql_error());
								echo "Ce compte est désormé activé !<br />";
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
			case "renvoyer_mail":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$key = Securite::bdd($_GET['key']);
				$pseudo = Securite::bdd($_GET['pseudo']);
				if (empty($key) OR empty($pseudo) OR !isset($key) OR !isset($pseudo))
				{
					echo "Erreur";
				}
				else
				{
					echo "<p>Etes-vous sûr de vouloir renvoyer le mail d'activation ?</p>
					<form action=\"index.php?module=compte_active&action=renvoyer_mail_v\" method=\"POST\">
						<input type=\"hidden\" name=\"key\" value=\"$key\">
						<input type=\"hidden\" name=\"pseudo\" value=\"$pseudo\">
						<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
						<input type=\"submit\" value=\"Renvoyer\">
					</form>";
				}
			break;
			case "renvoyer_mail_v":
				verify_xsrf_token();
				$key = Securite::bdd($_POST['key']);
				$pseudo = Securite::bdd($_POST['pseudo']);
				if (empty($key) OR empty($pseudo) OR !isset($key) OR !isset($pseudo))
				{
					echo "Erreur";
				}
				else
				{
					mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
					mysql_select_db($realmd['db']) or die(mysql_error());
					$reponse = mysql_query("SELECT * FROM account WHERE username = '".$pseudo."'") or die(mysql_error());
					if(mysql_num_rows($reponse) > 0)
					{
						$donnees = mysql_fetch_array($reponse);
						$email = $donnees['email'];
						require_once("../kernel/mailer/class.phpmailer.php");
						require_once("../kernel/mailer/class.smtp.php");
						$sujet = "Votre inscription sur ".$server_path.", ".$pseudo."";
						$message="Félicitations, vous êtes inscrit sur ".$server_name."\n";
						$message.="\n";
						$message.="Ce mail vous a été envoyé par un MJ où un Administrateur.\n";
						$message.="\n";
						$message.="Vous êtes priés de conserver cet e-mail dans vos archives. Les informations concernant votre compte:\n";
						$message.="\n";
						$message.="Vous avez choisi :\n";
						$message.="Nom de compte : ".$pseudo."\n";
						$message.="Mot de passe du compte: celui choisi lors de l'enregistrement.\n";
						$message.="\n";
						$message.="Ce compte est valable pour le jeu ainsi que pour le site !\n";
						$message.="\n";
						$message.="Pour valider définitivement votre inscription, nous vous demandons de la confirmer on cliquant sur le lien suivant: ".$server_path."/index.php?module=compte&action=activation&key=".$key."&pseudo=".$pseudo."\n";
						$message.="\n";
						$message.="Vous avez 48 heures pour activer votre compte après il sera supprimer !\n";
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
						   echo "Erreur lors de l'envoi du mail,<br />
						   <a href='index.php'>Accueil</a>";
						}
						else
						{
							echo "Le mail d'activation a été renvoyé.
							<br /><a href='index.php'>Accueil</a>";
						}
						$mail->SmtpClose();
						unset($mail);
					}
					else
					{
						echo "Le login n'existe pas !";
					}
				}
			break;
			default:
				echo "<p class=\"title\">Gérer les comptes en attente d'activation</p>";
				$retour = mysql_query('SELECT * FROM account WHERE locked = 1 AND last_ip = "0.0.0.0" ORDER BY id')or die(mysql_error());
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th width=\"30\"></th>
								<th width=\"30\"></th>
								<th width=\"30\">Activer</th>
								<th width=\"30\">ID</th>
								<th>Compte</th>
								<th>E-mail</th>
								<th>Inscrit le</th>
								<th>Clé d'avctivation</th>
							</tr>";
					if (mysql_num_rows($retour) < 1)
					{
						echo "<tr><td colspan=\"8\">Il n y a pas aucunes activation en attente !</td></tr>";
					}
					else
					{
						while($donnees = mysql_fetch_assoc($retour))
						{
							$id = $donnees['id'];
							echo"<tr><td align=\"center\">";
							echo"<a href=\"index.php?module=compte_jeu&action=supprimer&id=$id\"><img src='../images/delete.gif' /></a>";
							echo"</td><td align=\"center\">";
							echo"<a href=\"index.php?module=compte_active&action=renvoyer_mail&pseudo=".$donnees['username']."&key=".$donnees['sessionkey']."\"><img src='../images/envoyer.gif' /></a>";
							echo"</td><td align=\"center\">";
							echo"<a href=\"index.php?module=compte_active&action=activer&pseudo=".$donnees['username']."&key=".$donnees['sessionkey']."\"><img src='../images/aff_1.png' /></a>";
							echo"</td><td align=\"center\">";
							echo $donnees['id'];
							echo"</td><td align=\"center\">";
							echo $donnees['username'];
							echo"</td><td align=\"center\">";
							echo $donnees['email'];
							echo"</td><td align=\"center\">";
							echo $donnees['joindate'];
							echo"</td><td align=\"center\">";
							echo $donnees['sessionkey'];
							echo"</td>";
							echo"</tr>";
						}
					}
				echo "</table>";
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
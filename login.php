<?php
session_start();
require_once("kernel/config.php");
require_once("kernel/fonctions.php");
require("header_simple.php");
require("themes/header_simple_theme.php");

if(($_SESSION['auth'] != "yes") or ($_GET['action'] == "logout"))
{
	mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
	mysql_select_db($realmd['db']) or die(mysql_error());
	$ip = Securite::bdd($_SERVER['REMOTE_ADDR']);
	$datetime = date("Y-m-d H:i:s"); 
	
	switch ($_GET['action'])
	{
		// Forumlaire de connexion
		default:
			generate_xsrf_token();
			$token = Securite::bdd($_SESSION['token_xsrf']);
			echo "<p class=\"title\">Page reservé des membres</p>
				<p>Merci de vous connectez !!!</p>
				<form action=\"login.php?action=traitement\" method=\"post\">
					<table border=\"0\">
						<tr>
							<td>Identifiant</td>
							<td><input type=\"text\" name=\"username\" size=\"20\" maxsize=\"20\" /></td>
						</tr>
						<tr>
							<td>Mots de passe</td>
							<td><input type=\"password\" name=\"password\" size=\"20\" maxsize=\"20\" /></td>
						</tr>
					</table>
					<a href=\"login.php?action=perdu\">Mot de passe perdu ?</a><br />
					<br />
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"submit\" name=\"login\" value=\"S'identifier\" />
				</form>
				<br />
				<a href=\"index.php\">Retour</a>";
		break;
		
		// Traitement du forulaire
		case "traitement":
			verify_xsrf_token();
			$user = Securite::bdd($_POST['username']);
			$pass = Securite::bdd($_POST['password']);
			$reponse = mysql_query("SELECT * FROM account WHERE username='$user'") or die (mysql_error());
			if(mysql_num_rows($reponse) > 0)
			{
				$reponse2 = mysql_query("SELECT * FROM account WHERE username='$user' AND sha_pass_hash=SHA1(CONCAT(UPPER('$user'),':',UPPER('$pass')))") or die (mysql_error());
				if(mysql_num_rows($reponse2) > 0)
				{
					$donnees2 = mysql_fetch_array($reponse2);
					mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
					mysql_select_db($coolwow['db']) or die(mysql_error());
					$reponse3 = mysql_query("SELECT * FROM membres WHERE account_name='$user'") or die (mysql_error());
					$donnees3 = mysql_fetch_array($reponse3,MYSQL_ASSOC);
					
					mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
					mysql_select_db($characters[1]['db']) or die(mysql_error());
					$reponse4 = mysql_query("SELECT * FROM characters WHERE account='".$donnees2['id']."'") or die (mysql_error());
					$donnees4 = mysql_fetch_array($reponse4);
					if(mysql_num_rows($reponse3) > 0)
					{
						if($donnees3['pseudo'] != $donnees3['account_name'])
						{
							// LE COMPTE EXISTE
							mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
							mysql_select_db($characters[1]['db']) or die(mysql_error());
							$reponse5 = mysql_query("SELECT COUNT(*) AS total FROM characters WHERE name='".$donnees3['pseudo']."'") or die (mysql_error());
							$donnees5 = mysql_fetch_array($reponse5);
							if($donnees5['total'] == 1)
							{
								// Perso existe encors
								$donnees5 = mysql_fetch_array($reponse);
								$_SESSION['auth'] = "yes";
								$_SESSION['username'] = $donnees3['account_name'];
								$_SESSION['pseudo'] = $donnees3['pseudo'];
								$_SESSION['gmlevel'] = $donnees5['gmlevel'];
								$_SESSION['id'] = $donnees5['id'];
								$_SESSION['lang'] = $donnees3['membre_lang'];
								$date = time();
								mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
								mysql_select_db($coolwow['db']) or die(mysql_error());
								mysql_query("INSERT INTO log_login (type_conn,id_account,ip,date) VALUES ('site','".$donnees5['id']."','".$ip."','".$datetime."')");
								mysql_query("UPDATE membres SET membre_derniere_visite ='$date' WHERE account_name ='$user'") or die(mysql_error());
								echo "<script type=\"text/javascript\">window.location='index.php';</script>Si vous voyez ce message cliqué <a href=\"index.php\">ici</a>";
							}
							else
							{
								// Perso existe plus
								$donnees5 = mysql_fetch_array($reponse);
								$_SESSION['auth'] = "yes";
								$_SESSION['username'] = $donnees2['username'];
								$_SESSION['pseudo'] = $donnees3['pseudo'];
								$_SESSION['gmlevel'] = $donnees5['gmlevel'];
								$_SESSION['id'] = $donnees5['id'];
								$_SESSION['lang'] = $donnees3['membre_lang'];
								$date = time();
								mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
								mysql_select_db($coolwow['db']) or die(mysql_error());
								mysql_query("INSERT INTO log_login (type_conn,id_account,ip,date) VALUES ('site','".$donnees5['id']."','".$ip."','".$datetime."')");
								mysql_query("UPDATE membres SET pseudo ='".$donnees2['username']."', membre_derniere_visite ='$date' WHERE account_name ='$user'") or die(mysql_error());
								echo "<p class=\"title\">Erreur avec votre pseudo</p>
								<p>Votre pseudo n'est plus utilisable car le nom du personnage y faisant référence n'existe plus,<br />
								votre pseudo est donc désormais le nom de votre compte.<br />
								<br />
								Pour sélectionner le nom d'un autre personnage en pseudo allez dans la gestion de votre compte.</p>
								<p><a href='index.php'>Retour à l'accueil</a></p>";
							}
						}
						else
						{
							$donnees5 = mysql_fetch_array($reponse);
							$_SESSION['auth'] = "yes";
							$_SESSION['username'] = $donnees3['account_name'];
							$_SESSION['pseudo'] = $donnees3['pseudo'];
							$_SESSION['gmlevel'] = $donnees5['gmlevel'];
							$_SESSION['id'] = $donnees5['id'];
							$_SESSION['lang'] = $donnees3['membre_lang'];
							$date = time();
							mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
							mysql_select_db($coolwow['db']) or die(mysql_error());
							mysql_query("INSERT INTO log_login (type_conn,id_account,ip,date) VALUES ('site','".$donnees5['id']."','".$ip."','".$datetime."')");
							mysql_query("UPDATE membres SET membre_derniere_visite ='$date' WHERE account_name ='$user'") or die(mysql_error());
							echo "<script type=\"text/javascript\">window.location='index.php';</script>Si vous voyez ce message cliqué <a href=\"index.php\">ici</a>";
						}
					}
					else
					{
						// LE COMPTE EXISTE PAS ENCORE
						if(mysql_num_rows($reponse4) > 0)
						{
							// IL Y A DES PERSO
							generate_xsrf_token();
							$token = Securite::bdd($_SESSION['token_xsrf']);
							echo "Ceci est votre première connexion<br />
							Vous avez la possibilité de choisir le nom d'un de vos personnages comme pseudo sur le site.<br /><br />
							<form class=\"recherche\" method=\"post\" action=\"login.php?action=nouveau\">
								<select name=\"perso\">";
								mysql_data_seek($reponse4,0);
								while ($val = mysql_fetch_array($reponse4))
								{
									echo "<OPTION VALUE='".Securite::bdd($val['name'])."'>".Securite::bdd($val['name'])."</option>";
								}
								echo "</SELECT>
								<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
								<input type=\"hidden\" name=\"id\" value=\"".$donnees2['id']."\" />
								<input type=\"submit\" value=\"Valider\" />
							</form>";
						}
						else
						{
							// PAS ENCORS DE PERSO
							generate_xsrf_token();
							$token = Securite::bdd($_SESSION['token_xsrf']);
							echo "Bienvenue $user<br />";
							echo "Vous n'avez pour le moment aucuns personnages, par défaut votre pseudo sera le même que le nom de votre compte.<br />
							Lorsque vous aurez des persos, vous pourrez utiliser le nom d'un des persos comme pseudo.<br />
							Cela se fera via \"Mon compte\".<br /><br />
							<form class=\"recherche\" method=\"post\" action=\"login.php?action=nouveau\">
								<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
								<input type=\"hidden\" name=\"id\" value=\"".$donnees2['id']."\" />
								<input type=\"hidden\" name=\"perso\" value=\"".$user."\" />
								<input type=\"submit\" value=\"Continuer\" />
							</form>";
						}
					}
				}
				else
				{
					echo "<p class='title'>Erreur lors de la connexion !!!</p><br />";
					echo "<p>le login '$user' existe, mais le mot de passe ne va pas ! Réessayez.<br></p>";
					echo "<p><a href='login.php?action=perdu'>Mot de passe perdu ?</a></p>";
					echo "<p><a href='login.php'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p class='title'>Erreur lors de la connexion !!!</p>";
				echo "Le login que vous avez saisi n'existe pas.<br>";
				echo "<br /><a href='login.php'>Retour</a>";
			}
		break;
		
		// 
		case "nouveau":
			verify_xsrf_token();
			$pseudo = Securite::bdd($_POST['perso']);
			$id = Securite::bdd($_POST['id']);
			
			if(empty($pseudo) or !isset($id))
			{
				echo "erreur";
			}
			else
			{
				mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
				mysql_select_db($realmd['db']) or die(mysql_error());
				$reponse = mysql_query("SELECT * FROM account WHERE id='$id'") or die (mysql_error());
				$donnees = mysql_fetch_array($reponse,MYSQL_ASSOC);
				
				$date = time();
				$gmlevel = Securite::bdd($donnees['gmlevel']);
				$account_name = Securite::bdd($donnees['username']);
				$id_account = Securite::bdd($donnees['id']);
				$mail = Securite::bdd($donnees['email']);
				$inscrit = Securite::bdd($donnees['joindate']);
				$mdp = "no";
				mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
				mysql_select_db($coolwow['db']) or die(mysql_error());
				mysql_query("INSERT INTO log_login (type_conn,id_account,ip,date) VALUES ('site','".$id_account."','".$ip."','".$datetime."')");
				mysql_query("INSERT INTO membres (id, account_name, pseudo,membre_lang, membre_mdp, membre_email, membre_inscrit, membre_derniere_visite, membre_gmlevel) VALUES ('".$id_account."' , '".$account_name."' , '".$pseudo."' , '".$language."' , '".$mdp."' , '".$mail."' , '".$date."' , '".$date."' , '".$gmlevel."' ) ") or die(mysql_error());
				mysql_query("INSERT INTO membres_groups (group_id, membre_id) VALUES (2, '".$id."')");
				$_SESSION['auth'] = "yes";
				$_SESSION['username'] = $account_name;
				$_SESSION['pseudo'] = $pseudo;
				$_SESSION['gmlevel'] = $gmlevel;
				$_SESSION['id'] = $id_account;
				$_SESSION['lang'] = "french";
				echo "<script type=\"text/javascript\">window.location='index.php';</script>Si vous voyez ce message cliqué <a href=\"index.php\">ici</a> pour continuer.";
			}
		break;
		
		// Mot de passe perdu
		case "perdu":
			generate_xsrf_token();
			$token = Securite::bdd($_SESSION['token_xsrf']);
			echo "<p class=\"title\">Récupérer son mot de passe</p>
				<p></p>
				<form action=\"login.php?action=perdu_v\" method=\"post\">
					<table border=\"0\">
						<tr>
							<td>Nom du compte</td>
							<td><input type=\"text\" name=\"account\" size=\"20\" maxsize=\"20\" /></td>
						</tr>
						<tr>
							<td>Adresse EMail</td>
							<td><input type=\"text\" name=\"mail\" size=\"20\" maxsize=\"20\" /></td>
						</tr>
					</table>
					<br />
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"submit\" name=\"login\" value=\"Valider\" />
				</form>
				<br />
				<a href=\"index.php\">Retour</a>";
		break;
		case "perdu_v":
			verify_xsrf_token();
			$account = Securite::bdd($_POST['account']);
			$email = Securite::bdd($_POST['mail']);
			if(empty($account) or !isset($account)or empty($email) or !isset($email))
			{
				echo "Erreur : Un des champs est vide !";
			}
			else
			{
				if (!eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-_.]?[0-9a-z])*\\.[a-z]{2,4}$",$email))
				{
					echo "L'adresse e-mail n'est pas correcte !";
					echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
				}
				else
				{
					mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
					mysql_select_db($realmd['db']) or die(mysql_error());
					$reponse = mysql_query("SELECT * FROM account WHERE username='".$account."' AND email='".$email."'") or die (mysql_error());
					if(mysql_num_rows($reponse) > 0)
					{
						// OK
						require_once("kernel/mailer/class.phpmailer.php");
						require_once("kernel/mailer/class.smtp.php");
						$chaine = cryptme(8);
						mysql_query("UPDATE account SET sha_pass_hash=SHA1(CONCAT(UPPER('$account'),':',UPPER('$chaine'))) WHERE username = '".$account."'") or die(mysql_error());
						$sujet = "Votre demande de nouveau mot de passe";
						$message="Votre demande de nouveau mot de passe\n";
						$message.="\n";
						$message.="Votre nouveau mots de passe est : $chaine\n";
						$message.="Merci de modifer votre mot de passe à la prochaine connexion.\n";
						$message.="\n";
						$message.="Merci\n";
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
						   echo "Erreur lors de l'envoi du mail,<br />Merci de contacter les MJ ou Administrateur à cette adresse: $admin_mail.<br />
						   <br /><a href='index.php'>Accueil</a>";
						}
						else
						{
							echo "Un nouveau mots de passe vient de vous etre envoyé,<br />
							merci de le changer à la prochaine connexion.<br />
							<br /><a href='index.php'>Accueil</a>";
						}
						$mail->SmtpClose();
						unset($mail);
					}
					else
					{
						// Erreur
						echo "<p>Les informations entrées sont incorrectes !<br />";
						echo "Si vous ne connaissez pas une des deux informations,<br />";
						echo "merci de contacter l'équipe à cette adresse : <a href=\"mailto:".$admin_mail."\">".$admin_mail."</a></p>";
						echo "<p><a href='javascript:history.go(-1)'>Retour</a></p>";
					}
				}
			}
		break;
		
		// Deconnexion
		case "logout":
			$_SESSION = array();
			session_destroy();
			header("location: index.php");
		break;
	}
}
else
{
	echo "<p>Vous êtes déjà connecté !!!</p>";
	echo "<p><a href=\"index.php\">Retour</a></p>";
}
require("themes/footer_simple_theme.php");
require("footer_simple.php");
?>
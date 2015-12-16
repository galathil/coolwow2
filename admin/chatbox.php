<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_chatbox"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "delete":
				$get = Securite::bdd($_GET['id']);
				$reponse = mysql_query("SELECT * FROM chatbox WHERE id_msg='$get'") or die(mysql_error());
				echo "<p class=\"title\">Ete-vous sur de vouloir supprimer ce message ?</p>";
				while ($donnees = mysql_fetch_row($reponse))
					{
						echo "Message: $donnees[1]<br /><br />";
						$id = "$donnees[0]";
						echo "<form action=\"index.php?module=chatbox&action=del\" method=\"POST\"><input type=\"hidden\" name=\"id\" value='$id'><input type=\"submit\" name=\"del\" value=\"Oui\"></form>";
					}
		    break;
			case "del":
				$post = Securite::bdd($_POST['id']);
				if (isset($post)) // Si les variables existent
				{
					if ($post != NULL) // Si on a quelque chose à enregistrer
					{
						mysql_query("DELETE FROM chatbox WHERE id_msg='$post'") or die("Erreur de suppression");
						// On se déconnecte de MySQL
						echo "<p>Le message a été supprimé !</p>";
						echo "<br /><a href='javascript:history.go(-2)'>Retour</a>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</b></p>";
						echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR!!!</b></p>";
					echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
				}
		    break;
			case "modify":
				$post = Securite::bdd($_GET['id']);
				if (isset($post)) // Si les variables existent
				{
					if ($post != NULL) // Si on a quelque chose à enregistrer
					{
					$sql="SELECT * FROM chatbox WHERE id_msg=$post";
					$resultat=mysql_query($sql) or die ("Erreur requette SQL");
					$info=mysql_fetch_array($resultat);
					echo "
					<p class=\"title\">Modifier le message</p>
					<form action=\"index.php?module=chatbox&action=modi\" method=\"POST\">
						<div class=\"news\">
							<fieldset><legend>ID du message :</legend>
								<input readonly type=\"text\" size=\"10\" name=\"id_msg\" value=\"".$info["id_msg"]."\" />
							</fieldset>
							<fieldset><legend>Auteur :</legend>
								<input readonly type=\"text\" name=\"auteur_msg\" value=\"".$info["auteur_msg"]."\" size=\"50\" maxsize=\"100\">
							</fieldset>
							<fieldset>
								<legend>Message :</legend>
								<textarea name=\"msg\" rows=\"20\" cols=\"100%\">".Securite::html($info["msg"])."</textarea>
							</fieldset>
							<br />
							<input type=\"submit\" value=\"Modifier\" />
						</div>	
					</form>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</b></p>";
						echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR!!!</b></p>";
					echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
				}
		    break;
			case "modi":
				$id_msg = Securite::bdd($_POST['id_msg']);
				$msg = Securite::bdd($_POST['msg']);
			if (isset($msg)) // Si les variables existent
				{
					if ($msg != NULL) // Si on a quelque chose à enregistrer
					{
						// Ensuite on enregistre le message
						mysql_query("UPDATE chatbox SET msg='$msg' WHERE id_msg='$id_msg'") or die(mysql_error());
						echo "<p>Le message a été modifié !</p>";
						echo "<br /><a href='javascript:history.go(-2)'>Retour</a>";
				}
					else  //Si il y a rien à enregistrer
					{
						echo "<p>ERREUR 1!!!</b>";
						echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR 2 !!!</b></p>";
					echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
				}
		    break;
			default:
				$retour_total=mysql_query('SELECT COUNT(*) AS total FROM chatbox'); //Nous récupérons le contenu de la requête dans $retour_total
				$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
				$total=Securite::html($donnees_total['total']); //On récupère le total pour le placer dans la variable $total.
			
				$sql="SELECT * FROM chatbox ORDER BY id_msg DESC";
				$resultat=mysql_query($sql) or die ("Erreur requette SQL");
				echo "
					<p class=\"title\">Gestion de la chatbox</p>";	
					//Aperçu
					echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
						<tr>
							<th width=\"30\"></th><th width=\"30\"></th>
							<th width=\"30\">id</th><th>Messages</th>
						</tr>";
					if ($total == 0)
					{
						echo "<tr><td colspan=\"4\">Il n'y a pour le moment aucuns messages dans la chatbox !</td></tr>";
					}
					else
					{
						while($ligne=mysql_fetch_array($resultat))
						
						{
							extract($ligne);
							echo "<tr><td class='milieu'><a href=\"index.php?module=chatbox&action=delete&id=".Securite::html($id_msg)."\"><img src='../images/delete.gif' /></a></td><td class='milieu'><a href=\"index.php?module=chatbox&action=modify&id=".Securite::html($id_msg)."\"><img src='../images/edit.png' /></a></td><td class='milieu'>".Securite::html($id_msg)."</td><td>".Securite::html($msg)."</td></tr>";
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
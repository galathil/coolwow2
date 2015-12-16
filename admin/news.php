<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_news"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "poster":
				echo "
					<p class=\"title\">Ecriture d'une news</p>
					<form name=\"poste\" action=\"index.php?module=news&action=post\" method=\"POST\">
						<div  align=\"left\" class=\"news\">
							<fieldset><legend>Titre :</legend>
								<input type=\"text\" name=\"titre\" size=\"100\" maxsize=\"100\" />
							</fieldset>
							<fieldset><legend>Auteur :</legend>
								<input readonly type=\"text\" name=\"auteur\" value=\"".Securite::bdd($_SESSION['username'])."\" size=\"50\" maxsize=\"100\">
							</fieldset>
							<fieldset>
							<legend>Mise en forme :</legend>
							<input type=\"image\" src=\"../images/bbcode/bold_fr.gif\" border=\"1\" id=\"gras\" name=\"gras\" value=\"G\" onClick=\"javascript:bbcode('[g]', '[/g]');return(false)\" />
							<input type=\"image\" src=\"../images/bbcode/italic.gif\" border=\"1\" id=\"italic\" name=\"italic\" value=\"I\" onClick=\"javascript:bbcode('[i]', '[/i]');return(false)\" />
							<input type=\"image\" src=\"../images/bbcode/underline.gif\" border=\"1\" id=\"souligné\" name=\"souligné\" value=\"S\" onClick=\"javascript:bbcode('[s]', '[/s]');return(false)\" />
							<input type=\"image\" src=\"../images/bbcode/left.gif\" border=\"1\" id=\"gauche\" name=\"gauche\" value=\"S\" onClick=\"javascript:bbcode('[left]', '[/left]');return(false)\" />
							<input type=\"image\" src=\"../images/bbcode/center.gif\" border=\"1\" id=\"centré\" name=\"centré\" value=\"S\" onClick=\"javascript:bbcode('[center]', '[/center]');return(false)\" />
							<input type=\"image\" src=\"../images/bbcode/right.gif\" border=\"1\" id=\"droite\" name=\"droite\" value=\"S\" onClick=\"javascript:bbcode('[right]', '[/right]');return(false)\" />
							<input type=\"image\" src=\"../images/bbcode/full.gif\" border=\"1\" id=\"justifié\" name=\"justifié\" value=\"S\" onClick=\"javascript:bbcode('[full]', '[/full]');return(false)\" />
							<a href='javascript:addsm(\"[br]\")' title='Retour à la ligne'><img src=\"../images/bbcode/br.gif\" border=\"1\"></a>
							<br />
							<input type=\"image\" src=\"../images/bbcode/link.gif\" border=\"1\" id=\"lien\" name=\"lien\" value=\"Lien\" onClick=\"javascript:bbcode('[url]', '[/url]');return(false)\" />
							<input type=\"image\" src=\"../images/bbcode/mail.gif\" border=\"1\" id=\"email\" name=\"email\" value=\"@\" onClick=\"javascript:bbcode('[email]', '[/email]');return(false)\" />
							<input type=\"image\" src=\"../images/bbcode/image.gif\" border=\"1\" id=\"image\" name=\"image\" value=\"Image\" onClick=\"javascript:bbcode('[img]', '[/img]');return(false)\" />
							<br />
							<a href='javascript:addsm(\":)\")' title=':)'><img src='../images/smileys/icon_biggrin.gif' border=0></a>
							<a href='javascript:addsm(\":D\")' title=':D'><img src='../images/smileys/icon_lol.gif' border=0></a>
							<a href='javascript:addsm(\":love:\")' title=':love:'><img src='../images/smileys/sm3.gif' border=0></a>
							<a href='javascript:addsm(\":o\")' title=':o'><img src='../images/smileys/icon_eek.gif' border=0></a>
							<a href='javascript:addsm(\";)\")' title=';)'><img src='../images/smileys/icon_wink.gif' border=0></a>
							<a href='javascript:addsm(\":cry:\")' title=':cry:'><img src='../images/smileys/icon_cry.gif' border=0></a>
							<a href='javascript:addsm(\":(\")' title=':('><img src='../images/smileys/icon_sad.gif' border=0></a>
							<a href='javascript:addsm(\";(\")' title=';('><img src='../images/smileys/icon_evil.gif' border=0></a>
							<a href='javascript:addsm(\":fuck:\")' title=':fuck:'><img src='../images/smileys/sm30.gif' border=0></a>
							<a href='javascript:addsm(\":cool:\")' title=':cool:'><img src='../images/smileys/sm28.gif' border=0></a>
							<a href='javascript:addsm(\":p\")' title=':p'><img src='../images/smileys/sm12.gif' border=0></a>
							<a href='javascript:addsm(\":haha:\")' title=':haha:'><img src='../images/smileys/sm38.gif' border=0></a>
						</fieldset>
							<fieldset>
								<legend>Message :</legend>
								<textarea name=\"message\" rows=\"20\" cols=\"90%\"></textarea>
							</fieldset>
							<br />
							<input type=\"submit\" value=\"Envoyer\" />
							<input type=\"reset\" name = \"Effacer\" value = \"Effacer\" />
						</div>
					</form>";
			break;
			case "post":
				$titre = Securite::bdd($_POST['titre']);
				$message = Securite::bdd($_POST['message']);
				$auteur = Securite::bdd($_POST['auteur']);
				$date = date("Y-m-d H:i:s");
				if (isset($titre) and ($message)) // Si les variables existent
					{
						if (($_POST['message']) != NULL) // Si on a quelque chose à enregistrer
						{
							// Ensuite on enregistre le message
							mysql_query("INSERT INTO news (titre, news, auteur, date_news) VALUES ('$titre','$message','$auteur','$date')") or die(mysql_error());
							// On se déconnecte de MySQL
							echo "<p>La news a bien été postée !</p>";
							echo "<a href='javascript:history.go(-2)'>Retour</a>";
						}
						else  //Si il y a rien à enregistrer
						{
							echo "<p>Aucun messages de rentrés</p>";
							echo "<a href='javascript:history.go(-1)'>Retour</a>";
						}
					}
					else  //Si les variables n'existent pas
					{
						echo "<p>Aucun auteur et/ou message de rentrés  !!!</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
		    break;
			case "delete":
				$get = Securite::bdd($_GET['id']);
				$reponse = mysql_query("SELECT * FROM news WHERE idnews='$get'") or die(mysql_error());
				echo "<p class=\"title\">Êtes-vous sûr de vouloir supprimer la news ?</p>";
				while ($donnees = mysql_fetch_row($reponse))
					{
					$num_msg = $donnees[0];
					$titre = $donnees[1];
					$msg = $donnees[2];
					echo "Message $num_msg: $titre $msg";
					echo "<form action=\"index.php?module=news&action=del\" method=\"POST\">
						<input type=\"hidden\" name=\"id\" value='$num_msg'><br />
						<input type=\"submit\" name=\"del\" value=\"Oui\">
					</form>";
					}
		    break;
			case "del":
				$post = Securite::bdd($_POST['id']);
				if (isset($post)) // Si les variables existent
				{
					if ($post != NULL) // Si on a quelque chose à enregistrer
					{
						mysql_query("DELETE FROM news WHERE idnews='$post'") or die("Erreur de suppression");
						// On se déconnecte de MySQL
						echo "<p>La news a été supprimée !</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR!!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
		    break;
			case "modify":
				$post = Securite::bdd($_GET['id']);
				if (isset($post)) // Si les variables existent
				{
					if ($post != NULL) // Si on a quelque chose à enregistrer
					{
					$sql="SELECT * FROM news WHERE idnews=$post";
					$resultat=mysql_query($sql) or die ("Erreur requette SQL");
					$info=mysql_fetch_array($resultat);
					echo "
					<p class=\"title\">Modifier la news</p>
					<p><form action=\"index.php?module=news&action=modi\" method=\"POST\">
					<div  align=\"left\" class=\"news\"><form name=\"poste\" action=\"index.php?module=news&action=post\" method=\"POST\">
						<fieldset><legend>ID de la news :</legend>
							<input readonly type=\"text\" size=\"10\" name=\"idnews\" value=\"".Securite::bdd($info["idnews"])."\" />
						</fieldset>
						<fieldset><legend>Titre :</legend>
							<input type=\"text\" size=\"80\" maxsize=\"100\" name=\"titre\" value=\"".Securite::html_edit($info["titre"])."\" />
						</fieldset>
						<fieldset><legend>Auteur / Correcteur:</legend>
							<input readonly type=\"text\" name=\"auteur\" value=\"".Securite::bdd($info["auteur"])."\" size=\"50\" maxsize=\"100\">
						</fieldset>
						<fieldset>
							<legend>Message :</legend>
							<textarea name=\"message\" rows=\"20\" cols=\"100%\">".Securite::html_edit($info["news"])."</textarea>
						</fieldset>
						<br />
						<input type=\"submit\" value=\"Modifier\" />
					</form></div>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR!!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
		    break;
			case "modi":
				$idnews = Securite::bdd($_POST['idnews']);
				$titre = Securite::bdd($_POST['titre']);
				$news = Securite::bdd($_POST['message']);
				$edit = Securite::bdd($_SESSION['username']);
				$date = date("Y-m-d H:i:s");
			if (isset($news)) // Si les variables existent
				{
					if ($news != NULL) // Si on a quelque chose à enregistrer
					{
						// Ensuite on enregistre le message
						mysql_query("UPDATE news SET titre='$titre',news='$news',date_maj='$date',maj_par='$edit' WHERE idnews='$idnews'") or die(mysql_error());
						echo "<p>La news a été modifiée !</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
					else  //Si il y a rien à enregistrer
					{
						echo "<p>ERREUR 1!!!</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR 2!!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
		    break;
			default:
				$retour_total=mysql_query('SELECT COUNT(*) AS total FROM news'); //Nous récupérons le contenu de la requête dans $retour_total
				$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
				$total=Securite::bdd($donnees_total['total']); //On récupère le total pour le placer dans la variable $total.
				
				$sql="SELECT * FROM news ORDER BY idnews DESC";
				$resultat=mysql_query($sql) or die (mysql_error());
				echo "
					<p class=\"title\">Gestion des news</p>";	
					//Aperçu
					echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
						<tr>
							<th width=\"30\"><a href='index.php?module=news&action=poster'><img src='../images/add.png' /></a></th>
							<th width=\"30\"></th>
							<th width=\"30\">id</th>
							<th>Message</th>
						</tr>";
					if ($total == 0)
					{
						echo "<tr><td colspan=\"4\">Il n'y a pour le moment aucunes news !</td></tr>";
					}
					else
					{
						while($ligne=mysql_fetch_array($resultat))
						
						{
							extract($ligne);
							echo "<tr>
							<td class='milieu'><a href=\"index.php?module=news&action=delete&id=$idnews\"><img src='../images/delete.gif' /></a></td>
							<td class='milieu'><a href='index.php?module=news&action=modify&id=$idnews'><img src=\"../images/edit.png\" /></form></td>
							<td class='milieu'>".Securite::bdd($idnews)."</td>
							<td>".Securite::html($news)."</td></tr>";
						}
					}
						echo "<tr><td class='milieu'><a href='index.php?module=news&action=poster'><img src='../images/add.png' /></a></td><td></td><td></td><td></td></tr>";
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
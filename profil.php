<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());

$membre_id = Securite::bdd($_SESSION['id']);

if($_SESSION['auth'] == "yes")
{
	$membre = Securite::bdd($_GET['id']);
	$test = Securite::bdd($_SESSION['id']);
	switch ($_GET['action'])
	{
		case "avatars":
			$requete1 = mysql_query('SELECT pseudo, membre_avatar,
			membre_email, membre_msn, membre_signature, membre_siteweb, membre_post,
			membre_inscrit, membre_localisation
			FROM membres WHERE id='.$membre.'');
			$data1 = mysql_fetch_assoc($requete1);
			echo "Votre avatar actuel :<br />";
			echo "<p><img src=\"images/avatars/".$data1['membre_avatar']."\" alt=\"Aucun avatar\" /></p>";
			echo "<a href=\"index.php?module=profil&action=avatars_m&id=".$test."\">Modifier</a> - <a href=\"index.php?module=profil&action=avatars_a&id=".$test."\">Ajouter</a> - <a href=\"index.php?module=profil&action=avatars_s&id=".$test."\">Supprimer</a>";
		break;
		case "avatars_m":
			echo "Bientôt";
		break;
		case "avatars_a":
			echo '
			<form name="sendfile" method="POST" ENCTYPE="multipart/form-data" action="index.php?module=profil&action=avatars_av">
				<input type="hidden" name="MAX_FILE_SIZE" value="30720">
				<p>Image à envoyer (JPG, PNG ou GIF | max 30 Ko, 100px par 100px):<br />
				<input type="file" name="file" size="30"></p>
				<input type="submit" value="Envoyer" name="send">
			</form>';
		break;
		case "avatars_av":
			$maxsize = 30720;
			$maxheight = 100;
			$maxwidth = 100;
			
			$_FILES['file']['name'];     //Le nom original du fichier, comme sur le disque du visiteur, (exemple: mon_file.png).
			$_FILES['file']['type'];     //Le type du fichier. Par exemple, cela peut être "image/png"
			$_FILES['file']['size'];     //La taille du fichier en octets
			$_FILES['file']['tmp_name']; //L'adresse vers le fichier uploadé dans le répertoire temporaire
			$_FILES['file']['error'];    //Le code d'erreur, qui permet de savoir si le fichier a bien été uploadé
			
			if ($_FILES['file']['error'] > 0) 
			{
				echo "<p>Erreur lors du tranfsert</p>";
				echo "<p><a href=\"index.php?module=profil&action=avatars&id=".$membre_id."\">Retour</a></p>";
			}
			else
			{
				if ($_FILES['file']['size'] > $maxsize)
				{
					echo "<p>L'image est trop grosse, taille max: ".$maxsize."</p>";
					echo "<p><a href=\"index.php?module=profil&action=avatars&id=".$membre_id."\">Retour</a></p>";
				}
				else
				{
					$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
					$extension_upload = strtolower(  substr(  strrchr($_FILES['file']['name'], '.')  ,1)  );
					if(!in_array($extension_upload,$extensions_valides) ) 
					{
						echo "<p>Erreur seul les extensions JPG, JPEG, GIF et PNJ sont autorisé !</p>";
						echo "<p><a href=\"index.php?module=profil&action=avatars&id=".$membre_id."\">Retour</a></p>";
					}
					else
					{
						$image_sizes = getimagesize($_FILES['file']['tmp_name']);
						if ($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight)
						{
							echo "<p>L'image trop grande ( taille max : ".$maxheight." x ".$maxwidth." )</p>";
							echo "<p><a href=\"index.php?module=profil&action=avatars&id=".$membre_id."\">Retour</a></p>";
						}
						else
						{
							$nom = "images/avatars/{$membre_id}.{$extension_upload}";
							$resultat = move_uploaded_file($_FILES['file']['tmp_name'],$nom);
							if ($resultat)
							{
								mysql_query("UPDATE membres SET membre_avatar='{$membre_id}.{$extension_upload}' WHERE id ='$membre_id'") or die(mysql_error());
								echo "<p>L'image a bien été Transferé</p>";
								echo "<p><a href=\"index.php?module=profil&action=avatars&id=".$membre_id."\">Retour</a></p>";
							}
							else
							{
								echo "<p>Erreur</p>";
								echo "<p><a href=\"index.php?module=profil&action=avatars&id=".$membre_id."\">Retour</a></p>";
							}
						}
					}
				}
			}
		break;
		case "avatars_s":
			echo "Bientôt";
		break;
		case "modifier":
			if($membre == $test)
			{
				//On récupère les infos du membre
				$requete1 = mysql_query('SELECT pseudo, membre_avatar,
			    membre_email, membre_msn, membre_signature, membre_siteweb, membre_post,
			    membre_inscrit, membre_localisation
			    FROM membres WHERE id='.$membre.'');
			    if ($data1 = mysql_fetch_assoc($requete1))
			    {
				    //On affiche les infos sur le membre
					echo "<p class=\"title\">Mon Profil</p><br />";
					echo "<form action=\"index.php?module=profil&action=modifier_v\" method=\"POST\">";
					echo "<p><img src=\"images/avatars/".$data1['membre_avatar']."\" alt=\"Aucun avatar\" /></p>";
					echo "<p><a href=\"index.php?module=profil&action=avatars&id=".$membre."\">Gérer l'avatar</a></p>";
					echo "<table>";
					echo "<tr><td>Adresse E-Mail: </td>";
					echo "<td><input type=\"text\" size=\"50\" name=\"mail\" value=\"".Securite::bdd($data1['membre_email'])."\" /></td></tr>";
					echo "<tr><td>Afficher votre E-Mail: </td>";
					echo "<td><select name=\"cacher_email\">
								<option value=\"0\">Oui</option>
								<option SELECTED value=\"1\">Non</option>
							</select></td></tr>";
					echo "<td>Windows Live Messenger: </td>";
					echo "<td><input type=\"text\" size=\"50\" name=\"msn\" value=\"".Securite::bdd($data1['membre_msn'])."\" /></td></tr>";
					echo'<tr><td>Site Web: </td>';
					echo "<td><input type=\"text\" size=\"50\" name=\"siteweb\" value=\"".Securite::bdd($data1['membre_siteweb'])."\" /></td></tr>";
					echo'<tr><td>Localisation: </td>';
					echo "<td><input type=\"text\" size=\"50\" name=\"localisation\" value=\"".Securite::bdd($data1['membre_localisation'])."\" /></td></tr>";
					echo'<tr><td>Inscrit depuis le: </td>';
					echo "<td><input readonly type=\"text\" size=\"10\" name=\"inscrit\" value=\"".date('d/m/Y',$data1['membre_inscrit'])."\" /></td></tr>";
					echo'<tr><td>Nombres de message: </td>';
					echo "<td><input readonly type=\"text\" size=\"4\" name=\"post\" value=\"".Securite::bdd($data1['membre_post'])."\" /></td></tr>";
					echo "</tr><td>Signature: </td>";
					echo "<td><textarea name=\"signature\" rows=\"4\" cols=\"30\" maxsize=\"200\">".Securite::html_edit($data1['membre_signature'])."</textarea></td></tr>";
					echo "</table><br />";
					echo "<input type=\"submit\" value=\"Modifier\" />";
					echo "</form>";
				}
				else
				{
					echo "<p>Erreur, merci de prevenir le webmaster</p>";
				}
			}
			else
			{
				echo "<p>Vous ne pouvez modifier que votre profil !!!</p>";
				echo "<a href=\"../index.php\">Retour</a>";
			}
		break;
		case "modifier_v":
			$mail = Securite::bdd($_POST['mail']);
			$cacher_email = Securite::bdd($_POST['cacher_email']);
			$msn = Securite::bdd($_POST['msn']);
			$siteweb = Securite::bdd($_POST['siteweb']);
			$localisation = Securite::bdd($_POST['localisation']);
			$signature = Securite::bdd($_POST['signature']);
			if(empty($mail))
			{
				echo "<p>L'adresse mail est obligtoire !</p>";
				echo "<a href='javascript:history.go(-1)'>Retour</a>";
			}
			else
			{
				if (!eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-_.]?[0-9a-z])*\\.[a-z]{2,4}$",$mail))
				{
					echo "L'adresse e-mail n'est pas correcte !!!";
					echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
				}
				else
				{
					if(empty($siteweb))
					{
						mysql_query("UPDATE membres SET membre_email='$mail', membre_msn='$msn', membre_siteweb='$siteweb', membre_signature='$signature', membre_localisation='$localisation', cacher_email='$cacher_email' WHERE id ='$test'") or die(mysql_error());
						echo "<p>Votre Profil a été mise a jour !</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else
					{
						if(!eregi('http://(.+)\.(.+)', $siteweb))
						{
							echo "<p>l'adresse d'un site web commence par \"http://\" !!!</p>";
							echo "<a href='javascript:history.go(-1)'>Retour</a>";
						}
						else
						{
							mysql_query("UPDATE membres SET membre_email='$mail', membre_msn='$msn', membre_siteweb='$siteweb', membre_signature='$signature', membre_localisation='$localisation', cacher_email='$cacher_email' WHERE id ='$test'") or die(mysql_error());
							echo "<p>Votre Profil a été mise a jour !</p>";
							echo "<a href='javascript:history.go(-2)'>Retour</a>";
						}
					}
				}
			}
		break;
		default:
			if(empty($membre) OR empty($test))
			{
					echo "<p>Aucuns id n'est renseigner !</p>";
					echo "<br /><a href='index.php?module=membres'>Retour</a>";
			}
			else
			{
				//On récupère les infos du membre
				$requete1 = mysql_query('SELECT account_name, pseudo, membre_avatar,
			    membre_email, membre_msn, membre_signature, membre_siteweb, membre_post,
			    membre_inscrit, membre_localisation, cacher_email
			    FROM membres WHERE id='.$membre.'');
			    if ($data1 = mysql_fetch_assoc($requete1))
			    {
				    //On affiche les infos sur le membre
			       echo'<p class="title">Mon Profil</p><br />';
			       echo'<p><img src="images/avatars/'.$data1['membre_avatar'].'" alt="Aucun avatar" /></p>';
				   echo "<table>
						<tr>
							<td><strong>Adresse E-Mail: </strong></td>
							<td>";
							if($data1['cacher_email'] == 1)
							{
								echo "Email masqué";
							}
							else
							{
							echo "<a href=\"mailto:".Securite::bdd($data1['membre_email'])."\">".Securite::bdd($data1['membre_email'])."</a></td>";
							}
						echo "</tr>
						<tr>
							<td><strong>Windows Live Messenger: </strong></td>
							<td>".Securite::bdd($data1['membre_msn'])."</td>
						</tr>
						<tr>
							<td><strong>Site Web: </strong></td>
							<td><a href=\"".Securite::bdd($data1['membre_siteweb'])."\">".Securite::bdd($data1['membre_siteweb'])."</a></td>
						</tr>
						<tr>
							<td><strong>Inscrit depuis le: </strong></td>
							<td>".date('d/m/Y',$data1['membre_inscrit'])."</td>
						</tr>
						<tr>
							<td><strong>Messages postés: </strong></td>
							<td>".Securite::bdd($data1['membre_post'])." messages</td>
						</tr>
						<tr>
							<td><strong>Localisation: </strong></td>
							<td>".Securite::bdd($data1['membre_localisation'])."</td>
						</tr>
						<tr>
							<td><strong>Signature: </strong></td>
							<td>".Securite::html($data1['membre_signature'])."</td>
						</tr>
					</table>
					<br />";
				   if($membre == $test)
				   {
						echo "<a href=\"index.php?module=profil&action=modifier&id=".Securite::bdd($_SESSION['id'])."\">Modifier mon profil</a>";
				   }
				   else
				   {
						echo "";
				   }
				}
				else
				{
					echo "<p>Ce membre n'exister pas !</p>";
				}
			}
		break;
	}
}
else
{
	echo "<p>Page réservée aux membres !<br />";
	echo "connectez-vous ou inscrivez-vous !</p>";
	echo "<a href=\"index.php\">Retour</a>";
}
?>
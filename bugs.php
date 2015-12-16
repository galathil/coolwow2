<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());

switch ($_GET['action'])
{
	case "info_bug":
		$id_bug = Securite::bdd($_GET['id']);
		if(isset($id_bug))
		{
			$sql="SELECT *FROM bugreport WHERE id_bug=$id_bug";
			$resultat=mysql_query($sql) or die (mysql_error());
			
			if(mysql_num_rows($resultat) <= 0)
			{
				echo "<p>Ce bug n'existe pas !</p>";
				echo "<a href='javascript:history.go(-1)'>Retour</a>";
			}
			else
			{
				$data = mysql_fetch_array($resultat);
				$date = date('d-m-Y H:i:s', $data['date_bug']);
				echo "<p class=\"title\">Information sur le bug</p><br />";
				echo "<table>";
				echo "<tr><td width=\"130\">Bug signalé par :</td><td>".Securite::html($data['auteur_bug'])."</td></tr>";
				echo "<tr><td width=\"130\">Date du bug :</td><td>".$date."</td></tr>";
				echo "<tr><td>Bug traité par :</td><td>".Securite::html($data['mg_bug'])."</td></tr>";
				echo "<tr><td>Type de bug :</td><td>".Securite::html($data['type_bug'])."</td></tr>";
				echo "<tr><td>Statut du bug :</td><td>".Securite::html($data['statut_bug'])."</td></tr>";
				echo "<tr><td>Description :</td><td>".Securite::html($data['description_bug'])."</td></tr>";
				echo "<tr><td>Commentaire du MJ :</td><td>".Securite::html($data['commentaire'])."</td></tr>";
				echo "</table>";
				echo "<p><a href='javascript:history.go(-1)'>Retour</a></p>";
			}
		}
		else
		{
			echo "<p>Erreur de lien !</p><br />";
			echo "<a href='javascript:history.go(-1)'>Retour</a>";
		}
	break;
	case "signaler":
		echo "<p class=\"title\">Signaler un bug</p>"; 
		if($_SESSION['auth'] == "yes")
		{
			echo "<p><form action=\"index.php?module=bugs&action=signalerv\" method=\"POST\">";
			echo "<p>Comment signaler un bug:</p>
				Merci d'organiser en quatre parties, comme ci-dessous,<br />
				Dans la cas contraire, il sera supprimé sans préavis !!!<br /><br />
				<table>
				<tr><td>Pnj :</td></tr>
				<tr><td>Lieu :</td></tr>
				<tr><td>Description :</td></tr>
				<tr><td>But de la quête :</td></tr>
				<tr><td>Le problème :</td></tr>
				</table>
				<br />
				<table border=\"0\">
					<tr>
						<td>Type:</td>
						<td>
							<select name=\"type\">
								<option value=\"Personnage\">Personnage</option>
								<option value=\"Quête\">Quête</option>
								<option value=\"Guilde\">Guilde</option>
								<option value=\"PNJ\">PNJ</option>
								<option value=\"Le site\">Le site</option>
								<option value=\"Le forums\">Le forums</option>
								<option SELECTED value=\"Autres\">Autres</option>
							</select>
						</td>
					</tr>
					</tr>
						<td>Description:</td>
						<td><textarea name=\"description\" rows=\"10\" cols=\"70\" maxsize=\"255\">
Pnj :
Lieu :
Description :
But de la quête :
Le problème :
						</textarea></td>
					</tr>
					<tr>
						<td></td>
						<td>Attention: la longueur est limitée à 255 caractères.</td>
					</tr>
					<tr>
						<td></td>
						<td><input type=\"submit\" value=\"Signaler\" /></td>
					</tr>
				</table>
			</form></p><br />";
			echo "<a href='javascript:history.go(-1)'>Retour</a>";
		}
		else
		{
			echo "<br />Merci de vous connecter pour signaler un bug !<br />";
			echo "<a href='javascript:history.go(-1)'>Retour</a>";
		}
	break;
	case "signalerv":
		$type = Securite::bdd($_POST['type']);
		$description = Securite::bdd($_POST['description']);
		if (isset($description)) // Si les variables existent
		{
			if (($description) != NULL) // Si on a quelque chose à enregistrer
			{
				$membre_id = Securite::bdd($_SESSION['id']);
				$auteur = Securite::bdd($_SESSION['username']);
				$date2 = time();
				
				mysql_query("INSERT INTO bugreport (type_bug, description_bug, auteur_bug, statut_bug, mg_bug,date_bug) VALUES ('$type','$description','$auteur','En attente','Aucuns','$date2')") or die("Erreur lors de l'envoie du bug !!!");
				// On se déconnecte de MySQL
				echo "<p>Le bug a bien été enregistré !</p>";
				echo "<p>Merci de votre aide !</p>";
				echo "<a href='javascript:history.go(-2)'>Retour</a>";
			}
			else  //Si il y a rien à enregistrer
			{
				echo "<p>Aucune description de rentrée !</p><br />";
				echo "<a href='javascript:history.go(-1)'>Retour</a>";
			}
		}
		else  //Si les variables n'existent pas
		{
			echo "<p>Aucun auteur et/ou message de rentrés  !!!</p><br />";
			echo "<a href='javascript:history.go(-1)'>Retour</a>";
		}
    break;
	case "resultat":
		$perso = mysql_real_escape_string($_POST['perso']);
		$by = mysql_real_escape_string($_POST['by']);
		$sql="SELECT * FROM bugreport WHERE $by LIKE'%$perso%' ORDER BY id_bug DESC";
		$resultat=mysql_query($sql) or die (mysql_error());
		
		echo "
			<p class=\"title\">Liste de bugs connus</p>	
			<br />";
			echo "
				<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
					<tr>
						<th width=\"30\">id</th>
						<th width=\"80\">type</th>
						<th width=\"80\">Auteur</th>
						<th>Description</th>
						<th width=\"50\">Réponse</th>
						<th width=\"100\">Statut</th>
						<th width=\"80\">MJ</th>
						<th width=\"80\">Date du bug</th>
					</tr>";
			if(mysql_num_rows($resultat) <= 0)
			{
				echo "<tr><td colspan=\"8\">Aucuns bugs signialés !!!</td></tr>";
			}
			else
			{
				while($ligne=mysql_fetch_array($resultat))
				{
					extract($ligne);
					$description_bug = substr($description_bug, 0, 30);
					$date = date('d-m-Y H:i:s', $date_bug);
					echo "<tr>
						<td class='milieu'>$id_bug</td>
						<td class='milieu'>$type_bug</td>
						<td class='milieu'>$auteur_bug</td>
						<td><a href=\"index.php?module=bugs&action=info_bug&id=$id_bug\">$description_bug ...</a></td>
						<td>$reponse_bug</td>
						<td>$statut_bug</td>
						<td>$mg_bug</td>
						<td>$date</td></tr>";
				}
			}
			echo "</table><br />";
			echo "<a href=\"index.php?module=bugs&action=signaler\">Signaler un bug</a><br /><br />";
			echo "<a href=\"javascript:history.go(-1)\">Retour</a>";
	break;
	case "compteur";
		if ($_SESSION['auth'] == "yes")
		{
			$id = Securite::get($_GET['id']);
			if(!empty($id))
			{
				$membre_id = Securite::bdd($_SESSION['id']);
				$retour = mysql_query("SELECT * FROM bug_signalant WHERE id_bug = '$id' AND membre_id = '$membre_id'") or die (mysql_error());
				$donnees = mysql_fetch_array($retour);
				
				if(mysql_num_rows($retour) == 0)
				{
					generate_xsrf_token();
					$token = Securite::bdd($_SESSION['token_xsrf']);
					
					$sql="SELECT *FROM bugreport WHERE id_bug=$id";
					$resultat=mysql_query($sql) or die (mysql_error());
					$data = mysql_fetch_array($resultat);
					echo "<p class=\"title\">Je confirme avec le même bug que selui decrit ci-dessous:</p>";
					echo "<p>".Securite::html($data['description_bug'])."</p>";
					echo "<form action=\"index.php?module=bugs&action=compteur_v\" method=\"POST\">
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"hidden\" name=\"id\" value='$id'>
					<input type=\"hidden\" name=\"membre\" value='$membre_id'>
					<input type=\"submit\" value=\"Oui je confirme !\">";
				}
				else
				{
					echo "<p>Vous avez déjà signaler ce bug !</p>";
					echo "<a href=\"index.php\">Retour</a>";
				}
			}
			else
			{
				echo "<p>Erreur de lien !</p>";
				echo "<a href=\"index.php\">Retour</a>";
			}
		}
		else
		{
			echo "<p>Vous devez étre membre du site pour accèder à cette partie !</p>";
			echo "<a href=\"index.php\">Retour</a>";
		}
	break;
	case "compteur_v";
		verify_xsrf_token();
		$id = Securite::bdd($_POST['id']);
		$membre_id = Securite::bdd($_POST['membre']);
		if(!empty($id))
		{
			
			mysql_query("UPDATE bugreport SET nb_signaler = nb_signaler + 1 WHERE id_bug = $id") or die(mysql_error());
			mysql_query("INSERT INTO bug_signalant (id_bug, membre_id) VALUES ('$id','$membre_id')") or die("Erreur");
			echo "ok";
		}
		else
		{
			echo "<p>Erreur de lien !</p>";
			echo "<a href='index.php'>Retour</a>";
		}
	break;
	default:
		$sql="SELECT * FROM bugreport ORDER BY id_bug DESC";
		$resultat=mysql_query($sql) or die (mysql_error());
		
		echo "
			<p class=\"title\">Liste de bugs connus</p>	
			<br />";
		echo "
			<form action=\"index.php?module=bugs&action=resultat\" method=\"POST\">Rechercher 
				<select name=\"by\">
					<option value=\"id\">par ID</option>
					<option selected value=\"type_bug\">par Type</option>
					<option value=\"auteur_bug\">par Auteur</option>
					<option value=\"date_bug\">par date du bug</option>
					<option value=\"description_bug\">par description</option>
					<option value=\"reponse_bug\">par réponse</option>
					<option value=\"statut_bug\">par statut</option>
					<option value=\"mg_bug\">par MJ</option>
				</select>
				<input type=\"text\" name=\"perso\"><input type=\"submit\" value=\"Rechercher\">
			</form><br />";
			echo "
				<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
					<tr>
						<th width=\"30\">id</th>
						<th width=\"80\">type</th>
						<th width=\"80\">Auteur</th>
						<th>Description</th>
						<th width=\"50\">Réponse</th>
						<th width=\"100\">Statut</th>
						<th width=\"80\">MJ</th>
						<th width=\"80\">Date du bug</th>
						<th width=\"80\">Déjà signaler</th>
					</tr>";
			if(mysql_num_rows($resultat) <= 0)
			{
				echo "<tr><td colspan=\"8\">Aucuns bugs signialés !!!</td></tr>";
			}
			else
			{
				while($ligne=mysql_fetch_array($resultat))
				{
					extract($ligne);
					$description_bug = substr($description_bug, 0, 30);
					$date = date('d-m-Y H:i:s', $date_bug);
					echo "<tr>
						<td class='milieu'>$id_bug</td>
						<td class='milieu'>$type_bug</td>
						<td class='milieu'>$auteur_bug</td>
						<td><a href=\"index.php?module=bugs&action=info_bug&id=$id_bug\">$description_bug ...</a></td>
						<td>$reponse_bug</td>
						<td>$statut_bug</td>
						<td>$mg_bug</td>
						<td>$date</td>
						<td>$nb_signaler  <a href=\"index.php?module=bugs&action=compteur&id=$id_bug\"><img src=\"images/add.png\" /></a></td></tr>";
				}
			}
			echo "</table><br />";
			echo "<a href=\"index.php?module=bugs&action=signaler\">Signaler un bug</a><br /><br />";
			echo "<a href=\"javascript:history.go(-1)\">Retour</a>";
	break;
}
?>
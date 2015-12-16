<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

switch ($_GET['action'])
{
	case "debloquer":
		$compte = Securite::bdd($_POST['compte']);
		$pass = Securite::bdd($_POST['pass']);
		$perso = Securite::bdd($_POST['perso']);
		if (isset($compte) and ($pass) and ($perso)) // Si les variables existent
		{
			if ($compte != NULL AND $pass != NULL AND $perso != NULL) // Si on a quelque chose à enregistrer
			{
				mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
				mysql_select_db($realmd['db']) or die(mysql_error());
				$sql = "SELECT username FROM account WHERE username='$compte'";
				$result = mysql_query($sql) or die ("requête en échec 1.");
				$num = mysql_num_rows($result);
				if ($num > 0) //login non trouvé
				{
					$sql = "SELECT * FROM account WHERE username='$compte' AND sha_pass_hash=SHA1(CONCAT(UPPER('$compte'),':',UPPER('$pass')))";
					$result2 = mysql_query($sql) or die ("Requête en échec 2.");
					$num2 = mysql_num_rows($result2);
					if ($num2 > 0) //Mot de passe OK
					{
						$row = mysql_fetch_array($result2);
						mysql_select_db($characters[1]['db']) or die(mysql_error());
						$sql3 = "SELECT * FROM character_homebind WHERE guid='".$row['id']."'";
						$result3 = mysql_query($sql3) or die ("requête en échec 4.");
						$row2 = mysql_fetch_array($result3);
						if($row['online'] == 1)
						{
							echo "<p class='title'>Erreur : le personnage est connecter.</p>";
							echo "<p><a href='index.php'>Retour</a></p>";
						}
						else
						{
							mysql_query("UPDATE characters SET position_x='".$row2['position_x']."',position_y='".$row2['position_y']."',position_z='".$row2['position_z']."',map='".$row2['map']."',zone='".$row2['zone']."' WHERE name='".$perso."'");
							echo "<p>Votre personnage a été renvoyé à sa pierre de foyer.</p>
							<p><a href='index.php'>Retour</a></p>";
						}
					}
					else //mot de passe incorrect
					{
						echo "<p class='title'>Erreur : le login '$compte' existe, mais le mot de passe ne va pas !</p>";
						echo "<p><a href='index.php'>Retour</a></p>";
					}
				}
				elseif ($num == 0) //Nom de login introuvable
				{
					echo "<p class='title'>Erreur : le compte que vous avez saisi n'existe pas.</p>";
					echo "<p><a href='index.php'>Retour</a></p>";
				}
				else
				{
					echo "erreur 2";
				}
			}
			else  //Si il y a rien à enregistrer
			{
				echo "<p>Erreur</p>";
				echo "<p><a href=\"index.php?module=deblocage\">Retour</a></p>";
			}
		}
		else  //Si les variables n'existent pas
		{
			echo "<p>Un des champs est vide !!!</p>";
			echo "<a href=\"index.php?module=deblocage\">Retour</a>";
		}
	break;
	default:
		echo "
	    <p class=\"title\">Débloquer mon personnage</p>
		<p>Permet de renvoyer un personnage bloqué à sa pierre de foyer.</p>
		<br>
	    <p><form action=\"index.php?module=deblocage&action=debloquer\" method=\"post\" name=\"mod_rec\">
			<table border=\"0\">
				<tr>
					<td>Nom du compte:</td>
					<td><input type=\"text\" name=\"compte\" id=\"compte\" /></td>
				</tr>
				<tr>
					<td>Mot de passe:</td>
					<td><input type=\"password\" name=\"pass\" id=\"pass\" /></td>
				</tr>
				<tr>
					<td>Nom du personnage:</td>
					<td><input type=\"text\" name=\"perso\" id=\"perso\" /></td>
				</tr>
			</table>
			<br>
			<input type=\"submit\" value=\"Débloquer\" />
	    </form></p>";
	break;
}

?>
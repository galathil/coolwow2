<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_perso_move"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "deplacer":
				verify_xsrf_token();
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$id_perso = Securite::bdd($_POST['id_perso']);
				$id_account = Securite::bdd($_POST['id_account']);
				
				mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
				mysql_select_db($characters[1]['db']) or die(mysql_error());
				$reponse = mysql_query("SELECT * FROM characters WHERE guid='".$id_perso."'") or die(mysql_error());
				$donnees = mysql_fetch_array($reponse);
				
				mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
				mysql_select_db($realmd['db']) or die(mysql_error());
				$reponse2 = mysql_query("SELECT * FROM account WHERE id='".$id_account."'") or die(mysql_error());
				$donnees2 = mysql_fetch_array($reponse2);
				
				if(isset($id_perso) AND !Empty($id_perso) AND isset($id_account) AND !Empty($id_account))
				{
					if((is_int($id_perso)) AND (is_int($id_account)))
					{
						echo "<h3>Êtes-vous sûr de vouloir déplacer le personnage ".$donnees['name']." vers le compte ".$donnees2['username']." </h3>
							<p>
								<form action=\"index.php?module=perso_move&action=deplacer_v\" method=\"POST\">
									<input type=\"hidden\" name=\"id_perso\" value=\"$id_perso\">
									<input type=\"hidden\" name=\"id_account\" value=\"$id_account\">
									<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
									<input type=\"submit\" value=\"Je suis sûr\">
								</form>
							</p>";
					}
					else
					{
						echo "erreur2";
					}
				}
				else
				{
					echo "erreur";
				}
			break;
			case "deplacer_v":
				verify_xsrf_token();
				$id_perso = Securite::bdd($_POST['id_perso']);
				$id_account = Securite::bdd($_POST['id_account']);

				if(isset($id_perso) AND !Empty($id_perso) AND isset($id_account) AND !Empty($id_account))
				{
					if(is_int($id_perso) AND is_int($id_account))
					{
						mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
						mysql_select_db($characters[1]['db']) or die(mysql_error());

						$reponse = mysql_query("SELECT * FROM characters WHERE account='".$id_account."'") or die(mysql_error());
						if(mysql_num_rows($reponse) >= 10)
						{
							echo "Le compte cible a déjà son maximum de personnage<br />";
							echo "<a href='index.php'>Retour</a>";
						}
						else
						{
							mysql_query("UPDATE characters SET account='".$id_account."' WHERE guid='".$id_perso."'") or die(mysql_error());
							echo "<p>Le personnage a été déplacé !</p>";
							echo "<a href='index.php'>Retour</a>";
						}
					}
					else
					{
						echo "erreur2";
					}
				}
				else
				{
					echo "erreur";
				}
			break;
			default:
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				echo "<p class=\"title\">Déplacer un personnage</p><br />";
				echo "<form action=\"index.php?module=perso_move&action=deplacer\" method=\"POST\">
					<table>
						<tr>
							<td>ID du personnage à déplacer :</td>
							<td><input type=\"text\" name=\"id_perso\"></td>
						</tr>
						<tr>
							<td>ID du compte de déstination :</td>
							<td><input type=\"text\" name=\"id_account\"></td>
						</tr>
					</table>
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"submit\" name=\"valide\" value=\"Déplacer\">
				</form>";
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
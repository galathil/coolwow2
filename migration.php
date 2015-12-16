<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
if(Securite::bdd($_SESSION['auth'] == "yes"))
{
	switch ($_GET['action'])
	{
		case "validation":
			verify_xsrf_token();
			$id = Securite::bdd($_POST['id']);
			
			mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
			mysql_select_db($realmd['db']) or die(mysql_error());
			
			$reponse = mysql_query("SELECT * FROM account WHERE id='$id'");
			$donnees = mysql_fetch_array($reponse);
			
			$test = Securite::bdd($donnees['online']);
			if ($test == 1)
			{
				echo "<p class=\"title\">Vous êtes actuelement connecté au jeu !</p>
				<h4>Merci de vous déconnecter.</h4></p>
				<a href=\"index.php?module=migration\">Retour</a>";
			}
			else
			{
				mysql_query("UPDATE account SET expansion='2' WHERE id='$id'");
				echo "<p class=\"title\">Votre compte a bien été migrer !</p>
				<p><a href=\"index.php\">Retour</a></p>";
			}
		break;
		default:
			generate_xsrf_token();
			$token = Securite::bdd($_SESSION['token_xsrf']);
			$id = Securite::bdd($_SESSION['id']);
			
			mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
			mysql_select_db($realmd['db']) or die(mysql_error());
			$reponse = mysql_query("SELECT * FROM account WHERE id='$id'");
			$donnees = mysql_fetch_array($reponse);
			$test = Securite::bdd($donnees['expansion']);
			if ($test == 2)
			{
				echo "<p class=\"title\">Votre compte est déjà migrer !</p>
				<p><a href=\"index.php\">Retour</a></p>";
			}
			else
			{
				echo "<p class=\"title\">Migrer mon compte vers Woltk</p>
				<p>Etes-vous sur de vouloir migrer votre compte ?</p>
				
				<form method=\"post\" action=\"index.php?module=migration&action=validation\">
				<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
				<input type=\"hidden\" name=\"id\" value=\"".$id."\" />
				<input type=\"submit\" value=\"Oui je suis sûr !\" />
				</form>";
			}
		break;
	}
}
else
{
	echo "<p>Vous devez etre connecter pour migrer vote compte !<br />";
	echo "connectez-vous ou inscrivez-vous !</p>";
	echo "<a href=\"index.php\">Retour</a>";
}
?>
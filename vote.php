<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
require("kernel/config.php");

mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());

$date_now = date("Y-m-d H:i:s"); 

if($_SESSION['auth'] == "yes")
{
	switch ($_GET['action'])
	{
		case "valide":
			verify_xsrf_token();
			$username = $_SESSION['username'];
			$vote = Securite::html($_POST['vote']);
			
			$reponse = mysql_query("SELECT * FROM vote WHERE account_name='".$username."'") or die (mysql_error());

				if((!empty($vote)) OR isset($vote))
				{
					if($vote == 1)
					{
						if(mysql_num_rows($reponse) == 0)
						{
							mysql_query("INSERT INTO vote (account_name) VALUES ('".$username."')");
						}
						mysql_query("UPDATE membres SET nb_point_vote = nb_point_vote + $nb_point_par_vote, total_vote = total_vote + $nb_point_par_vote WHERE account_name='".$username."'") or die(mysql_error());
						mysql_query("UPDATE vote SET date_vote1 = '".$date_now."' WHERE account_name='".$username."'") or die(mysql_error());
						echo "<p>Merci pour se vote.<br />Il vous a rapporté ".$nb_point_par_vote." point(s) !</p>";
						echo "<a href=\"index.php\">Retour</a>";
					}
					elseif($vote == 2)
					{
						if(mysql_num_rows($reponse) == 0)
						{
							mysql_query("INSERT INTO vote (account_name) VALUES ('".$username."')");
						}
						mysql_query("UPDATE membres SET nb_point_vote = nb_point_vote + $nb_point_par_vote, total_vote = total_vote + $nb_point_par_vote WHERE account_name='".$username."'") or die(mysql_error());
						mysql_query("UPDATE vote SET date_vote2 = '".$date_now."' WHERE account_name='".$username."'") or die(mysql_error());
						echo "<p>Merci pour se vote.<br />Il vous a rapporté ".$nb_point_par_vote." point(s) !</p>";
						echo "<a href=\"index.php\">Retour</a>";
					}
					elseif($vote == 3)
					{
						if(mysql_num_rows($reponse) == 0)
						{
							mysql_query("INSERT INTO vote (account_name) VALUES ('".$username."')");
						}
						mysql_query("UPDATE membres SET nb_point_vote = nb_point_vote + $nb_point_par_vote, total_vote = total_vote + $nb_point_par_vote WHERE account_name='".$username."'") or die(mysql_error());
						mysql_query("UPDATE vote SET date_vote3 = '".$date_now."' WHERE account_name='".$username."'") or die(mysql_error());
						echo "<p>Merci pour se vote.<br />Il vous a rapporté ".$nb_point_par_vote." point(s) !</p>";
						echo "<a href=\"index.php\">Retour</a>";
					}
					else
					{
						echo "erreur";
					}
				}
				else
				{
					echo "Erreur inattendu, merci de prévenir l'administrateur";
				}
		break;
		
		default:
			generate_xsrf_token();
			$token = Securite::bdd($_SESSION['token_xsrf']);
			$username = $_SESSION['username'];
			$sql = mysql_query("SELECT * FROM membres WHERE account_name='$username'");
			
			if((!empty($username)) OR isset($username))
			{
				if(mysql_num_rows($sql) == 1)
				{
					$retour2 = mysql_query("SELECT DATE_FORMAT(ADDTIME(date_vote1,'02:00:00'),'%Y-%m-%d %H:%i:%s') as datevote1, DATE_FORMAT(ADDTIME(date_vote2,'02:00:00'),'%Y-%m-%d %H:%i:%s') as datevote2, DATE_FORMAT(ADDTIME(date_vote3,'02:00:00'),'%Y-%m-%d %H:%i:%s') as datevote3 FROM vote WHERE account_name='$username'") or die(mysql_error());
					$donnees2 = mysql_fetch_array($retour2);
					$date_test1 = $donnees2['datevote1'];
					$date_test2 = $donnees2['datevote2'];
					$date_test3 = $donnees2['datevote3'];

					if(($date_now > $date_test1) OR ($date_now > $date_test2) OR ($date_now > $date_test3))
					{
						echo "
						<p class=\"title\">Vous devez cliquer sur un des liens en bas et voter pour valider votre vote sinon vous n'aurez pas de points !</p><br />";
						if($date_now > $date_test1)
						{
							echo "<form action=\"index.php?module=vote&action=valide\" method=\"post\">
							<div align=\"center\">
								<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
								<input type=\"hidden\" name=\"vote\" value=\"1\" />
								<input type=\"submit\" value=\"$lien_texte_vote\" onclick=\"window.open('$lien_vote','_blank');\" />
							</div></form>
							<br />";
						}
						if($date_now > $date_test2)
						{
							echo"
							<form action=\"index.php?module=vote&action=valide\" method=\"post\"><div align=\"center\">
								<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
								<input type=\"hidden\" name=\"vote\" value=\"2\" />
								<input type=\"submit\" value=\"$lien_texte_vote2\" onclick=\"window.open('$lien_vote2','_blank');\" />
							</div></form>
							<br />";
						}
						if($date_now > $date_test3)
						{
							echo "
							<form action=\"index.php?module=vote&action=valide\" method=\"post\">
							<div align=\"center\">
								<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
								<input type=\"hidden\" name=\"vote\" value=\"3\" />
								<input type=\"submit\" value=\"$lien_texte_vote3\" onclick=\"window.open('$lien_vote3','_blank');\" />
							</div></form>";
						}
					}
					else
					{
						echo "Vous avez déjà voté 3 fois il y a moins de 2 heures !";
					}
				}
				else
				{
					echo "Erreur : Impossible de trouver votre compte !";
				}
			}
			else
			{
				echo "Erreur inattendu, merci de prévenir l'administrateur";
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
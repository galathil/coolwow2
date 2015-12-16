<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_commandes"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		mysql_connect($mangos[1]['host'], $mangos[1]['user'], $mangos[1]['password']) or die(mysql_error());
		mysql_select_db($mangos[1]['db']) or die(mysql_error());
			switch ($_GET['action'])
			{
				case "ajouter":
					require_once("../kernel/config.php");
					echo "lol";
				break;
				default:
					$retour = mysql_query('SELECT * FROM command ORDER BY name');
					echo "<p class=\"title\">Gestion des commandes du jeu</p><br />";
					echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
								<tr>
									<th class='milieu' width=\"30\"><a href='index.php?module=commandes&action=ajouter'><img src='../images/add.png' /></a></th>
									<th width=\"30\"></th>
									<th>Commande</th>
									<th>Niveau</th>
									<th>Info</th>
								</tr>";
						while($donnees = mysql_fetch_assoc($retour))
						{
							$id = $donnees['name'];
							echo"<tr><td align=\"center\">";
							echo"<a href=\"index.php?module=commandes&action=supprimer&id=$id\"><img src='../images/delete.gif' /></a>";
							echo"</td><td align=\"center\">";
							echo"<a href=\"index.php?module=commandes&action=editer&id=$id\"><img src='../images/edit.png' /></a>";
							echo"</td><td align=\"center\">";
							echo $donnees['name'];
							echo"</td><td align=\"center\">";
							echo $donnees['security'];
							echo"</td><td align=\"center\">";
							echo $donnees['help'];
							echo"</td>";
							echo"</tr>";
						}
						echo "<tr><td class='milieu'><a href='index.php?module=commandes&action=ajouter'><img src='../images/add.png' /></a></td>
						<td></td><td></td><td></td><td></td></tr>";
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
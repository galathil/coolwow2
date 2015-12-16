<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_votes"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		$query = mysql_query("SELECT * FROM membres WHERE nb_point_vote >= 1 AND membre_gmlevel = 0 ORDER BY total_vote DESC") or die(mysql_error());
		echo "<p class=\"title\">Le top des votants</p>";
		?>
		<table class="lined" width="99%" border="1" cellpadding="2" cellspacing="0" align="center" class="sortable">
			<tr>
				<th nowrap="nowrap">Place</th>
				<th nowrap="nowrap">Pseudo</th>
				<th nowrap="nowrap">Points de vote actuel</th>
				<th nowrap="nowrap">Total des votes</th>
			</tr>
		<?php
			if (mysql_num_rows($query) < 1)
			{
				echo "<tr><td colspan=\"7\">Il n y a pas aucuns objet en vente !</td></tr>";
			}
			else
			{
				$ligne = 1;
				while ($donnees = mysql_fetch_array($query))
				{
				echo "<tr><td align=\"center\">";
				echo $ligne++;
				echo "</td><td align=\"center\">";
				echo "".$donnees['pseudo']."";
				echo "</td><td align=\"center\">";
				echo "".$donnees['nb_point_vote']."";
				echo "</td><td align=\"center\">";
				echo "".$donnees['total_vote']."";
				echo "</td></tr>";
				}
			}
		echo"</TABLE><br>";
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
<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

if($_SESSION['auth'] == "yes")
{
	mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
	mysql_select_db($coolwow['db']) or die(mysql_error());
	$query = mysql_query("SELECT * FROM membres WHERE nb_point_vote >= 1 AND membre_gmlevel = 0 ORDER BY nb_point_vote DESC") or die(mysql_error());
	
	echo "<p class=\"title\">Le top des votants</p>";
	?>
	<table class="lined" width="99%" border="1" cellpadding="2" cellspacing="0" align="center" class="sortable">
		<tr>
			<th nowrap="nowrap">Place</th>
			<th nowrap="nowrap">Pseudo</th>
			<th nowrap="nowrap">Nombre de points</th>
		</tr>
	<?php
		if (mysql_num_rows($query) < 1)
		{
			echo "<tr><td colspan=\"3\">Il n y a aucun votant !</td></tr>";
		}
		else
		{
			$ligne = 1;
			while ($donnees = mysql_fetch_array($query))
			{
				echo "<tr><td align=\"center\">";
				echo $ligne++;
				echo "</td><td align=\"center\">";
				echo "".Securite::bdd($donnees['account_name'])."";
				echo "</td><td align=\"center\">";
				echo "".Securite::bdd($donnees['nb_point_vote'])."";
				echo "</td></tr>";
			}
		}
	echo"</TABLE><br>";
}
else
{
	echo "<p>Page réservé au membres !<br />";
	echo "connectez-vous ou inscrivez-vous !</p>";
	echo "<a href=\"index.php\">Retour</a>";
}
?>
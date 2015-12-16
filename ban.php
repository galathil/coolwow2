<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
	mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
	mysql_select_db($realmd['db']) or die(mysql_error());
	
		$retour_total=mysql_query('SELECT COUNT(*) AS total FROM account_banned'); //Nous récupérons le contenu de la requête dans $retour_total
		$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
		$total=Securite::bdd($donnees_total['total']); //On récupère le total pour le placer dans la variable $total.
		$retour_messages = mysql_query('SELECT * FROM account_banned ORDER BY id ASC');
		
		echo "<p class=\"title\">Liste des comptes bannis</p>";
		echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
					<tr>
					<th>id du compte</th>
					<th>Date du Ban</th>
					<th>Fin du Ban</th>
					<th>Bannis par</th>
					<th>Raison</th>
					</tr>";
		if ($total == 0)
		{
			echo "<tr><td colspan=\"9\">Aucuns comptes bannis !!!</td></tr>";
		}
		else
		{
			while($donnees = mysql_fetch_assoc($retour_messages))
			{
				$id = Securite::bdd($donnees['id']);
				echo"<tr><td align=\"center\">";
				echo $donnees['id'];
				echo"</td><td align=\"center\">";
				echo"".date('d/m/Y G:i', $donnees['bandate'])."";
				echo"</td><td align=\"center\">";
				if ($donnees['bandate'] == $donnees['unbandate']){echo "Jamais";}else{echo"".date('d/m/Y G:i', $donnees['unbandate'])."";}
				echo"</td><td align=\"center\">";
				echo $donnees['bannedby'];
				echo"</td><td align=\"center\">";
				if (empty($donnees['banreason'])){echo "Aucune raison";}else{echo $donnees['banreason'];}
				echo"</td>";
				echo"</tr>";
			}
		}
		echo "</table><br />";
?>
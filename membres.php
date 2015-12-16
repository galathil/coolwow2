<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config WHERE config_name = "module_membres"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes")
{
	if($rep['config_value'] == 1)
	{
		mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
		mysql_select_db($coolwow['db']) or die(mysql_error());
		switch ($_GET['action'])
		{
			default:
				$sql = mysql_query("SELECT id, account_name, pseudo, membre_avatar,
				membre_email, membre_msn, membre_signature, membre_siteweb, membre_post,
				membre_inscrit, membre_localisation, membre_rank, cacher_email
				FROM membres");
				
				echo "<p class=\"title\">Membres du site</p><br />
				".$_SESSION['gmlevel']."<br>
				<table class=\"lined\" style=\"border-collapse: collapse\"; width=\"99%\" border=\"1\" cellpadding=\"3\" cellspacing=\"0\" align=\"center\" class=\"sortable\">
					<tr>
						<th width=\"30\">Nom utilisateur</th>
						<th width=\"30\">inscription</th>
						<th width=\"30\">Messages</th>
						<th width=\"30\">Rang</th>
						<th width=\"30\">MP</th>
						<th width=\"30\">E-mail</th>
						<th width=\"30\">Site Internet</th>
					</tr>";
		
				if(mysql_num_rows($sql) <= 0)
				{
					echo "<tr><td colspan=\"7\">Il n'y a aucun membre sur le site !!!</td></tr>";
				}
				else
				{
					while ($data1 = mysql_fetch_array($sql,MYSQL_ASSOC))
					{
						echo "<tr>";
						echo "
							<td align=\"center\"><a href=\"index.php?module=profil&id=".Securite::bdd($data1['id'])."\">".Securite::bdd($data1['pseudo'])."</a></td>
							<td align=\"center\">".date('d/m/y G:i',Securite::bdd($data1['membre_inscrit']))."</td>
							<td align=\"center\">".Securite::bdd($data1['membre_post'])."</td>
							<td align=\"center\">".Securite::bdd($data1['membre_rank'])."</td>
							<td align=\"center\"><a href=\"index.php?module=messagerie&action=ecrire&for=".Securite::bdd($data1['pseudo'])."\"><img src=\"themes/".$theme."/images/forums/pm.gif\" /></a></td>
							<td align=\"center\">";
								if($data1['cacher_email'] == 1)
								{
									echo "</td>";
								}
								else
								{
									echo "<a href=\"mailto:".Securite::bdd($data1['membre_email'])."\"><img src=\"themes/".$theme."/images/forums/email.gif\" /></a></td>";
								}
							echo "<td align=\"center\">";
								if(empty($data1['membre_siteweb']))
								{
									echo "</td>";
								}
								else
								{
									echo "<a href=\"".Securite::bdd($data1['membre_siteweb'])."\"><img src=\"themes/".$theme."/images/forums/www.gif\" /></a></td>";
								}
						echo "</tr>";
					}
				}
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
else
{
	echo "<p>Page réservée aux membres !<br />";
	echo "connectez-vous ou inscrivez-vous !</p>";
	echo "<a href=\"../index.php\">Retour</a>";
}
?>
<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_logs"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes")
{
	if($rep['config_value'] == 1)
	{
		$dbr = $realmd['db'];
		$dbc = $coolwow['db'];
		switch ($_GET['action'])
		{
			case "gm":
				echo "
				<form action=\"index.php?module=logs&action=gm_resultat\" method=\"post\">
					Recherche: <input type=\"text\" name=\"mot\"><br />
					<input type=\"submit\" value=\"Recherche\">
				</form>";
			break;
			case "gm_resultat":
				define('FICHIER', 'd:\\Emulateur\\logs\gmlog.log');
				if (!isset($_POST['mot']))
				{
					echo "erreur";
				} 
				else 
				{
					$mot = $_POST['mot'];
					$resultats =array();
					@ $fp = fopen(FICHIER, 'r') or die('Ouverture en lecture de "' . FICHIER . '" impossible !');
					while (!feof($fp)) {
						$ligne = fgets($fp, 1024);
						if (preg_match('|\b' . preg_quote($_POST['mot']) . '\b|i', $ligne)) {
							$resultats[] = $ligne;
						}
					}
					fclose($fp);
					$nb = count($resultats);
					if ($nb > 0) {
						echo "'$mot' trouvé $nb fois :";
						echo '<ul>';
						foreach ($resultats as $v) {
							echo "<li>$v</li>";
						}
						echo '</ul>';
					} else {
						die("Ce nom n'est pas présent !");
					}
				}
			break;
			case "logs":
				$type = mysql_real_escape_string(htmlspecialchars($_GET['type'], ENT_QUOTES));
				if(empty($type) or !isset($type))
				{
					echo "<h1 class='title'>Une erreur de lien est survenue !</h1>";
					echo "<p><a href=\"index.php?module=logs\">Retour</a></p>";
				}
				else
				{
					if($type == "achat")
					{
						require_once("../kernel/fonctions_armurerie.php");
						echo "<p class=\"title\">Logs des achats</p><br />";
						$reponse = mysql_query('SELECT r.username as account, id_achat, id_perso, id_item, date_achat, id_boutique, c.name as perso
						FROM log_achat l
						INNER JOIN '.$realmd['db'].'.account r ON r.id = l.id_membre
						INNER JOIN '.$characters[1]['db'].'.characters c ON c.guid = l.id_perso');
						echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th>ID</th>
								<th>Compte</th>
								<th>Personnage</th>
								<th>Objet</th>
								<th>date d'achat</th>
								<th>article</th>
							</tr>";
						if (mysql_num_rows($reponse) <= 0)
						{
							echo "<tr><td colspan=\"8\"><center><b>Aucuns logs !!!</b></center></td></tr>";
						}
						else
						{
							while($donnees = mysql_fetch_assoc($reponse))
							{
								echo "<tr>
									<td align=\"center\">".$donnees['id_achat']."</td>
									<td align=\"center\">".$donnees['account']."</td>
									<td align=\"center\">".$donnees['perso']."</td>
									<td align=\"center\"><a href=\"http://fr.wowhead.com/?item=".$donnees['id_item']."\"><img src=\"".get_icon2($donnees['id_item'])."\" /></a>
									</td>
									<td align=\"center\">".$donnees['date_achat']."</td>
									<td align=\"center\">".$donnees['id_boutique']."</td>
								</tr>";					
							}
						}
						echo "</table><br />
						<a href=\"index.php?module=logs\">Retour</a>";
					}
					elseif($type == "co_site")
					{
						echo "<p class=\"title\">Logs des connexions au site</p><br />";
						$reponse = mysql_query('SELECT r.username as account ,id_conn, date, ip
						FROM log_login l
						INNER JOIN '.$realmd['db'].'.account r ON r.id = l.id_account
						WHERE l.type_conn = "site"');
						echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th>ID</th>
								<th>Date de la connexion</th>
								<th>Compte</th>
								<th>Adresse IP</th>
							</tr>";
						if (mysql_num_rows($reponse) <= 0)
						{
							echo "<tr><td colspan=\"8\"><center><b>Aucuns logs !!!</b></center></td></tr>";
						}
						else
						{
							while($donnees = mysql_fetch_assoc($reponse))
							{
								echo "<tr>
									<td align=\"center\">".$donnees['id_conn']."</td>
									<td align=\"center\">".$donnees['date']."</td>
									<td align=\"center\">".$donnees['account']."</td>
									<td align=\"center\">".$donnees['ip']."</td>
								</tr>";					
							}
						}
						echo "</table><br />
						<a href=\"index.php?module=logs\">Retour</a>";
					}
					elseif($type == "co_admin")
					{
						echo "<p class=\"title\">Logs des connexions à l'administration</p><br />";
						$reponse = mysql_query('SELECT r.username as account ,id_conn, date, ip, module
						FROM log_login l
						INNER JOIN '.$realmd['db'].'.account r ON r.id = l.id_account
						WHERE l.type_conn = "admin"');
						echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th>ID</th>
								<th>Date de la connexion</th>
								<th>ID du compte</th>
								<th>Adresse IP</th>
								<th>Module</th>
							</tr>";
						if (mysql_num_rows($reponse) <= 0)
						{
							echo "<tr><td colspan=\"8\"><center><b>Aucuns logs !!!</b></center></td></tr>";
						}
						else
						{
							while($donnees = mysql_fetch_assoc($reponse))
							{
								echo "<tr>
									<td align=\"center\">".$donnees['id_conn']."</td>
									<td align=\"center\">".$donnees['date']."</td>
									<td align=\"center\">".$donnees['account']."</td>
									<td align=\"center\">".$donnees['ip']."</td>
									<td align=\"center\">".$donnees['module']."</td>
								</tr>";					
							}
						}
						echo "</table><br />
						<a href=\"index.php?module=logs\">Retour</a>";
					}
					elseif($type == "register")
					{
						echo "<p class=\"title\">Logs des création/activation des comptes</p><br />";
						$reponse = mysql_query('SELECT * FROM log_register');
						echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th>ID</th>
								<th>Jour</th>
								<th>Comptes créés</th>
								<th>Comptes activés</th>
							</tr>";
						if (mysql_num_rows($reponse) <= 0)
						{
							echo "<tr><td colspan=\"8\"><center><b>Aucuns logs !!!</b></center></td></tr>";
						}
						else
						{
							while($donnees = mysql_fetch_assoc($reponse))
							{
								echo "<tr>
									<td align=\"center\">".$donnees['id']."</td>
									<td align=\"center\">".$donnees['date']."</td>
									<td align=\"center\">".$donnees['nb_register']."</td>
									<td align=\"center\">".$donnees['nb_activation']."</td>
								</tr>";					
							}
						}
						echo "</table><br />
						<a href=\"index.php?module=logs\">Retour</a>";
					}
					else
					{
						echo "<p class=\"title\">Logs inconnu</p><br />";
					}
				}
			break;
			default:
				echo "<a href=\"index.php?module=logs&action=logs&type=achat\">Log des achats de la boutique</a><br />";
				echo "<a href=\"index.php?module=logs&action=logs&type=register\">Log des enregistrement et activation</a><br />";
				echo "<a href=\"index.php?module=logs&action=logs&type=co_site\">Log des connexions au site</a><br />";
				echo "<a href=\"index.php?module=logs&action=logs&type=co_admin\">Log des connexions à l'administration</a><br />";
				echo "<br />";
				echo "<a href=\"index.php?module=logs&action=gm\">Log des actions GM</a><br />";
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
	echo "<p>Page réservé au membres !<br />";
	echo "connectez-vous ou inscrivez-vous !</p>";
	echo "<a href=\"../index.php\">Retour</a>";
}
?>
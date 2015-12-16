<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_bank_guilde"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "voir_bank":
				require_once("../kernel/fonctions_armurerie.php");
				$tab = mysql_real_escape_string(htmlspecialchars($_GET['tab'], ENT_QUOTES));
				$guildid = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
				mysql_select_db($characters[1]['db']) or die(mysql_error());
				$reponse = mysql_query("SELECT * FROM guild WHERE guildid='$guildid'") or die(mysql_error());
				$donnees = mysql_fetch_array($reponse);
				
				echo "<p class=\"title\">Banque de la guilde ".$donnees['name']."</p><br />";
				echo "<p>
					<a href='index.php?module=bank_guilde&action=voir_bank&id=$guildid&tab=0'>1</a>
					<a href='index.php?module=bank_guilde&action=voir_bank&id=$guildid&tab=1'>2</a>
					<a href='index.php?module=bank_guilde&action=voir_bank&id=$guildid&tab=2'>3</a>
					<a href='index.php?module=bank_guilde&action=voir_bank&id=$guildid&tab=3'>4</a>
					<a href='index.php?module=bank_guilde&action=voir_bank&id=$guildid&tab=4'>5</a>
					<a href='index.php?module=bank_guilde&action=voir_bank&id=$guildid&tab=5'>6</a>
					</p>";
				$nx = 14;
				$ny= 7;
				echo "<table class=\"lined\" border=\"1\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>";
				for ($y=0 ; $y<$ny ; $y++)
				{
					echo '<tr>';
					for ($x=0 ; $x<$nx ; $x++)
					{
						$tabib =0;
						//$n = 0 * $nx * $ny + $y * $nx + $x;
						$n = (7 * $x) + $y;
						
						mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
						mysql_select_db($characters[1]['db']) or die(mysql_error());
						$reponse2 = mysql_query("SELECT * FROM guild_bank_item WHERE guildid='$guildid' AND SlotId='$n' AND TabId='$tab'") or die(mysql_error());
						$donnees2 = mysql_fetch_array($reponse2);
						$item = $donnees2['item_entry'];
						
						echo "<td>";
						if(empty($item))
						{
							echo "<img src=\"../images/INV/Slot_Bag.gif\" /></a>";
						}
						else
						{
							echo "<a href=\"http://fr.wowhead.com/?item=".$item."\"><img src=\"".get_icon2($item)."\" /></a>";
						}
						echo "</td>";
					}
					echo '</tr>';
				}
				echo "</table><br />";
			break;
			default:
				mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
				mysql_select_db($characters[1]['db']) or die(mysql_error());
				$requete = mysql_query("SELECT * FROM guild");
				
				echo "<p class=\"title\">Liste des banque de guilde</p>";
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th>id</th>
								<th>Nom de la guilde</th>
							</tr>";
					while($donnees = mysql_fetch_assoc($requete))
					{
						$id = $donnees['guildid'];
						echo "<tr><td align=\"center\">";
						echo $donnees['guildid'];
						echo "</td><td align=\"center\">";
						echo "<a href=\"index.php?module=bank_guilde&action=voir_bank&id=$id\">".$donnees['name']."</a>";
						echo "</td>";
						echo "</tr>";
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
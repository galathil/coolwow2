<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
$adresse = "index.php?module=gamers";
mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
mysql_select_db($characters[1]['db']) or die(mysql_error());

$page_get = Securite::get($_GET['page']);
$truc = $page_get;

switch ($_GET['action'])
{
	case "resultat":
		$perso = Securite::bdd($_POST['perso']);
		$by = Securite::bdd($_POST['by']);
		$requete = mysql_query("SELECT * FROM characters WHERE $by LIKE'%$perso%'");
		echo "<p class=\"title\">Resultat de la recherche</p><br />";
		?>
			<table class="lined" border="1" cellpadding="3" cellspacing="0" align="center" class="sortable">
				<tr>
					<th nowrap="nowrap" width="150"><?php echo $lang_player['name'] ?></th>
					<th nowrap="nowrap" width="50"><?php echo $lang_player['level'] ?></th>
					<th nowrap="nowrap" width="40"><?php echo $lang_player['race'] ?></th>
					<th nowrap="nowrap" width="40"><?php echo $lang_player['class'] ?></th>
					<th nowrap="nowrap" width="40"><?php echo $lang_player['sex'] ?></th>
					<th nowrap="nowrap" width="40"><?php echo $lang_player['faction'] ?></th>
				</tr>
			<?php
			if (mysql_num_rows($reponse) < 1)
			{
				echo "<tr><td colspan=\"6\">Aucun résultat !</td></tr>";
			}
			else
			{
				while ($donnees = mysql_fetch_array($requete,MYSQL_ASSOC) )
				{
					$level = explode(' ',Securite::html($donnees['data']));
					$niveau = $level[53];
					$name = Securite::html($donnees['name']);
					$sex = explode(' ',Securite::html($donnees['data']));
					$sex = dechex($sex[36]);
					$sex = str_pad($sex,8, 0, STR_PAD_LEFT);
					$sex = $sex{3};
					echo"<tr><td align=\"center\">";
					echo"<a href=\"armurerie-select.php?perso=".$name."\">".$name."</a>";
					echo"</td><td align=\"center\">";
					echo $niveau;
					echo"</td><td align=\"center\">";
					imgrace(Securite::html($donnees['race']));
					echo"</td><td align=\"center\">";
					imgclass(Securite::html($donnees['class']));
					echo"</td><td align=\"center\">";
					sex($sex);
					echo"</td><td align=\"center\">";
					side(Securite::html($donnees['race']));
					echo"</td></tr>";
				}
			}
			echo"</table>";
	break;
	default:
		$ParPage = $Par_Page;
		$retour_total=mysql_query('SELECT COUNT(*) AS total FROM characters');
		$donnees_total=mysql_fetch_assoc($retour_total);
		$total=Securite::get($donnees_total['total']);
		$nombreDePages=ceil($total/$ParPage);
			
		if(isset($truc))
		{
			$pageActuelle=intval($truc);
			if($pageActuelle>$nombreDePages)
			{
				$pageActuelle=$nombreDePages;
			}
		}
		else // Sinon
		{
			$pageActuelle=1;
		}
		$premiereEntree=($pageActuelle-1)*$ParPage;

		if($truc <= $nombreDePages)
		{
			$reponse = mysql_query('SELECT * FROM `characters` ORDER BY `name` LIMIT '.$premiereEntree.', '.$ParPage.'') or die(mysql_error());
			echo "<p class=\"title\">".$titre_perso."</p><br />";
			echo "
			<form action=\"index.php?module=gamers&action=resultat\" method=\"POST\">Rechercher 
				<select name=\"by\">
					<option selected value=\"name\">par Nom du personnage</option>
				</select>
				<input type=\"text\" name=\"perso\"><input type=\"submit\" value=\"Rechercher\">
			</form><br />";
			?>
			<table class="lined" border="1" cellpadding="3" cellspacing="0" align="center" class="sortable">
				<tr>
					<th nowrap="nowrap" width="150"><?php echo $lang_player['name'] ?></th>
					<th nowrap="nowrap" width="50"><?php echo $lang_player['level'] ?></th>
					<th nowrap="nowrap" width="40"><?php echo $lang_player['race'] ?></th>
					<th nowrap="nowrap" width="40"><?php echo $lang_player['class'] ?></th>
					<th nowrap="nowrap" width="40"><?php echo $lang_player['sex'] ?></th>
					<th nowrap="nowrap" width="40"><?php echo $lang_player['faction'] ?></th>
				</tr>
			<?php
			if (mysql_num_rows($reponse) < 1)
			{
				echo "<tr><td colspan=\"5\">Il n y a pas aucun personnage pour le moment !</td></tr>";
			}
			else
			{
				while ($donnees = mysql_fetch_array($reponse,MYSQL_ASSOC) )
				{
					$level = explode(' ',Securite::html($donnees['data']));
					$niveau = $level[53];
					$name = Securite::html($donnees['name']);
					$sex = explode(' ',Securite::html($donnees['data']));
					$sex = dechex($sex[36]);
					$sex = str_pad($sex,8, 0, STR_PAD_LEFT);
					$sex = $sex{3};
					echo"<tr><td align=\"center\">";
					echo"<a href=\"armurerie-select.php?perso=".$name."\">".$name."</a>";
					echo"</td><td align=\"center\">";
					echo $niveau;
					echo"</td><td align=\"center\">";
					imgrace(Securite::html($donnees['race']));
					echo"</td><td align=\"center\">";
					imgclass(Securite::html($donnees['class']));
					echo"</td><td align=\"center\">";
					sex($sex);
					echo"</td><td align=\"center\">";
					side(Securite::html($donnees['race']));
					echo"</td></tr>";
				}
			}
			echo"</TABLE>";
			pagination($ParPage , $total, $truc, $adresse);
		}
		else
		{
			echo "<p>Cette page n'existe pas !</p>";
			echo "<a href=\"index.php?module=guildes\">Retour</a>";
		}
	break;
}
?>
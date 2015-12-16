<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
mysql_select_db($characters[1]['db']) or die(mysql_error());

switch ($_GET['side'])
{
	case "alliance":
		$page_get = Securite::get($_GET['page']);
		if(!empty($page_get))
		{
				$adresse = "index.php?module=honneur&side=alliance";
				$ParPage = $Par_Page;
				$retour_total=mysql_query('SELECT COUNT(*) AS total FROM characters WHERE race in (1,3,4,7,11)');
				$donnees_total=mysql_fetch_assoc($retour_total);
				$total=Securite::get($donnees_total['total']);
				$nombreDePages=ceil($total/$ParPage);
					
				if(isset($page_get))
				{
					$pageActuelle=intval($page_get);
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

				if($page_get <= $nombreDePages)
				{
					$reponse = mysql_query("
					SELECT guid,name,race,class,totalHonorPoints,
					CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_ARENA_POINTS+1)."), ' ', -1) AS UNSIGNED) AS honor ,
					CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1)."), ' ', -1)AS UNSIGNED) AS level,
					CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_GUILD_ID+1)."), ' ', -1) AS UNSIGNED) as GNAME,
					mid(lpad( hex( CAST(substring_index(substring_index(data,' ',".(CHAR_DATA_OFFSET_SEX+1)."),' ',-1) as unsigned) ),8,'0'),4,1) as gender
					FROM `characters`
					where race in (1,3,4,7,11)
					order by totalHonorPoints desc
					LIMIT $premiereEntree, $ParPage") or die(mysql_error());
					?>
					<p class="title"><?php echo $titre_honor ?></p>
					<div class="side"><img src="images/alliance_b.gif">Alliance</div><br />
					<table class="lined" border="1" width="90%" cellpadding="2" cellspacing="0" align="center">
						<tr>
							<th width="80" nowrap="nowrap">Classement</th>
							<th width="100" nowrap="nowrap">Nom</th>
							<th width="40" nowrap="nowrap">Race</th>
							<th width="40" nowrap="nowrap">Classe</th>
							<th width="60"nowrap="nowrap">Niveau</th>
							<th width="80" nowrap="nowrap">Points</th>
							<th width="40" nowrap="nowrap">Rang</th>
							<th nowrap="nowrap">Guilde</th>
						</tr>
					<?php
					$ligne = ($page_get * $ParPage) - $ParPage +1;
					if (mysql_num_rows($reponse) < 1)
					{
						echo "<tr><td colspan=\"8\">Il n'y a aucun Hordeux !</td></tr>";
					}
					else
					{
						while ($donnees = mysql_fetch_array($reponse,MYSQL_ASSOC))
						{
							$race = Securite::bdd($donnees['race']);
							$gender = Securite::bdd($donnees['gender']);
							$class = Securite::bdd($donnees['class']);
							$name = Securite::bdd($donnees['name']);
							$guildid = Securite::bdd($donnees['GNAME']);
							$idg = Securite::bdd($donnees['guilid']);

							$guild_name = mysql_query("SELECT name FROM guild WHERE guildid='$guildid'") or die(mysql_error());
							$guild = mysql_fetch_array($guild_name,MYSQL_ASSOC);
							$guildname = $guild['name'];

							echo"<tr><td align=\"center\">";
							echo $ligne++;
							echo"</td><td align=\"center\">";
							echo"<a href=\"armurerie-select.php?perso=$name\">$name</a>";
							echo"</td><td align=\"center\">";
							echo "<img src='images/races/$race-$gender.gif' />";
							echo"</td><td align=\"center\">";
							echo "<img src='images/classes/$class.gif' />";
							echo"</td><td align=\"center\">";
							echo $donnees['level'];
							echo"</td><td align=\"center\">";
							echo $donnees['totalHonorPoints'];
							echo"</td><td align=\"center\">";
							echo"<img src='images/ranks/"; calc_character_rank($donnees['totalHonorPoints']);echo".gif' />";
							echo"</td><td align=\"center\">";
							if (empty($guildname))
							{
								echo"Aucune";
							}
							else
							{
								echo "<a href=\"index.php?module=guildes&action=membres&id=$guildid\">$guildname</a>";
							}
							echo "</td></tr>";
						}
					}
					echo "</TABLE><br />";
					pagination($ParPage , $total, $truc, $adresse);
				}
				else
				{
					echo "<p>Cette page n'existe pas !</p>";
					echo "<a href=\"index.php?module=honneur\">Retour</a>";
				}
		}
		else
		{
			echo "<p>Erreur d'accès code 1</p>";
			echo "<a href=\"index.php?module=honneur&side=alliance&page=1\">Retour</a>";
		}
	break;
	case "horde":
		$page_get = Securite::get($_GET['page']);
		if(!empty($page_get))
		{
				$adresse = "index.php?module=honneur&side=horde";
				$ParPage = $Par_Page;
				$retour_total=mysql_query('SELECT COUNT(*) AS total FROM characters WHERE race not in (1,3,4,7,11)');
				$donnees_total=mysql_fetch_assoc($retour_total);
				$total=Securite::get($donnees_total['total']);
				$nombreDePages=ceil($total/$ParPage);
					
				if(isset($page_get))
				{
					$pageActuelle=intval($page_get);
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

				if($page_get <= $nombreDePages)
				{
					$reponse = mysql_query("
					SELECT guid,name,race,class,totalHonorPoints,
					CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_ARENA_POINTS+1)."), ' ', -1) AS UNSIGNED) AS honor,
					CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1)."), ' ', -1)AS UNSIGNED) AS level,
					CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_GUILD_ID+1)."), ' ', -1) AS UNSIGNED) as GNAME,
					mid(lpad( hex( CAST(substring_index(substring_index(data,' ',".(CHAR_DATA_OFFSET_SEX+1)."),' ',-1) as unsigned) ),8,'0'),4,1) as gender
					FROM `characters`
					where race not in (1,3,4,7,11)
					order by totalHonorPoints desc
					LIMIT $premiereEntree, $ParPage") or die(mysql_error());
					?>
					<p class="title"><?php echo $titre_honor ?></p>
					<div class="side"><img src="images/horde_b.gif">Horde</div><br />
					<table class="lined" border="1" width="90%" cellpadding="2" cellspacing="0" align="center">
						<tr>
							<th width="80" nowrap="nowrap">Classement</th>
							<th width="100" nowrap="nowrap">Nom</th>
							<th width="40" nowrap="nowrap">Race</th>
							<th width="40" nowrap="nowrap">Classe</th>
							<th width="60"nowrap="nowrap">Niveau</th>
							<th width="80" nowrap="nowrap">Points</th>
							<th width="40" nowrap="nowrap">Rang</th>
							<th nowrap="nowrap">Guilde</th>
						</tr>
					<?php
					$ligne = ($page_get * $ParPage) - $ParPage +1;
					if (mysql_num_rows($reponse) < 1)
					{
						echo "<tr><td colspan=\"8\">Il n'y a aucun Hordeux !</td></tr>";
					}
					else
					{
						while ($donnees = mysql_fetch_array($reponse,MYSQL_ASSOC))
						{
							$race = $donnees['race'];
							$gender = $donnees['gender'];
							$class = $donnees['class'];
							$name = $donnees['name'];
							$guildid = $donnees['GNAME'];
							$idg = $donnees['guilid'];

							$guild_name = mysql_query("SELECT name FROM guild WHERE guildid='$guildid'") or die(mysql_error());
							$guild = mysql_fetch_array($guild_name,MYSQL_ASSOC);
							$guildname = $guild['name'];

							echo"<tr><td align=\"center\">";
							echo $ligne++;
							echo"</td><td align=\"center\">";
							echo"<a href=\"armurerie-select.php?perso=$name\">$name</a>";
							echo"</td><td align=\"center\">";
							echo "<img src='images/races/$race-$gender.gif' />";
							echo"</td><td align=\"center\">";
							echo "<img src='images/classes/$class.gif' />";
							echo"</td><td align=\"center\">";
							echo $donnees['level'];
							echo"</td><td align=\"center\">";
							echo $donnees['totalHonorPoints'];
							echo"</td><td align=\"center\">";
							echo"<img src='images/ranks/"; calc_character_rank($donnees['totalHonorPoints']);echo".gif' />";
							echo"</td><td align=\"center\">";
							if (empty($guildname))
							{
							echo"Aucune";
							}
							else
							{
							echo "<a href=\"index.php?module=guildes&action=membres&id=$guildid\">$guildname</a>";
							}
							echo "</td></tr>";
						}
					}
					echo "</TABLE><br />";
					pagination($ParPage , $total, $truc, $adresse);
				}
				else
				{
					echo "<p>Cette page n'existe pas !</p>";
					echo "<a href=\"index.php?module=honneur\">Retour</a>";
				}
		}
		else
		{
			echo "<p>Erreur d'accès code 1</p>";
			echo "<a href=\"index.php?module=honneur&side=horde&page=1\">Retour</a>";
		}
	break;
	default:
		mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
		mysql_select_db($characters[1]['db']) or die(mysql_error());

		$reponse = mysql_query("
		SELECT guid,name,race,class,totalHonorPoints,
		CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_ARENA_POINTS+1)."), ' ', -1) AS UNSIGNED) AS honor ,
		CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1)."), ' ', -1)AS UNSIGNED) AS level,
		CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_GUILD_ID+1)."), ' ', -1) AS UNSIGNED) as GNAME,
		mid(lpad( hex( CAST(substring_index(substring_index(data,' ',".(CHAR_DATA_OFFSET_SEX+1)."),' ',-1) as unsigned) ),8,'0'),4,1) as gender
		FROM `characters`
		where race in (1,3,4,7,11)
		order by totalHonorPoints desc LIMIT 25") or die(mysql_error());
						
		$reponse2 = mysql_query("
		SELECT guid,name,race,class,totalHonorPoints,
		CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_ARENA_POINTS+1)."), ' ', -1) AS UNSIGNED) AS highest_rank ,
		CAST(SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1)."), ' ', -1)AS UNSIGNED) AS level,
		CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_GUILD_ID+1)."), ' ', -1) AS UNSIGNED) as GNAME,
		mid(lpad( hex( CAST(substring_index(substring_index(data,' ',".(CHAR_DATA_OFFSET_SEX+1)."),' ',-1) as unsigned) ),8,'0'),4,1) as gender
		FROM `characters`
		where race not in (1,3,4,7,11)
		order by totalHonorPoints desc
		LIMIT 25;") or die(mysql_error());
		?>
		<p class="title"><?php echo $titre_honor ?></p>
		<div class="side"><img src="images/alliance_b.gif">Alliance</div><br />
		<table class="lined" border="1" width="90%" cellpadding="2" cellspacing="0" align="center">
			<tr>
				<th width="80" nowrap="nowrap">Classement</th>
				<th width="100" nowrap="nowrap">Nom</th>
				<th width="40" nowrap="nowrap">Race</th>
				<th width="40" nowrap="nowrap">Classe</th>
				<th width="60"nowrap="nowrap">Niveau</th>
				<th width="80" nowrap="nowrap">Points</th>
				<th width="40" nowrap="nowrap">Rang</th>
				<th nowrap="nowrap">Guilde</th>
			</tr>
		<?php
		$ligne = 1;
		if (mysql_num_rows($reponse) < 1)
		{
			echo "<tr><td colspan=\"8\">Il n'y a aucun Allianceux !</td></tr>";
		}
		else
		{
			while ($donnees = mysql_fetch_array($reponse,MYSQL_ASSOC))
			{
				$race = Securite::bdd($donnees['race']);
				$gender = Securite::bdd($donnees['gender']);
				$class = Securite::bdd($donnees['class']);
				$name = Securite::bdd($donnees['name']);
				$guildid = Securite::bdd($donnees['GNAME']);
				$idg = Securite::bdd($donnees['guilid']);

				$guild_name = mysql_query("SELECT name FROM guild WHERE guildid='$guildid'") or die(mysql_error());
				$guild = mysql_fetch_array($guild_name,MYSQL_ASSOC);
				$guildname = $guild['name'];

				echo"<tr><td align=\"center\">";
				echo $ligne++;
				echo"</td><td align=\"center\">";
				echo"<a href=\"armurerie-select.php?perso=$name\">$name</a>";
				echo"</td><td align=\"center\">";
				echo "<img src='images/races/$race-$gender.gif' />";
				echo"</td><td align=\"center\">";
				echo "<img src='images/classes/$class.gif' />";
				echo"</td><td align=\"center\">";
				echo $donnees['level'];
				echo"</td><td align=\"center\">";
				echo $donnees['totalHonorPoints'];
				echo"</td><td align=\"center\">";
				echo"<img src='images/ranks/"; calc_character_rank($donnees['totalHonorPoints']);echo".gif' />";
				echo"</td><td align=\"center\">";
				if (empty($guildname))
				{
					echo"Aucune";
				}
				else
				{
					echo "<a href=\"index.php?module=guildes&action=membres&id=$guildid\">$guildname</a>";
				}
				echo "</td></tr>";
			}
		}
		echo "</TABLE>";
		echo "<br /><a href=\"index.php?module=honneur&side=alliance&page=1\">Voir la liste compète</a>";
		echo "<br /><br />";
		echo "<hr>";
		echo "<br />";
		?>
		<div class="side"><img src="images/horde_b.gif">Horde</div><br />
		<table class="lined" border="1" width="90%" cellpadding="2" cellspacing="0" align="center">
			<tr>
				<th width="80" nowrap="nowrap">Classement</th>
				<th width="100" nowrap="nowrap">Nom</th>
				<th width="40" nowrap="nowrap">Race</th>
				<th width="40" nowrap="nowrap">Classe</th>
				<th width="60"nowrap="nowrap">Niveau</th>
				<th width="80" nowrap="nowrap">Points</th>
				<th width="40" nowrap="nowrap">Rang</th>
				<th nowrap="nowrap">Guilde</th>
			</tr>
		<?php
		$ligne = 1;
		if (mysql_num_rows($reponse2) < 1)
		{
			echo "<tr><td colspan=\"8\">Il n'y a aucun Hordeux !</td></tr>";
		}
		else
		{
			while ($donnees2 = mysql_fetch_array($reponse2,MYSQL_ASSOC))
			{
				$race = Securite::bdd($donnees2['race']);
				$gender = Securite::bdd($donnees2['gender']);
				$class = Securite::bdd($donnees2['class']);
				$name = Securite::bdd($donnees2['name']);
				$guildid = Securite::bdd($donnees2['GNAME']);

				$guild_name = mysql_query("SELECT name FROM guild WHERE guildid='$guildid'") or die(mysql_error());
				$guild = mysql_fetch_array($guild_name,MYSQL_ASSOC);
				$guildname = $guild['name'];

				echo"<tr><td align=\"center\">";
				echo $ligne++;
				echo"</td><td align=\"center\">";
				echo"<a href=\"armurerie-select.php?perso=$name\">$name</a>";
				echo"</td><td align=\"center\">";
				echo "<img src='images/races/$race-$gender.gif' />";
				echo"</td><td align=\"center\">";
				echo "<img src='images/classes/$class.gif' />";
				echo"</td><td align=\"center\">";
				echo $donnees2['level'];
				echo"</td><td align=\"center\">";
				echo $donnees2['totalHonorPoints'];
				echo"</td><td align=\"center\">";
				echo"<img src='images/ranks/"; calc_character_rank($donnees2['totalHonorPoints']);echo".gif' />";
				echo"</td><td align=\"center\">";
				if (empty($guildname))
				{
					echo"Aucune";
				}
				else
				{
					echo "<a href=\"index.php?module=guildes&action=membres&id=$guildid\">$guildname</a>";
				}
				echo"</td></tr>";
			}
		}
		echo"</TABLE>";
		echo "<br /><a href=\"index.php?module=honneur&side=horde&page=1\">Voir la liste compète</a>";
		echo"<br>";
		mysql_close();
	break;
}
?>
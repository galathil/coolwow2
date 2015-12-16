<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
mysql_select_db($characters[1]['db']) or die(mysql_error());

$page_get = Securite::get($_GET['page']);
$truc = $page_get;
$adresse = "index.php?module=guildes";

function count_days( $a, $b )
{
	$gd_a = getdate( $a );
	$gd_b = getdate( $b );
	$a_new = mktime( 12, 0, 0, $gd_a['mon'], $gd_a['mday'], $gd_a['year'] );
	$b_new = mktime( 12, 0, 0, $gd_b['mon'], $gd_b['mday'], $gd_b['year'] );
	return round( abs( $a_new - $b_new ) / 86400 );
}

$ParPage = $Par_Page;
$retour_total=mysql_query('SELECT COUNT(*) AS total FROM guild');
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
	switch ($_GET['action'])
	{
		case "membres":
			$id = Securite::get($_GET['id']);
				if ($id != NULL) // Si on a quelque chose à enregistrer
				{
					//test si iduser existe
					$idt = Securite::bdd($_POST['id']);
					$idt = Securite::bdd($_GET['id']);
					$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM guild WHERE guildid=$idt") or die(mysql_error());
					$donnees = mysql_fetch_array($reponse);
					$test = $donnees['nombre'];
					if ($test == 0)
					{
						echo "
						<p>Il n'y a aucune Guilde qui a cet ID !!!</p>
						<p><a href=\"index.php?module=guildes\">Retour</a></p>";
					}
					else
					{
						$info_guilde = mysql_query("SELECT guildid, name, info, motd, createdate FROM guild WHERE guildid='$id'") or die(mysql_error());
						$members_info = mysql_query("SELECT guild_member.guid, guild_member.rank AS mrank,
							`characters`.name, SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1)."), ' ', -1) AS level,
							(SELECT rname FROM guild_rank WHERE guildid ='$id' AND rid = mrank) AS rname,
							guild_member.pnote, guild_member.offnote
							FROM guild_member,`characters`
							LEFT JOIN guild_member k1 ON k1.`guid`=`characters`.`guid`
							WHERE guild_member.guildid = '$id' AND guild_member.guid=`characters`.guid
							ORDER BY mrank") or die(mysql_error());
						$guilde = mysql_fetch_row($info_guilde);
						$member_total = mysql_query("SELECT COUNT(*) AS nombre FROM guild_member WHERE guildid='$id'") or die(mysql_error());
						$member_total = mysql_fetch_array($member_total);
						$member_total = $member_total['nombre'];
						echo "
						<h2>$guilde[1]</h2>
						<TABLE  class=\"lined\" width=\"99%\" border=\"1\" cellpadding=\"2\" cellspacing=\"0\" align=\"center\">
							<tr>
								<td colspan=\"11\" align=\"center\">Date de création: $guilde[4]</td>
							</tr>
							<tr>
								<td colspan=\"11\" align=\"center\">Info: $guilde[2]</td>
							</tr>
							<tr>
								<td colspan=\"11\" align=\"center\">Nombre total de membres: $member_total</td>
							</tr>
							<tr>
								<th>ID</th>
								<th>Nom</th>
								<th>Race</th>
								<th>Class</th>
								<th>Niveau</th>
								<th>Rang</th>
								<th>Note Membre</th>
								<th>Note Office</th>
								<th>Dernière connexion</th>
								<th>En Ligne</th>
							</tr>";
							if (mysql_num_rows($members_info) < 1)
							{
								echo "<tr><td colspan=\"10\">Il n y a aucun membre dans cette guilde !</td></tr>";
							}
							else
							{
								while ($member = mysql_fetch_row($members_info))
								{
									$members_info2 = mysql_query("SELECT `race`,`class`,`online`, `account`, `logout_time`, SUBSTRING_INDEX(SUBSTRING_INDEX(`characters`.`data`, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1)."), ' ', -1) AS level, mid(lpad( hex( CAST(substring_index(substring_index(data,' ',".(CHAR_DATA_OFFSET_SEX+1)."),' ',-1) as unsigned) ),8,'0'),4,1) as gender FROM `characters` WHERE `name` = '$member[2]'") or die(mysql_error());
									$member2 = mysql_fetch_row($members_info2);
									$accid = $member2[3];
									$race = $member2[0];
									$class =$member2[1];
									$online = $member2[2];
									$gender = $member2[6];
									$lastlogin = count_days($member2[4], time());
									$rang = $member[4];
									$rang2 = $member[1];
									echo"<tr><td align=\"center\">";
									echo $member[0];
									echo"</td><td align=\"center\">";
									echo "<a href=\"armurerie-select.php?perso=$member[2]\">$member[2]</a>";
									echo"</td><td align=\"center\">";
									echo "<img src='images/races/$race-$gender.gif' />";
									echo"</td><td align=\"center\">";
									echo "<img src='images/classes/$class.gif' />";
									echo"</td><td align=\"center\">";
									echo $member[3];
									echo"</td><td align=\"center\">";
									echo "$rang ($rang2)";
									echo"</td><td align=\"center\">";
									echo $member[5];
									echo"</td><td align=\"center\">";
									echo $member[6];
									echo"</td><td align=\"center\">";
									echo "$lastlogin j";
									echo"</td><td align=\"center\">";
									if (empty($online))
									{
										echo"<img src='images/offline.gif' />";
									}
									else
									{
										echo "<img src='images/online.gif' />";
									}
									echo"</td></tr>";
								}
							}
						echo"</TABLE><br>";
					}
				}
				else
				{
					echo "<p>Erreur d'accès code 1</p>";
					echo "<a href=\"index.php?module=guildes\">Retour</a>";
				}
		break;
		default:
			$reponse = mysql_query("SELECT guild.guildid AS gid, guild.name AS gname,guild.leaderguid AS lguid,SUBSTRING_INDEX(guild.MOTD,' ',6), guild.createdate, (SELECT name FROM `characters` WHERE guid = lguid) AS l_name,(SELECT COUNT(*) FROM guild_member WHERE guildid = gid) AS tot_chars FROM guild LIMIT $premiereEntree, $ParPage") or die(mysql_error());
			?>
			<p class="title"><?php echo $titre_guilde ?></p>
				<table class="lined" width="99%" border="1" cellpadding="2" cellspacing="0" align="center" class="sortable">
					<tr>
						<th><?php echo $lang_guild['name'] ?></th>
						<th width="50"><?php echo $lang_guild['nb_member'] ?></th>
						<th width="50"><?php echo $lang_guild['member_online'] ?></th>
						<th width="150"><?php echo $lang_guild['leader_guild'] ?></th>
						<th width="80"><?php echo $lang_guild['date_creation'] ?></th>
					</tr>
			<?php
			if (mysql_num_rows($reponse) < 1)
			{
				echo "<tr><td colspan=\"5\">Il n y a pas aucune guilde pour le moment !</td></tr>";
			}
			else
			{
				while ($donnees = mysql_fetch_row($reponse))
				{
					$gonline = mysql_query("SELECT count(*) AS nombre FROM `guild_member`, `characters`, `guild` WHERE guild.guildid = ".$donnees[0]." AND guild_member.guildid = guild.guildid AND guild_member.guid = characters.guid AND characters.online = 1;") or die(mysql_error());
					$guild_online = mysql_fetch_array($gonline);
					$guild_online2 = $guild_online['nombre'];
					
					echo"<tr><td align=\"center\">";
					echo "<a href=\"index.php?module=guildes&action=membres&id=$donnees[0]\">$donnees[1]</a>";
					echo"</td><td align=\"center\">";
					echo $donnees[6];
					echo"</td><td align=\"center\">";
					echo $guild_online2;
					echo"</td><td align=\"center\">";
					echo"<a href=\"armurerie-select.php?perso=$donnees[5]\">$donnees[5]</a>";
					echo"</td><td align=\"center\">";
					echo $donnees[4];
					echo"</td></tr>";
				}
			}
			echo"</TABLE><br>";
			pagination($ParPage , $total, $truc, $adresse);
		break;
	}
}
else
{
	echo "<p>Cette page n'existe pas !</p>";
	echo "<a href=\"index.php?module=guildes\">Retour</a>";
}
?>
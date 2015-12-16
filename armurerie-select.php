<?php
require_once("kernel/config.php");
require_once("lang/$language.php");
require_once("kernel/fonctions.php");
require_once("kernel/fonctions_armurerie.php");
require_once("kernel/defines/$client.php");

$largeur = "70%";

//systeme de mise en cache de la page (partie1)
$dossier_cache = 'cache/';
$secondes_cache = 60*60*24; // 24 heures
 
$url_cache = Securite::bdd($_SERVER['HTTP_HOST']) . Securite::bdd($_SERVER['REQUEST_URI']);
$fichier_cache = $dossier_cache . md5($url_cache) . '.cache';
  
$fichier_cache_existe = ( @file_exists($fichier_cache) ) ? @filemtime($fichier_cache) : 0;
  
 if ($fichier_cache_existe > time() - $secondes_cache ) {
@readfile($fichier_cache);
exit();
}
ob_start();
//fin de la mise en cache fin (partie1)
include("header.php");
require("themes/header_theme.php");
$royaume = royaume($_GET['royaume']);

mysql_connect($characters[$royaume]['host'], $characters[$royaume]['user'], $characters[$royaume]['password']) or die(mysql_error());
mysql_select_db($characters[$royaume]['db']) or die(mysql_error());

$id = Securite::bdd($_GET['perso']) OR Securite::bdd($_POST['perso']);
$perso = $id;
if (empty($id))
{
	echo "<p>Erreur : Aucun nom/id de personnage détecté !</p>";
	echo "<p><a href=\"index.php\">Retour</a></p>";
}
else
{
	if (isset($id)) // Si les variables existent
	{
			//test si iduser existe
			$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM `characters` WHERE `name`='$perso' OR `guid`='$perso'") or die(mysql_error());
			$donnees = mysql_fetch_array($reponse);
			$test = Securite::bdd($donnees['nombre']);
			if ($test == 0)
			{
				echo "<p>Il n'y a aucun personnage qui a ce nom ou cet ID !!!</p>";
				echo "<p><a href=\"index.php\">Retour</a></p>";
			}
			else
			{
				$id = Securite::bdd($_POST['perso']);
				$id = Securite::bdd($_GET['perso']);
				
				if(is_numeric($id))
				{
					$guid = $id;
				}
				else
				{
					$req = mysql_query("SELECT guid,data,name,race,class FROM `characters` WHERE `name`='$id'") or die(mysql_error());
					$don = mysql_fetch_array($req,MYSQL_ASSOC) ;
					$guid = $don['guid'];
				}
				
				$reponse = mysql_query("SELECT guid,data,name,race,class,
				CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', ".(CHAR_DATA_OFFSET_LEVEL+1)."), ' ', -1) AS UNSIGNED) AS level, 
				mid(lpad( hex( CAST(substring_index(substring_index(data,' ',".(CHAR_DATA_OFFSET_SEX+1)."),' ',-1) as unsigned) ),8,'0'),4,1) as gender,
				CAST( SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', ".(CHAR_DATA_OFFSET_GUILD_ID+1)."), ' ', -1) AS UNSIGNED) as GNAME
				FROM `characters` 
				WHERE `name`='$id' OR `guid`='$id' ") or die(mysql_error());
				$donnees = mysql_fetch_array($reponse,MYSQL_ASSOC);
				
				$reponse2 = mysql_query("SELECT `name` FROM `guild` WHERE `guildid`=".Securite::bdd($donnees['GNAME']).";");
				$guild_name = mysql_fetch_row($reponse2);
				
				$result = mysql_query("SELECT data,name,race,class,zone,map,online,totaltime, mid(lpad( hex( CAST(substring_index(substring_index(data,' ',".(CHAR_DATA_OFFSET_SEX+1)."),' ',-1) as unsigned) ),8,'0'),4,1) as gender FROM `characters` WHERE `name`='$id' OR guid = '$id'");
				$char = mysql_fetch_row($result);
				$char_data = explode(' ',$char[0]);
				
				$EQU_HEAD = $char_data[CHAR_DATA_OFFSET_EQU_HEAD];
				$EQU_NECK = $char_data[CHAR_DATA_OFFSET_EQU_NECK];
				$EQU_SHOULDER = $char_data[CHAR_DATA_OFFSET_EQU_SHOULDER];
				$EQU_SHIRT = $char_data[CHAR_DATA_OFFSET_EQU_SHIRT];
				$EQU_CHEST = $char_data[CHAR_DATA_OFFSET_EQU_CHEST];
				$EQU_BELT = $char_data[CHAR_DATA_OFFSET_EQU_BELT];
				$EQU_LEGS = $char_data[CHAR_DATA_OFFSET_EQU_LEGS];
				$EQU_FEET = $char_data[CHAR_DATA_OFFSET_EQU_FEET];
				$EQU_WRIST = $char_data[CHAR_DATA_OFFSET_EQU_WRIST];
				$EQU_GLOVES = $char_data[CHAR_DATA_OFFSET_EQU_GLOVES];
				$EQU_FINGER1 = $char_data[CHAR_DATA_OFFSET_EQU_FINGER1];
				$EQU_FINGER2 = $char_data[CHAR_DATA_OFFSET_EQU_FINGER2];
				$EQU_TRINKET1 = $char_data[CHAR_DATA_OFFSET_EQU_TRINKET1];
				$EQU_TRINKET2 = $char_data[CHAR_DATA_OFFSET_EQU_TRINKET2];
				$EQU_BACK = $char_data[CHAR_DATA_OFFSET_EQU_BACK];
				$EQU_MAIN_HAND = $char_data[CHAR_DATA_OFFSET_EQU_MAIN_HAND];
				$EQU_OFF_HAND = $char_data[CHAR_DATA_OFFSET_EQU_OFF_HAND];
				$EQU_RANGED = $char_data[CHAR_DATA_OFFSET_EQU_RANGED];
				$EQU_TABARD = $char_data[CHAR_DATA_OFFSET_EQU_TABARD];
				$EQU_PROJECT = $char_data[CHAR_DATA_OFFSET_EQU_PROJECT];
				
				$equiped_items = array(
				    1 => array(($EQU_HEAD       ? get_item_tooltip($EQU_HEAD)      : 0), ($EQU_HEAD      ? get_icon($EQU_HEAD)      : 0),($EQU_HEAD      ? get_item_border($EQU_HEAD)      : 0)),
				    2 => array(($EQU_NECK       ? get_item_tooltip($EQU_NECK)      : 0), ($EQU_NECK      ? get_icon($EQU_NECK)      : 0),($EQU_NECK      ? get_item_border($EQU_NECK)      : 0)),
				    3 => array(($EQU_SHOULDER   ? get_item_tooltip($EQU_SHOULDER)  : 0), ($EQU_SHOULDER  ? get_icon($EQU_SHOULDER)  : 0),($EQU_SHOULDER  ? get_item_border($EQU_SHOULDER)  : 0)),
				    4 => array(($EQU_SHIRT      ? get_item_tooltip($EQU_SHIRT)     : 0), ($EQU_SHIRT     ? get_icon($EQU_SHIRT)     : 0),($EQU_SHIRT     ? get_item_border($EQU_SHIRT)     : 0)),
				    5 => array(($EQU_CHEST      ? get_item_tooltip($EQU_CHEST)     : 0), ($EQU_CHEST     ? get_icon($EQU_CHEST)     : 0),($EQU_CHEST     ? get_item_border($EQU_CHEST)     : 0)),
				    6 => array(($EQU_BELT       ? get_item_tooltip($EQU_BELT)      : 0), ($EQU_BELT      ? get_icon($EQU_BELT)      : 0),($EQU_BELT      ? get_item_border($EQU_BELT)      : 0)),
				    7 => array(($EQU_LEGS       ? get_item_tooltip($EQU_LEGS)      : 0), ($EQU_LEGS      ? get_icon($EQU_LEGS)      : 0),($EQU_LEGS      ? get_item_border($EQU_LEGS)      : 0)),
				    8 => array(($EQU_FEET       ? get_item_tooltip($EQU_FEET)      : 0), ($EQU_FEET      ? get_icon($EQU_FEET)      : 0),($EQU_FEET      ? get_item_border($EQU_FEET)      : 0)),
				    9 => array(($EQU_WRIST      ? get_item_tooltip($EQU_WRIST)     : 0), ($EQU_WRIST     ? get_icon($EQU_WRIST)     : 0),($EQU_WRIST     ? get_item_border($EQU_WRIST)     : 0)),
				    10 => array(($EQU_GLOVES    ? get_item_tooltip($EQU_GLOVES)    : 0), ($EQU_GLOVES    ? get_icon($EQU_GLOVES)    : 0),($EQU_GLOVES    ? get_item_border($EQU_GLOVES)    : 0)),
				    11 => array(($EQU_FINGER1   ? get_item_tooltip($EQU_FINGER1)   : 0), ($EQU_FINGER1   ? get_icon($EQU_FINGER1)   : 0),($EQU_FINGER1   ? get_item_border($EQU_FINGER1)   : 0)),
				    12 => array(($EQU_FINGER2   ? get_item_tooltip($EQU_FINGER2)   : 0), ($EQU_FINGER2   ? get_icon($EQU_FINGER2)   : 0),($EQU_FINGER2   ? get_item_border($EQU_FINGER2)   : 0)),
				    13 => array(($EQU_TRINKET1  ? get_item_tooltip($EQU_TRINKET1)  : 0), ($EQU_TRINKET1  ? get_icon($EQU_TRINKET1)  : 0),($EQU_TRINKET1  ? get_item_border($EQU_TRINKET1)  : 0)),
				    14 => array(($EQU_TRINKET2  ? get_item_tooltip($EQU_TRINKET2)  : 0), ($EQU_TRINKET2  ? get_icon($EQU_TRINKET2)  : 0),($EQU_TRINKET2  ? get_item_border($EQU_TRINKET2)  : 0)),
				    15 => array(($EQU_BACK      ? get_item_tooltip($EQU_BACK)      : 0), ($EQU_BACK      ? get_icon($EQU_BACK)      : 0),($EQU_BACK      ? get_item_border($EQU_BACK)      : 0)),
				    16 => array(($EQU_MAIN_HAND ? get_item_tooltip($EQU_MAIN_HAND) : 0), ($EQU_MAIN_HAND ? get_icon($EQU_MAIN_HAND) : 0),($EQU_MAIN_HAND ? get_item_border($EQU_MAIN_HAND) : 0)),
				    17 => array(($EQU_OFF_HAND  ? get_item_tooltip($EQU_OFF_HAND)  : 0), ($EQU_OFF_HAND  ? get_icon($EQU_OFF_HAND)  : 0),($EQU_OFF_HAND  ? get_item_border($EQU_OFF_HAND)  : 0)),
				    18 => array(($EQU_RANGED    ? get_item_tooltip($EQU_RANGED)    : 0), ($EQU_RANGED    ? get_icon($EQU_RANGED)    : 0),($EQU_RANGED    ? get_item_border($EQU_RANGED)    : 0)),
				    19 => array(($EQU_TABARD    ? get_item_tooltip($EQU_TABARD)    : 0), ($EQU_TABARD    ? get_icon($EQU_TABARD)    : 0),($EQU_TABARD    ? get_item_border($EQU_TABARD)    : 0)),
					20 => array(($EQU_PROJECT    ? get_item_tooltip($EQU_PROJECT)    : 0), ($EQU_PROJECT    ? get_icon($EQU_PROJECT)    : 0),($EQU_PROJECT    ? get_item_border($EQU_PROJECT)    : 0))
				);
				
				// Talents
				mysql_connect($characters[$royaume]['host'], $characters[$royaume]['user'], $characters[$royaume]['password']) or die(mysql_error());
				mysql_select_db($characters[$royaume]['db']) or die(mysql_error());
				$arbreTalent = array(0, 0, 0);
				$ids = array(0,0,0);
				$spellQuery = mysql_query("SELECT * FROM `character_spell` WHERE `guid`='$guid'") or die(mysql_error());
				mysql_close();
				
				mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
				mysql_select_db($coolwow['db']) or die(mysql_error());
				while($spellData = mysql_fetch_array($spellQuery))
				{
					$spellId = $spellData['spell'];
					if($talentInfo = getTalentInfo($spellId))
					{
						$tree = $talentInfo['ref_tab'];
						$talentQuery = mysql_query("SELECT * FROM `talenttab` WHERE `id`='$tree'") or die(mysql_error());
						$talentData = mysql_fetch_array($talentQuery);
						$tab_number = $talentData['tab_number'];
						if($spellId == $talentInfo['rank1'])
							$arbreTalent[$tab_number] += 1;
						if($spellId == $talentInfo['rank2'])
							$arbreTalent[$tab_number] += 2;
						if($spellId == $talentInfo['rank3'])
							$arbreTalent[$tab_number] += 3;
						if($spellId == $talentInfo['rank4'])
							$arbreTalent[$tab_number] += 4;
						if($spellId == $talentInfo['rank5'])
							$arbreTalent[$tab_number] += 5;
						
						$ids[$tab_number] = $tree;
						

					}
				}
				$mainTree = getMainTree($arbreTalent, $ids);
				$talentIcon = "".$donnees['class']."-".$mainTree['id']."";
				
				if((!$arbreTalent[0]) && (!$arbreTalent[1]) && (!$arbreTalent[2])) // Si le joueur n'a aucun talent
					$talentIcon = "None";// Aucune sp&eacute;cialisation
				
				// Skill
				$primary_prof_array = array (
				"name" => "Aucun",
				"icon" => "images/professions/None.gif",
				"skillCurrent" => "N",
				"skillMax" => "A",
				"percent" => 0);
		
				$secondary_prof_array = array (
				"id" => 0,
				"name" => "Aucun",
				"icon" => "images/professions/None.gif",
				"skillCurrent" => "N",
				"skillMax" => "A",
				"percent" => 0);
			
				$statistic_data = $char_data;
				for($i = CHAR_DATA_OFFSET_SKILL_DATA; $i <= CHAR_DATA_OFFSET_SKILL_DATA+384 ; $i += 3)
				{
					if($statistic_data[$i] & 0x0000FFFF)
					{
						$temp = unpack("S", pack("L", $statistic_data[$i+1]));
						$skill = ($statistic_data[$i] & 0x0000FFFF);
						if($skill == 185 || $skill == 129 || $skill == 356)
						{
							$skillQuery = mysql_query("SELECT * FROM `skillline` WHERE `id`='$skill'");
							$skillData = mysql_fetch_array($skillQuery);
							$name = $skillData['name'];
							
							$max = ($temp[1] < 76?75:($temp[1] < 151?150:($temp[1] < 226?225:($temp[1] < 301?300:($temp[1] < 351?350:($temp[1] < 376?375:($temp[1] < 451?450:460)))))));
							
							$primary_prof_array['name'] = htmlentities($name);
							$primary_prof_array['icon'] = "images/professions/$skill.gif";
							$primary_prof_array['skillCurrent'] = $temp[1];
							$primary_prof_array['skillMax'] = $max;
							$primary_prof_array['percent'] = ($temp[1] / $max) * 100;	
						}
						else if($skill == 171 || $skill == 182 || $skill == 186 || $skill == 197 || $skill == 202 || $skill == 333 ||
								 $skill == 393 || $skill == 755 || $skill == 164 || $skill == 165 || $skill == 773)
						{
							$skillQuery = mysql_query("SELECT * FROM `skillline` WHERE `id`='$skill'");
							$skillData = mysql_fetch_array($skillQuery);
							$name = $skillData['name'];
							
							$max = ($temp[1] < 76?75:($temp[1] < 151?150:($temp[1] < 226?225:($temp[1] < 301?300:($temp[1] < 351?350:($temp[1] < 376?375:($temp[1] < 451?450:460)))))));
							
							$secondary_prof_array['name'] = htmlentities($name);
							$secondary_prof_array['icon'] = "images/professions/$skill.gif";
							$secondary_prof_array['skillCurrent'] = $temp[1];
							$secondary_prof_array['skillMax'] = $max;		
							$secondary_prof_array['percent'] = ($temp[1] / $max) * 100;	
						}
						else
						{
							
						}
					}
				}
				unset($statistic_data);
echo "
	<table width=\"576\" align=\"center\">
		<tr>
			<td>
				<table cellpadding=\"0\" cellspacing=\"0\" class=\"profile-header-table\">
					<tr>
						<td class=\"profile-header-";?><?php echo nomside(Securite::bdd($donnees['race'])); ?><?php echo "\" valign=\"top\" width=\"50%\">";
							echo "<table class=\"profile-header-nametext-table\">
								<tr>
									<td class=\"profile-header-portrait\">
										<img width=\"72\" height=\"72\" src=\"images/portraits/";?><?php echo portraitcaractere($donnees['level']); ?><?php echo "/".Securite::html($donnees['gender'])."-".Securite::html($donnees['race'])."-".Securite::html($donnees['class']).".gif\" class=\"profile-header-portrait-img-";?><?php echo nomside(Securite::html($donnees['race'])); ?><?php echo "\" onmouseover=\"ddrivetip('<span class=\'tooltip-whitetext\'>race - classe</span>')\" onmouseout=\"hideddrivetip()\">
									</td>
									<td class=\"profile-header-title\" valign=\"top\">
										<span class=\"profile-header-title-name\">".Securite::html($donnees['name'])."</span><br>
										<span class=\"profile-header-title-guild\"><a href=\"index.php?module=guildes&action=membres&id=".Securite::html($donnees['GNAME'])."\">".Securite::bdd($guild_name[0])."</a></span><br>";
										?>
										<span class="profile-header-title-info">Level <?php echo $donnees['level']; ?> <?php nomrace(Securite::html($donnees['race'])); ?> <?php nomclass(Securite::html($donnees['class'])); ?></span><br>
										<?php
									echo "</td>
								</tr>
							</table>
						</td>
						<td class=\"profile-header-";?><?php echo nomside(Securite::html($donnees['race'])); ?><?php echo "-right\" width=\"50%\" valign=\"top\">
							<span onmouseover=\"ddrivetip('<span class=\'profile-tooltip-header\'>Guild - name\</span><br><span class=\'profile-tooltip-description\'>Guild Rank: membre<br>Members: 100</span>')\" onmouseout=\"hideddrivetip()\">Guild: ".Securite::html($guild_name[0])."</span><br><br>Realm: Royaume<br>
						</td>
					</tr>
				</table>
				<br />
				<center>";
				?>
				<br /><br />
				<table cellpadding="0" cellspacing="0" class="lined" style="width: 560px;">
					<tr>
						<td width="6%">
						<?php  
						if (!empty($equiped_items[1][1])) echo maketooltip("<img src=\"{$equiped_items[1][1]}\" class=\"{$equiped_items[1][2]}\" alt=\"\" />", "$item_datasite{$EQU_HEAD}", $equiped_items[1][0], "item_tooltip", "target=\"_blank\"");
      else echo "<img src=\"images/armurerie/$template_icons/head.gif\" class=\"icon_border_0\" alt=\"\" />";
						?>
						</td>
						<td class="half_line" colspan="4"><?php echo $lang_armurerie['honor_rang']; ?>: <?php echo $char_data[CHAR_DATA_OFFSET_HONOR_POINTS]; ?> / <?php echo $char_data[CHAR_DATA_OFFSET_ARENA_POINTS]; ?> - <?php echo $lang_armurerie['kill_number']; ?>: <?php echo $char_data[CHAR_DATA_OFFSET_HONOR_KILL]; ?></td>
						<td width="6%">
						<?php
						if (!empty($equiped_items[10][1])) echo maketooltip("<img src=\"{$equiped_items[10][1]}\" class=\"{$equiped_items[10][2]}\" alt=\"\" />", "$item_datasite{$EQU_GLOVES}", $equiped_items[10][0], "item_tooltip", "target=\"_blank\"");
      else echo "<img src=\"images/armurerie/$template_icons/hands.gif\" class=\"icon_border_0\" alt=\"\" />";
						?>
						</td>
					</tr>
					<tr>
						<td><?php 
						if (!empty($equiped_items[2][1])) echo maketooltip("<img src=\"{$equiped_items[2][1]}\" class=\"{$equiped_items[2][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_NECK]}", $equiped_items[2][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/neck.gif\" class=\"icon_border_0\" alt=\"\" />";
						?></td>
						<td class="half_line" colspan="2">
							<img src="images/talents/<?php echo  $talentIcon; ?>.gif">
							<?php echo htmlentities($mainTree['name']) ; ?><br>
							<?php echo "".$arbreTalent[0]." / ".$arbreTalent[1]." / ".$arbreTalent[2]."" ; ?>
						</td>
						<td class="half_line" colspan="2" rowspan="4" align="center">
							<div class="gradient_p">
								<?php echo $lang_armurerie['holy']; ?> :<br />
								<?php echo $lang_armurerie['arcane']; ?> :<br />
								<?php echo $lang_armurerie['fire']; ?> :<br />
								<?php echo $lang_armurerie['nature']; ?> :<br />
								<?php echo $lang_armurerie['frost']; ?> :<br />
								<?php echo $lang_armurerie['shadow']; ?> :
							</div>
							<div class="gradient_pp">
								<?php echo $char_data[CHAR_DATA_OFFSET_RES_HOLY]; ?><br />
								<?php echo $char_data[CHAR_DATA_OFFSET_RES_ARCANE]; ?><br />
								<?php echo $char_data[CHAR_DATA_OFFSET_RES_FIRE]; ?><br />
								<?php echo $char_data[CHAR_DATA_OFFSET_RES_NATURE]; ?><br />
								<?php echo $char_data[CHAR_DATA_OFFSET_RES_FROST]; ?><br />
								<?php echo $char_data[CHAR_DATA_OFFSET_RES_SHADOW]; ?>
							</div>
						</td>
						<td><?php
						if (!empty($equiped_items[6][1])) echo maketooltip("<img src=\"{$equiped_items[6][1]}\" class=\"{$equiped_items[6][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_BELT]}", $equiped_items[6][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/waist.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
					</tr>
					<tr>
						<td><?php 
						if (!empty($equiped_items[3][1])) echo maketooltip("<img src=\"{$equiped_items[3][1]}\" class=\"{$equiped_items[3][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_SHOULDER]}", $equiped_items[3][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/shoulders.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
						<td class="half_line" colspan="2" rowspan="3" align="center">
							<div class="profs">
								<div class="prof1">
									<h4><div class="profImage"><img src="<?php echo $primary_prof_array['icon']; ?>">
									<?php echo $primary_prof_array['name']; ?></h4></div>
									<div class="bar-container">
									<img class="ieimg" height="1" src="http://eu.wowarmory.com/images/pixel.gif" width="1"><b style=" width: <?php echo $primary_prof_array['percent']; ?>%"></b><span><?php echo $primary_prof_array['skillCurrent']; ?> / <?php echo $primary_prof_array['skillMax']; ?></span>
									</div>
								</div>
								<div class="prof1">
								<h4><img src="<?php echo $secondary_prof_array['icon']; ?>">
								<?php echo $secondary_prof_array['name']; ?></h4></div>
								<div class="bar-container">
								<img class="ieimg" height="1" src="http://eu.wowarmory.com/images/pixel.gif" width="1"><b style=" width: <?php echo $secondary_prof_array['percent']; ?>%"></b><span><?php echo $secondary_prof_array['skillCurrent']; ?> / <?php echo $secondary_prof_array['skillMax']; ?></span>
								</div>
							</div>
						</td>
						<td><?php 
						if (!empty($equiped_items[7][1])) echo maketooltip("<img src=\"{$equiped_items[7][1]}\" class=\"{$equiped_items[7][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_LEGS]}", $equiped_items[7][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/legs.gif\" class=\"icon_border_0\" alt=\"\" />";
						?></td>
					</tr>
					<tr>
						<td><?php 
						if (!empty($equiped_items[15][1])) echo maketooltip("<img src=\"{$equiped_items[15][1]}\" class=\"{$equiped_items[15][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_BACK]}", $equiped_items[15][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/back.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
						<td><?php 
						if (!empty($equiped_items[8][1])) echo maketooltip("<img src=\"{$equiped_items[8][1]}\" class=\"{$equiped_items[8][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_FEET]}", $equiped_items[8][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/feet.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
					</tr>
					<tr>
						<td><?php 
						if (!empty($equiped_items[5][1])) echo maketooltip("<img src=\"{$equiped_items[5][1]}\" class=\"{$equiped_items[5][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_CHEST]}", $equiped_items[5][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/chest.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
						<td><?php 
						if (!empty($equiped_items[11][1])) echo maketooltip("<img src=\"{$equiped_items[11][1]}\" class=\"{$equiped_items[11][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_FINGER1]}", $equiped_items[11][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/finger.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
					</tr>
					<tr>
						<td width="6%"><?php 
						if (!empty($equiped_items[4][1])) echo maketooltip("<img src=\"{$equiped_items[4][1]}\" class=\"{$equiped_items[4][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_SHIRT]}", $equiped_items[4][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/shirt.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
						<td class="half_line" colspan="4" align="center">
							<div class="bar-life">
								<img class="ieimg" height="1" src="http://eu.wowarmory.com/images/pixel.gif" width="1">
								<b style=" width: <?php echo $char_data[CHAR_DATA_OFFSET_HEALTH]*100/$char_data[CHAR_DATA_OFFSET_HEALTH_MAX]; ?>%"></b>
								<span>Vie : <?php echo $char_data[CHAR_DATA_OFFSET_HEALTH]; ?> / <?php echo $char_data[CHAR_DATA_OFFSET_HEALTH_MAX]; ?></span>
							</div>
							
							<?php
							if ((Securite::bdd($donnees['class'])) == 1)
							{
								?>
								<div class="bar-rage">
								<img class="ieimg" height="1" src="http://eu.wowarmory.com/images/pixel.gif" width="1">
								<b style=" width: <?php echo $char_data[CHAR_DATA_OFFSET_RAGE]*100/$char_data[CHAR_DATA_OFFSET_RAGE_MAX]; ?>%"></b>
								<span>Rage : <?php echo $char_data[CHAR_DATA_OFFSET_RAGE]; ?> / <?php echo $char_data[CHAR_DATA_OFFSET_RAGE_MAX]; ?></span>
								</div>
								<?php
							}
							elseif (($donnees['class']) == 4)
							{
								?>
								<div class="bar-ener">
								<img class="ieimg" height="1" src="http://eu.wowarmory.com/images/pixel.gif" width="1">
								<b style=" width: <?php echo $char_data[CHAR_DATA_OFFSET_ENER]*100/$char_data[CHAR_DATA_OFFSET_ENER_MAX]; ?>%"></b>
								<span>Energie : <?php echo $char_data[CHAR_DATA_OFFSET_ENER]; ?> / <?php echo $char_data[CHAR_DATA_OFFSET_ENER_MAX]; ?></span>
								</div>
								<?php
							}
							elseif (($donnees['class']) == 6)
							{
								?>
								<div class="bar-runic">
								<img class="ieimg" height="1" src="http://eu.wowarmory.com/images/pixel.gif" width="1">
								<b style=" width: <?php echo $char_data[CHAR_DATA_OFFSET_RUNI]*100/$char_data[CHAR_DATA_OFFSET_RUNI_MAX]; ?>%"></b>
								<span>P. Runique : <?php echo $char_data[CHAR_DATA_OFFSET_RUNI]; ?> / <?php echo $char_data[CHAR_DATA_OFFSET_RUNI_MAX]; ?></span>
								</div>
								<?php
							}
							elseif ((Securite::bdd($donnees['class'])) == 2 || (Securite::bdd($donnees['class'])) == 3 || (Securite::bdd($donnees['class'])) == 5 || (Securite::bdd($donnees['class'])) == 7 || (Securite::bdd($donnees['class'])) == 8 || (Securite::bdd($donnees['class'])) == 9 || (Securite::bdd($donnees['class'])) == 11)
							{
								?>
								<div class="bar-mana">
								<img class="ieimg" height="1" src="http://eu.wowarmory.com/images/pixel.gif" width="1">
								<b style=" width: <?php echo $char_data[CHAR_DATA_OFFSET_MANA]*100/$char_data[CHAR_DATA_OFFSET_MANA_MAX]; ?>%"></b>
								<span>Mana : <?php echo $char_data[CHAR_DATA_OFFSET_MANA]; ?> / <?php echo $char_data[CHAR_DATA_OFFSET_MANA_MAX]; ?></span>
								</div>
								<?php
							}
							
							if ($char_data[CHAR_DATA_OFFSET_LEVEL] >= $level_max)
							{
								echo "";
							}
							else
							{
								?>
								<div class="bar-exp">
									<img class="ieimg" height="1" src="http://eu.wowarmory.com/images/pixel.gif" width="1">
									<b style=" width: <?php echo $char_data[CHAR_DATA_OFFSET_EXP]*100/$char_data[CHAR_DATA_OFFSET_EXP_TOTAL]; ?>%"></b>
									<span>Experience : <?php echo $char_data[CHAR_DATA_OFFSET_EXP]; ?> / <?php echo $char_data[CHAR_DATA_OFFSET_EXP_TOTAL]; ?></span>
								</div>
								<?php
							}
							?>
						</td>
						<td width="6%"><?php 
						if (!empty($equiped_items[12][1])) echo maketooltip("<img src=\"{$equiped_items[12][1]}\" class=\"{$equiped_items[12][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_FINGER2]}", $equiped_items[12][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/finger.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
					</tr>
					<tr>
						<td><?php 
						if (!empty($equiped_items[19][1])) echo maketooltip("<img src=\"{$equiped_items[19][1]}\" class=\"{$equiped_items[19][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_TABARD]}", $equiped_items[19][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/tabard.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
						<td id="form_caract_1" class="half_line" colspan="2" rowspan="2" align="center">
							<div align="center">
								<form name="menu">
									<select id="select_option_1" name="popup" size="1">
										<option value="1" selected="selected"><?php echo $lang_armurerie['characteristic']; ?></option>
										<option value="2"><?php echo $lang_armurerie['melee']; ?></option>
										<option value="3"><?php echo $lang_armurerie['distance']; ?></option>
										<option value="4"><?php echo $lang_armurerie['sortilege']; ?></option>
										<option value="5"><?php echo $lang_armurerie['defenses']; ?></option>
									</select>	
								</form>
							</div>
							<div class="gradient_p" id="opt_carac_1"></div>
							<div class="gradient_pp" id="opt_val_1"></div>
						</td>
						<td id="form_caract_2" class="half_line" colspan="2" rowspan="2" align="center">
							<div align="center">
								<form name="menu">
									<select id="select_option_2" name="popup" size="1">
										<option value="1"><?php echo $lang_armurerie['characteristic']; ?></option>
										<option value="2" selected="selected"><?php echo $lang_armurerie['melee']; ?></option>
										<option value="3"><?php echo $lang_armurerie['distance']; ?></option>
										<option value="4"><?php echo $lang_armurerie['sortilege']; ?></option>
										<option value="5"><?php echo $lang_armurerie['defenses']; ?></option>
									</select>	
								</form>
							</div>
							<div class="gradient_p" id="opt_carac_2"></div>
							<div class="gradient_pp" id="opt_val_2"></div>
						</td>
						<td><?php 
						if (!empty($equiped_items[13][1])) echo maketooltip("<img src=\"{$equiped_items[13][1]}\" class=\"{$equiped_items[13][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_TRINKET1]}", $equiped_items[13][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/trinket.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
					</tr>
					<tr>
						<td><?php 
						if (!empty($equiped_items[9][1])) echo maketooltip("<img src=\"{$equiped_items[9][1]}\" class=\"{$equiped_items[9][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_WRIST]}", $equiped_items[9][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/wrist.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
						<td><?php 
						if (!empty($equiped_items[14][1])) echo maketooltip("<img src=\"{$equiped_items[14][1]}\" class=\"{$equiped_items[14][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_TRINKET2]}", $equiped_items[14][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/trinket.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
					</tr>
					<tr>
						<td></td>
						<td width="15%"><?php 
						if (!empty($equiped_items[16][1])) echo maketooltip("<img src=\"{$equiped_items[16][1]}\" class=\"{$equiped_items[16][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_MAIN_HAND]}", $equiped_items[16][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/mainhand.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
						<td width="15%"><?php 
						if (!empty($equiped_items[17][1])) echo maketooltip("<img src=\"{$equiped_items[17][1]}\" class=\"{$equiped_items[17][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_OFF_HAND]}", $equiped_items[17][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/offhand.gif\" class=\"icon_border_0\" alt=\"\" />"; 
						?></td>
						<td width="15%"><?php 
						if (!empty($equiped_items[18][1])) echo maketooltip("<img src=\"{$equiped_items[18][1]}\" class=\"{$equiped_items[18][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_RANGED]}", $equiped_items[18][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/ranged.gif\" class=\"icon_border_0\" alt=\"\" />";
						?></td>
						<td width="15%"><?php  
						if (!empty($equiped_items[20][1])) echo maketooltip("<img src=\"{$equiped_items[20][1]}\" class=\"{$equiped_items[20][2]}\" alt=\"\" />", "$item_datasite{$char_data[CHAR_DATA_OFFSET_EQU_PROJECT]}", $equiped_items[20][0], "item_tooltip", "target=\"_blank\"");
						else echo "<img src=\"images/armurerie/$template_icons/ranged.gif\" class=\"icon_border_0\" alt=\"\" />";
						?></td>
						<td></td>
					</tr>
				</table>
				<table class="lined2">
					<tr>
						<td>
							<br /><br />
							<table class="lined" align="center" style="width: 280px;">
								<tr>
									<td>
										<form class="recherche" method="$_POST">
										<p><b><?php echo $lang_armurerie['character_name'] ?></b></p>
										<input type="text" name="perso" value="Entrez le nom du personnage" size="30" onFocus="javascript:this.value=''" />
										<input type="submit" value="<?php echo $lang_site['search'] ?>" />
										</form>
									</td>
								</tr>
							</table>
							<br /><br />
							<table class="lined" style="width: 550px;">
								<tr>
									<th colspan="3"><?php echo $lang_armurerie['arene'] ?></th>
								</tr>
								<tr>
									<td><?php echo $lang_armurerie['2c2'] ?></td>
									<td><?php echo $lang_armurerie['3c3'] ?></td>
									<td><?php echo $lang_armurerie['5c5'] ?></td>
								</tr>
								<tr>
									<td><?php echo "COTE: ".$char_data[CHAR_DATA_OFFSET_ARENA_TEAM_ID_2v2]."";?></td>
									<td><?php echo "COTE: ".$char_data[CHAR_DATA_OFFSET_ARENA_TEAM_ID_3v3]."";?></td>
									<td><?php echo "COTE: ".$char_data[CHAR_DATA_OFFSET_ARENA_TEAM_ID_5v5]."";?></td>
								</tr>
							</table>
						</td>
					</tr>
				</table>
				</center>
			</td>
		</tr>
	</table>
	
<!-- DEBUT DU SCRIPT MENU DEROULANT-->
<script language="javascript" type="text/javascript">
var tab_carac = new Array();
tab_carac[1] = new Array(); //GENERAL
tab_carac[1]['Force'] = '<?php echo $char_data[CHAR_DATA_OFFSET_STR]; ?>';//ok
tab_carac[1]['Agilité'] = '<?php echo $char_data[CHAR_DATA_OFFSET_AGI]; ?>';//ok
tab_carac[1]['Endurance'] = '<?php echo $char_data[CHAR_DATA_OFFSET_STA]; ?>';//ok
tab_carac[1]['Intelligence'] = '<?php echo $char_data[CHAR_DATA_OFFSET_INT]; ?>';//ok
tab_carac[1]['Esprit'] = '<?php echo $char_data[CHAR_DATA_OFFSET_SPI]; ?>';//ok
tab_carac[1]['Armure'] = '<?php echo $char_data[CHAR_DATA_OFFSET_ARMOR]; ?>';//ok

tab_carac[2] = new Array(); //MELEE
tab_carac[2]['Dégâts'] = '<?php echo "".pourcent0($char_data[CHAR_DATA_OFFSET_MINDAMAGE])." - ".pourcent0($char_data[CHAR_DATA_OFFSET_MAXDAMAGE]).""; ?>';//ok
tab_carac[2]['Vitesse'] = '<?php echo pourcent2($char_data[CHAR_DATA_OFFSET_BASEATTACKTIME])/1000; ?>';//ok
tab_carac[2]['Puissance'] = '<?php echo $char_data[CHAR_DATA_OFFSET_AP] + $char_data[CHAR_DATA_OFFSET_AP_BON]; ?>';//ok
tab_carac[2]['Sc. toucher'] = '<?php echo $char_data[CHAR_DATA_OFFSET_TOUCHE_MEL]; ?>';//ok
tab_carac[2]['Critiques'] = '<?php echo pourcent2($char_data[CHAR_DATA_OFFSET_CRIT]).'%'; ?>';//ok
tab_carac[2]['Expertise'] = '<?php echo $char_data[CHAR_DATA_OFFSET_EXPER]; ?>';//ok

tab_carac[3] = new Array(); //DISTANCE
tab_carac[3]['Dégâts'] = '<?php echo "".pourcent0($char_data[CHAR_DATA_OFFSET_MINRANGEDDAMAGE])." - ".pourcent0($char_data[CHAR_DATA_OFFSET_MAXRANGEDDAMAGE]).""; ?>';//ok
tab_carac[3]['Vitesse'] = '<?php echo pourcent2($char_data[CHAR_DATA_OFFSET_RANGEDATTACKTIME])/1000; ?>';//ok
tab_carac[3]['Puissance'] = '<?php echo $char_data[CHAR_DATA_OFFSET_RANGED_AP] + $char_data[CHAR_DATA_OFFSET_RANGED_AP_BON]; ?>';//ok
tab_carac[3]['Sc. toucher'] = '<?php echo $char_data[CHAR_DATA_OFFSET_TOUCHE_DIST]; ?>';//ok
tab_carac[3]['Critiques'] = '<?php echo pourcent2($char_data[CHAR_DATA_OFFSET_SPELL_CRIT_PER]).'%'; ?>';//ok

tab_carac[4] = new Array(); //SORTILEGE
tab_carac[4]['Bon. dégâts'] = '<?php echo $char_data[CHAR_DATA_OFFSET_BONU_DEGA]; ?>';//ok
tab_carac[4]['Bon. soins'] = '<?php echo $char_data[CHAR_DATA_OFFSET_BONU_SOINS]; ?>';//ok
tab_carac[4]['Sc. toucher'] = '<?php echo $char_data[CHAR_DATA_OFFSET_TOUCHE_SORT]; ?>';//ok
tab_carac[4]['Critiques'] = '<?php echo pourcent2($char_data[CHAR_DATA_OFFSET_CRIT_SORT]). '%'; ?>';//ok
tab_carac[4]['Score de hâte'] = 'Bientôt';//a voir
tab_carac[4]['Régén. mana'] = '<?php echo "Bientôt"; ?>';//a voir

tab_carac[5] = new Array(); //DEFENSE
tab_carac[5]['Armure'] = '<?php echo $char_data[CHAR_DATA_OFFSET_ARMOR]; ?>';//ok
tab_carac[5]['<?php echo $lang_armurerie['defense']; ?>'] = '<?php echo "Bientôt"; ?>';
tab_carac[5]['Esquive'] = '<?php echo "".pourcent2($char_data[CHAR_DATA_OFFSET_DODGE])."%"; ?>';//ok
tab_carac[5]['Parade'] = '<?php echo "".pourcent2($char_data[CHAR_DATA_OFFSET_PARRY])."%"; ?>';//ok
tab_carac[5]['Blocage'] = '<?php echo "".pourcent2($char_data[CHAR_DATA_OFFSET_BLOCK])."%"; ?>';//ok
tab_carac[5]['Résillience'] = '<?php echo $char_data[CHAR_DATA_OFFSET_RESIL]; ?>';//ok

window.onload = init;
var tab_height = new Array();
var carac_show = 0;

function removeAllChild(balise){
	while(balise && balise.hasChildNodes()){
		balise.removeChild(balise.firstChild);
	}
}

function init(){
  var select_option_1 = document.getElementById("select_option_1");
  var select_option_2 = document.getElementById("select_option_2");
  select_option_1.onchange = change_site;
  select_option_2.onchange = change_site;
  change_site();
}

function change_site() {  
  if(carac_show != 0){
    var option = this.options[this.selectedIndex].value;
    var form_id = this.id.substr(this.id.length-1, 1);
    show(form_id, option);
    divshow = option;
  }else{
    show(1, 1);
    show(2, 2);
    carac_show = 1;
  }
}

function show(divtoshow, caractoshow){
	var opt_carac = document.getElementById("opt_carac_"+divtoshow);
	var opt_val = document.getElementById("opt_val_"+divtoshow);
	removeAllChild(opt_carac);
	removeAllChild(opt_val);
	for (prop in tab_carac[caractoshow]) {
      		opt_carac.appendChild(document.createTextNode(prop+' :'));
		opt_carac.appendChild(document.createElement('br'));
		opt_val.appendChild(document.createTextNode(tab_carac[caractoshow][prop]));
		opt_val.appendChild(document.createElement('br'));
	}
}
</script>
<!-- FIN DU SCRIPT MENU DEROULANT-->



<?php
			}
	}
	else  //Si il y a rien à enregistrer
	{
		echo "<p>Erreur !!!</p>";
		echo "<p><a href=\"index.php\">Retour</a></p>";
	}
}
require("themes/footer_theme.php");
require_once("footer_simple.php");

//systeme de mise en cache de la page (partie2)
$pointeur = @fopen($fichier_cache, 'w');
@fwrite($pointeur, ob_get_contents());
@fclose($pointeur);
ob_end_flush();
//fin de la mise en cache fin (partie2)
?>
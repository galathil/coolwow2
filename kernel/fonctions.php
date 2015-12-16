<?php
require("defines/$client.php");
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());

function bouton($xtext, $xlink, $xwidth)
{
	echo "<div><a class=\"button\" style=\"width:".$xwidth."px;\" href=\"$xlink\">$xtext</a></div>";
}

function royaume($id)
{
	require("config.php");
	mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
	mysql_select_db($realmd['db']) or die(mysql_error());
	$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM realmlist WHERE id=".$id."") or die(mysql_error());
	$donnees = mysql_fetch_array($reponse,MYSQL_ASSOC);
	mysql_close();
	if($donnees['nombre'] == 1){
		return $id;
	}
	else{
		return 1;
	}
}

function shell($com)
{
	require("config.php");
	if (isset($com))
	{
		$telnet = @fsockopen($shell['host'], $shell['port'], $errno, $errstr, 3);
		if ($telnet)
		{
			fgets($telnet,1024);
			fputs($telnet, "USER ".$shell['user']."\n");
			sleep(1);
			fputs($telnet, "PASS ".$shell['password']."\n");
			sleep(1);
			fputs($telnet, "$com\n");
			fclose($telnet);
			return 1;
		}
		else
		{
			echo "<p>Erreur</p>";
			return 0;
		}
	}
	else 
	{
		echo "<p>Entrez une commande</p>";
	}
}

function cryptme($nbr)
{
	$str = "";
	$chaine = "ABCDEFGHIJKLMNOPQRSTUVWXYabcdefghijklmnpqrstuvwxy0123456789";
	srand((double)microtime()*1000000);
	for($i=0; $i<$nbr; $i++) 
	{
		$str .= $chaine[rand()%strlen($chaine)];
	}
	return $str;
}

function login($login)
{
	require("config.php");
	if (isset($_SESSION['auth']) && isset($_SESSION['username']) && isset($_SESSION['id']))
	{
		$username = Securite::bdd($_SESSION['username']);
		$membre_id = Securite::bdd($_SESSION['id']);
	}
	else
	{
		$_SESSION['username'] = "invité";
		$_SESSION['auth'] = "no";
		$_SESSION['gmlevel'] = "-1";
		$_SESSION['id'] = "0";
		$_SESSION['lang'] = $language;
		$username = "invité";
		$auth = "no";
		$membre_id = "0";
	}
}

function redirect($url)
{
	if ( strpos($_SERVER['SERVER_SOFTWARE'], 'Microsoft-IIS') === false )
	{
		die('<meta http-equiv="refresh" content="0;URL='.$url.'" />');
	} 
	else 
	{
		die('<meta http-equiv="refresh" content="0;URL='.$url.'" />');
	}
}

class Securite
{
	public static function get($string)
	{
		// On regarde si le type de string est un nombre entier (int)
		if(empty($string))
		{
			$string = 1;
		}
		elseif(ctype_digit($string))
		{
			$string = intval($string);
		}
		// Pour tous les autres types
		else
		{
			$string = 1;
		}
		return $string;
	}
	// Données entrantes
	public static function bdd($string)
	{
		// On regarde si le type de string est un nombre entier (int)
		if(ctype_digit($string))
		{
			$string = intval($string);
		}
		// Pour tous les autres types
		else
		{
			$string = mysql_real_escape_string($string);
			$string = htmlentities($string, ENT_QUOTES, 'UTF-8'); // transformer les catacteres spéciaux en html
		}
		return $string;
	}
	// Données sortantes
	public static function html($string)
	{
		$string = stripcslashes($string); // supprime les antislach
		return $string;
	}

	public static function html_edit($string)
	{
		//$string = html_entity_decode($string); //fait l'invers de htmlentities
		//$string = stripcslashes($string); // supprime les antislach
		return $string;
	}	
}
	
// génération d'un nouveau token pour les failles XSRF
$date = date("Y-m-d H:i:s");
	
function generate_xsrf_token()
{
    $_SESSION['token_xsrf'] = sha1( $date.$security_key.mt_rand() );
}
	 
// vérification du token XRSF
function verify_xsrf_token()
{
    if( ! (!empty($_SESSION['token_xsrf']) AND !empty($_POST['token_xsrf']) AND $_SESSION['token_xsrf']==$_POST['token_xsrf']) )
    {
        redirect("erreur.php?err=invalide_formulaire");
    }
	else
	{
		$_SESSION['token_xsrf'] = array();
	}
}

//pagination
function pagination($ParPage, $total, $truc, $adresse)
{
	$max_pg = ceil($total / $ParPage); //le nombre de page maximum...en partant de 1
	$page_test = $truc; //la page que je suis rendu actuellement dans l;'affichage
	$nb = 9; //le nombre de résultats pour l'affichage TOUJOUR UN NOMBRE IMPERE.
	$nbm = ( $nb - 1 ) / 2;
	if (empty($page_test))
	{
		$page = 1;
	}
	else
	{
		$page = $page_test;
	}
	if ($max_pg == 1)
	{
		//echo "Page 1 sur 1";
	}
	else
	{
		echo "<p><font size=\"-1\">Pages ".$page." sur ".($max_pg)."</font><br />";
		if ($nb > $max_pg) // Si moin de page que le nombre de résultats pour l'affichage
		{
			echo ($page !=1 ) ? '<a href="'.$adresse.'&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
			for($i = 1 ; $i < $max_pg+1 ; $i++)
			{
				if($i == $page)
				{
					echo ' <b><a>'.$i.'</a></b>';
				}
				else
				{
					echo ' <a href="'.$adresse.'&page='.$i.'">'.$i.'</a>';
				}
			}
			echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="'.$adresse.'&page='.($page+1).'">Suivante --></a>' : '';
		}
		elseif ($page <= $nbm) // les premieres pages
		{
			echo ($page !=1 ) ? '<a href="'.$adresse.'&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
			for($i = 1 ; $i < $nb+1 ; $i++)
			{
				if($i == $page)
				{
					echo ' <b><a>'.$i.'</a></b>';
				}
				else
				{
					echo ' <a href="'.$adresse.'&page='.$i.'">'.$i.'</a>';
				}
			}
			echo ' ...<a href="'.$adresse.'&page='.$max_pg.'">'.$max_pg.'</a>';
			echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="'.$adresse.'&page='.($page+1).'">Suivante --></a>' : '';
		}
		elseif ($page >= $max_pg - $nbm) // les dernieres pages
		{
			echo ($page !=1 ) ? '<a href="'.$adresse.'&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
			echo '<a href="'.$adresse.'&page=1">1</a>... ';
			for($i = $max_pg-($nb-1) ; $i < $max_pg+1 ; $i++)
			{
				if($i == $page)
				{
					echo ' <b><a>'.$i.'</a></b>';
				}
				else
				{
					echo ' <a href="'.$adresse.'&page='.$i.'">'.$i.'</a>';
				}
			}
			echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="'.$adresse.'&page='.($page+1).'">Suivante --></a>' : '';
		}
		else // les autres pages
		{
			echo ($page !=1 ) ? '<a href="'.$adresse.'&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
			echo '<a href="'.$adresse.'&page=1">1</a>... ';
			for($i = 1 ; $i < $nbm+1 ; $i++)
			{
				$i_page = $page - ($nbm+1) + $i;
				echo ' <a href="'.$adresse.'&page='.$i_page.'">'.$i_page.'</a>';
			}
			echo ' <b><a>'.$page.'</a></b>';
			for($i = 1 ; $i < $nbm+1 ; $i++)
			{
				$i_page = $page + $i;
				echo ' <a href="'.$adresse.'&page='.$i_page.'">'.$i_page.'</a>';
			}
			echo ' ...<a href="'.$adresse.'&page='.$max_pg.'">'.$max_pg.'</a>';
			echo ($page != $max_pg-1 ) ? '&nbsp;&nbsp;<a href="'.$adresse.'&page='.($page+1).'">Suivante --></a>' : '';
		}
	}
}

$character_race = Array(
	1 => $lang_race['Humain'],
	2 => $lang_race['Orc'],
	3 => $lang_race['Dwarf'],
	4 => $lang_race['Night Elf'],
	5 => $lang_race['Undead'],
	6 => $lang_race['Tauren'],
	7 => $lang_race['Gnome'],
	8 => $lang_race['Troll'],
	9 => $lang_race['Goblin'],
	10 => $lang_race['Blood Elf'],
	11 => $lang_race['Drenai']
);
	
$character_class = Array(
	1 => $lang_class['Warrior'],
	2 => $lang_class['Paladin'],
	3 => $lang_class['Hunter'],
	4 => $lang_class['Rogue'],
	5 => $lang_class['Priest'],
	6 => $lang_class['Death Knight'],
	7 => $lang_class['Shaman'],
	8 => $lang_class['Mage'],
	9 => $lang_class['Warlock'],
	11 => $lang_class['Druid']
);

//barre d'exp
function level($OFFSET_LEVEL)
{
	if ($OFFSET_LEVEL == 70)
	{
		echo "FERMER";
	}
	else
	{
		echo "$OFFSET_EXP / $OFFSET_EXP_TOTAL";
	}
}

//foncton barre race mana energie
function baretat($id){
{
	if ($id == 1)
	{
		echo "Rage : $OFFSET_RAGE; / $OFFSET_RAGE_MAX";
	}
	elseif ($id == 4)
	{
		echo "Energie : $OFFSET_ENER / $OFFSET_ENER_MAX";
	}
	elseif ($id == 6)
	{
		echo "P. Runique : 0 / 0";
	}
	elseif ($id == 2 || ($id) == 3 || ($id) == 5 || ($id) == 7 || ($id) == 8 || ($id) == 9 || ($id) == 11)
	{
		echo "Mana : $OFFSET_MANA / $OFFSET_MANA_MAX";
	}
}
}

//foncton barre race mana energie
function portraitcaractere($id)
{
	{
		if ($id <= 10)
		{
			echo "1-10";
		}
		elseif ($id >=11 AND $id <= 69)
		{
			echo "11-69";
		}
		elseif ($id >= 70 AND $id <= 79)
		{
			echo "70";
		}
		elseif ($id >= 80)
		{
			echo "80";
		}
	}
}
//compte le nombre de requete sql
$nbquery = 0; // On déclare la variable qui sera incrémentée à chaque fois que la fonction query() sera appelée
function query($sql)
{
    global $nbquery; // dans un premier temps il faut rendre globale la variable déclarée précédemment pour pouvoir utiliser son contenu
    $nbquery++; // on ajoute 1 à la variable
    $var = mysql_query($sql)or die(mysql_error()); // on traite la requête
        return $var; // Pour finir on retourne le tout (l'erreur si il y en a une)
}

//Fonction affiche le prix
function prix($id)
{
if ($id == 0)
{
echo "Aucun";
}
else
{
$total_money = $id;
$money_gold = (int)($total_money/10000);
$total_money = $total_money - ($money_gold*10000);
$money_silver = (int)($total_money/100);
$money_cooper = $total_money - ($money_silver*100);
$money = $money_gold." <img src='images/or.gif' alt='' /> ".$money_silver." <img src='images/argent.gif' alt='' /> ".$money_cooper." <img src='images/cuivre.gif' alt='' />";
echo "$money";
}
}

// Function pour les Races
function imgrace($id)
{
if ($id == 1)
{
echo "<img src=\"images/races/1-0.gif\" alt=\"\">";
}
elseif ($id == 2)
{
echo "<img src=\"images/races/2-0.gif\" alt=\"\">";
}
elseif ($id == 3)
{
echo "<img src=\"images/races/3-0.gif\" alt=\"\">";
}
elseif ($id == 4)
{
echo "<img src=\"images/races/4-0.gif\" alt=\"\">";
}
elseif ($id == 5)
{
echo "<img src=\"images/races/5-0.gif\" alt=\"\">";
}
elseif ($id == 6)
{
echo "<img src=\"images/races/6-0.gif\" alt=\"\">";
}
elseif ($id == 7)
{
echo "<img src=\"images/races/7-0.gif\" alt=\"\">";
}
elseif ($id == 8)
{
echo "<img src=\"images/races/8-0.gif\" alt=\"\">";
}
elseif ($id == 9)
{
echo "<img src=\"images/races/9-0.gif\" alt=\"\">";
}
elseif ($id == 10)
{
echo "<img src=\"images/races/10-0.gif\" alt=\"\">";
}
elseif ($id == 11)
{
echo "<img src=\"images/races/11-0.gif\" alt=\"\">";
}
}

// Function pour les Races nom
function nomrace($id){
switch ($id){
case 1:
   echo "Humain";
   break;
case 2:
   echo "Orc";
   break;
case 3:
   echo "Nain";
   break;
case 4:
   echo "Elfe de la nuit";
   break;
case 5:
   echo "Mort-vivant";
   break;
case 6:
   echo "Tauren";
   break;
case 7:
   echo "Gnome";
   break;
case 8:
   echo "Troll";
   break;
case 9:
   echo "Gobelin";
   break;
case 10:
   echo "Elfe de Sang";
   break;
case 11:
   echo "Draeneï";
   break;
default:
    echo "Inconnu";
 }
}

// Function pour les class images
function imgclass($id)
{
if ($id == 1)
{
echo "<img src=\"images/classes/1.gif\" alt=\"\">";
}
elseif ($id == 2)
{
echo "<img src=\"images/classes/2.gif\" alt=\"\">";
}
elseif ($id == 3)
{
echo "<img src=\"images/classes/3.gif\" alt=\"\">";
}
elseif ($id == 4)
{
echo "<img src=\"images/classes/4.gif\" alt=\"\">";
}
elseif ($id == 5)
{
echo "<img src=\"images/classes/5.gif\" alt=\"\">";
}
elseif ($id == 6)
{
echo "<img src=\"images/classes/6.gif\" alt=\"\">";
}
elseif ($id == 7)
{
echo "<img src=\"images/classes/7.gif\" alt=\"\">";
}
elseif ($id == 8)
{
echo "<img src=\"images/classes/8.gif\" alt=\"\">";
}
elseif ($id == 9)
{
echo "<img src=\"images/classes/9.gif\" alt=\"\">";
}
elseif ($id == 10)
{
echo "<img src=\"images/classes/10.gif\" alt=\"\">";
}
elseif ($id == 11)
{
echo "<img src=\"images/classes/11.gif\" alt=\"\">";
}
}

// Function pour les class nom
function nomclass($id){
switch ($id){
case 1:
   echo "Guerrier";
   break;
case 2:
   echo "Paladin";
   break;
case 3:
   echo "Chasseur";
   break;
case 4:
   echo "Voleur";
   break;
case 5:
   echo "Prêtre";
   break;
case 6:
   echo "Chevalier de la mort";
   break;
case 7:
   echo "Shaman";
   break;
case 8:
   echo "Mage";
   break;
case 9:
   echo "Démoniste";
   break;
case 11:
   echo "Druide";
   break;
default:
    echo "Inconnu";
 }
}

// Function pour le side
function side($id){
if (($id) == 1 || ($id) == 3 || ($id) == 4 || ($id) == 7 || ($id) == 11) 
{ 
echo "<img src=\"images/alliance.gif\" alt=\"\">";
}
else 
{ 
echo "<img src=\"images/horde.gif\" alt=\"\">";
}
}

// Function pour le nom de side
function nomside($id){
if (($id) == 1 || ($id) == 3 || ($id) == 4 || ($id) == 7 || ($id) == 11) 
{ 
echo "alliance";
}
else 
{ 
echo "horde";
}
}

// Function pour le nom de side
function nomside2($id){
if (($id) == 1 || ($id) == 3 || ($id) == 4 || ($id) == 7 || ($id) == 11) 
{ 
echo "0";
}
else 
{ 
echo "1";
}
}

//Fonction affiche le non de l'enchèreur
function sex($id)
{
if ($id == 0)
{
echo "<img src=\"images/male.gif\" alt=\"\">";
}
else
{
echo "<img src=\"images/female.gif\" alt=\"\">";
}
}

//Fonction pour les point d'honneur.
class honor_system
{

	function get_character_honor($char_id)
	{
    global $hostr, $userr, $passwordr, $db, $dbr, $dbc, $database_encoding;
    $mangos_db = new DBLayer($hostr, $userr, $passwordr, $dbc);
		$query = $mangos_db->query("SELECT * FROM `character_kill` WHERE `guid`='$char_id'");
		while($res_row = $mangos_db->fetch_assoc($query))
		{
				$honor += $res_row['honor'];
		}
		$mangos_db->close();
		return $honor;
	}

	function calc_character_rank($honor_points)
	{
		$rank = 0;
		if($honor_points <= 0){
			$rank = 0;
		}
		else{
			if($honor_points < 2000 and $honor_points >= 150) $rank = 1;
			else if($honor_points < 5000 and $honor_points >= 2000) $rank = 2;
			else if($honor_points >= 5000 and $honor_points < 65000) $rank = round(($honor_points / 5000) + 2,0);
			else if($honor_points >= 65000) $rank=15; 
		}
		return $rank;
	}
}

//fonction pour le rang des perso.
function calc_character_rank($honor_points)
{
	if($honor_points < 150 and $honor_points >= 0)
	{
	echo "rank0";
	}
	elseif ($honor_points < 2000 and $honor_points >= 150)
	{
	echo "rank1";
	}
	elseif ($honor_points < 5000 and $honor_points >= 2000)
	{
	echo "rank2";
	}
	elseif ($honor_points >= 5000 and $honor_points < 65000)
	{
	$lvl=round(($honor_points / 5000) + 2,0);
	echo "rank$lvl";
	}
	elseif ($honor_points >= 65000)
	{
	echo "rank15";
	}
}

//skill
$skill = Array(
	762 => $lang_id_tab['SKILL_RIDING'],
	759 => $lang_id_tab['SKILL_LANG_DRAENEI'],
	755 => $lang_id_tab['SKILL_JEWELCRAFTING'],
	754 => $lang_id_tab['human'],
	713 => $lang_id_tab['SKILL_RIDING_KODO'],
	673 => $lang_id_tab['SKILL_LANG_GUTTERSPEAK'],
	633 => $lang_id_tab['SKILL_LOCKPICKING'],
	613 => $lang_id_tab['SKILL_DISCIPLINE'],
	594 => $lang_id_tab['SKILL_HOLY'],
	593 => $lang_id_tab['SKILL_DESTRUCTION'],
	574 => $lang_id_tab['SKILL_BALANCE'],
	554 => $lang_id_tab['SKILL_RIDING_UNDEAD_HORSE'],
	553 => $lang_id_tab['SKILL_RIDING_MECHANOSTRIDER'],
	533 => $lang_id_tab['SKILL_RIDING_RAPTOR'],
	473 => $lang_id_tab['SKILL_FIST_WEAPONS'],
	433 => $lang_id_tab['SKILL_SHIELD'],
	415 => $lang_id_tab['SKILL_CLOTH'],
	414 => $lang_id_tab['SKILL_LEATHER'],
	413 => $lang_id_tab['SKILL_MAIL'],
	393 => $lang_id_tab['SKILL_SKINNING'],
	375 => $lang_id_tab['SKILL_ELEMENTAL_COMBAT'],
	374 => $lang_id_tab['SKILL_RESTORATION'],
	373 => $lang_id_tab['SKILL_ENHANCEMENT'],
	356 => $lang_id_tab['SKILL_FISHING'],
	355 => $lang_id_tab['SKILL_AFFLICTION'],
	354 => $lang_id_tab['SKILL_DEMONOLOGY'],
	333 => $lang_id_tab['SKILL_ENCHANTING'],
	315 => $lang_id_tab['SKILL_LANG_TROLL'],
	313 => $lang_id_tab['SKILL_LANG_GNOMISH'],
	293 => $lang_id_tab['SKILL_PLATE_MAIL'],
	270 => $lang_id_tab['SKILL_PET_TALENTS'],
	267 => $lang_id_tab['SKILL_UNKNOWN'],
	261 => $lang_id_tab['SKILL_BEAST_TRAINING'],
	257 => $lang_id_tab['SKILL_PROTECTION'],
	256 => $lang_id_tab['SKILL_FURY'],
	253 => $lang_id_tab['SKILL_ASSASSINATION'],
	237 => $lang_id_tab['SKILL_ARCANE'],
	229 => $lang_id_tab['SKILL_POLEARMS'],
	228 => $lang_id_tab['SKILL_WANDS'],
	227 => $lang_id_tab['SKILL_SPEARS'],
	226 => $lang_id_tab['SKILL_CROSSBOWS'],
	222 => $lang_id_tab['SKILL_WEAPON_TALENTS'],
	202 => $lang_id_tab['SKILL_ENGINERING'],
	197 => $lang_id_tab['SKILL_TAILORING'],
	186 => $lang_id_tab['SKILL_MINING'],
	185 => $lang_id_tab['SKILL_COOKING'],
	184 => $lang_id_tab['SKILL_RETRIBUTION'],
	182 => $lang_id_tab['SKILL_HERBALISM'],
	176 => $lang_id_tab['SKILL_THROWN'],
	173 => $lang_id_tab['SKILL_DAGGERS'],
	172 => $lang_id_tab['SKILL_2H_AXES'],
	171 => $lang_id_tab['SKILL_ALCHEMY'],
	165 => $lang_id_tab['SKILL_LEATHERWORKING'],
	164 => $lang_id_tab['SKILL_BLACKSMITHING'],
	163 => $lang_id_tab['SKILL_MARKSMANSHIP'],
	162 => $lang_id_tab['SKILL_UNARMED'],
	160 => $lang_id_tab['SKILL_2H_MACES'],
	150 => $lang_id_tab['SKILL_RIDING_TIGER'],
	152 => $lang_id_tab['SKILL_RIDING_RAM'],
	149 => $lang_id_tab['SKILL_RIDING_WOLF'],
	148 => $lang_id_tab['SKILL_RIDING_HORSE'],
	141 => $lang_id_tab['SKILL_LANG_OLD_TONGUE'],
	140 => $lang_id_tab['SKILL_LANG_TITAN'],
	139 => $lang_id_tab['SKILL_LANG_DEMON_TONGUE'],
	138 => $lang_id_tab['SKILL_LANG_DRACONIC'],
	137 => $lang_id_tab['SKILL_LANG_THALASSIAN'],
	136 => $lang_id_tab['SKILL_STAVES'],
	134 => $lang_id_tab['SKILL_FERAL_COMBAT'],
	129 => $lang_id_tab['SKILL_FIRST_AID'],
	118 => $lang_id_tab['SKILL_DUAL_WIELD'],
	115 => $lang_id_tab['SKILL_LANG_TAURAHE'],
	113 => $lang_id_tab['SKILL_LANG_DARNASSIAN'],
	111 => $lang_id_tab['SKILL_LANG_DWARVEN'],
	109 => $lang_id_tab['SKILL_LANG_ORCISH'],
	98 => $lang_id_tab['SKILL_LANG_COMMON'],
	95 => $lang_id_tab['SKILL_DEFENSE'],
	78 => $lang_id_tab['SKILL_SHADOW'],
	55 => $lang_id_tab['SKILL_2H_SWORDS'],
	56 => $lang_id_tab['SKILL_HOLY'],
	54 => $lang_id_tab['SKILL_MACES'],
	51 => $lang_id_tab['SKILL_SURVIVAL'],
	50 => $lang_id_tab['SKILL_BEAST_MASTERY'],
	46 => $lang_id_tab['SKILL_GUNS'],
	45 => $lang_id_tab['SKILL_BOWS'],
	44 => $lang_id_tab['SKILL_AXES'],
	43 => $lang_id_tab['SKILL_SWORDS'],
	40 => $lang_id_tab['SKILL_POISONS'],
	39 => $lang_id_tab['SKILL_SUBTLETY'],
	38 => $lang_id_tab['SKILL_COMBAT'],
	26 => $lang_id_tab['SKILL_ARMS'],
	8 => $lang_id_tab['SKILL_FIRE'],
	6 => $lang_id_tab['SKILL_FROST']
);


function get_player_position($x,$y,$map) {
 global $zone_530;

 $xpos = round(($x / 1000)*17.7,0);
 $ypos = round(($y / 1000)*17.7,0);
 switch ($map){
   case 1:
    $pos['x'] = 152 - $ypos;
    $pos['y'] = 259 - $xpos;
    break;
   case 0:
    $pos['x'] = 569 - $ypos;
    $pos['y'] = 175 - $xpos;
	break;
	
	case 530:
	$zone_id = 0;
	for ($i=0; $i < count($zone_530); $i++)
		if (($zone_530[$i][2] < $x) && ($zone_530[$i][3] > $x) && ($zone_530[$i][1] < $y) && ($zone_530[$i][0] > $y)){
			$zone_id =  $zone_530[$i][5];
			break;
			}
	if (($zone_id == 3525) || ($zone_id == 3557) || ($zone_id == 3524)){
		$pos['x'] = -162 - $ypos;
		$pos['y'] = 75 - $xpos;
	} else if (($zone_id == 3487) || ($zone_id == 3433) || ($zone_id == 3430)){
				$pos['x'] = 528 - $ypos;
				$pos['y'] = 218 - $xpos;
				} else {
						$pos['x'] = 484 - $ypos;
						$pos['y'] = 272 - $xpos;
				}
	break;

case 70:
    $pos['x'] = 610;
	$pos['y'] = 305;
break;
case 43:
    $pos['x'] = 190;
	$pos['y'] = 275;
break;
case 229:
	$pos['x'] = 582;
	$pos['y'] = 300;
break;
case 230:
	$pos['x'] = 582;
	$pos['y'] = 300;
break;
case 409:
	$pos['x'] = 582;
	$pos['y'] = 302;
break;
case 469:
	$pos['x'] = 582;
	$pos['y'] = 301;
break;
case 489:
    $pos['x'] = 185;
	$pos['y'] = 237;
break;
case 369:
	$pos['x'] = 582;
	$pos['y'] = 265;
break;
case 451:
	$pos['x'] = 435;
	$pos['y'] = 75;
break;
case 34:
	$pos['x'] = 560;
	$pos['y'] = 335;
break;
case 209:
   	$pos['x'] = 200;
	$pos['y'] = 370;
break;
case 35:
	$pos['x'] = 561;
	$pos['y'] = 336;
break;
case 449:
	$pos['x'] = 560;
	$pos['y'] = 335;
break;
case 47:
    $pos['x'] = 190;
	$pos['y'] = 340;
break;
case 531:
    $pos['x'] = 120;
	$pos['y'] = 410;
break;
case 509:
    $pos['x'] = 125;
	$pos['y'] = 410;
break;
case 90:
	$pos['x'] = 560;
	$pos['y'] = 270;
break;
case 389:
	$pos['x'] = 227;
	$pos['y'] = 230;
break;
case 450:
	$pos['x'] = 227;
	$pos['y'] = 228;
break;
case 533:
   	$pos['x'] = 640;
	$pos['y'] = 130;
break;
case 532:
   $pos['x'] = 605;
   $pos['y'] = 365;
break;
case 550:
   $pos['x'] = 455;
   $pos['y'] = 216;
break;
case 552:
   $pos['x'] = 455;
   $pos['y'] = 216;
break;
case 553:
   $pos['x'] = 455;
   $pos['y'] = 216;
break;
case 554:
   $pos['x'] = 455;
   $pos['y'] = 216;
break;
case 540:
   $pos['x'] = 425;
   $pos['y'] = 275;
break;
case 542:
   $pos['x'] = 425;
   $pos['y'] = 275;
break;
case 543:
   $pos['x'] = 425;
   $pos['y'] = 275;
break;
case 544:
   $pos['x'] = 425;
   $pos['y'] = 275;
break;
case 555:
   $pos['x'] = 380;
   $pos['y'] = 330;
break;
case 556:
   $pos['x'] = 380;
   $pos['y'] = 330;
break;
case 557:
   $pos['x'] = 380;
   $pos['y'] = 330;
break;
case 558:
   $pos['x'] = 380;
   $pos['y'] = 330;
break;
case 545:
   $pos['x'] = 338;
   $pos['y'] = 290;
break;
case 546:
   $pos['x'] = 338;
   $pos['y'] = 290;
break;
case 547:
   $pos['x'] = 338;
   $pos['y'] = 290;
break;
case 548:
   $pos['x'] = 338;
   $pos['y'] = 290;
break;
case 249:
   $pos['x'] = 215;
   $pos['y'] = 340;
break;
case 329:
   $pos['x'] = 630;
   $pos['y'] = 115;
break;
case 289:
   $pos['x'] = 612;
   $pos['y'] = 150;
break;
case 565:
   $pos['x'] = 375;
   $pos['y'] = 210;
break;
case 269:
   $pos['x'] = 225;
   $pos['y'] = 410;
break;
case 189:
   $pos['x'] = 580;
   $pos['y'] = 120;
break;
case 33:
   $pos['x'] = 540;
   $pos['y'] = 175;
break;
case 109:
   $pos['x'] = 640;
   $pos['y'] = 352;
break;
case 36:
   $pos['x'] = 545;
   $pos['y'] = 310;
break;
case 48:
   $pos['x'] = 135;
   $pos['y'] = 185;
break;
case 129:
    $pos['x'] = 195;
	$pos['y'] = 340;
break;
case 309:
    $pos['x'] = 605;
	$pos['y'] = 385;
break;
case 429:
    $pos['x'] = 135;
	$pos['y'] = 325;
break;
case 349:
    $pos['x'] = 100;
	$pos['y'] = 275;
break;
case 560:
   $pos['x'] = 225;
   $pos['y'] = 410;
break;
case 534:
   $pos['x'] = 225;
   $pos['y'] = 410;
break;

   default:
    $pos['x'] = -1;
    $pos['y'] = -1;
 }
 return $pos;
}
$map_id = Array(
	0 => array(0,$lang_id_tab['azeroths']),
	1 => array(1,$lang_id_tab['kalimdor']),
	13 => array(13,$lang_id_tab['test_zone']),
	17 => array(17,$lang_id_tab['kalidar']),
	30 => array(30,$lang_id_tab['alterac_valley']),
	33 => array(33,$lang_id_tab['shadowfang_keep_instance']),
	34 => array(34,$lang_id_tab['the_stockade_instance']),
	35 => array(35,$lang_id_tab['stormwind_prison']),
	36 => array(36,$lang_id_tab['deadmines_instance']),
	37 => array(37,$lang_id_tab['plains_of_snow']),
	43 => array(43,$lang_id_tab['wailing_caverns_instance']),
	44 => array(44,$lang_id_tab['monastery_interior']),
	47 => array(47,$lang_id_tab['razorfen_kraul_instance']),
	48 => array(48,$lang_id_tab['blackfathom_deeps_instance']),
	70 => array(70,$lang_id_tab['uldaman_instance']),
	90 => array(90,$lang_id_tab['gnomeregan_instance']),
	109 => array(109,$lang_id_tab['sunken_temple_instance']),
	129 => array(129,$lang_id_tab['razorfen_downs_instance']),
	150 => array(150,$lang_id_tab['outland']),
	169 => array(169,$lang_id_tab['emerald_forest']),
	189 => array(189,$lang_id_tab['scarlet_monastery_instance']),
	209 => array(209,$lang_id_tab['zul_farrak_instance']),
	229 => array(229,$lang_id_tab['blackrock_spire_instance']),
	230 => array(230,$lang_id_tab['blackrock_depths_instance']),
	249 => array(249,$lang_id_tab['onyxia_s_lair_instance']),
	269 => array(269,$lang_id_tab['cot_black_morass']),
	289 => array(289,$lang_id_tab['scholomance_instance']),
	309 => array(309,$lang_id_tab['zul_gurub_instance']),
	329 => array(329,$lang_id_tab['stratholme_instance']),
	349 => array(349,$lang_id_tab['maraudon_instance']),
	369 => array(369,$lang_id_tab['deeprun_tram']),
	389 => array(389,$lang_id_tab['ragefire_chasm_instance']),
	409 => array(409,$lang_id_tab['the_molten_core_instance']),
	429 => array(429,$lang_id_tab['dire_maul_instance']),
	449 => array(449,$lang_id_tab['alliance_pvp_barracks']),
	450 => array(450,$lang_id_tab['horde_pvp_barracks']),
	451 => array(451,$lang_id_tab['development_land']),
	469 => array(469,$lang_id_tab['blackwing_lair_instance']),
	489 => array(489,$lang_id_tab['warsong_gulch']),
	509 => array(509,$lang_id_tab['ruins_of_ahn_qiraj_instance']),
	529 => array(529,$lang_id_tab['arathi_basin']),
	530 => array(530,$lang_id_tab['outland']),
	531 => array(531,$lang_id_tab['temple_of_ahn_qiraj_instance']),
	532 => array(532,$lang_id_tab['karazahn']),
	533 => array(533,$lang_id_tab['naxxramas_instance']),
	534 => array(534,$lang_id_tab['cot_hyjal_past']),
	540 => array(540,$lang_id_tab['hellfire_military']),
	542 => array(542,$lang_id_tab['hellfire_demon']),
	543 => array(543,$lang_id_tab['hellfire_rampart']),
	544 => array(544,$lang_id_tab['hellfire_raid']),
	545 => array(545,$lang_id_tab['coilfang_pumping']),
	546 => array(546,$lang_id_tab['coilfang_marsh']),
	547 => array(547,$lang_id_tab['coilfang_draenei']),
	548 => array(548,$lang_id_tab['coilfang_raid']),
	550 => array(550,$lang_id_tab['tempest_keep_raid']),
	552 => array(552,$lang_id_tab['tempest_keep_arcane']),
	553 => array(553,$lang_id_tab['tempest_keep_atrium']),
	554 => array(554,$lang_id_tab['tempest_keep_factory']),
	555 => array(555,$lang_id_tab['auchindoun_shadow']),
	556 => array(556,$lang_id_tab['auchindoun_arakkoa']),
	557 => array(557,$lang_id_tab['auchindoun_ethereal']),
	558 => array(558,$lang_id_tab['auchindoun_draenei']),
	559 => array(559,$lang_id_tab['nagrand_arena']),
	560 => array(560,$lang_id_tab['cot_hillsbrad_past']),
	562 => array(562,$lang_id_tab['blades_edge_arena']),
	564 => array(564,$lang_id_tab['black_temple']),
	565 => array(565,$lang_id_tab['gruuls_lair']),
	566 => array(566,$lang_id_tab['netherstorm_arena']),
	568 => array(568,$lang_id_tab['zulaman']),
	 //Northrend
	571 => array(571,$lang_id_tab['Northrend']),
	572 => array(572,$lang_id_tab['PVPLordaeron']),
	573 => array(573,$lang_id_tab['ExteriorTest']),
	574 => array(574,$lang_id_tab['Valgarde70']),
	575 => array(575,$lang_id_tab['UtgardePinnacle']),
	576 => array(576,$lang_id_tab['Nexus70']),
	578 => array(578,$lang_id_tab['Nexus80']),
	580 => array(580,$lang_id_tab['SunwellPlateau']),
	582 => array(582,$lang_id_tab['Transport176244']),
	584 => array(584,$lang_id_tab['Transport176231']),
	585 => array(585,$lang_id_tab['Sunwell5ManFix']),
	586 => array(585,$lang_id_tab['Transport181645']),
	587 => array(587,$lang_id_tab['Transport177233']),
	588 => array(588,$lang_id_tab['Transport176310']),
	589 => array(589,$lang_id_tab['Transport175080']),
	590 => array(590,$lang_id_tab['Transport176495']),
	591 => array(591,$lang_id_tab['Transport164871']),
	592 => array(592,$lang_id_tab['Transport186238']),
	593 => array(593,$lang_id_tab['Transport20808']),
	594 => array(594,$lang_id_tab['Transport187038']),
	595 => array(595,$lang_id_tab['StratholmeCOT']),
	596 => array(596,$lang_id_tab['Transport187263']),
	597 => array(597,$lang_id_tab['CraigTest']),
	598 => array(598,$lang_id_tab['Sunwell5Man']),
	599 => array(599,$lang_id_tab['Ulduar70']),
	600 => array(600,$lang_id_tab['DrakTheronKeep']),
	601 => array(601,$lang_id_tab['Azjol_Uppercity']),
	602 => array(602,$lang_id_tab['Ulduar80']),
	603 => array(603,$lang_id_tab['UlduarRaid']),
	604 => array(604,$lang_id_tab['GunDrak']),
	605 => array(605,$lang_id_tab['development_nonweighted']),
	606 => array(606,$lang_id_tab['QA_DVD']),
	607 => array(607,$lang_id_tab['NorthrendBG']),
	608 => array(608,$lang_id_tab['DalaranPrison']),
	609 => array(609,$lang_id_tab['DeathKnightStart']),
	610 => array(610,$lang_id_tab['Transport_Tirisfal _Vengeance_Landing']),
	612 => array(612,$lang_id_tab['Transport_Menethil_Valgarde']),
	613 => array(613,$lang_id_tab['Transport_Orgrimmar_Warsong_Hold']),
	614 => array(614,$lang_id_tab['Transport_Stormwind_Valiance_Keep']),
	615 => array(615,$lang_id_tab['ChamberOfAspectsBlack']),
	616 => array(616,$lang_id_tab['NexusRaid']),
	617 => array(617,$lang_id_tab['DalaranArena']),
	618 => array(618,$lang_id_tab['OrgrimmarArena']),
	619 => array(619,$lang_id_tab['Azjol_LowerCity']),
	620 => array(620,$lang_id_tab['Transport_Moa\'ki_Unu\'pe']),
	621 => array(621,$lang_id_tab['Transport_Moa\'ki_Kamagua']),
	622 => array(622,$lang_id_tab['Transport192241']),
	623 => array(623,$lang_id_tab['Transport192242']),
	624 => array(624,$lang_id_tab['WintergraspRaid'])
);
function get_player_user_level($id){
global $user_level;
 return $user_level[$id] ;
}

function get_player_race($race_id){
global $lang_id_tab;
switch ($race_id) {
case 1:
   return($lang_id_tab['human']);
   break;
case 2:
   return($lang_id_tab['orc']);
   break;
case 3:
   return($lang_id_tab['dwarf']);
   break;
case 4:
   return($lang_id_tab['nightelf']);
   break;
case 5:
   return($lang_id_tab['undead']);
   break;
case 6:
   return($lang_id_tab['tauren']);
   break;
case 7:
   return($lang_id_tab['gnome']);
   break;
case 8:
   return($lang_id_tab['troll']);
   break;
case 9:
   return($lang_id_tab['goblin']);
   break;
case 10:
   return($lang_id_tab['bloodelf']);
   break;
case 11:
   return($lang_id_tab['draenei']);
   break;
default:
    return($lang_id_tab['unknown']);
 }
}

function get_player_class($class_id){
global $lang_id_tab;
switch ($class_id) {
case 1:
   return($lang_id_tab['warrior']);
   break;
case 2:
   return($lang_id_tab['paladin']);
   break;
case 3:
   return($lang_id_tab['hunter']);
   break;
case 4:
   return($lang_id_tab['rogue']);
   break;
case 5:
   return($lang_id_tab['priest']);
   break;
case 6:
   return($lang_id_tab['black_cheva']);
   break;
case 7:
   return($lang_id_tab['shaman']);
   break;
case 8:
   return($lang_id_tab['mage']);
   break;
case 9:
   return($lang_id_tab['warlock']);
   break;
case 11:
   return($lang_id_tab['druid']);
   break;
default:
    return($lang_id_tab['unknown']);
 }
}

function pvp_ranks($honor=0, $faction=0){
    $rank = '0'.$faction;
    if($honor > 0){
        if($honor < 2000) $rank = 1;
        else $rank = ceil($honor / 5000) + 1;
    }

	if ($rank>14) { $rank = 14; }
    return $rank;
};

function get_map_name($id){
global $lang_id_tab, $map_id;
	if( isset($map_id[$id])) return $map_id[$id][1];
		else return($lang_id_tab['unknown']);
}
$zone_id = Array(
 //Azeroth
	1497 => Array($lang_id_tab['undercity'],1497),
	1537 => Array($lang_id_tab['ironforge'],1537),
	1519 => Array($lang_id_tab['stormwind_city'],1519),
	3 => Array($lang_id_tab['badlands'],3),
	11 => Array($lang_id_tab['wetlands'],11),
	33 => Array($lang_id_tab['stranglethorn_vale'],33),
	44 => Array($lang_id_tab['redridge_mountains'],44),
	38 => Array($lang_id_tab['loch_modan'],38),
	10 => Array($lang_id_tab['duskwood'],10),
	41 => Array($lang_id_tab['deadwind_pass'],41),
	12 => Array($lang_id_tab['elwynn_forest'],12),
	46 => Array($lang_id_tab['burning_steppes'],46),
	51 => Array($lang_id_tab['searing_gorge'],51),
	1 => Array($lang_id_tab['dun_morogh'],1),
	47 => Array($lang_id_tab['the_hinterlands'],47),
	40 => Array($lang_id_tab['westfall'],40),
	267 => Array($lang_id_tab['hillsbrad_foothills'],267),
	139 => Array($lang_id_tab['eastern_plaguelands'],139),
	28 => Array($lang_id_tab['western_plaguelands'],28),
	130 => Array($lang_id_tab['silverpine_forest'],130),
	85 => Array($lang_id_tab['tirisfal_glades'],85),
	4 => Array($lang_id_tab['blasted_lands'],4),
	8 => Array($lang_id_tab['swamp_of_sorrows'],8),
	45 => Array($lang_id_tab['arathi_highlands'],45),
	36 => Array($lang_id_tab['alterac_mountains'],36),
 //Kalimdor
	1657 => Array($lang_id_tab['darnassus'],1657),
	1638 => Array($lang_id_tab['thunder_bluff'],1638),
	1637 => Array($lang_id_tab['orgrimmar'],1637),
	493 => Array($lang_id_tab['moonglade'],493),
	1377 => Array($lang_id_tab['silithus'],1377),
	618 => Array($lang_id_tab['winterspring'],618),
	490 => Array($lang_id_tab['un_goro_crater'],490),
	361 => Array($lang_id_tab['felwood'],361),
	16 => Array($lang_id_tab['azshara'],16),
	440 => Array($lang_id_tab['tanaris'],440),
	15 => Array($lang_id_tab['dustwallow_marsh'],15),
	215 => Array($lang_id_tab['mulgore'],215),
	357 => Array($lang_id_tab['feralas'],357),
	405 => Array($lang_id_tab['desolace'],405),
	400 => Array($lang_id_tab['thousand_needles'],400),
	14 => Array($lang_id_tab['durotar'],14),
	331 => Array($lang_id_tab['ashenvale'],331),
	148 => Array($lang_id_tab['darkshore'],148),
	141 => Array($lang_id_tab['teldrassil'],141),
	406 => Array($lang_id_tab['stonetalon_mountains'],406),
	17 => Array($lang_id_tab['the_barrens'],17),
 //Outland
	3703 => Array($lang_id_tab['shattrath_city'],3703),
	3487 => Array($lang_id_tab['silvermoon_city'],3487),
	3523 => Array($lang_id_tab['netherstorm'],3523),
	3519 => Array($lang_id_tab['terokkar_forest'],3519),
	3518 => Array($lang_id_tab['nagrand'],3518),
	3525 => Array($lang_id_tab['bloodmyst_isle'],3525),
	3522 => Array($lang_id_tab['blades_edge_mountains'],3522),
	3520 => Array($lang_id_tab['shadowmoon_valley'],3520),
	3557 => Array($lang_id_tab['the_exodar'],3557),
	3521 => Array($lang_id_tab['zangarmarsh'],3521),
	3483 => Array($lang_id_tab['hellfire_peninsula'],3483),
	3524 => Array($lang_id_tab['azuremyst_isle'],3524),
	3433 => Array($lang_id_tab['ghostlands'],3433),
	3430 => Array($lang_id_tab['eversong_woods'],3430),
 //Northrend
	3537 => Array($lang_id_tab['BoreanTundra'],3537),
	65 => Array($lang_id_tab['Dragonblight'],65),
	394 => Array($lang_id_tab['GrizzlyHills'],394),
	495 => Array($lang_id_tab['HowlingFjord'],495),
	210 => Array($lang_id_tab['IcecrownGlacier'],210),
	3711 => Array($lang_id_tab['SholazarBasin'],3711),
	67 => Array($lang_id_tab['TheStormPeaks'],67),
	66 => Array($lang_id_tab['ZulDrak'],66),
	4080 => Array($lang_id_tab['Sunwell'],4080),
	4197 => Array($lang_id_tab['LakeWintergrasp'],4197),
    4298 => Array($lang_id_tab['ScarletEnclave'],4298),
	4395 => Array($lang_id_tab['Dalaran'],4395),
	2817 => Array($lang_id_tab['CrystalsongForest'],2817),
	4384 => Array($lang_id_tab['StrandoftheAncients'],4384)
);

function get_zone_name($id){
 global $zone_id;
	if( isset($zone_id[$id])) return $zone_id[$id][0];
		else return(" ");
}

// Y1 ,Y2,X1,X2 - Upper left Y Coord of Box, Lower Right Y Coord of Box, Upper Left X Coord of Box,  Lower Right X Coord of Box
function get_zone_name3($map_id,$player_x,$player_y){
 global $zone_0,$zone_1,$zone_530;
 switch ($map_id) {
	case 0:
	for ($i=0; $i < count($zone_0); $i++)
		if (($zone_0[$i][2] < $player_x) && ($zone_0[$i][3] > $player_x) && ($zone_0[$i][1] < $player_y) && ($zone_0[$i][0] > $player_y)) return ($zone_0[$i][4]);
	break;
	case 1:
	for ($i=0; $i < count($zone_1); $i++)
		if (($zone_1[$i][2] < $player_x) && ($zone_1[$i][3] > $player_x) && ($zone_1[$i][1] < $player_y) && ($zone_1[$i][0] > $player_y)) return ($zone_1[$i][4]);
	break;
	case 530:
	for ($i=0; $i < count($zone_530); $i++)
		if (($zone_530[$i][2] < $player_x) && ($zone_530[$i][3] > $player_x) && ($zone_530[$i][1] < $player_y) && ($zone_530[$i][0] > $player_y)) return ($zone_530[$i][4]);
	break;

	default:
	return(" ");
	}
}

////////////////////////////////////////////////////////////////////////////////////////////////
//get zone name by mapid and players x,y 
// Y1 ,Y2,X1,X2 - Upper left Y Coord of Box, Lower Right Y Coord of Box, Lower Right X Coord of Box, Upper Left X Coord of Box
$zone_0 = Array( //Azeroth
	0 => Array(700,10,1244,1873,$lang_id_tab['undercity'],1497),
	1 => Array(-840,-1330,-5050,-4560,$lang_id_tab['ironforge'],1537),
	2 => Array(1190,200,-9074,-8280,$lang_id_tab['stormwind_city'],1519),
	3 => Array(-2170,-4400,-7348,-6006,$lang_id_tab['badlands'],3),
	4 => Array(-500,-4400,-4485,-2367,$lang_id_tab['wetlands'],11),
	5 => Array(2220,-2250,-15422,-11299,$lang_id_tab['stranglethorn_vale'],33),
	6 => Array(-1724,-3540,-9918,-8667,$lang_id_tab['redridge_mountains'],44),
	7 => Array(-2480,-4400,-6006,-4485,$lang_id_tab['loch_modan'],38),
	8 => Array(662,-1638,-11299,-9990,$lang_id_tab['duskwood'],10),
	9 => Array(-1638,-2344,-11299,-9918,$lang_id_tab['deadwind_pass'],41),
	10 => Array(834,-1724,-9990,-8526,$lang_id_tab['elwynn_forest'],12),
	11 => Array(-500,-3100,-8667,-7348,$lang_id_tab['burning_steppes'],46),
	12 => Array(-608,-2170,-7348,-6285,$lang_id_tab['searing_gorge'],51),
	13 => Array(2000,-2480,-6612,-4485,$lang_id_tab['dun_morogh'],1),
	14 => Array(-1575,-5425,-432,805,$lang_id_tab['the_hinterlands'],47),
	15 => Array(3016,662,-11299,-9400,$lang_id_tab['westfall'],40),
	16 => Array(600,-1575,-1874,220,$lang_id_tab['hillsbrad_foothills'],267),
	17 => Array(-2725,-6056,805,3800,$lang_id_tab['eastern_plaguelands'],139),
	18 => Array(-850,-2725,805,3400,$lang_id_tab['western_plaguelands'],28),
	19 => Array(2200,600,-900,1525,$lang_id_tab['silverpine_forest'],130),
	20 => Array(2200,-850,1525,3400,$lang_id_tab['tirisfal_glades'],85),
	21 => Array(-2250,-3520,-12800,-10666,$lang_id_tab['blasted_lands'],4),
	22 => Array(-2344,-4516,-11070,-9600,$lang_id_tab['swamp_of_sorrows'],8),
	23 => Array(-1575,-3900,-2367,-432,$lang_id_tab['arathi_highlands'],45),
	24 => Array(600,-1575,220,1525,$lang_id_tab['alterac_mountains'],36)
 	);

$zone_1 = Array( //Kalimdor
	0 => Array(2698,2030,9575,10267,$lang_id_tab['darnassus'],1657),
	1 => Array(326,-360,-1490,-910,$lang_id_tab['thunder_bluff'],1638),
	2 => Array(-3849,-4809,1387,2222,$lang_id_tab['orgrimmar'],1637),
	3 => Array(-1300,-3250,7142,8500,$lang_id_tab['moonglade'],493),
	4 => Array(2021,-400,-9000,-6016,$lang_id_tab['silithus'],1377),
	5 => Array(-2259,-7000,4150,8500,$lang_id_tab['winterspring'],618),
	6 => Array(-400,-2094,-8221,-6016,$lang_id_tab['un_goro_crater'],490),
	7 => Array(-590,-2259,3580,7142,$lang_id_tab['felwood'],361),
	8 => Array(-3787,-8000,1370,6000,$lang_id_tab['azshara'],16),
	9 => Array(-1900,-5500,-10475,-6825,$lang_id_tab['tanaris'],440),
	10 => Array(-2478,-5500,-5135,-2330,$lang_id_tab['dustwallow_marsh'],15),
	11 => Array(360,-1536,-3474,-412,$lang_id_tab['mulgore'],215),
	12 => Array(4000,-804,-6828,-2477,$lang_id_tab['feralas'],357),
	13 => Array(3500,360,-2477,372,$lang_id_tab['desolace'],405),
	14 => Array(-804,-5500,-6828,-4566,$lang_id_tab['thousand_needles'],400),
	15 => Array(-3758,-5500,-1300,1370,$lang_id_tab['durotar'],14),
	16 => Array(1000,-3787,1370,4150,$lang_id_tab['ashenvale'],331),
	17 => Array(2500,-1300,4150,8500,$lang_id_tab['darkshore'],148),
	18 => Array(3814,-1100,8600,11831,$lang_id_tab['teldrassil'],141),
	19 => Array(3500,-804,-412,3580,$lang_id_tab['stonetalon_mountains'],406),
	20 => Array(-804,-4200,-4566,1370,$lang_id_tab['the_barrens'],17)
	);

$zone_530 = Array( //Outland
	0 => Array(6135.25,4829,-2344.78,-1473.95,$lang_id_tab['shattrath_city'],3703),
	1 => Array(-6400.75,-7612.20,9346.93,10153.70,$lang_id_tab['silvermoon_city'],3487),
	2 => Array(5483.33,-91.66,1739.58,5456.25,$lang_id_tab['netherstorm'],3523),
	3 => Array(7083.33,1683.33,-4600,-999.99,$lang_id_tab['terokkar_forest'],3519),
	4 => Array(10295.83,4770.83,-3641.66,41.66,$lang_id_tab['nagrand'],3518),
	5 => Array(-10075,-13337.49,-2933.33,-758.33,$lang_id_tab['bloodmyst_isle'],3525),
	6 => Array(8845.83,3420.83,791.66,4408.33,$lang_id_tab['blades_edge_mountains'],3522),
	7 => Array(4225,-1275,-5614.58,-1947.91,$lang_id_tab['shadowmoon_valley'],3520),
	8 => Array(-11066.36,-12123.13,-4314.37,-3609.68,$lang_id_tab['the_exodar'],3557),
	9 => Array(9475,4447.91,-1416.66,1935.41,$lang_id_tab['zangarmarsh'],3521),
	10 => Array(5539.58,375,-1962.49,1481.25,$lang_id_tab['hellfire_peninsula'],3483),
	11 => Array(-10500,-14570.83,-5508.33,-2793.75,$lang_id_tab['azuremyst_isle'],3524),
	12 => Array(-5283.33,-8583.33,6066.66,8266.66,$lang_id_tab['ghostlands'],3433),
	13 => Array(-4487.5,-9412.5,7758.33,11041.66,$lang_id_tab['eversong_woods'],3430)
);

function get_realm_name(){
 global $realmd, $mangos, $characters;

 mysql_connect($realmd['host'], $realmd['user'], $realmd['password']);
 mysql_select_db($realmd['db']);

 $result = mysql_query("SELECT name FROM `realmlist` WHERE id = '{$mangos[1]['id']}'");
 $realm_name = mysql_result($result, 0);

 mysql_free_result($result);
 mysql_close();
 if ($realm_name) return $realm_name;
	else return "";
}
?>
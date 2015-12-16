<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
$adresse = "index.php?module=vente";
mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
mysql_select_db($characters[1]['db']) or die(mysql_error());

$page_get = Securite::get($_GET['page']);
$truc = $page_get;

switch ($_GET['action'])
{
	case "recherche":
		require_once("kernel/fonctions_armurerie.php");
		
		$red = "#DD5047";
		$blue = "#0097CD";
		$sidecolor = array(1 => $blue,2 => $red,3 => $blue,4 => $blue,5 => $red,6 => $red,7 => $blue,8 => $red,10 => $red);
		$hiddencols = array(1,8,9,10);

		$order_by = (isset($_POST['order_by'])) ? $_POST['order_by'] : "time";
		$dir = (isset($_POST['dir'])) ? $_POST['dir'] : 1;
		$order_dir = ($dir) ? "ASC" : "DESC";
		$dir = ($dir) ? 0 : 1;

	  if( ($_POST['search_class'] == "-1")&&($_POST['search_quality'] == "-1")
		&&(!isset($_POST['recherche']))&&(!isset($_POST['search_by'])) )
		echo "error";
	
	  $user_id = $_SESSION['id'];
	  $search_class = $_POST['search_class'];
	  $search_quality = $_POST['search_quality'];
	  $recherche = $_POST['recherche'];
	  $search_by = $_POST['search_by'];



	 switch ($search_by) {
		case "item_name":

		 if(( ($search_class >= 0) || ($search_quality >= 0))&&(!isset($recherche))){
			if ($search_class >= 0) $search_filter = " AND item_template.class = '$search_class'";
			if ($search_quality >= 0) $search_filter = " AND item_template.Quality = '$search_quality'";
		}
		else
		{
			$item_prefix = "";
			if ($search_class >= 0) $item_prefix .= "AND class = '$search_class' ";
			if ($search_quality >= 0) $item_prefix .= "AND Quality = '$search_quality' ";

			$result = mysql_query("SELECT entry FROM `".$mangos[1]['db']."`.`item_template` WHERE name LIKE '%$recherche%' $item_prefix");
			$search_filter = "AND auctionhouse.item_template IN(0";
			while ($item = mysql_fetch_row($result)) $search_filter .= ", $item[0]";
			$search_filter .= ")";
		}
		break;

		case "item_id":
			$search_filter = "AND auctionhouse.item_template = '$recherche'";
		break;

		case "seller_name":
			$result = mysql_query("SELECT guid FROM `characters` WHERE name LIKE '%$recherche%'");
			$search_filter = "AND auctionhouse.itemowner IN(0";
			while ($char = mysql_fetch_row($result)) $search_filter .= ", $char[0]";
			$search_filter .= ")";
		break;
		case "buyer_name":
			$result = mysql_query("SELECT guid FROM `characters` WHERE name LIKE '%$recherche%'");
			$search_filter = "AND auctionhouse.buyguid IN(-1";
			while ($char = mysql_fetch_row($result)) $search_filter .= ", $char[0]";
			$search_filter .= ")";
		break;
		default:
			echo "erreur";
	 }

		$query = mysql_query("SELECT `characters`.`name` AS `seller`, `auctionhouse`.`item_template` AS `itemid`, `item_template`.`name` AS `itemname`, `auctionhouse`.`buyoutprice` AS `buyout`,
	 `auctionhouse`.`time`-unix_timestamp(), `c2`.`name` AS `encherisseur`, `auctionhouse`.`lastbid`, `auctionhouse`.`startbid`, SUBSTRING_INDEX(SUBSTRING_INDEX(`item_instance`.`data`, ' ',15), ' ',-1) AS qty, `characters`.`race` AS seller_race, `c2`.`race` AS buyer_race
	 FROM `".$characters[1]['db']."`.`characters` , `".$characters[1]['db']."`.`item_instance` , `".$mangos[1]['db']."`.`item_template` , `".$characters[1]['db']."`.`auctionhouse` LEFT JOIN `".$characters[1]['db']."`.`characters` c2 ON `c2`.`guid`=`auctionhouse`.`buyguid`
	 WHERE `auctionhouse`.`itemowner`=`characters`.`guid` AND `auctionhouse`.`item_template`=`item_template`.`entry` AND `auctionhouse`.`itemguid`=`item_instance`.`guid` $search_filter
	 $order_side ORDER BY `auctionhouse`.`$order_by` $order_dir");
		$tot_found = mysql_num_rows($query);
	 
		echo "<p class=\"title\">".$lang_hotel_vente['there_is']." ".$tot_found." résultat pour votre recherche</p><br />";
			echo "
			<form action=\"index.php?module=vente&action=recherche\" method=\"POST\" name=\"form\">
				<input type=\"text\" size=\"25\" name=\"recherche\" />
				<select name=\"search_by\">
					<option value=\"item_name\">{$lang_hotel_vente['item_name']}</option>
					<option value=\"item_id\">{$lang_hotel_vente['item_id']}</option>
					<option value=\"seller_name\">{$lang_hotel_vente['seller_name']}</option>
					<option value=\"buyer_name\">{$lang_hotel_vente['buyer_name']}</option>
			   </select>
			   <select name=\"search_class\">
					<option value=\"-1\">{$lang_hotel_vente['all']}</option>
					<option value=\"0\">{$lang_hotel_vente['consumable']}</option>
					<option value=\"1\">{$lang_hotel_vente['bag']}</option>
					<option value=\"2\">{$lang_hotel_vente['weapon']}</option>
					<option value=\"4\">{$lang_hotel_vente['armor']}</option>
					<option value=\"5\">{$lang_hotel_vente['reagent']}</option>
					<option value=\"7\">{$lang_hotel_vente['trade_goods']}</option>
					<option value=\"9\">{$lang_hotel_vente['recipe']}</option>
					<option value=\"11\">{$lang_hotel_vente['quiver']}</option>
					<option value=\"14\">{$lang_hotel_vente['permanent']}</option>
					<option value=\"15\">{$lang_hotel_vente['misc_short']}</option>
			   </select>
			   <select name=\"search_quality\">
					<option value=\"-1\">{$lang_hotel_vente['all']}</option>
					<option value=\"0\">{$lang_hotel_vente['poor']}</option>
					<option value=\"1\">{$lang_hotel_vente['common']}</option>
					<option value=\"2\">{$lang_hotel_vente['uncommon']}</option>
					<option value=\"3\">{$lang_hotel_vente['rare']}</option>
					<option value=\"4\">{$lang_hotel_vente['epic']}</option>
					<option value=\"5\">{$lang_hotel_vente['legendary']}</option>
					<option value=\"6\">{$lang_hotel_vente['artifact']}</option>
				</select>
				<input type=\"submit\" value=\"".$lang_site['search']."\" />
			</form>";
			?>
			<table class="lined" width="99%" border="1" cellpadding="2" cellspacing="0" align="center" class="sortable">
				<tr>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['object'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['start_price'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['imediate_purchase'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['salesman'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['last_bid'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['auctioner'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['object_id'] ?></th>
				</tr>
			<?php
			if (mysql_num_rows($query) < 1)
			{
				echo "<tr><td colspan=\"7\">".$lang_erreur['empty_sale']."</td></tr>";
			}
			else
			{
				while ($donnees = mysql_fetch_row($query))
				{
				$guid = Securite::html($donnees[1]);
				$uname = Securite::html($donnees[0]);
				
				echo "<tr><td align=\"center\">";
				echo "<a href=\"http://fr.wowhead.com/?item=".$guid."\"><img src=\"".get_icon($guid)."\" /></a>";
				echo "<br><a href=\"".$item_datasite."".$guid."\" target=\"_blank\">";
				echo "".Securite::html($donnees[2])." (".Securite::html($donnees[8]).")";
				echo "</a>";
				echo "</td><td align=\"center\">";
				prix(Securite::html($donnees[7]));
				echo "</td><td align=\"center\">";
				prix(Securite::html($donnees[3]));
				echo "</td><td align=\"center\">";
				echo "<a href=\"armurerie-select.php?perso=$uname\">$uname</a>";
				echo "</td><td align=\"center\">";
				prix(Securite::html($donnees[6]));
				echo "</td><td align=\"center\">";
				if (Securite::html($donnees[5]) != NULL)
				{
					echo "<a href=\"armurerie-select.php?perso=".Securite::html($donnees[5])."\">".Securite::html($donnees[5])."</a>";
				}
				else
				{
					echo "Aucun";
				}
				echo "</td><td align=\"center\">";
				echo $guid;
				echo "</td></tr>";
				}
			}
			echo "</TABLE>";
	break;
	default:
		require_once("kernel/fonctions_armurerie.php");
		$ParPage = $Par_Page;
		$retour_total=mysql_query('SELECT COUNT(*) AS total FROM auctionhouse');
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
			mysql_connect($mangos[1]['host'], $mangos[1]['user'], $mangos[1]['password']) or die(mysql_error());
			$query = mysql_query("SELECT `characters`.`name` AS `seller`, `auctionhouse`.`item_template` AS `itemid`, `item_template`.`name` AS `itemname`, `auctionhouse`.`buyoutprice` AS `buyout`,
 `auctionhouse`.`time`-unix_timestamp(), `c2`.`name` AS `encherisseur`, `auctionhouse`.`lastbid`, `auctionhouse`.`startbid`, SUBSTRING_INDEX(SUBSTRING_INDEX(`item_instance`.`data`, ' ',15), ' ',-1) AS qty, `characters`.`race` AS seller_race, `c2`.`race` AS buyer_race
 FROM `".$characters[1]['db']."`.`characters` , `".$characters[1]['db']."`.`item_instance` , `".$mangos[1]['db']."`.`item_template` , `".$characters[1]['db']."`.`auctionhouse`
LEFT JOIN `".$characters[1]['db']."`.`characters` c2 ON `c2`.`guid`=`auctionhouse`.`buyguid`
 WHERE `auctionhouse`.`itemowner`=`characters`.`guid` AND `auctionhouse`.`item_template`=`item_template`.`entry` AND `auctionhouse`.`itemguid`=`item_instance`.`guid`
 LIMIT $premiereEntree, $ParPage");
			
			require_once("kernel/fonctions.php");
			
			echo "<p class=\"title\">$title_auctionhouse</p><br />";
			echo "
			<form action=\"index.php?module=vente&action=recherche\" method=\"POST\" name=\"form\">
				<input type=\"text\" size=\"25\" name=\"recherche\" />
				<select name=\"search_by\">
					<option value=\"item_name\">{$lang_hotel_vente['item_name']}</option>
					<option value=\"item_id\">{$lang_hotel_vente['item_id']}</option>
					<option value=\"seller_name\">{$lang_hotel_vente['seller_name']}</option>
					<option value=\"buyer_name\">{$lang_hotel_vente['buyer_name']}</option>
			   </select>
			   <select name=\"search_class\">
					<option value=\"-1\">{$lang_hotel_vente['all']}</option>
					<option value=\"0\">{$lang_hotel_vente['consumable']}</option>
					<option value=\"1\">{$lang_hotel_vente['bag']}</option>
					<option value=\"2\">{$lang_hotel_vente['weapon']}</option>
					<option value=\"4\">{$lang_hotel_vente['armor']}</option>
					<option value=\"5\">{$lang_hotel_vente['reagent']}</option>
					<option value=\"7\">{$lang_hotel_vente['trade_goods']}</option>
					<option value=\"9\">{$lang_hotel_vente['recipe']}</option>
					<option value=\"11\">{$lang_hotel_vente['quiver']}</option>
					<option value=\"14\">{$lang_hotel_vente['permanent']}</option>
					<option value=\"15\">{$lang_hotel_vente['misc_short']}</option>
			   </select>
			   <select name=\"search_quality\">
					<option value=\"-1\">{$lang_hotel_vente['all']}</option>
					<option value=\"0\">{$lang_hotel_vente['poor']}</option>
					<option value=\"1\">{$lang_hotel_vente['common']}</option>
					<option value=\"2\">{$lang_hotel_vente['uncommon']}</option>
					<option value=\"3\">{$lang_hotel_vente['rare']}</option>
					<option value=\"4\">{$lang_hotel_vente['epic']}</option>
					<option value=\"5\">{$lang_hotel_vente['legendary']}</option>
					<option value=\"6\">{$lang_hotel_vente['artifact']}</option>
				</select>
				<input type=\"submit\" value=\"".$lang_site['search']."\" />
			</form>";
			?>
			<table class="lined" width="99%" border="1" cellpadding="2" cellspacing="0" align="center" class="sortable">
				<tr>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['object'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['start_price'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['imediate_purchase'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['salesman'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['last_bid'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['auctioner'] ?></th>
					<th nowrap="nowrap"><?php echo $lang_hotel_vente['object_id'] ?></th>
				</tr>
			<?php
			if (mysql_num_rows($query) < 1)
			{
				echo "<tr><td colspan=\"7\">".$lang_erreur['empty_sale']."</td></tr>";
			}
			else
			{
				while ($donnees = mysql_fetch_row($query))
				{
				$guid = Securite::html($donnees[1]);
				$uname = Securite::html($donnees[0]);
				
				echo "<tr><td align=\"center\">";
				echo "<a href=\"http://fr.wowhead.com/?item=".$guid."\"><img src=\"".get_icon($guid)."\" /></a>";
				echo "<br><a href=\"".$item_datasite."".$guid."\" target=\"_blank\">";
				echo "".Securite::html($donnees[2])." (".Securite::html($donnees[8]).")";
				echo "</a>";
				echo "</td><td align=\"center\">";
				prix(Securite::html($donnees[7]));
				echo "</td><td align=\"center\">";
				prix(Securite::html($donnees[3]));
				echo "</td><td align=\"center\">";
				echo "<a href=\"armurerie-select.php?perso=$uname\">$uname</a>";
				echo "</td><td align=\"center\">";
				prix(Securite::html($donnees[6]));
				echo "</td><td align=\"center\">";
				if (Securite::html($donnees[5]) != NULL)
				{
					echo "<a href=\"armurerie-select.php?perso=".Securite::html($donnees[5])."\">".Securite::html($donnees[5])."</a>";
				}
				else
				{
					echo "Aucun";
				}
				echo "</td><td align=\"center\">";
				echo $guid;
				echo "</td></tr>";
				}
			}
			echo "</TABLE>
			<p class=\"center\">".$lang_hotel_vente['there_is']." ".$donnees_total['total']." ".$lang_hotel_vente['item_sale']."</p>";
			pagination($ParPage , $total, $truc, $adresse);
		}
		else
		{
			echo "<p>".$lang_erreur['page_notexist']."</p>";
			echo "<a href=\"index.php?module=guildes\">".$lang_site['return']."</a>";
		}
	break;
}
?>
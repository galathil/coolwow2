<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

$test_idr = Securite::get($_GET['id']);
if(!empty($test_idr))
{
		$idr = $test_idr;
		class SQL //MySQL
		{
			var $link_id;
			var $query_result;
			var $num_queries = 0;

			function connect($db_host, $db_username, $db_password, $db_name = '', $use_names = '', $pconnect = true, $newlink = false) {
				global $lang_global;

				if ($pconnect) $this->link_id = @mysql_pconnect($db_host, $db_username, $db_password);
				else $this->link_id = @mysql_connect($db_host, $db_username, $db_password, $newlink);
				
				if ($this->link_id){
					if($db_name){
						if (@mysql_select_db($db_name, $this->link_id)) return $this->link_id;
							else die(error($lang_global['err_sql_open_db']." ('$db_name')"));
						if (!empty($use_names)) $this->query("SET NAMES '$use_names'");
					}
				} else die(error($lang_global['err_sql_conn_db']));
			}

			function db($db_name) {
				global $lang_global;
				if ($this->link_id){
					if (@mysql_select_db($db_name, $this->link_id)) return $this->link_id;
						else die(error($lang_global['err_sql_open_db']." ('$db_name')"));
				} else die(error($lang_global['err_sql_conn_db']));
			}

			function query($sql){
				$this->query_result = @mysql_query($sql, $this->link_id);

				if ($this->query_result){
					++$this->num_queries;
					return $this->query_result;
				} else {
					die(error(mysql_error()));
					return false;
				}
			}

			function result($query_id = 0, $row = 0, $field = NULL){
				return ($query_id) ? @mysql_result($query_id, $row, $field) : false;
			}

			function fetch_row($query_id = 0){
				return ($query_id) ? @mysql_fetch_row($query_id) : false;
			}
			
			function fetch_array($query_id = 0){
				return ($query_id) ? @mysql_fetch_array($query_id) : false;
			}

			function fetch_assoc($query_id = 0){
				return ($query_id) ? @mysql_fetch_assoc($query_id) : false;
			}
			
			function num_rows($query_id = 0){
				return ($query_id) ? @mysql_num_rows($query_id) : false;
			}
			
			function num_fields($query_id = 0){
				return ($query_id) ? @mysql_num_fields($query_id) : false;
			}

			function affected_rows(){
				return ($this->link_id) ? @mysql_affected_rows($this->link_id) : false;
			}

			function insert_id(){
				return ($this->link_id) ? @mysql_insert_id($this->link_id) : false;
			}

			function get_num_queries(){
				return $this->num_queries;
			}

			function free_result($query_id = false){
				return ($query_id) ? @mysql_free_result($query_id) : false;
			}

			function field_type($query_id = 0,$field_offset){
				return ($query_id) ? @mysql_field_type($query_id,$field_offset) : false;
			}

			function field_name($query_id = 0,$field_offset){
				return ($query_id) ? @mysql_field_name($query_id,$field_offset) : false;
			}
			
			function quote_smart($value){
			if( is_array($value) ) {
				return array_map( array('SQL','quote_smart') , $value);
			} else {
				if( get_magic_quotes_gpc() ) $value = stripslashes($value);
				if( $value === '' ) $value = NULL;
				if (function_exists('mysql_real_escape_string'))
					return mysql_real_escape_string($value, $this->link_id);
					else return mysql_escape_string($value);
				}
			}

			function error(){
				return mysql_error();
			}
			
			function close(){
				global $tot_queries;
				$tot_queries += $this->num_queries;
				if ($this->link_id){
					if ($this->query_result) @mysql_free_result($this->query_result);
					return @mysql_close($this->link_id);
				} else return false;
			}
			
			function start_transaction(){
				return;
			}

			function end_transaction(){
				return;
			}
		}

		$race = Array(
			1 => array(1,$lang_id_tab['human'],"",""),
			2 => array(2,$lang_id_tab['orc'],"",""),
			3 => array(3,$lang_id_tab['dwarf'],"",""),
			4 => array(4,$lang_id_tab['nightelf'],"",""),
			5 => array(5,$lang_id_tab['undead'],"",""),
			6 => array(6,$lang_id_tab['tauren'],"",""),
			7 => array(7,$lang_id_tab['gnome'],"",""),
			8 => array(8,$lang_id_tab['troll'],"",""),
			10 => array(10,$lang_id_tab['bloodelf'],"",""),
			11 => array(11,$lang_id_tab['draenei'],"","")
		);

		$class = Array(
			1 => array(1,$lang_id_tab['warrior'],"",""),
			2 => array(2,$lang_id_tab['paladin'],"",""),
			3 => array(3,$lang_id_tab['hunter'],"",""),
			4 => array(4,$lang_id_tab['rogue'],"",""),
			5 => array(5,$lang_id_tab['priest'],"",""),
			6 => array(6,$lang_id_tab['black_cheva'],"",""),
			7 => array(7,$lang_id_tab['shaman'],"",""),
			8 => array(8,$lang_id_tab['mage'],"",""),
			9 => array(9,$lang_id_tab['warlock'],"",""),
			11 => array(11,$lang_id_tab['druid'],"","")
		);


		$level = Array(
			1 => array(1,1,4,"",""),
			2 => array(2,5,9,"",""),
			3 => array(3,10,14,"",""),
			4 => array(4,15,19,"",""),
			5 => array(5,20,24,"",""),
			6 => array(6,25,29,"",""),
			7 => array(7,30,34,"",""),
			8 => array(8,35,39,"",""),
			9 => array(9,40,44,"",""),
			10 => array(10,45,49,"",""),
			11 => array(11,50,54,"",""),
			12 => array(12,55,59,"",""),
			13 => array(13,60,64,"",""),
			14 => array(14,65,69,"",""),
			15 => array(15,70,79,"",""),
			16 => array(16,80,255,"",""),
		);

		mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die();
		mysql_select_db($realmd['db']) or die();
		$reponse7 = mysql_query("SELECT * FROM `realmlist` WHERE id = $idr") OR DIE();
		$donnees7 = mysql_fetch_array($reponse7);
		mysql_close();

		mysql_connect($characters[$idr]['host'], $characters[$idr]['user'], $characters[$idr]['password']) or die();
		mysql_select_db($characters[$idr]['db']) or die();

		$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM `characters` WHERE `online`='1'") or die();
		$reponse2 = mysql_query("SELECT COUNT(*) AS nombre FROM `characters`") or die();
		//$reponse5 = mysql_query("SELECT COUNT(*) AS nombre FROM `characters` WHERE `extra_flags`>='1' AND `online`='1'") or die();
		$donnees = mysql_fetch_array($reponse);
		$donnees2 = mysql_fetch_array($reponse2);
		//$donnees5 = mysql_fetch_array($reponse5);

		mysql_connect($realmd['host'], $realmd['user'], $realmd['password']);
		mysql_select_db($realmd['db']);
		$reponse3 = mysql_query("SELECT COUNT(*) AS nombre FROM `account`") or die();
		$reponse4 = mysql_query("SELECT COUNT(*) AS nombre FROM `account` WHERE `gmlevel`>='1'") or die();
		$donnees3 = mysql_fetch_array($reponse3);
		$donnees4 = mysql_fetch_array($reponse4);
		mysql_close();
		$player = $donnees['nombre'];
		$perso = $donnees2['nombre'];
		$compte = $donnees3['nombre'];
		$gm = $donnees4['nombre'];
		//$gmon = $donnees5['nombre'];
		$gmon = 0;

		$hrsfix=1;
		$today = getdate();
		$hours = $today['hours']-$hrsfix;
		if ($hours == "-1") $hours = 0;
		if ($hours<=9) { $hours="0".$hours; }
		$minutes = $today['minutes'];
		if (strlen($minutes)<2) { $minutes="0".$minutes; }
		$month = $today['month'];
		$day = $today['mday'];
		$year = $today['year'];

			mysql_connect($characters[$idr]['host'], $characters[$idr]['user'], $characters[$idr]['password']) or die(mysql_error());
			mysql_select_db($characters[$idr]['db']) or die(mysql_error());
			$reponse6 = mysql_query("SELECT count(guid) AS nombre FROM `characters` WHERE race IN(2,5,6,8,10)");
			$donnees6 = mysql_fetch_array($reponse6);
			$horde_chars = $donnees6['nombre'];
			$horde_pros = round(($horde_chars*100)/$perso);
			$allies_chars = $perso - $horde_chars;
			$allies_pros = 100 - $horde_pros;

		//Début de la page
		 if ($perso){

		echo "<div class=\"title\">$titre_info_royaume</div><br>";
		echo "Emulateur : ".$serveur[1]['core']." - ".$serveur[1]['scripts']."<br />";
		echo "Base de donnée : ".$serveur[1]['bdd']."";
		echo "<br /><br />";
		$fserv=@fsockopen($serveur[$idr]['host'],$serveur[$idr]['port'],$errno,$errstr,1);
		if($fserv)
		{
			echo "<b><font color='green'><img src='images/online.gif' alt='' /> ".$donnees7['name']." $lang_information[online]</font></b>";
		}
		else
		{
			echo "<b><font color='red'><img src='images/offline.gif' alt='' /> ".$donnees7['name']." $lang_information[offline]</font></b>";
		}
		echo "<br /><br />";
		echo "<a href=\"index.php?module=connectes&id=$idr\">Il y a $player joueurs de connectés</a><br />";
		echo "Il y a $gmon maitre du jeu de connectés<br />";
		echo "Il y a au total $compte comptes sur le royaume<br />";
		echo "Il y a au total $perso personnages sur le royaume<br />";
		echo "Il y a au total $gm maitre du jeu sur le royaume<br />";
		echo "<br />";


		echo "
			<table width=\"90%\">
				<tr>
					<td class=\"pourcent\" align=\"center\" width=\"$horde_pros%\" background=\"images/barres/bar_horde.gif\" height=\"40\">Horde: $horde_chars ($horde_pros%)</td>
					<td class=\"pourcent\" align=\"center\" width=\"$allies_pros%\" background=\"images/barres/bar_allie.gif\" height=\"40\">Alliance: $allies_chars ($allies_pros%)</td>
				</tr>
			</table>";
			
		// RACE
		foreach ($race as $id)
		{	
			$sql = new SQL;
			$sql->connect($characters[$idr]['host'], $characters[$idr]['user'], $characters[$idr]['password'], $characters[$idr]['db']);
			$query = $sql->query("SELECT count(guid) FROM `characters` WHERE race = $id[0]");
			$race[$id[0]][2] = $sql->result($query,0);
			$race[$id[0]][3] = round((($race[$id[0]][2])*100)/$perso,1);
		 }

		echo $test;
		echo "
		<table width=\"90%\">
			<tr align=\"left\">
				<td><p class=\"title\">{$lang_stat['chars_by_race']}</p></td>
			</tr>
			<tr>
				<td>
					<table class=\"bargraph\">
						<tr>";
			foreach ($race as $id){
				$height = ($race[$id[0]][3])*4;
				echo "<td>{$race[$id[0]][3]}%<img src=\"images/barres/column.gif\" width=\"69\" height=\"$height\" alt=\"{$race[$id[0]][2]}\" /></td>";
				}
				echo "</tr><tr>";
			foreach ($race as $id){
					echo "<th>{$race[$id[0]][1]}<br />{$race[$id[0]][2]}</th>";
				}
				echo "</tr>
					</table>
					<br />
				</td>
			</tr>";
		// RACE END

		// CLASS
		foreach ($class as $id)
		{
			$sql->connect($characters[$idr]['host'], $characters[$idr]['user'], $characters[$idr]['password'], $characters[$idr]['db']);
			$query = $sql->query("SELECT count(guid) FROM `characters` WHERE class = $id[0] $order_race $order_level $order_side");
			$class[$id[0]][2] = $sql->result($query,0);
			$class[$id[0]][3] = round((($class[$id[0]][2])*100)/$perso,1);
		 }

		echo "
			<tr align=\"left\">
				<td><p class=\"title\">{$lang_stat['chars_by_class']}</p></td>
			</tr>
			<tr>
				<td>
					<table class=\"bargraph\">
						<tr>";
			foreach ($class as $id){
				$height = ($class[$id[0]][3])*4;
				echo "<td>{$class[$id[0]][3]}%<img src=\"images/barres/column.gif\" width=\"77\" height=\"$height\" alt=\"{$class[$id[0]][2]}\" /></td>";
				}
		echo "</tr><tr>";
			foreach ($class as $id){
					echo "<th>{$class[$id[0]][1]}<br />{$class[$id[0]][2]}</th>";
				}
		echo "</tr>
					</table>
					<br />
				</td>
			</tr>";
		// CLASS END

		// LEVEL
		foreach ($level as $id)
		{
			$sql->connect($characters[$idr]['host'], $characters[$idr]['user'], $characters[$idr]['password'], $characters[$idr]['db']);
			$query = $sql->query("SELECT count(guid) FROM `characters` WHERE SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', 54), ' ', -1) >= $id[1]
										AND SUBSTRING_INDEX(SUBSTRING_INDEX(`data`, ' ', 54), ' ', -1) <= $id[2] $order_race $order_class $order_side");
			$level[$id[0]][3] = $sql->result($query,0);
			$level[$id[0]][4] = round((($level[$id[0]][3])*100)/$perso,1);
		 }

		echo "
			<tr align=\"left\">
				<td><p class=\"title\">{$lang_stat['chars_by_level']}</p></td>
			</tr>
			<tr>
				<td>
					<table class=\"bargraph\">
						<tr>";
			foreach ($level as $id){
				$height = ($level[$id[0]][4])*4;
				echo "<td>{$level[$id[0]][4]}%<img src=\"images/barres/column.gif\" width=\"45\" height=\"$height\" alt=\"{$level[$id[0]][3]}\" /></td>";
				}
		echo "</tr><tr>";
			foreach ($level as $id){
					echo "<th>{$level[$id[0]][1]}-{$level[$id[0]][2]}<br />{$level[$id[0]][3]}</th>";
				}
		echo "</tr>
					</table>
					<br />
				</td>
			</tr>
		</table>";
		// LEVEL END
		}
		else
		{
			$sql->close();
		}
}
else
{
	echo "<p>Erreur d'accès code 1</p>";
	echo "<a href=\"index.php?module=info\">Retour</a>";
}
?>
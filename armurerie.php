<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
$royaume = royaume(Securite::get($_GET['royaume']));
switch ($_GET['action'])
{
	default:
		echo "<p class=\"title\">".$titre_armurerie."</p>
		<p class=\"center\">A quelles armurerie voulez-vous accèder ?<br /><br />
		<form method=\"POST\" action=\"index.php?module=armurerie&action=recherche\">
		<select name=\"royaume\">";
		mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
		mysql_select_db($realmd['db']) or die(mysql_error());
		$SQL = "SELECT * FROM realmlist ORDER BY id ASC";
		$result = mysql_query($SQL) or die("Erreur SQL");
		while ($val = mysql_fetch_array($result))
		{
			echo "<OPTION VALUE='".Securite::bdd($val['id'])."'>".Securite::bdd($val['name'])."</option>";
		}
		echo "</select>
		<input type=\"submit\" value=\"Entrer\" />
		</form></p>";
	break;
	case "recherche":
		$royaume = Securite::bdd($_POST['royaume']);
		mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
		mysql_select_db($realmd['db']) or die(mysql_error());
		$reponse = mysql_query("SELECT * FROM realmlist WHERE id = '".$royaume."'");
		$donnees = mysql_fetch_array($reponse,MYSQL_ASSOC);
		
		echo "<p class=\"title\">".$titre_armurerie."</p>
		<p class=\"center\">Royaume : ".$donnees['name']."</p>
		<form class=\"recherche\" method=\"$_POST\" action=\"armurerie-select.php\">
		<p><b>".$lang_armurerie['character_name']."</b></p>
		<input type=\"text\" name=\"perso\" value=\"".$lang_armurerie['perso_name']."\" size=\"30\" onFocus=\"javascript:this.value=''\" />
		<input type=\"hidden\" name=\"royaume\" value=\"".$royaume."\" />
		<input type=\"submit\" value=\"".$lang_site['search']."\" /><br />
		</form>
		<br />
		<form class=\"recherche\" method=\"$_POST\" action=\"armurerie-select.php\">
		<SELECT NAME=\"perso\">";
		mysql_connect($characters[$royaume]['host'], $characters[$royaume]['user'], $characters[$royaume]['password']) or die(mysql_error());
		mysql_select_db($characters[$royaume]['db']) or die(mysql_error());
		$SQL = "SELECT * FROM `characters` ORDER BY name ASC";
		$result = mysql_query($SQL) or die("Erreur SQL");
		while ($val = mysql_fetch_array($result))
		{
			echo "<OPTION VALUE='".Securite::bdd($val[guid])."'>".Securite::bdd($val[name])."</option>";
		}
		echo "</SELECT>
		<input type=\"hidden\" name=\"royaume\" value=\"".$royaume."\" />
		<input type=\"submit\" value=\"".$lang_site['search']."\" /><br />
		</form>";
	break;
}
?>
<?php
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html>
	<head>
		<title>$titre</title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />
		<script type=\"text/javascript\" src=\"scripts/vote.js\"></script>
		<script type=\"text/javascript\" src=\"scripts/general.js\"></script>
		<script type=\"text/javascript\" src=\"scripts/wowhead.js\"></script>
		<script type=\"text/javascript\" src=\"http://www.wowhead.com/widgets/power.js\"></script>
		<link rel=\"stylesheet\" type=\"text/css\" href=\"themes/$theme/style.css\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"themes/menu.css\" />
		<link rel=\"SHORTCUT ICON\" href=\"images/icon/wow.ico\" />\n";
		if ($_GET['module'] == "map")
		{
			echo "		<link rel=\"stylesheet\" href=\"style/map.css\" type=\"text/css\" />\n";
			echo "		<script language=\"JavaScript\" src=\"scripts/JsHttpRequest/Js.js\"></script>\n";
		}
		if ($_GET['module'] == "forums")
		{
			echo "		<script type=\"text/javascript\" src=\"scripts/bbcode_forum.js\"></script>\n";
		}
	echo "</head>\n";
	if ($_GET['module'] == "map")
	{
		echo "<body onload=\"start();\">\n";
	}
	else
	{
		echo "<body>\n";
	}
	echo "
	<style type=\"text/css\">
	body{cursor: url('./images/cursor/cursor.cur'), default;}
	a{cursor: url('./images/cursor/cursor2.ani'), default;}
	</style>\n";
	mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
	mysql_select_db($coolwow['db']) or die(mysql_error());
	$retour = mysql_query("SELECT * FROM mp WHERE destinataire='".$_SESSION['id']."' AND vu = '0'")or die(mysql_error());
	$donnees = mysql_fetch_assoc($retour);
	$nbm = mysql_num_rows($retour);
	if($nbm <= 0)
	{
		echo "";
	}
	elseif($nbm == 1)
	{
		echo "<p class=\"center\"><a href=\"index.php?module=messagerie\">Vous avez ".$nbm." nouveau message</a></p>";
	}
	else
	{
		echo "<p class=\"center\"><a href=\"index.php?module=messagerie\">Vous avez ".$nbm." nouveaux messages</a></p>";
	}
		echo "<div id=\"main\">
			<div id=\"menu\">
				<div id=\"centre\">";
					include("menu.php");
				echo "</div>
			</div>";
		if($vote_active == 1)
		{
			$username = $_SESSION['username'];
			$retour2 = mysql_query("SELECT DATE_FORMAT(ADDTIME(date_vote1,'020000'),'%Y%m%d%H%i%s') as datevote1 FROM vote WHERE account_name='$username'") or die(mysql_error());
			$retour3 = mysql_query("SELECT DATE_FORMAT(ADDTIME(date_vote2,'020000'),'%Y%m%d%H%i%s') as datevote2 FROM vote WHERE account_name='$username'") or die(mysql_error());
			$retour4 = mysql_query("SELECT DATE_FORMAT(ADDTIME(date_vote3,'020000'),'%Y%m%d%H%i%s') as datevote3 FROM vote WHERE account_name='$username'") or die(mysql_error());
			$donnees2 = mysql_fetch_array($retour2);
			$donnees3 = mysql_fetch_array($retour3);
			$donnees4 = mysql_fetch_array($retour4);
			$date_test1 = $donnees2['datevote1'];
			$date_test2 = $donnees3['datevote2'];
			$date_test3 = $donnees4['datevote3'];
			$date_now = date("YmdHis");
			
			if(($date_now > $date_test1) OR ($date_now > $date_test2) OR ($date_now > $date_test3))
			{
				include("fenetre_vote.php");
			}
			else
			{
				echo "";
			}
		}	 
		else 
		{ 
			echo "";
		}
			echo "<div id=\"logo\"></div>
			<br /><br />";
<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());

if($_SESSION['auth'] == "yes")
{
	switch ($_GET['action'])
	{
		default:
		break;
	}
}
else
{
	echo "<p>Page réservée aux membres !<br />";
	echo "connectez-vous ou inscrivez-vous !</p>";
	echo "<a href=\"../index.php\">Retour</a>";
}
?>
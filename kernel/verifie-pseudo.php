<?php
include("config.php");
include("fonctions.php");
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$pseudo = Securite::bdd($_GET["pseudo"]);
$account = Securite::bdd($_GET["pseudo"]);
$result = mysql_query("SELECT pseudo FROM membres WHERE pseudo='".$pseudo."'");
mysql_close();

if(mysql_num_rows($result)>=1)
{
    echo "1";
}
else
{
	echo "2";
}
?>
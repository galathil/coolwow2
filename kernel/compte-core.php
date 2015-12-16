<?php
include("config.php");
include("fonctions.php");
mysql_connect($realmd['host'], $realmd['user'], $realmd['password']) or die(mysql_error());
mysql_select_db($realmd['db']) or die(mysql_error());
$pseudo = Securite::bdd($_GET["pseudo"]);
$result = mysql_query("SELECT username FROM account WHERE username='".$pseudo."'");
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
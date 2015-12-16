<?php
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());

$ip = Securite::bdd($_SERVER['REMOTE_ADDR']);
$account = Securite::bdd($_SESSION['username']);
$time = time();

if(!empty($account))
{
	$retour4 = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM membres WHERE account_name='$account'");
	$donnees4 = mysql_fetch_array($retour4);
	if($donnees4['nbre_entrees'] == 1)
	{
		$retour5 = mysql_query("SELECT visible FROM membres WHERE account_name='$account'");
		$donnees5 = mysql_fetch_array($retour5);
		$visible = $donnees5['visible'];
	}
	else
	{
		$visible = 1;
	}
}
else
{
	$visible = 1;
}

$retour = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM connectes WHERE ip='$ip'");
$donnees = mysql_fetch_array($retour);

if ($donnees['nbre_entrees'] == 0) // L'ip ne se trouve pas dans la table, on va l'ajouter
{
    mysql_query("INSERT INTO connectes VALUES('$ip','$time','$account','$visible')");
}
else // L'ip se trouve déjà dans la table, on met juste à jour le timestamp
{
    mysql_query("UPDATE connectes SET timestamp='$time',account='$account',visible='$visible' WHERE ip='$ip'");
}

// -------
// ETAPE 2 : on supprime toutes les entrées dont le timestamp est plus vieux que 5 minutes

// On stocke dans une variable le timestamp qu'il était il y a 5 minutes :
$timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes écoulées en 5 minutes
mysql_query('DELETE FROM connectes WHERE timestamp < ' . $timestamp_5min);

// -------
// ETAPE 3 : on compte le nombre d'ip stockées dans la table. C'est le nombre de visiteurs connectés
$retour = mysql_query("SELECT COUNT(*) AS membres FROM connectes WHERE account != 'invit&eacute;'");
$donnees = mysql_fetch_array($retour);

$retour2 = mysql_query('SELECT COUNT(*) AS total FROM connectes');
$donnees2 = mysql_fetch_array($retour2);


// Ouf ! On n'a plus qu'à afficher le nombre de connectés !
echo 'Il y a actuellement '.$donnees2['total'].' visiteurs dont '.$donnees['membres'].' membres !';

//on affiche les nom des persos.
echo "<br/><br/>";
$retour3 = mysql_query('SELECT * FROM connectes WHERE visible = 1');
while ($donnees3 = mysql_fetch_array($retour3,MYSQL_ASSOC))
{
	$perso = $donnees3['account'];
	if(empty($perso) OR ($perso == NULL) or ($perso == "invit&eacute;"))
	{
		echo "";
	}
	else
	{
		echo $perso;
		echo "<br />";
	}
}
?>
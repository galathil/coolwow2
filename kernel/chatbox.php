<?
require("config.php");

	mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
	mysql_select_db($coolwow['db']) or die(mysql_error());
	$retour_total=mysql_query('SELECT COUNT(*) AS total FROM chatbox'); //Nous récupérons le contenu de la requête dans $retour_total
	$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
	$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
	$reponse = mysql_query("SELECT * FROM chatbox ORDER BY id_msg DESC LIMIT 0,49 ") or die(mysql_error());
	mysql_close();
	
	if ($total == 0)
	{
		echo "Il n'y a pour le moment aucun message dans la chatbox !";
	}
	else
	{
		while ($donnees = mysql_fetch_array($reponse,MYSQL_ASSOC))
		{
			$date = $donnees['date_msg'];
			$date = substr($date,11,5);
			if($donnees['gmlevel'] > 0)
			{
				echo "<span style=\"color:red;\"><b>A ".$date.", ".$donnees['auteur_msg']." - MJ :</b> ".$donnees['msg']."</span><br />";
			}
			else
			{
				echo "<b>A ".$date.", ".$donnees['auteur_msg']." :</b> ".$donnees['msg']."<br />";
			}
		}
	}
?>
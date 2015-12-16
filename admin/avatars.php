<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
$nom_repertoire = '../images/avatars';
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_avatars"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "supprimer";
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$image = Securite::bdd($_GET['image']);
				echo "<p class=\"title\">Êtes-vous sûr de vouloir supprimer cette image ?</p>
				<p><img src=\"".$nom_repertoire."/".$image."\"></p>
				<form action=\"index.php?module=avatars&action=supprimer_v\" method=\"POST\">
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"hidden\" name=\"name\" value='$image'>
					<input type=\"submit\" name=\"del\" value=\"Oui\">
				</form>
				<a href='javascript:history.go(-1)'>Retour</a>";
			break;
			case "supprimer_v";
				verify_xsrf_token();
				$image = Securite::bdd($_POST['name']);
				unlink("".$nom_repertoire."/".$image."");
				echo "<p>L'image a bien été supprimée !</p>";
				echo "<a href=\"index.php?module=avatars\">Retour</a>";
			break;
			default:
				echo "<p class=\"title\">Gestion de avatars</p><br />";
				echo'<table class="lined" align="center">
				    <tr>
				        <td>Image</td>
				        <td>Nom de l\'image</td>
						<td>Supprimer</td>
				    </tr>';

				$pointeur = opendir($nom_repertoire);
				$i = 0;

				while ($fichier = readdir($pointeur))
				{      
				    if (substr($fichier, -3) == "gif" || substr($fichier, -3) == "jpg" || substr($fichier, -3) == "png" 
					|| substr($fichier, -4) == "jpeg" || substr($fichier, -3) == "PNG" || substr($fichier, -3) == "GIF" 
					|| substr($fichier, -3) == "JPG")
				    {
				        $tab_image[$i] = $fichier;
				        $i++;      
				    }      
				}
				closedir($pointeur);
				array_multisort($tab_image, SORT_ASC);
				for ($j=0;$j<=$i-1;$j++)
				{
				    $image = '<img src="'.$nom_repertoire.'/'.$tab_image[$j].'" width="60" height="60">';
				    echo'<tr>
				        <td align="center">'.$image.'</td>
				        <td align="center">'.$tab_image[$j].'</td>
						<td><a href="index.php?module=avatars&action=supprimer&image='.$tab_image[$j].'"><img src="../images/delete.gif" /></a></td>
				    </tr>';      
				}
		        echo '</table>'; 
			break;
		}
	}
	else
	{
		echo "<p>Ce module est désactivé, merci de voir avec l'administrateur !</p>";
		echo "<a href=\"../index.php\">Retour</a>";
	}
}
elseif(Securite::bdd($_SESSION['auth']) != "yes")
{ 
	header("location: ../index.php");
	exit();
}
elseif(Securite::bdd($_SESSION['gmlevel']) <= $rep['config_value2'])
{
	echo "<p>".Securite::bdd($_SESSION['username'])." vous n'êtes pas autorisé à accéder à cette partie !</p>";
	echo "<a href=\"../index.php\">Retour</a>";
}
else
{
	echo "<p>Erreur</p>";
	echo "<a href=\"../index.php\">Retour</a>";;
}	
?>
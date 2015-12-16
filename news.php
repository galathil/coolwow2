<?php
require("kernel/bbcode.php");
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());

$page_get = mysql_real_escape_string(htmlspecialchars($_GET['page'], ENT_QUOTES));
if(empty($page_get))
{
	$truc = 1;
}
elseif(!ctype_digit($page_get)) //verifi si il n'y a pas de lettre
{
	$truc = 1;
}
else
{
	$truc = $page_get;
}

	$ParPage = $News_Par_Page; //Nous allons afficher 5 messages par page.
	//Une connexion SQL doit être ouverte avant cette ligne...
	$retour_total=mysql_query('SELECT COUNT(*) AS total FROM news'); //Nous récupérons le contenu de la requête dans $retour_total
	$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
	$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
	//Nous allons maintenant compter le nombre de pages.
	$nombreDePages=ceil($total/$ParPage);
		
	if(isset($truc)) // Si la variable $_GET['page'] existe...
	{
		$pageActuelle=intval($truc);
		if($pageActuelle>$nombreDePages) // Si la valeur de $pageActuelle (le numéro de la page) est plus grande que $nombreDePages...
		{
			$pageActuelle=$nombreDePages;
		}
	}
	else // Sinon
	{
		$pageActuelle=1; // La page actuelle est la n°1    
	}
	$premiereEntree=($pageActuelle-1)*$ParPage; // On calcul la première entrée à lire
	
if($truc <= $nombreDePages)
{
	$reponse = mysql_query("SELECT * FROM news ORDER BY idnews DESC LIMIT $premiereEntree, $ParPage") or die(mysql_error());

	while ($donnees = mysql_fetch_array($reponse))
	{
		$date = $donnees['date_news'];
		$date1 = substr($date,8,2)."/";        // jour 
		$date2 = $date1.substr($date,5,2)."/";  // mois 
		$date3 = $date2.substr($date,0,4). " "; // année 
		$date4 = $date3.substr($date,11,5); //heur


									echo "<p class=\"title\">".$donnees['titre']."";
									echo "<br /><p>";
									echo bbcode(nl2br(Securite::html($donnees['news'])));
									echo "</p><br />";
									if (empty($donnees['maj_par']))
									{
										echo "";
									}
									else
									{
										echo "<p class=\"modif_news\">Edité par ".$donnees['maj_par']."</p>";
									}
									echo "<p class=\"foot_news\">Posté par ".$donnees['auteur']." le ".$date4."";
									if($_SESSION['auth'] == "yes" AND $_SESSION['gmlevel'] >= $news)
									{
										echo " - <a href='admin/index.php?module=news&action=delete&id=".$donnees['idnews']."'><img src='images/delete.gif' /></a> <a href='admin/index.php?module=news&action=modify&id=".$donnees['idnews']."'><img src='images/edit.png' /></a>";
									}
									else
									{
										echo "";
									}
									echo "</p>";
		if($total != 1)
		{
								echo "</td>
												</tr>
											</table>
										</td>	
										<td class=\"md\" width=\"11\"></td>
									</tr>
									<tr>
									  <td width=\"21\"><img src=\"themes/$theme/bg.png\" width=\"21\" height=\"21\" ALT=\"bg\" /></td>
									  <td class=\"bm\"></td>
									  <td width=\"21\"><img src=\"themes/$theme/bd.png\" width=\"21\" height=\"21\" ALT=\"bd\" /></td>
									</tr>
								</table>
								</td>
							</tr>
						</table>
						<table width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
							<tr>
								<td>
								<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" >
									<tr>
									  <td width=\"21\"><img src=\"themes/$theme/hg.png\" width=\"21\" height=\"21\" ALT=\"hg\" /></td>
									  <td class=\"hm\" width=\"100%\"></td>
									  <td width=\"21\"><img src=\"themes/$theme/hd.png\" width=\"21\" height=\"21\" ALT=\"hd\" /></td>
									</tr>
								</table>
								<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
									<tr>
										<td class=\"mg\" width=\"12\"></td>
										<td>
											<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
												<tr>
													<td class=\"fond\" align=\"left\">";
		}
		else
		{
			echo "";
		}
	}
	echo "<p id=\"pagination\">";
		$max_pg = ceil($total / $ParPage); //le nombre de page maximum...en partant de 1
		$page_test = $page_get; //la page que je suis rendu actuellement dans l;'affichage
		$nb = 9; //le nombre de résultats pour l'affichage TOUJOUR UN NOMBRE IMPERE.
		$nbm = ( $nb - 1 ) / 2;
		if (empty($page_test))
		{
			$page = 1;
		}
		else
		{
			$page = $page_test;
		}
		if ($max_pg == 1)
		{
			//echo "Page 1 sur 1";
		}
		elseif ($max_pg == 0)
		{
			echo "Il n'y a aucunes News pour le momment !";
		}
		else
		{
			echo "<font size=\"-1\">Pages ".$page." sur ".($max_pg)."</font><br />";
			if ($nb > $max_pg) // Si moin de page que le nombre de résultats pour l'affichage
			{
				echo ($page !=1 ) ? '<a href="index.php?page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
				for($i = 1 ; $i < $max_pg+1 ; $i++)
				{
					if($i == $page)
					{
						echo ' <b><a>'.$i.'</a></b>';
					}
					else
					{
						echo ' <a href="index.php?page='.$i.'">'.$i.'</a>';
					}
				}
				echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?page='.($page+1).'">Suivante --></a>' : '';
			}
			elseif ($page <= $nbm) // les premieres pages
			{
				echo ($page !=1 ) ? '<a href="index.php?page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
				for($i = 1 ; $i < $nb+1 ; $i++)
				{
					if($i == $page)
					{
						echo ' <b><a>'.$i.'</a></b>';
					}
					else
					{
						echo ' <a href="index.php?page='.$i.'">'.$i.'</a>';
					}
				}
				echo " ...<a href=\"index.php?page=".($max_pg)."\">".($max_pg)."</a>";
				echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?page='.($page+1).'">Suivante --></a>' : '';
			}
			elseif ($page >= $max_pg - $nbm) // les dernieres pages
			{
				echo ($page !=1 ) ? '<a href="index.php?page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
				echo '<a href="index.php?page=1">1</a>... ';
				for($i = $max_pg-($nb-1) ; $i < $max_pg+1 ; $i++)
				{
					if($i == $page)
					{
						echo ' <b><a>'.$i.'</a></b>';
					}
					else
					{
						echo ' <a href="index.php?page='.$i.'">'.$i.'</a>';
					}
				}
				echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?page='.($page+1).'">Suivante --></a>' : '';
			}
			else // les autres pages
			{
				echo ($page !=1 ) ? '<a href="index.php?page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
				echo '<a href="index.php?page=1">1</a>... ';
				for($i = 1 ; $i < $nbm+1 ; $i++)
				{
					$i_page = $page - ($nbm+1) + $i;
					echo ' <a href="index.php?page='.$i_page.'">'.$i_page.'</a>';
				}
				echo ' <b><a>'.$page.'</a></b>';
				for($i = 1 ; $i < $nbm+1 ; $i++)
				{
					$i_page = $page + $i;
					echo ' <a href="index.php?page='.$i_page.'">'.$i_page.'</a>';
				}
				echo " ...<a href=\"index.php?page=".($max_pg)."\">".($max_pg)."</a>";
				echo ($page != $max_pg-1 ) ? '&nbsp;&nbsp;<a href="index.php?page='.($page+1).'">Suivante --></a>' : '';
			}
		}
}
else
{
	echo "<table width=\"100%\" align=\"center\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
	  <tr>
		<td>
		<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" >
	        <tr>
	          <td width=\"21\"><img src=\"themes/WLK/images/tour/hg.png\" width=\"21\" height=\"21\" ALT=\"hg\" /></td>
	          <td class=\"hm\" width=\"100%\"></td>
	          <td width=\"21\"><img src=\"themes/WLK/images/tour/hd.png\" width=\"21\" height=\"21\" ALT=\"hd\" /></td>
	        </tr>
		</table>
		<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
	        <tr>
				<td class=\"mg\" width=\"12\"></td>
				<td>
					<table width=\"100%\" bgcolor=\"#ffffff\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
						<tr>
							<td class=\"fond\" align=\"left\">";
								echo "<p>Cette page n'existe pas !</p>";
								echo "<p><a href=\"index.php\">Retour</a></p>";
							echo "</td>
						</tr>
					</table>
				</td>	
				<td class=\"md\" width=\"11\"></td>
	        </tr>
	        <tr>
	          <td width=\"21\"><img src=\"themes/WLK/images/tour/bg.png\" width=\"21\" height=\"21\" ALT=\"bg\" /></td>
	          <td class=\"bm\"></td>
	          <td width=\"21\"><img src=\"themes/WLK/images/tour/bd.png\" width=\"21\" height=\"21\" ALT=\"bd\" /></td>
	        </tr>
		</table>
	</table>
	";
}
?>
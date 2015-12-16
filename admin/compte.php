<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
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

mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_compte"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "supprimer":
				$get = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				$reponse = mysql_query("SELECT * FROM membres WHERE id='$get'") or die(mysql_error());
				echo "<p class=\"title\">Êtes-vous sûr de vouloir supprimer ce compte ?</p>";
				while ($donnees = mysql_fetch_row($reponse))
					{
					echo "$donnees[1]<br /><br />";
					$id = "$donnees[0]";
					echo "<form action=\"index.php?module=compte&action=del\" method=\"POST\"><input type=\"hidden\" name=\"id\" value='$id'><input type=\"submit\" name=\"del\" value=\"Oui\"></form>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
			break;
			case "del":
				$post = mysql_real_escape_string(htmlspecialchars($_POST['id'], ENT_QUOTES));
				if (isset($post)) // Si les variables existent
				{
					if ($post != NULL) // Si on a quelque chose à enregistrer
					{
						mysql_query("DELETE FROM membres WHERE id='$post'") or die("Erreur de suppression");
						// On se déconnecte de MySQL
						echo "<p>Le compte a été supprimé !</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p>Erreur !!!</b></p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>ERREUR!!!</b></p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "editer":
				$membre = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				$requete1 = mysql_query("SELECT * FROM membres WHERE id= $membre");
				if ($data1 = mysql_fetch_assoc($requete1))
				{	
					echo "<p class=\"title\">Profil de ".$data1['account_name']."</p><br />";
					echo "<form action=\"index.php?module=compte&action=editer_v\" method=\"POST\">";
					echo "<p><img src=\"images/avatars/".$data1['membre_avatar']."\" alt=\"Aucun avatar\" /></p>";
					echo "<table>";
					echo "<tr><td>ID du compte: </td>";
					echo "<td><input readonly type=\"text\" size=\"50\" name=\"id\" value=\"".$data1['id']."\" /></td></tr>";
					echo "<tr><td>Nom du compte: </td>";
					echo "<td><input type=\"text\" size=\"50\" name=\"account_name\" value=\"".$data1['account_name']."\" /></td></tr>";
					echo "<tr><td>Pseudo: </td>";
					echo "<td><input type=\"text\" size=\"50\" name=\"pseudo\" value=\"".$data1['pseudo']."\" /></td></tr>";
					echo "<tr><td>Adresse IP: </td>";
					echo "<td><input readonly type=\"text\" size=\"50\" name=\"ip\" value=\"".$data1['membre_ip']."\" /></td></tr>";
					echo "<tr><td>Dernière connexion du site: </td>";
					echo "<td><input readonly type=\"text\" size=\"50\" name=\"ip\" value=\"".$data1['membre_derniere_visite']."\" /></td></tr>";
					echo "<tr><td>Nombre de point de vote: </td>";
					echo "<td><input type=\"text\" size=\"50\" name=\"nb_point_vote\" value=\"".$data1['nb_point_vote']."\" /></td></tr>";
					echo "<tr><td>Nombre de vote: </td>";
					echo "<td><input type=\"text\" size=\"50\" name=\"total_vote\" value=\"".$data1['total_vote']."\" /></td></tr>";
					echo "<tr><td>Adresse E-Mail: </td>";
					echo "<td><input type=\"text\" size=\"50\" name=\"mail\" value=\"".$data1['membre_email']."\" /></td></tr>";
					echo "<tr><td>Afficher votre E-Mail: </td>";
					echo "<td><select name=\"cacher_email\">
								<option value=\"0\">Oui</option>
								<option SELECTED value=\"1\">Non</option>
							</select></td></tr>";
					echo "<td>Windows Live Messenger: </td>";
					echo "<td><input type=\"text\" size=\"50\" name=\"msn\" value=\"".$data1['membre_msn']."\" /></td></tr>";
					echo'<tr><td>Site Web: </td>';
					echo "<td><input type=\"text\" size=\"50\" name=\"siteweb\" value=\"".$data1['membre_siteweb']."\" /></td></tr>";
					echo'<tr><td>Localisation: </td>';
					echo "<td><input type=\"text\" size=\"50\" name=\"localisation\" value=\"".$data1['membre_localisation']."\" /></td></tr>";
					echo'<tr><td>Inscrit depuis le: </td>';
					echo "<td><input readonly type=\"text\" size=\"10\" name=\"inscrit\" value=\"".date('d/m/Y',$data1['membre_inscrit'])."\" /></td></tr>";
					echo'<tr><td>Nombres de message: </td>';
					echo "<td><input readonly type=\"text\" size=\"4\" name=\"post\" value=\"".$data1['membre_post']."\" /></td></tr>";
					echo "</tr><td>Signature: </td>";
					echo "<td><textarea name=\"signature\" rows=\"4\" cols=\"30\" maxsize=\"200\">".$data1['membre_signature']."</textarea></td></tr>";
					echo "</table><br />";
					echo "<input type=\"submit\" value=\"Modifier\" />";
					echo "</form>";
				}
				else
				{
					echo "<p>Erreur, merci de prevenir le webmaster</p>";
				}
			break;
			case "editer_v":
				$id = mysql_real_escape_string(htmlspecialchars($_POST['id'], ENT_QUOTES));
				$account_name = mysql_real_escape_string(htmlspecialchars($_POST['account_name'], ENT_QUOTES));
				$pseudo = mysql_real_escape_string(htmlspecialchars($_POST['pseudo'], ENT_QUOTES));
				$mail = mysql_real_escape_string(htmlspecialchars($_POST['mail'], ENT_QUOTES));
				$nb_point_vote = mysql_real_escape_string(htmlspecialchars($_POST['nb_point_vote'], ENT_QUOTES));
				$total_vote = mysql_real_escape_string(htmlspecialchars($_POST['total_vote'], ENT_QUOTES));
				$cacher_email = mysql_real_escape_string(htmlspecialchars($_POST['cacher_email'], ENT_QUOTES));
				$msn = mysql_real_escape_string(htmlspecialchars($_POST['msn'], ENT_QUOTES));
				$siteweb = mysql_real_escape_string(htmlspecialchars($_POST['siteweb'], ENT_QUOTES));
				$localisation = mysql_real_escape_string(htmlspecialchars($_POST['localisation'], ENT_QUOTES));
				$signature = mysql_real_escape_string(htmlspecialchars($_POST['signature'], ENT_QUOTES));
				if(empty($mail))
				{
					echo "<p>L'adresse mail est obligtoire !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
				else
				{
					if (!eregi("^[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-_.]?[0-9a-z])*\\.[a-z]{2,4}$",$mail))
					{
						echo "L'adresse e-mail n'est pas correcte !!!";
						echo "<br /><a href='javascript:history.go(-1)'>Retour</a>";
					}
					else
					{
						if(empty($siteweb))
						{
							mysql_query("UPDATE membres SET account_name='$account_name', pseudo='$pseudo', membre_email='$mail', membre_msn='$msn', membre_siteweb='$siteweb', membre_signature='$signature', membre_localisation='$localisation', cacher_email='$cacher_email', nb_point_vote='$nb_point_vote', total_vote='$total_vote' WHERE id ='$id'") or die(mysql_error());
							echo "<p>Votre Profil a été mise a jour !</p>";
							echo "<a href='javascript:history.go(-2)'>Retour</a>";
						}
						else
						{
							if(!eregi('http://(.+)\.(.+)', $siteweb))
							{
								echo "<p>l'adresse d'un site web commence par \"http://\" !!!</p>";
								echo "<a href='javascript:history.go(-1)'>Retour</a>";
							}
							else
							{
								mysql_query("UPDATE membres SET account_name='$account_name', pseudo='$pseudo', membre_email='$mail', membre_msn='$msn', membre_siteweb='$siteweb', membre_signature='$signature', membre_localisation='$localisation', cacher_email='$cacher_email', nb_point_vote='$nb_point_vote', total_vote='$total_vote' WHERE id ='$id'") or die(mysql_error());
								echo "<p>Votre Profil a été mise a jour !</p>";
								echo "<a href='javascript:history.go(-2)'>Retour</a>";
							}
						}
					}
				}
			break;
			case "resultat";
				$perso = mysql_real_escape_string($_POST['perso']);
				$by = mysql_real_escape_string($_POST['by']);
				$requete = mysql_query("SELECT * FROM membres WHERE $by LIKE'%$perso%'");
				echo "<p class=\"title\">Resultat de la recherche</p><br />";
				
				echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th class='milieu' width=\"30\"></th>
								<th width=\"30\"></th>
								<th width=\"30\">ID</th>
								<th>Compte</th>
								<th>E-mail</th>
								<th>Point de vote</th>
								<th>Dernier vote</th>
								<th>Inscript</th>
								<th>Dernière visite</th>
							</tr>";
					while($donnees = mysql_fetch_assoc($requete))
					{
						$inscrit = date('d-m-Y H:i:s', $donnees['membre_inscrit']);
						$visite = date('d-m-Y H:i:s', $donnees['membre_derniere_visite']);
						$id = $donnees['id'];
						echo"<tr><td align=\"center\">";
						echo"<a href=\"index.php?module=compte&action=supprimer&id=$id\"><img src='../images/delete.gif' /></a>";
						echo"</td><td align=\"center\">";
						echo"<a href=\"index.php?module=compte&action=editer&id=$id\"><img src='../images/edit.png' /></a>";
						echo"</td><td align=\"center\">";
						echo $donnees['id'];
						echo"</td><td align=\"center\">";
						echo $donnees['account_name'];
						echo"</td><td align=\"center\">";
						echo $donnees['membre_email'];
						echo"</td><td align=\"center\">";
						echo $donnees['nb_point_vote'];
						echo"</td><td align=\"center\">";
						echo $donnees['date_vote'];
						echo"</td><td align=\"center\">";
						echo $inscrit;
						echo"</td><td align=\"center\">";
						echo $visite;
						echo"</td>";
						echo"</tr>";
					}
					echo "</table>";
			break;
			default:
				$ParPage = $Par_Page; //Nous allons afficher 5 messages par page.
				//Une connexion SQL doit être ouverte avant cette ligne...
				$retour_total=mysql_query('SELECT COUNT(*) AS total FROM membres'); //Nous récupérons le contenu de la requête dans $retour_total
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
			
				$retour_messages = mysql_query('SELECT * FROM membres ORDER BY account_name ASC LIMIT '.$premiereEntree.', '.$ParPage.'');
				echo "<p class=\"title\">Gestion des comptes</p><br />";
				echo "
				<form action=\"index.php?module=compte&action=resultat\" method=\"POST\">Rechercher 
					<select name=\"by\">
						<option value=\"id\">par ID</option>
						<option selected value=\"account_name\">par Nom du compte</option>
						<option value=\"pseudo\">par pseudo</option>
						<option value=\"email\">par Email</option>
						<option value=\"vote\">par Vote</option>
					</select>
					<input type=\"text\" name=\"perso\"><input type=\"submit\" value=\"Rechercher\">
				</form><br />";
					//Aperçu
					echo "<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; width='90%' border='1' cellspacing='1' cellpadding='1'>
							<tr>
								<th class='milieu' width=\"30\"><a href='index.php?module=compte&action=ajouter'><img src='../images/add.png' /></a></th>
								<th width=\"30\"></th>
								<th width=\"30\">ID</th>
								<th>Compte</th>
								<th>E-mail</th>
								<th>Point de vote</th>
								<th>Dernier vote</th>
								<th>Inscript</th>
								<th>Dernière visite</th>
							</tr>";
					while($donnees = mysql_fetch_assoc($retour_messages))
					{
						$inscrit = date('d-m-Y H:i:s', $donnees['membre_inscrit']);
						$visite = date('d-m-Y H:i:s', $donnees['membre_derniere_visite']);
						$id = $donnees['id'];
						echo"<tr><td align=\"center\">";
						echo"<a href=\"index.php?module=compte&action=supprimer&id=$id\"><img src='../images/delete.gif' /></a>";
						echo"</td><td align=\"center\">";
						echo"<a href=\"index.php?module=compte&action=editer&id=$id\"><img src='../images/edit.png' /></a>";
						echo"</td><td align=\"center\">";
						echo $donnees['id'];
						echo"</td><td align=\"center\">";
						echo $donnees['account_name'];
						echo"</td><td align=\"center\">";
						echo $donnees['membre_email'];
						echo"</td><td align=\"center\">";
						echo $donnees['nb_point_vote'];
						echo"</td><td align=\"center\">";
						echo $donnees['date_vote'];
						echo"</td><td align=\"center\">";
						echo $inscrit;
						echo"</td><td align=\"center\">";
						echo $visite;
						echo"</td>";
						echo"</tr>";
					}
					echo "<tr><td class='milieu'><a href='index.php?module=compte&action=ajouter'><img src='../images/add.png' /></a></td>
					<td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
					echo "</table><br />";
					echo "<a href=\"index.php?module=compte&action=supprimer_perso\">Supprimer un perso</a>";
					 
					$max_pg = ceil($total / $ParPage); //le nombre de page maximum...en partant de 1
					$page_test = $truc; //la page que je suis rendu actuellement dans l;'affichage
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
						echo "<p>Page 1 sur 1</p>";
					}
					else
					{
						echo "<p><font size=\"-1\">Pages ".$page." sur ".($max_pg)."</font><br />";
						if ($nb > $max_pg) // Si moin de page que le nombre de résultats pour l'affichage
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							for($i = 1 ; $i < $max_pg+1 ; $i++)
							{
								if($i == $page)
								{
									echo ' <b><a>'.$i.'</a></b>';
								}
								else
								{
									echo ' <a href="index.php?module=compte&page='.$i.'">'.$i.'</a>';
								}
							}
							echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?module=compte&page='.($page+1).'">Suivante --></a></p>' : '';
						}
						elseif ($page <= $nbm) // les premieres pages
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							for($i = 1 ; $i < $nb+1 ; $i++)
							{
								if($i == $page)
								{
									echo ' <b><a>'.$i.'</a></b>';
								}
								else
								{
									echo ' <a href="index.php?module=compte&page='.$i.'">'.$i.'</a>';
								}
							}
							echo " ...<a href=\"index.php?module=compte&page=".($max_pg)."\">".($max_pg)."</a>";
							echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?module=compte&page='.($page+1).'">Suivante --></a></p>' : '';
						}
						elseif ($page >= $max_pg - $nbm) // les dernieres pages
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							echo '<a href="index.php?module=compte&page=1">1</a>... ';
							for($i = $max_pg-($nb-1) ; $i < $max_pg+1 ; $i++)
							{
								if($i == $page)
								{
									echo ' <b><a>'.$i.'</a></b>';
								}
								else
								{
									echo ' <a href="index.php?module=compte&page='.$i.'">'.$i.'</a>';
								}
							}
							echo ($page != $max_pg ) ? '&nbsp;&nbsp;<a href="index.php?module=compte&page='.($page+1).'">Suivante --></a></p>' : '';
						}
						else // les autres pages
						{
							echo ($page !=1 ) ? '<a href="index.php?module=compte&page='.($page-1).'"><-- Précédente</a>&nbsp;&nbsp;' : ''; 
							echo '<a href="index.php?module=compte&page=1">1</a>... ';
							for($i = 1 ; $i < $nbm+1 ; $i++)
							{
								$i_page = $page - ($nbm+1) + $i;
								echo ' <a href="index.php?module=compte&page='.$i_page.'">'.$i_page.'</a>';
							}
							echo ' <b><a>'.$page.'</a></b>';
							for($i = 1 ; $i < $nbm+1 ; $i++)
							{
								$i_page = $page + $i;
								echo ' <a href="index.php?module=compte&page='.$i_page.'">'.$i_page.'</a>';
							}
							echo " ...<a href=\"index.php?module=compte&page=".($max_pg)."\">".($max_pg)."</a>";
							echo ($page != $max_pg-1 ) ? '&nbsp;&nbsp;<a href="index.php?module=compte&page='.($page+1).'">Suivante --></a></p>' : '';
						}
					}
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
<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_boutique"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		require_once("../kernel/fonctions_armurerie.php");
		switch ($_GET['action'])
		{
			// ACHAT
			case "achat":
				$type = mysql_real_escape_string(htmlspecialchars($_GET['type'], ENT_QUOTES));
				if(empty($type) or !isset($type))
				{
					echo "erreur";
				}
				else
				{
					if($type == "objet")
					{
						echo "<p class=\"title\">Les articles divers</p><br />";
					}
					elseif($type == "level")
					{
						echo "<p class=\"title\">Les niveaux</p><br />";
					}
					elseif($type == "metiers")
					{
						echo "<p class=\"title\">Les objets métiers</p><br />";
					}
					elseif($type == "montures")
					{
						echo "<p class=\"title\">Les montures</p><br />";
					}
					elseif($type == "pieces")
					{
						echo "<p class=\"title\">Les pièces d'or</p><br />";
					}
					elseif($type == "arene")
					{
						echo "<p class=\"title\">Les points d'arène</p><br />";
					}
					elseif($type == "honneur")
					{
						echo "<p class=\"title\">Les points d'honneur</p><br />";
					}
					elseif($type == "set")
					{
						echo "<p class=\"title\">Les objets de Set</p><br />";
					}
					
					$retour_total=mysql_query('SELECT COUNT(*) AS total FROM boutique WHERE type="'.$type.'"'); //Nous récupérons le contenu de la requête dans $retour_total
					$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
					$total=$donnees_total['total']; //On récupère le total pour le placer dans la variable $total.
					$retour_messages = mysql_query('SELECT * FROM boutique WHERE type="'.$type.'" ORDER BY ID ASC');
					
					echo "<table class=\"lined\" width=\"70%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
								<tr>
								<th><a href='index.php?module=boutique&action=ajouter'><img src='../images/add.png' /></a></th>
								<th></th>
								<th>ID</th>
								<th>Nom de l'article</th>
								<th>Quantité</th>
								<th>ID de l'article</th>
								<th>Icônes</th>
								<th>Prix</th>
								</tr>";
					if ($total == 0)
					{
						echo "<tr><td colspan=\"8\"><center><b>Aucuns articles !!!</b></center></td></tr>";
					}
					else
					{
						while($donnees = mysql_fetch_assoc($retour_messages))
						{
							$id = $donnees['ID'];
							$id_item = $donnees['ID_item'];
							echo "<tr><td align=\"center\">";
							echo "<a href=\"index.php?module=boutique&action=supprimer&id=$id\"><img src='../images/delete.gif' /></a>";
							echo "</td><td align=\"center\">";
							echo "<a href=\"index.php?module=boutique&action=editer&id=$id\"><img src='../images/edit.png' /></a>";
							echo "</td><td align=\"center\">";
							echo $donnees['ID'];
							echo "</td><td align=\"center\">";
							echo $donnees['name'];
							echo "</td><td align=\"center\">";
							echo $donnees['quantity'];
							echo "</td><td align=\"center\">";
							if(($type == "pieces") or ($type == "honneur") or ($type == "arene") or ($type == "level"))
							{
								echo "n/a";
							}
							else
							{
								echo $donnees['ID_item'];
							}
							echo"</td><td align=\"center\">";
							if(($type == "pieces") or ($type == "honneur") or ($type == "arene") or ($type == "level"))
							{
								echo "n/a";
							}
							else
							{
								echo "<a href=\"http://fr.wowhead.com/?item=".$id_item."\"><img src=\"".get_icon2($id_item)."\" /></a>";
							}
							echo "</td><td align=\"center\">";
							echo "".$donnees['price']." PV";						
						}
					}
					echo "<tr><td class='milieu'><center><a href='index.php?module=boutique&action=ajouter'><img src='../images/add.png' /></a></center></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
					echo "</table><br />";
				}
			break;
			
			// AJOUTER
			case "ajouter":
				echo "
				<p class=\"title\">Ajouter un article dans la boutique</p>
				<br />
				<center><form action=\"index.php?module=boutique&action=ajouter_valide\" method=\"POST\">
						<table>
							<tr>
								<td align=\"left\">Type de l'article :</td>
								<td align=\"left\">
									<select name=\"type\">
										<option value=\"objet\">Un objet</option>
										<option value=\"level\">un niveau</option>
										<option value=\"metiers\">un objet métier</option>
										<option value=\"montures\">une monture</option>
										<option value=\"arene\">point d'arène</option>
										<option value=\"honneur\">point d'honneur</option>
										<option value=\"set\">objet de Set</option>
									</select>
								</td>
							</tr>
							<tr>
								<td align=\"left\">Pour le classe :</td>
								<td align=\"left\">
									<select name=\"class\">
										<option value=\"0\">Toutes les classes</option>
										<option value=\"1\">Guerrier</option>
										<option value=\"2\">Paladin</option>
										<option value=\"3\">Chasseur</option>
										<option value=\"4\">Voleur</option>
										<option value=\"5\">Prêtre</option>
										<option value=\"6\">Chevalier de la mort</option>
										<option value=\"7\">Chaman</option>
										<option value=\"8\">Mage</option>
										<option value=\"9\">Démoniste</option>
										<option value=\"11\">Druide</option>
									</select>
								</td>
							</tr>
							<tr>
								<td align=\"left\">Nom de l'article (exemple : 15 po) :</td>
								<td align=\"left\"><input type=\"text\" name=\"name\" size=\"30\" maxsize=\"255\"></td>
							</tr>
							<tr>
								<td align=\"left\">Quantité (exemple : 15 po = 150000) :</td>
								<td align=\"left\"><input type=\"text\" name=\"quantity\" size=\"30\" maxsize=\"255\"></td>
							</tr>
							<tr>
								<td align=\"left\">ID de l'article (pour les ojet uniquement) :</td>
								<td align=\"left\"><input type=\"text\" name=\"id_item\" size=\"30\" maxsize=\"255\"></td>
							</tr>
							<tr>
								<td align=\"left\">Prix de l'article (en points de vote) :</td>
								<td align=\"left\"><input type=\"text\" name=\"price\" size=\"30\" maxsize=\"255\"> PV</td>
							</tr>
						</table><br />
					<br />
					<input type=\"submit\" value=\"Ajouter\"><br /><br />
					<a href='javascript:history.go(-1)'>Retour</a>
				</form></center>";
			break;
			case "ajouter_valide":
				$type = mysql_real_escape_string(htmlspecialchars($_POST['type'], ENT_QUOTES));
				$class = mysql_real_escape_string(htmlspecialchars($_POST['class'], ENT_QUOTES));
				$name = mysql_real_escape_string(htmlspecialchars($_POST['name'], ENT_QUOTES));
				$quantity = mysql_real_escape_string(htmlspecialchars($_POST['quantity'], ENT_QUOTES));
				$id_item = mysql_real_escape_string(htmlspecialchars($_POST['id_item'], ENT_QUOTES));
				$price = mysql_real_escape_string(htmlspecialchars($_POST['price'], ENT_QUOTES));
				
				if (!empty($type) or !empty($class) or !empty($name) or !empty($quantity) or !empty($id_item) or !empty($price))
				{
					mysql_query("INSERT INTO boutique (type,name,ID_item,quantity,price,class) VALUES ('$type','$name','$id_item','$quantity','$price','$class')") or die(mysql_error());
					echo "<center><p>L'article a bien été ajouté.</p></center>";
					echo "<center><a href='javascript:history.go(-2)'>Retour</a></center>";
				}
				else
				{
					echo '<div class="erreur">Tout les champs ne sont pas remplis</div>';
				}
			break;
			
			// EDITER
			case "editer":
				$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				$donnees1 = mysql_query("SELECT * FROM boutique WHERE ID='$id'");
				while($donnees = mysql_fetch_assoc($donnees1))
				{
					$id = $donnees['ID'];
					$type = $donnees['type'];
					$class = $donnees['class'];
					$name = $donnees['name'];
					$quantity = $donnees['quantity'];
					$id_item = $donnees['ID_item'];
					$price = $donnees['price'];
					
					echo "
					<p class=\"title\">Modifier un article de la boutique :</p>
					<br />
					<center><form action=\"index.php?module=boutique&action=editer_valide\" method=\"POST\">
						<table>
							<tr>
								<td align=\"left\">ID :</td>
								<td align=\"left\"><input readonly type=\"text\" name=\"id\" size=\"30\" maxsize=\"255\" value=\"$id\"></td>
							</tr>
							<tr>
								<td align=\"left\">Type de l'article :</td>
								<td align=\"left\"><input readonly type=\"text\" name=\"type\" size=\"30\" maxsize=\"255\" value=\"$type\"></td>
							</tr>
							<tr>
								<td align=\"left\">Nom de l'article (exemple : 15 po) :</td>
								<td align=\"left\"><input type=\"text\" name=\"name\" size=\"30\" maxsize=\"255\" value=\"$name\" ></td>
							</tr>
							<tr>
								<td align=\"left\">Quantité (exemple : 15 po = 150000):</td>
								<td align=\"left\"><input type=\"text\" name=\"quantity\" size=\"30\" maxsize=\"255\" value=\"$quantity\"></td>
							</tr>";
							if(($type == "pieces") or ($type == "honneur") or ($type == "arene") or ($type == "level"))
							{
								echo "<input type=\"hidden\" name=\"id_item\" value=\"0\">";
							}
							else
							{
								echo "
								<tr>
									<td align=\"left\">ID de l'article (pour les ojet uniquement) :</td>
									<td align=\"left\"><input type=\"text\" name=\"id_item\" size=\"30\" maxsize=\"255\" value=\"$id_item\"></td>
								</tr>";
							}
							echo "<tr>
								<td align=\"left\">Prix de l'article (en points de vote) :</td>
								<td align=\"left\"><input type=\"text\" name=\"price\" size=\"30\" maxsize=\"255\" value=\"$price\"> PV</td>
							</tr>
						</table><br />
						<input type=\"submit\" value=\"Modifier\"><br /><br />
						<a href='javascript:history.go(-1)'>Retour</a>
					</form></center>";
				}
			break;
			case "editer_valide":
				$id = mysql_real_escape_string(htmlspecialchars($_POST['id'], ENT_QUOTES));
				$name = mysql_real_escape_string(htmlspecialchars($_POST['name'], ENT_QUOTES));
				$quantity = mysql_real_escape_string(htmlspecialchars($_POST['quantity'], ENT_QUOTES));
				$id_item = mysql_real_escape_string(htmlspecialchars($_POST['id_item'], ENT_QUOTES));
				$price = mysql_real_escape_string(htmlspecialchars($_POST['price'], ENT_QUOTES));
				
				if (!empty($name) or !empty($quantity) or !empty($id_item) or !empty($price) or !empty($id))
				{
					mysql_query("UPDATE boutique SET name='$name',ID_item='$id_item',quantity='$quantity',price='$price' WHERE ID='$id'");
					echo "<center><p>La modification a bien été faite.</p></center>";
					echo "<center><a href='javascript:history.go(-2)'>Retour</a></center>";
				}
				else
				{
					echo '<div class="erreur">Tout les champs ne sont pas remplis</div>';
				}
			break;
			
			// SUPPRIMER
			case "supprimer":
				$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				echo "<p class=\"title\"><center><h3>Ete-vous sur de vouloir supprimer l'article qui à ID: $id ?</h3></center></p>";
				echo "<center><form action=\"index.php?module=boutique&action=supprimer_valide\" method=\"POST\"><input type=\"hidden\" name=\"id\" value='$id'><input type=\"submit\" name=\"del\" value=\"Oui\"><br /><br /><a href='javascript:history.go(-1)'>Retour</a></form></center>";
			break;
			case "supprimer_valide":
				$id = mysql_real_escape_string(htmlspecialchars($_POST['id'], ENT_QUOTES));
				if (isset($id)) // Si les variables existent
				{
					if ($id != NULL) // Si on a quelque chose à enregistrer
					{
						mysql_query("DELETE FROM boutique WHERE ID='$id'") or die("Erreur de suppression");
						echo "<p><center><h3>L'article a bien été supprimé !</h3><br><a href='javascript:history.go(-2)'>Retour</a></center></p>";
					}
					else  //Si il y a rien à supprimer
					{
						echo "<p><center><h3>Erreur !!!</center></h3></b></p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p><center><h3>ERREUR!!!</center></h3></b></p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			default:
				echo "Bienvenue dans l'adminsitration de la Boutique du site.<br /><br />
				Choisissez une rubrique dans le menu Boutique.";
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
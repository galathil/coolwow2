<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config WHERE config_name = "module_boutique"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes")
{
	if($rep['config_value'] == 1)
	{
		require_once("kernel/fonctions_boutique.php");
		require_once("kernel/fonctions_armurerie.php");
		
		mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
		mysql_select_db($coolwow['db']) or die(mysql_error());
		
		$username = Securite::bdd($_SESSION['username']);
		$id_compte = Securite::bdd($_SESSION['id']);
		
		$reponse = mysql_query("SELECT * FROM membres WHERE id = '".Securite::bdd($_SESSION['id'])."'");
		$donnees = mysql_fetch_array($reponse);
		
		switch ($_GET['action'])
		{
			case "achat":
				$type = mysql_real_escape_string(htmlspecialchars($_GET['type'], ENT_QUOTES));
				$class = setclass($_GET['class']);
				if(empty($type) or !isset($type))
				{
					echo "<h1 class='title'>Une erreur de lien est survenue !</h1>";
					echo "<p><a href=\"index.php?module=boutique\">Retour</a></p>";
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
						echo "<p class=\"title\">Acheter des pièces d'or</p><br />";
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
						//echo "$class - $type<br />";
					}
					else
					{
						echo "<p class=\"title\">Inconnu</p><br />";
					}
					if($type == "set" AND $class == 0)
					{
						$req = "";
					}
					else
					{
						$req = 'AND class="'.$class.'"';
					}
					$reponse2 = mysql_query('SELECT * FROM boutique WHERE type="'.$type.'" '.$req.' ORDER BY ID ASC');
					
					echo "<div id='avertisement'>Attention vous devez etre deconnecté du jeu avant de continuer !</div><br />
					Vous avez actuellement <b>".$donnees['nb_point_vote']."</b> point(s)<br /><br />
					<table class=\"lined\" width=\"99%\" style='border-collapse: collapse'; align='center' width='90%' border='1' cellspacing='1' cellpadding='1'>
						<tr>
							<th></th>
							<th>Nom</th>
							<th>Prix</th>
							<th>Acheter</th>
						</tr>";
					if (mysql_num_rows($reponse2) <= 0)
					{
						echo "<tr><td colspan=\"8\"><center><b>Aucuns articles !!!</b></center></td></tr>";
					}
					else
					{
						while($donnees2 = mysql_fetch_assoc($reponse2))
						{
							$id = $donnees2['ID'];
							$id_item = $donnees2['ID_item'];
							echo "<tr>
								<td align=\"center\">";
								if($type == "pieces")
								{
									echo "<img src=\"images/boutique/gold.png\" />";
								}
								elseif(($type == "level") or ($type == "arene") or ($type == "honneur"))
								{
									echo ".";
								}
								else
								{
									echo "<a href=\"http://fr.wowhead.com/?item=".$donnees2['ID_item']."\"><img src=\"".get_icon($donnees2['ID_item'])."\" /></a>";
								}
								echo "</td>
								<td align=\"center\">".$donnees2['name']."</td>
								<td align=\"center\">".$donnees2['price']." points</td>
								<td align=\"center\"><a href=\"index.php?module=boutique&action=valide&id=".$id."\"><img src=\"images/boutique/acheter.png\" /></a></td>
							</tr>";					
						}
					}
					echo "</table><br />
					<a href=\"index.php?module=boutique\">Retour</a>";
				}
			break;
			case "achat_set":
				echo "<h1 class='center'>Acheter un objet de Set</h1>";
				echo "<p id=\"milieu\">merci de choisir une classe :</p>
				<table align=\"center\">
					<tr>
						<td><a href='index.php?module=boutique&action=achat&type=set&class=1'><img src=\"images/classes/1b.gif\" alt=\"Le Guerrier\" /></a></td>
						<td><a href='index.php?module=boutique&action=achat&type=set&class=2'><img src=\"images/classes/2b.gif\" alt=\"Le Paladin\" /></a></td>
						<td><a href='index.php?module=boutique&action=achat&type=set&class=3'><img src=\"images/classes/3b.gif\" alt=\"Le Chasseur\" /></a></td>
						<td><a href='index.php?module=boutique&action=achat&type=set&class=4'><img src=\"images/classes/4b.gif\" alt=\"Le Voleur\" /></a></td>
					</tr>
					<tr>
						<td><a href='index.php?module=boutique&action=achat&type=set&class=5'><img src=\"images/classes/5b.gif\" alt=\"Le Prêtre\" /></a></td>
						<td><a href='index.php?module=boutique&action=achat&type=set&class=6'><img src=\"images/classes/6b.gif\" alt=\"Le Chevalier de la mort\" /></a></td>
						<td><a href='index.php?module=boutique&action=achat&type=set&class=7'><img src=\"images/classes/7b.gif\" alt=\"Le Shaman\" /></a></td>
						<td><a href='index.php?module=boutique&action=achat&type=set&class=8'><img src=\"images/classes/8b.gif\" alt=\"Le Mage\" /></a></td>
					</tr>
					<tr>
						<td></td>
						<td><a href='index.php?module=boutique&action=achat&type=set&class=9'><img src=\"images/classes/9b.gif\" alt=\"Le Démoniste\" /></a></td>
						<td><a href='index.php?module=boutique&action=achat&type=set&class=11'><img src=\"images/classes/11b.gif\" alt=\"Le Druide\" /></a></td>
						<td></td>
				</table>";
			break;
			
			case "valide":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$id_achat = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				if(empty($id_achat) or !isset($id_achat))
				{
					echo "<h1 class='title'>Une erreur de lien est survenue !</h1>";
					echo "<p><a href=\"index.php?module=boutique\">Retour</a></p>";
				}
				else
				{
					mysql_select_db($coolwow['db']);
					$reponse2 = mysql_query("SELECT * FROM boutique WHERE ID='$id_achat'");
					$donnees2 = mysql_fetch_array($reponse2,MYSQL_ASSOC);
					if ($donnees['nb_point_vote'] < $donnees2['price'])
					{
						echo "<h1 class='title'>Une erreur est survenue !</h1>";
						echo "<p id='avertisement'>Vous n'avez pas assé de points de vote !</p>";
						echo "<p><a href=\"index.php?module=boutique&action=achat&type=\">Retour</a></p>";
					}
					else
					{
						echo "<p class='title'>Validation de l'achat</p><br />
						<p>Merci de séléctioner le personnage à qui l'on doit ajouter ".$donnees2['name'].".</p>
						<form action='index.php?module=boutique&action=ajoute' method='POST'>
							<select name=\"perso\">";
								mysql_select_db($characters[1]['db']);
								$reponse4 = mysql_query("SELECT * FROM `characters` WHERE `account`='$id_compte'") or die("Erreur SQL");
								while ($donnees4 = mysql_fetch_array($reponse4))
								{
									echo "<option value='".Securite::bdd($donnees4['guid'])."'>".Securite::bdd($donnees4['name'])."</option>";
								}
								echo "
							</select>
							<input type=\"hidden\" name=\"ID\" value=\"".$id_achat."\" />
							<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
							<input type=\"submit\" value=\"Acheter\" />
						</form>
						<a href=\"index.php?module=boutique&action=achat&type=".$donnees2['type']."\">Retour</a>";
					}
				}
			break;
			case "ajoute":
				verify_xsrf_token();
				$id = Securite::bdd($_POST['ID']);
				$character = Securite::bdd($_POST['perso']);
				$date = date("Y-m-d H:i:s");
				
				mysql_select_db($realmd['db']);
				$reponse2 = mysql_query("SELECT * FROM account WHERE id= '$id_compte'");
				$donnees2 = mysql_fetch_array($reponse2);

				$online = Securite::bdd($donnees2['online']);
				if($online == 1)
				{
					echo "<h1 class='title'>Une erreur est survenue !</h1>";
					echo "<p id='avertisement'>Vous êtes actuellement connecté au jeu.</p>";
					echo "<p>merci de vous déconnecter.</p>";
					echo "<p><a href=\"index.php?module=boutique&action=achat&type=\">Retour</a></p>";
				}
				elseif($online == 0)
				{
					mysql_select_db($coolwow['db']);
					$reponse3 = mysql_query("SELECT * FROM boutique WHERE ID = '$id'");
					$donnees3 = mysql_fetch_array($reponse3);
					
					$price = $donnees3['price'];
					$iditem = $donnees3['ID_item'];
					$quantity = $donnees3['quantity'];
					$type = $donnees3['type'];
					if ($donnees['nb_point_vote'] < $price)
					{
						echo "<h1 class='title'>Une erreur est survenue !</h1>";
						echo "<p id='avertisement'>Vous n'avez pas assé de points de vote !</p>";
						echo "<p><a href=\"index.php?module=boutique&action=achat&type=\">Retour</a></p>";
					}
					else
					{
						if($type == "pieces")
						{
							shop::po($quantity, $character);
						}
						elseif($type == "arene")
						{
							shop::pa($quantity, $character);
						}
						elseif($type == "honneur")
						{
							shop::ph($quantity, $character);
						}
						elseif($type == "level")
						{
							shop::level($quantity, $character);
						}
						else
						{
							shop::item($iditem, $quantity, $character);
						}
						mysql_select_db($coolwow['db']);
						mysql_query("UPDATE membres SET nb_point_vote = nb_point_vote - $price WHERE id = '$id_compte'");
						mysql_query("INSERT INTO log_achat (id_item,id_membre,id_perso,date_achat,id_boutique) VALUES ('$iditem','$id_compte','$character','$date','$id')") or die(mysql_error());
						echo "<h1 class='title'>Merci pour votre achat</h1>
						<p>".$price." Points de Vote vous ont été enlevé !<br />
						Merci de votre achat et continuez a voter pour plus de bonus !</p>
						<a href=\"index.php?module=boutique\">Retour</a>";
					}
				}
				else
				{
					echo "<h1 class='title'>Une erreur est survenue, merci de prévenir l'administrateur !</h1>";
					echo "<p><a href=\"index.php?module=boutique\">Retour</a></p>";
				}
			break;
			
			// Defaut
			default:
				echo "<p class=\"title\">Bienvenu dans la boutique</p>
				<p id=\"milieu\">
				Cette page vous permez d'échanger vos points de votes contre des pièces d'or, monture ou encore des objets,<br />
				Vous avez actuellement <b>".$donnees['nb_point_vote']."</b> point(s)<br /></p>
				<table align=\"center\">
					<tr>
						<td><a href='index.php?module=boutique&action=achat&type=pieces'><img src=\"images/boutique/or.png\" alt=\"\" /></a></td>
						<td><b>Pièces d'or</b><br />Vous avez besoin de beaucoup<br />d’or, et rapidement ?!</td>
						<td><a href='index.php?module=boutique&action=achat&type=objet'><img src=\"images/boutique/divers.png\" alt=\"\" /></a></td>
						<td><b>Objets</b><br />Achats un objets, tel que,<br />insignes, sacs et plus.</td>
					</tr>
					<tr>
						<td><a href='index.php?module=boutique&action=achat&type=level'><img src=\"images/boutique/level.jpg\" alt=\"\" /></a></td>
						<td><b>Levels</b><br />Besoin de gagner des<br />niveaux rapidement ?</td>
						<td><a href='index.php?module=boutique&action=achat&type=metiers'><img src=\"images/boutique/metiers.png\" alt=\"\" /></a></td>
						<td><b>Métiers</b><br />Besoin d'une compos ?<br />c'est par ici !</td>
					</tr>
					<tr>
						<td><a href='index.php?module=boutique&action=achat&type=montures'><img src=\"images/boutique/animal.png\" alt=\"\" /></a></td>
						<td><b>Montures</b><br />Envis d’avoir la plus belle<br />monture pour frimer ?</td>
						<td><a href='index.php?module=boutique&action=achat&type=arene'><img src=\"images/boutique/arene.png\" alt=\"\" /></a></td>
						<td><b>Point d'arene</b><br />Pour les besoins de<br />point d'arene ?</td>
					</tr>
					<tr>
						<td><a href='index.php?module=boutique&action=achat&type=honneur'><img src=\"images/boutique/honneur.png\" alt=\"\" /></a></td>
						<td><b>Point d'honneur</b><br />Pour les besoins de<br />point d'honneur ?</td>
						<td><a href='index.php?module=boutique&action=achat&type=rename_perso'><img src=\"images/boutique/renommage.png\" alt=\"\" /></a></td>
						<td><b>Renommage</b><br />Simple pour renommer un<br />de vos personnage !</td>
					</tr>
					<tr>
						<td><a href='index.php?module=boutique&action=achat_set'><img src=\"images/boutique/arene.png\" alt=\"\" /></a></td>
						<td><b>Set</b><br />Pour ce qui ont<br />de stuff !</td>
						<td></td>
						<td></td>
					</tr>
				</table>
				<h4 id=\"milieu\">Il n'y aura pas d'échange ou de remboursement.</h4></div>";
			break;
		}
	}
	else
	{
		echo "<p>Ce module est désactivé, merci de voir avec l'administrateur !</p>";
		echo "<a href=\"../index.php\">Retour</a>";
	}
}
else
{
	echo "<p>Page réservée aux membres !<br />";
	echo "connectez-vous ou inscrivez-vous !</p>";
	echo "<a href=\"../index.php\">Retour</a>";
}
?>
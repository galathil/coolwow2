<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_forums"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "config":
				$sql="SELECT * FROM forum_config";
				$resultat=mysql_query($sql) or die ("Erreur requette SQL");
				$info=mysql_fetch_array($resultat);
				
				$config_name = array(
				"avatar_maxsize" => "Taille maximale de l'avatar:",
				"avatar_maxh" => "Hauteur maximale de l'avatar:",
				"avatar_maxl" => "Largeur maximale de l'avatar:",
				"sign_maxl" => "Taille maximale de la signature:",
				"auth_bbcode_sign" => "Autoriser le bbcode dans la signature:",
				"pseudo_maxsize" => "Taille maximale du pseudo:",
				"pseudo_minsize" => "Taille minimale du pseudo:",
				"topic_par_page" => "Nombre de topics par page:",
				"post_par_page" => "Nombre de posts par page:"
				);
				
				echo "<h1>Configuration du forum</h1><br />";
				echo "<h1>Ne fonctionne pas encor</h1>";
				echo "<form method=\"post\" action=\"index.php?module=forums&action=config_v\">";
				echo "<table>";
				$requete_config= mysql_query('SELECT config_nom, config_valeur FROM forum_config');
				while($data_config = mysql_fetch_assoc($requete_config))
				{
					echo "<tr>";
					echo "<td align=\"left\">".$config_name[$data_config['config_nom']]."</td>";
					echo "<td align=\"left\"><input type=\"text\" name=\"".$data_config['config_nom']."\" value=\"".$data_config['config_valeur']."\" size=\"6\"></td>"; 
					echo "</tr>";
				}
				echo "</table>
				<p><input type=\"submit\" value=\"Envoyer\" /></p></form>";
			break;
			case "config_v":
			    echo "<h1>Configuration du forum</h1>";
			    $requete_config= mysql_query('SELECT config_nom, config_valeur FROM forum_config');
			    while($data_config = mysql_fetch_assoc($requete_config))
			    {
			        if ($data_config['config_valeur'] != $_POST[$data_config['config_nom']])
			        {
				        $valeur = mysql_real_escape_string(htmlspecialchars($_POST[$data_config['config_nom']], ENT_QUOTES));
				        mysql_query("UPDATE forum_config SET config_valeur = '".$valeur."'
				        WHERE config_nom = '".$data_config['config_nom']."'");
			        }
			    }
			    echo'<p>Les nouvelles configurations ont été mises à jour !<br />Cliquez <a href="index.php">ici</a> pour revenir à l administration</p>';
			break;
			case "admin_forums":
				$requete2 = mysql_query('
				SELECT cat_id, cat_nom, 
				forum_forum.forum_id, forum_name, forum_desc, forum_post, forum_topic, auth_view, forum_topic.topic_id, 
				post_time, post_createur, account_name, id 
				FROM forum_categorie
				LEFT JOIN forum_forum ON forum_categorie.cat_id = forum_forum.forum_cat_id
				LEFT JOIN forum_post ON forum_post.post_id = forum_forum.forum_last_post_id
				LEFT JOIN forum_topic ON forum_topic.topic_id = forum_post.topic_id
				LEFT JOIN membres ON membres.id = forum_post.post_createur 
				ORDER BY cat_ordre, forum_ordre DESC');
				if (mysql_num_rows($requete2) < 1)
				{
				    echo'<p>Il n y a pas encors de forums, il va faloir en créer !</p>';
					echo "<p><form method=\"post\" action=\"index.php?module=forums&action=creer_categorie\">
					<input type=\"text\" name=\"categorie\" size=\"20\"> <input type=\"submit\" name=\"submit\" value=\"Créer une nouvelle catégorie\"></form></p>";
				}
				else
				{
					echo "<p class=\"title\">Administration des forums</p><br />";
					echo "<table class=\"forum\">";
					    while($data2 = mysql_fetch_assoc($requete2))
					    {
						    if( $categorie != $data2['cat_id'] )
						    {
					            $categorie = $data2['cat_id'];
					            ?>
					            <tr>
					                <th class='rankingHeader' class="titre_a"><strong><?php echo $data2['cat_nom']; ?></strong></th>             
					                <th class='rankingHeader' class="nombremessages_a"><strong>Sujets</strong></th>       
					                <th class='rankingHeader' class="nombresujets_a"><strong>Messages</strong></th>
									<th class='rankingHeader'><a href="index.php?module=forums&action=modifier_categorie&id=<?php echo $data2['cat_id']; ?>"><img src="../images/edit.png" /></a></th>
									<th class='rankingHeader'><a href="index.php?module=forums&action=supprimer_categorie&id=<?php echo $data2['cat_id']; ?>"><img src="../images/delete.gif" /></a></th>
					            </tr>
								<tr><td colspan="5"><form method="post" action="index.php?module=forums&action=creer_forum">
					<input type="text" name="forum_name" size="20"> <input type="submit" name="submit" value="Créer un nouveau forum"></form></td></tr>
					            <?php
					        }
						    echo'
							<tr>
						        <td class="titre_a"><strong><a href="../index.php?module=forums&action=voirforum&f='.$data2['forum_id'].'">
						         '.$data2['forum_name'].'</a></strong>
						        <br />'.$data2['forum_desc'].'</td>
						        <td class="nombresujets_a">'.$data2['forum_topic'].'</td>
						        <td class="nombremessages_a">'.$data2['forum_post'].'</td>
								<td class="center" width="30"><a href="index.php?module=forums&action=modifier_forum&id='.$data2['forum_id'].'"><img src="../images/edit.png" /></a></td>
								<td class="center" width="30"><a href="index.php?module=forums&action=supprimer_forum&id='.$data2['forum_id'].'"><img src="../images/delete.gif" /></a></td>
							</tr>';
					    }
					echo '</table><br />';
					echo "<form method=\"post\" action=\"index.php?module=forums&action=creer_categorie\">
					<input type=\"text\" name=\"categorie\" size=\"20\"> <input type=\"submit\" name=\"submit\" value=\"Créer une nouvelle catégorie\"></form>";
				}
			break;
			case "creer_categorie":
				$categorie = mysql_real_escape_string(htmlspecialchars($_POST['categorie'], ENT_QUOTES));
				echo "<h1>Création d'une catégorie</h1>";
		        echo "<form method=\"post\" action=\"index.php?module=forums&action=creer_categorie_v\">";
		        echo '<label> Indiquez le nom de la catégorie :</label> 
		        <input type="text" id="categorie" name="categorie" value="'.$categorie.'"/><br /><br />   
		        <input type="submit" value="Envoyer"></form>';
			break;
			case "creer_categorie_v":
				$titre = mysql_real_escape_string(htmlspecialchars($_POST['categorie'], ENT_QUOTES));
				if(!empty($titre))
				{
					mysql_query("INSERT INTO forum_categorie (cat_nom) VALUES ('".$titre."')") or die(mysql_error());
					$id_cat = mysql_insert_id();
					mysql_query("INSERT INTO forum_acces_cat (cat_id,group_id) VALUES ('".$id_cat."','4')") or die(mysql_error());
					mysql_query("INSERT INTO forum_acces_cat (cat_id,group_id) VALUES ('".$id_cat."','5')") or die(mysql_error());
					echo "<p>La catégorie a été créée !</p>";
					echo "<a href=\"index.php?module=forums&action=admin_forums\">Retour</a>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Merci d'entrer un nom pour la nouvelle catégorie !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "modifier_categorie":
				$cat_id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				$sql="SELECT * FROM forum_categorie WHERE cat_id = '$cat_id'";
				$resultat = mysql_query($sql) or die (mysql_error());
				$info=mysql_fetch_array($resultat);
				if(!empty($cat_id))
				{
			        echo "<h1>Modification d'une catégorie</h1>";
			        echo "<form method=\"post\" action=\"index.php?module=forums&action=modifier_categorie_v\">";
			        echo "<table>
						<tr>
							<td>ID du forum:</td>
							<td><input readonly type=\"text\" name=\"cat_id\" value=\"".$info["cat_id"]."\" size=\"4\" maxsize=\"4\"></td>
						</tr>
						<tr>
							<td>Nom :</td>
							<td><input type=\"text\" name=\"cat_nom\" id=\"cat_nom\" value=\"".$info["cat_nom"]."\"/></td>
						</tr>
					</table><br />
			        <input type=\"submit\" value=\"Modifier\">
					</form>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur de lien !!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "modifier_categorie_v":
				$cat_id = mysql_real_escape_string(htmlspecialchars($_POST['cat_id'], ENT_QUOTES));
				$cat_nom = mysql_real_escape_string(htmlspecialchars($_POST['cat_nom'], ENT_QUOTES));
				if(!empty($cat_id) AND !empty($cat_nom))
				{
					mysql_query("UPDATE forum_categorie SET cat_nom = '$cat_nom' WHERE cat_id='$cat_id'") or die(mysql_error());
					echo "<p>La catégorie a bien été modifié</p>";
					echo "<a href=\"index.php?module=forums&action=admin_forums\">Retour</a>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur lors de la modification !!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "supprimer_categorie":
				$cat_id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				if(!empty($cat_id))
				{
					$reponse2 = mysql_query("SELECT COUNT(*) AS nombre FROM forum_forum WHERE forum_cat_id = ".$cat_id."") or die(mysql_error());
					$donnees2 = mysql_fetch_array($reponse2);
					$nb_topics = $donnees2['nombre'];
					$reponse3 = mysql_query("SELECT * FROM forum_categorie WHERE cat_id = ".$cat_id."") or die(mysql_error());
					$donnees3 = mysql_fetch_array($reponse3);
					if($nb_topics == NULL)
					{
						echo "</p>Impossible de suppresimer le forum, merci de contacter l'administrateur</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
					elseif($nb_topics == 0)
					{
						echo "<form action=\"index.php?module=forums&action=supprimer_categorie_v\" method=\"POST\">";
						echo "<input type=\"hidden\" name=\"cat_id\" value=\"$cat_id\">";
						echo "Êtes-vous sûr de voulour supprimer la catégorie : \"".$donnees3['cat_nom']."\" ?<br /><br />";
						echo "<input type=\"submit\" value=\"Supprimer\"></form>";
					}
					else
					{
						echo "<p>Il y a des forums dans cette catégorie, merci de les déplacer ou les supprimer avant !</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur lors de la suppression !!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "supprimer_categorie_v":
				$cat_id = mysql_real_escape_string(htmlspecialchars($_POST['cat_id'], ENT_QUOTES));
				if(!empty($cat_id))
				{
					mysql_query("DELETE FROM forum_categorie WHERE cat_id='$cat_id'") or die(mysql_error());
					echo "<p>La catégorie a bien été supprimé</p>";
					echo "<a href=\"index.php?module=forums&action=admin_forums\">Retour</a>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur lors de la suppression !!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "creer_forum":
				$forum_name = mysql_real_escape_string(htmlspecialchars($_POST['forum_name'], ENT_QUOTES));
				$requete = mysql_query('SELECT cat_id, cat_nom FROM forum_categorie ORDER BY cat_ordre DESC');
		        echo "<p class=\"title\">Création d'un forum</p>";
		        echo'<form method="post" action="index.php?module=forums&action=creer_forum_v">';
		        echo'<table>
					<tr>
						<td>Nom :</td>
						<td><input type="text" name="nom" id="nom" value="'.$forum_name.'" /></td>
					</tr>
					<tr>
				        <td>Description :</td>
						<td><textarea cols=85 rows=8 name="desc" id="desc"></textarea></td>
			        </tr>
					<tr>
						<td>Catégorie :</t>
						<td><select name="cat">';
					        while($data = mysql_fetch_assoc($requete))
					        {
					            echo'<option value="'.$data['cat_id'].'">'.$data['cat_nom'].'</option>';
					        }
							echo'</select>
						</td>
					</tr>
				</table>
		        <input type="submit" value="Envoyer"></form>';
			break;
			case "creer_forum_v":
				$titre = mysql_real_escape_string(htmlspecialchars($_POST['nom'], ENT_QUOTES));
				$desc = nl2br(mysql_real_escape_string(htmlspecialchars($_POST['desc'], ENT_QUOTES)));
				$cat = mysql_real_escape_string(htmlspecialchars($_POST['cat'], ENT_QUOTES));
				if(!empty($titre) AND !empty($cat))
				{
					mysql_query("INSERT INTO forum_forum (forum_cat_id, forum_name, forum_desc) VALUES ('".$cat."', '".$titre."', '".$desc."')");
					$forum_id = mysql_insert_id();
					mysql_query("INSERT INTO forum_acces_forum (group_id, forum_id) VALUES (1, '".$forum_id."')");
					mysql_query("INSERT INTO forum_acces_forum (group_id, forum_id) VALUES (2, '".$forum_id."')");
					
					echo "<p>Le forum a été créé !</p>";
					echo "<a href=\"index.php?module=forums&action=admin_forums\">Retour</a>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur : un champ est restés vide !!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "supprimer_forum":
				$id_forum = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				if(!empty($id_forum))
				{
					$reponse2 = mysql_query("SELECT COUNT(*) AS nombre FROM forum_topic WHERE forum_id = $id_forum ") or die(mysql_error());
					$donnees2 = mysql_fetch_array($reponse2);
					$nb_topics = $donnees2['nombre'];
					$reponse3 = mysql_query("SELECT * FROM forum_forum WHERE forum_id = $id_forum ") or die(mysql_error());
					$donnees3 = mysql_fetch_array($reponse3);
					if($nb_topics == NULL)
					{
						echo "Impossible de suppresimer le forum, merci de contacter l'administrateur.";
					}
					elseif($nb_topics == 0)
					{
						echo "<form action=\"index.php?module=forums&action=supprimer_forum_v\" method=\"POST\">";
						echo "<input type=\"hidden\" name=\"id_forum\" value=\"$id_forum\">";
						echo "Êtes-vous sûr de voulour supprimer le forum : \"".$donnees3['forum_name']."\" ?<br />";
						echo "Ce forum est vide !<br /><br />";
						echo "<input type=\"submit\" value=\"Supprimer\"></form>";
					}
					else
					{
						echo "<form action=\"index.php?module=forums&action=supprimer_forum_v2\" method=\"POST\">";
						echo "êtes-vous sur de voulour supprimer le forums <input readonly type=\"text\" name=\"id_forum\" value=\"$id_forum\" size=\"4\"> ?<br />";
						echo "Où voulez-vous déplacer les $nb_topics sujet(s) ?<br />";
						$requete = mysql_query("SELECT * FROM forum_forum WHERE forum_id != $id_forum ORDER BY forum_id DESC") or die(mysql_error());
						echo "<select name=\"id_nouveau_forum\">";
						while($data = mysql_fetch_assoc($requete))
			            {
							echo'<option value="'.$data['forum_id'].'">'.$data['forum_name'].'</option>';
			            }
			            echo'</select><input type="submit" value="Supprimer"></form>';
					}
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur de lien !!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "supprimer_forum_v":
				$id_forum = mysql_real_escape_string(htmlspecialchars($_POST['id_forum'], ENT_QUOTES));
				if(!empty($id_forum))
				{
					mysql_query("DELETE FROM forum_forum WHERE forum_id='$id_forum'") or die(mysql_error());
					echo "<p>Le forum a bien été supprimé</p>";
					echo "<a href=\"index.php?module=forums&action=admin_forums\">Retour</a>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur lors de la suppression !!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "supprimer_forum_v2":
				$id_forum = mysql_real_escape_string(htmlspecialchars($_POST['id_forum'], ENT_QUOTES));
				$id_nouveau_forum = mysql_real_escape_string(htmlspecialchars($_POST['id_nouveau_forum'], ENT_QUOTES));
				if(!empty($id_forum) AND !empty($id_nouveau_forum))
				{
					//$reponse3 = mysql_query("SELECT * FROM forum_post WHERE post_forum_id = ".$id_forum." ORDER BY post_id DESC LIMIT 1") or die(mysql_error());
					//$donnees3 = mysql_fetch_array($reponse3);
					//$post_id = $donnees3['post_id'];
					
					$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM forum_post WHERE post_forum_id = $id_forum ") or die(mysql_error());
					$donnees = mysql_fetch_array($reponse);
					$nb_posts = $donnees['nombre'];
					$reponse2 = mysql_query("SELECT COUNT(*) AS nombre FROM forum_topic WHERE forum_id = $id_forum ") or die(mysql_error());
					$donnees2 = mysql_fetch_array($reponse2);
					$nb_topics = $donnees2['nombre'];
					
					mysql_query("UPDATE forum_forum SET forum_topic = forum_topic + ".$nb_topics." , forum_post = forum_post + ".$nb_posts." WHERE forum_id=".$id_nouveau_forum."") or die(mysql_error());
					mysql_query("UPDATE forum_topic SET forum_id = ".$id_nouveau_forum." WHERE forum_id = ".$id_forum."") or die(mysql_error());
					mysql_query("UPDATE forum_post SET post_forum_id = ".$id_nouveau_forum." WHERE post_forum_id = ".$id_forum."") or die(mysql_error());
					//mysql_query("UPDATE forum_forum SET forum_last_post_id = ".$post_id." WHERE post_forum_id = ".$id_forum."") or die(mysql_error());
					mysql_query("DELETE FROM forum_forum WHERE forum_id= ".$id_forum."") or die(mysql_error());
					mysql_query("DELETE FROM forum_acces_forum WHERE forum_id= ".$id_forum."") or die(mysql_error());
					
					echo "<p>Le forum a bien été supprimé et le(s) message(s) déplacé(s)</p>";
					echo "<a href=\"index.php?module=forums&action=admin_forums\">Retour</a>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur lors de la suppression !!!</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "modifier_forum":
				$id_forum = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				$sql="SELECT * FROM forum_forum WHERE forum_id = '$id_forum'";
				$resultat = mysql_query($sql) or die (mysql_error());
				$info=mysql_fetch_array($resultat);
				
		        echo "<h1>Modification d'un forum</h1>";
		        echo "<form method=\"post\" action=\"index.php?module=forums&action=modifier_forum_v\">";
		        echo "<table>
					<tr>
						<td>ID du forum:</td>
						<td><input readonly type=\"text\" name=\"forum_id\" value=\"".$info["forum_id"]."\" size=\"4\" maxsize=\"4\"></td>
					</tr>
					<tr>
						<td>Nom :</td>
						<td><input type=\"text\" name=\"nom\" id=\"nom\" value=\"".$info["forum_name"]."\"/></td>
					</tr>
					<tr>
				        <td>Description :</td>
						<td><textarea cols=\"40\" rows=\"4\" name=\"desc\" id=\"desc\"\">".$info["forum_desc"]."</textarea></td>
			        </tr>
				</table><br />
		        <input type=\"submit\" value=\"Modifier\"></form>";
			break;
			case "modifier_forum_v":
				$forum_id = mysql_real_escape_string(htmlspecialchars($_POST['forum_id'], ENT_QUOTES));
				$nom = mysql_real_escape_string(htmlspecialchars($_POST['nom'], ENT_QUOTES));
				$desc = mysql_real_escape_string(htmlspecialchars($_POST['desc'], ENT_QUOTES));
				mysql_query("UPDATE forum_forum SET forum_name = '$nom', forum_desc = '$desc' WHERE forum_id='$forum_id'") or die(mysql_error());
				echo "<p>Le forum a bien ete modifier</p>";
				echo "<a href=\"index.php?module=forums&action=admin_forums\">Retour</a>";
			break;
			default:
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
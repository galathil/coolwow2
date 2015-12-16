<?php
session_start();
if (empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: ../erreur.php?err=access_denied_admin");
}
mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());
$req = mysql_query('SELECT * FROM site_config_admin WHERE config_name = "module_adm_forums_droits"');
$rep = mysql_fetch_array($req);
if($_SESSION['auth'] == "yes" AND Securite::bdd($_SESSION['gmlevel']) >= $rep['config_value2'])
{
	if($rep['config_value'] == 1)
	{
		switch ($_GET['action'])
		{
			case "visible_cat":
				$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				if(!empty($id)) // Si les variables existent
				{
					$requete = mysql_query("SELECT * FROM forum_acces_cat
					LEFT JOIN forum_groups ON forum_groups.group_id = forum_acces_cat.group_id
					WHERE cat_id='$id'")or die(mysql_error());
					echo "<p class=\"title\">Visibilitée des catégories</p>";
					echo "<p>Voici le(s) groupe(s) qui peuve(nt) voir cette catégorie</p>";
					echo "<table class=\"forum\">
						<tr>
							<th class=\"titre_a\"><a href='index.php?module=droits_forums&action=visible_cat_ajouter&cid=".$id."'><img src='../images/add.png' /></a></th>
							<th class=\"titre_a\">ID</th> 
					        <th class=\"titre_a\"><strong>Nom du groupe</strong></th>                
					    </tr>";
					    while($data = mysql_fetch_assoc($requete))
					    {
						    echo'<tr>
								<td><a href=index.php?module=droits_forums&action=visible_cat_supprimer&cid='.$id.'&gid='.$data['group_id'].'><img src="../images/delete.gif" /></a></td>
								<td>'.$data['group_id'].'</td>
						        <td>'.$data['group_nom'].'</td>
							</tr>';
					    }
					echo "</table>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur d'accès</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "visible_cat_ajouter":
				$cid = mysql_real_escape_string(htmlspecialchars($_GET['cid'], ENT_QUOTES));
				if(!empty($cid))
				{
					echo "<p class=\"title\">Visibilitée</p>";
			        echo "<form method=\"post\" action=\"index.php?module=droits_forums&action=visible_cat_ajouter_v\">";
			        echo '<table>
					<tr>
						<td>Séléctionné le groupe à ajouter </t>
						<td>
							<select name="group_id">';
								$SQL = "SELECT group_id,group_nom FROM forum_groups
								WHERE group_id NOT IN(SELECT group_id FROM forum_acces_cat WHERE cat_id = ".$cid.")";
								$result = mysql_query($SQL) or die(mysql_error());
								while ($val = mysql_fetch_array($result))
								{
									echo "<option value=\"".$val["group_id"]."\">".$val["group_id"]." - ".$val["group_nom"]."</option>";
								}
							echo '</select>
						</td>
					</tr>
					</table>
					<input type="hidden" name="cat_id" value='.$cid.'>
			        <input type="submit" value="Ajouter"></form>';
				}
				else
				{
					echo "<p>Erreur d'accès</p>";
					echo "<a href=\"javascript:history.go(-1)\">Retour</a>";
				}
			break;
			case "visible_cat_ajouter_v":
				$cat_id = mysql_real_escape_string(htmlspecialchars($_POST['cat_id'], ENT_QUOTES));
				$group_id = mysql_real_escape_string(htmlspecialchars($_POST['group_id'], ENT_QUOTES));
				if(!empty($cat_id) AND !empty($group_id))
				{
					mysql_query("INSERT INTO forum_acces_cat (cat_id,group_id) VALUES ('$cat_id','$group_id')") or die(mysql_error());
					echo "<p>Le groupe a été ajouté !</p>";
					echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
				else
				{
					echo "<p>Erreur !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "visible_cat_supprimer":
				$cat_id = mysql_real_escape_string(htmlspecialchars($_GET['cid'], ENT_QUOTES));
				$group_id = mysql_real_escape_string(htmlspecialchars($_GET['gid'], ENT_QUOTES));
				if(!empty($cat_id) AND !empty($group_id))
				{
					echo "<p>Etes-vous sûr de vouloir supprimer ce groupe ?</p>";
					echo "<form action=\"index.php?module=droits_forums&action=visible_cat_supprimer_v\" method=\"POST\">
					<input type=\"hidden\" name=\"group_id\" value='$group_id'>
					<input type=\"hidden\" name=\"cat_id\" value='$cat_id'>
					<input type=\"submit\" name=\"supprimer\" value=\"Oui\">
					</form>";
				}
				else
				{
					echo "<p>Erreur !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "visible_cat_supprimer_v":
				$cat_id = mysql_real_escape_string(htmlspecialchars($_POST['cat_id'], ENT_QUOTES));
				$group_id = mysql_real_escape_string(htmlspecialchars($_POST['group_id'], ENT_QUOTES));
				if(!empty($cat_id) AND !empty($group_id))
				{
					mysql_query("DELETE FROM forum_acces_cat WHERE group_id=".$group_id." AND cat_id=".$cat_id."") or die(mysql_error());
					echo "<p>Le groupe a été supprimer !</p>";
					echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
				else
				{
					echo "<p>Erreur !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "acces":
				$id = mysql_real_escape_string(htmlspecialchars($_GET['id'], ENT_QUOTES));
				if(!empty($id)) // Si les variables existent
				{
					$requete = mysql_query("SELECT * FROM forum_acces_forum
					LEFT JOIN forum_groups ON forum_groups.group_id = forum_acces_forum.group_id
					WHERE forum_id='$id'")or die(mysql_error());
					echo "<p class=\"title\">Droits d'accès au forum</p>";
					echo "<p>Voici le(s) groupe(s) qui peuve(nt) accédés à ce forum</p>";
					echo "<table class=\"forum\">
						<tr>
							<th class=\"titre_a\"><a href='index.php?module=droits_forums&action=acces_ajouter&fid=".$id."'><img src='../images/add.png' /></a></th> 
							<th class=\"titre_a\">ID</th> 
					        <th class=\"titre_a\"><strong>Nom du groupe</strong></th>                
					    </tr>";
					    while($data = mysql_fetch_assoc($requete))
					    {
						    echo'<tr>
								<td><a href=index.php?module=droits_forums&action=acces_supprimer&fid='.$id.'&gid='.$data['group_id'].'><img src="../images/delete.gif" /></a></td>
								<td>'.$data['group_id'].'</td>
						        <td>'.$data['group_nom'].'</td>
							</tr>';
					    }
					echo "</table>";
				}
				else  //Si les variables n'existent pas
				{
					echo "<p>Erreur d'accès</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "acces_ajouter":
				$fid = mysql_real_escape_string(htmlspecialchars($_GET['fid'], ENT_QUOTES));
				if(!empty($fid))
				{
					echo "<p class=\"title\">Autoriser l'accès</p>";
			        echo "<form method=\"post\" action=\"index.php?module=droits_forums&action=acces_ajouter_v\">";
			        echo '<table>
					<tr>
						<td>Séléctionné le groupe à ajouter </t>
						<td>
							<select name="group_id">';
								$SQL = "SELECT group_id,group_nom FROM forum_groups
								WHERE group_id NOT IN(SELECT group_id FROM forum_acces_forum WHERE forum_id = ".$fid.")";
								$result = mysql_query($SQL) or die(mysql_error());
								while ($val = mysql_fetch_array($result))
								{
									echo "<option value=\"".$val["group_id"]."\">".$val["group_id"]." - ".$val["group_nom"]."</option>";
								}
							echo '</select>
						</td>
					</tr>
					</table>
					<input type="hidden" name="forum_id" value='.$fid.'>
			        <input type="submit" value="Ajouter"></form>';
				}
				else
				{
					echo "<p>Erreur d'accès</p>";
					echo "<a href=\"javascript:history.go(-1)\">Retour</a>";
				}
			break;
			case "acces_ajouter_v":
				$forum_id = mysql_real_escape_string(htmlspecialchars($_POST['forum_id'], ENT_QUOTES));
				$group_id = mysql_real_escape_string(htmlspecialchars($_POST['group_id'], ENT_QUOTES));
				if(!empty($forum_id) AND !empty($group_id))
				{
					mysql_query("INSERT INTO forum_acces_forum (group_id,forum_id) VALUES ('$group_id','$forum_id')") or die(mysql_error());
					echo "<p>Le groupe a été ajouté !</p>";
					echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
				else
				{
					echo "<p>Erreur !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "acces_supprimer":
				generate_xsrf_token();
				$token = Securite::bdd($_SESSION['token_xsrf']);
				$forum_id = mysql_real_escape_string(htmlspecialchars($_GET['fid'], ENT_QUOTES));
				$group_id = mysql_real_escape_string(htmlspecialchars($_GET['gid'], ENT_QUOTES));
				if(!empty($forum_id) AND !empty($group_id))
				{
					echo "<p>Etes-vous sûr de vouloir supprimer les accès à ce forum à ce groupe ?</p>";
					echo "<form action=\"index.php?module=droits_forums&action=acces_supprimer_v\" method=\"POST\">
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"hidden\" name=\"group_id\" value='$group_id'>
					<input type=\"hidden\" name=\"forum_id\" value='$forum_id'>
					<input type=\"submit\" name=\"supprimer\" value=\"Oui\">
					</form>";
				}
				else
				{
					echo "<p>Erreur !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			case "acces_supprimer_v":
				verify_xsrf_token();
				$forum_id = mysql_real_escape_string(htmlspecialchars($_POST['forum_id'], ENT_QUOTES));
				$group_id = mysql_real_escape_string(htmlspecialchars($_POST['group_id'], ENT_QUOTES));
				if(!empty($forum_id) AND !empty($group_id))
				{
					mysql_query("DELETE FROM forum_acces_forum WHERE group_id=".$group_id." AND forum_id=".$forum_id."") or die(mysql_error());
					echo "<p>Le groupe a été supprimer !</p>";
					echo "<a href='javascript:history.go(-2)'>Retour</a>";
				}
				else
				{
					echo "<p>Erreur !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
				}
			break;
			default:
				$requete2 = mysql_query('
				SELECT cat_id, cat_nom, 
				forum_forum.forum_id, forum_name, forum_desc, forum_post, forum_topic, auth_view, forum_topic.topic_id, 
				post_time, post_createur, account_name, id 
				FROM forum_categorie
				LEFT JOIN forum_forum ON forum_categorie.cat_id = forum_forum.forum_cat_id
				LEFT JOIN forum_post ON forum_post.post_id = forum_forum.forum_last_post_id
				LEFT JOIN forum_topic ON forum_topic.topic_id = forum_post.topic_id
				LEFT JOIN membres ON membres.id = forum_post.post_createur 
				ORDER BY cat_ordre, forum_ordre DESC')or die(mysql_error());
				if (mysql_num_rows($requete2) < 1)
				{
				    echo'Il n y a pas encors de forums';
				}
				else
				{
					echo "<p class=\"title\">Accès/visibilitée des droits des forums</p><br />";
					echo "<table class=\"forum\">";
					    while($data2 = mysql_fetch_assoc($requete2))
					    {
						    if( $categorie != $data2['cat_id'] )
						    {
					            $categorie = $data2['cat_id'];
					            ?>
					            <tr>
									<th class="titre_a">Cat ID: <?php echo $data2['cat_id']; ?></th> 
					                <th class="titre_a"><strong><?php echo $data2['cat_nom']; ?></strong></th>                
					                <th width="120"><strong><a href="index.php?module=droits_forums&action=visible_cat&id=<?php echo $data2['cat_id']; ?>">Modifier la visibilité</a></strong></th>
					            </tr>
					            <?php
					        }
						    echo'
							<tr>
								<td class="nombremessages_a">ID: '.$data2['forum_id'].'</td>
						        <td class="titre_a"><strong><a href="../index.php?module=forums&action=voirforum&f='.$data2['forum_id'].'">
						         '.$data2['forum_name'].'</a></strong>
						        <br />'.$data2['forum_desc'].'</td>
						        <td class="nombremessages_a"><a href="index.php?module=droits_forums&action=acces&id='.$data2['forum_id'].'">Modifier les accès</a></td>
							</tr>';
					    }
					echo '</table>';
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
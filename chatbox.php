<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}
echo "<link rel=\"stylesheet\" href=\"themes/shoutbox.css\" type=\"text/css\" />\n";

switch ($_GET['action'])
{
    case 'envoyer':
		$auteur = Securite::bdd($_SESSION['username']);
		$gmlevel = Securite::bdd($_SESSION['gmlevel']);
		$adressip = Securite::bdd($_SERVER['REMOTE_ADDR']);
		$date = date("Y-m-d H:i:s");
		$msg = Securite::bdd($_POST['msg']);
		if (empty($msg))
		{
			echo "<p>Merci d'entrer un message !!!</p>";
			echo "<p><a href=\"index.php?module=chatbox\">Retour</a></p>";
		}
		else
		{
			mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
			mysql_select_db($coolwow['db']) or die(mysql_error());
			mysql_query("INSERT INTO chatbox (msg, auteur_msg,ip_msg,date_msg,gmlevel) VALUES ('$msg','$auteur','$adressip','$date','$gmlevel')") or die(mysql_error());
			mysql_close();
			echo "
			<script language=\"Javascript\">
				document.location.replace(\"index.php?module=chatbox\");
			</script>";
		}
    break;
	case 'historique':
		$gmlevel = Securite::html($_SESSION['gmlevel']);
		echo "
		<p class=\"title\">".$titre_chatbox." ".Securite::html($_SESSION['username'])." !</p><br />
		<div id=\"shoutbox\">
			<div id=\"shoutbox_content\">";
				mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
				mysql_select_db($coolwow['db']) or die(mysql_error());
				$retour_total=mysql_query('SELECT COUNT(*) AS total FROM chatbox'); //Nous récupérons le contenu de la requête dans $retour_total
				$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
				$total=Securite::html($donnees_total['total']); //On récupère le total pour le placer dans la variable $total.
				$reponse = mysql_query("SELECT * FROM chatbox ORDER BY id_msg DESC") or die(mysql_error());
				mysql_close();
				
				if ($total == 0)
				{
					echo "Il n'y a pour le moment aucun message dans la chatbox !";
				}
				else
				{
					while ($donnees = mysql_fetch_array($reponse,MYSQL_ASSOC))
					{
						$date = Securite::html($donnees['date_msg']);
						$date = substr($date,11,5);
						if(Securite::html($donnees['gmlevel']) == 0)
						{
							echo "<b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." :</b> ".Securite::html($donnees['msg'])."<br />";
						}
						elseif(Securite::html($donnees['gmlevel']) == 1)
						{
							echo "<span style=\"color:yellow;\"><b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." - MODERATEUR :</b> ".Securite::html($donnees['msg'])."</span><br />";
						}
						elseif(Securite::html($donnees['gmlevel']) == 2)
						{
							echo "<span style=\"color:orange;\"><b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." - MJ :</b> ".Securite::html($donnees['msg'])."</span><br />";
						}
						elseif(Securite::html($donnees['gmlevel']) == 3)
						{
							echo "<span style=\"color:red;\"><b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." - MJ :</b> ".Securite::html($donnees['msg'])."</span><br />";
						}
						elseif(Securite::html($donnees['gmlevel']) == 4)
						{
							echo "<span style=\"color:red;\"><b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." - MJ :</b> ".Securite::html($donnees['msg'])."</span><br />";
						}
						else
						{
							echo "<span style=\"color:red;\"><b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." - ADMIN :</b> ".Securite::html($donnees['msg'])."</span><br />";
						}
					}
				}
			echo "</div>
		</div><br />
		<div class=\"center\"><a href=\"index.php?module=chatbox\">Retour</a></div>";
	break;
	default:
		if (isset($_GET['autorefresh'])) 
		{
			$autorefresh = $_GET['autorefresh'];
		}
		else
		{
			$autorefresh = 0;
		}
		if ($autorefresh == 1) 
		{
			echo("<meta http-equiv=\"refresh\" content=\"$actu_chat; URL=".htmlentities($_SERVER["PHP_SELF"])."?module=chatbox&autorefresh=1\">");
		}
		echo "
		<p class=\"title\">".$titre_chatbox." ".Securite::html($_SESSION['username'])." !</p><br />";
		if ($autorefresh == 0)
		{
			echo("Actualisation automatique: <span style=\"color:red;\"><b>Off</b></span> (<a href=\"".htmlentities($_SERVER["PHP_SELF"])."?module=chatbox&autorefresh=1\">Activer</a>)<br /><br />");
		}
		elseif($autorefresh == 1)
		{
			echo("Actualisation automatique: <span style=\"color:green;\"><b>On</b></span> (<a href=\"".htmlentities($_SERVER["PHP_SELF"])."?module=chatbox&autorefresh=0\">Désactiver</a>)<br /><br />");
		}
		echo "<div id=\"shoutbox\">
			<div id=\"shoutbox_content\">";
				mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
				mysql_select_db($coolwow['db']) or die(mysql_error());
				$retour_total=mysql_query('SELECT COUNT(*) AS total FROM chatbox'); //Nous récupérons le contenu de la requête dans $retour_total
				$donnees_total=mysql_fetch_assoc($retour_total); //On range retour sous la forme d'un tableau.
				$total=Securite::html($donnees_total['total']); //On récupère le total pour le placer dans la variable $total.
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
						if($_SESSION['auth'] == "yes" AND $_SESSION['gmlevel'] >= $chatbox)
						{
							echo "<a href=\"admin/index.php?module=chatbox&action=delete&id=".$donnees['id_msg']."\"><img src='images/delete.gif' /></a> ";
						}
						else
						{
							echo "";
						}
						$date = Securite::html($donnees['date_msg']);
						$date = substr($date,11,5);
						if(Securite::html($donnees['gmlevel']) == 0)
						{
							echo "<b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." :</b> ".Securite::html($donnees['msg'])."<br />";
						}
						elseif(Securite::html($donnees['gmlevel']) == 1)
						{
							echo "<span style=\"color:yellow;\"><b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." - MODERATEUR :</b> ".Securite::html($donnees['msg'])."</span><br />";
						}
						elseif(Securite::html($donnees['gmlevel']) == 2)
						{
							echo "<span style=\"color:orange;\"><b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." - MJ :</b> ".Securite::html($donnees['msg'])."</span><br />";
						}
						elseif(Securite::html($donnees['gmlevel']) == 3)
						{
							echo "<span style=\"color:red;\"><b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." - MJ :</b> ".Securite::html($donnees['msg'])."</span><br />";
						}
						elseif(Securite::html($donnees['gmlevel']) == 4)
						{
							echo "<span style=\"color:red;\"><b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." - MJ :</b> ".Securite::html($donnees['msg'])."</span><br />";
						}
						else
						{
							echo "<span style=\"color:red;\"><b>A ".$date.", ".Securite::html($donnees['auteur_msg'])." - ADMIN :</b> ".Securite::html($donnees['msg'])."</span><br />";
						}
					}
				}
			echo "</div>
		</div>
		<div class=\"center\">Message limité à 500 caractères.<br /><br />
		<a href=\"index.php?module=chatbox&action=historique\">Voir l'historique</a></div>
		<br />
		<div class=\"center\">";
					if($_SESSION['auth'] == "yes")
					{
						echo "<div class=\"center\">
							<form name=\"poste\" action=\"index.php?module=chatbox&action=envoyer\" method=\"POST\">
							Message: <input type=\"text\" name=\"msg\" size=\"100\" maxsize=\"500\" /><input type=\"submit\" value=\"Envoyer\" />
							</form>
						</div>";
					}
					else
					{
						echo "Merci de vous connectez pour écrire un message.";
					}
		echo "<div>
													</td>
										</tr>
									</table>
								</td>
								<td class=\"md\" width=\"21px\"></td>
							</tr>
							<tr>
								<td width=\"21px\"><img src=\"themes/$theme/bg.png\" width=\"21px\" height=\"21px\" alt=\"bg\"></td>
								<td class=\"bm\" width=\"100%\"></td>
								<td width=\"21px\"><img src=\"themes/$theme/bd.png\" width=\"21px\" height=\"21px\" alt=\"bd\"></td>
							</tr>
						</table>
						<br />
						<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
							<tr>
								<td width=\"21px\"><img src=\"themes/$theme/hg.png\" width=\"21px\" height=\"21px\" alt=\"hg\" /></td>
								<td class=\"hm\" width=\"100%\"></td>
								<td width=\"21px\"><img src=\"themes/$theme/hd.png\" width=\"21px\" height=\"21px\" alt=\"hd\" /></td>
							</tr>
							<tr>
								<td class=\"mg\" width=\"21px\"></td>
								<td>
									<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
										<tr>
											<td class=\"fond\" align=\"center\" height=\"100%\" width=\"100%\">
		";
		echo "<p class=\"title\">Les 5 Derniers messages du forum</p><br />";
		echo "
		<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
			<tr>
				<td> 
					<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
						<tr>
							<td>
								<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
									<tr>
										<td>
											<table width=\"100%\" border=\"1\" cellpadding=\"0\" cellspacing=\"0\" >
												<tr height=\"32\">
													<th height=\"31\" colspan=\"2\" align=\"center\" background=\"themes/".$theme."/forums/cellpic1.gif\" nowrap><font color=\"#FFFFFF\"><strong>Forum</strong></font></th>
													<th width=\"100\" align=\"center\" background=\"themes/".$theme."/forums/images/cellpic1.gif\" nowrap><font color=\"#FFFFFF\"><strong>Réponse</strong></font></th>
													<th width=\"120\" align=\"center\" background=\"themes/".$theme."/forums/images/cellpic1.gif\" nowrap><font color=\"#FFFFF\"><strong>Auteur</strong></font></th>
													<th width=\"50\" align=\"center\" background=\"themes/".$theme."/forums/images/cellpic1.gif\" nowrap><font color=\"#FFFFFF\"><strong>Vus</strong></font></th>
													<th align=\"center\" background=\"themes/".$theme."/forums/images/cellpic1.gif\" nowrap><font color=\"#FFFFFF\"><strong>Derniers Messages</strong></font></th>
												</tr>";
												mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
												mysql_select_db($coolwow['db']) or die(mysql_error());
												$reponse2 = mysql_query('SELECT forum_forum.forum_name, forum_topic.topic_id, topic_titre, topic_createur, topic_vu, topic_post, topic_time, topic_last_post, Mb.pseudo AS membre_pseudo_createur, post_createur, post_time, Ma.pseudo AS membre_pseudo_last_posteur FROM forum_topic 
												LEFT JOIN membres Mb ON Mb.id = forum_topic.topic_createur
												LEFT JOIN forum_post ON forum_topic.topic_last_post = forum_post.post_id
												LEFT JOIN membres Ma ON Ma.id = forum_post.post_createur
												LEFT JOIN forum_forum ON forum_forum.forum_id = forum_post.post_forum_id
												WHERE forum_forum.forum_cat_id != 8
												ORDER BY forum_post.post_time DESC LIMIT 0,5') or die (mysql_error());
												
												while($data = mysql_fetch_assoc($reponse2))
												{
													echo "<tr> 
													    <td height=\"54\" nowrap bgcolor=\"#202020\" class=\"row1\"><img src=\"themes/".$theme."/images/forums/message.gif\" border=\"0\" /></td>
													    <td width=\"100%\" bgcolor=\"#202020\" class=\"row1\">&nbsp;&nbsp;".Securite::html($data['forum_name'])."<a href=\"\" class=\"forum\"><b></b></a><br>&nbsp;&nbsp;<a href=\"index.php?module=forums&action=voirtopic&t=".$data['topic_id']."\" class=\"forum\">".$data['topic_titre']."</a></td>
													    <td align=\"center\" bgcolor=\"#353535\"><font color=\"#FFFFFF\">".Securite::html($data['topic_post'])."</font></td>
													    <td align=\"center\" bgcolor=\"#353535\" class=\"row3\"><a href=\"index.php?module=profil&id=".Securite::html($data['topic_createur'])."\" class=\"forum\">".Securite::html($data['membre_pseudo_createur'])."</a></td>
													    <td align=\"center\" bgcolor=\"#353535\"><font color=\"#FFFFFF\">".Securite::html($data['topic_vu'])."</font></td>
													    <td align=\"center\" nowrap bgcolor=\"#353535\"><font size=\"-2\" color=\"#FFFFFF\">&nbsp;&nbsp;&nbsp;".date('d-m-y à H\hi',$data['post_time'])."</font><br>
													      <a href=\"index.php?module=profil&id=".Securite::html($data['post_createur'])."\" class=\"forum\">".Securite::html($data['membre_pseudo_last_posteur'])."</a>&nbsp;<a href=\"index.php?module=forums&action=voirtopic&t=".Securite::html($data['topic_id'])."\" class=\"forum\"><img src=\"themes/".$theme."/images/forums/go.gif\" alt=\"Last Post\" border=\"0\"></a></td>
													</tr>";
												}
											echo "</table>
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>";
    break;
}
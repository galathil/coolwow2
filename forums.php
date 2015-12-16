<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

if ($forum_actif != "oui")
{
	echo "<p>Le forums interne est désactivé !!!</p>";
	echo "<a href='index.php'>Accueil</a>";
}
else
{
	require("kernel/bbcode.php");

	mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
	mysql_select_db($coolwow['db']) or die(mysql_error());

	$membre_id = $_SESSION['id'];

	switch ($_GET['action'])
	{
		case "voirforum":
			$forum = mysql_real_escape_string(htmlspecialchars($_GET['f'], ENT_QUOTES));
			$page_get = mysql_real_escape_string(htmlspecialchars($_GET['page'], ENT_QUOTES));
			if(empty($page_get))
			{
				$truc = 1;
			}
			else
			{
				$truc = $page_get;
			}
			if(ctype_digit($forum))
			{
				if(empty($membre_id))
				{
					$membre_id = 0;
				}
				$test = mysql_query("SELECT forum_id FROM forum_forum WHERE forum_id = '".$forum."'") or die(mysql_error());
				if(mysql_num_rows($test) == 0)
				{
					echo "<p>Ce forum n'existe pas !</p>";
					echo "<a href='index.php?module=forums'>Retour</a>";
				}
				else
				{
					$retour_total=mysql_query("SELECT COUNT(*) AS total FROM forum_acces_forum 
					LEFT JOIN forum_groups ON forum_groups.group_id = forum_acces_forum.group_id
					LEFT JOIN membres_groups ON membres_groups.group_id = forum_groups.group_id
					WHERE membre_id = ".$membre_id." AND forum_id = ".$forum."") or die(mysql_error());
					$donnees_total=mysql_fetch_assoc($retour_total);
					$total=$donnees_total['total'];
					
					if($total == 1 OR $_SESSION['gmlevel'] >= $gmlevel)
					{
						if(!empty($forum))
						{
							echo "<div align=\"left\">";

							$requete1 = mysql_query("SELECT forum_name, forum_topic, auth_view, auth_topic FROM forum_forum WHERE forum_id = '".$forum."'") or die (mysql_error());
							$data1 = mysql_fetch_assoc($requete1);
							
							$totalDesMessages = $data1['forum_topic'];
							$nombreDeMessagesParPage = $message_par_page;
							$nombreDePages = ceil($totalDesMessages / $nombreDeMessagesParPage);

							echo'<a href ="index.php?module=forums">Index du forum</a> / 
							<a href="index.php?module=forums&action=voirforum&f='.$forum.'">'.$data1['forum_name'].'</a><br />';

							//Nombre de pages
							if (isset($truc))
							{
								$page = intval($truc);
							}
							else
							{
								$page = 1;
							}
							//On affiche les pages 1-2-3, etc.
							echo 'Page : ';
							for ($i = 1 ; $i <= $nombreDePages ; $i++)
							{
							    if ($i == $page) //On ne met pas de lien sur la page actuelle
							    {
									echo $i;
							    }
							    else
							    {
									echo '<a href="index.php?module=forums&action=voirforum&f='.$forum.'&amp;page='.$i.'">'.$i.'</a>';
							    }
							}

							$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage;

							//Le titre du forum
							echo '<h1>'.$data1['forum_name'].'</h1>';


							//Et le bouton pour poster
							if($_SESSION['auth'] == "yes")
							{
								echo'<p><a href="index.php?module=forums&action=nouveautopic&f='.$forum.'">
							<img src="themes/'.$theme.'/images/forums/nouveau.gif" alt="Nouveau topic" title="Poster un nouveau topic" /></a></p>';
							}
							else
							{
								echo "";
							}
							//On prend tout ce qu'on a sur les Annonces du forum
							       

							$requete3 = mysql_query('SELECT forum_topic.topic_id, topic_titre, topic_createur, topic_vu, topic_post, topic_time, topic_last_post,
							Mb.pseudo AS membre_pseudo_createur, post_createur, post_time, Ma.pseudo AS membre_pseudo_last_posteur FROM forum_topic 
							LEFT JOIN membres Mb ON Mb.id = forum_topic.topic_createur
							LEFT JOIN forum_post ON forum_topic.topic_last_post = forum_post.post_id
							LEFT JOIN membres Ma ON Ma.id = forum_post.post_createur    
							WHERE topic_genre = "Annonce" AND forum_topic.forum_id = "'.$forum.'" 
							ORDER BY topic_last_post DESC');
							//On lance notre tableau seulement s'il y a des requêtes !
							if (mysql_num_rows($requete3) > 0)
							{
							        ?>
							        <table class="forum">   
										<tr>
									        <th></th>
									        <th class="titre2"><strong>Titre</strong></th>             
									        <th class="nombremessages"><strong>Réponses</strong></th>
									        <th class="nombrevu"><strong>Auteur</strong></th>
									        <th class="auteur"><strong>Vus</strong></th>                       
									        <th class="derniermessage"><strong>Dernier message</strong></th>
										</tr>   
							       
							        <?php
							        //On commence la boucle
							        while ($data3 = mysql_fetch_assoc($requete3))
							        {
							                //Pour chaque topic :
							                //Si le topic est une annonce on l'affiche en haut
							                //mega echo de bourrain pour tout remplir
							               
							                echo'<tr>
											<td><img src="themes/'.$theme.'/images/forums/annonce.gif" alt="Annonce" /></td>
							                <td id="titre2"><strong>Annonce : </strong>
							                <strong><a href="index.php?module=forums&action=voirtopic&t='.$data3['topic_id'].'"                 
							                title="Topic commencé à
							                '.date('H\hi \l\e d M,y',$data3['topic_time']).'">
							                '.$data3['topic_titre'].'</a></strong></td>

							                <td class="nombremessages">'.$data3['topic_post'].'</td>
											
											<td class="auteur"><a href="index.php?module=profil&id='.$data3['topic_createur'].'">
							                '.$data3['membre_pseudo_createur'].'</a></td>

							                <td class="nombrevu">'.$data3['topic_vu'].'</td>

							                <td class="derniermessage">Par
							                <a href="index.php?module=profil&id='.$data3['post_createur'].'">
							                '.$data3['membre_pseudo_last_posteur'].'</a><br />
							                A '.date('H\hi \l\e d M y',$data3['post_time']).'</td></tr>';
							        }
							        ?>
							        </table>
									<br />
							        <?php
							}
							//On prend tout ce qu'on a sur les topics normaux du forum


							$requete3 = mysql_query('SELECT forum_topic.topic_id, topic_titre, topic_createur, topic_vu, topic_post, topic_time, topic_last_post,
							Mb.pseudo AS membre_pseudo_createur, post_createur, post_time, Ma.pseudo AS membre_pseudo_last_posteur FROM forum_topic
							LEFT JOIN membres Mb ON Mb.id = forum_topic.topic_createur
							LEFT JOIN forum_post ON forum_topic.topic_last_post = forum_post.post_id
							LEFT JOIN membres Ma ON Ma.id = forum_post.post_createur   
							WHERE topic_genre <> "Annonce" AND forum_topic.forum_id = "'.$forum.'"
							ORDER BY topic_last_post DESC
							LIMIT ' . $premierMessageAafficher . ', ' . $nombreDeMessagesParPage .'')
							or die (mysql_error());

							if (mysql_num_rows($requete3) > 0)
							{
							?>
							        <table class="forum">
							        <tr>
							        <th></th>
							        <th class="titre2"><strong>Titre</strong></th>             
							        <th class="nombremessages"><strong>Réponses</strong></th>
							        <th class="nombrevu"><strong>Vus</strong></th>
							        <th class="auteur"><strong>Auteur</strong></th>                       
							        <th class="derniermessage"><strong>Dernier message</strong></th>
							        </tr>
							        <?php
							        //On lance la boucle
							       
							        while ($data3 = mysql_fetch_assoc($requete3))
							        {
							                //Ah bah tiens... re vla l'echo de fou
							                echo'<tr><td><img src="themes/'.$theme.'/images/forums/message.gif" alt="Message" /></td>

							                <td class="titre2">
							                <strong><a href="index.php?module=forums&action=voirtopic&t='.$data3['topic_id'].'"                 
							                title="Topic commencé à
							                '.date('H\hi \l\e d M,y',$data3['topic_time']).'">
							                '.$data3['topic_titre'].'</a></strong></td>

							                <td class="nombremessages">'.$data3['topic_post'].'</td>

							                <td class="nombrevu">'.$data3['topic_vu'].'</td>

							                <td class="auteur"><a href="index.php?module=profil&id='.$data3['topic_createur'].'">'.$data3['membre_pseudo_createur'].'</a></td>

							                
											<td class="derniermessage">
											'.date('d-m-y à H\hi',$data3['post_time']).'<br />
											<a href="index.php?module=forums&action=voirtopic&t='.$data3['topic_id'].'">Dernier message</a> :
											<a href="index.php?module=profil&id='.$data3['post_createur'].'">
											'.$data3['membre_pseudo_last_posteur'].'  </a>
											</td>
											</tr>';

							        }
							        ?>
							        </table></div>
							        <?php
							}
							else //S'il n'y a pas de message
							{
							        echo'<p>Ce forum ne contient aucun sujet actuellement</p>';
							}
						}
						else
						{
							echo "<p>Erreur d'accès</p>";
							echo "<p><a href='index.php?module=forums'>Retour</a></p>";
						}
					}
					else
					{
						echo "<p>Vous n'avez pas le droit d'accéder a ce forum !!!</p>";
						echo "<p><a href='index.php?module=forums'>Retour</a></p>";
					}
				}
			}
			else
			{
				echo "<p>Erreur d'accès</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "voirtopic":
			$topic = mysql_real_escape_string(htmlspecialchars($_GET['t'], ENT_QUOTES));
			$page_get = mysql_real_escape_string(htmlspecialchars($_GET['page'], ENT_QUOTES));
			if(empty($page_get))
			{
				$truc = 1;
			}
			else
			{
				$truc = $page_get;
			}
			if(ctype_digit($topic))
			{
				if(empty($membre_id))
				{
					$membre_id = 0;
				}
				$test = mysql_query("SELECT topic_id FROM forum_topic WHERE topic_id = '".$topic."'") or die(mysql_error());
				if(mysql_num_rows($test) == 0)
				{
					echo "<p>Ce sujet n'existe pas !</p>";
					echo "<a href='index.php?module=forums'>Retour</a>";
				}
				else
				{
					$requete1 = mysql_query("
					SELECT topic_titre, topic_post, forum_topic.forum_id, 
					forum_name, auth_view, auth_topic, auth_post, closed
					FROM forum_topic 
					LEFT JOIN forum_forum ON forum_topic.forum_id = forum_forum.forum_id 
					WHERE topic_id = ".$topic."") or die (mysql_error());
					$data1 = mysql_fetch_assoc($requete1);
					$forum = $data1['forum_id'];
					
					$retour_total=mysql_query("SELECT COUNT(*) AS total FROM forum_acces_forum 
					LEFT JOIN forum_groups ON forum_groups.group_id = forum_acces_forum.group_id
					LEFT JOIN membres_groups ON membres_groups.group_id = forum_groups.group_id
					WHERE membre_id = ".$membre_id." AND forum_id = ".$forum."") or die(mysql_error());
					$donnees_total = mysql_fetch_assoc($retour_total);
					$total = $donnees_total['total'];
					
					if($total == 1 OR $_SESSION['gmlevel'] >= $gmlevel)
					{
						if(!empty($topic))
						{
							echo "<div align=\"left\">";
							 
							$totalDesMessages = $data1['topic_post'];
							$nombreDeMessagesParPage = $message_par_page;
							$nombreDePages = ceil($totalDesMessages / $nombreDeMessagesParPage);
							$closed = $data1['closed'];
							?>
							<div id="corps_forum">
							<a href ="index.php?module=forums">Index du forum</a> /
							<a href="index.php?module=forums&action=voirforum&f=<?php echo $data1['forum_id'] ?>"><?php echo $data1['forum_name'] ?></a> /
							<a href="index.php?module=forums&action=voirtopic&t=<?php echo $topic ?>"><?php echo $data1['topic_titre'] ?></a>
							 
							<?php

							//Nombre de pages
							 
							if (isset($truc))
							{
							$page = intval($truc);
							}
							else
							{
							$page = 1;
							}
							//On affiche les pages 1-2-3 etc...
							echo '<p>Page : ';
							for ($i = 1 ; $i <= $nombreDePages ; $i++)
							{
							    if ($i == $page) //On ne met pas de lien sur la page actuelle
							    {
							    echo $i;
							    }
							    else
							    {
							    echo '<a href="index.php?module=forums&action=voirtopic&t='.$topic.'&page='.$i.'">' . $i . '</a>';
							    }
							}
							        echo'</p>';
							 
							$premierMessageAafficher = ($page - 1) * $nombreDeMessagesParPage;
							 
							//On affiche le titre :
							echo '<h1>'.$data1['topic_titre'].'</h1>';

							if($_SESSION['auth'] == "yes")
							{
								if($closed == 1)
								{
									if($_SESSION['gmlevel'] >= $gmlevel)
									{
										echo "<p><a href=\"index.php?module=forums&action=repondre&t=".$topic."\"><img src=\"themes/".$theme."/images/forums/verrouille.gif\" alt=\"Verrouillé\" title=\"Ce topic est verrouillé\" /></a> ";
										echo "<a href=\"index.php?module=forums&action=deverrouille_topic&amp;t=".$topic."\"><img src=\"themes/".$theme."/images/forums/deverrouille.gif\" alt=\"Déverrouillé\" title=\"Déverrouillé ce topic\" /></a>";
									}
									else
									{
										echo "<p><img src=\"themes/".$theme."/images/forums/verrouille.gif\" alt=\"Verrouillé\" title=\"Ce topic est verrouillé\" /> ";
									}
									echo "</p>";
								}
								else
								{
									echo'<p><a href="index.php?module=forums&action=repondre&t='.$topic.'">
								<img src="themes/'.$theme.'/images/forums/repondre.gif" alt="Répondre" title="Répondre à ce topic" /></a>';
									echo'<a href="index.php?module=forums&action=nouveautopic&amp;f='.$data1['forum_id'].'">
								<img src="themes/'.$theme.'/images/forums/nouveau.gif" alt="Nouveau topic" title="Poster un nouveau topic" /></a>';
									if($_SESSION['gmlevel'] >= $gmlevel)
									{
										echo " <a href=\"index.php?module=forums&action=verrouille_topic&amp;t=".$topic."\"><img src=\"themes/".$theme."/images/forums/verrouille.gif\" alt=\"Verrouiller topic\" title=\"Verrouillé ce topic\" /></a>";
									}
									else
									{
										echo "";
									}
									echo "</p>";
								}
							}
							else
							{
								echo "";
							}
							 
							$requete2 = mysql_query('
							SELECT post_id , post_createur , post_texte , post_time ,
							id, pseudo, membre_inscrit, membre_avatar, membre_localisation, membre_post, membre_signature, rank_nom
							FROM forum_post
							LEFT JOIN membres ON membres.id = forum_post.post_createur
							LEFT JOIN forum_ranks ON forum_ranks.rank_id = membres.membre_rank
							WHERE topic_id ="'.$topic.'"
							ORDER BY post_id
							LIMIT ' . $premierMessageAafficher . ', ' . $nombreDeMessagesParPage . '')or die(mysql_error());
							 
							if (mysql_num_rows($requete2) < 1)
							{
							        echo"<p>Il n y a aucun post sur ce topic, vérifiez l'url et reessayez</p>";
							}
							else
							{
							        ?>
									<table class="forum">
										<tr>
											<th class="vt_auteur"><strong>Auteurs</strong></th>             
											<th class="vt_mess"><strong>Messages</strong></th>       
										</tr>
							        <?php
							        while ($data2 = mysql_fetch_assoc($requete2))
							        {
										echo'
										<tr>
											<td class="test" rowspan="2">
												<strong><a href="index.php?module=profil&id='.$data2['id'].'">
												'.$data2['pseudo'].'</a></strong><br />
												<img src="images/avatars/'.$data2['membre_avatar'].'" alt="" />
												<br /><b>'.$data2['rank_nom'].'</b>
												<br />Inscrit le '.date('d/m/Y',$data2['membre_inscrit']).'
												<br />Messages : '.$data2['membre_post'].'<br />
												Localisation : '.$data2['membre_localisation'].'
											</td>';
										if ($_SESSION['id'] == $data2['post_createur'] OR $_SESSION['gmlevel'] >= $gmlevel)
										{
											echo'
											<td>
												Posté à '.date('H\hi \l\e d M y',$data2['post_time']).'
												<align "right">
												<a href="index.php?module=forums&action=supprimer&p='.$data2['post_id'].'&t='.$topic.'">
												<img src="themes/'.$theme.'/images/forums/supprimer.gif" alt="Supprimer"
												title="Supprimer ce message" /></a>   
												<a href="index.php?module=forums&action=editer&p='.$data2['post_id'].'&t='.$topic.'">
												<img src="themes/'.$theme.'/images/forums/editer.gif" alt="Editer"
												title="Editer ce message" /></a></align>
											</td>
										</tr>';
										}
										else
										{
											echo'<td>Posté à '.date('H\hi \l\e d M y',$data2['post_time']).'</td></tr>';
										}
										//Détails sur le membre qui a posté
										echo'
										<tr>
											
											<td>';
												echo bbcode(nl2br($data2['post_texte']));
												if(empty($data2['membre_signature']))
												{
													echo "<br /><br />";
												}
												else
												{
													echo'<br /><hr />'.$data2['membre_signature'].'';
												}
											echo '</td>
										</tr>
										<tr>
											<td height="5px" colspan="2"></td>
										</tr>';
							        }
							        ?>
							</table>
							<?php
							if($_SESSION['auth'] == "yes")
							{
								if($closed == 1)
								{
									if($_SESSION['gmlevel'] >= $gmlevel)
									{
										echo "<p><a href=\"index.php?module=forums&action=repondre&t=".$topic."\"><img src=\"themes/".$theme."/images/forums/verrouille.gif\" alt=\"Verrouillé\" title=\"Ce topic est verrouillé\" /></a> ";
										echo "<a href=\"index.php?module=forums&action=deverrouille_topic&amp;t=".$topic."\"><img src=\"themes/".$theme."/images/forums/deverrouille.gif\" alt=\"Déverrouillé\" title=\"Déverrouillé ce topic\" /></a>";
									}
									else
									{
										echo "<p><img src=\"themes/".$theme."/images/forums/verrouille.gif\" alt=\"Verrouillé\" title=\"Ce topic est verrouillé\" />";
									}
									echo "</p>";
								}
								else
								{
									echo'<p><a href="index.php?module=forums&action=repondre&t='.$topic.'">
									<img src="themes/'.$theme.'/images/forums/repondre.gif" alt="Répondre" title="Répondre à ce topic" /></a>';
									echo'<a href="index.php?module=forums&action=nouveautopic&amp;f='.$data1['forum_id'].'">
									<img src="themes/'.$theme.'/images/forums/nouveau.gif" alt="Nouveau topic" title="Poster un nouveau topic" /></a>';
									if($_SESSION['gmlevel'] >= $gmlevel)
									{
										echo " <a href=\"index.php?module=forums&action=verrouille_topic&amp;t=".$topic."\"><img src=\"themes/".$theme."/images/forums/verrouille.gif\" alt=\"Verrouiller topic\" title=\"Verrouillé ce topic\" /></a>";
									}
									else
									{
										echo "";
									}
									echo "</p>";
								}
							}
							else
							{
								echo "";
							}
							?>
							</div>
							<?php
							        echo '<p>Page : ';
							        for ($i = 1 ; $i <= $nombreDePages ; $i++)
							        {
							                if ($i == $page) //On affiche pas la page actuelle en lien
							                {
							                echo' '.$i.' ';
							                }
							                else
							                {
							                echo '<a href="index.php?module=forums&action=voirtopic&t='.$topic.'&page='.$i.'">
							                ' . $i . '</a> ';
							                }
							        }
							        echo'</p>';
							       
							        //On ajoute 1 au nombre de visites de ce topic
							        mysql_query('UPDATE forum_topic
							        SET topic_vu = topic_vu + 1 WHERE topic_id = '.$topic.'');
							 
							} //Fin du if qui vérifiait si le topic contenait au moins un message
							         
							mysql_close();
						}
						else
						{
							echo "<p>Erreur d'accès</p>";
							echo "<p><a href=\"index.php?module=forums\">Retour</a></p>";
						}
					}
					else
					{
						echo "<p>Vous n'avez pas le droit d'accéder a ce sujet !!!</p>";
						echo "<p><a href=\"index.php?module=forums\">Retour</a></p>";
					}
				}	
			}
			else
			{
				echo "<p>Erreur d'accès</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "nouveautopic":
			$forumid = mysql_real_escape_string(htmlspecialchars($_GET['f'], ENT_QUOTES));
			if($_SESSION['auth'] == "yes")
			{		
				if(!empty($forumid) AND ctype_digit($forumid))
				{
					?>
					<h1>Nouveau topic</h1>
					<div align="left">
					<form name="forum" method="POST" action="index.php?module=forums&action=nouveautopic_v&amp;f=<?php echo $forumid ?>" name="formulaire">
					 
					<fieldset><legend>Titre</legend>
					<input type="text" size="80" id="titre" name="titre" /></fieldset>
					 
					<fieldset><legend>Mise en forme</legend>
						<input type="image" src="images/bbcode/bold_fr.gif" border="1" id="gras" name="gras" value="G" onClick="javascript:bbcode('[b]', '[/b]');return(false)" />
						<input type="image" src="images/bbcode/italic.gif" border="1" id="italic" name="italic" value="I" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
						<input type="image" src="images/bbcode/underline.gif" border="1" id="souligné" name="souligné" value="S" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
						<input type="image" src="images/bbcode/left.gif" border="1" id="gauche" name="gauche" value="Gau" onClick="javascript:bbcode('[left]', '[/left]');return(false)" />
						<input type="image" src="images/bbcode/center.gif" border="1" id="centré" name="centré" value="C" onClick="javascript:bbcode('[center]', '[/center]');return(false)" />
						<input type="image" src="images/bbcode/right.gif" border="1" id="droite" name="droite" value="D" onClick="javascript:bbcode('[right]', '[/right]');return(false)" />
						<input type="image" src="images/bbcode/full.gif" border="1" id="justifié" name="justifié" value="J" onClick="javascript:bbcode('[full]', '[/full]');return(false)" />
						<br />
						<input type="image" src="images/bbcode/link.gif" border="1" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
						<input type="image" src="images/bbcode/mail.gif" border="1" id="email" name="email" value="@" onClick="javascript:bbcode('[email]', '[/email]');return(false)" />
						<input type="image" src="images/bbcode/image.gif" border="1" id="image" name="image" value="Image" onClick="javascript:bbcode('[img]', '[/img]');return(false)" />
						<br />
						<a href='javascript:addsm(":)")' title=':)'><img src='images/smileys/icon_biggrin.gif' border=0></a>
						<a href='javascript:addsm(":D")' title=':D'><img src='images/smileys/icon_lol.gif' border=0></a>
						<a href='javascript:addsm(":love:")' title=':love:'><img src='images/smileys/sm3.gif' border=0></a>
						<a href='javascript:addsm(":o")' title=':o'><img src='images/smileys/icon_eek.gif' border=0></a>
						<a href='javascript:addsm(";)")' title=';)'><img src='images/smileys/icon_wink.gif' border=0></a>
						<a href='javascript:addsm(":cry:")' title=':cry:'><img src='images/smileys/icon_cry.gif' border=0></a>
						<a href='javascript:addsm(":(")' title=':('><img src='images/smileys/icon_sad.gif' border=0></a>
						<a href='javascript:addsm(";(")' title=';('><img src='images/smileys/icon_evil.gif' border=0></a>
						<a href='javascript:addsm(":fuck:")' title=':fuck:'><img src='images/smileys/sm30.gif' border=0></a>
						<a href='javascript:addsm(":cool:")' title=':cool:'><img src='images/smileys/sm28.gif' border=0></a>
						<a href='javascript:addsm(":p")' title=':p'><img src='images/smileys/sm12.gif' border=0></a>
						<a href='javascript:addsm(":haha:")' title=':haha:'><img src='images/smileys/sm38.gif' border=0></a>
					</fieldset>
					<fieldset>
					<legend>Message</legend>
					<textarea cols="80" rows="20" id="message" name="message"></textarea>
					<br />
					<?php
					if($_SESSION['gmlevel'] >= 2)
					{
						echo "<label><input type=\"radio\" name=\"type\" value=\"Annonce\" />Annonce</label>";
					}
					else
					{
						echo "";
					}
					?>
					<label><input type="radio" name="type" value="Message" checked="checked" />Topic</label>
					</fieldset>
					<p>
					<input type="submit" name="submit" value="Envoyer" />
					<input type="reset" name = "Effacer" value = "Effacer" /></p>
					</form></div>
					<?php
				}
				else
				{
					echo "<p>Erreur d'accès !!!</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p>Merci de vous connecter pour poster un nouveau topic !</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "nouveautopic_v":
			$message = mysql_real_escape_string(htmlspecialchars($_POST['message'], ENT_QUOTES));
			$titre = mysql_real_escape_string(htmlspecialchars($_POST['titre'], ENT_QUOTES));
			$type = mysql_real_escape_string(htmlspecialchars($_POST['type'], ENT_QUOTES));
			$forumid = mysql_real_escape_string(htmlspecialchars($_GET['f'], ENT_QUOTES));
			$temps = time();
			
			if($_SESSION['auth'] == "yes")
			{
				if(!empty($forumid) AND ctype_digit($forumid))
				{
					if (empty($message) || empty($titre))
					{
						echo'<p>Votre message ou votre titre est vide, cliquez <a href="index.php?module=forums&action=nouveautopic&f='.$forumid.'">ici</a> pour recommencer</p>';
					}
					else //Si jamais le message n'est pas vide
					{
						//On entre le topic dans la base de donnée en laissant
						//le champ topic_last_post à 0
						mysql_query("INSERT INTO forum_topic
						(forum_id, topic_titre, topic_createur, topic_vu, topic_time, topic_genre, topic_last_post, topic_post)
						VALUES('".$forumid."', '".$titre."', '".$_SESSION['id']."', '1', '".$temps."','".$type."', '0', '0'  )")
						or die ("Un problème est survenu lors de l'envoi du message");

						$nouveautopic = mysql_insert_id();

						//Puis on entre le message
						mysql_query("INSERT INTO forum_post
						(post_id, post_createur, post_texte, post_time, topic_id, post_forum_id)
						VALUES(',' ,'".$_SESSION['id']."', '".$message."', '".$temps."', '".$nouveautopic."', '".$forumid."')")
						or die ("Un problème est survenu lors de l'envoi du message");

						$nouveaupost = mysql_insert_id();

						//Ici on update comme prévu la valeur de topic_last_post et de topic_first_post
						mysql_query("UPDATE forum_topic
						SET topic_last_post = '".$nouveaupost."',
						topic_first_post = '".$nouveaupost."'
						WHERE topic_id = '".$nouveautopic."'")
						or die ("Un problème est survenu lors de l'envoi du message");


						//Enfin on met à jour les tables forum_forum et membres
						mysql_query("UPDATE forum_forum
						SET forum_post = forum_post + 1 ,
						forum_topic = forum_topic + 1,
						forum_last_post_id = '".$nouveaupost."'
						WHERE forum_id = '".$forumid."'")
						or die ("Un problème est survenu lors de l'envoi du message");

						mysql_query("UPDATE membres
						SET membre_post = membre_post + 1
						WHERE id = '".$_SESSION['id']."'")
						or die ("Un problème est survenu lors de l'envoi du message");

						//Et un petit message
						echo'<p>Votre message a bien été ajouté!<br /><br />Cliquez <a href="index.php?module=forums">ici</a> pour revenir à l index du forum<br />Cliquez <a href="index.php?module=forums&action=voirtopic&t='.$nouveautopic.'">ici</a> pour le voir</p>';
					}
				}
				else
				{
					echo "<p>Erreur d'accès !!!</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p>Erreur de lien !!!</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "repondre":
			$topicid = mysql_real_escape_string(htmlspecialchars($_GET['t'], ENT_QUOTES));
			if($_SESSION['auth'] == "yes")
			{
				if(!empty($topicid) AND ctype_digit($topicid))
				{
					$retour = mysql_query('SELECT COUNT(*) AS nbre_entrees FROM forum_topic WHERE topic_id = '.$topicid.' AND closed = 1');
					$donnees = mysql_fetch_array($retour);
					$verou = $donnees['nbre_entrees'];
					if($verou == 0 OR $_SESSION['gmlevel'] >= $gmlevel)
					{
						?>
						<h1>Poster une réponse</h1>
						<div align="left">
						<form name="forum" method="POST" action="index.php?module=forums&action=repondre_v&t=<?php echo $topicid ?>" name="formulaire">
						 
						<fieldset><legend>Mise en forme</legend>
							<input type="image" src="images/bbcode/bold_fr.gif" border="1" id="gras" name="gras" value="G" onClick="javascript:bbcode('[b]', '[/b]');return(false)" />
							<input type="image" src="images/bbcode/italic.gif" border="1" id="italic" name="italic" value="I" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
							<input type="image" src="images/bbcode/underline.gif" border="1" id="souligné" name="souligné" value="S" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
							<input type="image" src="images/bbcode/left.gif" border="1" id="gauche" name="gauche" value="Gau" onClick="javascript:bbcode('[left]', '[/left]');return(false)" />
							<input type="image" src="images/bbcode/center.gif" border="1" id="centré" name="centré" value="C" onClick="javascript:bbcode('[center]', '[/center]');return(false)" />
							<input type="image" src="images/bbcode/right.gif" border="1" id="droite" name="droite" value="D" onClick="javascript:bbcode('[right]', '[/right]');return(false)" />
							<input type="image" src="images/bbcode/full.gif" border="1" id="justifié" name="justifié" value="J" onClick="javascript:bbcode('[full]', '[/full]');return(false)" />
							<br />
							<input type="image" src="images/bbcode/link.gif" border="1" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
							<input type="image" src="images/bbcode/mail.gif" border="1" id="email" name="email" value="@" onClick="javascript:bbcode('[email]', '[/email]');return(false)" />
							<input type="image" src="images/bbcode/image.gif" border="1" id="image" name="image" value="Image" onClick="javascript:bbcode('[img]', '[/img]');return(false)" />
							<br />
							<a href='javascript:addsm(":)")' title=':)'><img src='images/smileys/icon_biggrin.gif' border=0></a>
							<a href='javascript:addsm(":D")' title=':D'><img src='images/smileys/icon_lol.gif' border=0></a>
							<a href='javascript:addsm(":love:")' title=':love:'><img src='images/smileys/sm3.gif' border=0></a>
							<a href='javascript:addsm(":o")' title=':o'><img src='images/smileys/icon_eek.gif' border=0></a>
							<a href='javascript:addsm(";)")' title=';)'><img src='images/smileys/icon_wink.gif' border=0></a>
							<a href='javascript:addsm(":cry:")' title=':cry:'><img src='images/smileys/icon_cry.gif' border=0></a>
							<a href='javascript:addsm(":(")' title=':('><img src='images/smileys/icon_sad.gif' border=0></a>
							<a href='javascript:addsm(";(")' title=';('><img src='images/smileys/icon_evil.gif' border=0></a>
							<a href='javascript:addsm(":fuck:")' title=':fuck:'><img src='images/smileys/sm30.gif' border=0></a>
							<a href='javascript:addsm(":cool:")' title=':cool:'><img src='images/smileys/sm28.gif' border=0></a>
							<a href='javascript:addsm(":p")' title=':p'><img src='images/smileys/sm12.gif' border=0></a>
							<a href='javascript:addsm(":haha:")' title=':haha:'><img src='images/smileys/sm38.gif' border=0></a>
						</fieldset>
						<fieldset><legend>Message</legend><textarea cols="80" rows="8" id="message" name="message"></textarea></fieldset>
						<br />
						<input type="submit" name="submit" value="Envoyer" />
						<input type="reset" name = "Effacer" value = "Effacer"/>
						</form></div>
						<?php
					}
					else
					{
						echo "Ce topic est vérrouillé !";
						echo "<p><a href='index.php?module=forums'>Retour</a></p>";
					}
				}
				else
				{
					echo "<p>Erreur d'accès !!!</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p>Merci de vous connecter pour répondre à ce message !</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "repondre_v":
			$topic = mysql_real_escape_string(htmlspecialchars($_GET['t'], ENT_QUOTES));
			$message = mysql_real_escape_string(htmlspecialchars($_POST['message'], ENT_QUOTES));
			$temps = time();
			
			if($_SESSION['auth'] == "yes")
			{
				if(!empty($topic) AND ctype_digit($topic))
				{
					if (empty($message))
					{
					echo'<p>Votre message est vide, cliquez <a href="index.php?module=forums&action=repondre&t='.$topic.'">ici</a> pour recommencer</p>';
					}
					else //Sinon, si le message n'est pas vide
					{
						//On récupère l'id du forum
						$requete2 = mysql_query('SELECT forum_id
						FROM forum_topic
						WHERE topic_id = "'.$topic.'"');

						$data2= mysql_fetch_assoc($requete2) or die ("Une erreur semble être survenue lors de l'envoi du message");
						$forum = $data2['forum_id'];

						//Puis on entre le message
						mysql_query("INSERT INTO forum_post
						(post_id, post_createur, post_texte, post_time, topic_id, post_forum_id)
						VALUES(',' ,'".$_SESSION['id']."', '".$message."', '".$temps."', '".$topic."', '".$forum."')")
						or die ("Une erreur semble avoir survenu lors de l'envoi du message");

						$nouveaupost = mysql_insert_id();

						//On change un peu la table forum_topic
						mysql_query("UPDATE forum_topic
						SET topic_post = topic_post + 1,
						topic_last_post = '".$nouveaupost."'
						WHERE topic_id ='".$topic."'")
						or die ("Une erreur semble avoir survenu lors de l'envoi du message");

						//Puis même combat sur les 2 autres tables
						mysql_query("UPDATE forum_forum
						SET forum_post = forum_post + 1 ,
						forum_last_post_id = '".$nouveaupost."'
						WHERE forum_id = '".$forum."'")
						or die ("Une erreur semble avoir survenu lors de l'envoi du message");

						mysql_query("UPDATE membres
						SET membre_post = membre_post + 1
						WHERE id = '".$_SESSION['id']."'")
						or die ("Une erreur semble avoir survenu lors de l'envoi du message");

						//Et un petit message
						echo'<p>Votre message a bien été ajouté!<br /><br />Cliquez <a href="index.php?module=forums">ici</a> pour revenir à l index du forum<br />Cliquez <a href="index.php?module=forums&action=voirtopic&t='.$topic.'">ici</a> pour le voir</p>';
					}
				}
				else
				{
					echo "<p>Erreur d'accès !!!</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "Erreur de lien !!!";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "editer":
			$post_id = mysql_real_escape_string(htmlspecialchars($_GET['p'], ENT_QUOTES));
			$topic_id = mysql_real_escape_string(htmlspecialchars($_GET['t'], ENT_QUOTES));
			
			if($_SESSION['auth'] == "yes")
			{
				$reponse = mysql_query("SELECT * FROM forum_post WHERE post_id = $post_id AND post_createur = $membre_id") or die(mysql_error());
				
				if(mysql_num_rows($reponse) != 0 OR $_SESSION['gmlevel'] >= $gmlevel)
				{
					if(!empty($post_id) AND !empty($topic_id) AND ctype_digit($post_id) AND ctype_digit($topic_id))
					{
						$reponse2 = mysql_query("SELECT COUNT(*) AS nombre FROM forum_post WHERE topic_id = $topic_id") or die(mysql_error());
						$donnees2 = mysql_fetch_array($reponse2);
						$nb_post = $donnees2['nombre'];
						$reponse5 = mysql_query("SELECT COUNT(*) AS nombre FROM forum_topic WHERE topic_first_post = $post_id") or die(mysql_error());
						$donnees5 = mysql_fetch_array($reponse5);
						$test = $donnees5['nombre'];
						$reponse3 = mysql_query("SELECT * FROM forum_topic WHERE topic_id = $topic_id") or die(mysql_error());
						$donnees3 = mysql_fetch_array($reponse3);
						$reponse4 = mysql_query("SELECT * FROM forum_post WHERE post_id = $post_id") or die(mysql_error());
						$donnees4 = mysql_fetch_array($reponse4);
						if($nb_post == 0 OR $nb_post == NULL OR $test > 1)
						{
							echo "Erreur, merci de prevenir l'administrateur.";
						}
						elseif($test == 1) //si c'est le premier message
						{
							echo '
							<h1>Editer le sujet</h1>
							<div align="left">
							<form name="forum" method="POST" action="index.php?module=forums&action=editer_v" name="formulaire">
							<input type="hidden" name="post_id" value="'.$post_id.'">
							<input type="hidden" name="topic_id" value="'.$topic_id.'">
							 
							<fieldset><legend>Titre</legend>
							<input type="text" size="80" id="titre" name="titre" value="'.$donnees3['topic_titre'].'" /></fieldset>';
							?>
							
							<fieldset><legend>Mise en forme</legend>
								<input type="image" src="images/bbcode/bold_fr.gif" border="1" id="gras" name="gras" value="G" onClick="javascript:bbcode('[b]', '[/b]');return(false)" />
								<input type="image" src="images/bbcode/italic.gif" border="1" id="italic" name="italic" value="I" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
								<input type="image" src="images/bbcode/underline.gif" border="1" id="souligné" name="souligné" value="S" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
								<input type="image" src="images/bbcode/left.gif" border="1" id="gauche" name="gauche" value="Gau" onClick="javascript:bbcode('[left]', '[/left]');return(false)" />
								<input type="image" src="images/bbcode/center.gif" border="1" id="centré" name="centré" value="C" onClick="javascript:bbcode('[center]', '[/center]');return(false)" />
								<input type="image" src="images/bbcode/right.gif" border="1" id="droite" name="droite" value="D" onClick="javascript:bbcode('[right]', '[/right]');return(false)" />
								<input type="image" src="images/bbcode/full.gif" border="1" id="justifié" name="justifié" value="J" onClick="javascript:bbcode('[full]', '[/full]');return(false)" />
								<br />
								<input type="image" src="images/bbcode/link.gif" border="1" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
								<input type="image" src="images/bbcode/mail.gif" border="1" id="email" name="email" value="@" onClick="javascript:bbcode('[email]', '[/email]');return(false)" />
								<input type="image" src="images/bbcode/image.gif" border="1" id="image" name="image" value="Image" onClick="javascript:bbcode('[img]', '[/img]');return(false)" />
								<br />
								<a href='javascript:addsm(":)")' title=':)'><img src='images/smileys/icon_biggrin.gif' border=0></a>
								<a href='javascript:addsm(":D")' title=':D'><img src='images/smileys/icon_lol.gif' border=0></a>
								<a href='javascript:addsm(":love:")' title=':love:'><img src='images/smileys/sm3.gif' border=0></a>
								<a href='javascript:addsm(":o")' title=':o'><img src='images/smileys/icon_eek.gif' border=0></a>
								<a href='javascript:addsm(";)")' title=';)'><img src='images/smileys/icon_wink.gif' border=0></a>
								<a href='javascript:addsm(":cry:")' title=':cry:'><img src='images/smileys/icon_cry.gif' border=0></a>
								<a href='javascript:addsm(":(")' title=':('><img src='images/smileys/icon_sad.gif' border=0></a>
								<a href='javascript:addsm(";(")' title=';('><img src='images/smileys/icon_evil.gif' border=0></a>
								<a href='javascript:addsm(":fuck:")' title=':fuck:'><img src='images/smileys/sm30.gif' border=0></a>
								<a href='javascript:addsm(":cool:")' title=':cool:'><img src='images/smileys/sm28.gif' border=0></a>
								<a href='javascript:addsm(":p")' title=':p'><img src='images/smileys/sm12.gif' border=0></a>
								<a href='javascript:addsm(":haha:")' title=':haha:'><img src='images/smileys/sm38.gif' border=0></a>
							</fieldset>
							 
							<?php
							echo '<fieldset><legend>Message</legend>
							<textarea cols="80" rows="8" id="message" name="message">'.$donnees4['post_texte'].'</textarea>
							<br />';
							if($_SESSION['gmlevel'] >= $gmlevel)
							{
								echo "<label><input type=\"radio\" name=\"mess\" value=\"Annonce\" />Annonce</label>";
							}
							else
							{
								echo "";
							}
							echo '<label><input type="radio" name="mess" value="Message" checked="checked" />Topic</label>
							</fieldset>
							<p>
							<input type="submit" name="submit" value="Modifier" />
							<input type="reset" name ="Effacer" value ="Effacer" /></p>
							</form></div>';
						}
						else //si c'est une reponse
						{
							echo '
							<h1>Editer le post</h1>
							<div align="left">
							<form name="forum" method="POST" action="index.php?module=forums&action=editer_v2" name="formulaire">
							<input type="hidden" name="post_id" value="'.$post_id.'">
							<input type="hidden" name="topic_id" value="'.$topic_id.'">';
							
							?>
							
							<fieldset><legend>Mise en forme</legend>
								<input type="image" src="images/bbcode/bold_fr.gif" border="1" id="gras" name="gras" value="G" onClick="javascript:bbcode('[b]', '[/b]');return(false)" />
								<input type="image" src="images/bbcode/italic.gif" border="1" id="italic" name="italic" value="I" onClick="javascript:bbcode('[i]', '[/i]');return(false)" />
								<input type="image" src="images/bbcode/underline.gif" border="1" id="souligné" name="souligné" value="S" onClick="javascript:bbcode('[s]', '[/s]');return(false)" />
								<input type="image" src="images/bbcode/left.gif" border="1" id="gauche" name="gauche" value="Gau" onClick="javascript:bbcode('[left]', '[/left]');return(false)" />
								<input type="image" src="images/bbcode/center.gif" border="1" id="centré" name="centré" value="C" onClick="javascript:bbcode('[center]', '[/center]');return(false)" />
								<input type="image" src="images/bbcode/right.gif" border="1" id="droite" name="droite" value="D" onClick="javascript:bbcode('[right]', '[/right]');return(false)" />
								<input type="image" src="images/bbcode/full.gif" border="1" id="justifié" name="justifié" value="J" onClick="javascript:bbcode('[full]', '[/full]');return(false)" />
								<br />
								<input type="image" src="images/bbcode/link.gif" border="1" id="lien" name="lien" value="Lien" onClick="javascript:bbcode('[url]', '[/url]');return(false)" />
								<input type="image" src="images/bbcode/mail.gif" border="1" id="email" name="email" value="@" onClick="javascript:bbcode('[email]', '[/email]');return(false)" />
								<input type="image" src="images/bbcode/image.gif" border="1" id="image" name="image" value="Image" onClick="javascript:bbcode('[img]', '[/img]');return(false)" />
								<br />
								<a href='javascript:addsm(":)")' title=':)'><img src='images/smileys/icon_biggrin.gif' border=0></a>
								<a href='javascript:addsm(":D")' title=':D'><img src='images/smileys/icon_lol.gif' border=0></a>
								<a href='javascript:addsm(":love:")' title=':love:'><img src='images/smileys/sm3.gif' border=0></a>
								<a href='javascript:addsm(":o")' title=':o'><img src='images/smileys/icon_eek.gif' border=0></a>
								<a href='javascript:addsm(";)")' title=';)'><img src='images/smileys/icon_wink.gif' border=0></a>
								<a href='javascript:addsm(":cry:")' title=':cry:'><img src='images/smileys/icon_cry.gif' border=0></a>
								<a href='javascript:addsm(":(")' title=':('><img src='images/smileys/icon_sad.gif' border=0></a>
								<a href='javascript:addsm(";(")' title=';('><img src='images/smileys/icon_evil.gif' border=0></a>
								<a href='javascript:addsm(":fuck:")' title=':fuck:'><img src='images/smileys/sm30.gif' border=0></a>
								<a href='javascript:addsm(":cool:")' title=':cool:'><img src='images/smileys/sm28.gif' border=0></a>
								<a href='javascript:addsm(":p")' title=':p'><img src='images/smileys/sm12.gif' border=0></a>
								<a href='javascript:addsm(":haha:")' title=':haha:'><img src='images/smileys/sm38.gif' border=0></a>
							</fieldset>
							 
							<?php
							 
							echo '<fieldset><legend>Message</legend>
							<textarea cols="80" rows="8" id="message" name="message">'.$donnees4['post_texte'].'</textarea>
							</fieldset>
							<p>
							<input type="submit" name="submit" value="Modifier" />
							<input type="reset" name ="Effacer" value ="Effacer" /></p>
							</form></div>';
						}
					}
					else
					{
						echo "<p>Erreur d'accès !!!</p>";
						echo "<p><a href='index.php?module=forums'>Retour</a></p>";
					}
				}
				else
				{
					echo "<p>Vous ne pouvez éditer que vos messages !</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p>Merci de vous connecter pour modifier ce sujet !</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "editer_v": //pour les topics (sujet).
			$post_id = mysql_real_escape_string(htmlspecialchars($_POST['post_id'], ENT_QUOTES));
			$topic_id = mysql_real_escape_string(htmlspecialchars($_POST['topic_id'], ENT_QUOTES));
			$titre = mysql_real_escape_string(htmlspecialchars($_POST['titre'], ENT_QUOTES));
			$message = mysql_real_escape_string(htmlspecialchars($_POST['message'], ENT_QUOTES));
			
			if($_SESSION['auth'] == "yes")
			{	
				$reponse = mysql_query("SELECT * FROM forum_post WHERE post_id = $post_id AND post_createur = $membre_id") or die(mysql_error());
				
				if(mysql_num_rows($reponse) != 0 OR $_SESSION['gmlevel'] >= $gmlevel)
				{
					if(!empty($post_id) AND !empty($topic_id) AND !empty($titre) AND !empty($message) AND ctype_digit($post_id) AND ctype_digit($topic_id))
					{
						mysql_query("UPDATE forum_topic SET topic_titre = '$titre' WHERE topic_id='$topic_id'") or die(mysql_error());
						mysql_query("UPDATE forum_post SET post_texte = '$message' WHERE post_id='$post_id'") or die(mysql_error());
						echo "<p>Le sujet a bien ete modifier.</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else
					{
						echo "<p>un des champs est vides !!!</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else
				{
					echo "<p>Vous ne pouvez éditer que vos messages !</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p>Erreur de lien !!!</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}		
		break;
		case "editer_v2": //pour les posts (reponse).
			$post_id = mysql_real_escape_string(htmlspecialchars($_POST['post_id'], ENT_QUOTES));
			$topic_id = mysql_real_escape_string(htmlspecialchars($_POST['topic_id'], ENT_QUOTES));
			$message = mysql_real_escape_string(htmlspecialchars($_POST['message'], ENT_QUOTES));
			
			if($_SESSION['auth'] == "yes")
			{
				$reponse = mysql_query("SELECT * FROM forum_post WHERE post_id = $post_id AND post_createur = $membre_id") or die(mysql_error());
				
				if(mysql_num_rows($reponse) != 0 OR $_SESSION['gmlevel'] >= $gmlevel)
				{
					if(!empty($post_id) AND !empty($topic_id) AND !empty($message) AND ctype_digit($post_id) AND ctype_digit($topic_id))
					{
						mysql_query("UPDATE forum_post SET post_texte = '$message' WHERE post_id='$post_id'") or die(mysql_error());
						echo "<p>Le message a bien ete modifier.</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
					}
					else
					{
						echo "<p>un des champs est vides !!!</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
					}
				}
				else
				{
					echo "<p>Vous ne pouvez éditer que vos messages !</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p>Erreur de lien !!!</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "supprimer":
			$post_id = mysql_real_escape_string(htmlspecialchars($_GET['p'], ENT_QUOTES));
			$topic_id = mysql_real_escape_string(htmlspecialchars($_GET['t'], ENT_QUOTES));
			
			if($_SESSION['auth'] == "yes")
			{		
				$reponse = mysql_query("SELECT * FROM forum_post WHERE post_id = $post_id AND post_createur = $membre_id") or die(mysql_error());
				
				if(mysql_num_rows($reponse) != 0 OR $_SESSION['gmlevel'] >= $gmlevel)
				{
					if(!empty($post_id) AND !empty($topic_id) AND ctype_digit($post_id) AND ctype_digit($topic_id))
					{
						$reponse2 = mysql_query("SELECT COUNT(*) AS nombre FROM forum_post WHERE topic_id = $topic_id") or die(mysql_error());
						$donnees2 = mysql_fetch_array($reponse2);
						$nb_post = $donnees2['nombre'];
						$reponse5 = mysql_query("SELECT COUNT(*) AS nombre FROM forum_topic WHERE topic_first_post = $post_id") or die(mysql_error());
						$donnees5 = mysql_fetch_array($reponse5);
						$test = $donnees5['nombre'];
						$reponse3 = mysql_query("SELECT * FROM forum_topic WHERE topic_id = $topic_id") or die(mysql_error());
						$donnees3 = mysql_fetch_array($reponse3);
						$reponse4 = mysql_query("SELECT * FROM forum_post WHERE post_id = $post_id") or die(mysql_error());
						$donnees4 = mysql_fetch_array($reponse4);
						
						if($nb_post == 0 OR $nb_post == NULL OR $test > 1)
						{
							echo "Erreur, merci de prevenir l'administrateur.";
						}
						elseif($test == 1) ////pour supprimer un sujet avec tous les messages.
						{
							echo "Etes-vous sur de vouloir supprimer le sujet : \"".$donnees3['topic_titre']."\" avec les ".$nb_post." messages ?";
							echo "<form action=\"index.php?module=forums&action=supprimer_v\" method=\"POST\">";
							echo "<input type=\"hidden\" name=\"post_id\" value=\"$post_id\">";
							echo "<input type=\"hidden\" name=\"topic_id\" value=\"$topic_id\">";
							echo "<br /><input type=\"submit\" value=\"Supprimer\"></form>";
						}
						else //pour supprimer un message
						{
							echo "Etes-vous sur de vouloir supprimer le message $post_id ?";
							echo "<form action=\"index.php?module=forums&action=supprimer_v2\" method=\"POST\">";
							echo "<input type=\"hidden\" name=\"post_id\" value=\"$post_id\">";
							echo "<input type=\"hidden\" name=\"topic_id\" value=\"$topic_id\">";
							echo "<br /><input type=\"submit\" value=\"Supprimer\"></form>";
						}
					}
					else
					{
						echo "<p>Erreur d'accès !!!</p>";
						echo "<p><a href='javascript:history.go(-1)'>Retour</a></p>";
					}
				}
				else
				{
					echo "<p>Vous ne pouvez supprimer que vos messages !</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p>Merci de vous connecter pour supprimer ce sujet !</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "supprimer_v": //pour supprimer un sujet avec tous les messages.
			$post_id = mysql_real_escape_string(htmlspecialchars($_POST['post_id'], ENT_QUOTES));
			$topic_id = mysql_real_escape_string(htmlspecialchars($_POST['topic_id'], ENT_QUOTES));

			if($_SESSION['auth'] == "yes")
			{	
				$reponse = mysql_query("SELECT * FROM forum_post WHERE post_id = $post_id AND post_createur = $membre_id") or die(mysql_error());
				if(mysql_num_rows($reponse) != 0 OR $_SESSION['gmlevel'] >= $gmlevel)
				{
					if(!empty($post_id) AND !empty($topic_id) AND ctype_digit($post_id) AND ctype_digit($topic_id))
					{
						$reponse2 = mysql_query("SELECT COUNT(*) AS nombre FROM forum_post WHERE topic_id = $topic_id") or die(mysql_error());
						$donnees2 = mysql_fetch_array($reponse2);
						$nb_post = $donnees2['nombre'];
						$reponse = mysql_query("SELECT * FROM forum_post WHERE post_id = \"$post_id\"") or die(mysql_error());
						$donnees = mysql_fetch_array($reponse);
						$forum_id = $donnees['post_forum_id'];
						
						mysql_query("DELETE FROM forum_post WHERE topic_id='$topic_id'") or die(mysql_error());
						mysql_query("DELETE FROM forum_topic WHERE topic_id='$topic_id'") or die(mysql_error());
						mysql_query("UPDATE forum_forum SET forum_topic = forum_topic - 1, forum_post = forum_post-'$nb_post' WHERE forum_id='$forum_id'") or die(mysql_error());
						
						$reponse3 = mysql_query("SELECT COUNT(*) AS nombre FROM forum_post WHERE post_forum_id = '$forum_id'") or die(mysql_error());
						$donnees3 = mysql_fetch_array($reponse3);
						$nb_post2 = $donnees3['nombre'];
						if($nb_post2 == 0)
						{
							mysql_query("UPDATE forum_forum SET forum_last_post_id = 0 WHERE forum_id='$forum_id'") or die(mysql_error());
						}
						else
						{
							$reponse4 = mysql_query("SELECT * FROM forum_post WHERE post_forum_id = '$forum_id' AND post_time=(SELECT MAX(post_time) FROM forum_post WHERE post_forum_id = '$forum_id')") or die(mysql_error());
							$donnees4 = mysql_fetch_array($reponse4);
							$post_id_n = $donnees4['post_id'];
							
							mysql_query("UPDATE forum_forum SET forum_last_post_id = '$post_id_n' WHERE forum_id='$forum_id'") or die(mysql_error());
						}
						$donnees3 = mysql_fetch_array($reponse2);
						echo "<p>Le sujet est les messages ont étés supprimés</p>";
						echo "<p><a href='index.php?module=forums'>Retour</a></p>";
					}
					else
					{
						echo "<p>Erreur d'accès !!!</p>";
						echo "<p><a href='javascript:history.go(-1)'>Retour</a></p>";
					}
				}
				else
				{
					echo "<p>Vous ne pouvez supprimer que vos messages !</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p>Erreur de lien !!!</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "supprimer_v2": //pour supprimer un message
			$post_id = mysql_real_escape_string(htmlspecialchars($_POST['post_id'], ENT_QUOTES));
			$topic_id = mysql_real_escape_string(htmlspecialchars($_POST['topic_id'], ENT_QUOTES));
			
			if($_SESSION['auth'] == "yes")
			{
				$reponse = mysql_query("SELECT * FROM forum_post WHERE post_id = $post_id AND post_createur = $membre_id") or die(mysql_error());
				if(mysql_num_rows($reponse) != 0 OR $_SESSION['gmlevel'] >= $gmlevel)
				{
					if(!empty($post_id) AND !empty($topic_id) AND ctype_digit($post_id) AND ctype_digit($topic_id))
					{
						$reponse = mysql_query("SELECT * FROM forum_post WHERE post_id = \"$post_id\"") or die(mysql_error());
						$donnees = mysql_fetch_array($reponse);
						$forum_id = $donnees['post_forum_id'];
						
						mysql_query("DELETE FROM forum_post WHERE post_id='$post_id'") or die(mysql_error());
						$reponse2 = mysql_query("SELECT * FROM forum_post WHERE topic_id = '$topic_id' AND post_time=(SELECT MAX(post_time) FROM forum_post WHERE topic_id = '$topic_id') AND post_id != '$post_id'") or die(mysql_error());
						$donnees2 = mysql_fetch_array($reponse2);
						$post_id_n = $donnees2['post_id'];
						mysql_query("UPDATE forum_topic SET topic_last_post = '$post_id_n', topic_post = topic_post - 1 WHERE topic_id='$topic_id'") or die(mysql_error());
						mysql_query("UPDATE forum_forum SET forum_last_post_id = '$post_id_n', forum_post = forum_post - 1 WHERE forum_id='$forum_id'") or die(mysql_error());
						echo "<p>Le message a bien été supprimer.</p>";
						echo "<p><a href='javascript:history.go(-2)'>Retour</a></p>";
					}
					else
					{
						echo "<p>Erreur d'accès !!!</p>";
						echo "<p><a href='javascript:history.go(-1)'>Retour</a></p>";
					}
				}
				else
				{
					echo "<p>Vous ne pouvez supprimer que vos messages !</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p>Erreur de lien !!!</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "verrouille_topic":
			if($_SESSION['auth'] == "yes" AND $_SESSION['gmlevel'] >= $gmlevel)
			{
				$id = mysql_real_escape_string(htmlspecialchars($_GET['t'], ENT_QUOTES));
				if(!empty($id) AND ctype_digit($id))
				{
					mysql_query("UPDATE forum_topic SET closed = '1' WHERE topic_id='$id'") or die(mysql_error());
					echo "Le topic est verrouillé.";
					echo "<p><a href='javascript:history.go(-1)'>Retour</a></p>";
				}
				else
				{
					echo "<p>Erreur !</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p>Erreur de lien !!!</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		case "deverrouille_topic":
			if($_SESSION['auth'] == "yes" AND $_SESSION['gmlevel'] >= $gmlevel)
			{
				$id = mysql_real_escape_string(htmlspecialchars($_GET['t'], ENT_QUOTES));
				if(!empty($id) AND ctype_digit($id))
				{
					mysql_query("UPDATE forum_topic SET closed = '0' WHERE topic_id='$id'") or die(mysql_error());
					echo "Le topic est déverrouillé.";
					echo "<p><a href='javascript:history.go(-1)'>Retour</a></p>";
				}
				else
				{
					echo "<p>Erreur !</p>";
					echo "<p><a href='index.php?module=forums'>Retour</a></p>";
				}
			}
			else
			{
				echo "<p>Erreur de lien !!!</p>";
				echo "<p><a href='index.php?module=forums'>Retour</a></p>";
			}
		break;
		default:
			$membre_id = $_SESSION['id'];
			if(empty($membre_id))
			{
				$membre_id = 0;
			}
			
			$requete2 = mysql_query('
			SELECT cat_id, cat_nom, 
			forum_forum.forum_id, forum_name, forum_desc, forum_post, forum_topic, auth_view, forum_topic.topic_id, 
			post_time, post_createur, pseudo, id, topic_titre
			FROM forum_categorie
			LEFT JOIN forum_forum ON forum_categorie.cat_id = forum_forum.forum_cat_id
			LEFT JOIN forum_post ON forum_post.post_id = forum_forum.forum_last_post_id
			LEFT JOIN forum_topic ON forum_topic.topic_id = forum_post.topic_id
			LEFT JOIN membres ON membres.id = forum_post.post_createur
			ORDER BY cat_ordre, forum_ordre DESC');
			
			$autor_cat = mysql_query("SELECT DISTINCT cat_id FROM forum_acces_cat
			WHERE group_id IN(SELECT group_id FROM membres_groups WHERE membre_id = ".$membre_id.") ORDER BY cat_id");
			
			//$autor_forum = mysql_query("SELECT DISTINCT cat_id FROM forum_acces_cat
			//WHERE group_id IN(SELECT group_id FROM membres_groups WHERE membre_id = ".$membre_id.") ORDER BY cat_id");
			
			if (mysql_num_rows($requete2) < 1)
			{
			    echo "Il n y a pas de forum :o Allez en ajouter avec le panneau d'administration";
			}
			else
			{
				echo "<p class=\"title\">Bienvenue sur le forums</p><br />";
				?>
				<table class="forum">
				<?php
					while($data = mysql_fetch_array($autor_cat))
					{	
						$requete2 = mysql_query('
						SELECT cat_id, cat_nom, 
						forum_forum.forum_id, forum_name, forum_desc, forum_post, forum_topic, auth_view, forum_topic.topic_id, 
						post_time, post_createur, pseudo, id, topic_titre
						FROM forum_categorie
						LEFT JOIN forum_forum ON forum_categorie.cat_id = forum_forum.forum_cat_id
						LEFT JOIN forum_post ON forum_post.post_id = forum_forum.forum_last_post_id
						LEFT JOIN forum_topic ON forum_topic.topic_id = forum_post.topic_id
						LEFT JOIN membres ON membres.id = forum_post.post_createur
						ORDER BY cat_ordre, forum_ordre DESC');
						
				        //mysql_result($requete2,0);
						
						while($data2 = mysql_fetch_assoc($requete2))
				        {					
							if($data2['cat_id'] == $data['cat_id'])
							{
						        if( $categorie != $data2['cat_id'] )
						        {
					                $categorie = $data2['cat_id'];
					                ?>
					                <tr>
					                <th class='rankingHeader'></th>
					                <th class='rankingHeader' class="titre2"><strong><?php echo Securite::html($data2['cat_nom']); ?></strong></th>             
					                <th class='rankingHeader' class="nombremessages"><strong>Sujets</strong></th>       
					                <th class='rankingHeader' class="nombresujets"><strong>Messages</strong></th>       
					                <th class='rankingHeader' class="derniermessage"><strong>Dernier message</strong></th>   
					                </tr>
					                <?php
					            }
						         echo'<tr><td><center><img src="themes/'.$theme.'/images/forums/message.gif" alt="message" /></center></td>
						         <td class="titre2"><strong><a href="index.php?module=forums&action=voirforum&f='.$data2['forum_id'].'">
						         '.$data2['forum_name'].'</a></strong>
						         <br />'.$data2['forum_desc'].'</td>
						         <td class="nombresujets">'.$data2['forum_topic'].'</td>
						         <td class="nombremessages">'.$data2['forum_post'].'</td>';
								if (!empty($data2['forum_post']))
								{
									echo'<td class="derniermessage">
									<a href="index.php?module=forums&action=voirtopic&t='.$data2['topic_id'].'">'.$data2['topic_titre'].'</a><br />
									'.date('d-m-y à H\hi',$data2['post_time']).'<br />
									par <a href="index.php?module=profil&id='.$data2['post_createur'].'">
									'.$data2['pseudo'].'  </a>
									</td></tr>';
								}
								else
								{
									echo'<td class="nombremessages">Pas de message</td></tr>';
								}
						        $totaldesmessages = $totaldesmessages + $data2['forum_post'];
							}
						}
					}
				echo '</table>';
			}
		break;
	}
}
?>
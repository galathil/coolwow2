<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
mysql_select_db($coolwow['db']) or die(mysql_error());

if($_SESSION['auth'] == "yes")
{
	switch ($_GET['action'])
	{
		case "lire":
		    $id_mp = Securite::bdd($_GET['mp']);
		    $retour = mysql_query("SELECT destinataire, sujet, expediteur, timestamp, message, fe.pseudo AS mp_expediteur, fd.pseudo AS mp_destinataire
			FROM mp 
			LEFT JOIN membres fe ON fe.id = mp.expediteur
			LEFT JOIN membres fd ON fd.id = mp.destinataire
			WHERE mp.id='".$id_mp."'")or die(mysql_error());
		    $donnees = mysql_fetch_assoc($retour);
			if(mysql_num_rows($retour) <= 0)
			{
				echo "<p>Ce message n'existe pas  ou plus !</p>";
				echo "<a href='index.php'>Retour</a>";
			}
			else
			{
			    if($donnees['destinataire'] == Securite::bdd($_SESSION['id']))
			    {
			        ?>
			        <table class="table">
			            <thead></thead>
			            <tfoot></tfoot>
			            <tbody>
						<?php
						$sujet = $donnees['sujet'];
						$expediteur = $donnees['mp_expediteur']; 
						$date = date('d/m/Y \à H\hi', $donnees['timestamp']);
						$mp = nl2br($donnees['message']);    
						echo '
						<tr><td class="td"><h1>'.$sujet.'</h1></td></tr>
						<tr><td class="td">Le '.$date.'</td></tr>
						<tr><td class="td">De : '.$expediteur.'</td></tr>
						<tr><td class="td">Message :<br /><br/>'.$mp.'</td></tr>
						<tr><td class="td"><a href="index.php?module=messagerie&action=ecrire&reponse='.$id_mp.'">Répondre</a>   <a href="index.php?module=messagerie&action=ecrire">Nouveau</a>    <a href="index.php?module=messagerie">Revenir au menu de la messagerie</a></td></tr>';
						
						mysql_query("UPDATE mp SET vu='1' WHERE id='".$id_mp."'")or die(mysql_error());
						?>
			            </tbody>
			        </table>
			        <?php
			    }
				elseif($donnees['expediteur'] == Securite::bdd($_SESSION['id']))
				{
					?>
			        <table class="table">
			            <thead></thead>
			            <tfoot></tfoot>
			            <tbody>
						<?php
						$sujet = $donnees['sujet'];
						$expediteur = $donnees['mp_expediteur']; 
						$date = date('d/m/Y \à H\hi', $donnees['timestamp']);
						$mp = nl2br($donnees['message']);    
						echo '
						<tr><td class="td"><h1>'.$sujet.'</h1></td></tr>
						<tr><td class="td">Le '.$date.'</td></tr>
						<tr><td class="td">De : '.$expediteur.'</td></tr>
						<tr><td class="td">Message :<br /><br/>'.$mp.'</td></tr>
						<tr><td class="td"><a href="index.php?module=messagerie">Revenir au menu de la messagerie</a></td></tr>';
						
						mysql_query("UPDATE mp SET vu='1' WHERE id='".$id_mp."'")or die(mysql_error());
						?>
			            </tbody>
			        </table>
			        <?php
				}
			    else
			    {
			        echo "<p>Ceci est un message privé qui ne s'adresse pas à vous mais à ".$donnees['mp_destinataire']." !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
			    }
			}
		break;
		case "ecrire":
			generate_xsrf_token();
			$token = Securite::bdd($_SESSION['token_xsrf']);
			$reponse = $_GET['reponse'];
	        if(!isset($reponse))
	        {
				echo "<p class=\"title\">Ecrire un message</p><br />
	            <form action=\"index.php?module=messagerie&action=traitement\" method=\"post\">
					<table>
						<tr><td>Sujet :</td><td><input type=\"text\" name=\"sujet\" /></td></tr>
						<tr><td>Destinataire :</td><td><input type=\"text\" name=\"destinataire\" /></td></tr>
						<tr><td>Message :</td><td><textarea name=\"message\" rows=\"10\" cols=\"40\"></textarea></td></tr>
					</table>
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"submit\" value=\"Envoyer le message\" />
	            </form>";
	        }
	        else
	        {
				$retour_reponse = mysql_query("SELECT sujet, expediteur, fe.pseudo AS mp_expediteur
				FROM mp
				LEFT JOIN membres fe ON fe.id = mp.expediteur
				WHERE mp.id='".$reponse."'");
				
				$donnees_reponse = mysql_fetch_assoc($retour_reponse);

				echo "<p class=\"title\">Répondre à un message</p><br />
	            <form action=\"index.php?module=messagerie&action=traitement\" method=\"post\">
					<table>
						<tr><td>Sujet :</td><td><input type=\"text\" name=\"sujet\" value=\"RE : ".$donnees_reponse['sujet']."\"/></td></tr>
						<tr><td>Destinataire :</td><td><input type=\"text\" name=\"destinataire\" value=\"".$donnees_reponse['mp_expediteur']."\"/></td></tr>
						<tr><td>Message :</td><td><textarea name=\"message\" rows=\"10\" cols=\"40\"></textarea></td></tr>
					</table>
					<input type=\"hidden\" name=\"token_xsrf\" value=\"".$token."\" />
					<input type=\"submit\" value=\"Envoyer le message\" />
	            </form>";
	        }
		break;
		case "traitement":
			verify_xsrf_token();
			$sujet = Securite::bdd($_POST['sujet']);
			$destinataire = Securite::bdd($_POST['destinataire']);
			$message = Securite::bdd($_POST['message']);
			$expediteur = Securite::bdd($_SESSION['id']);
			$timestamp = time();
		    if(!empty($sujet) AND !empty($destinataire) AND !empty($message))
		    {	
		        $nbr_entree = mysql_query("SELECT COUNT(*) AS nbre_entrees FROM membres WHERE pseudo='".$destinataire."'")or die(mysql_error());
		        $nbr_entrees = mysql_fetch_assoc($nbr_entree);
		        if($nbr_entrees['nbre_entrees'] == 1)
		        {
					$trouve_id = mysql_query("SELECT id, pseudo FROM membres WHERE pseudo='$destinataire'");
					$donnees_trouve_id = mysql_fetch_assoc($trouve_id);
					$id_destinataire = Securite::bdd($donnees_trouve_id['id']);
					
		            $retour = mysql_query("SELECT destinataire, sujet, message FROM mp WHERE expediteur='$expediteur' ORDER BY id DESC LIMIT 0,1");
		            $donnees = mysql_fetch_assoc($retour);
		            if($donnees['destinataire'] == $destinataire AND $donnees['sujet'] == $sujet AND $donnees['message'] == $message)
		            {
						echo "<p>Vous ne pouvez pas poster le même message 2 fois d'affilée</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
		            }
		            else
		            {
						mysql_query("INSERT INTO mp(sujet, expediteur, destinataire, message, timestamp, vu, efface) VALUES('" . $sujet . "', '" . $expediteur . "', '" . $id_destinataire . "', '" . $message . "', '" . $timestamp . "', '0', '0')")or die(mysql_error());
						echo "<p>Votre message a bien été envoyé à ".$destinataire."</p>";
						echo "<a href='javascript:history.go(-2)'>Retour</a>";
		            }
		        }
		        else
		        {
		            echo "<p>Le membre à qui vous souhaitez envoyer ce message n'existe pas/plus !</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
		        }
		    }
		    else
		    {
		        echo "<p>Vous devez remplir tout les champs !</p>";
				echo "<a href='javascript:history.go(-1)'>Recommencer</a>";
		    }
		break;
		case "envoyer":
		    $retour = mysql_query("SELECT mp.id, vu, destinataire, sujet, timestamp, fd.pseudo AS mp_destinataire
			FROM mp
			LEFT JOIN membres fd ON fd.id = mp.destinataire
			WHERE expediteur='".$_SESSION['id']."' AND (efface='0' OR efface='1') ORDER BY id DESC") or die(mysql_error());
		    ?>
			<p class="title">Messages privés - Messages envoyés</p>
			<br />
			<p id="milieu">
				<a href="index.php?module=messagerie">Boîte de réception</a> - 
				<a href="index.php?module=messagerie&action=ecrire">Ecrire un nouveau message</a>
			</p>
			<br />
		    <table class="lined" style="border-collapse: collapse"; align="center" width="90%" border="1" cellspacing="1" cellpadding="1">
		        <thead>
					<th class="th">Etat</th>
		            <th class="th">Sujet</th>
		            <th class="th">Destinataire</th>
		            <th class="th">Date</th>
					<th></th>
		        </thead>
				<tbody>
		        <?php
				if(mysql_num_rows($retour) <= 0)
				{
					echo "<tr><td colspan=\"4\">Aucuns messages !!!</td></tr>";
				}
				else
				{
			        while($donnees = mysql_fetch_assoc($retour))
			        {
						$etat = Securite::html($donnees['vu']);
						$sujet = Securite::html($donnees['sujet']);
						$destinataire = Securite::html($donnees['mp_destinataire']);   
						$date = Securite::html($donnees['timestamp']);
						echo'
						<tr>
							<td class="td">';
							if ($etat == 0){ echo "<img src=\"themes/".$theme."/messages/msg_new.gif\" alt=\"Non Lu\" />";}
							else{ echo "<img src=\"themes/".$theme."/messages/msg_receive.gif\" alt=\"Lu\" />";}
							echo '</td>
							<td class="td"><a href="index.php?module=messagerie&action=lire&mp='.$donnees['id'].'">'.$sujet.'</a></td>
							<td class="td">'.$destinataire.'</td>
							<td class="td">Le '.date('d/m/Y \à H\hi', $date).'</td><td class="td"><a href="index.php?module=messagerie&action=supprimer&amp;suppr=2&amp;id='.$donnees['id'].'"><img src="themes/'.$theme.'/messages/delete.gif" alt="Supprimer ce message" /></a></td>
						</tr>';
			        }
				}
		        ?>
		        </tbody>
		    </table>
			<?php
		break;
		case "supprimer":
		    $id = Securite::bdd($_GET['id']);
			$suppr = Securite::bdd($_GET['suppr']);
		    if($suppr == 2)
		    {
		        $retour = mysql_query("SELECT expediteur, efface FROM mp WHERE id='".$id."'")or die(mysql_error());
		        $donnees = mysql_fetch_assoc($retour);
		        if(Securite::bdd($_SESSION['id']) == Securite::bdd($donnees['expediteur']))
		        {
		            if($donnees['efface'] == 1)
		            {
		                mysql_query("DELETE FROM mp WHERE id='".$id."'")or die(mysql_error());
		                echo "<p>Le message a été supprimé avec succès</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
		            }
		            elseif($donnees['efface'] == 0)
		            {
		                mysql_query("UPDATE mp SET efface='2' WHERE id='".$id."'")or die(mysql_error());
		                echo "<p>Le message a été supprimé avec succès</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
		            }
		            else
		            {
						echo "<p>Une erreur est survenue lors de votre demande. Veuillez recommencer ultèrieurement.</p>";
						echo "<a href=\"index.php?module=messagerie\">Retour</a>";
		            } 
		        }
		        else
		        {
		            echo "<p>Vous ne pouvez pas supprimer un message que vous n'avez pas envoyé vous même.</p>";
					echo "<a href=\"index.php?module=messagerie\">Retour</a>";
		        }       
		    }
		    elseif($suppr == 1)
		    {
		        $retour = mysql_query("SELECT destinataire, efface FROM mp WHERE id='".$id."'")or die(mysql_error());
		        $donnees = mysql_fetch_assoc($retour);
		        if(Securite::bdd($_SESSION['id']) == Securite::bdd($donnees['destinataire']))
		        {
		            if($donnees['efface'] == 2)
		            {
		                mysql_query("DELETE FROM mp WHERE id='".$id."'")or die(mysql_error());
		                echo "<p>Le message a été supprimé avec succès.</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
		            }
		            elseif($donnees['efface'] == 0)
		            {
		                mysql_query("UPDATE mp SET efface='1' WHERE id='".$id."'")or die(mysql_error());
		                echo "<p>Le message a été supprimé avec succès.</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
		            }
		            else
		            {
						echo "<p>Une erreur est survenue lors de votre demande. Veuillez recommencer ultèrieurement.</p>";
						echo "<a href='javascript:history.go(-1)'>Retour</a>";
		            } 
		        }
		        else
		        {
		            echo "<p>Vous ne pouvez pas supprimer un message qui ne vous a pas été envoyé.</p>";
					echo "<a href='javascript:history.go(-1)'>Retour</a>";
		        }
			}
		break;
		default:
		    $nbr_non_vus = mysql_query("SELECT COUNT(*) AS nbre FROM mp WHERE destinataire='".Securite::bdd($_SESSION['id'])."' AND vu='0' AND (efface='0' OR efface='2')")or die(mysql_error());
		    $nbre_non_vus = mysql_fetch_assoc($nbr_non_vus);
		    $retour = mysql_query("SELECT mp.id, sujet, expediteur, timestamp, vu, fe.account_name AS mp_expediteur
			FROM mp
			LEFT JOIN membres fe ON fe.id = mp.expediteur
			WHERE destinataire='".Securite::bdd($_SESSION['id'])."' AND (efface='0' OR efface='2') ORDER BY id DESC");

		    ?>
			<p class="title">Messages privés - Boîte de réceptions</p>
			<br />
			<p id="milieu">
				<a href="index.php?module=messagerie&action=envoyer">Voir les messages envoyés</a> - 
			    <a href="index.php?module=messagerie&action=ecrire">Ecrire un nouveau message</a>
			</p>
			<br />
		    <table class="lined" style="border-collapse: collapse"; align="center" width="90%" border="1" cellspacing="1" cellpadding="1">
		        <thead>
		            <th><em>Lu</em>/<strong>Non lu (<?php echo $nbre_non_vus['nbre'];?>)</strong></th>
		            <th>Sujet</th>
		            <th>Auteur</th>
		            <th>Date</th>
					<th></th>
		        </thead>
		        <tbody>
		        <?php
				if(mysql_num_rows($retour) <= 0)
				{
					echo "<tr><td colspan=\"5\">Aucuns messages !!!</td></tr>";
				}
				else
				{
			        while($donnees = mysql_fetch_assoc($retour))
			        {
						$sujet = Securite::bdd($donnees['sujet']);
						$expediteur = Securite::bdd($donnees['mp_expediteur']);
						$date = Securite::bdd($donnees['timestamp']);
						if($donnees['vu'] == 0)
						{
							echo '<tr>
							<td class="td"><img src="themes/'.$theme.'/messages/msg_new.gif" alt="Non Lu" /></td>
							<td class="td"><strong><a href="index.php?module=messagerie&action=lire&mp='.$donnees['id'].'">'.$sujet.'</a></strong></td>
							<td class="td">'.$expediteur.'</td>
							<td class="td">Le '.date('d/m/Y \à H\hi', $date).'</td>
							<td class="td"><a href="index.php?module=messagerie&action=supprimer&amp;suppr=1&amp;id='.$donnees['id'].'"><img src="themes/'.$theme.'/messages/delete.gif" alt="Supprimer ce message" /></a></td>
							</tr>';
						}
						else
						{
							echo '<tr>
							<td class="td"><img src="themes/'.$theme.'/messages/msg_receive.gif" alt="Lu" /></td>
							<td class="td"><em><a href="index.php?module=messagerie&action=lire&mp='.$donnees['id'].'">'.$sujet.'</a></em></td>
							<td class="td">'.$expediteur.'</td>
							<td class="td">Le '.date('d/m/Y \à H\hi', $date).'</td>
							<td class="td"><a href="index.php?module=messagerie&action=supprimer&amp;suppr=1&amp;id='.$donnees['id'].'"><img src="themes/'.$theme.'/messages/delete.gif" alt="Supprimer ce message" /></a></td>
							</tr>';
						}
			        }
				}
		        ?>
		        </tbody>
		    </table>
		    <?php
		break;
	}
}
else
{
	echo "<p>Page réservée aux membres !<br />";
	echo "connectez-vous ou inscrivez-vous !</p>";
	echo "<a href=\"../index.php\">Retour</a>";
}
?>
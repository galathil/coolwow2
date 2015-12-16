<?php
$theme = 1;
require("header_simple.php");
require("themes/header_simple_theme.php");
switch ($_GET['err'])
{
	case "invalide_formulaire":
		echo '
		<h2>Durée maximale d\'envoie du formulaire dépassée !</h2>
		<h2>Ou alors tantative de piratage ?</h2>
		<p>Suivez la procédure ci-dessous pour envoyer à nouveau le contenu du formulaire :</p>
		<ul>
	        <li>Retournez sur la page précédente en cliquant sur le <strong>bouton "page précédente"</strong> de votre navigateur.</li>
	        <li>Rechargez la page en appuyant sur le <strong>touche "F5"</strong>.</li>
	        <li>Cliquez à nouveau sur le bouton d\'<strong>envoie du formulaire</strong>.</li>
	    </ul>';
	break;
	case "teamspeak_config":
		echo '
		<h1>Erreur : Module non configuré !</h1>
		<p>Ce module n\'est pas configuré, merci de contacter l\'adminstrateur !</p>';
	break;
	case "access_denied":
		echo "Interdiction d'accéder à cette page de cette façon !!!<br /><br /><a href=\"index.php\">Accueil</a>";
	break;
	case "access_denied_admin":
		echo "Tendative de Hackage ?";
	break;
	case "probleme_technique":
		echo "<p>Le site rencontre actuellement quelques problemes technique,<br />Merci de repasser plutard !!!</p>";
	break;
	case "probleme_install":
		echo "<p>Merci de supprimer de répertoire \"install\" avant de continuer.<br />
		Une fois fait <a href=\"index.php\">cliquer ici</a></p>";
	break;

	default:
	break;
}
require("themes/footer_simple_theme.php");
require("footer_simple.php");
?>
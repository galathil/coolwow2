<?php
require_once("../kernel/config.php");
include("header_simple.php");
include("../themes/header_theme_admin.php");
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
	default:
	break;
}
include("../themes/footer_theme_admin.php");
include("../footer_simple.php");
?>
<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

require("kernel/teamspeak.php");


	if (isset($_GET['autorefresh'])) {
		$autorefresh = $_GET['autorefresh'];
	} else {
		$autorefresh = 0;
	}
	if ($autorefresh == 1) {
		echo("		<meta http-equiv=\"refresh\" content=\"$autorefresh_time; URL=".htmlentities($_SERVER["PHP_SELF"])."?module=teamspeak&autorefresh=1\">\n");
	}
	
	// Get the default settings
	$settings = $teamspeakDisplay->getDefaultSettings();
	
	//================== BEGIN OF CONFIGURATION CODE ======================
	
	// Set the teamspeak server IP or Hostname below (DO NOT INCLUDE THE
	// PORT NUMBER):
	$settings["serveraddress"] = "$serveraddress";
	
	// If your you use another port than 8767 to connect to your teamspeak
	// server using a teamspeak client, then uncomment the line below and
	// set the correct teamspeak port:
	$settings["serverudpport"] = "$serverudpport";
	
	// If your teamspeak server uses another query port than 51234, then
	// uncomment the line below and set the teamspeak query port of your
	// server (look in the server.ini of your teamspeak server for this
	// portnumber):
	//$settings["serverqueryport"] = 51234;
	
	// If you want to limit the display to only one channel including it's
	// players and subchannels, uncomment the following line and set the
	// exact name of the channel. This feature is case-sensitive!
	//$settings["limitchannel"] = "";
	
	// If your teamspeak server uses another set of forbidden nickname
	// characters than "()[]{}" (look in your server.ini for this setting),
	// then uncomment the following line and set the correct set of
	// forbidden nickname characters:
	//$settings["forbiddennicknamechars"] = "()[]{}";
	
	//================== END OF CONFIGURATION CODE ========================
	
	// Is the script improperly configured?
	if ($settings["serveraddress"] == "")
	{ 
		redirect("erreur.php?err=teamspeak_config"); 
	}
	
	// Display the Teamspeak server
	$teamspeakDisplay->displayTeamspeakEx($settings);
	
	// Display autorefresh status and control link:
	echo("<br>\n");
	if ($autorefresh == 0) {
		echo("Actualisation automatique: Off (<a href=\"".htmlentities($_SERVER["PHP_SELF"])."?module=teamspeak&autorefresh=1\">Activer</a>)<br>\n");
	} else if ($autorefresh == 1) {
		echo("Actualisation automatique: On (<a href=\"".htmlentities($_SERVER["PHP_SELF"])."?module=teamspeak&autorefresh=0\">Désactiver</a>)<br>\n");
	}
?>
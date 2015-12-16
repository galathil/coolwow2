<?php
require_once("kernel/config.php");
mysql_connect($characters[1]['host'], $characters[1]['user'], $characters[1]['password']) or die(mysql_error());
mysql_select_db($characters[1]['db']) or die(mysql_error());
$reponse = mysql_query("SELECT COUNT(*) AS nombre FROM `characters` WHERE `online`='1'") or die(mysql_error());
$donnees = mysql_fetch_array($reponse);
$player = $donnees['nombre'];

$reponse2 = mysql_query("SELECT COUNT(*) AS nombre FROM `characters` WHERE `online`='1' AND race IN(1,3,4,7,11)") or die(mysql_error());
$donnees2 = mysql_fetch_array($reponse2);
$alliance = $donnees2['nombre'];

$reponse3 = mysql_query("SELECT COUNT(*) AS nombre FROM `characters` WHERE `online`='1' AND race IN(2,5,6,8,10)") or die(mysql_error());
$donnees3 = mysql_fetch_array($reponse3);
$horde = $donnees3['nombre'];

	echo "<td valign=\"top\">
		<table width=\"200\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
			<tr>
				<td>
					<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" >
						<tr>
							<td width=\"21\"><img src=\"themes/$theme/hg.png\" width=\"21\" height=\"21\" alt=\"hg\" /></td>
							<td class=\"hm\" width=\"100%\" align=\"center\"></td>
							<td width=\"21\"><img src=\"themes/$theme/hd.png\" width=\"21\" height=\"21\" alt=\"hd\" /></td>
						</tr>
					</table>
					<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td class=\"mg\"></td>
							<td>
								<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
									<tr>
										<td class=\"fond\" width=\"100%\" id=\"milieu\">
											".$version_jeu."<br /><br />";
											$fserv=@fsockopen($serveur[1]['host'],$serveur[1]['port'],$errno,$errstr,1);
											if($fserv)
											{
												echo "GameServer :<b><font color='green'> Online</font></b>";
											}
											else
											{
												echo "GameServer :<b><font color='red'> Offline</font></b>";
											}
											echo "<br />";
											$fserv2=@fsockopen($serveur[1]['host'],$serveur[1]['login_port'],$errno,$errstr,1);
											if($fserv2)
											{
												echo "LoginServer :<b><font color='green'> Online</font></b>";
											}
											else
											{
												echo "LoginServer :<b><font color='red'> Offline</font></b>";
											}
											echo "<br /><br />";
											echo "Total : $player en ligne<br />";
											echo "<b><font color='lightblue'>Alliance : $alliance en ligne</font></b><br />";
											echo "<b><font color='red'>Horde : $horde en ligne</font></b><br />";
											echo "<br />Realmlist :<br />
											set realmlist ".$realmlist."";
										echo "</td>
									</tr>
								</table>
							</td>
							<td class=\"md\"></td>
						</tr>
						<tr>
							<td width=\"21\"><img src=\"themes/$theme/bg.png\" width=\"21\" height=\"21\" alt=\"bg\" /></td>
							<td class=\"bm\"></td>
							<td width=\"21\"><img src=\"themes/$theme/bd.png\" width=\"21\" height=\"21\" alt=\"bd\" /></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<table width=\"200\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
			<tr>
				<td>
					<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" >
						<tr>
							<td width=\"21\"><img src=\"themes/$theme/hg.png\" width=\"21\" height=\"21\" alt=\"hg\" /></td>
							<td class=\"hm\" width=\"100%\" align=\"center\"></td>
							<td width=\"21\"><img src=\"themes/$theme/hd.png\" width=\"21\" height=\"21\" alt=\"hd\" /></td>
						</tr>
					</table>
					<table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
						<tr>
							<td class=\"mg\"></td>
							<td>
								<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
									<tr>
										<td class=\"fond\" width=\"100%\" id=\"milieu\">";
											mysql_connect($coolwow['host'], $coolwow['user'], $coolwow['password']) or die(mysql_error());
											mysql_select_db($coolwow['db']) or die(mysql_error());
											$req = mysql_query('SELECT * FROM site_config WHERE config_name = "bloc_sondages"');
											$rep = mysql_fetch_array($req);
											$id = $rep['config_value'];
											$retour = mysql_query("SELECT * FROM sondages WHERE id_sondage = ".$id."");
											$donnees = mysql_fetch_assoc($retour);
											echo "<p class=\"title\">Sondages</p><br />";
											echo "".$donnees['question_sondage']."<br /><br />";
											echo "<a href=\"index.php?module=sondages&action=voter&id=".$id."\">Voter</a>
										</td>
									</tr>
								</table>
							</td>
							<td class=\"md\"></td>
						</tr>
						<tr>
							<td width=\"21\"><img src=\"themes/$theme/bg.png\" width=\"21\" height=\"21\" alt=\"bg\" /></td>
							<td class=\"bm\"></td>
							<td width=\"21\"><img src=\"themes/$theme/bd.png\" width=\"21\" height=\"21\" alt=\"bd\" /></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		</td>";
?>
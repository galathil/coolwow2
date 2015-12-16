<?php
if(empty($securite) or !isset($securite) or $securite != "ok")
{
	header("location: erreur.php?err=access_denied");
}

switch ($_GET['action'])
{
	default:
		echo "<p class=\"title\">Simulateur de Talents</p>
		<p>Sélectionnez une classe</p>
		<table align=\"center\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
			<tbody>
				<tr>
					<td colspan=\"3\">
						<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
							<tbody>
								<tr>
					           	  	<td><a href=\"talents/druid.html\"><img src=\"talents/images/druid.png\" alt=\"\" border=\"0\" height=\"117\" width=\"125\"></a></td>
					       	  		<td><a href=\"talents/hunter.html\"><img src=\"talents/images/hunter.png\" alt=\"\" border=\"0\" height=\"117\" width=\"125\"></a></td>
									<td><a href=\"talents/mage.html\"><img src=\"talents/images/mage.png\" alt=\"\" border=\"0\" height=\"117\" width=\"125\"></a></td>
									<td><a href=\"talents/paladin.html\"><img src=\"talents/images/paladin.png\" alt=\"\" border=\"0\" height=\"117\" width=\"125\"></a></td>
								</tr>			
								<tr>
					           	  	<td><a href=\"talents/priest.html\"><img src=\"talents/images/priest.png\" alt=\"\" border=\"0\" height=\"117\" width=\"125\"></a></td>
					       	  		<td><a href=\"talents/rogue.html\"><img src=\"talents/images/rogue.png\" alt=\"\" border=\"0\" height=\"117\" width=\"125\"></a></td>
									<td><a href=\"talents/shaman.html\"><img src=\"talents/images/shaman.png\" alt=\"\" border=\"0\" height=\"117\" width=\"125\"></a></td>
					       	  		<td><a href=\"talents/warlock.html\"><img src=\"talents/images/warlock.png\" alt=\"\" border=\"0\" height=\"117\" width=\"125\"></a></td>
								</tr>
								<tr>
					       	  		<td align=\"center\" colspan=\"2\"><a href=\"talents/warrior.html\"><img src=\"talents/images/warrior.png\" alt=\"\" border=\"0\" height=\"117\" width=\"125\"></a></td>
									<td align=\"center\" colspan=\"2\"><a href=\"talents/deathknight.html\"><img src=\"talents/images/deathknight.png\" alt=\"\" border=\"0\" height=\"117\" width=\"125\"></a></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>
			</tbody>
		</table>";
	break;
}
?>
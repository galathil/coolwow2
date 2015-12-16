<div id="showimage" style="position:absolute; width:300px; left:50; top:50; z-index: 100;">
<table border="0" width="300" bgcolor="#293e63" cellspacing="0" cellpadding="2">
	<tr>
		<td width="100%">
			<table border="0" width="100%" cellspacing="0" cellpadding="0" height="40" alt="Glissez pour bouger">
				<tr>
					<td id="dragbar" style="cursor:hand" width="100%">
						<ilayer width="100%" onSelectStart="return false">
							<layer width="100%" onMouseover="dragswitch=1;if (ns4) drag_dropns(showimage)" onMouseout="dragswitch=0">
							<font face="Trebuchet MS" color="#FFFFFF" size="2"><div align="left"><B>&nbsp;Votez pour <?php echo $server_name; ?></B></div></font>
							</layer>
						</ilayer>
					</td>
					<td style="cursor:hand"><a href="#" onClick="hidebox();return false"><img src="images/vote_fermer.jpg" width="43" height="16" border=0></a></td>
				</tr>
				<tr>
					<td width="100%" bgcolor="black" style="padding:4px" colspan="2">
						<B><FONT FACE="Trebuchet MS" COLOR="white" SIZE=2>
						<center>
							<img src="<?php echo $logo_vote; ?>" border="0">
							<br />
							Pensez a voter toutes les 2 heures,<br />utilisez le système suivant pour 
							accumuler des votes et ainsi obtenir des points pour améliorer 
							vos personnages.<br />(connectez vous sur le site pour obtenire vos Bonus.)<br />(entrer le nom de votre compte et non de 
							votre personnage dans la case.)<br /><br />
							<?php
							if($_SESSION['auth'] == "yes")
							{
							echo "
								<form action=\"index.php?module=vote\" method=\"post\">
									<div align=\"center\">
										<center>Nom d'utilisateur :</center>
								        <input readonly type=\"text\" name=\"username\" class=\"search_field\" value=\"".$_SESSION['username']."\" /><br />
										<input type=\"submit\" value=\"Continuer\" class=\"vote_button\"/> 
									</div>
								</form>";
							}
							else
							{
								echo "<p>Merci de vous connectez pour pouvoir votez !<br>
								<a href=\"login.php\">Cliquer ici pour vous connectez</a></p>";
							}
							?>
							<br />
							<a href="index.php?module=top_vote"><font color="red"><b>Le top des votants</b></font></a><br /><br />
							<a href="#" onClick="hidebox()"><center><b><u>Fermer la fenêtre</a>
							
						</center>
						</FONT></B>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</div>
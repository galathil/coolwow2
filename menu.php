<?php
echo "	
	<ul id='nav'>
		<li class='top'><a href='index.php' class='top_link'><span>".$lang_menu['home']."</span></a></li>
		<li class='top'><a href='' class='top_link'><span class='down'>".$lang_menu['interactif']."</span><!--[if gte IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]--><ul class='sub'>
				<li><a href='index.php?module=connectes'>".$lang_menu['players_on']."</a></li>
				<li><a href='index.php?module=map'>".$lang_menu['player_map']."</a></li>
				<li><a href='index.php?module=armurerie'>".$lang_menu['armory']."</a></li>
				<li><a href='index.php?module=vente'>".$lang_menu['auctionhouse']."</a></li>
				<li><a href='index.php?module=gamers'>".$lang_menu['characters']."</a></li>
				<li><a href='index.php?module=info'>".$lang_menu['info']."</a></li>
				<li><a href='index.php?module=honneur'>".$lang_menu['honor_points']."</a></li>
				<li><a href='index.php?module=equipes_arene'>".$lang_menu['arena_teams']."</a></li>
				<li><a href='index.php?module=guildes'>".$lang_menu['guilds']."</a></li>
				<li><a href='index.php?module=talents'>".$lang_menu['talent_simulator']."</a></li>
				<li><a href='index.php?module=teamspeak'>".$lang_menu['teamspeak_server']."</a></li>
			</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		<li class='top'><a href='' class='top_link'><span class='down'>".$lang_menu['tools']."</span><!--[if gte IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]--><ul class='sub'>
				<li><a href='index.php?module=deblocage'>".$lang_menu['unblock']."</a></li>
				<li><a href='index.php?module=bugs'>".$lang_menu['report_bug']."</a></li>
				<li><a href='atlas/main/index.php'>".$lang_menu['atlas_interactif']."</a></li>
				<li><a href='' class='fly'>".$lang_menu['raid']."<!--[if gte IE 7]><!--></a><!--<![endif]-->
					<!--[if lte IE 6]><table><tr><td><![endif]--><ul>
						<li><a href='' class='fly'>Raids Classique<!--[if gte IE 7]><!--></a><!--<![endif]-->
							<!--[if lte IE 6]><table><tr><td><![endif]--><ul>
								<li><a href='index.php?module=raid&ext=classic&name=ruins-of-ahn-qiraj'>Ruines d'Ahn'Qirai</a></li>
								<li><a href='index.php?module=raid&ext=classic&name=temple-of-ahn-qiraj'>Temple d'Ahn'Qiraj</a></li>
								<li><a href='index.php?module=raid&ext=classic&name=molten-core'>Coeur du Magma</a></li>
								<li><a href='index.php?module=raid&ext=classic&name=blackwing-lair'>Repaire de l'Aile noire</a></li>
								<li><a href='index.php?module=raid&ext=classic&name=onyxias-lair'>Repaire d'Onyxia</a></li>
								<li><a href='index.php?module=raid&ext=classic&name=zul-gurub'>Zul'Gurub</a></li>
								<li><a href='index.php?module=raid&ext=classic&name=naxxramas'>Naxxramas</a></li>
							</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
						</li>
						<li><a href='' class='fly'>Raids BC<!--[if gte IE 7]><!--></a><!--<![endif]-->
							<!--[if lte IE 6]><table><tr><td><![endif]--><ul>
								<li><a href='instances.php'>".$lang_menu['required_instance']."</a></li>
								<li><a href='index.php?module=raid&ext=bc&name=karazhan'>karazhan</a></li>
								<li><a href='index.php?module=raid&ext=bc&name=doom-lord-kazzak'>Kazzak</a></li>
								<li><a href='index.php?module=raid&ext=bc&name=doomwalker'>Marche-funeste</a></li>
								<li><a href='index.php?module=raid&ext=bc&name=tempest-keep'>Donjon de la tempête, l'Oeil</a></li>
								<li><a href='index.php?module=raid&ext=bc&name=gruuls-lair'>Repaire de Gruul</a></li>
								<li><a href='index.php?module=raid&ext=bc&name=hellfire-citadel'>Repaire de Magtheridon</a></li>
								<li><a href='index.php?module=raid&ext=bc&name=coilfang-reservoir'>Sanctuaire du Serpent</a></li>
								<li><a href='index.php?module=raid&ext=bc&name=caverns-of-time'>Sommet d'Hyjal</a></li>
								<li><a href='index.php?module=raid&ext=bc&name=black-temple'>Temple noir</a></li>
								<li><a href='index.php?module=raid&ext=bc&name=zulaman'>Zul'Aman</a></li>
							</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
						</li>
						<li><a href='' class='fly'>Raids de WotLK<!--[if gte IE 7]><!--></a><!--<![endif]-->
							<!--[if lte IE 6]><table><tr><td><![endif]--><ul>
								<li><a href='index.php?module=raid&ext=woltk&name=naxxramas'>Naxxramas</a></li>
								<li><a href='index.php?module=raid&ext=woltk&name=nexus'>L'Oeil de l'éternité</a></li>
								<li><a href='index.php?module=raid&ext=woltk&name=ulduar'>Ulduar</a></li>
							</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
						</li>
					</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
			</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		<li class='top'><a href='' class='top_link'><span class='down'>".$lang_menu['communaute']."</span><!--[if gte IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]--><ul class='sub'>
				<li><a href='index.php?module=boutique'>".$lang_menu['shop']."</a></li>";
				if($forum_actif != 'oui')
				{
					echo "<li><a href='".$forum_lien."' target='_blank'>".$lang_menu['forums']."</a></li>";
				}
				else
				{
					echo "<li><a href='index.php?module=forums'>".$lang_menu['forums']."</a></li>";
				}
				echo "
				<li><a href='index.php?module=chatbox'>".$lang_menu['shoutbox']."</a></li>
				<li><a href='index.php?module=contact'>".$lang_menu['contact']."</a></li>
				<li><a href='index.php?module=membres'>".$lang_menu['site_member']."</a></li>
				<li><a href='index.php?module=top_vote'>".$lang_menu['top_vote']."</a></li>
				<li><a href='index.php?module=sondages'>".$lang_menu['sondage']."</a></li>
			</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		<li class='top'><a href='' class='top_link'><span class='down'>".$lang_menu['account']."</span><!--[if gte IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]--><ul class='sub'>";
				if($_SESSION['auth'] != 'yes')
				{
					echo "<li><a href='index.php?module=compte'>".$lang_menu['submit']."</a></li>";
				}
				else
				{
					echo "<li><a href='index.php?module=mon_compte'>".$lang_menu['my_account']."</a></li>
					<li><a href='index.php?module=messagerie'>".$lang_menu['private_message']."</a></li>";
				}
				echo "
			</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>";
		if($_SESSION['auth'] == 'yes')
		{
			echo "<li class='top'><a href='login.php?action=logout' class='top_link'><span class='down'>".$lang_menu['logout']."</span></a></li>";
		}
		else
		{
			echo "<li class='top'><a href='login.php' class='top_link'><span class='down'>".$lang_menu['login']."</span></a></li>";
		}
	echo "</ul>";	
?>
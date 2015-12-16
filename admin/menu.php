<?php
echo "	
	<ul id='nav'>
		<li class='top'><a href='../index.php' class='top_link'><span>".$lang_menu_admin['home']."</span></a></li>
		<li class='top'><a href='' class='top_link'><span class='down'>".$lang_menu_admin['admin_site']."</span><!--[if gte IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]--><ul class='sub'>
				<li><a href='index.php?module=votes'>".$lang_menu_admin['vote']."</a></li>
				<li><a href='index.php?module=news'>".$lang_menu_admin['news']."</a></li>
				<li><a href='index.php?module=bugs'>".$lang_menu_admin['bugs']."</a></li>
				<li><a href='index.php?module=compte'>".$lang_menu_admin['account_site']."</a></li>
				<li><a href='index.php?module=chatbox'>".$lang_menu_admin['shoutbox']."</a></li>
				<li><a href='index.php?module=ban'>".$lang_menu_admin['ban']."</a></li>
				<li><a href='index.php?module=avatars'>".$lang_menu_admin['avatars']."</a></li>
				<li><a href='index.php?module=sondages'>".$lang_menu_admin['sondages']."</a></li>
				<li><a href='index.php?module=logs'>".$lang_menu_admin['logs']."</a></li>
				<li><a href='' class='fly'>".$lang_menu_admin['shop']."<!--[if gte IE 7]><!--></a><!--<![endif]-->
					<!--[if lte IE 6]><table><tr><td><![endif]--><ul>
						<li><a href='index.php?module=boutique&action=achat&type=pieces'>".$lang_menu_admin['shop_gold']."</a></li>
						<li><a href='index.php?module=boutique&action=achat&type=objet'>".$lang_menu_admin['shop_item']."</a></li>
						<li><a href='index.php?module=boutique&action=achat&type=level'>".$lang_menu_admin['shop_level']."</a></li>
						<li><a href='index.php?module=boutique&action=achat&type=montures'>".$lang_menu_admin['shop_mount']."</a></li>
						<li><a href='index.php?module=boutique&action=achat&type=metiers'>".$lang_menu_admin['shop_work']."</a></li>
						<li><a href='index.php?module=boutique&action=achat&type=arene'>".$lang_menu_admin['shop_arene']."</a></li>
						<li><a href='index.php?module=boutique&action=achat&type=honneur'>".$lang_menu_admin['shop_honor']."</a></li>
						<li><a href='index.php?module=boutique&action=achat&type=set'>".$lang_menu_admin['shop_set']."</a></li>
					</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
				<li><a href='' class='fly'>".$lang_menu_admin['forums']."<!--[if gte IE 7]><!--></a><!--<![endif]-->
					<!--[if lte IE 6]><table><tr><td><![endif]--><ul>
						<li><a href='index.php?module=forums&action=admin_forums'>".$lang_menu_admin['forums_forums']."</a></li>
						<li><a href='index.php?module=groupes'>".$lang_menu_admin['forums_groups']."</a></li>
						<li><a href='index.php?module=droits_forums'>".$lang_menu_admin['forums_droits']."</a></li>
						<li><a href='index.php?module=rangs'>".$lang_menu_admin['forums_ranks']."</a></li>
					</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
				<li><a href='' class='fly'>".$lang_menu_admin['config']."<!--[if gte IE 7]><!--></a><!--<![endif]-->
					<!--[if lte IE 6]><table><tr><td><![endif]--><ul>
						<li><a href='index.php?module=configuration&action=forums'>".$lang_menu_admin['forums_config']."</a></li>
						<li><a href='index.php?module=configuration&action=site'>".$lang_menu_admin['site_config']."</a></li>
					</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
			</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		<li class='top'><a href='' class='top_link'><span class='down'>".$lang_menu_admin['admin_game']."</span><!--[if gte IE 7]><!--></a><!--<![endif]-->
			<!--[if lte IE 6]><table><tr><td><![endif]--><ul class='sub'>
				<li><a href='index.php?module=compte_active'>".$lang_menu_admin['account_active']."</a></li>
				<li><a href='index.php?module=compte_jeu'>".$lang_menu_admin['account_game']."</a></li>
				<li><a href='index.php?module=perso'>".$lang_menu_admin['characters']."</a></li>
				<li><a href='index.php?module=perso_move'>".$lang_menu_admin['characters_move']."</a></li>
				<li><a href='index.php?module=bank_guilde'>".$lang_menu_admin['bank_guild']."</a></li>
				<li><a href='index.php?module=additem'>".$lang_menu_admin['add_item']."</a></li>
				<li><a href='' class='fly'>".$lang_menu_admin['other']."<!--[if gte IE 7]><!--></a><!--<![endif]-->
					<!--[if lte IE 6]><table><tr><td><![endif]--><ul>
					<li><a href='index.php?module=clean'>".$lang_menu_admin['clean']."</a></li>
					<li><a href='index.php?module=commandes'>".$lang_menu_admin['commands']."</a></li>
					<li><a href='index.php?module=teleport'>".$lang_menu_admin['teleport']."</a></li>
					</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
				<li><a href='' class='fly'>Commande SHELL IG<!--[if gte IE 7]><!--></a><!--<![endif]-->
					<!--[if lte IE 6]><table><tr><td><![endif]--><ul>
					<li><a href='index.php?module=shell&action=envoi'>Faire un envoi</a></li>
					<li><a href='index.php?module=shell&action=annonce'>Faire une annonce</a></li>
					<li><a href='index.php?module=shell&action=reboot'>Reboot Mangos</a></li>
					<li><a href='index.php?module=shell&action=stop'>Arreter Mangos</a></li>
					<li><a href='index.php?module=shell&action=teleport'>Teleporter un joueur</a></li>
					<li><a href='index.php?module=shell&action=motd'>Modifier le MOTD</a></li>
					<li><a href='index.php?module=shell&action=ticket'>Voir un ticket</a></li>
					</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
				</li>
			</ul><!--[if lte IE 6]></td></tr></table></a><![endif]-->
		</li>
		<li class='top'><a href='../login.php?action=logout' class='top_link'><span>".$lang_menu_admin['logout']."</span></a></li>
	</ul>";	
?>
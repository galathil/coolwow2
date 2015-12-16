var i = 0;
var t = 0;

var className = "Talents de mage";
var talentPath = "/info/basics/talents/";

tree[i] = "Arcanes"; i++;
tree[i] = "Feu"; i++;
tree[i] = "Givre"; i++;

i = 0;

talent[i] = [0, "Subtilité des arcanes", 2, 1, 1]; i++;
talent[i] = [0, "Focalisation des arcanes", 3, 2, 1]; i++;
talent[i] = [0, "Stabilité arcanique", 5, 3, 1]; i++;
talent[i] = [0, "Robustesse des arcanes", 3, 1, 2]; i++;
talent[i] = [0, "Absorption de magie", 2, 2, 2]; i++;
talent[i] = [0, "Concentration des arcanes", 5, 3, 2]; i++;
talent[i] = [0, "Harmonisation de la magie", 2, 1, 3]; i++;
talent[i] = [0, "Impact des sorts", 3, 2, 3]; i++;
talent[i] = [0, "Etudiant de la raison", 3, 3, 3]; i++;
talent[i] = [0, "Focalisation de la magie", 1, 4, 3]; i++;
talent[i] = [0, "Sauvegarde des arcanes", 2, 1, 4]; i++;
talent[i] = [0, "Contresort amélioré", 2, 2, 4]; i++;
talent[i] = [0, "Méditation des arcanes", 3, 3, 4]; i++;
talent[i] = [0, "Tourmenter les faibles", 3, 4, 4]; i++;
talent[i] = [0, "Transfert amélioré", 2, 1, 5]; i++;
talent[i] = [0, "Présence spirituelle", 1, 2, 5]; i++;
talent[i] = [0, "Esprit des arcanes", 5, 4, 5]; i++;
talent[i] = [0, "Cape prismatique", 3, 1, 6]; i++;
talent[i] = [0, "Instabilité des arcanes", 3, 2, 6, [getTalentID("Présence spirituelle"),1]]; i++;
talent[i] = [0, "Toute-puissance des arcanes", 2, 3, 6, [getTalentID("Présence spirituelle"),1]]; i++;
talent[i] = [0, "Renforcement arcanique", 3, 1, 7]; i++;
talent[i] = [0, "Pouvoir des arcanes", 1, 2, 7, [getTalentID("Instabilité des arcanes"),3]]; i++;
talent[i] = [0, "Absorption de l'incantateur", 3, 3, 7]; i++;
talent[i] = [0, "Flux arcaniques", 2, 2, 8, [getTalentID("Pouvoir des arcanes"),1]]; i++;
talent[i] = [0, "Maîtrise mentale", 5, 3, 8]; i++;
talent[i] = [0, "Lenteur", 1, 2, 9]; i++;
talent[i] = [0, "Barrage de projectiles", 5, 3, 9]; i++;
talent[i] = [0, "Présence de vent du Néant", 3, 2, 10]; i++;
talent[i] = [0, "Puissance des sorts", 2, 3, 10]; i++;
talent[i] = [0, "Barrage des arcanes", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

//fire talents
talent[i] = [1, "Trait de feu amélioré", 2, 1, 1]; i++;
talent[i] = [1, "Incinération", 3, 2, 1]; i++;
talent[i] = [1, "Boule de feu améliorée", 5, 3, 1]; i++;
talent[i] = [1, "Enflammer", 5, 1, 2]; i++;
talent[i] = [1, "Détermination brûlante", 2, 2, 2]; i++;
talent[i] = [1, "Monde en flammes", 3, 3, 2]; i++;
talent[i] = [1, "Jet de flammes", 2, 1, 3]; i++;
talent[i] = [1, "Impact", 3, 2, 3]; i++;
talent[i] = [1, "Explosion pyrotechnique", 1, 3, 3]; i++;
talent[i] = [1, "Ame ardente", 2, 4, 3]; i++;
talent[i] = [1, "Brûlure améliorée", 3, 1, 4]; i++;
talent[i] = [1, "Boucliers de la fournaise", 2, 2, 4]; i++;
talent[i] = [1, "Maître des éléments", 3, 4, 4]; i++;
talent[i] = [1, "Jouer avec le feu", 3, 1, 5]; i++;
talent[i] = [1, "Masse critique", 3, 2, 5]; i++;
talent[i] = [1, "Vague explosive", 1, 3, 5, [getTalentID("Explosion pyrotechnique"),1]]; i++;
talent[i] = [1, "Vitesse flamboyante", 2, 1, 6]; i++;
talent[i] = [1, "Puissance du feu", 5, 3, 6]; i++;
talent[i] = [1, "Pyromane", 3, 1, 7]; i++;
talent[i] = [1, "Combustion", 1, 2, 7, [getTalentID("Masse critique"),3]]; i++;
talent[i] = [1, "Fureur de lave", 2, 3, 7]; i++;
talent[i] = [1, "Revanche ardente", 2, 1, 8]; i++;
talent[i] = [1, "Feu surpuissant", 3, 3, 8]; i++;
talent[i] = [1, "Boute-flammes", 2, 1, 9, [i+1,1]]; i++;
talent[i] = [1, "Souffle du dragon", 1, 2, 9, [getTalentID("Combustion"),1]]; i++;
talent[i] = [1, "Chaleur continue", 3, 3, 9]; i++;
talent[i] = [1, "Ardeur épuisante", 5, 2, 10]; i++;
talent[i] = [1, "Bombe vivante", 1, 2, 11]; i++;


treeStartStop[t] = i -1;
t++;

//frost talents
talent[i] = [2, "Morsure de givre", 3, 1, 1]; i++;
talent[i] = [2, "Eclair de givre amélioré", 5, 2, 1]; i++;
talent[i] = [2, "Iceberg", 3, 3, 1]; i++;
talent[i] = [2, "Eclats de glace", 3, 1, 2]; i++;
talent[i] = [2, "Protection contre le Givre", 2, 2, 2]; i++;
talent[i] = [2, "Précision élémentaire", 3, 3, 2]; i++;
talent[i] = [2, "Gel prolongé", 3, 4, 2]; i++;
talent[i] = [2, "Glace perçante", 3, 1, 3]; i++;
talent[i] = [2, "Veines glaciales", 1, 2, 3]; i++;
talent[i] = [2, "Blizzard amélioré", 3, 3, 3]; i++;
talent[i] = [2, "Allonge arctique", 2, 1, 4]; i++;
talent[i] = [2, "Canalisation du givre", 3, 2, 4]; i++;
talent[i] = [2, "Fracasser", 3, 3, 4]; i++;
talent[i] = [2, "Morsure du froid", 1, 2, 5]; i++;
talent[i] = [2, "Cône de froid amélioré", 3, 3, 5]; i++;
talent[i] = [2, "Cœur de gel", 3, 4, 5]; i++;
talent[i] = [2, "Froid comme la glace", 2, 1, 6, [getTalentID("Morsure du froid"),1]]; i++;
talent[i] = [2, "Froid hivernal", 3, 3, 6]; i++;
talent[i] = [2, "Barrière brisée", 2, 1, 7, [i+1,1]]; i++;
talent[i] = [2, "Barrière de glace", 1, 2, 7, [getTalentID("Morsure du froid"),1]]; i++;
talent[i] = [2, "Vents arctiques", 5, 3, 7]; i++;
talent[i] = [2, "Eclair de givre surpuissant", 2, 2, 8]; i++;
talent[i] = [2, "Doigts de givre", 2, 3, 8]; i++;
talent[i] = [2, "Gel mental", 3, 1, 9]; i++;
talent[i] = [2, "Invocation d'un élémentaire d'eau", 1, 2, 9]; i++;
talent[i] = [2, "Elémentaire d'eau amélioré", 3, 3, 9, [getTalentID("Invocation d'un élémentaire d'eau"),1]]; i++;
talent[i] = [2, "Transi jusqu'au os", 5, 2, 10]; i++;
talent[i] = [2, "Congélation", 1, 2, 11]; i++;
treeStartStop[t] = i -1;
t++;

i = 0;

//Arcane Talents Begin

//Arcane Subtlety - Arcane
rank[i] = [
		"Réduit de 15% les chances que vos sorts soient dissipés et réduit de 20% la menace générée par vos sorts des Arcanes.",
		"Réduit de 30% les chances que vos sorts soient dissipés et réduit de 40% la menace générée par vos sorts des Arcanes."
		];
i++;		
		
//Arcane Focus - Arcane
rank[i] = [
		"Augmente les chances de toucher et réduit le coût en mana de vos sorts des Arcanes de 1%.",
		"Augmente les chances de toucher et réduit le coût en mana de vos sorts des Arcanes de 2%.",
		"Augmente les chances de toucher et réduit le coût en mana de vos sorts des Arcanes de 3%."
		];
i++;		

//Arcane Stability - Arcane
rank[i] = [
		"Réduit de 20% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Projectiles des arcanes et Déflagration des arcanes.",
		"Réduit de 40% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Projectiles des arcanes et Déflagration des arcanes.",
		"Réduit de 60% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Projectiles des arcanes et Déflagration des arcanes.",
		"Réduit de 80% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Projectiles des arcanes et Déflagration des arcanes.",
		"Réduit de 100% l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez Projectiles des arcanes et Déflagration des arcanes."
		];
i++;

//Arcane Fortitude - Arcane
rank[i] = [
		"Augmente votre Armure d'un montant égal à 50% de votre Intelligence.",
		"Augmente votre Armure d'un montant égal à 100% de votre Intelligence.",
		"Augmente votre Armure d'un montant égal à 150% de votre Intelligence."
		];
i++;	
		
//Magic Absorption - Arcane
rank[i] = [
		"Augmente toutes les résistances d'0.5 par niveau. Tous les sorts auxquels vous résistez entièrement restaurent 1% de votre total de mana. Temps de recharge d'1 sec.",
		"Augmente toutes les résistances d'1 par niveau. Tous les sorts auxquels vous résistez entièrement restaurent 2% de votre total de mana. Temps de recharge d'1 sec."
		];
i++;		

//Arcane Concentration - Arcane	
rank[i] = [
	"Vous confère 2% de chances d'entrer dans un état d'Idées claires après avoir infligé des dégâts avec un sort à la cible. Cet état réduit le coût en mana de votre prochain sort de 100%.",
	"Vous confère 4% de chances d'entrer dans un état d'Idées claires après avoir infligé des dégâts avec un sort à la cible. Cet état réduit le coût en mana de votre prochain sort de 100%.",
	"Vous confère 6% de chances d'entrer dans un état d'Idées claires après avoir infligé des dégâts avec un sort à la cible. Cet état réduit le coût en mana de votre prochain sort de 100%.",
	"Vous confère 8% de chances d'entrer dans un état d'Idées claires après avoir infligé des dégâts avec un sort à la cible. Cet état réduit le coût en mana de votre prochain sort de 100%.",
	"Vous confère 10% de chances d'entrer dans un état d'Idées claires après avoir infligé des dégâts avec un sort à la cible. Cet état réduit le coût en mana de votre prochain sort de 100%."
		];
i++;		

//Magic Attunement - Arcane
rank[i] = [
"Augmente de 3 mètres la portée de vos sorts des Arcanes et de 25% les effets de vos sorts Amplification de la magie et Atténuation de la magie.",
"Augmente de 6 mètres la portée de vos sorts des Arcanes et de 50% les effets de vos sorts Amplification de la magie et Atténuation de la magie."
		];
i++;		
		
//Spell Impact - Arcane	
rank[i] = [
"Augmente de 2% supplémentaires les dégâts de vos sorts Explosion des arcanes, Déflagration des arcanes, Vague explosive, Trait de feu, Brûlure, Boule de feu, Javelot de glace et Cône de froid.",
"Augmente de 4% supplémentaires les dégâts de vos sorts Explosion des arcanes, Déflagration des arcanes, Vague explosive, Trait de feu, Brûlure, Boule de feu, Javelot de glace et Cône de froid.",
"Augmente de 6% supplémentaires les dégâts de vos sorts Explosion des arcanes, Déflagration des arcanes, Vague explosive, Trait de feu, Brûlure, Boule de feu, Javelot de glace et Cône de froid."
		];		
i++;

//Student of the Mind - Arcane	
rank[i] = [
"Augmente votre total d'Esprit de 4%.",
"Augmente votre total d'Esprit de 7%.",
"Augmente votre total d'Esprit de 10%."
		];		
i++;

//Focus Magic - Arcane
rank[i] = [
		"<span style=text-align:left;float:left;>6% de mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><br>Augmente de 3% les chances de coup critique de la cible avec tous les sorts. Quand la cible réussit un coup critique, les chances de coup critique avec les sorts du lanceur sont augmentées de 3% pendant 10 sec."
		];
i++;	

//Arcane Shielding - Arcane		
rank[i] = [
"Réduit de 17% le mana perdu par point de dégâts reçu lorsque Bouclier de mana est actif et augmente de 25% les résistances conférées par Armure du mage.",
"Réduit de 33% le mana perdu par point de dégâts reçu lorsque Bouclier de mana est actif et augmente de 50% les résistances conférées par Armure du mage."
		];
i++;		

//Improved Counterspell - Arcane	
rank[i] = [
		"Votre Contresort réduit également la cible au silence pendant 2 sec.",
		"Votre Contresort réduit également la cible au silence pendant 4 sec."
		];
i++;		

//Arcane Meditation - Arcane		
rank[i] = [
		"Vous confère 10% de votre vitesse de récupération du mana normale pendant l'incantation.",
		"Vous confère 20% de votre vitesse de récupération du mana normale pendant l'incantation.",
		"Vous confère 30% de votre vitesse de récupération du mana normale pendant l'incantation."
		];
i++;	

//Torment the Weak - Arcane		
rank[i] = [
"Vos techniques Eclair de givre, Boule de feu, Eclair de givrefeu, Projectiles des arcanes et Barrage des arcanes infligent 4% de dégâts supplémentaires aux cibles ralenties.",
"Vos techniques Eclair de givre, Boule de feu, Eclair de givrefeu, Projectiles des arcanes et Barrage des arcanes infligent 8% de dégâts supplémentaires aux cibles ralenties.",
"Vos techniques Eclair de givre, Boule de feu, Eclair de givrefeu, Projectiles des arcanes et Barrage des arcanes infligent 12% de dégâts supplémentaires aux cibles ralenties."
		];
i++;	

//Improved Blink - Arcane	
rank[i] = [
		"Réduit le coût en mana de Transfert de 25% et pendant 4 sec après l'avoir lancé, la probabilité que vous soyez touché par tous les sorts et attaques est réduite de 15%.",
		"Réduit le coût en mana de Transfert de 50% et pendant 4 sec après l'avoir lancé, la probabilité que vous soyez touché par tous les sorts et attaques est réduite de 30%."
		];
i++;

//Presence of Mind - Arcane
rank[i] = [
		"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Lorsque cette technique est activée, votre prochain sort de mage dont le temps d'incantation est inférieur à 10 sec. devient un sort instantané."
		];
i++;		

//Arcane Mind - Arcane		
rank[i] = [
		"Augmente votre total d'Intelligence de 3%.",
		"Augmente votre total d'Intelligence de 6%.",
		"Augmente votre total d'Intelligence de 9%.",
		"Augmente votre total d'Intelligence de 12%.",
		"Augmente votre total d'Intelligence de 15%."
		];
i++;

//Prismatic Cloak - Arcane
rank[i]=[
"Réduit tous les dégâts subis de 2% et réduit le temps de disparition de votre sort Invisibilité de 1 sec.",
"Réduit tous les dégâts subis de 4% et réduit le temps de disparition de votre sort Invisibilité de 2 sec.",
"Réduit tous les dégâts subis de 6% et réduit le temps de disparition de votre sort Invisibilité de 3 sec."
		];
i++;

//Arcane Instability - Arcane		
rank[i] = [
		"Augmente de 1% les dégâts de vos sorts et leurs chances de coup critique.",
		"Augmente de 2% les dégâts de vos sorts et leurs chances de coup critique.",
		"Augmente de 3% les dégâts de vos sorts et leurs chances de coup critique."
		];		
i++;

//Arcane Potency - Arcane		
rank[i] = [
"Augmente de 15% les chances de coup critique de tous les sorts infligeant des dégâts lancés sous l'effet d'Idées claires ou Présence spirituelle.",
"Augmente de 30% les chances de coup critique de tous les sorts infligeant des dégâts lancés sous l'effet d'Idées claires ou Présence spirituelle."
		];		
i++;

//Arcane Empowerment - Arcane
rank[i]=[
"Augmente les dégâts de votre sort Projectiles des arcanes d'un montant égal à 15% de votre puissance des sorts et les dégâts de Déflagration des arcanes de 3% de votre puissance des sorts.",
"Augmente les dégâts de votre sort Projectiles des arcanes d'un montant égal à 30% de votre puissance des sorts et les dégâts de Déflagration des arcanes de 6% de votre puissance des sorts.",
"Augmente les dégâts de votre sort Projectiles des arcanes d'un montant égal à 45% de votre puissance des sorts et les dégâts de Déflagration des arcanes de 9% de votre puissance des sorts."
		];
i++;

//Arcane Power - Arcane				
rank[i] = [
		"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Lorsqu'il est activé, vos sorts infligent 30% de points de dégâts supplémentaires et ils vous coûtent 30% de points de mana supplémentaires. Cet effet dure 15 sec."
		];
i++;	

//Incanter's Absorption - Arcane 
rank[i]=[
"Lorsque vous absorbez des dégâts, les dégâts infligés par vos sorts sont augmentés de 5% du montant absorbé pendant 10 sec.",
"Lorsque vous absorbez des dégâts, les dégâts infligés par vos sorts sont augmentés de 10% du montant absorbé pendant 10 sec.",
"Lorsque vous absorbez des dégâts, les dégâts infligés par vos sorts sont augmentés de 15% du montant absorbé pendant 10 sec."
		];
i++;



//Arcane Flows - Arcane 
rank[i]=[
"Réduit le temps de recharge de vos sorts Présence spirituelle, Pouvoir des arcanes et Invisibilité de 30 sec.",
"Réduit le temps de recharge de vos sorts Présence spirituelle, Pouvoir des arcanes et Invisibilité de 60 sec.",
		];
i++;

//Mind Mastery - Arcane
rank[i]=[
"Augmente la puissance des sorts d'un montant égal à 3% de votre Intelligence totale.",
"Augmente la puissance des sorts d'un montant égal à 6% de votre Intelligence totale.",
"Augmente la puissance des sorts d'un montant égal à 9% de votre Intelligence totale.",
"Augmente la puissance des sorts d'un montant égal à 12% de votre Intelligence totale.",
"Augmente la puissance des sorts d'un montant égal à 15% de votre Intelligence totale."
		];
i++;




//Slow - Arcane				
rank[i] = [
		"<span style=text-align:left;float:left;>12% de mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><BR>Réduit la vitesse de déplacement de la cible de 60%, augmente le temps entre les attaques à distance de 60% et augmente le temps d'incantation de 60%. Dure 15 sec. Lenteur ne peut affecter qu'une seule cible à la fois."
		];
i++;

//Missile Barrage - Arcane
rank[i] = [
"Confère à vos sorts Déflagration des arcanes, Barrage des arcanes, Boule de feu, Eclair de givre et Eclair de givrefeu 4% de chances de réduire la durée de canalisation du prochain sort Projectiles des arcanes de 2.5 sec. et des projectiles sont tirés toutes les 0,5 sec.",
"Confère à vos sorts Déflagration des arcanes, Barrage des arcanes, Boule de feu, Eclair de givre et Eclair de givrefeu 8% de chances de réduire la durée de canalisation du prochain sort Projectiles des arcanes de 2.5 sec. et des projectiles sont tirés toutes les 0,5 sec.",
"Confère à vos sorts Déflagration des arcanes, Barrage des arcanes, Boule de feu, Eclair de givre et Eclair de givrefeu 12% de chances de réduire la durée de canalisation du prochain sort Projectiles des arcanes de 2.5 sec. et des projectiles sont tirés toutes les 0,5 sec.",
"Confère à vos sorts Déflagration des arcanes, Barrage des arcanes, Boule de feu, Eclair de givre et Eclair de givrefeu 16% de chances de réduire la durée de canalisation du prochain sort Projectiles des arcanes de 2.5 sec. et des projectiles sont tirés toutes les 0,5 sec.",
"Confère à vos sorts Déflagration des arcanes, Barrage des arcanes, Boule de feu, Eclair de givre et Eclair de givrefeu 20% de chances de réduire la durée de canalisation du prochain sort Projectiles des arcanes de 2.5 sec. et des projectiles sont tirés toutes les 0,5 sec."
		]; i++;

//Netherwind Presence - Arcane
rank[i] = [
"Augmente de 2% votre hâte des sorts.",
"Augmente de 4% votre hâte des sorts.",
"Augmente de 6% votre hâte des sorts."
		]; i++;


//Spell Power - Arcane 
rank[i]=[
"Augmente les points de dégâts supplémentaires infligés par les coups critiques de tous vos sorts de 25%.",
"Augmente les points de dégâts supplémentaires infligés par les coups critiques de tous vos sorts de 50%."
		];
i++;



//Arcane Barrage - Arcane				
rank[i] = [
		"<span style=text-align:left;float:left;>18% de mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>3 sec de recharge</span><BR>Lance plusieurs projectiles sur la cible ennemie et lui inflige 401 points de dégâts des Arcanes."
		];
i++;

//FIRE TALENTS---------------------------------------------------

//Improved Fire Blast - Fire	
rank[i] = [
			"Réduit le temps de recharge de votre sort Trait de feu de 1 sec.",
			"Réduit le temps de recharge de votre sort Trait de feu de 2 sec."

		];
i++;	

//Incineration - Fire	
rank[i] = [
"Augmente de 2% les chances d'infliger un coup critique avec vos sorts Trait de feu, Brûlure, Déflagration des arcanes et Cône de froid.",
"Augmente de 4% les chances d'infliger un coup critique avec vos sorts Trait de feu, Brûlure, Déflagration des arcanes et Cône de froid.",
"Augmente de 6% les chances d'infliger un coup critique avec vos sorts Trait de feu, Brûlure, Déflagration des arcanes et Cône de froid."
		];
i++;



//Improved Fireball - Fire	
rank[i] = [
			"Réduit le temps d'incantation de votre sort Boule de feu de 0.1 sec.",
			"Réduit le temps d'incantation de votre sort Boule de feu de 0.2 sec.",
			"Réduit le temps d'incantation de votre sort Boule de feu de 0.3 sec.",
			"Réduit le temps d'incantation de votre sort Boule de feu de 0.4 sec.",
			"Réduit le temps d'incantation de votre sort Boule de feu de 0.5 sec."
		];
i++;

//Ignite - Fire		
rank[i] = [
			"Les coups critiques infligés par vos sorts de Feu enflamment la cible et lui infligent 8% des points de dégâts de vos sorts en plus, en 4 sec.",
			"Les coups critiques infligés par vos sorts de Feu enflamment la cible et lui infligent 16% des points de dégâts de vos sorts en plus, en 4 sec.",
			"Les coups critiques infligés par vos sorts de Feu enflamment la cible et lui infligent 24% des points de dégâts de vos sorts en plus, en 4 sec.",
			"Les coups critiques infligés par vos sorts de Feu enflamment la cible et lui infligent 32% des points de dégâts de vos sorts en plus, en 4 sec.",
			"Les coups critiques infligés par vos sorts de Feu enflamment la cible et lui infligent 40% des points de dégâts de vos sorts en plus, en 4 sec."
		];		
i++;	

//Burning Determination - Fire	
rank[i] = [
"Quand vous êtes interrompu ou réduit au silence, vous avez 50% de chances de devenir insensible aux deux mécanismes pendant 10 sec.",
"Quand vous êtes interrompu ou réduit au silence, vous avez 100% de chances de devenir insensible aux deux mécanismes pendant"
		];
i++;

//World in Flames - Fire	
rank[i] = [
"Augmente de 2% vos chances de réaliser un coup critique avec vos sorts Choc de flammes, Explosion pyrotechnique, Vague explosive, Souffle du dragon, Bombe vivante, Blizzard et Explosion des arcanes.",
"Augmente de 4% vos chances de réaliser un coup critique avec vos sorts Choc de flammes, Explosion pyrotechnique, Vague explosive, Souffle du dragon, Bombe vivante, Blizzard et Explosion des arcanes.",
"Augmente de 6% vos chances de réaliser un coup critique avec vos sorts Choc de flammes, Explosion pyrotechnique, Vague explosive, Souffle du dragon, Bombe vivante, Blizzard et Explosion des arcanes."
		]; 
i++;

//Flame Throwing - Fire	
rank[i] = [
			"Augmente la portée de vos sorts de Feu de 3 mètres.",
			"Augmente la portée de vos sorts de Feu de 6 mètres."
		];
i++;


//Impact - Fire			
rank[i] = [
			"Confère 4% de chances à vos sorts de dégâts d'étourdir vos cibles pendant 2 sec.",
			"Confère 7% de chances à vos sorts de dégâts d'étourdir vos cibles pendant 2 sec.",
			"Confère 10% de chances à vos sorts de dégâts d'étourdir vos cibles pendant 2 sec."
		];
i++;

//Pyroblast - Fire	
rank[i] = [
		"<span style=text-align:left;float:left;>22% de mana de base</span><span style=text-align:right;float:right;>35 m de portée</span><br><span style=text-align:left;float:left;>5 sec d'incantation</span><br>Lance un immense rocher enflammé qui inflige 141 points de dégâts de Feu et 56 points de dégâts de Feu supplémentaires en 12 sec."
		];		
i++;

//Burning Soul - Fire
rank[i] = [
"Réduit l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez des sorts de Feu de 35% et réduit la menace générée par vos sorts de Feu de 5%.",
"Réduit l'interruption causée par les attaques infligeant des dégâts pendant que vous incantez des sorts de Feu de 70% et réduit la menace générée par vos sorts de Feu de 10%."
		];
i++;		

//Improved Scorch - Fire	
rank[i] = [
"Vos sorts de Brûlure ont 33% de chances de rendre votre cible vulnérable aux dégâts de sorts. Cette vulnérabilité augmente les chances de coup critique avec les sorts contre cette cible de 2% et dure 30 sec. Cumulable jusqu'à 5 fois.",
"Vos sorts de Brûlure ont 66% de chances de rendre votre cible vulnérable aux dégâts de sorts. Cette vulnérabilité augmente les chances de coup critique avec les sorts contre cette cible de 2% et dure 30 sec. Cumulable jusqu'à 5 fois.",
"Vos sorts de Brûlure ont 100% de chances de rendre votre cible vulnérable aux dégâts de sorts. Cette vulnérabilité augmente les chances de coup critique avec les sorts contre cette cible de 2% et dure 30 sec. Cumulable jusqu'à 5 fois."
		];
i++;		

//MOLTEN SHIELDS - Fire	
rank[i] = [
"Confère à vos sorts Gardien de feu et Gardien de givre 15% de chances de renvoyer les sorts tant qu'ils sont actifs. De plus, votre Armure de la fournaise a 50% de chances d'affecter les attaques à distance et les sorts.",
"Confère à vos sorts Gardien de feu et Gardien de givre 30% de chances de renvoyer les sorts tant qu'ils sont actifs. De plus, votre Armure de la fournaise a 50% de chances d'affecter les attaques à distance et les sorts."
		];
i++;		

//Master of Elements - Fire	
rank[i] = [
			"Les coups critiques obtenus avec les sorts vous rendront 10% de leur coût en mana de base.",
			"Les coups critiques obtenus avec les sorts vous rendront 20% de leur coût en mana de base.",
			"Les coups critiques obtenus avec les sorts vous rendront 30% de leur coût en mana de base."
		]; i++;

//Playing with Fire - Fire	
rank[i] = [
			"Augmente tous les dégâts des sorts causés de 1% et tous les dégâts des sorts subis de 1%.",
			"Augmente tous les dégâts des sorts causés de 2% et tous les dégâts des sorts subis de 2%.",
			"Augmente tous les dégâts des sorts causés de 3% et tous les dégâts des sorts subis de 3%."
		]; i++;

//Critical Mass - Fire	
rank[i] = [
			"Augmente de 2% vos chances d'infliger un coup critique avec vos sorts de Feu.",
			"Augmente de 4% vos chances d'infliger un coup critique avec vos sorts de Feu.",
			"Augmente de 6% vos chances d'infliger un coup critique avec vos sorts de Feu."
		];i++;		

//Blast Wave - Fire	
rank[i] = [
			"208 Mana<br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>30 sec de recharge</span><br>Une vague de flammes rayonne autour du lanceur et inflige à tous les ennemis pris dans l'explosion 154 points de dégâts de Feu, en plus de les faire tomber à la renverse et de les Hébéter pendant 6 sec."
		]; i++;		

//Blazing Speed - Fire	
rank[i] = [
			"Vous confère 5% de chances, lorsque vous êtes touché par une attaque en mêlée ou à distance, de voir votre vitesse de déplacement augmenter de 50% et de dissiper tous les effets affectant le mouvement. Cet effet dure 8 sec.",
			"Vous confère 10% de chances, lorsque vous êtes touché par une attaque en mêlée ou à distance, de voir votre vitesse de déplacement augmenter de 50% et de dissiper tous les effets affectant le mouvement. Cet effet dure 8 sec."
		]; i++;

//Fire Power - Fire	
rank[i] = [
			"Augmente de 2% les dégâts infligés par vos sorts de Feu.",
			"Augmente de 4% les dégâts infligés par vos sorts de Feu.",
			"Augmente de 6% les dégâts infligés par vos sorts de Feu.",
			"Augmente de 8% les dégâts infligés par vos sorts de Feu.",
			"Augmente de 10% les dégâts infligés par vos sorts de Feu."		
		]; i++;

//Pyromaniac - Fire	
rank[i] = [
			"Augmente les chances de réussir un coup critique et réduit le coût en mana de tous les sorts de Feu de 1% supplémentaires.",
			"Augmente les chances de réussir un coup critique et réduit le coût en mana de tous les sorts de Feu de 2% supplémentaires.",
			"Augmente les chances de réussir un coup critique et réduit le coût en mana de tous les sorts de Feu de 3% supplémentaires."			
		]; 
i++;
		
//Combustion - Fire
rank[i] = [
		"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Lorsqu'il est activé, ce sort augmente vos chances de coup critique avec les sorts de dégâts de Feu de 10% chaque fois que vous touchez avec un sort de ce type. Cet effet dure jusqu'à ce que vous ayez infligé 3 coups critiques avec des sorts de Feu."
		];
i++;
		
//Molten Fury - Fire	
rank[i] = [
"Augmente les dégâts de tous les sorts contre les cibles disposant de moins de 35% de leurs points de vie de 6%.",
			"Augmente les dégâts de tous les sorts contre les cibles disposant de moins de 35% de leurs points de vie de 12%."
		]; 
i++;

//Fiery Payback - Fire	
rank[i] = [
"Lorsque vous avez moins de 35% de vie, tous les dégâts subis sont réduits de 10%, le temps d'incantation de votre sort Explosion pyrotechnique est réduit de 1,8 secondes et son temps de recharge est augmenté de 2.5 secs.",
"Lorsque vous avez moins de 35% de vie, tous les dégâts subis sont réduits de 20%, le temps d'incantation de votre sort Explosion pyrotechnique est réduit de 3,5 secondes et son temps de recharge est augmenté de 5 secs."
		]; 
i++;

//Empowered Fire - Fire	
rank[i] = [
			"Augmente les dégâts de vos sorts Boule de feu et Eclair de givrefeu d'un montant égal à 5% de votre puissance des sorts.",
			"Augmente les dégâts de vos sorts Boule de feu et Eclair de givrefeu d'un montant égal à 10% de votre puissance des sorts.",
			"Augmente les dégâts de vos sorts Boule de feu et Eclair de givrefeu d'un montant égal à 15% de votre puissance des sorts."
		]; 
i++;

//Firestarter - Fire	
rank[i] = [
"Vos sorts Vague explosive et Souffle du dragon qui infligent des dégâts ont 50% de chances de rendre l'incantation de votre prochain sort Choc de flammes instantanée. Dure 10 sec.",
"Vos sorts Vague explosive et Souffle du dragon qui infligent des dégâts ont 100% de chances de rendre l'incantation de votre prochain sort Choc de flammes instantanée. Dure 10 sec."
		]; i++;


//Dragon's Breath - Fire

rank[i] = [
		"<span style=text-align:left;float:left;>387 Mana</span><BR><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>20 sec de recharge</span><br>Les cibles qui se trouvent dans une zone en forme de cône en face du lanceur de sorts subissent 382 points de dégâts de Feu et sont désorientées pendant 5 sec. Toute attaque directe qui inflige des dégâts réveille la cible. Interrompt l'attaque lors de son utilisation.<br><br>"
		];
i++;

//Hot Streak - Fire	
rank[i] = [
"Chaque fois que vous obtenez 2 sorts critiques de suite en utilisant Boule de feu, Brûlure ou Eclair de givrefeu, vous avez 33% de chances que votre prochain sort Explosion pyrotechnique lancé dans les 10 sec soit instantané.",
"Chaque fois que vous obtenez 2 sorts critiques de suite en utilisant Boule de feu, Brûlure ou Eclair de givrefeu, vous avez 66% de chances que votre prochain sort Explosion pyrotechnique lancé dans les 10 sec soit instantané",
"Chaque fois que vous obtenez 2 sorts critiques de suite en utilisant Boule de feu, Brûlure ou Eclair de givrefeu, vous avez 100% de chances que votre prochain sort Explosion pyrotechnique lancé dans les 10 sec soit instantané"
		]; 
i++;


//Burnout - Fire	
rank[i] = [
"Augmente de 10% votre bonus de dégâts des critiques réussis avec tous les sorts de Feu, mais vos critiques avec les sorts coûtent 1% du coût du sort en plus.",
"Augmente de 20% votre bonus de dégâts des critiques réussis avec tous les sorts de Feu, mais vos critiques avec les sorts coûtent 2% du coût du sort en plus.",
"Augmente de 30% votre bonus de dégâts des critiques réussis avec tous les sorts de Feu, mais vos critiques avec les sorts coûtent 3% du coût du sort en plus.",
"Augmente de 40% votre bonus de dégâts des critiques réussis avec tous les sorts de Feu, mais vos critiques avec les sorts coûtent 4% du coût du sort en plus.",
"Augmente de 50% votre bonus de dégâts des critiques réussis avec tous les sorts de Feu, mais vos critiques avec les sorts coûtent 5% du coût du sort en plus."
		]; 
i++;

//Living Bomb - Fire				
rank[i] = [
		"<span style=text-align:left;float:left;>448 Mana</span><span style=text-align:right;float:right;>35 m de portée</span><br><br><span style=text-align:left;float:left;>Incantation immédiate</span><BR>La cible devient une bombe vivante qui inflige 612 points de dégâts de Feu en 12 sec. Au bout de $d ou quand le sort est dissipé, la cible explose en infligeant 336 points de dégâts de Feu à tous les ennemis se trouvant à moins de 10 mètres, projetant toutes les cibles dans les airs. Ce sort ne peut affecter qu'une seule cible à la fois.<br><br>"
		];
i++;


//FROST TREE--------------------------------------------------------------------------------------		

//Frostbite - Frost
rank[i]=[
"Donne à vos effets d'engourdissement 5% de chances de geler la cible pendant 5 sec.",
"Donne à vos effets d'engourdissement 10% de chances de geler la cible pendant 5 sec.",
"Donne à vos effets d'engourdissement 15% de chances de geler la cible pendant 5 sec."
		];
i++;


//Improved Frost Bolt - Frost
rank[i]=[
			"Réduit le temps d'incantation de votre sort Eclair de givre de 0.1 sec.",
			"Réduit le temps d'incantation de votre sort Eclair de givre de 0.2 sec.",
			"Réduit le temps d'incantation de votre sort Eclair de givre de 0.3 sec.",
			"Réduit le temps d'incantation de votre sort Eclair de givre de 0.4 sec.",
			"Réduit le temps d'incantation de votre sort Eclair de givre de 0.5 sec."
			];
i++;			
			

//Ice Floes - Frost	
rank[i] = [
		"Réduit de 7% le temps de recharge de vos sorts Nova de givre, Cône de froid, Bloc de glace et Veines glaciales.",
		"Réduit de 14% le temps de recharge de vos sorts Nova de givre, Cône de froid, Bloc de glace et Veines glaciales.",
		"Réduit de 20% le temps de recharge de vos sorts Nova de givre, Cône de froid, Bloc de glace et Veines glaciales."
		];
i++;
		
//Ice Shards - Frost
rank[i]=[
"Augmente de 33% les points de dégâts supplémentaires infligés par les coups critiques de vos sorts de Givre.",
"Augmente de 66% les points de dégâts supplémentaires infligés par les coups critiques de vos sorts de Givre.",
"Augmente de 100% les points de dégâts supplémentaires infligés par les coups critiques de vos sorts de Givre."
		];
i++;		

//Frost Warding - Frost
rank[i]=[
"Augmente de 25% l'armure et les résistances octroyées par vos sorts Armure de givre et Armure de glace. De plus, donne à vos sorts Gardien de givre et Gardien de feu 15% de chances d'absorber les dégâts des sorts et de rendre un montant de mana égal aux dégâts absorbés.",
"Augmente de 50% l'armure et les résistances octroyées par vos sorts Armure de givre et Armure de glace. De plus, donne à vos sorts Gardien de givre et Gardien de feu 30% de chances d'absorber les dégâts des sorts et de rendre un montant de mana égal aux dégâts absorbés."
		];
i++;	

//Elemental Precision - Frost
rank[i]=[
"Réduit le coût en mana et augmente vos chances de toucher avec les sorts de Givre et de Feu de 1%.",
"Réduit le coût en mana et augmente vos chances de toucher avec les sorts de Givre et de Feu de 2%.",
"Réduit le coût en mana et augmente vos chances de toucher avec les sorts de Givre et de Feu de 3%."
		];
i++;


//Permafrost - Frost
rank[i]=[
			"Augmente la durée de vos effets d'engourdissement de 1 secondes et réduit la vitesse de la cible de 4% supplémentaires.",
			"Augmente la durée de vos effets d'engourdissement de 2 secondes et réduit la vitesse de la cible de 7% supplémentaires..",
			"Augmente la durée de vos effets d'engourdissement de 3 secondes et réduit la vitesse de la cible de 10% supplémentaires."
		];
i++;		



//Piercing Ice - Frost
rank[i]=[
"Augmente les points de dégâts infligés par vos sorts de Givre de 2%.",
"Augmente les points de dégâts infligés par vos sorts de Givre de 4%.",
"Augmente les points de dégâts infligés par vos sorts de Givre de 6%."
		];
i++;		

//Icy Veins - Frost
rank[i]=[
		"<span style=text-align:left;float:left;>98 Mana</span><br><span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Accélère vos lancers de sorts en augmentant la vitesse d'incantation des sorts de 20% et réduit de 100% les interruptions causées par les attaques infligeant des dégâts pendant les incantations. Dure 20 sec."
		];
i++;		

//Improved Blizzard - Frost
rank[i]=[
"Ajoute un effet d'engourdissement à votre sort Blizzard. Il réduit la vitesse de déplacement de la cible de 30%. Dure 1.50 sec.",
"Ajoute un effet d'engourdissement à votre sort Blizzard. Il réduit la vitesse de déplacement de la cible de 50%. Dure 1.50 sec.",
"Ajoute un effet d'engourdissement à votre sort Blizzard. Il réduit la vitesse de déplacement de la cible de 75%. Dure 1.50 sec."
		];
i++;		

//Arctic Reach - Frost
rank[i]=[
"Augmente la portée de vos sorts Eclair de givre, Javelot de glace, Congélation et Blizzard et les rayons d'effet de vos sorts Nova de givre et Cône de froid de 10%.",
"Augmente la portée de vos sorts Eclair de givre, Javelot de glace, Congélation et Blizzard et les rayons d'effet de vos sorts Nova de givre et Cône de froid de 20%."
		];
i++;		
		

//Frost Channeling - Frost
rank[i]=[
"Réduit de 4% le coût en mana de tous vos sorts et réduit de 4% la menace que génèrent vos sorts de Givre.",
"Réduit de 7% le coût en mana de tous vos sorts et réduit de 7% la menace que génèrent vos sorts de Givre.",
"Réduit de 10% le coût en mana de tous vos sorts et réduit de 10% la menace que génèrent vos sorts de Givre."
		];
i++;		
		
//Shatter - Frost
rank[i]=[
"Augmente de 17% vos chances d'infliger un coup critique avec tous les sorts lorsque vous attaquez des cibles gelées.",
"Augmente de 34% vos chances d'infliger un coup critique avec tous les sorts lorsque vous attaquez des cibles gelées.",
"Augmente de 50% vos chances d'infliger un coup critique avec tous les sorts lorsque vous attaquez des cibles gelées."
		];
i++;



//Cold Snap - Frost
rank[i]=[
		"<span style=text-align:left;float:left;>Instantané</span><span style=text-align:right;float:right;>8 min de recharge</span><br>Lorsqu'il est activé, ce sort met fin à tous les temps de recharge des sorts de Givre que vous avez lancés récemment."
		];
i++;	
		
	
//Improved Cone of Cold - Frost
rank[i]=[
"Augmente de 15% les points de dégâts infligés par votre sort Cône de froid.",
"Augmente de 25% les points de dégâts infligés par votre sort Cône de froid.",
"Augmente de 35% les points de dégâts infligés par votre sort Cône de froid."
		];
i++;	

//Frozen Core - Frost
rank[i]=[
"Réduit les dégâts que vous infligent tous les sorts de 2%.",
"Réduit les dégâts que vous infligent tous les sorts de 4%.",
"Réduit les dégâts que vous infligent tous les sorts de 6%."
		];
i++;

//Cold as Ice - Frost
rank[i]=[
"Réduit de 10% le temps de recharge de vos sorts Morsure du froid, Barrière de glace, Congélation et Invocation d'un élémentaire d'eau.",
"Réduit de 20% le temps de recharge de vos sorts Morsure du froid, Barrière de glace, Congélation et Invocation d'un élémentaire d'eau."
		];
i++;

//Winter's Chill - Frost
rank[i]=[
"Vos sorts de Givre causant des dégâts ont 33% de chances de déclencher l’effet de Froid hivernal, qui augmente les chances de critique des sorts de 2% pendant 15 sec. Cumulable jusqu’à 5 fois.",
"Vos sorts de Givre causant des dégâts ont 66% de chances de déclencher l’effet de Froid hivernal, qui augmente les chances de critique des sorts de 2% pendant 15 sec. Cumulable jusqu’à 5 fois.",
"Vos sorts de Givre causant des dégâts ont 100% de chances de déclencher l’effet de Froid hivernal, qui augmente les chances de critique des sorts de 2% pendant 15 sec. Cumulable jusqu’à 5 fois."
		];
i++;

//Shattered Barrier - Frost	
rank[i] = [
"Confère à votre sort Barrière de glace 50% de chances de geler tous les ennemis se trouvant à moins de 10 mètres pendant 8 sec. quand la barrière est détruite.",
"Confère à votre sort Barrière de glace 100% de chances de geler tous les ennemis se trouvant à moins de 10 mètres pendant 8 sec. quand la barrière est détruite."
		];
i++;

//Ice Barrier - Frost
rank[i]=[
		"<span style=text-align:left;float:left;>25% de mana de base</span><br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>30 sec de recharge</span><br>Vous protège instantanément à l'aide d'un bouclier magique qui absorbe 454 points de dégâts. Dure 1 min. Tant que le bouclier est actif, les sorts ne sont pas interrompus."		];
i++;	

//Arctic Winds - Frost
rank[i]=[
"Augmente tous les dégâts de Givre que vous causez de 1% et réduit la probabilité que les attaques en mêlée et à distance vous touchent de 1%.",
"Augmente tous les dégâts de Givre que vous causez de 2% et réduit la probabilité que les attaques en mêlée et à distance vous touchent de 2%.",
"Augmente tous les dégâts de Givre que vous causez de 3% et réduit la probabilité que les attaques en mêlée et à distance vous touchent de 3%.",
"Augmente tous les dégâts de Givre que vous causez de 4% et réduit la probabilité que les attaques en mêlée et à distance vous touchent de 4%.",
"Augmente tous les dégâts de Givre que vous causez de 5% et réduit la probabilité que les attaques en mêlée et à distance vous touchent de 5%."
		];
i++;

//Empowered Frostbolt - Frost
rank[i]=[
"Augmente les dégâts de votre sort Eclair de givre d'un montant égal à 5% de votre puissance des sorts et augmente de 2% les chances de coup critique.",
"Augmente les dégâts de votre sort Eclair de givre d'un montant égal à 10% de votre puissance des sorts et augmente de 4% les chances de coup critique."
		];
i++;

//Fingers of Frost - Frost
rank[i]=[
"Donne à vos effets d'engourdissement 7% de chances de déclencher l’effet Doigts de givre, qui permet à vos 2 prochains sorts d'agir comme si la cible était Gelée. Dure 15 sec.",
"Donne à vos effets d'engourdissement 15% de chances de déclencher l’effet Doigts de givre, qui permet à vos 2 prochains sorts d'agir comme si la cible était Gelée. Dure 15 sec."
		];
i++;

//Brain Freeze - Frost
rank[i]=[
"Vos sorts infligeant des dégats de givre ont 5% de chances de supprimer le temps d'incantation et le coût en mana de votre prochaine Boule de feu.",
"Vos sorts infligeant des dégats de givre ont 10% de chances de supprimer le temps d'incantation et le coût en mana de votre prochaine Boule de feu.",
"Vos sorts infligeant des dégats de givre ont 15% de chances de supprimer le temps d'incantation et le coût en mana de votre prochaine Boule de feu."
		];
i++;

//Summon Water Elemental - Frost
rank[i]=[
		"522 Mana<br><span style=text-align:left;float:left;>Incantation immédiate</span><span style=text-align:right;float:right;>3 min de recharge</span><br>Invoque un élémentaire d'eau qui se bat pour le lanceur de sorts pendant 45 sec."
		];
i++;

//Improved Water Elemental - Frost
rank[i]=[
"Augmente la durée de votre sort Invocation d'un élémentaire d'eau de 5 secondes. Votre élémentaire d'eau rend à tous les membres du groupe ou du raid se trouvant à moins de 100 mètres un montant de mana égal à 0.2% de leur total de mana toutes les 5 sec.",
"Augmente la durée de votre sort Invocation d'un élémentaire d'eau de 10 secondes. Votre élémentaire d'eau rend à tous les membres du groupe ou du raid se trouvant à moins de 100 mètres un montant de mana égal à 0.4% de leur total de mana toutes les 5 sec.",
"Augmente la durée de votre sort Invocation d'un élémentaire d'eau de 15 secondes. Votre élémentaire d'eau rend à tous les membres du groupe ou du raid se trouvant à moins de 100 mètres un montant de mana égal à 0.6% de leur total de mana toutes les 5 sec."
		];
i++;

//Chilled to the Bone - Frost
rank[i]=[
"Augmente les points de dégâts infligés par vos sorts Eclair de givre, Eclair de givrefeu et Javelot de glace de 1% et réduit la vitesse de déplacement de toutes les cibles transies de 2% supplémentaires.",
"Augmente les points de dégâts infligés par vos sorts Eclair de givre, Eclair de givrefeu et Javelot de glace de 2% et réduit la vitesse de déplacement de toutes les cibles transies de 4% supplémentaires.",
"Augmente les points de dégâts infligés par vos sorts Eclair de givre, Eclair de givrefeu et Javelot de glace de 3% et réduit la vitesse de déplacement de toutes les cibles transies de 6% supplémentaires.",
"Augmente les points de dégâts infligés par vos sorts Eclair de givre, Eclair de givrefeu et Javelot de glace de 4% et réduit la vitesse de déplacement de toutes les cibles transies de 8% supplémentaires.",
"Augmente les points de dégâts infligés par vos sorts Eclair de givre, Eclair de givrefeu et Javelot de glace de 5% et réduit la vitesse de déplacement de toutes les cibles transies de 10% supplémentaires."
		];
i++;

//Deep Freeze - Frost
rank[i]=[
"<span style=text-align:left;float:left;>9% de mana de base</span><span style=text-align:right;float:right;>30 m de portée</span><br><span style=text-align:left;float:left;>1.5 sec d'incantation</span><span style=text-align:right;float:right;>30 sec de recharge</span><br>Etourdit la cible pendant 5 sec. Utilisable uniquement sur les cibles gelées."
		];
i++;
		
//Frost Talents End^^
jsLoaded=true;//needed for ajax script loading
